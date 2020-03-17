<?php
        error_reporting(0);

           include($_SERVER["DOCUMENT_ROOT"].'/Project/connection.php');  // This file is for establish connection with database           

           include($_SERVER["DOCUMENT_ROOT"].'/Project/checklogin.php');  // This file check if user is not logged in than redirect to login page  
          
           include($_SERVER["DOCUMENT_ROOT"].'/Project/sessionname.php'); // This file stores user firstname in session variable and display it on the page
        
        if(isset($_POST['submit'])){
        $date = mysqli_real_escape_string($connect, $_POST["date"]);
        $subject = mysqli_real_escape_string($connect, $_POST["subject"]);
        $message = mysqli_real_escape_string($connect, $_POST["message"]);
        $complaint_type = mysqli_real_escape_string($connect, $_POST["complaintType"]);
        $sql1 = "SELECT Complaint_type_id FROM complaint_type_master WHERE Complaint_type = '$complaint_type'";
        $result1 = mysqli_query($connect,$sql1); 
        while($row=mysqli_fetch_assoc($result1)){
           $Complaint_type_id = $row['Complaint_type_id'];   
        }      
        $sql = "INSERT INTO complaint_master (Date,Complaint_type_id,Subject,Description,Status_id,Operator_id) VALUES('$date', '$Complaint_type_id', '$subject','$message','4','1')";
        $result=mysqli_query($connect,$sql);
        $c_id =  mysqli_insert_id($connect);
          $sql1 = "SELECT user_id FROM reg_data WHERE Email ='$mail'";
          $result1 = mysqli_query($connect,$sql1);
          while($row = mysqli_fetch_assoc($result1)){
              $u_id = $row['user_id'];
          }
          
        $sql2 = "INSERT INTO userid_complaintid_mapping(user_id,Complaint_id) VALUES('$u_id','$c_id')";
        $result2 = mysqli_query($connect,$sql2);
        echo "<script>
          alert('Thank You!!Your complaint is successfully submitted.:)');
          window.location.href='usercomplaintform.php';
          </script>" ;
    } 
     $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}


// if everything is ok, try to upload file
else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
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
  <title>शिकायतBox</title>
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
    .form-control{
      border-color: black;
  border-style: solid;
    }
.submitbutton{
  padding-bottom: 10px;
}
   
/*fieldset
 {
  border:2px solid black;
  padding:100px;
  background-color:white;


 }*/

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
          <a href="#">Registration Complaint</a>
        </li>
        <li class="breadcrumb-item active">Complaint Registration Form</li>
      </ol>
      <!-- Icon Cards-->
      <div class="wrapper row3">
  <main id="container" class="clear">
    <!--h2 style="color: #002266; margin-left: 30px">Complaint Registration Form</h2-->
    <!-- container body -->
    <!-- ########################################################################################## -->
   <div data-role="control" data-type="form-header" data-hash="00000002" data-type-id="27" data-colspan="20" id="form-heading-00000002-acc" aria-labelledby="form-heading-00000002-acc" data-i18n-html="Headline"><h2 style="color: #002266; margin-left: 30px">Complaint Registration Form</h2>
<p style="font-size: 12pt;margin-left: 30px">Please send us details about the incident you would like to report. Our Complaint Center will analyze your complaint and take the appropriate measures in order that the reported situation will not occur at any other time in the future.</p> <hr style="margin-left: 30px">
</div>

    <div id="complaintRegistration">
      <form action="usercomplaintform.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
        <fieldset>
        
      <div class="row form-group">
          <div class="col-sm-12">
              <div class="col-sm-2">
                  <label for="complaintDate" class="ui-hidden-accessible " style="margin-left: 22px">Date of complaint :</label>
              </div>
              <div class="col-sm-10">
                  <input type="date" name="date" class="form-control" value="<?php print(date("Y-m-d")); ?>" id="complaintDate" readonly style="margin-left: 23px;width: 50%">
             </div>
          </div>
        </div>

        <div class=" row form-group">
            <div class="col-sm-12">
                <div class="col-sm-2">
                    <label for="complaintType" class="ui-hidden-accessible" style="margin-left: 22px">Complaint Type:</label>
                </div>
                <div class="col-sm-10">
                    <select name="complaintType" class="form-control" style="margin-left: 23px; width: 50%">
                      <?php 
                      $complaint_type = "SELECT Complaint_type FROM complaint_type_master WHERE Flag=1";
                      $result1 = mysqli_query($connect,$complaint_type);
                      //echo $complaint_type;
                     // die();
                      while($row = mysqli_fetch_assoc($result1)){
                      ?>
                        <option value="<?php echo $row['Complaint_type']; ?>"><?php echo $row['Complaint_type']; ?></option>
                      <?php 
                      }
                      ?>     
                    </select>
                </div>
            </div>
        </div>

        <div class="row form-group">
          <div class="col-sm-12">
            <div class="col-sm-2">
              <label for="subject" class="ui-hidden-accessible" style="margin-left: 22px">Subject:</label>
            </div>
          <div class="col-sm-10">
            <input type="text" name="subject" id="subject" class="form-control" required placeholder="subject" style="margin-left: 23px; width: 50%">
        </div>
      </div>
    </div>

      <div class="form-group">
        <div class="col-sm-12">
          <div class="col-sm-2">
            <label for="discription" class="ui-hidden-accessible" style="margin-left: 10px">Description:</label>
          </div>
          <div class="col-sm-10">
        <textarea name="message"  class="form-control" required rows="10" cols="30" style="margin-left: 10px; width: 51%">
        </textarea>
         </div>
       </div>
     </div>

     <div class="row form-group">
          <div class="col-sm-12">
            <div class="col-sm-2">
              <label for="UploadDocument" class="ui-hidden-accessible" style="margin-left: 22px ">Select Document:</label>
            </div>
          <div class="col-sm-10">
            <input type="file" name="fileToUpload" id="fileToUpload"  style="margin-left: 23px; width: 50%">
        </div>
      </div>
    </div>
        <br>
        <div class="submitbutton">
        <button name="submit" name="submit" class="btn btn-md btn-primary" style="margin-left:250px">Submit</button>
        </div>
      </fieldset>
      </form>


    </div>
    <!-- ####################################################################################################### -->
    <!-- ####################################################################################################### -->
     <!-- ########################################################################################## -->
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
