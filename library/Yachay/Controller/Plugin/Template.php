<?php

class Yachay_Controller_Plugin_Template extends Zend_Controller_Plugin_Abstract
{
    public function routeShutdown(Zend_Controller_Request_Abstract $request) {
        $front_controller = Zend_Controller_Front::getInstance();
        $route = $front_controller->getRouter()->getCurrentRouteName();

        // render the placeholders
        $view = Zend_Controller_Action_HelperBroker::getExistingHelper('ViewRenderer')->view;
        $view->route = $route;

        $config = Zend_Registry::get('config');
        $template = $config->resources->layout->layout;

        $db_templates_layouts = new Db_Templates_Layouts();
        $layout = $db_templates_layouts->selectByRoute($route, $template);

        $db_templates_regions = new Db_Templates_Regions();
        $regions = $db_templates_regions->selectByLayout($layout->label, $template);

        $directory = '/regions/';
        foreach ($regions as $region) {
            $view->render($directory . $region->label . '.php');
        }
    }
}
