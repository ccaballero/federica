<?php

abstract class Yachay_Controller_Resource extends Yachay_Controller_Action
{
    public function viewAction() {
        $adapter = new $this->_adapter();
        $resource = $this->objects[$this->_type];

        $this->view->collection = $adapter->selectAll();
        $this->view->assign(get_object_vars($resource));

        try {
            return $this->renderScript(
                'components/view-' . $this->_type . '.php');
        } catch (Exception $e) {
            return $this->renderScript('components/view.php');
        }
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

                $object = $adapter->findAdapterByUrl(
                    $this->request->getParam($this->_type));

                $reflect = new ReflectionObject($model);
                $properties = $reflect->getProperties(
                    ReflectionProperty::IS_PUBLIC);
                foreach ($properties as $property) {
                    $key = $property->getName();
                    $object->$key = $model->$key;
                }

                $object->ident = $resource->ident;
                $object->save();

                $this->_helper->flashMessenger->addMessage(
                    'El recurso ha sido actualizado correctamente');
                $this->_redirect(
                    $this->view->url(array(), $this->_route_manager));
            } else {
                $this->_helper->flashMessenger->addMessage(
                    'Se encontraron algunos errores que deben ser corregidos');
            }
        } else {
            $method = 'set' . ucfirst($this->_type);
            $form->$method($resource);
        }

        $this->view->form = $form;
        return $this->renderScript('containers/editor.php');
    }

    private function confirmRedirect($resource, $function, $vars) {
        $session = new Zend_Session_Namespace('federica');
        $session->confirm = array(
            'message' => sprintf($vars['confirm'], (string)$resource),
            'return'  => $this->view->url(
                array($this->_type => $resource->getUrl()),
                strtolower($this->_component) . '_' . $function),
        );

        $this->_redirect($this->view->url(array(), 'base_confirm'));
    }

    private function genericAction($function, $vars) {
        $resource = $this->objects[$this->_type];

        if ($this->request->isPost()) {
            $adapter = new $this->_adapter();
            $object = $adapter->findAdapterByUrl(
                $this->request->getParam($this->_type));
            $object->$function();

            $this->_helper->flashMessenger->addMessage($vars['success']);
            $this->_redirect($this->view->url(array(), $this->_route_manager));
        } else {
            $this->confirmRedirect($resource, $function, $vars);
        }
    }

    public function deleteAction() {
        $this->genericAction('delete', array(
            'confirm' => '¿Esta seguro que quiere eliminar %s?',
            'success' => 'El recurso ha sido eliminado',
        ));
    }

    public function lockAction() {
        $this->genericAction('lock', array(
            'confirm' => '¿Esta seguro que quiere deshabilitar %s?',
            'success' => 'El recurso ha sido deshabilitado',
        ));
    }

    public function unlockAction() {
        $this->genericAction('unlock', array(
            'confirm' => '¿Esta seguro que quiere habilitar %s?',
            'success' => 'El recurso ha sido habilitado',
        ));
    }
}
