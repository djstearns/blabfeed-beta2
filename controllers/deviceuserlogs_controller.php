<?php
class DeviceuserlogsController extends AppController {

	var $name = 'Deviceuserlogs';

	function index() {
		$this->Deviceuserlog->recursive = 0;
		$this->set('deviceuserlogs', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid deviceuserlog', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('deviceuserlog', $this->Deviceuserlog->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Deviceuserlog->create();
			if ($this->Deviceuserlog->save($this->data)) {
				$this->Session->setFlash(__('The deviceuserlog has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The deviceuserlog could not be saved. Please, try again.', true));
			}
		}
		$devices = $this->Deviceuserlog->Device->find('list');
		$contracts = $this->Deviceuserlog->Contract->find('list');
		$users = $this->Deviceuserlog->User->find('list');
		$this->set(compact('devices', 'contracts', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid deviceuserlog', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Deviceuserlog->save($this->data)) {
				$this->Session->setFlash(__('The deviceuserlog has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The deviceuserlog could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Deviceuserlog->read(null, $id);
		}
		$devices = $this->Deviceuserlog->Device->find('list');
		$contracts = $this->Deviceuserlog->Contract->find('list');
		$users = $this->Deviceuserlog->User->find('list');
		$this->set(compact('devices', 'contracts', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for deviceuserlog', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Deviceuserlog->delete($id)) {
			$this->Session->setFlash(__('Deviceuserlog deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Deviceuserlog was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Deviceuserlog->recursive = 0;
		$this->set('deviceuserlogs', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid deviceuserlog', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('deviceuserlog', $this->Deviceuserlog->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Deviceuserlog->create();
			if ($this->Deviceuserlog->save($this->data)) {
				$this->Session->setFlash(__('The deviceuserlog has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The deviceuserlog could not be saved. Please, try again.', true));
			}
		}
		$devices = $this->Deviceuserlog->Device->find('list');
		$contracts = $this->Deviceuserlog->Contract->find('list');
		$users = $this->Deviceuserlog->User->find('list');
		$this->set(compact('devices', 'contracts', 'users'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid deviceuserlog', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Deviceuserlog->save($this->data)) {
				$this->Session->setFlash(__('The deviceuserlog has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The deviceuserlog could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Deviceuserlog->read(null, $id);
		}
		$devices = $this->Deviceuserlog->Device->find('list');
		$contracts = $this->Deviceuserlog->Contract->find('list');
		$users = $this->Deviceuserlog->User->find('list');
		$this->set(compact('devices', 'contracts', 'users'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for deviceuserlog', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Deviceuserlog->delete($id)) {
			$this->Session->setFlash(__('Deviceuserlog deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Deviceuserlog was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>