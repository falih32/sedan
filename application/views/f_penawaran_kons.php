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
                $spl_alamat = $dataPengadaan->spl_alamat;
                $spl_NPWP = $dataPengadaan->spl_alamat;
                
                $pgd_jml_sblm_ppn_hps = $dataPengadaan->pgd_jml_sblm_ppn_hps;
                $pgd_jml_ssdh_ppn_hps = $dataPengadaan->pgd_jml_ssdh_ppn_hps;
                $pgd_jml_sblm_ppn_pnr = $dataPengadaan->pgd_jml_sblm_ppn_pnr;
                $pgd_jml_ssdh_ppn_pnr = $dataPengadaan->pgd_jml_ssdh_ppn_pnr;
                $pgd_jml_sblm_ppn_fix = $dataPengadaan->pgd_jml_sblm_ppn_fix;
                $pgd_jml_ssdh_ppn_fix = $dataPengadaan->pgd_jml_ssdh_ppn_fix;
                $pgd_wkt_awal_penawaran = $dataPengadaan->pgd_wkt_awal_penawaran;
                $pgd_wkt_akhir_penawaran = $dataPengadaan->pgd_wkt_akhir_penawaran;  
                $pgd_tipe_pengadaan = $dataPengadaan->pgd_tipe_pengadaan; 
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
                $pnc_evaluasi_teknis_konsultan = $dataPengadaan->pnc_evaluasi_teknis_konsultan;
                $totRowPekerjaan = 0; 
                $totRowSyarat = 0;
                
                if($pgd_tipe_pengadaan == 2){
                    $unp_id = $dataPengadaan->unp_id;
                    $unp_bobot_png_prs = $dataPengadaan->unp_bobot_png_prs;
                    $unp_nilai_png_prs = $dataPengadaan->unp_nilai_png_prs;
                    $unp_jml_png_prs = $dataPengadaan->unp_jml_png_prs;
                    $unp_bobot_pnd_mtd = $dataPengadaan->unp_bobot_pnd_mtd;
                    $unp_nilai_pnd_mtd = $dataPengadaan->unp_nilai_pnd_mtd;
                    $unp_jml_pnd_mtd = $dataPengadaan->unp_jml_pnd_mtd;
                    $unp_bobot_kua_tna = $dataPengadaan->unp_bobot_kua_tna;
                    $unp_nilai_kua_tna = $dataPengadaan->unp_nilai_kua_tna;
                    $unp_jml_kua_tna = $dataPengadaan->unp_jml_kua_tna;
                }
                
