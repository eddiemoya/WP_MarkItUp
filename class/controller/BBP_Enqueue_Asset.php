<?php

class BBP_Enqueue_Assets {
	public $config;



	public function __construct($config_path){
		$this->config = json_decode(file_get_contents($config_path));

	}

	public function enqueue_assets(){
		foreach($this->config as $config){
			$asset = new BBP_Asset($config);
			$asset->enqueue();

		}
	}
}