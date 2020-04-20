<?php

$error = "";
$successMessage = "";

if ($_POST) {

  

  if(!$_POST["email"]) {
    $error.="An email address is required.<br>";
  }

  if(!$_POST["subject"]) {
    $error.="Subject Field is required.<br>";
  }

  if(!$_POST["content"]) {
    $error.="Content Field is required.<br>";
  }

  if ($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
  
    $error.="The email address is invalid.<br>";
  }

  if ($error != "") {
  
    $error = '<div class="alert alert-danger" role="alert"><p><strong>Their were error(s) in your form</strong></p>'.$error.
  '</div>';
  } else {
    $emailTo = $_POST['email'];
    $subject = $_POST['subject'];
    $content = $_POST['content'];
    $headers = "From: ".$_POST['email'];
    if (mail($emailTo, $subject, $content, $headers)) {
      $successMessage = '<div class="alert alert-success" role="alert"><p><strong>Your message is sent. We will get back to you!</strong></p>'.$error.
      '</div>';
    } else {
      $error = '<div class="alert alert-danger" role="alert"><p><strong>Your message could not be send, please try again.</strong></p>'.$error.
      '</div>';
    }
  }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GoEGo</title>
  <link rel="stylesheet" href="./css/styles.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4">Discover the world through our mobility and travel platform!</h1>
      <p class="lead">GO-E-GO is a new startup company delivering professional transfer services with knowledgable
        drivers. All powered through efficient platform.
        More GO-E-GO only is all about sustainable touris, focusing on local authentic and eco friendly transportation.
      </p>
      <hr class="my-4">

      <div id="carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./images/driver1.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./images/driver2.png" class="d-block w-100" alt="...">
          </div>
        </div>
      </div>

      <p>Do you want to rank GoEGo as a local driver/guide, please sign up!</p>

      <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>

    </div>
  </div>

  <div class="container">
    <div class="card" style="width: 18rem;">
      <img src="./images/Driver3.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Not Just Another Marketplace</h5>
        <p class="card-text">GoEGo aims is to provide professional services with qualitative and licensed enthousiasts
        </p>
      </div>

      <div class="card" style="width: 18rem;">
        <img src="./images/driverguide.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Hidden Gems</h5>
          <p class="card-text">Not only aiming for the most popular highlights, but showing hidden gems in each
            destination.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>

      <div class="card" style="width: 18rem;">
        <img src="./images/egoApp.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Transport & Guiding</h5>
          <p class="card-text">Comfortable mode to discover your destination with small groups</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>


        <form method="post">
          <fieldset class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your email">
            <small class="text-muted">We'll never share your email with anyone else.</small>
          </fieldset>
          <fieldset class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" name="subject" id="subject">
          </fieldset>
          <fieldset class="form-group">
            <label for="content">What would you like to ask us</label>
            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
          </fieldset>
          <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>

      </div>

      <div id="error"><?php echo $error.$successMessage; ?></div>

      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
      </script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
      </script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
      </script>

      <script type="text/javascript">
        $('.carousel').carousel('cycle');

        //not refreshing the page
        $("form").submit(function (e) {
         


          //we set validation by defining error variable which is empty
          var error = '';

          if ($("#email").val() == '') {
            error += "The Email field is required.<br>";
          }

          if ($("#subject").val() == '') {
            error += "The subject field is required.<br>";
          }

          if ($("#content").val() == '') {
            error += "The content field is required.";
          }

          if (error != '') {
            $('#error').html(
              '<div class="alert alert-danger" role="alert"><p><strong>Their were error(s) in your form</strong></p>' +
              error + '</div>');

              return false;

          } else {
            return true;
          }
        });
      </script>

</body>

</html>