<?php
$con=mysqli_connect("localhost", "root", "", "bcms_db");
mysqli_query($con, "SET NAMES 'utf8' ");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}

  ?>
