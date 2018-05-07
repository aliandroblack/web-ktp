<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<marquee><title>KTP</title></marquee>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ url('/')}}/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="{{ url('/')}}/assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="{{ url('/')}}/assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="{{ url('/')}}/assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="{{ url('/')}}/assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{ url('/')}}/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="{{ url('/')}}/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="{{ url('/')}}/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{ url('/')}}/assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{ url('/')}}/assets/js/plugins/uploaders/fileinput.min.js"></script>
	<script type="text/javascript" src="{{ url('/')}}/assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="{{ url('/')}}/assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script type="text/javascript" src="{{ url('/')}}/assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="{{ url('/')}}/assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="{{ url('/')}}/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="{{ url('/')}}/assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="{{ url('/')}}/assets/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="{{ url('/')}}/assets/js/plugins/pickers/pickadate/picker.js"></script>
	<script type="text/javascript" src="{{ url('/')}}/assets/js/plugins/pickers/pickadate/picker.date.js"></script>
	<script type="text/javascript" src="{{ url('/')}}/assets/js/plugins/editors/wysihtml5/wysihtml5.min.js"></script>
	<script type="text/javascript" src="{{ url('/')}}/assets/js/plugins/editors/wysihtml5/toolbar.js"></script>
	<script type="text/javascript" src="{{ url('/')}}/assets/js/pages/editor_wysihtml5.js"></script>
	<!--script type="text/javascript" src="{{ url('/')}}/assets/js/pages/wysihtml5.js"></script-->
	<script type="text/javascript" src="{{ url('/')}}/assets/js/plugins/editors/wysihtml5/parsers.js"></script>
	<!--script type="text/javascript" src="{{ url('/')}}/assets/js/plugins/editors/summernote/summernote.min.js"></script-->
	<!--script type="text/javascript" src="{{ url('/')}}/assets/js/pages/editor_summernote.js"></script-->
	<script type="text/javascript" src="{{ url('/')}}/assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="{{ url('/')}}/assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="{{ url('/')}}/assets/js/plugins/notifications/bootbox.min.js"></script>
	<script type="text/javascript" src="{{ url('/')}}/assets/js/pages/components_modals.js"></script>
	<!--<script type="text/javascript" src="{{ url('/')}}/assets/js/jquery.form.js"></script>-->
	<script type="text/javascript" src="{{ url('/')}}/assets/js/core/app.js"></script>
	<!--<script type="text/javascript" src="{{ url('/')}}/assets/js/pages/dashboard.js"></script>-->
	<script type="text/javascript" src="{{ url('/')}}/assets/js/sweetalert/sweetalert.min.js"></script>
		<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ url('/') }}">KTP.COM</a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>

			<p class="navbar-text"><span class="label bg-success-400">Online</span></p>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown language-switch">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="{{ url('/')}}/assets/images/flags/id.png" class="position-left" alt="">
						Bahasa
						<span class="caret"></span>
					</a>

					<ul class="dropdown-menu">
						<li><a class="indonesia"><img src="{{ url('/')}}/assets/images/flags/id.png" alt=""> Bahasa</a></li>
						<li><a class="english"><img src="{{ url('/')}}/assets/images/flags/gb.png" alt=""> English</a></li>
					</ul>
				</li>

				

				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="{{ url('/')}}/uploads/images/profile/{$ctlUser->U_AVATAR_PATH}" alt="">
						@foreach ($ctlUsers as $ctlUser)
						<span>{{$ctlUser->U_NAME}}</span>
						 @endforeach
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="{{ url('profile') }}"><i class="icon-user-plus"></i> My profile</a></li>
						<li><a href="{{ url('auth/logout') }}"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page header -->
	<div class="page-header">
		<div class="breadcrumb-line breadcrumb-line-wide">
			<ul class="breadcrumb">
				<li><a href="{{ url('/')}}/dashboard"><i class="icon-home2 position-left"></i> Home</a></li>
				<li class="active">Dashboard</li>
			</ul>

			<ul class="breadcrumb-elements">
				<li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-gear position-left"></i>
						Settings
						<span class="caret"></span>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="{{ url('profile') }}"><i class="icon-user-lock"></i> Account Setting</a></li>
					</ul>
				</li>
			</ul>
		</div>

		<div class="page-header-content">
			<br>
			<!-- <div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard <small>Hello, Victoria!</small></h4>
			</div>

			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
				</div>
			</div> -->
		</div>
	</div>
	<!-- /page header -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-default">
				<div class="sidebar-content">

					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-title h6">
							<span>Navigasi Utama</span>
							<ul class="icons-list">
								<li><a href="#" data-action="collapse"></a></li>
							</ul>
						</div>

						<div class="category-content sidebar-user">
							<div class="media">
								<a href="#" class="media-left"><img src="{{ url('/')}}/assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold">@if(Session::has('SESSION_USER_NAME')) {{Session::get('SESSION_USER_NAME')}} @endif</span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;Terferifikasi
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">
								<!-- Main sidebar menu -->
								<li class="navigation-header"><span>MENU</span> <i class="icon-menu" title="Main pages"></i></li>
							    <li><a href="{{ url('news') }}"><i class="icon-pencil"></i> <span>KTP</span></a></li>
									<li class="navigation-header"><span>ADMINISTRATOR</span> <i class="icon-menu" title="Main pages"></i></li>
								<li><a href="{{ url('user-mgmt') }}"><i class="icon-film"></i> <span>User Management</span></a></li>
								<li class="navigation-header"><span>UMUM</span> <i class="icon-menu" title="Main pages"></i></li>
								<li><a href="{{ url('profile') }}"><i class="icon-user-tie"></i> <span>Profil</span></a></li>
								<li><a href="{{ url('auth/logout') }}"><i class="icon-exit3"></i> <span>Keluar</span></a></li>



								<!-- /main -->
							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">
				@yield('content')
			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->


		<!-- Footer -->
		<div class="footer text-muted">
			&copy; 2018.KTP.com
		</div>
		<!-- /footer -->

	</div>
	<!-- /page container -->

	<!-- Toastr -->
  <script type="text/javascript" src="{{ url('/') }}/assets/js/toastr/toastr.js"></script>
  <link type="text/css" rel="stylesheet" href="{{ url('/') }}/assets/js/toastr/toastr.css" />

  <script type="text/javascript" src="{{ url('/') }}/assets/js/plugins/uploaders/fileinput.min.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/assets/js/pages/uploader_bootstrap.js"></script>

	<!-- iOS overlay -->
  <script src="{{ url('/') }}/assets/js/overlay/iosOverlay.js"></script>
  <script src="{{ url('/') }}/assets/js/overlay/spin.min.js"></script>
  <link rel="stylesheet" href="{{ url('/') }}/assets/js/overlay/iosOverlay.css">
  <script src="{{ url('/') }}/assets/js/overlay/modernizr-2.0.6.min.js"></script>
  <script type="text/javascript">
    function createOverlay(screenText) {
      var target = document.createElement("div");
      document.body.appendChild(target);
      var opts = {
        lines: 13, // The number of lines to draw
        length: 11, // The length of each line
        width: 5, // The line thickness
        radius: 17, // The radius of the inner circle
        corners: 1, // Corner roundness (0..1)
        rotate: 0, // The rotation offset
        color: '#FFF', // #rgb or #rrggbb
        speed: 1, // Rounds per second
        trail: 60, // Afterglow percentage
        shadow: false, // Whether to render a shadow
        hwaccel: false, // Whether to use hardware acceleration
        className: 'spinner', // The CSS class to assign to the spinner
        zIndex: 2e9, // The z-index (defaults to 2000000000)
        top: 'auto', // Top position relative to parent in px
        left: 'auto' // Left position relative to parent in px
      };        
      var spinner = new Spinner(opts).spin(target);
      gOverlay = iosOverlay({
        text: screenText,
        /*duration: 2e3,*/
        spinner: spinner
      });
    }

    var gOverlay;
  </script> 
</body>
</html>
