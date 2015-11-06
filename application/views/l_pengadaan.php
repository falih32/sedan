<?php $role = $this->session->userdata('id_role'); ?>
<div class="container-fluid">
    <div class="row-fluid">
        <h1>
            <span class="glyphicon glyphicon-pegawai" aria-hidden="true"></span> Pengadaan
            <a class="btn btn-success" data-toggle='tooltip' data-placement='top' title='Tambah Pegawai' href="<?php echo base_url()."Pengadaan/";?>addPengadaan"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
        </h1>
        <hr>
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-pegawai" aria-hidden="true"></span> Daftar Pengadaan
            </div>
            <div class="panel-body">
            </div>
            <table class="table table-responsive table-hover table-striped" id="tabel-pengadaan">
            	<thead>
                <tr>
                	<th>Kode Anggaran</th>
                        <th>Nama Pengadaan / Tanggal Pembuatan</th>
                        <th>Supplier</th>
                	<th>Ketua</th>
                        <th>Total(+ppn)</th>
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
	
	var table = $('#tabel-pengadaan').DataTable( {
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
                { "data": "drp_anggaran" },
                { "data": "nmpengadaan_tglbuat" },
                { "data": "jbt_nama" },
                { "data": "pgw_telp" },
                { "data": "aksi" }
              ],
		"columnDefs": [
				{ "searchable": false, "orderable":false, "targets": 4 },
                                { "searchable": false, "targets": [4] }
                        ],
		"order": [[ 4, "asc" ]],
              "dom": '<"row filter-row"<"col-md-1"l><"col-md-4"f><"col-md-4"p>><t><"row footer-row"<"col-md-1"i><"col-md-1"p>>',
		"drawCallback": function( settings ) {
			makeConfirmation();
			makeTooltip();
                        fixedButton();
		},
                "createdRow": function ( row, data, index ) {
                    $(row).click(function(){window.location.href = '<?php echo site_url('Pegawai/detail_pegawai').'/'; ?>'+data.pgw_id;});
                    $(row).css('cursor', 'pointer');
                  
                    $(row).find('a').click(function(e){e.stopPropagation();});
                   }
	} );
	
});
</script>