<script>
window.onload = function() {

    var chart = new CanvasJS.Chart("home", {
        animationEnabled: true,

        axisX: {
            minimum: new Date(2015, 01, 25),
            maximum: new Date(2017, 02, 15),
            valueFormatString: ""
        },
        axisY: {

            titleFontColor: "#4F81BC",
            includeZero: true,
            suffix: ""
        },
        data: [{
            indexLabelFontColor: "darkSlateGray",
            name: "",
            type: "area",
            yValueFormatString: "#,##0.0mn",
            dataPoints: [{
                    x: new Date(2015, 02, 1),
                    y: 74.4,
                    label: ""
                },
                {
                    x: new Date(2015, 05, 1),
                    y: 61.1,
                    label: ""
                },
                {
                    x: new Date(2015, 08, 1),
                    y: 47.0,
                    label: ""
                },
                {
                    x: new Date(2015, 11, 1),
                    y: 48.0,
                    label: ""
                },
                {
                    x: new Date(2016, 02, 1),
                    y: 74.8,
                    label: ""
                },
                {
                    x: new Date(2016, 05, 1),
                    y: 51.1,
                    label: ""
                },
                {
                    x: new Date(2016, 08, 1),
                    y: 40.4,
                    label: ""
                },
                {
                    x: new Date(2016, 11, 1),
                    y: 45.5,
                    label: ""
                },
                {
                    x: new Date(2017, 02, 1),
                    y: 78.3,
                    label: ""
                }
            ]
        }]
    });
    chart.render();

}
</script>
<div id="home" style="height: 300px; width: 100%;"></div>