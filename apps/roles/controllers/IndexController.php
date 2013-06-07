<?php

class Roles_IndexController extends Yachay_Controller_List
{
    protected $_adapter = 'Db_Roles';
    protected $_type = 'user';
    protected $_container = 'Roles';
    protected $_component = 'Roles_Role';
    protected $_editor = 'Roles_Form_Editor';

    protected $_route_manager = 'roles_manager';
}
