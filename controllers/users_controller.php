<?php
/**
 * Users Controller
 *
 * PHP version 5
 *
 * @category Controller
 * @package  Croogo
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class UsersController extends AppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
    public $name = 'Users';
/**
 * Components
 *
 * @var array
 * @access public
 */
    public $components = array(
        'Email',
		'Braintree.BraintreeCallback' => array(
			'callback_actions' => array(
				'client_addcc' => array( // The name of the action you'd like the BraintreeCallback component to watch for incoming Braintree data
					'redirect' => array( // The URL you'd like to redirect to after successfully storing the vault token
						'action' => 'client_edit'
					)
				)
			)
		)
    );
/**
 * Models used by the Controller
 *
 * @var array
 * @access public
 */
    public $uses = array('User');
	
	public $helpers = array('Braintree.BraintreeTransparentRedirect');

    public function beforeFilter() {
        parent::beforeFilter();
		Configure::write('userinfo',$this->Auth->User('id'));
        if (in_array($this->params['action'], array('admin_login', 'login'))) {
            $field = $this->Auth->fields['username'];
            if (!empty($this->data) && empty($this->data['User'][$field])) {
                $this->redirect(array('action' => $this->params['action']));
            }
            $cacheName = 'auth_failed_' . $this->data['User'][$field];
            if (Cache::read($cacheName, 'users_login') >= Configure::read('User.failed_login_limit')) {
                $this->Session->setFlash(__('You have reached maximum limit for failed login attempts. Please try again after a few minutes.', true), 'default', array('class' => 'error'));
                $this->redirect(array('action' => $this->params['action']));
            }
        }
		
		$merchant_id = 'b2j6h9by5vknfhvv'; // the merchant ID you want to use  
		$braintree_configs = ClassRegistry::init('Braintree.BraintreeMerchant')->find('first', array(  
			 'conditions' => array(  
				  'BraintreeMerchant.id' => $merchant_id  
			 ),  
			 'contain' => false  
		));  
		BraintreeConfig::set(array(  
			'merchantId' => $merchant_id,  
			'publicKey' => 's8tm2vfrttp85cyw',  
			'privateKey' => '457b3e7acdb5cfb8e941fc19673fb0f0',
			'environment' => 'production' // 'sandbox' or 'production'
		));  
		// you other stuff here.. 

	
    }

    public function beforeRender() {
        parent::beforeRender();

        if (in_array($this->params['action'], array('admin_login', 'login'))) {
            if (!empty($this->data)) {
                $field = $this->Auth->fields['username'];
                $cacheName = 'auth_failed_' . $this->data['User'][$field];
                $cacheValue = Cache::read($cacheName, 'users_login');
                Cache::write($cacheName, (int)$cacheValue + 1, 'users_login');
            }
        }
    }

    public function admin_index() {
        $this->set('title_for_layout', __('Users', true));

        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function admin_add() {
        if (!empty($this->data)) {
            $this->User->create();
            $this->data['User']['activation_key'] = md5(uniqid());
            if ($this->User->save($this->data)) {
                $this->Session->setFlash(__('The User has been saved', true), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The User could not be saved. Please, try again.', true), 'default', array('class' => 'error'));
                unset($this->data['User']['password']);
            }
        } else {
            $this->data['User']['role_id'] = 2; // default Role: Registered
        }
        $roles = $this->User->Role->find('list');
        $this->set(compact('roles'));
    }

    public function admin_edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid User', true), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->User->save($this->data)) {
                $this->Session->setFlash(__('The User has been saved', true), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The User could not be saved. Please, try again.', true), 'default', array('class' => 'error'));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->User->read(null, $id);
        }
        $roles = $this->User->Role->find('list');
        $this->set(compact('roles'));
    }

    public function admin_reset_password($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid User', true), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            $user = $this->User->findById($id);
            if ($user['User']['password'] == Security::hash($this->data['User']['current_password'], null, true)) {
                if ($this->User->save($this->data)) {
                    $this->Session->setFlash(__('Password has been reset.', true), 'default', array('class' => 'success'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('Password could not be reset. Please, try again.', true), 'default', array('class' => 'error'));
                }
            } else {
                $this->Session->setFlash(__('Current password did not match. Please, try again.', true), 'default', array('class' => 'error'));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->User->read(null, $id);
        }
    }
	
	 public function client_reset_password($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid User', true), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            $user = $this->User->findById($id);
            if ($user['User']['password'] == Security::hash($this->data['User']['current_password'], null, true)) {
                if ($this->User->save($this->data)) {
                    $this->Session->setFlash(__('Password has been reset.', true), 'default', array('class' => 'success'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('Password could not be reset. Please, try again.', true), 'default', array('class' => 'error'));
                }
            } else {
                $this->Session->setFlash(__('Current password did not match. Please, try again.', true), 'default', array('class' => 'error'));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->User->read(null, $id);
        }
    }
	
	public function	client_addcc(){
		$this->loadModel('Braintree.BraintreeCustomer');	
		$user = $this->Auth->User(); 
		if (!empty($this->BraintreeCallback->braintree_error)) {
			//debug('error');
			 $this->Session->setFlash(
				  nl2br($this->BraintreeCallback->braintree_error),
				  'error'
			 );
			 $this->redirect(array('action' => $this->params['action']));
		} 
		//set or create customer id
	
		$braintree_customer_id = $this->BraintreeCustomer->getOrCreateCustomerId(
			 'User', // A model in your app that you want to associate the Braintree customer with
			 $user['User']['id'], // A foreign_id in your app that you want to associate the Braintree customer with
			 array(
				 'first_name' => $user['User']['username'],
				 'email' => $user['User']['email'],
			 )
		 );
		 $userid = $this->Auth->User('id');
		$this->set(compact('user', 'ad','braintree_customer_id', 'userid'));
		
		
	}
	
	 public function employee_reset_password($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid User', true), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            $user = $this->User->findById($id);
            if ($user['User']['password'] == Security::hash($this->data['User']['current_password'], null, true)) {
                if ($this->User->save($this->data)) {
                    $this->Session->setFlash(__('Password has been reset.', true), 'default', array('class' => 'success'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('Password could not be reset. Please, try again.', true), 'default', array('class' => 'error'));
                }
            } else {
                $this->Session->setFlash(__('Current password did not match. Please, try again.', true), 'default', array('class' => 'error'));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->User->read(null, $id);
        }
    }
	
	 public function client_sendmessage($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid User', true), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
			//debug($this->data);
			$touser = $this->User->read(null, $id);
			$this->Email->to = $touser['User']['email'];
			$this->Email->bcc = $this->data['message']['CC_email']; //array('secret@example.com');
			$this->Email->subject =  $this->data['message']['title'];;
			$this->Email->replyTo = $this->Auth->User('email');
			$this->Email->from =  $this->Auth->User('name').' <@blabfeed.com>';
			//$this->Email->template = 'simple_message'; // note no '.ctp'
			//Send as 'html', 'text' or 'both' (default is 'text')
			$this->Email->sendAs = 'both'; // because we like to send pretty mail
			//Set view variables as normal
			
			//Do not pass any args to send()
			$this->Email->send($this->data['message']['body']);
        }
        if (empty($this->data)) {
            $this->data = $this->User->read(null, $id);
        }
		$this->set('user', $id);
    }
	
    public function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for User', true), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
        if (!isset($this->params['named']['token']) || ($this->params['named']['token'] != $this->params['_Token']['key'])) {
            $blackHoleCallback = $this->Security->blackHoleCallback;
            $this->$blackHoleCallback();
        }
        if ($this->User->delete($id)) {
            $this->Session->setFlash(__('User deleted', true), 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
    }

    public function admin_login() {
        $this->set('title_for_layout', __('Admin Login', true));
        $this->layout = "admin_login";
    }

    public function admin_logout() {
        $this->Session->setFlash(__('Log out successful.', true), 'default', array('class' => 'success'));
        $this->redirect($this->Auth->logout());
    }

	 public function client_login() {
        $this->set('title_for_layout', __('Client Login', true));
        $this->layout = "admin_login";
		//$this->redirect(array('controller'=>'settings','action'=>'dashboard'));
    }
	
	public function employee_login() {
        $this->set('title_for_layout', __('Client Login', true));
        $this->layout = "admin_login";
		//$this->redirect(array('controller'=>'settings','action'=>'employee_dashboard'));
    }

    public function client_logout() {
        $this->Session->setFlash(__('Log out successful.', true), 'default', array('class' => 'success'));
        $this->redirect($this->Auth->logout());
    }
	
	 public function employee_logout() {
        $this->Session->setFlash(__('Log out successful.', true), 'default', array('class' => 'success'));
        $this->redirect($this->Auth->logout());
    }

    public function index() {
        $this->set('title_for_layout', __('Users', true));
    }
	
	public function client_index() {
		$this->set('title_for_layout', __('Users', true));
		
    }
	
	public function employee_index() {
		$this->set('title_for_layout', __('Users', true));
		
    }

    public function add($name=null, $id=null) {
		$this->layout = 'blank';
        $this->set('title_for_layout', __('Register', true));
        if (!empty($this->data)) {
            $this->User->create();
            $this->data['User']['role_id'] = 4; // Registered
            $this->data['User']['activation_key'] = md5(uniqid());
            $this->data['User']['status'] = 0;
            $this->data['User']['username'] = htmlspecialchars($this->data['User']['username']);
            //$this->data['User']['website'] = htmlspecialchars($this->data['User']['website']);
            //$this->data['User']['name'] = htmlspecialchars($this->data['User']['name']);
            if ($this->User->save($this->data)) {
				
				$this->Email->smtpOptions = array(
					 'port'=>'465',
					 'timeout'=>'30',
					 'host' => 'ssl://smtp.gmail.com',
					 'username'=>'blabfeed@gmail.com',
					 'password'=>'Bl@binc1',
				);
				
				$this->data['User']['password'] = null;
                $this->Email->from = 'blabfeed@gmail.com';
                $this->Email->to = $this->data['User']['email'];
                $this->Email->subject = __('[' . Configure::read('Site.title') . '] Please activate your account', true);
                $this->Email->template = 'register';
				$this->Email->sendAs = 'both';
                $this->set('user', $this->data);
                $this->Email->send();
				$this->Email->reset();

				
				/*
                $this->data['User']['password'] = null;
                $this->Email->from = Configure::read('Site.title') . ' '
                    . '<Blabfeed@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])).'>';
                $this->Email->to = $this->data['User']['email'];
                $this->Email->subject = __('[' . Configure::read('Site.title') . '] Please activate your account', true);
                $this->Email->template = 'register';
				$this->Email->sendAs = 'both';
                $this->set('user', $this->data);
                $this->Email->send();
				$this->Email->reset();
				
                $this->Email->from = Configure::read('Site.title') . ' '
                    . '<Blabfeed@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])).'>';
                $this->Email->to = 'info@blabfeed.com';
                $this->Email->subject = __('[' . Configure::read('Site.title') . '] A user has signed up!', true);
                $this->Email->template = 'admin_usersignedup';
				$this->Email->sendAs = 'both';
                $this->set('user', $this->data);
                $this->Email->send();

                $this->Session->setFlash(__('You have successfully registered an account. An email has been sent with further instructions.', true), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'login'));
				*/
            } else {
                $this->Session->setFlash(__('The User could not be saved. Please, try again.', true), 'default', array('class' => 'error'));
            }
        }
    }
	
	public function addref($id=null) {
		$this->layout = 'ref_login';
        $this->set('title_for_layout', __('Register', true));
		//debug($id);
        if (!empty($this->data)) {
			
            $this->User->create();
			
			//debug($this->data);
            $this->data['User']['role_id'] = 4; // Registered
            $this->data['User']['activation_key'] = md5(uniqid());
            $this->data['User']['status'] = 0;
            $this->data['User']['username'] = htmlspecialchars($this->data['User']['username']);
            //$this->data['User']['website'] = htmlspecialchars($this->data['User']['website']);
            //$this->data['User']['name'] = htmlspecialchars($this->data['User']['name']);
            if ($this->User->save($this->data)) {
                $this->data['User']['password'] = null;
                $this->Email->from = Configure::read('Site.title') . ' '
                    . '<Blabfeed@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])).'>';
                $this->Email->to = $this->data['User']['email'];
                $this->Email->subject = __('[' . Configure::read('Site.title') . '] Please activate your account', true);
                $this->Email->template = 'register';
				$this->Email->sendAs = 'both';
                $this->set('user', $this->data);
                $this->Email->send();
				$this->Email->reset();
				
                $this->Email->from = Configure::read('Site.title') . ' '
                    . '<Blabfeed@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])).'>';
                $this->Email->to = 'info@blabfeed.com';
                $this->Email->subject = __('[' . Configure::read('Site.title') . '] A user has signed up!', true);
                $this->Email->template = 'admin_usersignedup';
				$this->Email->sendAs = 'both';
                $this->set('user', $this->data);
                $this->Email->send();

                $this->Session->setFlash(__('You have successfully registered an account. An email has been sent with further instructions.', true), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'login'));
            } else {
                $this->Session->setFlash(__('The User could not be saved. Please, try again.', true), 'default', array('class' => 'error'));
            }
        }
		$this->set('id',$id);
    }

     public function activate($username = null, $key = null) {
        if ($username == null || $key == null) {
            $this->redirect(array('action' => 'login'));
        }

        if ($this->User->hasAny(array(
                'User.username' => $username,
                'User.activation_key' => $key,
                'User.status' => 0,
            ))) {
            $user = $this->User->findByUsername($username);
            $this->User->id = $user['User']['id'];
            $this->User->saveField('status', 1);
            $this->User->saveField('activation_key', md5(uniqid()));
				//welcome email
			
                $this->Email->from = Configure::read('Site.title') . ' '
                    . '<Blabfeed@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])).'>';
                $this->Email->to = $user['User']['email'];
                $this->Email->subject = __('[' . Configure::read('Site.title') . '] Ahoy! Welcome to blabfeed', true);
                $this->Email->template = 'welcome';
				$this->Email->sendAs = 'both';
                $this->set('user', $this->data);
                $this->Email->send();
				$this->Email->reset();
			
				$this->loadModel('Usercredit');
				$this->loadModel('Referralcredit');
				//debug($refuser);
				$usercreditamt = $this->Usercredit->findByType('signup');
				$creditamt = $usercreditamt['Usercredit']['amt'];
				if($creditamt !=0){
				//search for created credit
					$existingrefrecord = $this->Referralcredit->find('first', array('conditions'=>array('user_id'=>$this->User->id,'usercredits_id'=>$usercreditamt['Usercredit']['id'])));
					
					if(empty($existingrefrecord['Referralcredit'])){
						//debug('not empty');
						//debug($record);
						$this->Referralcredit->create();
						$refdata = array('Referralcredit'=>array('user_id'=>$this->User->id,'amt'=>$creditamt,'used'=>0,'usercredits_id'=>$usercreditamt['Usercredit']['id']));
						if($this->Referralcredit->save($refdata)){
							
						}else{
							//$this->Session->setFlash(__('Referral not saved.', true));
						}
					}else{
						//$this->Session->setFlash(__('Existing referral.', true));
					}
				}
				$usercreditamt = $this->Usercredit->findByType('referral');
				$creditamt = $usercreditamt['Usercredit']['amt'];
				if($creditamt !=0){
					$referringuser = $this->Auth->User('userrefid');
					//debug($record);
					if($referringuser!=0){
						$this->Referralcredit->create();
						$refdata = array('Referralcredit'=>array('user_id'=>$referringuser,'referralid'=>$this->Auth->User('id'), 'amt'=>$creditamt,'used'=>0,'usercredits_id'=>$usercreditamt['Usercredit']['id']));
						if($this->Referralcredit->save($refdata)){
							$this->Session->setFlash(__('Referral saved.', true));
						}else{
							$this->Session->setFlash(__('Referral not saved.', true));
						}
						
					}
				}
					
			
			
            $this->Session->setFlash(__('Account activated successfully.', true), 'default', array('class' => 'success'));
			$this->Auth->login($user);
			$this->redirect(array('client'=>true,'controller'=>'settings','action' => 'client_dashboard'));
        } else {
            $this->Session->setFlash(__('An error occurred.', true), 'default', array('class' => 'error'));
			$this->redirect(array('action' => 'login'));
        }

        $this->redirect(array('action' => 'login'));
    }


	

    public function client_edit($id = null) {
		
		if(!$id || $id == null){
			$id=$this->Auth->User('id');
			//$this->data =  $this->User->read(null, $id);
		}
        if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid User', true), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
		}
		
		if( $id<>$this->Auth->User('id')) {
            $this->Session->setFlash(__('Invalid User', true), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
		
		
		$userid = $this->Auth->User('id');
		$this->loadModel('Braintree.BraintreeCustomer');
		$this->loadModel('Braintree.BraintreeCreditCard');
		//$this->loadModel('Braintree.BraintreeCreditCard');
		
		$btcustomer = $this->BraintreeCustomer->getOrCreateCustomerId(
				 'User', // A model in your app that you want to associate the Braintree customer with
				 $userid // A foreign_id in your app that you want to associate the Braintree customer with
		);
		
		$btcc = $this->BraintreeCreditCard->find('all', array('conditions'=>array('BraintreeCreditCard.braintree_customer_id'=>$btcustomer)));
		//debug($btcc);
        if (!empty($this->data)) {
            if ($this->User->save($this->data)) {
                $this->Session->setFlash(__('The User has been saved', true), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The User could not be saved. Please, try again.', true), 'default', array('class' => 'error'));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->User->read(null, $id);
        }
		$userid = $id;
        $roles = $this->User->Role->find('list');
        $this->set(compact('roles','userid','btcc', 'btcustomer'));
    }
	
	public function add_card(){
		
	}
	
	public function employee_edit($id = null) {
		if(!$id || $id == null){
			$id=$this->Auth->User('id');
			//$this->data =  $this->User->read(null, $id);
		}
        if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid User', true), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
		}
		
		if( $id<>$this->Auth->User('id')) {
            $this->Session->setFlash(__('Invalid User', true), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
		
        if (!empty($this->data)) {
            if ($this->User->save($this->data)) {
                $this->Session->setFlash(__('The User has been saved', true), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The User could not be saved. Please, try again.', true), 'default', array('class' => 'error'));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->User->read(null, $id);
        }
		$userid = $id;
        $roles = $this->User->Role->find('list');
        $this->set(compact('roles','userid'));
    }

    public function edit($id = null) {
		if(!$id || $id == null){
			$id=$this->Auth->User('id');
			//$this->data =  $this->User->read(null, $id);
		}
        if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid User', true), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
		}
		
		if( $id<>$this->Auth->User('id')) {
            $this->Session->setFlash(__('Invalid User', true), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));
        }
		
        if (!empty($this->data)) {
            if ($this->User->save($this->data)) {
                $this->Session->setFlash(__('The User has been saved', true), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The User could not be saved. Please, try again.', true), 'default', array('class' => 'error'));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->User->read(null, $id);
        }
		$userid = $id;
        $roles = $this->User->Role->find('list');
        $this->set(compact('roles','userid'));
    }
	
    public function client_forgot() {
		
        $this->set('title_for_layout', __('Forgot Password', true));

        if (!empty($this->data) && isset($this->data['User']['username'])) {
            $user = $this->User->findByUsername($this->data['User']['username']);
            if (!isset($user['User']['id'])) {
                $this->Session->setFlash(__('Invalid username.', true), 'default', array('class' => 'error'));
                $this->redirect(array('action' => 'login'));
            }

            $this->User->id = $user['User']['id'];
            $activationKey = md5(uniqid());
            $this->User->saveField('activation_key', $activationKey);
            $this->set(compact('user', 'activationKey'));

            $this->Email->from = Configure::read('Site.title') . ' '
                    . '<Blabfeed@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])).'>';
            $this->Email->to = $user['User']['email'];
            $this->Email->subject = '[' . Configure::read('Site.title') . '] ' . __('Reset Password', true);
            $this->Email->template = 'forgot_password';
            if ($this->Email->send()) {
                $this->Session->setFlash(__('An email has been sent with instructions for resetting your password.', true), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'login'));
            } else {
                $this->Session->setFlash(__('An error occurred. Please try again.', true), 'default', array('class' => 'error'));
            }
        }
    }
	
	public function forgot() {
		
        $this->set('title_for_layout', __('Forgot Password', true));

        if (!empty($this->data) && isset($this->data['User']['username'])) {
            $user = $this->User->findByUsername($this->data['User']['username']);
            if (!isset($user['User']['id'])) {
                $this->Session->setFlash(__('Invalid username.', true), 'default', array('class' => 'error'));
                $this->redirect(array('action' => 'login'));
            }

            $this->User->id = $user['User']['id'];
            $activationKey = md5(uniqid());
            $this->User->saveField('activation_key', $activationKey);
            $this->set(compact('user', 'activationKey'));

            $this->Email->from = Configure::read('Site.title') . ' '
                    . '<Blabfeed@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])).'>';
            $this->Email->to = $user['User']['email'];
            $this->Email->subject = '[' . Configure::read('Site.title') . '] ' . __('Reset Password', true);
            $this->Email->template = 'forgot_password';
            if ($this->Email->send()) {
                $this->Session->setFlash(__('An email has been sent with instructions for resetting your password.', true), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'login'));
            } else {
                $this->Session->setFlash(__('An error occurred. Please try again.', true), 'default', array('class' => 'error'));
            }
        }
    }
	
	

    public function reset($username = null, $key = null) {
        $this->set('title_for_layout', __('Reset Password', true));

        if ($username == null || $key == null) {
            $this->Session->setFlash(__('An error occurred.', true), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'login'));
        }

        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.username' => $username,
                'User.activation_key' => $key,
            ),
        ));
        if (!isset($user['User']['id'])) {
            $this->Session->setFlash(__('An error occurred.', true), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'login'));
        }

        if (!empty($this->data) && isset($this->data['User']['password'])) {
            $this->User->id = $user['User']['id'];
            $user['User']['password'] = Security::hash($this->data['User']['password'], null, true);
            $user['User']['activation_key'] = md5(uniqid());
            if ($this->User->save($user['User'])) {
                $this->Session->setFlash(__('Your password has been reset successfully.', true), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'login'));
            } else {
                $this->Session->setFlash(__('An error occurred. Please try again.', true), 'default', array('class' => 'error'));
            }
        }

        $this->set(compact('user', 'username', 'key'));
    }
	
	public function client_reset($username = null, $key = null) {
        $this->set('title_for_layout', __('Reset Password', true));

        if ($username == null || $key == null) {
            $this->Session->setFlash(__('An error occurred.', true), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'login'));
        }

        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.username' => $username,
                'User.activation_key' => $key,
            ),
        ));
        if (!isset($user['User']['id'])) {
            $this->Session->setFlash(__('An error occurred.', true), 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'login'));
        }

        if (!empty($this->data) && isset($this->data['User']['password'])) {
            $this->User->id = $user['User']['id'];
            $user['User']['password'] = Security::hash($this->data['User']['password'], null, true);
            $user['User']['activation_key'] = md5(uniqid());
            if ($this->User->save($user['User'])) {
                $this->Session->setFlash(__('Your password has been reset successfully.', true), 'default', array('class' => 'success'));
                $this->redirect(array('action' => 'login'));
            } else {
                $this->Session->setFlash(__('An error occurred. Please try again.', true), 'default', array('class' => 'error'));
            }
        }

        $this->set(compact('user', 'username', 'key'));
    }

    public function login() {
		//$this->Linkedin->connect( );
		
	    $this->set('title_for_layout', __('Log in', true));
    }


    /**
     * Default callback: request token successful requested.
     * Now try to exchange request token in access token..
     */
    public function linkedin_connect_callback() {
        $this->Linkedin->authorize( /* optionally provide a custom callback url -> array('action'=>'custom_authorize_callback') */ );
    }

    /**
     * Default callback: we're successfully connected with linkedin API
     */
    public function linkedin_authorize_callback() {
        // we are successfully connected with linkedin API, now you can call any API method you like and retrieve the data you want
    }

    public function logout() {
        $this->Session->setFlash(__('Log out successful.', true), 'default', array('class' => 'success'));
        $this->redirect($this->Auth->logout());
    }

    public function view($username=null) {
		if($username){
        	$user = $this->User->findByUsername($username);
		}else{
			$user = $this->Auth->User();
		}
		
        if (isset($this->params['requested'])) {
            return $user;
        }
        if (!isset($user['User']['id'])) {
            $this->Session->setFlash(__('Invalid User.', true), 'default', array('class' => 'error'));
            $this->redirect('/');
        }

        $this->set('title_for_layout', $user['User']['name']);
        $this->set(compact('user'));
    }
    
}
?>