<?php

class Routes
{
    public function getHeaders() {
        return array('Título', 'Mapeo', 'Paquete', 'Controlador', 'Action');
    }

    public function getTasks($type = 'list') {
        $url = new Zend_Controller_Action_Helper_Url();

        $list = (object)array(
            'url' => $url->url(array(), 'routes_list'),
            'label' => 'Lista de rutas',
        );

        $manager = (object)array(
            'url' => $url->url(array(), 'routes_manager'),
            'label' => 'Administrador de rutas',
        );

        if ($type == 'list') {
            return array($manager);
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
