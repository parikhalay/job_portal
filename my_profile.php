<?php
include('include/header.php');
include('include/my_profile.php');
include('connection/db.php');

$query=mysqli_query($conn,"SELECT * FROM profiles WHERE user_email='{$_SESSION['email']}'");
while($row=mysqli_fetch_array($query)){
  $img=$row['img'];
  $first_name=$row['first_name'];
  $last_name=$row['last_name'];
  $dob=$row['dob'];
  $email=$row['email'];
  $number=$row['number'];

}

?>
<br><br>
<div style="margin-left:25%; padding:10px; width:50%; border: 1px solid gray;">
    <form action="profile_add.php" name="profile_form" id="profile_form" enctype="multipart/form-data" method="post">
      <div class="row">
        <div class="col-md-4">
        <img src="admin/profile_img/<?php if(!empty($img)){echo $img;} else{ echo 'default.png';}?>" class="img-thumbnail" alt="Profile">
        </div>
        <div class="col-md-5">
        <input type="file" class="form-control" name="img" id="img" >
        </div>
      </div>
      <br>
      <div style="margin-left:20%">
      <div class="row">
        <div class="col-md-6">
            <td>First Name :</td>
        </div>
        <div class="col-md-6">
            <td><input type="text" value="<?php if(!empty($first_name))echo $first_name;?>" name="first_name" id="first_name" class="form-group"></td>
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-6">
            <td>Last Name :</td>
        </div>
        <div class="col-md-6">
            <td><input type="text" value="<?php if(!empty($last_name))echo $last_name; ?>" name="last_name" id="last_name" class="form-group"></td>
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-6">
            <td>Your DOB :</td>
        </div>
        <div class="col-md-6">
            <td><input type="date" value="<?php if(!empty($dob))echo $dob; ?>"  name="dob" id="dob" class="form-group"></td>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
            <td>Mobile No :</td>
        </div>
        <div class="col-md-6">
            <td><input type="number"  value="<?php if(!empty($number))echo $number; ?>" name="number" id="number" class="form-group"></td>
        </div>    
      </div>

      <div class="row">
        <div class="col-md-6">
            <td>Email Address :</td>
        </div>
        <div class="col-md-6">
            <td><input type="Email" value="<?php if(!empty($email)) echo $email; ?>"  name="email" id="email" class="form-group"></td>
        </div>
        
      </div>
      
      <div class="form-group">
            <td><input type="submit" name="submit" id="submit" class="btn btn-success" value="Update" ></td>

      </div>
      </div> 
    </form>

</div>
<br><br>		

    <?php
   include('include/footer.php');
   
    ?>
    <!-- <script>
    $(document).ready(function(){

$("#submit").click(function(){
    var data=$(profile_form).serialize();
   
   $.ajax({
         type:"POST",
         url:"profile_add.php",
         data:data,
         success:function(data){
           $("msg").html(data);
          
         }
   });
})

    });
    </script> -->