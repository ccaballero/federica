<?php

class Boards_IndexController extends Yachay_Controller_List
{
    protected $_adapter = 'Db_Boards';
    protected $_type = 'board';
    protected $_container = 'Boards';
    protected $_component = 'Boards_Board';
    protected $_editor = 'Boards_Form_Editor';

    protected $_paginator = true;
    protected $_pager = array(
        'key' => 'boards_list',
        'params' => array(),
    );

    protected $_route_manager = 'boards_manager';

    public function indexAction() {
        $config = Zend_Registry::get('config');
        $page = $this->request->getParam('page', 1);

        $paginator = Zend_Paginator::factory($this->getCollection());
        $paginator->setItemCountPerPage($config->site->paginator->count);
        $paginator->setCurrentPageNumber($page);
        $paginator->setPageRange($config->site->paginator->range);

        $this->view->container = new $this->_container();
        $this->view->component = new $this->_component();
        $this->view->collection = $paginator;

        try {
            return $this->renderScript('containers/list-' . strtolower($this->_container) . '.php');
        } catch (Exception $e) {
            if (isset($this->_paginator)) {
                $this->view->pager = $this->_pager;
                return $this->renderScript('containers/list-paginator.php');
            } else {
                return $this->renderScript('containers/list.php');
            }
        }
    }
}
