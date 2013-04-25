<?php
class UploadsController extends AppController {

	var $name = 'Uploads';
	
  	var $helpers = array('Html', 'Form'); 
  	var $components = array('FileUpload'); 
   
	function admin_add() { 
		
		if(!empty($this->data)){ 
		//debug($this->data);
		  if($this->FileUpload->success){
			
			$this->set('photo', $this->FileUpload->finalFile);
			//debugger::dump($this->data['Location']['Location']);
			$this->data['Ad']['upload_id'] = $this->Upload->id;
			//if($this->Upload->saveAll($this->data)){   
				if($this->Upload->Ad->Save($this->data['Ad'])){ 
					$this->redirect(array('controller'=>'ads', 'action' => 'client_editloc', $this->Upload->Ad->id));
				//}
			}
		  }else{ 
			$this->Session->setFlash($this->FileUpload->showErrors()); 
		  } 
		} 
		$user = $this->Auth->User('id');
		$locations = $this->Upload->Ad->Location->find('list');
		$this->set(compact('user', 'locations'));
	} 
	/*process:
	Upload Ad (SUBMIT)
		-if user has already uploaded one ad, but not given their credit card, send them to the pay screen first
		-saves the upload and new ad, should pass the ad ID.
	ASSIGN LOCATIONS (SUBMIT)
		-after save pass the ad ID
	PAY SCREEN/REVIEW ORDER 
		-if 
	CHARGE SCREEN AND ACTIVATE (SUBMIT)
	*/
	
