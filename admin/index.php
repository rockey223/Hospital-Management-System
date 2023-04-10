<?php
session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" href="../assets/img/logo.png">

</head>
<body>
    
    <!-- top bar -->
    <div class="container-fluid">
        

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-1">
                        <a href="#" class="navbar-brands text-decoration-none mb-0 h1" > 
                    <img src="../assets/img/logo.png" alt="Logo">    
                </a>
                    </div>
                    <div class="col-lg-10 col-md-6 col-sm-6 col-xs-11 d-md-inline">
                        <h3 class="d-inline">Nepal health Association</h3>
               <h5>Making you Healthy</h5>
                    </div>
                </div> 
                <div class="d-inline">
                    
                </div>
               
            </div>
            <div class="col-xs-0 col-sm-0 col-md-0 col-lg-6 d-none d-lg-block">
                <h5> Contact No.: +977-1234567</h5>
                <h5>Address: Kathmandu, Nepal</h5>
                <div class="row">
                    <div class="col-3 d-flex justify-content-evenly">
                        <a href="" class="text-decoration-none link-primary h3">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="" class="text-decoration-none link-primary h3">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="" class="text-decoration-none link-danger h3">
                            <i class="bi bi-youtube"></i>
                        </a>
                    </div>
                </div>
              
            </div>
            
        </div>
        
    </div>

   
<!-- login panel -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-12 d-flex justify-content-center">
            <div class="card login mt-5 mb-5">
                <div class="card-body d-flex justify-content-center">
                    <div class="text-center h1">Login</div>
                    <form action="login.php" id="loginForm" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label fs-5">Username</label>
                            <input type="text" class="form-control" id="username" name="username" aria-describedby="username">
                            <span class="text-danger" id="uerror"></span>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fs-5">Password</label>
                            <input type="password" class="form-control" id="password" name="password" aria-describedby="password">
                            <span class="text-danger" id="error"></span>
                        </div>
                        
                        <input type="submit" name="login" id="login" value="Login" class="btn btn-primary mt-3">
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer -->

    <div class="container-fluid bg-dark text-white">
        <div class="row">
            <div class="col-lg-4 col-md-3 d-none d-md-block d-lg-flex d-md-flex flex-column align-items-center mt-2">
                <h4>Explore</h4>
                <ul>
                    <li>
                        <a href="" class="text-decoration-none link-light fs-5">Home</a>
                    </li>
                    <li>
                        <a href="" class="text-decoration-none link-light fs-5">Doctor's Schedule</a>
                    </li>
                    <li>
                        <a href="" class="text-decoration-none link-light fs-5">Doctors</a>
                    </li>
                    <li>
                        <a href="" class="text-decoration-none link-light fs-5">Package</a>
                    </li>
                    <li>
                        <a href="" class="text-decoration-none link-light fs-5">Consult With Doctor</a>
                    </li>
                    <li>
                        <a href="" class="text-decoration-none link-light fs-5">Appointment</a>
                    </li>
                    <li>
                        <a href="" class="text-decoration-none link-light fs-5">Galary</a>
                    </li>
                    <li>
                        <a href="" class="text-decoration-none link-light fs-5">Contact Us</a>
                    </li>
                    <li>
                        <a href="" class="text-decoration-none link-light fs-5">Carrer</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mt-2">
                <h4>We are here to hear you</h4>
                
                    <div class="mb-3">
                        <label for="name" class="form-label">Enter your name</label>
                        <input type="name" class="form-control" id="name" aria-describedby="nameHelp">
                        <div id="error"></div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
                    <input type="submit" id="submit" class="btn btn-primary float-end" value="Continue">
                
            </div>
            <div class="col-lg-4 col-md-3 col-sm-6 mt-2 d-flex flex-column ">
                <div class="mt-5">
                    <h5>Contact Address</h5>
                <span class="d-block">Nepal Health Association</span>
                <span class="d-block">Kathmandu, Nepal</span>
                </div>
                <div class="mt-3">
                    <span class="d-block">Tel: +977-1-1234567</span>
                    <span class="d-block">Fax: </span>
                    <span class="d-block">Email: info@nha.com</span>
                </div>
                <div class="row">
                    <div class="col-6 d-flex justify-content-evenly">
                        <a href="" class="text-decoration-none link-primary h3">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="" class="text-decoration-none link-primary h3">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="" class="text-decoration-none link-danger h3">
                            <i class="bi bi-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>

</body>
</html>