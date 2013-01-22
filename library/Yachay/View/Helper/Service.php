<?php

class Yachay_View_Helper_Service
{
    public function service($script) {
        $config = Zend_Registry::get('config');

        $service_dir = $config->site->services;
        
        $view = new Zend_View();
        $view->setScriptPath($service_dir);
        return $view->render($script . '.php');
    }
}

