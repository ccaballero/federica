<?php

class Db_Boards extends Yachay_Db_Table
{
    protected $_name = 'board';
    protected $_primary = 'ident';
    protected $_modelClass = 'Boards_Board';
    protected $_url = 'url';
    
    public function selectAllAdapters() {
        return $this->fetchAll($this->select()->order('ident DESC'));
    }

    public function selectAllByCount($count) {
        return $this->_constructList(
            $this->fetchAll(
                $this->select()
                     ->limit($count, 0)
                     ->order('ident DESC')
        ));
    }
}
