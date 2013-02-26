<?php

abstract class Yachay_Controller_Action extends Zend_Controller_Action
{
    public $request;
    public $route;
    public $auth;
    public $objects = array();

    public function init() {
        $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $this->_flashMessenger->setNamespace('pueblo');

        $this->_redirector = $this->_helper->getHelper('Redirector');
        $this->_redirector->setPrependBase(false);

        $auth = Zend_Auth::getInstance();
        $this->auth = $auth;
    }

    public function preDispatch() {
        $this->request = $this->getRequest();

        $route = $this->getFrontController()->getRouter()
                      ->getCurrentRouteName();

        $db_routes = new Db_Routes();
        $this->route = $db_routes->findByRoute($route);
        $this->view->route = $this->route;

        // Elements contruction based in mapping of url
        $elements = preg_split('#/[a-z]*#', $this->route->mapping);
        foreach ($elements as $element) {
            if (substr($element, 0, 1) === ':') {
                $url = $this->request->getParam(substr($element, 1));
                $_adapter = 'Db_' . ucfirst($this->route->module);
                $adapter = new $_adapter();
                $_element = $adapter->findByUrl($url);

                if (!empty($element)) {
                    $this->objects[substr($element, 1)] = $_element;
                }
            }
        }

        // Title generation
        $search = array();
        $replace = array();

        foreach ($this->objects as $url => $object) {
            $search[] = '$' . $url;
            $replace[] = (string)$object;
        }
        
        $this->view->title = str_replace($search, $replace, $this->route->label);
    }

    public function postDispatch() {
        $this->view->messages = array_merge($this->_flashMessenger->getCurrentMessages(), $this->_flashMessenger->getMessages());
        $this->_helper->getHelper('FlashMessenger')->clearCurrentMessages();
        $this->_helper->getHelper('FlashMessenger')->clearMessages();
    }
}
