<?php

class Users_IndexController extends Yachay_Controller_List
{
    protected $_adapter = 'Db_Users';
    protected $_type = 'user';
    protected $_container = 'Users';
    protected $_component = 'Users_User';
    protected $_editor = 'Users_Form_Editor';

    protected $_route_manager = 'users_manager';
}
