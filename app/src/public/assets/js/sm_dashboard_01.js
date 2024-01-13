"use strict";
var editor = function () {
    if ($('#ckeditorEmail').length) {
        CKEDITOR.config.uiColor = '#ffffff';
        CKEDITOR.config.toolbar = [ [ 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink', '-', 'About' ] ];
        CKEDITOR.config.height = 100;
        CKEDITOR.replace('ckeditor1');
    }
}, rickshaw = function () {
    var blue = "#007bff",
        green = "#28a745",
        dark = "#2d353c",
        grey = "#b6c2c9",
        red = "#dc3545";

    var seriesData = [ [], [] ];
    var random = new Rickshaw.Fixtures.RandomData(50);
    for (var i = 0; i < 50; i++) {
        random.addData(seriesData);
    }
    var graph = new Rickshaw.Graph({
        element : document.querySelector("#rs1"),
        height  : 70,
        renderer: 'area',
        series  : [
            {
                data : seriesData[ 0 ],
                color: blue,
                name : 'DB Server'
            }, {
                data : seriesData[ 1 ],
                color: grey,
                name : 'Web Server'
            }
        ]
    });
    var hoverDetail = new Rickshaw.Graph.HoverDetail({
        graph: graph
    });
    random.removeData(seriesData);
    random.addData(seriesData);
    graph.update();
    setInterval(function () {
        random.removeData(seriesData);
        random.addData(seriesData);
        graph.update();
        $("#change_random").text(Math.floor(Math.random() * 100));
        $("#change_random_per").text(Math.floor(Math.random() * 10)+"%");
    }, 1000);
    new ResizeSensor($('#sm-container'), function () {
        graph.configure({
            width : $('#rs1').width(),
            height: $('#rs1').height()
        });
        graph.render();
    });

    /****rs2****/
    var seriesdata = [ [] ];
    var random_1 = new Rickshaw.Fixtures.RandomData(14);
    for (var i = 0; i < 15; i++) {
        random_1.addData(seriesdata);
    }
    var graph_2 = new Rickshaw.Graph({
        element : document.querySelector("#rs2"),
        renderer: 'bar',
        series  : [
            {
                data : seriesdata[ 0 ],
                color: blue,
                name : 'Site Traffic'
            }
        ]
    });
    random_1.removeData(seriesdata);
    random_1.addData(seriesdata);
    graph_2.update();
    setInterval(function () {
        random_1.removeData(seriesdata);
        random_1.addData(seriesdata);
        graph_2.update();
        $("#change_random1").text(Math.floor(Math.random() * 100));
        $("#change_random_per1").text(Math.floor(Math.random() * 10)+"%");
    }, 1000);
    new ResizeSensor($('#sm-container'), function () {
        graph_2.configure({
            width : $('#rs2').width(),
            height: $('#rs2').height()
        });
        graph_2.render();
    });

    var rs3 = new Rickshaw.Graph({
        element : document.querySelector('#rs3'),
        renderer: 'line',
        series  : [ {
            data : [
                {x: 0, y: 5},
                {x: 1, y: 7},
                {x: 2, y: 10},
                {x: 3, y: 11},
                {x: 4, y: 12},
                {x: 5, y: 10},
                {x: 6, y: 9},
                {x: 7, y: 7},
                {x: 8, y: 6},
                {x: 9, y: 8},
                {x: 10, y: 9},
                {x: 11, y: 10},
                {x: 12, y: 7},
                {x: 13, y: 10}
            ],
            color: red
        } ]
    });
    rs3.render();
    // Responsive Mode
    new ResizeSensor($('#sm-container'), function () {
        rs3.configure({
            width : $('#rs3').width(),
            height: $('#rs3').height()
        });
        rs3.render();
    });

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


    var ch2 = new Rickshaw.Graph({
        element : document.querySelector('#ch2'),
        renderer: 'area',
        max     : 80,
        series  : [ {
            data : [
                {x: 0, y: 40},
                {x: 1, y: 15},
                {x: 2, y: 38},
                {x: 3, y: 40},
                {x: 4, y: 32},
                {x: 5, y: 50},
                {x: 6, y: 65},
                {x: 7, y: 70},
                {x: 8, y: 45},
                {x: 9, y: 55},
                {x: 10, y: 60},
                {x: 11, y: 50},
                {x: 12, y: 40}
            ],
            color: 'rgba(255,255,255,0.5)'
        } ]
    });
    ch2.render();

    // Responsive Mode
    new ResizeSensor($('.br-mainpanel'), function () {
        ch2.configure({
            width : $('#ch2').width(),
            height: $('#ch2').height()
        });
        ch2.render();
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

    var ch4 = new Rickshaw.Graph({
        element : document.querySelector('#ch4'),
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
    ch4.render();

    // Responsive Mode
    new ResizeSensor($('.br-mainpanel'), function () {
        ch4.configure({
            width : $('#ch4').width(),
            height: $('#ch4').height()
        });
        ch4.render();
    });

    $('.jQueryEqualHeight_chart').jQueryEqualHeight('.card');

    $("#users_online").sparkline([ 102, 109, 120, 99, 110, 80, 87, 114, 102, 109, 120, 99, 110, 80, 87, 74 ], {
        type      : 'bar',
        height    : '130',
        barWidth  : 9,
        barSpacing: 10,
        barColor  : 'rgba(255,255,255,.3)'
    });

    $("#users_online_1").sparkline([ 102, 109, 120, 99, 110, 80, 87, 114, 102, 109, 120, 99, 110, 80, 87, 74 ], {
        type      : 'bar',
        height    : '130',
        barWidth  : 9,
        barSpacing: 10,
        barColor  : 'rgba(255,255,255,.3)'
    });

    if ($("#state_order_chart").length && $("#users_online").length) {
        $("#users_online").sparkline([ 102, 109, 120, 99, 110, 80, 87, 114, 102, 109, 120, 99, 110, 80, 87, 74 ], {
            type      : 'bar',
            height    : '100',
            barWidth  : 9,
            barSpacing: 10,
            barColor  : 'rgba(255,255,255,.3)'
        });

        var ctx = document.getElementById('state_order_chart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels  : [ "BTC", "Ethereum", "Ripple", "Litecoin", "BTC", "Cash" ],
                datasets: [ {
                    label               : "Dollar",
                    backgroundColor     : 'rgba(251,146,140,.15)',
                    borderColor         : '#fb928c',
                    pointBackgroundColor: "#ffffff",
                    data                : [ 120, 200, 170, 200, 150, 170 ]
                } ]
            },

            // Configuration options go here
            options: {
                maintainAspectRatio: false,
                legend             : {
                    display: false
                },

                scales  : {
                    xAxes: [ {
                        display: false
                    } ],
                    yAxes: [ {
                        display  : false,
                        gridLines: {
                            zeroLineColor     : '#e7ecf0',
                            color             : '#e7ecf0',
                            borderDash        : [ 5, 5, 5 ],
                            zeroLineBorderDash: [ 5, 5, 5 ],
                            drawBorder        : false
                        }
                    } ]

                },
                elements: {
                    line : {
                        tension    : 0.00001,
                        //tension: 0.4,
                        borderWidth: 1
                    },
                    point: {
                        radius     : 2,
                        hitRadius  : 10,
                        hoverRadius: 6,
                        borderWidth: 2
                    }
                }
            }
        });
    }

    if ($("#state_order_chart").length && $("#users_online").length) {
        $("#users_online").sparkline([ 102, 109, 120, 99, 110, 80, 87, 114, 102, 109, 120, 99, 110, 80, 87, 74 ], {
            type      : 'bar',
            height    : '100',
            barWidth  : 9,
            barSpacing: 10,
            barColor  : 'rgba(255,255,255,.3)'
        });

        var ctx = document.getElementById('users_online_1_1').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels  : [ "BTC", "Ethereum", "Ripple", "Litecoin", "BTC", "Cash" ],
                datasets: [ {
                    label               : "Dollar",
                    backgroundColor     : 'rgba(251,146,140,.15)',
                    borderColor         : '#fb928c',
                    pointBackgroundColor: "#ffffff",
                    data                : [ 120, 200, 170, 200, 150, 170 ]
                } ]
            },

            // Configuration options go here
            options: {
                maintainAspectRatio: false,
                legend             : {
                    display: false
                },

                scales  : {
                    xAxes: [ {
                        display: false
                    } ],
                    yAxes: [ {
                        display  : false,
                        gridLines: {
                            zeroLineColor     : '#e7ecf0',
                            color             : '#e7ecf0',
                            borderDash        : [ 5, 5, 5 ],
                            zeroLineBorderDash: [ 5, 5, 5 ],
                            drawBorder        : false
                        }
                    } ]

                },
                elements: {
                    line : {
                        tension    : 0.00001,
                        //tension: 0.4,
                        borderWidth: 1
                    },
                    point: {
                        radius     : 2,
                        hitRadius  : 10,
                        hoverRadius: 6,
                        borderWidth: 2
                    }
                }
            }
        });
    }
};
var icons = function () {
    "use strict";
    return {
        init: function () {
            editor();
            rickshaw()
        }
    }
}();
$(function () {
    icons.init();
});