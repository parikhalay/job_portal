<?php
include('connection/db.php');
echo $email=$_POST['email'];
echo $admin_username=$_POST['username'];
echo $admin_password=$_POST['password'];
echo $first_name=$_POST['first_name'];
echo $last_name=$_POST['last_name'];
echo $admin_type=$_POST['admin_type'];
$query=mysqli_query($conn,"insert into admin_login(admin_email,admin_username,admin_password,first_name,last_name,admin_type)
values('$email','$admin_username','$admin_password','$first_name','$last_name','$admin_type')");

var_dump($query);
if($query){
    echo "Data has been successfully inserted";
}else{
    echo "please try again";
}

?>