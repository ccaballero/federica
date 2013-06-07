<?php

class Db_Roles extends Yachay_Db_Table
{
    protected $_name = 'role';
    protected $_primary = 'ident';
    protected $_modelClass = 'Roles_Role';
    protected $_url = 'ident';
}
