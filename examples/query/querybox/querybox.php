<?php

require_once '/../../../blackbox/blackbox.php';

class QueryBox extends BlackBox {

	/**
	 *
	 * @return Object $this Suport for method chaining
	 */
	public function loadQueryBox() {
		require_once 'queryconfig.php';
		parent::load($queryboxconfig);
		return $this;
	}

}

?>
