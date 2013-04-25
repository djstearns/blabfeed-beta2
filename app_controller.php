<?php
/**
 * Application controller
 *
 * This file is the base controller of all other controllers
 *
 * PHP version 5
 *
 * @category Controllers
 * @package  Croogo
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class AppController extends Controller {
/**
 * Components
 *
 * @var array
 * @access public
 */
    public $components = array(
        'Croogo',
        'Security',
        'Acl',
        'Auth',
		'Cookie',
        'Acl.AclFilter',
        'Session',
        'RequestHandler',
		//'Linkedin.Linkedin' => array(
		//		'key' => 'jtazkkdp2nlt',
		//		'secret' => 'xUCRBcYDuQp1EeXB',
		//	)
		
    );
/**
 * Helpers
 *
 * @var array
 * @access public
 */
    public $helpers = array(
        'Html',
        'Form',
        'Session',
        'Text',
        'Js',
        'Time',
        'Layout',
        'Custom',
    );
/**
 * Models
 *
 * @var array
 * @access public
 */
    public $uses = array(
        'Block',
        'Link',
        'Setting',
        'Node',
    );
/**
 * Cache pagination results
 *
 * @var boolean
 * @access public
 */
    public $usePaginationCache = true;
/**
 * View
 *
 * @var string
 * @access public
 */
    public $view = 'Theme';
/**
 * Theme
 *
 * @var string
 * @access public
 */
    public $theme;
/**
 * Constructor
 *
 * @access public
 */
    public function __construct() {
        Croogo::applyHookProperties('Hook.controller_properties');
        parent::__construct();
        if ($this->name == 'CakeError') {
            $this->_set(Router::getPaths());
            $this->params = Router::getParams();
            $this->constructClasses();
            $this->Component->initialize($this);
            $this->beforeFilter();
            $this->Component->triggerCallback('startup', $this);
        }
    }
/**
 * beforeFilter
 *
 * @return void
 */
    public function beforeFilter() {
		//debug($this);
		$this->AclFilter->auth();
        $this->RequestHandler->setContent('json', 'text/x-json');
        $this->Security->blackHoleCallback = '__securityError';

        if (isset($this->params['admin']) && $this->name != 'CakeError') {
            $this->layout = 'admin';
        }
		
		if (isset($this->params['client']) && $this->name != 'CakeError') {
			
            $this->layout = 'client';
			$this->Auth->loginRedirect = array('client'=>true, 'controller' => 'settings', 'action' => 'client_dashboard');
        }
		
		if (isset($this->params['employee']) && $this->name != 'CakeError') {
            $this->layout = 'employee';
        }

        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
        }

        if (Configure::read('Site.theme') && !isset($this->params['admin'])) {
            $this->theme = Configure::read('Site.theme');
        } elseif (Configure::read('Site.admin_theme') && isset($this->params['admin'])) {
            $this->theme = Configure::read('Site.admin_theme');
        }
		
		if (Configure::read('Site.theme') && !isset($this->params['client'])) {
            $this->theme = Configure::read('Site.theme');
        } elseif (Configure::read('Site.admin_theme') && isset($this->params['client'])) {
            $this->theme = Configure::read('Site.admin_theme');
        }
		
		if (Configure::read('Site.theme') && !isset($this->params['employee'])) {
            $this->theme = Configure::read('Site.theme');
        } elseif (Configure::read('Site.admin_theme') && isset($this->params['employee'])) {
            $this->theme = Configure::read('Site.admin_theme');
        }

        if (!isset($this->params['admin']) && 
            Configure::read('Site.status') == 0) {
            $this->layout = 'maintenance';
            $this->set('title_for_layout', __('Site down for maintenance', true));
            $this->render('../elements/blank');
        }

        if (isset($this->params['locale'])) {
            Configure::write('Config.language', $this->params['locale']);
        }
    }
/**
 * blackHoleCallback for SecurityComponent
 *
 * @return void
 */
    public function __securityError() {
        //$this->cakeError('securityError');
    }
	
	function _refreshAuth($field = '', $value = '') {
	if (!empty($field) && !empty($value)) { 
		$this->Session->write($this->Auth->sessionKey .'.'. $field, $value);
	} else {
		if (isset($this->User)) {
			$this->Auth->login($this->User->read(false, $this->Auth->user('id')));
		} else {
			$this->Auth->login(ClassRegistry::init('User')->findById($this->Auth->user('id')));
		}
	}
}

}
?>