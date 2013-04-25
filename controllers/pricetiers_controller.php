<?php
class PricetiersController extends AppController {

	var $name = 'Pricetiers';

	function index() {
		$this->Pricetier->recursive = 0;
		$this->set('pricetiers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pricetier', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('pricetier', $this->Pricetier->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Pricetier->create();
			if ($this->Pricetier->save($this->data)) {
				$this->Session->setFlash(__('The pricetier has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pricetier could not be saved. Please, try again.', true));
			}
		}
		$parentPricetiers = $this->Pricetier->ParentPricetier->find('list');
		$this->set(compact('parentPricetiers'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid pricetier', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Pricetier->save($this->data)) {
				$this->Session->setFlash(__('The pricetier has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pricetier could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Pricetier->read(null, $id);
		}
		$parentPricetiers = $this->Pricetier->ParentPricetier->find('list');
		$this->set(compact('parentPricetiers'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pricetier', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Pricetier->delete($id)) {
			$this->Session->setFlash(__('Pricetier deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pricetier was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		//$pricetiers = $this->Pricetier->generatetreelist(null,null,null," - ");
 		//$this->set(compact('pricetiers'));
		
		$this->Pricetier->recursive = 0;
		$this->set('pricetiers', $this->paginate());
		
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pricetier', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('pricetier', $this->Pricetier->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Pricetier->create();
			if ($this->Pricetier->save($this->data)) {
				$this->Session->setFlash(__('The pricetier has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pricetier could not be saved. Please, try again.', true));
			}
		}
		
		$pricetierlist = $this->Pricetier->generatetreelist(null,null,null," - ");
		$parents[0] = "[ No Parent ]";
		//debug($parents);
		if($pricetierlist){
			foreach ($pricetierlist as $key=>$value){
				$parents[$key] = $value;
			}
		}
		$this->set(compact('parents'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid pricetier', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Pricetier->save($this->data)) {
				$this->Session->setFlash(__('The pricetier has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pricetier could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Pricetier->read(null, $id);
		}
		$pricetierlist = $this->Pricetier->generatetreelist(null,null,null," - ");
		$parents[0] = "[ No Parent ]";
		//debug($parents);
		if($pricetierlist){
			foreach ($pricetierlist as $key=>$value){
				$parents[$key] = $value;
			}
		}
		$this->set(compact('parents'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pricetier', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Pricetier->delete($id)) {
			$this->Session->setFlash(__('Pricetier deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pricetier was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function client_index() {
		$this->Pricetier->recursive = 0;
		$this->set('pricetiers', $this->paginate());
	}

	function client_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pricetier', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('pricetier', $this->Pricetier->read(null, $id));
	}

	function client_add() {
		if (!empty($this->data)) {
			$this->Pricetier->create();
			if ($this->Pricetier->save($this->data)) {
				$this->Session->setFlash(__('The pricetier has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pricetier could not be saved. Please, try again.', true));
			}
		}
		$parentPricetiers = $this->Pricetier->ParentPricetier->find('list');
		$this->set(compact('parentPricetiers'));
	}

	function client_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid pricetier', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Pricetier->save($this->data)) {
				$this->Session->setFlash(__('The pricetier has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pricetier could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Pricetier->read(null, $id);
		}
		$parentPricetiers = $this->Pricetier->ParentPricetier->find('list');
		$this->set(compact('parentPricetiers'));
	}

	function client_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pricetier', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Pricetier->delete($id)) {
			$this->Session->setFlash(__('Pricetier deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pricetier was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>