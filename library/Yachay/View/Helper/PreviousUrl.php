<?php

class Yachay_View_Helper_PreviousUrl
{
    public function previousUrl() {
        $session = new Zend_Session_Namespace('pueblo');
        return $session->previous_url;
    }
}

