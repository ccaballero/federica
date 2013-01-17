<?php

class StaticController extends Yachay_Controller_Action
{
    public function staticAction() {
        $page = $this->request->getParam('page');

        $config = Zend_Registry::get('config');
        $template = $config->resources->layout->layout;

        $static_tpl = str_replace(array('_', '.'), '-', $page);
        Zend_Registry::set('static_tpl', $static_tpl);

        if (file_exists(APPLICATION_PATH . '/templates/' . $template . '/static/' . $static_tpl . '.php')) {
            return $this->render($page);
        }

        throw new Zend_Controller_Action_Exception('This page does not exist', 404);
    }
}
