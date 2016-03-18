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
                <br>
                    <h4><b>Biaya Personil</b></h4>
                <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                          <th bgcolor='#BDBDBD'>Jabatan</th>
                          <th bgcolor='#BDBDBD'>Kuantitas</th>
                          <th bgcolor='#BDBDBD'>Biaya Personil(HPS)</th>
                          <th bgcolor='#BDBDBD'>Biaya Personil(Pnr)</th>
                          <th bgcolor='#BDBDBD'>Biaya Personil(Fix)</th>
                          <th bgcolor='#BDBDBD'>Total(HPS)</th>
                          <th bgcolor='#BDBDBD'>Total(Penawaran)</th>
                          <th bgcolor='#BDBDBD'>Total(Fix)</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php $judul = 0; ?>
                        <?php $number = 1; ?>
                        <?php $lastjudul = -11; ?>
                    	<?php foreach ($konsultanList1 as $row) {?>
                            <?php if($row->dtk_sub_judul != $lastjudul && $judul == 1) {?>
                                <?php $judul = 0; ?>
                                <tr bgcolor='#BDBDBD'><td bgcolor='#BDBDBD'></td>
                                <td bgcolor='#BDBDBD'></td>
                                <td bgcolor='#BDBDBD'></td>
                                <td bgcolor='#BDBDBD'></td>
                                <td bgcolor='#BDBDBD'></td>
                                <td bgcolor='#BDBDBD'></td>
                                <td bgcolor='#BDBDBD'></td>
                                <td bgcolor='#BDBDBD'></td></tr>
                            <?php } ?>
                            <?php if($row->dtk_sub_judul != '-99' && $judul == 0) {?>
                                <?php $judul = 1; ?>
                                <?php $lastjudul = $row->dtk_sub_judul; ?>
                                <tr><td><b><?php echo $number.'. '.$row->sjd_sub_judul; ?></b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td></tr>
                                <?php $number = $number+1; ?>
                            <?php } ?>
                            <tr><td><?php echo $row->dtk_jabatan; ?><br><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalx<?php echo $row->dtk_id; ?>">Detail</button></td>  
                            <td><?php echo ($row->dtk_kuantitas+0); ?></td>
                            <td><?php echo 'Rp.'.number_format($row->dtk_biaya_personil_hps,0,",","."); ?></td>
                            <td><?php echo 'Rp.'.number_format($row->dtk_biaya_personil_pnr,0,",","."); ?></td>
                            <td><?php echo 'Rp.'.number_format($row->dtk_biaya_personil_fix,0,",","."); ?></td>
                            <td><?php echo 'Rp.'.number_format($row->dtk_jml_biaya_hps,0,",","."); ?></td>
                            <td><?php echo 'Rp.'.number_format($row->dtk_jml_biaya_pnr,0,",","."); ?></td>
                            <td><?php echo 'Rp.'.number_format($row->dtk_jml_biaya_fix,0,",","."); ?></td></tr>
                            <!-- Modal -->
                            <div id="myModalx<?php echo $row->dtk_id; ?>" class="modal fade bs-example-modal-sm" role="dialog">
                              <div class="modal-dialog modal-sm">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Detail</h4>
                                  </div>
                                  <div class="modal-body">
                                  <div class="col-md-12">    
                                  <div class="row">
                                      <label class="control-label">Kualifikasi Pendidikan : <?php echo $row->dtk_kualifikasi_pendidikan; ?></label>
                                      
                                  </div>
                                  <div class="row">
                                      
                                      <label class="control-label">Jml Org : <?php echo ($row->dtk_jml_org+0); ?></label>
                                      
                                  </div>  
                                  <div class="row">
                                      
                                      <label class="control-label">Jml Bln : <?php echo ($row->dtk_jml_bln+0); ?></label>
                                      
                                  </div>  
                                  <div class="row">
                                      
                                      <label class="control-label">Intensitas : <?php echo ($row->dtk_intensitas+0); ?></label>
                                      
                                  </div>  
                                  <div class="row">
                                      
                                      <label class="control-label">Satuan : <?php echo ($row->dtk_satuan); ?></label>
                                  </div>  
                                  </div>
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
                </div>
                <div class="row"> 
                    <div class ='col-sm-3 pull-right'> 
                    <label id = "total_label" class="control-label text-center pull-right">Total : &nbsp;</label>
                    <input type="text" class="form-control" id="x_jml_sblm_ppn_kons1"  value='<?php echo 'Rp.'.number_format($jmlKons1,0,",","."); ?>' readonly>
                    </div> 

                </div>
                <?php if($konsultanList2 != NULL) {?>
                <br>
                    <h4><b>Biaya Non Personil</b></h4>
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                              <th bgcolor='#BDBDBD'>Uraian</th>
                              <th bgcolor='#BDBDBD'>Volume</th>
                              <th bgcolor='#BDBDBD'>Hrg Satuan(HPS)</th>
                              <th bgcolor='#BDBDBD'>Hrg Satuan(Pnr)</th>
                              <th bgcolor='#BDBDBD'>Hrg Satuan(Fix)</th>
                              <th bgcolor='#BDBDBD'>Total(HPS)</th>
                              <th bgcolor='#BDBDBD'>Total(Penawaran)</th>
                              <th bgcolor='#BDBDBD'>Total(Fix)</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php $judul = 0; ?>
                            <?php $number = 1; ?>
                            <?php $lastjudul = -11; ?>
                            <?php foreach ($konsultanList2 as $row) {?>
                                <?php if($row->dtk2_sub_judul != $lastjudul && $judul == 1) {?>
                                    <?php $judul = 0; ?>
                                    <tr bgcolor='#BDBDBD'><td bgcolor='#BDBDBD'></td>
                                    <td bgcolor='#BDBDBD'></td>
                                    <td bgcolor='#BDBDBD'></td>
                                    <td bgcolor='#BDBDBD'></td>
                                    <td bgcolor='#BDBDBD'></td>
                                    <td bgcolor='#BDBDBD'></td>
                                    <td bgcolor='#BDBDBD'></td>
                                    <td bgcolor='#BDBDBD'></td></tr>
                                <?php } ?>
                                <?php if($row->dtk2_sub_judul != '-99' && $judul == 0) {?>
                                    <?php $judul = 1; ?>
                                    <?php $lastjudul = $row->dtk2_sub_judul; ?>
                                    <tr><td><b><?php echo $number.'. '.$row->sjd_sub_judul; ?></b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td></tr>
                                    <?php $number = $number+1; ?>
                                <?php } ?>
                                <tr><td><?php echo $row->dtk2_pekerjaan; ?><br><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?php echo $row->dtk2_id; ?>">Spec</button></td>
                                <td><?php echo ($row->dtk2_volume+0).' '.$row->dtk2_satuan; ?></td>
                                <td><?php echo 'Rp.'.number_format($row->dtk2_hargasatuan_hps,0,",","."); ?></td>
                                <td><?php echo 'Rp.'.number_format($row->dtk2_hargasatuan_pnr,0,",","."); ?></td>
                                <td><?php echo 'Rp.'.number_format($row->dtk2_hargasatuan_fix,0,",","."); ?></td>
                                <td><?php echo 'Rp.'.number_format($row->dtk2_jumlahharga_hps,0,",","."); ?></td>
                                <td><?php echo 'Rp.'.number_format($row->dtk2_jumlahharga_pnr,0,",","."); ?></td>
                                <td><?php echo 'Rp.'.number_format($row->dtk2_jumlahharga_fix,0,",","."); ?></td></tr>
                                <!-- Modal -->
                                <div id="myModal<?php echo $row->dtk2_id; ?>" class="modal fade bs-example-modal-sm" role="dialog">
                                  <div class="modal-dialog modal-sm">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Spesifikasi</h4>
                                      </div>
                                      <div class="modal-body">
                                        <p><?php echo $row->dtk2_spesifikasi; ?>
                                            <?php $urlfile = site_url('uploads/file_pengadaan').'/'.$row->dtk2_file;?><br>
                                            <img src="<?php echo $urlfile;?>" alt="" style="width:270px;height:228px;">
                                            <?php $tagFile =  "<a href='".$urlfile."' target='_blank'>Full Size Image</a>"?>
                                            <?php if($row->dtk2_file!="" || $row->dtk2_file!=NULL){echo "<br>".$tagFile;} ?></p>
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
                    </div>
                    <div class="row"> 
                        <div class ='col-sm-3 pull-right'> 
                        <label id = "total_label" class="control-label text-center pull-right">Total : &nbsp;</label>
                        <input type="text" class="form-control" id="x_jml_sblm_ppn_kons2"  value='<?php echo 'Rp.'.number_format($jmlKons2,0,",","."); ?>' readonly>
                        </div> 
                                          
                    </div>
                <?php } ?>

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
                <?php if($pgd_dgn_pajak == 1){ echo'<i class ="pull-right"><font color="red">*Total Harga Sudah Dengan Pajak</font></i>';}?>
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