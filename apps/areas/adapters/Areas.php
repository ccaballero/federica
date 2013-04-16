<?php

class Db_Areas extends Yachay_Db_Table
{
    protected $_name = 'area';
    protected $_primary = 'ident';
    protected $_modelClass = 'Areas_Area';
    protected $_url = 'url';

    public function selectAllAdapters() {
        return $this->fetchAll(
               $this->getAdapter()
                    ->quoteInto('type = ?', 'area'));
    }
    
    public function selectFullAdapters() {
        return $this->fetchAll();
    }
    
    public function selectFullAll() {
        return $this->_constructList($this->selectFullAdapters());
    }
}
