<?php
class ImpressionsController extends AppController {

	var $name = 'Impressions';

	function index() {
		$this->Impression->recursive = 0;
		$this->set('impressions', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid impression', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('impression', $this->Impression->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Impression->create();
			if ($this->Impression->save($this->data)) {
				$this->Session->setFlash(__('The impression has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The impression could not be saved. Please, try again.', true));
			}
		}
		$ads = $this->Impression->Ad->find('list');
		$locations = $this->Impression->Location->find('list');
		$users = $this->Impression->User->find('list');
		$this->set(compact('ads', 'locations', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid impression', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Impression->save($this->data)) {
				$this->Session->setFlash(__('The impression has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The impression could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Impression->read(null, $id);
		}
		$ads = $this->Impression->Ad->find('list');
		$locations = $this->Impression->Location->find('list');
		$users = $this->Impression->User->find('list');
		$this->set(compact('ads', 'locations', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for impression', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Impression->delete($id)) {
			$this->Session->setFlash(__('Impression deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Impression was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Impression->recursive = 0;
		$this->set('impressions', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid impression', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('impression', $this->Impression->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Impression->create();
			if ($this->Impression->save($this->data)) {
				$this->Session->setFlash(__('The impression has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The impression could not be saved. Please, try again.', true));
			}
		}
		$ads = $this->Impression->Ad->find('list');
		$locations = $this->Impression->Location->find('list');
		$users = $this->Impression->User->find('list');
		$this->set(compact('ads', 'locations', 'users'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid impression', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Impression->save($this->data)) {
				$this->Session->setFlash(__('The impression has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The impression could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Impression->read(null, $id);
		}
		$ads = $this->Impression->Ad->find('list');
		$locations = $this->Impression->Location->find('list');
		$users = $this->Impression->User->find('list');
		$this->set(compact('ads', 'locations', 'users'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for impression', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Impression->delete($id)) {
			$this->Session->setFlash(__('Impression deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Impression was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>