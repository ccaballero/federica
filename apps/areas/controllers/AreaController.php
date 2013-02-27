<?php

class Areas_AreaController extends Yachay_Controller_Resource
{
    protected $_adapter = 'Db_Areas';
    protected $_type = 'area';
    protected $_container = 'Areas';
    protected $_component = 'Areas_Area';
    protected $_editor = 'Areas_Form_Editor';

    protected $_route_manager = 'areas_manager';
}