?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php echo $title?>
                </h3>
            </div>
            <div class="panel-body">
                <form id = "penawaran_form" method="post" action = "<?php echo base_url()."Pengadaan/proses_add_penawaran";?>" onsubmit="return submitFormPenawaran();" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
            	<h3>Detail <?php echo $judul?>
                </h3>
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
                        	<th>Tanggal Input Pengadaan</th>
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
                        	<td><?php echo $pgd_lama_pekerjaan; ?> hari</td>
                        </tr>
                        <tr>
                        	<th>Jangka waktu Lama Penawaran</th>
                                <td><?php echo $pgd_lama_penawaran; ?> hari</td>
                        </tr>
                        <tr>
                        	<th>Supplier</th>
                                <td><?php echo $spl_nama; ?></td>
                        </tr>
                       
                    </tbody>
                </table>
                
                <h3>Detail Penawaran
                </h3>
                <table class="table table-striped table-bordered table-hover" width="50%">
                    <col width="50%">
                    <col width="50%">
                    <tbody>
                        <tr>
                        	<th>Tanggal Pemasukkan Dokumen Penawaran</th>
                                <td><div class="col-sm-8" >
                                        <input value ="<?php echo $pgd_tgl_pemasukkan_pnr;?>" readonly type="text" class="form-control tgl" id="pgd_tgl_pemasukkan_pnr" name="pgd_tgl_pemasukkan_pnr" placeholder="Tgl Pemasukkan Dok Penawaran" data-error="Input tidak boleh kosong" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" required>
                                    </div>
                                    <div class="col-sm-2">         
                                        <span id ="icon_status_pgd_tgl_pemasukkan_pnr" class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </div>
                                    <div class="row col-sm-12">
                                        <i>*Rentang pemasukkan dokumen penawaran yang diizinkan berdasarkan LDP adalah dari tanggal <?php echo $pgd_wkt_awal_penawaran; ?> sampai <?php echo $pgd_wkt_akhir_penawaran; ?></i>
                                    </div>
                                    <input type="hidden" class="form-control" id="pgd_wkt_awal_penawaran" name ="pgd_wkt_awal_penawaran" value="<?php echo $pgd_wkt_awal_penawaran?>"> 
                                    <input type="hidden" class="form-control" id="pgd_wkt_akhir_penawaran" name ="pgd_wkt_akhir_penawaran" value="<?php echo $pgd_wkt_akhir_penawaran ?>"> 
                                </td>
                        </tr>
                        <tr>
                        	<th>Nomor  Penawaran</th>
                                <td><div class="col-sm-10" ><input value ="<?php echo $pgd_no_srt_penawaran;?>" type="text" class="form-control" id="pgd_no_srt_penawaran" name="pgd_no_srt_penawaran" placeholder="Nomor Surat Penawaran" data-error="Input tidak boleh kosong" required></div></td>
                        </tr>
                          
                    </tbody>
                </table>
                <h3>Detail Supplier
                </h3>
                <table class="table table-striped table-bordered table-hover" width="50%">
                    <tbody>
                        <tr>
                                <th>Supplier</th>
                                <td><?php echo $spl_nama; ?></td>
                        </tr>
                        <tr>
                        	<th>Nama Perwakilan Supplier</th>
                                <td><div class="col-sm-10" ><input value ="<?php echo $pgd_perwakilan_spl;?>" type="text" class="form-control" id="pgd_perwakilan_spl" name="pgd_perwakilan_spl" placeholder="Nama Perwakilan Supplier" data-error="Input tidak boleh kosong" required></div></td>
                        </tr>
                        <tr>
                        	<th>Jabatan Supplier</th>
                                <td><div class="col-sm-10" ><input value ="<?php echo $pgd_jbt_perwakilan_spl;?>" type="text" class="form-control" id="pgd_jbt_perwakilan_spl" name="pgd_jbt_perwakilan_spl" placeholder="Jabatan Perwakilan Supplier" data-error="Input tidak boleh kosong" required></div></td>
                        </tr>
                         <tr>
                        	<th>Alamat Supplier</th>
                                <td><?php echo $spl_alamat; ?></td>
                        </tr>
                        <tr>
                        	<th>Kesesuaian Tanda Tangan Supplier</th>
                                <td><div class="col-sm-10" ><input <?php if($pnc_kesesuaian_ttd == 1){echo 'checked';}?> type="checkbox" data-off-label="Tidak Sesuai" data-on-label="Sesuai" id ="pnc_kesesuaian_ttd" name ="pnc_kesesuaian_ttd" value="1" data-style="btn-group-sm"></div></td>
                        </tr>
                        <tr>
                        	<th>Kesesuaian Alamat Supplier</th>
                                <td><div class="col-sm-10" ><input <?php if($pnc_kesesuaian_alamat_spl == 1){echo 'checked';}?> type="checkbox" data-off-label="Tidak Sesuai" data-on-label="Sesuai" id ="pnc_kesesuaian_alamat_spl" name ="pnc_kesesuaian_alamat_spl" value="1" data-style="btn-group-sm"></div></td>
                        </tr>
                    </tbody>
                </table>
                <h3>Kelengkapan Dokumen Penawaran
                </h3>
                <table class="table table-striped table-bordered table-hover" width="50%">
                    <tbody>
                        <tr>
                        	<th>Surat Penawaran</th>
                                <td><div class="col-sm-10" ><input <?php if($pnc_srt_penawaran == 1){echo 'checked';}?> type="checkbox" data-off-label="Tidak Sesuai" data-on-label="Sesuai" id ="pnc_srt_penawaran" name ="pnc_srt_penawaran" value="1" data-style="btn-group-sm"></div></td>
                        </tr>
                        <tr>
                        	<th>Daftar Kuantitas dan Harga</th>
                                <td><div class="col-sm-10" ><input <?php if($pnc_daftar_knts_hrg == 1){echo 'checked';}?> type="checkbox" data-off-label="Tidak Sesuai" data-on-label="Sesuai" id ="pnc_daftar_knts_hrg" name ="pnc_daftar_knts_hrg" value="1" data-style="btn-group-sm"></div></td>
                        </tr>
                        <tr>
                        	<th>Dokumen Penawaran Teknis</th>
                                <td><div class="col-sm-10" ><input <?php if($pnc_dok_pnr_teknis == 1){echo 'checked';}?> type="checkbox" data-off-label="Tidak Sesuai" data-on-label="Sesuai" id ="pnc_dok_pnr_teknis" name ="pnc_dok_pnr_teknis" value="1" data-style="btn-group-sm"></div></td>
                        </tr>
                        <tr>
                        	<th>Dokumen Isian Kualifikasi</th>
                                <td><div class="col-sm-10" ><input <?php if($pnc_isian_kualifikasi == 1){echo 'checked';}?> type="checkbox" data-off-label="Tidak Sesuai" data-on-label="Sesuai" id ="pnc_isian_kualifikasi" name ="pnc_isian_kualifikasi" value="1" data-style="btn-group-sm"></div></td>
                        </tr>
                    </tbody>
                </table>
                <h3>Evaluasi Teknis
                </h3>
                <?php if($pgd_tipe_pengadaan!=2){ ?>
                <table class="table table-striped table-bordered table-hover" width="50%">
                    <col width="50%">
                    <col width="50%">
                    <tbody>
                        <tr>
                                <th>Spesifikasi Teknis yang ditawarkan sesuai dengan yang ditetapkan dalam dokumen pengadaan</th>
                                <td><div class="col-sm-6" ><input <?php if($pnc_kesesuaian_spec_teknis == 1){echo 'checked';}?> type="checkbox" data-off-label="Tidak Sesuai" data-on-label="Sesuai" id ="pnc_kesesuaian_spec_teknis" name ="pnc_kesesuaian_spec_teknis" value="1" data-style="btn-group-sm"></div></td>
                        </tr>
                        <tr>
                        	<th>Jadwal Pelaksanaan pekerjaan tidak melampaui batas waktu sebagaimana tercantum dalam LDP</th>
                                <td><div class="col-sm-10" ><input <?php if($pnc_kesesuaian_jdwl_kerja == 1){echo 'checked';}?> type="checkbox" data-off-label="Tidak Sesuai" data-on-label="Sesuai" id ="pnc_kesesuaian_jdwl_kerja" name ="pnc_kesesuaian_jdwl_kerja" value="1" data-style="btn-group-sm"></div></td>
                        </tr>
                        <tr>
                        	<th>Identitas (jenis, type, dan merk) yang ditawarkan sebagaimana tercantum dalam LDP</th>
                                <td><div class="col-sm-10" ><input <?php if($pnc_kesesuaian_identitas == 1){echo 'checked';}?> type="checkbox" data-off-label="Tidak Sesuai" data-on-label="Sesuai" id ="pnc_kesesuaian_identitas" name ="pnc_kesesuaian_identitas" value="1" data-style="btn-group-sm"></div></td>
                        </tr>
                  
                    </tbody>
                </table>
                <?php }else{ ?>
                <table class="table table-striped table-bordered table-hover" >
      
                    <thead>
                        <tr>
                          <th bgcolor='#BDBDBD'>Unsur Penilaian</th>
                          <th bgcolor='#BDBDBD'>Bobot Unsur</th>
                          <th bgcolor='#BDBDBD'>Nilai</th>
                          <th bgcolor='#BDBDBD'>Jumlah Nilai</th>
                          <th bgcolor='#BDBDBD'>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                                <th>Pengalaman Perusahaan</th>
                                <td><input readonly value="<?php echo $unp_bobot_png_prs;?>" required type="text" class="form-control" id="unp_bobot_png_prs" name="unp_bobot_png_prs"  data-error="Data yang dimasukkan harus angka, jika terdapat koma gunakan titik(.) sebagai koma" pattern="^[0-9.\s]*$"></td>
                                <td><label id="unp_nilai_png_prs" class="text-left"><?php echo $unp_nilai_png_prs;?></label></td>
                                <td><label id="unp_jml_png_prs" class="text-left"><?php echo $unp_jml_png_prs;?></label></td>
                                <td><button type='button' onclick="window.open('<?php echo site_url('KonsultanTeknis/PengalamanPerusahaan').'/'.$unp_id.'/'.$pgd_id;?>')" class='btn btn-primary' id="entrypp">
                                    Entry <span class="glyphicon glyphicon-plus"></span>
                                </button></td>
                        </tr>
                        <tr>
                        	<th>Pendekatan dan Metodologi</th>
                                <td><input readonly value="<?php echo $unp_bobot_pnd_mtd;?>" required type="text" class="form-control" id="unp_bobot_pnd_mtd" name="unp_bobot_pnd_mtd"  data-error="Data yang dimasukkan harus angka, jika terdapat koma gunakan titik(.) sebagai koma" pattern="^[0-9.\s]*$"></td>
                                <td><label id="unp_nilai_pnd_mtd" class="text-left"><?php echo $unp_nilai_pnd_mtd;?></label></td>
                                <td><label id="unp_jml_pnd_mtd" class="text-left"><?php echo $unp_jml_pnd_mtd;?></label></td>
                                <td><button type='button' onclick="window.open('<?php echo site_url('KonsultanTeknis/MetodologiPerusahaan').'/'.$unp_id.'/'.$pgd_id;?>')" class='btn btn-primary' id="entrypm">
                                    Entry <span class="glyphicon glyphicon-plus"></span>
                                </button></td>
                        </tr>
                        <tr>
                        	<th>Kualifikasi Tenaga Ahli</th>
                                <td><input readonly value="<?php echo $unp_bobot_kua_tna;?>" required type="text" class="form-control" id="unp_bobot_kua_tna" name="unp_bobot_kua_tna"  data-error="Data yang dimasukkan harus angka, jika terdapat koma gunakan titik(.) sebagai koma" pattern="^[0-9.\s]*$"></td>
                                <td><label id="unp_nilai_kua_tna" class="text-left"><?php echo $unp_nilai_kua_tna;?></label></td>
                                <td><label id="unp_jml_kua_tna" class="text-left"><?php echo $unp_jml_kua_tna;?></label></td>
                                <td><button type='button' onclick="window.open('<?php echo site_url('KonsultanTeknis/PersonilPerusahaan').'/'.$unp_id.'/'.$pgd_id;?>')" class='btn btn-primary' id="entrykt">
                                    Entry <span class="glyphicon glyphicon-plus"></span>
                                </button></td>
                        </tr>
                  
                    </tbody>
                </table>
                    <button type='button' class='btn btn-primary pull-right' id="refreshtableteknis">
                        Refresh <span class="glyphicon glyphicon-plus"></span>
                    </button> <br><br>
                <table class="table table-striped table-bordered table-hover" width="50%">
                    <col width="50%">
                    <col width="50%">
                    <tbody>
                        <tr>
                                <th>Apakah Evaluasi Teknis diatas sesuai ?</th>
                                <td><div class="col-sm-10" ><input <?php if($pnc_evaluasi_teknis_konsultan == 1){echo 'checked';}?> type="checkbox" data-off-label="Tidak Sesuai" data-on-label="Sesuai" id ="pnc_evaluasi_teknis_konsultan" name ="pnc_evaluasi_teknis_konsultan" value="1" data-style="btn-group-sm"></div></td>
                        </tr>
                       
                    </tbody>
                </table>
                    <script type="text/javascript">
                    $(document).ready(function() {
                        //fungsi untuk refresh 
                        $('#refreshtableteknis').click(function(){
                            $.ajax({
                            url: "<?php echo site_url('KonsultanTeknis/getUnsurPenilaian').'/'.$unp_id;?>",
                            type: "POST",
                            data: $(this).serialize(),
                            success: function(dt) {
                                var obj = JSON.parse(dt);
                                document.getElementById('unp_bobot_png_prs').value = obj.unp_bobot_png_prs;
                                document.getElementById('unp_bobot_pnd_mtd').value = obj.unp_bobot_pnd_mtd;
                                document.getElementById('unp_bobot_kua_tna').value = obj.unp_bobot_kua_tna;
                                
                                document.getElementById('unp_nilai_png_prs').innerHTML = obj.unp_nilai_png_prs;
                                document.getElementById('unp_nilai_pnd_mtd').innerHTML = obj.unp_nilai_pnd_mtd;
                                document.getElementById('unp_nilai_kua_tna').innerHTML = obj.unp_nilai_kua_tna;
                                
                                document.getElementById('unp_jml_png_prs').innerHTML = obj.unp_jml_png_prs;
                                document.getElementById('unp_jml_pnd_mtd').innerHTML = obj.unp_jml_pnd_mtd;
                                document.getElementById('unp_jml_kua_tna').innerHTML = obj.unp_jml_kua_tna;
                            }
                        });
                        });
                    });
                    </script>
                <?php } ?>
                    <br><br>
                <h3>Evaluasi Harga (Biaya Personil)
                </h3>
                <div class="table-responsive">
                <table id = "table-pekerjaan" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                          <th bgcolor='#BDBDBD'>Jabatan</th>
                          <th bgcolor='#BDBDBD'>Kuantitas</th>
                          <th bgcolor='#BDBDBD'>Biaya Personil(HPS)</th>
                          <th bgcolor='#BDBDBD'>Biaya Personil(Pnr)</th>
                          <th bgcolor='#BDBDBD'>Total(HPS)</th>
                          <th bgcolor='#BDBDBD'>Total(Penawaran)</th>
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
                                
                                <td></td></tr>
                                <?php $number = $number+1; ?>
                            <?php } ?>
                            <tr><td><?php echo $row->dtk_jabatan; ?></td>
                            <td><?php echo ($row->dtk_kuantitas+0) ?></td>
                            <td><?php echo 'Rp.'.number_format($row->dtk_biaya_personil_hps,0,",","."); ?></td>
                            <td><div class="row form-group">                                    
                                    <div class="col-sm-10">
                                    <input type="hidden" class="form-control" id="dtk_id<?php echo $row->dtk_id; ?>" name="dtk_id[<?php echo $totRowPekerjaan; ?>]" value="<?php echo $row->dtk_id; ?>">
                                    <input type="hidden" class="form-control" id="dtk_kuantitas<?php echo $row->dtk_id; ?>" value="<?php echo $row->dtk_kuantitas; ?>"> 
                                    <input type="hidden" class="hargasatuan_hps form-control" id="dtk_biaya_personil_hps<?php echo $row->dtk_id; ?>" value="<?php echo $row->dtk_biaya_personil_hps; ?>">    
                                    <input value ="<?php if($row->dtk_biaya_personil_pnr>0){echo ($row->dtk_biaya_personil_pnr+0);}?>" type="text" class="hargasatuan_pnr form-control" id="dtk_biaya_personil_pnr<?php echo $row->dtk_id; ?>" name="dtk_biaya_personil_pnr[<?php echo $totRowPekerjaan; ?>]" placeholder="Harga satuan" data-error="Data yang dimasukkan harus angka, jika terdapat koma gunakan titik(.) sebagai koma" pattern="^[0-9.\s]*$" required>
                                    <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-sm-2">         
                                    <span id ="icon_status<?php echo $row->dtk_id; ?>" class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-sm-10">
                                    <label id="lbl_dtk_biaya_personil_pnr<?php echo $row->dtk_id; ?>">Rp.-</label>
                                    </div>
                                </div>
                                 <div class="row">
                                    
                                 </div>
                            </td>
                            <td><?php echo 'Rp.'.number_format($row->dtk_jml_biaya_hps,0,",","."); ?></td>
                            <td style='display:none;'><span id="jml_pnr<?php echo $row->dtk_id; ?>"></span></td>
                            <td><span id="Xjml_pnr<?php echo $row->dtk_id; ?>"></span></td>
                            <td style='display:none;'><?php echo $row->dtk_jml_biaya_hps; ?></td>
                            <script type="text/javascript">
                                    $(document).ready(function() {
                                            Number.prototype.format = function(n, x, s, c) {
                                                var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
                                                    num = this.toFixed(Math.max(0, ~~n));

                                                return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
                                            };
                                            function cekHrg<?php echo $row->dtk_id; ?>() {
                                                //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
                                                var pnrHarga = parseFloat(document.getElementById('dtk_biaya_personil_pnr<?php echo $row->dtk_id; ?>').value);
                                                var hpsHarga = parseFloat(document.getElementById('dtk_biaya_personil_hps<?php echo $row->dtk_id; ?>').value);
                                                 if (pnrHarga <= hpsHarga && !isNaN(pnrHarga)) {
                                                    $('#icon_status<?php echo $row->dtk_id; ?>').removeClass('glyphicon-remove text-danger').addClass('glyphicon-ok text-success');
                                                    $(this).next().stop(true, true).fadeIn(0).html('Harga Penawaran lebih kecil dari harga HPS').fadeOut(2000);
                                                 }else if(pnrHarga > hpsHarga && !isNaN(pnrHarga)){
                                                     $('#icon_status<?php echo $row->dtk_id; ?>').removeClass('glyphicon-ok text-success').addClass('glyphicon-remove text-danger');
                                                     $(this).next().stop(true, true).fadeIn(0).html('Harga Penawaran lebih besar dari harga HPS').fadeOut(2000);
                                                 }
                                                 var vol = parseFloat(document.getElementById('dtk_kuantitas<?php echo $row->dtk_id; ?>').value);
                                                 var tot = parseFloat((pnrHarga*vol).toFixed(2));
                                      
                                                 if(!isNaN(tot)){
                                                    document.getElementById("jml_pnr<?php echo $row->dtk_id; ?>").innerHTML = tot;
                                                    document.getElementById("Xjml_pnr<?php echo $row->dtk_id; ?>").innerHTML = 'Rp.'+tot.format(0,3,'.');
                                                    document.getElementById("lbl_dtk_biaya_personil_pnr<?php echo $row->dtk_id; ?>").innerHTML = 'Rp.'+pnrHarga.format(0,3,'.');
                                                }else{
                                                    document.getElementById("jml_pnr<?php echo $row->dtk_id; ?>").innerHTML = 'Rp.-';
                                                    document.getElementById("Xjml_pnr<?php echo $row->dtk_id; ?>").innerHTML = 'Rp.-';
                                                    document.getElementById("lbl_dtk_biaya_personil_pnr<?php echo $row->dtk_id; ?>").innerHTML = 'Rp.-';
                                                }
  
                                            }
                                            cekHrg<?php echo $row->dtk_id; ?>();
                                            $('#dtk_biaya_personil_pnr<?php echo $row->dtk_id; ?>').bind('input', cekHrg<?php echo $row->dtk_id; ?>);
                                             
                                    });
                            </script>
                        <?php $totRowPekerjaan = $totRowPekerjaan+1;} ?>
                    </tbody>
                </table>
                 </div>     
                <?php if($konsultanList2 != NULL) {?>
                <?php   $totRowPekerjaan = 0; ?>
                <h3>Evaluasi Harga (Biaya Non Personil)
                </h3>
                 <div class="table-responsive">
                <table id = "table-pekerjaan" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                          <th bgcolor='#BDBDBD'>Uraian</th>
                          <th bgcolor='#BDBDBD'>Volume</th>
                          <th bgcolor='#BDBDBD'>Harga Satuan(HPS)</th>
                          <th bgcolor='#BDBDBD'>Harga Satuan(Penawaran)</th>
                          <th bgcolor='#BDBDBD'>Total(HPS)</th>
                          <th bgcolor='#BDBDBD'>Total(Penawaran)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $judul = 0; ?>
                        <?php $number = 1; ?>
                        <?php $lastjudul = -11; ?>
                    	<?php foreach ($konsultanList2 as $row) {?>
                            <?php if($row->dtk2_sub_judul != $lastjudul && $judul == 1) {?>
                                <?php $judul = 0; ?>
                                <tr bgcolor='#BDBDBD'><td bgcolor='#BDBDBD'></td
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
                                <td></td></tr>
                                <?php $number = $number+1; ?>
                            <?php } ?>
                            <tr><td><?php echo $row->dtk2_pekerjaan; ?></td>
                            <td><?php echo ($row->dtk2_volume+0).' '.$row->dtk2_satuan; ?></td>
                            <td><?php echo 'Rp.'.number_format($row->dtk2_hargasatuan_hps,0,",","."); ?></td>
                            <td><div class="row form-group">                                    
                                    <div class="col-sm-10">
                                    <input type="hidden" class="form-control" id="dtk2_id<?php echo $row->dtk2_id; ?>" name="dtk2_id[<?php echo $totRowPekerjaan; ?>]" value="<?php echo $row->dtk2_id; ?>">
                                    <input type="hidden" class="form-control" id="dtk2_volume<?php echo $row->dtk2_id; ?>" value="<?php echo $row->dtk2_volume; ?>"> 
                                    <input type="hidden" class="hargasatuan_hps form-control" id="dtk2_hargasatuan_hps<?php echo $row->dtk2_id; ?>" value="<?php echo $row->dtk2_hargasatuan_hps; ?>">    
                                    <input value ="<?php if($row->dtk2_hargasatuan_pnr>0){echo ($row->dtk2_hargasatuan_pnr+0);}?>" type="text" class="hargasatuan_pnr form-control" id="dtk2_hargasatuan_pnr<?php echo $row->dtk2_id; ?>" name="dtk2_hargasatuan_pnr[<?php echo $totRowPekerjaan; ?>]" placeholder="Harga satuan" data-error="Data yang dimasukkan harus angka, jika terdapat koma gunakan titik(.) sebagai koma" pattern="^[0-9.\s]*$" required>
                                    <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-sm-2">         
                                    <span id ="icon_status<?php echo $row->dtk2_id; ?>" class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-sm-10">
                                    <label id="lbl_dtk2_hargasatuan_pnr<?php echo $row->dtk2_id; ?>">Rp.-</label>
                                    </div>
                                </div>
                                 <div class="row">
                                    
                                 </div>
                            </td>
                            <td><?php echo 'Rp.'.number_format($row->dtk2_jumlahharga_hps,0,",","."); ?></td>
                            <td style='display:none;'><span id="jml_pnr<?php echo $row->dtk2_id; ?>"></span></td>
                            <td><span id="Xjml_pnr<?php echo $row->dtk2_id; ?>"></span></td>
                            <td style='display:none;'><?php echo $row->dtk2_jumlahharga_hps; ?></td>
                            <script type="text/javascript">
                                    $(document).ready(function() {
                                            Number.prototype.format = function(n, x, s, c) {
                                                var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
                                                    num = this.toFixed(Math.max(0, ~~n));

                                                return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
                                            };
                                            function cekHrg<?php echo $row->dtk2_id; ?>() {
                                                //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
                                                var pnrHarga = parseFloat(document.getElementById('dtk2_hargasatuan_pnr<?php echo $row->dtk2_id; ?>').value);
                                                var hpsHarga = parseFloat(document.getElementById('dtk2_hargasatuan_hps<?php echo $row->dtk2_id; ?>').value);
                                                 if (pnrHarga <= hpsHarga && !isNaN(pnrHarga)) {
                                                    $('#icon_status<?php echo $row->dtk2_id; ?>').removeClass('glyphicon-remove text-danger').addClass('glyphicon-ok text-success');
                                                    $(this).next().stop(true, true).fadeIn(0).html('Harga Penawaran lebih kecil dari harga HPS').fadeOut(2000);
                                                 }else if(pnrHarga > hpsHarga && !isNaN(pnrHarga)){
                                                     $('#icon_status<?php echo $row->dtk2_id; ?>').removeClass('glyphicon-ok text-success').addClass('glyphicon-remove text-danger');
                                                     $(this).next().stop(true, true).fadeIn(0).html('Harga Penawaran lebih besar dari harga HPS').fadeOut(2000);
                                                 }
                                                 var vol = parseFloat(document.getElementById('dtk2_volume<?php echo $row->dtk2_id; ?>').value);
                                                 var tot = parseFloat((pnrHarga*vol).toFixed(2));
                                      
                                                 if(!isNaN(tot)){
                                                    document.getElementById("jml_pnr<?php echo $row->dtk2_id; ?>").innerHTML = tot;
                                                    document.getElementById("Xjml_pnr<?php echo $row->dtk2_id; ?>").innerHTML = 'Rp.'+tot.format(0,3,'.');
                                                    document.getElementById("lbl_dtk2_hargasatuan_pnr<?php echo $row->dtk2_id; ?>").innerHTML = 'Rp.'+pnrHarga.format(0,3,'.');
                                                }else{
                                                    document.getElementById("jml_pnr<?php echo $row->dtk2_id; ?>").innerHTML = 'Rp.-';
                                                    document.getElementById("Xjml_pnr<?php echo $row->dtk2_id; ?>").innerHTML = 'Rp.-';
                                                    document.getElementById("lbl_dtk2_hargasatuan_pnr<?php echo $row->dtk2_id; ?>").innerHTML = 'Rp.-';
                                                }
  
                                            }
                                            cekHrg<?php echo $row->dtk2_id; ?>();
                                            $('#dtk2_hargasatuan_pnr<?php echo $row->dtk2_id; ?>').bind('input', cekHrg<?php echo $row->dtk2_id; ?>);
                                             
                                    });
                            </script>
                        <?php $totRowPekerjaan = $totRowPekerjaan+1;} ?>
                    </tbody>
                </table>
                 </div>
                <?php } ?>    
                    <div class="row">
                    <p class="control-label text-center pull-left"><i><?php if ($pgd_dgn_pajak != 0){ echo "*Total Harga Sudah Dengan Pajak"; }else{echo "";} ?></i></p>
                    </div>
                <div class="row"> 
                    <div class ='col-sm-3 pull-right'> 
                    <label id = "total_label" class="control-label text-center pull-right">Total : &nbsp;</label>
                    <input type="text" class="form-control" id="x_pgd_jml_sblm_ppn_hps"  value='<?php echo 'Rp.'.number_format($pgd_jml_sblm_ppn_hps,0,",","."); ?>' readonly>
                    <input type="hidden" class="form-control" id="pgd_jml_sblm_ppn_hps" name="pgd_jml_sblm_ppn_hps" value='<?php echo $pgd_jml_sblm_ppn_hps?>' readonly>
                    </div> 

                    <div class ='col-sm-3 pull-right'>
                    <label id = "lbl_pgd_jml_ssdh_ppn_hps" class="control-label text-center pull-right"><?php if ($pgd_dgn_pajak == 0){ echo "Total(ppn 10%) : &nbsp;"; }else{echo "";} ?></label>
                    <input type="<?php if ($pgd_dgn_pajak == 0){ echo "text"; }else{echo "hidden";} ?>" class="form-control" id="x_pgd_jml_ssdh_ppn_hps"  value='<?php echo 'Rp.'.number_format($pgd_jml_ssdh_ppn_hps,0,",","."); ?>' readonly>
                    <input type="hidden" class="form-control" id="pgd_jml_ssdh_ppn_hps" name="pgd_jml_ssdh_ppn_hps" value='<?php echo $pgd_jml_ssdh_ppn_hps?>' readonly>
                    </div>
                                 
                </div> 
                <div class="row"> 
                    <div class ='col-sm-3 pull-right'> 
                    <label id = "total_label" class="control-label text-center pull-right">Total Penawaran: &nbsp;</label>
                    <input type="text" class="form-control" id="x_pgd_jml_sblm_ppn_pnr"  value='0' readonly>
                    <input type="hidden" class="form-control" id="pgd_jml_sblm_ppn_pnr" name="pgd_jml_sblm_ppn_pnr" value='0' readonly>
                    </div> 
                    <div class ='col-sm-3 pull-right'>
                    <label id = "total_label" class="control-label text-center pull-right"><?php if ($pgd_dgn_pajak == 0){ echo "Total Penawaran(ppn 10%) : &nbsp;"; }else{echo "";} ?></label>
                    <input type="<?php if ($pgd_dgn_pajak == 0){ echo "text"; }else{echo "hidden";} ?>" class="form-control" id="x_pgd_jml_ssdh_ppn_pnr"  value='0' readonly>
                    <input type="hidden" class="form-control" id="pgd_jml_ssdh_ppn_pnr" name="pgd_jml_ssdh_ppn_pnr" value='0' readonly>
                    </div> 
                </div> 
                <h3>Evaluasi Kualifikasi
                </h3>
                <table class="table table-striped table-bordered table-hover" width="50%">
                    <tbody>
                        <tr>
                        	<th>Syarat Penyedia</th>
                                <td><?php foreach ($suratList as $row) {?>
                                <div class="form-group">
                                <div class="col-sm-8"><?php echo $row->siz_nama; ?></div>
                                <div class="col-sm-4"><input <?php if($row->psr_status_penawaran==1){echo 'checked';} ?> class ="chkBoxSyarat" type="checkbox" data-off-label="Tidak Ada" data-on-label="Ada" name ="psr_penawaran[<?php echo $totRowSyarat; ?>]" value="<?php echo $row->psr_id; ?>" data-style="btn-group-sm">
                                </div>
                                </div>
                                <?php $totRowSyarat = $totRowSyarat+1; } ?></td>
                        </tr>
                    </tbody>
                </table>
               <input type="hidden" class="form-control" id="status_tot_pnr" name ="status_tot_pnr" value="<?php echo $pgd_id; ?>">
               <input type="hidden" class="form-control" id="pgd_id" name ="pgd_id" value="<?php echo $pgd_id; ?>"> 
               <input type="hidden" class="form-control" id="pgd_tipe_pengadaan" name ="pgd_tipe_pengadaan" value="<?php echo $pgd_tipe_pengadaan; ?>">
               <input type="hidden" class="form-control" id="pgd_status_pengadaan" name ="pgd_status_pengadaan" value=""> 
               <input type="hidden" class="form-control" id="pgd_status_selesai" name ="pgd_status_selesai" value="">
               <input type="hidden" class="form-control" id="pgd_dgn_pajak" name ="pgd_dgn_pajak" value="<?php echo $pgd_dgn_pajak; ?>">
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
    var statusPnr;
    statusPnr = 1;
    // 1. periksa kesesuaian tanggal
    var awal = document.getElementById('pgd_wkt_awal_penawaran').value;
    var akhir = document.getElementById('pgd_wkt_akhir_penawaran').value;
    var input = document.getElementById('pgd_tgl_pemasukkan_pnr').value+':00';
    var dawal = awal.split(/-|\s|:/);
    var dakhir = akhir.split(/-|\s|:/);
    var dinput  = input.split(/-|\s|:/);

    var tawal = new Date(dawal[0], dawal[1] -1, dawal[2], dawal[3], dawal[4], dawal[5]);
    var takhir = new Date(dakhir[0], dakhir[1] -1, dakhir[2], dakhir[3], dakhir[4], dakhir[5]);
    var tinput = new Date(dinput[0], dinput[1] -1, dinput[2], dinput[3], dinput[4], dinput[5]);

    
    if(tinput.getTime()<=tawal.getTime() && tinput.getTime()>=takhir.getTime()){
        statusPnr = 0;
    }
    var xyz = -1;
    // 2. periksa kesesuaian tanda tangan supplier
