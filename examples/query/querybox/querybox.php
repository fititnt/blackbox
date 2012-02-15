<?php

require_once '/../../../blackbox/blackbox.php';

class QueryBox extends BlackBox {

	/**
	 *
	 * @return Object $this Suport for method chaining
	 */
	public function loadQueryBox() {
		//require_once 'queryconfig.php';
		$queryboxconfig = file_get_contents(__DIR__ . "/queryconfig.yaml");
		parent::load($queryboxconfig, 'default', array('type' => 'yaml'));
		return $this;
	}

}

?>
