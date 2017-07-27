<?php

//$restaurant_id=1270;//902;//$_REQUEST['restaurant_id'];

/*require 'reserve_table.php';
require 'more_info.php';
require 'get_address.php';
require 'get_buffet.php';
require 'get_menu.php';
require 'get_photos.php';
require 'get_promotion.php';*/
require 'get_WardInfo.php';

function processMessage($input) {

	$action = $input["result"]["action"];
	switch($action){
		case 'wardinfo':
			getWardinfo();
			break;
		default :
			//moreInfo();
			sendMessage(array(
				"source" => "RMC",
				"speech" => "..........TEXT HERE...........",
				"displayText" => ".........TEXT HERE...........",
				"contextOut" => array()
			));
	}
}

function sendMessage($parameters) {
	header('Content-Type: application/json');
	$data = str_replace('\/','/',json_encode($parameters));
    echo $data;
}

$input = json_decode(file_get_contents('php://input'), true);
if (isset($input["result"]["action"])) {
    processMessage($input);
}

?>
