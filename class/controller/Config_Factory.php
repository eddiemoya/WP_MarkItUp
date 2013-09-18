<?php
class Config_Factory {

	/**
	 * @var string - path to config file
	 */
	private $config_path;

	/**
	 * @var string - raw contents of config file
	 */
	private $config_raw;

	/**
	 * @var mixed - parsed content of config file. Usually a string, array, or object.
	 */
	private $config;

	/**
	 * @var array - array of all the objects instantiated from the configs
	 */
	private $objects;


	/**
	 * @param string $config_path - Path to config file
	 */
	public function __construct($config_path){
		$this->config_path = $config_path;
		$this->object_type = $object_type;
	}

	/**
	 * Sets reads the config file contents and sets it to the config_raw property
	 *
	 * @uses file_get_contents();
	 * @TODO: Exceptions handling if file doesnt exist
	 */
	public function load_config(){
		$this->config_raw = file_get_contents($this->config_path);
	}

	/**
	 * Decodes the contents of the config file. Currently limited to JSON only.
	 *
	 * @uses json_decode();
	 *
	 * @TODO: Exception handling if not json
	 * @TODO: Maybe add some intelligence or configurability to allow different formats of config files (interface?)
	 */
	public function parse_config(){
		$this->config = json_decode($this->config_raw);
	}

	/**
	 * Builds objects of type passed as $class, by iterating through the parsed config array|object property
	 *
	 * @param string $class Name of class that each object should be built with
	 *
	 * @TODO Exception Handling if $this->object_type doesnt exist as a class
	 */
	public function build($class){
	
		foreach ($this->config as $config){
			$this->objects[] = new $class($config);
		}
	}

	/**
	 * Simple getter for the object resulting from the build.
	 *
	 * @return array - Array containing object of the type passed to $this->build
	 *
	 * @TODO Exception handling if $this->objects is empty;
	 */
	public function get_objects(){
		return $this->objects;
	}
}




