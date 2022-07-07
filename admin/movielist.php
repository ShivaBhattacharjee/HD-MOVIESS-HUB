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
                <form action="searchmovie.php" method="POST" autocomplete="off">
                    <div class="input-group">
                        <div class="form-outline">
                            <input class="form-control " name="search" type="search" id="form1" placeholder="Search(only movies)">
                        </div>
                        &nbsp;&nbsp; &nbsp;&nbsp;
                        <button class="btn btn-danger btn-block" name="submit" type="submit"> <i class="fas fa-search"></i></button>
                    </div>
                </form>
                <br><br>
                <div class="row">
                    <?php
                    $per_page = 32;
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
                    $query = "SELECT * From movie ORDER BY ID DESC limit $page,$per_page";
                    $run = mysqli_query($con, $query);
                    if ($run) {
                        while ($row = mysqli_fetch_assoc($run)) {
                    ?>
                            <div class="col-md-3">
                                <div class="card" style="width:18rem;">
                                    <img src="../thumb/<?php echo $row['cimg']; ?>" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['mv_name']; ?></h5>
                                        <a href="viewmore.php?id=<?php echo $row['id']; ?>" class="btn btn-info">View</a>
                                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                        <a href="deletemovie.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>

                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <br>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <?php
                        for ($i = 1; $i <= $pagi; $i++) {
                            $class = '';
                            if ($curent == $i) {
                                $class = 'active';
                            } ?>
                            <li class="page-item"><a class="page-link" href="?page=<?php echo $i?>"><?php echo $i?></a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
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