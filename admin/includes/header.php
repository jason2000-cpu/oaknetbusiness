<?php 
define("ADMINURL","http://localhost/trade/admin/");
?>
<?php 
session_start();

?>
<?php
if(!isset($_SESSION['username'])){
     echo "<script>window.location.href='http://localhost/trade/index.php'</script>";
}

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Oaknet inv.</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16"
        href="http://localhost/trade/admin/images/logoo-removebg-preview.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="http://localhost/trade/admin/images/logoo-removebg-preview.png">
    <!-- form plugins -->
    <link href="http://localhost/trade/admin/assets/plugins/jquery-steps/css/jquery.steps.css" rel="stylesheet">
    <!-- Dropify -->
    <link rel="stylesheet" href="http://localhost/trade/admin/assets/plugins/dropify/dist/css/dropify.min.css">
    <!-- Tagsinput -->
    <link rel="stylesheet"
        href="http://localhost/trade/admin/assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">
    <!-- Switchery -->
    <link href="http://localhost/trade/admin/assets/plugins/innoto-switchery/dist/switchery.min.css" rel="stylesheet" />
    <!-- Select 2 -->
    <link rel="stylesheet" href="http://localhost/trade/admin/assets/plugins/select2/css/select2.min.css">
    <!-- Touchspinner -->
    <link rel="stylesheet"
        href="http://localhost/trade/admin/assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css">
    <!-- Input mask -->
    <link rel="stylesheet"
        href="http://localhost/trade/admin/assets/plugins/jasny-bootstrap/dist/css/jasny-bootstrap.min.css">
    <!-- x-editable -->
    <link
        href="http://localhost/trade/admin/assets/plugins/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css"
        rel="stylesheet">
    <!-- Summernote -->
    <link href="http://localhost/trade/admin/assets/plugins/summernote/summernote.css" rel="stylesheet">
    <!-- Daterange picker -->
    <link href="http://localhost/trade/admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.css"
        rel="stylesheet">
    <!-- Clockpicker -->
    <link href="http://localhost/trade/admin/assets/plugins/clockpicker/css/bootstrap-clockpicker.min.css"
        rel="stylesheet">
    <!-- asColorpicker -->
    <link href="http://localhost/trade/admin/assets/plugins/jquery-asColorPicker/css/asColorPicker.min.css"
        rel="stylesheet">
    <!-- Material color picker -->
    <link
        href="http://localhost/trade/admin/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
        rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="http://localhost/trade/admin/assets/plugins/pickadate/themes/default.css">
    <link rel="stylesheet" href="http://localhost/trade/admin/assets/plugins/pickadate/themes/default.date.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet"
        href="http://localhost/trade/admin/assets/plugins/owl.carousel/dist/css/owl.carousel.min.css">
    <!-- JS Grid -->
    <link rel="stylesheet" href="http://localhost/trade/admin/assets/plugins/jsgrid/css/jsgrid.min.css">
    <link rel="stylesheet" href="http://localhost/trade/admin/assets/plugins/jsgrid/css/jsgrid-theme.min.css">
    <!-- Footable -->
    <link rel="stylesheet" href="http://localhost/trade/admin/assets/plugins/footable/css/footable.bootstrap.min.css">
    <!-- Bootgrid -->
    <link rel="stylesheet"
        href="http://localhost/trade/admin/assets/plugins/jquery-bootgrid/dist/jquery.bootgrid.min.css">
    <!-- Datatable -->
    <link href="http://localhost/trade/admin/assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="http://localhost/trade/admin/assets/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="http://localhost/trade/admin/fontawesome-free-6.2.0-web/css/all.css">
    <!-- full calendar -->
    <link href="http://localhost/trade/admin/assets/plugins/fullcalendar/css/fullcalendar.min.css" rel="stylesheet">
    <!-- styles css -->
    <link href="http://localhost/trade/admin/assets/css/style.css" rel="stylesheet">
    <!-- font awesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" /> -->



    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script> -->
    <!-- google chart --->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- ckeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
    <script>
    // 
    window.onload = function() {

        var chart1 = new CanvasJS.Chart("chartContainer1", {
            animationEnabled: true,
            axisX: {
                minimum: new Date(2015, 01, 25),
                maximum: new Date(2017, 02, 15),
                valueFormatString: "MMM YY",
                labelFormatter: function(e) {
                    return "";
                },
                tickLength: 0,
                lineThickness: 0,
                gridThickness: 0,
            },
            axisY: {
                title: "",
                includeZero: false,
                tickLength: 0,
                suffix: "",
                lineThickness: 0,
                gridThickness: 0,
                labelFormatter: function(e) {
                    return "";
                }
            },
            data: [{
                indexLabelFontColor: "darkSlateGray",
                name: "views",
                type: "area",
                yValueFormatString: "#,##0.0mn",
                toolTipContent: null, // Disable tooltips on hover
                dataPoints: [{
                        x: new Date(2015, 02, 1),
                        y: 74.4
                    },
                    {
                        x: new Date(2015, 05, 1),
                        y: 61.1
                    },
                    {
                        x: new Date(2015, 08, 1),
                        y: 47.0
                    },
                    {
                        x: new Date(2015, 11, 1),
                        y: 48.0
                    },
                    {
                        x: new Date(2016, 02, 1),
                        y: 74.8
                    },
                    {
                        x: new Date(2016, 05, 1),
                        y: 51.1
                    },
                    {
                        x: new Date(2016, 08, 1),
                        y: 40.4
                    },
                    {
                        x: new Date(2016, 11, 1),
                        y: 45.5
                    },
                    {
                        x: new Date(2017, 02, 1),
                        y: 78.3
                    }
                ]
            }]
        });
        chart1.render();




        var chart2 = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            axisX: {
                minimum: new Date(2015, 01, 25),
                maximum: new Date(2017, 02, 15),
                valueFormatString: "MMM YY",
                labelFormatter: function(e) {
                    return "";
                },
                tickLength: 0,
                lineThickness: 0,
                gridThickness: 0,
            },
            axisY: {
                title: "",
                includeZero: false,
                tickLength: 0,
                suffix: "",
                lineThickness: 0,
                gridThickness: 0,
                labelFormatter: function(e) {
                    return "";
                }
            },
            data: [{
                indexLabelFontColor: "darkSlateGray",
                name: "views",
                type: "area",
                color: "red", // Change the color to red
                yValueFormatString: "#,##0.0mn",
                toolTipContent: null, // Disable tooltips on hover
                dataPoints: [{
                        x: new Date(2015, 02, 1),
                        y: 74.4
                    },
                    {
                        x: new Date(2015, 05, 1),
                        y: 61.1
                    },
                    {
                        x: new Date(2015, 08, 1),
                        y: 47.0
                    },
                    {
                        x: new Date(2015, 11, 1),
                        y: 48.0
                    },
                    {
                        x: new Date(2016, 02, 1),
                        y: 74.8
                    },
                    {
                        x: new Date(2016, 05, 1),
                        y: 51.1
                    },
                    {
                        x: new Date(2016, 08, 1),
                        y: 40.4
                    },
                    {
                        x: new Date(2016, 11, 1),
                        y: 45.5
                    },
                    {
                        x: new Date(2017, 02, 1),
                        y: 78.3
                    }
                ]
            }]
        });
        chart2.render();




        var chart3 = new CanvasJS.Chart("chartContainer3", {
            animationEnabled: true,
            axisX: {
                minimum: new Date(2015, 01, 25),
                maximum: new Date(2017, 02, 15),
                valueFormatString: "MMM YY",
                labelFormatter: function(e) {
                    return "";
                },
                tickLength: 0,
                lineThickness: 0,
                gridThickness: 0,
            },
            axisY: {
                title: "",
                includeZero: false,
                tickLength: 0,
                suffix: "",
                lineThickness: 0,
                gridThickness: 0,
                labelFormatter: function(e) {
                    return "";
                }
            },
            data: [{
                indexLabelFontColor: "darkSlateGray",
                name: "views",
                type: "area",
                color: "#A26D61", // Change the color to #A26D61
                yValueFormatString: "#,##0.0mn",
                toolTipContent: null, // Disable tooltips on hover
                dataPoints: [{
                        x: new Date(2015, 02, 1),
                        y: 74.4
                    },
                    {
                        x: new Date(2015, 05, 1),
                        y: 61.1
                    },
                    {
                        x: new Date(2015, 08, 1),
                        y: 47.0
                    },
                    {
                        x: new Date(2015, 11, 1),
                        y: 48.0
                    },
                    {
                        x: new Date(2016, 02, 1),
                        y: 74.8
                    },
                    {
                        x: new Date(2016, 05, 1),
                        y: 51.1
                    },
                    {
                        x: new Date(2016, 08, 1),
                        y: 40.4
                    },
                    {
                        x: new Date(2016, 11, 1),
                        y: 45.5
                    },
                    {
                        x: new Date(2017, 02, 1),
                        y: 78.3
                    }
                ]
            }]
        });
        chart3.render();
        var chart4 = new CanvasJS.Chart("chartContainer4", {
            animationEnabled: true,
            axisX: {
                minimum: new Date(2015, 01, 25),
                maximum: new Date(2017, 02, 15),
                valueFormatString: "MMM YY",
                labelFormatter: function(e) {
                    return "";
                },
                tickLength: 0,
                lineThickness: 0,
                gridThickness: 0,
            },
            axisY: {
                title: "",
                includeZero: false,
                tickLength: 0,
                suffix: "",
                lineThickness: 0,
                gridThickness: 0,
                labelFormatter: function(e) {
                    return "";
                }
            },
            data: [{
                indexLabelFontColor: "darkSlateGray",
                name: "views",
                type: "area",
                color: "#50211F", // Change the color to #50211F
                yValueFormatString: "#,##0.0mn",
                toolTipContent: null, // Disable tooltips on hover
                dataPoints: [{
                        x: new Date(2015, 02, 1),
                        y: 74.4
                    },
                    {
                        x: new Date(2015, 05, 1),
                        y: 61.1
                    },
                    {
                        x: new Date(2015, 08, 1),
                        y: 47.0
                    },
                    {
                        x: new Date(2015, 11, 1),
                        y: 48.0
                    },
                    {
                        x: new Date(2016, 02, 1),
                        y: 74.8
                    },
                    {
                        x: new Date(2016, 05, 1),
                        y: 51.1
                    },
                    {
                        x: new Date(2016, 08, 1),
                        y: 40.4
                    },
                    {
                        x: new Date(2016, 11, 1),
                        y: 45.5
                    },
                    {
                        x: new Date(2017, 02, 1),
                        y: 78.3
                    }
                ]
            }]
        });
        chart4.render();
    }
    </script>



</head>