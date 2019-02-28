<?php
include "dp.php";
$res=json_encode($_POST);
$res_array=json_decode($res);

$otp='';
for($i=0;$i<6;$i++)
{
	$otp .= mt_rand(0,9);
}
$expdate=date('Y-m-d H:i:s',strtotime('+10 minutes',strtotime(date('Y-m-d H:i:s'))));
$cname=$res_array->cname;
$name=$res_array->name;
$mobile=$res_array->mobile;
$amobile=$res_array->altmobile;
$email=$res_array->email;
$img=$res_array->simgname;
$accesskey=$res_array->accesskey;
$pswd=md5($res_array->password);
$df=date('Y-m-d H:i:s');
$du=date('Y-m-d H:i:s');

/************ SMS Parameters ***************************/
$request =""; //initialise the request variable
$param['sender']= "TESTTO";
$param['phone'] = $mobile;
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

if($mobile !='')
{
	$fld="phonenumber='$mobile'";
	if($accesskey != '')
	{
		$fld="phonenumber = '$mobile' and accesskey != '$accesskey'";
	}
	$q = mysqli_query($con,"select id from `userdetails` where $fld");
	if($q == false || mysqli_num_rows($q) == 0)
	{
		$q=mysqli_query($con,"INSERT INTO `userdetails` (`company_name`,`name`,`phonenumber`,`alternumber`,`emailid`,`profilepic`,`accesskey`,`loginaccess`,`accessexpiry`,`password`,`dateofcreation`,`dateofupdate`) VALUES ('$cname','$name','$mobile','$amobile','$email','$img','$accesskey','$otp','$expdate','$pswd','$df','$du')");
		if($q)
		{
			echo "success";
			
			//send sms
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$curl_scraped_page = curl_exec($ch);
			curl_close($ch);		
			
		}
		else
		{
			echo "fail";
		}
	}
	else
	{
		echo 'success';
		//send sms
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$curl_scraped_page = curl_exec($ch);
		curl_close($ch);
		
		if($img != '')
		{
			unlink('upload/'.$img);
		}
	}	
}
else
{
	echo "blank";
}
?>