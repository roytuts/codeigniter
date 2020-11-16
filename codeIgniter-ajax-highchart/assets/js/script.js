$(function () {

    // Set the default dates
    var startDate = Date.create().addDays(-6), // 7 days ago
            endDate = Date.create(); // today

    var range = $('#range');

    // Show the dates in the range input
    range.val(startDate.format('{yyyy}-{MM}-{dd}') + ' - '
            + endDate.format('{yyyy}-{MM}-{dd}'));

    // Load chart
    ajaxLoadChart(startDate, endDate);

    range.daterangepicker({
        startDate: startDate,
        endDate: endDate,
        ranges: {
            'Today': ['today', 'today'],
            'Yesterday': ['yesterday', 'yesterday'],
            'Last 7 Days': [Date.create().addDays(-6), 'today'],
            'Last 30 Days': [Date.create().addDays(-29), 'today']
        }
    }, function (start, end) {
        ajaxLoadChart(start, end);
    });

    // Function for loading data via AJAX and showing it on the chart
    function ajaxLoadChart(startDate, endDate) {
        // If no data is passed (the chart was cleared)
        if (!startDate || !endDate) {
            return;
        }
        // Otherwise, issue an AJAX request
        $.post('http://localhost/codeIgniter-ajax-highchart/index.php/highchart/get_chart_data', {
            start: startDate.format('{yyyy}-{MM}-{dd}'),
            end: endDate.format('{yyyy}-{MM}-{dd}')
        }, function (data) {
            if ((data.indexOf("No record found") > -1)
                    || (data.indexOf("Date must be selected.") > -1)) {
                $('#msg').html('<span style="color:red;">' + data + '</span>');
            } else {
                $('#msg').empty();
                $('#chart').highcharts({
                    chart: {
                        type: 'arearange',
                        zoomType: 'x'
                    },
                    title: {
                        text: 'Temperature variation by day'
                    },
                    xAxis: {
                        type: 'datetime'
                    },
                    yAxis: {
                        title: {
                            text: null
                        }
                    },
                    tooltip: {
                        crosshairs: true,
                        shared: true,
                        valueSuffix: '°C'
                    },
                    legend: {
                        enabled: false
                    },
                    series: [{
                            name: 'Temperatures',
                            data: data
                        }]
                });
            }
        }, 'json');
    }
});
