<?php

function getdeath($action,$dtype){
	require 'config.php';

	//$wardinfo="";

	$Query="SELECT $dtype FROM public.certificate WHERE name='death'";
	$Result=pg_query($con,$Query);
	if(isset($Result) && !empty($Result) && pg_num_rows($Result) > 0){
	$row=pg_fetch_assoc($Result);
	
	$certinfo="Here is details that you require " . $row[$dtype];
        
		$arr=array(
			"source" => "RMC",
			"speech" => $certinfo,
			"displayText" => $certinfo,
		);
		sendMessage($arr);
	}
	else
	{
		$arr=array(
			"source" => "RMC",
			"speech" => "Have some problem .",
		 	"displayText" => "Have some problem .",
		);
		sendMessage($arr);
    }
}

?>
