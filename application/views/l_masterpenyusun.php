<?php $role = $this->session->userdata('id_role'); ?>
<div class="container-fluid">
    <div class="row-fluid">
        <h1>
            <i class="fa fa-book"></i> Penyusun
            <?php if($role <= 1){?>
            <a class="btn btn-success" data-toggle='tooltip' data-placement='top' title='Tambah Penyusun' href="<?php echo base_url()."Penyusun/";?>addpenyusun"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
            <?php } ?>
        </h1>
        <hr>
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-book"></i> Daftar Riwayat Penyusun
            </div>
            <div class="panel-body">
            </div>
            <table class="table table-responsive table-hover table-striped" id="tabel-penyusun">
            	<thead>
                <tr>
                    <th>id</th>
                    <th>SK</th>
                    <th>Penyusun</th>
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
	var table = $('#tabel-penyusun').DataTable( {
            "paging": true, 
            "search":true,
            "scrollX":true,
            "ordering": true, 
            "responsive": false,
            "processing":true, 
            "serverSide": true,
            "pageLength": 50,
            "ajax":{
                "url":"<?php echo site_url('Penyusun/ajaxProcess');?>",
                "type":"POST"
            },
            "columns": [
                { "data": "msp_id" },
                { "data": "msp_sk" },
                { "data": "msp_penyusun" },
                { "data": "aksi" },
                { "data": "msp_ketua" },
                { "data": "msp_anggota1" },
                { "data": "msp_anggota2" },
                { "data": "msp_anggota3" },
                { "data": "msp_anggota4" }
            ],
            "columnDefs": [
                { "searchable": false, "orderable":false,  "targets": [0,2,3] },
                {  "visible":false, "targets": [0,4,5,6,7,8] }
            ],
            "order": [[ 0, "asc" ]],
            "drawCallback": function( settings ) {
                makeConfirmation();
                makeTooltip();
                fixedButton();
            }
	} );	
});
</script>

