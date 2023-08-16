<?php
include "../includes/header.php";
include "../../config/config.php";
include "../../libs/App.php";

// Create a new instance of the App class
$app = new App();

$session = session_id();
$time = time();
$time_out_in_seconds = 05;
$time_out = $time - $time_out_in_seconds;

// Check if the session exists in the users_online table
$query = "SELECT * FROM users_online WHERE session ='{$session}'";
$count = $app->count($query);

if ($count == 0) {
    // Insert a new row into the users_online table
    $query = "INSERT INTO users_online(session, time) VALUES(:session, :time)";
    $arr = [
        ':session' => $session,
        ':time' => $time
    ];
    
    $app->insertWithoutPath($query, $arr);
} else {
    // Update the existing row with the new time
    $query = "UPDATE users_online SET time = :time WHERE session = :session";
    $arr = [
        ':session' => $session, 
        ':time' => $time
    ];
    $app->updateToken($query, $arr);
}

// Data array to hold the data for the chart
$data_array = [['Day of Week', 'Day', 'Night']];

// Define an array to map the numeric representation of the day to the corresponding label
$day_labels = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

// Loop through the last 7 days to get the count of users online per day
for ($i = 6; $i >= 0; $i--) {
    // Calculate the start and end time for the current day
    $start_time = $time - ($i * 86400); // 86400 seconds in a day
    $end_time = $start_time + 86400; // Add 86400 seconds to get the end of the day

    // Get the count of users online during the day (within the current day)
    $query = "SELECT * FROM users_online WHERE time >= $start_time AND time <= $end_time";
    $day_count_user = $app->count($query);

    // Get the count of users online during the night (within the current day to the next day)
    $next_day_start_time = $start_time + 86400; // Start time for the next day
    $query = "SELECT * FROM users_online WHERE time > $end_time AND time <= $next_day_start_time";
    $night_count_user = $app->count($query);

    // Calculate the percentages
    $total_users = $day_count_user + $night_count_user;
    $day_percentage = ($total_users !== 0) ? ($day_count_user / $total_users) * 100 : 0;
    $night_percentage = ($total_users !== 0) ? ($night_count_user / $total_users) * 100 : 0;

    // Add the data for the current day to the data array
    $data_array[] = [$day_labels[date('w', $start_time)], $day_count_user, $night_count_user];
}
?>
<?php if(isset($_POST['displayUsersOnlinenow'])) :?>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Visit Hour In The Last Week From Today</h4>
        <div class="row mb-3 mt-4">
            <div class="col text-center">
                <p class="mb-2 text-dark">Day</p>
                <h4><span class="text-success mdi mdi-arrow-up-bold"></span>
                    <?php echo round($day_percentage, 2); ?> %</h4>
            </div>
            <div class="col text-center">
                <p class="mb-2 text-dark">Night</p>
                <h4><span class="text-danger mdi mdi-arrow-down-bold"></span>
                    <?php echo round($night_percentage, 2); ?> %</h4>
            </div>
        </div>
        <div class="chart-wrapper">
            <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable(<?php echo json_encode($data_array); ?>);
                var options = {
                    title: 'Visiting Hours',
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
<?php endif; ?>