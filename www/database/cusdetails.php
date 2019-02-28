<?php
include "dp.php";
$uid=isset($_REQUEST['u'])?$_REQUEST['u']:'';
$data=array();
if($uid != '')
{
	
	$qry = "select * from `customerdetails` where id='$uid'";
	
	$q=mysqli_query($con,$qry);
	while ($row=mysqli_fetch_object($q)){
	 $data[]=$row;
	}
}
echo json_encode($data);
?>