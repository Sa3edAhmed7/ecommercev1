<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield("title")</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/app.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/bundles/prism/prism.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/bundles/datatables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/bundles/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/bundles/jquery-selectric/selectric.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/admin/bundles/summernote/summernote-bs4.css')}}">
    
    <link rel="stylesheet" href="{{asset('assets/admin/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/bundles/bootstrap-daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet"
        href="{{asset('assets/admin/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/bundles/dropzonejs/dropzone.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/components.css')}}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/custom.css')}}">
    <link rel='shortcut icon' type='image/x-icon' href="{{asset('assets/admin/img/favicon.ico')}}" />

    <link rel="stylesheet" href="{{asset('assets/admin/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">

    <style>
        ::-webkit-scrollbar {
        width: 5px;
        height: 5px;
        border-radius: 50px !important
    }

    ::-webkit-scrollbar-track {
      background: #ffffff
    }
    
    ::-webkit-scrollbar-thumb {
      background: #6777ef
    }
    
    ::-webkit-scrollbar-thumb:hover {
      background: #555
    }
    </style>

@yield('admin-style')

</head>

<body style="user-select: none;">
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
        
        @include('layouts.header')


            @yield('content')

            <div class="settingSidebar">
                <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
                </a>
                <div class="settingSidebar-body ps-container ps-theme-default">
                    <div class=" fade show active">
                        <div class="setting-panel-header">Setting Panel
                        </div>
                        <div class="p-15 border-bottom">
                            <h6 class="font-medium m-b-10">Select Layout</h6>
                            <div class="selectgroup layout-color w-50">
                                <label class="selectgroup-item">
                                    <input type="radio" name="value" value="1"
                                        class="selectgroup-input-radio select-layout" checked>
                                    <span class="selectgroup-button">Light</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="value" value="2"
                                        class="selectgroup-input-radio select-layout">
                                    <span class="selectgroup-button">Dark</span>
                                </label>
                            </div>
                        </div>
                        <div class="p-15 border-bottom">
                            <h6 class="font-medium m-b-10">Sidebar Color</h6>
                            <div class="selectgroup selectgroup-pills sidebar-color">
                                <label class="selectgroup-item">
                                    <input type="radio" name="icon-input" value="1"
                                        class="selectgroup-input select-sidebar">
                                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                        data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="icon-input" value="2"
                                        class="selectgroup-input select-sidebar" checked>
                                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                        data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                                </label>
                            </div>
                        </div>
                        <div class="p-15 border-bottom">
                            <div class="theme-setting-options">
                                <label class="m-b-0">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                        id="mini_sidebar_setting">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="control-label p-l-10">Mini Sidebar</span>
                                </label>
                            </div>
                        </div>
                        <div class="p-15 border-bottom">
                            <div class="theme-setting-options">
                                <label class="m-b-0">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                        id="sticky_header_setting">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="control-label p-l-10">Sticky Header</span>
                                </label>
                            </div>
                        </div>
                        <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                            <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                                <i class="fas fa-undo"></i> Restore Default
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{asset('assets/admin/js/app.min.js')}}"></script>
    <script src="{{asset('assets/admin/bundles/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/admin/bundles/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
    <!-- JS Libraies -->
    <script src="{{asset('assets/admin/bundles/prism/prism.js')}}"></script>
    <script src="{{asset('assets/admin/bundles/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/admin/bundles/dropzonejs/min/dropzone.min.js')}}"></script>
    <script src="{{asset('assets/admin/bundles/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/admin/bundles/jquery-steps/jquery.steps.min.js')}}"></script>
    <script src="{{asset('assets/admin/bundles/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
    <script src="{{asset('assets/admin/bundles/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/admin/bundles/jquery-selectric/jquery.selectric.min.js')}}"></script>
    <script src="{{asset('assets/admin/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{asset('assets/admin/bundles/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('assets/admin/bundles/summernote/summernote-bs4.js')}}"></script>
    <script src="{{asset('assets/admin/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>

    <!-- Page Specific JS File -->
    <script src="{{asset('assets/admin/js/page/index.js')}}"></script>
    <script src="{{asset('assets/admin/js/page/toastr.js')}}"></script>
    <script src="{{asset('assets/admin/js/page/datatables.js')}}"></script>
    <script src="{{asset('assets/admin/js/page/form-wizard.js')}}"></script>
    <script src="{{asset('assets/admin/js/page/multiple-upload.js')}}"></script>
    <script src="{{asset('assets/admin/js/page/auth-register.js')}}"></script>
    <!-- Template JS File -->
    <script src="{{asset('assets/admin/js/scripts.js')}}"></script>
    <!-- Custom JS File -->
    <script src="{{asset('assets/admin/js/custom.js')}}"></script>

    <script src="https://cdn.tiny.cloud/1/q49nzqhhac1g2vljd07n2ngq1ps81nsflh401f8j3m3v86vq/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  
</body>

@yield('admin-scripts')

</html>