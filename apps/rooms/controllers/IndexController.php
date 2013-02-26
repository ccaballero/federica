<?php

class Rooms_IndexController extends Yachay_Controller_List
{
    public function getAdapter() {
        return new Db_Rooms();
    }
    
    public function getContainer() {
        return new Rooms();
    }

    public function getResourceType() {
        return 'room';
    }
    
    public function getEditor() {
        return new Rooms_Form_Editor();
    }
}
