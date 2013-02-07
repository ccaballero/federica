<?php

class Yachay_Controller_Plugin_Template extends Zend_Controller_Plugin_Abstract
{
    public function routeShutdown(Zend_Controller_Request_Abstract $request) {
        $front_controller = Zend_Controller_Front::getInstance();
        $route = $front_controller->getRouter()->getCurrentRouteName();

        // render the placeholders
        $view = Zend_Controller_Action_HelperBroker::getExistingHelper('ViewRenderer')->view;
        $view->route = $route;

        $db_templates_layouts = new Db_Templates_Layouts();
        $layout = $db_templates_layouts->selectByRoute($route);

//        $db_templates_regions = new Db_Templates_Regions();
//        $regions = $db_templates_regions->selectByLayout($layouts[0]->label);

        // TODO
        $rules = array(
            'frontpage' => array(
                'header',
                'menubar',
                'toolbar',
                'sub-header',
                'left',
                'right',
                'foot-bar',
                'footer',
            ),
            'static' => array(
                'header',
                'menubar',
                'toolbar',
                'sub-header',
                'left',
                'foot-bar',
                'footer',
            ),
            'user' => array(
                'header',
                'menubar',
                'toolbar',
                'left',
                'foot-bar',
            ),
        );

        $directory = '/regions/';
        foreach ($rules[$layout->label] as $region) {
            $view->render($directory . $region . '.php');
        }
    }
}
