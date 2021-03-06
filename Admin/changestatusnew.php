<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
      width: 50em;
      height: 31em;
      border: 2px groove;
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
<body>
<!--div class="container" -->
<div class="container design">

  <table class="table table-bordered" class="table table-stripted" id="t_id" >
  <?php 
          define('DB_SERVER', 'localhost');
          define('DB_USERNAME', 'root');
          define('DB_PASSWORD', 'qaz8866');
          define('DB_DATABASE', 'projectdb');
          $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die("unable to connect");
          $sql = "SELECT A.Complaint_id, A.Date, D.Complaint_type, C.Status, B.Operator_id,B.Operator_name FROM complaint_master A, operator_master B, complaint_status_master C, complaint_type_master D WHERE B.Operator_id=A.Operator_id AND C.Status_id=A.Status_id AND A.Complaint_type_id = D.Complaint_type_id";
          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
          
        echo "<tr><th>Complaint id</th><th>type</th>
  <th>Date</th>
  <th>Status</th>
  <th>Operator id</th>
  <th>Operator name</th>
  <th>Action</th>
  </tr>";
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
              <td class='edit_row'><a href='#' class ='btn btn-info' type='button'>Edit</a></td>
              </tr>
              
         <?php
            }
        } 
        

?>
</table>
</div>
<br/>

  
  
    <!-- container body -->
    <!-- ########################################################################################## -->
    <div id="complaintRegistration">
      <form class="form-horizontal" method="POST" id="edit_form">
        <span id="close">X</span>
      <div class="form-group">
          <div class="col-sm-12">
              <div class="col-sm-2">
                  <label for="complaint_id" class="ui-hidden-accessible">Complaint_id:</label>
              </div>
              <div class="col-sm-10">
                  <input type="text" name="complaintId" id="complaintId" class="form-control"/>
             </div>
          </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-12">
                <div class="col-sm-2">
                    <label for="complaintType" class="ui-hidden-accessible">Complaint Type:</label>
                </div>
                <div class="col-sm-10">
                    <input type="text" name="complaint_type" id="complaint_type" class="form-control" disabled>
                </div>
            </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-12">
              <div class="col-sm-2">
                  <label for="complaintDate" class="ui-hidden-accessible ">Date of complaint :</label>
              </div>
              <div class="col-sm-10">
                  <input type="text" name="complaintDate" id="complaintDate" class="form-control" disabled>
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
                      $result2 = mysqli_query($conn,$status);
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
            <label for="Operator_id" class="ui-hidden-accessible">Operator_id:</label>
          </div>
          <div class="col-sm-10">
             <input type="text" class="form-control" name="operator_id" id="operator_id">
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
                      $result3 = mysqli_query($conn,$operator);
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
    document.getElementById('operator_id').value = tr_parent.querySelector('.row_opid').innerHTML;
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
//error_reporting(0);
if(isset($_POST['submit'])){
  $status = $_POST['complaintStatus'];
  $operator_id = $_POST['operator_id'];
  $operator_name = $_POST['operator_name'];
  $complaint_id = $_POST['complaintId'];
  $sql2 = "SELECT Status_id FROM complaint_status_master WHERE Status='$status' ";
  $result2 = mysqli_query($conn,$sql2);
  while($row=mysqli_fetch_assoc($result2)){
    $s_id = $row['Status_id'];
    }
  $sql4 = "UPDATE complaint_master SET Status_id = '$s_id',Operator_id = '$operator_id' WHERE Complaint_id ='$complaint_id' ";
  $result4 = mysqli_query($conn,$sql4);
  echo "<script>
          alert('Record is updated successfully.:)');
          window.location.href='changestatus.php';
          </script>" ;
  }
?>


    
</body>
</html>