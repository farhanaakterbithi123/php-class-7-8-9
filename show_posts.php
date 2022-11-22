<?php
include './database/eve.php';
$request = $_GET;
$id = $request['id'];
$querry = "SELECT * FROM writing_post WHERE id = $id ";
$data = mysqli_query($Connection, $querry);


$post = mysqli_fetch_assoc($data);





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>

<h2>All Posts</h2>
<nav class="navbar navbar-expand-lg bg-light">
        <?php
        if(isset($_SESSION['success'])){
            ?>

    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute;  right:100px;">
  <div class="toast-header">
    <img src="..." class="rounded me-2" alt="...">
    <strong class="me-auto">post sys</strong>
    
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    <?= $_SESSION['success'] ?> 
  </div>
</div>
<?php
        }
        ?> 
        <div class="container">
            <a class="navbar-brand" href="#">POST SYS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php">Add Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./post_details.php">All Posts</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
<div class="container mt-5">
    <h2>Show Post</h2>
    <div class="card"> 
        <div class="card-header"> 
            Post Title 
            <?=$post['title']?>
            
            
        </div>
        <div class="card-body">
            Post Detail 
            <?=$post['detail']?>
            
            
        </div>
        <div class="card-footer">
            Author name 
            <?=$post['author']?>
            
            
        </div>
    </div>
</div>




<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>