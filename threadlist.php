<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
    #ques {
        min-height: 433px;
    }
    </style>
</head>

<body>
    <?php include 'partials/_header.php'?>
    <?php include 'partials/_dbconnect.php'?>



    <?php
    $id=$_GET['catid'];
    $sql="SELECT * FROM `categories` WHERE category_id=$id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $catname=$row['category_name'];
        $catdesc=$row['category_description'];
    }
    ?>

    <?php
    // $method=$_SERVER['REQUEST_METHOD'];
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $th_title=$_POST['title'];
        $th_desc=$_POST['desc'];
        $sql="INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '0', current_timestamp())";
        $result=mysqli_query($conn,$sql);
        $showAlert=true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    ?>

    <div class="container my-3">
        <!-- <h2 class="text_center">Welcome to <?php echo $catname;?> forums</h2> -->
        <div class="container">
            <div class="jumbotron">
                <h1 class="display-4"><?php echo $catname;?></h1>
                <p class="lead"><?php echo $catdesc; ?></p>
                <hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.
                </p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </div>
        </div>
        <div class="container">
            <h1>Start a Discussion</h1>
            <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1"  class="form-label">Problem Title</label>
                    <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text">Keep your title as short and crips as possible.</small>
                </div>
                <div class="form-group">
                    <label for="desc">Elaborate your concern</label>
                    <textarea id="desc" rows="3" name="desc" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="container" id="ques">

            <?php
            $id=$_GET['catid'];
            $sql="SELECT * FROM `threads` WHERE thread_cat_id=$id";
            $result=mysqli_query($conn,$sql);
            $noResult=true;
            while($row=mysqli_fetch_assoc($result)){
                $noResult=false;
                $cid=$row['thread_id'];
                $title=$row['thread_title'];
                $desc=$row['thread_desc'];

                echo '<div class="media my-3">
                <img src="images/users.png" class="mr-3" width="50px" alt="...">
                <div class="media-body">
                    <h5 class="mt-0"><a class="text-dark" href="thread.php?threadid='.$id.'">'.$title.'</h5>
                    <p>'.$desc.'</p>
                </div>
                </div>';
            }
            if($noResult){
                echo '<div class="jumbotron jumbotron-fluid">
                <div class="container">
                <p class="display-5">No Threads Found</p>
                <p class="lead">Be the first person to ask this question</p>
                </div>
                </div>';
            }
            ?>


           



        </div>



        <?php include 'partials/_footer.php'?>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
        </script>
</body>

</html>