<?php
include 'db.php';
include 'ft.php';
session_start();
if (isset($_SESSION['loggedin'])) {
} else {
    echo "<script>alert('You are not logged in'); window.location.href='login';</script>";
}
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
    <style>
        .jumbotron {
            margin-left: 20px;
        }

        .img {
            width: 350px;
        }
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><a href="../index.php" style="color: red;text-decoration:none;"> HDMovies Hub</div>
            <div class="list-group list-group-flush my-3">
                <a href="index" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
                <a href="request" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Requests</a>
                <a href="movielist" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">Movie List</a>
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
                                <li><a class="dropdown-item" href="Profile">Profile</a></li>
                                <li><a class="dropdown-item" href="logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <section id="search-results">
                <div class="searches">
                    <h4 style="color:red;font-size:0.9rem; margin-top:50px; letter-spacing:1px;">SEARCH RESULTS FOR <em>"<?php echo $_POST['search'] ?>"</em></h4>
                </div>
            </section>
            <?php


            $search1 = $_POST['search'];


            ?>
            <div class="container">
                <div class="row">

                    <?php

                    if (isset($_POST['submit'])) {
                        $search = $_POST['search'];
                        $searchpreg = preg_replace("#[^0-9a-z]#i", "", $search);
                        $query = "SELECT * FROM movie where mv_name LIKE '%$search%' OR mv_tag LIKE '%$search%' OR lang LIKE '%$search%' OR director LIKE '%$search%' ";
                        $run = mysqli_query($con, $query);
                        $count = mysqli_num_rows($run);
                        if ($count == 0) {
                            echo "<h1>No Movie Found!!</h1>";
                        } else {
                            while ($row = mysqli_fetch_assoc($run)) {
                    ?>

                                <div class="col">
                                    <div class="card" style="width:200px;text-align: center;">
                                        <a href="viewmore.php?id=<?php echo $row['id']; ?>"><?php echo "<img height='180px' width='auto' style='margin-top:100px'; src='../thumb/" . $row['img'] . "'>"; ?></a>
                                        <p style="color:red"><?php echo $row['mv_name']; ?></p>
                                    </div>
                                </div>
                    <?php
                            }
                        }
                    }

                    ?>
                </div>
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