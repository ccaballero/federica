<?php

class Db_Areas extends Yachay_Db_Table
{
    protected $_name = 'area';
    protected $_primary = 'ident';
    protected $_modelClass = 'Areas_Area';
    protected $_url = 'url';

    public function selectByType($type) {
        return $this->_constructList(
            $this->fetchAll(
               $this->getAdapter()
                    ->quoteInto('type = ?', $type)
            )
        );
    }
}
