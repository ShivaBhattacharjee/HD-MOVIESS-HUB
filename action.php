<?php
include "admin/db.php";
if($con->connect_error){
    die("Failed to connect!".$con->connect_error);
}

$search = $_GET['name'];
$query = "SELECT mv_name FROM movie WHERE mv_name LIKE '%$search%' OR mv_desc LIKE '%$search%' ORDER BY ID DESC LIMIT 3";
$result = mysqli_query($con,$query);
$output = '';
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $output .= "<li>{$row['mv_name']}</li>";
    }
}
else{
    $output .= "<li>{$_GET['name']}</li>";
}
echo $output;
?>




