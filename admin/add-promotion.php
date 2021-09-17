<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Bangkok');
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit'])) {
    $sername=$_POST['proname'];
	$fileupload = $_POST['fileupload']; //รับค่าไฟล์จากฟอร์ม	
	
	$date = date("Ymd");	
	$numrand = (mt_rand());
	//เพิ่มไฟล์
	$upload=$_FILES['fileupload'];
if($upload !='') {
	$path="../images/"; 
	$type = strrchr($_FILES['fileupload']['name'],".");
	//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
	$newname = $date.$numrand.$type;
	$path_copy=$path.$newname;
	$path_link="../images/".$newname;
	
	move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy); 
}
	$sql = "insert into  tblpromotion(proName,uploadfile) values('$sername','$newname')";
    $query=mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());;
    if ($query) {
    	echo "<script>alert('เพิ่มบริการสำเร็จ.');</script>"; 
    		echo "<script>window.location.href = 'add-promotion.php'</script>";   
    $msg="";
  }
  else
    {
    echo "<script>alert('ข้อมูลไม่ถูกต้อง. กรุณาลองใหม่.');</script>";  	
    }

 	
}
  ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ระบบจัดการคลินิกความงาม</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		 <?php include_once('includes/sidebar.php');?>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
	 <?php include_once('includes/header.php');?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h3 class="title1">เพิ่มโปรโมชั่น</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>โปรโมชั่นของคลินิก:</h4>
						</div>
						<div class="form-body" >
							<form method="post" enctype="multipart/form-data">
								<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

							 <div class="form-group"> <label for="exampleInputEmail1">ชื่อโปรโมชั่น</label> <input type="text" class="form-control" id="proname" name="proname"  value="" required="true"> </div> 
							 
							 <div class="form-group"> รูปภาพ<input type="file" name="fileupload" id="fileupload"> </div>
							  <button type="submit" name="submit" class="btn btn-default">เพิ่ม</button> </form> 
						</div>
						
					</div>
				
				
			</div>
		</div>
		 <?php include_once('includes/footer.php');?>
	</div>
	<!-- Classie -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
</body>
</html>
<?php } ?>