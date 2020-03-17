<html>
<head>
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
<h3> Add Complaint Type</h3>
<div class="container design">

 <table class="table table-bordered" class="table table-stripted" id="t_id" >
<?php 
// For Delete the Record
	$connect = mysqli_connect("localhost","root","","projectdb") or die("unable to connect");
	if(isset($_GET['id'])){
		$hide_id = $_GET['id'];
		//echo $delete_id;
		$query = "UPDATE complaint_type_master SET Flag=0 WHERE Complaint_type_id = '$hide_id'";
		if(mysqli_query($connect,$query)){
				echo "<script>
  alert('Data is hiden successfully...');
  window.location.href='addComplainttype.php';
  </script>" ;
				
			}
			
   }
?>
<!-- For displaying records of Role master table -->
<?php
	
	$sql = "SELECT * FROM complaint_type_master WHERE Flag='1'";
	$result = mysqli_query($connect,$sql);
	$id ='';
	echo "<tr><td>Complaint type id</td><td>Complaint type</td><td>Hide</td></tr>";
	while($row = mysqli_fetch_assoc($result))
	{
		$id = $row['Complaint_type_id'];
		//echo $id;
?>
	<tr>
		<td><?php echo $row['Complaint_type_id'] ?></td>
		<td><?php echo $row['Complaint_type'] ?></td>
		<td><button class ="btn btn-dafault" name="hide" id="hide"><a href="addComplainttype.php?id=<?= $id ?>">Hide</button></td> 
	</tr>
	
	<?php 

	 }  //end of while loop
	?>	

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
  window.location.href='addComplainttype.php';
  </script>" ;
     }
     ?>
	</body>
	</html>