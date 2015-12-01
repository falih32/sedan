<?php
		$pgd_perihal = $dataPengadaan->pgd_perihal;
		$pgd_uraian_pekerjaan = $dataPengadaan-> pgd_uraian_pekerjaan;
		$pgd_tanggal_input = $dataPengadaan->pgd_tanggal_input;
		$ang_kode = $dataPengadaan->ang_kode;
                $ang_nama = $dataPengadaan->ang_nama;
                $usr_input = $dataPengadaan->pgw_nama;
                $pgd_lama_pekerjaan = $dataPengadaan->pgd_lama_pekerjaan;
                $pgd_lama_penawaran = $dataPengadaan->pgd_lama_penawaran;
                $pgd_tgl_mulai_pengadaan = $dataPengadaan->pgd_tgl_mulai_pengadaan;
                $spl_nama = $dataPengadaan->spl_nama;
                $pgd_jml_sblm_ppn_hps = $dataPengadaan->pgd_jml_sblm_ppn_hps;
                $pgd_jml_ssdh_ppn_hps = $dataPengadaan->pgd_jml_ssdh_ppn_hps;
                $pgd_jml_sblm_ppn_pnr = $dataPengadaan->pgd_jml_sblm_ppn_pnr;
                $pgd_jml_ssdh_ppn_pnr = $dataPengadaan->pgd_jml_ssdh_ppn_pnr;
                $pgd_jml_sblm_ppn_fix = $dataPengadaan->pgd_jml_sblm_ppn_fix;
                $pgd_jml_ssdh_ppn_fix = $dataPengadaan->pgd_jml_ssdh_ppn_fix;
                $pgd_wkt_awal_penawaran = $dataPengadaan->pgd_wkt_awal_penawaran;
                $pgd_wkt_akhir_penawaran = $dataPengadaan->pgd_wkt_akhir_penawaran;  
                $totRowPekerjaan = 0; 
                $totRowSyarat = 0;
