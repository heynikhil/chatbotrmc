<?php
//echo "Hello world!<br>";

//$restaurant_id=1270;//902;//$_REQUEST['restaurant_id'];
/*require 'reserve_table.php';
require 'more_info.php';
require 'get_address.php';
*/
require 'get_birthcerti.php';
require 'get_death.php';
require 'get_enews.php';
require 'get_budget.php';
require 'get_wardinfo.php';
require 'get_library.php';
require 'getAwardinfo.php';


function processMessage($input) {

	$action = $input["result"]["action"];
	switch($action){
		case 'wardinfo':
			$param = $input["result"]["parameters"]["number"];
			getWardInfo($param);
			break;
			
		case 'getBudgetInfo':
			$param = $input["result"]["parameters"]["any"];
			getBudgetInfo($param);
			break;

		case 'getNews':
			$param = $input["result"]["parameters"]["number"];
			getNews($param);
			break;
			
			
		case 'birth':
			$btype = $input["result"]["parameters"]["type"];
			getbirth($action,$btype);
			break;

		case 'death':
			$dtype = $input["result"]["parameters"]["types"];
			getdeath($action,$dtype);
			break;
			
		case 'library':
			$lib = $input["result"]["parameters"]["detail"];
			$name = $input["result"]["parameters"]["libraryname"];		
			getlib($lib,$name);
			break;
			
		case 'getAwardDetail':
			$param = $input["result"]["parameters"]["number"];
			getAwardinfo($param);
			break;
			
		default :
			//moreInfo();
			sendMessage(array(
				"source" => "RMC",
				"speech" => "I am not able to understand. what do you want ?",
				"displayText" => "I am not able to understand. what do you want ?",
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
