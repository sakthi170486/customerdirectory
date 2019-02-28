<?php
include "dp.php";
$res=json_encode($_POST);
$res_array=json_decode($res);
$id=$res_array->ecusid;
$cname=$res_array->ecusname;
$addr=$res_array->ecusaddr;
$mobile=$res_array->mobile;
$city=$res_array->ecuscity;
$email=$res_array->email;
$state=$res_array->ecusstate;
$country=$res_array->ecuscountry;
$pincode=$res_array->ecuspincode;
$src=$res_array->source;
$cusuid=$res_array->ecusuid;
$du=date('Y-m-d H:i:s');

$qry="update `customerdetails` set `name`='$cname',`phonenumber`='$mobile',`address`='$addr',`city`='$city',`emailid`='$email',`state`='$state',`country`='$country',`pincode`='$pincode',`dateofupdate`='$du' where cusuniqueid='$cusuid'";

$q=mysqli_query($con,$qry);
if($q)
	echo "success";
else
	echo "fail";

 ?>