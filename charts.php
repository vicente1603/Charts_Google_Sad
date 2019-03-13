<?php  
 $connect = mysqli_connect("localhost", "root", "", "csv_database");  
 $query = "SELECT BRAND, count(*) as number FROM estoque GROUP BY BRAND";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Chart PIE</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Brand', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["BRAND"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentual de marcas nacionais ou privadas',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  
           <br /><br />  
           <div style="width:900px;">  
                <h3 align="center"> Google Chart com PHP Mysql</h3>  
                <br />  
                <div id="piechart" style="width: 900px; height: 500px;"></div>  
           </div>  
      </body>  
 </html>  