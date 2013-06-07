<?php

class Yachay_View_Helper_PreviousUrl
{
    public function previousUrl() {
        $session = new Zend_Session_Namespace('federica');
        return $session->previous_url;
    }
}

