<?php

abstract class Yachay_Controller_Resource extends Yachay_Controller_Action
{
    public function viewAction() {
        $adapter = new $this->_adapter();
        $resource = $this->objects[$this->_type];

        $this->view->collection = $adapter->selectAll();
        $this->view->assign(get_object_vars($resource));

        return $this->renderScript('components/' . $this->_type . '-view.php');
    }

    public function editAction() {
        $adapter = new $this->_adapter();
        $resource = $this->objects[$this->_type];

        $this->view->assign(get_object_vars($resource));

        $form = new $this->_editor();

        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost())) {
                $method = 'get' . ucfirst($this->_type);
                $model = $form->$method();

                $object = $adapter->findAdapterByUrl($this->request->getParam($this->_type));

                $reflect = new ReflectionObject($model);
                $properties = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);
                foreach ($properties as $property) {
                    $key = $property->getName();
                    $object->$key = $model->$key;
                }

                $object->save();

                $this->_helper->flashMessenger->addMessage('El recurso ha sido actualizado correctamente');
                $this->_redirect($this->view->url(array(), $this->_route_manager));
            } else {
                $this->_helper->flashMessenger->addMessage('Se encontraron algunos errores que deben ser corregidos');
            }
        } else {
            $method = 'set' . ucfirst($this->_type);
            $form->$method($resource);
        }

        $this->view->form = $form;
        return $this->renderScript('containers/editor.php');
    }

    public function deleteAction() {
        $resource = $this->objects[$this->_type];

        if ($this->request->isPost()) {
            $adapter = new $this->_adapter();
            $object = $adapter->findAdapterByUrl($this->request->getParam($this->_type));
            $object->delete();

            $this->_helper->flashMessenger->addMessage("El recuroso ha sido deshabilitado");
            $this->_redirect($this->view->url(array(), $this->_route_manager));
        } else {
            $session = new Zend_Session_Namespace('pueblo');
            $session->confirm = array(
                'message' => '¿Esta seguro que quiere eliminar ' . (string)$resource . '?',
                'return'  => $this->view->url(array($this->_type => $resource->getUrl()), strtolower($this->_component) . '_delete'),
            );

            $this->_redirect($this->view->url(array(), 'base_confirm'));
        }
    }
}
