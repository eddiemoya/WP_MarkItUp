<?php /*
Plugin Name: WP MarkItUp!
Plugin URI: https://github.com/eddiemoya/WP_MarkItUp
Description: Sets up MarkItUp! jQuery plugin for easy integration with WordPress.
Version: 0.1
Author: Eddie Moya
Author URL: http://eddiemoya.com
*/




define('BBP_Plugin_Path', plugin_dir_path(__FILE__));

foreach ( glob( BBP_Plugin_Path."app/library/*/*/*.php" ) as $file )
    include_once $file;



	
 $config_path = apply_filters('markitup-enqueue-json', BBP_Plugin_Path."/config/enqueue.json");
 $base_uri =  plugins_url('', __FILE__);

 $asset_enqueuer = new Enqueue_Assets($config_path, 'BBP_Asset', $base_uri);
 





