<?php

class Blog_IndexController extends Yachay_Controller_List
{
    protected $_adapter = 'Db_Blog';
    protected $_type = 'post';
    protected $_container = 'Blog';
    protected $_component = 'Blog_Post';
    protected $_editor = 'Blog_Form_Editor';

    protected $_paginator = true;
    protected $_pager = array(
        'key' => 'blog_list',
        'params' => array(),
    );

    protected $_route_manager = 'blog_manager';

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
