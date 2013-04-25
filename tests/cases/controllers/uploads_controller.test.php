<?php
/* Uploads Test cases generated on: 2012-11-18 18:11:01 : 1353262201*/
App::import('Controller', 'Uploads');

class TestUploadsController extends UploadsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class UploadsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.upload', 'app.ad', 'app.user', 'app.role', 'app.location', 'app.ads_location', 'app.block', 'app.region', 'app.link', 'app.menu', 'app.setting', 'app.node', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy');

	function startTest() {
		$this->Uploads =& new TestUploadsController();
		$this->Uploads->constructClasses();
	}

	function endTest() {
		unset($this->Uploads);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

	function testClientIndex() {

	}

	function testClientView() {

	}

	function testClientAdd() {

	}

	function testClientEdit() {

	}

	function testClientDelete() {

	}

}
?>