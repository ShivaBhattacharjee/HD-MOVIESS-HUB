<?php
include 'admin/db.php';
include 'tags.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/lightslider.css">
    <script src="java/JQuery3.3.1.js"></script>
    <script src="java/lightslider.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://use.fontawesome.com/5b3fea805f.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Corinthia:wght@700&family=Inter:wght@600&family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png/ico" href="Favicon.ico" />
    <!-- <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> -->
    <title>HD MOVIES HUB</title>
</head>

<body>
    <div class="load" id="loader"></div>
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
                    <li><a href="<?php echo $url ?>">
                            <?php echo $row['category_name']; ?>
                        </a></li>
            <?php
                }
            }
            ?>
            <li><a href="contact">Contact Us</a></li>
            <li><a href="https://t.me/hdmovieshub777" target="_blank">JOIN ON TELEGRAM</a></li>
        </ul>

        <!-- search box----------->
        <form action="search" method="GET" class="search-box">
            <!------- input----------------->
            <input type="text" name="search" placeholder="Search here" required>
            <button type="submit" name="submit">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </nav>
    <section id="main">
        <h1 class="showcase-heading">RECENT</h1>
        <br><br>
        <ul id="autoWidth" class="cs-hidden">
            <?php
            $q2 = "SELECT * From movie ORDER BY id DESC limit 8";
            $r2 = mysqli_query($con, $q2);
            if ($r2) {
                while ($row = mysqli_fetch_assoc($r2)) {
            ?>
                    <li class="item-a">
                        <div class="showcase-box">
                            <?php
                            $title = $row['mv_name'];
                            $title = preg_replace('/[^\p{L}\p{N}\s]/u', '', $row['mv_name']);
                            $title = str_replace(" ", "-", $title);
                            ?>
                            <a href="watch/<?php echo $row['id'] ?>/<?php echo $title ?>"><img src="thumb/<?php echo $row['cimg']; ?>" alt="img"></a>
                        </div>
                    </li>
            <?php
                }
            }
            ?>
            </li>
        </ul>
    </section>
    <section id="latest">
        <h1 class="latest-heading">Latest</h1>
        <br><br>
        <ul id="autoWidth1" class="cs-hidden">
            <?php
            $q2 = "SELECT * From movie ORDER BY id DESC limit 20";
            $r2 = mysqli_query($con, $q2);
            if ($r2) {
                while ($row = mysqli_fetch_assoc($r2)) {
            ?>
                    <li class="item-a">
                        <div class="latest-box">
                            <div class="latest-b-img">
                                <?php
                                $title = $row['mv_name'];
                                $title = preg_replace('/[^\p{L}\p{N}\s]/u', '', $row['mv_name']);
                                $title = str_replace(" ", "-", $title);
                                ?>
                                <a href="watch/<?php echo $row['id']; ?>/<?php echo $title ?>"><img src="thumb/<?php echo $row['img']; ?>" alt="image"></a>
                            </div>
                        </div>
                        <!-- ---------text------ -->
                    </li>
            <?php
                }
            }
            ?>
        </ul>
    </section>
    <div class="movies-heading">
        <h2> Movies And Webseries</h2>
    </div>
    <section id="movies-list">
        <?php
        $per_page = 20;
        $start = 0;
        $current_page = 1;
        if (isset($_GET['start'])) {
            $start = $_GET['start'];
            if ($start <= 0) {
                echo "";
            } else {
                $start--;
                $start = $start * $per_page;
                $current_page = $start;
            }
        }
        $record = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `movie`"));
        $pagi = ceil($record / $per_page);
        $sql = "SELECT * FROM `movie`";
        $res = mysqli_query($con, $sql);
        ?>
        <?php
        $query = "SELECT * From movie order by id desc limit $start,$per_page";
        $run = mysqli_query($con, $query);
        if ($run) {
            while ($row = mysqli_fetch_assoc($run)) {
        ?>

                <div class="movies-box">
                    <?php
                    $title = $row['mv_name'];
                    $title = preg_replace('/[^\p{L}\p{N}\s]/u', '', $row['mv_name']);
                    $title = str_replace(" ", "-", $title);
                    ?>
                    <div class="movies-img" data-aos="fade-right" data-aos-duration="500">
                        <a href="watch/<?php echo $row['id']; ?>/<?php echo $title ?>"><img src="thumb/<?php echo $row['img']; ?>" alt="image"></a>
                        <div class="quality">
                            <?php echo $row['quality1']; ?>
                        </div>
                    </div>
                    <p id="move">
                        <?php echo $row['mv_name']; ?>
                    </p>
                </div>
        <?php

            }
        }
        ?>
    </section>
    <div class="page-number">
        <?php
        $class = '';
        for ($i = 1; $i < $pagi; $i++) {
            if ($current_page == $i) {
                $class = 'active';
            }
        ?>
            <a href="?start=<?php echo $i ?>" <?php echo $class ?>class="active"><?php echo $i ?></a>
        <?php } ?>
    </div>
    </div>
    <br><br>
    <footer>
        <a href="index" class="logo">
            HD MOVIES <span> HUB</span>
        </a>
    </footer>
    <script src="java/logic.js"></script>
    <script>
        ScrollReveal({
            reset: true,
            distance: '60px',
            duration: 950,
            delay: 0
        });
        ScrollReveal().reveal('.movies-heading', {
            origin: 'left'
        });
        ScrollReveal().reveal('.movies-img', {
            origin: 'bottom',
            interval: 200
        });
        ScrollReveal().reveal('#move', {
            origin: 'bottom',
            interval: 200
        });
        $(window).on('load', function() {
            $("#loader").fadeOut(1000);
            $(".navigation").fadeIn(1000);
        });
    </script>
</body>

</html>
