<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;500&display=swap');
body{
    font-family: poppins;
}
</style>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
include 'db.php';
if(isset($_POST['submit'])){
    $first_name = $_POST['name'];
    $_last_name = $_POST['lname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $query = "INSERT INTO `contact`(`first_name`, `last_name`, `email`, `message`) VALUES ('$first_name','$_last_name','$email','$message')";
    $run = mysqli_query($con,$query);
    if($run){
        echo "<p>Request Submitted</p> ";
    }
    else{
       
    }
}
?>