<?php
include('include/header.php');
include('include/sidebar.php');

$jobs=mysqli_num_rows($query=mysqli_query($conn,"select * from all_jobs where customer_email='{$_SESSION['email']}'"));
$cat=mysqli_num_rows($query=mysqli_query($conn,"select * from job_category"));
$comp=mysqli_num_rows($query=mysqli_query($conn,"select * from company"));
$apply=mysqli_num_rows(mysqli_query($conn,"SELECT * from job_apply LEFT JOIN all_jobs ON job_apply.id_job = all_jobs.job_id where customer_email='{$_SESSION['email']}'"));

$sadmins=mysqli_num_rows($query=mysqli_query($conn,"select * from admin_login where admin_type='1'"));
$cadmins=mysqli_num_rows($query=mysqli_query($conn,"select * from admin_login where admin_type='2'"));

?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

        <style>
  .cards-wrapper {
  display: flex;

}
.card img {
  max-width: 100%;
  max-height: 100%;
}
.card {
  margin: 0 0.5em;
  box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
  border: none;
  border-radius: 0;
  min-height: 15%;
  max-height: 30%;
  width: 25%;
}
.btn{
  position: bottom;
}

</style>
<?php 
$Mquery= mysqli_query($conn,"SELECT admin_type FROM admin_login where admin_email='{$_SESSION['email']}'");
$row=mysqli_fetch_array($Mquery);

if($row['admin_type']=='1')
{ ?>
<h1>Welcome Super Admin</h1>
<div class="cards-wrapper">
<div class="card">
    <img src="../images/admin.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h2 class="card-title">Admins</h2>
      <p class="card-text"><h4>Total Super Admins: <?php echo $sadmins; ?></h4></p>
      <p class="card-text"><h4>Total Customer Admins: <?php echo $cadmins; ?></h4></p>
      <a href="customers.php" class="btn btn-primary">View Admin Details</a>
    </div>
  </div>
  <div class="card">
    <img src="../images/company.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h2 class="card-title">Companies</h2>
      <p class="card-text"><h4>Total Vacant Jobs: <?php echo $comp; ?></h4></p>
      <a href="create_company.php" class="btn btn-primary">View Company Details</a>
    </div>
  </div>
  <div class="card">
    <img src="../images/category.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h2 class="card-title">Job Categories</h2>
      <p class="card-text"><h4>Catagories: <?php echo $cat; ?></h4></p>
      <a href="category.php" class="btn btn-primary">View Job Categories</a>
    </div>
  </div>
  
</div>
<?php }else{?>
  <h1>Welcome Customer Admin</h1>
  <?php } ?>
<br>
<div class="cards-wrapper">
  <div class="card">
    <img src="../images/jobs.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h2 class="card-title">Jobs</h2>
      <p class="card-text"><h4>Total Vacant Jobs: <?php echo $jobs; ?></h4></p>
      <a href="job_create.php" class="btn btn-primary">View Vacancies</a>
    </div>
  </div>
  <div class="card">
    <img src="../images/applicant.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h2 class="card-title">Applicants</h2>
      <p class="card-text"><h4>Total Job Applicants: <?php echo $apply; ?></h4></p>
      <a href="apply_jobs.php" class="btn btn-primary">View Applicants</a>
    </div>
  </div>

</div>
<br>

<br>
          
        </main>
  

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
  </body>
</html>

<!-- 
dashboard kadhwanu
admin type sarkhu display

customer.php:
admin type 
-->
