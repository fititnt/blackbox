<?php

abstract class BlackBox {

	/**
	 * 
	 */
	public function __construct() {
		//
	}

	/**
	 * Delete (set to NULL) generic variable
	 * 
	 * @param String $name: name of var do delete
	 * @return Object $this Suport for method chaining
	 */
	public function del($name) {
		$this->$name = NULL;
		return $this;
	}

	/**
	 * Return one generic variable
	 * 
	 * @param String $name: name of var do delete
	 * @return mixed
	 */
	public function get($name) {
		return $this->$name;
	}

	protected function getConfiguration($config, $options = NULL) {
		if (is_string($config)) {
			$config = explode('.', $config);
		}
		$deep = count($config);
		//...
	}

	protected function setConfiguration($config, $value) {
		if (is_string($config)) {
			$config = explode('.', $config);
		}
		//...
	}

	/**
	 * Set one generic variable the desired value
	 * 
	 * @param String $name: name of var to set value
	 * @param Mixed $value: value to set to desired variable
	 * @return Object $this Suport for method chaining
	 */
	public function set($name, $value) {
		$this->$name = $value;
		return $this;
	}

}

?>
