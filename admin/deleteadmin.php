<?php
include 'db.php';
$id = $_GET['id'];
$query = "DELETE FROM `admin` WHERE id = $id";
$run = mysqli_query($con,$query);
if ($run){
    echo "<script>alert('Admin has been removed');window.location.href='adminlist.php';</script>";
}
else{
    echo"<script>alert('Something went wrong');window.location.href='adminlist.php';</script>";
}
?>