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
  <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!-- Custom css for datatable -->
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
    #edit_form{
      position: relative;
      display: none;
      margin: 1% auto;
      padding: 4%;
      text-align: center;
      background: white;
      height: auto;
      border: 2px groove;
    }
    #close{
      overflow: hidden;
     
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
     #x:hover{
      background-color: red;
      color: white;
    }
    tr,th{
      text-align: center;
    }
    .col-sm-2{
      padding-right: 0px;
    }
    
    input,select{
      margin-top: -30px;
    }
  </style>

  <style> /* Css for modal popup */
    .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50%;
}

/* The Close Button */
.closee {
    color: #aaaaaa;
    text-align: right;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.closee:hover,
.closee:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="dashboard.php">शिकायतBox</a>
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
            <h6 class="dropdown-header">Notification:</h6>
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
            <!--div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div-->
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
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Complaint List</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="design">
        <div class="card-header">
          <i class="fa fa-table"></i> &nbsp Complaint List</div>
          <table class="table table-bordered" class="table table-stripted" id="t_id" >
  <?php 
          
          $sql = "SELECT A.Complaint_id, A.Date, D.Complaint_type, C.Status, B.Operator_id,B.Operator_name FROM complaint_master A, operator_master B, complaint_status_master C, complaint_type_master D WHERE B.Operator_id=A.Operator_id AND C.Status_id=A.Status_id AND A.Complaint_type_id = D.Complaint_type_id  ORDER BY A.Complaint_id DESC";
          $result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
          $count = mysqli_num_rows($result);
          
        echo "<thead>
              <tr>
                  <th>Complaint id</th>
                  <th>Date</th>
                  <th>Type</th>
                  <th>Status</th>
                  <th>Operator id</th>
                  <th>Operator name</th>
                  <th>Action</th>
              </tr>
              </thead>
              <tbody>";
        if (mysqli_num_rows($result) > 0) {
          // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
        ?>
              
              <tr>
              <td class='row_id'><?php echo $row["Complaint_id"] ?></td>
              <td class='row_date'><?php echo $row["Date"] ?></td>
              <td class='row_type'><?php echo $row["Complaint_type"] ?></td>
              <td class='row_status'><?php echo $row["Status"] ?></td>
              <td class='row_opid'><?php echo $row["Operator_id"] ?></td>
              <td class='row_opname'><?php echo $row["Operator_name"] ?></td>
              <td class='edit_row'><a href='#' class ='btn btn-primary' type='button'>Edit</a></td>
              </tr>
              
         <?php
            }
        } 
        

?>
</tbody>
</table>

        <!-- The Modal  this is hidden .when user click this part is visile-->
        <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
        <h5>Change status Or operator</h5>
        <span class="closee">&times;</span>
        <!-- Edit Form -->
          <div id="complaintRegistration">
      <form class="form-horizontal" method="POST" id="edit_form">
        <div class="form-group">
          <div class="col-sm-12">
              <div class="col-sm-2">
                  <label for="complaint_id" class="ui-hidden-accessible">Complaint_id:</label>
              </div>
              <div class="col-sm-10">
                  <input type="text" name="complaintId" id="complaintId" class="form-control" readonly/>
             </div>
          </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-12">
                <div class="col-sm-2">
                    <label for="complaintType" class="ui-hidden-accessible">Complaint Type:</label>
                </div>
                <div class="col-sm-10">
                    <input type="text" name="complaint_type" id="complaint_type" class="form-control" readonly/>
                </div>
            </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-12">
              <div class="col-sm-2">
                  <label for="complaintDate" class="ui-hidden-accessible ">Date of complaint :</label>
              </div>
              <div class="col-sm-10">
                  <input type="text" name="complaintDate" id="complaintDate" class="form-control" readonly/>
             </div>
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-12">
            <div class="col-sm-2">
              <label for="status" class="ui-hidden-accessible">Status:</label>
            </div>
          <div class="col-sm-10">
             <select name="complaintStatus" id="complaintStatus" class="form-control" >
                   
                  <?php 
                      $status = "SELECT Status FROM complaint_status_master";
                      $result2 = mysqli_query($connect,$status);
                      while($row = mysqli_fetch_assoc($result2)){
                   ?>
                      <option value="<?php echo $row['Status'] ?>"><?php echo $row['Status']; ?></option>
                  <?php 
                    }
                  ?>       
                      
             </select>
        </div>
      </div>
    </div>
    
      
    
     <div class="form-group">
        <div class="col-sm-12">
          <div class="col-sm-2">
            <label for="Operator_name" class="ui-hidden-accessible">Operator_name:</label>
          </div>
          <div class="col-sm-10">
             <select name="operator_name" id="operator_name" class="form-control">
                <?php 
                      $operator = "SELECT Operator_name FROM operator_master";
                      $result3 = mysqli_query($connect,$operator);
                      while($row = mysqli_fetch_assoc($result3))
                        {
                  ?>
                          <option value="<?php echo $row['Operator_name']; ?>"><?php echo $row['Operator_name']; ?></option>      
                     
                  <?php

                        }        
                  ?>
             </select>
         </div>
       </div>
     </div>
        <button name="submit" name="submit" class="btn btn-md btn-primary" >Submit</button>
      </form>
      </div>

  </div>
