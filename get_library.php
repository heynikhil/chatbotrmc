<?php

function getlib($lib,$name){
	//global $restaurant_id;
	require 'config.php';

	//$wardinfo="";
	
	$Query="SELECT * FROM library WHERE name='$name'";
	$Result=mysqli_query($con,$Query);
	if(isset($Result) && !empty($Result) && mysqli_num_rows($Result) > 0){
	$row=mysqli_fetch_assoc($Result);

	$certinfo="Answer " . $row[$lib];
        
		$arr=array(
			"source" => "RMC",
			"speech" => $certinfo,
			"displayText" => $certinfo,
		);
		sendMessage($arr);
	}else{
		$arr=array(
			"source" => "RMC",
			"speech" => "Have some problem .",
		 	"displayText" => "Have some problem .",
		);
		sendMessage($arr);
    }
}

?>
