<?php
include "dp.php";
$m=isset($_REQUEST['m'])?$_REQUEST['m']:'';
$otp=mt_rand(1000,9999);
$email='';$mailsent=0;
$expdate=date('Y-m-d H:i:s',strtotime('+10 minutes',strtotime(date('Y-m-d H:i:s'))));
if($m !='')
{
	$q = mysqli_query($con,"select emailid from `userdetails` where phonenumber='$m'");
	if(mysqli_num_rows($q) > 0)
	{
		while ($row=mysqli_fetch_array($q)){
			$email=$row['emailid'];
		}
		if($email != '')
		{
			$subject    = "Login OTP";
			$from='info@azillesoft.com';
			$to=$email;
			$body="OTP for login has given below which is valid for 10mins only. \r\n \r\n 

			 OTP :".$otp."\r\n \r\n\r\n\r\n 

			 Thank you \r\n Team ";	

			$mailsent=mail("$to","Receipt: $subject","$body","From: $from\nReply-To: $from");
			
			if($mailsent > 0)
			{
				$qs=mysqli_query($con,"UPDATE `userdetails` SET `loginaccess`='$otp',`accessexpiry`='$expdate' where `phonenumber`='$m'");
				 if($qs)
					echo "success";
				 else
					echo 0;
			}
		}
		else
		{
			echo 0;
		}	
	}
	else
	{
		echo 0;
	}
}
else
{
	echo 0;
}
?>