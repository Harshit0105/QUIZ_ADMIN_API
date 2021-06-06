
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>Admin | Advertisements</title>
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
                      <h3 class="card-label">Advertisement banners</h3>
                      <button type="button" class="btn btn-primary" data-toggle="modal"     data-target="#addAdModel">
                        Add Advertise
                      </button>
                    </div>
                    
                  </div>
                  <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Banner</th>
                          <th>Link</th>
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
                <a href="http://keenthemes.com/metronic" target="_blank" class="text-dark-75 text-hover-primary">Club Visnagar</a>
              </div>
              
              <!--end::Nav-->
            </div>
            <!--end::Container-->
          </div>
          <!--end::Footer-->
        </div>
			</div>
			<!--end::Page-->
		</div>
		
		<div class="modal fade" id="addAdModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new Advertise</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form enctype='multipart/form-data' id="addAdForm" method="post" action="redver/addRedver">
                  <div class="form-group row">
                            <div class="col-lg-6">
                              <label>Ad link:</label>
                              <input type="text" class="form-control" name="link" id="adL" placeholder="Enter Ad link">
                            </div>
                            <div class="col-lg-6">
                              <label>Ad Banner:</label>
                              <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile" name="adBanner">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                               <span  class="form-text text-muted"><small>Image must be in jpg/png/jpeg format and the size should be less than 5 MB.</small></span>
                            </div>

                            </div>
                            <div class="col-lg-12"><span id="adError" style="color: red;" class="form-text helpTextNone"></span></div>
                            <div class="col-lg-6">
                            <button type="button" style="margin-top: 25px;" id="submitAdvertise" class="btn btn-primary mr-2">Upload Advertise</button>
                          </div>
                          </div>
                  
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editAdModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Advertise</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form enctype='multipart/form-data' id="editAdForm" method="post" action="redver/updateRedver">
                  <div class="form-group row">
                    <div class="col-lg-12">
                      <label>Ad link:</label>
                      <input type="text" class="form-control" name="link" id="adLEdit" placeholder="Enter Ad link">
                    </div>
                    <div style="margin-top: 10px;" class="col-lg-6">
                      <label>Current banner:</label>
                      <div><span class="symbol-label symbol symbol-50 symbol-light mr-4">
                        <img id="currentBanner" class="h-75 align-self-end" alt="" />
                      </span></div>
                    </div>
                    <div style="margin-top: 10px;" class="col-lg-6">
                      <label>Choose banner <small class="text-muted">(or leave it blank)</small>: </label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFileEdit" name="adBannerEdit">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        <span  class="form-text text-muted"><small>Image must be in jpg/png/jpeg format and the size should be less than 5 MB.</small></span>
                      </div>
                      <input type="hidden" name="id" id="adIdEdit" />
                    </div>
                    <div class="col-lg-12"><span id="adErrorEdit" style="color: red;" class="form-text helpTextNone"></span></div>
                    <div class="col-lg-6">
                      <button type="button" style="margin-top: 25px;" id="submitAdvertiseEdit" class="btn btn-primary mr-2">Update Advertise</button>
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
		<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
   <script src="assets/js/pages/crud/datatables/data-sources/ajax-server-side-avdv.js"></script>

   <script type="text/javascript">
     $(document).on("click","#submitAdvertise",function(e) {
      if($.isEmptyObject($("#adL").val())) {
      
        $("#adError").removeClass("helpTextNone");
        $("#adError").text("Please enter advertise link.");
      
      } else if($('#customFile').get(0).files.length === 0) {
      
        $("#adError").removeClass("helpTextNone");
        $("#adError").text("Please select Ad banner from your device.");
      
      } else {
      
        $("#adError").addClass("helpTextNone");
        $("#adError").text("");
        $("#addAdForm").submit();
      
      }
     });


     $(document).on("click","#submitAdvertiseEdit",function(e) {
       if($.isEmptyObject($("#adLEdit").val())) {
      
        $("#adErrorEdit").removeClass("helpTextNone");
        $("#adErrorEdit").text("Please enter advertise link.");
      
      } else {
      
        $("#adErrorEdit").addClass("helpTextNone");
        $("#adErrorEdit").text("");
        $("#editAdForm").submit();
      
      }
     });


     function editAdvertise(id,banner,link) { 
      $("#adLEdit").val(link);
      $("#adIdEdit").val(id);
      $("#currentBanner").attr("src",`./images/red/${banner}`);
      $("#editAdModel").modal("show");
     }


   </script>

	</body>
	<!--end::Body-->
</html>