(function ($) {
  "use strict";
  var money = {
    initialised: false,
    version: 1.0,
    money: false,
    init: function () {
      if (!this.initialised) {
        this.initialised = true;
      } else {
        return;
      }

      // Functions Calling
      this.testimonial();
      this.partner();
      this.world_map();
      this.counter();
      this.faq();
      this.testimonial_two();
      this.submenu_toggle();
      this.menu_toggle_slide();
    },

   
    // graph: function () {
    //   if ($(".me-offer-graph").length > 0) {
    //     window.onload = function () {
    //       var options = {
    //         animationEnabled: true,
    //         title: {
    //           text: "",
    //         },
    //         axisX: {
    //           valueFormatString: "MMM",
    //         },
    //         axisY: {
    //           title: "",
    //           prefix: "KSH",
    //           includeZero: false,
    //         },
    //         data: [
    //           {
    //             yValueFormatString: "KSH#,###",
    //             xValueFormatString: "MMMM",
    //             type: "spline",
    //             dataPoints: [
    //               { x: new Date(2023, 0), y: 200 },
    //               { x: new Date(2023, 1), y: 2090 },
    //               { x: new Date(2023, 2), y: 800 },
    //               { x: new Date(2023, 3), y: 400 },
    //               { x: new Date(2023, 4), y: 4060 },
    //               { x: new Date(2023, 5), y: 30 },
    //               { x: new Date(2023, 6), y: 700 },
    //               { x: new Date(2023, 7), y: 300 },
    //               { x: new Date(2023, 8), y: 300 },
    //               { x: new Date(2023, 9), y: 500 },
    //               { x: new Date(2023, 10), y: 2000 },
    //               { x: new Date(2023, 11), y: 400 },
    //             ],
    //           },
    //         ],
    //       };
    //       $("#chartContainer").CanvasJSChart(options);
    //     };
    //   }
    // },
    // graph js end
    // testimonial slider start
    testimonial: function () {
      if ($(".me-testimonial-slider-box").length > 0) {
        var swiper = new Swiper(
          ".me-testimonial-slider-box .swiper-container",
          {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            speed: 2000,
            autoplay: {
              delay: 2500,
            },
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
            },
          }
        );
        var mySwiper = document.querySelector(
          ".me-testimonial-slider-box .swiper-container"
        ).swiper;
        $(".me-testimonial-slider-box .swiper-container").mouseenter(
          function () {
            mySwiper.autoplay.stop();
          }
        );

        $(".me-testimonial-slider-box .swiper-container").mouseleave(
          function () {
            mySwiper.autoplay.start();
          }
        );
      }
    },
    // testimonial slider end
    // partner slider start
    partner: function () {
      if ($(".me-partners-logo").length > 0) {
        var swiper = new Swiper(".me-partners-logo .swiper-container", {
          slidesPerView: 5,
          spaceBetween: 30,
          loop: true,
          speed: 2000,
          autoplay: {
            delay: 1000,
          },
          breakpoints: {
            320: {
              slidesPerView: 1,
              spaceBetween: 0,
            },
            480: {
              slidesPerView: 1,
              spaceBetween: 0,
            },
            575: {
              slidesPerView: 2,
              spaceBetween: 10,
            },
            767: {
              slidesPerView: 3,
              spaceBetween: 20,
            },
            992: {
              slidesPerView: 4,
              spaceBetween: 20,
            },
            1199: {
              slidesPerView: 5,
              spaceBetween: 30,
            },
          },
        });
        var mySwiperlogo = document.querySelector(
          ".me-partners-logo .swiper-container"
        ).swiper;
        $(".me-partners-logo .swiper-container").mouseenter(function () {
          mySwiperlogo.autoplay.stop();
        });

        $(".me-partners-logo .swiper-container").mouseleave(function () {
          mySwiperlogo.autoplay.start();
        });
      }
    },
    // partner slider end
    // service map start
    // world_map: function () {
    //   if ($("#kenya").length > 0) {
    //     $(function () {
    //       $("#kenya").vectorMap({
    //         map: "world_mill",
    //         scaleColors: ["#C8EEFF", "#0071A4"],
    //         normalizeFunction: "polynomial",
    //         hoverOpacity: 0.9,
    //         hoverColor: false,
    //         zoomOnScrollSpeed: 1, //default value is 3
    //         zoomStep: 1.1, //default value is 1.6
    //         markerStyle: {
    //           initial: {
    //             fill: "#ffb628",
    //             stroke: "#ffb628",
    //           },
    //           hover: {
    //             stroke: "#ffb628",
    //             fill: "#ffc454",
    //             "stroke-width": 2,
    //             cursor: "pointer",
    //           },
    //           selected: {
    //             fill: "blue",
    //           },
    //           selectedHover: {},
    //         },
    //         regionStyle: {
    //           initial: {
    //             fill: "#e3eaef",
    //             "fill-opacity": 1,
    //             stroke: "none",
    //             "stroke-width": 0,
    //             "stroke-opacity": 1,
    //           },
    //           hover: {
    //             "fill-opacity": 0.8,
    //             cursor: "pointer",
    //           },
    //           selected: {
    //             fill: "yellow",
    //           },
    //           selectedHover: {},
    //         },
    //         backgroundColor: "transparent",
    //         markers: [
    //           {
    //             latLng: [31.230391, 121.473701],
    //             name: "Shanghai",
    //           },
    //           {
    //             latLng: [39.904202, 116.407394],
    //             name: "Beijing",
    //           },
    //           {
    //             latLng: [28.70406, 77.102493],
    //             name: "Delhi",
    //           },
    //           {
    //             latLng: [6.524379, 3.379206],
    //             name: "Lagos",
    //           },
    //           {
    //             latLng: [39.343357, 117.361649],
    //             name: "Tianjin",
    //           },
    //           {
    //             latLng: [24.860735, 67.001137],
    //             name: "Karachi",
    //           },
    //           {
    //             latLng: [41.00824, 28.978359],
    //             name: "Istanbul",
    //           },
    //           {
    //             latLng: [35.689487, 139.691711],
    //             name: "Tokyo",
    //           },
    //           {
    //             latLng: [23.12911, 113.264381],
    //             name: "Guangzhou",
    //           },
    //           {
    //             latLng: [19.075983, 72.877655],
    //             name: "Mumbai",
    //           },
    //           {
    //             latLng: [40.7127837, -74.0059413],
    //             name: "New York",
    //           },
    //           {
    //             latLng: [34.052235, -118.243683],
    //             name: "Los Angeles",
    //           },
    //           {
    //             latLng: [41.878113, -87.629799],
    //             name: "Chicago",
    //           },
    //           {
    //             latLng: [29.760427, -95.369804],
    //             name: "Houston",
    //           },
    //           {
    //             latLng: [33.448376, -112.074036],
    //             name: "Phoenix",
    //           },
    //           {
    //             latLng: [51.507351, -0.127758],
    //             name: "London",
    //           },
    //           {
    //             latLng: [48.856613, 2.352222],
    //             name: "Paris",
    //           },
    //           {
    //             latLng: [55.755825, 37.617298],
    //             name: "Moscow",
    //           },
    //           {
    //             latLng: [40.416775, -3.70379],
    //             name: "Madrid",
    //           },
    //         ],
    //       });
    //     });
    //   }
    // },
    // // service map end
    // KENYAN MAP
    // service map start
    world_map: function () {
      if ($("#world-map").length > 0) {
        $(function () {
          $("#world-map").vectorMap({
            map: "kenya_mill",
            scaleColors: ["#C8EEFF", "#0071A4"],
            normalizeFunction: "polynomial",
            hoverOpacity: 0.9,
            hoverColor: false,
            zoomOnScrollSpeed: 1, //default value is 3
            zoomStep: 1.1, //default value is 1.6
            markerStyle: {
              initial: {
                fill: "#ffb628",
                stroke: "#ffb628",
              },
              hover: {
                stroke: "#ffb628",
                fill: "#ffc454",
                "stroke-width": 2,
                cursor: "pointer",
              },
              selected: {
                fill: "blue",
              },
              selectedHover: {},
            },
            regionStyle: {
              initial: {
                fill: "#e3eaef",
                "fill-opacity": 1,
                stroke: "none",
                "stroke-width": 0,
                "stroke-opacity": 1,
              },
              hover: {
                "fill-opacity": 0.8,
                cursor: "pointer",
              },
              selected: {
                fill: "yellow",
              },
              selectedHover: {},
            },
            backgroundColor: "transparent",
            markers: [
              {
                latLng: [-1.286389, 36.817223],
                name: "Nairobi",
              },
              {
                latLng: [-4.043477, 39.668206],
                name: "Mombasa",
              },
              {
                latLng: [-1.2921, 36.8219],
                name: "Kisumu",
              },
              {
                latLng: [0.5156, 35.2666],
                name: "Nakuru",
              },
              {
                latLng: [-0.7167, 36.4333],
                name: "Eldoret",
              },
              {
                latLng: [-0.3546, 34.2783],
                name: "Naivasha",
              },
              {
                latLng: [-1.05, 34.5167],
                name: "Machakos",
              },
              {
                latLng: [-0.3031, 36.0807],
                name: "Thika",
              },
              {
                latLng: [-1.1714, 36.8356],
                name: "Kiambu",
              },
              {
                latLng: [-0.0622, 34.7569],
                name: "Nyeri",
              },
            ],
          });
        });
      }
    },
    // service map end

    // counter start
    counter: function () {
      if ($(".me-counter-box").length > 0) {
        var a = 0;
        $(window).scroll(function () {
          var oTop = $("#counter").offset().top - window.innerHeight;
          if (a == 0 && $(window).scrollTop() > oTop) {
            $(".counter-value").each(function () {
              var $this = $(this),
                countTo = $this.attr("data-count");
              $({
                countNum: $this.text(),
              }).animate(
                {
                  countNum: countTo,
                },

                {
                  duration: 5000,
                  easing: "swing",
                  step: function () {
                    $this.text(Math.floor(this.countNum));
                  },
                  complete: function () {
                    $this.text(this.countNum);
                    //alert('finished');
                  },
                }
              );
            });
            a = 1;
          }
        });
      }
    },
    // counter end
    // faq start
    faq: function () {
      $(".me-faq-head").on("click", function () {
        $(this).toggleClass("me-faq-open");
      });
    },
    // faq end
    // testimonial two start
    testimonial_two: function () {
      if ($(".me-testimonial-two-main").length > 0) {
        var swiper = new Swiper(".me-testimonial-two-main .swiper-container", {
          slidesPerView: 1,
          loop: true,
          speed: 2000,
          autoplay: {
            delay: 2000,
          },
          effect: "fade",
          fadeEffect: {
            crossFade: true,
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
        });
        var mySwiperlogo = document.querySelector(
          ".me-testimonial-two-main .swiper-container"
        ).swiper;
        $(".me-testimonial-two-main .swiper-container").mouseenter(function () {
          mySwiperlogo.autoplay.stop();
        });

        $(".me-testimonial-two-main .swiper-container").mouseleave(function () {
          mySwiperlogo.autoplay.start();
        });
      }
    },
    // testimonial two end
    // sub menu start
    submenu_toggle: function () {
      var w = window.innerWidth;
      if (w <= 991) {
        $(".me-menu>ul li").on("click", function () {
          $(this).find("ul.me-sub-menu").slideToggle();
          $(this).toggleClass("me-submenu-open");
        });
      }
    },
    // sub menu end
    // slide menu toggle start
    menu_toggle_slide: function () {
      $(".me-toggle-nav").on("click", function (e) {
        event.stopPropagation();
        $(".me-menu").toggleClass("me-menu-open");
      });
      $("body").on("click", function () {
        $(".me-menu").removeClass("me-menu-open");
      });
      $(".me-menu>ul").on("click", function () {
        event.stopPropagation();
      });
    },
    // slide menu toggle end
  };
  money.init();
})(jQuery);

