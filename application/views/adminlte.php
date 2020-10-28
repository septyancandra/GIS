<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo-tsel.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SITE | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.css">
	<!-- Style Toastr -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/toastr/toastr.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/dist/css/AdminLTE.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/dist/css/skins/_all-skins.min.css">
	<!-- Morris chart -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/bower_components/morris.js/morris.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/bower_components/jvectormap/jquery-jvectormap.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<!--leaflet css-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/leaflet/leaflet.css" />
	<!--Carousel css-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/leaflet/leaflet.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/carousell/custom.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	</script>
	
	<!-- jQuery 3 -->
	<script src="<?php echo base_url(); ?>assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?php echo base_url(); ?>assets/adminlte/bower_components/jquery-ui/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<!--peta--> 	
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRvZR4SHSYtbRMP-ME9rBpYyJN-R9aiQE&libraries=geometry"></script>
	<!-- leaflet untuk peta -->	
	<script src="<?php echo base_url(''); ?>assets/adminlte/plugins/leaflet/leaflet.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo base_url(); ?>assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>	
	<!-- Highchart -->	
	<script src="<?php echo base_url(); ?>assets/adminlte/plugins/highchart/highcharts.js"></script>
	<!-- Sparkline -->
	<script src="<?php echo base_url(); ?>assets/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
	<!-- jvectormap -->
	<script src="<?php echo base_url(); ?>assets/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<!-- jQuery Knob Chart -->
	<script src="<?php echo base_url(); ?>assets/adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
	<!-- daterangepicker -->
	<script src="<?php echo base_url(); ?>assets/adminlte/bower_components/moment/min/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- datepicker -->
	<script src="<?php echo base_url(); ?>assets/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<!-- Bootstrap WYSIHTML5 -->
	<script src="<?php echo base_url(); ?>assets/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	<!-- Slimscroll -->
	<script src="<?php echo base_url(); ?>assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="<?php echo base_url(); ?>assets/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url(); ?>assets/adminlte/dist/js/adminlte.min.js"></script>	
	
	<!-- DataTables -->
	<script src="<?php echo base_url(); ?>assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
		
	<!--Toastr JS -->
	<script src="<?php echo base_url(); ?>assets/toastr/toastr.js"></script>
	
	<!--select2-->
	<script src="<?php echo base_url(); ?>assets/adminlte/select2/select2.full.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/select2/select2.min.css">
	
</head>
<body class="hold-transition skin-red-light sidebar-mini">
<!--<body class="hold-transition skin-red-light sidebar-collapse sidebar-mini">-->
<div class="wrapper">
	<?php echo $_header;?>
  <!-- Left side column. contains the logo and sidebar -->
	<?php echo $_sidebar;?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->   

    <!-- Main content -->
    <div id="content">
		<?php echo $_content;?>
	</div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.0.0
    </div>
    <strong>Copyright &copy; 2014-<?php echo date('Y');?> </strong> SQAREG 5    
  </footer>

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<div class="loading" style="position: fixed; bottom: 10px; right: 10px; z-index: 1000; display: none">
  <img src="<?php echo base_url(); ?>assets/image/loading.gif">
</div>

<script>
  $(document).ready(function(){
		$( document ).ajaxStart(function() {
			$(".loading").fadeIn();
		}).ajaxStop(function(){
			$(".loading").fadeOut();
		});
		
		$('.loading').click(function(e){
			$(".loading").fadeOut();
		})
		
		$('.ajax').click(function(e){
			var hal = $(this).text();
			e.preventDefault();
			$.get($(this).attr('href'),function(Res){			
				$('#content').html(Res);								
				document.title = 'SQA | '+hal;
			});
		})
	})
</script>



</body>
</html>
