
<!DOCTYPE html>
<html lang="en">
  <!--begin::Head-->
  <head><base href="../">
    <meta charset="utf-8" />
    <title>Admin | Tests</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?php include 'includes/head.php'; ?>
  </head>

  <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Main-->
    <!--begin::Header Mobile-->
    <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
      <!--begin::Logo-->
      <a href="index.html">
        <img height="50px" width="70px;" alt="Logo" src="assets/media/logos/Logo.png" />
      </a>
      <!--end::Logo-->
      <!--begin::Toolbar-->
      <div class="d-flex align-items-center">
        <!--begin::Aside Mobile Toggle-->
        <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
          <span></span>
        </button>
        <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
          <span class="svg-icon svg-icon-xl">
            <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24" />
                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
              </g>
            </svg>
            <!--end::Svg Icon-->
          </span>
        </button>
        <!--end::Topbar Mobile Toggle-->
      </div>
      <!--end::Toolbar-->
    </div>
    <!--end::Header Mobile-->
    <div class="d-flex flex-column flex-root">
      <!--begin::Page-->
      <div class="d-flex flex-row flex-column-fluid page">
        
        <?php include 'includes/aside.php'; ?>
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
          <!--begin::Header-->
          <?php include 'includes/header.php'; ?>
          <!--end::Header-->
          <!--begin::Content-->
          <div style="padding: 0px; margin-top: 0px;" class="content d-flex flex-column flex-column-fluid" id="kt_content">
           
            <!--begin::Entry-->
            <div class="d-flex flex-column-fluid">
              <!--begin::Container-->
               <div class="container">
                
                <div class="row">
                  
                  <div class="col-lg-12">
                    
                    <div class="card card-custom">
                  <div class="card-header">
                    <div class="card-title">
                      <h3 class="card-label">All Tests</h3>
                      <button type="button" class="btn btn-primary" data-toggle="modal"     data-target="#addCatModel">
                        Add Test
                      </button>
                    </div>
                    
                  </div>
                  <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Test Id</th>                        
                          <th>Standard</th>
                          <th>Subject</th>
                          <th>Unit</th>
                          <th>Date</th>
                          <th>Time</th>                          
                          <th>Actions</th>
                        </tr>
                      </thead>
                    </table>
                    <!--end: Datatable-->
                  </div>
                </div>
                </div>
              </div>
              <!--end::Container-->
            </div>
            <!--end::Entry-->
          </div>
          <!--end::Content-->
          <!--begin::Footer-->
          <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
            <!--begin::Container-->
            <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
              <!--begin::Copyright-->
              <div class="text-dark order-2 order-md-1">
                <span class="text-muted font-weight-bold mr-2">2021©</span>
                <a href="http://keenthemes.com/metronic" target="_blank" class="text-dark-75 text-hover-primary"></a>
              </div>
              <!--end::Copyright-->
              <!--begin::Nav-->
              
              <!--end::Nav-->
            </div>
            <!--end::Container-->
          </div>
          <!--end::Footer-->
        </div>
      </div>
      <!--end::Page-->
    </div>
    
    <div class="modal fade" id="addCatModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Test</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="addCatForm" method="post" action="admin/tests/addTests">
                  <div class="form-group row">
                      <div class="col-lg-6">
                        <label>Select Standard:</label>
                        <select class="form-control" id="sel_standard" name="standard">
                            <option value="">-- Select Standard --</option>
                          <?php
                          foreach ($standards as $row) :
                          ?>                    
                          <option value="<?php echo htmlentities($row->standard_id);?>"><?php echo htmlentities($row->standard);?></option>
                          <?php 
                              endforeach; 
                          ?>
                        </select>
                      </div>
                      <!--htmlentities($row1->subject_id)-->
                      <!--htmlentities($row1->subject_name)-->
                      <div class="col-lg-6">
                        <label>Select Subject</label>
                        <select class="form-control" id="sel_subject" name="subject">
                          <option value="">-- Select Subject --</option>
                        </select>
                      </div>
                      <div class="col-lg-12">
                        <label>Select Unit</label>
                        <select class="form-control" id="sel_unit" name="unit">
                          <option value="">-- Select Unit --</option>
                        </select>
                      </div>
                      <div class="col-lg-6">
                        <label>Time: </label>
                        <input type="time" id="time" name="time" class="form-control" placeholder="Enter time">                        
                      </div>
                      <div class="col-lg-6">
                        <label>Date: </label>
                        <input type="date" id="date" name="date" class="form-control" placeholder="Enter Date">                        
                      </div>
                      <div class="col-lg-12 ">
                        <label>MCQs :</label>
                        <div id="check" class="form-check">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <input id="roomId" name="room_id" type="hidden"/>
                        <span id="catError" style="color: red;" class="form-text helpTextNone">Please enter all valid data</span>
                        <button type="button" style="margin-top: 25px;" id="submitCategory" class="btn btn-primary mr-2">Add Test</button>                        
                      </div>
                    </div>
                </form>
            </div>            
        </div>
    </div>