// Contact Form Submission
function checkRequire(formId, targetResp) {
  targetResp.html("");
  var email =
    /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
  var url =
    /(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/;
  var image = /\.(jpe?g|gif|png|PNG|JPE?G)$/;
  var mobile = /^[\s()+-]*([0-9][\s()+-]*){6,20}$/;
  var facebook = /^(https?:\/\/)?(www\.)?facebook.com\/[a-zA-Z0-9(\.\?)?]/;
  var twitter = /^(https?:\/\/)?(www\.)?twitter.com\/[a-zA-Z0-9(\.\?)?]/;
  var google_plus =
    /^(https?:\/\/)?(www\.)?plus.google.com\/[a-zA-Z0-9(\.\?)?]/;
  var check = 0;
  $("#er_msg").remove();
  var target = typeof formId == "object" ? $(formId) : $("#" + formId);
  target.find("input , textarea , select").each(function () {
    if ($(this).hasClass("require")) {
      if ($(this).val().trim() == "") {
        check = 1;
        $(this).focus();
        $(this).parent("div").addClass("form_error");
        targetResp.html("You missed out some fields.");
        $(this).addClass("error");
        return false;
      } else {
        $(this).removeClass("error");
        $(this).parent("div").removeClass("form_error");
      }
    }
    if ($(this).val().trim() != "") {
      var valid = $(this).attr("data-valid");
      if (typeof valid != "undefined") {
        if (!eval(valid).test($(this).val().trim())) {
          $(this).addClass("error");
          $(this).focus();
          check = 1;
          targetResp.html($(this).attr("data-error"));
          return false;
        } else {
          $(this).removeClass("error");
        }
      }
    }
  });
  return check;
}
$(".submitForm").on("click", function () {
  var _this = $(this);
  var targetForm = _this.closest("form");
  var errroTarget = targetForm.find(".response");
  var check = checkRequire(targetForm, errroTarget);

  if (check == 0) {
    var formDetail = new FormData(targetForm[0]);
    formDetail.append("form_type", _this.attr("form-type"));
    $.ajax({
      method: "post",
      url: "ajaxmail.php",
      data: formDetail,
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (resp) {
      console.log(resp);
      if (resp == 1) {
        targetForm.find("input").val("");
        targetForm.find("textarea").val("");
        errroTarget.html(
          '<p style="color:green;">Mail has been sent successfully.</p>'
        );
      } else {
        errroTarget.html(
          '<p style="color:red;">Something went wrong please try again latter.</p>'
        );
      }
    });
  }
});
