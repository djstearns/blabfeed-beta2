<?php
class OrdersDevicetype extends AppModel {
	var $name = 'OrdersDevicetype';
	var $displayField = 'id';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'order_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Devicetype' => array(
			'className' => 'Devicetype',
			'foreignKey' => 'devicetype_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>