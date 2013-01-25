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
}
