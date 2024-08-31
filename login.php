<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>

<body>
    <?php
     session_start();
     if (isset($_SESSION['email'])) {
         header("location: welcom.php");
    }
    include 'connection.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // $showAlert = false;
        // $showError=false;   
 

        $email_number = $_POST['number_email'];
        $password = $_POST['password'];
        // $email_number = $_POST['number_email'];


         $sql = "SELECT * FROM `user` WHERE  email='$email_number' OR phonenumber='$email_number' AND password='$password'"; 
        
        // $sql = "SELECT * FROM `user` WHERE email='$email' ";

         $result = mysqli_query($con, $sql);
       
        if (mysqli_num_rows($result)>0) {
            while($row=mysqli_fetch_assoc($result)){
                $_SESSION['email'] = $email_number;
                //  $_SESSION['phonenumber'] = $email_number;
                 $_SESSION['password'] = $password;
            header("location:welcom.php");
            }
               
        } else {
            echo 'something wrong';
        }
    }




    ?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/loginsystem>isecure"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="login.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="login.php">login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container ">
        <div class="row mt-4 justify-content-center">
            <h1 class="text-center">login website</h1>
        </div>
        <form action="" method="post">
            <div class="row mt-5 justify-content-center">
                <!-- <div class="col-md-3"></div> -->
                <div class="col-md-6">
                    <label for="exampleInputEmail1" class="form-label">Email address or phonenumber</label>
                    <input type="text" class="form-control" name="number_email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email/number" required>

                </div>
            </div>
            <div class="row mt-2 justify-content-center">
                <!-- <div class="col-md-3"></div> -->
                <div class="col-md-6">
                    <label for="exampleInputEmail1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your password" required>
                </div>
            </div>
            <div class="row mt-4 justify-content-center">
                <div class="col-md-5"></div>
                <div class="col-md-6">
                    <button class="btn btn-primary">Login</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>