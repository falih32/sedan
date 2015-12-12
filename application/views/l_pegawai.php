<?php $role = $this->session->userdata('id_role'); ?>
<div class="container-fluid">
    <div class="row-fluid">
        <h1>
            <i class="fa fa-users"></i> Pegawai
            <a class="btn btn-success" data-toggle='tooltip' data-placement='top' title='Tambah Pegawai' href="<?php echo base_url()."Pegawai/";?>addPegawai"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
        </h1>
        <hr>
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-users"></i> Daftar Pegawai
            </div>
            <div class="panel-body">
            </div>
            <table class="table table-responsive table-hover table-striped" id="tabel-pegawai">
            	<thead>
                <tr>
                	<th>Nama</th>
                        <th>NIP</th>
                        <th>Jabatan</th>
                	<th>Nomor HP</th>
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
	var table = $('#tabel-pegawai').DataTable( {
            "paging": true, 
            "search":true,  
            "scrollX":true,
            "ordering": true, 
            "responsive": false,
            "processing":true, 
            "serverSide": true,
            "pageLength": 50,
            "ajax":{
                "url":"<?php echo site_url('Pegawai/ajaxProcess');?>",
                "type":"POST"
            },
            "columns": [
                { "data": "pgw_nama" },
                { "data": "pgw_nip" },
                { "data": "jbt_nama" },
                { "data": "pgw_telp" },
                { "data": "aksi" }
            ],
            "columnDefs": [
                { "searchable": false, "orderable":false, "targets": 4 }
            ],
            "order": [[ 1, "asc" ]],
            "drawCallback": function( settings ) {
                makeConfirmation();
                makeTooltip();
                fixedButton();
            },
            "createdRow": function ( row, data, index ) {
              //  $(row).click(function(){window.location.href = '<?php echo site_url('Pegawai/detail_pegawai').'/'; ?>'+data.pgw_id;});
                $(row).css('cursor', 'pointer');
                $(row).find('a').click(function(e){e.stopPropagation();});
            }
	} );
});
</script>