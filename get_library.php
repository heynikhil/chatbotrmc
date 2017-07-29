<?php

function getlib($lib,$name){
	//global $restaurant_id;
	require 'config.php';

	//$wardinfo="";
	
	$Query="SELECT * FROM library WHERE name='$name'";
	$Result=pg_query($con,$Query);
	if(isset($Result) && !empty($Result) && pg_num_rows($Result) > 0){
	$row=pg_fetch_assoc($Result);

	$certinfo="Here is details that you require " . $row[$lib];
        
		$arr=array(
			"source" => "RMC",
			"speech" => $certinfo,
			"displayText" => $certinfo,
		);
		sendMessage($arr);
	}else{
		$arr=array(
			"source" => "RMC",
			"speech" => "Sorry I have not that information about library .",
		 	"displayText" => "Sorry I have not that information about library .",
		);
		sendMessage($arr);
    }
}

?>
