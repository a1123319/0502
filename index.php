<?php 
$link = mysqli_connect("localhost", "root", "", "0502");
$sql = "SELECT * FROM `0502`";
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['city', 'data']
          <?php 
          if ($result = mysqli_query($link, $sql)) {
            while ($row = $result->fetch_assoc()) {
              $city = $row['city'];
              $data = $row['data'];
              echo ",['$city', $data]";
            }
          }
          ?>
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
    <?php 
          if ($result = mysqli_query($link, $sql)) {
            while ($row = $result->fetch_assoc()) {
              $city = $row['city'];
              $data = $row['data'];
              echo ",['$city', '$data']";
            }
          }
          ?>
  </body>
</html>
