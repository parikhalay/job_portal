<?php
include('connection/db.php');
echo $category=$_POST['category'];
echo $Description=$_POST['Description'];

$query=mysqli_query($conn,"insert into job_category(category,des)
values('$category','$Description')");

var_dump($query);
if($query){
    echo "Data has been successfully inserted";
}else{
    echo "please try again";
}

?>