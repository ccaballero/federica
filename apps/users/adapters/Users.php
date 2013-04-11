<?php

class Db_Users extends Yachay_Db_Table
{
    protected $_name = 'user';
    protected $_primary = 'ident';
    protected $_modelClass = 'Users_User';
    protected $_url = 'ident';
}
