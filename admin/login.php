<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- --------fornt family------ -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    <title>LOGIN TO HD-MOVIESS HUB ADMIN PANNEL</title>
</head>
<body> 
    <section class="form-main">
        <div class="form-content">
            <div class="circle-1"></div>
            <div class="circle-2"></div>
            <div class="circle-3"></div>
            <div class="box">
                <h3>Admin Login</h3>
                <form action="login.php" method="POST" autocomplete="off">
                    <div class="input-box">
                        <input type="text" placeholder="Username" class="input-control" name="uname" required>
                    </div>
                    <div class="input-box">
                        <input type="password" placeholder="Password" class="input-control" name="pwd" required>
                    </div>
                    <input type="submit" class="btn"value="Log In" name="submit">
                </form>
            </div>
        </div>
    </section>
</body>
</html>
<?php 

if (isset($_POST['submit'])) {
	$user = $_POST['uname'];
	$pwd = $_POST['pwd'];

	$query = "Select * From admin where uname = '$user'";
	$run = mysqli_query($con,$query);
	
	if (mysqli_num_rows($run)>0) {
		while ($row = mysqli_fetch_assoc($run)) {
			if (password_verify($pwd, $row['pwd'])) {
				$_SESSION['loggedin']=1;
				$_SESSION['user'] = $user;
				echo "<script>alert('Logged in Successfully'); window.location.href='index.php';</script>";
		
			}
				
		}	

	}
	else{
				echo "<script>alert('Check your ID pass'); </script>";
			}
	
}

 ?>