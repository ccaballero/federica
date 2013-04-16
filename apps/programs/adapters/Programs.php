<?php

class Db_Programs extends Yachay_Db_Table
{
    protected $_name = 'area';
    protected $_primary = 'ident';
    protected $_modelClass = 'Programs_Program';
    protected $_url = 'url';
    
    public function selectAllAdapters() {
        return $this->fetchAll(
               $this->getAdapter()
                    ->quoteInto('type = ?', 'program'));
    }
}
