<?php
		$pgd_id = $dataPengadaan->pgd_id;
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
                $pgd_tipe_pengadaan = $dataPengadaan->pgd_tipe_pengadaan;
                $pgd_smbr_dana = $dataPengadaan->pgd_smbr_dana;
                $pgd_status_pengadaan = $dataPengadaan->pgd_status_pengadaan;
                $pgd_dgn_pajak = $dataPengadaan->pgd_dgn_pajak;
                
                $pgd_tgl_pemasukkan_pnr = $dataPengadaan->pgd_tgl_pemasukkan_pnr;
                $pgd_no_srt_penawaran = $dataPengadaan->pgd_no_srt_penawaran; 
                $pgd_perwakilan_spl = $dataPengadaan->pgd_perwakilan_spl; 
                $pgd_jbt_perwakilan_spl = $dataPengadaan->pgd_jbt_perwakilan_spl; 
                $pnc_kesesuaian_ttd = $dataPengadaan->pnc_kesesuaian_ttd;
                $pnc_kesesuaian_alamat_spl = $dataPengadaan->pnc_kesesuaian_alamat_spl;
                $pnc_srt_penawaran = $dataPengadaan->pnc_srt_penawaran;
                $pnc_daftar_knts_hrg = $dataPengadaan->pnc_daftar_knts_hrg;
                $pnc_dok_pnr_teknis = $dataPengadaan->pnc_dok_pnr_teknis;
                $pnc_isian_kualifikasi = $dataPengadaan->pnc_isian_kualifikasi;
                $pnc_kesesuaian_spec_teknis = $dataPengadaan->pnc_kesesuaian_spec_teknis;
                $pnc_kesesuaian_jdwl_kerja = $dataPengadaan->pnc_kesesuaian_jdwl_kerja;
                $pnc_kesesuaian_identitas = $dataPengadaan->pnc_kesesuaian_identitas;
                
		$nm_ketua = $penyusunlist-> nm_ketua;
		$nip_ketua = $penyusunlist-> nip_ketua;
                $jbt_ketua = $penyusunlist->jbt_ketua;
                $nm_anggota1 = $penyusunlist->nm_anggota1;
                $nip_anggota1 = $penyusunlist->nip_anggota1;
                $jbt_anggota1 = $penyusunlist->jbt_anggota1;
                $nm_anggota2 = $penyusunlist->nm_anggota2;
                $nip_anggota2 = $penyusunlist->nip_anggota2;
                $jbt_anggota2 = $penyusunlist->jbt_anggota2;
                $nm_anggota3 = $penyusunlist->nm_anggota3;
                $nip_anggota3 = $penyusunlist->nip_anggota3;
                $jbt_anggota3 = $penyusunlist->jbt_anggota3;
                $nm_anggota4 = $penyusunlist->nm_anggota4;
                $nip_anggota4 = $penyusunlist->nip_anggota4;
                $jbt_anggota4 = $penyusunlist->jbt_anggota4;
        switch ($pgd_tipe_pengadaan) {
        case "0":
            $tipe_pengadaan = "Barang";
            $detail_pengadaan = "Barang";
            break;
        case "1":
           $tipe_pengadaan = "Jasa";
            $detail_pengadaan = "Pekerjaan";
            break;
        case "2":
            $tipe_pengadaan = "Konsultan";
            $detail_pengadaan = "Pekerjaan";
            break;
        default:
            $tipe_pengadaan = "";
            $detail_pengadaan = "Pekerjaan/Barang";

    } 
        switch ($pgd_status_pengadaan) {
        case "0":
            $status_pengadaan = "Tahapan Setelah HPS";
            break;
        case "1":
           $status_pengadaan  = "Tahapan Setelah Penawaran";
            break;
        case "2":
            $status_pengadaan = "Tahapan Setelah Negoisasi";
            break;
        case "3":
            $status_pengadaan = "Tahapan Setelah Pengumuman";
            break;
        case "4":
            $status_pengadaan = "Tahapan Setelah SPMK";
            break;
        case "5":
            $status_pengadaan = "Pengadaan Telah Selesai";
            break;
        default:
            $status_pengadaan = "";

    } 
