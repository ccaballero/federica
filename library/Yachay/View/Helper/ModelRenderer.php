<?php

class Yachay_View_Helper_ModelRenderer
{
    public function modelRenderer($model, $type = 'list', $extra_params = array()) {
        $config = Zend_Registry::get('config');

        $view = new Zend_View();
        
        $view->assign($extra_params);
        $view->assign(get_object_vars($model));

        $view->setScriptPath($config->resources->layout->layoutPath . $config->resources->layout->layout . '/components/');
        $view->setHelperPath(APPLICATION_PATH . '/library/Yachay/View/Helper', 'Yachay_View_Helper');

        try {
            $class = get_class($model);
            $_class = explode('_', $class);
            $object = strtolower(end($_class));

            return $view->render($object . '-' . $type . '.php');
        } catch (Exception $e) {
            return $model->__toString();
        }
    }
}
