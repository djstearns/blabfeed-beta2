<?php
class AdsLocation extends AppModel {
	var $name = 'AdsLocation';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $actsAs = array('Containable');
	var $belongsTo = array(
		'Ad' => array(
			'className' => 'Ad',
			'foreignKey' => 'ad_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Location' => array(
			'className' => 'Location',
			'foreignKey' => 'location_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>