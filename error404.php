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
    <style>
        .error{
            text-align: center;
            position: relative;
            /* background-color: red; */
            transform: translateY(50%);
            margin-top: 100px;
        }
        .error h1{
            font-size: 3rem;
            color: white;
        }
        .error p{
            color: red;
            text-transform: uppercase;
            font-size: 1.3rem;
        }
        .redirect a{
            color: red;
            border-bottom: 2px solid red;
        }
    </style>
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
                    <li><a href="<?php echo $url ?>">
                            <?php echo $row['category_name']; ?>
                        </a></li>
            <?php
                }
            }
            ?>
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
    <div class="error">
        <p>error 404</p>
        <h1>Page not found</h1>
        <br>
        <div class="redirect">
            <a href="index">Return to the home page</a>
        </div>
    </div>
    <script src="java/logic.js"></script>
</body>

</html>