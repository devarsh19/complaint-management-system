<!-- PHP script for store user data -->
<?php
          error_reporting(0);

           include($_SERVER["DOCUMENT_ROOT"].'/Project/connection.php');  // This file is for establish connection with database           

           include($_SERVER["DOCUMENT_ROOT"].'/Project/checklogin.php');  // This file check if user is not logged in than redirect to login page  
          
           include($_SERVER["DOCUMENT_ROOT"].'/Project/sessionname.php'); // This file stores user firstname in session variable and display it on the page
           if(isset($_POST['submit'])){
            $sql1 = "SELECT user_id FROM reg_data WHERE Email ='$mail'";
          $result1 = mysqli_query($connect,$sql1);
          while($row = mysqli_fetch_assoc($result1)){
              $u_id = $row['user_id'];
          }
          $to = mysqli_real_escape_string($connect, $_POST['To']);
           $fname = mysqli_real_escape_string($connect, $_POST['fname']);
           $email = mysqli_real_escape_string($connect, $_POST['email']);
           $message = mysqli_real_escape_string($connect, $_POST['message']);
           $contactno = mysqli_real_escape_string($connect, $_POST['contactno']);
           
        
         
    //    $sql = "INSERT INTO feedback_master(Firstname,Lastname,Email_id,SolvedOrNot,Experience,Comments,user_id) VALUES ('."$fname".','."$lname".','."$email".','."$status".','."$review".','."$comments".','."$u_id".')";
          $sql = "INSERT INTO message(Receiver,Name,Sender,Contact,Message,user_id) VALUES ('".$to."','".$fname."','".$email."','".$contactno."','".$message."','$u_id')";
        $result=mysqli_query($connect,$sql);
        
        echo "<script>
  alert('Your message is sent.:)');
  window.location.href='message.php';
  </script>" ;
        
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
  <title>SB user - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!-- Additional style -->
  <style type="text/css">
    #feed{
      position: absolute;
    }
  </style>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="">शिकायतBox</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
          <a class="nav-link" href="userdashboard.php">
            <i class="fa fa-fw fa fa-home"></i>
            <span class="nav-link-text"> &nbsp Home</span>
          </a>
        </li>        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Registration Complaint">
          <a class="nav-link" href="usercomplaintform.php">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text"> &nbsp Complaint Registration </span>
          </a>
          </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Complaint History">
            <a class="nav-link" href="usercomplainthistory.php">
              <i class="fa fa-file-text" style="margin-left: 3px;"></i>
              <span class="nav-link-text"> &nbsp Complaint History</span>
            </a>          
         </li>
        
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Complaint Feedback">
            <a class="nav-link" href="userfeedbackform.php">
              <i class="fa fa-comment-o" style="margin-left: 3px;"></i>
              <span class="nav-link-text"> &nbsp Complaint Feedback</span>
            </a>
          </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Account Setting">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-cog" style="margin-left: 3px;"></i>
            <span class="nav-link-text"> &nbsp Account Setting</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="userprofileform.php">
              <i class="fa fa-id-card-o"></i>
              <span class="nav-link-text">&nbsp Profile</span>
              </a>
            </li>
            <li>
              <a href="changepassword.php">
                <i class="fa fa-key"></i>
                <span class="nav-link-text">&nbsp Change Password</span>
              </a>
            </li>
            <li>
              <a href="logout.php">
                <i class="fa fa-sign-out"></i>
                <span class="nav-link-text">&nbsp Logout</span>
              </a>
            </li>
          </ul>
        </li>

      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
      <li class="nav-item">
          <lable class="nav-link" style="cursor: pointer;">
            Welcome <?php error_reporting(0); echo $Firstname; ?>&nbsp &nbsp</lable>
            
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Jane Smith</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>John Doe</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="../logout.php">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
<!-- End of NavBar -->
 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
     
     <div class="wrapper row3">
  <main id="container" class="clear">
        <form method="POST" action="" name="form">
          
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputTo">To</label>
                <input class="form-control" id="To" name="To" type="text" aria-describedby="nameHelp" placeholder="">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">Name</label>
                <input class="form-control" id="fname" name="fname" type="text" aria-describedby="nameHelp" placeholder="Enter name" onkeyup="firstnamevalidate()">
              </div>
            </div>
          </div>
          <div class="form-group">
          <div class="form-row">
          <div class="col-md-12">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="email" name="email" autocomplete="off" type="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $email ?>">
           <!-- <span style="margin-top: 3px;color:red;display: inline-block;"><?php echo $email_error; ?></span>--> 
          </div>
          </div>
          </div>
           <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputNumber">Contact:</label>
                <input class="form-control" id="contactno" name="contactno" type="text" aria-describedby="nameHelp" placeholder="Enter number">
              </div>
            </div>
          </div>

          <div class="form-group">
          <div class="form-row">
          <div class="col-md-12">
            <label for="discription">Message:</label>
        <textarea name="message"  class="form-control" required rows="10" cols="30"> 
        </textarea>
     </div>
     </div>
     </div>

         
          <button type=submit name="submit" id="submit" class="btn btn-primary btn-block">Send</button>
        </form>
        
      </main>
    </div>
  
     
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
      <div class="one_half first">
      
        <div class="text-center">
          <small>Copyright © शिकायतBox </small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
<!--
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
?>-->

<!--<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Register First</title>
  
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <link href="css/sb-admin.css" rel="stylesheet"> 
  <style type="text/css" media="screen">
  body {
    /*background-image: url("bg1.jpeg");*/
    background: linear-gradient(0deg, #ff6a00 0%, #ee0979 100%);

    background-repeat: no-repeat;
    background-size:2000px;
}  
div.logo {
  margin-left: 20px;
  margin-top: 20px;

}

.container{
  opacity: 0.8;
  }
  </style> 
</head>

<body class="bg-dark">
<script src="registervalidation.js">
</script>
<div class="logo" class="col-xs-4 col-xs-offset-1">
  <img src="about-img.jpg"  style=" width: 40px;height: 40px"class="img-responsive" alt="Responsive image"><span style="color:white;font-size: 20px;margin-left: 10px">Aimbys Solution</span>
</div>
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Message</div>
      <div class="card-body">
        <form method="POST" action="" name="form">
          
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputTo">To</label>
                <input class="form-control" id="exampleInputTo" name="To" type="text" aria-describedby="nameHelp" placeholder="">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">Name</label>
                <input class="form-control" id="exampleInputName" name="fname" type="text" aria-describedby="nameHelp" placeholder="Enter name" onkeyup="firstnamevalidate()">
              </div>
            </div>
          </div>
          <div class="form-group">
          <div class="form-row">
          <div class="col-md-12">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" name="email" autocomplete="off" type="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $email ?>">
           < <span style="margin-top: 3px;color:red;display: inline-block;"><?php echo $email_error; ?></span>> 
          </div>
          </div>
          </div>
           <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputNumber">Contact:</label>
                <input class="form-control" id="contactno" name="contactno" type="text" aria-describedby="nameHelp" placeholder="Enter number">
              </div>
            </div>
          </div>

          <div class="form-group">
          <div class="form-row">
          <div class="col-md-12">
            <label for="discription">Message:</label>
        <textarea name="message"  class="form-control" required rows="10" cols="30"> 
        </textarea>
     </div>
     </div>
     </div>

         
          <button type=submit name="submit" id="submit" class="btn btn-primary btn-block">Send</button>
        </form>
        
      </div>
    </div>
  </div>
 
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>-->