	function client_add($id = null) { 
	//debug($this->data);
	
	
	//check for freeloaders!
		//if(($this->Auth->User('firstupload')=='0' && $this->Auth->User('subscription')=='0') || ($this->Auth->User('firstupload')=='1' && $this->Auth->User('subscription')=='1')){
			//if they had been interrupted after assigning locations forward them to add locations
			$uploadedads = $this->Upload->Ad->find('first', array('conditions'=>array('Ad.user_id'=>$this->Auth->User('id'))));
			if($uploadedads && ($this->Auth->User('firstupload')=='0' && $this->Auth->User('subscription')=='0')){
				$this->redirect(array('controller'=>'ads', 'action' => 'client_editloc', $uploadedads['Ad']['id']));
			}
			
			//process data
			if(!empty($this->data)){ 
			//debug($this->data);
				if(($this->data['Upload']['file']['name'] == '' && $this->data['Ad']['messagetxt'] == '')){
					$this->Session->setFlash('Please ad media or a text ad.');
				}else{
					//check for ad type
					if($this->data['Upload']['file']['name'] != '' && $this->data['Ad']['messagetxt'] != ''){
						//used both ad and text, error out
						$this->Session->setFlash('Please choose only text or media');
						$this->data['Ad']['messagetxt'] = ''; 
						
					}elseif($this->data['Upload']['file']['name'] != ''){
					//they chose add and did not have both filled
						if($this->FileUpload->success){
							//try uploading the file...
							$size = getimagesize('../webroot/files/'.$this->FileUpload->finalFile);
							//debug($this->FileUpload->finalFile);
							//
							//if($size['0']/$size['1']  != 16/9){
							//	//show editor
							//	$show = 1;
							//	$this->set('editor', $show);
							//	$this->Session->setFlash('Your ad could not be saved, it must be a 16:9 aspect ratio.');
							//	$this->redirect(array('action'=>'client_add'));
							//}
							$this->set('editor', 0);
							$this->set('photo', $this->FileUpload->finalFile);
							$this->data['Ad']['upload_id'] = $this->Upload->id;
							//check to see if they want to have perpetual ads
							if($this->data['Ad']['perpetual'] == true){
								//clear the data data, they chose perpetual
								unset($this->data['Ad']['startdate']);
								unset($this->data['Ad']['enddate']);
							}else{
								//set the date ranges.  The date picker is a picky formatter
								$stdate = array('month'=> date('m', strtotime($this->data['Ad']['startdatem'])), 'day'=>date('d', strtotime($this->data['Ad']['startdatem'])), 'year'=>date('Y', strtotime($this->data['Ad']['startdatem'])));
								$eddate = array('month'=> date('m', strtotime($this->data['Ad']['enddatem'])), 'day'=>date('d', strtotime($this->data['Ad']['enddatem'])), 'year'=>date('Y', strtotime($this->data['Ad']['enddatem'])));
								$this->data['Ad']['startdate'] = $stdate;
								$this->data['Ad']['enddate'] = $eddate;
							}
								if($this->Upload->Ad->Save($this->data['Ad'])){ 
									$this->redirect(array('controller'=>'ads', 'action' => 'client_editloc', $this->Upload->Ad->id));
								}else{
									$this->Session->setFlash('Your ad could not be saved.');
								}
						}else{ 
						  //the file failed to upload.
							$this->Session->setFlash($this->FileUpload->showErrors()); 
						}
					//end file type addition
					}else{
						//chose text
						//debug($this->data);
						if($this->data['Ad']['perpetual'] == true){
							unset($this->data['Ad']['startdate']);
							unset($this->data['Ad']['enddate']);
						}else{
							$stdate = array('month'=> date('m', strtotime($this->data['Ad']['startdatem'])), 'day'=>date('d', strtotime($this->data['Ad']['startdatem'])), 'year'=>date('Y', strtotime($this->data['Ad']['startdatem'])));
							$eddate = array('month'=> date('m', strtotime($this->data['Ad']['enddatem'])), 'day'=>date('d', strtotime($this->data['Ad']['enddatem'])), 'year'=>date('Y', strtotime($this->data['Ad']['enddatem'])));
							$this->data['Ad']['startdate'] = $stdate;
							$this->data['Ad']['enddate'] = $eddate;
							//debug($this->data);
						}
						if($this->Upload->Ad->Save($this->data['Ad'])){ 
							$this->redirect(array('controller'=>'ads', 'action' => 'client_editloc', $this->Upload->Ad->id));
						}
					//end text addition
					}
				}
			//end data submitted	
			}else{
				//check for old started ads
				$ad = $this->Upload->Ad->find('first', array('order'=>array('Ad.created DESC'), 'conditions'=>array('Ad.user_id'=>$this->Auth->User('id'))));
			}
		//}else{
		//	$this->Session->setFlash('You have already uploaded an Ad or location, please setup your account.');
			//get ad or location id 
		//	$this->redirect(array('controller'=>'ads', 'action'=>'client_pay' ));
		//}
		//set non data submit variables
		$categories = $this->Upload->Ad->Category->generatetreelist(array('parent_id'=>210), null, null, '-');
		//$categories[''] = '--Please Select--';
		if($id){
				$this->data = $this->Upload->Ad->find('all', array('conditions'=>array('Ad.id'=>$id)));
			}
		$this->set('editor', 0);
		$user = $this->Auth->User('id');
		$locations = $this->Upload->Ad->Location->find('list');
		$this->set(compact('user', 'locations','categories'));
	} 
	
	
	///OLD DEV FUNCTION NOT USED IN PRODUCTION.  FOR MEDIA UPLOAD ONLY!!!!
	/*
	function client_add(){
		$this->layout="insertmedia";
		if(!empty($this->data)){ 
			if($this->FileUpload->success){
				//try uploading the file...
				$size = getimagesize('../webroot/files/'.$this->FileUpload->finalFile);
				//debug($this->FileUpload->finalFile);
				//
				//if($size['0']/$size['1']  != 16/9){
				//	//show editor
				//	$show = 1;
				//	$this->set('editor', $show);
				//	$this->Session->setFlash('Your ad could not be saved, it must be a 16:9 aspect ratio.');
				//	$this->redirect(array('action'=>'client_add'));
				//}
				$this->set('editor', 0);
				$this->set('photo', $this->FileUpload->finalFile);
			}else{ 
			  //the file failed to upload.
				$this->Session->setFlash($this->FileUpload->showErrors()); 
			}
		}
		$user = $this->Auth->User('id');
		$this->set(compact('user'));
	}
	*/
	
