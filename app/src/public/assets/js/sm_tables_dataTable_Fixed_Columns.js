"use strict";
var pvrDataTable = function () {
        "use strict";
        $("#data-table").DataTable({
            scrollY       : 300,
            scrollX       : true,
            scrollCollapse: true,
            paging        : false,
            fixedColumns  : true
        })
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