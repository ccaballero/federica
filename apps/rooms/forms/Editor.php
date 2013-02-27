<?php

class Rooms_Form_Editor extends Zend_Form
{
    public function init() {
        $this->setMethod('post');

        $code = $this->createElement('text', 'code');
        $code->setRequired(true)
            ->setLabel('Código (*):')
            ->setAttrib('class', 'focus')
            ->addFilter('StringTrim')
            ->addValidator('StringLength', false, array(1, 8));

        $label = $this->createElement('text', 'label');
        $label->setRequired(true)
            ->setLabel('Nombre (*):')
            ->addFilter('StringTrim')
            ->addValidator('StringLength', false, array(4, 128));

        $type = $this->createElement('select', 'type');
        $type->setRequired(true)
            ->setLabel('Modalidad de reserva (*):')
            ->setMultiOptions(array(
                'A' => 'Reservable por dias',
                'T' => 'Reservable por turnos',
                'N' => 'No reservable',
            ));

        $general_purpose = $this->createElement('textarea', 'general_purpose');
        $general_purpose->setRequired(false)
            ->setLabel('Uso general:')
            ->addFilter('StringTrim')
            ->addFilter('StripTags');

        $compatible_purpose = $this->createElement('textarea', 'compatible_purpose');
        $compatible_purpose->setRequired(false)
            ->setLabel('Uso compatible:')
            ->addFilter('StringTrim')
            ->addFilter('StripTags');

        $current_purpose = $this->createElement('textarea', 'current_purpose');
        $current_purpose->setRequired(false)
            ->setLabel('Uso actual:')
            ->addFilter('StringTrim')
            ->addFilter('StripTags');

        $capacity = $this->createElement('textarea', 'capacity');
        $capacity->setRequired(false)
            ->setLabel('Capacidad:')
            ->addFilter('StringTrim')
            ->addFilter('StripTags');

        $description = $this->createElement('textarea', 'description');
        $description->setRequired(false)
            ->setLabel('Descripción:')
            ->setAttrib('class', 'ckeditor')
            ->addFilter('StringTrim');

        $this->addElement($code);
        $this->addElement($label);
        $this->addElement($type);
        $this->addElement($general_purpose);
        $this->addElement($compatible_purpose);
        $this->addElement($current_purpose);
        $this->addElement($capacity);
        $this->addElement($description);

        $this->addElement('submit', 'submit', array('ignore' => true, 'label' => 'Guardar'));
    }

    public function setRoom(Rooms_Room $room) {
        $this->getElement('code')->setValue($room->code);
        $this->getElement('label')->setValue($room->label);
        $this->getElement('type')->setValue($room->type);
        $this->getElement('general_purpose')->setValue($room->general_purpose);
        $this->getElement('compatible_purpose')->setValue($room->compatible_purpose);
        $this->getElement('current_purpose')->setValue($room->current_purpose);
        $this->getElement('capacity')->setValue($room->capacity);
        $this->getElement('description')->setValue($room->description);
    }

    public function getRoom() {
        $room = new Rooms_Room();

        $room->code = $this->getElement('code')->getValue();
        $room->label = $this->getElement('label')->getValue();
        $room->type = $this->getElement('type')->getValue();
        $room->description = $this->getElement('description')->getValue();
        $room->general_purpose = $this->getElement('general_purpose')->getValue();
        $room->compatible_purpose = $this->getElement('compatible_purpose')->getValue();
        $room->current_purpose = $this->getElement('current_purpose')->getValue();
        $room->capacity = $this->getElement('capacity')->getValue();

        return $room;
    }
}
