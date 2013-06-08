<?php

class Areas_Form_Editor extends Zend_Form
{
    public function init() {
        $this->setMethod('post');

        $label = $this->createElement('text', 'label');
        $label->setRequired(true)
            ->setLabel('Nombre (*):')
            ->setAttrib('class', 'focus')
            ->addFilter('StringTrim')
            ->addValidator('StringLength', false, array(4, 64));

        $type = $this->createElement('select', 'type');
        $type->setRequired(true)
            ->setLabel('Tipo de area:')
            ->setMultiOptions(array(
                'area' => 'Area',
                'program' => 'Programa',
                'support' => 'Area de apoyo',
            ));

        $email = $this->createElement('text', 'email');
        $email->setRequired(false)
              ->setLabel('Correo electrónico:')
              ->addFilter('StringTrim')
              ->addFilter('StringToLower')
              ->addValidator('StringLength', false, array(4, 128))
              ->addValidator('EmailAddress');

        $description = $this->createElement('textarea', 'description');
        $description->setRequired(false)
            ->setLabel('Descripción:')
            ->setAttrib('class', 'ckeditor')
            ->addFilter('StringTrim');

        $this->addElement($label);
        $this->addElement($type);
        $this->addElement($email);
        $this->addElement($description);

        $this->addElement('submit', 'submit',
            array('ignore' => true, 'label' => 'Guardar'));
    }

    public function setArea(Areas_Area $area) {
        $this->getElement('label')->setValue($area->label);
        $this->getElement('type')->setValue($area->type);
        $this->getElement('email')->setValue($area->email);
        $this->getElement('description')->setValue($area->description);
    }

    public function getArea() {
        $area = new Areas_Area();

        $area->label = $this->getElement('label')->getValue();
        $area->type = $this->getElement('type')->getValue();
        $area->email = $this->getElement('email')->getValue();
        $area->description = $this->getElement('description')->getValue();

        return $area;
    }
}
