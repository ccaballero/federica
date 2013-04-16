<?php

class Programs_IndexController extends Yachay_Controller_List
{
    protected $_adapter = 'Db_Programs';
    protected $_type = 'program';
    protected $_container = 'Programs';
    protected $_component = 'Programs_Program';
    protected $_editor = 'Programs_Form_Editor';

    protected $_route_manager = 'programs_manager';
    
    protected $_hook_new = array(
        'type' => 'program',
    );
}
