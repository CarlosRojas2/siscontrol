<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
		<meta name="description" content="Spruha -  Admin Panel laravel Dashboard Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin laravel template, template laravel admin, laravel css template, best admin template for laravel, laravel blade admin template, template admin laravel, laravel admin template bootstrap 4, laravel bootstrap 4 admin template, laravel admin bootstrap 4, admin template bootstrap 4 laravel, bootstrap 4 laravel admin template, bootstrap 4 admin template laravel, laravel bootstrap 4 template, bootstrap blade template, laravel bootstrap admin template">

        <!-- Favicon -->
		<link rel="icon" href="{{asset('assets/img/brand/favicon.ico')}}" type="image/x-icon"/>

		<!-- Title -->
		<title>{{config('app.name', 'laravel')}}</title>

		<!-- Bootstrap css-->
		<link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"/>

		<!-- Icons css-->
		<link href="{{asset('assets/plugins/web-fonts/icons.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/plugins/web-fonts/font-awesome/font-awesome.min.css')}}" rel="stylesheet">
		<link href="{{asset('assets/plugins/web-fonts/plugin.css')}}" rel="stylesheet"/>

		<!-- Style css-->
		<link href="{{asset('assets/css/style/style.css')}}" rel="stylesheet">
		<link href="{{asset('assets/css/skins.css')}}" rel="stylesheet">
		<link href="{{asset('assets/css/dark-style.css')}}" rel="stylesheet">
		<link href="{{asset('assets/css/colors/default.css')}}" rel="stylesheet">

		<!-- Color css-->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('assets/css/colors/color.css')}}">

		<!-- Select2 css-->
        <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

		<!-- Internal DataTables css-->
		<link href="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
		
		<!-- Mutipleselect css-->
		<link rel="stylesheet" href="{{asset('assets/plugins/multipleselect/multiple-select.css')}}">
		
		<!-- Sidemenu css-->
		<link href="{{asset('assets/css/sidemenu/sidemenu.css')}}" rel="stylesheet">

		<!-- Switcher css-->
		<link href="{{asset('assets/switcher/css/switcher.css')}}" rel="stylesheet">
		<link href="{{asset('assets/switcher/demo.css')}}" rel="stylesheet">

		<!-- Internal Sweet-Alert css-->
		{{-- <link href="{{asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet"> --}}

	</head>

	<body class="main-body leftmenu light-horizontal light-theme light-leftmenu color-header">

		<!-- Switcher -->
		@include('includes.dashboard.fondos')
		<!-- End Switcher -->

		<!-- Loader -->
		<div id="global-loader">
			<img src="{{asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
        <!-- End Loader -->

		<!-- Page -->
		<div class="page">

        <!-- Sidemenu -->
			@include('includes.dashboard.aside')
			<!-- End Sidemenu -->        <!-- Main Header-->
			@include('includes.dashboard.header')
			<!-- End Main Header-->		<!-- Mobile-header -->
			@include('includes.dashboard.headermobile')
			<!-- Mobile-header closed -->
			<!-- Main Content-->
            @yield('content')
			<!-- End Main Content-->

		<!-- Main Footer-->
            @include('includes.dashboard.footer')
			<!--End Footer-->				
		</div>
        <!-- End Page -->

        <!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

		<!-- Jquery js-->
		<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

		<!-- Bootstrap js-->
		<script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        
		<!-- Select2 js-->
		<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

		<!-- Perfect-scrollbar js -->
		<script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

		<!-- Sidemenu js -->
		<script src="{{asset('assets/plugins/sidemenu/sidemenu.js')}}"></script>

		<!-- Sidebar js -->
		<script src="{{asset('assets/plugins/sidebar/sidebar.js')}}"></script>

		<!-- Internal Select2 js-->
        <script src="{{asset('assets/js/select2.js')}}"></script>

		<!-- Internal Data Table js -->
		<script src="{{asset('assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/fileexport/dataTables.buttons.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/fileexport/jszip.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/fileexport/pdfmake.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/fileexport/vfs_fonts.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/fileexport/buttons.html5.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/fileexport/buttons.print.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/fileexport/buttons.colVis.min.js')}}"></script>
		<script src="{{asset('assets/js/table-data.js')}}"></script>
		
		

		<!-- Peity js-->
        <script src="{{asset('assets/plugins/peity/jquery.peity.min.js')}}"></script>

		<!-- Internal Morris js -->
		<script src="{{asset('assets/plugins/raphael/raphael.min.js')}}"></script>
		<script src="{{asset('assets/plugins/morris.js/morris.min.js')}}"></script>

		<!-- Circle Progress js-->
		<script src="{{asset('assets/js/circle-progress.min.js')}}"></script>

		<!-- Internal Dashboard js-->
        {{-- <script src="{{asset('assets/js/index.js')}}"></script> --}}

		<!-- Internal Ion-rangeslider js-->
        <script src="{{asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>

		<!-- Internal Form-elements js-->
		{{-- <script src="{{asset('assets/js/form-elements.js')}}"></script> --}}
		
		<!-- Sticky js -->
		<script src="{{asset('assets/js/sticky.js')}}"></script>

		<!-- Custom js -->
		<script src="{{asset('assets/js/custom.js')}}"></script>

		<!-- Internal Sweet-Alert js-->
		{{-- <script src="{{asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
		<script src="{{asset('assets/plugins/sweet-alert/jquery.sweet-alert.js')}}"></script> --}}

		<!-- Switcher js -->
		<script src="{{asset('assets/switcher/js/switcher.js')}}"></script>
		@yield('scripts')
	</body>
</html>