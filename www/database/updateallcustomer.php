<?php
include "dp.php";
$res_array=json_decode($_POST["cusdet"]);

$du=date('Y-m-d H:i:s');

$q = '';
foreach($res_array as $key => $value) {
	$q = mysqli_query($con,"UPDATE `customerdetails` SET `accesskey`='".$value->accesskey ."',`name`='".$value->name ."',`phonenumber`='".$value->phonenumber ."',`emailid`='".$value->emailid ."',`address`='".$value->address ."',`city`='".$value->city ."',`state`='".$value->state ."',`country`='".$value->country ."',`pincode`='".$value->pincode ."',`dateofupdate`='".$value->dateofupdate ."' WHERE `cusuniqueid`='".$value->cusuniqueid ."'");
}

if($q)
	echo "success";
else
	echo "fail";

 ?>