<?php
include('connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $cat_name = $_POST['catagoryname'] ;
  $cat_desc = $_POST['catagorydiscription'] ;
  $cat_date = $_POST['date'] ;
  $filename = $_FILES["fileimg"]["name"];
  $tempname = $_FILES["fileimg"]["tmp_name"];
  $folder = "images/".$filename;
  $sql = "INSERT INTO `category` (`catagory_name`, `catagory_discription`, `created`, `img`) VALUES ( '$cat_name', '$cat_desc', '$cat_date', ' $folder');";
  $result = mysqli_query($con, $sql);
  if (move_uploaded_file($tempname, $folder)) {
    echo "<h3>  Image uploaded successfully!</h3>";
    } else 
    {
    echo "<h3>  Failed to upload image!</h3>";
    }
}


?>