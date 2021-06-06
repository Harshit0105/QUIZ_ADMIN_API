"use strict";
var KTDatatablesDataSourceAjaxServer1 = function() {
var HOST_URL="http://localhost/QUIZ/admin/results";/*"http://clubvisnagar.dotmgstudio.com/admin/advertise";*/
var count=0;
	var initTable2 = function() {
		var table = $('#kt_datatable');

		// begin first table
		table.DataTable({
			responsive: true,
			processing: true,
			serverSide: false,
			ajax: {
				url: HOST_URL + '/getAllResults',
				type: 'GET',
				dataType:"json",
                dataSrc:"",
			},
			columns: [
				{data: 'result_id'},
				{data: 'name'},
				{data: 'roomID'},
				{data: 'standard'},
				{data: 'subject_name'},
				{data: 'unit_name'},
				{data: 'total_mcq'},
				{data: 'correct_mcq'},
				{data: {"id":'result_id'}},
			],
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
						return `
							<a href="${HOST_URL}/deleteResult/${full.result_id}" class="btn btn-sm btn-clean btn-icon" title="Delete">\
								<i class="la la-trash"></i>
							</a>
						`;
					},
				},
				{
					targets: -9,
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