//    alert('1 -> '+xyz+ 'statusPNR -> '+statusPnr);
    xyz = document.getElementById('pnc_kesesuaian_ttd').checked;
    if(xyz !== true){
        statusPnr = 0;
    }
//    alert('3 -> '+xyz+ 'statusPNR -> '+statusPnr);
    // 3. periksa kesesuaian alamat supplier
    xyz = document.getElementById('pnc_kesesuaian_alamat_spl').checked;
    if(xyz !== true){
        statusPnr = 0;
    }
//    alert('4 -> '+xyz+ 'statusPNR -> '+statusPnr);
    // 4. periksa kesesuaian surat penawaran
    xyz = document.getElementById('pnc_srt_penawaran').checked;
    if(xyz !== true){
        statusPnr = 0;
    }
//    alert('5 -> '+xyz+ 'statusPNR -> '+statusPnr);
    // 5. periksa kesesuaian kuantitas dan harga
    xyz = document.getElementById('pnc_daftar_knts_hrg').checked;
    if(xyz !== true){
        statusPnr = 0;
    }
//    alert('6 -> '+xyz+ 'statusPNR -> '+statusPnr);
    // 6. periksa kesesuaian penawaran teknis
    xyz = document.getElementById('pnc_dok_pnr_teknis').checked;
    if(xyz !== true){
        statusPnr = 0;
    }
