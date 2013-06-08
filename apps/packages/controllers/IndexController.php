<?php

class Packages_IndexController extends Yachay_Controller_List
{
    protected $_adapter = 'Db_Packages';
    protected $_type = 'package';
    protected $_container = 'Packages';
    protected $_component = 'Packages_Package';
    protected $_editor = 'Packages_Form_Editor';

    protected $_route_manager = 'packages_manager';
}
