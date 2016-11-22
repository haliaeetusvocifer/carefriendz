<?php

include ("database/database.php");

include ("functions.php");

$claim_id = null;

$num_requests = 0;
$max_request_limit = 5;

if (isset($_GET['claim'])) {
	
	$claim_id = $_GET['claim'];
	
	//      $get_posts = "select * from donatetable where id='$claim_id'";
	//      $run_posts = mysqli_query($DB_con, $get_posts);
	
	//    ($row_posts = mysqli_fetch_array($run_posts)) ;
	
	$stmt = $DB_con->prepare('SELECT * FROM tbl_items WHERE itemID = :claim_id ');
	$stmt->execute(array(':claim_id' => $claim_id));
	
	if($stmt->rowCount() > 0){
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		//	extract($row);
		
		$post_id 			= $row['itemID'];
		$itemName 			= $row['itemName'];
		$itemColor 			= $row['itemColor'];
		$itemDescription 	= $row['itemDescription'];
		$itemLocation 		= $row['itemLocation'];
		$itemEmail 			= $row['itemMail'];
		$itemDate 			= $row['dateTime'];
		$itemPic 			= $row['itemPic'];
		$viewCode 			= $row['viewCode'];
		$claimStatus 		= $row['claimStatus'];
		
		$requests_info 	= fetchItemRequests($DB_con, $post_id);
		if($requests_info !== false){
			//	print_r($requests_info);
			$num_requests = count($requests_info);
		}
		
	}
}