//    alert('7 -> '+xyz+ 'statusPNR -> '+statusPnr);
    // 6. periksa kesesuaian isian kualifikasi
    xyz = document.getElementById('pnc_isian_kualifikasi').checked;
    if(xyz !== true){
        statusPnr = 0;
    }
    
    var tipe = document.getElementById('pgd_tipe_pengadaan').value;
    if(tipe === '2'){
        // 7. periksa evaluasi teknis konsultan
        xyz = document.getElementById('pnc_evaluasi_teknis_konsultan').checked;
        if(xyz !== true){
            statusPnr = 0;
        }
    }else{
    //    alert('8 -> '+xyz+ 'statusPNR -> '+statusPnr);
        // 7. periksa kesesuaian spec teknisisian kualifikasi
        xyz = document.getElementById('pnc_kesesuaian_spec_teknis').checked;
        if(xyz !== true){
            statusPnr = 0;
        }
    //    alert('9 -> '+xyz+ 'statusPNR -> '+statusPnr);
        // 8. periksa jadwal pelaksanaan
        xyz = document.getElementById('pnc_kesesuaian_jdwl_kerja').checked;
        if(xyz !== true){
            statusPnr = 0;
        }
    //    alert('10 -> '+xyz+ 'statusPNR -> '+statusPnr);
        // 9. periksa kesesuaian identitas
        xyz = document.getElementById('pnc_kesesuaian_identitas').checked;
        if(xyz !== true){
            statusPnr = 0;
        }        
    }

