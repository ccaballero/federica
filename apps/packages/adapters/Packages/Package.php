<?php

class Db_Packages_Package extends Zend_Db_Table_Row
{
    public function delete() {
        $this->delete();
    }

    public function lock() {
        $this->status = 'inactive';
        $this->save();
    }

    public function unlock() {
        $this->status = 'active';
        $this->save();
    }
}
