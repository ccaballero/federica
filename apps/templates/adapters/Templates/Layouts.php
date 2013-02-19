<?php

class Db_Templates_Layouts extends Yachay_Db_Table
{
    protected $_name = 'template_layout';
    protected $_modelClass = 'Templates_Layouts_Layout';

    public function selectByRoute($route, $template) {
        $result = $this->fetchAll(
            $this->select()
                 ->setIntegrityCheck(false)
                 ->from($this, array('template', 'label'))
                 ->joinLeft('template_layout_route',
                    'template_layout.template = template_layout_route.template
                 AND template_layout.label = template_layout_route.layout', array())
                 ->where('template_layout_route.route = ?', $route)
                 ->where('template_layout_route.template = ?', $template));
        $list = $this->_constructList($result);
        return end($list);
    }
}
