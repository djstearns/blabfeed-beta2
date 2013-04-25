<?php
class Deviceuserlog extends AppModel {
	var $name = 'Deviceuserlog';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Device' => array(
			'className' => 'Device',
			'foreignKey' => 'device_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Contract' => array(
			'className' => 'Contract',
			'foreignKey' => 'contract_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>