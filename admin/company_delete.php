<?php
    include('connection/db.php');
    $del=$_GET['del'];
    $query=mysqli_query($conn,"delete from company where company_id='$del'");
    if($query){
        echo "<script> alert('Record has been deleted')</script>";
        header('location:category.php');
    }else{
        echo "<script> alert('Please try again')</script>";   
    }
?>