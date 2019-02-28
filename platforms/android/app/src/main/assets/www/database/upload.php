<?php
include "dp.php";
$a=isset($_REQUEST['a'])?$_REQUEST['a']:'';
$id=isset($_REQUEST['id'])?$_REQUEST['id']:'';
$img='';
// Set new file name
$new_image_name = "usrpic_".mt_rand().".jpg";
if(isset($_FILES["file"]["name"]))
{
	// upload file
	move_uploaded_file($_FILES["file"]["tmp_name"], 'upload/'.$new_image_name);
	if($a != '' && $id != '')
	{
		$q = mysqli_query($con,"select profilepic from `userdetails` where accesskey='$id' ");
		if($q != false && mysqli_num_rows($q) > 0)
		{
			$qs=mysqli_query($con,"UPDATE `userdetails` SET `profilepic`='$new_image_name' where `accesskey`='$id'");
			while ($row=mysqli_fetch_array($q)){
				$img=$row['profilepic'];
			}
			if($img != '')
			{
				if(file_exists('upload/'.$img))
				{
					unlink('upload/'.$img);	
				}
			}
		}	
	}
	echo $new_image_name ;
}
else
{
	echo 'NA';
}
?>