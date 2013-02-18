<?php

class Yachay_View_Helper_PackageUrl
{
    public function packageUrl($package, $file) {
        $config = Zend_Registry::get('config');
        $baseUrl = $config->resources->frontController->baseUrl;

        return $baseUrl . '/media/packages/' . $package . '/' . $file;
    }
}
