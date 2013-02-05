<?php

class Users_IndexController extends Yachay_Controller_List
{
    public function getAdapter() {
        return new Db_Users();
    }

    public function getContainer() {
        return new Users();
    }

    public function getCollection() {
        $db_users = new Db_Users();
        return $db_users->selectAll();
    }

    public function getResourceType() {
        return 'users';
    }
}
