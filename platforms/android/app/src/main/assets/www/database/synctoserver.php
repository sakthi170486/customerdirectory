<?php
include "dp.php";
$res_array=json_decode($_POST["cusdet"]);

//$v=$res_array->v;
$q = '';
foreach($res_array as $key => $value) {
	$q = mysqli_query($con,"INSERT INTO `customerdetails` (`accesskey`,`name`,`phonenumber`,`emailid`,`address`,`city`,`state`,`country`,`pincode`,`cusuniqueid`,`dateofcreation`,`dateofupdate`)  values('".$value->accesskey ."','".$value->name ."','".$value->phonenumber ."','".$value->emailid ."','".$value->address ."','".$value->city ."','".$value->state ."','".$value->country ."','".$value->pincode ."','".$value->cusuniqueid ."','".$value->dateofcreation ."','".$value->dateofupdate ."')");
}

/* $q=mysqli_query($con,"INSERT INTO `customerdetails` (`companyid`,`name`,`phonenumber`,`emailid`,`address`,`city`,`state`,`country`,`pincode`,`dateofcreation`,`dateofupdate`)  select `companyid`,`name`,`phonenumber`,`emailid`,`address`,`city`,`state`,`country`,`pincode`,`dateofcreation`,`dateofupdate` from tempcustomerdetails where id in ($v)");

$qd=mysqli_query($con,"delete from tempcustomerdetails where id in ($v)"); */

if($q)
	echo "success";
else
	echo mysqli_error($con);
 ?>