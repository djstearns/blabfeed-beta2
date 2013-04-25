<?php
/**
 * Settings Controller
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
class SettingsController extends AppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
    public $name = 'Settings';
/**
 * Models used by the Controller
 *
 * @var array
 * @access public
 */
    public $uses = array('Setting');
/**
 * Helpers used by the Controller
 *
 * @var array
 * @access public
 */
    public $helpers = array('Html', 'Form');

    public function admin_dashboard() {
        $this->set('title_for_layout', __('Dashboard', true));
		
   		 
    }
	
	 public function client_dashboard() {
		 $this->recursive = 0;
		 $this->loadModel('Location');
		 $this->loadModel('Ad');
		 $this->loadModel('Referralcredit');
		 
		 $locations = $this->Location->find('all', array('conditions'=>array('Location.user_id'=>$this->Auth->User('id'))));
		 $ads = $this->Ad->find('all', array('conditions'=>array('Ad.user_id'=>$this->Auth->User('id'))));
		 
		 $locationids = $this->Location->find('list', array('fields'=>array('id'), 'conditions'=>array('Location.user_id'=>$this->Auth->User('id'))));
		 $adids = $this->Ad->find('list', array('fields'=>array('id'), 'conditions'=>array('Ad.user_id'=>$this->Auth->User('id'), 'Ad.outboxdel'=>0)));
		
		 $mylocaladslocationids = $this->Ad->AdsLocation->find('list', array('fields'=>array('location_id'), 'conditions'=>array('ad_id'=>$adids, 'AdsLocation.approved'=>1, 'AdsLocation.location_id'=>$locationids)));
		 $mylocaladsapproved = count($mylocaladslocationids);
		 $mylocaladspending = $this->Ad->AdsLocation->find('count', array('conditions'=>array('ad_id'=>$adids,'AdsLocation.approved'=>0), 'AdsLocation.location_id'=>$locationids));
		 
		 $mynetworkadslocationids = $this->Ad->AdsLocation->find('list', array('fields'=>array('location_id'), 'conditions'=>array('ad_id'=>$adids,'AdsLocation.approved'=>1, 'NOT'=>array('AdsLocation.location_id'=>$locationids))));
		 $mynetworkadsapproved = count( $mynetworkadslocationids);
		 $mynetworkadspending = $this->Ad->AdsLocation->find('count', array('conditions'=>array('ad_id'=>$adids,'AdsLocation.approved'=>0, 'NOT'=>array('AdsLocation.location_id'=>$locationids))));
		 
		 
		 $myactivelocations = $this->Location->find('count', array('conditions'=>array('Location.user_id'=>$this->Auth->User('id'), 'active'=>1)));
		 
		 $myinactivelocations = $this->Location->find('count', array('conditions'=>array('Location.user_id'=>$this->Auth->User('id'), 'active'=>0)));
		 $mypubliclocations = $this->Location->find('count', array('conditions'=>array('Location.user_id'=>$this->Auth->User('id'), 'public'=>1)));
		 
		 $totalestpublicreach =  $this->Location->find('all', array('fields'=>array('sum(avgreachpermon) as totreach'), 'conditions'=>array('Location.user_id'=>$this->Auth->User('id'), 'public'=>1)));
		
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
		 
		 
		
		 $mylocaladsestreach = $this->Ad->Location->find('all', array('fields'=>array('sum(avgreachpermon) as totreach'), 'conditions'=>array('Location.id'=>$mylocaladslocationids)));
		 if(empty($mylocaladsestreach[0][0]['totreach'])){
		 	$mylocaladsestreach[0][0]['totreach'] = 0;
		 }
		 $mynetworkadsestreach = $this->Ad->Location->find('all', array('fields'=>array('sum(avgreachpermon) as totreach'), 'conditions'=>array('Location.id'=>$mynetworkadslocationids)));
		 if(empty( $mynetworkadsestreach[0][0]['totreach'])){
			 
		 	 $mynetworkadsestreach[0][0]['totreach'] = 0;
		 }
		 $this->set(compact('ads', 'locations', 'credit', 'mylocaladsapproved', 'mylocaladspending', 'mylocaladsestreach', 'mynetworkadsapproved', 'mynetworkadspending', 'mynetworkadsestreach', 'myactivelocations', 'myinactivelocations', 'mypubliclocations', 'totalestpublicreach'));
		/* $this->set('response', $this->Linkedin->call('people/~',
                                                     array(
                                                          'id',
                                                          'picture-url',
                                                          'first-name', 'last-name', 'summary', 'specialties', 'associations', 'honors', 'interests', 'twitter-accounts',
                                                          'positions' => array('title', 'summary', 'start-date', 'end-date', 'is-current', 'company'),
                                                          'educations',
                                                          'certifications',
                                                          'skills' => array('id', 'skill', 'proficiency', 'years'),
                                                          'recommendations-received',
                                                     )));
      */
       
        $this->set('title_for_layout', __('Dashboard', true));
    }
	
	 public function employee_dashboard() {
        $this->set('title_for_layout', __('Dashboard', true));
    }

    public function admin_index() {
        $this->set('title_for_layout', __('Settings', true));

        $this->Setting->recursive = 0;
        $this->paginate['Setting']['order'] = "Setting.weight ASC";
        if (isset($this->params['named']['p'])) {
            $this->paginate['Setting']['conditions'] = "Setting.key LIKE '". $this->params['named']['p'] ."%'";
        }
        $this->set('settings', $this->paginate());
    }

    public function admin_view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid Setting.', true), 'default', array('class' => 'error'));
            $this->redirect(array('action'=>'index'));
        }
        $this->set('setting', $this->Setting->read(null, $id));
    }

    public function admin_add() {
        $this->set('title_for_layout', __('Add Setting', true));

        if (!empty($this->data)) {
            $this->Setting->create();
            if ($this->Setting->save($this->data)) {
                $this->Session->setFlash(__('The Setting has been saved', true), 'default', array('class' => 'success'));
                $this->redirect(array('action'=>'index'));
            } else {
                $this->Session->setFlash(__('The Setting could not be saved. Please, try again.', true), 'default', array('class' => 'error'));
            }
        }
    }

    public function admin_edit($id = null) {
        $this->set('title_for_layout', __('Edit Setting', true));

        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid Setting', true), 'default', array('class' => 'error'));
            $this->redirect(array('action'=>'index'));
        }
        if (!empty($this->data)) {
            if ($this->Setting->save($this->data)) {
                $this->Session->setFlash(__('The Setting has been saved', true), 'default', array('class' => 'success'));
                $this->redirect(array('action'=>'index'));
            } else {
                $this->Session->setFlash(__('The Setting could not be saved. Please, try again.', true), 'default', array('class' => 'error'));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Setting->read(null, $id);
        }
    }

    public function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for Setting', true), 'default', array('class' => 'error'));
            $this->redirect(array('action'=>'index'));
        }
        if (!isset($this->params['named']['token']) || ($this->params['named']['token'] != $this->params['_Token']['key'])) {
            $blackHoleCallback = $this->Security->blackHoleCallback;
            $this->$blackHoleCallback();
        }
        if ($this->Setting->delete($id)) {
            $this->Session->setFlash(__('Setting deleted', true), 'default', array('class' => 'success'));
            $this->redirect(array('action'=>'index'));
        }
    }

    public function admin_prefix($prefix = null) {
        $this->set('title_for_layout', sprintf(__('Settings: %s', true), $prefix));

        if(!empty($this->data) && $this->Setting->saveAll($this->data['Setting'])) {
            $this->Session->setFlash(__("Settings updated successfully", true), 'default', array('class' => 'success'));
        }

        $settings = $this->Setting->find('all', array(
            'order' => 'Setting.weight ASC',
            'conditions' => array(
                'Setting.key LIKE' => $prefix . '.%',
                'Setting.editable' => 1,
            ),
        ));
            //'conditions' => "Setting.key LIKE '".$prefix."%'"));
        $this->set(compact('settings'));

        if( count($settings) == 0 ) {
            $this->Session->setFlash(__("Invalid Setting key", true), 'default', array('class' => 'error'));
        }

        $this->set("prefix", $prefix);
    }

    public function admin_moveup($id, $step = 1) {
        if( $this->Setting->moveup($id, $step) ) {
            $this->Session->setFlash(__('Moved up successfully', true), 'default', array('class' => 'success'));
        } else {
            $this->Session->setFlash(__('Could not move up', true), 'default', array('class' => 'error'));
        }

        $this->redirect(array('admin' => true, 'controller' => 'settings', 'action' => 'index'));
    }

    public function admin_movedown($id, $step = 1) {
        if( $this->Setting->movedown($id, $step) ) {
            $this->Session->setFlash(__('Moved down successfully', true), 'default', array('class' => 'success'));
        } else {
            $this->Session->setFlash(__('Could not move down', true), 'default', array('class' => 'error'));
        }

        $this->redirect(array('admin' => true, 'controller' => 'settings', 'action' => 'index'));
    }

}
?>