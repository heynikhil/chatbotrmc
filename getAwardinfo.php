<?php

function getAwardinfo($param){
	//global $restaurant_id;
	require 'config.php';

	$getAwardinfo="";

	$Query="SELECT * FROM public.awardinfo WHERE Year='$param'";
	$Result=pg_query($con,$Query);
	if(isset($Result) && !empty($Result) && pg_num_rows($Result) > 0){
	$row=pg_fetch_assoc($Result);
	//$getBudgetInfo= " Here is details : " . $row["award"]. " --- Project: " . $row["project"]. " --- Category: " . $row["category"] . " --- Given By: " . $row["GivenBy"] . " ---  " . $row["images"];
        $getAwardinfo= "Here is details that you require - : " . $row["award"];

		$arr=array(
			"source" => "RMC",
			"speech" => $getAwardinfo,
			"displayText" => $getAwardinfo,
		);
		sendMessage($arr);
	}else{
		$arr=array(
			"source" => "RMC",
			"speech" => "No year matched in database.",
			"displayText" => "No year matched in database.",
		);
		sendMessage($arr);
    }
}

?>