//    alert('11 -> '+xyz+ 'statusPNR -> '+statusPnr);
 
    //10. periksa kesesuaian harga dan syarat penyedia
    var statusPekerjaan = 0;
    var statusSyarat = 0;
    var i;
    var checkedSyarat = document.getElementsByClassName("chkBoxSyarat");
   
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
    var TableData = new Array();

    $('#table-pekerjaan tr').each(function(row, tr){
        TableData[row]={
            "jumlah" : $(tr).find('td:eq(5)').text()
             , "jumlahhps" :$(tr).find('td:eq(7)').text() 
        }    
    }); 
    TableData.shift();  // first row will be empty - so remove

    TableData.forEach( function (arrayItem)
    {
        var nilai = parseFloat(arrayItem.jumlah);
        var nilaihps = parseFloat(arrayItem.jumlahhps);
        if(!isNaN(nilai) && !isNaN(nilaihps) && statusPekerjaan===0){
            if(nilai > nilaihps){
            //totSemuaPnr = totSemuaPnr + nilai;
            //alert(nilai);
                statusPekerjaan = 1;
            }
        }
        
    });
    //totSemuaPnr = parseFloat(totSemuaPnr).toFixed(2);
//    var totSemuaHps = parseFloat(document.getElementById('pgd_jml_sblm_ppn_hps').value);
//    //alert("totSemuaHps="+totSemuaHps+" totSemuaPnr="+totSemuaPnr);
//    if(!isNaN(totSemuaPnr) && totSemuaPnr>totSemuaHps){
//        statusPekerjaan = 1;
//    }
//    alert("statusSyarat="+statusSyarat+" statusPekerjaan="+statusPekerjaan+" statusPnr="+statusPnr);
    if(statusSyarat===1 || statusPekerjaan===1 || statusPnr ===0){
        
        if (confirm('Input Penawaran yang diajukan masih ada yang tidak sesuai, Lanjutkan ?')) {
            // Save it!
            document.getElementById('pgd_status_pengadaan').value = 0;
            document.getElementById('pgd_status_selesai').value = -1;
            return true;
        } else {
            // Do nothing!
            return false;
        }
        
    }else{
        document.getElementById('pgd_status_pengadaan').value = 1;
        document.getElementById('pgd_status_selesai').value = 0;
        return true;
    }
    //$(this).preventDefault();
}

