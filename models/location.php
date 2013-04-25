<?php
class Location extends AppModel {
	var $name = 'Location';
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
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
	
	var $validate = array(
        'avgreachpermon' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'required' => true,
                'message' => 'Please enter an estimate'
                ),
        ),
        
    );
	
	public $hasMany = array(
		'AdsLocations',
		'Orders',
		'UsersLocation'
	);

	var $hasAndBelongsToMany = array(
		'Ad' => array(
			'className' => 'Ad',
			'joinTable' => 'ads_locations',
			'foreignKey' => 'location_id',
			'associationForeignKey' => 'ad_id',
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



	function nearpoint($lat, $lon, $dist){
		$data = $this->query('SELECT id, name, description, address1, address2, city, state, zip, lat, lng, active, ((ACOS(SIN('.$lat.' * PI() / 180) * SIN(locations.lat * PI() / 180) + COS('.$lat.' * PI() / 180) * COS(locations.lat * PI() / 180) * COS(('.$lon.' - locations.lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS `distance` FROM locations WHERE active=true HAVING distance<='.$dist.' ORDER BY distance ASC');
		return $data;
	}
}
?>