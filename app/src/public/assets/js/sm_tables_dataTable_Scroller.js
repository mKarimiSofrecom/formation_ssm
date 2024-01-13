"use strict";
var pvrDataTable = function () {
        "use strict";
        $("#data-table").DataTable({
            ajax          : "assets/plugins/DataTables/json/scroller-demo.json",
            deferRender   : true,
            scrollY       : 700,
            scrollCollapse: true,
            scroller      : true,
            responsive    : true
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