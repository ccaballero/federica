<?php

class Users_Form_Setting extends Zend_Form
{
    protected $_uniqueUsernameValidator = null;

    public function init() {
        $this->_uniqueUsernameValidator = new Yachay_Validator_UniqueField(new Db_Users(), 'email', true);

        $this->setMethod('post');

        $information_subform = new Zend_Form_SubForm();
        $firstname = $information_subform->createElement('text', 'firstname');
        $firstname->setRequired(true)
                  ->setLabel('Nombre (*):')
                  ->addFilter('StringTrim')
                  ->addValidator('StringLength', false, array(0, 128))
                  ->addValidator('Alpha', false, array('allowWhiteSpace' => true));
        $lastname = $information_subform->createElement('text', 'lastname');
        $lastname->setRequired(true)
                 ->setLabel('Apellido (*):')
                 ->addFilter('StringTrim')
                 ->addValidator('StringLength', false, array(0, 128))
                 ->addValidator('Alpha', false, array('allowWhiteSpace' => true));
        $phone = $information_subform->createElement('text', 'phone');
        $phone->setRequired(false)
              ->setLabel('Teléfono:')
              ->addFilter('StringTrim')
              ->addValidator('StringLength', false, array(0, 128))
              ->addValidator('Alnum', false, array('allowWhiteSpace' => true));

        $username = $information_subform->createElement('text', 'username');
        $username->setRequired(true)
                 ->setLabel('Username')
                 ->setAttrib('class', 'email')
                 ->addFilter('StringTrim')
                 ->addValidator('StringLength', false, array(0, 128))
                 ->addValidator('Alpha', false, array('allowWhiteSpace' => true))
                 ->addValidator($this->_uniqueUsernameValidator);

        $information_subform->addElement($firstname);
        $information_subform->addElement($lastname);
        $information_subform->addElement($phone);

        $password_subform = new Zend_Form_SubForm();

        $password1 = $password_subform->createElement('password', 'password1');
        $password1->setRequired(false)
                  ->setLabel('New password')
                  ->setAttrib('class', 'key')
                  ->addValidator('StringLength', false, array(6, 20));

        $password2 = $password_subform->createElement('password', 'password2');
        $password2->setRequired(false)
                  ->setLabel('Retype password')
                  ->setAttrib('class', 'key')
                  ->addValidator('Identical', false, array('token' => 'password1'));

        $password_subform->addElement($password1);
        $password_subform->addElement($password2);

        $this->addSubForms(array(
            'information' => $information_subform,
            'password' => $password_subform,
        ));
        $this->addElement('submit', 'submit', array('ignore' => true, 'label' => 'Enviar'));
    }

    public function setUser($user) {
        $this->getSubForm('information')->getElement('fullname')->setValue($user->fullname);
        $this->getSubForm('information')->getElement('username')->setValue($user->username);
        $this->_uniqueUsernameValidator->setElement($user);
    }
}
