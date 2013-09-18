<?php
class Config_Factory {

	/**
	 * 
	 */
	private $config_path;

	/**
	 * 
	 */
	private $config_raw;

	/**
	 * 
	 */
	private $config;

	/**
	 * 
	 */
	private $objects;

	/**
	 * 
	 */
	public function __construct($config_path){
		$this->config_path = $config_path;
		$this->object_type = $object_type;
	}

	/**
	 * @TODO: Exceptions handling if file doesnt exist
	 */
	public function load_config(){
		$this->config_raw = file_get_contents($this->config_path);
	}

	/**
	 * @TODO: Exception handling if not json
	 */
	public function parse_config(){
		$this->config = json_decode($this->config_raw);
	}

	/**
	 * @TODO Exception Handling if $this->object_type doesnt exist as a class
	 */
	public function build($class){
	
		foreach ($this->config as $config){
			$this->objects[] = new $class($config);
		}
	}

	/**
	 * @TODO Exception handling if $this->objects is empty;
	 */
	public function get_objects(){
		return $this->objects;
	}



}