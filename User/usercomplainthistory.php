<?php
  //error_reporting(0);

           include($_SERVER["DOCUMENT_ROOT"].'/Project/connection.php');  // This file is for establish connection with database  
           //include($_SERVER["DOCUMENT_ROOT"].'/Project/sessionname.php'); // This file stores user firstname in session variable and display it on the page   
           include($_SERVER["DOCUMENT_ROOT"].'/Project/checklogin.php');  // This file check if user is not logged in than redirect to login page    
            if(isset($_SESSION['name']))
           {
           $Firstname = $_SESSION['name'];
           $mail = $_SESSION['email'];
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
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script type="text/javascript">  
               
            


        </script>
  <style type="text/css">
  body{
    counter-reset: Serial;
  }
    table {

    border-collapse: collapse;
    width: 100%;
    margin-left: auto;

}

th, td {
    text-align: left;
    padding: 8px;
    font-size: 20spx;
}
tr td:first-child:before
{
  counter-increment: Serial;      /* Increment the Serial counter */
  content:  counter(Serial); /* Display the counter */
}
tr:nth-child(even) {background-color: #f2f2f2;}
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
          <a href="#">Complaint History</a>
        </li>
        <li class="breadcrumb-item active">Complaints History</li>
      </ol>
     
<!-- End of complaint table -->
       <div class="container design">
<form action="" method="post" accept-charset="utf-8" class="form-inline">

<!--div class="form-group" -->
<!--div class="row">
<div class="col-sm-2 col-md-2">
<div class="dataTables_length" id="dataTable_length">
<label style=" margin-left:20px;font-size: 20px">Show <select name="dataTable_length" aria-controls="dataTable" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div>
<div class="col-sm-10 col-md-10">
<div id="dataTable_filter" class="dataTables_filter">
<label style=" margin-left:690px;font-size: 20px">Search:
<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
</label>
</div>
</div>
</div-->
<table class="test">
<?php 
          
          $sql1 = "SELECT user_id FROM reg_data WHERE Email ='$mail'";
          $result1 = mysqli_query($connect,$sql1);
          while ($row = mysqli_fetch_assoc($result1)) {
            $u_id=$row['user_id'];
          }

          $sql2 = "SELECT Complaint_id FROM userid_complaintid_mapping WHERE user_id ='$u_id'";
          $result2 = mysqli_query($connect,$sql2);
          echo "<tr>
             <th>No</th>
          <th>Complaint id</th>
              <th>Date</th>
              <th>Subject</th>
              <th>Status</th>
              </tr>";
          while ($row = mysqli_fetch_assoc($result2)) {
            $c_id=$row['Complaint_id'];
            
            $sql = "SELECT A.Complaint_id, A.Date, C.Status,A.Subject FROM complaint_master A, complaint_status_master C WHERE C.Status_id=A.Status_id AND A.Complaint_id='$c_id'";
          $result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
          if (mysqli_num_rows($result) > 0) {
          // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
        ?>
              
              <tr>

              <td><div id="abc"></div></td>
              <td class='row_id'><?php echo $row["Complaint_id"] ?></td>
              <td class='row_date'><?php echo $row["Date"] ?></td>
              <td class='row_date'><?php echo $row["Subject"] ?></td>
              <td class='row_status'><?php echo $row["Status"] ?></td>
              
              
              </tr>
              
         <?php
            }
            
           }
          }
          //die();
          
?>
<!--tr>

  <th>Complaint_id</th>
  
  <th>Date</th>
  <th>Status</th>
  
  </tr>
  <tr>
    <td>1</td>
    <td>eeewe</td>
    <td>eewe</td>
    
    
    </tr>
    <tr>
    <td>2</td>
    <td>defd</td>
    <td>gedgg</td-->
</table>
<div class="row">
  
</div>
<!--div class="row">
<div class="col-sm-2 col-md-12">
<div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite" style="font-size: 20px">Showing 1 to 10 of 60 entries</div>
</div>
</div-->
</form>
</div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © शिकायतBox</small>
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
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <!--scripts for open and edit form-->
    <script>


      // gets all the .edit_row cells, registers click to each one
      var edit_row = document.querySelectorAll('#t_id .edit_row');
      for(var i=0; i<edit_row.length; i++) {
        edit_row[i].addEventListener('click', function(){
        // get parent row, add data from its cells in form fields
          var tr_parent = this.parentNode;
          document.getElementById('complaint_id').value = tr_parent.querySelector('.row_id').innerHTML;
          document.getElementById('complaint_type').value = tr_parent.querySelector('.row_type').innerHTML;
          document.getElementById('complaintDate').value = tr_parent.querySelector('.row_date').innerHTML;
          document.getElementById('complaint_Status').value = tr_parent.querySelector('.row_status').innerHTML;
          document.getElementById('Operator_id').value = tr_parent.querySelector('.row_opid').innerHTML;
          document.getElementById('Operator_name').value = tr_parent.querySelector('.row_opname').innerHTML;

          // display the form, and focus on a form field
          document.getElementById('edit_form').style.display = 'block';
          document.getElementById('complaint_id').focus();
        }, false);
      }

      // to hide #edit_form when click on #cls_f button
      document.getElementById('close').addEventListener('click', function()
      { 
        this.parentNode.style.display = 'none';
      }, false);
  </script>  
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
