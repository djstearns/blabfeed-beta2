<?php
class AdsLocationsController extends AppController {

	var $name = 'AdsLocations';

	function index() {
		$this->AdsLocation->recursive = 0;
		$this->set('adsLocations', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ads location', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('adsLocation', $this->AdsLocation->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->AdsLocation->create();
			if ($this->AdsLocation->save($this->data)) {
				$this->Session->setFlash(__('The ads location has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ads location could not be saved. Please, try again.', true));
			}
		}
		$ads = $this->AdsLocation->Ad->find('list');
		$locations = $this->AdsLocation->Location->find('list');
		$this->set(compact('ads', 'locations'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ads location', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->AdsLocation->save($this->data)) {
				$this->Session->setFlash(__('The ads location has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ads location could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AdsLocation->read(null, $id);
		}
		$ads = $this->AdsLocation->Ad->find('list');
		$locations = $this->AdsLocation->Location->find('list');
		$this->set(compact('ads', 'locations'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ads location', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->AdsLocation->delete($id)) {
			$this->Session->setFlash(__('Ads location deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ads location was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function client_index() {
		$this->AdsLocation->recursive = 0;
		$this->set('adsLocations', $this->paginate());
	}

	function client_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ads location', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('adsLocation', $this->AdsLocation->read(null, $id));
	}

	function client_add() {
		if (!empty($this->data)) {
			$this->AdsLocation->create();
			if ($this->AdsLocation->save($this->data)) {
				$this->Session->setFlash(__('The ads location has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ads location could not be saved. Please, try again.', true));
			}
		}
		$ads = $this->AdsLocation->Ad->find('list');
		$locations = $this->AdsLocation->Location->find('list');
		$this->set(compact('ads', 'locations'));
	}

	function client_editOLD($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ads location', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->AdsLocation->save($this->data)) {
				$this->Session->setFlash(__('The ads location has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ads location could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AdsLocation->read(null, $id);
		}
		$ads = $this->AdsLocation->Ad->find('list');
		$locations = $this->AdsLocation->Location->find('list');
		$this->set(compact('ads', 'locations'));
	}
	
	function client_edit($id = null) {
		//var_dump($this->data);
		$this->paginate = array(
							'group'=>	array('Ad.id'),
							
		);
		
		if (!empty($this->data)) {
			if ($this->AdsLocation->saveAll($this->data['AdsLocation'])) {
				$this->Session->setFlash(__('The ads location has been saved', true));
				$this->redirect(array('action' => 'edit'));
			} else {
				$this->Session->setFlash(__('The ads location could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			//$this->data = $this->AdsLocation->read(null, $id);
		}
		$ads = $this->AdsLocation->Ad->find('list');
		$locations = $this->AdsLocation->Location->find('list');
		$this->set(compact('ads', 'locations'));
		$this->AdsLocation->recursive = 2;
		$this->set('adsLocation', $this->paginate());
	}
	
	

	function client_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ads location', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->AdsLocation->delete($id)) {
			$this->Session->setFlash(__('Ads location deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ads location was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>