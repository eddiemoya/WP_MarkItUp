<?php /*
Plugin Name: WP MarkItUp!
Plugin URI: https://github.com/eddiemoya/WP_MarkItUp
Description: Sets up MarkItUp! jQuery for easy integration with WordPress.
Version: 0.1
Author: Eddie Moya
Author URL: http://eddiemoya.com
*/

define('BBP_Plugin_Path', plugin_dir_path(__FILE__));

foreach ( glob( BBP_Plugin_Path."class/controller/*.php" ) as $file )
    include_once $file;

foreach ( glob( BBP_Plugin_Path."class/model/*.php" ) as $file )
    include_once $file;

$config_path = apply_filters('markitup-enqueue-json', BBP_Plugin_Path."/config/enqueue.json");


add_action('wp_enqueue_scripts', 'jsontest', 11);
function jsontest(){

	$config = new Config_Factory($config_path);
	$config->load_config();
	$config->parse_config();
	$config->build('BBP_Asset');

	$assets = $config->get_objects();

	$base_uri =  plugins_url('', __FILE__);
	$markitup = new BBP_Enqueue_Assets($assets, $base_uri);
	$markitup->enqueue_assets();

}



