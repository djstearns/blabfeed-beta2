<?php
class AdsController extends AppController {

	var $name = 'Ads';
	
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
		'Braintree.BraintreeTransparentRedirect',
		'GoogleChart',
		'Cache'
    );
	
	public $components = array(
		'Geocoder',
		'Email',
		'Cookie',
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
			
			// your other stuff here.. 
	} 
	
	function hit(){
		
		//$this->Cookie->write('user_id','23',false, '1 week');
		$authuser = $this->Auth->User();
		$user = $this->Cookie->read('user_id');
		
		$ad = $this->params['named']['ad'];
		$loc = $this->params['named']['loc'];
		
		if($user != '' || !empty($authuser)){
			if(!empty($authuser)){
				$userid = $this->Auth->User('id');
			}else{
				$userid = $user;
			}
		}else{
			
			$this->Ad->User->Create();
			$this->data['User']['activation_key'] = md5(uniqid());
			$this->data['User']['name'] = 'random';
			$this->data['User']['lastname']= 'random';
			$this->data['User']['phone'] = 4023911273;
			$this->data['User']['email'] = 'random'.RAND().'@gmail.com';
			$this->data['User']['username'] = 'random'.RAND();
            $this->data['User']['status'] = 1;
			$this->data['User']['role_id'] = 4; // Registered
			$this->data['User']['password']='random';
			
			$this->Ad->User->save($this->data);
		
			$this->Auth->login($this->data);
			$userid=$this->Auth->User('id');
			$this->Cookie->write('user_id',$userid, false, '1 week' );
			
			
		}
		//debug($_SERVER['HTTP_USER_AGENT']);
		 
		foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
			if (array_key_exists($key, $_SERVER) === true) {
				foreach (explode(',', $_SERVER[$key]) as $ip) {
					if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
						$ip_address = $ip;
					}
				}
			}
			
		}
		
		$impressiondata  = array('Impression'=>array('ad_id'=>$ad,'location_id'=>$loc,'user_id'=>$userid, 'ip'=>$ip_address,'impressiontype'=>1));
		$this->Ad->Impression->create();
		if($this->Ad->Impression->save($impressiondata)){
			//$this->Session->setFlash('saved');
			$aditem = $this->Ad->find('first', array('conditions'=>array('Ad.id'=>$ad)));
			//debug($aditem);
			$this->redirect('http://'.$aditem['Ad']['qrcodeurl']);
		}else{
			$this->Session->setFlash('saved');
			//debug($impressiondata);
		}
	
		
	}
	
	function client_editor(){
		clearCache();
		$this->layout='slate';
	}
	function admin_index() {
		$this->Ad->recursive = 2;
		$this->pageinate = array('order'=>array('Ad.created DESC'));
		$this->set('ads', $this->paginate());
	}
	
	function index($id=null) {
		//$this->layout='blank';
		$this->Ad->recursive = 1;
		//Get a the location id
		if(!isset($this->params['url']['id']) && is_null($id)){
			$id = 12;
		}else{
			if(is_null($id)){
				$id = $this->params['url']['id'];
			}
		}
		//debug($id);
		$ads = $this->Ad->AdsLocation->find('list', array('conditions'=>array('location_id'=>$id,
																			  'approved'=>1, 
																			  'OR'=>array(
																			  		
																			  		array('AND'=>array('startdate <=' => date('Y-m-d'), 
																								  'enddate >=' => date('Y-m-d')
																					 			)),
																					array('AND'=>array('startdate' => null, 
																								  'enddate' => null
																					 			))
																			   )),
													 'fields'=>array('ad_id')));
		//$ads = $this->Ad->find('all', array('conditions'=>array('approved'=>1, 'Ad.id'=>$adlocations)));								
		/*
		$ads = $this->Ad->find('all', array(
       'conditions' => array('Ad.approved' => 1),
       'contain' => array('Location'=>array('conditions'=>array('Location.id'=>$id,'AdsLocation.approved'=>1, 'AdsLocation.startdate <=' => date('Y-m-d'), 'AdsLocation.enddate >=' => date('Y-m-d')),
	   					 					//'contain'=>array('AdsLocation'=>array('conditions'=>array()))
						 ))
	   ));
		*/
		//debug($ads);	
		foreach($ads as $adid){
			$adids[] = $adid;
		}
	
		$this->paginate['Ad'] = array('order'=>array('RAND()'), 'conditions'=>array('Ad.id'=>$adids, 'Ad.approved'=>1));
		$this->set('thislocation', $id);
		$categories = $this->Ad->Category->generatetreelist(array('parent_id'=>210), null, null, '-');
		$this->set(compact('categories'));
		$this->set('ads', $this->paginate());
	}
	
	function htmlview($id=null) {
		$this->layout='blank';
		$this->Ad->recursive = 1;
		//Get a the location id
		if(!isset($this->params['url']['id']) && is_null($id)){
			$id = 12;
		}else{
			if(is_null($id)){
				$id = $this->params['url']['id'];
			}
		}
		//debug($id);
		$ads = $this->Ad->AdsLocation->find('list', array('conditions'=>array('location_id'=>$id,
																			  'approved'=>1, 
																			  'OR'=>array(
																			  		
																			  		array('AND'=>array('startdate <=' => date('Y-m-d'), 
																								  'enddate >=' => date('Y-m-d')
																					 			)),
																					array('AND'=>array('startdate' => null, 
																								  'enddate' => null
																					 			))
																			   )),
													 'fields'=>array('ad_id')));
		//$ads = $this->Ad->find('all', array('conditions'=>array('approved'=>1, 'Ad.id'=>$adlocations)));								
		/*
		$ads = $this->Ad->find('all', array(
       'conditions' => array('Ad.approved' => 1),
       'contain' => array('Location'=>array('conditions'=>array('Location.id'=>$id,'AdsLocation.approved'=>1, 'AdsLocation.startdate <=' => date('Y-m-d'), 'AdsLocation.enddate >=' => date('Y-m-d')),
	   					 					//'contain'=>array('AdsLocation'=>array('conditions'=>array()))
						 ))
	   ));
		*/
		//debug($ads);	
		foreach($ads as $adid){
			$adids[] = $adid;
		}
		if(isset( $this->params['url']['width'])){
			$height = $this->params['url']['width'];
		}else{
			$height='500px';
		}
		if(isset( $this->params['url']['height'])){
			$width = $this->params['url']['height'];
		}else{
			$width='500px';
		}
		$this->set(compact('width','height'));
		$this->set('thislocation', $id);
		$this->paginate['Ad'] = array('conditions'=>array('Ad.id'=>$adids, 'Ad.approved'=>1));
		$this->set('ads', $this->paginate());
	}
	
	function rise($id=null) {
		$this->Ad->recursive = 1;
		//Get a the location id
		if(!isset($this->params['url']['id']) && is_null($id)){
			$id = 12;
		}else{
			if(is_null($id)){
				$id = $this->params['url']['id'];
			}
		}
		//debug($id);
		$ads = $this->Ad->AdsLocation->find('list', array('conditions'=>array('location_id'=>$id,
																			  'approved'=>1, 
																			  'OR'=>array(
																			  		
																			  		array('AND'=>array('startdate <=' => date('Y-m-d'), 
																								  'enddate >=' => date('Y-m-d')
																					 			)),
																					array('AND'=>array('startdate' => null, 
																								  'enddate' => null
																					 			))
																			   )),
													 'fields'=>array('ad_id')));
		//$ads = $this->Ad->find('all', array('conditions'=>array('approved'=>1, 'Ad.id'=>$adlocations)));								
		/*
		$ads = $this->Ad->find('all', array(
       'conditions' => array('Ad.approved' => 1),
       'contain' => array('Location'=>array('conditions'=>array('Location.id'=>$id,'AdsLocation.approved'=>1, 'AdsLocation.startdate <=' => date('Y-m-d'), 'AdsLocation.enddate >=' => date('Y-m-d')),
	   					 					//'contain'=>array('AdsLocation'=>array('conditions'=>array()))
						 ))
	   ));
		*/
		//debug($ads);	
		foreach($ads as $adid){
			$adids[] = $adid;
		}
	
		$this->paginate['Ad'] = array('conditions'=>array('Ad.id'=>$adids, 'Ad.approved'=>1));
		$this->set('ads', $this->paginate());
	}
	/*
	function indexOLD() {
		$this->Ad->recursive = 0;
		$this->paginate['Ad'] = array('conditions'=>array('Ad.id'=>'123' ));
		$this->set('ads', $this->paginate());
	}
	*/
	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ad', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('ad', $this->Ad->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Ad->create();
			if ($this->Ad->save($this->data)) {
				$this->Session->setFlash(__('The ad has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ad could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Ad->User->find('list');
		$locations = $this->Ad->Location->find('list');
		$this->set(compact('users', 'locations'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ad', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Ad->save($this->data)) {
				$this->Session->setFlash(__('The ad has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ad could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Ad->read(null, $id);
		}
		$users = $this->Ad->User->find('list');
		$locations = $this->Ad->Location->find('list');
		$this->set(compact('users', 'locations'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ad', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Ad->delete($id)) {
			$this->Session->setFlash(__('Ad deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ad was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function client_index() {
		$this->M->recursive = -1; 
		 	$approvedloclist = $this->Ad->Location->UsersLocation->find('list', array('fields'=>'location_id','conditions'=>array('UsersLocation.user_id'=>$this->Auth->User('id'),'canapprove'=>1)));
			//debug($approvedloclist);
			$this->paginate = array(
							//'Location' => array('conditions'=> array('Location.user_id'=>$this->Auth->User('id'))),
							'order'=>array('Ad.created DESC'),
							'conditions'=>array('Not'=>array('outboxdel'=>1), 'User.subscription'=>1),
							'group'=>	array('Ad.id'),
							//
							'joins' => array(
							 array( 
									   'table' => 'ads_locations', 
									   'alias' => 'AdsLocations', 
									   'type' => 'inner',  
									   'conditions'=> array('AdsLocations.ad_id = Ad.id', 'AdsLocations.approved'=>'0','AdsLocations.reviewed'=>'0',
									   		//'OR'=>array()
									   ) 
								   ), 
							   
							   array( 
								   'table' => 'locations', 
								   'alias' => 'Location', 
								   'type' => 'inner',
								   'fields' => array('ids','name','Location.address1'),
								   'conditions'=> array( 
									   'Location.id = AdsLocations.location_id',
									   'OR'=>array('Location.user_id' => $this->Auth->User('id'),'Location.id'=> $approvedloclist )
								   ) ,
								    //does not work.
								   'joins'=>
									  array(	'table'=>'users',
											  'alias'=>'User',
											  'type'=>'inner',
											  'conditions'=>array('subscription'=>1)
									  ),
										 
								),
								
						
						));
					
		
		if (!empty($this->data)) {
			if ($this->Ad->AdsLocation->saveAll($this->data['AdsLocation'])) {
				//debugger::dump($this->data['AdsLocation']);
				$this->Session->setFlash(__('The ad has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ad could not be saved. Please, try again.', true));
			}
		}
		$test = $this->paginate();
		//debug($test);
		//$uploads = $this->Ad->Upload->find('list', array('conditions'=>array('user_id'=>$this->Auth->User('id'))));
		$userid = $this->Auth->User('id');
		//$log = $this->Ad->getDataSource()->getLog(false, false);
		//debug($log);
		//$locations = $this->Ad->Location->find('list');
		$this->set(compact('userid'));
		$this->set('ads', $test);
	}
	
	function client_approvedads() {
		$this->Ad->recursive = 2; 
			$approvedloclist = $this->Ad->Location->UsersLocation->find('list', array('fields'=>'location_id','conditions'=>array('UsersLocation.user_id'=>$this->Auth->User('id'),'canapprove'=>1)));
			$this->paginate = array(
							'Location' => array('conditions'=> array('Location.user_id'=>$this->Auth->User('id'))),
							'group'=>	array('Ad.id'),
							'conditions'=>array('Not'=>array('outboxdel'=>1)),
							'order'=>array('Ad.created DESC'),
							'joins' => array(
							 array( 
									   'table' => 'ads_locations', 
									   'alias' => 'AdsLocations', 
									   'type' => 'inner',  
									   'conditions'=> array('AdsLocations.ad_id = Ad.id', 'AdsLocations.approved'=>'1') 
								   ), 
							   
							   array( 
								   'table' => 'locations', 
								   'alias' => 'Location', 
								   'type' => 'inner',
								   'fields' => array('id','name','Location.address1'),
								   'conditions'=> array( 
									   'Location.id = AdsLocations.location_id',
									   'OR'=>array('Location.user_id' => $this->Auth->User('id'),'Location.id'=> $approvedloclist )
								   ) 
								)
						));
					
		
		if (!empty($this->data)) {
			if ($this->Ad->AdsLocation->saveAll($this->data['AdsLocation'])) {
				//debugger::dump($this->data['AdsLocation']);
				$this->Session->setFlash(__('The ad has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ad could not be saved. Please, try again.', true));
			}
		}
		$test = $this->paginate();
		//debug($test);
		//$uploads = $this->Ad->Upload->find('list', array('conditions'=>array('user_id'=>$this->Auth->User('id'))));
		$userid = $this->Auth->User('id');
		//$log = $this->Ad->getDataSource()->getLog(false, false);
		//debug($log);
		//$locations = $this->Ad->Location->find('list');
		$this->set(compact('userid'));
		$this->set('ads', $test);
	}
	
	function client_unapprovedads() {
		$this->Ad->recursive = 2; 
			$approvedloclist = $this->Ad->Location->UsersLocation->find('list', array('fields'=>'location_id','conditions'=>array('UsersLocation.user_id'=>$this->Auth->User('id'),'canapprove'=>1)));
			$this->paginate = array(
							'Location' => array('conditions'=> array('Location.user_id'=>$this->Auth->User('id'))),
							'group'=>	array('Ad.id'),
							'conditions'=>array('Not'=>array('outboxdel'=>1)),
							'order'=>array('Ad.created DESC'),
							'joins' => array(
							 array( 
									   'table' => 'ads_locations', 
									   'alias' => 'AdsLocations', 
									   'type' => 'inner',  
									   'conditions'=> array('AdsLocations.ad_id = Ad.id', 'AdsLocations.approved'=>'-1') 
								   ), 
							   
							   array( 
								   'table' => 'locations', 
								   'alias' => 'Location', 
								   'type' => 'inner',
								   'fields' => array('id','name','Location.address1'),
								   'conditions'=> array( 
									   'Location.id = AdsLocations.location_id',
									   'OR'=>array('Location.user_id' => $this->Auth->User('id'),'Location.id'=> $approvedloclist )
								   ) 
								)
						));
					
		
		if (!empty($this->data)) {
			if ($this->Ad->AdsLocation->saveAll($this->data['AdsLocation'])) {
				//debugger::dump($this->data['AdsLocation']);
				$this->Session->setFlash(__('The ad has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ad could not be saved. Please, try again.', true));
			}
		}
		$test = $this->paginate();
		//debug($test);
		//$uploads = $this->Ad->Upload->find('list', array('conditions'=>array('user_id'=>$this->Auth->User('id'))));
		$userid = $this->Auth->User('id');
		//$log = $this->Ad->getDataSource()->getLog(false, false);
		//debug($log);
		//$locations = $this->Ad->Location->find('list');
		$this->set(compact('userid'));
		$this->set('ads', $test);
	}
	
	function client_outbox() {
		$this->paginate = array(
							'conditions'=>array('Not'=>array('outboxdel'=>1)),
							'group'=>	array('Ad.id'),
							'order'=>array('Ad.created DESC'),
							'joins' => array(
							 array( 
									   'table' => 'ads_locations', 
									   'alias' => 'AdsLocations', 
									   'type' => 'inner',  
									   'conditions'=> array('AdsLocations.ad_id = Ad.id', 'Ad.user_id'=>$this->Auth->User('id')) 
								   ), 
								   array( 
									   'table' => 'locations', 
									   'alias' => 'Location', 
									   'type' => 'inner',  
									   'conditions'=> array( 
										   'Location.id = AdsLocations.location_id'
										   
									   ) 
						)));
					
		/*
		$this->paginate = array(
			'Ad' => array(
				'contain' => array(
					'Location' => array(
						'conditions' => array('user_id'=>$this->Auth->User('id')),
						
					)
				)
			)
		);
		*/
		//debug($this->Ad->lastQuery()); 
		//debugger::dump($this->data['AdsLocation']);
		
		$uploads = $this->Ad->Upload->find('list', array('conditions'=>array('user_id'=>$this->Auth->User('id'))));
		$users = $this->Ad->User->find('list');
		$locations = $this->Ad->Location->find('list');
		$this->set(compact('users', 'locations', 'uploads'));
		$this->set('ads', $this->paginate('Ad'));
	}

	function client_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ad', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('ad', $this->Ad->read(null, $id));
	}
	
	


	function client_add() {
		$this->layout = 'clientnewad';
		$id=0;
		if (!empty($this->data)) {
			
			$this->Ad->create();
				if ($this->Ad->save($this->data)) {
					$this->Session->setFlash(__('The ad has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The ad could not be saved. Please, try again.', true));
				}

		  }else{ 
			
		  } 	
				
				
		
		$users = $this->Ad->User->find('list');
		$locations = $this->Ad->Location->find('list');
		$this->set(compact('users', 'locations'));
		
		//start editloc script
		
		if(isset($this->params['form']['ad'])){
			if($this->params['form']['ad'] == 'Search') {
				//find locations
				
				if ($this->data['Location']['zip'] == '' ){//&& $this->data['Location']['address1'] == '') {
					//search by geo
					$this->data['Location']['Location']=array();
					$dist = $this->data['Location']['dist'];
					$lat = $this->data['Location']['lat'];
					$lon = $this->data['Location']['lng'];
					//debug($lat);
					if($lat==''){
						$mapconditions = array('conditions'=>array('active'=>true),'order'=>array('user_id ASC'));
						$this->Session->setFlash(__('Please allow your browser to get your location.', true));
					}else{
						$mapconditions = array('conditions'=> array('((ACOS(SIN('.$lat.' * PI() / 180) * SIN(lat * PI() / 180) + COS('.$lat.' * PI() / 180) * COS(lat * PI() / 180) * COS(('.$lon.' - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) <=' => $dist, 'active' => true, 'OR'=>array('public'=>1,'user_id'=>$this->Auth->User('id'))),
														'fields' => array('((ACOS(SIN('.$lat.' * PI() / 180) * SIN(lat * PI() / 180) + COS('.$lat.' * PI() / 180) * COS(lat * PI() / 180) * COS(('.$lon.' - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) as distance', 'avgreachpermon', 'address1','address2','city','state','zip','height','width','description','lat','lng',  'name', 'active'),
														'order' => array('distance ASC')
														);
					
					$this->Session->setFlash(__('Here are locations close to you', true));
					}
				} else {
					
					//search by address
					$this->data['Location']['Location']=array();
					$arr = $this->data['Location'];
					$addressstr = '';
					/*
					foreach($arr as $id => $addressline){
						if($id != 'lat' && $id != 'lng')
						$addressstr = $addressstr.' '.$addressline;
					}
					$this->Geocoder->address = $addressstr;
					*/
					//debug($arr);
					$this->Geocoder->address = $arr['zip'];
					$loc = $this->Geocoder->geocode();
					$lat = $loc->latitude;
					$lon = $loc->longitude;
					$dist = $this->data['Location']['dist'];
					$mapconditions = array('conditions'=> array('((ACOS(SIN('.$lat.' * PI() / 180) * SIN(lat * PI() / 180) + COS('.$lat.' * PI() / 180) * COS(lat * PI() / 180) * COS(('.$lon.' - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) <=' => $dist, 'active' => true, 'OR'=>array('public'=>1,'user_id'=>$this->Auth->User('id')),'OR'=>array('AND'=>array('width'=>0,'height'=>0),'AND'=>array('height'))),
														'fields' => array('((ACOS(SIN('.$lat.' * PI() / 180) * SIN(lat * PI() / 180) + COS('.$lat.' * PI() / 180) * COS(lat * PI() / 180) * COS(('.$lon.' - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) as distance','avgreachpermon', 'address1','address2','city','state','zip','height','width','description','lat','lng',   'name', 'active'),
														'order' => array('distance ASC')
														);
					
					
					$this->Session->setFlash(__('Here are locations close to that address.', true));
				}
			}
		}else{
			//no params['form']['ad'] exists
			
			$mapconditions = array('conditions'=>array(),'order'=>array('user_id ASC'));
		}
		
		//now that our map conditions are set...
		$totallocs = 0;
		//get the locations readable for the map
		$locationsarr = $this->Ad->Location->find('all', $mapconditions);
		foreach($locationsarr as $place){
						$loclist[$place['Location']['id']] = $place['Location']['name']; 
		}
		
		//get the total locations for the 
		if($id){
		
			$validlocations = $this->Ad->find('all', array('conditions'=>array('Ad.id'=>$id),'contain'=>array('Location'=>array('fields'=>array('id','avgreachpermon')))));
			//debug($validlocations);
				foreach($validlocations[0]['Location'] as $myloc){
					$totallocs += $myloc['avgreachpermon'];
				}
		}
		if(isset($loclist)){
			$locations = $loclist;
		}else{
			
			$this->Session->setFlash(__('No locations found tests.', true)); //what is this?
		}
		
		
		$userid = $this->Auth->User('id');
		
		$users = $this->Ad->User->find('list');
		$this->set(compact('users', 'locations', 'locationsarr', 'divlocations', 'totallocs', 'id', 'userid'));
		$categories = $this->Ad->Category->generatetreelist(array('parent_id'=>210), null, null, '-');
		//$categories[''] = '--Please Select--';
		if($id){
				$this->data = $this->Ad->find('all', array('conditions'=>array('Ad.id'=>$id)));
			}
		$this->set('editor', 0);
		$user = $this->Auth->User('id');
		$locations = $this->Ad->Location->find('list');
		$this->set(compact('user', 'locations','categories'));
		
	}

	function client_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ad', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Ad->save($this->data)) {
				$this->Session->setFlash(__('The ad has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ad could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Ad->read(null, $id);
		}
		$categories = $this->Ad->Category->generatetreelist(array('parent_id'=>210), null, null, '-');
		$uploads = $this->Ad->Upload->find('list', array('conditions'=>array('user_id'=>$this->Auth->User('id'))));
		$users = $this->Ad->User->find('list');
		$locations = $this->Ad->Location->find('list');
		$this->set(compact('users', 'locations', 'uploads', 'categories'));
		
		
		
	}
	
	function client_editloc	($id = null) {
		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ad', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			//if they have hit the submit ad button...
			if($this->params['form']['ad'] == 'Submit') {
				//check for locations.  If no locations, error and ask for them
				if(empty($this->data['Location']['Location'])){
						$this->Session->setFlash(__('Please choose locations.', true));
						$this->redirect(array('action'=>'client_editloc', $id));
				}
				//if we can save the Ad data (locations)
				
				if ($this->Ad->save($this->data)) {
					
					$this->data['User']['id'] = $this->Auth->User('id');
					$this->data['User']['firstupload'] = 1;
					
					$i = 0;
					//set the locations' times for each ad per location
					$addata = $this->Ad->findById($id);
					//debug($addata);
					$stdate = $addata['Ad']['startdate'];
					$eddate = $addata['Ad']['enddate'];
					foreach($addata['AdsLocations'] as $i => $location){
						$addata['AdsLocations'][$i]['startdate'] = $stdate;
						$addata['AdsLocations'][$i]['enddate'] = $eddate;
					$i++;
					}
					$this->Ad->AdsLocation->saveAll($addata['AdsLocations']);
					//save the location
					if($this->Ad->User->save($this->data)){
						$this->_refreshAuth();
						//send new ad email to admin and user
						//debugger::dump($user['User']['email']);
						//$this->Email->delivery = 'debug';
						$user = $this->Auth->User();
						//debug($user);
						$this->Email->to = $user['User']['email'];
						$this->Email->subject = 'You have successfully created an ad!';
						$this->Email->replyTo = 'info@blabfeed.com';
						$this->Email->from = 'info@blabfeed.com';
						$this->Email->template = 'addedad'; // note no '.ctp'
						//Send as 'html', 'text' or 'both' (default is 'text')
						$this->Email->sendAs = 'both'; // because we like to send pretty mail
						//Set view variables as normal
						
												//$this->set('user', $user);
						$this->set('ad', $addata);
						$this->set('user', $user);
						//debug($addata);
						//Do not pass any args to send()
						$this->Email->send();
						$this->Email->reset();
				
				
						//debugger::dump($user['User']['email']);
						//$this->Email->delivery = 'debug';
						$email = 'blabfeed@gmail.com';
						$this->Email->to = $email;
						$this->Email->subject = $this->Auth->User('username').' has uploaded an ad!';
						$this->Email->replyTo = 'info@blabfeed.com';
						$this->Email->from = 'info@blabfeed.com';
						$this->Email->template = 'admin_adadded'; // note no '.ctp'
						//Send as 'html', 'text' or 'both' (default is 'text')
						$this->Email->sendAs = 'both'; // because we like to send pretty mail
						
						//Set view variables as normal
						$this->set('User', $user);
						//Do not pass any args to send()
						/*
						$locationsstr = '';
						foreach($locationid as $location){
								$locationsstr = $locationsstr.$location.'<br />';
						}
						$this->set('locationdata', $locationsstr);
						*/
						$this->Email->send();
						$this->Email->reset();
						
						$this->redirect(array('action'=>'client_pay', $this->data['Ad']['id']));
					}
				} else {
					//can't save the locations
					$this->Session->setFlash(__('The ad could not be saved. Please, try again.', true));
				}
			}
		//end data processsing
		}else{
			$this->data = $this->Ad->read(null, $id);
		}
		//end submit button logic
		$this->loadModel('UsersLocation');
		$accessibleLocations = $this->UsersLocation->find('list', array('fields'=>array('location_id'), 'conditions'=>array('active'=>1,'hasaccess'=>1,'user_id'=>$this->Auth->User('id'))));
		
		
		
		$accessibleLocations = array_unique($accessibleLocations);
		if(isset($this->params['form']['ad'])){
			if($this->params['form']['ad'] == 'Search') {
				//find locations
				
				if ($this->data['Location']['zip'] == '' ){//&& $this->data['Location']['address1'] == '') {
					//search by geo
					$this->data['Location']['Location']=array();
					$dist = $this->data['Location']['dist'];
					$lat = $this->data['Location']['lat'];
					$lon = $this->data['Location']['lng'];
					//debug($lat);
					if($lat==''){
						$mapconditions = array('conditions'=>array('active'=>true),'order'=>array('user_id ASC'));
						$this->Session->setFlash(__('Please allow your browser to get your location.', true));
					}else{
						$mapconditions = array('conditions'=> array('((ACOS(SIN('.$lat.' * PI() / 180) * SIN(lat * PI() / 180) + COS('.$lat.' * PI() / 180) * COS(lat * PI() / 180) * COS(('.$lon.' - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) <=' => $dist, 'active' => true, 'OR'=>array('Location.id'=>$accessibleLocations,'public'=>1,'Location.user_id'=>$this->Auth->User('id')), 'OR'=>array('AND'=>array('width'=>0,'height'=>0),'AND'=>array('height'))),
														'fields' => array('((ACOS(SIN('.$lat.' * PI() / 180) * SIN(lat * PI() / 180) + COS('.$lat.' * PI() / 180) * COS(lat * PI() / 180) * COS(('.$lon.' - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) as distance', 'avgreachpermon', 'address1','address2','city','state','zip','height','width','description','lat','lng',  'name', 'active'),
														'order' => array('distance ASC')
														);
					
					$this->Session->setFlash(__('Here are locations close to you', true));
					}
				} else {
					
					//search by address
					$this->data['Location']['Location']=array();
					$arr = $this->data['Location'];
					$addressstr = '';
					/*
					foreach($arr as $id => $addressline){
						if($id != 'lat' && $id != 'lng')
						$addressstr = $addressstr.' '.$addressline;
					}
					$this->Geocoder->address = $addressstr;
					*/
					//debug($arr);
					$this->Geocoder->address = $arr['zip'];
					$loc = $this->Geocoder->geocode();
					$lat = $loc->latitude;
					$lon = $loc->longitude;
					$dist = $this->data['Location']['dist'];
					$mapconditions = array('conditions'=> array('((ACOS(SIN('.$lat.' * PI() / 180) * SIN(lat * PI() / 180) + COS('.$lat.' * PI() / 180) * COS(lat * PI() / 180) * COS(('.$lon.' - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) <=' => $dist, 'active' => true, 'OR'=>array('Location.id'=>$accessibleLocations, 'public'=>1,'Location.user_id'=>$this->Auth->User('id')),'OR'=>array('AND'=>array('width'=>0,'height'=>0),'AND'=>array('height'))),
														'fields' => array('((ACOS(SIN('.$lat.' * PI() / 180) * SIN(lat * PI() / 180) + COS('.$lat.' * PI() / 180) * COS(lat * PI() / 180) * COS(('.$lon.' - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) as distance','avgreachpermon', 'address1','address2','city','state','zip','height','width','description','lat','lng',   'name', 'active'),
														'order' => array('distance ASC')
														);
					
					
					$this->Session->setFlash(__('Here are locations close to that address.', true));
				}
			}
		}else{
			//no params['form']['ad'] exists
			$mapconditions = array('conditions'=>array('active'=>true, 'OR'=>array('AND'=>array('width'=>0,'height'=>0),'AND'=>array('height')), 'OR'=>array('Location.id'=>$accessibleLocations,'public'=>1,'Location.user_id'=>$this->Auth->User('id'))),'order'=>array('user_id ASC'));
		}
		
		//now that our map conditions are set...
		$totallocs = 0;
		//get the locations readable for the map
		$locationsarr = $this->Ad->Location->find('all', $mapconditions);
		foreach($locationsarr as $place){
						$loclist[$place['Location']['id']] = $place['Location']['name']; 
		}
		
		//get the total locations for the 
		if($id){
		
			$validlocations = $this->Ad->find('all', array('conditions'=>array('Ad.id'=>$id),'contain'=>array('Location'=>array('fields'=>array('id','avgreachpermon')))));
			//debug($validlocations);
				foreach($validlocations[0]['Location'] as $myloc){
					$totallocs += $myloc['avgreachpermon'];
				}
		}
		if(isset($loclist)){
			$locations = $loclist;
		}else{
			$this->Session->setFlash(__('No locations found.', true)); //what is this?
		}
		
		
		$userid = $this->Auth->User('id');
		//$categories = $this->Ad->Upload->find('list', array('conditions'=>array('user_id'=>$this->Auth->User('id'))));
		$uploads = $this->Ad->Upload->find('list', array('conditions'=>array('user_id'=>$this->Auth->User('id'))));
		$users = $this->Ad->User->find('list');
		$mylocations = $this->Ad->Location->find('list', array('conditions'=>array('OR'=>array('Location.id'=> $accessibleLocations, 'Location.user_id'=>$this->Auth->User('id')))));
		
		$this->set(compact('users', 'mylocations', 'locations', 'uploads', 'locationsarr', 'divlocations', 'totallocs', 'id', 'userid'));
		
	}
	
	
	
	function client_pay($id=null){
		//debug($this->params);
		$total = Configure::read('total');
		Configure::delete('total');
		//after set locations we want to come to the page
		$this->loadModel('Pricetiers');
		$user = $this->Auth->User();
		$userid = $user['User']['id'];
		if(is_null($id)){
			$ad = $this->Ad->find('first', array('order'=>array('Ad.created DESC'), 'conditions'=>array('Ad.user_id'=>$userid)));
		}else{
			$ad = $this->Ad->find('first', array('conditions'=>array('Ad.id'=>$id)));
		}
		//check if there was an error
		if (!empty($this->BraintreeCallback->braintree_error)) {
			//debug('error');
			 $this->Session->setFlash(
				  nl2br($this->BraintreeCallback->braintree_error),
				  'error'
			 );
			 $this->redirect(array('action' => $this->params['action']));
		} 
		//set or create customer id
		$this->loadModel('Braintree.BraintreeCustomer');	 
		$braintree_customer_id = $this->BraintreeCustomer->getOrCreateCustomerId(
			 'User', // A model in your app that you want to associate the Braintree customer with
			 $user['User']['id'], // A foreign_id in your app that you want to associate the Braintree customer with
			 array(
				 'first_name' => $user['User']['username'],
				 'email' => $user['User']['email'],
			 )
		 );
		 $this->loadModel('Referralcredit');
		 $credit = $this->Referralcredit->find('all', array('conditions'=>array('Referralcredit.used '=> 0, 'Referralcredit.user_id'=>$this->Auth->User('id'), 'Date_Add(Referralcredit.created, INTERVAL Usercredits.expire DAY) >'=>date('Y-m-d')), 
		 													'group'=>array('Referralcredit.user_id'), 
															'fields'=>array('sum(Referralcredit.amt) as total'),
															'joins' => array(
																 array( 
																		   'table' => 'usercredits', 
																		   'alias' => 'Usercredits', 
																		   'type' => 'inner',  
																		  
																		   'conditions'=> array('Usercredits.id = Referralcredit.usercredits_id')
																	   ))
		 ));
		 $userid = $this->Auth->User('id');
		 $this->set(compact('user', 'ad','braintree_customer_id', 'userid', 'credit'));
			
	}
	
	function client_updateevent(){	
		$ad = $this->Ad->find('first', array('order'=>array('created DESC'), 'conditions'=>array('Ad.user_id'=>$userid)));
		//$this->Session->setFlash(__('Send to auto pay.', true));
		//$adid = $this->data['Ad']['id'];
		$stdate = $this->Session->read('stdate');
		$eddate = $this->Session->read('eddate');
		
		$this->data['Event']['ad_id'] = $adid;
		$otherdata = $this->Ad->find('first', array( 'conditions'=> array('Ad.id'=> $adid)));
		if($otherdata['Ad']['upload_id']!=0){
			//media add
			$this->data['Event']['event_type_id'] = 1;
		}else{
			//text ad
			$this->data['Event']['event_type_id'] = 2;
		}
		
		
		$this->data['Event']['title'] = $otherdata['Ad']['name'];
		if($otherdata['Ad']['upload_id']!=0){
			//media add
			$this->data['Event']['details'] = '<img src="http://erp.blabfeed.com/'.$otherdata['Ad']['Upload']['name'].' height="200px" width="200px" />';
		}else{
			//text ad
			$this->data['Event']['details'] = $otherdata['Ad']['messagetxt'];
		}
		
		$this->data['Event']['start'] = $stdate;
		$this->data['Event']['end'] = $eddate;
		$this->data['Event']['all_day'] = 0;
		$this->data['Event']['active'] = 1;
		
		$this->Ad->Event->create();
		if($this->Ad->Event->save($this->data['Event'])){
		
		}else{
			$this->Session->setFlash(__('The ad could not be saved. Please, try again.', true));
			//debug($otherdata);
		};
		$this->set(compact('user', 'ad','braintree_customer_id'));
	}
	
	
	function client_deloutbox($id=null){
		
		$this->autoRender = false;
		if (!$id) {
			$this->Session->setFlash(__('Invalid ad', true));
			$this->redirect(array('action' => 'client_outbox'));
		}
		$this->data = $this->Ad->read(null, $id);
		//debug($this->data);
		if (!empty($this->data)) {
			
			$this->data['Ad']['outboxdel']=1;
			if ($this->Ad->save($this->data)) {
				$this->Session->setFlash(__('The ad has been saved', true));
				$this->redirect(array('action' => 'client_outbox'));
			} else {
				$this->Session->setFlash(__('The ad could not be saved. Please, try again.', true));
			}
		}
	}
	
	function client_activate($id=null){
		//activate the ad
		$userid = $this->Auth->User('id');
		$ad = $this->Ad->find('first', array('order'=>array('Ad.created DESC'), 'conditions'=>array('Ad.user_id'=>$userid)));
		$this->data['User']['id'] = $this->Auth->User('id');
		$this->data['User']['subscription'] = 1;
		
		if($this->Ad->User->save($this->data)){
			$user = $this->Ad->User->findById($userid);
			unset($this->data['User']);
			$refuser = $this->Ad->User->findById($user['User']['userrefid']);
			$refuser = $refuser['User']['id'];
			$this->loadModel('Usercredit');
			$this->loadModel('Referralcredit');
			//debug($refuser);
			$usercreditamt = $this->Usercredit->findByType('referral');
			$creditamt = $usercreditamt['Usercredit']['amt'];
			
			//search for created credit
			$record = $this->Referralcredit->find('first', array('conditions'=>array('user_id'=>$this->Auth->User('id'),'referralid'=>$refuser)));
			//debug($record);
			if(empty($record['Referralcredit']) && !is_null($refuser)){
				
				//debug('not empty');
				//debug($record);
				$this->Referralcredit->create();
				$refdata = array('Referralcredit'=>array('user_id'=>$refuser,'referralid'=>$this->Auth->User('id'),'amt'=>$creditamt,'used'=>0,'usercredits_id'=>$usercreditamt['Usercredit']['id']));
				if($this->Referralcredit->save($refdata)){
					
					//
					//debug($refdata);
					//$this->Session->setFlash(__('Referral saved.', true));
				}else{
					//$this->Session->setFlash(__('Referral not saved.', true));
				}
			}else{
				//$this->Session->setFlash(__('Existing referral.', true));
			}
				
			$this->_refreshAuth();
			$this->data['Ad']['id'] = $ad['Ad']['id'];	
			$this->data['Ad']['approved'] = 1;
			if($this->Ad->save($this->data)){
				if(is_null($id)){
					$adslocations = $this->Ad->find('all', array('order'=>array('Ad.created DESC'), 'conditions'=>array('Ad.user_id'=>$userid)));
				}else{
					$adslocations = $this->Ad->find('all', array('conditions'=>array('Ad.id'=>$id)));
				}

				foreach($adslocations[0]['AdsLocations'] as $location){
					$adlocations[] = $location['location_id'];
				}
				$locationid = array_unique($adlocations);
				$userdata = $this->Ad->Location->find('all', array('group'=>'user_id', 'conditions'=>array('Location.id'=> $locationid)));
				foreach($userdata as $user){
						
						//debugger::dump($user['User']['email']);
						//$this->Email->delivery = 'debug';
						$email = $user['User']['email'];
						$this->Email->to = $email;
						$this->Email->subject = 'Someone has uploaded an ad to '.$user['Location']['name'].'!';
						$this->Email->replyTo = 'info@blabfeed.com';
						$this->Email->from = 'Blabfeed Support <info@blabfeed.com';
						$this->Email->template = 'checkads'; // note no '.ctp'
						//Send as 'html', 'text' or 'both' (default is 'text')
						$this->Email->sendAs = 'both'; // because we like to send pretty mail
						//Set view variables as normal
						//$this->set('user', $user);
						$this->set('ad', $ad);
						$this->set('user', $user);
						//Do not pass any args to send()
						$this->Email->send();
						$this->Email->reset();
				}
				
						//debugger::dump($user['User']['email']);
						//$this->Email->delivery = 'debug';
						$email = 'blabfeed@gmail.com';
						$this->Email->to = $email;
						$this->Email->subject = $this->Auth->User('username').' has uploaded an ad!';
						$this->Email->from = 'Blabfeed Support <info@blabfeed.com>';
						$this->Email->template = 'admin_adaddedbill'; // note no '.ctp'
						//Send as 'html', 'text' or 'both' (default is 'text')
						$this->Email->sendAs = 'both'; // because we like to send pretty mail
						//Set view variables as normal
						$this->set('User', $user);
						//Do not pass any args to send()
						
						$locationsstr = '';
						foreach($locationid as $location){
								$locationsstr = $locationsstr.$location.'<br />';
						}
						$this->set('locationdata', $locationsstr);
						$this->Email->send();
						$this->Email->reset();
				/* OLD SUBSCRIPTION	
				
				$this->loadModel('Braintree.BraintreeCustomer');
				$this->loadModel('Braintree.BraintreeCreditCard');	
				$btcustomer = $this->BraintreeCustomer->getOrCreateCustomerId(
						 'User', // A model in your app that you want to associate the Braintree customer with
						 $userid // A foreign_id in your app that you want to associate the Braintree customer with
				);
				
				$btcc = $this->BraintreeCreditCard->find('first', array('conditions'=>array('BraintreeCreditCard.braintree_customer_id'=>$btcustomer)));
				
						
				$this->loadModel('Braintree.BraintreeSubscription');
				$dat = array(
					 'BraintreeSubscription' => array(
						   'braintree_customer_id' => $btcustomer,
						   'braintree_credit_card_id' => $btcc['BraintreeCreditCard']['token'],
						   'model' => 'Ad', // A model in your app that you want to associate the Braintree vault record with
						   'foreign_id' => 1, // A foreign_id in your app that you want to associate the Braintree transaction with
						   'amount' => '0.01',
						   'planId'=>'testpackage',
						   'type'=>'whacky'
					 )
				);
				
				
				$result = $this->BraintreeSubscription->save($dat);	   
			*/
			
			//create manual subscription
			$this->loadModel('Braintree.BraintreeCustomer');
			$this->loadModel('Braintree.BraintreeCreditCard');	
			$btcustomer = $this->BraintreeCustomer->getOrCreateCustomerId(
					 'User', // A model in your app that you want to associate the Braintree customer with
					 $userid // A foreign_id in your app that you want to associate the Braintree customer with
			);
			
			$btcc = $this->BraintreeCreditCard->find('first', array('conditions'=>array('BraintreeCreditCard.braintree_customer_id'=>$btcustomer)));
			$todayDate = date("Y-m-d");
			$dat = array(
					 'BraintreeSubscription' => array(
					 	   'id'=>$btcustomer.'manual',
						   'braintree_customer_id' => $btcustomer,
						   'braintree_credit_card_id' => $btcc['BraintreeCreditCard']['token'],
						   'model' => 'Ad', // A model in your app that you want to associate the Braintree vault record with
						   'foreign_id' => $id, // A foreign_id in your app that you want to associate the Braintree transaction with
						   'billingDayOfMonth'=>date('d'),
						   'billingPeriodEndDate'=>strtotime(date('Y-m-d', strtotime($todayDate)) . "+1 month"),
						   'billingPeriodStartDate'=>date('Y-m-d'),
						   'daysPastDue'=>0,
						   'neverExpires'=>1,
						   'nextBillingAmt'=>.01,
						   'trialDuration'=>0,
						   'trialPeriod'=>0,
						   'paidThroughDate'=>strtotime(date('Y-m-d', strtotime($todayDate)) . "+1 month"),
						   'amount' => '0.01',
						   'failureCount'=>0,
						   'planId'=>'',
						   'type'=>'manual',
						   'status'=>''
					 )
				);
				 
			$this->loadModel('Braintree.BraintreeSubscription');
			$result = $this->BraintreeSubscription->save($dat);
		
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
		
		
				
				$this->redirect(array('action' => 'client_outbox'));
			}else{
				$this->Session->setFlash(__('The ad could not be activated. Please, try again.', true));
				$this->redirect(array('action' => 'client_pay'));
			}
		}else{
			//user could not be subscribed
		}
	}
	
	function client_charge(){
		//card stored
		
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
	/*
		$this->loadModel('Braintree.BraintreeSubscription');
		$dat = array(
			 'BraintreeSubscription' => array(
				   'braintree_customer_id' => $btcustomer,
				   'braintree_credit_card_id' => $btcc['BraintreeCreditCard']['token'],
				   'model' => 'Ad', // A model in your app that you want to associate the Braintree vault record with
				   'foreign_id' => 1, // A foreign_id in your app that you want to associate the Braintree transaction with
				   'amount' => '0.01',
				   'planId'=>'cnr2',
				   'type'=>'whacky'
			 )
		);
		
		$result = $this->BraintreeSubscription->blah($dat);
		
		*/
		$result = ClassRegistry::init('Braintree.BraintreeSubscription')->blah(array(
			 'BraintreeSubscription' => array(
				   'braintree_customer_id' => $btcustomer,
				   'braintree_credit_card_id' => $btcc['BraintreeCreditCard']['token'],
				   'model' => 'Ad', // A model in your app that you want to associate the Braintree vault record with
				   'foreign_id' => 1, // A foreign_id in your app that you want to associate the Braintree transaction with
				   'amount' => '0.01',
				   'planId'=>'testpackage',
				   'type'=>'whacky'
			 )
		));
	
		debug( $result);
	
	}
	


	function client_delete($id = null) {
		
		$this->data = $this->Ad->read(null, $id);
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ad', true));
			$this->redirect(array('action'=>'index'));
		}
		if($this->data['Ad']['user_id'] != $this->Auth->User('id')){
				$this->Session->setFlash(__('You cannot delete another user\'s ad.  You can only deny or accept it.', true));
				$this->redirect(array('action' => 'index'));
		}
		if ($this->Ad->delete($id)) {
			$this->Session->setFlash(__('Ad deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ad was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>