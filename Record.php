<?php include 'connection.php' ?>
<?php 

if (isset($_POST['submits'])) {

  $rid = $_POST['Record'];
  $fnames = $_POST['fname'];
  $mnames = $_POST['mname'];
  $lnames = $_POST['lname'];

    $query = "SELECT * FROM `Records` WHERE `R_ID` = '$rid'";
    $stmts = $conn->prepare($query);
    $stmts->execute();
    $result = $stmts->get_result();
    $row = $result->fetch_assoc();

    if($rid == @$row['R_ID']){

      echo 'Data is Already Exist';


    }else{

    $sql = "INSERT INTO `records`(`R_ID`, `First_Name`, `Middle_Name`, `Last_Name`) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt -> bind_param("ssss",$rid,$fnames,$mnames,$lnames);
    $stmt->execute();
      echo 'Record is Successfully Added';

  }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Information and Scheduling System</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link rel="stylesheet" href="morris/morris.css">
  <link href="css/style.css" rel="stylesheet">
</head>

<body id="page-top">

  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-icon">
                    
        </div>
        <div class="sidebar-brand-text mx-2">Record Management System</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-chart-bar"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>

      <li class="nav-item">
           <a class="nav-link" href="Record.php">
          <i class="fas fa-fw fa-male"></i>
          <span>Record</span>
        </a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-book"></i>
          <span>Schedule</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-archive"></i>
          <span>Archive</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-cogs"></i>
          <span>Settings</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-user"></i>
          <span>Account Settings</span>
        </a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#logoutModal1">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Log Out</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="version">Developed by: Praaaangks</div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?" aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button" name="search">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">
                


                </span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal1">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->





        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Record Section</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Record Section</li>
            </ol>
          </div>

    
   <div class="col-lg-12">


          <div class="card mb-4">

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

              <h6 class="m-0 font-weight-bold text-primary">STUDENT LIST</h6>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop">
                Add Record
              </button>
            </div>

            <div class="table-responsive p-3">

              <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                <?php
                $query = "SELECT * FROM records";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();
                ?>
                <thead class="thead-light">
                  <tr>
                  <th>#</th>
                  <th>Record ID</th>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Last Name</th>
                  </tr>
                </thead>
               
                <tbody>
                  <?php
                  $i = 1;
                  while ($row = $result->fetch_assoc()) {  ?>
                    <tr>
                      <td><?php echo $i++ ?></td>
                      <td><?php echo $row['R_ID'];?></td>
                      <td><?php echo $row['First_Name'];?></td>
                      <td><?php echo $row['Middle_Name'];?></td>
                      <td><?php echo $row['Last_Name'];?></td>
                
                    </tr>
                  <?php } ?>
                </tbody>

              </table>
            </div>
          </div>
        </div>
                  
                  <!-- Donut Chart -->
     <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header bg-primary text-white">
              <h5 class="modal-title" id="staticBackdropLabel">Add Student</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div id="overlay" style="display: none;">
                <div class="spinner"></div>
                <br />
                Loading...
              </div>
              <form action="" method="post" id="resident">
                <div class="form-row">
               

                  <div class="col-3">
                    <label>Record ID</label>
                    <input type="text" class="form-control" name="Record" placeholder="ex.2023-10432" onkeypress="return /[0-9,-]/i.test(event.key)" required>
                  </div>
                  <div class="col-3">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="fname" placeholder="ex. Juan" onkeypress="return /[a-z, ]/i.test(event.key)" required>
                  </div>
                  <div class="col-3">
                    <label>Middle Name</label>
                    <input type="text" class="form-control" name="mname" placeholder="ex. Medina" onkeypress="return /[a-z, ]/i.test(event.key)" required>
                  </div>
                  <div class="col-3">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lname" placeholder="ex. Dela Cruz" onkeypress="return /[a-z, ]/i.test(event.key)" required>
                  </div>

              <br>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="submit" id="mysubmit" style="display:none;"></button>
                  <input type="submit" class="submit btn btn-primary" name="submits" id="btn-submit" value="Submit">

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>



                  <!-- Modal Logout -->
                  <div class="modal fade" id="logoutModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div id="overlay" style="display:none;">
                            <div class="spinner"></div>
                            <br />
                            Loading...
                          </div>
                          <p>Are you sure you want to logout?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                               <a href="logout.php" class="logout btn btn-primary">Logout</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!---Container Fluid-->
              </div>
              <!-- Footer -->
              <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                  <div class="copyright text-center my-auto">
                    <span>copyright &copy; <script>
                        document.write(new Date().getFullYear());
                      </script> - developed by
                          <b><a href="#" target="_blank">Praaangks</a></b>
                    </span>
                  </div>
                </div>
              </footer>
              <!-- Footer -->
            </div>
          </div>



          <!-- Scroll to top -->
          <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
          </a>


          <script src="vendor/jquery/jquery.min.js"></script>


          <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
          <script src="morris/morris.min.js"></script>
          <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
          <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
          <script src="js/ruang-admin.min.js"></script>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script src="js/jquery-1.11.2.min.js"></script>
          <script src="js/plugins.min.js"></script>

</body>

</html>

<style type="text/css">
  #overlay {
    background: #ffffff;
    color: #666666;
    position: fixed;
    height: 100%;
    width: 100%;
    z-index: 5000;
    top: 0;
    left: 0;
    float: left;
    text-align: center;
    padding-top: 25%;
    opacity: .80;
  }

  .spinner {
    margin: 0 auto;
    height: 64px;
    width: 64px;
    animation: rotate 0.8s infinite linear;
    border: 5px solid firebrick;
    border-right-color: transparent;
    border-radius: 50%;
  }

  @keyframes rotate {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }

  .nav-link {

    cursor: pointer;
  }
</style>