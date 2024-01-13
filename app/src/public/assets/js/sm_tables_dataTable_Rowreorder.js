"use strict";
var pvrDataTable = function () {
        "use strict";
        $("#data-table").DataTable({
            responsive: true,
            rowReorder: true
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