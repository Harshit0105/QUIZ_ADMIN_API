"use strict";
var KTDatatablesDataSourceAjaxServer1 = function() {
var HOST_URL="http://netbio.in/QUIZ/admin/subjects";/*"http://clubvisnagar.dotmgstudio.com/admin/advertise";*/
var count=0;
	var initTable2 = function() {
		var table = $('#kt_datatable');

		// begin first table
		table.DataTable({
			responsive: true,
			processing: true,
			serverSide: false,
			ajax: {
				url: HOST_URL + '/getSubjects',
				type: 'GET',
				dataType:"json",
                dataSrc:"",
			},
			columns: [
				{data: 'subject_id'},
				{data: 'subject_name'},
				{data: 'standard'},
				{data: {"id":'subject_id',"subject":'subject_name'}},
			],
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
						return `
						    <button style="height: 22px; width: 70px; font-size: 10px; padding: 0;" onclick="editSubject('${full.subject_id}','${full.subject_name}')" type="button" class="btn btn-sm btn-clean btn-icon">
		                        <i class="la la-edit"></i>
		                      </button>
							<a href="${HOST_URL}/deleteSubjects/${full.subject_id}" class="btn btn-sm btn-clean btn-icon" title="Delete">\
								<i class="la la-trash"></i>
							</a>
						`;
					},
				},
				{
					targets: -4,
					title: 'No',
					orderable: false,
					render: function(data, type, full, meta) {
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
		init: function() {
			initTable2();
		},

	};

}();

jQuery(document).ready(function() {
	KTDatatablesDataSourceAjaxServer1.init();
});
