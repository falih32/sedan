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
<link type="text/css" rel="stylesheet" media="all" href="<?=base_url()?>chat/css/chat.css" />
<script type="text/javascript" src="<?=base_url()?>chat/js/chat.js"></script>

    <script type="text/javascript">
	// <![CDATA[
	$(document).ready(function () {
            
            $('#updateCount').click(function() {
                $.ajax({ 
                    url: "<?php echo site_url('Notifikasi/updateCount'); ?>",
                    type: "POST"
                });
            });
            
            $('#clearNotif').click(function() {
                $.ajax({ 
                    url: "<?php echo site_url('Notifikasi/deleteByUser'); ?>",
                    type: "POST",
                    success:function(){
                        var list = document.getElementById("notif-list");
                        list.innerHTML = "";
                    }
                });
            });
		
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
                
                
            function setupNotif(){
                var list = document.getElementById("notif-list");
                var lastID, status;
                if(list.children.length > 0){lastID = list.getElementsByTagName('a')[0].getAttribute("data-id");}
                else{lastID = 0;}
                $.ajax({
                    url: "<?php echo site_url('Notifikasi/getNotification');?>/"+lastID,
                    type: "POST",
                    success: function(result){
                        result = JSON.parse(result);
                        $.each(result, function(key){
                            if(result[key].ntf_read_status == 0){status = "info";}
                            else{status = "read"}
                            list.innerHTML = list.innerHTML + '<a href="<?php echo base_url(); ?>Notifikasi/goto_notif/'+ result[key].ntf_id +'" class="list-group-item list-group-item-'+ status +'" data-id="'+ result[key].ntf_id +'"><h5 class="list-group-item-heading"><i class="fa '+ result[key].m_ntf_icon +'"></i> '+ result[key].m_ntf_title +'</h5><p class="list-group-item-text">'+ result[key].ntf_message +'</p></a>';
                        });
                        $('#notif-loading').hide();
                        getNewNotif();
                        setInterval(getNewNotif, 5*1000);
                    }
                });
            }
            
            function getNewNotif(){
                var list = document.getElementById("notif-list");
                var lastID, status;
                if(list.children.length > 0){lastID = list.getElementsByTagName('a')[0].getAttribute("data-id");}
                else{lastID = 0;}
                jQuery.getJSON("<?php echo site_url('Notifikasi/countNotif'); ?>",{
                    format: "json",
                    dataType: 'json',
                    contentType: "application/json; charset=utf-8"},
                    function(result){
                        if(result == 0){result = "";}
                        document.getElementById("notif").textContent=result;
                });
                $.ajax({
                    url: "<?php echo site_url('Notifikasi/getNotification');?>/"+lastID,
                    type: "POST",
                    success: function(result){
                        result = JSON.parse(result);
                        $.each(result, function(key){
                            if(result[key].ntf_read_status == 0){status = "info";}
                            else{status = "read"}
                            list.innerHTML = '<a href="<?php echo base_url(); ?>Notifikasi/goto_notif/'+ result[key].ntf_id +'" class="list-group-item list-group-item-'+ status +'" data-id="'+ result[key].ntf_id +'"><h5 class="list-group-item-heading"><i class="fa '+ result[key].m_ntf_icon +'"></i> '+ result[key].m_ntf_title +'</h5><p class="list-group-item-text">'+ result[key].ntf_message +'</p></a>' + list.innerHTML;
                        });
                    }
                });
            }
            
            function getOldNotif(){
                var list = document.getElementById("notif-list");
                var lastID = document.getElementById("notif-list").lastChild.getAttribute("data-id");
                var status;
                $('#notif-loading').show();
                $.ajax({
                    url: "<?php echo site_url('Notifikasi/getOldNotification');?>/"+lastID,
                    type: "POST",
                    success: function(result){
                        result = JSON.parse(result);
                        $.each(result, function(key){
                            if(result[key].ntf_read_status == 0){status = "info";}
                            else{status = "read"}
                            list.innerHTML = list.innerHTML + '<a href="<?php echo base_url(); ?>Notifikasi/goto_notif/'+ result[key].ntf_id +'" class="list-group-item list-group-item-'+ status +'" data-id="'+ result[key].ntf_id +'"><h5 class="list-group-item-heading"><i class="fa '+ result[key].m_ntf_icon +'"></i> '+ result[key].m_ntf_title +'</h5><p class="list-group-item-text">'+ result[key].ntf_message +'</p></a>';
                        });
                        $('#notif-loading').hide();
                    }
                });
            }
            
            setupNotif();
            
            $('#notif-wrapper').bind('scroll', function() {
                var scrollPosition = $(this).scrollTop() + $(this).outerHeight();
                var divTotalHeight = $(this)[0].scrollHeight 
                                      + parseInt($(this).css('padding-top'), 10) 
                                      + parseInt($(this).css('padding-bottom'), 10)
                                      + parseInt($(this).css('border-top-width'), 10)
                                      + parseInt($(this).css('border-bottom-width'), 10);

                if( scrollPosition == divTotalHeight )
                {
                  getOldNotif();
                }
            });
            
            function fixSide() {
                var elementPosition = $('#sidebar').offset();

                $(window).scroll(function(){
                        if($(window).scrollTop() > elementPosition.top && $(window).width() >= 768){
                              $('#sidebar').css('position','fixed').css('top','0').css('right','0');
                        } else {
                            $('#sidebar').css('position','relative');
                        }    
                });
            }
            fixSide();
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