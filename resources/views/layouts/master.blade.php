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

    <script>
    setInterval(function(){
        $("#notifications_count").load(window.location.href + " #notifications_count");
        $("#unreadNotifications").load(window.location.href + " #unreadNotifications");
       }, 5000);
    </script>


    @livewireStyles
</head>

<body style="user-select: none;">
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
        @livewire('admin.header-component')
            {{$slot}}

        @livewire('admin.admin-create-chat-component')



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

@livewireScripts

@stack('scripts')

</html>
