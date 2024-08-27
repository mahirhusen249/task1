<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>crud 1</title>
</head>

<body>
  <?php   
   
  include 'connection.php';    
  if($_SERVER["REQUEST_METHOD"]=="POST"){
  $showAlert = false;
  $showError=false;
  
    $username = $_POST['username'];
    $email = $_POST['email'];   
    $language = $_POST['language'];
    $ch=implode(",",$language);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    
    if(($password==$cpassword)){   
      $sql = "INSERT INTO `user`(`username`,`email`,`language`,`password`,`cpassword`)VALUES('$username','$email','$ch','$password','$cpassword')";

      $result = mysqli_query($con, $sql);
  
      if ($result) {
        $showAlert = 'Record Inserted Succesfully..';
      } else {
        die(mysqli_error($con));
      }
    }
    else{
          $showError='Password Do Not Match';
    }

   
  }

 
  ?>
  <nav class="navbar navbar-expand-lg  navbar-light text text-light bg-light">
<?php
 if ($showAlert) {
  echo '
<div class="alert alert-success col-lg-5 d-flex" role="alert">
<h4 class="alert-heading">success</h4>
<p> ' . $showAlert . ' </p>
<hr>
      
</div>';
}

if ($showError) {
  echo '
<div class="alert alert-success d-flex col-lg-5" role="alert">
<h4 class="alert-heading">Unsuccess</h4>
<p> ' . $showError . ' </p>
<hr>
      
</div>';
}
?>
    <div class="container-fluid">
      <a class="navbar-brand" href="#">php crud</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>   
          <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="login.php">login</a>
                    </li>
          <li class="nav-item">
            <a class="nav-link" href="signup.php">sign up</a>
            <!-- </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a> -->
            <!-- <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li> -->

        </ul>
        <!-- <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
      </div>
    </div>
  </nav>
  <div class="container m-5">
    <form action="" method="POST">

      <div class="mb-3 col-lg-6">
        <label for="exampleInputEmail1" class="form-label">user name</label>
        <input type="username" name="username" class="form-control" id="exampleusername" aria-describedby="emailHelp" placeholder="Enter your name"required>
        <div id="user name" class="form-text"> <br></div>
      </div>
      <div class="mb-3 col-lg-6">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  placeholder="Enter your email"required>
        <div id="emailHelp" class="form-text"> <br></div>
      </div>
      <div class="mb-3 col-lg-6">    
    language : <input type="checkbox" name="language[]" value="English"> English 
        <input type="checkbox" value="hindi" name="language[]" >Hindi
        <input type="checkbox" value="Gujarati" name="language[]">Gujarati
    </div> 
      <div class="mb-3 col-lg-6">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1"  placeholder="Enter password"required>
      </div>

      <div class="mb-3 col-lg-6">
        <label for="exampleInputPassword1" class="form-label">confirm Password</label>
        <input type="confirmpassword" name="cpassword" class="form-control" id="exampleInputconfirmPassword2" placeholder="Enter your confirmpassword"required>
      </div> 
        
       



      <!-- <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>  -->

      <div class="mb-3 col-lg-6">
        <button type="submit" name="register" class="btn btn-primary form-control">Register</button>
    </form>
  </div>
</body>

</html>