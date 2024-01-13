"use strict";
var vectormap = function () {
    "use strict";
    if ("#world-map".length !== 0) {
        var e = $(window).height();
        var mapData = {"AU": 760, "IN": 200, "RU": 300, "US": 2920, "BR": 550,};
        $("#world-map").css("height", e - 123);
        $("#world-map").vectorMap({
            map              : "world_mill_en",
            normalizeFunction: "polynomial",
            hoverOpacity     : .5,
            hoverColor       : false,
            markerStyle      : {initial: {fill: "rgba(0, 114, 255,0.7)", stroke: "transparent", r: 3}},
            regionStyle      : {
                initial : {
                    fill            : "rgba(0, 114, 255,0.4)",
                    "fill-opacity"  : 1,
                    stroke          : "none",
                    "stroke-width"  : .4,
                    "stroke-opacity": 1
                }, hover: {"fill-opacity": .8}, selected: {fill: "yellow"}, selectedHover: {}
            },
            series           : {
                regions: [ {
                    values           : mapData,
                    scale            : [ "#5797fc", "#7e6fff", "#4ecc48", "#ffcc29", "#f37070" ],
                    normalizeFunction: 'polynomial'
                } ]
            },
            focusOn          : {x: .5, y: .5, scale: 0},
            backgroundColor  : "#FFFFFF",
            markers          : [ {latLng: [ 41.9, 12.45 ], name: "Vatican City"}, {
                latLng: [ 43.73, 7.41 ],
                name  : "Monaco"
            }, {latLng: [ -.52, 166.93 ], name: "Nauru"}, {
                latLng: [ -8.51, 179.21 ],
                name  : "Tuvalu"
            }, {latLng: [ 43.93, 12.46 ], name: "San Marino"}, {
                latLng: [ 47.14, 9.52 ],
                name  : "Liechtenstein"
            }, {latLng: [ 7.11, 171.06 ], name: "Marshall Islands"}, {
                latLng: [ 17.3, -62.73 ],
                name  : "Saint Kitts and Nevis"
            }, {latLng: [ 3.2, 73.22 ], name: "Maldives"}, {
                latLng: [ 35.88, 14.5 ],
                name  : "Malta"
            }, {latLng: [ 26.02, 50.55 ], name: "Bahrain"}, {latLng: [ .33, 6.73 ], name: "São Tomé and Príncipe"} ]
        });
    }
};
var map = function () {
    "use strict";
    return {
        init: function () {
            vectormap();
        }
    }
}();
$(function () {
    map.init();
});