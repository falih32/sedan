<?php $role = $this->session->userdata('id_role'); ?>
<div class="container-fluid">
    <div class="row-fluid">
        <h1>
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> User
        </h1>
        <hr>
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Daftar User
            </div>
            <div class="panel-body">
            </div>
            <table class="table table-responsive table-hover table-striped" id="tabel-user">
            	<thead>
                <tr>
                	<th>Nama</th>
                	<th>Username</th>
                        <th>NIP</th> 
                	<th>E-mail</th>
                	<th>Role</th>
                	<th>Aksi</th>
                	
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
<!--
    function makeConfirmation(){
	var deleteLinks = document.querySelectorAll('.delete');
	for (var i = 0, length = deleteLinks.length; i < length; i++) {
            deleteLinks[i].addEventListener('click', function(event) {
                event.preventDefault();

                var choice = confirm(this.getAttribute('data-confirm'));

                if (choice) {
                    window.location.href = this.getAttribute('href');
                }
            });
	}
    }

    function makeTooltip(){
	$('[data-toggle="tooltip"]').tooltip({});
    }

    function fixedButton(){
        $('.btn-aksi').width(
            Math.max.apply( 
                Math, 
                $('.btn-aksi').map(function(){
                    return $(this).outerWidth();
                }).get()
            )
        );
    }

$(document).ready(function() {
	
	var table = $('#tabel-user').DataTable( {
    	"paging": true, 
		"search":true,  
		"scrollX":true,
		"ordering": true, 
		"responsive": false,
		"processing":true, 
		"serverSide": true,
                "pageLength": 50,
		"ajax":{
			"url":"<?php echo site_url('User/ajaxProcess');?>",
			"type":"POST"
		},
		"columns": [
                { "data": "pgw_nama" },
                { "data": "usr_username" },
                { "data": "pgw_nip" },
                { "data": "usr_email" },
                { "data": "usr_role" },
                { "data": "aksi" }
              ],
		"columnDefs": [
				{ "searchable": false, "orderable":false, "targets": 5 },
                                { "searchable": false, "targets": [4] }
                        ],
		"order": [[ 2, "asc" ]],
		"drawCallback": function( settings ) {
			makeConfirmation();
			makeTooltip();
                        fixedButton();
		},
                "createdRow": function ( row, data, index ) {
                    $(row).click(function(){window.location.href = '<?php echo site_url('User/detail_user').'/'; ?>'+data.usr_id;});
                    $(row).find('a').click(function(e){e.stopPropagation();});
                   }
	} );
	
});
</script>