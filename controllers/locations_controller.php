<?php
class LocationsController extends AppController {

	var $name = 'Locations';
	
	public $helpers = array(
        'Html',
        'Form',
        'Session',
        'Text',
        'Js',
        'Time',
        'Layout',
        'Custom',
		'GoogleMapV3',
		'Braintree.BraintreeTransparentRedirect'
    );
	
	
	public $components = array(
		'Geocoder',
		'Email',
		'Braintree.BraintreeCallback' => array(
			'callback_actions' => array(
				'client_pay' => array( // The name of the action you'd like the BraintreeCallback component to watch for incoming Braintree data
					'redirect' => array( // The URL you'd like to redirect to after successfully storing the vault token
						'action' => 'client_activate'
					)
				)
			)
		)
    );
	
	function beforeFilter() 
	{ 
			parent::beforeFilter(); // call the AppController::beforeFilter() 
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
	
	function index() {
		$this->Location->recursive = 0;
		$this->set('locations', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid location', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('location', $this->Location->read(null, $id));
	}
	
	function client_index() {
		$this->Location->recursive = 2;
		$this->paginate = array('conditions'=>array('active'=>'1', 'OR'=>array('public'=>'1', 'AND'=>array('public'=>'0', 'Location.user_id'=>$this->Auth->User('id')))));
		$this->set('locations', $this->paginate());
	}
	
	function client_mylocations() {
		$this->paginate = array('conditions' => array('user_id'=>$this->Auth->User('id')));
		$this->Location->recursive = 2;
		$this->set('locations', $this->paginate());
	}
	
	function client_addad($id=null){
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid location', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			//debug($this->data);
			$i = 0;
			$thislocation = $this->Location->findById($id);
			//debug($this->data);
			//set the locations' times for each ad per location
			$addata = $this->Location->AdsLocation->find('all', array('conditions'=>array('location_id'=>$id)));
		    //debug($addata);
			foreach($this->data['Ad']['Ad'] as $i => $location){
				$addata['AdsLocations'][$i]['location_id'] = $id;
				$addata['AdsLocations'][$i]['ad_id'] = $location;
				//debug($this->data['Ad']['perpetual']);
				if($this->data['Ad']['perpetual'] == '0'){
					//debug($this->data);
					//set the date ranges.  The date picker is a picky formatter
					$stdate = array('month'=> date('m', strtotime($this->data['Ad']['startdatem'])), 'day'=>date('d', strtotime($this->data['Ad']['startdatem'])), 'year'=>date('Y', strtotime($this->data['Ad']['startdatem'])));
					$eddate = array('month'=> date('m', strtotime($this->data['Ad']['enddatem'])), 'day'=>date('d', strtotime($this->data['Ad']['enddatem'])), 'year'=>date('Y', strtotime($this->data['Ad']['enddatem'])));
					//debug('at');
					$addata['AdsLocations'][$i]['startdate'] = $stdate ;
					$addata['AdsLocations'][$i]['enddate'] = $eddate;
				}
				
				//debug($addata);
			$i++;
			}
			//debug($addata);		
			if ($this->Location->AdsLocation->saveAll($addata['AdsLocations'])) {
					$locationuser = $this->Location->User->find('first', array('conditions'=>array('User.id'=>$thislocation['Location']['user_id'])));
					$email = $locationuser['User']['email'];
					$this->Email->to = $email;
					$this->Email->subject = 'Someone has added ads to your location!';
					$this->Email->replyTo = 'info@blabfeed.com';
					$this->Email->from = 'Blabfeed Support <info@blabfeed.com>';
					$this->Email->template = 'checkads'; // note no '.ctp'
					//Send as 'html', 'text' or 'both' (default is 'text')
					$this->Email->sendAs = 'both'; // because we like to send pretty mail
					//Set view variables as normal
					$this->set('Location', $thislocation);
					$this->set('locid', $id);
					//Do not pass any args to send()
					$locationsstr = '';
				   
					$this->Email->send();
					$this->Email->reset();
				
				$this->Session->setFlash(__('Your Ads have been saved! Wait for approval.', true));
				$this->redirect(array('action' => 'client_nearme'));
			} else {
				$this->Session->setFlash(__('The location could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Location->read(null, $id);
		}             
		$this->set('location', $this->Location->read(null, $id));
		$adslocations = $this->Location->AdsLocation->find('list', array('fields'=>array('ad_id'),'conditions'=>array('location_id'=>$id)));
		$ads = $this->Location->Ad->find('list', array('label'=>'', 'conditions'=>array('Ad.user_id'=>$this->Auth->User('id'),'NOT'=>array('Ad.id'=>$adslocations))));
		$this->set(compact('ads','location'));
		
	}
	
	function client_add() {
		//if(($this->Auth->User('firstupload')==0 && $this->Auth->User('subscription')==0) || ($this->Auth->User('firstupload')==1 && $this->Auth->User('subscription')==1)){
			
			if (!empty($this->data)) {
				
				$arr = $this->data['Location'];
				$addressstr = '';
				foreach($arr as $id => $addressline){
					if($id == 'address1' || $id == 'zip' || $id == 'city' || $id == 'state' )
					$addressstr = $addressstr.' '.$addressline;
				}
				$this->Geocoder->address = $addressstr;
				$loc = $this->Geocoder->geocode();
				if(isset($loc->response)){
					if($loc->response['results'] != false && $loc->status!= 'ZERO_RESULTS' ){
					
						$this->data['Location']['lat'] = $loc->latitude;
						$this->data['Location']['lng'] = $loc->longitude;
						$this->data['Location']['user_id'] = $this->Auth->User('id');
						$this->Location->create();		
						if ($this->Location->save($this->data)) {
							
							$this->data['User']['id'] = $this->Auth->User('id');
							$this->data['User']['firstupload'] = 1;
							if($this->Location->User->save($this->data)){;
								$this->_refreshAuth();
							}
							$locid = $this->Location->getLastInsertId();
							$this->Session->write('Location.id', $locid);
							$this->Session->setFlash(__('The location has been saved', true));
						
								//debug($this->data);
								//already have your credit card!
								//go to review order
								
								$email = 'info@blabfeed.com';
								$this->Email->to = $email;
								$this->Email->subject = 'Someone has activated a new location!';
								$this->Email->replyTo = 'info@blabfeed.com';
								$this->Email->from = 'Blabfeed Support <info@blabfeed.com>';
								$this->Email->template = 'admin_almostlocation'; // note no '.ctp'
								//Send as 'html', 'text' or 'both' (default is 'text')a
								$this->Email->sendAs = 'both'; // because we like to send pretty mail
								//Set view variables as normal
								$this->set('Location', $this->data);
								$this->set('locid', $locid);
								//Do not pass any args to send()
								$locationsstr = '';
							   
								$this->Email->send();
								$this->Email->reset();
								
								$user = $this->Auth->User();
								
								$this->Email->to = $user['User']['email'];
								$this->Email->subject = 'Your new location is ready!';
								$this->Email->replyTo = 'info@blabfeed.com';
								$this->Email->from = 'Blabfeed Support <info@blabfeed.com>';
								$this->Email->template = 'addedlocation'; // note no '.ctp'
								//Send as 'html', 'text' or 'both' (default is 'text')
								$this->Email->sendAs = 'both'; // because we like to send pretty mail
								//Set view variables as normal
								$this->set('user', $user);
								$this->set('Location', $this->data);
								$this->set('locid', $locid);
								//Do not pass any args to send()
							
								$this->Email->send();
								$this->Email->reset();
								
								$this->redirect(array('action'=>'client_confirmorder', $locid));
							
						} else {
							//debugger::dump($loc);
							$this->Session->setFlash(__('The location could not be saved. Please, try again.', true));
							//$this->redirect(array('action' => 'client_manualadd'));
						}
					}else{
							$this->Session->setFlash(__('The location could not be saved because your latitude and longitude cannot be found. Please, try again.', true));
							//$this->redirect(array('action' => 'client_manualadd'));
					}
				}else{
					$this->Session->setFlash(__('The location could not be saved because your latitude and longitude cannot be found. Please, try again.', true));
					//$this->redirect(array('action' => 'client_manualadd'));
				}
			}
		//}else{
		//	$this->Session->setFlash('You have already uploaded an Location, please subscribe'); 
		//	$this->redirect(array( 'action'=>'client_pay'));
		//}
		
		$categories = $this->Location->Category->generatetreelist(array('parent_id'=>210), null, null, '-');
		$categories[0] = '--Please Select--';	
		$users = $this->Location->User->find('list');
		$ads = $this->Location->Ad->find('list');
		$this->set(compact('users', 'ads', 'categories'));
	}
	
	function client_confirmorder($id=null){
		$userid = $this->Auth->User('id');
		$ad = $this->Location->find('first', array('conditions'=>array('Location.id'=>$id)));
		$locationcount = $this->Location->find('count', array('conditions'=>array('Location.user_id'=>$userid)));
		$this->loadModel('Pricetiers');
		$price = $this->Pricetiers->find('first', array('order'=>array('numofmodel DESC'), 'conditions'=>array('model'=>'Location', 'numofmodel <='=>$locationcount, 'NOT'=>array('parent_id'=>0))));
		if (!empty($this->data)) {
			$ad = $this->Location->find('first', array('conditions'=>array('Location.id'=>$this->data['Location']['id'])));
			$this->Location->id = $ad['Location']['id'];
			$ad['Location']['qty'] = $this->data['Location']['qty'];
			if($this->Location->save($ad)){
				if($this->Auth->User('subscription')==1){
					$this->params['total'] = $this->data['Location']['total'];
					$this->redirect(array('action'=>'client_activate', $ad['Location']['id']));
				}else{
					$this->params['total'] = $this->data['Location']['total'];
					$this->redirect(array('action'=>'client_pay', $ad['Location']['id']));
				}
			}else{
				//could not save order
				$this->Session->setFlash(__('err', true));
			}
		}
		$this->set(compact('user', 'ad', 'braintree_customer_id'));
		$this->set( 'price',  $price['Pricetiers']['price']);
			
	}
	
	function client_pay($id=null){
		$userid = $this->Auth->User('id');
		if(is_null($id)){
			$ad = $this->Location->find('first', array('order'=>array('Location.created DESC'), 'conditions'=>array('Location.user_id'=>$userid)));
		}else{
			$ad = $this->Location->find('first', array('order'=>array('Location.created DESC'), 'conditions'=>array('Location.id'=>$id)));
		}
		$locationcount = $this->Location->find('count', array('conditions'=>array('Location.user_id'=>$userid)));
		$this->loadModel('Pricetiers');
		$price = $this->Pricetiers->find('first', array('order'=>array('numofmodel DESC'), 'conditions'=>array('model'=>'Location', 'numofmodel <='=>$locationcount, 'NOT'=>array('parent_id'=>0))));
		$total = $this->params['total'];
		$user = $this->Auth->User();
		if (!empty($this->BraintreeCallback->braintree_error)) {
			//debug('error');
			 $this->Session->setFlash(__($this->BraintreeCallback->braintree_error, true));
			 //debugger::dumP($this->BraintreeCallback->braintree_error);
			 $this->redirect(array('action' => $this->params['action'], $id));
		} 
		$this->loadModel('Braintree.BraintreeCustomer');
		
		 $braintree_customer_id = $this->BraintreeCustomer->getOrCreateCustomerId(
			 'User', // A model in your app that you want to associate the Braintree customer with
			 $user['User']['id'], // A foreign_id in your app that you want to associate the Braintree customer with
			 array(
				 'first_name' => $user['User']['username'],
				 'email' => $user['User']['email'],
			 )
		 );
		 $this->set(compact('user', 'ad','braintree_customer_id'));
		 $this->set( 'price',  $price['Pricetiers']['price']);
		 $this->set( 'total',  $total);
			
	}
	
	function client_activate($id=null){
		//debug($ad);
		$userid = $this->Auth->User('id');
		//card stored
		$this->loadModel('Pricetiers');
		$locationcount = $this->Location->find('count', array('conditions'=>array('Location.user_id'=>$userid)));
		
		$price = $this->Pricetiers->find('first', array('order'=>array('numofmodel DESC'), 'conditions'=>array('model'=>'Location', 'numofmodel <='=>$locationcount, 'NOT'=>array('parent_id'=>0))));
		//change client sub to 1
		$userid = $this->Auth->User('id');
		$this->loadModel('Braintree.BraintreeCustomer');
		$this->loadModel('Braintree.BraintreeCreditCard');
		
		$btcustomer = $this->BraintreeCustomer->getOrCreateCustomerId(
				 'User', // A model in your app that you want to associate the Braintree customer with
				 $userid // A foreign_id in your app that you want to associate the Braintree customer with
		);
		
		$btcc = $this->BraintreeCreditCard->find('first', array('conditions'=>array('BraintreeCreditCard.braintree_customer_id'=>$btcustomer)));
			//debug($btcc);
		/*	
		$result = ClassRegistry::init('BraintreeTransaction')->save(array(
			 'BraintreeTransaction' => array(
				   'braintree_customer_id' => $btcustomer,
				   'braintree_credit_card_id' => $btcc['BraintreeCreditCard']['token'],
				   'model' => 'Ad', // A model in your app that you want to associate the Braintree vault record with
				   'foreign_id' => $ad['Ad']['id'], // A foreign_id in your app that you want to associate the Braintree transaction with
				   'type' => 'sale',
				   'amount' => '0.01'
			 )
		));
		*/
			//$this->Session->setFlash(__('The ad has been saved', true));
			//get unique array
			if(is_null($id)){
				$ad = $this->Location->find('first', array('order'=>array('Location.created DESC'), 'conditions'=>array('Location.user_id'=>$userid)));
			}else{
				$ad = $this->Location->find('first', array('conditions'=>array('Location.id'=>$id)));
			}
			//$adlocations = $this->Ad->AdsLocation->find('list', array('fields'=>array('location_id'), 'conditions'=>array('ad_id'=>$ad['Ad']['id'])));
			/*foreach($ad['Location'] as $location){
				$locationusers[] = $location['user_id'];
			}*/
			//if($this->data){
				$this->data['User']['subscription'] = 1;
				
				$this->data['User']['id'] = $userid;
				
				if($this->Location->User->save($this->data)){
					$this->_refreshAuth();
					
					$this->Location->id = $ad['Location']['id'];
					$ad['Location']['approved'] = 1;
					
					if($this->Location->save($ad)){
						
								//debugger::dump($user['User']['email']);
								//$this->Email->delivery = 'debug';
								$email = 'blabfeed@gmail.com';
								$this->Email->to = $email;
								$this->Email->subject = 'Someone has activated a new location!';
								$this->Email->replyTo = 'info@blabfeed.com';
								$this->Email->from = 'Blabfeed Support <info@blabfeed.com>';
								
								$this->Email->template = 'admin_billlocation'; // note no '.ctp'
								//Send as 'html', 'text' or 'both' (default is 'text')
								$this->Email->sendAs = 'both'; // because we like to send pretty mail
								//Set view variables as normal
								$this->set('Location', $ad);
								//Do not pass any args to send()
								$locationsstr = '';
							   
								$this->Email->send();
								$this->Email->reset();
								
					   			//need SETUP EMAIL!!!!?????
					 
								$this->redirect(array('action' => 'client_mylocations'));
					}
				}
			//}
			$this->set(compact('ad'));
			$this->set('price',$price['Pricetiers']['price']);
		
	}
	
	function client_manualadd() {
		if (!empty($this->data)) {
			$this->Location->create();
			
			if ($this->Location->save($this->data)) {
				$this->Session->setFlash(__('The location has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The location could not be saved because your latitude and longitude cannot be found. Please, try again.', true));
				$this->redirect(array('action' => 'manualadd'));
			}
		}
		$users = $this->Location->User->find('list');
		$ads = $this->Location->Ad->find('list');
		$this->set(compact('users', 'ads'));
	}
	
	
	function client_nearme() {
		//debug('te');
		$this->Location->recursive = 2;
		if (!empty($this->data)) {
			//debugger::dump($this->data['Location']);
			//check geo or by address
			if ($this->data['Location']['zip'] == '') {
				//search by geo
				$dist = $this->data['Location']['dist'];
				$lat = $this->data['Location']['lat'];
				$lon = $this->data['Location']['lng'];
				
				$this->paginate = array('conditions'=> array('((ACOS(SIN('.$lat.' * PI() / 180) * SIN(lat * PI() / 180) + COS('.$lat.' * PI() / 180) * COS(lat * PI() / 180) * COS(('.$lon.' - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) <=' => $dist, 'active' => true, 'OR'=>array('public'=>'1','AND'=>array('public'=>'0','user_id'=>$this->Auth->User('id')))),
													'fields' => array('((ACOS(SIN('.$lat.' * PI() / 180) * SIN(lat * PI() / 180) + COS('.$lat.' * PI() / 180) * COS(lat * PI() / 180) * COS(('.$lon.' - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) as distance', 'id', 'avgreachpermon', 'name', 'description', 'address1', 'address2', 'city', 'user_id', 'state', 'zip', 'lat', 'lng', 'active'),
													'order' => array('distance ASC')
													);
				
				$this->Session->setFlash(__('Here are locations close to you', true));
			} else {
				
				//search by address
				/*
				$arr = $this->data['Location'];
				$addressstr = '';
				foreach($arr as $id => $addressline){
					if($id != 'lat' && $id != 'lng')
					$addressstr = $addressstr.' '.$addressline;
				}
				*/
				$this->Geocoder->address = $this->data['Location']['zip'];
				$loc = $this->Geocoder->geocode();
				
				if(isset($loc->latitude)){		
						$lat = $loc->latitude;
						$lon = $loc->longitude;
						$dist = $this->data['Location']['dist'];
						$this->paginate = array('conditions'=> array('((ACOS(SIN('.$lat.' * PI() / 180) * SIN(lat * PI() / 180) + COS('.$lat.' * PI() / 180) * COS(lat * PI() / 180) * COS(('.$lon.' - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) <=' => $dist,  'active' => true, 'OR'=>array('public'=>'1','AND'=>array('public'=>'0','user_id'=>$this->Auth->User('id')))),
															'fields' => array('((ACOS(SIN('.$lat.' * PI() / 180) * SIN(lat * PI() / 180) + COS('.$lat.' * PI() / 180) * COS(lat * PI() / 180) * COS(('.$lon.' - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) as distance', 'id', 'avgreachpermon','name', 'description', 'address1', 'address2', 'city', 'user_id', 'state', 'zip', 'lat', 'lng', 'active'),
															'order' => array('distance ASC')
															);
						
						$this->Session->setFlash(__('Here are locations close to that address.', true));
				}else{
					$this->Session->setFlash(__('We could not process that address.  Please try again.', true));
				}
			}
			$userid = $this->Auth->User('id');
			$data = $this->paginate('Location');
			$this->set('data',  'userid');
			
			
		}else{
			$this->paginate = array('conditions'=>array('active'=>'1', 'OR'=>array('public'=>'1', 'AND'=>array('public'=>'0', 'Location.user_id'=>$this->Auth->User('id')))));
		
		}
		$userid = $this->Auth->User('id');
		$this->set('locations',  $this->paginate());
		$this->set('userid');
	}

	function client_view($id = null) {
		$this->recursive = 2;
		if (!$id) {
			$this->Session->setFlash(__('Invalid location', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('userid', $this->Auth->User('id'));
		$llist = $this->Location->find('all', array('contain'=>array('Ad'=>array('Upload')), 'conditions'=>array('Location.id'=>$id)));
		$this->set('location', $llist[0]);
	}

	

	function client_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid location', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if($this->data['Location']['user_id'] != $this->Auth->User('id')){
				$this->redirect(array('action' => 'index'));
				$this->Session->setFlash(__('You do not have access to this location.', true));
			}
			if ($this->Location->save($this->data)) {
				$this->Session->setFlash(__('The location has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The location could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Location->read(null, $id);
		}
		$users = $this->Location->User->find('list');
		$categories = $this->Location->Category->generatetreelist(array('parent_id'=>210), null, null, '-');
		$categories[0] = '--Please Select--';	
		$ads = $this->Location->Ad->find('list');
		$this->set(compact('users', 'ads', 'categories'));
	}

	function client_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for location', true));
			$this->redirect(array('action'=>'client_mylocations'));
		}
		$this->data = $this->Location->read(null, $id);
		if($this->data['Location']['user_id'] != $this->Auth->User('id')){
				$this->Session->setFlash(__('You do not have access to this location.', true));
				$this->redirect(array('action' => 'client_mylocations'));
		}
		if ($this->Location->delete($id)) {
			$this->Session->setFlash(__('Location deleted', true));
			$this->redirect(array('action'=>'client_mylocations'));
		}
		$this->Session->setFlash(__('Location was not deleted', true));
		$this->redirect(array('action' => 'client_mylocations'));
	}
	
	
	function admin_index() {
		$this->Location->recursive = 0;
		$this->set('locations', $this->paginate());
	}

	function admin_view($id = null) {
		$this->Location->recursive = 2;
		if (!$id) {
			$this->Session->setFlash(__('Invalid location', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('location', $this->Location->find('first', array('conditions'=>array('Location.id'=>$id))));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Location->create();
			if ($this->Location->save($this->data)) {
				$this->Session->setFlash(__('The location has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The location could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Location->User->find('list');
		$ads = $this->Location->Ad->find('list');
		$this->set(compact('users', 'ads'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid location', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Location->save($this->data)) {
				$this->Session->setFlash(__('The location has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The location could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Location->read(null, $id);
		}
		$users = $this->Location->User->find('list');
		$ads = $this->Location->Ad->find('list');
		$this->set(compact('users', 'ads'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for location', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Location->delete($id)) {
			$this->Session->setFlash(__('Location deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Location was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>