?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3>Detail Info Pengadaan 
                    <?php echo $tipe_pengadaan;
                    ?>
                </h3>
            </div>
            <div class="panel-body">
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
                        	<td><?php echo $pgd_lama_pekerjaan.' hari'; ?></td>
                        </tr>
                        <tr>
                        	<th>Jangka waktu Lama Penawaran</th>
                                <td><?php echo $pgd_lama_penawaran.' hari'; ?></td>
                        </tr>
                        <tr>
                        	<th>Sumber Pendanaan (Tahun)</th>
                                <td><?php echo $pgd_smbr_dana; ?></td>
                        </tr>
                        <tr>
                        	<th>Supplier</th>
                                <td><?php echo $spl_nama; ?></td>
                        </tr>
                        <tr>
                        	<th>Status Pengadaan</th>
                                <td><b><?php echo $status_pengadaan; ?></b></td>
                        </tr>
                        <tr>
                        	<th>Penyusun</th>
                                <td><b>Ketua &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: </b><?php echo $jbt_ketua.' ('.$nip_ketua.' - '.$nm_ketua.')'; ?> <br>
                                <b>Anggota 1 &nbsp;: </b><?php echo $jbt_anggota1.' ('.$nip_anggota1.' - '.$nm_anggota1.')'; ?> <br>
                                <b>Anggota 2 &nbsp;: </b><?php echo $jbt_anggota2.' ('.$nip_anggota2.' - '.$nm_anggota2.')'; ?> <br>
                                <b>Anggota 3 &nbsp;: </b><?php echo $jbt_anggota3.' ('.$nip_anggota3.' - '.$nm_anggota3.')'; ?> <br>
                                <b>Anggota 4 &nbsp;: </b><?php echo $jbt_anggota4.' ('.$nip_anggota4.' - '.$nm_anggota4.')'; ?></td>
                        </tr>
                        <tr>
                        	<th>Syarat Penyedia</th>
                                <td><?php foreach ($suratList as $row) {?>
                                <?php echo $row->siz_nama;?><br><?php } ?></td>
                        </tr>
                        <tr>
                        	<th>Harga Tiap <?php echo $tipe_pengadaan; ?> Sudah dengan Pajak 10%</th>
                                <td><?php if($pgd_dgn_pajak == 1){echo 'Ya';}else{echo 'Tidak';} ?></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped table-bordered table-hover" width="50%">
                    <thead>
                        <tr>
                          <th><?php echo $detail_pengadaan; ?></th>
                          <th>Volume</th>
                          <th>Hrg Satuan(HPS)</th>
                          <th>Hrg Satuan(Pnr)</th>
                          <th>Hrg Satuan(Fix)</th>
                          <th>Total(HPS)</th>
                          <th>Total(Penawaran)</th>
                          <th>Total(Fix)</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php foreach ($pekerjaanList as $row) {?>
                            <tr><td><?php echo $row->dtp_pekerjaan; ?><br><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?php echo $row->dtp_id; ?>">Spec</button></td>
                            <td><?php echo ($row->dtp_volume+0).' '.$row->dtp_satuan; ?></td>
                            <td><?php echo 'Rp.'.number_format($row->dtp_hargasatuan_hps,0,",","."); ?></td>
                            <td><?php echo 'Rp.'.number_format($row->dtp_hargasatuan_pnr,0,",","."); ?></td>
                            <td><?php echo 'Rp.'.number_format($row->dtp_hargasatuan_fix,0,",","."); ?></td>
                            <td><?php echo 'Rp.'.number_format($row->dtp_jumlahharga_hps,0,",","."); ?></td>
                            <td><?php echo 'Rp.'.number_format($row->dtp_jumlahharga_pnr,0,",","."); ?></td>
                            <td><?php echo 'Rp.'.number_format($row->dtp_jumlahharga_fix,0,",","."); ?></td></tr>
                            <!-- Modal -->
                            <div id="myModal<?php echo $row->dtp_id; ?>" class="modal fade bs-example-modal-sm" role="dialog">
                              <div class="modal-dialog modal-sm">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Spesifikasi</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p><?php echo $row->dtp_spesifikasi; ?>
                                        <?php $urlfile = site_url('uploads/file_pengadaan').'/'.$row->dtp_file;?><br>
                                        <img src="<?php echo $urlfile;?>" alt="" style="width:304px;height:228px;">
                                        <?php $tagFile =  "<a href='".$urlfile."' target='_blank'>Full Size Image</a>"?>
                                        <?php if($row->dtp_file!="" || $row->dtp_file!=NULL){echo "<br>".$tagFile;} ?></p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>
                        <?php } ?>
                    </tbody>
                    
                </table>
                <?php if($pgd_dgn_pajak == 1){ echo'<i class ="pull-right"><font color="red">*Total Harga Sudah Dengan Pajak</font></i>';}?>
                <br><br>
                <table class="table table-striped table-bordered table-hover" width="50%">
                    <tbody>
                    	<tr>
                        	<th>Total Keseluruhan(HPS)</th>
                        	<td><?php echo 'Rp. '.number_format($pgd_jml_sblm_ppn_hps,0,",","."); ?></td>
                        </tr>
                    	<tr>
                            <?php if($pgd_dgn_pajak != 1){?>
                        	<th>Total Keseluruhan(HPS) + PPN 10%</th>
                        	<td><?php echo 'Rp. '.number_format($pgd_jml_ssdh_ppn_hps,0,",","."); ?></td>
                            <?php }?>
                        </tr>
                        <tr>
                        	<th>Total Keseluruhan(Penawaran)</th>
                        	<td><?php echo 'Rp. '.number_format($pgd_jml_sblm_ppn_pnr,0,",","."); ?></td>
                        </tr>
                        <tr>
                            <?php if($pgd_dgn_pajak != 1){?>
                        	<th>Total Keseluruhan(Penawaran) + PPN 10%</th>
                        	<td><?php echo 'Rp. '.number_format($pgd_jml_ssdh_ppn_pnr,0,",","."); ?></td>
                            <?php }?>
                        </tr>
                        <tr>
                        	<th>Total Keseluruhan(Fix)</th>
                        	<td><?php echo 'Rp. '.number_format($pgd_jml_sblm_ppn_fix,0,",","."); ?></td>
                        </tr>
                        <tr>
                            <?php if($pgd_dgn_pajak != 1){?>
                        	<th>Total Keseluruhan(Fix) + PPN 10%</th>
                        	<td><?php echo 'Rp. '.number_format($pgd_jml_ssdh_ppn_fix,0,",","."); ?></td>
                            <?php }?>
                        </tr>
                    </tbody>
                </table>
                
                <div class="col-md-12 text-center"><hr>
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="...">
                            <form target="_blank" id = "histori_percetakan" method="post" action="<?php echo site_url('Pengadaan/historiPercetakan/'.$pgd_id);?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">                              
                               
                                <input type="hidden" class="form-control" id="pgd_perihal" name="pgd_perihal" value="<?php echo $pgd_perihal?>" placeholder="Detail Pekerjaan">
                                 
                              
                                <input type="hidden" class="form-control" id="pgd_id" name="pgd_id" value="<?php echo $pgd_id?>" placeholder="Detail Pekerjaan">
                              
                                <a class="btn btn-lg btn-danger" href="javascript:history.back()"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Kembali</a>

                                <button type="submit" class="btn btn-lg btn-success" id="btnPengadaan" ><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Histori Percetakan</button>
                           </form>
                                
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	
	$('[data-toggle="tooltip"]').tooltip({});
	
	var deleteLinks = document.querySelectorAll('#set_status');
	for (var i = 0, length = deleteLinks.length; i < length; i++) {
		deleteLinks[i].addEventListener('click', function(event) {
			event.preventDefault();
		
			var choice = confirm(this.getAttribute('data-confirm'));
		
			if (choice) {
				window.location.href = this.getAttribute('href');
			}
		});
	}
});
</script>