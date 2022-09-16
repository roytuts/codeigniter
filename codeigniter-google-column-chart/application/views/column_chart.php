<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8"/>
        <title></title>
        <!-- Load Google chart api -->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.load("visualization", "1.1", {packages: ['bar', 'timeline']});
            google.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    [{type: 'string', label: 'Year'}, {type: 'number', label: 'Sales'}, 'Expenses', 'Profit'],
					<?php
						foreach ($chart_data as $data) {
							echo '[' . $data->performance_year . ',' . $data->performance_sales . ',' . $data->performance_expense . ',' . $data->performance_profit . '],';
						}
					?>
                ]);

                var options = {
                    chart: {
                        title: 'Company Performance',
                        subtitle: 'Sales, Expenses, and Profit: <?php echo $min_year . ' - ' . $max_year; ?>'
                    }
                };

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                chart.draw(data, options);
            }
        </script>
    </head>
    <body>        
        <div id="columnchart_material" style="width: 900px; height: 500px;"></div>
    </body>
</html>
