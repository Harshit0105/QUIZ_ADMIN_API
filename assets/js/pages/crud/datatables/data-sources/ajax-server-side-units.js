"use strict";
var KTDatatablesDataSourceAjaxServer1 = function() {
var HOST_URL="http://netbio.in/QUIZ/admin/units";/*"http://clubvisnagar.dotmgstudio.com/admin/advertise";*/
var count=0;
function decodeHtml(html) {
    return $('<div>').html(html).text();
}
	var initTable2 = function() {
		var table = $('#kt_datatable');

		// begin first table
		table.DataTable({
			responsive: true,
			processing: true,
			serverSide: false,
			ajax: {
				url: HOST_URL + '/getUnits',
				type: 'GET',
				dataType:"json",
                dataSrc:"",
			},
			columns: [
				{data: 'unit_id'},
				{data: 'unit_name'},
				{data: 'subject_name'},
				{data: 'standard'},
				{data: 'tutorial'},
				{data: {"id":'unit_id',"unit_name":'unit_name',"tutorial":'tutorial'}},
			],
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
					    if(full.tutorial===null){
					        return `
    							<button style="height: 22px; width: 70px; font-size: 10px; padding: 0;" onclick="addMcq('${full.unit_id}')" type="button" class="btn btn-success btn-sm">
    		                        Add MCQs
    		                    </button>
    		                    <a href="${HOST_URL}/getMcqs/${full.unit_id}" type="button" style="height: 22px; width: 70px; font-size: 10px; padding: 0; margin:0 auto;text-align:center;" class="btn btn-warning" title="MCQs">\
    								Edit MCQs
    							</a>
    							<button onclick="addTutorial('${full.unit_id}')" style="height: 22px; width: 70px; font-size: 10px; padding: 0;" onclick="" type="button" class="btn btn-success btn-sm">
    		                        Add Tutorial
    		                    </button>
    		                    <button style="height: 22px; width: 70px; font-size: 10px; padding: 0;" onclick="editUnit('${full.unit_id}','${full.unit_name}')" type="button" class="btn btn-sm btn-clean btn-icon">
    		                        <i class="la la-edit"></i>
    		                    </button>
    							<a href="${HOST_URL}/deleteUnits/${full.unit_id}" class="btn btn-sm btn-clean btn-icon" title="Delete">\
    								<i class="la la-trash"></i>
    							</a>
						    `;    
					    }
					    else{
					        return `
    							<button style="height: 22px; width: 70px; font-size: 10px; padding: 0;" onclick="addMcq('${full.unit_id}')" type="button" class="btn btn-success btn-sm">
    		                        Add MCQs
    		                    </button>
    		                    <a href="${HOST_URL}/getMcqs/${full.unit_id}" type="button" style="height: 22px; width: 70px; font-size: 10px; padding: 0; margin:0 auto;text-align:center;" class="btn btn-warning" title="MCQs">\
    								Edit MCQs
    							</a>
    		                    <button style="height: 22px; width: 70px; font-size: 10px; padding: 0;" onclick="editTutorial('${full.unit_id}','${full.tutorial}')" type="button" class="btn btn-warning btn-sm">
    		                        Edit Tutorial
    		                    </button>
    		                    <button style="height: 22px; width: 70px; font-size: 10px; padding: 0;" onclick="editUnit('${full.unit_id}','${full.unit_name}')" type="button" class="btn btn-sm btn-clean btn-icon">
    		                        <i class="la la-edit"></i>
    		                    </button>
    							<a href="${HOST_URL}/deleteUnits/${full.unit_id}" class="btn btn-sm btn-clean btn-icon" title="Delete">\
    								<i class="la la-trash"></i>
    							</a>
						    `;
					    }
						
					},
				},
				{
					targets: -2,
					title: 'Tutorial',
					orderable: false,
					render: function(data, type, full, meta) {
					    var temp=data;
					    var tut=decodeHtml(temp);
						return `${tut}
						`;
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
			initTable2();
		},

	};

}();

jQuery(document).ready(function() {
	KTDatatablesDataSourceAjaxServer1.init();
});
