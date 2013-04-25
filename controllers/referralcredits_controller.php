<?php
class ReferralcreditsController extends AppController {

	var $name = 'Referralcredits';

	function index() {
		$this->Referralcredit->recursive = 0;
		$this->set('referralcredits', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid referralcredit', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('referralcredit', $this->Referralcredit->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Referralcredit->create();
			if ($this->Referralcredit->save($this->data)) {
				$this->Session->setFlash(__('The referralcredit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The referralcredit could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Referralcredit->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid referralcredit', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Referralcredit->save($this->data)) {
				$this->Session->setFlash(__('The referralcredit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The referralcredit could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Referralcredit->read(null, $id);
		}
		$users = $this->Referralcredit->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for referralcredit', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Referralcredit->delete($id)) {
			$this->Session->setFlash(__('Referralcredit deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Referralcredit was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Referralcredit->recursive = 0;
		$this->set('referralcredits', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid referralcredit', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('referralcredit', $this->Referralcredit->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Referralcredit->create();
			if ($this->Referralcredit->save($this->data)) {
				$this->Session->setFlash(__('The referralcredit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The referralcredit could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Referralcredit->User->find('list');
		$this->set(compact('users'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid referralcredit', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Referralcredit->save($this->data)) {
				$this->Session->setFlash(__('The referralcredit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The referralcredit could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Referralcredit->read(null, $id);
		}
		$users = $this->Referralcredit->User->find('list');
		$this->set(compact('users'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for referralcredit', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Referralcredit->delete($id)) {
			$this->Session->setFlash(__('Referralcredit deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Referralcredit was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>