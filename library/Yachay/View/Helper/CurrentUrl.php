<?php

class Yachay_View_Helper_CurrentUrl
{
    public function currentUrl() {
        $session = new Zend_Session_Namespace('pueblo');
        return $session->current_url;
    }
}
