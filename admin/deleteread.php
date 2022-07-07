<?php
include 'db.php';
$id = $_GET['id'];
$query = "DELETE FROM `readrequest` WHERE id=$id";
$run = mysqli_query($con,$query);
if ($run){
    header('location:marked.php');
}
else{
    echo"<script>('Something went wrong');window.location.href='marked.php';</script>";
}
?>