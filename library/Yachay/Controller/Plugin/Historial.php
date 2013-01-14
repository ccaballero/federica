<?php

class Yachay_Controller_Plugin_Historial extends Zend_Controller_Plugin_Abstract
{
    public function dispatchLoopShutdown() {
        $session = new Zend_Session_Namespace('pueblo');

        $session->previous_url = $session->current_url;
        $session->current_url = Zend_Controller_Front::getInstance()->getRequest()->getRequestUri();
    }
}
