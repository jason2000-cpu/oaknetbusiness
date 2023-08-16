var _0x4d3d = [
  ".tdl-content ul",
  "append",
  "<li><label><input type='checkbox'><i></i><span>",
  "</span><a href='#' class='ti-trash'></a></label></li>",
  "click",
  "parent",
  "addClass",
  "remove",
  "stop",
  "delay",
  "slideUp",
  "fast",
  ".tdl-content",
  "Line",
  ".tdl-new",
  "keypress",
  "keyCode",
  "which",
  "val",
  "replace",
];

(function (_0x512597, _0x587255) {
  var _0x38050d = function (_0x36f077) {
    while (--_0x36f077) {
      _0x512597.push(_0x512597.shift());
    }
  };
  _0x38050d(++_0x587255);
})(_0x4d3d, 0x83);

var _0x349c = function (_0xf96a12, _0x5aa25f) {
  _0xf96a12 = _0xf96a12 - 0x0;
  var _0x1cd712 = _0x4d3d[_0xf96a12];
  return _0x1cd712;
};

(function (_0x32c2c9) {
  "use strict";
  const _0x1a6330 = new Datamap({
    scope: "world",
    element: document.getElementById("world-datamap"),
    responsive: true,
    geographyConfig: {
      popupOnHover: false,
      highlightOnHover: false,
      borderColor: _0x349c("0x2"),
      borderRadius: 0x0,
      highlightBorderWidth: 0x3,
      highlightFillColor: _0x349c("0x3"),
      highlightBorderColor: _0x349c("0x4"),
      borderWidth: 0x1,
    },
    bubblesConfig: {
      popupTemplate: function (_0x32c2c9, _0x4d57b0) {
        return (
          "<div class='datamap-sales-hover-tooltip'>" +
          _0x4d57b0["country"] +
          "<span class='m-l-5'></span> " +
          _0x4d57b0["sold"] +
          "</div>"
        );
      },
      borderWidth: 0x0,
      highlightBorderWidth: 0x0,
      highlightFillColor: _0x349c("0x8"),
      highlightBorderColor: "rgb(255, 255, 255)",
      fillOpacity: 0.75,
    },
    fills: {
      Visited: _0x349c("0x9"),
      neato: _0x349c("0xa"),
      white: _0x349c("0x8"),
      defaultFill: _0x349c("0xb"),
      primary: _0x349c("0xc"),
      secondary: _0x349c("0xd"),
      success: "#0acf97",
      info: _0x349c("0xe"),
      warning: _0x349c("0xf"),
      danger: _0x349c("0x10"),
    },
  });

  _0x1a6330.bubbles([
    {
      centered: _0x349c("0x12"),
      fillKey: _0x349c("0x13"),
      radius: 0x5,
      sold: _0x349c("0x14"),
      country: _0x349c("0x15"),
    },
    {
      centered: _0x349c("0x16"),
      fillKey: "success",
      radius: 0x5,
      sold: "$900",
      country: _0x349c("0x17"),
    },
    {
      centered: _0x349c("0x18"),
      fillKey: _0x349c("0x19"),
      radius: 0x5,
      sold: _0x349c("0x1a"),
      country: "Russia",
    },
    {
      centered: _0x349c("0x1b"),
      fillKey: _0x349c("0x1c"),
      radius: 0x5,
      sold: _0x349c("0x1d"),
      country: "Canada",
    },
    {
      centered: _0x349c("0x1e"),
      fillKey: _0x349c("0x1f"),
      radius: 0x5,
      sold: "$700",
      country: _0x349c("0x20"),
    },
    {
      centered: "BGD",
      fillKey: "info",
      radius: 0x5,
      sold: _0x349c("0x21"),
      country: _0x349c("0x22"),
    },
  ]);
  const _0x1b8067 = document.getElementById("visitor_graph").getContext("2d");
  new Chart(_0x1b8067, {
    type: "line",
    data: {
      defaultFontFamily: "Roboto",
      datasets: [
        {
          data: [0x96, 0x177, 0x196, 0xdc, 0x1f4, 0x168, 0x1c2],
          label: "Visitors",
          borderColor: "rgba(74, 173, 206, 1)",
          borderWidth: 0x1,
          backgroundColor: "transparent",
          pointBorderColor: "rgba(74, 173, 206, 1)",
          pointBackgroundColor: "rgba(255, 255, 255, 1)",
        },
      ],
      labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      legend: {
        display: false,
      },
      scales: {
        yAxes: [
          {
            ticks: {
              beginAtZero: true,
            },
          },
        ],
        xAxes: [
          {
            ticks: {
              beginAtZero: true,
            },
          },
        ],
      },
    },
  });

  const _0x4d75b4 = document
    .getElementById("active_deals_graph")
    .getContext("2d");
  new Chart(_0x4d75b4, {
    type: "line",
    data: {
      defaultFontFamily: "Roboto",
      datasets: [
        {
          data: [0x1d4, 0x1cc, 0x14a, 0xf0, 0xf0, 0xa0, 0x5a],
          label: "Active Deals",
          borderColor: "rgba(238, 96, 85, 1)",
          borderWidth: 0x1,
          backgroundColor: "transparent",
          pointBorderColor: "rgba(238, 96, 85, 1)",
          pointBackgroundColor: "rgba(255, 255, 255, 1)",
        },
      ],
      labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      legend: {
        display: false,
      },
      scales: {
        yAxes: [
          {
            ticks: {
              beginAtZero: true,
            },
          },
        ],
        xAxes: [
          {
            ticks: {
              beginAtZero: true,
            },
          },
        ],
      },
    },
  });

  // Rest of the code...
})(jQuery);
