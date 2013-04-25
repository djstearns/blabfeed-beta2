<?php
class BraintreeSubscriptionsController extends AppController {

	var $name = 'BraintreeSubscriptions';

	function client_index($ccid=null) {
		if (!$ccid) {
			$this->Session->setFlash(__('Invalid braintree subscription', true));
			$this->redirect(array('action' => 'client_edit', 'controller'=>'users'));
		}
		$this->BraintreeSubscription->recursive = 1;
		$this->paginate = array('conditions'=>array('braintree_credit_card_id'=>$ccid));//$this->Auth->User('email')));
		$this->set('braintreeSubscriptions', $this->paginate());
	}

	function client_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid braintree subscription', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('braintreeSubscription', $this->BraintreeSubscription->read(null, $id));
	}
	
	function charge(){
		$manualsubs = $this->BraintreeSubscription->find('all', array('conditions'=>array('type'=>'manual', 'status'=>'active', 'billingDayOfMonth'=>date('d'), 'paidThroughDate <='=>date('Y-m-d'), 'billingPeriodEndDate >'=>date('Y-m-d'))));
		
		$this->loadModel('Braintree.BraintreeCustomer');
		$this->loadModel('Braintree.BraintreeCreditCard');	
		foreach($manualsubs as $sub){
			
			$btcustomer = $this->BraintreeCustomer->getOrCreateCustomerId(
					 'User', // A model in your app that you want to associate the Braintree customer with
					 $userid // A foreign_id in your app that you want to associate the Braintree customer with
			);
			
			$btcc = $this->BraintreeCreditCard->find('first', array('conditions'=>array('BraintreeCreditCard.braintree_customer_id'=>$btcustomer)));
		
			$result = ClassRegistry::init('BraintreeTransaction')->save(array(
				 'BraintreeTransaction' => array(
					   'braintree_customer_id' => $sub['BraintreeSubscription']['braintree_customer_id'],
					   'braintree_credit_card_id' => $btcc['BraintreeSubscription']['braintree_credit_card_id'],
					   'model' => 'BraintreeSubscription', // A model in your app that you want to associate the Braintree vault record with
					   'foreign_id' => $sub['BraintreeSubscription']['id'], // A foreign_id in your app that you want to associate the Braintree transaction with
					   'type' => 'sale',
					   'amount' => $sub['BraintreeSubscription']['amount']
				 )
			));
		}
	}

	function client_add() {
		if (!empty($this->data)) {
			$this->BraintreeSubscription->create();
			if ($this->BraintreeSubscription->save($this->data)) {
				$this->Session->setFlash(__('The braintree subscription has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The braintree subscription could not be saved. Please, try again.', true));
			}
		}
		$braintreeMerchants = $this->BraintreeSubscription->BraintreeMerchant->find('list');
		$braintreeCustomers = $this->BraintreeSubscription->BraintreeCustomer->find('list');
		$braintreeCreditCards = $this->BraintreeSubscription->BraintreeCreditCard->find('list');
		$braintreeTransactions = $this->BraintreeSubscription->BraintreeTransaction->find('list');
		$this->set(compact('braintreeMerchants', 'braintreeCustomers', 'braintreeCreditCards', 'braintreeTransactions'));
	}

	function client_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid braintree subscription', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->BraintreeSubscription->save($this->data)) {
				$this->Session->setFlash(__('The braintree subscription has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The braintree subscription could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->BraintreeSubscription->read(null, $id);
		}
		$braintreeMerchants = $this->BraintreeSubscription->BraintreeMerchant->find('list');
		$braintreeCustomers = $this->BraintreeSubscription->BraintreeCustomer->find('list');
		$braintreeCreditCards = $this->BraintreeSubscription->BraintreeCreditCard->find('list');
		$braintreeTransactions = $this->BraintreeSubscription->BraintreeTransaction->find('list');
		$this->set(compact('braintreeMerchants', 'braintreeCustomers', 'braintreeCreditCards', 'braintreeTransactions'));
		$this->set('subscription', $this->data);
	}

	function client_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for braintree subscription', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->data['BraintreeSubscription']['id'] = $id;
		$this->data['BraintreeSubscription']['status'] = 'Canceled';
		
		if ($this->BraintreeSubscription->save($this->data)) {
			$this->Session->setFlash(__('Braintree subscription cancelled', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Braintree subscription was not canceled', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->BraintreeSubscription->recursive = 0;
		$this->set('braintreeSubscriptions', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid braintree subscription', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('braintreeSubscription', $this->BraintreeSubscription->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->BraintreeSubscription->create();
			if ($this->BraintreeSubscription->save($this->data)) {
				$this->Session->setFlash(__('The braintree subscription has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The braintree subscription could not be saved. Please, try again.', true));
			}
		}
		$braintreeMerchants = $this->BraintreeSubscription->BraintreeMerchant->find('list');
		$braintreeCustomers = $this->BraintreeSubscription->BraintreeCustomer->find('list');
		$braintreeCreditCards = $this->BraintreeSubscription->BraintreeCreditCard->find('list');
		$braintreeTransactions = $this->BraintreeSubscription->BraintreeTransaction->find('list');
		$this->set(compact('braintreeMerchants', 'braintreeCustomers', 'braintreeCreditCards', 'braintreeTransactions'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid braintree subscription', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->BraintreeSubscription->save($this->data)) {
				$this->Session->setFlash(__('The braintree subscription has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The braintree subscription could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->BraintreeSubscription->read(null, $id);
		}
		$braintreeMerchants = $this->BraintreeSubscription->BraintreeMerchant->find('list');
		$braintreeCustomers = $this->BraintreeSubscription->BraintreeCustomer->find('list');
		$braintreeCreditCards = $this->BraintreeSubscription->BraintreeCreditCard->find('list');
		$braintreeTransactions = $this->BraintreeSubscription->BraintreeTransaction->find('list');
		$this->set(compact('braintreeMerchants', 'braintreeCustomers', 'braintreeCreditCards', 'braintreeTransactions'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for braintree subscription', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->BraintreeSubscription->delete($id)) {
			$this->Session->setFlash(__('Braintree subscription deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Braintree subscription was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>