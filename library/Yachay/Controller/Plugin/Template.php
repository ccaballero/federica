<?php

class Yachay_Controller_Plugin_Template extends Zend_Controller_Plugin_Abstract
{
    public function routeShutdown(Zend_Controller_Request_Abstract $request) {
        // render the placeholders
        $view = Zend_Controller_Action_HelperBroker::getExistingHelper('ViewRenderer')->view;

        $front_controller = Zend_Controller_Front::getInstance();
        $route = $front_controller->getRouter()->getCurrentRouteName();
        
        $db_regions = new Db_Regions();
        $regions = $db_regions->selectByRoute($route);

        $dir = '/regions/';

        foreach ($regions as $region) {
            $view->render($dir . $region->label . '.php');
        }
    }
}
