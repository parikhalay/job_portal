<!-- Bootstrap Cover Template -->

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Cover Template for Bootstrap</title>


<!-- Line 40-50 maxCDN W3S -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=xdsPeQzxELtGOP7XlbQiYmpVeeYcWv2f8TnLBOa1KiBK5p8MbaZ1G06jMTUSKI6Is9Jc542HH2snwiQJqeccwLNWKuCCCl0wHCznO_eEjgg" charset="UTF-8"></script><link rel="stylesheet" crossorigin="anonymous" href="https://gc.kis.v2.scr.kaspersky-labs.com/E3E8934C-235A-4B0E-825A-35A08381A191/abn/main.css?attr=aHR0cHM6Ly9nZXRib290c3RyYXAuY29tL2RvY3MvNC4wL2V4YW1wbGVzL2NvdmVyLw"/>
  
  <!-- CSS Of Template -->

  <style type="text/css">
  /*
 * Globals
 */

/* Links */
a,
a:focus,
a:hover {
  color: #fff;
}

/* Custom default button */
.btn-secondary,
.btn-secondary:hover,
.btn-secondary:focus {
  color: #333;
  text-shadow: none; /* Prevent inheritance from `body` */
  background-color: #fff;
  border: .05rem solid #fff;
}


/*
 * Base structure
 */

html,
body {
  height: 100%;
  background-color: #333;
}

body {
  display: -ms-flexbox;
  display: -webkit-box;
  display: flex;
  -ms-flex-pack: center;
  -webkit-box-pack: center;
  justify-content: center;
  color: #fff;
  text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
  box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);
}

.cover-container {
  max-width: 42em;
}


/*
 * Header
 */
.masthead {
  margin-bottom: 2rem;
}

.masthead-brand {
  margin-bottom: 0;
}

.nav-masthead .nav-link {
  padding: .25rem 0;
  font-weight: 700;
  color: rgba(255, 255, 255, .5);
  background-color: transparent;
  border-bottom: .25rem solid transparent;
}

.nav-masthead .nav-link:hover,
.nav-masthead .nav-link:focus {
  border-bottom-color: rgba(255, 255, 255, .25);
}

.nav-masthead .nav-link + .nav-link {
  margin-left: 1rem;
}

.nav-masthead .active {
  color: #fff;
  border-bottom-color: #fff;
}

@media (min-width: 48em) {
  .masthead-brand {
    float: left;
  }
  .nav-masthead {
    float: right;
  }
}


/*
 * Cover
 */
.cover {
  padding: 0 1.5rem;
}
.cover .btn-lg {
  padding: .75rem 1.25rem;
  font-weight: 700;
}


/*
 * Footer
 */
.mastfoot {
  color: rgba(255, 255, 255, .5);
}
  </style>
<!-- CSS End -->

  </head>

  <body class="text-center">

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    
      <main role="main" class="inner cover">
        <h1 class="cover-heading">Cover your page.</h1>
        <?php
session_start();
include('connection/db.php');

$user_email=$_SESSION['email'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$dob=$_POST['dob'];
$email=$_POST['email'];
$number=$_POST['number'];

 $img=$_FILES['img']['name'];
 $temp_name=$_FILES['img']['tmp_name'];
 move_uploaded_file($_FILES["img"]["tmp_name"],'admin/profile_img/'.$img);

 $sql=mysqli_query($conn,"SELECT * FROM profiles WHERE user_email='{$_SESSION['email']}'");
 $sql_check=mysqli_num_rows($sql);
 if(!empty($sql_check)){
    $query=mysqli_query($conn,"UPDATE profiles SET img='$img',first_name='$first_name',last_name='$last_name',
    dob='$dob',number='$number',email='$email' WHERE user_email='{$_SESSION['email']}' ");
   
    if($query){
       echo "<script> alert('Profile Updates Successfully')</script>"; 
       
    }else{
    echo "<script> alert('Some Error occured')</script>"; 
   
    } }else{

//  move_uploaded_file($_FILES["img"]["tmp_name"],'admin/profile_img/'.$img);
 $query=mysqli_query($conn,"INSERT INTO profiles(img,first_name,last_name,dob,number,email,user_email) 
 VALUES ('$img','$first_name','$last_name','$dob','$number','$email','$user_email')");

 if($query){
    echo "<script> alert('Profile Added Successfully')</script>"; 
}else{
    echo "<script> alert('Some Error occured')</script>"; 

 }
}
?>
        <p class="lead">
          <a href="http://localhost/job_portal/my_profile.php" class="btn btn-lg btn-secondary">Back</a>
        </p>
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
        </div>
      </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
<!-- Template End -->