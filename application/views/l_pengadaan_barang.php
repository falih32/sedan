<?php   $role = $this->session->userdata('id_role'); 

    switch ($statusPengadaan) {
        case "0":
            $Judul = "Pengadaan Barang(HPS)";
            $SubJudul = "Pengadaan Barang(HPS)";
            $linkAjax =  site_url('Pengadaan/ajaxProcessBarang/0');
            break;
        case "1":
            $Judul = "Pengadaan Barang(Penawaran)";
            $SubJudul = "Pengadaan Barang(HPS)";
            $linkAjax =  site_url('Pengadaan/ajaxProcessBarang/1');
            break;
        case "2":
            $Judul = "Pengadaan Barang(Fix)";
            $SubJudul = "Pengadaan Barang(Fix)";
            $linkAjax =  site_url('Pengadaan/ajaxProcessBarang/2');
            break;
        default:
            $Judul = "Pengadaan Barang";
            $SubJudul = "Pengadaan Barang";
            $linkAjax =  site_url('Pengadaan/ajaxProcessBarang/-1'); 

    }       
?>
<div class="container-fluid">
    <div class="row-fluid">
        <h1>
            <span class="glyphicon glyphicon-pegawai" aria-hidden="true"></span> <?php echo $Judul; ?>
            <a class="btn btn-success" data-toggle='tooltip' data-placement='top' title='Tambah Pengadaan Barang' href="<?php echo base_url()."Pengadaan/";?>add_Pengadaan/barang"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
        </h1>
        <hr>
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-pegawai" aria-hidden="true"></span> <?php echo $SubJudul; ?>
            </div>
             <div class="panel-body">
                <div class="col-md-3 col-md-offset-9 text-right" id="date_search">
                    <input type="text" class="form-control input-sm tgl1" name="s_date_awal" id="s_date_awal" placeholder="Tanggal awal" readonly="true">
                    <input type="text" class="form-control input-sm tgl1" name="s_date_akhir" id="s_date_akhir" placeholder="Tanggal akhir" readonly="true">
                    <button type="button" data-toggle='tooltip' data-placement='top' title='Reload table' class="form-control btn btn-default btn-sm" id="refresh"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
                </div>
            </div>
            <table class="table table-hover table-striped" id="tabel-pengadaan">
            	<thead>
                <tr>
                	<th>Kode Anggaran</th>
                        <th>Nama Pengadaan / Tanggal Input</th>
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
                { "data": "pgd_anggaran" },             //0
                { "data": "nmpengadaan_tglbuat" },      //1
                { "data": "supplier_name" },            //2
                { "data": "ketua" },                    //3
                { "data": "total" },                    //4
                { "data": "konfirm_selesai" },          //5
                { "data": "aksi" },                     //6
                { "data": "pgd_perihal" },              //7
                { "data": "pgd_tanggal_input" },        //8
                { "data": "pgd_id" },                   //9
                
                { "data": "pgd_jml_ssdh_ppn_hps" },     //10
                { "data": "pgd_jml_ssdh_ppn_pnr" },     //11
                { "data": "pgd_jml_ssdh_ppn_fix" }      //12
              ],
		"columnDefs": [
				{ "searchable": false,  "orderable":false, "targets": [1,3,4,5,6] },
                                { "searchable": false, "visible":false, "targets": [3,9]},
                                {  "visible":false, "targets": [8,7, 10, 11, 12]}
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
                    
                    <?php if($role == 1){ ?>
                    if ( data.pgd_status_selesai == "1") {
                        $('td', row).eq(5).html('<a class="btn btn-success btn-sm confirm" data-toggle="tooltip" data-placement="top" title="Batalkan konfirmasi" data-confirm="Anda yakin akan mengembalikan status pengadaan menjadi belum selesai?" data-href="batal_konfirmasi/'+data.pgd_id+'"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>');
                        $('td', row).eq(6).html("<form><div class='form-group'><a class='btn btn-warning btn-sm btn-aksi' data-toggle='tooltip' data-placement='top' title='Cetak Laporan Setelah Harga Deal' href='<?php echo site_url('Laporan/LaporanFix').'/'; ?>"+data.pgd_id+"'><span class='glyphicon glyphicon-pegawai' aria-hidden='true'></span> Cetak(Fix)</a></div></form>");
                    }
                    <?php }?>
                    <?php if($role == 2){ ?>
                    if ( data.pgd_status_selesai == "1") {
                        $('td', row).eq(5).html('<a class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Konfirmasi selesai"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>');
                        $('td', row).eq(6).html('<a class="btn btn-success btn-sm btn-aksi" data-toggle="tooltip" data-placement="top" title="Pengadaan telah selesai">Selesai</a>');
                    }
                    <?php }?>
                    
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

                var confirmLinks = document.querySelectorAll('.confirm');
                for (var i = 0, length = confirmLinks.length; i < length; i++) {
                        confirmLinks[i].addEventListener('click', function(event) {
                                event.preventDefault();

                                var choice = confirm(this.getAttribute('data-confirm'));

                                if (choice) {
                                        $.ajax({
                                                url: this.getAttribute('data-href'),
                                                type: "POST",
                                                success: function(){table.draw();}
                                        });
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