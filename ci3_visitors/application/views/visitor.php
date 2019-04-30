<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Codeigniter Vistor Tracking System</title>
        <script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.min.js"></script>
        <script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/exporting.js"></script>
        <script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/highcharts.js"></script>
        <script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/jquery.tsv-0.96.min.js"></script>
    </head>
    <body>
        <div class="clear"></div>
        <div>
            <div style="font-size: 30px;font-weight: bold; color: #129FEA;">Visits statistics</div>
            <script type="text/javascript">
                $(function () {
                    var chart;
                    $(document).ready(function () {
                        Highcharts.setOptions({
                            colors: ['#32353A']
                        });
                        chart = new Highcharts.Chart({
                            chart: {
                                renderTo: 'container',
                                type: 'column',
                                margin: [50, 30, 80, 60]
                            },
                            title: {
                                text: 'Visits Today: <?php echo date('d-m-Y'); ?>'
                            },
                            xAxis: {
                                categories: [
<?php
$i = 1;
$count = count($chart_data_today);
foreach ($chart_data_today as $data) {
    if ($i == $count) {
        echo "'" . $data->hour . "'";
    } else {
        echo "'" . $data->hour . "',";
    }
    $i++;
}
?>
                                ],
                                labels: {
                                    rotation: -45,
                                    align: 'right',
                                    style: {
                                        fontSize: '9px',
                                        fontFamily: 'Tahoma, Verdana, sans-serif'
                                    }
                                }
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Visits'
                                }
                            },
                            legend: {
                                enabled: false
                            },
                            tooltip: {
                                formatter: function () {
                                    return '<b>' + this.x + '</b><br/>' +
                                            'Visits: ' + Highcharts.numberFormat(this.y, 0);
                                }
                            },
                            series: [{
                                    name: 'Visits',
                                    data: [
<?php
$i = 1;
$count = count($chart_data_today);
foreach ($chart_data_today as $data) {
    if ($i == $count) {
        echo $data->visits;
    } else {
        echo $data->visits . ",";
    }
    $i++;
}
?>
                                    ],
                                    dataLabels: {
                                        enabled: false,
                                        rotation: 0,
                                        color: '#F07E01',
                                        align: 'right',
                                        x: -3,
                                        y: 20,
                                        formatter: function () {
                                            return this.y;
                                        },
                                        style: {
                                            fontSize: '11px',
                                            fontFamily: 'Verdana, sans-serif'
                                        }
                                    },
                                    pointWidth: 20
                                }]
                        });
                    });
                });
            </script>
            <div id="container" style="min-width: 300px; height: 180px; margin: 0 auto"></div>
        </div>
        <div class="clear">&nbsp;</div>
        <div>
            <div>
                <div>
                    <h4>Today</h4> <?php echo $visits_today; ?> Visits
                </div>
                <div>
                    <h4>Last week</h4> <?php echo $visits_last_week; ?> Visits
                </div>
            </div>
        </div>
        <div class="clear">&nbsp;</div>
        <div>
            <div><span style="font-size: 30px;font-weight: bold; color: #129FEA;">Check Visits statistics</span>
                <div style="float: right;margin: -4px 20px 0 5px;">
                    <form id="select_month_year" style="margin: 0;padding: 0;" method="post">
                        <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
                        <?php echo $this->site_config->generate_months() . '&nbsp;&nbsp;' . $this->site_config->generate_years(); ?>
                        <input type="button" name="submit" id="chart_submit_btn" value="Get Data"/>
                    </form>
                </div>
            </div>
            <script type="text/javascript">
                $(function () {
                    var chart;
                    $(document).ready(function () {
                        Highcharts.setOptions({
                            colors: ['#32353A']
                        });
                        chart = new Highcharts.Chart({
                            chart: {
                                renderTo: 'month_year_container',
                                type: 'column',
                                margin: [50, 30, 80, 60]
                            },
                            title: {
                                text: 'Visits'
                            },
                            xAxis: {
                                categories: [
<?php
$i = 1;
$count = count($chart_data_curr_month);
foreach ($chart_data_curr_month as $data) {
    if ($i == $count) {
        echo "'" . $data->day . "'";
    } else {
        echo "'" . $data->day . "',";
    }
    $i++;
}
?>
                                ],
                                labels: {
                                    rotation: -45,
                                    align: 'right',
                                    style: {
                                        fontSize: '9px',
                                        fontFamily: 'Tahoma, Verdana, sans-serif'
                                    }
                                }
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Visits'
                                }
                            },
                            legend: {
                                enabled: false
                            },
                            tooltip: {
                                formatter: function () {
                                    return '<b>' + this.x + '</b><br/>' +
                                            'Visits: ' + Highcharts.numberFormat(this.y, 0);
                                }
                            },
                            series: [{
                                    name: 'Visits',
                                    data: [
<?php
$i = 1;
$count = count($chart_data_curr_month);
foreach ($chart_data_curr_month as $data) {
    if ($i == $count) {
        echo $data->visits;
    } else {
        echo $data->visits . ",";
    }
    $i++;
}
?>
                                    ],
                                    dataLabels: {
                                        enabled: false,
                                        rotation: 0,
                                        color: '#F07E01',
                                        align: 'right',
                                        x: -3,
                                        y: 20,
                                        formatter: function () {
                                            return this.y;
                                        },
                                        style: {
                                            fontSize: '11px',
                                            fontFamily: 'Verdana, sans-serif'
                                        }
                                    },
                                    pointWidth: 20
                                }]
                        });
                    });
                });
            </script>
            <script type="text/javascript">
                $("#chart_submit_btn").click(function (e) {
                    // get the token value
                    var cct = $("input[name=csrf_token_name]").val();
                    //reset #container
                    $('#month_year_container').html('');
                    $.ajax({
                        url: "http://localhost/ci3_visitors/index.php/visitorcontroller/get_chart_data", //The url where the server req would we made.
                        //async: false,
                        type: "POST", //The type which you want to use: GET/POST
                        data: $('#select_month_year').serialize(), //The variables which are going.
                        dataType: "html", //Return data type (what we expect).
                        csrf_token_name: cct,
                        success: function (response) {
                            if (response.toLowerCase().indexOf("no data found") >= 0) {
                                $('#month_year_container').html(response);
                            } else {
                                //build the chart
                                var tsv = response.split(/n/g);
                                var count = tsv.length - 1;
                                var cats_val = new Array();
                                var visits_val = new Array();
                                for (i = 0; i < count; i++) {
                                    var line = tsv[i].split(/t/);
                                    var line_data = line.toString().split(",");
                                    var date = line_data[0];
                                    var visits = line_data[1];
                                    cats_val[i] = date;
                                    visits_val[i] = parseInt(visits);
                                }
                                var _categories = cats_val;
                                var _data = visits_val;
                                var chart;
                                $(document).ready(function () {
                                    Highcharts.setOptions({
                                        colors: ['#32353A']
                                    });
                                    chart = new Highcharts.Chart({
                                        chart: {
                                            renderTo: 'month_year_container',
                                            type: 'column',
                                            margin: [50, 30, 80, 60]
                                        },
                                        title: {
                                            text: 'Visits'
                                        },
                                        xAxis: {
                                            categories: _categories,
                                            labels: {
                                                rotation: -45,
                                                align: 'right',
                                                style: {
                                                    fontSize: '9px',
                                                    fontFamily: 'Tahoma, Verdana, sans-serif'
                                                }
                                            }
                                        },
                                        yAxis: {
                                            min: 0,
                                            title: {
                                                text: 'Visits'
                                            }
                                        },
                                        legend: {
                                            enabled: false
                                        },
                                        tooltip: {
                                            formatter: function () {
                                                return '<b>' + this.x + '</b><br/>' +
                                                        'Visits: ' + Highcharts.numberFormat(this.y, 0);
                                            }
                                        },
                                        series: [{
                                                name: 'Visits',
                                                data: _data,
                                                dataLabels: {
                                                    enabled: false,
                                                    rotation: 0,
                                                    color: '#F07E01',
                                                    align: 'right',
                                                    x: -3,
                                                    y: 20,
                                                    formatter: function () {
                                                        return this.y;
                                                    },
                                                    style: {
                                                        fontSize: '11px',
                                                        fontFamily: 'Verdana, sans-serif'
                                                    }
                                                },
                                                pointWidth: 20
                                            }]
                                    });
                                });
                            }
                        }
                    });
                });
            </script>
            <div id="month_year_container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
        </div>
    </body>
</html>