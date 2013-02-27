<?php

class Areas
{
    public function getHeaders() {
        return array('Area', 'Correo electrónico');
    }

    public function getTasks($type = 'list') {
        $url = new Zend_Controller_Action_Helper_Url();

        $list = (object)array(
            'url' => $url->url(array(), 'areas_list'),
            'label' => 'Lista de areas',
        );

        $manager = (object)array(
            'url' => $url->url(array(), 'areas_manager'),
            'label' => 'Administrador de areas',
        );

        $new = (object)array(
            'url' => $url->url(array(), 'areas_new'),
            'label' => 'Nueva area',
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
