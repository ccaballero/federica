<?php

class Yachay_View_Helper_StaticUrl
{
    public function staticUrl($file) {
        $config = Zend_Registry::get('config');
        $baseUrl = $config->resources->frontController->baseUrl;

        $static_tpl = Zend_Registry::get('static_tpl');
        
        return $baseUrl . '/media/static/' . $static_tpl . $file;
    }
}
