<?php
include "dp.php";
$uid=isset($_REQUEST['u'])?$_REQUEST['u']:'';
$key=isset($_REQUEST['k'])?$_REQUEST['k']:'';
$data=array();
if($uid != '')
{
	$q=mysqli_query($con,"select * from `userdetails` where phonenumber='$uid' and accesskey='$key'");
	while ($row=mysqli_fetch_object($q)){
	 $data[]=$row;
	}
}
echo json_encode($data);
?>