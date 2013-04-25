<?php
class CouponcodesController extends AppController {

	var $name = 'Couponcodes';
	var $components = array('RequestHandler');
	
	function client_checkcode(){
		if ($this->RequestHandler->isAjax()) {
        	Configure::write('debug', 0);
			$this->layout='ajax';
    	}
		$this->autoRender = false;
    	$this->autoLayout = false;
		
		$coupon = $this->Couponcode->find('first', array('conditions'=>array('code'=>$this->params['form']['id'], 'redeemed'=>0)));
		if(empty($coupon)){
				$message = 'invalid code!';
			}else{
				$message = 'Valid code!';
			}
			return $message;
		
		
		/*{
			return json_encode($coupon['Couponcode']['amt']);
		}else{
			return false;
		}
		*/
	}

	
	function admin_index() {
		$this->Couponcode->recursive = 0;
		$this->set('couponcodes', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid couponcode', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('couponcode', $this->Couponcode->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Couponcode->create();
			if ($this->Couponcode->save($this->data)) {
				$this->Session->setFlash(__('The couponcode has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The couponcode could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Couponcode->User->find('list');
		$braintreeTransactions = $this->Couponcode->BraintreeTransaction->find('list');
		$this->set(compact('users', 'braintreeTransactions'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid couponcode', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Couponcode->save($this->data)) {
				$this->Session->setFlash(__('The couponcode has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The couponcode could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Couponcode->read(null, $id);
		}
		$users = $this->Couponcode->User->find('list');
		$braintreeTransactions = $this->Couponcode->BraintreeTransaction->find('list');
		$this->set(compact('users', 'braintreeTransactions'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for couponcode', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Couponcode->delete($id)) {
			$this->Session->setFlash(__('Couponcode deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Couponcode was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>