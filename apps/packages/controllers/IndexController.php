<?php

class Packages_IndexController extends Yachay_Controller_List
{
    public function getCollection() {
        $db_packages = new Db_Packages();
        return $db_packages->selectAll();
    }

    public function getResourceType() {
        return 'package';
    }
}
