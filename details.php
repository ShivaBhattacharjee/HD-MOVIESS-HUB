<?php
include 'admin/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/1fe3d7eaef.js"></script>
    <script src="https://use.fontawesome.com/61c09b8afb.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/swiper-bundle.min.css">
    <!-- <link rel="shortcut icon" href="images/fav-icon.png"> -->
    <title>HD MOVIES-HUB</title>
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
        <a href="index.php" class="logo">
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
            <li><a href="https://t.me/hdmovieshub777">JOIN US ON TELEGRAM</a></li>
        </ul>

        <!-- search box---- -->
        <form action="search" method="GET" class="search-box">
            <!------- input----------------->
            <input type="text" name="search" id="query" placeholder="Search here" required>
            <button type="submit" name="submit">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </nav>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        foreach($_GET as $key => $value){
        $dec = ($_GET[$key]= base64_decode(urldecode($id)));
        $uncal =((($dec*956783)/54321)/123456789) ;
        $query = "SELECT * From movie where id=$uncal";
        $run = mysqli_query($con, $query);
        if($run){
            while($row = mysqli_fetch_assoc($run)){
                ?>
                <!-- =====nav-end -->
                <section class="movie-banner">
                    <div class="m-banner-img">
                        <img src="thumb/<?php echo $row['cimg']; ?>" alt="Spider-Man-no-way-home">
                    </div>
                    <!-- ========content===== -->
                    <div class="banner-container">
                        <!-- =====title -->
                        <div class="title-container">
                            <div class="title-top">
                                <div class="movie-title">
                                    <h1><?php echo $row['mv_name'] ?></h1>
                                </div>
                                <div class="more-about-movie">
                                    <span><?php echo $row['date']; ?></span>
                                    <!-- <span>2h 28m</span> -->
                                </div>
                                <div class="language">
                                    <span><?php echo $row['lang']; ?></span>
                                </div>
                            </div>
                            <div class="title-ABC">
                                <!-- ---trailer -->
                                <a href="<?php echo $row['tr_link']; ?>" target="_blank" class="watch-btn">Watch Trailer</a>
                                <a href="#downloads" class="watch-btn">Download Now</a>
                            </div>
                        </div>
                    </div>
                    <!-- ==========play-btn========== -->
                </section>
                <!-- =========movie-details -->
                <section class="movie-details">
                    <strong><?php echo $row['mv_name']; ?></strong>
                    <p><?php echo $row['mv_desc'] ?></p>
                </section>
                <!-- ===========screenshots -->
                <section class="screenshots">
                    <strong>SCREENSHOTS</strong>
                    <br><br>
                    <div class="screen-s-container">
                        <img src="thumb/<?php echo $row['ss1']; ?>" alt="screenshots">
                        <img src="thumb/<?php echo $row['ss2']; ?>" alt="screenshots">
                    </div>
                </section>
                <div class="download-movie" id="downloads">
                    <div class="download-container">
                        <div class="download-box">
                            <span><i class="fa fa-server"></i>Server-1</span>
                            <span>English</span>
                            <span>480p</span>
                            <a href="<?php echo $row['link1']; ?>" >Download</a>
                        </div>
                        <div class="download-box">
                            <span><i class="fa fa-server"></i>Server-2</span>
                            <span>English</span>
                            <span>720p</span>
                            <a href="<?php echo $row['link2']; ?>" >Download</a>
                        </div>
                        <div class="download-box">
                            <span><i class="fa fa-server"></i>Server-3</span>
                            <span>English</span>
                            <span>1080p</span>
                            <a href="<?php echo $row['link3']; ?>">Download</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        else{
            echo 'Error';
        }
        }
    } else {
        header('location:index.php');
    }
    ?>
                <footer>
                    <a href="index.php" class="logo">
                        HD MOVIES <span> HUB</span>
                    </a>
                </footer>
                <script src="java/logic.js"></script>
</body>

</html>