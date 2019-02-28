<?php
include "dp.php";
$uid=isset($_REQUEST['u'])?$_REQUEST['u']:'';
$c=isset($_REQUEST['c'])?$_REQUEST['c']:'';
$data=array();
if($uid != '')
{
	$f='';
	if($c != '')
	{
		$f = " and name like '%$c%'";
	}
	$q=mysqli_query($con,"select * from `customerdetails` where accesskey = '$accesskey' $f");
	while ($row=mysqli_fetch_object($q)){
	 $data[]=$row;
	}
}
echo json_encode($data);
?>