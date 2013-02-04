<?php

class Db_Templates_Regions extends Yachay_Db_Table
{
    protected $_name = 'template_region';
    protected $_modelClass = 'Templates_Regions_Region';

    public function selectByLayout($layout) {
        $config = Zend_Registry::get('config');
        $template = $config->resources->layout->layout;

        $db = Zend_Db_Table::getDefaultAdapter();
        $result = $db->fetchAll(
            $db->select()
               ->from(
                    array('a' => 'template_layout_region_widget'),
                    array('template', 'layout', 'region', 'widget'))
               ->joinLeft(
                    array('b' => 'template_region'),
                    'a.template = b.template AND a.region = b.label',
                    array('region_type' => 'type'))
               ->joinLeft(
                    array('c' => 'template_widget'),
                    'a.template = c.template AND a.widget = c.label',
                    array('widget_type' => 'type'))
               ->where('a.template = ?', $template)
               ->where('a.layout = ?', $layout));

        $regions = array();
        foreach ($result as $element) {
            $region = new Templates_Regions_Region();
            var_dump($element);
            echo '<br />';
            echo '<br />';
//            $object = $this->_constructObject($ob_region);
//            $regions[] = $object;
        }
        
        var_dump($regions);
        die;
//        return $this->_constructList($result);
    }
}
