<?php

class Packages
{
    public function getHeaders() {
        return array('Paquete', 'Estado', 'Tipo', 'Operaciones', 'Fecha de Registro');
    }

    public function getTasks($type = 'list') {
        $url = new Zend_Controller_Action_Helper_Url();

        $list = (object)array(
            'url' => $url->url(array(), 'packages_list'),
            'label' => 'Lista de paquetes',
        );

        $manager = (object)array(
            'url' => $url->url(array(), 'packages_manager'),
            'label' => 'Administrador de paquetes',
        );

        if ($type == 'list') {
            return array($manager);
        } else {
            return array($list);
        }
    }

    public $_view = array('name' => 'view', 'label' => 'Ver', 'icon' => 'page');
    public $_lock = array('name' => 'lock', 'label' => 'Deshabilitar', 'icon' => 'disconnect');
    public $_unlock = array('name' => 'unlock', 'label' => 'Habilitar', 'icon' => 'connect');

    public function getBatchOperations() {
        return array((object)$this->_lock, (object)$this->_unlock);
    }
    
    public function getElementOperations() {
        return array((object)$this->_view, (object)$this->_lock, (object)$this->_unlock);
    }
}
