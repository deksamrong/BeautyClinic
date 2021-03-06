<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
////jksld
    $name=$_POST['name'];
    $email=$_POST['email'];
    $services=$_POST['services'];
    $adate=$_POST['adate'];
    $atime=$_POST['atime'];
    $phone=$_POST['phone'];
    $aptnumber = mt_rand(100000000, 999999999);
    $query=mysqli_query($con,"insert into tblappointment(AptNumber,Name,Email,PhoneNumber,AptDate,AptTime,Services) value('$aptnumber','$name','$email','$phone','$adate','$atime','$services')");

if ($query) {
$ret=mysqli_query($con,"select AptNumber from tblappointment where Email='$email' and  PhoneNumber='$phone'");
$result=mysqli_fetch_array($ret);
$_SESSION['aptno']=$result['AptNumber'];
echo "<script>alert('จองบริการสำเร็จ.');</script>"; 	
echo "<script>window.location.href = 'thank-you.php'</script>";
  }
  else
    {
      $msg="มีบางอย่างผิดพลาด กรุณาลองใหม่อีกครั้ง";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>คลินิกเสริมความงาม | ยินดีต้อนรับ</title> 
	<link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>
 
	<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
	
  </head>
  <body>
	  <?php include_once('includes/header.php');?>
    <!-- END nav -->
    <br><br><br>
    <section id="hero-wrap hero-wrap-2" style="background-image: url(images/2021010716100288061.jpg);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="home-slider owl-carousel">
	      <div class="slider-item js-fullheight">
	      
	        <div class="container-fluid p-0">
	          <div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
	          	<img class="one-third align-self-end order-md-last img-fluid" src="images/202107091625809974.jpg" alt="">
		          
	        	</div>
	        </div>
	      </div>

	    </div>
    </section>
	<br>
    <section class="ftco-section ftco-no-pt ftco-booking">
    	<div class="container-fluid px-0">
    		<div class="row no-gutters d-md-flex justify-content-end">
    			<div class="one-forth d-flex align-items-end">
    				<div class="text">
    					<div class="overlay"></div>
    					<div class="appointment-wrap">
    						<span class="subheading">จองคิวบริการ</span>
							<h2 class="ftco-heading-2">กรอกข้อมูลเพื่อทำการจองคิวล่วงหน้า</h2>
		    				<form action="#" method="post" class="appointment-form">
			            <div class="row">
			              <div class="col-sm-12">
			                <div class="form-group">
					              <input type="text" class="form-control" id="name" placeholder="ชื่อ" name="name" required="true">
					            </div>
			              </div>
			              <div class="col-sm-12">
			                <div class="form-group">
					              <input type="email" class="form-control" id="appointment_email" placeholder="Email" name="email" required="true">
					            </div>
			              </div>
				            <div class="col-sm-12">
			                <div class="form-group">
					              <div class="select-wrap">
		                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                      <select name="services" id="services" required="true" class="form-control">
		                      	<option value="">เลือกบริการ</option>
		                      	<?php $query=mysqli_query($con,"select * from tblservices");
              while($row=mysqli_fetch_array($query))
              {
              ?>
		                       <option value="<?php echo $row['ServiceName'];?>"><?php echo $row['ServiceName'];?></option>
		                       <?php } ?> 
		                      </select>
		                    </div>
					            </div>
			              </div>
			              <div class="col-sm-12">
			                <div class="form-group">
			                  <input type="text" class="form-control appointment_date" placeholder="วันที่" name="adate" id='adate' required="true">
			                </div>    
			              </div>
			              <div class="col-sm-12">
			                <div class="form-group">
			                  <input type="text" class="form-control appointment_time" placeholder="เวลา" name="atime" id='atime' required="true">
			                </div>
			              </div>
			              <div class="col-sm-12">
			                <div class="form-group">
			                  <input type="text" class="form-control" id="phone" name="phone" placeholder="เบอรโทรศัพท์" required="true" maxlength="10" pattern="[0-9]+">
			                </div>
			              </div>
				          </div>
				          <div class="form-group">
			              <input type="submit" name="submit" value="จองคิว" class="btn btn-primary">
			            </div>
			          </form>
		          </div>
						</div>
    			</div>
					<div class="one-third">
						<div class="img" style="background-image: url(images/Cover-for-Website-1.jpg);">
						</div>
					</div>
    		</div>
    	</div>
    </section>
<br>
    <section class="ftco-section ftco-no-pb" style="background-image: url(images/default-body.jpg);">
    	<div class="container">
    		<div class="row no-gutters justify-content-center mb-5 pb-2">
          <div class="col-md-6 text-center heading-section ftco-animate">
          	<h2 class="w3ls_head">โปรโมชั่น </h2>
			  <hr>
        </div>
    	</div>
			<div class="container-fluid p-0">
    		<div class="row no-gutters">
			<?php
$ret=mysqli_query($con,"select *from  tblpromotion LIMIT 4");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

	<div class="col-md-6 col-lg-3 ftco-animate">

    				<div class="project">
	    				<img src="images/<?php  echo $row['uploadfile'];?>" HSPACE="15" class="img-fluid" alt="Colorlib Template">
	    				<div class="text">
              			<h3><?php  echo $row['proname'];?></h3>
						</div>
	    				<a href="images/<?php  echo $row['uploadfile'];?>" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="icon-expand"></span>
	    				</a>
    				</div>
    			</div>	
	
 <?php 
$cnt=$cnt+1;
}?>

    		</div>
    	</div>
</div>
<br>
		</section>
		
<section class="ftco-section ftco-no-pb" style="background-image: url(images/default-body.jpg);">
    	<div class="container" >
    		<div class="row no-gutters justify-content-center mb-5 pb-2" >
          <div class="col-md-6 text-center heading-section ftco-animate" >
          	<h4 class="w3ls_head">MULAR & REVIEW </h4>
			  <hr>
        </div>
    	</div>
			<div class="container-fluid p-0">
    		<div class="row no-gutters">
			<?php
$ret=mysqli_query($con,"select * from  tblreview LIMIT 4");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>

	<div class="col-md-6 col-lg-3 ftco-animate" >
    				<div class="project">
	    				<img src="images/review/<?php  echo $row['uplaodfile'];?>" HSPACE="15" class="img-fluid" alt="Colorlib Template">	
	    				
						<div class="text"><h5 style="color:#FFFFFF;"><?php  echo $row['reviewname'];?></h5>
</div>
						<a href="images/review/<?php  echo $row['uplaodfile'];?>" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="icon-expand"></span>
	    				</a>
    				</div>
    			</div>	
	
          <?php 
$cnt=$cnt+1;
}?>

    		</div>
    	</div>
</div>
<br>
		</section>

   <?php include_once('includes/footer.php');?>
    
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

   
  </body>
</html>