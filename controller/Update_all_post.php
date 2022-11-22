<?php
session_start();
include '../database/eve.php';

if (isset($_POST['submit'])) {
    $id = $_POST['PostId'];
    $title = $_POST['title'];
    $detail = $_POST['detail'];
    $author = $_POST['author'];
    //*ERRORS
    $errors = [];

    if (empty($title)) {
        $errors['title'] = "insert title";
    }

    if (empty($detail)) {
        $errors['detail'] = "insert detail";
    }
    if (empty($author)) {
        $errors['author'] = "insert author";
    }

    if (count($errors) == 0) {
        
        $querry = "UPDATE writing_post SET
        title='$title',
         detail='$detail',
          author='$author'
          where id= $id ";


      $update =mysqli_query($Connection, $querry);
$_SESSION['success'] = "post updated perfectly";
      header('location: ../post_details.php');
        

    } else {
        //*REDIRECTION
        $_SESSION['errors'] = $errors;
        header("location: ../edit_all_post.php?id=$id");
    }
}
