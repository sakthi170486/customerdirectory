<?php
include "dp.php";
$res=json_encode($_POST);
$res_array=json_decode($res);

$v=$res_array->v;

$qry="delete from customerdetails where cusuniqueid = '$v'";

$qd=mysqli_query($con,$qry);

if($qd)
	echo "success";
else
	echo mysqli_error($con);

 ?>