<?php
        error_reporting(0);

        include($_SERVER["DOCUMENT_ROOT"].'/Project/connection.php');  // This file is for establish connection with database           
        
        include($_SERVER["DOCUMENT_ROOT"].'/Project/checklogin.php');  // This file check if user is not logged in than redirect to login page  
          
        include($_SERVER["DOCUMENT_ROOT"].'/Project/sessionname.php'); // This file stores user firstname in session variable and display it on the page


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
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!-- CSS for datatables-->
  <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <!-- Custom CSS for datatables-->
  <link href="css/datatable.css" rel="stylesheet">
  <style type="text/css">

    .form-control{
          width: auto;
          margin-left: 30%;
    }  
    .design{
        margin-top:20px;
        /*display:relative;*/
        margin-left:10px;
        /*float:right;*/
      }
    
  #addType{
      position: relative;
      display: none;
      margin: 1% auto;
      padding: 4%;
      text-align: center;
      background: white;
      width: 30em;
      height: 12em;
      border: 2px groove;
    }
  #add_type{
    margin-bottom: 15px;
  }  
    #close{
      overflow: hidden;
      background: red; 
      border: 2px solid black; 
      padding: 3px; 
      font-size: 14px; 
      cursor: pointer; 
      font-weight: 700;
      position: absolute;
      top: 0;
      right: 0;
      margin-top: 5px;
      margin-right: 5px;
    }
    tr,th{
      text-align: center;
      
    }
  </style>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="dashboard.php">Welcome <?php error_reporting(0); echo $Firstname; ?></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="dashboard.php">
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
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Role Master">
          <a class="nav-link" href="changerole.php">
            <i class="fa fa-address-book" style="margin-left:2px"></i>
            <span class="nav-link-text">Role Master</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="User Master">
          <a class="nav-link" href="usermaster.php">
            <i class="fa fa-group" style="margin-left:2px"></i>
            <span class="nav-link-text">User Master</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add new Complaint Type">
          <a class="nav-link" href="addComplainttype1.php">
            <i class="fa fa-pencil-square-o" style="margin-left:2px"></i>
            <span class="nav-link-text">Add new Complaint Type</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Account Setting">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-cog" style="margin-left: 3px;"></i>
            <span class="nav-link-text"> &nbsp Account Setting</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="adminprofileform.php">
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
              <div class="dropdown-message small">10 new users have registered </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <!--span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span-->
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">complaint id 2 has been solved by employee.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <!--span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span-->
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">You have two reassign request.</div>
            </a>
            <div class="dropdown-divider"></div>
            <!--a class="dropdown-item small" href="#">View all alerts</a-->
          </div>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="../logout.php">
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
          <a href="dashboard.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Add Complaint Type</li>
      </ol>
      <div class="row">
        <div class=" container design">
          <div class="card-header">
            <i class="fa fa-table"></i> &nbsp Complaint List
          </div>

 <table class="table table-bordered" class="table table-stripted" id="t_id" >
<?php 
// For Delete the Record
  if(isset($_GET['id'])){
    $hide_id = $_GET['id'];
    //echo $delete_id;
    $query = "UPDATE complaint_type_master SET Flag=0 WHERE Complaint_type_id = '$hide_id'";
    if(mysqli_query($connect,$query)){
        echo "<script>
  alert('Data is hiden successfully...');
  window.location.href='addComplainttype1.php';
  </script>" ;
        
      }
      
   }
?>
  
<!-- For displaying records of Role master table -->
<?php
  
  $sql = "SELECT * FROM complaint_type_master WHERE Flag='1'";
  $result = mysqli_query($connect,$sql);
  $id ='';
  echo "<thead><tr><th>Complaint type id</th><th>Complaint type</th><th>Action</th></tr></thead><tbody>";
  while($row = mysqli_fetch_assoc($result))
  {
    $id = $row['Complaint_type_id'];
    //echo $id;
?>
  <tr>
    <td><?php echo $row['Complaint_type_id'] ?></td>
    <td><?php echo $row['Complaint_type'] ?></td>
    <td><button class ="btn btn-dafault" name="hide" id="hide"><a href="addComplainttype1.php?id=<?= $id ?>" style="text-decoration: none">Hide</button></td> 
  </tr>
  
  <?php 

   }  //end of while loop
  ?>  
  </tbody>
  </table>
  <input type="submit"  class="btn btn-primary" value="Add New Type" class="add_type" id="add_type">
    
      <form action="#" class="form-horizontal" method="POST" id="addType" name="addType">
        <span id="close">X</span>
        <div class="form-group">
          <div class="col-sm-12">
              <div class="col-sm-2">
                  <label for="role_name" class="ui-hidden-accessible ">Complaint Type:</label>
              </div>
              <div class="col-sm-10">
                  <input type="text" name="type" id="type" class="form-control" required>
             </div>
          </div>
        </div>
        <button class="btn btn-primary" name="submit" id="submit">Submit</button>
      </form>
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
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
         $('#t_id').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
    </script>

    <script>
      $(document).ready(function(){
        $("#add_type").click(function(e) {
          $("#addType").show();
          e.preventDefault();
        });
      });
      document.getElementById('close').addEventListener('click', function(){ this.parentNode.style.display = 'none';}, false);
     </script>
     <?php
     if(isset($_POST['submit'])){
      $sql1 = "INSERT INTO complaint_type_master(Complaint_type,Flag) VALUES('".$_POST["type"]."','1')";
      $result3 = mysqli_query($connect,$sql1);
      echo "<script>
  alert('Data is successfully submitted.:)');
  window.location.href='addComplainttype1.php';
  </script>" ;
     }
     ?>

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
