<?php

class Rooms_RoomController extends Yachay_Controller_Action
{
    public function viewAction() {
        $url = $this->request->getParam('room');

        $adapter = new Db_Rooms();
        $element = $adapter->findByCode($url);

        $this->view->collection = $adapter->selectAll();
        $this->view->assign(get_object_vars($element));

        return $this->renderScript('components/room-view.php');
    }

    public function editAction() {
        $url = $this->request->getParam('room');

        $adapter = new Db_Rooms();
        $element = $adapter->findByCode($url);

        $this->view->assign(get_object_vars($element));

        $form = new Rooms_Form_Editor();
        $form->setRoom($element);

        $this->view->form = $form;
        return $this->renderScript('containers/editor.php');
    }
}
