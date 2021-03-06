<?php

abstract class Yachay_Db_Table extends Zend_Db_Table_Abstract
{
    // Find by unique indexes
    public function findAdapterByIdent($ident) {
        return $this->fetchRow(
               $this->getAdapter()
                    ->quoteInto('ident = ?', $ident));
    }

    public function findByIdent($ident) {
        return $this->_constructObject($this->findAdapterByIdent($ident));
    }

    public function findByCode($code) {
        $row = $this->fetchRow(
               $this->getAdapter()
                    ->quoteInto('code = ?', $code));

        return $this->_constructObject($row);
    }

    public function findByLabel($label) {
        $row = $this->fetchRow(
               $this->getAdapter()
                    ->quoteInto('label = ?', $label));

        return $this->_constructObject($row);
    }

    public function findAdapterByUrl($url) {
        return $this->fetchRow(
               $this->getAdapter()
                    ->quoteInto($this->_url . ' = ?', $url));
    }

    public function findByUrl($url) {
        return $this->_constructObject($this->findAdapterByUrl($url));
    }

    // General selections
    public function selectAllAdapters() {
        return $this->fetchAll();
    }

    public function selectAll() {
        return $this->_constructList($this->selectAllAdapters());
    }

    // Generic constructors of bean objects
    protected function _constructList(Iterator $resultset) {
        $list = array();
        foreach ($resultset as $row) {
            $list[] = $this->_constructObject($row);
        }
        return $list;
    }

    protected function _constructObject($row) {
        if (empty($row)) {
            return null;
        }

        $object = new $this->_modelClass();
        $reflect = new ReflectionObject($object);
        $properties = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);
        foreach ($properties as $property) {
            $key = $property->getName();
            $object->$key = $row->$key;
        }

        return $object;
    }

    // customized task for element
    public function validDelete() {
        return true;
    }

    public function delete($elements) {
        if (count($elements) > 0) {
            return parent::delete(
                array('ident IN (?)' => $elements)
            );
        } else {
            return 0;
        }
    }
}