	function client_download ($id) {
        $this->view = 'Media';
		//$this->layout = '';
        $this->data = $this->Upload->read(null, $id);
		$params = array(
              'id' => $this->data['Upload']['name'],
              'name' => $this->data['Upload']['name'],
              'download' => true,
              'extension' => strtolower(substr($this->data['Upload']['name'], -3)),  // must be lower case
              'path' => APP . 'webroot/files' . DS   // don't forget terminal 'DS'
       );
       $this->set($params);
	   //$this->redirect(array('action' => 'index'));
    }

	function index() {
		$this->Upload->recursive = 0;
		$this->set('uploads', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid upload', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('upload', $this->Upload->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Upload->create();
			if ($this->Upload->save($this->data)) {
				$this->Session->setFlash(__('The upload has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The upload could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid upload', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Upload->save($this->data)) {
				$this->Session->setFlash(__('The upload has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The upload could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Upload->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for upload', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Upload->delete($id)) {
			$this->Session->setFlash(__('Upload deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Upload was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Upload->recursive = 0;
		$this->set('uploads', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid upload', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('upload', $this->Upload->read(null, $id));
	}

	

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid upload', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Upload->save($this->data)) {
				$this->Session->setFlash(__('The upload has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The upload could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Upload->read(null, $id);
		}
		
	}
	


	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for upload', true));
			$this->redirect(array('action'=>'index'));
		}
		$upload = $this->Upload->findById($id); 
		if($this->FileUpload->removeFile($upload['Upload']['name'])){ 
		  if($this->Upload->delete($id)){ 
			$this->Session->setFlash('Upload deleted'); 
			$this->redirect(array('action'=>'index')); 
		  } 
		 
			
			$this->Session->setFlash(__('Upload deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Upload was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function client_index() {
		$this->Upload->recursive = 0;
		$this->paginate = array('conditions'=>array('Upload.user_id'=>$this->Auth->User('id')));
		$this->set('uploads', $this->paginate());
	}
	
	function client_insert() {
		$this->layout = 'insertmedia';
		$this->Upload->recursive = 0;
		$this->paginate = array('order'=>array('Upload.created DESC'), 'conditions'=>array('Upload.user_id'=>$this->Auth->User('id')));
		$this->set('uploads', $this->paginate());
	}

	function client_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid upload', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('upload', $this->Upload->read(null, $id));
	}

	

	function client_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid upload', true));
			$this->redirect(array('action' => 'client_add'));
		}
		if(($this->Auth->User('firstupload')=='0' && $this->Auth->User('subscription')=='0') || ($this->Auth->User('firstupload')=='1' && $this->Auth->User('subscription')=='1')){
			//if they had been interrupted after assigning locations forward them to add locations
			$uploadedads = $this->Upload->Ad->find('first', array('conditions'=>array('Ad.user_id'=>$this->Auth->User('id'))));
			if($uploadedads && ($this->Auth->User('firstupload')=='0' && $this->Auth->User('subscription')=='0')){
				$this->redirect(array('controller'=>'ads', 'action' => 'client_editloc', $uploadedads['Ad']['id']));
			}
			
			//process data
			if(!empty($this->data)){ 
			//debug($this->data);
				if(($this->data['Upload']['file']['name'] == '' && $this->data['Ad']['messagetxt'] == '')){
					$this->Session->setFlash('Please ad media or a text ad.');
				}else{
					//check for ad type
					if($this->data['Upload']['file']['name'] != '' && $this->data['Ad']['messagetxt'] != ''){
						//used both ad and text, error out
						$this->Session->setFlash('Please choose only text or media');
						$this->data['Ad']['messagetxt'] = ''; 
						
					}elseif($this->data['Upload']['file']['name'] != ''){
					//they chose add and did not have both filled
						if($this->FileUpload->success){
							//try uploading the file...  
							$this->set('photo', $this->FileUpload->finalFile);
							$this->data['Ad']['upload_id'] = $this->Upload->id;
							//check to see if they want to have perpetual ads
							if($this->data['Ad']['perpetual'] == true){
								//clear the data data, they chose perpetual
								unset($this->data['Ad']['startdate']);
								unset($this->data['Ad']['enddate']);
							}else{
								//set the date ranges.  The date picker is a picky formatter
								$stdate = array('month'=> date('m', strtotime($this->data['Ad']['startdatem'])), 'day'=>date('d', strtotime($this->data['Ad']['startdatem'])), 'year'=>date('Y', strtotime($this->data['Ad']['startdatem'])));
								$eddate = array('month'=> date('m', strtotime($this->data['Ad']['enddatem'])), 'day'=>date('d', strtotime($this->data['Ad']['enddatem'])), 'year'=>date('Y', strtotime($this->data['Ad']['enddatem'])));
								$this->data['Ad']['startdate'] = $stdate;
								$this->data['Ad']['enddate'] = $eddate;
							}
								if($this->Upload->Ad->Save($this->data['Ad'])){ 
									$this->redirect(array('controller'=>'ads', 'action' => 'client_editloc', $this->Upload->Ad->id));
								}else{
									$this->Session->setFlash('Your ad could not be saved.');
								}
						}else{ 
						  //the file failed to upload.
							$this->Session->setFlash($this->FileUpload->showErrors()); 
						}
					//end file type addition
					}else{
						//chose text
						//debug($this->data);
						if($this->data['Ad']['perpetual'] == true){
							unset($this->data['Ad']['startdate']);
							unset($this->data['Ad']['enddate']);
						}else{
							$stdate = array('month'=> date('m', strtotime($this->data['Ad']['startdatem'])), 'day'=>date('d', strtotime($this->data['Ad']['startdatem'])), 'year'=>date('Y', strtotime($this->data['Ad']['startdatem'])));
							$eddate = array('month'=> date('m', strtotime($this->data['Ad']['enddatem'])), 'day'=>date('d', strtotime($this->data['Ad']['enddatem'])), 'year'=>date('Y', strtotime($this->data['Ad']['enddatem'])));
							$this->data['Ad']['startdate'] = $stdate;
							$this->data['Ad']['enddate'] = $eddate;
							//debug($this->data);
						}
						if($this->Upload->Ad->Save($this->data['Ad'])){ 
							$this->redirect(array('controller'=>'ads', 'action' => 'client_editloc', $this->Upload->Ad->id));
						}
					//end text addition
					}
				}
			//end data submitted	
			}else{
				//check for old started ads
				$ad = $this->Upload->Ad->find('first', array('order'=>array('Ad.created DESC'), 'conditions'=>array('Ad.user_id'=>$this->Auth->User('id'))));
			}
		}else{
			$this->Session->setFlash('You have already uploaded an Ad or location, please setup your account.');
			//get ad or location id 
			$this->redirect(array('controller'=>'ads', 'action'=>'client_pay' ));
		}
		//set non data submit variables
		$categories = $this->Upload->Ad->Category->generatetreelist(array('parent_id'=>210), null, null, '-');
		//$categories[''] = '--Please Select--';
		if (empty($this->data)) {
				//$this->data = $this->Upload->Ad->find('all', array('conditions'=>array('Ad.id'=>$id)));
				//debug('hey');
				$uploadid = $this->Upload->Ad->find('first', array('conditions'=>array('Ad.id'=>$id)));
				
				if($uploadid['Ad']['upload_id'] != 0){
					$this->data = $this->Upload->read(null, $uploadid['Ad']['upload_id']);
				}else{
					$this->data = $uploadid;
				}
		}
		$user = $this->Auth->User('id');
		$locations = $this->Upload->Ad->Location->find('list');
		$this->set(compact('user', 'locations','categories'));
		
		
	}
	


	function client_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for upload', true));
			$this->redirect(array('action'=>'index'));
		}
		$upload = $this->Upload->findById($id); 
		if($this->FileUpload->removeFile($upload['Upload']['name'])){ 
		  if($this->Upload->delete($id)){ 
			$this->Session->setFlash('Upload deleted'); 
			$this->redirect(array('action'=>'index')); 
		  } 
		 
			
			$this->Session->setFlash(__('Upload deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Upload was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>