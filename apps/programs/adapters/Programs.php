<?php

class Db_Programs extends Yachay_Db_Table
{
    protected $_name = 'program';
    protected $_primary = 'ident';
    protected $_modelClass = 'Programs_Program';
    protected $_url = 'url';
}
