
<!DOCTYPE html>
<html lang="en">
  <!--begin::Head-->
  <head><base href="../../../">
    <meta charset="utf-8" />
    <title>Admin | Categories</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?php include 'includes/head.php'; ?>
    <style type="text/css">
      .onhover {
        margin-top: 10px;
      }
      .onhover:hover {
        box-shadow: 1px 5px 11px -4px rgba(0,0,0,0.75);
-webkit-box-shadow: 1px 5px 11px -4px rgba(0,0,0,0.75);
-moz-box-shadow: 1px 5px 11px -4px rgba(0,0,0,0.75);
      }
    </style>
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
                      <h3 class="card-label">MCQs</h3>
                        <button onclick="addMcq('<?php echo $unit[0]->unit_id ?>')" type="button" class="btn btn-primary">
                            Add MCQs
                          </button>
                    </div>
                    
                  </div>
                  </div>
                   <?php
                    foreach ($mcq as $row) :
                    ?>

                    <div class="card card-body onhover">
                      <div class="row">
                          <div class="col-lg-10">
                          <label><b>Question: </b> &nbsp;&nbsp;&nbsp; <span class=""><?php echo htmlentities($row->question); ?></span></label>
                          </div>
                          <div class="col-lg-2" style="text-align: right;">
                              <button onclick="editMcq('<?php echo $unit[0]->unit_id ?>','<?php echo $row->mcq_id;?>','<?php echo htmlentities($row->question); ?>','<?php echo htmlentities($row->hint); ?>','<?php echo htmlentities($row->option_1); ?>','<?php echo htmlentities($row->option_2); ?>','<?php echo htmlentities($row->option_3); ?>','<?php echo htmlentities($row->option_4); ?>','<?php echo htmlentities($row->answer); ?>')" class="btn btn-warning" style="height: 22px; width: 70px; font-size: 10px; padding-top: 4px;">Edit</button>
                          </div>
                          <div class="col-lg-10">
                          <label><b>Hint: </b> &nbsp;&nbsp;&nbsp; <span class=""><?php echo htmlentities($row->hint); ?></span></label>
                          </div>
                          <div class="col-lg-2" style="text-align: right;">
                            <a href="admin/units/deleteMcq/<?php echo $row->mcq_id; ?>" class="btn btn-danger" style="height: 22px; width: 70px; font-size: 10px; padding-top: 4px;">Delete</a>
                          </div>
                          <div class="col-lg-6">
                            <label><b>Option 1: </b> &nbsp;&nbsp;&nbsp; <span class=""><?php echo htmlentities($row->option_1); ?></span></label>
                          </div>
                          <div class="col-lg-6">
                            <label><b>Option 2: </b> &nbsp;&nbsp;&nbsp; <span class=""><?php echo htmlentities($row->option_2); ?></span></label>
                          </div>
                          <div class="col-lg-6">
                            <label><b>Option 3: </b> &nbsp;&nbsp;&nbsp; <span class=""><?php echo htmlentities($row->option_3); ?></span></label>
                          </div>
                          <div class="col-lg-6">
                            <label><b>Option 4: </b> &nbsp;&nbsp;&nbsp; <span class=""><?php echo htmlentities($row->option_4); ?></span></label>
                          </div>
                          <div class="col-lg-6">
                            <label><b>Answer: </b> &nbsp;&nbsp;&nbsp; <span class=""><?php echo htmlentities($row->answer); ?></span></label>
                          </div>
                      </div>
                    </div>         
                    <?php 
                        endforeach; 
                    ?>
                  
                
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
    
    
<div class="modal fade" id="addMcqModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new MCQ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="addMcqForm" method="post" action="admin/units/addMcqs">
                  <div class="form-group row">
                      <div class="col-lg-12">
                        <label>Question:</label>
                        <input required="required" type="text" id="question" name="question" class="form-control" placeholder="Enter question" />
                      </div>
                      <div class="col-lg-6">
                        <label>Option 1:</label>
                        <input required="required" type="text" id="op1" name="op1" class="form-control" placeholder="Enter first option">
                      </div>
                      <div class="col-lg-6">
                        <label>Option 2:</label>
                        <input required="required" type="text" id="op2" name="op2" class="form-control" placeholder="Enter second option">
                      </div>
                      <div class="col-lg-6">
                        <label>Option 3:</label>
                        <input required="required" type="text" id="op3" name="op3" class="form-control" placeholder="Enter third option">
                      </div>
                      <div class="col-lg-6">
                        <label>Option 4:</label>
                        <input required="required" type="text" id="op4" name="op4" class="form-control" placeholder="Enter forth option">
                      </div>
                      <div class="col-lg-6">
                        <label>Hint:</label>
                        <input required="required" type="text" id="hint" name="hint" class="form-control" placeholder="Enter hint">
                      </div>
                      <div class="col-lg-6">
                        <label>Answer:</label>
                        <select class="form-control" name="answer">
                          <option value="option_1">Option 1</option>
                          <option value="option_2">Option 2</option>
                          <option value="option_3">Option 3</option>
                          <option value="option_4">Option 4</option>
                        </select>
                      </div>
                      <div class="col-lg-6">
                        <span id="catError" style="color: red;" class="form-text helpTextNone">Please enter unit name</span>
                        <input type="hidden" name="unit" id="unitID" />
                        <button type="submit" style="margin-top: 25px;" id="submitMcq" class="btn btn-primary mr-2">Add MCQ</button>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editMcqModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update MCQ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="editMcqForm" method="post" action="admin/units/editMcqs">
                  <div class="form-group row">
                      <div class="col-lg-12">
                        <label>Question:</label>
                        <input required="required" type="text" id="editQuestion" name="question" class="form-control" placeholder="Enter question" />
                      </div>
                      <div class="col-lg-6">
                        <label>Option 1:</label>
                        <input required="required" type="text" id="editOp1" name="op1" class="form-control" placeholder="Enter first option">
                      </div>
                      <div class="col-lg-6">
                        <label>Option 2:</label>
                        <input required="required" type="text" id="editOp2" name="op2" class="form-control" placeholder="Enter second option">
                      </div>
                      <div class="col-lg-6">
                        <label>Option 3:</label>
                        <input required="required" type="text" id="editOp3" name="op3" class="form-control" placeholder="Enter third option">
                      </div>
                      <div class="col-lg-6">
                        <label>Option 4:</label>
                        <input required="required" type="text" id="editOp4" name="op4" class="form-control" placeholder="Enter forth option">
                      </div>
                      <div class="col-lg-6">
                        <label>Hint:</label>
                        <input required="required" type="text" id="editHint" name="hint" class="form-control" placeholder="Enter hint">
                      </div>
                      <div class="col-lg-6">
                        <label>Answer:</label>
                        <select class="form-control" id="editAns" name="answer">
                          <option value="option_1">Option 1</option>
                          <option value="option_2">Option 2</option>
                          <option value="option_3">Option 3</option>
                          <option value="option_4">Option 4</option>
                        </select>
                      </div>
                      <div class="col-lg-6">
                        <span id="catError" style="color: red;" class="form-text helpTextNone">Please enter unit name</span>
                        <input type="hidden" name="unit" id="mcqID" />
                        <input type="hidden" name="unitId" id="unitID" />
                        <button type="submit" style="margin-top: 25px;" id="updateMcq" class="btn btn-primary mr-2">Update MCQ</button>
                      </div>
                    </div>
                </form>
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

   <script type="text/javascript">
      function addMcq(unitId) {
      $("#unitID").val(unitId);
      $("#addMcqModel").modal("show");
    }
    
    function editMcq(unitId,mcqId,q,hint,o1,o2,o3,o4,ans) {
      $("#unitID").val(unitId);
      $("#mcqID").val(mcqId);
      $("#editQuestion").val(q);
      $("#editHint").val(hint);
      $("#editOp1").val(o1);
      $("#editOp2").val(o2);
      $("#editOp3").val(o3);
      $("#editOp4").val(o4);
      if (ans==o1){
          $("#editAns").val("option_1");
      }
      else if (ans==o2){
          $("#editAns").val("option_2");
      }
      else if (ans==o3){
          $("#editAns").val("option_3");
      }
      else if(ans==o4){
          $("#editAns").val("option_4");
      }
      $("#editMcqModel").modal("show");
    }


   </script>
    <!--end::Page Scripts-->
  </body>
  <!--end::Body-->
</html>