<?php

class Db_Events extends Yachay_Db_Table
{
    protected $_name = 'event';
    protected $_primary = 'ident';
    protected $_modelClass = 'Events_Event';
    protected $_url = 'code';
}
