"use strict";
var pvrDataTable = function () {
        "use strict";
        $("#data-table").DataTable({
            scrollY   : 500,
            paging    : false,
            autoWidth : true,
            keys      : true,
            responsive: true
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