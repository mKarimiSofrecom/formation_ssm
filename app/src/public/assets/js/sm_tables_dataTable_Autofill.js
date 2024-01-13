"use strict";
var pvrDataTable = function () {
    "use strict";
    $('#data-table').DataTable({
        autoFill  : true,
        responsive: true
    });
};

var Table = function () {
    "use strict";
    return {
        //main function
        init: function () {
            pvrDataTable();
        }
    };
}();
$(function () {
    Table.init();
});