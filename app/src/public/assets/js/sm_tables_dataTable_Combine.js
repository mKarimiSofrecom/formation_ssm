"use strict";
var pvrDataTable = function () {
        "use strict";
        $("#data-table").DataTable({
            dom       : "lBfrtip",
            buttons   : [ {
                extend   : "copy",
                className: "btn-sm btn-primary"
            }, {
                extend   : "csv",
                className: "btn-sm btn-primary"
            }, {
                extend   : "excel",
                className: "btn-sm btn-primary"
            }, {
                extend   : "pdf",
                className: "btn-sm btn-primary"
            }, {
                extend   : "print",
                className: "btn-sm btn-primary"
            } ],
            responsive: true,
            autoFill  : true,
            colReorder: true,
            keys      : true,
            rowReorder: true,
            select    : true
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