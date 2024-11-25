<?php
/*
Plugin Name: Raushan canonical 
Description: If canonical and current url path not equal throw 404 error
Version: 1.0
Author: Raushan
Author URI: https://t.me/Gafurowr
*/
 
# get correct id for plugin
$thisfile = basename(__FILE__, ".php");
 
# register plugin
register_plugin(
	$thisfile, //Plugin id
	'Non-Canonical to 404', 	//Plugin name
	'1.0', 		//Plugin version
	'Raushan',  //Plugin author
	'https://t.me/Gafurowr', //author website
	'Redirect non-canonical addresses to a 404 page.', //Plugin description
	'setting', //page type - on which admin tab to display
	'rauchan_backend_init'  //main function (administration)
);

add_filter('data_index', 'rauchan_canonical');

function rauchan_canonical($data_index){

    if ($data_index){
        $url 	= $data_index->url;
        $parent = $data_index->parent;
				$canonical  = find_url($url, $parent, 'relative');
				$currentUrl = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
				if ($canonical !== $currentUrl) $data_index = NULL;

    }

    return $data_index;
}
function rauchan_backend_init(){

}