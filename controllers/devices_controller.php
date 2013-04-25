<?php
class DevicesController extends AppController {

	var $name = 'Devices';

	function employee_index() {
		$this->Device->recursive = 0;
		$this->set('devices', $this->paginate());
	}

	function employee_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid device', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('device', $this->Device->read(null, $id));
	}

	function employee_add() {
		if (!empty($this->data)) {
			$this->Device->create();
			if ($this->Device->save($this->data)) {
				$this->Session->setFlash(__('The device has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The device could not be saved. Please, try again.', true));
			}
		}
		$devicetypes = $this->Device->Devicetype->find('list');
		$users = $this->Device->User->find('list');
		$contracts = $this->Device->Contract->find('list');
		$locations = $this->Device->Location->find('list');
		$orders = $this->Device->Order->find('list');
		$this->set(compact('devicetypes', 'users', 'contracts', 'locations', 'orders'));
	}

	function employee_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid device', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Device->save($this->data)) {
				$this->Session->setFlash(__('The device has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The device could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Device->read(null, $id);
		}
		$devicetypes = $this->Device->Devicetype->find('list');
		$users = $this->Device->User->find('list');
		$contracts = $this->Device->Contract->find('list');
		$locations = $this->Device->Location->find('list');
		$orders = $this->Device->Order->find('list');
		$this->set(compact('devicetypes', 'users', 'contracts', 'locations', 'orders'));
	}

	function employee_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for device', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Device->delete($id)) {
			$this->Session->setFlash(__('Device deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Device was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_index() {
		$this->Device->recursive = 0;
		$this->set('devices', $this->paginate());
	}
	
	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid device', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('device', $this->Device->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Device->create();
			if ($this->Device->save($this->data)) {
				$this->Session->setFlash(__('The device has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The device could not be saved. Please, try again.', true));
			}
		}
		$devicetypes = $this->Device->Devicetype->find('list');
		$users = $this->Device->User->find('list');
		$contracts = $this->Device->Contract->find('list');
		$locations = $this->Device->Location->find('list');
		$orders = $this->Device->Order->find('list');
		$this->set(compact('devicetypes', 'users', 'contracts', 'locations', 'orders'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid device', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Device->save($this->data)) {
				$this->Session->setFlash(__('The device has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The device could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Device->read(null, $id);
		}
		$devicetypes = $this->Device->Devicetype->find('list');
		$users = $this->Device->User->find('list');
		$contracts = $this->Device->Contract->find('list');
		$locations = $this->Device->Location->find('list');
		$orders = $this->Device->Order->find('list');
		$this->set(compact('devicetypes', 'users', 'contracts', 'locations', 'orders'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for device', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Device->delete($id)) {
			$this->Session->setFlash(__('Device deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Device was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>