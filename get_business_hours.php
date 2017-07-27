<?php

function getBusinessHours(){
	global $restaurant_id;
	require 'config.php';

	$businessHours="";

	$bhQuery="SELECT * FROM resturants WHERE id=$restaurant_id AND isDeleted=0";
	$bhResult=mysqli_query($con,$bhQuery);
	if(isset($bhResult) && !empty($bhResult) && mysqli_num_rows($bhResult) > 0){
		$row=mysqli_fetch_assoc($bhResult);

		if($row['weekday2']==1){
			$startTime = date('h:i A', strtotime($row['starttime2']));
			$endTime = date('h:i A', strtotime($row['endtime2']));
			$businessHours .= "Mon: ".$startTime." to ".$endTime." \n";
		}else{
			$businessHours .= "Mon: Closed \n";
		}
		if($row['weekday3']==1){
			$startTime = date('h:i A', strtotime($row['starttime3']));
			$endTime = date('h:i A', strtotime($row['endtime3']));
			$businessHours .= "Tue: ".$startTime." to ".$endTime." \n";
		}else{
			$businessHours .= "Tue: Closed \n";
		}
		if($row['weekday4']==1){
			$startTime = date('h:i A', strtotime($row['starttime4']));
			$endTime = date('h:i A', strtotime($row['endtime4']));
			$businessHours .= "Wed: ".$startTime." to ".$endTime." \n";
		}else{
			$businessHours .= "Wed: Closed \n";
		}
		if($row['weekday5']==1){
			$startTime = date('h:i A', strtotime($row['starttime5']));
			$endTime = date('h:i A', strtotime($row['endtime5']));
			$businessHours .= "Thu: ".$startTime." to ".$endTime." \n";
		}else{
			$businessHours .= "Thu: Closed \n";
		}
		if($row['weekday6']==1){
			$startTime = date('h:i A', strtotime($row['starttime6']));
			$endTime = date('h:i A', strtotime($row['endtime6']));
			$businessHours .= "Fri: ".$startTime." to ".$endTime." \n";
		}else{
			$businessHours .= "Fri: Closed \n";
		}
		if($row['weekday7']==1){
			$startTime = date('h:i A', strtotime($row['starttime7']));
			$endTime = date('h:i A', strtotime($row['endtime7']));
			$businessHours .= "Sat: ".$startTime." to ".$endTime." \n";
		}else{
			$businessHours .= "Sat: Closed \n";
		}
		if($row['weekday1']==1){
			$startTime = date('h:i A', strtotime($row['starttime1']));
			$endTime = date('h:i A', strtotime($row['endtime1']));
			$businessHours .= "Sun: ".$startTime." to ".$endTime." \n";
		}else{
			$businessHours .= "Sun: Closed \n";
		}

        $arr=array(
			"source" => "MyBot",
			"speech" => $businessHours,
			"displayText" => $businessHours,
		);
		sendMessage($arr);
	}else{
		$arr=array(
			"source" => "MyBot",
			"speech" => "Have some problem listing business hours.",
			"displayText" => "Have some problem listing business hours.",
		);
		sendMessage($arr);
    }
}

?>