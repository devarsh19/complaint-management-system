<?php

 $query="SELECT tm.Complaint_type,Count(cm.Complaint_id) as count FROM complaint_master as cm inner join operator_complaint_mapping as sm on cm.Complaint_type_id = sm.Complaint_type_id inner join complaint_type_master as tm on sm.Complaint_type_id = tm.Complaint_type_id WHERE cm.Operator_id ='$o_id' group by tm.Complaint_type";

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
                ['Complaint_type','count'],
                    <?php
                
                    while($row=mysqli_fetch_array($result))
                    {
                    
                        echo "['".$row["Complaint_type"]."',".$row["count"]."],";
                    }
                    ?>
                ]);
                        var options={
                            title:'',
                            width:900,
                            height:600,
                            is3D:true,
                        };
                        var chart=new google.visualization.PieChart(document.getElementById('piechart'));
                        chart.draw(data,options);
                        
        }
    </script>

   
</head>
<body>
     <div style="width:900px;">
     <h3 align="center"
     ></h3>
     <div id="piechart" style="width:900px;height:500px" ></div>
     </div>
</body>
</html>