Number.prototype.format = function(n, x, s, c) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
        num = this.toFixed(Math.max(0, ~~n));

    return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
};
var myVar = setInterval(myTimer, 3000);

function myTimer() {
    var TableData = new Array();
    
    $('#table-pekerjaan tr').each(function(row, tr){
        TableData[row]={
            "jumlah" : $(tr).find('td:eq(5)').text()
        }    
    }); 
    TableData.shift();  // first row will be empty - so remove
    var totSemuaPnr = 0;
    TableData.forEach( function (arrayItem)
    {
        var nilai = parseFloat(arrayItem.jumlah);
        if(!isNaN(nilai)){
            totSemuaPnr = totSemuaPnr + nilai;
            //alert(nilai);
        }
        
    });
    //totSemuaPnr = parseFloat(totSemuaPnr).toFixed(2);                                       
    if(!isNaN(totSemuaPnr)){
        document.getElementById("pgd_jml_sblm_ppn_pnr").value = parseFloat(totSemuaPnr).toFixed(2);
        document.getElementById("pgd_jml_ssdh_ppn_pnr").value = parseFloat(totSemuaPnr+(totSemuaPnr*0.1)).toFixed(2);
        document.getElementById("x_pgd_jml_sblm_ppn_pnr").value = 'Rp. '+(parseFloat(totSemuaPnr)).format(0,3,'.');
        document.getElementById("x_pgd_jml_ssdh_ppn_pnr").value = 'Rp. '+(parseFloat(totSemuaPnr+(totSemuaPnr*0.1))).format(0,3,'.');
    }else{
        document.getElementById("pgd_jml_sblm_ppn_pnr").value = "Input tidak Valid";
        document.getElementById("pgd_jml_ssdh_ppn_pnr").value = "Input tidak Valid";
        document.getElementById("x_pgd_jml_sblm_ppn_pnr").value = "Input tidak Valid";
        document.getElementById("x_pgd_jml_ssdh_ppn_pnr").value = "Input tidak Valid";
    }
}

