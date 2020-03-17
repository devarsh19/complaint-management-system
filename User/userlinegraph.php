
<?php
 $connect=mysqli_connect("localhost","root","","projectdb");
 $query="SELECT monthname(cm.Date) as month, Count(cm.Complaint_id) as TotalComplaints FROM complaint_master as cm inner join userid_complaintid_mapping as sm on cm.Complaint_id = sm.Complaint_id  WHERE sm.user_id ='$u_id'  group by month order by cm.Date";

 $result=mysqli_query($connect,$query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Massive Electronics</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current',{'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart()
        {
                 var data=google.visualization.arrayToDataTable([
                ['month','TotalComplaints'],
                    <?php
                
                    while($row=mysqli_fetch_array($result))
                    {
                    
                        echo "['".$row["month"]."',".$row["TotalComplaints"]."],";
                    }
                    ?>
                ]);
                        var options={
                            title:'percentage of TotalComplaints',
                            width:900,
                            height:600,
                            is3D:true,
                        };
                        var chart=new google.visualization.LineChart(document.getElementById('columnchart'));
                        chart.draw(data,options);
                        
        }
    </script>

   
</head>
<body>
     <div style="width:900px;">
     <h3 align="center"
     ></h3>
     <div id="columnchart" style="width:900px;height:500px" ></div>
     </div>
</body>
</html>