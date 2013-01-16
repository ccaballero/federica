<?php

abstract class Yachay_Controller_Action extends Zend_Controller_Action
{
    public $request;

    public function preDispatch() {
        $this->request = $this->getRequest();
    }

    public function postDispatch() {
        
    }
}
