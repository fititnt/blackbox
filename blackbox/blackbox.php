<?php

abstract class BlackBox {

	/**
	 * Defaul configuration
	 * 
	 * @var array 
	 */
	public $configuration_default;

	/**
	 * Defaul configuration
	 * 
	 * @var array 
	 */
	public $work_namespace;

	/**
	 *
	 * @var object 
	 */
	public $error;

	/**
	 * 
	 */
	public function __construct() {
		$this->work_namespace = 'default';
		$this->error = new stdClass();
		$this->error->code = NULL;
		$this->error->msg = NULL;
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
	public function get($config) {
		return $this->getConfiguration($config);
	}

	/**
	 *
	 * @internal
	 * Rewirte this small dragon later with some recursion
	 *        , |\/| ,
	 *       /| (..) |\
	 *      /  \(oo)/  \
	 *     /    /''\    \
	 *    /    /\  /\    \
	 *    \/\/`\ \/ /`\/\/
	 *       ^^-^^^^-^^ BP
	 * @endinternal
	 * 
	 * @param type $config
	 * @param type $options
	 * @return type 
	 */
	protected function getConfiguration($config, $options = NULL) {
		if (is_string($config)) {
			$config = explode('.', $config);
		}
		$deep = count($config);
		$conf_namespace = 'configuration_' . $this->work_namespace;

		switch ($deep) {
			case 6:
				if (isset(
								$this->{$conf_namespace}
								[$config[0]]
								[$config[1]]
								[$config[2]]
								[$config[3]]
								[$config[4]]
								[$config[5]]
				)) {
					$result = $this->{$conf_namespace}
							[$config[0]]
							[$config[1]]
							[$config[2]]
							[$config[3]]
							[$config[4]]
							[$config[5]]
					;
				} else {
					$result = 'ERROR. See error log';
					$this->error->code = 1;
				}
				break;
			case 5:
				if (isset(
								$this->$conf_namespace
								[$config[0]]
								[$config[1]]
								[$config[2]]
								[$config[3]]
								[$config[4]]
				)) {
					$result = $this->{$conf_namespace}
							[$config[0]]
							[$config[1]]
							[$config[2]]
							[$config[3]]
							[$config[4]]
					;
				} else {
					$result = 'ERROR. See error log';
					$this->error->code = 1;
				}
				break;
			case 4:
				if (isset(
								$this->$conf_namespace
								[$config[0]]
								[$config[1]]
								[$config[2]]
								[$config[3]]
				)) {
					$result = $this->{$conf_namespace}
							[$config[0]]
							[$config[1]]
							[$config[2]]
							[$config[3]]
					;
				} else {
					$result = 'ERROR. See error log';
					$this->error->code = 1;
				}
				break;
			case 3:
				if (isset(
								$this->{$conf_namespace}
								[$config[0]]
								[$config[1]]
								[$config[2]]
				)) {
					$result = $this->{$conf_namespace}
							[$config[0]]
							[$config[1]]
							[$config[2]]
					;
				} else {
					$result = 'ERROR. See error log';
					$this->error->code = 1;
				}
				break;
			case 2:
				if (isset(
								$this->{$conf_namespace}
								[$config[0]]
								[$config[1]]
				)) {
					$result = $this->{$conf_namespace}
							[$config[0]]
							[$config[1]]
					;
				} else {
					$result = 'ERROR. See error log';
					$this->error->code = 1;
				}
				break;
			case 1:
				if (isset(
								$this->{$conf_namespace}
								[$config[0]]
				)) {
					$result = $this->{$conf_namespace}
							[$config[0]]
					;
				} else {
					$result = 'ERROR. See error log';
					$this->error->code = 1;
				}
				break;
			default:
				$result = 'ERROR. See error log';
				$this->error->code = 1;
				break;
		}
		if ($this->error->code === 1) {
			$this->error->msg = 'Error at ' . __FILE__ . ' ON ' . __METHOD__ . PHP_EOL
					. 'Variable not found on ' . $this->work_namespace . PHP_EOL
					. 'Requested: '
					. json_encode($config);
			;
		}

		return $result;
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
		if (isset($options['type']) && $options['type'] === 'yaml') {
			//require_once '/../3rd/sfYaml/sfYaml.php';
			require_once '/../3rd/sfYaml/sfYamlParser.php';
			$yaml = new sfYamlParser();
			$config = $yaml->parse($config);
			
//			$array = ... //PHP array to convert to YAML
//			require_once '/../3rd/sfYaml/sfYamlDumper.php';
//			$dumper = new sfYamlDumper();
//			$yaml = $dumper->dump($array, 2);
//			print_r($yaml);die;//print yaml
//			file_put_contents('file.yaml', $yaml);//create yaml file
		}

		$conf_name = 'configuration_' . $namespace;
		$this->$conf_name = $config;
//		print_r($this);die;
		return $this;
	}

	public function setNamespace($name) {
		$this->namespace = $name;
		return $this;
	}

	/**
	 * Method to debug one class from inside
	 * 
	 * @see github.com/fititnt/php-snippet/tree/master/dump
	 * 
	 * @param array $option Whoe function must work
	 * 						$option['method'] = 'default':
	 * 							Return simple print_r() inside <pre>
	 * 						$option['method'] = 'console':
	 * 							Return values on javascript console of browsers
	 * 						$option['die'] = 1:
	 * 							If excecution must stop after excecution
	 * 
	 * @return Object $this Suport for method chaining
	 */
	public function debug($option = array()) {
		if (!isset($option['method'])) {
			$option['method'] = 'default';
		}
		switch ($option['method']) {
			case 'console':
				$html = array();
				$date = date("Y-m-d h:i:s");
				$html[] = '<script>';
				$html[] = 'console.groupCollapsed("' . __CLASS__ . ':' . $date . '");';
				//@todo: add separed group (fititnt, 2012-02-15 02:03)
				$html[] = 'console.groupCollapsed("$this");';
				$html[] = 'console.dir(eval(' . json_encode($this) . '));'; //evail is evil... And?
				$html[] = 'console.groupEnd()';
				$html[] = 'console.groupEnd()';
				$html[] = '</script>';
				echo implode(PHP_EOL, $html);
				break;
			case 'default':
			default:
				echo '<pre>';
				print_r($this);
				echo '</pre>';
				break;
		}
		if (isset($option['die'])) {
			die;
		}
		return $this;
	}

}

?>
