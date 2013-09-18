<?php /*
Plugin Name: bbPress Reply with Quote
Plugin URI: https://github.com/eddiemoya/bbPress-Reply-with-Quote
Description:  bbPress plugin that lets users reply with a quote. This plugin contains no styling, and is no plug-n-play. It is intended for developers to use with any markup they already have in their theme, but must be configured in the theme. A setting page might be added in the future.
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



