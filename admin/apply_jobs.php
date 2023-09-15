
<?php
    include('connection/db.php');  

    include('include/header.php');
    include('include/sidebar.php');
    ?>
 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="#">Applicants</a></li>
   
  </ol>
</nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class='h2'>All Jobs</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              
              </div>
            </div>
          
          </div>
          <style>
              .styled-table thead tr {
              background-color: #B22222;
              color: #ffffff;
              text-align: center;
              padding: 20px;
               }
               .styled-table tfoot {
                 text-align: center;
               } 
               .styled-table tbody tr {
                  border-bottom: 1px solid #dddddd;
                  text-align: center;
              }
        
              .styled-table tbody tr:nth-of-type(even) {
                  background-color: #f3f3f3;
              }

              .styled-table tbody tr:last-of-type {
                  border-bottom: 2px solid #B22222;
              }
              .styled-table tbody tr.active-row {
              font-weight: bold;
              color: #009879;
              }
              .styled-table td {
               padding: 15px;
              }
              .styled-table {
              border-collapse: collapse;
              margin: 25px 0;
              font-size: 1.25em;
              font-family: sans-serif;
              min-width: 400px;
              box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
              padding: 20px;
              
              }
               </style>
          <table id="example" class="styled-table" style="width:100%">
        <thead>
            <tr>
                <th>Sr No.</th>
                
                <th>Job Title</th>
                
                <th>Job Seeker Name</th>
                <th>Email</th>
                

                <th>Action</th>
           
            </tr>
        </thead>
        <tbody>
        <?php
      include('connection/db.php');
      
      $query=mysqli_query($conn,"SELECT * from job_apply LEFT JOIN all_jobs ON job_apply.id_job = all_jobs.job_id
       where customer_email='{$_SESSION['email']}'");
  
       $a=1;
       while($row=mysqli_fetch_array($query)){
        ?>
           
            <tr>
                <td><?php echo $a; ?></td>
                <td><?php echo $row['job_title']; ?></td>
                <td><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></td>
                <td><?php echo $row['job_seeker']; ?></td>

                <!-- <td><a href="http://localhost/job_portal/admin/files/<?php echo $row['files'];?>">Download File</a></td> -->

                <td>
                <div class="row">
                  <div class="btn-group">
                    <a href="view_applied_jobs.php?id=<?php echo $row['id'];?>"class="btn btn-success">
                    <span class="glyphicon glyphicon-eye-open"></span></a>
                  </div>
                  
                
                </div>
                
                </td>

            </tr>
            <?php $a++;}  ?>
        </tbody>
        <tfoot>
            <tr>
            <th>Sr No.</th>
                
                <th>Job Title</th>

                <th>Job Seeker Name</th>
                <th>Email</th>
                 

                <th>Action</th>
                
           
            </tr>
        </tfoot>
          </table>

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
<!-- <script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script> -->

  </body>
</html>