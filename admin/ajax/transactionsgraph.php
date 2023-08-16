<?php


// Create a new instance of the App class
$app = new App();

// Data array to hold the data for the chart
$data_array = [['Day of Week', 'Transactions']];

// Define an array to map the numeric representation of the day to the corresponding label
$day_labels = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

// Loop through the last 7 days to get the count of transactions per day
for ($i = 6; $i >= 0; $i--) {
    $current_day = date('Y-m-d', strtotime("-$i days")); // Get the date for the current day
    $day_of_week = $day_labels[date('w', strtotime($current_day))]; // Get the label for the day of the week

    // Calculate the start and end time for the current day
    $start_time = strtotime($current_day . ' 00:00:00');
    $end_time = strtotime($current_day . ' 23:59:59');

    // Query to get the count of transactions for the current day
    $query = "SELECT * FROM transaction WHERE DATE(created_at) = '$current_day'";
    
    // Use the custom function to get the count of transactions
    $transaction_count = $app->count($query);

    // Add the data for the current day to the data array
    $data_array[] = [$day_of_week, $transaction_count];
}
?>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Transactions in the Last Week from Today</h4>
        <div class="chart-wrapper">
            <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable(<?php echo json_encode($data_array); ?>);
                var options = {
                    title: 'Transactions by Day',
                    curveType: 'function',
                    legend: {
                        position: 'bottom'
                    }
                };
                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                chart.draw(data, options);
            }
            </script>
            <div id="curve_chart" style="width: 100%; height: auto"></div>
        </div>
    </div>
</div>