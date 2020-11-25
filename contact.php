<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



  </style>
  <title>Coding Discussion forum</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <style>
  .contact {
    position: relative;
    min-height: 85vh;
    padding: 50px 100px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background: linear-gradient(rgba(0, 0, 0, 0.5),
        rgba(0, 0, 0, 0.5)), url(img/bg.jpg);
    background-size: cover;
  }

  .contact.content {
    max-width: 800px;
    text-align: center;

  }

  .contact .content h2 {
    text-decoration: underline;
    text-decoration-color: red;
    text-align: center;
    font-size: 36px;
    font-weight: 500;
    color: #fff;
  }



  .contact .content p {
    font-weight: 300px;
    font-color: #fff;

  }

  .container {

    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 30px;
    margin-right: 30px;
  }

  .container .contactInfo {
    width: 50%;
    display: flex;
    flex-direction: column;


  }

  .container .contactInfo .box {
    position: relative;
    padding: 10px 0;
    display: flex;
  }

  .container .contactInfo .box .icon {
    min-width: 60px;
    height: 60px;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    font-size: 22px;
  }

  .container .contactInfo .box .text {
    display: flex;
    margin-left: 20px;
    font-size: 20px;
    color: #fff;
    flex-direction: column;
    font-weight: 300;

  }

  .container .contactInfo .box .text h4 {
    text-decoration: underline;
    font-weight: 500;
    color: #00bcd4;
  }

  .contactForm {
    width: 60%;
    padding: 40px;
    background: #fff;
    margin-left: 40px;

  }

  .contactForm h2 {
    font-size: 30px;
    color: #333;
    font-weight: 500;
  }

  .contactForm .inputBox {
    position: relative;
    width: 100%;
    margin-top: 10px;
  }

  .contactForm .inputBox input,
  .contactForm .inputBox textarea {
    width: 100%;
    padding: 5px 0;
    font-size: 16px;
    margin: 10px 0;
    border: none;
    border-bottom: 2px solid #333;
    outline: none;
    resize: none;

  }

  .contactForm .inputBox span {
    position: absolute;
    left: 0;
    padding: 5px 0;
    font-size: 16px;
    margin: 10px 0;
    pointer-events: none;
    transition: 0.5s;
    color: #666;

  }

  .contactForm .inputBox input:focus~span,
  .contactForm .inputBox input:valid~span,
  .contactForm .inputBox textarea:focus~span,
  .contactForm .inputBox textarea:valid~span {
    color: #e91e63;
    font-size: 12px;
    transform: translateX(-20px; )
  }

  .contactForm .inputBox input[type="submit"] {
    width: 100px;
    background: #00bcd4;
    color: #fff;
    border: none;
    cursor: pointer;
    padding: 10px;
    font-size: 18px;

  }

  @media(max-width:991px) {
    .contact {
      padding: 50px;
    }

    .container {
      flex-direction: column;
    }

    .container .contactInfo {
      margin-bottom: 40px;
    }

    .container .contactInfo {
      width: 100%;
    }
  }
  </style>

</head>

<body>
  <?php
  include 'partials/_dbconnect.php';
  include 'partials/_header.php';
   ?>
  <section class="contact">
    <div class="content">
      <h2 class="text-center">Contact us</h2>

      <div class="container">
        <div class="contactInfo">
          <div class="box">
            <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
            <div class="text">
              <h4>Address</h4>
              <p>Paud Road<br>RamBaugh Colony<br>Pune,Maharastra.
            </div>
          </div>

          <div class="box">
            <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
            <div class="text">
              <h4>Email</h4>
              <p>iDiscuss12@gmail.com</p>
            </div>
          </div>

          <div class="box">
            <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
            <div class="text">
              <h4>Phone</h4>
              <p>123-456-7899</p>
            </div>
          </div>
        </div>

        <div class="contactForm">

          <form>
            <!-- <h2>Send Message!</h2> -->
            <h3>Send Messsage</h3>
            <div class="inputBox">
              <input type="text" name="name" required="required">
              <span>Full Name</span>
            </div>

            <div class="inputBox">
              <input type="text" name="email" required="required">
              <span>Email</span>
            </div>

            <div class="inputBox">
              <textarea name="message" required="required"></textarea>
              <span>Type your message...</span>
            </div>

            <div class="inputBox">
              <input type="submit" name="send" value="Send">
            </div>


          </form>
        </div>
      </div>
  </section>
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
<?php       
       include 'partials/_footer.php';
   ?>

</html>