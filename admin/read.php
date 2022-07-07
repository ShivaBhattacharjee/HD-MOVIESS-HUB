<?php 
include 'db.php';
$id = $_GET['id'];
$sql = "SELECT * FROM contact where id = $id";
$r1 = mysqli_query($con,$sql);
if($r1){
    while($row = mysqli_fetch_assoc($r1)){
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $message = $row['message'];
        $query = "INSERT INTO `readrequest`(`first_name`, `last_name`, `email`, `message`) VALUES ('$first_name','$last_name','$email','$message')";
        $run = mysqli_query($con,$query);
        if($run){
            $q2 = "DELETE FROM `contact` WHERE id = $id";
            $r2 = mysqli_query($con,$q2);
            if($r2){
                echo "<script>alert('Marked as read');window.location.href='request';</script>";
            }
        }
        else{
            echo"<script>alert('some thing went wrong');</script>";
        }
    }
}else{
    header('location.href:../index.php');
}

?>