<?php
include('include/header.php');
include('include/sidebar.php');
?>
<?php

$query=mysqli_query($conn,"select * from job_category");
?>




        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="job_create.php">All Job List</a></li>
    <li class="breadcrumb-item"><a href="#">Add JOB</a></li>

  </ol>
</nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class='h2'>Add JOB</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              
              </div>
              <!-- <a class="btn btn-primary" href="add_cumstomer.php">Add customer</a> -->
            </div>
          
          </div>
         <div style="width:50%">
        
         <form action="" name="job_form" id="job_form">
         <div id="msg"></div>
            <div class="form-group">
            <label for="Customer Email"> JOB Title </label>
            <input type="text" name="job_title" id="job_title" class="form-control" placeholder="Enter Job Title">
            
            </div>
            <div class="form-group">
            <label for="Company description">Description</label>

           <textarea name="Description" id="Description" cols="150" rows="10" placeholder="Enter company description"></textarea>
            
            </div>
            <div class="form-group">
            <label for="Company description">Enter Keyword</label>
           <input type="text" class="form-control" name="Keyword" id="Keyword" palceholder="Enter Keyword">
            </div>             

            <div class="form-group"> 
              <label for="">Country</label>
                 <select name="country" class="countries form-control" id="countryId">
                 <option value="">Select Country</option>
                 </select>
            </div>
            <div class="form-group"> 
              <label for="">State</label>
              <select name="state" class="states form-control" id="stateId">
              <option value="">Select State</option>
              </select>         
            </div>
            <div class="form-group"> 
              <label for="">City</label>
              <select name="city" class="cities form-control" id="cityId">
              <option value="">Select City</option>
              </select>
            </div>

            <div class="form-group"> 
              <label for="">Select Category</label>
              <select name="category" class="form-control" id="category">
              <?php
              while ($row=mysqli_fetch_array($query)) {
                ?>
                 <option value="<?php echo $row['id'] ?>"><?php echo $row['category']; ?></option>
                <?php
              }
              ?>
              
              </select>
            </div>
            
          
            <div class="form-group">
            <input type="submit" class="btn btn-success" placeholder="Save" name="submit" id="submit">
            
            </div>
            
            </div>
         </form>
         
         
         
         </div>

          <canvas class="my-4" id="myChart" width="900" height="380"></canvas>

         
          </div>
        </main>
      </div>
    </div>

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
<script>
$(document).ready(function(){
  $("#submit").click(function(){
    var Description=$('#Description').val();
    var job_title=$('#job_title').val();
    var countryId=$('#countryId').val();
    var stateId=$('#stateId').val();
    var cityId=$('#cityId').val();
   
    if(job_title==''){
      alert("Please enter Job Title");
      return false;
  }
  if(Description==''){
      alert("Please enter Description");
      return false;
  }
  if(countryId==''){
      alert("Please Select Country");
      return false;
  }
  if(stateId==''){
      alert("Please Select State");
      return false;
  }
  if(cityId==''){
      alert("Please Select City");
      return false;
  }
    var data=$("#job_form").serialize();
   
    $.ajax({
          type:"POST",
          url:"add_new_job.php",
          data:data,
          success:function(data){
            $("msg").html(data);
           
          }
    });


  });
});last_name

</script>


  </body>
</html>
Passwords