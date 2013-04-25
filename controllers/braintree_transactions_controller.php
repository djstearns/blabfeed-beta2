<?php
class BraintreeTransactionsController extends AppController {

	var $name = 'BraintreeTransactions';

	function client_index() {
		$this->BraintreeTransaction->recursive = 0;
		$this->set('braintreeTransactions', $this->paginate());
	}

	function client_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid braintree transaction', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('braintreeTransaction', $this->BraintreeTransaction->read(null, $id));
	}

	function client_add() {
		if (!empty($this->data)) {
			$this->BraintreeTransaction->create();
			if ($this->BraintreeTransaction->save($this->data)) {
				$this->Session->setFlash(__('The braintree transaction has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The braintree transaction could not be saved. Please, try again.', true));
			}
		}
		$braintreeMerchants = $this->BraintreeTransaction->BraintreeMerchant->find('list');
		$braintreeCustomers = $this->BraintreeTransaction->BraintreeCustomer->find('list');
		$braintreeCreditCards = $this->BraintreeTransaction->BraintreeCreditCard->find('list');
		$braintreeTransactions = $this->BraintreeTransaction->BraintreeTransaction->find('list');
		$this->set(compact('braintreeMerchants', 'braintreeCustomers', 'braintreeCreditCards', 'braintreeTransactions'));
	}

	function client_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid braintree transaction', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->BraintreeTransaction->save($this->data)) {
				$this->Session->setFlash(__('The braintree transaction has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The braintree transaction could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->BraintreeTransaction->read(null, $id);
		}
		$braintreeMerchants = $this->BraintreeTransaction->BraintreeMerchant->find('list');
		$braintreeCustomers = $this->BraintreeTransaction->BraintreeCustomer->find('list');
		$braintreeCreditCards = $this->BraintreeTransaction->BraintreeCreditCard->find('list');
		$braintreeTransactions = $this->BraintreeTransaction->BraintreeTransaction->find('list');
		$this->set(compact('braintreeMerchants', 'braintreeCustomers', 'braintreeCreditCards', 'braintreeTransactions'));
	}

	function client_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for braintree transaction', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->BraintreeTransaction->delete($id)) {
			$this->Session->setFlash(__('Braintree transaction deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Braintree transaction was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->BraintreeTransaction->recursive = 0;
		$this->set('braintreeTransactions', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid braintree transaction', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('braintreeTransaction', $this->BraintreeTransaction->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->BraintreeTransaction->create();
			if ($this->BraintreeTransaction->save($this->data)) {
				$this->Session->setFlash(__('The braintree transaction has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The braintree transaction could not be saved. Please, try again.', true));
			}
		}
		$braintreeMerchants = $this->BraintreeTransaction->BraintreeMerchant->find('list');
		$braintreeCustomers = $this->BraintreeTransaction->BraintreeCustomer->find('list');
		$braintreeCreditCards = $this->BraintreeTransaction->BraintreeCreditCard->find('list');
		$braintreeTransactions = $this->BraintreeTransaction->BraintreeTransaction->find('list');
		$this->set(compact('braintreeMerchants', 'braintreeCustomers', 'braintreeCreditCards', 'braintreeTransactions'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid braintree transaction', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->BraintreeTransaction->save($this->data)) {
				$this->Session->setFlash(__('The braintree transaction has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The braintree transaction could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->BraintreeTransaction->read(null, $id);
		}
		$braintreeMerchants = $this->BraintreeTransaction->BraintreeMerchant->find('list');
		$braintreeCustomers = $this->BraintreeTransaction->BraintreeCustomer->find('list');
		$braintreeCreditCards = $this->BraintreeTransaction->BraintreeCreditCard->find('list');
		$braintreeTransactions = $this->BraintreeTransaction->BraintreeTransaction->find('list');
		$this->set(compact('braintreeMerchants', 'braintreeCustomers', 'braintreeCreditCards', 'braintreeTransactions'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for braintree transaction', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->BraintreeTransaction->delete($id)) {
			$this->Session->setFlash(__('Braintree transaction deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Braintree transaction was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>