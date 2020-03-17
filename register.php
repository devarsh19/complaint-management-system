<!-- PHP script for store user data -->
<?php 
    error_reporting(0);
    include('connection.php');
    
    if(isset($_POST['submit'])){

      $fname = mysqli_real_escape_string($connect, $_POST['fname']);
      $lname = mysqli_real_escape_string($connect, $_POST['lname']);
      $email = mysqli_real_escape_string($connect, $_POST['email']);
      $password = mysqli_real_escape_string($connect, $_POST['password']);
      $password = md5($password); //securing a password using md5 encryption
      $cpassword = mysqli_real_escape_string($connect, $_POST['cpassword']);
      $cpassword = md5($cpassword); //securing a password using md5 encryption

      $sql = "SELECT Email FROM reg_data WHERE Email='$email' ";
                  $result = mysqli_query($connect,$sql) or die(mysqli_error());
                  $count = mysqli_num_rows($result);
                  if($count > 0)
                      {
                        $email_error = "Email address already registered. Click on the login page to get started";
                      }
              else    
   {             
    $insert = "INSERT INTO reg_data(Firstname,Lastname,Email,Password,Role_id) VALUES('".$fname."','".$lname."','".$email."','".$password."','3')";
    if(mysqli_query($connect,$insert)){
      header('location:login.php');
    }
    else
      echo "Please try again";
  }
 } 
?>
<!-- End of PHP script -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Register First</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet"> 
  <style type="text/css" media="screen">
  body {
   /* background-image: url("bg1.jpeg");*/
   background: linear-gradient(0deg, #ff6a00 0%, #ee0979 100%);
    background-repeat: no-repeat;
    background-size:2000px;
}  
div.logo {
  margin-left: 20px;
  margin-top: 20px;

}

.container{
  opacity: 1;
  }
  </style> 
</head>

<body class="bg-dark">
<script src="registervalidation.js">
</script>
<div class="logo" class="col-xs-4 col-xs-offset-1">
  <!--img src="about-img.jpg"  style=" width: 40px;height: 40px"class="img-responsive" alt="Responsive image"--><span style="color:white;font-size: 20px;margin-left: 10px">शिकायतBox</span>
</div>
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form method="POST" action="register.php" name="form">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">First name</label>
                <input class="form-control" id="exampleInputName" name="fname" type="text" aria-describedby="nameHelp" placeholder="Enter first name" onkeyup="firstnamevalidate()">
              </div>

              <div class="col-md-6">
                <label for="exampleInputLastName">Last name</label>
                <input class="form-control" id="exampleInputLastName" name="lname" type="text" aria-describedby="nameHelp" placeholder="Enter last name" onkeyup="lastnamevalidate()">
              </div>
            </div>
          </div>
          <div class="form-group">
                    <div class="form-row">
                         <div id="firstnamevalidation" class="col-md-6" style="color: red">
                            </div>
                         <div id="lastnamevalidation" class="col-md-6" style="color: red">
                            </div>
                    </div>
          </div> 
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" name="email" autocomplete="off" type="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $email ?>" onkeyup="emailvalidate()">
           <!-- <span style="margin-top: 3px;color:red;display: inline-block;"><?php echo $email_error; ?></span>--> 
          </div>
          <div id="emailvalidation" style="color: red">
          <span style="margin-top: 3px;color:red;display: inline-block;"><?php echo $email_error; ?></span>
                  </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" id="exampleInputPassword1" name="password" type="password" placeholder="Password" onkeyup="validate(),confirmpasswordvalidate()">
              </div>

              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirm password</label>
                <input class="form-control" id="exampleConfirmPassword" name="cpassword" type="password" placeholder="Confirm password" onkeyup=" confirmpasswordvalidate(),validate()">
              </div>
            </div>
          </div>
          <div class="form-group">
                    <div class="form-row">
                         <div id="passwordvalidation" class="col-md-6" style="color: red">
                            </div>
                         <div id="confirmpasswordvalidation" class="col-md-6" style="color: red">
                            </div>
                    </div>
          </div>
          <button type=submit name="submit" id="submit" class="btn btn-primary btn-block" onclick="return allvalidation();">Register</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Login Page</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
