<?php $role = $this->session->userdata('id_role'); ?>
<div class="container-fluid">
    <div class="row-fluid">
        <h1>
            <i class="fa fa-building"></i> Jabatan
            <?php if($role <= 1){?>
            <a class="btn btn-success" data-toggle='tooltip' data-placement='top' title='Tambah Jabatan' href="<?php echo base_url()."Jabatan/";?>tambah_jabatan"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
            <?php } ?>
        </h1>
        <hr>
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-building"></i> Daftar Jabatan
            </div>
            <div class="panel-body">
            </div>
            <table class="table table-responsive table-hover table-striped" id="tabel-jabatan">
            	<thead>
                <tr>
                	<th>Nama Jabatan</th>
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
	
	var table = $('#tabel-jabatan').DataTable( {
    	"paging": true, 
		"search":true,
                "scrollX":true,
		"ordering": true, 
		"responsive": false,
		"processing":true, 
		"serverSide": true,
                "pageLength": 50,
		"ajax":{
			"url":"<?php echo site_url('Jabatan/ajaxProcess');?>",
			"type":"POST"
		},
		"columns": [
                
                { "data": "jbt_nama" },
                { "data": "aksi" },
                { "data": "jbt_id" }
              ],
		"columnDefs": [
				{ "searchable": false, "orderable":false, "targets": 1 },
                                { "visible":false, "targets": 2}
			],
		"order": [[ 2, "asc" ]],
		"drawCallback": function( settings ) {
			makeConfirmation();
			makeTooltip();
                        fixedButton();
		}
	} );
	
});
</script>