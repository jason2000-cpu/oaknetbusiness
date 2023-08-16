<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Sample data for the last six months
        var data = google.visualization.arrayToDataTable([
            ['Month', 'Add', 'Invest', 'Withdraw'],
            ['Jan', 20, 30, 10],
            ['Feb', 15, 25, 12],
            ['Mar', 22, 35, 8],
            ['Apr', 18, 27, 15],
            ['May', 25, 20, 10],
            ['Jun', 30, 18, 12],
        ]);

        var options = {
            chart: {
                title: 'Transaction Types: Last Six Months',
                subtitle: 'Add, Invest, and Withdraw Transactions',
            },
            bars: 'vertical',
            vAxis: {
                title: 'Number of Transactions',
                minValue: 0,
            },
            hAxis: {
                title: 'Months',
            },
            colors: ['#3366CC', '#109618', '#FF9900'], // Set custom colors for the bars
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
    </script>
</head>

<body>
    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
</body>

</html>