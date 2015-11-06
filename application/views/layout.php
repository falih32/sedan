<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="KeyWords" content="kementrian, perikanan, kelautan, indonesia">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $title; ?></title>
    <link rel="icon" href="<?php echo base_url();?>assets/css/images/icon.ico">
    <link href="<?php echo base_url();?>assets/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/bootstrap-colorpalette.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/sidoel.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/vis.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/dependent-dropdown.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/sb-admin-2.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/timeline.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/metisMenu/src/metisMenu.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="<?php echo base_url();?>assets/js/jquery-1.11.2_min.js"></script>
    <![endif]-->
    <!--[if gte IE 9]><!-->
    <script src="<?php echo base_url();?>assets/js/jquery-2.1.3_min.js"></script>
    <!--<![endif]-->
    <script src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/datepicker-id.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/dataTables.tableTools.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-colorpalette.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.file-input.js"></script>
    <script src="<?php echo base_url();?>assets/js/validator.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/Chart.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/vis.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/select2.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/dependent-dropdown.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/amcharts.js"></script>
    <script src="<?php echo base_url();?>assets/js/serial.js"></script>
    <script src="<?php echo base_url();?>assets/metisMenu/src/metisMenu.js"></script>

    <script type="text/javascript">
	// <![CDATA[
	$(document).ready(function () {
            $.datepicker.setDefaults(
                $.extend(
                    {'dateFormat':'dd-mm-yy'}
                )
            );
            $(function() {
                $( ".tgl" ).datepicker({
                    dateFormat: 'yy-mm-dd'
                });
            });
	});
	// ]]>
	</script>
</head>
<body>
	<div id="container">
    	<div id="header"><?php $this->load->view('head'); ?></div>
        <div id="content-wrapper" class="row">
            <div id="content" class="col-sm-10"><?php $this->load->view($content); ?></div>
        </div>
        <div id="footer"><?php $this->load->view('footer'); ?></div>
	</div>
</body>
</html>