$(document).ready(function() {
	$(':checkbox').checkboxpicker();
	$('[data-toggle="tooltip"]').tooltip({});
        
        function bindInputTglPnr() {
            var awal = document.getElementById('pgd_wkt_awal_penawaran').value;
            var akhir = document.getElementById('pgd_wkt_akhir_penawaran').value;
            var input = document.getElementById('pgd_tgl_pemasukkan_pnr').value+':00';
            var dawal = awal.split(/-|\s|:/);
            var dakhir = akhir.split(/-|\s|:/);
            var dinput  = input.split(/-|\s|:/);
//            alert(awal+' '+akhir+' '+input);
//            alert(dawal+' '+dakhir+' '+dinput);
            var tawal = new Date(dawal[0], dawal[1] -1, dawal[2], dawal[3], dawal[4], dawal[5]);
            var takhir = new Date(dakhir[0], dakhir[1] -1, dakhir[2], dakhir[3], dakhir[4], dakhir[5]);
            var tinput = new Date(dinput[0], dinput[1] -1, dinput[2], dinput[3], dinput[4], dinput[5]);
            
//            alert(tawal.getTime()+' '+takhir.getTime()+' '+tinput.getTime());
            if(tinput.getTime()>=tawal.getTime() && tinput.getTime()<=takhir.getTime()){
                $('#icon_status_pgd_tgl_pemasukkan_pnr').removeClass('glyphicon-remove text-danger').addClass('glyphicon-ok text-success');
            }else{
                $('#icon_status_pgd_tgl_pemasukkan_pnr').removeClass('glyphicon-ok text-success').addClass('glyphicon-remove text-danger');
            }
       }
       bindInputTglPnr();
        $("#pgd_tgl_pemasukkan_pnr").on("change.dp", bindInputTglPnr);
        
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