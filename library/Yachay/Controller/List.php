<?php

abstract class Yachay_Controller_List extends Yachay_Controller_Action
{
    public $adapter;
    public $container;

    abstract function getAdapter();
    abstract function getContainer();
    abstract function getCollection();
    abstract function getResourceType();

    public function indexAction() {
        $this->view->container = $this->getContainer();
        $this->view->collection = $this->getCollection();
        $this->view->resource_type = $this->getResourceType();

        return $this->renderScript('containers/list.php');
    }

    public function managerAction() {
        $container = $this->getContainer();

        if ($this->request->isPost()) {
            foreach ($container->getBatchOperations() as $operation) {
                $param = $this->request->getParam($operation->name);
                if (!empty($param)) {
                    $operation = $operation->name;
                    break;
                }
            }

            $check = $this->request->getParam("check");
            $valid_checks = array();
            $adapter = $this->getAdapter();

            foreach ($check as $value) {
                $resource = $adapter->findByIdent($value);
                if (!empty($resource)) {
                    if ($resource->type <> 'base') {
                        $valid_checks[] = $resource->ident;
                    }
                }
            }
            
            $count = $adapter->{$operation}($valid_checks);

            $this->_helper->flashMessenger->addMessage("Han sido modificados $count elementos");
            $this->_redirect($this->view->currentUrl());
        }

        $this->view->container = $container;
        $this->view->resource_type = $this->getResourceType();
        $this->view->collection = $this->getCollection();

        return $this->renderScript('containers/manager.php');
    }
}
