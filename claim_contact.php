<?php



include ("database/database.php");



if (!empty($_POST)) {

	//keep track of validation

	$fnameError = null;

	$lnameError = null;

	$locationError = null;

	$phoneNumberError = null;

	$genderError = null;

	$reasonError = null;

    $emailError = null;

    $imageError = null;



	//keep track post values

	$fname 			= $_POST['fname'];

	$lname 			= $_POST['lname'];

	$location 		= $_POST['location'];

	$phoneNumber 	= $_POST['phoneNumber'];

	$gender 		= $_POST['gender'];

	$reason 		= $_POST['reason'];

	$email 			= $_POST['email'];

	$date 			= date('m-d-y');

	$image 			= $_FILES['image']['name'];

    $image_tmp 		= $_FILES['image']['tmp_name'];

	$message 		= "Thank You For Claimed This Item, Donator We Get Back To You";





	// validate input

		

		if ($fname=='' OR $lname=='' OR $location=='' OR $phoneNumber=='' OR $gender=='' OR $reason=='' OR $email=='' OR $image=='') {

	     echo "<script>alert('Please fill in all fields, Thanks')</script>";

		 exit();

	       }



		// insert data



		else{

			move_uploaded_file($image_tmp, "others/images/$image");

			$insert = "INSERT INTO claimcontact(fname,lname,locationname,phonenumber,gender,reason,email,image,date) values('$fname', '$lname', '$location', '$phoneNumber', '$gender','$reason','$email','$image','$date')";



			$insert_run = mysqli_query($con, $insert);



			if ($insert_run) {

			}

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
    <title>Carefriendz: </title>
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



<script>

	function readURL(input) {

		if (input.files && input.files[0]) {

			var reader = new FileReader();

			reader.onload = function (e) {

				$('#blah')
					.attr('src', e.target.result)
					.width(250)
					.height(200);
			};
			reader.readAsDataURL(input.files[0]);
		}
		
	}

</script>

<style type="text/css">

.image-upload > input{
    display: none;
}

.image-upload img{
    width: 150px;
    cursor: pointer;
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
          <a class="navbar-brand" href="index.php"><img src="assets/images/cfdlonglogo.png" alt="Carefriendz"></a>              
          
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li class="active"><a href="index.php">Home</a></li>
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








<!-- section start --> 

		<section class="section transprant-bg pclear secPadding">

		<div class="container no-view" data-animation-effect="fadeIn">

			<div class="container">

				

				<h1 id="contact" class="title text-center" style="font-size:40px;">Add unused items</h1>

				<div class="space"></div>

				<div class="row">

				

				<div class="col-md-2"></div>

				

				<div class="col-md-8">

				<div class="h-background-white h-pv-15 h-ph-15 h-mt-20">

				<div style="clear: both;"></div>

				

				<div class="b-add-item-form">

								<form method="POST" role="form" id="footer-form" action="claim_contact.php" enctype="multipart/form-data">





									<div class="form-group b-tooltip__form-group ">

									<label for="title">

                						First Name<strong class="h-red">*</strong>                

            						</label> 

										

										<input type="text" value="" autofocus="" autocomplete="" name="fname" class="form-control wow fadeInUp" data-container="body" data-content="Field must be between 3 and 50 characters long. Note: CAPS LOCK text will be automatically edited." data-placement="right" data-toggle="popover" placeholder="Please identify the item Name you want to give away" required/>

										

									</div>

									<div class="form-group b-tooltip__form-group ">

										<label for="color">

                							Last Name<strong class="h-red">*</strong>                

            							</label>

										<input type="text" value="" autofocus="" autocomplete="" name="lname" class="form-control wow fadeInUp" data-container="body" data-content="Field must be between 5 and 50 characters long. Note: CAPS LOCK text will be automatically edited." data-placement="right" data-toggle="popover" placeholder="Please identify the item color you want to give away" required/>

									</div>



                                    <div class="form-group b-tooltip__form-group ">

										<label for="location">

                							Location<strong class="h-red">*</strong>                

            							</label>

										<input type="text" value="" autofocus="" autocomplete="" name="location" class="form-control wow fadeInUp" data-container="body" data-content="Field must be between 5 and 30 characters long. Note: CAPS LOCK text will be automatically edited." data-placement="right" data-toggle="popover" placeholder="Please tell us your location" required/>

									</div>



									<div class="form-group b-tooltip__form-group ">

										<label for="location">

                							Phone Number<strong class="h-red">*</strong>                

            							</label>

										<input type="number" value="" autofocus="" autocomplete="" name="phoneNumber" class="form-control wow fadeInUp" data-container="body" data-content="Field must be between 5 and 30 characters long. Note: CAPS LOCK text will be automatically edited." data-placement="right" data-toggle="popover" placeholder="Please tell us your location" required/>

									</div>



                                          <div class="form-group b-tooltip__form-group ">

										<label for="location">

                							Gender <strong class="h-red">*</strong>                

            							</label><br/>

									Male <input type="radio" name="gender" value="girl"/>

                                     Female <input type="radio" name="gender" value="boy"/>

                                     	</div>



									<div class="form-group b-tooltip__form-group ">

                    					<label for="description">

                							Reason For Claiming<strong class="h-red">*</strong>

                						</label>        

                    					<textarea class="form-control" data-container="body" data-content="Field must be between 50 and 10000 characters long" data-placement="right" data-toggle="popover" name="reason" placeholder="Please provide a detailed description. You can mention as many details as possible. It will make your unused items more attractive for prospective recipients." rows="6"></textarea>                   

    

    									<div id="description_error" class="error help-block h-mb-0 h-hidden h-red h-mt-5"></div>

               					 	</div>





               					 	





									<div class="form-group b-tooltip__form-group ">

										<label for="email">

                							Email Address<strong class="h-red">*</strong>                

            							</label>

            							<input type="text" value="" autofocus="" autocomplete="" name="email" class="form-control wow fadeInUp" data-container="body" data-placement="right" data-toggle="popover" placeholder="Enter Active Email Address" required/>

									</div>

								<div class="form-group b-tooltip__form-group ">

										<label for="image">

			                        <label>Select Image:</label>



			                        <div class="image-upload">

                                     <label for="file-input">

                                     <img id="blah" src="others/images/icon.jpg" width="150" height="150" alt="your image" />

                                       </label>

                                             <input id="file-input" type="file" name="image" onchange="readURL(this);"/>

                                          </div>

			    







									

    								









                                     <input type="submit" name="Submit" class="btn btn-default" value="CLAIM NOW"/>



									

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







		<?php

if (isset($_POST['Submit'])) {

	 

	// use actual sendgrid username and password in this section

	$url = 'https://api.sendgrid.com/'; 

	$user = 'yemmite'; // place SG username here

	$pass = 'Bonke444'; // place SG password here



	//keep track post values

	$fname = $_POST['fname'];

	$lname = $_POST['lname'];

	$location = $_POST['location'];

	$phoneNumber = $_POST['phoneNumber'];

	$gender = $_POST['gender'];

	$reason = $_POST['reason'];

	$email = $_POST['email'];

	 $date = date('m-d-y');

	 $image = $_FILES['image']['name'];

     $image_tmp = $_FILES['image']['tmp_name'];



     $message = "Thank You For Claimed This Item, Donator We Get Back To You";





	// note the above parameters now referenced in the 'subject', 'html', and 'text' sections

	// make the to email be your own address or where ever you would like the contact form info sent



	$json_string = array(



	  'to' => array(

	'$email'

	),

	  'category' => 'test_category'

	);



	$params = array(

	    'api_user'  => "$user",

	    'api_key'   => "$pass",

	    'x-smtpapi' => json_encode($json_string),

	    'to'        => "adebayooluyemi4@gmail.com",

	    'replyto'        => "hazizsegun@gmail.com",

	    'subject'   => "Contact Form Carefriendz", // Either give a subject for each submission, or set to $subject

	    'html'      => "<html><head><title>Contact Form</title><body>

	    Name: $fname\n<br>

	  

	  

	    Message: $message <body></title></head></html>", // Set HTML here.  Will still need to make sure to reference post data names

	    'text'      => "

	   

	    $message",

	    'from'      => 'hazizsegun@gmail.com', // set from address here, it can really be anything

	  );



		curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);

		$request =  $url.'api/mail.send.json';

		// Generate curl request

		$session = curl_init($request);

		// Tell curl to use HTTP POST

		curl_setopt ($session, CURLOPT_POST, true);

		// Tell curl that this is the body of the POST

		curl_setopt ($session, CURLOPT_POSTFIELDS, $params);

		// Tell curl not to return headers, but do return the response

		curl_setopt($session, CURLOPT_HEADER, false);

		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

		// obtain response

		$response = curl_exec($session);

		curl_close($session);

		// Redirect to thank you page upon successfull completion, will want to build one if you don't alreday have one available

		echo "<script>alert('Thank You for Claimed This Item please check your email')</script>";

		echo "<script>window.open('index.php','_self')</script>";

			

		exit();

		// print everything out

		print_r($response);



}



?>



		

		



		<!-- footer start --> 

		<footer id="footer">



			<!-- .footer start --> 

			<div class="footer section">

				<div class="container">

					<h1 class="title text-center" id="contact">Contact Us</h1>

					<div class="space"></div>

					<div class="row">

						

						<div class="col-sm-6">

							<div class="footer-content">

								<form method="POST" role="form" id="footer-form" action="" onSubmit="alert('Thank you for your feedback!');">

									<div class="form-group has-feedback">

										<label class="sr-only" for="name2">Name</label> 

										<input type="text" name="Name" id="Name" class="form-control wow fadeInUp" placeholder="Enter Name"required/>

										<i class="fa fa-user form-control-feedback"></i>

									</div>

									<div class="form-group has-feedback">

										<label class="sr-only" for="email2">Email address</label> 

										<input type="text" name="Name" id="Name" class="form-control wow fadeInUp" placeholder="Enter Email" required/>

										<i class="fa fa-envelope form-control-feedback"></i>

									</div>

									<div class="form-group has-feedback">

										<label class="sr-only" for="message2">Message</label> 

										<textarea name="Message" rows="8" cols="20" id="Message" class="form-control input-message wow fadeInUp"  placeholder="Message" required></textarea>

										<i class="fa fa-pencil form-control-feedback"></i>

									</div>

									<input type="submit" value="Send" class="btn btn-default">

								</form>

								  

							</div>

						</div>

						

						<div class="col-sm-6">

							<div class="footer-content">

								



							<div class="widget-content">



								<p> </p><br/>



								<p class="contacts"><i class="fa fa-map-marker"></i> Learning and Grinding On Street, Nigeria </p>



								<p class="contacts"><i class="fa fa-phone"></i> +234 805 625 7873, +234 802 827 1947, +234 703 133 8863 </p>



								<p class="contacts"><i class="fa fa-envelope"></i> carefriendz@gmail.com</p>



							



							</div>



						</aside>

								<ul class="social-links">

									<li class="facebook"><a target="_blank" href="#"><i class="fa fa-facebook"></i></a></li>

									<li class="twitter"><a target="_blank" href="#"><i class="fa fa-twitter"></i></a></li>

									<li class="googleplus"><a target="_blank" href="#"><i class="fa fa-google-plus"></i></a></li>

									<li class="skype"><a target="_blank" href="#"><i class="fa fa-skype"></i></a></li>

									<li class="linkedin"><a target="_blank" href="#"><i class="fa fa-linkedin"></i></a></li>

									<li class="youtube"><a target="_blank" href="#"><i class="fa fa-youtube"></i></a></li> 

								</ul>

							</div>

						</div>

					</div>

				</div>

			</div>

			<!-- .footer end -->



			<!-- .subfooter start --> 

			<div class="subfooter">

				<div class="container">

					<div class="row">

						<div class="col-md-12">

							<p class="text-center">© 2016 Carefriendz</p>

						</div>

					</div>

				</div>

			</div>

			<!-- .subfooter end -->



		</footer>

		<!-- footer end -->



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