<?php

/**
 * Experimental start to an OO way of handling enqueued assets. This seems silly on its own, but eventually it will be awesome.
 */
class BBP_Asset {

	/**
	 * @var string - script or style
	 */
	public $type;

	/**
	 * @var string - handle to be be used for collision handling in wordpress
	 */
	public $handle;

	/**
	 * @var string - path to the asset
	 */
	public $path;

	/**
	 * @var array - array of handles that should be loaded before this asset.
	 */
	public $dep = array();

	/**
	 * @var string - handle to be be used for collision handling in wordpress
	 */
	public $ver = NULL;

	/**
	 * @var string - (styles only) Specify the media for which this stylesheet has been defined.
	 * @var bool - (script only) If this parameter is true, the script is placed before the </body> end tag.
	 */
	public $arg = NULL;

	/**
	 * 
	 */
	public function __construct($config){
		$this->type = $config->type;
		$this->handle = $config->handle;
		$this->path = $config->path;
		$this->dep = $config->dep;
		$this->ver = $config->ver;
		$this->arg = $config->arg;

	}
}