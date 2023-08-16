   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="<?php echo APPURL; ?>/assets/js/jquery.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script>
function startTimer() {
    if ($("#me_timer").length > 0) {
        var countDownDate = new Date("August 30, 2023 15:37:25").getTime();
        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            var countdownText = "<span>" +
                days +
                "</span>" +
                "<span>" +
                hours +
                "</span>" +
                "<span>" +
                minutes +
                "</span>" +
                "<span>" +
                seconds +
                "</span>";

            $("#me_timer").html(countdownText);

            if (distance < 0) {
                clearInterval(x);
                $("#me_timer").html("EXPIRED");
            }
        }, 1000);
    }
}

// Call the startTimer function to initiate the countdown
startTimer();
   </script>
   <script src="<?php echo APPURL; ?>/assets/js/bootstrap.min.js"></script>
   <script src="<?php echo APPURL; ?>/assets/js/swiper.min.js"></script>
   <script src="<?php echo APPURL; ?>/assets/js/SmoothScroll.min.js"></script>
   <script src="<?php echo APPURL; ?>/assets/js/ui_range_slider.js"></script>
   <script src="<?php echo APPURL; ?>/assets/js/canvasjs.js"></script>
   <script src="<?php echo APPURL; ?>/assets/js/custom.js"></script>
   <script>
$(function() {
    graph();
});

function graph() {
    if ($('.me-offer-graph').length > 0) {
        window.onload = function() {
            var options = {
                animationEnabled: true,
                title: {
                    text: ""
                },
                axisX: {
                    valueFormatString: "MMM YYYY" // Change the format to display month and year
                },
                axisY: {
                    title: "",
                    prefix: "KES ", // Change the prefix to Kenya currency symbol
                    includeZero: false
                },
                data: [{
                    yValueFormatString: "KES #,###", // Change the format for the y-axis values
                    xValueFormatString: "MMM YYYY", // Change the format for the x-axis values
                    type: "spline",
                    dataPoints: [{
                            x: new Date(2023, 0),
                            y: 25060
                        },
                        {
                            x: new Date(2023, 1),
                            y: 27980
                        },
                        {
                            x: new Date(2023, 2),
                            y: 33800
                        },
                        {
                            x: new Date(2023, 3),
                            y: 49400
                        },
                        {
                            x: new Date(2023, 4),
                            y: 40260
                        },
                        {
                            x: new Date(2023, 5),
                            y: 33900
                        },
                        {
                            x: new Date(2023, 6),
                            y: 48000
                        },
                        {
                            x: new Date(2023, 7),
                            y: 31500
                        },
                        {
                            x: new Date(2023, 8),
                            y: 32300
                        },
                        {
                            x: new Date(2023, 9),
                            y: 42000
                        },
                        {
                            x: new Date(2023, 10),
                            y: 52160
                        },
                        {
                            x: new Date(2023, 11),
                            y: 49400
                        }
                    ]
                }]
            };
            $("#chartContainer").CanvasJSChart(options);
        }
    }
}
   </script>
   <script src="<?php echo APPURL; ?>/assets/toast/toastr.min.js"></script>
   <script>
toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "1000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}
   </script>