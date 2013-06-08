<?php

class Db_Areas_Area extends Zend_Db_Table_Row
{
    public function save() {
        $convert = new Yachay_View_Helper_Convert();
        $this->url = $convert->convert($this->label);

        parent::save();
    }
}
