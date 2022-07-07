<?php
include 'admin/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="thumb/favicon.jpg">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/lightslider.css">
    <script src="java/JQuery3.3.1.js"></script>
    <script src="java/lightslider.js"></script>
    <script src="https://use.fontawesome.com/5b3fea805f.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Corinthia:wght@700&family=Inter:wght@600&family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5PQP0DC3MK"></script>
    <title><?php echo $_GET['search'];?></title>
</head>

<body>
    <!-- -------progress bar------- -->
    <div id="progress">
        <span id="progress-value"></span>
    </div>
    <!-- navigation--------------------------------------- -->
    <nav class="navigation">
        <!-- menu-btn---------------------------------------- -->
        <input type="checkbox" class="menu-btn" id="menu-btn">
        <label for="menu-btn" class="menu-icon">
            <span class="nav-icon"></span>
        </label>

        <!-- logo------------------ -->
        <a href="index" class="logo">
            HD MOVIES<span>HUB</span>
        </a>
        <!-- menu----------------------- -->
        <ul class="menu">
            <li><a href="index">HOME</a></li>
            <?php
            $ql = "SELECT * From category";
            $run = mysqli_query($con, $ql);
            if ($run) {
                while ($row = mysqli_fetch_assoc($run)) {
            ?>
                    <?php
                    $id = $row['id'];
                    $enc1 = (($id * 123456789 * 54321) / 95783);
                    $url = "category?id=" . urldecode(base64_encode($enc1));
                    ?>
                    <li><a href="<?php echo $url ?>"><?php echo $row['category_name']; ?></a></li>
            <?php
                }
            }
            ?>
            <li><a href="http://t.me/hdmoviesshub7" target="_blank">JOIN ON TELEGRAM</a></li>
        </ul>

        <!-- search box----------->
        <form action="search" method="get" name="search" class="search-box">
            <!------- input----------------->
            <input type="text" name="search" id="query" placeholder="Search here" required>
            <button type="submit" name="submit" id="submit">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </nav>
    <section id="searches">
        <div class="search-results">
            <br>
            <h4 style="color:red; margin-left:45px;">Search results for &nbsp;&nbsp;&nbsp; <em>"<?php echo $_GET['search'] ?>"</em></h4>
        </div>
        <section id="movies-list">
            <?php
            if (isset($_GET['submit'])) {
                $search = $_GET['search'];
                $searchpreg = preg_replace("#[^0-9a-z]#i", "", $search);
                $query = "SELECT * FROM movie WHERE MATCH(mv_name,mv_desc) against ('$search')";
                $run = mysqli_query($con, $query);
                $count = mysqli_num_rows($run);
                if ($count == 0) {
                    echo "<div style=color:red;>'No Result Found' &nbsp</div>";
                } else {
                    while ($row = mysqli_fetch_assoc($run)) {
            ?>
                        <div class="movies-box">
                            <div class="movies-img">
                                <?php
                                $title = $row['mv_name'];
                                $title = preg_replace('/[^\p{L}\p{N}\s]/u', '', $row['mv_name']);
                                $title = str_replace(" ", "-", $title);
                                ?>
                                <a href="watch/<?php echo $row['id']; ?>/<?php echo $title?>"><img src="thumb/<?php echo $row['img']; ?>" alt="image"></a>
                                <div class="quality"><?php echo $row['quality1']; ?></div>
                            </div>
                            <p><?php echo $row['mv_name']; ?></p>
                        </div>
            <?php
                    }
                }
            } else {
                echo "No movie searched";
            }
            ?>
        </section>
</body>

</html>