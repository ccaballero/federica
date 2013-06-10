<?php

class Privileges
{
    public function getHeaders() {
        return array();
    }

    public function getTasks($type = 'list') {
        $url = new Zend_Controller_Action_Helper_Url();

        $list = (object)array(
            'url' => $url->url(array(), 'privileges_list'),
            'label' => 'Lista de privilegios',
        );

        if ($type == 'list') {
            return array();
        } else {
            return array($list);
        }
    }

    public function getBatchOperations() {
        return array();
    }

    public function getElementOperations() {
        return array();
    }
}
