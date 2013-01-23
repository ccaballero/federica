<?php

abstract class Yachay_Controller_Action extends Zend_Controller_Action
{
    public $request;
    public $route;

    public function preDispatch() {
        $this->request = $this->getRequest();

        $route = $this->getFrontController()->getRouter()
                      ->getCurrentRouteName();

        $db_routes = new Db_Routes();
        $this->route = $db_routes->findByRoute($route);
        $this->view->route = $this->route;
    }

    public function postDispatch() {

    }
}
