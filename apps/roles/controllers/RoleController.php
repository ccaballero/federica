<?php

class Roles_RoleController extends Yachay_Controller_Resource
{
    protected $_adapter = 'Db_Roles';
    protected $_type = 'role';
    protected $_container = 'Roles';
    protected $_component = 'Roles_Role';
    protected $_editor = 'Roles_Form_Editor';

    protected $_route_manager = 'roles_manager';
}
