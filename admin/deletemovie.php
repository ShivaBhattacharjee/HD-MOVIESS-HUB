<?php
include 'db.php';
$id = $_GET['id'];
$query = "DELETE FROM `movie` WHERE id=$id";
$run = mysqli_query($con,$query);
if ($run){
    header('location:movielist.php');
}
else{
    echo"<script>('Something went wrong');window.location.href='movielist.php';</script>";
}
?>