?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php echo $title?>
                </h3>
            </div>
            <div class="panel-body">
                <form id = "penawaran_form"  action = "<?php echo base_url()."Pengadaan/proses_add_penawaran";?>" onsubmit="return submitFormPenawaran();" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
            	<table class="table table-striped table-bordered table-hover" width="50%">
                    <tbody>
                    	<tr>
                        	<th>Perihal</th>
                        	<td><?php echo $pgd_perihal; ?></td>
                        </tr>
                    	<tr>
                        	<th>Uraian Pekerjaan</th>
                        	<td><?php echo $pgd_uraian_pekerjaan; ?></td>
                        </tr>
                    	<tr>
                        	<th>Tanggal Input</th>
                        	<td><?php echo $pgd_tanggal_input; ?></td>
                        </tr>
                        <tr>
                        	<th>Anggaran</th>
                        	<td><?php echo $ang_kode.' - '.$ang_nama; ?></td>
                        </tr>
                       
                        <tr>
                        	<th>User Input</th>
                        	<td><?php echo $usr_input ?></td>
                        </tr>
                        <tr>
                        	<th>Jangka waktu Lama Pekerjaan</th>
                        	<td><?php echo $pgd_lama_pekerjaan; ?></td>
                        </tr>
                        <tr>
                        	<th>Jangka waktu Lama Penawaran</th>
                                <td><?php echo $pgd_lama_penawaran; ?></td>
                        </tr>
                        <tr>
                        	<th>Supplier</th>
                                <td><?php echo $spl_nama; ?></td>
                        </tr>
                        <tr>
                        	<th>Syarat Penyedia</th>
                                <td><?php foreach ($suratList as $row) {?>
                                <div class="col-sm-8"><?php echo $row->siz_nama; ?></div>
                                <div class="col-sm-4"><input class ="chkBoxSyarat" type="checkbox" data-off-label="Tidak Ada" data-on-label="Ada" name ="psr_penawaran[<?php echo $row->psr_id; ?>]" value="<?php echo $row->psr_id; ?>" data-style="btn-group-sm">
                                </div>
                                <?php $totRowSyarat = $totRowSyarat+1; } ?></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped table-bordered table-hover" width="50%">
                    <thead>
                        <tr>
                          <th>Pekerjaan/Barang</th>
                          <th>Volume</th>
                          <th>Harga Satuan(HPS)</th>
                          <th>Harga Satuan(Penawaran)</th>
                          <th>Total(HPS)</th>
                          <th>Total(Penawaran)</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php foreach ($pekerjaanList as $row) {?>
                            <tr><td><?php echo $row->dtp_pekerjaan; ?></td>
                            <td><?php echo $row->dtp_volume.' '.$row->dtp_satuan; ?></td>
                            <td><?php echo $row->dtp_hargasatuan_hps; ?></td>
                            <td><div class="form-group">                                    
                                    <div class="col-sm-10">
                                    <input type="hidden" class="form-control" id="dtp_volume<?php echo $row->dtp_id; ?>" value="<?php echo $row->dtp_volume; ?>"> 
                                    <input type="hidden" class="hargasatuan_hps form-control" id="dtp_hargasatuan_hps<?php echo $row->dtp_id; ?>" value="<?php echo $row->dtp_hargasatuan_hps; ?>">    
                                    <input type="text" class="hargasatuan_pnr form-control" id="dtp_hargasatuan_pnr<?php echo $row->dtp_id; ?>" name="dtp_hargasatuan_pnr[<?php echo $row->dtp_hargasatuan_hps; ?>]" placeholder="Harga satuan" data-error="Data yang dimasukkan harus angka, jika terdapat koma gunakan titik(.) sebagai koma" pattern="^[0-9.\s]*$" required>
                                    <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-sm-2">
                                    <span id ="icon_status<?php echo $row->dtp_id; ?>" class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </div>
                                </div></td>
                            <td><?php echo $row->dtp_jumlahharga_hps; ?></td>
                            <td><span id="jml_pnr<?php echo $row->dtp_id; ?>"></span></td>
                            <script type="text/javascript">
                                    $(document).ready(function() {                          
                                            $('#dtp_hargasatuan_pnr<?php echo $row->dtp_id; ?>').bind('input', function() {
                                                //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
                                                var pnrHarga = parseFloat(document.getElementById('dtp_hargasatuan_pnr<?php echo $row->dtp_id; ?>').value);
                                                var hpsHarga = parseFloat(document.getElementById('dtp_hargasatuan_hps<?php echo $row->dtp_id; ?>').value);
                                                 if (pnrHarga <= hpsHarga && !isNaN(pnrHarga)) {
                                                    $('#icon_status<?php echo $row->dtp_id; ?>').removeClass('glyphicon-remove').addClass('glyphicon-ok');
                                                    $(this).next().stop(true, true).fadeIn(0).html('Harga Penawaran lebih kecil dari harga HPS').fadeOut(2000);
                                                 }else if(pnrHarga <= hpsHarga && !isNaN(pnrHarga)){
                                                     $('#icon_status<?php echo $row->dtp_id; ?>').removeClass('glyphicon-ok').addClass('glyphicon-remove');
                                                     $(this).next().stop(true, true).fadeIn(0).html('Harga Penawaran lebih besar dari harga HPS').fadeOut(2000);
                                                 }
                                                 var vol = parseFloat(document.getElementById('dtp_volume<?php echo $row->dtp_id; ?>').value);
                                                 var tot = pnrHarga*vol;
                                                 if(!isNaN(tot)){
                                                    document.getElementById("jml_pnr<?php echo $row->dtp_id; ?>").innerHTML = tot;
                                                }else{
                                                    document.getElementById("jml_pnr<?php echo $row->dtp_id; ?>").innerHTML = "Input tidak Valid";
                                                }
                                                var totSemuaPnr = (parseFloat(document.getElementById('pgd_jml_sblm_ppn_pnr').value))+tot;
                                                
                                                 if(!isNaN(totSemuaPnr)){
                                                    document.getElementById("pgd_jml_sblm_ppn_pnr").value = tot;
                                                    document.getElementById("pgd_jml_ssdh_ppn_pnr").value = tot+(tot*0.1);
                                                }else{
                                                    document.getElementById("pgd_jml_sblm_ppn_pnr").value = "Input tidak Valid";
                                                }
                                            });

                                    });
                            </script>
                        <?php $totRowPekerjaan = $totRowPekerjaan+1;} ?>
                    </tbody>
                </table>
               <div class="row"> 
                            <div class ='col-sm-3 pull-right'> 
                            <label id = "total_label" class="control-label text-center pull-right">Total HPS: &nbsp;</label>
                            <input type="text" class="form-control" id="pgd_jml_sblm_ppn_hps" name="pgd_jml_sblm_ppn_hps" value='<?php echo $pgd_jml_sblm_ppn_hps; ?>' readonly>
                            </div> 
                            <div class ='col-sm-3 pull-right'>
                            <label id = "total_label" class="control-label text-center pull-right">Total HPS(ppn 10%) : &nbsp;</label>
                            <input type="text" class="form-control" id="pgd_jml_ssdh_ppn_hps" name="pgd_jml_ssdh_ppn_hps" value='<?php echo $pgd_jml_sblm_ppn_hps; ?>' readonly>
                            </div> 
                        </div>  
                <div class="row"> 
                            <div class ='col-sm-3 pull-right'> 
                            <label id = "total_label" class="control-label text-center pull-right">Total Penawaran: &nbsp;</label>
                            <input type="text" class="form-control" id="pgd_jml_sblm_ppn_pnr" name="pgd_jml_sblm_ppn_pnr" value='0' readonly>
                            </div> 
                            <div class ='col-sm-3 pull-right'>
                            <label id = "total_label" class="control-label text-center pull-right">Total Penawaran(ppn 10%) : &nbsp;</label>
                            <input type="text" class="form-control" id="pgd_jml_ssdh_ppn_pnr" name="pgd_jml_ssdh_ppn_pnr" value='0' readonly>
                            </div> 
                </div> 
               <input type="hidden" class="form-control" id="totPekerjaan" value="<?php echo $totRowPekerjaan ?>"> 
               <input type="hidden" class="form-control" id="totSyarat" value="<?php echo $totRowSyarat ?>"> 
               <div class="col-md-12 text-center"><hr>
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="...">
                            <a class="btn btn-lg btn-danger" href="javascript:history.back()"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Kembali</a>
                            <button type="submit" class="btn btn-lg btn-success" id="btnPengadaan"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Simpan</button>
                            
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function submitFormPenawaran() {
    //alert("Syarat Penyedia atau Harga Penawaran tidak sesuai dengan Pengadaan yang diminta");
    var statusPekerjaan = 0;
    var statusSyarat = 0;
    var i;
    var checkedSyarat = document.getElementsByClassName("chkBoxSyarat");
    var listHargaHps = document.getElementsByClassName("hargasatuan_hps");
    var listHargaPnr = document.getElementsByClassName("hargasatuan_pnr");
    i=0;
    //alert(checkedSyarat.length);
    while(i<checkedSyarat.length && statusSyarat === 0) {
        if(checkedSyarat[i].checked){
            statusSyarat = 0;
        }else{
            statusSyarat = 1;
        }
        i++;
    }
    i=0;
    while(i<listHargaPnr.length && statusPekerjaan === 0) {
        //alert(listHargaHps[i].value);
        alert("statusSyarat="+listHargaHps[i].value+" statusPekerjaan="+listHargaPnr[i].value);
        if (listHargaHps[i].value<listHargaPnr[i].value){
            statusPekerjaan = 1;
        }
        i++;
    }
    alert("statusSyarat="+statusSyarat+" statusPekerjaan="+statusPekerjaan);
    if(statusSyarat===1 || statusPekerjaan===1){
        alert("Syarat Penyedia atau Harga Penawaran tidak sesuai dengan Pengadaan yang diminta");
        return false;
    }else{
        return true;
    }
    //$(this).preventDefault();
}
$(document).ready(function() {
	$(':checkbox').checkboxpicker();
	$('[data-toggle="tooltip"]').tooltip({});
//	$('.hargasatuan_pnr').bind('input', function() {
//            //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
//            var pnrHarga = parseFloat(document.getElementById('dtp_hargasatuan_pnr').value);
//            var hpsHarga = parseFloat(document.getElementById('dtp_hargasatuan_hps').value);
//             if (pnrHarga > hpsHarga) {
//                $('#icon_status').removeClass('glyphicon-remove').addClass('glyphicon-ok');
//                $(this).next().stop(true, true).fadeIn(0).html('Nilai lebih besar dari harga HPS').fadeOut(2000);
//             }else{
//                 $('#icon_status').removeClass('glyphicon-ok').addClass('glyphicon-remove');
//                 $(this).next().stop(true, true).fadeIn(0).html('Nilai lebih kecil dari harga HPS');
//             }
//        });
	 
});
</script>