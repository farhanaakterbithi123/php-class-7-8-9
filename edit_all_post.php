<?php
session_start();
include './database/eve.php';
$id = $_GET['id'];
$querry = "SELECT * FROM writing_post WHERE id = $id";
$result = mysqli_query($Connection, $querry);
$posts = mysqli_fetch_assoc($result);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        
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

    <div class="container">
        <div class="col-6 mx-auto mt-5">

            <div class="card">
                <div class="card-header">
                    <strong>Edit Post</strong>
                </div>
                <div class="card-body">
                    <form action="./controller/Update_all_post.php" method="POST">
                        <input type="hidden" name="PostId" value="<?= $posts['id']?>">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Post Title</label>
                            <input value="<?=$posts['title']?>" type="text" name="title" class="form-control" id="exampleInputEmail1">
                            <?php
                            if (isset($_SESSION['errors']['title'])) {
                            ?>
                                <span class="text-danger">
                                    <?php

                                    echo $_SESSION['errors']['title']
                                    ?>
                                </span>
                            <?php
                            }
                            ?>

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Post Detail</label>
                            <textarea name="detail" class="form-control"><?=$posts['detail'] ?></textarea>
                            <?php
                            if (isset($_SESSION['errors']['detail'])) {
                            ?>
                                <span class="text-danger">
                                    <?php

                                    echo $_SESSION['errors']['detail']
                                    ?>
                                </span>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label">Author Name</label>
                            <input type="text" name="author" class="form-control" id="author" value="<?= $posts['author'] ?>">
                            <?php
                            if (isset($_SESSION['errors']['author'])) {
                            ?>
                                <span class="text-danger">
                                    <?php

                                    echo $_SESSION['errors']['author']
                                    ?>
                                </span>
                            <?php
                            }
                            ?>
                        </div>
                        <button type="submit" name="submit" value="submited" class="btn btn-primary w-100">Update</button>

                    </form>
                </div>
            </div>


        </div>
    </div>



    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>


<?php

session_unset();

?>
