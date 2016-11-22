<?php

  require_once 'database/database.php';

  include ("functions.php");
  
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
<!--Top Left-->
<script type="text/javascript">
$(document).ready(function(){
    /* Get iframe src attribute value i.e. YouTube video url
    and store it in a variable */
    var url = $("#careVideo").attr('src');
    
    /* Assign empty url value to the iframe src attribute when
    modal hide, which stop the video playing */
    $("#videoModal").on('hide.bs.modal', function(){
        $("#careVideo").attr('src', '');
    });
    
    /* Assign the initially stored url back to the iframe src
    attribute when modal is displayed again */
    $("#videoModal").on('show.bs.modal', function(){
        $("#careVideo").attr('src', url);
    });
});
</script>

<!--Top Right-->
<script type="text/javascript">
$(document).ready(function(){
    /* Get iframe src attribute value i.e. YouTube video url
    and store it in a variable */
    var url = $("#careVideoRight").attr('src');
    
    /* Assign empty url value to the iframe src attribute when
    modal hide, which stop the video playing */
    $("#videoModalRight").on('hide.bs.modal', function(){
        $("#careVideoRight").attr('src', '');
    });
    
    /* Assign the initially stored url back to the iframe src
    attribute when modal is displayed again */
    $("#videoModalRight").on('show.bs.modal', function(){
        $("#careVideoRight").attr('src', url);
    });
});
</script>

<!--Bottom Left-->
<script type="text/javascript">
$(document).ready(function(){
    /* Get iframe src attribute value i.e. YouTube video url
    and store it in a variable */
    var url = $("#careVideoBottomLeft").attr('src');
    
    /* Assign empty url value to the iframe src attribute when
    modal hide, which stop the video playing */
    $("#videoModalBottomLeft").on('hide.bs.modal', function(){
        $("#careVideoBottomLeft").attr('src', '');
    });
    
    /* Assign the initially stored url back to the iframe src
    attribute when modal is displayed again */
    $("#videoModalBottomLeft").on('show.bs.modal', function(){
        $("#careVideoBottomLeft").attr('src', url);
    });
});
</script>

