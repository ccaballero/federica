<?php

class Db_Privileges extends Yachay_Db_Table
{
    protected $_name = 'privilege';
    protected $_primary = 'ident';
    protected $_modelClass = 'Privileges_Privilege';
    protected $_url = 'ident';
}
