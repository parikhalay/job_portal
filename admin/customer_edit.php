<?php
      //error_reporting(0);

    include('connection/db.php');  

    include('include/header.php');
    include('include/sidebar.php');
$id=$_GET['edit'];
$query=mysqli_query($conn,"select * from admin_login where id='$id'");

while($row=mysqli_fetch_array($query)){
    $email=$row['admin_email'];  
    $admin_username=$row['admin_username'];
    $admin_password=$row['admin_password'];
    $first_name=$row['first_name'];
    $last_name=$row['last_name'];
    $admin_type=$row['admin_type'];

}

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="customers.php">customers</a></li>
    <li class="breadcrumb-item"><a href="#">Update customer</a></li>
   
  </ol>
</nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class='h2'>Update Customer</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              
              </div>
              <!-- <a class="btn btn-primary" href="add_cumstomer.php">Add customer</a> -->
            </div>
          
          </div>
         <div style="width:50%">
        
         <form action="" method="post" name="customer_form" id="customer_form">
         <div id="msg"></div>
            <div class="form-group">
            <label for="customer email">Enter email</label>
            <input type="email" name="email" id="email" value="<?php echo $email; ?>" class="form-control" placeholder="Enter customer Email">
            
            </div>
            <div class="form-group">
            <label for="customer username">Enter Username</label>
            <input type="text" name="username" id="username" value="<?php echo $admin_username; ?>"class="form-control" placeholder="Enter customer Username">
            
            </div>
            <div class="form-group">
            <label for="password">Enter Pasword</label>
            <input type="password" name="password" id="password"value="<?php echo $admin_password; ?>" class="form-control" placeholder="Enter Password">
            
            </div>
            <div class="form-group">
            <label for="First name">Enter First name</label>
            <input type="text" name="first_name" id="first_name" value="<?php echo $first_name; ?>" class="form-control" placeholder="Enter First name">
            
            </div>
            <div class="form-group">
            <label for="last name">Enter last name</label>
            <input type="text"name="last_name" id="last_name" value="<?php echo $last_name; ?>" class="form-control" placeholder="Enter last name">
            
            </div>
            <div class="form-group">
            <label for="Admin Type">Admin type</label>
            <select name="admin_type" name="admin_type" id="admin_type" value="<?php echo $admin_type; ?>" class= "form-control" id="admin_type">
            <option value="1">Super Admin</option>
            <option value="2">Customer Admin</option>            
            </select>

            <input type="hidden" name= "id" id="id" value="<?php echo $_GET['edit'];?>" >
            <div class="form-group">
            <input type="submit" class="btn btn-success" placeholder="Update" name="submit" id="submit">
            
            </div>
            
            </div>
         </form>
         
         
         
         </div>

          <canvas class="my-4" id="myChart" width="900" height="380"></canvas>

         
          </div>
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
 <!-- datatables plugin -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>

  </body>
</html>

<?php
    include('connection/db.php');  
    if (isset($_POST['submit'])) {
      $id=$_POST['id'];
      $email=$_POST['email'];
      $username=$_POST['username'];
      $password=$_POST['password'];
      $first_name=$_POST['first_name'];
      $last_name=$_POST['last_name'];
      $admin_type=$_POST['admin_type'];

      $query1=mysqli_query($conn,"UPDATE admin_login set admin_email='$email',admin_username='$username',admin_password='$password',
      first_name='$first_name',last_name='$last_name',admin_type='$admin_type' where id='$id' ");
   
    }
    if ($query1) {
      echo "<script>alert('Record has been Updates Successfully.') </script>";
    } else {
      echo "<script>alert('Something went wrong') </script>";
    }



?>