<!--Bottom Right-->
<script type="text/javascript">
$(document).ready(function(){
    /* Get iframe src attribute value i.e. YouTube video url
    and store it in a variable */
    var url = $("#careVideoBottomRight").attr('src');
    
    /* Assign empty url value to the iframe src attribute when
    modal hide, which stop the video playing */
    $("#videoModalBottomRight").on('hide.bs.modal', function(){
        $("#careVideoBottomRight").attr('src', '');
    });
    
    /* Assign the initially stored url back to the iframe src
    attribute when modal is displayed again */
    $("#videoModalBottomRight").on('show.bs.modal', function(){
        $("#careVideoBottomRight").attr('src', url);
    });
});
</script>


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



  <!-- Start slider -->
  <section id="slider">
    <div class="main-slider">

      <div class="single-slide">
        <img src="assets/images/slider-1.png" alt="img">
      </div>

      <div class="single-slide">
        <img src="assets/images/slider-2.png" alt="img">
      </div>

      <div class="single-slide">
        <img src="assets/images/slider-3.png" alt="img">
      </div> 

    </div>
  </section>
  <!-- End slider -->
  
  <!-- Start single page header -->
  <section id="single-page-header">
    <div class="overlay">
      <div class="container">
        <div class="row">
        <div class="col-md-1 col-sm-6 col-xs-12">
          </div>
          <div class="col-md-10 col-sm-6 col-xs-12">
            <div class="single-page-header-left">
              <!-- <h2>ABout AIFA</h2> -->
              <p class="lead">Carefriendz is a community of caring individuals and experts inspiring hope. I was clearing out my closet one morning, trying to move items I haven’t worn in several months to storage. I wanted to include other household items lying around so I could have the house tidy. Surprisingly, the items I had collated were enormous.it was a tiring task, as I stared at the amount of things I had put to no use, I thought ... imagine the quantity of items stored in each home, things that may never be used; the books, the bags, the shoes, clothing….the list goes on. The flip side of this is; in several communities, in many homes, ONE pair of “our” less useful shoe is a big deal. People save up months of earnings to afford just enough to send a member of the family to school; if these items find their way from cluttered closets to the feet of a widow. If some of them go from congested storage to the table of a hungry teenager already prone to crime. If a medical expert or a lawyer gave five minutes of their time to a person who cannot afford their consultation; we would wake up to a better future. This is our project, Welcome to Carefriendz.</p>

              
            </div>
          </div>
          <div class="col-md-1 col-sm-6 col-xs-12">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End single page header -->


  <!-- Start Pricing table -->
  <section id="pricing-table">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-area">
            <h2 class="title">Care Inspiration</h2>
            <span class="line"></span>
            
          </div>
        </div>
        <div class="col-md-12">
          <div class="pricing-table-content">
            <div class="row">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-table-price wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                  <div class="price-header">
                    <span class="price-title"><b>Videos of the Week</b></span>
                    <div class="price">
                      <iframe class="img-responsive" width="640" height="350" src="https://www.youtube.com/embed/SbJIi6nUs2s" frameborder="0" allowfullscreen></iframe>
                    </div>
                  </div>
          <!-- Button HTML (to Trigger Modal) -->
                  <div class="price-footer">
                    <a class="youtube purchase-btn" href="#videoModal" title="Video of the week" data-toggle="modal">View</a>
                  </div>
                </div>
              </div>
        
        <!--Modal for Video of the Week Top Left-->
        <div id="videoModal" class="modal fade">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <span class="price-title" id="videoModalLabel"><b>Videos of the Week</b></span>
            </div>
          <div class="modal-body">
            <iframe id="careVideo" width="600" height="315" src="https://www.youtube.com/embed/SbJIi6nUs2s" frameborder="0" allowfullscreen></iframe>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
          </div>
          </div>
        </div>
       
        
        
        

              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-table-price wow fadeInUp" data-wow-duration="0.75s" data-wow-delay="0.75s">
                  <div class="price-header">
                    <span class="price-title"><b>Quotes of Gold</b></span>
                    <div class="price">
                      <img class="img-responsive" src="http://www.azquotes.com/picture-quotes/quote-if-you-want-your-children-to-turn-out-well-spend-twice-as-much-time-with-them-and-half-abigail-van-buren-51-93-40.jpg" alt="">
                    </div>
                  </div>
                  <div class="price-footer">
                    <a class="purchase-btn" href="#" data-toggle="modal" data-target="#goldquotetop">Read More</a>
                  </div>
                </div>
              </div>
        
        <!--Modal for Quotes of Gold Top-->
        <div class="modal fade" id="goldquotetop" tabindex="-1" role="dialog" aria-labelledby="goldquotetop" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <span class="price-title" id="myModalLabel"><b>Quotes of Gold</b></span>
            </div>
            <div class="modal-body">
              <img class="img-responsive" src="http://www.azquotes.com/picture-quotes/quote-if-you-want-your-children-to-turn-out-well-spend-twice-as-much-time-with-them-and-half-abigail-van-buren-51-93-40.jpg" alt="">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
        
              
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-table-price wow fadeInUp" data-wow-duration="1.15s" data-wow-delay="1.15s">
                  <div class="price-header">
                    <span class="price-title"><b>Videos of the Week</b></span>
                    <div class="price">
                      
                      <iframe class="img-responsive" width="560" height="315" src="https://www.youtube.com/embed/UkxqrBv16Is" frameborder="0" allowfullscreen></iframe>
                    </div>
                  </div>
                  <!-- Button HTML (to Trigger Modal) -->
                  <div class="price-footer">
                    <a class="youtube purchase-btn" href="#videoModalRight" title="Video of the week" data-toggle="modal">View</a>
                  </div>
                </div>
              </div>
        
        
        <!--Modal for Video of the Week Top Right-->
        <div id="videoModalRight" class="modal fade">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <span class="price-title" id="videoModalLabel"><b>Videos of the Week</b></span>
            </div>
          <div class="modal-body">
            <iframe id="careVideoRight" width="600" height="315" src="https://www.youtube.com/embed/UkxqrBv16Is" frameborder="0" allowfullscreen></iframe>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
          </div>
          </div>
        </div>
        
        
            </div>
          </div>
        </div>


        <div class="col-md-12">
          <div class="pricing-table-content">
            <div class="row">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-table-price wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                  <div class="price-header">
                    <span class="price-title"><b>Videos of the Week</b></span>
                    <div class="price">
                      <iframe class="img-responsive" width="560" height="315" src="https://www.youtube.com/embed/E2RWG9BaflM" frameborder="0" allowfullscreen></iframe>
                    </div>
                  </div>
                  <!-- Button HTML (to Trigger Modal) -->
                  <div class="price-footer">
                    <a class="youtube purchase-btn" href="#videoModalBottomLeft" title="Video of the week" data-toggle="modal">View</a>
                  </div>
                </div>
              </div>
        
        
        <!--Modal for Video of the Week Bottom Left-->
        <div id="videoModalBottomLeft" class="modal fade">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <span class="price-title" id="videoModalLabel"><b>Videos of the Week</b></span>
            </div>
          <div class="modal-body">
            <iframe id="careVideoBottomLeft" width="600" height="315" src="https://www.youtube.com/embed/E2RWG9BaflM" frameborder="0" allowfullscreen></iframe>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
          </div>
          </div>
        </div>
        
        
        
        
        
        
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-table-price wow fadeInUp" data-wow-duration="0.75s" data-wow-delay="0.75s">
                  <div class="price-header">
                    <span class="price-title"><b>Quotes of Gold</b></span>
                    <div class="price">
                      <img class="img-responsive" src="assets/images/weeklyquote.jpg" alt="">
                    </div>
                  </div>
                  <div class="price-footer">
                    <a class="purchase-btn" href="#" data-toggle="modal" data-target="#goldquotebottom">Read More</a>
                  </div>
                </div>
              </div>
        
        <!--Modal for Quotes of Gold Bottom-->
        <div class="modal fade" id="goldquotebottom" tabindex="-1" role="dialog" aria-labelledby="goldquotebottom" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <span class="price-title" id="myModalLabel"><b>Quotes of Gold</b></span>
            </div>
            <div class="modal-body">
              <img class="img-responsive" src="assets/images/weeklyquote.jpg" alt="">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
        
        
        
              
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-table-price wow fadeInUp" data-wow-duration="1.15s" data-wow-delay="1.15s">
                  <div class="price-header">
                    <span class="price-title"><b>Videos of the Week</b></span>
                    <div class="price">
                    <iframe class="img-responsive" width="560" height="315" src="https://www.youtube.com/embed/Eu_dUxTg33I" frameborder="0" allowfullscreen></iframe>
                      
                    </div>
                  </div>
                  <!-- Button HTML (to Trigger Modal) -->
                  <div class="price-footer">
                    <a class="youtube purchase-btn" href="#videoModalBottomRight" title="Video of the week" data-toggle="modal">View</a>
                  </div>
                </div>
              </div>
        
        <!--Modal for Video of the Week Bottom Left-->
        <div id="videoModalBottomRight" class="modal fade">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <span class="price-title" id="videoModalLabel"><b>Videos of the Week</b></span>
            </div>
          <div class="modal-body">
            <iframe id="careVideoBottomRightBottomRight" width="600" height="315" src="https://www.youtube.com/embed/Eu_dUxTg33I" frameborder="0" allowfullscreen></iframe>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
          </div>
          </div>
        </div>
        
        
        
        
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- End Pricing table -->
<div></div>