</div>


<div class="modal fade" id="showMcqModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">MCQs</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="list-group" id="showMCQDiv">
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>        
      </div>
    </div>
  </div>
</div>



    
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
   <script src="assets/js/pages/crud/datatables/data-sources/ajax-server-side-tests.js"></script>
   

   <script type="text/javascript">

    $('#addCatModel').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
        $('#check').empty();
    })
     $(document).on("click","#submitCategory",function(e) {      
         var stdDrop = $("#sel_standard").val();
         var subDrop = $("#sel_subject").val();
         var unitDrop = $("#sel_unit").val();
         var time=$("#time").val();
         var date=$("#date").val();
         if(stdDrop=="" || subDrop=="" || unitDrop=="" || time=="" || date=="")
         {           
             event.preventDefault();             
             $("#catError").removeClass("helpTextNone");
         }                 
         else {
        $("#catError").addClass("helpTextNone");
        $("#addCatForm").submit();
      }
      });     

     $('#sel_standard').change(function(){
      var std = $(this).val();

      // AJAX request
      $.ajax({
        url:"http://netbio.in/QUIZ/admin/units/getSubjects",
        // url:"http://localhost/QUIZ/admin/units/getSubjects",
        method: 'post',
        data: {stdId: std},
        dataType: 'json',
        success: function(response){

          // Remove options 
          $('#sel_subject').find('option').not(':first').remove();

          // Add options
          $.each(response,function(index,data){
             $('#sel_subject').append('<option value="'+data['subject_id']+'">'+data['subject_name']+'</option>');             
          });
        }
     });
   });

   $('#sel_subject').change(function(){
      var sub = $(this).val();
      var std = $('#sel_standard').val();

      // AJAX request
      $.ajax({
        url:"http://netbio.in/QUIZ/admin/tests/getUnits",
        // url:"http://localhost/QUIZ/admin/tests/getUnits",
        method: 'post',
        data: {stdId: std,subId: sub},
        dataType: 'json',
        success: function(response){

          // Remove options 
          $('#sel_unit').find('option').not(':first').remove();

          // Add options
          $.each(response,function(index,data){
             $('#sel_unit').append('<option value="'+data['unit_id']+'">'+data['unit_name']+'</option>');             
          });
        }
     });
   });

   $('#sel_unit').change(function(){
      var std = $(this).val();

      // AJAX request
      $.ajax({
        url:"http://netbio.in/QUIZ/admin/tests/getMCQs",
        // url:"http://localhost/QUIZ/admin/tests/getMCQs",
        method: 'post',
        data: {unitId: std},
        dataType: 'json',
        success: function(response){

          // Remove options 
          $('#check').empty();

          // Add options
          $.each(response,function(index,data){            
             $('#check')
                .append('<div>')
                .append('<input class="form-check-input" type="checkbox" id="'+data['mcq_id']+'" name="mcqIDs[]" value="'+data['mcq_id']+'">')
                .append('<label class="form-check-label" for="'+data['mcq_id']+'">'+data['question']+'</label></div>');                
          });
        }
     });
   });

   function showMCQs(mcqId){
      var showMcqId=mcqId.split(",");                    
        $('#showMCQDiv').empty();
        for(var i=0;i<showMcqId.length;i++){
            console.log(showMcqId[i]) ;           
            $.ajax({
                url:"http://netbio.in/QUIZ/admin/tests/getMCQ",
                // url:"http://localhost/QUIZ/admin/tests/getMCQ",
                method: 'post',
                async: false,
                cache: false,
                data: {mcqId: showMcqId[i]},
                dataType: 'json',
                success: function(response){
                    
                    $.each(response,function(index,data){                                                         
                        $('#showMCQDiv').append('<li class="list-group-item list-group-item-action flex-column align-items-start active"><div class="d-flex w-100 justify-content-between"><h5 class="mb-1"> Q'+(i+1)+') '+data['question']+'</h5></div><p class="mb-1">Answer: '+data['answer']+'</p></li>');
                    });
                }
            });
        }   
        $('#showMcqModal').modal("show"); 
   }

   function editTest(roomId,mcqIds){
     $('#roomId').val(roomId);
     var mcqIds=mcqIds.split(",");     
     //Get data of Test
     $.ajax({
        url:"http://netbio.in/QUIZ/admin/tests/getTest",
        // url:"http://localhost/QUIZ/admin/tests/getTest",
        method: 'post',
        data: {roomId: roomId},
        dataType: 'json',
        success: function(response){         
          $.each(response,function(index,data){                                                    
            $('#sel_standard').val(data['standard_id']);
            //Get Data of Subject
            $.ajax({
              url:"http://netbio.in/QUIZ/admin/units/getSubjects",
              // url:"http://localhost/QUIZ/admin/units/getSubjects",
              method: 'post',
              data: {stdId: data['standard_id']},
              dataType: 'json',
              success: function(response){

                // Remove options 
                $('#sel_subject').find('option').not(':first').remove();

                // Add options
                $.each(response,function(index,data1){                  
                  $('#sel_subject').append('<option value="'+data1['subject_id']+'">'+data1['subject_name']+'</option>');             
                });
                $('#sel_subject').val(data['subject_id']);
                //Get data of unit
                $.ajax({
                    url:"http://netbio.in/QUIZ/admin/tests/getUnits",
                    // url:"http://localhost/QUIZ/admin/tests/getUnits",
                    method: 'post',
                    data: {stdId: data['standard_id'],subId: data['subject_id']},
                    dataType: 'json',
                    success: function(response){

                      // Remove options 
                      $('#sel_unit').find('option').not(':first').remove();

                      // Add options
                      $.each(response,function(index,dataUnit){
                        $('#sel_unit').append('<option value="'+dataUnit['unit_id']+'">'+dataUnit['unit_name']+'</option>');             
                      });
                      $('#sel_unit').val(data['unit_id']);
                      //get data of mcqs
                      $.ajax({
                          url:"http://netbio.in/QUIZ/admin/tests/getMCQs",
                          // url:"http://localhost/QUIZ/admin/tests/getMCQs",
                          method: 'post',
                          data: {unitId: data['unit_id']},
                          dataType: 'json',
                          success: function(response){

                            // Remove options 
                            $('#check').empty();

                            // Add options
                            $.each(response,function(index,dataMCQ){   
                              if(jQuery.inArray(dataMCQ['mcq_id'], mcqIds) !== -1)
                              {
                                $('#check')
                                  .append('<div>')
                                  .append('<input class="form-check-input" type="checkbox" id="'+dataMCQ['mcq_id']+'" name="mcqIDs[]" value="'+dataMCQ['mcq_id']+'" checked>')
                                  .append('<label class="form-check-label" for="'+dataMCQ['mcq_id']+'">'+dataMCQ['question']+'</label></div>');                
                              }         
                              else{
                                $('#check')
                                  .append('<div>')
                                  .append('<input class="form-check-input" type="checkbox" id="'+dataMCQ['mcq_id']+'" name="mcqIDs[]" value="'+dataMCQ['mcq_id']+'">')
                                  .append('<label class="form-check-label" for="'+dataMCQ['mcq_id']+'">'+dataMCQ['question']+'</label></div>');                
                              }
                              
                            });
                          }
                      });
                    }
                });
              }
            });
            $('#time').val(data['timing']);
            $('#date').val(data['upcomingdate']);
          });
        }
     });
     $('#submitCategory').html("Update Test");     
     $('#addCatModel').modal("show");
   }

   </script>
    <!--end::Page Scripts-->
  </body>
  <!--end::Body-->
</html>