<?php
include "dp.php";
$m=isset($_REQUEST['m'])?$_REQUEST['m']:'';
if($m !='')
{
	$q = mysqli_query($con,"select id from `userdetails` where profilepic='$m'");
	if($q == false || mysqli_num_rows($q) == 0)
	{
		unlink('upload/'.$m);
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