<?php

class Packages_IndexController extends Yachay_Controller_Action
{
    public function indexAction() {
        $this->view->collection = $this->getCollection();
        $this->view->resource_type = 'package';

        return $this->render('list');
    }
    
    public function managerAction() {
        $this->view->collection = $this->getCollection();
        
        $this->view->resource_type = 'package';
        return $this->render('manager');
    }
    
    private function getCollection() {
        $db_packages = new Db_Packages();
        return $db_packages->selectAll();
    }
}
