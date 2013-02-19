<?php

class Packages_IndexController extends Yachay_Controller_List
{
    public function getAdapter() {
        return new Db_Packages();
    }
    
    public function getContainer() {
        return new Packages();
    }

    public function getResourceType() {
        return 'package';
    }
}
