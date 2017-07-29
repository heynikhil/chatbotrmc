<?php

function getbirth($action,$btype){
	require 'config.php';


	$Query="SELECT $btype FROM public.certificate WHERE name='birth'";
	$Result=pg_query($con,$Query);
	if(isset($Result) && !empty($Result) && pg_num_rows($Result) > 0){
	$row=pg_fetch_assoc($Result);
	
	$certinfo="Answer " . $row[$btype];
        
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
