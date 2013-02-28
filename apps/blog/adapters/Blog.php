<?php

class Db_Blog extends Yachay_Db_Table
{
    protected $_name = 'blog';
    protected $_primary = 'ident';
    protected $_modelClass = 'Blog_Post';
    protected $_url = 'url';
    
    public function selectAllAdapters() {
        return $this->fetchAll($this->select()->order('date DESC'));
    }

    public function selectAllByCount($count) {
        return $this->_constructList(
            $this->fetchAll(
                $this->select()
                     ->limit($count, 0)
                     ->order('date DESC')
        ));
    }
}
