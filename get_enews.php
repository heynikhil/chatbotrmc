<?php

function getNews($param){
	require 'config.php';

	$getNews="";

	$Query="SELECT link FROM public.news WHERE year=$param";
	$Result=pg_query($con,$Query);
	if(isset($Result) && !empty($Result) && pg_num_rows($Result) > 0){
	$row=pg_fetch_assoc($Result);
	$getNews= " - Link: " . $row["link"];

		$arr=array(
			"source" => "RMC",
			"speech" => $getNews,
			"displayText" => $getNews,
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
