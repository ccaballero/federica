<?php

class Routes_IndexController extends Yachay_Controller_List
{
    protected $_adapter = 'Db_Routes';
    protected $_type = 'route';
    protected $_container = 'Routes';
    protected $_component = 'Routes_Route';
    protected $_editor = 'Routes_Form_Editor';

    protected $_route_manager = 'routes_manager';
}
