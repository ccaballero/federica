<?php

class Packages_PackageController extends Yachay_Controller_Action
{
    public function viewAction() {
        $url = $this->request->getParam('package');
        
        $adapter = new Db_Packages();
        $element = $adapter->findByUrl($url);
        
        $this->view->assign(get_object_vars($element));
        return $this->renderScript('components/package-view.php');
    }

    public function lockAction() {
        $url = $this->request->getParam('package');

        $adapter = new Db_Packages();
        $package = $adapter->findByUrl($url);

        if ($this->request->isPost()) {
            $return = $this->request->getParam('return');

            if ($package->type != 'base') {
                $package->status = 'inactive';
                $package->save();
                
                $this->_helper->flashMessenger->addMessage("El paquete {$package->label} ha sido deshabilitado");
            } else {
                $this->_helper->flashMessenger->addMessage("El paquete {$package->label} no puede ser deshabilitado");
            }

            if (!empty($return)) {
                $this->_redirect($return);
            } else {
                $this->_redirect($this->view->currentUrl());
            }
        } else {
            $session = new Zend_Session_Namespace('pueblo');
            $session->confirm = array(
                'message' => '¿Esta seguro que quiere deshabilitar el paquete ' . $package->label . '?',
                'return'  => $this->view->url(array('package' => $package->url), 'packages_package_view'),
            );

            $this->_redirect($this->view->url(array(), 'base_confirm'));
        }
    }
}
