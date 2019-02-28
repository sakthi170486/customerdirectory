<?php
include "dp.php";
$m=isset($_REQUEST['m'])?$_REQUEST['m']:'';
$o=isset($_REQUEST['o'])?$_REQUEST['o']:'';
$d=date('Y-m-d H:i:s');
$id=0;
if($o !='' )
{
	$q = mysqli_query($con,"select accesskey from `userdetails` where loginaccess='$o' and phonenumber='$m' and accessexpiry >= '$d'");
	if($q == false || mysqli_num_rows($q) == 0)
	{
		echo 0;
	}
	else
	{
		$qs=mysqli_query($con,"UPDATE `userdetails` SET `status`=1,`lastlogin`='$d' where `phonenumber`='$m'");
		while ($row=mysqli_fetch_array($q)){
			$id=$row['accesskey'];
		}
		echo $id;	
	} 
}
else
{
	echo 0;
}
?>