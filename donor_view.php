<?php

include ("database/database.php");

include "functions.php" ;

/*  *** ITEM REQUEST HANDLING ALGORITHM ***
* 
* - Add Donor Login Handler Codes
* 	- Get Donor Email, Donation Code
* 	- Fetch Item Details from 'tbl_items'
* 	- Fetch Request Details from 'claimcontact'
*   - If Item 'claimStatus' is 0, allow the Donor to Confirm any Request
* 	 - Else do not show confirm buttons. Display Item as Claimed
*   - Display Item Info
* 	 - Display Request Info
*   
* 
* - Add Request Confirmation Submit Handler Codes
* 	- Get Item ID, Accepted Request ID
* 	- Update Item 'claimStatus' field in 'tbl_items'
*   - Update Request 'status' field in 'claimcontact'
*   - Send Email to the Donor containing Claimant details
*   - Send Email to the Claimant containing Donor email address
* 
* - Add Edit Description Submit Handler Code
*  - Get New Description
*  - Update Description 
* 
* */

if(isset($_POST['dv_login_sub'])){
	
	$dv_email 		= protect($_POST['dv_email']);
	$dv_code 		= protect($_POST['dv_code']);
	
	$item_status 	= checkViewCode($DB_con, $dv_email, $dv_code);
	if($item_status){
		
		$posted_item_info = fetchItemDetails($DB_con, $dv_email, $dv_code);
		
		// print_r($posted_item_info);
		
		$item_id 		= $posted_item_info['itemID'];
		$claim_status 	= $posted_item_info['claimStatus'];
		
		$requests_info 	= fetchItemRequests($DB_con, $item_id);
		if($requests_info !== false){
		//	print_r($requests_info);
		}
	}
}

if(isset($_POST['claim_sub'])){
	
	$claim_request_id 	= protect($_POST['claim_request_id']);
	$claim_item_id 		= protect($_POST['claim_item_id']);
	
	$confirm_res = confirmClaim($DB_con, $claim_request_id, $claim_item_id);
	if($confirm_res == true){
		
		$confirm_successMSG = "Request successfully Confirmed!" ;
		
		// Refresh requests info
		$requests_info 	= fetchItemRequests($DB_con, $claim_item_id);
		
		// Send Emails
		// - Donor Item Info
		// itemID, itemName, itemColor, itemDescription, itemLocation, itemMail, itemPic, dateTime, viewCode, claimStatus
		$donor_item_info = fetchItemDetailsByID($DB_con, $claim_item_id);
		if($donor_item_info !== false){
			
			// Refresh claim_status
			$claim_status 	= $donor_item_info['claimStatus'];
			
			// - Request Data
			// id, item_id, fname, lname, locationname, phonenumber, gender, reason, email, passport, status, date
			$req_data  = fetchSingleItemRequestInfo($DB_con, $claim_request_id);
			if($req_data !== false){
				
				// Send Email to Donor				
				$c_array = array(
					'c_name' => $req_data['fname']." ".$req_data['lname'],
					'c_location' => $req_data['locationname'],
					'c_phone' => $req_data['phonenumber'],
					'c_gender' => $req_data['gender'],
					'c_reason' => $req_data['reason'],
					'c_email' => $req_data['email']
				);
				
				sendConfirmEmailToDonor($donor_item_info['itemMail'], $c_array);
				
				// Send Email to Claimant				
				$d_array = array(
					'c_fname' => $req_data['fname'],
					'd_item_name' => $donor_item_info['itemName'],
					'd_email' => $donor_item_info['itemMail']
				);
				
				sendConfirmEmailToClaimant($req_data['email'], $d_array);
				
				// Send Emails to Unsucessful Claimants
				$other_claimants = getOtherClaimantsEmail($DB_con, $claim_item_id);
				for($k = 0; $k < count($other_claimants); $k++){
					$other_claimant = $other_claimants[$k];
					
					$o_array = array(
						'c_fname' => $other_claimant['fname'],
						'd_item_name' 	=> $donor_item_info['itemName'],
					);
					
					sendClosureEmailToUnsuccessfulClaimant($other_claimant['email'], $o_array);
				}
				
			}// end if $req_data
		}// end if $donor_item_info
	}else{
		$confirm_errMSG = "Could Not Confirm Request!" ;
	}
	
}

