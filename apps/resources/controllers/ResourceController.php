<?php

class Resources_ResourceController extends Yachay_Controller_Action
{
    public function viewAction() {
        $url = $this->request->getParam('resource');

        $adapter = new Db_Resources();
        $element = $adapter->findByCode($url);

        $this->view->resources = $adapter->selectAll();
        $this->view->assign(get_object_vars($element));

        return $this->renderScript('components/resource-view.php');
    }
}
