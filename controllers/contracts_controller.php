<?php
class ContractsController extends AppController {

	var $name = 'Contracts';

	
	function admin_index() {
		$this->Contract->recursive = 0;
		$this->set('contracts', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid contract', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('contract', $this->Contract->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Contract->create();
			if ($this->Contract->save($this->data)) {
				$this->Session->setFlash(__('The contract has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contract could not be saved. Please, try again.', true));
			}
		}
		$devices = $this->Contract->Device->find('list');
		$this->set(compact('devices'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid contract', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Contract->save($this->data)) {
				$this->Session->setFlash(__('The contract has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contract could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Contract->read(null, $id);
		}
		$devices = $this->Contract->Device->find('list');
		$this->set(compact('devices'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for contract', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Contract->delete($id)) {
			$this->Session->setFlash(__('Contract deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Contract was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function employee_index() {
		$this->Contract->recursive = 0;
		$this->set('contracts', $this->paginate());
	}

	function employee_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid contract', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('contract', $this->Contract->read(null, $id));
	}

	function employee_add() {
		if (!empty($this->data)) {
			$this->Contract->create();
			if ($this->Contract->save($this->data)) {
				$this->Session->setFlash(__('The contract has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contract could not be saved. Please, try again.', true));
			}
		}
		$devices = $this->Contract->Device->find('list');
		$this->set(compact('devices'));
	}

	function employee_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid contract', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Contract->save($this->data)) {
				$this->Session->setFlash(__('The contract has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contract could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Contract->read(null, $id);
		}
		$devices = $this->Contract->Device->find('list');
		$this->set(compact('devices'));
	}

	function employee_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for contract', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Contract->delete($id)) {
			$this->Session->setFlash(__('Contract deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Contract was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>