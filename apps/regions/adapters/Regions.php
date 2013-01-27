<?php

class Db_Regions extends Yachay_Db_Table
{
    protected $_name = 'region';
    protected $_primary = 'ident';
    protected $_modelClass = 'Regions_Region';

    public function selectByRoute($route) {
        $result = $this->fetchAll(
            $this->select()
                 ->setIntegrityCheck(false)
                 ->from($this, array('ident', 'label', 'package', 'type'))
                 ->joinLeft('region_route', 'region.package = region_route.package AND region.label = region_route.region', array())
                 ->where('region_route.route = ?', $route));
        return $this->_constructList($result);
    }
}
