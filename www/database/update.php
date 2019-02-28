<?php
include "dp.php";
$res=json_encode($_POST);
$res_array=json_decode($res);
$id=$res_array->eid;
$cname=$res_array->ecname;
$name=$res_array->ename;
$mobile=$res_array->emobile;
$amobile=$res_array->altmobile;
$email=$res_array->eemail;
$du=date('Y-m-d H:i:s');
$q=mysqli_query($con,"update `userdetails` set `company_name`='$cname',`name`='$name',`phonenumber`='$mobile',`alternumber`='$amobile',`emailid`='$email',`dateofupdate`='$du' where accesskey = '$id'");
if($q)
	echo "success";
else
	echo "fail";

?>