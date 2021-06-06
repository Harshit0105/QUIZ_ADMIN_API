"use strict";
var KTDatatablesDataSourceAjaxServer1 = (function () {
  var HOST_URL = "http://netbio.in/QUIZ/admin/tests";
  //  "http://localhost/QUIZ/admin/tests";
  /*"http://clubvisnagar.dotmgstudio.com/admin/advertise";*/
  var count = 0;
  var initTable2 = function () {
    var table = $("#kt_datatable");

    // begin first table
    table.DataTable({
      responsive: true,
      processing: true,
      serverSide: false,
      ajax: {
        url: HOST_URL + "/getAllTests",
        type: "GET",
        dataType: "json",
        dataSrc: "",
      },
      columns: [
        { data: "room_id" },
        { data: "roomID" },
        { data: "standard" },
        { data: "subject_name" },
        { data: "unit_name" },
        { data: "upcomingdate" },
        { data: "timing" },
        { data: { id: "room_id", mcqids: "mcqids" } },
      ],
      columnDefs: [
        {
          targets: -1,
          title: "Actions",
          orderable: false,
          render: function (data, type, full, meta) {
            // console.log(full.mcqids);
            var temp = full.mcqids;
            temp = temp.replace("[", "");
            temp = temp.replace("]", "");
            temp = temp.split(",");
            for (var i = 0; i < temp.length; i++) {
              temp[i] = +temp[i].substr(1).slice(0, -1);
            }
            return `
                            <button style="height: 22px; width: 70px; font-size: 10px; padding: 0;" onclick="showMCQs('${temp}')" type="button" class="btn btn-success btn-sm">
                                MCQs
                            </button>
                            <button style="height: 22px; width: 70px; font-size: 10px; padding: 0;" onclick="editTest('${full.room_id}','${temp}')" type="button" class="btn btn-sm btn-clean btn-icon">
                                <i class="la la-edit"></i>
                            </button>							
						`;
          },
        },
        {
          targets: -8,
          title: "No",
          orderable: false,
          render: function (data, type, full, meta) {
            count++;
            return `${count}
						`;
          },
        },
      ],
    });
  };

  return {
    //main function to initiate the module
    init: function () {
      initTable2();
    },
  };
})();

jQuery(document).ready(function () {
  KTDatatablesDataSourceAjaxServer1.init();
});
