<?php

class Privileges
{
    public function getHeaders() {
        return array('Paquete', 'Privilegio', 'Descripción', 'Operaciones');
    }

    public function getTasks($type = 'list') {
        $url = new Zend_Controller_Action_Helper_Url();

        $list = (object)array(
            'url' => $url->url(array(), 'rooms_list'),
            'label' => 'Lista de salas',
        );

        $manager = (object)array(
            'url' => $url->url(array(), 'rooms_manager'),
            'label' => 'Administrador de salas',
        );

        $new = (object)array(
            'url' => $url->url(array(), 'rooms_new'),
            'label' => 'Nueva sala',
        );

        if ($type == 'list') {
            return array($manager);
        } else {
            return array($list, $new);
        }
    }

    public $_view = array('name' => 'view', 'label' => 'Ver', 'icon' => 'page');
    public $_edit = array('name' => 'edit', 'label' => 'Editar', 'icon' => 'pencil');
    public $_delete = array('name' => 'delete', 'label' => 'Eliminar', 'icon' => 'delete');

    public function getBatchOperations() {
        return array(
            (object)$this->_delete
        );
    }

    public function getElementOperations() {
        return array(
            (object)$this->_view,
            (object)$this->_edit,
            (object)$this->_delete,
        );
    }
}
