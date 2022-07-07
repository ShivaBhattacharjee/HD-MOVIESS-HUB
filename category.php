<?php
include 'admin/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/lightslider.css">
    <script src="java/JQuery3.3.1.js"></script>
    <script src="java/lightslider.js"></script>
    <script src="https://use.fontawesome.com/5b3fea805f.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Corinthia:wght@700&family=Inter:wght@600&family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png/ico" href="Favicon.ico" />
    <title>HD MOVIES HUB</title>
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
            <li><a href="https://t.me/hdmovieshub777" target="_blank">JOIN ON TELEGRAM</a></li>
        </ul>

        <!-- search box----------->
        <form action="search" method="POST" class="search-box">
            <!------- input----------------->
            <input type="text" name="search" id="query" placeholder="Search here" required>
            <button type="submit" name="submit">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </nav>
    <section id="movies-list">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            foreach ($_GET as $key => $id) {
                $data = $_GET['$key'] = base64_decode(urldecode($id));
                $dec1 = ((($data * 95783) / 54321) / 123456789);
                $query = "SELECT * From category,movie where category.category_id=movie.cat_id and category.category_id=$dec1";
                $run = mysqli_query($con, $query);
                if (mysqli_num_rows($run) > 0) {
                    while ($row = mysqli_fetch_assoc($run)) {
        ?>
                        <div class="movies-box">
                            <div class="movies-img">
                                <?php
                                $id = $row['id'];
                                $cal = (($id * 123456789 * 54321) / 956783);
                                $url = "details?id=" . urlencode(base64_encode($cal));
                                ?>
                                <a href="<?php echo $url; ?>"><img src="thumb/<?php echo $row['img']; ?>" alt="image"></a>
                                <div class="quality">WEB DL</div>
                            </div>
                            <p><?php echo $row['mv_name']; ?></p>
                        </div>
        <?php
                    }
                } else {
                    echo "No data found";
                }
            }
        }
        ?>
    </section>
</body>

</html>