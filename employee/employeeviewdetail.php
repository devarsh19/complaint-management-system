<?php
          error_reporting(0);

           include($_SERVER["DOCUMENT_ROOT"].'/Project/connection.php');  // This file is for establish connection with database           

           include($_SERVER["DOCUMENT_ROOT"].'/Project/checklogin.php');  // This file check if user is not logged in than redirect to login page  
          
           include($_SERVER["DOCUMENT_ROOT"].'/Project/sessionname.php'); // This file stores user firstname in session variable and display it on the page
            $complaint_id = $_GET['Complaint_id'];
            $complaint_type = $_GET['Complaint_type'];
            $User_id=$_GET['user_id'];
            $date=$_GET['Date'];
            $status=$_GET['Status'];
            $sql1 = "SELECT Description FROM complaint_master WHERE Complaint_id = '$complaint_id'";
            $result1 = mysqli_query($connect,$sql1); 
            while($row=mysqli_fetch_assoc($result1)){
            $description = $row['Description'];   
            } 
            //echo $description;die();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title> शिकायतBox</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
  <script>


// gets all the .edit_row cells, registers click to each one
var edit_row = document.querySelectorAll('#t_id .viewdetail_row');
for(var i=0; i<viewdetail_row.length; i++) {
  viewdetail_row[i].addEventListener('click', function(){
    // get parent row, add data from its cells in form fields
    var tr_parent = this.parentNode;
    //document.getElementById('complaintId').value = tr_parent.querySelector('.row_id').innerHTML;
    //document.getElementById('userId').value = tr_parent.querySelector('.row_user_id').innerHTML;
    //document.getElementById('complaint_type').value = tr_parent.querySelector('.row_type').innerHTML;
    document.getElementById('complaintDate').value = tr_parent.querySelector('.row_date').innerHTML;
    //document.getElementById('complaintStatus').value = tr_parent.querySelector('.row_status').innerHTML;
    //document.getElementById('operator_id').value = tr_parent.querySelector('.row_opid').innerHTML;
   // document.getElementById('operator_name').value = tr_parent.querySelector('.row_opname').innerHTML;

    // display the form, and focus on a form field
    //document.getElementById('edit_form').style.display = 'block';
    //document.getElementById('complaintStatus').focus();
  }, false);
}

// to hide #edit_form when click on #cls_f button
</script>
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
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="employeedashboard.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Complaint List">
          <a class="nav-link" href="changestatus.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Complaint List</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Complaint Request List">
          <a class="nav-link" href="operatorAssignment.php">
            <i class="fa fa-calendar-check-o"></i>
            <span class="nav-link-text">Complaint Request List</span>
          </a>
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
        <!--li class="nav-item dropdown">
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
        </li-->
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
            <h6 class="dropdown-header">Notifications:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <!--span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span-->
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">You have one new complaint request</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <!--span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span-->
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">You have accepted 4 new complaints</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <!--span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span-->
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">You have solved complaint id no:2</div>
            </a>
            <!--div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div-->
        </li>
        
        <li class="nav-item">
          <a class="nav-link"  href="../logout.php">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="changestatus.php">View details</a>
        </li>
        <li class="breadcrumb-item active">Details Of Complaint</li>
      </ol>
      <div class="wrapper row3">
  <main id="container" class="clear">
    <h2 style="color: #002266; margin-left: 30px">Details of Complaint</h2>
    <!-- container body -->
    <!-- ########################################################################################## -->
   <div id="complaintRegistration">
      <form action="employeeviewdetail.php" class="form-horizontal" method="POST">
        <fieldset>
      <div class=" row form-group">
            <div class="col-sm-12">               
                    <label for="complaintId" class="ui-hidden-accessible" style="margin-left: 30px;font-size:20px">Complaint Id:&nbsp<?php echo $complaint_id;?></label>
            </div>
        </div>

     <div class=" row form-group">
            <div class="col-sm-12">
                    <label for="userId" class="ui-hidden-accessible" style="margin-left: 30px;font-size:20px">User Id:&nbsp<?php echo $User_id;?></label>   
            </div>
      </div>  
      <div class="row form-group">
          <div class="col-sm-12">
                  <label for="complaintDate" class="ui-hidden-accessible " style="margin-left: 30px;font-style: normal;font-size: 20px">Date of complaint :&nbsp <?php echo $date; ?></label>
          </div>
      </div>

        <div class=" row form-group">
            <div class="col-sm-12">
                    <label for="complaintType" class="ui-hidden-accessible" style="margin-left: 30px;font-style: normal;font-size: 20px">Complaint Type:&nbsp <?php echo $complaint_type;?></label>
            </div>
        </div>

        <div class="row form-group">
          <div class="col-sm-12">
              <label for="subtype" class="ui-hidden-accessible" style="margin-left: 30px;font-style: normal;font-size: 20px">Subtype:&nbsp <?php echo $complaint_type;?></label>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-sm-12">
            <label for="discription" class="ui-hidden-accessible" style="margin-left: 30px;font-style: normal;font-size: 20px">Description:&nbsp <?php echo $description;?></label>
          </div>
       </div>
       <div class="row form-group">
          <div class="col-sm-12">
            <strong><label for="discription" class="ui-hidden-accessible" style="margin-left: 30px;font-style: normal;font-size: 20px">Current Status:&nbsp <?php echo $status;?></label><strong>
          </div>
       </div>

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
  </div>
</body>

</html>
