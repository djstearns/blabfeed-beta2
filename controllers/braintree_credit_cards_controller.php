<?php
class BraintreeCreditCardsController extends AppController {

	var $name = 'BraintreeCreditCards';

	function client_index() {
		$this->BraintreeCreditCard->recursive = 0;
		$this->set('braintreeCreditCards', $this->paginate());
	}

	function client_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid braintree credit card', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('braintreeCreditCard', $this->BraintreeCreditCard->read(null, $id));
	}

	function client_add() {
		if (!empty($this->data)) {
			$this->BraintreeCreditCard->create();
			if ($this->BraintreeCreditCard->save($this->data)) {
				$this->Session->setFlash(__('The braintree credit card has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The braintree credit card could not be saved. Please, try again.', true));
			}
		}
		$braintreeMerchants = $this->BraintreeCreditCard->BraintreeMerchant->find('list');
		$braintreeCustomers = $this->BraintreeCreditCard->BraintreeCustomer->find('list');
		$braintreeAddresses = $this->BraintreeCreditCard->BraintreeAddress->find('list');
		$this->set(compact('braintreeMerchants', 'braintreeCustomers', 'braintreeAddresses'));
	}

	function client_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid braintree credit card', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->BraintreeCreditCard->save($this->data)) {
				$this->Session->setFlash(__('The braintree credit card has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The braintree credit card could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->BraintreeCreditCard->read(null, $id);
		}
		$braintreeMerchants = $this->BraintreeCreditCard->BraintreeMerchant->find('list');
		$braintreeCustomers = $this->BraintreeCreditCard->BraintreeCustomer->find('list');
		$braintreeAddresses = $this->BraintreeCreditCard->BraintreeAddress->find('list');
		$this->set(compact('braintreeMerchants', 'braintreeCustomers', 'braintreeAddresses'));
	}

	function client_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for braintree credit card', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->BraintreeCreditCard->delete($id)) {
			$this->Session->setFlash(__('Braintree credit card deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Braintree credit card was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->BraintreeCreditCard->recursive = 0;
		$this->set('braintreeCreditCards', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid braintree credit card', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('braintreeCreditCard', $this->BraintreeCreditCard->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->BraintreeCreditCard->create();
			if ($this->BraintreeCreditCard->save($this->data)) {
				$this->Session->setFlash(__('The braintree credit card has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The braintree credit card could not be saved. Please, try again.', true));
			}
		}
		$braintreeMerchants = $this->BraintreeCreditCard->BraintreeMerchant->find('list');
		$braintreeCustomers = $this->BraintreeCreditCard->BraintreeCustomer->find('list');
		$braintreeAddresses = $this->BraintreeCreditCard->BraintreeAddress->find('list');
		$this->set(compact('braintreeMerchants', 'braintreeCustomers', 'braintreeAddresses'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid braintree credit card', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->BraintreeCreditCard->save($this->data)) {
				$this->Session->setFlash(__('The braintree credit card has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The braintree credit card could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->BraintreeCreditCard->read(null, $id);
		}
		$braintreeMerchants = $this->BraintreeCreditCard->BraintreeMerchant->find('list');
		$braintreeCustomers = $this->BraintreeCreditCard->BraintreeCustomer->find('list');
		$braintreeAddresses = $this->BraintreeCreditCard->BraintreeAddress->find('list');
		$this->set(compact('braintreeMerchants', 'braintreeCustomers', 'braintreeAddresses'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for braintree credit card', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->BraintreeCreditCard->delete($id)) {
			$this->Session->setFlash(__('Braintree credit card deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Braintree credit card was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>