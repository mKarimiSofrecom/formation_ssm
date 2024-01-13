"use strict";
var material_icons = function () {
    "use strict";
    if ($("#sales_chart").length) {
        var ctx = document.getElementById('sales_chart').getContext('2d');
        var myBarChart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels  : [ "Bitcoin", "Ethereum", "Ripple", "BTC Cash", "Litecoin" ],
                datasets: [ {
                    label               : "Bitcoin",
                    data                : [ 40, 90, 210, 160, 230 ],
                    backgroundColor     : '#ffa534',
                    borderColor         : '#ffa534',
                    pointBorderColor    : '#ffffff',
                    pointBackgroundColor: '#ffa534',
                    pointBorderWidth    : 2,
                    pointRadius         : 4

                }, {
                    label               : "My Second dataset",
                    data                : [ 160, 140, 20, 270, 110 ],
                    backgroundColor     : '#3d74f1',
                    borderColor         : '#3d74f1',
                    pointBorderColor    : '#ffffff',
                    pointBackgroundColor: '#3d74f1',
                    pointBorderWidth    : 2,
                    pointRadius         : 4
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
                        display  : true,
                        gridLines: {
                            zeroLineColor     : '#e7ecf0',
                            color             : '#e7ecf0',
                            borderDash        : [ 5, 5, 5 ],
                            zeroLineBorderDash: [ 5, 5, 5 ],
                            drawBorder        : false
                        }
                    } ],
                    yAxes: [ {
                        display  : true,
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
//              tension: 0.4,
                        borderWidth: 1
                    },
                    point: {
                        radius     : 2,
                        hitRadius  : 10,
                        hoverRadius: 6,
                        borderWidth: 4
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

    $("#users_onliner").sparkline([ 102, 109, 120, 99, 110, 80, 87, 114, 102, 109, 120, 99, 110, 80, 87, 74 ], {
        type      : 'bar',
        height    : '130',
        barWidth  : 9,
        barSpacing: 10,
        barColor  : 'rgba(255,255,255,.3)'
    });
}
var icons = function () {
    "use strict";
    return {
        init: function () {
            material_icons();
        }
    }
}();
$(function () {
    icons.init();
});