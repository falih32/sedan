<?php   $role = $this->session->userdata('id_role'); 

    switch ($statusPengadaan) {
        case "0":
            $Judul = "Pengadaan Jasa(HPS)";
            $SubJudul = "Pengadaan Jasa(HPS)";
            $linkAjax =  site_url('Pengadaan/ajaxProcessJasa/0');
            break;
        case "1":
            $Judul = "Pengadaan Jasa(Penawaran)";
            $SubJudul = "Pengadaan Jasa(HPS)";
            $linkAjax =  site_url('Pengadaan/ajaxProcessJasa/1');
            break;
        case "2":
            $Judul = "Pengadaan Jasa(Fix)";
            $SubJudul = "Pengadaan Jasa(Fix)";
            $linkAjax =  site_url('Pengadaan/ajaxProcessJasa/2');
            break;
        default:
            $Judul = "Pengadaan Jasa";
            $SubJudul = "Pengadaan Jasa";
            $linkAjax =  site_url('Pengadaan/ajaxProcessJasa/-1'); 

    }       
?>
<div class="container-fluid">
    <div class="row-fluid">
        <h1>
            <span class="glyphicon glyphicon-pegawai" aria-hidden="true"></span> <?php echo $Judul; ?>
            <a class="btn btn-success" data-toggle='tooltip' data-placement='top' title='Tambah Pengadaan Jasa' href="<?php echo base_url()."Pengadaan/";?>add_Pengadaan/jasa"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
        </h1>
        <hr>
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-pegawai" aria-hidden="true"></span> <?php echo $SubJudul; ?>
            </div>
             <div class="panel-body">
                <div class="col-md-3 col-md-offset-9 text-right" id="date_search">
                    <input type="text" class="form-control input-sm tgl" name="s_date_awal" id="s_date_awal" placeholder="Tanggal awal" readonly="true">
                    <input type="text" class="form-control input-sm tgl" name="s_date_akhir" id="s_date_akhir" placeholder="Tanggal akhir" readonly="true">
                    <button type="button" data-toggle='tooltip' data-placement='top' title='Reload table' class="form-control btn btn-default btn-sm" id="refresh"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
                </div>
            </div>
            <table class="table table-hover table-striped" id="tabel-pengadaan">
            	<thead>
                <tr>
                	<th>Kode Anggaran</th>
                        <th>Nama Pengadaan / Tanggal Pembuatan</th>
                        <th>Supplier</th>
                	<th>Ketua</th>
                        <th>Total(+ppn)</th>
                        <th>Status Selesai</th>
                	<th>Aksi</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
<!--
    
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
			"url":" <?php echo $linkAjax; ?>",
			"type":"POST",
			"data":function ( d ) {
				d.min = $('#s_date_awal').val();
				d.max = $('#s_date_akhir').val();
			}
		},
		"columns": [
                { "data": "pgd_anggaran" },
                { "data": "nmpengadaan_tglbuat" },
                { "data": "supplier_name" },
                { "data": "ketua" },
                { "data": "total" },
                { "data": "konfirm_selesai" },
                { "data": "aksi" },
                { "data": "pgd_perihal" },
                { "data": "pgd_tanggal_input" },
                { "data": "pgd_id" }
              ],
		"columnDefs": [
				{ "searchable": false,  "orderable":false, "targets": [1,5,6] },
                                { "searchable": false, "visible":false, "targets": [9]},
                                {  "visible":false, "targets": [8,7]},
                                {  "orderable":false, "targets": [3,4]}
                        ],
		"order": [[ 9, "asc" ]],
                "dom": '<"row filter-row"<"col-md-2"l><"col-md-10"f><"col-md-12"p>><t><"row footer-row"<"col-md-6"i><"col-md-6"p>>',
		"drawCallback": function( settings ) {
			makeConfirmation();
			makeTooltip();
                        fixedButton();
                        moveSearch();
		},
                "createdRow": function ( row, data, index ) {
                    
                    $(row).click(function(){window.location.href = '<?php echo site_url('Pengadaan/detail_pengadaan').'/'; ?>'+data.pgd_id;});
                    $(row).css('cursor', 'pointer');
                    var temp = data.nmpengadaan_tglbuat;
                    $('td', row).eq(1).html(temp.replace('Pebruari','Februari'));
                    $(row).find('a').click(function(e){e.stopPropagation();});
                   }
	} );
        
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
//     $('#tabel-pengadaan tr td:not(:last-child)').click(function ()    {
//                    location.href = $(this).parent().find('td a').attr('href');
//                   });
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
    
     function moveSearch(){
                var newParent = document.getElementById('tabel-pengadaan_filter');
                var oldParent = document.getElementById('date_search');

                while (oldParent.childNodes.length > 0) {
                        newParent.appendChild(oldParent.childNodes[0]);
                }
        }
 // refresh event listener
	var refreshLink = document.querySelector('#refresh');
	refreshLink.addEventListener('click', function(event){
		table.draw();
	});
	
});
</script>