if (isset($_POST['claim_sub'])) {
	
	//keep track of validation
	
	$fnameError 		= null;
	$lnameError 		= null;
	$locationError 		= null;
	$phoneNumberError 	= null;
	$genderError 		= null;
	$reasonError 		= null;
    $emailError 		= null;
    $imageError 		= null;
	
	
	//keep track post values
	
	$fname 			= protect($_POST['cl_fname']);
	$lname 			= protect($_POST['cl_lname']);
	$location 		= protect($_POST['cl_location']);
	$phoneNumber 	= protect($_POST['cl_phone']);
	$gender 		= protect($_POST['cl_gender']);
	$reason 		= protect($_POST['cl_reason']);
	$email 			= protect($_POST['cl_email']);
	$date 			= date( 'Y-m-d H:i:s' );
	
//	$image 			= $_FILES['cl_image']['name'];
//  $image_tmp 		= $_FILES['cl_image']['tmp_name'];
//	$imgSize 		= $_FILES['cl_image']['size'];
	
	
	// validate input
	
	if ($claim_id == null OR $fname=='' OR $lname=='' OR $location=='' OR $phoneNumber=='' OR $gender=='' OR $reason=='' OR $email=='') { // OR $image=='') {
		
		echo "<script>alert('Please fill in all fields, Thanks')</script>";
		
		exit();
		
	}
	// insert data
	else{
	
	/*	$upload_dir = 'donations/request_images/'; // upload directory
		
		$imgExt = strtolower(pathinfo($image, PATHINFO_EXTENSION)); // get image extension
		
		// valid image extensions
		$valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
		
		// rename uploading image
		$itempic = rand(1000,9000000).".".$imgExt;
		
		// allow valid image file formats
		if(in_array($imgExt, $valid_extensions)){			
			// Check file size '5MB'
			if($imgSize < 5000000)				{
				move_uploaded_file($image_tmp, $upload_dir.$itempic);
			}
			else{
				$errMSG = "Sorry, your file is too large.";
			}
		}
		else{
			$errMSG = "Sorry, only JPG, JPEG & PNG files are allowed.";
			$imageError = true;
		}
		
		if($imageError != null){
			
		}else{	*/
					
		//	$stmt = $DB_con->prepare('INSERT INTO claimcontact(item_id, fname, lname, locationname, phonenumber, gender, reason, email, passport, status, date) 
		//	VALUES(:claim_id, :c_fname, :c_lname, :c_location, :c_phone, :c_gender, :c_reason, :c_email, :c_passport, :c_status, :c_date)');
			
			$stmt = $DB_con->prepare('INSERT INTO claimcontact(item_id, fname, lname, locationname, phonenumber, gender, reason, email, status, date) 
			VALUES(:claim_id, :c_fname, :c_lname, :c_location, :c_phone, :c_gender, :c_reason, :c_email, :c_status, :c_date)');
			
			$stmt->bindParam(':claim_id',	$claim_id);
			$stmt->bindParam(':c_fname',	$fname);
			$stmt->bindParam(':c_lname',	$lname);
			$stmt->bindParam(':c_location',	$location);
			$stmt->bindParam(':c_phone',	$phoneNumber);
			$stmt->bindParam(':c_gender',	$gender);
			$stmt->bindParam(':c_reason',	$reason);
			$stmt->bindParam(':c_email',	$email);
	//		$stmt->bindParam(':c_passport',	$itempic);
			$record_status = 0;
			$stmt->bindParam(':c_status',	$record_status);
			$stmt->bindParam(':c_date',		$date);
			
			if($stmt->execute())
			{
		//		$successMSG = "Thank you for donating. check your mail for confirmation and to view your donation code.";
				
				//email notification start
				$to = $email;
				$subject = "Request to Claim Item Received";
				$message = "Hello ".$fname.",
				
				Thank you for requesting an item on carefriendz
				
				Please note that some other individuals will be requesting this item also and the donor will select the recipient. You may request another item at anytime.

                                We hope to see you soon on carefriendz. Please give something to someone too.
				
				Thank you!
				
				Carefriendz is a platform where you give away that item to someone in need.
				
				
				Care Advance is a platform under carefriendz.
				
				For more information about us and our services , please connect with us online though the following media;
				
				Facebook: www.facebook.com/
				Twitter: 
				Email: info@carefriendz.com.ng
				Website: www.carefriendz.com
				Phone: +234 703 355 4128 | +234 802 827 1947 | +234 703 133 8863
				
				Thank you.
				";
				
				$headers = "From: no-reply@carefriendz.com.ng" . "\r\n";
				
				$successMSG	= "Thank You for requesting to claim this Item. We will notify you if the Donor accepts your request.";
				
				if(mail($to,$subject,$message,$headers)){
				//	header("refresh:3;index.php"); // redirects image view page after 5 seconds.
					
					if(isset($itemEmail) && isset($itemName) ){
						
						$donor_email = $itemEmail;
						$item_name = $itemName;
						sendNoticeOfRequestEmailToDonor($donor_email, $item_name);
					}
					
				}
				//email notification ends
			}
			else
			{
				$errMSG = "error while inserting....";
			}
			
	//	}
	}
}

?>

<!DOCTYPE html>

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!-->

<html lang="en">

<!--<![endif]-->

	<head>

		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Carefriendz is the platform where you give unused items to people who need them and connect to opportunities of care">
    <meta name="author" content="Carefriendz Developers">
    <title>Carefriendz: Claim</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Font Awesome -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">    
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css"/> 
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="assets/css/jquery.fancybox.css" type="text/css" media="screen" /> 
    <!-- Animate css -->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css"/> 
    <!-- Progress bar  -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-progressbar-3.3.4.css"/> 
     <!-- Theme color -->
    <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">

    <!-- Main Style -->
    <link href="style.css" rel="stylesheet">

    <!-- Fonts -->

    <!-- Open Sans for body font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!-- Lato for Title -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>    
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<style type="text/css">
    .bs-example{
      margin: 20px;
    }
    .modal-content iframe{
        margin: 0 auto;
        display: block;
    }
</style>




<head>

	<title>Claim</title>



	<style type="text/css">

		.jumbotron{



			width: 70%;

		}

	</style>

</head>

<body>
	
<!-- SCROLL TOP BUTTON -->
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->

  
  
  

  <!-- BEGIN MENU -->
  <section id="menu-area">      
    <nav class="navbar navbar-default" role="navigation">  
      <div class="container">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->              
          <!-- TEXT BASED LOGO -->
          <a class="navbar-brand" href="index.php"><img src="assets/images/cfdlonglogo.png" alt="carefriendz"></a>              
          
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li><a href="index.php">Home</a></li>
            <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">About<span class="fa fa-angle-down"></span></a>
                    <ul class="dropdown-menu" role="menu">
                       <li><a href="about.php">About Us</a></li>                
                        <li><a href="#">FAQ</a></li>
                  </ul>
           </li>

           <li><a href="donate.php">Donate</a></li>
           <li><a href="donor_view.php">View Recipient</a></li>            
            <li><a href="careadvance/index.php">CareAdvance</a></li>
            <li><a href="#">How it Works</a></li>
            <li><a href="testimony.php">Testimonials</a></li>
          </ul>                     
        </div><!--/.nav-collapse -->
        
      </div>     
    </nav>
  </section>
  <!-- END MENU --> 
  <div></div>


<div class="container">

  <div class="jumbotron">

  

		<div style="font-size:17px; padding-top:0px; margin-top:0px;"><?php echo "$itemName"; ?></div>
		
		 <div class="row">

			<div class="col-md-8 b-advert__info">

				<span class="glyphicon glyphicon-time h-width-13"></span>

				Posted On <?php echo "$itemDate"; ?>

				<time datetime="2016-08-10T11:12:58-00:00"></time>

				&nbsp;&nbsp;&nbsp;&nbsp;

				<span class="glyphicon glyphicon-map-marker h-width-13"></span>

				 <?php echo "$itemLocation"; ?>
				<br/>
			</div>
			
		</div>

   

    <?php echo "<img src='donations/item_images/".$itemPic."'  class='img-thumbnail'  width='554' height='336'>"; ?> 
	<br/><br/>
    <p><?php echo "$itemDescription"; ?></p>
	
	  <!-- section start --> 
	  
	  <section class="section transprant-bg pclear secPadding">
		  
		  <div class="container no-view" data-animation-effect="fadeIn">
			  
			  <div class="container">
				  
				  <h3 id="contact" class="title text-center" style="font-size:40px;">Request to Claim this Item</h3>
				  
				  <div class="space"></div>
				  
				  <div class="row">
					  
					  <div class="col-md-2"></div>
					  
					  <div class="col-md-8">
						  
						  <div class="h-background-white h-pv-15 h-ph-15 h-mt-20">
							  
							  <div style="clear: both;"></div>
							  
							  <div class="b-add-item-form">
							  
		  <?php
			  if(isset($errMSG)){
			  ?>
			  <div class="alert alert-danger">
				  <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
			  </div>
			  <?php
			  }
			  else if(isset($successMSG)){
			  ?>
			  <div class="alert alert-success">
				  <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
			  </div>
			  <?php
			  }
		  ?>
		  
		  <?php
			  if($num_requests > $max_request_limit){
			  ?>
			  <div class="alert alert-danger">
				  <span class="glyphicon glyphicon-info-sign"></span> <strong>The Maximum number of Requests for this Item has been made. Please request for another Item.</strong>
			  </div>
			  <?php
			  }
		  ?>
								  
		<form method="POST" role="form" id="footer-form" enctype="multipart/form-data">

			<div class="form-group b-tooltip__form-group ">
				<label for="title"> First Name<strong class="h-red">*</strong> </label> 
				<input type="text" value="" autofocus="" autocomplete="" name="cl_fname" class="form-control wow fadeInUp" data-container="body" data-content="Field must be between 3 and 50 characters long. Note: CAPS LOCK text will be automatically edited." data-placement="right" data-toggle="popover" placeholder="" required/>
			</div>

			<div class="form-group b-tooltip__form-group ">
				<label for="color"> Surname<strong class="h-red">*</strong> </label>
				<input type="text" value="" autofocus="" autocomplete="" name="cl_lname" class="form-control wow fadeInUp" data-container="body" data-content="Field must be between 5 and 50 characters long. Note: CAPS LOCK text will be automatically edited." data-placement="right" data-toggle="popover" placeholder="" required/>
			</div>

			<div class="form-group b-tooltip__form-group ">
				<label for="location"> Location<strong class="h-red">*</strong> </label>
				<input type="text" value="" autofocus="" autocomplete="" name="cl_location" class="form-control wow fadeInUp" data-container="body" data-content="Field must be between 5 and 30 characters long. Note: CAPS LOCK text will be automatically edited." data-placement="right" data-toggle="popover" placeholder="Please tell us your location" required/>
			</div>

			<div class="form-group b-tooltip__form-group ">
				<label for="location"> Phone Number<strong class="h-red">*</strong> </label>
				<input type="number" value="" autofocus="" autocomplete="" name="cl_phone" class="form-control wow fadeInUp" data-container="body" data-content="Field must be between 5 and 30 characters long. Note: CAPS LOCK text will be automatically edited." data-placement="right" data-toggle="popover" placeholder="" required/>
			</div>

			<div class="form-group b-tooltip__form-group ">
				<label for="location"> Gender <strong class="h-red">*</strong> </label><br/>
				Male <input type="radio" name="cl_gender" value="male" required />
				Female <input type="radio" name="cl_gender" value="female" required />
			</div>

			<div class="form-group b-tooltip__form-group ">
				<label for="description"> Reasons Why You need this Item<strong class="h-red">*</strong> </label>        
				<textarea class="form-control" data-container="body" data-content="Field must be between 50 and 10000 characters long" data-placement="right" data-toggle="popover" name="cl_reason" placeholder="Please provide a detailed description of why you need this item and how it can be of help to you. You can mention as many details as possible. It will aid the donor to make the right choice for prospective recipients." rows="6"></textarea>                   
				<div id="description_error" class="error help-block h-mb-0 h-hidden h-red h-mt-5"></div>
			</div>

			<div class="form-group b-tooltip__form-group ">
				<label for="email"> Email Address<strong class="h-red">*</strong> </label>
				<input type="text" value="" autofocus="" autocomplete="" name="cl_email" class="form-control wow fadeInUp" data-container="body" data-placement="right" data-toggle="popover" placeholder="Enter Active Email Address" required/>
			</div>
<?php /*
			<div class="form-group b-tooltip__form-group ">
				<label for="image">
				<label>Your Passport Photo:</label>
				<div class="image-upload">
					<label for="file-input"> </label>
					<input id="file-input" type="file" class="btn btn-default" name="cl_image" onchange="readURL(this);"/>
				</div>
			</div>		*/ ?>

			<?php
				if($num_requests > $max_request_limit){
			?>
				<button type="button" name="claim_sub" disabled class="btn btn-primary btn-lg btn-block"><h4>Maximum Requests for Item!</h4></button>
			<?php
				}else{
			?>
				<button type="submit" name="claim_sub" class="btn btn-primary btn-lg btn-block"><h4>Submit Claim Request now »</h4></button>
			<?php
				}
			?>
		</form>
										  
		</div>
	</div>
								  
</div>
							  
<div class="col-md-2"></div>
	
						</div>
						  
					</div>
					  
				</div>
				  
			</section>
		
			<!--Section End-->
	
	</div>
	
</div>

	<!-- Start footer -->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="footer-left">
             <!-- <p>Designed by <a href="http://www.markups.io/">MarkUps.io</a></p> -->
            © 2016 Carefriendz
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="footer-right">
            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
            
            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
            <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End footer -->

		<!-- JavaScript --> 

		<script type="text/javascript" src="plugins/jquery.min.js"></script>

		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

		<script type="text/javascript" src="plugins/modernizr.js"></script>

		<script type="text/javascript" src="plugins/isotope/isotope.pkgd.min.js"></script>

		<script type="text/javascript" src="plugins/jquery.backstretch.min.js"></script>

		<script type="text/javascript" src="plugins/jquery.appear.js"></script>

		<!-- Custom Scripts -->

		<script type="text/javascript" src="js/custom.js"></script>

	</body>

</html>