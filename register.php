<?php

include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $username = $_POST['username'];
    $email = $_POST['email'];
    $number = $_POST['phonenumber'];
    $language = isset($_POST['language']) && is_array($_POST['language']) ? $_POST['language'] : [];
    $ch = implode(",", $language);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    // $exitst=false;
    // check the wether username exits
    $sql = "SELECT email,phonenumber from user where email='$email' AND phonenumber='$number' ";

    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo ('User Already Exist');
    } else {


        if (($password == $cpassword)) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user`(`username`,`email`,`phonenumber`,`language`,`password`,`cpassword`)VALUES('$username','$email','$number','$ch','$hash','$hash')";

            $result = mysqli_query($con, $sql);

            if ($result) {
                echo ('Record Inserted Succesfully..');
            } else {
                die(mysqli_error($con));
            }
        } else {
            echo ('Password Do Not Match or user name already Exitst');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg  navbar-light text text-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand " href="#">php crud</a>
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
                        <a class="nav-link" href="register.php">Register</a>


                </ul>

            </div>
        </div>

    </nav>
    <div class="container mt-5">
        <h1 class="text-center">Register</h1>
        <form  id="registrationForm" action="" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Enter your name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">  
                <p id="message"></p>
                <!-- <datalist id="email-extensions">
                    <option value="gmail.com">
                    <option value="yahoo.com">
                    </option>
                </datalist> -->


            </div>
            <div class="mb-3">
                <label for="phonenumber" class="form-label">Phone number</label>
                <input type="text" name="phonenumber" id="phonenumber" class="form-control" placeholder="Enter your phone number" maxlength="10">
            </div>
            <div class="mb-3">
                <label>Language:</label><br>
                <input type="checkbox" name="language[]" value="English"> English
                <input type="checkbox" name="language[]" value="Hindi"> Hindi
                <input type="checkbox" name="language[]" value="Gujarati"> Gujarati
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm your password">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $("#registrationForm").validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 2
                    },
                    email: {
                        required: true,
                        email: true,

                    },
                    phonenumber: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    cpassword: {
                        required: true,
                        minlength: 6,
                        equalTo: "#password"
                    }
                },
                messages: {
                    username: {
                        required: "Please enter your name",
                        minlength: "Your name must consist of at least 2 characters"
                    },
                    email: {
                        required: "Please enter your email address", 
                        email: "Please enter a valid email address"
                    },
                    phonenumber: {
                        required: "Please enter your phone number",
                        digits: "Please enter a valid phone number",
                        minlength: "Phone number must be 10 digits",
                        maxlength: "Phone number must be 10 digits"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long"
                    },
                    cpassword: {
                        required: "Please confirm your password",
                        minlength: "Your confirmation password must be at least 6 characters long",
                        equalTo: "Passwords do not match"
                    }
                }
            });
        });    
        
        // document.getElementById('registrationForm').addEventListener('submit', function(event) {
        //     event.preventDefault(); // Prevent form submission
            
        //     var emailInput = document.getElementById('email').value;
        //     var messageElement = document.getElementById('message');
            
        //     // Regular expression for basic email validation
        //     var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        //     // Array of allowed domain extensions
        //     var allowedExtensions = ['com'];
            
        //     // Function to get the domain extension from the email
        //     function getDomainExtension(email) {
        //         var parts = email.split('.');
        //         return parts.length > 1 ? parts.pop().toLowerCase() : '';
        //     }
            
        //     // Validate email
        //     if (emailPattern.test(emailInput)) {
        //         var domainExtension = getDomainExtension(emailInput);
                
        //         if (allowedExtensions.includes(domainExtension)) {
        //             messageElement.textContent = 'Email is valid and has an allowed domain extension.';
        //             messageElement.style.color = 'green';
        //         } 
        //         else {
        //             messageElement.textContent = 'Invalid domain extension. Allowed extensions are: ' + allowedExtensions.join(', ');
        //             messageElement.style.color = 'red';
        //         }
        //     } else {
        //         messageElement.textContent = 'Invalid email address format.';
        //         messageElement.style.color = 'red';
        //     }
        // });
   
    </script>
</body>

</html>