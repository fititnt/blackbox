<?php

abstract class BlackBox {

	/**
	 * Defaul configuration
	 * 
	 * @var array 
	 */
	protected $configuration_default;

	/**
	 * Defaul configuration
	 * 
	 * @var array 
	 */
	protected $work_namespace;

	/**
	 * 
	 */
	public function __construct() {
		$this->work_namespace = 'default';
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
	 * @todo rewrite to use it on this lib
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

	/**
	 * Load one configuration
	 * 
	 * @todo implement $options param (fititnt, 2012-02-15 01:00)
	 * 
	 * @param array $config: configuration to load
	 * @param string $namespace: value to set to desired variable
	 * @param array $options Aditional options (still not implemented)
	 * @return Object $this Suport for method chaining
	 */
	public function load($config, $namespace = 'default', $options = NULL) {
		$this->configuration_{$namespace} = $config;
		return $this;
	}

	public function setNamespace($name) {
		$this->namespace = $name;
		return $this;
	}

	public function debug($option = array()) {
		if (!isset($option['method'])) {
			$option['method'] = 'default';
		}
		switch ($option['method']) {
			case 'console':
				echo '<script>console';
				print_r($this);
				echo '</pre>';
				break;
			case 'default':
			default:
				echo '<pre>';
				print_r($this);
				echo '</pre>';
				break;
		}
		if(isset($option['die'])){
			die;
		}
		
		return $this;
	}

}

?>
