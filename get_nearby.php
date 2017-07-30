<?php

function getnearby($input){
	//global $restaurant_id;
	require 'config.php';

	$areaname=$input["result"]["parameters"]["wardlocation"];
	$name=$input["result"]["contexts"]["parameters"]["location"];
	$ans="";

	foreach($name as $out)
	{
		$ans.=$out;
	}
	/* $name=explode(',', $input["result"]["contexts"]["parameters"]);//what will do here
			   foreach($mark as $out) {
			     $ans.=$out.",";
			     
			   }

//$ans=$nearby.$name;
	
//$ans="";		$

 
		/*	$result = mysqli_query($con,"SELECT * FROM  wardlocation WHERE area='$nearby'");
			$i=0;
			while($rows = mysqli_fetch_array($result)) 
			{
			   $mark=explode(',', $rows['nearby']);//what will do here
			   foreach($mark as $out) {
			     $ans[$i]=$out;
			      $i++;
			   }
			}*/
		/*	foreach($ans as $out)
			{
			      if($out == $near)
			      {
					$q="SELECT wardno FROM  wardlocation WHERE area='$near'";
					$Result=mysqli_query($con,$Query);
					$rows=mysqli_fetch_assoc($Result);
					$certinfo="You belong to ward number :".$rows["wardno"];
        
					$arr=array(
						"source" => "RMC",
						"speech" => $certinfo,
						"displayText" => $certinfo,
					);
					sendMessage($arr);

			      }
			      else
			      */{
		$arr=array(
			"source" => "RMC",
			"speech" => "Have some problem .",
		 	"displayText" => $ans,
		 	
		);
		sendMessage($arr);
    }
			     

			    
			   }




?>