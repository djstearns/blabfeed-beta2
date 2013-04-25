<?php
class OrdersDevicetypesController extends AppController {

	var $name = 'OrdersDevicetypes';

	function employee_index() {
		$this->OrdersDevicetype->recursive = 0;
		$this->set('ordersDevicetypes', $this->paginate());
	}

	function employee_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid orders devicetype', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('ordersDevicetype', $this->OrdersDevicetype->read(null, $id));
		
	}

	function employee_add() {
		//debug($this->data);
		if (!empty($this->data)) {
			$this->OrdersDevicetype->create();
			if($this->OrdersDevicetype->Order->save($this->data['Order'])){	
				foreach($this->data['OrdersDevicetype'] as $i => $devicedata){
					$this->data['OrdersDevicetype'][$i]['order_id'] = $this->OrdersDevicetype->Order->getLastInsertId();
				}
				if ($this->OrdersDevicetype->saveAll($this->data['OrdersDevicetype'])) {
					$this->Session->setFlash(__('The orders devicetype has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The order could not be saved. Please, try again.', true));
				}
			}else{
				$this->Session->setFlash(__('The order could not be saved. Please, try again.', true));
			}
		}
		$orders = $this->OrdersDevicetype->Order->find('list');
		$devicetypes = $this->OrdersDevicetype->Devicetype->find('list');
		$this->set(compact('orders', 'devicetypes'));
	}

	function employee_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid orders devicetype', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->OrdersDevicetype->save($this->data)) {
				$this->Session->setFlash(__('The orders devicetype has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The orders devicetype could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->OrdersDevicetype->read(null, $id);
		}
		$orders = $this->OrdersDevicetype->Order->find('list');
		$devicetypes = $this->OrdersDevicetype->Devicetype->find('list');
		$this->set(compact('orders', 'devicetypes'));
	}

	function employee_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for orders devicetype', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->OrdersDevicetype->delete($id)) {
			$this->Session->setFlash(__('Orders devicetype deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Orders devicetype was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
		function admin_index() {
		$this->OrdersDevicetype->recursive = 0;
		$this->set('ordersDevicetypes', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid orders devicetype', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('ordersDevicetype', $this->OrdersDevicetype->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->OrdersDevicetype->create();
			if ($this->OrdersDevicetype->save($this->data)) {
				$this->Session->setFlash(__('The orders devicetype has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The orders devicetype could not be saved. Please, try again.', true));
			}
		}
		$orders = $this->OrdersDevicetype->Order->find('list');
		$devicetypes = $this->OrdersDevicetype->Devicetype->find('list');
		$this->set(compact('orders', 'devicetypes'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid orders devicetype', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->OrdersDevicetype->save($this->data)) {
				$this->Session->setFlash(__('The orders devicetype has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The orders devicetype could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->OrdersDevicetype->read(null, $id);
		}
		$orders = $this->OrdersDevicetype->Order->find('list');
		$devicetypes = $this->OrdersDevicetype->Devicetype->find('list');
		$this->set(compact('orders', 'devicetypes'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for orders devicetype', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->OrdersDevicetype->delete($id)) {
			$this->Session->setFlash(__('Orders devicetype deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Orders devicetype was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>