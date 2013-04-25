<?php
class DevicetypesController extends AppController {

	var $name = 'Devicetypes';

	
	function admin_index() {
		$this->Devicetype->recursive = 0;
		$this->set('devicetypes', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid devicetype', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('devicetype', $this->Devicetype->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Devicetype->create();
			if ($this->Devicetype->save($this->data)) {
				$this->Session->setFlash(__('The devicetype has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The devicetype could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Devicetype->User->find('list');
		$this->set(compact('users'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid devicetype', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Devicetype->save($this->data)) {
				$this->Session->setFlash(__('The devicetype has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The devicetype could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Devicetype->read(null, $id);
		}
		$users = $this->Devicetype->User->find('list');
		$this->set(compact('users'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for devicetype', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Devicetype->delete($id)) {
			$this->Session->setFlash(__('Devicetype deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Devicetype was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>