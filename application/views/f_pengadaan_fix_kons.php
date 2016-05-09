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
                $pgd_dgn_pajak = $dataPengadaan->pgd_dgn_pajak; 
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
                <form id = "penawaran_form" method="post" action = "<?php echo base_url()."Pengadaan/proses_add_fix";?>" onsubmit="return submitFormFix();" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
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
                        
                    </tbody>
                </table>
                <div class="table-responsive">
                <table id = "table-pekerjaan" class="table table-striped table-bordered table-hover" width="50%">
                    <thead>
                        <tr>
                          <th bgcolor='#BDBDBD'>Jabatan</th>
                          <th bgcolor='#BDBDBD'>Kuantitas</th>
                          <th bgcolor='#BDBDBD'>Harga Satuan(HPS)</th>
                          <th bgcolor='#BDBDBD'>Harga Satuan(PNR)</th>
                          <th bgcolor='#BDBDBD'>Harga Satuan(Nego)</th>
                          <th bgcolor='#BDBDBD'>Total(HPS)</th>
                          <th bgcolor='#BDBDBD'>Total(Penawaran)</th>
                          <th bgcolor='#BDBDBD'>Total(Nego)</th>
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
                            <tr><td><?php echo $row->dtk_jabatan; ?></td>
                            <td><?php echo ($row->dtk_kuantitas+0)?></td>
                            <td><?php echo 'Rp.'.number_format($row->dtk_biaya_personil_hps,0,",","."); ?></td>
                            <td><?php echo 'Rp.'.number_format($row->dtk_biaya_personil_pnr,0,",","."); ?></td>
                            <td><div class="form-group">                                    
                                    <div class="col-sm-10">
                                    <input type="hidden" class="form-control" id="dtk_id<?php echo $row->dtk_id; ?>" name="dtk_id[<?php echo $totRowPekerjaan; ?>]" value="<?php echo $row->dtk_id; ?>">
                                    <input type="hidden" class="form-control" id="dtk_kuantitas<?php echo $row->dtk_id; ?>" value="<?php echo $row->dtk_kuantitas; ?>"> 
                                    <input type="hidden" class="hargasatuan_pnr form-control" id="dtk_biaya_personil_pnr<?php echo $row->dtk_id; ?>" value="<?php echo $row->dtk_biaya_personil_pnr; ?>">    
                                    <input type="text" value ="<?php echo ($row->dtk_biaya_personil_pnr+0)?>" class="hargasatuan_fix form-control" id="dtk_biaya_personil_fix<?php echo $row->dtk_id; ?>" name="dtk_biaya_personil_fix[<?php echo $totRowPekerjaan; ?>]" placeholder="Harga satuan" data-error="Data yang dimasukkan harus angka, jika terdapat koma gunakan titik(.) sebagai koma" pattern="^[0-9.\s]*$" required>
                                    <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-sm-2">
                                    <span id ="icon_status<?php echo $row->dtk_id; ?>" class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-sm-10">
                                    <label id="lbl_dtk_biaya_personil_fix<?php echo $row->dtk_id; ?>">Rp.-</label>
                                    </div>
                                </div></td>
                            <td><?php echo 'Rp.'.number_format($row->dtk_jml_biaya_hps,0,",","."); ?></td>
                            <td style='display:none;'><?php echo $row->dtk_jml_biaya_hps; ?></td>
                            <td><?php echo 'Rp.'.number_format($row->dtk_jml_biaya_pnr,0,",","."); ?></td>
                            <td style='display:none;'><?php echo $row->dtk_jml_biaya_pnr; ?></td>
                            <td ><span id="Xjml_fix<?php echo $row->dtk_id; ?>"></span></td>
                            <td style='display:none;'><span id="jml_fix<?php echo $row->dtk_id; ?>"></span></td>
                            <script type="text/javascript">
                                    $(document).ready(function() {                          
                                            function cekHrg<?php echo $row->dtk_id; ?>() {
                                                //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
                                                var fixHarga = parseFloat(document.getElementById('dtk_biaya_personil_fix<?php echo $row->dtk_id; ?>').value);
                                                var pnrHarga = parseFloat(document.getElementById('dtk_biaya_personil_pnr<?php echo $row->dtk_id; ?>').value);
                                               
                                                 if (fixHarga <= pnrHarga && !isNaN(fixHarga)) {
                                                    $('#icon_status<?php echo $row->dtk_id; ?>').removeClass('glyphicon-remove text-danger').addClass('glyphicon-ok text-success');
                                                    $(this).next().stop(true, true).fadeIn(0).html('Harga Fix/Deal lebih kecil dari harga penawaran').fadeOut(2000);
                                                 }else if(fixHarga > pnrHarga && !isNaN(fixHarga)){
                                                     $('#icon_status<?php echo $row->dtk_id; ?>').removeClass('glyphicon-ok text-success').addClass('glyphicon-remove text-danger');
                                                     $(this).next().stop(true, true).fadeIn(0).html('Harga Fix/Deal lebih besar dari harga penawaran').fadeOut(2000);
                                                 }
                                                 var vol = parseFloat(document.getElementById('dtk_kuantitas<?php echo $row->dtk_id; ?>').value);
                                                 var tot = parseFloat(fixHarga*vol);
                                      
                                                 if(!isNaN(tot)){
                                                    document.getElementById("jml_fix<?php echo $row->dtk_id; ?>").innerHTML = tot;
                                                    document.getElementById("Xjml_fix<?php echo $row->dtk_id; ?>").innerHTML = 'Rp.'+tot.format(0,3,'.');
                                                    document.getElementById("lbl_dtk_biaya_personil_fix<?php echo $row->dtk_id; ?>").innerHTML = 'Rp.'+fixHarga.format(0,3,'.');
                                                }else{
                                                    document.getElementById("jml_fix<?php echo $row->dtk_id; ?>").innerHTML = "Input tidak Valid";
                                                    document.getElementById("Xjml_fix<?php echo $row->dtk_id; ?>").innerHTML = 'Rp.-';
                                                    document.getElementById("lbl_dtk_biaya_personil_fix<?php echo $row->dtk_id; ?>").innerHTML = 'Rp.-';
                                                }
                                                
                                            }
                                            Number.prototype.format = function(n, x, s, c) {
                                                var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
                                                    num = this.toFixed(Math.max(0, ~~n));

                                                return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
                                            };
                                            
                                            
                                            cekHrg<?php echo $row->dtk_id; ?>();
                                            $('#dtk_biaya_personil_fix<?php echo $row->dtk_id; ?>').bind('input', cekHrg<?php echo $row->dtk_id; ?>);

                                    });
                            </script>
                        <?php $totRowPekerjaan = $totRowPekerjaan+1;} ?>
                    </tbody>
                </table>
                </div>
                <?php if($konsultanList2 != NULL) {?>
                <?php   $totRowPekerjaan = 0; ?>
                <div class="table-responsive">
                <table id = "table-pekerjaan" class="table table-striped table-bordered table-hover" width="50%">
                    <thead>
                        <tr>
                          <th bgcolor='#BDBDBD'>Uraian</th>
                          <th bgcolor='#BDBDBD'>Volume</th>
                          <th bgcolor='#BDBDBD'>Harga Satuan(HPS)</th>
                          <th bgcolor='#BDBDBD'>Harga Satuan(PNR)</th>
                          <th bgcolor='#BDBDBD'>Harga Satuan(Nego)</th>
                          <th bgcolor='#BDBDBD'>Total(HPS)</th>
                          <th bgcolor='#BDBDBD'>Total(Penawaran)</th>
                          <th bgcolor='#BDBDBD'>Total(Nego)</th>
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
                                <td></td>
                                <td></td></tr>
                                <?php $number = $number+1; ?>
                            <?php } ?>
                            <tr><td><?php echo $row->dtk2_pekerjaan; ?></td>
                            <td><?php echo ($row->dtk2_volume+0).' '.$row->dtk2_satuan; ?></td>
                            <td><?php echo 'Rp.'.number_format($row->dtk2_hargasatuan_hps,0,",","."); ?></td>
                            <td><?php echo 'Rp.'.number_format($row->dtk2_hargasatuan_pnr,0,",","."); ?></td>
                            <td><div class="form-group">                                    
                                    <div class="col-sm-10">
                                    <input type="hidden" class="form-control" id="dtk2_id<?php echo $row->dtk2_id; ?>" name="dtk2_id[<?php echo $totRowPekerjaan; ?>]" value="<?php echo $row->dtk2_id; ?>">
                                    <input type="hidden" class="form-control" id="dtk2_volume<?php echo $row->dtk2_id; ?>" value="<?php echo $row->dtk2_volume; ?>"> 
                                    <input type="hidden" class="hargasatuan_pnr form-control" id="dtk2_hargasatuan_pnr<?php echo $row->dtk2_id; ?>" value="<?php echo $row->dtk2_hargasatuan_pnr; ?>">    
                                    <input type="text" value ="<?php echo ($row->dtk2_hargasatuan_pnr+0)?>" class="hargasatuan_fix form-control" id="dtk2_hargasatuan_fix<?php echo $row->dtk2_id; ?>" name="dtk2_hargasatuan_fix[<?php echo $totRowPekerjaan; ?>]" placeholder="Harga satuan" data-error="Data yang dimasukkan harus angka, jika terdapat koma gunakan titik(.) sebagai koma" pattern="^[0-9.\s]*$" required>
                                    <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-sm-2">
                                    <span id ="icon_status<?php echo $row->dtk2_id; ?>" class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-sm-10">
                                    <label id="lbl_dtk2_hargasatuan_fix<?php echo $row->dtk2_id; ?>">Rp.-</label>
                                    </div>
                                </div></td>
                            <td><?php echo 'Rp.'.number_format($row->dtk2_jumlahharga_hps,0,",","."); ?></td>
                            <td style='display:none;'><?php echo $row->dtk2_jumlahharga_hps; ?></td>
                            <td><?php echo 'Rp.'.number_format($row->dtk2_jumlahharga_pnr,0,",","."); ?></td>
                            <td style='display:none;'><?php echo $row->dtk2_jumlahharga_pnr; ?></td>
                            <td ><span id="Xjml_fix<?php echo $row->dtk2_id; ?>"></span></td>
                            <td style='display:none;'><span id="jml_fix<?php echo $row->dtk2_id; ?>"></span></td>
                            <script type="text/javascript">
                                    $(document).ready(function() {                          
                                            function cekHrg<?php echo $row->dtk2_id; ?>() {
                                                //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
                                                var fixHarga = parseFloat(document.getElementById('dtk2_hargasatuan_fix<?php echo $row->dtk2_id; ?>').value);
                                                var pnrHarga = parseFloat(document.getElementById('dtk2_hargasatuan_pnr<?php echo $row->dtk2_id; ?>').value);
                                               
                                                 if (fixHarga <= pnrHarga && !isNaN(fixHarga)) {
                                                    $('#icon_status<?php echo $row->dtk2_id; ?>').removeClass('glyphicon-remove text-danger').addClass('glyphicon-ok text-success');
                                                    $(this).next().stop(true, true).fadeIn(0).html('Harga Fix/Deal lebih kecil dari harga penawaran').fadeOut(2000);
                                                 }else if(fixHarga > pnrHarga && !isNaN(fixHarga)){
                                                     $('#icon_status<?php echo $row->dtk2_id; ?>').removeClass('glyphicon-ok text-success').addClass('glyphicon-remove text-danger');
                                                     $(this).next().stop(true, true).fadeIn(0).html('Harga Fix/Deal lebih besar dari harga penawaran').fadeOut(2000);
                                                 }
                                                 var vol = parseFloat(document.getElementById('dtk2_volume<?php echo $row->dtk2_id; ?>').value);
                                                 var tot = parseFloat(fixHarga*vol);
                                      
                                                 if(!isNaN(tot)){
                                                    document.getElementById("jml_fix<?php echo $row->dtk2_id; ?>").innerHTML = tot;
                                                    document.getElementById("Xjml_fix<?php echo $row->dtk2_id; ?>").innerHTML = 'Rp.'+tot.format(0,3,'.');
                                                    document.getElementById("lbl_dtk2_hargasatuan_fix<?php echo $row->dtk2_id; ?>").innerHTML = 'Rp.'+fixHarga.format(0,3,'.');
                                                }else{
                                                    document.getElementById("jml_fix<?php echo $row->dtk2_id; ?>").innerHTML = "Input tidak Valid";
                                                    document.getElementById("Xjml_fix<?php echo $row->dtk2_id; ?>").innerHTML = 'Rp.-';
                                                    document.getElementById("lbl_dtk2_hargasatuan_fix<?php echo $row->dtk2_id; ?>").innerHTML = 'Rp.-';
                                                }
                                                
                                            }
                                            Number.prototype.format = function(n, x, s, c) {
                                                var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
                                                    num = this.toFixed(Math.max(0, ~~n));

                                                return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
                                            };
                                            cekHrg<?php echo $row->dtk2_id; ?>();
                                            $('#dtk2_hargasatuan_fix<?php echo $row->dtk2_id; ?>').bind('input', cekHrg<?php echo $row->dtk2_id; ?>);

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
                    <input type="text" class="form-control" id="x_pgd_jml_sblm_ppn_pnr"  value='<?php echo 'Rp.'.number_format($pgd_jml_sblm_ppn_pnr,0,",","."); ?>' readonly>
                    <input type="hidden" class="form-control" id="pgd_jml_sblm_ppn_pnr" name="pgd_jml_sblm_ppn_pnr" value='<?php echo $pgd_jml_sblm_ppn_pnr?>' readonly>
                    </div> 
                    <div class ='col-sm-3 pull-right'>
                    <label id = "total_label" class="control-label text-center pull-right"><?php if ($pgd_dgn_pajak == 0){ echo "Total Penawaran(ppn 10%) : &nbsp;"; }else{echo "";} ?></label>
                    <input type="<?php if ($pgd_dgn_pajak == 0){ echo "text"; }else{echo "hidden";} ?>" class="form-control" id="x_pgd_jml_ssdh_ppn_pnr"  value='<?php echo 'Rp.'.number_format($pgd_jml_ssdh_ppn_pnr,0,",","."); ?>' readonly>
                    <input type="hidden" class="form-control" id="pgd_jml_ssdh_ppn_pnr" name="pgd_jml_ssdh_ppn_pnr" value='<?php echo $pgd_jml_ssdh_ppn_pnr?>' readonly>
                    </div> 
                </div> 
                <div class="row"> 
                    <div class ='col-sm-3 pull-right'> 
                    <label id = "total_label" class="control-label text-center pull-right">Total Hrg Nego: &nbsp;</label>
                    <input type="text" class="form-control" id="x_pgd_jml_sblm_ppn_fix"  value='0' readonly>
                    <input type="hidden" class="form-control" id="pgd_jml_sblm_ppn_fix" name="pgd_jml_sblm_ppn_fix" value='0' readonly>
                    </div> 
                    <div class ='col-sm-3 pull-right'>
                    <label id = "total_label" class="control-label text-center pull-right"><?php if ($pgd_dgn_pajak == 0){ echo "Total Hrg Nego(ppn 10%) : &nbsp;"; }else{echo "";} ?></label>
                    <input type="<?php if ($pgd_dgn_pajak == 0){ echo "text"; }else{echo "hidden";} ?>" class="form-control" id="x_pgd_jml_ssdh_ppn_fix"  value='0' readonly>
                    <input type="hidden" class="form-control" id="pgd_jml_ssdh_ppn_fix" name="pgd_jml_ssdh_ppn_fix" value='0' readonly>
                    </div> 
                </div> 
               <input type="hidden" class="form-control" id="pgd_id" name ="pgd_id" value="<?php echo $pgd_id ?>"> 
               <input type="hidden" class="form-control" id="pgd_tipe_pengadaan" name ="pgd_tipe_pengadaan" value="<?php echo $pgd_tipe_pengadaan ?>"> 
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
function submitFormFix() {
    //alert("Syarat Penyedia atau Harga Penawaran tidak sesuai dengan Pengadaan yang diminta");
    var statusPekerjaan = 0;
    var TableData = new Array();

    $('#table-pekerjaan tr').each(function(row, tr){
        TableData[row]={
            "jumlah" : $(tr).find('td:eq(10)').text()
        }    
    }); 
    TableData.shift();  // first row will be empty - so remove
    var totSemuaFix = 0;
    TableData.forEach( function (arrayItem)
    {
        var nilai = parseFloat(arrayItem.jumlah);
        if(!isNaN(nilai)){
            totSemuaFix = totSemuaFix + nilai;
            //alert(nilai);
        }
        
    });
    //totSemuaPnr = parseFloat(totSemuaPnr).toFixed(2);
    var totSemuaPnr = parseFloat(document.getElementById('pgd_jml_sblm_ppn_pnr').value);
    //alert("totSemuapnr="+totSemuaPnr+" totSemuaFix="+totSemuaFix);
    if(!isNaN(totSemuaFix) && totSemuaFix>totSemuaPnr){
        statusPekerjaan = 1;
    }
    //alert("statusSyarat="+statusSyarat+" statusPekerjaan="+statusPekerjaan);
    if(statusPekerjaan===1){
        alert("Total Harga Negoisasi lebih besar dari Total Harga Penawaran");
        return false;
    }else{
        return true;
    }
    //$(this).preventDefault();
}

var myVar = setInterval(myTimer, 3000);

function myTimer() {
    var TableData = new Array();

    $('#table-pekerjaan tr').each(function(row, tr){
        TableData[row]={
            "jumlah" : $(tr).find('td:eq(10)').text()
        }    
    }); 
    TableData.shift();  // first row will be empty - so remove
    var totSemuaFix = 0;
    TableData.forEach( function (arrayItem)
    {
        var nilai = parseFloat(arrayItem.jumlah);
        if(!isNaN(nilai)){
            totSemuaFix = totSemuaFix + nilai;
            //alert(nilai);
        }
        
    });
    //totSemuaPnr = parseFloat(totSemuaPnr).toFixed(2);                                       
    if(!isNaN(totSemuaFix)){
        document.getElementById("pgd_jml_sblm_ppn_fix").value = parseFloat(totSemuaFix).toFixed(2);
        document.getElementById("pgd_jml_ssdh_ppn_fix").value = parseFloat(totSemuaFix+(totSemuaFix*0.1)).toFixed(2);
        document.getElementById("x_pgd_jml_sblm_ppn_fix").value = 'Rp. '+(parseFloat(totSemuaFix)).format(0,3,'.');
        document.getElementById("x_pgd_jml_ssdh_ppn_fix").value = 'Rp. '+(parseFloat(totSemuaFix+(totSemuaFix*0.1))).format(0,3,'.');
        //alert(document.getElementById("x_pgd_jml_sblm_ppn_fix").value);
    }else{
        document.getElementById("pgd_jml_sblm_ppn_fix").value = "Input tidak Valid";
        document.getElementById("pgd_jml_ssdh_ppn_fix").value = "Input tidak Valid";
        document.getElementById("x_pgd_jml_sblm_ppn_fix").value = "Input tidak Valid";
        document.getElementById("x_pgd_jml_ssdh_ppn_fix").value = "Input tidak Valid";
    }
}

$(document).ready(function() {
	//$(':checkbox').checkboxpicker();
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