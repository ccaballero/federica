<?php

class Areas_IndexController extends Yachay_Controller_List
{
    protected $_adapter = 'Db_Areas';
    protected $_type = 'area';
    protected $_container = 'Areas';
    protected $_component = 'Areas_Area';
    protected $_editor = 'Areas_Form_Editor';

    protected $_route_manager = 'areas_manager';
    
    protected $_hook_new = array(
        'type' => 'area',
    );
}
