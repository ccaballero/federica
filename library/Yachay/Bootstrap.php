<?php

class Yachay_Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initConfig() {
        $config = new Zend_Config($this->getOptions());
        Zend_Registry::set('config', $config);
    }

    protected function _initAutoload() {
        $this->bootstrap('config');
        $this->bootstrap('db');

        $loader = Zend_Loader_Autoloader::getInstance();
        $loader->pushAutoloader(new Yachay_Loader());

        $resourceTypes = array(
            'form' => array(
                'path' => 'forms/',
                'namespace' => 'Form',
            ),
        );

        $db_packages = new Db_Packages();
        $modules = $db_packages->selectByStatus('active');

        foreach ($modules as $module) {
            $loader->pushAutoloader(new Zend_Application_Module_Autoloader(
                array(
                    'namespace' => ucfirst($module->url),
                    'basePath' => APPLICATION_PATH . '/apps/' . $module->url,
                    'resourceTypes' => $resourceTypes
                )
            ));
        }

        return $loader;
    }

    protected function _initRouter() {
        $this->bootstrap(array('config', 'autoload', 'frontController', 'db'));

        $config = Zend_Registry::get('config');

        $ctrl = Zend_Controller_Front::getInstance();
        $router = $ctrl->getRouter();

        // remove default routes
//        $router->removeDefaultRoutes();

        // Routes select by enabled package
        $db_routes = new Db_Routes();
        $routes = $db_routes->selectByEnabledPackages();

        foreach ($routes as $route) {
            $path = $config->resources->frontController->moduleDirectory . '/' . $route->module;
            if (is_dir($path)) {
                $router->addRoute($route->route,
                    new Zend_Controller_Router_Route(
                        $route->mapping, array(
                            'module' => $route->module,
                            'controller' => $route->controller,
                            'action' => $route->action,
                )));
            }
        }

        return $router;
    }

    protected function _initSession() {
        Zend_Session::start();
    }

    protected function _initHistory() {
        $this->bootstrap(array('config', 'session'));

        $session = new Zend_Session_Namespace('federica');
        $config = Zend_Registry::get('config');

        if (!isset($session->current_url)) {
            $session->current_url = $config->resources->frontController->baseUrl;
        }
        if (!isset($session->previous_url)) {
            $session->previous_url = $config->resources->frontController->baseUrl;
        }
    }

//    protected function _initUser() {
//        $this->bootstrap(array('autoload','session','db'));
//
//        $session = new Zend_Session_Namespace('yachay');
//        $user = new Users_Visitor();
//
//        if (isset($session->user)) {
//            $ident = $session->user->ident;
//
//            $model_users = new Users();
//            $user_logged = $model_users->findByIdent($ident);
//
//            if (!empty($user_logged)) {
//                $user = $user_logged;
//            }
//        }
//
//        Zend_Registry::set('user',$user);
//    }

//    protected function _initContext() {
//        $this->bootstrap('session');
//
//        $session = new Zend_Session_Namespace('yachay');
//        if (!isset($session->context)) {
//            $session->context_type = 'global';
//        }
//        if (!isset($session->context_label)) {
//            $session->context_label = '';
//        }
//        if (!isset($session->context_id)) {
//            $session->context_id = 0;
//        }
//    }

//    protected function _initTemplate() {
//        $this->bootstrap(array('autoload','user'));
//
//        $user = Zend_Registry::get('user');
//        $config = Zend_Registry::get('config');
//
//        $model_templates = new Templates();
//        $template = $model_templates->findByLabel($user->template);
//
//        // Set of theme
//        $user_template = new StdClass();
//        $user_template->label = $template->label;
//        $user_template->parent = $template->parent;
//        $user_template->doctype = $template->doctype;
//        $user_template->description = $template->description;
//        $user_template->css_properties = $template->css_properties;
//        $user_template->htmlbase = $config->resources->frontController->baseUrl . '/templates/' . $user_template->label . '/';
//
//        Zend_Registry::set('template', $user_template);
//
//        // Set of color palette
//        $model_templates_users = new Templates_Users();
//        $template_user = $model_templates_users->findByTemplateAndUser($template->ident, $user->ident);
//        if (empty($template_user)) {
//            $template_user = $template;
//        }
//        $palette = json_decode($template_user->css_properties, true);
//
//        Zend_Registry::set('palette', $palette);
//    }

//    protected function _initPlaceholder() {
//        // Set of web regions
//        global $TOOLBAR;
//        $TOOLBAR = new Yachay_Regions_Toolbar();
//        global $SEARCH;
//        $SEARCH = new Yachay_Regions_Search();
//        global $MENUBAR;
//        $MENUBAR = new Yachay_Regions_Menubar();
//        global $BREADCRUMB;
//        $BREADCRUMB = new Yachay_Regions_Breadcrumb();
//        global $FOOTER;
//        $FOOTER = new Yachay_Regions_Footer();
//        // Set of web widgets
//        global $WIDGETS;
//        $WIDGETS = array(1=>'',2=>'',3=>'',4=>'');
//    }

    protected function _initView() {
        $this->bootstrap(array('config', 'frontController'));

        $view = new Zend_View();

        // Use the php suffix in views
        $renderer = new Zend_Controller_Action_Helper_ViewRenderer();
        $renderer->setView($view)
                 ->setViewSuffix('php');

        $config = Zend_Registry::get('config');
        $view->setScriptPath($config->resources->layout->layoutPath . $config->resources->layout->layout . '/');
        $view->setHelperPath(APPLICATION_PATH . '/library/Yachay/View/Helper', 'Yachay_View_Helper');

        Zend_Controller_Action_HelperBroker::addHelper($renderer);

        $options = $this->getOptions();

        $baseUrl = $options['resources']['frontController']['baseUrl'];
        $template = $options['resources']['layout']['layout'];
        $view->media_url = $baseUrl . '/templates/' . $template;

        $view->doctype($options['resources']['view']['doctype']);
        $view->headTitle($options['site']['title'])
             ->setSeparator(' | ');

        $equivs = $options['template']['http-equiv'];
        foreach ($equivs as $key => $content) {
            $view->headMeta()->appendHttpEquiv($key, $content);
        }
        $metas = $options['template']['meta'];
        foreach ($metas as $key => $content) {
            $view->headMeta()->appendName($key, $content);
        }

        $view->headLink(array('rel' => 'icon', 'type' => 'image/x-icon', 'href' => $view->baseUrl($view->media_url . '/favicon.ico')));

        $css_styles = $options['template']['css'];
        foreach ($css_styles as $css_style) {
             $view->headLink()->appendStylesheet($view->media_url . $css_style);
        }

        $view->headScript()->appendScript('var static_url=\'' . $view->media_url . '\'');
        $js_scripts = $options['template']['js'];
        foreach ($js_scripts as $js_script) {
            $view->headScript()->appendFile($view->media_url . $js_script, 'text/javascript');
        }

        $auth = Zend_Auth::getInstance();
        $view->auth = $auth;

        return $view;
    }

    protected function _initLayout() {
        $this->bootstrap('config');

        $config = Zend_Registry::get('config');

        Zend_Layout::startMVC(array(
            'layoutPath' => $config->resources->layout->layoutPath,
            'layout'     => $config->resources->layout->layout,
            'viewSuffix' => 'php',
        ));

        return Zend_Layout::getMvcInstance();
    }
}