<section id="our-team">
<div class="container"> 
    <div class="title-area">
            <h2 class="title">Trending Give Away Items</h2>
            <span class="line"></span>      
    </div>
    <br/>
<div class="page-header"></div><br/>

<div class="row donated_items_view">
<?php
  
  $stmt = $DB_con->prepare('SELECT itemID, itemName, itemColor, itemPic, claimStatus, dateTime FROM tbl_items ORDER BY itemID DESC');
  $stmt->execute();
  
  if($stmt->rowCount() > 0)
  {
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {
      extract($row);
    $num_requests = 0;
    $max_request_limit = 5;
    
    $requests_info  = fetchItemRequests($DB_con, $row['itemID']);
    if($requests_info !== false){
      //  print_r($requests_info);
      $num_requests = count($requests_info);
    }
    
      ?>
      <?php
      $show_item_box = true;
      
      if($claimStatus == 1){
        // 60 secs * 60 mins * 24 hours * 30 days
        if(strtotime($dateTime) <= time() - (60*60*24*30)){
          $show_item_box = false;
        }
      }
      
      if($show_item_box == true){
      ?>
      <div class="col-md-3 donated_item_unit">
        <!-- <p class="page-header"><?php// echo $itemName."&nbsp;/&nbsp;".$itemColor; ?></p> -->
        <?php
          if(($claimStatus != 1) && ($num_requests <= $max_request_limit)){
            echo "<a href='claim.php?claim=".$row['itemID']."' >" ;
          }
        ?>
        <img src="donations/item_images/<?php echo $row['itemPic']; ?>" class="img-rounded" width="250px" height="250px" />
        <?php
          if(($claimStatus != 1) && ($num_requests <= $max_request_limit)){
            echo "</a>" ;
          }
          if($claimStatus == 1){
            echo "<img src='images/claimed_pic.png' class='img-rounded' width='150px' style='position:absolute;top:30%;left:20%;z-index:500;' />" ;
          }
        ?>
        <p class="page-header"><?php echo $itemName."&nbsp;"?></p>
        
      </div>
      <?php
      } // if show_item_box
    ?>     
      <?php
    }
  }
  else
  {
    ?>
  <div class="col-md-12">
    <div class="alert alert-warning">
      <span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
    </div>
  </div>
  <?php
  }
  
?>
</div>
</div>
</section>




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