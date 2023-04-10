
<?php

include 'processes/conn.php';

session_start();
if(!isset($_SESSION['username'])){
  header("location: ../index.php");
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Material Dashboard 2 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.2" rel="stylesheet" />
  <link href="../assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <!-- bootstrap 5 -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> -->
    <style>
      
.table-bordered> :not(caption)>*>*{
    border-width: 0!important;
}
    </style>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-1   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Dashboard</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/dashboard.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary " href="../pages/doctors.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Doctors</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/appointments.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Appointments</span>
          </a>
        </li>
        
        
      </ul>
    </div>
    
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
       
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">Type here...</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            
            <li class="nav-item d-flex align-items-center">
              <a href="../logout.php" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span><?php echo $_SESSION['username']; ?></span>
                <span class="d-sm-inline d-none">Log Out</span>
              </a>
            </li>
            
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
           
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    
    <!-- add doctors modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-doctors">Add Doctors</button> 
      <div class="modal fade" id="add-doctors" tabindex="-1" aria-labelledby="add-doctors-Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="add-doctors-Label">Fill all the fields</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="processes/add.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="name" class="form-label h6">Doctor's Name:</label>
                  <input type="text" class="form-control input-md border" id="name" name="name">
                </div>
                <div class="mb-3">
                  <label for="image" class="form-label h6">Doctor's Image:</label>
                  <input type="file" class="form-control input-md border" id="image" name="image" accept="image/*">
                </div>
                <div class="mb-3">
                  <label for="speciality" class="form-label h6">Doctor's Speciality:</label>
                  <input type="text" class="form-control input-md border" id="speciality" name="speciality">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-primary" value="Save changes"></input>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    <!-- Arrange shifts modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#arrange">Arrange shifts</button>
    <div class="modal fade" id="arrange" tabindex="-1" aria-labelledby="arrange-Label" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="arrange-Label">Fill all the fields</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="processes/arrange.php" method="post" >
            <div class="mb-3">
                <label for="id" class="form-label h6">Doctor's ID:</label>
                <input type="text" class="form-control input-md border" id="id" name="id">
              </div>
              <div class="mb-3">
                <label for="Sunday" class="form-label h6">Sunday</label>
                <input type="text" class="form-control input-md border" id="sunday" name="sunday">
              </div>
              <div class="mb-3">
                <label for="monday" class="form-label h6">Monday</label>
                <input type="text" class="form-control input-md border" id="monday" name="monday">
              </div>
              <div class="mb-3">
                <label for="tuesday" class="form-label h6">Tuesday</label>
                <input type="text" class="form-control input-md border" id="tuesday" name="tuesday">
              </div>
              <div class="mb-3">
                <label for="wednesday" class="form-label h6">Wednesday</label>
                <input type="text" class="form-control input-md border" id="wednesday" name="wednesday">
              </div>
              <div class="mb-3">
                <label for="thursday" class="form-label h6">Thursday</label>
                <input type="text" class="form-control input-md border" id="thursday" name="thursday">
              </div>
              <div class="mb-3">
                <label for="friday" class="form-label h6">Friday</label>
                <input type="text" class="form-control input-md border" id="friday" name="friday">
              </div>
              <div class="mb-3">
                <label for="saturday" class="form-label h6">Saturday</label>
                <input type="text" class="form-control input-md border" id="saturday" name="saturday">
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Save changes"></input>
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>
      
      <!-- update -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update">Update Details</button>
    <div class="modal fade" id="update" tabindex="-1" aria-labelledby="add-doctors-Label" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="aupdate-Label">Fill all the fields</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="processes/update.php" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="id" class="form-label h6">Doctor's ID:</label>
                <input type="text" class="form-control input-md border" id="id" name="id">
              </div>
              <div class="mb-3">
                <label for="name" class="form-label h6">Doctor's Name:</label>
                <input type="text" class="form-control input-md border" id="name" name="name">
              </div>
              
              <div class="mb-3">
                <label for="speciality" class="form-label h6">Doctor's Speciality:</label>
                <input type="text" class="form-control input-md border" id="speciality" name="speciality">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Save changes"></input>
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>
  <!-- upload photo -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update-image">Update Image</button>
      <div class="modal fade" id="update-image" tabindex="-1" aria-labelledby="update-image-Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="update-image-Label">Insert the Id to delete</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">  
              <form action="processes/update-image.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="id" class="form-label h6">Doctor's ID:</label>
                  <input type="text" class="form-control input-md border" id="id" name="id">
                </div>
                <div class="mb-3">
                  <label for="image" class="form-label h6">Doctor's Image:</label>
                  <input type="file" class="form-control input-md border" id="image" name="image" accept="image/*">
                </div>
                <input type="button" class="btn btn-secondary" data-bs-dismiss="modal"value="Close"></input>
                <input type="submit" class="btn btn-primary" value="Save changes"></input>
              </form>
            </div>  
          </div>
        </div>
      </div>


      <!-- delete -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#delete-doctors">Delete Doctors</button>
      <div class="modal fade" id="delete-doctors" tabindex="-1" aria-labelledby="delete-doctors-Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="delete-doctors-Label">Insert the Id to delete</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">  
              <form action="processes/delete.php" method="post">
                <div class="mb-3">
                  <label for="id" class="form-label h6">Doctor's ID:</label>
                  <input type="text" class="form-control input-md border" id="id" name="id">
                </div>
                <input type="button" class="btn btn-secondary" data-bs-dismiss="modal"value="Close"></input>
                <input type="submit" class="btn btn-primary" value="Save changes"></input>
              </form>
            </div>  
          </div>
        </div>
      </div>




      <div class="table-responsive ">
        <table class='table table-bordered text-center mt-3' id="mytable">
          <thead>
            <tr>
              <th scope='col'>ID</th>
              <th scope='col'>Doctor's Name</th>
              <th scope='col'>Image</th>
              <th scope='col'>Email</th>
              <th scope='col'>Speciality</th>
              <th scope='col'>Sunday</th>
              <th scope='col'>Monday</th>
              <th scope='col'>Tuesday</th>
              <th scope='col'>Wednesday</th>
              <th scope='col'>Thursday</th>
              <th scope='col'>Friday</th>
              <th scope='col'>Saturday</th>
            </tr>
          </thead>
          <tbody>                  
            <?php
              $selectquery = "select * from doctors";
              $query = mysqli_query($conn,$selectquery);
              $nums = mysqli_num_rows($query);
              while($res=mysqli_fetch_array($query)) 
              {
                echo "<tr>";
                echo "<td>" . $res['id'] ."</td>";
                echo "<td>" . $res['doctors_name'] ."</td>";
                echo "<td> <img src=../." .$res['image']." style='height:50px; width:50px;'></td>";
                echo "<td>" . $res['email'] ."</td>";
                echo "<td>" . $res['speciality'] ."</td>";
                echo "<td>" . $res['Sunday'] ."</td>";
                echo "<td>" . $res['Monday'] ."</td>";
                echo "<td>" . $res['Tuesday'] ."</td>";
                echo "<td>" . $res['Wednesday'] ."</td>";
                echo "<td>" . $res['Thursday'] ."</td>";
                echo "<td>" . $res['Friday'] ."</td>";
                echo "<td>" . $res['Saturday'] ."</td>";
                echo " </tr>";
              }
               
            ?>
  </tbody></table></div>
  </main>



  
  <!--   Core JS Files   -->
  
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.2"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  </body>
  <script>
    $(document).ready( function () {
    $('#mytable').DataTable();
} );
  </script>
</html>