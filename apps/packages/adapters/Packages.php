<?php

class Db_Packages extends Yachay_Db_Table
{
    protected $_name = 'package';
    protected $_primary = 'ident';
    protected $_rowClass = 'Db_Packages_Package';
    protected $_modelClass = 'Packages_Package';
    protected $_url = 'url';

    public function selectByStatus($status) {
        return $this->fetchAll($this->select()->where('status = ?', $status));
    }

    private function _validLockUnlock($resource) {
        if ($resource->type == 'base') {
            return false;
        }

        return true;
    }

    public function validLock($resource) {
        return $this->_validLockUnlock($resource);
    }

    public function validUnlock($resource) {
        return $this->_validLockUnlock($resource);
    }

    public function lock($elements) {
        if (count($elements) > 0) {
            return $this->update(
                array('status' => 'inactive'),
                array('ident IN (?)' => $elements)
            );
        } else {
            return 0;
        }
    }

    public function unlock($elements) {
        if (count($elements) > 0) {
            return $this->update(
                array('status' => 'active'),
                array('ident IN (?)' => $elements)
            );
        } else {
            return 0;
        }
    }
}
