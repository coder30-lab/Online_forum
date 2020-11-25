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
    #maincontainer {
        min-height: 100vh;
    }
    </style>

    <title>Welcome to iDiscuss discussion forum</title>
</head>

<body>
    <?php
  include 'partials/_dbconnect.php';
  include 'partials/_header.php';
   ?>


    <!-- Search result section -->

    <div class="container my-3 " id="maincontainer">
        <h5 py-3>Search result for <em>"<?php echo $_GET['query']?>"</em></h5>
        <?php
        $query=$_GET['query'];
        $sql="SELECT * FROM `threads` where MATCH(thread_title,thread_desc)against('$query')";
        $result=mysqli_query($conn,$sql);
        $noresult=true;
        while($row=mysqli_fetch_assoc($result)){
            
            $noresult=false;
            $th_title=$row['thread_title'];
            $th_desc=$row['thread_desc'];
            $threadid=$row['thread_id'];
            $url="thread.php?threadid=$threadid";
            echo '<div class="result">
            <h3><em><a href="'.$url.'" class="text-dark">'.$th_title.'</a></em></h3>
            <p>'.$th_desc.'</p>
            </div>';
        }
        if($noresult){
            echo '<div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <p class="display-4">Your search - '.$_GET["query"].' - did not match any documents. </p><ul>
                    <p class="lead">Suggestions:

                   <li> Make sure that all words are spelled correctly.</li>
                   <li>Try different keywords.</li>
                   <li>Try more general keywords.</li>
                   </ul></p>
                </div>     
                </div>';
        }

   ?>


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