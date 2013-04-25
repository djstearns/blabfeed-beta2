<?php
class BraintreeCustomersController extends AppController {

	var $name = 'BraintreeCustomers';

	
	function admin_index() {
		$this->BraintreeCustomer->recursive = 0;
		$this->set('braintreeCustomers', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid braintree customer', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('braintreeCustomer', $this->BraintreeCustomer->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->BraintreeCustomer->create();
			if ($this->BraintreeCustomer->save($this->data)) {
				$this->Session->setFlash(__('The braintree customer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The braintree customer could not be saved. Please, try again.', true));
			}
		}
		$braintreeMerchants = $this->BraintreeCustomer->BraintreeMerchant->find('list');
		$this->set(compact('braintreeMerchants'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid braintree customer', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->BraintreeCustomer->save($this->data)) {
				$this->Session->setFlash(__('The braintree customer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The braintree customer could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->BraintreeCustomer->read(null, $id);
		}
		$braintreeMerchants = $this->BraintreeCustomer->BraintreeMerchant->find('list');
		$this->set(compact('braintreeMerchants'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for braintree customer', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->BraintreeCustomer->delete($id)) {
			$this->Session->setFlash(__('Braintree customer deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Braintree customer was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>