<?php

class Yachay_View_Helper_TemplateUrl
{
    public function templateUrl($file) {
        $config = Zend_Registry::get('config');
        $baseUrl = $config->resources->frontController->baseUrl;
        $template = $config->resources->layout->layout;

        return $baseUrl . '/templates/' . $template . $file;
    }
}
