
<div id="kt_header" style="height: 85px;" class="header header-fixed">
            <!--begin::Container-->
            <div class="container-fluid d-flex align-items-stretch justify-content-between">
              <!--begin::Header Menu Wrapper-->
              <div style="margin-top: 25px;" class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                  <!--begin::Page Title-->
                  <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">/ <?php echo $this->session->flashdata('headerSection'); ?></h5>
                 
                  <!--end::Actions-->
                </div>
                <div style="margin-left: 150px;" class="d-flex align-items-center flex-wrap mr-2">
                  <?php if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                    </div>
                   <?php } ?>

                   <?php if ($this->session->flashdata('error')) { ?>
                    <div class="alert alert-danger" role="alert">
                    <?php echo $this->session->flashdata('error'); ?>
                    </div>
                   <?php } ?>

                </div>
              </div>
              </div>
              <!--end::Header Menu Wrapper-->
              <!--begin::Topbar-->
              <div class="topbar">
                
                <!--begin::User-->
                <div class="topbar-item">
                  <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                    <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                    <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">Admin</span>
                    <div class="dropdown dropdown-inline">
                    <a href="#" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                      <span class="symbol-label font-size-h5 font-weight-bold">A</span>
                    </span>
                    </a>
                    <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right py-3">
                      <!--begin::Navigation-->
                      <ul class="navi navi-hover py-5">
                        <!-- <li class="navi-item">
                          <a href="#" class="navi-link">
                            <span class="navi-icon">
                              <i class="flaticon2-gear"></i>
                            </span>
                            <span class="navi-text">Settings</span>
                          </a>
                        </li> -->
                        <li class="navi-separator my-3"></li>
                        <li class="navi-item">
                          <a href="admin/login/logout" class="navi-link">
                            <span class="navi-icon">
                              <i class="flaticon2-magnifier-tool"></i>
                            </span>
                            <span class="navi-text">Log out</span>
                          </a>
                        </li>
                      </ul>
                      <!--end::Navigation-->
                    </div>
                  </div>
                  </div>
                </div>
                <!--end::User-->
              </div>
              <!--end::Topbar-->
            </div>
            <!--end::Container-->
          </div>