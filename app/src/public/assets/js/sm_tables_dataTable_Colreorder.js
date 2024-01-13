"use strict";
var pvrDataTable = function () {
        "use strict";
        $("#data-table").DataTable({
            colReorder: true,
            responsive: true
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