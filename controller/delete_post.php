<?php
session_start();
include_once '../database/eve.php';
$id = $_GET['id'];
$querry = "DELETE FROM writing_post WHERE id = $id";
$result = mysqli_query($Connection, $querry);


if($result){
    $_SESSION['success'] = 'post deleted';
    header("location: ../post_details.php");

} else{
  echo "noo";
}