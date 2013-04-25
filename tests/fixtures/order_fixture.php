<?php
/* Order Fixture generated on: 2012-12-20 15:12:19 : 1356016459 */
class OrderFixture extends CakeTestFixture {
	var $name = 'Order';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'ordernum' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'orderdate' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'trackingnum' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'chatlog' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'estrecddate' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'recddate' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'date', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'ordernum' => 'Lorem ipsum dolor sit amet',
			'orderdate' => '2012-12-20',
			'trackingnum' => 'Lorem ipsum dolor sit amet',
			'chatlog' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'estrecddate' => '2012-12-20',
			'recddate' => '2012-12-20',
			'created' => '2012-12-20',
			'modified' => '2012-12-20'
		),
	);
}
?>