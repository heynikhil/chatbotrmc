<?php

function getlocationtrial($loc){
	//global $restaurant_id;
	require 'config.php';
	$ans="";
	//$wardinfo="";
	$near = array();

	$Query="SELECT * FROM public.wardlocation WHERE area='$loc'";
	$Result=pg_query($con,$Query);
	if(isset($Result) && !empty($Result) && pg_num_rows($Result) > 0)
	{
	
		if(pg_num_rows($Result) ==1)
		{
			$row=pg_fetch_assoc($Result);
			$certinfo="You belong to ward number :" . $row["wardno"];
	        
			$arr=array(
				"source" => "RMC",
				"speech" => $certinfo,
				"displayText" => $certinfo,
			);
			sendMessage($arr);
		}
		else
		{
			$row=pg_fetch_assoc($Result);
			$certinfo="Multiple ward exists with same location name :";
	        
			$result = pg_query($con,"SELECT * FROM  public.wardlocation WHERE area='$loc'");

			while($rows = pg_fetch_array($result)) 
			{
			   $mark=explode(',', $rows["nearby"]);//what will do here
			   foreach($mark as $out) {
			     $ans.=$out.",";
			     
			   }
			}
			$near['nearby']=$ans;
			$context = array('name' => "generic", 
				"parameters" => $near,
				"lifespan" => 5); 

			

			$arr=array(
				"source" => "RMC",
				"speech" => $certinfo,
				"displayText" => $ans,
			"contextOut" => array($context),
			"followupEvent" => array("name" => "locationevent")
			);
			sendMessage($arr);
		}		
	}
	else{
		$arr=array(
			"source" => "RMC",
			"speech" => "Have some problem .",
		 	"displayText" => "Have some problem .",
		 	
		);
		sendMessage($arr);
    }
}

?>

