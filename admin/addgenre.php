<?php
include 'db.php';
include 'ft.php';
include 'header.php';
?>
<div class="container">
    <div class="head">
        <br><br><br>
        <div class="jumbotron">
            <br><br><br>
            <h1 class="display-4">Add a Genre</h1>
            <p class="lead">Add category and please mention their category ID</p>
            <hr class="my-4">
            <form action="addgenre.php" method="POST">
                <div class="form-row">
                    <div class="col-7">
                        <input type="text" name="genrename" class="form-control" placeholder="Genre name" required >
                    </div>
                    <div class="col">
                        <input type="text" name="cat_id" class="form-control" placeholder="Category Id" required >
                    </div>
                    <div class="col">
                        <input type="text" name="genreid" class="form-control" placeholder="Genre Id" required >
                    </div>
                </div>
                <br><br><br>
                <button class="btn btn-danger" name="submit" href="#" role="button">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php
if (isset ($_POST['submit'])){
    $genname = $_POST['genrename'];
    $catid = $_POST['cat_id'];
    $genre = $_POST['genreid'];

    $query ="INSERT INTO `genre`(`genre_name`, `category_id`, `genreid`) VALUES ('$genname',$catid,$genre)";
    $run = mysqli_query($con,$query);
    if ($run){
        echo "<script>alert('Genre Succesfully added');window.location.href='genrelist.php';</script>";
    }
    else{
        echo "<script>alert('Something went wrong');window.location.href='addgenre.php';</script>";
    }
}
 ?>