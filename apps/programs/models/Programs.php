<?php

class Programs
{
    public function getHeaders() {
        return array('Programa', 'Correo electrónico', 'Operaciones');
    }

    public function getTasks($type = 'list') {
        $url = new Zend_Controller_Action_Helper_Url();

        $list = (object)array(
            'url' => $url->url(array(), 'programs_list'),
            'label' => 'Lista de programas',
        );

        $manager = (object)array(
            'url' => $url->url(array(), 'programs_manager'),
            'label' => 'Administrador de programas',
        );

        $new = (object)array(
            'url' => $url->url(array(), 'programs_new'),
            'label' => 'Nueva programa',
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
