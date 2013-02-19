<?php

class Db_Rooms extends Yachay_Db_Table
{
    protected $_name = 'room';
    protected $_primary = 'ident';
    protected $_modelClass = 'Rooms_Room';
}
