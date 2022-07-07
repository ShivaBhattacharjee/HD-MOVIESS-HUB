<?php
session_start();
if (isset($_SESSION['loggedin'])) {
} else {
  echo "<script>alert('You are not logged in'); window.location.href='login';</script>";
}
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styles.css" />
  <title>Dashboard of HD MOVIESS HUB</title>
</head>

<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-white" id="sidebar-wrapper">
      <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><a href="../index.php" style="color: red;text-decoration:none;"> HDMovies Hub</div>
      <div class="list-group list-group-flush my-3">
        <a href="index" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
        <a href="request" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Requests</a>
        <a href="adminlist" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Admin List</a>
        <a href="registeradmin" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Add Admin</a>
        <a href="movielist" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Movie List</a>
        <a href="addmovie" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Add Movie</a>
        <a href="categorylist" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Category</a>
        <a href="genrelist" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Genre</a>
        <a href="../index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Main_page</a>
        <a href="logout" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">Logout</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
          <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
          <h2 class="fs-2 m-0" style="font-size:8px;">Dashboard</h2>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user me-2"></i><?php echo $_SESSION['user']; ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="logout">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      <div class="container">
        <div class="head" style="text-align:center;">
          <h1 style="color:red; font-size:1.5rem; margin-top:60px;">Register a new admin</h1>
        </div>
        <form action="registeradmin.php" method="POST">
          <div class="form-group" style="margin-top: 100px;">
            <label for="exampleInputEmail1" style="color:red">Username:-</label>
            <input type="text" name="uname" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp" placeholder="Enter username" style="color:red; " autocomplete="FALSE">
          </div>
          <br>
          <div class="form-group" style="color: red;">
            <label for="exampleInputPassword1">Password:-</label>
            <input type="password" name="pwd" class="form-control" id="exampleInputPassword1" placeholder="Password" required autocomplete="false">
          </div>
          <button type="submit" name="submit" class="btn btn-primary" style="background-color: red; border:none; margin-left:40%; margin-top:20px;">REGISTER</button>
      </div>
    </div>
    <script src="../java/JQuery3.3.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      var el = document.getElementById("wrapper");
      var toggleButton = document.getElementById("menu-toggle");

      toggleButton.onclick = function() {
        el.classList.toggle("toggled");
      };
    </script>
</body>
</html>
<?php
if (isset ($_POST['submit'])){
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $hash = password_hash("$pwd", PASSWORD_BCRYPT);
    $query = "INSERT INTO `admin`(`uname`, `pwd`) VALUES ('$uname','$hash')";
    $run = mysqli_query($con,$query);
    if ($run){
        echo "<script>alert ('Admin Added');window.location.href='adminlist.php';</script>";
    }
    else{
        echo "<script>alert ('Something went wrong');s</script>";
    }

}
?>