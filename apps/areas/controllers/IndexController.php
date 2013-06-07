<?php

class Areas_IndexController extends Yachay_Controller_List
{
    protected $_adapter = 'Db_Areas';
    protected $_type = 'area';
    protected $_container = 'Areas';
    protected $_component = 'Areas_Area';
    protected $_editor = 'Areas_Form_Editor';

    protected $_route_manager = 'areas_manager';

    protected $_mode = 'area';

    protected function getCollection() {
        $adapter = new $this->_adapter();
        if (substr($this->route, -7) == 'manager') {
            return $adapter->selectAll();
        } else {
            return $adapter->selectByType($this->_mode);
        }
    }

    public function areasAction() {
        $this->view->mode = $this->_mode;
        return $this->indexAction();
    }

    public function programsAction() {
        $this->_mode = 'program';
        $this->view->mode = $this->_mode;
        return $this->indexAction();
    }

    public function supportsAction() {
        $this->_mode = 'support';
        $this->view->mode = $this->_mode;
        return $this->indexAction();
    }
}
