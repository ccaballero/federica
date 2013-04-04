<?php

class Events_IndexController extends Yachay_Controller_List
{
    protected $_adapter = 'Db_Events';
    protected $_type = 'event';
    protected $_container = 'Events';
    protected $_component = 'Events_Event';
    protected $_editor = 'Events_Form_Editor';

    protected $_route_manager = 'events_manager';
}
