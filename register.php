<?php include 'connection.php' ?>
<?php 

  if(isset($_POST['submit'])){
    $users = $_POST['user'];
    $passs = $_POST['pass'];
    $fnames = $_POST['fname'];
    $mnames = $_POST['mname'];
    $lnames = $_POST['lname'];
    $pos = 'Employee';

    $query = "SELECT * FROM `users` WHERE `Username` = '$users'";
    $stmts = $conn->prepare($query);
    $stmts->execute();
    $result = $stmts->get_result();
    $row = $result->fetch_assoc();

    if($users == @$row['Username']){

      echo 'User is Already Exist';


    }else{

    $sql = "INSERT INTO `users`( `Username`, `Password`, `Fname`, `Mname`, `Lname`, `Position`) VALUES (?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt -> bind_param("ssssss",$users,$passs,$fnames,$mnames,$lnames,$pos);
    $stmt->execute();
      echo 'Registered Successfully';

  }
}

?>


<!DOCTYPE html>
<html>
<head>

	 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Login</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
  <div class="container-login mt-5">
    <div class="row justify-content-center">
      <div class="col-xl-4 col-lg-5 col-md-5">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">

                <?php if (isset($_SESSION['response'])) { ?>
                  <div class="alert alert-<?= $_SESSION['type']; ?> alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times </button>
                    <?= $_SESSION['response']; ?>
                  </div>
                <?php unset($_SESSION['response']);
                } ?>

                <div class="login-form">

                    <form method="POST" class="form-group">
                  <div class="form-group">
                  <input type = "text" class="form-control" name = "user" placeholder="USERNAME!">
                  </div>
                   <div class="form-group">
                  <input type = "password" class="form-control" name = "pass" placeholder="PASSWORD!">
                  </div>

                  <div class="form-group">
                  <input type = "text" class="form-control" name = "fname" placeholder="FIRST NAME">
                  </div>
                   <div class="form-group">
                  <input type = "text" class="form-control" name = "mname" placeholder="MIDDLE NAME!">
                  </div>    
                    <div class="form-group">
                  <input type = "text" class="form-control" name = "lname" placeholder="LAST NAME!">
                  </div>                  
                  <div class="form-group">
                  <button type="submit" name="submit" class="form-control btn btn-danger">REGISTER</button>
                  </div>
                </form>
             
                  <hr>
                  <div class="text-center">
                    <span class="small">Powered By: </span><a class="font-weight-bold small" href="index.php">Already have an Account!</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</body>
</html>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>