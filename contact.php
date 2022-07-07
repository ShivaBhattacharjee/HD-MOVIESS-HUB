<!DOCTYPE html>
<?php
include 'admin/db.php';
include 'tags.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="contact.css"> -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        section {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
        }

        .container {
            width: 80%;
            padding: 20px;
        }

        .container h2 {
            margin-bottom: 60px;
            position: relative;
            font-size: 20px;
            width: 100%;
            color: red;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        }

        .container .row100 .col {
            position: relative;
            width: 100%;
            padding: 0px 10px;
            margin: 30px 0 10px;
            transform: 0.5s;
        }

        .container .row100 .inputBox {
            position: relative;
            height: 40px;
            width: 100%;
            color: red;
        }

        .container .row100 .inputBox input,
        .container .row100 .inputBox.textarea textarea {
            position: absolute;
            width: 100%;
            height: 100%;
            background: transparent;
            box-shadow: none;
            border: none;
            outline: none;
            font-size: 18px;
            padding: 0px 10px;
            z-index: 1;
        }

        .container .row100 .inputBox .text {
            position: absolute;
            top: 0;
            left: 0;
            line-height: 40px;
            font-size: 18px;
            padding: 0px 10px;
            display: block;
            transition: 0.5s;
            pointer-events: none;
        }

        .container .row100 .inputBox input:focus+.text,
        .container .row100 .inputBox input:valid+.text {
            top: -35px;
            left: -10px;
        }

        .container .row100 .inputBox .line {
            position: absolute;
            bottom: 0;
            display: block;
            width: 100%;
            height: 2px;
            background: rgb(222, 38, 62);
            transform: 0.5s;
            border-radius: 2px;
            pointer-events: none;
        }

        .container .row100 .inputBox input:focus~.line,
        .container .row100 .inputBox input:valid~.line {
            height: 100%;
        }

        .container .row100 .inputBox.textarea {
            position: relative;
            width: 100%;
            height: 100px;
            padding: 10px 0;
        }

        .container .row100 .inputBox .texarea textarea {
            height: 100%;
            resize: none;

        }

        .container .row100 .inputBox textarea:focus+.text,
        .container .row100 .inputBox textarea:valid+.text {
            top: -35px;
            left: -10px;
        }

        .container .row100 .inputBox textarea:focus~.line,
        .container .row100 .inputBox textarea:valid~.line {
            height: 100%;
        }

        .submit {
            border: none;
            padding: 7px 35px;
            cursor: pointer;
            outline: none;
            background: red;
            color: black;
            font-size: 18px;
            border-radius: 2px;
            transition: 0.3s;
        }

        .submit:hover {
            background: #000;
            color: red;
        }

        .request p {
            color: red;
        }
    </style>
    <link rel="icon" type="image/png/ico" href="Favicon.ico" />
    <script src="https://use.fontawesome.com/5b3fea805f.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Corinthia:wght@700&family=Inter:wght@600&family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Contact | HD MOVIES HUB</title>
</head>

<body>
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
        <form action="search" method="GET" class="search-box" autocomplete="off">
            <!------- input----------------->
            <input type="text" name="search" placeholder="Search here" required>
            <button type="submit" name="submit">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </nav>

    <section>
        <div class="container">
            <h2>Contact OR Request movie</h2>
            <form action="contact" method="POST" autocomplete="off">
                <div class="row100">
                    <div class="col">
                        <div class="inputBox">
                            <input type="text" name="name" required>
                            <span class="text">First Name</span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="inputBox">
                            <input type="text" name="lname" required>
                            <span class="text">Last Name</span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="inputBox">
                            <input type="email" name="email" required>
                            <span class="text">Email</span>
                            <span class="line"></span>
                        </div>
                    </div>
                </div>
                <div class="row100">
                    <div class="col">
                        <div class="inputBox textarea">
                            <textarea name="message" id="" cols="30" rows="10" required></textarea>
                            <span class="text">Type your message here :)</span>
                            <span class="line"></span>
                        </div>
                    </div>
                </div>
                <div class="row100">
                    <div class="col">
                        <button class="submit" name="submit">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
<?php
if (isset($_POST['submit'])) {
    $first_name = $_POST['name'];
    $_last_name = $_POST['lname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $query = "INSERT INTO `contact`(`first_name`, `last_name`, `email`, `message`) VALUES ('$first_name','$_last_name','$email','$message')";
    $run = mysqli_query($con, $query);
    if ($run) {
        echo "<script>alert('Request submitted');window.location.href='contact';</script>";
    } else {
        echo "<script>alert('something went wrong');window.location.href='contact';</script>";
    }
}
?>

</html>