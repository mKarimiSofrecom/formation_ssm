"use strict";
var pvrDataTable = function () {
        "use strict";
        $("#data-table").DataTable({
            lengthMenu : [ 40, 60, 80 ],
            fixedHeader: {
                header      : !0
            },
            responsive : !0
        });
    },
    Table = function () {
        "use strict";
        return {
            init: function () {
                pvrDataTable()
            }
        }
    }();
$(function () {
    Table.init();
});