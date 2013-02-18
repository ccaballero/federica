<?php

class Resources_IndexController extends Yachay_Controller_Action
{
    public function indexAction() {
        $adapter = new Db_Resources();
        $this->view->resources = $adapter->selectAll();
        
        return $this->renderScript('components/resource-list.php');
    }
}
