<?php

abstract class Yachay_Controller_List extends Yachay_Controller_Action
{
    abstract function getCollection();
    abstract function getResourceType();

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
}
