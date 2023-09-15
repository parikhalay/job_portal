<?php
include('connection/db.php');
echo $Company=$_POST['Company'];
echo $Description=$_POST['Description'];
echo $admin=$_POST['admin'];

$query=mysqli_query($conn,"insert into company(company,des,admin)
values('$Company','$Description','$admin')");

var_dump($query);
if($query){
    echo "Data has been successfully inserted";
}else{
    echo "please try again";
}

?>