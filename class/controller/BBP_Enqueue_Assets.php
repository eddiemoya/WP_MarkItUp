<?php

class BBP_Enqueue_Assets {

	/**
	 * @var array
	 */
	private $config;
	private $assets;


	public function __construct($config){
		$this->config = $config;
	
	}

	public function enqueue_assets(){
		foreach ($this->config as $config){
			$asset = new BBP_Asset($config);
			$asset->enqueue();
		}
	}

	// public function enqueue(){
	// 	$asset_uri = plugins_url($this->path, dirname(dirname(__FILE__)));
	// 	$enqueue_func = "wp_enqueue_" . $this->type; 
	// 	$enqueue_func($this->handle, $asset_uri, $this->dependancies, $this->version, $this->arg);
	// }

}