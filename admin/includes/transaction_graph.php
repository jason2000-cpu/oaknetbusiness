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
    data.addColumn('number', 'Add');
    data.addColumn('number', 'Invest');
    data.addColumn('number', 'Withdraw');

    data.addRows([
        <?php
        for ($month = 1; $month <= 12; $month++) {
            $monthName = $monthNames[$month - 1];
            $addCount = $addCounts[$month - 1];
            $investCount = $investCounts[$month - 1];
            $withdrawCount = $withdrawCounts[$month - 1];
            echo "['$monthName', $addCount, $investCount, $withdrawCount],";
        }
        ?>
    ]);

    var options = {
        title: 'Transaction Types', // Change the title to "Transaction Types"
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
            }, // Color for 'add' transactions
            1: {
                color: '#50211F'
            }, // Color for 'invest' transactions
            2: {
                color: '#A26D61'
            } // Color for 'withdraw' transactions
        }
    };

    var chart = new google.visualization.ComboChart(document.getElementById('post_interaction'));
    chart.draw(data, options);
}
</script>
<div id="post_interaction" style="height: 300px; width: 100%;"></div>
