<?php

class Db_Routes extends Yachay_Db_Table
{
    protected $_name = 'route';
    protected $_primary = 'ident';
    protected $_modelClass = 'Routes_Route';

    public function tree() {
        $tree = new Collections_Tree();
        $routes = $this->selectAll();

        foreach ($routes as $route) {
            $tree->addNode($route);
        }

        $tree->indexAll();
        return $tree;
    }

    public function selectByEnabledPackages() {
        $result = $this->fetchAll(
            $this->select()
                 ->setIntegrityCheck(false)
                 ->from($this, array(
                     'ident', 'label', 'description', 'route', 'mapping',
                     'module', 'controller', 'action', 'defaults',
                     'requirements', 'priority', 'parent'
                 ))
                 ->joinLeft('package', 'package.url = route.module', array())
                 ->where('package.status = ?', 'active')
                 ->order('route.priority DESC')
                 ->order('route.ident DESC'));
        return $this->_constructList($result);
    }

//    public function selectByType($type) {
//        return $this->fetchAll($this->select()->where('type = ?', $type));
//    }

    public function findByRoute($route) {
        return $this->_constructObject($this->findAdapterByRoute($route));
    }

    public function findAdapterByRoute($route) {
        return $this->fetchRow(
               $this->getAdapter()
                    ->quoteInto('route = ?', $route));
    }
}
