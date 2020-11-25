<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="partials/style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Coding-Coding Discussion discussion forum</title>

</head>

<body>
    <?php
  include 'partials/_dbconnect.php';
include 'partials/_header.php';

   ?>

    <?php
    $id=$_GET['threadid'];
   $sql="SELECT * FROM `threads` WHERE `thread_id`=$id";
   $result=mysqli_query($conn,$sql);

      while($row=mysqli_fetch_assoc($result)){

    $noResultFound=false;
    $title=$row['thread_title'];
    $desc=$row['thread_desc'];
    $thread_user_id=$row['thread_user_id'];


    //Query  the users table to find out the  name of OP
    $sql2="SELECT user_email FROM `users` WHERE sno=' $thread_user_id'";
            $result2=mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_assoc($result2);
            $posted_by=$row2['user_email'];

}

   ?>


    <!-- //storing   comment in comments db -->
    <?php
        $showalert=false;
        $method=$_SERVER['REQUEST_METHOD'];
        if($method=='POST'){
        $comment=$_POST['comment'];

        $comment=str_replace("<","&lt",$comment);
        $comment=str_replace(">","&gt",$comment);
        $sno=$_POST['sno'];  //add comment id
        //Insert into database
        $sql="INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$sno', current_timestamp())";
        $result=mysqli_query($conn,$sql);
        $showalert=true;
        if($showalert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>success!</strong> your comment is submitted.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        
    }

    //show alert if query is submiited succesfully

    
?>

    <!-- categories starts here -->
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $title; ?></h1>
            <p class="lead"><?php echo $desc; ?></p>
            <hr class="my-4">
            <p>This is peer to peer forum .<br>
                No Spam / Advertising/Self-promote in<br>
                the forums. ...<br>
                Do not post “offensive” posts, links or images. ...<br>
                Do not cross post questions. ...<br>
                Remain respectful of other members at all times.</p>
            <p>Posted by <b><em><?php echo $posted_by;?></em></b></p>
        </div>
    </div>

    <!-- form for posting comment related to a query -->

    <?php
//If a user is logged in then can post comment
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
echo '
<div class="container">
    <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Post a comment</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">
        </div>
        <button type="submit" class="btn btn-success">post comment</button>
    </form>
</div>
';
}
else{
echo '<div class="container">
<p class="py-2">Post a comment</p>
<p class="lead text-primary">You are not logged In Please login first to Post a comment</p>
</div>';
}
?>


    <div class="container mb-5" id="ques">

        <!-- using media object for browse category -->
        <h1 class="py-2">Discussions :</h1>
        <!-- listing threads from database  -->


        <?php 
            $id=$_GET['threadid'];

            $sql="SELECT * FROM `comments` WHERE thread_id =$id";
            $result=mysqli_query($conn,$sql);
            $noResultFound=true;                            //if no result is fount

            while($row=mysqli_fetch_assoc($result)){
                $noResultFound=false;                      //if  result is found

            $id= $row['comment_id'];
            $comment= $row['comment_content'];              
            $comment_time=$row['comment_time'];
            //changing from annonymus user to  actual name
            $thread_user_id=$row['comment_by'];
            $sql2="SELECT user_email FROM `users` WHERE sno=' $thread_user_id'";
            $result2=mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_assoc($result2);
    
            echo '<div class="media">
            <img src="img/userDefault.png" width="40px" class="mr-3" alt="...">
            <div class="media-body">

            <p class="font-weight-bold my-0">'.$row2['user_email'] .' at '.$comment_time.' </p>
                '.$comment.'
            </div>
        </div> ';
            }//closing of while

        if($noResultFound)
        {
        echo '<div   class="jumbotron jumbotron-fluid">
            <div class="container">
                <p class="display-4">No comments yet</p>
                <p class="lead">Be the first to answer.</p>
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