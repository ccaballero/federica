<?php

class Db_Templates_Regions extends Yachay_Db_Table
{
    protected $_name = 'template_region';
    protected $_modelClass = 'Templates_Regions_Region';

    public function selectByLayout($layout, $template) {
        $result = $this->fetchAll(
            $this->select()
                 ->setIntegrityCheck(false)
                 ->from($this, array('template', 'label', 'type'))
                 ->joinLeft('template_layout_region',
                    'template_region.template = template_layout_region.template
                 AND template_region.label = template_layout_region.region', array())
                 ->where('template_layout_region.layout = ?', $layout)
                 ->where('template_layout_region.template = ?', $template));
        $list = $this->_constructList($result);
        return $list;
    }
}
