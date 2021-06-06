"use strict";
var KTDatatablesDataSourceAjaxServer = function() {
var HOST_URL="http://localhost/CLUBVIS/business";/*"http://clubvisnagar.dotmgstudio.com/admin/business";*/
var count=0;
	var initTable = function() {
		var table = $('#kt_datatable');

		// begin first table
		table.DataTable({
			responsive: true,
			processing: true,
			serverSide: false,
			ajax: {
				url: HOST_URL + '/getBusinesses',
				type: 'GET',
				dataType:"json",
                dataSrc:"",
			},
			columns: [
				{data: 'id'},
				{data: 'thumbnail'},
				{data: 'name'},
				{data: 'website'},
				{data: 'category'},
				{data: {"id":'id',"thumbnail":'thumbnail',"name":'name',"website":'website',"category":'category'}},
			],
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
						return `
							<a href="${HOST_URL}/editBusiness/${data.id}" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
								<i class="la la-edit"></i>
							</a>
							<a href="${HOST_URL}/deleteBusiness/${data.id}" class="btn btn-sm btn-clean btn-icon" title="Delete">\
								<i class="la la-trash"></i>
							</a>
						`;
					},
				},
				{
					targets: -5,
					title: 'No',
					orderable: false,
					render: function(data, type, full, meta) {
						return `<span class="symbol-label symbol symbol-50 symbol-light mr-4">
								<img src="./images/business/thumbnail/${full.thumbnail}" class="h-75 align-self-end" alt="" />
								</span>`;
					},
				},
				{
					targets: -6,
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
			initTable();
		},

	};

}();

jQuery(document).ready(function() {
	KTDatatablesDataSourceAjaxServer.init();
});
