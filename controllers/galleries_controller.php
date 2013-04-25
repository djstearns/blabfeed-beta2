<?php
class GalleriesController extends AppController {
 
	var $name = 'Galleries';
	var $components = array('RequestHandler');
 
	function admin_add() {
		$this->layout = 'uploadgallery';
		if (!empty($this->data)) {
			if ($this->Gallery->save($this->data)) {
				//debug($this->data);
				$result = '<div id="status">success</div>';
				$result .= '<div id="message">Successfully Uploaded<br /><img height="100" widht="100" src="http://dev.blabfeed.com/media/transfer/img/'.$this->data['Gallery']['file']['name'].'" /></div><div id="upload_data">'.json_encode($this->data['Gallery']['file']).'</div>';
			} else {
				$result = "<div id='status'>error</div>";
				$result .= '<div id="message">'. $this->Gallery->validationErrors['file'] .'</div>';
			}
 
			$this->RequestHandler->renderAs($this, 'ajax');
			$this->set('result', $result);
			$this->render('../elements/ajax');
		}
	}
 
}
?>