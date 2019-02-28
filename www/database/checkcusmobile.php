<?php
include "dp.php";
$m=isset($_REQUEST['m'])?$_REQUEST['m']:'';
$accesskey=isset($_REQUEST['accesskey'])?$_REQUEST['accesskey']:'';
$cid=isset($_REQUEST['cid'])?$_REQUEST['cid']:'';
if($m !='')
{
	$fld="phonenumber='$m' and accesskey = '$accesskey'";
	if($cid != '')
	{
		$fld="phonenumber = '$m' and accesskey = '$accesskey' and id != $cid";
	}
	
	$q = mysqli_query($con,"select id from `customerdetails` where $fld");
	if($q == false || mysqli_num_rows($q) == 0)
	{
		echo 0;
	}
	else
	{
		echo 'exists';
	}
}
else
{
	echo 0;
}

?>