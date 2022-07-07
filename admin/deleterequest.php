<?php
if (isset($_SESSION['loggedin'])) {
} else {
    echo "<script>alert('You are not logged in'); window.location.href='login';</script>";
}
include 'db.php';
$id = $_GET['id'];
$query = "DELETE FROM `contact` WHERE id = $id";
$run = mysqli_query($con,$query);
if ($run){
    echo "<script>alert('Message has been removed');window.location.href='request';</script>";
}
else{
    echo"<script>alert('Something went wrong');window.location.href='request';</script>";
}
?>