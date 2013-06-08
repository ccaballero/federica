<?php

class Privileges_IndexController extends Yachay_Controller_List
{
    protected $_adapter = 'Db_Privileges';
    protected $_type = 'privilege';
    protected $_container = 'Privileges';
    protected $_component = 'Privileges_Privilege';
    protected $_editor = 'Privileges_Form_Editor';

    protected $_route_manager = 'privileges_manager';
}
