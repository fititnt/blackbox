<?php

require_once '../../../blackbox/blackbox.php';

class SimpleBox extends BlackBox {

	/**
	 *
	 * @return Object $this Suport for method chaining
	 */
	protected function loadSimpleBox() {
		require_once 'simpleconfig.php';
		parent::load($simpleboxconfig);
		return $this;
	}

}

?>
