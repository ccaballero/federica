<?php

class Users_User
{
    public $ident;
    public $email;
    public $password;
    public $lastname;
    public $firstname;
    public $phone;
    public $tsregister;

    public function __toString() {
        return $this->lastname . ' ' . $this->firstname;
    }
}
