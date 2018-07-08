<!DOCTYPE html>
<html  ng-app="app">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Cakebox Signage</title>
	<!-- Global stylesheets -->
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'/>
	<link href="{{ asset('assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/core.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/colors.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css">
	<!-- <link rel="shortcut icon" href="../../images/bca/logo.png"> -->
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/pace.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/core/libraries/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/blockui.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/ui/moment/moment.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/notifications/noty.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/bootstrapdatapicker/bootstrapdatetimepicker.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/notifications/sweet_alert.min.js') }}"></script>
	<!-- /core JS files -->
	<script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery_ui/core.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery_ui/effects.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery_ui/interactions.min.js') }}"></script>
	<!-- Theme JS files -->
	<script type="text/javascript" src="{{ asset('assets/js/plugins/ui/nicescroll.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/extensions/responsive.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/pages/layout_fixed_custom.js') }}"></script> 
	<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/switchery.min.js') }}"></script>  


	<!-- /theme JS files -->

	<!-- Angular JS files -->
	<script type="text/javascript" src="{{ asset('assets/js/angular/angular.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/angular/angular-sanitize.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/angular/app.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/angular/loading-bar.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/angular/service.js') }}"></script>
	<!-- /Angular JS files -->

	<!-- <script type="text/javascript" src="assets/js/core/libraries/jquery_ui/core.min.js"></script> -->
	<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}""></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}""></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/selectboxit.min.js') }}""></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/bootstrap_select.min.js') }}""></script>
	<!-- <script type="text/javascript" src="{{ asset('assets/js/pages/uploader_dropzone.js') }}"></script> -->
	<script type="text/javascript" src="{{ asset('assets/js/plugins/uploaders/dropzone.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/media/fancybox.min.js') }}"></script>

	<!-- <script type="text/javascript" src="assets/js/pages/colors_green.js"></script> -->

	@yield('css')
	<style type="text/css">
		#overlay{
			position:fixed;
			z-index:99999;
			top:0;
			left:0;
			bottom:0;
			right:0;
			background:#f5f5f7;
			transition: 1s 0.4s;
		}
		#progress{
			height:5px;
			background:#0f6d7b;
			position:absolute;
			width:0;                
			top:50%;
		}
		#progstat{
			font-size:24px;
			letter-spacing: 3px;
			position:absolute;
			top:50%;
			margin-top:-40px;
			width:100%;
			text-align:center;
			color:#0f6d7b;
		}
	</style>
	<script type="text/javascript">
		;(function(){
			function id(v){ return document.getElementById(v); }
			function loadbar() {
				var ovrl = id("overlay"),
				prog = id("progress"),
				stat = id("progstat"),
				img = document.images,
				c = 0,
				tot = img.length;
				if(tot == 0) return doneLoading();

				function imgLoaded(){
					c += 1;
					var perc = ((100/tot*c) << 0) +"%";
					prog.style.width = perc;
					stat.innerHTML = "Loading "+ perc;
					if(c===tot) return doneLoading();
				}
				function doneLoading(){
					ovrl.style.opacity = 0;
					setTimeout(function(){ 
						$('.sidebar-category').fadeIn();
						$('.navbar-right').fadeIn();
					}, 300);
					
					setTimeout(function(){ 
						ovrl.style.display = "none";
					}, 1500);
				}
				for(var i=0; i<tot; i++) {
					var tImg     = new Image();
					tImg.onload  = imgLoaded;
					tImg.onerror = imgLoaded;
					tImg.src     = img[i].src;
				}    
			}
			document.addEventListener('DOMContentLoaded', loadbar, false);
		}());
	</script>
</head>

<body class="navbar-top">
	<div id="overlay">
		<div id="progstat"></div>
		<div id="progress"></div>
	</div>
	@include('admin.main_navbar')
	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			@include('admin.main_sidebar')
			<!-- Main content -->
			<div class="content-wrapper">
				{{--@include('admin.page_header')--}}
				<!-- Content area -->
				<div class="content">
					@yield('content')
					@include('admin.footer')
				</div>
				<!-- /content area -->
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->
</body>

@yield('script')
</html>
