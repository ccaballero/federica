<?php

class Routes_IndexController extends Yachay_Controller_List
{
    public function getCollection() {
        $db_routes = new Db_Routes();
        return $db_routes->selectAll();
    }

    public function getResourceType() {
        return 'route';
    }
}
