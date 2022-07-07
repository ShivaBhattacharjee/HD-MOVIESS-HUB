<?php
include 'db.php';
if(isset($_POST['submit'])){
    $mv_name = $_POST['mv_name'];
    $mv_m_desc = $_POST['mv_m_desc'];
    $mv_m_tag = $_POST['mv_m_tag'];
    $mv_link1 = $_POST['mv_link1'];
    $mv_link2 =$_POST['mv_link2'];
    $mv_link3 = $_POST['mv_link3'];
    $mv_name = $_POST['mv_name'];
    $mv_lang = $_POST['mv_lang'];
    $cat_id = $_POST['cat_id'];
    $gen_id = $_POST['gen_id'];
    $mv_desc = $_POST['mv_desc'];
    $mv_dir = $_POST['mv_director'];
    $tr_link =$_POST['tr_link'];
    $mv_date = date('y-m-d', strtotime($_POST['mv_date']));
    $target = "../images/";
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
    $query = "INSERT INTO `movie`(`cat_id`, `genre_id`, `mv_name`, `mv_desc`, `mv_tag`, `link1`, `link2`, `link3`, `img`, `date`, `lang`, `director`, `meta_description`, `cimg`, `ss1`, `ss2`, `ss3`, `ss4`, `tr_link`) VALUES ($cat_id,$gen_id,'$mv_name','$mv_desc','$mv_m_tag','$mv_link1','$mv_link2','$mv_link3','$img','$mv_date','$mv_lang','$mv_dir','$mv_m_desc','$cimg','$ss1','$ss2','$ss3','$ss4','$tr_link')";
    $run = mysqli_query($con,$query);
    if($run){
        move_uploaded_file($img_temp1, $target.$img);
        move_uploaded_file($cimg_temp2, $target.$cimg);
        move_uploaded_file($ss1_temp3, $target.$ss1);
        move_uploaded_file($ss2_temp4, $target.$ss2);
        move_uploaded_file($ss3_temp5, $target.$ss3);
        move_uploaded_file($ss4_temp6, $target.$ss4);
        echo "<script>alert('Movie Uploaded');window.location.href='movielist.php';</script>";
    }
    else{
        echo "<script>alert('Something went wrong');window.location.href='addmovie.php';</script>";
    }
}
?>