<?php

class Programs_ProgramController extends Yachay_Controller_Resource
{
    protected $_adapter = 'Db_Programs';
    protected $_type = 'program';
    protected $_container = 'Programs';
    protected $_component = 'Programs_Program';
    protected $_editor = 'Programs_Form_Editor';

    protected $_route_manager = 'programs_manager';
}
