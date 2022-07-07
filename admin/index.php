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
        .pagination li a{
            color: red;
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
                <a href="request" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-info-circle me-2"></i> Requests</a>
                <a href="movielist" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-list-ol me-2"></i> Movie List</a>
                <a href="registeradmin" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-plus-square me-2"></i> Add Admin</a>
                <a href="movielist" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-list me-2"></i> Movie List</a>
                <a href="addmovie" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-add me-2"></i> Add Movie</a>
                <a href="categorylist" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-filter me-2"></i> Category</a>
                <a href="genrelist" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-filter me-2"></i> Genre</a>
                <a href="../index" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-home me-2"></i> Main_page</a>
                <a href="logout" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i class="fas fa-power-off me-2"></i>Logout</a>
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
            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <h3 class="fs-2"><a href="addmovie" style="color:red;text-decoration:none"> Add New Movie </a></h3>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <p class="fs-5"><b> Uploads </b></p>
                                <h3 class="fs-2">
                                    <?php
                                    $query = "SELECT COUNT(*)AS total_movie from movie";
                                    $run = mysqli_query($con, $query);
                                    while ($row = mysqli_fetch_assoc($run)) {
                                        echo $row['total_movie'];
                                    }
                                    ?>
                                </h3>
                            </div>
                            <i class="fas fa-upload fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <p class="fs-5"><b>Admins</b></p>
                                <h3 class="fs-2"><?php
                                                    $query = "SELECT COUNT(*) AS total_admin from admin";
                                                    $run = mysqli_query($con, $query);
                                                    while ($row = mysqli_fetch_assoc($run)) {
                                                        echo $row['total_admin'];
                                                    }
                                                    ?></h3>
                            </div>
                            <i class="fas fa-user fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                    <?php
                    $query = "SELECT * FROM category";
                    $run = mysqli_query($con, $query);
                    if ($run) {
                        while ($row = mysqli_fetch_assoc($run)) {
                    ?>
                            <div class="col-md-3">
                                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                    <div>
                                        <p class="fs-5"><b><?php echo $row['category_name']; ?></b></p>
                                        <?php
                                        $id = $row['id'];
                                        $query1 = "SELECT count(*) as total from movie,category where category.id = movie.cat_id and category.id = $id ";
                                        $run1 = mysqli_query($con, $query1);
                                        if ($run1) {
                                            while ($row = mysqli_fetch_assoc($run1)) {
                                        ?>
                                                <h3 class="fs-2"><?php echo $row['total']; ?></h3>
                                        <?php
                                            }
                                        }
                                        ?>

                                    </div>
                                    <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <br><br>
                <form action="searchmovie.php" method="POST" autocomplete="off">
                    <div class="input-group">
                        <div class="form-outline">
                            <input class="form-control " name="search" type="search" id="form1" placeholder="Search(only movies)">
                        </div>
                        &nbsp;&nbsp; &nbsp;&nbsp;
                        <button class="btn btn-danger btn-block" name="submit" type="submit"> <i class="fas fa-search"></i></button>
                    </div>
                </form>&nbsp;&nbsp;
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Recent Uploads</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover" id="loaddata">
                            <thead>
                                <tr>
                                    <th scope="col" width="10">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Language</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $per_page = 30;
                                    $page = 0;
                                    $curent = 1;
                                    if (isset($_GET['page'])) {
                                        $page = $_GET['page'];
                                        $page--;
                                        $page = $page * $per_page;
                                        $curent = $page;
                                    }
                                    $sql = "SELECT id,mv_name from movie";
                                    $res = mysqli_query($con, $sql);
                                    $record = mysqli_num_rows($res);
                                    $pagi = ceil($record / $per_page)
                                    ?>
                                    <?php
                                    $query = "SELECT * From movie ORDER BY ID DESC LIMIT $page,$per_page";
                                    $run = mysqli_query($con, $query);
                                    if ($run) {
                                        while ($row = mysqli_fetch_assoc($run)) {
                                    ?>
                                            <th scope="row"><?php echo $row['id']; ?></th>
                                            <td><a href="viewmore?id=<?php echo $row['id']; ?>" style="color:red;text-decoration:none;"><?php echo $row['mv_name']; ?></a></td>
                                            <td><?php echo $row['lang']; ?></td>
                                            <td><?php echo $row['date']; ?></td>
                                </tr>
                        <?php
                                            $id = $row['id'];
                                        }
                                    }
                        ?>
                            </tbody>
                        </table>
                    </div>
                    <nav aria-label="...">
                        <ul class="pagination pagination-sm">
                            <?php
                            for ($i = 1; $i <= $pagi; $i++) {
                                $class = '';
                                if ($curent == $i) {
                                    $class = 'active';
                                }
                            ?>
                                <li class="page-item <?php echo $class ?>"><a class="page-link <?php echo $class ?>" href="?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                                &nbsp; &nbsp;
                            <?php } ?>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
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