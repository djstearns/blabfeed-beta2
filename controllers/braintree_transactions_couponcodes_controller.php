<?php
class BraintreeTransactionsCouponcodesController extends AppController {

	var $name = 'BraintreeTransactionsCouponcodes';

	
	function admin_index() {
		$this->BraintreeTransactionsCouponcode->recursive = 0;
		$this->set('braintreeTransactionsCouponcodes', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid braintree transactions couponcode', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('braintreeTransactionsCouponcode', $this->BraintreeTransactionsCouponcode->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->BraintreeTransactionsCouponcode->create();
			if ($this->BraintreeTransactionsCouponcode->save($this->data)) {
				$this->Session->setFlash(__('The braintree transactions couponcode has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The braintree transactions couponcode could not be saved. Please, try again.', true));
			}
		}
		$braintreeTransactions = $this->BraintreeTransactionsCouponcode->BraintreeTransaction->find('list');
		$couponcodes = $this->BraintreeTransactionsCouponcode->Couponcode->find('list');
		$this->set(compact('braintreeTransactions', 'couponcodes'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid braintree transactions couponcode', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->BraintreeTransactionsCouponcode->save($this->data)) {
				$this->Session->setFlash(__('The braintree transactions couponcode has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The braintree transactions couponcode could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->BraintreeTransactionsCouponcode->read(null, $id);
		}
		$braintreeTransactions = $this->BraintreeTransactionsCouponcode->BraintreeTransaction->find('list');
		$couponcodes = $this->BraintreeTransactionsCouponcode->Couponcode->find('list');
		$this->set(compact('braintreeTransactions', 'couponcodes'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for braintree transactions couponcode', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->BraintreeTransactionsCouponcode->delete($id)) {
			$this->Session->setFlash(__('Braintree transactions couponcode deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Braintree transactions couponcode was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>