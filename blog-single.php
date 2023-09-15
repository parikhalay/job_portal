<?php
session_start();
if(isset($_SESSION['email'])==true){


}
else{
  header('location:job-post.php');
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Apply for Job</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

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
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">JobPortal</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item active"><a href="contact.php" class="nav-link">Contact</a></li>
	          <?php
            if(isset($_SESSION['email'])==true){ ?>
	          <li class="nav-item cta mr-md-2"><a href="job-post.php" class="nav-link"><?php echo $_SESSION['email']; ?></a></li>
            <li class="nav-item cta cta-colored"><a href="admin/logout.php" class="nav-link">Log Out</a></li>

            <?php }
            else{ ?>
	          <li class="nav-item cta cta-colored"><a href="job-post.php" class="nav-link">Log In</a></li>

            <?php }
            ?>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    <?php
 include('connection/db.php');
  $id=$_GET['id'];
  $query=mysqli_query($conn,"SELECT * FROM all_jobs WHERE job_id='$id'");
  while($row=mysqli_fetch_array($query)){
    $title=$row['job_title'];
    $des=$row['des'];
    $country=$row['country'];
    $state=$row['state'];
    $city=$row['city'];
    $id_job=$row['job_id'];
  }

?>
    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
          	<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a> Jobs </p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Apply Job</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ftco-animate">
            <h2 class="mb-3"><td><?php echo "Job Title: ". $title; ?></td></h2>
            <h5><?php echo "Description: ".$des; ?></h5>
            <p><?php echo "Location: ".$city;?>,<?php echo $state; ?>,<?php echo $country ;?></p>
            <form action="apply_job.php" method="post" id="JobPortal" enctype="multipart/form-data" style="border: 1px solid gray">
              <div style="padding: 2%;">
              <input type="hidden" name="job_seeker" value="<?php echo $_SESSION['email']; ?>" id="job_seeker">
              <input type="hidden" name="id_job" value="<?php echo $id_job; ?>" id="id_job">
              <div class="row">
                  <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Enter Your First Name:</label>
                    <input type="text" class="form-control" name="first_name" placeholder="First Name"></div>
                    </div>
                    
                  <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Enter Your Last Name:</label>
                    <input type="text" class="form-control" name="last_name" placeholder="Last Name"></div>
                  </div>
              </div>
              
              <div class="row">
                  <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Enter Date of Birth:</label>
                    <input type="date" class="form-control" name="dob" placeholder="DOB"></div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Choose Resume</label>
                    <input type="file" name="file" class="form-control"></div>
                </div>
                
              </div>
              <div class="row">
                  <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Mobile No:</label>
                    <input type="text" class="form-control" name="mobile_number" placeholder="Mobile Number"></div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Email:</label>
                    <input type="text" class="form-control" disabled value="<?php echo $_SESSION['email']; ?>"></div>
                </div>
                
              </div>
            <div class="form-group">
              <input type="submit" name="submit" id="submit" placeholder="Submit" class="btn btn-primary ">
            </div>

              </div>
            </form>
   
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
    
  </body>
</html>