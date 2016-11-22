<?php

  error_reporting( ~E_NOTICE ); // avoid notice
  
  require_once 'database/database.php';
  
  require_once 'functions.php';
  
  if(isset($_POST['btnsave']))
  {

    $itemname     = protect($_POST['item_name']);
    $itemcolor    = protect($_POST['item_color']);
    $itemdescription = protect($_POST['item_description']);
    $itemlocation   = protect($_POST['item_location']);
    $contactmail  = protect($_POST['contact_mail']);
    
    $imgFile    = $_FILES['item_image']['name'];
    $tmp_dir    = $_FILES['item_image']['tmp_name'];
    $imgsize    = $_FILES['item_image']['size'];

  

    if (empty($itemname)) {
      $errMSG = "Please Enter Item Name.";
    }
    elseif (empty($itemcolor)) {
      $errMSG = "Please Enter Item Color.";
    }
    elseif (empty($itemdescription)) {
      $errMSG = "Please Enter Item Description.";
    }
    elseif (empty($itemlocation)) {
      $errMSG = "Please Enter Item Location.";
    }
    elseif (empty($contactmail)) {
      $errMSG = "Please Enter your Email Address.";
    }
    elseif (empty($imgFile)) {
      $errMSG = "Please Select Image File.";
    }




    else
    {
      $upload_dir = 'donations/item_images/'; // upload directory
  
      $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
    
      // valid image extensions
      $valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
    
      // rename uploading image
      $itempic = rand(1000,1000000).".".$imgExt;
        
      // allow valid image file formats
      if(in_array($imgExt, $valid_extensions)){     
        // Check file size '8MB'
        if($imgSize < 8000000)        {
          move_uploaded_file($tmp_dir,$upload_dir.$itempic);
        }
        else{
          $errMSG = "Sorry, your file is too large.";
        }
      }
      else{
        $errMSG = "Sorry, only JPG, JPEG & PNG files are allowed.";   
      }
    }
    
    
    // if no error occured, continue ....
    if(!isset($errMSG))
    {
      $stmt = $DB_con->prepare('INSERT INTO tbl_items(itemName,itemColor,itemDescription,itemLocation,itemMail,itemPic,viewCode,claimStatus) 
          VALUES(:iname, :icolor, :idescription, :ilocation, :imail, :ipic, :view_code, :claim_status)');
      $stmt->bindParam(':iname',$itemname);
      $stmt->bindParam(':icolor',$itemcolor);
      $stmt->bindParam(':idescription',$itemdescription);
      $stmt->bindParam(':ilocation',$itemlocation);
      $stmt->bindParam(':imail',$contactmail);
      $stmt->bindParam(':ipic',$itempic);
      
      // Generate and Save viewCode
      $view_code = generateViewCode($DB_con, $contactmail);
      $stmt->bindParam(':view_code', $view_code);
      
      // Save claimStatus
      $default_claim_status = 0;
      $stmt->bindParam(':claim_status', $default_claim_status);
      
      if($stmt->execute())
      {
        $successMSG = "Thank you for your donation. Check your mail for confirmation and to view your donation code.";
        


        //email notification start
                    $to = protect($_POST['contact_mail']);
                    $subject = "Thank You For Your Donation";
                    $message = "Dear Donor,
          
Thank you for donating an item today.

Your item is about to reach a recipient in need of it. You can view requests on the item using the following details:

You can view any claims on our website using the following details:


Email: ".$contactmail."
Donation Code: ".$view_code."

Kindly profile the prospective recipients and use your discretion to give the individual whom appears to be mostly in need of the item. You may call any of them for more enquiries. A maximum of 6 people can request an item

We hope to see you soon on carefriendz.

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

            if(mail($to,$subject,$message,$headers)){
        
        header("refresh:3;index.php"); // redirects image view page after 3 seconds.
        
      }

            //email notification ends


      }
      else
      {
        $errMSG = "error while inserting....";
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
    <title>Carefriendz: Donate</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="assets/images/favicon.ico"/>
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

           <li class="active"><a href="donate.php">Donate</a></li>
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


  <div class="page-header">
      <h1 class="h2">add unused item. <a class="btn btn-default" href="index.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a></h1>
    </div>
    

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

<form method="post" enctype="multipart/form-data" class="form-horizontal">
      
  <table class="table table-bordered table-responsive">
  

    <tr>
      <td><label class="control-label">Item Name.</label></td>
        <td><input class="form-control" type="text" name="item_name" placeholder="Enter Item Name" value="<?php echo $itemname; ?>" /></td>
    </tr>

    <tr>
      <td><label class="control-label">Item Color.</label></td>
        <td><input class="form-control" type="text" name="item_color" placeholder="Enter Item Color" value="<?php echo $itemcolor; ?>" /></td>
    </tr>

    <tr>
      <td><label class="control-label">Item Description.</label></td>
        <td><input class="form-control" type="text" name="item_description" placeholder="Describe the item" value="<?php echo $itemdescription; ?>" /></td>
    </tr>


    <tr>
      <td><label class="control-label">Location.</label></td>
        <td><input class="form-control" type="text" name="item_location" placeholder="Enter your Location" value="<?php echo $itemlocation; ?>" /></td>
    </tr>


    <tr>
      <td><label class="control-label">Email.</label></td>
        <td><input class="form-control" type="text" name="contact_mail" placeholder="Enter Your Email Address" value="<?php echo $contactmail; ?>" /></td>
    </tr>



    
    <tr>
      <td><label class="control-label">Item Image.</label></td>
        <td><input class="input-group" type="file" name="item_image" accept="image/*" /></td>
    </tr>
    
    <tr>
      <td></td>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; POST ITEM
        </button>
        </td>
    </tr>
    
    </table>
    
</form>





    

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