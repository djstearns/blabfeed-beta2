<?php
class UsercreditsController extends AppController {

	var $name = 'Usercredits';

	function index() {
		$this->Usercredit->recursive = 0;
		$this->set('usercredits', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid usercredit', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('usercredit', $this->Usercredit->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Usercredit->create();
			if ($this->Usercredit->save($this->data)) {
				$this->Session->setFlash(__('The usercredit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usercredit could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid usercredit', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Usercredit->save($this->data)) {
				$this->Session->setFlash(__('The usercredit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usercredit could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Usercredit->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for usercredit', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Usercredit->delete($id)) {
			$this->Session->setFlash(__('Usercredit deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Usercredit was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Usercredit->recursive = 0;
		$this->set('usercredits', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid usercredit', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('usercredit', $this->Usercredit->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Usercredit->create();
			if ($this->Usercredit->save($this->data)) {
				$this->Session->setFlash(__('The usercredit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usercredit could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid usercredit', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Usercredit->save($this->data)) {
				$this->Session->setFlash(__('The usercredit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usercredit could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Usercredit->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for usercredit', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Usercredit->delete($id)) {
			$this->Session->setFlash(__('Usercredit deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Usercredit was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>