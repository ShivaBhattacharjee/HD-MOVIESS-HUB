<?php
session_start();
if (isset($_SESSION['loggedin'])) {}
 else {
  echo "<script>alert('You are not logged in'); window.location.href='login';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Admin Hd Movies Hub</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">HD MOVIES HUB</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registeradmin.php">Register Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adminlist.php">Admin list</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="movielist.php">Movies and Webseries</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categorylist.php">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="genrelist.php">Genre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../index.php">Back to main Page</a>
        </li>
        <form action="searchmovie.php"  method="POST" class="form-inline">
          <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search(only movies)" aria-label="Search">
          <button class="btn btn-outline-primary my-2 my-sm-0" name="submit" type="submit">Search</button>
        </form>&nbsp;&nbsp;
        <li class="nav-item">
          <a class="btn btn-outline-danger" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
</body>
</body>

</html>