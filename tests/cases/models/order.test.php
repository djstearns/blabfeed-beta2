<?php
/* Order Test cases generated on: 2012-12-20 15:12:20 : 1356016460*/
App::import('Model', 'Order');

class OrderTestCase extends CakeTestCase {
	var $fixtures = array('app.order', 'app.user', 'app.role', 'app.upload', 'app.ad', 'app.ads_locations', 'app.location', 'app.ads_location', 'app.device', 'app.devicetype', 'app.contract', 'app.deviceuserlog', 'app.devicetypes', 'app.orders_devicetype');

	function startTest() {
		$this->Order =& ClassRegistry::init('Order');
	}

	function endTest() {
		unset($this->Order);
		ClassRegistry::flush();
	}

}
?>