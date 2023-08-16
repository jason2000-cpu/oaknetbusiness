<!-- Include Google Charts library -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {
    packages: ['corechart']
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Month');
    data.addColumn('number', 'Posts');
    data.addColumn('number', 'Comments');

    data.addRows([
        <?php
        $monthNames = [
          'January', 'February', 'March', 'April', 'May', 'June',
          'July', 'August', 'September', 'October', 'November', 'December'
        ];
        
        for ($month = 1; $month <= 12; $month++) {
          $monthName = $monthNames[$month - 1];
          $postCount = $postCounts[$month - 1];
          $commentCount = $commentCounts[$month - 1];
          echo "['$monthName', $postCount, $commentCount],";
        }
      ?>
    ]);

    var options = {
        title: 'Customer interactions',
        theme: 'light2',
        seriesType: 'bars',
        vAxes: {
            0: {
                title: 'Number',
                textStyle: {
                    fontSize: 12 // You can adjust the font size here
                },
                gridlines: {
                    count: 0
                } // Remove vertical gridlines
            },
            1: {
                title: 'Number',
                textStyle: {
                    fontSize: 12 // You can adjust the font size here
                },
                axisLines: { // Display axis line on the right vertical axis
                    show: true
                }
            }
        },
        hAxis: {
            title: 'Month',
            textStyle: {
                fontSize: 12 // You can adjust the font size here
            },
            gridlines: {
                count: 0
            } // Remove horizontal gridlines
        },
        chartArea: {
            width: '80%',
            height: '70%'
        },
        series: {
            0: {
                color: '#070606'
            }, // Color for Posts
            1: {
                color: '#50211F'
            } // Color for Comments
        }
    };

    var chart = new google.visualization.ComboChart(document.getElementById('post_interaction'));
    chart.draw(data, options);
}
</script>
<div id="post_interaction" style="height: 300px; width: 100%;"></div>