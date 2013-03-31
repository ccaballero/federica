<?php

class Boards_BoardController extends Yachay_Controller_Resource
{
    protected $_adapter = 'Db_Boards';
    protected $_type = 'board';
    protected $_container = 'Boards';
    protected $_component = 'Boards_Board';
    protected $_editor = 'Boards_Form_Editor';

    protected $_route_manager = 'boards_manager';
}
