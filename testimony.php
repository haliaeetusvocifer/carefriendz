<?php

  require_once 'database/database.php';
  

  if ( !empty($_POST)){
    // keep track validation errors
    $fnameError = null;
    $emailError = null;
    $locationError = null;
    $testimonyError = null;
    
    // keep track post values
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $testimony = $_POST['testimony'];
    
    // validate input
    $valid = true;
    if (empty($fname)) {
      $fnameError = 'Please Enter Your Full Name';
      $valid = false;
    }
    
    if (empty($email)) {
      $emailError = 'Please Enter Your Email Address';
      $valid = false;
    } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
      $emailError = 'Please Enter A Valid Email Address';
      $valid = false;
    }
    
    if (empty($location)) {
      $locationError = 'Please Enter Your Location';
      $valid = false;
    }
    
    if (empty($testimony)) {
      $testimonyError = 'Please Tell Us Your Testimony';
      $valid = false;
    }
    
    
    // insert data
    if ($valid) {
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO testimony (fname,email,location,testimony) values($fname,$email,$location,$testimony)";
      $q = $pdo->prepare($sql);
      $q->execute(array($fname,$email,$location,$testimony));
      
      Database::disconnect();
      header("refresh:3;index.php");
    
    }
    
    
    
    
    
    
  }
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Carefriendz is the platform where you give unused items to people who need them and connect to opportunities of care">
    <meta name="author" content="Carefriendz Developers">
    <title>Carefriendz: Home</title>
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
           <li><a href="donor_view.php">View Recipient</a></li>            
            <li><a href="careadvance/index.php">CareAdvance</a></li>
            <li><a href="#">How it Works</a></li>
            <li class="active"><a href="testimony.php">Testimonial</a></li>
          </ul>                     
        </div><!--/.nav-collapse -->
        
      </div>     
    </nav>
  </section>
  <!-- END MENU --> 
  <div></div>



  <!-- Start Testimonial section -->
  <section id="testimonial">
    <div class="container">
      <div class="row">
      <div class="col-md-3"></div> 
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">
              <div class="title-area">
                <h2 class="title">What They Said</h2>
                <span class="line"></span>           
              </div>
            </div>
            <div class="col-md-12">
              <!-- Start testimonial slider -->
              <div class="testimonial-slider">
                <!-- Start single slider -->
                <div class="single-slider">
                  <!-- <div class="testimonial-img">
                    <img src="assets/images/testi1.jpg" alt="testimonial image">
                  </div> -->
                  <div class="testimonial-content">
                    <p>All I will tell you is that carefriendz is real.</p>
                    <h6>Oluwasegun Haziz, <span>Surulere</span></h6>
                  </div>
                </div>
                <!-- Start single slider -->
                <div class="single-slider">
                  <!-- <div class="testimonial-img">
                    <img src="assets/images/testi3.jpg" alt="testimonial image">
                  </div> -->
                  <div class="testimonial-content">
                    <p>I doubted it at first but when I got my item, I discovered that it was real.</p>
                    <h6>Jimi Adeyemi,<span>ojodu</span></h6>
                  </div>
                </div>
                <!-- Start single slider -->
                <div class="single-slider">
                  <!-- <div class="testimonial-img">
                    <img src="assets/images/testi2.jpg" alt="testimonial image">
                  </div> -->
                  <div class="testimonial-content">
                    <p>This platform has helped me give an item to someone who needs it.</p>
                    <h6>Chukwu Donald,<span>Ikeja</span></h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3"></div>        
      </div>
    </div>
  </section>
  <!-- End Testimonial section -->

<div></div>


  <!-- Start contact section  -->
  <section id="contact">
     <div class="container">
       <div class="row">
         <div class="col-md-12">
           <div class="title-area">
              <h2 class="title">Give Your Testimony?</h2>
              <span class="line"></span>
              <p>Your testimony will go a long way to tell others and Nigerians that this is real</p>
            </div>
         </div>
         <div class="col-md-12">
           <div class="cotact-area">
             <div class="row">
               <div class="col-md-2">
                 
               </div>
               <div class="col-md-8">
               
                 <div class="contact-area-right">
                   <form class="comments-form contact-form" action="testimony.php" method="post">
             
                    <div class="form-group <?php echo !empty($fnameError)?'error':'';?>">                        
                      <input type="text" name="fname" class="form-control" placeholder="Your Name (Full name)" value="<?php echo !empty($fname)?$fname:'';?>">
            <?php if (!empty($fnameError)): ?>
                  <span class="help-inline"><?php echo $fnameError;?></span>
              <?php endif; ?>
                    </div>
             
                    <div class="form-group <?php echo !empty($emailError)?'error':'';?>">                        
                      <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo !empty($email)?$email:'';?>">
            <?php if (!empty($emailError)): ?>
                  <span class="help-inline"><?php echo $emailError;?></span>
              <?php endif;?>
                    </div>
                     <div class="form-group <?php echo !empty($lnameError)?'error':'';?>">                        
                      <input type="text" name="location" class="form-control" placeholder="Location" value="<?php echo !empty($location)?$location:'';?>">
             <?php if (!empty($locationError)): ?>
                  <span class="help-inline"><?php echo $locationError;?></span>
              <?php endif; ?>
                    </div>
                    <div class="form-group <?php echo !empty($testimonyError)?'error':'';?>">                        
                      <input placeholder="Testimony" name="testimony" rows="3" class="form-control" value="<?php echo !empty($testimony)?$testimony:'';?>"><!-- </textarea> -->
            <?php if (!empty($testimonyError)): ?>
                  <span class="help-inline"><?php echo $testimonyError;?></span>
              <?php endif; ?>
                    </div>
                    <button class="comment-btn" type="submit">Submit</button>
                  </form>
                 </div>
               </div>
               <div class="col-md-2">
                 
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
  </section>
  <!-- End contact section  -->






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

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>    
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <!-- Bootstrap -->
  <script src="assets/js/bootstrap.js"></script>
  <!-- Slick Slider -->
  <script type="text/javascript" src="assets/js/slick.js"></script>    
  <!-- mixit slider -->
  <script type="text/javascript" src="assets/js/jquery.mixitup.js"></script>
  <!-- Add fancyBox -->        
  <script type="text/javascript" src="assets/js/jquery.fancybox.pack.js"></script>
 <!-- counter -->
  <script src="assets/js/waypoints.js"></script>
  <script src="assets/js/jquery.counterup.js"></script>
  <!-- Wow animation -->
  <script type="text/javascript" src="assets/js/wow.js"></script> 
  <!-- progress bar   -->
  <script type="text/javascript" src="assets/js/bootstrap-progressbar.js"></script>  
  
 
  <!-- Custom js -->
  <script type="text/javascript" src="assets/js/custom.js"></script>
  
  </body>
</html>