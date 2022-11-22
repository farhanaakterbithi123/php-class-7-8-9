<?php
session_start();
  include '../database/eve.php';
if (isset($_POST['submit'])) {
    //* ERRORS ARRAY
    $errors = [];

    //* REQUEST
    $request = $_POST;
    $title = $request['title'];
    $detail = $request['detail'];
    $author = $request['author'];

    



    if (empty($title)) {
        $msg =  "where is title?";
        $errors['title'] = $msg;
    } elseif (strlen($title) > 100) {
        $msg =  "no space";
        $errors['title'] = $msg;
    }
    if (empty($detail)) {
        $msg =  "where is detail?";
        $errors['detail'] = $msg;
    }

    if(empty($author)){
        $author = 'rose';
    }
    

    if (count($errors) > 0) {

        //*HEADER REDIRECTION
        $_SESSION['errors'] = $errors;
        $_SESSION['old_data'] = $request;
        header("Location: ../index.php");
    } else {
        $query = "INSERT INTO writing_post(title, detail, author) VALUES ('$title', '$detail', '$author')";

        $store = mysqli_query($Connection, $query);

        if($store){
            header("location: ../index.php");
            $_SESSION['success'] = " post added perfectly";
        } else{
            echo "not found";
        }

         
    }

} else{
    echo "submit please";
}

