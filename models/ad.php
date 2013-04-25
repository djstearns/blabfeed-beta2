<?php
class Ad extends AppModel {
	var $name = 'Ad';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $actsAs = array('Containable');
	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Upload' => array(
			'className' => 'Upload',
			'foreignKey' => 'upload_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
	
	var $validate = array(
        'name' => array(
                'rule' => 'notEmpty',
                'message' => 'Please give your ad a name'
          
        ),
        
    );
	
	 public $hasMany = array(
		'AdsLocations'
	);
	
	public $hasOne = array(
		'FullCalendar.Event'
	);

	var $hasAndBelongsToMany = array(
		'Location' => array(
			'className' => 'Location',
			'joinTable' => 'ads_locations',
			'foreignKey' => 'ad_id',
			'associationForeignKey' => 'location_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
	
	

}
?>