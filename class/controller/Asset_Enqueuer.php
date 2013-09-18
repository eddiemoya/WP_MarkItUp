<?php

class Asset_Enqueuer {

	/**
	 * @var array
	 */
	private $assets;

	/**
	 * 
	 */
	private $base_uri;

	/**
	 * 
	 */
	public function __construct(array $assets, $base_uri){
		$this->assets = $assets;
		$this->base_uri = $base_uri;
	}

	/**
	 * 
	 */
	public function enqueue_assets(){

		foreach($this->assets as $asset){
			$this->enqueue($asset);
		}

	}

	/**
	 * 
	 */
	private function enqueue(BBP_Asset $asset){

		$asset_path = $this->base_uri . $asset->path;
		
		// Use $this->type property to determine which type of enqueue function to call, script or style
		$enqueue_func = "wp_enqueue_" . $asset->type; 
		$enqueue_func($asset->handle, $this->base_uri.$asset->path, $asset->dependencies, $asset->version, $asset->arg);
	}
}