if(isset($_POST['edit_description_sub'])){
	
	if(isset($item_id)){
		$new_description 	= protect($_POST['post_description']);
		
		updateDescription($DB_con, $item_id, $new_description);
		
		$posted_item_info = fetchItemDetails($DB_con, $dv_email, $dv_code);
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
    <title>Carefriendz: Home</title>
	<!-- Favicon -->
	<link rel="shortcut icon" href="images/favicon.ico">
	
	
	<link href="css/animations.css" rel="stylesheet"> 
	<link href="css/style.css" rel="stylesheet"> 
	<link href="css/animate.css" rel="stylesheet">
	
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
	
	</head>
	
	

<body>

		<!-- scrollToTop --> 

		<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

		
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
          <a class="navbar-brand" href="index.php"><img src="assets/images/cfdlonglogo.png" alt="AIFA Reading Society"></a>              
          
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
           <li  class="active"><a href="donor_view.php">View Recipient</a></li>            
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
	
	  <!-- section start --> 
	  
	  <?php
		  if(isset($posted_item_info)){
			  
		  ?>
		  
		  <div style="font-size:17px; padding-top:0px; margin-top:0px;"><?php echo $posted_item_info['itemName']; ?></div>
		  
		  <div class="row">
			  
			  <div class="col-md-8 b-advert__info">
				  
				  <span class="glyphicon glyphicon-time h-width-13"></span>
				  
				  Posted On <?php echo $posted_item_info['dateTime']; ?>
				  
				  &nbsp;&nbsp;&nbsp;&nbsp;
				  
				  <span class="glyphicon glyphicon-map-marker h-width-13"></span>
				  
				  <?php echo $posted_item_info['itemLocation'];; ?>
				  <br/>
			  </div>
			  
		  </div>
		  
		  
		  
		  <?php echo "<img src='donations/item_images/".$posted_item_info['itemPic']."'  class='img-thumbnail'  width='300' >"; ?> 
		  <br/><br/>
		  
			
			<?php if($requests_info === false){ ?>
				<form method="POST" role="form" id="footer-form" >
				<div class=''>
					<div class=''>
						<textarea name='post_description' style='padding:10px;border-radius:4px;' ><?php echo $posted_item_info['itemDescription']; ?></textarea>
					</div>
				</div>
				<div class=''>
					<!-- Hidden Fields -->
					<input type='hidden' name='dv_email' value='<?php echo $dv_email; ?>' />
					<input type='hidden' name='dv_code' value='<?php echo $dv_code; ?>' />
					<input type='hidden' name='dv_login_sub' value='Sign Donor In' />
					
					<button type='submit' name='edit_description_sub' class='btn btn-primary' style='margin-bottom:20px;' >Edit Description</button>
				</div>
				</form>
			<?php }else{ ?>
				<p><?php echo $posted_item_info['itemDescription']; ?></p>
			<?php } ?>
		  
		  
		  <?php
			  
		  } // End if(isset($posted_item_info)){
		  
		  if(isset($requests_info)){
		  ?>
		  <!-- section start --> 
		  
		  <section class="section transprant-bg pclear secPadding">
			  
			  <div class="container no-view" data-animation-effect="fadeIn">
				  
				  <div class="container">
					  
					  <h3 id="contact" class="title text-center" style="font-size:40px;">Confirm a Request</h3>
					  
					  <div class="row">
						  
						  <div class="col-md-12 request_notice_red"><span>You can only Confirm ONE Request for this Item!</div></div>
						  
						  <div class="col-md-12">
							  
							  <div class="h-background-white h-pv-15 h-ph-15 h-mt-20">
								  
								  <div style="clear: both;"></div>
								  
								  <div class="b-add-item-form">
	  
	  <?php
		  if(isset($confirm_errMSG)){
		  ?>
		  <div class="alert alert-danger">
			  <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $confirm_errMSG; ?></strong>
		  </div>
		  <?php
		  }
		  else if(isset($confirm_successMSG)){
		  ?>
		  <div class="alert alert-success">
			  <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $confirm_successMSG; ?></strong>
		  </div>
		  <?php
		  }
	  ?>
	  
	  <?php
		  
		  if($requests_info !== false){
			
			  if(count($requests_info) > 0){
				  //print_r($requests_info);
				  
				  for($i = 0; $i < count($requests_info); $i++){
					  // id, item_id, fname, lname, locationname, phonenumber, gender, reason, email, passport, status, date
					  $reqy = $requests_info[$i];
				  ?>
				  <div class='item_request_box'>
					  <div class='item_request_box_top'>
						  <span><?php echo $reqy['fname']." ".$reqy['lname']; ?></span>
					  </div>
					  <div class='item_request_box_mid'>
						  <p><b>Location: </b><?php echo $reqy['locationname']; ?></p>
						  
						  <p><b>Phone Number: </b><?php echo $reqy['phonenumber']; ?></p>
						  
						  <p><b>Gender: </b><?php echo $reqy['gender']; ?></p>
						  
						  <p><b>Reason: </b><?php echo $reqy['reason']; ?></p>
						  
						  <p><b>Email: </b><?php echo $reqy['email']; ?></p>
						  
				<?php /*	  <p><b>Passport: </b><?php echo "<img src='donations/request_images/".$reqy['passport']."'  class='img-thumbnail'  width='200' >"; ?></p> */ ?>
						  
						  <p><b>Date of Request: </b><?php echo $reqy['date']; ?></p>
					  </div>
					  <div class='item_request_box_bottom'>
						  <form method="POST" role="form" id="footer-form" >
							  <!-- Hidden Fields -->
							  <input type='hidden' name='dv_email' value='<?php echo $dv_email; ?>' />
							  <input type='hidden' name='dv_code' value='<?php echo $dv_code; ?>' />
							  <input type='hidden' name='dv_login_sub' value='Sign Donor In' />
							  
							  <input type='hidden' name='claim_request_id' 	value='<?php echo $reqy['id']; ?>' />
							  <input type='hidden' name='claim_item_id' 	value='<?php echo $reqy['item_id']; ?>' />
							  <?php
								// Check if Item Claim Status is still 0
								if($claim_status == 0){
							  ?>
							  <button type="submit" name="claim_sub" class="btn btn-primary btn-lg btn-block"><h4>Confirm Claim »</h4></button>
							  <?php
								}
								if($reqy['status'] == 1){
							  ?>
							  <button type="button" readonly class="btn btn-primary btn-lg btn-block"><h4>CONFIRMED!</h4></button>
							  <?php
								}
							  ?>
						  </form>
					  </div>
				  </div>
				  
				  <?php			
					  
				  }
			  }
		}else{
			echo "<p>&nbsp;</p> <p class='no_request_found_msg'>No Requests have been made for this Item!</p>" ;
		}
	  ?>
	  
	  <?php
	  }
  ?>
	  
	  
	  
	  <section class="section transprant-bg pclear secPadding">
		  
		  <div class="container no-view" data-animation-effect="fadeIn">
			  
			  <div class="container">
				  
				  <h3 id="contact" class="title text-center" style="font-size:40px;">View Item Requests</h3>
				  				  
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
								  
								  <form method="POST" role="form" id="footer-form" >
									  
									  <div class="form-group b-tooltip__form-group ">
										  <label for="title"> Donor Email<strong class="h-red">*</strong> </label> 
										  <input type="email" autocomplete="" name="dv_email" class="form-control wow fadeInUp" data-container="body" data-content="" data-placement="right" data-toggle="popover" placeholder="" required />
									  </div>
									  
									  <div class="form-group b-tooltip__form-group ">
										  <label for="color"> Donation Code<strong class="h-red">*</strong> </label>
										  <input type="password" autocomplete="" name="dv_code" class="form-control wow fadeInUp" data-container="body" data-content="" data-placement="right" data-toggle="popover" placeholder="" required />
									  </div>
									  
										  
										  <button type="submit" name="dv_login_sub" class="btn btn-primary btn-lg btn-block"><h4>View Requests »</h4></button>
										  
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
								  
</div>
							  
<div class="col-md-12"></div>
	
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
            <?php date_default_timezone_set("GMT"); ?>
			<p class="text-center">© <?php echo date('Y'); ?> Carefriendz </p>
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