<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
      #ques{
        min-height:433px;
      }
    </style>
  </head>
  <body>
    <?php include 'partials/_header.php'?>
    <?php include 'partials/_dbconnect.php'?>
    
    <!-- slider starts here -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img height="300vh"src="images/download.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/download(1).jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/download(1).jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
    </div>
    <!-- category container starts here -->
    <div class="container my-4" id="ques">
      <h2 class="text_center">i Discuss- Category</h2>
      <div class="row ">
      
      <!-- fetch all the categories  -->
      <?php
        $sql="SELECT * FROM `categories`";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
          // echo $row['category_id'];
          // echo $row['category_name'];
          $id=$row['category_id'];
          $desc=$row['category_description'];
          echo '<div class="col-md-4 my-2">
          <div class="card" style="width: 15rem;">
          <img src="images/download.jpg" class="card-img-top" alt="...">
          <div class="card-body">
          <h5 class="card-title"><a href="/threadlist.php?catid='.$id.'">'.$row['category_name'].'</a></h5>
          <p class="card-text">'.substr($desc,0,90).'...</p>
          <a href="threadlist.php?catid='.$id.'" class="btn btn-primary">View Threads</a>
          <a></a>
          </div>
          </div>
          </div>';

        }      
      
      
      ?>
    </div>
    
    
    <?php include 'partials/_footer.php'?>  
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>