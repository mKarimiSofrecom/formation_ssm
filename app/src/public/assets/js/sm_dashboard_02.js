"use strict";
var material_icons = function () {
    "use strict";
    if ("#clock-animations".length !== 0) {
        var now = new Date(),
            hourDeg = now.getHours() / 12 * 360 + now.getMinutes() / 60 * 30,
            minuteDeg = now.getMinutes() / 60 * 360 + now.getSeconds() / 60 * 6,
            secondDeg = now.getSeconds() / 60 * 360,
            stylesDeg = [
                "@-webkit-keyframes rotate-hour{from{transform:rotate(" + hourDeg + "deg);}to{transform:rotate(" + (hourDeg + 360) + "deg);}}",
                "@-webkit-keyframes rotate-minute{from{transform:rotate(" + minuteDeg + "deg);}to{transform:rotate(" + (minuteDeg + 360) + "deg);}}",
                "@-webkit-keyframes rotate-second{from{transform:rotate(" + secondDeg + "deg);}to{transform:rotate(" + (secondDeg + 360) + "deg);}}",
                "@-moz-keyframes rotate-hour{from{transform:rotate(" + hourDeg + "deg);}to{transform:rotate(" + (hourDeg + 360) + "deg);}}",
                "@-moz-keyframes rotate-minute{from{transform:rotate(" + minuteDeg + "deg);}to{transform:rotate(" + (minuteDeg + 360) + "deg);}}",
                "@-moz-keyframes rotate-second{from{transform:rotate(" + secondDeg + "deg);}to{transform:rotate(" + (secondDeg + 360) + "deg);}}"
            ].join("");
        document.getElementById("clock-animations").innerHTML = stylesDeg;
    }

    if ($("#chartJsNewUsers").length) {
        var ctx = document.getElementById("chartJsNewUsers");
        if (ctx === null) return;
        ctx = ctx.getContext('2d');

        var gradient = ctx.createLinearGradient(0, 20, 20, 270);
        gradient.addColorStop(0, 'rgba(13,169,239,0.6)');
        gradient.addColorStop(1, 'rgba(13,169,239,0.2)');

        var data = {
            labels  : [
                moment("2017-10-21").format("D MMM"),
                moment("2017-10-22").format("D MMM"),
                moment("2017-10-23").format("D MMM"),
                moment("2017-10-24").format("D MMM"),
                moment("2017-10-25").format("D MMM"),
                moment("2017-10-26").format("D MMM"),
                moment("2017-10-27").format("D MMM"),
            ],
            datasets: [
                {
                    label               : 'New Users',
                    lineTension         : 0,
                    data                : [ 32, 51, 44, 87, 125, 140, 173 ],
                    backgroundColor     : gradient,
                    hoverBackgroundColor: gradient,
                    borderColor         : '#0da9ef',
                    borderWidth         : 2,
                    pointRadius         : 4,
                    pointHoverRadius    : 4,
                    pointBackgroundColor: 'rgba(255,255,255,1)'
                }
            ]
        };

        var chart = new Chart(ctx, {
            type      : 'line',
            data      : data,
            responsive: true,
            options   : {
                maintainAspectRatio: true,
                legend             : {
                    display: false,
                },
                scales             : {
                    xAxes: [ {
                        display  : !1,
                        gridLines: {
                            display       : false,
                            drawBorder    : false,
                            tickMarkLength: 20,
                        },
                        ticks    : {
                            fontColor : "#bbb",
                            padding   : 10,
                            fontFamily: 'Roboto',
                        },
                    } ],
                    yAxes: [ {
                        display  : !1,
                        gridLines: {
                            color        : '#eef1f2',
                            drawBorder   : false,
                            zeroLineColor: '#eef1f2',
                        },
                        ticks    : {
                            fontColor : "#bbb",
                            stepSize  : 50,
                            padding   : 20,
                            fontFamily: 'Roboto',
                        }
                    } ]
                },
            },
        });

        $(window).on('resize', function () {
            chart.resize();
        });
    }
}, editor = function () {
    if ($('#ckeditorEmail').length) {
        CKEDITOR.config.uiColor = '#ffffff';
        CKEDITOR.config.toolbar = [ [ 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink', '-', 'About' ] ];
        CKEDITOR.config.height = 180;
        CKEDITOR.replace('ckeditor1');
    }
}, rickshawGraph = function () {
    var ch1 = new Rickshaw.Graph({
        element : document.querySelector('#ch1'),
        renderer: 'area',
        max     : 80,
        series  : [ {
            data : [
                {x: 0, y: 40},
                {x: 1, y: 49},
                {x: 2, y: 38},
                {x: 3, y: 30},
                {x: 4, y: 32},
                {x: 5, y: 40},
                {x: 6, y: 20},
                {x: 7, y: 10},
                {x: 8, y: 20},
                {x: 9, y: 25},
                {x: 10, y: 35},
                {x: 11, y: 20},
                {x: 12, y: 40}
            ],
            color: 'rgba(255,255,255,0.5)'
        } ]
    });
    ch1.render();

    // Responsive Mode
    new ResizeSensor($('.br-mainpanel'), function () {
        ch1.configure({
            width : $('#ch1').width(),
            height: $('#ch1').height()
        });
        ch1.render();
    });

    var ch3 = new Rickshaw.Graph({
        element : document.querySelector('#ch3'),
        renderer: 'area',
        max     : 80,
        series  : [ {
            data : [
                {x: 0, y: 40},
                {x: 1, y: 45},
                {x: 2, y: 30},
                {x: 3, y: 40},
                {x: 4, y: 50},
                {x: 5, y: 40},
                {x: 6, y: 20},
                {x: 7, y: 10},
                {x: 8, y: 20},
                {x: 9, y: 25},
                {x: 10, y: 35},
                {x: 11, y: 20},
                {x: 12, y: 40}
            ],
            color: 'rgba(255,255,255,0.5)'
        } ]
    });
    ch3.render();

    // Responsive Mode
    new ResizeSensor($('.br-mainpanel'), function () {
        ch3.configure({
            width : $('#ch3').width(),
            height: $('#ch3').height()
        });
        ch3.render();
    });
}
var icons = function () {
    "use strict";
    return {
        init: function () {
            material_icons();
            editor();
            rickshawGraph()
        }
    }
}();
$(function () {
    icons.init();
});