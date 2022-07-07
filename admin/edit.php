<?php
include 'header.php';
include 'db.php';
include 'ft.php';
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * From movie where id =  $id ";
    $run = mysqli_query($con, $query);
    if ($run) {
        while ($row = mysqli_fetch_assoc($run)) {
?>

            <div class="container">
                <div class="head">
                    <br><br>
                    <h3 style="text-transform:uppercase; color:red;">Upload section of HD MOVIES HUB</h3>
                    <br><br><br>
                    <div class="jumbotron">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" value="<?php echo $row['mv_name']; ?>" name="mv_name" class="form-control" placeholder="Enter Movie Name">
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?php echo $row['meta_description']; ?>" name="mv_m_desc" class="form-control" placeholder="Enter Meta Description">
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?php echo $row['mv_tag']; ?>" name="mv_m_tag" class="form-control" placeholder="Enter Meta tags ">
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?php echo $row['link1']; ?>" name="mv_link1" class="form-control" placeholder="Enter Link 1(480p)">
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?php echo $row['link2']; ?>" name="mv_link2" class="form-control" placeholder="Enter Link 2(720p)">
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?php echo $row['link3']; ?>" name="mv_link3" class="form-control" placeholder="Enter Link 3 (1080p)">
                            </div>
                            <div class="form-group">
                                <input type="date" value="<?php echo $row['date']; ?>" name="mv_date" class="form-control" placeholder="Enter Date">
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?php echo $row['lang']; ?>" name="mv_lang" class="form-control" placeholder="Enter Movie Language">
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?php echo $row['tr_link']; ?>" name="tr_link" class="form-control" placeholder="Enter Trailer Link">
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?php echo $row['director']; ?>" name="mv_director" class="form-control" placeholder="Enter Movie Director">
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?php echo $row['cat_id']; ?>" name="cat_id" class="form-control" placeholder="Enter Category ID">
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?php echo $row['genre_id']; ?>" name="gen_id" class="form-control" placeholder="Enter Genre ID">
                            </div>
                            <div class="custom-file">
                                <input type="file" name="img" class="custom-file-input">
                                <label class="custom-file-label" for="customFile">Choose Thumbnail File</label>
                                <br><br>
                                <img src="<?php echo "../thumb/" . $row['img'] ?>" name="thumbnail" height="100px">
                                <br><br>
                            </div>
                            <br><br>
                            <div class="custom-file">
                                <input type="file" name="cimg" class="custom-file-input">
                                <label class="custom-file-label" for="customFile">Choose Cover File(images cannot be modified)</label>
                                <br><br>
                                <img src="<?php echo "../thumb/" . $row['cimg'] ?>" height="100px">
                                <br><br>
                            </div>
                            <br><br>
                            <div class="custom-file">
                                <input type="file" name="ss1" class="custom-file-input">
                                <label class="custom-file-label" for="customFile">Choose SCREENSHOT 1</label>
                                <br><br>
                                <img src="<?php echo "../thumb/" . $row['ss1'] ?>" height="100px">
                                <br><br>
                            </div>
                            <br><br>
                            <div class="custom-file">
                                <input type="file" name="ss2" class="custom-file-input">
                                <label class="custom-file-label" for="customFile">Choose SCREENSHOT 2</label>
                                <br><br>
                                <img src="<?php echo "../thumb/" . $row['ss2'] ?>" height="100px">
                                <br><br>
                            </div>
                            <br><br>
                            <div class="custom-file">
                                <input type="file" name="ss3" class="custom-file-input">
                                <label class="custom-file-label" for="customFile">Choose Cover SCREENSHOT 3</label>
                                <br><br>
                                <img src="<?php echo "../thumb/" . $row['ss3'] ?>" height="100px">
                                <br><br>
                            </div>
                            <br><br>
                            <div class="custom-file">
                                <input type="file" name="ss4" class="custom-file-input">
                                <label class="custom-file-label" for="customFile">Choose Cover SCREENSHOT 4</label>
                                <br><br>
                                <img src="<?php echo "../thumb/" . $row['ss4'] ?>" height="100px">
                                <br><br>
                            </div>
                            <br><br>
                            <div class="form-group">
                                <input type="text" value="<?php echo $row['mv_desc']; ?>" name="mv_desc" class="form-control" placeholder="Enter Movie Description" rows="4">
                            </div>
                            <br>
                            <button type="submit" name="submit" class="btn btn-outline-secondary btn-lg">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
<?php
if(isset($_POST['submit'])){
    $mv_name = $_POST['mv_name'];
    $mv_m_desc = $_POST['mv_m_desc'];
    $mv_m_tag = $_POST['mv_m_tag'];
    $mv_link1 = $_POST['mv_link1'];
    $mv_link2 =$_POST['mv_link2'];
    $mv_link3 = $_POST['mv_link3'];
    $mv_name = $_POST['mv_name'];
    $mv_lang = $_POST['mv_lang'];
    $thumb = $_POST['thumbnail'];
    $cat_id = $_POST['cat_id'];
    $gen_id = $_POST['gen_id'];
    $mv_desc = $_POST['mv_desc'];
    $mv_dir = $_POST['mv_director'];
    $tr_link =$_POST['tr_link'];
    $mv_date = date('y-m-d', strtotime($_POST['mv_date']));
    $target = "../thumb/";
    $img = $_FILES['img']['name'];
    $img_temp1 =$_FILES['img']['tmp_name'];
    $cimg = $_FILES['cimg']['name'];
    $cimg_temp2 = $_FILES['cimg']['tmp_name'];
    $ss1 = $_FILES['ss1']['name'];
    $ss1_temp3 = $_FILES['ss1']['tmp_name'];
    $ss2 = $_FILES['ss2']['name'];
    $ss2_temp4 =$_FILES['ss2']['tmp_name'];
    $ss3 = $_FILES['ss3']['name'];
    $ss3_temp5 = $_FILES['ss3']['tmp_name'];
    $ss4 =$_FILES['ss4']['name'];
    $ss4_temp6 = $_FILES['ss4']['tmp_name'];
    $data =[];
    $data =[$img,$cimg,$ss1,$ss2,$ss3,$ss4];
    $images = implode('',$data);
    $query1 = "UPDATE `movie` SET `cat_id`=$cat_id,`genre_id`= $gen_id,`mv_name`='$mv_name',`mv_desc`='$mv_desc',`mv_tag`='$mv_m_tag',`link1`='$mv_link1',`link2`='$mv_link2',`link3`='$mv_link3',`date`='$mv_date',`lang`='$mv_lang',`director`='$mv_dir',`meta_description`='$mv_m_desc',`tr_link`='$tr_link' WHERE id = $id";
    $qr = mysqli_query($con,$query1);
    if($qr){
        echo "<script>alert('Database updated successfullly');window.location.href='movielist.php';</script>";
    }
    else{
        echo "<script>alert('Something went wrong');window.location.href='edit.php';</script>";
    }

}
        }
    }
} else {
    header('location:movielist.php');
}
?>