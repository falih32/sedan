<?php $role = $this->session->userdata('id_role'); ?>
<div class="container-fluid">
    <div class="row-fluid">
        <h1>
            <i class="fa fa-book"></i> Supplier
            <?php if($role <= 1){?>
            <a class="btn btn-success" data-toggle='tooltip' data-placement='top' title='Tambah Supplier' href="<?php echo base_url()."Supplier/";?>tambah_supplier"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
            <?php } ?>
        </h1>
        <hr>
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-book"></i> Daftar Supplier
            </div>
            <div class="panel-body">
            </div>
            <table class="table table-responsive table-hover table-striped" id="tabel-supplier">
            	<thead>
                <tr>
                    <th>id</th>	
                    <th>Nama</th>
                     <th>Alamat</th>
                     <th>NPWP</th>
                     <th>Perwakilan</th>
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
	var table = $('#tabel-supplier').DataTable( {
            "paging": true, 
            "search":true,
            "scrollX":true,
            "ordering": true, 
            "responsive": false,
            "processing":true, 
            "serverSide": true,
            "pageLength": 50,
            "ajax":{
                "url":"<?php echo site_url('Supplier/ajaxProcess');?>",
                "type":"POST"
            },
            "columns": [
                { "data": "spl_id" },
                { "data": "spl_nama" },
                 { "data": "spl_alamat" },
                  { "data": "spl_npwp" },
                   { "data": "spl_perwakilan" },
                { "data": "aksi" }
            ],
            "columnDefs": [
                { "searchable": false, "orderable":false, "targets": [0,2] }
            ],
            "order": [[ 4, "asc" ]],
            "drawCallback": function( settings ) {
                makeConfirmation();
                makeTooltip();
                fixedButton();
            }
	} );	
});
</script>
