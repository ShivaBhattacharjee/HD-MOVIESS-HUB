<?php
include 'db.php';
$id = $_GET['id'];
$query = "DELETE FROM `genre` WHERE id = $id";
$run = mysqli_query($con,$query);
if ($run){
    echo"<script>alert('Genre deleted succesfully');window.location.href='genrelist.php';</script>";
}
else{
    echo"<script>alert('Something went wrong');window.location.href='addgenre.php';</script>";
}
?>