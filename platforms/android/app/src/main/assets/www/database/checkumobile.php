<?php
include "dp.php";
$m=isset($_REQUEST['m'])?$_REQUEST['m']:'';
$im=isset($_REQUEST['im'])?$_REQUEST['im']:'';
$accesskey=isset($_REQUEST['accesskey'])?$_REQUEST['accesskey']:'';
$status=0;
if($m !='')
{
	$fld="phonenumber='$m'";
	if($accesskey != '')
	{
		$fld="phonenumber = '$m' and accesskey != '$accesskey'";
	}
	$q = mysqli_query($con,"select id,status from `userdetails` where $fld");
	if($q == false || mysqli_num_rows($q) == 0)
	{
		echo 0;
	}
	else
	{
		if(mysqli_num_rows($q) > 0)
		{
			while ($row=mysqli_fetch_array($q)){
				$status=$row['status'];
			}
		}
		if($status == 0)
		{
			$otp='';
			for($i=0;$i<6;$i++)
			{
				$otp .= mt_rand(0,9);
			}
			$expdate=date('Y-m-d H:i:s',strtotime('+10 minutes',strtotime(date('Y-m-d H:i:s'))));
			/************ SMS Parameters ***************************/
			$request =""; //initialise the request variable
			$param['sender']= "TESTTO";
			$param['phone'] = $m;
			$param['text'] = 'Your Mobile Verification Code is '.$otp;
			$param['user'] = "9449814181";
			$param['pass'] = "Jps143somuch";
			$param['stype'] = "normal"; 
			$param['priority'] = "ndnd"; 

			//Have to URL encode the values
			foreach($param as $key=>$val) {
				$request.= $key."=".urlencode($val);
				//we have to urlencode the values
				$request.= "&";
				//append the ampersand (&) sign after each	parameter/value pair
			}
			$request = substr($request, 0, strlen($request)-1);
			//remove final (&) sign from the request
			$url ="http://bhashsms.com/api/sendmsg.php?".$request;

			/***************************************/
			//send sms
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$curl_scraped_page = curl_exec($ch);
			curl_close($ch);
			
			$qs=mysqli_query($con,"UPDATE `userdetails` SET `loginaccess`='$otp',`accessexpiry`='$expdate' where `phonenumber`='$m'");
		}
		echo 'exists/'.$status;
		if($im != '')
		{
			unlink('upload/'.$im);
		}
	}
	
}
else
{
	echo 0;
}
?>