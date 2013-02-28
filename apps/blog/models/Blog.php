<?php

class Blog
{
    public function getHeaders() {
        return array('Título', 'Fecha de publicación', 'Operaciones');
    }

    public function getTasks($type = 'list') {
        $url = new Zend_Controller_Action_Helper_Url();

        $list = (object)array(
            'url' => $url->url(array(), 'blog_list'),
            'label' => 'Lista de posts',
        );

        $manager = (object)array(
            'url' => $url->url(array(), 'blog_manager'),
            'label' => 'Administrador de posts',
        );

        $new = (object)array(
            'url' => $url->url(array(), 'blog_new'),
            'label' => 'Nuevo post',
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
