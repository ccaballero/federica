<?php

class Roles_Form_Editor extends Zend_Form
{
    public function init() {
        $this->setMethod('post');

        $label = $this->createElement('text', 'label');
        $label->setRequired(true)
            ->setLabel('Nombre (*):')
            ->addFilter('StringTrim')
            ->addValidator('StringLength', false, array(4, 128));

        $description = $this->createElement('textarea', 'description');
        $description->setRequired(false)
            ->setLabel('Descripción:')
            ->addFilter('StringTrim')
            ->addFilter('StripTags');

        $this->addElement($label);
        $this->addElement($description);

        $this->addElement('submit', 'submit', array('ignore' => true, 'label' => 'Guardar'));
    }

    public function setRole(Roles_Role $role) {
        $this->getElement('label')->setValue($role->label);
        $this->getElement('description')->setValue($role->description);
    }

    public function getRole() {
        $role = new Roles_Role();

        $role->label = $this->getElement('label')->getValue();
        $role->description = $this->getElement('description')->getValue();

        return $role;
    }
}
