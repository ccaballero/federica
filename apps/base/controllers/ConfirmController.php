<?php

class ConfirmController extends Yachay_Controller_Action
{
    public function confirmAction() {
        $session = new Zend_Session_Namespace('pueblo');
        $confirm = $session->confirm;

        if (!is_array($confirm)) {
            $confirm = array();
        }
        
        if (!isset($confirm['message'])) {
            $confirm['message'] = 'Esta es la pagina de confirmación de peticiones del sitio.';
        }
        
        if (!isset($confirm['return'])) {
            $url = new Zend_Controller_Action_Helper_Url();
            $confirm['return'] = $url->url(array(), 'base');
        }
        
        $this->view->message = $confirm['message'];
        $this->view->return = $confirm['return'];
    }    
}
