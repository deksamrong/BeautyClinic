 <?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
 <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            <div class="logo">
                <img src="images/Logo.png" width="240" alt="" />
            </div>
              <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='aboutus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              <p><?php  echo substr($row['PageDescription'],0,400);?> <a href="about.php">อ่านต่อ.......</a></p><?php } ?>
            
            </div>
          </div>
         
          <div class="col-md" style="padding-left: 150px">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="index.php" class="py-2 d-block">ศัลยกรรม</a></li>
                <li><a href="about.php" class="py-2 d-block">ปรับรูปหน้า</a></li>
                <li><a href="services.php" class="py-2 d-block">เลเซอร์ / หน้าใส</a></li>
               
                <li><a href="admin/index.php" class="py-2 d-block">Admin</a></li>
                <li><a href="contact.php" class="py-2 d-block">ทรีทเมนต์</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">ติดต่อ</h2>
            	<div class="block-23 mb-3">
                <?php
        $ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {

        ?>
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text"><?php  echo $row['PageDescription'];?></span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+<?php  echo $row['MobileNumber'];?></span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text"><?php  echo $row['Email'];?></span></a></li>
	              </ul>
	            </div>
               <?php } ?>
            </div>
          </div>
        </div>
      </div>
      
    </footer>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="left">
                    <span>© Copyright 2021</span> 
                    <span>MUlA Clinic.</span> 
                    <span>All Right Severed.</span>
                </div> 
            </div>
        </div>
    </div>
   

    