<?php
include "dp.php";

$q=mysqli_query($con,"select * from `plandetails` ");
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}

echo json_encode($data);
?>