</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closee")[0];

for(i=0;i< <?php echo $count;?>;i++){
// Get the button that opens the modal
var btn = document.getElementsByClassName("btn btn-primary")[i];
// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</div>
  <br/>
</div>
    
<script>


// gets all the .edit_row cells, registers click to each one
var edit_row = document.querySelectorAll('#t_id .edit_row');
for(var i=0; i<edit_row.length; i++) {
  edit_row[i].addEventListener('click', function(){
    // get parent row, add data from its cells in form fields
    var tr_parent = this.parentNode;
    document.getElementById('complaintId').value = tr_parent.querySelector('.row_id').innerHTML;
    document.getElementById('complaint_type').value = tr_parent.querySelector('.row_type').innerHTML;
    document.getElementById('complaintDate').value = tr_parent.querySelector('.row_date').innerHTML;
    document.getElementById('complaintStatus').value = tr_parent.querySelector('.row_status').innerHTML;
    //document.getElementById('operator_id').value = tr_parent.querySelector('.row_opid').innerHTML;
    document.getElementById('operator_name').value = tr_parent.querySelector('.row_opname').innerHTML;

    // display the form, and focus on a form field
    document.getElementById('edit_form').style.display = 'block';
    document.getElementById('complaintStatus').focus();
  }, false);
}

// to hide #edit_form when click on #cls_f button
document.getElementById('close').addEventListener('click', function(){ this.parentNode.style.display = 'none';}, false);
</script>


<?php
//For inserting changes in status or operator in database
//error_reporting(0);
if(isset($_POST['submit'])){
  $status = $_POST['complaintStatus'];
  //$operator_id = $_POST['operator_id'];
  $operator_name = $_POST['operator_name'];
  $complaint_id = $_POST['complaintId'];
  $sql2 = "SELECT Status_id FROM complaint_status_master WHERE Status='$status' ";
  $result2 = mysqli_query($connect,$sql2);
  while($row=mysqli_fetch_assoc($result2)){
    $s_id = $row['Status_id'];
    }
    $sql3 = "SELECT Operator_id FROM operator_master WHERE Operator_name='$operator_name' ";
  $result3 = mysqli_query($connect,$sql3);
  while($row=mysqli_fetch_assoc($result3)){
    $operator_id = $row['Operator_id'];
    }
  $sql4 = "UPDATE complaint_master SET Status_id = '$s_id',Operator_id = '$operator_id' WHERE Complaint_id ='$complaint_id' ";
  $result4 = mysqli_query($connect,$sql4);
  echo "<script>
          alert('Record is updated successfully.:)');
          window.location.href='changestatus.php';
          </script>" ;
  }
?>
<!-- End of complaint table -->
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
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
