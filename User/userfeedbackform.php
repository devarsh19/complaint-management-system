<?php
       error_reporting(0);

           include($_SERVER["DOCUMENT_ROOT"].'/Project/connection.php');  // This file is for establish connection with database           

           include($_SERVER["DOCUMENT_ROOT"].'/Project/checklogin.php');  // This file check if user is not logged in than redirect to login page  
          
           include($_SERVER["DOCUMENT_ROOT"].'/Project/sessionname.php'); // This file stores user firstname in session variable and display it on the page
           
        if(isset($_POST['submit'])){
          $fname = mysqli_real_escape_string($connect, $_POST['fname']);
           $lname = mysqli_real_escape_string($connect, $_POST['lname']);
           $email = mysqli_real_escape_string($connect, $_POST['email']);
           $status = mysqli_real_escape_string($connect, $_POST['complaintStatus']);
           $review = mysqli_real_escape_string($connect, $_POST['review']);
           $comments = mysqli_real_escape_string($connect, $_POST['comments']);
           /*echo $fname;
           echo $lname;
           echo $email;
           echo $Status;
           echo $review;
           echo $Comments;die();*/
        
         
    //    $sql = "INSERT INTO feedback_master(Firstname,Lastname,Email_id,SolvedOrNot,Experience,Comments,user_id) VALUES ('."$fname".','."$lname".','."$email".','."$status".','."$review".','."$comments".','."$u_id".')";
          $sql = "INSERT INTO feedback_master(Firstname,Lastname,Email_id,SolvedOrNot,Experience,Comments,user_id) VALUES ('".$fname."','".$lname."','".$email."','".$status."','".$review."','".$comments."','$u_id')";
        $result=mysqli_query($connect,$sql);
        
        echo "<script>
  alert('Thank You!!Your feedback is successfully submitted.:)');
  window.location.href='userfeedbackform.php';
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
  <title>शिकायतBOX</title>
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
    .form-control{border-color: black;
  border-style: solid;}
  .submitcancelbutton
  {
    margin-left: 250px;
  }
   input[type=radio] {
    border: 0px;
    /*width: 25%;*/
    height: 1em;
    font-size: 20px;
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
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Complaint History">
            <a class="nav-link" href="message.php">
              <i class="fa fa-paper-plane-o" style="margin-left: 3px;"></i>
              <span class="nav-link-text"> &nbsp Message</span>
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
              <a href="../logout.php">
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
          <a href="#">Complaint Feedback</a>
        </li>
        <li class="breadcrumb-item active">Feedback Form</li>
      </ol>
      <!-- Icon Cards-->
     
<div class="wrapper row3">
  <main id="container" class="clear">
    
    <!-- container body -->
    <!-- ########################################################################################## -->
    <div data-role="control" data-type="form-header" data-hash="00000002" data-type-id="27" data-colspan="20" id="form-heading-00000002-acc" aria-labelledby="form-heading-00000002-acc" data-i18n-html="Headline"><h2 style="color: #002266; margin-left: 22px">Feedback Form</h2>
<p style="font-size: 13px;margin-left: 22px">It is our duty to serve you, the customer, and we take your feedback very seriously. Whether negative or positive, please let us know about your experience.</p> <hr style="margin-left: 22px">
</div>

    <div id="FeedbackForm">
      <form action="userfeedbackform.php" class="myForm" class="form-horizontal" method="POST">
        <fieldset>

         <div class="form-group">
            <div class="form-row">
              <div class="col-md-3">
                <label for="exampleInputName" style="font-size: 20px;margin-left: 22px">First name</label>
                <input class="form-control" id="fname" name="fname" type="text" aria-describedby="nameHelp" placeholder="Enter first name" required style="margin-left: 23px; width: 75%">
              </div>
              <div class="col-md-3">
                <label for="exampleInputLastName" style="font-size: 20px;">Last name</label>
                <input class="form-control" id="lname" name="lname" type="text" aria-describedby="nameHelp" placeholder="Enter last name" required style=" width: 75%">
              </div>
            </div>
          </div>
          
          <div class="row form-group">
                <div class="col-md-12">
                    <div>
                        <label for="exampleInputEmail1" class="control-label" style="margin-left: 22px;font-size: 20px">Email address</label>
                    </div>
                    <div>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" style="margin-left: 23px; width: 40%" required>
                    </div>
                </div>
            </div>

            <div class="row form-group">
                    <div class="col-md-12">
                    <div>
                        <label for="complaintStatus" class="control-label" style="margin-left: 22px;font-size:20px">Is your complaint solved or not?</label>
                        </div>
                        <div>
                          <input type="radio" name="complaintStatus" value="yes" style="margin-left: 23px;font-size: 20px"><span style="font-size: 20px">Yes</span>
                          </div>
                          <div>
                          <input type="radio" name="complaintStatus" value="no"style="margin-left: 23px;font-size:20px" ><span style="font-size: 20px">No</span>
                          </div>
                        
                    </div>
                </div>
            
<div class="row form-group">
                    <div class="col-md-12">
                    <div>
                        <label for="review" class="control-label" style="margin-left: 22px;font-size:20px">How would you rate your overall experience with our service?</label>
                        </div>
                        <div>
                          <input type="radio" name="review" value="Very Good" style="margin-left: 23px;font-size: 20px"><span style="font-size: 20px">Very Good</span>
                          </div>
                           <div>
                          <input type="radio" name="review" value="Good" style="margin-left: 23px;font-size: 20px"><span style="font-size: 20px">Good</span>
                          </div>
                           <div>
                          <input type="radio" name="review" value="Fair" style="margin-left: 23px;font-size: 20px"><span style="font-size: 20px">Fair</span>
                          </div>
                           <div>
                          <input type="radio" name="review" value="Bad" style="margin-left: 23px;font-size: 20px"><span style="font-size: 20px">Bad</span>
                          </div>
                           <div>
                          <input type="radio" name="review" value="Very Bad" style="margin-left: 23px;font-size: 20px"><span style="font-size: 20px">Very Bad</span>
                          </div>
                </div>
            </div>


            <div class="row form-group">
                <div class="col-md-12">
                    <div>
                        <label for="comments" class=" control-label" style="margin-left: 22px;font-size: 20px">Feel free to add any other comments or suggestions:</label>
                    </div>
                    <div>
                        <textarea name="comments" class="form-control" id="comments" rows="5" cols="10" style="margin-left: 23px; width: 50%" required></textarea>
                    </div>
                </div>
            </div>
             
             <div class="row form-group">
                <div class="col-md-12">
                    <div>
                        <font size="2" style="margin-left: 23px">* The information given within the Feedback Form will be used for service
            improvement only and are strictly confidential.</font>
                    </div>
                    
                </div>
            </div>


            

            <div class="row form-group">
                <div class="col-md-12">
                    <div class="col-md-2 submitcancelbutton">
                    
                        <button name="submit" class="btn btn-md btn-primary">Send your Feedback</button>
                    <!--/div-->
                    <!--div class="col-md-2"-->
                        <!--button class="btn btn-md btn-danger">Cancel</button-->
                        </div>
                    </div>
                    
                </div>
            

      </fieldset>
      </form>


    <!-- ####################################################################################################### -->
    <!-- ####################################################################################################### -->
     <!-- ########################################################################################## -->
    <!-- / container body -->
    <div class="clear"></div>
  </main>
</div>
      </div>
      <!-- Example DataTables Card-->
      
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
      
      
        <div class="text-center">
          <small>Copyright © शिकायतBox 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
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
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5ad62295227d3d7edc240911/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>
