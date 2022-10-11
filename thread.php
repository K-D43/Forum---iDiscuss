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




   <!-- php for thread insertion and display -->

<!-- php for thread title insertion -->

    
    <!-- end -->

<!-- php for thread title display -->

    <?php
    $id=$_GET['threadid'];
    $sql="SELECT * FROM `threads` WHERE thread_id=$id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $th_title=$row['thread_title'];
        $th_desc=$row['thread_desc'];
    }
    ?>
    <!-- end -->

    <?php
    // $method=$_SERVER['REQUEST_METHOD'];
    $showAlert=false;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $cid=$_POST['thread_id'];
        $comment=$_POST['comment'];
        $sql="INSERT INTO `comments` (`comment_comment`, `thread_id`, `comment_by`, `timestamp`) VALUES ('$comment','$cid', '0', current_timestamp())";
        $result=mysqli_query($conn,$sql);
        
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>'.$th_title.'</strong> is your title, you can look about it below.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    ?>

    <!-- php for comments display -->



    <div class="container my-3">
        <div class="container">
            <div class="jumbotron">
                <h1 class="display-4"><?php echo $th_title;?></h1>
                <p class="lead"><?php echo $th_desc;?></p>
                <hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.
                </p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </div>
        </div>
        <div class="container">
            <h1>Start a Discussion</h1>
            <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Enter your valuable comment about above thread.</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" rows="3" placeholder="Start your Comment..."></textarea>
                    <button class="btn btn-success" type="submit">Post Comment</button>
                </div>
            </form>
        </div>
        <div class="container" id="ques">
            <?php
            $id=$_GET['threadid'];
            $sql="SELECT * FROM `comments` WHERE thread_id=$id";
            $result=mysqli_query($conn,$sql);
            $noResult=true;
            while($row=mysqli_fetch_assoc($result)){
                $noResult=false;
                $id=$row['thread_id'];
                $commentby=$row['comment_by'];
                $desc=$row['comment_comment'];

                echo '<div class="media my-3">
                <img src="images/users.png" class="mr-3" width="50px" alt="...">
                <div class="media-body">
                    <h5 class="mt-0"><a class="text-dark" href="thread.php?threadid='.$id.'">'.$commentby.'</h5>
                    <p>'.$desc.'</p>
                </div>
                </div>';
            }
            if($noResult){
                echo '<div class="jumbotron jumbotron-fluid">
                <div class="container">
                <p class="display-5">No Comment Found</p>
                <p class="lead">Be the first person to ask this question</p>
                </div>
                </div>';
            }
            ?>






        </div>
    </div>
    


        <?php include 'partials/_footer.php'?>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
        </script>
</body>

</html>