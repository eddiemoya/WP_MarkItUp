<?php
class Enqueue_Assets {

	private $base_uri;
	private $config_path;
	private $object_class;
	private $assets;


	public function __construct($config_path, $object_class, $base_uri){
		$this->config_path = $config_path;
		$this->object_class = $object_class;
		$this->base_uri = $base_uri;

		$this->parse_config();
		$this->enqueue_assets();
	}

	private function parse_config(){

		$config = new Config_Factory($this->config_path);
		$config->load_config();
		$config->parse_config();
		$config->build($this->object_class);

		$this->assets = $config->get_objects();

	}

	private function enqueue_assets(){
		$markitup = new Asset_Enqueuer($this->assets, $this->base_uri);
		$markitup->enqueue_assets();
	}
}