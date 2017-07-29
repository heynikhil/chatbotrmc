<?php

function getBudgetInfo($param){
	//global $restaurant_id;
	require 'config.php';

	$getBudgetInfo="";

	$Query="SELECT link FROM public.budget WHERE year=$param";
	$Result=pg_query($con,$Query);
	if(isset($Result) && !empty($Result) && pg_num_rows($Result) > 0){
	$row=pg_fetch_assoc($Result);
	$getBudgetInfo= " Here is details that you require- Link: " . $row["link"];

		$arr=array(
			"source" => "RMC",
			"speech" => $getBudgetInfo,
			"displayText" => $getBudgetInfo,
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
