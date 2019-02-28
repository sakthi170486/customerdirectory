<?php
include "dp.php";
$res=json_encode($_POST);
$res_array=json_decode($res);

$cname=$res_array->cname;
$addr=$res_array->addr;
$mobile=$res_array->mobile;
$city=$res_array->city;
$email=$res_array->email;
$state=$res_array->state;
$country=$res_array->country;
$pin=$res_array->pincode;
$cid=$res_array->compid;
$cusuid=$res_array->cusuid;
$df=date('Y-m-d H:i:s');
$du=date('Y-m-d H:i:s');
$q=mysqli_query($con,"INSERT INTO `customerdetails` (`accesskey`,`name`,`phonenumber`,`emailid`,`address`,`city`,`state`,`country`,`pincode`,`cusuniqueid`,`dateofcreation`,`dateofupdate`) VALUES ('$cid','$cname','$mobile','$email','$addr','$city','$state','$country','$pin','$cusuid','$df','$du')");
if($q)
	echo "success";
else
	//echo mysqli_error($con);
	echo "fail";

 ?>