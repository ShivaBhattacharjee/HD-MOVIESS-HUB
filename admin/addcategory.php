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
            <h1 class="display-4">Add a category</h1>
            <p class="lead">Add category and please mention their category ID</p>
            <hr class="my-4">
            <form action="addcategory.php" method="POST">
                <div class="form-row">
                    <div class="col-7">
                        <input type="text" name="catname" class="form-control" placeholder="Category name" required >
                    </div>
                    <div class="col">
                        <input type="text" name="catid" class="form-control" placeholder="Category Id" required >
                    </div>
                    <div class="col">
                        <input type="text" name="genid" class="form-control" placeholder="Genre Id" required >
                    </div>
                </div>
                <br><br><br>
                <button class="btn btn-danger" name="submit" href="#" role="button">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php
if(isset($_POST['submit'])){
    $catname = $_POST['catname'];
    $catid = $_POST['catid'];
    $query = "INSERT INTO `category`(`category_id`, `category_name`) VALUES ($catid,'$catname')";
    $run = mysqli_query($con,$query);
    if ($run){
        echo "<script>alert('submitted');window.location.href='categorylist.php';</script>";
    }
    else{
        echo "<script>alert('not submitted');window.loaction.href='addcategory.php';</script>";
    }
    exit;
}
?>