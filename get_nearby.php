<?php

function getnearby($input){
	require 'config.php';

	$areaname=$input["result"]["parameters"]["wardlocation"];
	$list=$input["result"]["contexts"]["parameters"]["nearby"];
	$name=$input["result"]["contexts"]["parameters"]["location"];
	
	$ans="";

	$array=explode(',', $list);//what will do here
			   foreach($array as $out) 
			   {
			   	if($out == $name)  
			   	{
			   		$Query="SELECT wardno FROM public.wardlocation WHERE area=$param";
					$Result=pg_query($con,$Query);
			   	}
			     
			   }
			   	}
			}

	
	
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




{
		$arr=array(
			"source" => "RMC",
			"speech" => "Have some problem .",
		 	"displayText" => $ans,
		 	
		);
		sendMessage($arr);
    }   
			   }

?>
