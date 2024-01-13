"use strict";
var changeBackground = function () {
        var images = new Array();
        images[ 0 ] = "http://preview.perfectin.co/demo/Aarvi/assets/img/login-bg/bg-1.jpg";
        images[ 1 ] = "http://preview.perfectin.co/demo/Aarvi/assets/img/login-bg/bg-2.jpg";
        images[ 2 ] = "http://preview.perfectin.co/demo/Aarvi/assets/img/login-bg/bg-3.jpg";
        images[ 3 ] = "http://preview.perfectin.co/demo/Aarvi/assets/img/login-bg/bg-4.jpg";
        images[ 4 ] = "http://preview.perfectin.co/demo/Aarvi/assets/img/login-bg/bg-5.jpg";
        images[ 5 ] = "http://preview.perfectin.co/demo/Aarvi/assets/img/login-bg/bg-6.jpg";

        var i = 0;
        setInterval(function () {
            if (i == 6) {
                i = 0;
            }
            $("#login-cover").attr('src', images[ i ]);
            i++;
        }, 3000);
    },
    Login = function () {
        "use strict";
        return {
            init: function () {
                changeBackground()
            }
        }
    }();
$(function () {
    Login.init();
});