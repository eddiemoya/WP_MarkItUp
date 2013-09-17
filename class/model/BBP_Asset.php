<?php

/**
 * Experimental start to an OO way of handling enqueued assets. This seems silly on its own, but eventually it will be awesome.
 */
class BBP_Asset {

	/**
	 * @var string - script or style
	 */
	private $type;

	/**
	 * @var string - handle to be be used for collision handling in wordpress
	 */
	private $handle;

	/**
	 * @var string - path to the asset
	 */
	private $path;

	/**
	 * @var array - array of handles that should be loaded before this asset.
	 */
	private $dependencies = array();

	/**
	 * @var string - handle to be be used for collision handling in wordpress
	 */
	private $version = NULL;

	/**
	 * @var string - (styles only) Specify the media for which this stylesheet has been defined.
	 * @var bool - (script only) If this parameter is true, the script is placed before the </body> end tag.
	 */
	private $arg = NULL;



	public function __construct($config){
	
		$this->type = $config->type;
		$this->handle = $config->handle;
		$this->path = $config->path;
		$this->dependancies = $config->dep;
		$this->version = $config->ver;
		$this->arg = $config->arg;

	}

	public function enqueue(){
		$asset_uri = plugins_url($this->path, dirname(dirname(__FILE__)));
		$enqueue_func = "wp_enqueue_" . $this->type; 
		$enqueue_func($this->handle, $asset_uri, $this->dependancies, $this->version, $this->arg);
	}

}