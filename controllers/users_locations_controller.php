<?php
class UsersLocationsController extends AppController {

	var $name = 'UsersLocations';
	
	var $components = array(
	'Email'
	);

	function admin_index() {
		$this->UsersLocation->recursive = 0;
		$this->set('usersLocations', $this->paginate());
	}

	function  admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid users location', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('usersLocation', $this->UsersLocation->read(null, $id));
	}

	function  admin_add() {
		if (!empty($this->data)) {
			$this->UsersLocation->create();
			if ($this->UsersLocation->save($this->data)) {
				$this->Session->setFlash(__('The users location has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The users location could not be saved. Please, try again.', true));
			}
		}
		$users = $this->UsersLocation->User->find('list');
		$locations = $this->UsersLocation->Location->find('list');
		$this->set(compact('users', 'locations'));
	}

	function  admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid users location', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->UsersLocation->save($this->data)) {
				$this->Session->setFlash(__('The users location has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The users location could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->UsersLocation->read(null, $id);
		}
		$users = $this->UsersLocation->User->find('list');
		$locations = $this->UsersLocation->Location->find('list');
		$this->set(compact('users', 'locations'));
	}

	function  admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for users location', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->UsersLocation->delete($id)) {
			$this->Session->setFlash(__('Users location deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Users location was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function client_index() {
		$this->UsersLocation->recursive = 0;
		$this->set('usersLocations', $this->paginate());
	}

	function client_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid users location', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('usersLocation', $this->UsersLocation->read(null, $id));
	}

	function client_add() {
		if (!empty($this->data)) {
			$user = $this->UsersLocation->User->findByEmail($this->data['UsersLocation']['email']);
			if(!empty($user['User'])){
				$this->data['UsersLocation']['user_id']=$user['User']['id'];
				$code = md5(uniqid());
				$this->data['UsersLocation']['invitecode']=$code;
				$this->UsersLocation->create();
				if ($this->UsersLocation->save($this->data)) {
					
						$this->Email->from = Configure::read('Site.title') . ' '
							. '<Blabfeed@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])).'>';
						$this->Email->to = $this->data['UsersLocation']['email'];
						$this->Email->subject = __('[' . Configure::read('Site.title') . '] Please activate your account', true);
						$this->Email->template = 'locationlink';
						$this->Email->sendAs = 'both';
						$this->set('code', $code);
						$this->Email->send();
						$this->Email->reset();
							
					
					
					$this->Session->setFlash(__('The users location has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The users location could not be saved. Please, try again.', true));
				}
			}else{
				$this->Session->setFlash(__('There is no user with that email, try again.', true));
			}
		}
		//$users = $this->UsersLocation->User->find('list');
		$locations = $this->UsersLocation->Location->find('list', array('conditions'=>array('user_id'=>$this->Auth->User('id'))));
		$this->set(compact('users', 'locations'));
	}
	
	function client_activate($code){
		$rec = $this->UsersLocation->findByInvitecode($code);
		//debug($rec);
		if(!empty($rec['UsersLocation'])){
			$this->UsersLocation->id = $rec['UsersLocation']['id'];
            $this->UsersLocation->saveField('active', 1);
			$this->UsersLocation->saveField('hasaccess', 1);	
			
			$this->Session->setFlash(__('You have been granted access to a location!', true));
			$this->redirect(array('controller'=>'settings','action' => 'client_dashboard'));
		}
		
	}

	function client_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid users location', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->UsersLocation->save($this->data)) {
				$this->Session->setFlash(__('The users location has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The users location could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->UsersLocation->read(null, $id);
		}
		$users = $this->UsersLocation->User->find('list');
		$locations = $this->UsersLocation->Location->find('list');
		$this->set(compact('users', 'locations'));
	}

	function client_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for users location', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->UsersLocation->delete($id)) {
			$this->Session->setFlash(__('Users location deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Users location was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>