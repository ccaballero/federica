<?php

abstract class Yachay_Controller_Action extends Zend_Controller_Action
{
    public $request;
    public $route;

    public function init() {
        $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $this->_flashMessenger->setNamespace('pueblo');
        
        $this->_redirector = $this->_helper->getHelper('Redirector');
        $this->_redirector->setPrependBase(false);
    }
    
    public function preDispatch() {
        $this->request = $this->getRequest();

        $route = $this->getFrontController()->getRouter()
                      ->getCurrentRouteName();

        $db_routes = new Db_Routes();
        $this->route = $db_routes->findByRoute($route);
        $this->view->route = $this->route;
    }

    public function postDispatch() {
        $this->view->messages = array_merge($this->_flashMessenger->getCurrentMessages(), $this->_flashMessenger->getMessages());
        $this->_helper->getHelper('FlashMessenger')->clearCurrentMessages();
        $this->_helper->getHelper('FlashMessenger')->clearMessages();
    }
}
