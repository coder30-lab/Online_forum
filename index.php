<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style>
  body {
    min-height: 100vh;
  }
  </style>
  <title>Welcome to iDiscuss forum</title>
</head>

<body>
  <?php
  include 'partials/_dbconnect.php';
  include 'partials/_header.php';
  

   ?>

  <!-- slider satrt here -->

  <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-interval="500">
        <img src="https://source.unsplash.com/2400x700/?office,laptop" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-interval="500">
        <img src="https://source.unsplash.com/2400x700/?office,code" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://source.unsplash.com/2400x700/?office,microsoft" class="d-block w-100" alt="Loading Images">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- categories starts here -->
  <div class="container" id="ques">
    <h2 class="text-center my-4">iDiscuss - Browse Categories</h2>
    <div class="row my-4">

      <!-- fetch all categories from categories table using for loop -->
      <!-- // https://source.unsplash.com/300x300/?'. $cat. ',programming can put in src  -->


      <?php 
            $sql="SELECT * FROM `categories`";
            $result=mysqli_query($conn,$sql);

            

            while($row=mysqli_fetch_assoc($result)){
                
                $id= $row['category_id'];
                $cat= $row['Category_name'];
            $cat_desc= $row['category_description'];
                echo '<div class="col-md-4 my-2">
                <div class="card" style="width: 18rem;">


               
                    <img src=img/'. $cat. '.jpg " class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><a href="threadlist.php?catid='. $id. '">'. $cat. '</a></h5>
                        <p class="card-text">'. substr($cat_desc,0,100). '......</p>
                        <a href="threadlist.php?catid='. $id. '" class="btn btn-primary">view Threads</a>
                    </div>
                </div>
            </div> ';

            }

            
            ?>



    </div>

  </div>
  <?php
       
       include 'partials/_footer.php';

       ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
</body>

</html>