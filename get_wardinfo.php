<?php

function getWardInfo(){
	//global $restaurant_id;
	require 'config.php';

	$wardinfo="";

	$Query="SELECT * FROM wardinfo WHERE wardno=?";
	$Result=pg_query($con,$Query);
	if(isset($Result) && !empty($Result) && pg_num_rows($Result) > 0){
	$row=pg_fetch_assoc($Result);

	$wardinfo=echo "id: " . $row["sqno"]. " - Name: " . $row["name"]. " - Address: " . $row["address"]. " -MobileNo: " . $row["contact"]"<br>";
        
		$arr=array(
			"source" => "RMC",
			"speech" => $wardinfo,
			"displayText" => $wardinfo,
		);
		sendMessage($arr);
	}else{
		$arr=array(
			"source" => "RMC",
			"speech" => "Have some problem listing business hours.",
			"displayText" => "Have some problem listing business hours.",
		);
		sendMessage($arr);
    }
}

?>
