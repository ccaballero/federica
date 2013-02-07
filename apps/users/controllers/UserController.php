<?php

class Users_UserController extends Yachay_Controller_Action
{
    public function settingsAction() {
        $form = new Users_Form_Setting();
        $this->view->form = $form;
    }
}
