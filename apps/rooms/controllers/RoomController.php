<?php

class Rooms_RoomController extends Yachay_Controller_Resource
{
    protected $_adapter = 'Db_Rooms';
    protected $_type = 'room';
    protected $_container = 'Rooms';
    protected $_component = 'Rooms_Room';
    protected $_editor = 'Rooms_Form_Editor';

    protected $_route_manager = 'rooms_manager';
}
