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
                $pgd_status_pengadaan = $dataPengadaan->pgd_status_pengadaan;
                $totalArray = count($histori_surat);
                $i = 0;

?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3>Histori Percetakan Pengadaan 
                </h3>
            </div>
            <div class="panel-body">
            	<table class="table table-striped table-bordered table-hover" width="50%">
                    <tbody>
                    	<tr>
                        	<th>Perihal</th>
                        	<td><?php echo $pgd_perihal; ?></td>
                        </tr>
                    </tbody>
                </table>
                <?php while ($i < $totalArray) {?>
                <table class="table table-striped table-bordered table-hover" width="50%">
                    <col width="50%">
                    <col width="50%">
                    <tbody>
                        <?php $j=$i;
                                $status = 'true';
                                ?>
                        <?php if($histori_surat[$i]->srt_id == $histori_surat[$j]->srt_id){?>
                            <tr>
                                    <th>Nama Surat/Laporan</th>
                                    <td><?php echo $histori_surat[$j]->srt_nama; ?></td>
                            </tr>
                            <?php while($status == 'true' && $histori_surat[$i]->srt_id == $histori_surat[$j]->srt_id ){?>
                            <tr>
                                    <th><?php echo $histori_surat[$j]->knt_nama; ?></th>
                                    <td><?php echo $histori_surat[$j]->dknt_isi; ?></td>
                            </tr>
                            
                            <?php if($j<$totalArray-1){$j=$j+1;} else {$status = 'false';}?>           
                            <?php }?>
                        <?php }?>
                        <?php if($status == 'false'){ $j=$j+1; }?>
                        
                        <?php $i=$j?>
                    </tbody>
                </table>
                <?php }?>
                <div class="col-md-12 text-center"><hr>
                    <?php
                    switch ($pgd_status_pengadaan) {
                    case "0":
                        echo '<a title="Cetak Laporan Setelah HPS" class="btn btn-lg btn-primary" href="'.site_url("Laporan/cetaklaporan/").'/'.$pgd_id.'"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Printer HPS</a>';
                        break;
                    case "1":
                        echo '<a title="Cetak Laporan Setelah HPS" class="btn btn-lg btn-primary" href="'.site_url("Laporan/cetaklaporan/").'/'.$pgd_id.'"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Printer HPS</a>';
                        echo '<a title="Cetak Laporan Setelah Penawaran" class="btn btn-lg btn-success" href="'.site_url("Laporan/LaporanPenawaran/").'/'.$pgd_id.'"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Printer Penawaran</a>';
                        break;
                    case "2":
                        echo '<a title="Cetak Laporan Setelah HPS" class="btn btn-lg btn-primary" href="'.site_url("Laporan/cetaklaporan/").'/'.$pgd_id.'"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Printer HPS</a>';
                        echo '<a title="Cetak Laporan Setelah Penawaran" class="btn btn-lg btn-success" href="'.site_url("Laporan/LaporanPenawaran/").'/'.$pgd_id.'"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Printer Penawaran</a>';
                        echo '<a title="Cetak Laporan Setelah Negoisasi" class="btn btn-lg btn-info" href="'.site_url("Laporan/LaporanFix/").'/'.$pgd_id.'"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Printer Negoisasi</a>';
                        break;
                    case "3":
                        echo '<a title="Cetak Laporan Setelah HPS" class="btn btn-lg btn-primary" href="'.site_url("Laporan/cetaklaporan/").'/'.$pgd_id.'"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Printer HPS</a>';
                        echo '<a title="Cetak Laporan Setelah Penawaran" class="btn btn-lg btn-success" href="'.site_url("Laporan/LaporanPenawaran/").'/'.$pgd_id.'"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Printer Penawaran</a>';
                        echo '<a title="Cetak Laporan Setelah Negoisasi" class="btn btn-lg btn-info" href="'.site_url("Laporan/LaporanFix/").'/'.$pgd_id.'"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Printer Negoisasi</a>';
                        echo '<a title="Cetak Laporan Setelah Pengumuman" class="btn btn-lg btn-warning" href="'.site_url("Laporan/LaporanAkhir/").'/'.$pgd_id.'"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Printer Setelah Pengumuman</a>';
                        break;
                    case "4":
                        echo '<a title="Cetak Laporan Setelah HPS" class="btn btn-lg btn-primary" href="'.site_url("Laporan/cetaklaporan/").'/'.$pgd_id.'"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Printer HPS</a>';
                        echo '<a title="Cetak Laporan Setelah Penawaran" class="btn btn-lg btn-success" href="'.site_url("Laporan/LaporanPenawaran/").'/'.$pgd_id.'"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Printer Penawaran</a>';
                        echo '<a title="Cetak Laporan Setelah Negoisasi" class="btn btn-lg btn-info" href="'.site_url("Laporan/LaporanFix/").'/'.$pgd_id.'"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Printer Negoisasi</a>';
                        echo '<a title="Cetak Laporan Setelah Pengumuman" class="btn btn-lg btn-warning" href="'.site_url("Laporan/LaporanAkhir/").'/'.$pgd_id.'"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Printer Pengumuman</a>';
                        break;
                    case "5":
                        echo '<a title="Cetak Laporan Setelah HPS" class="btn btn-lg btn-primary" href="'.site_url("Laporan/cetaklaporan/").'/'.$pgd_id.'"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Printer HPS</a>';
                        echo '<a title="Cetak Laporan Setelah Penawaran" class="btn btn-lg btn-success" href="'.site_url("Laporan/LaporanPenawaran/").'/'.$pgd_id.'"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Printer Penawaran</a>';
                        echo '<a title="Cetak Laporan Setelah Negoisasi" class="btn btn-lg btn-info" href="'.site_url("Laporan/LaporanFix/").'/'.$pgd_id.'"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Printer Negoisasi</a>';
                        echo '<a title="Cetak Laporan Setelah Pengumuman" class="btn btn-lg btn-warning" href="'.site_url("Laporan/LaporanAkhir/").'/'.$pgd_id.'"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Printer Setelah Pengumuman</a>';
                        break;
                    default:
                        

                } ?>
                </div>
                <div class="col-md-12 text-center"><hr>
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="...">
                        	<a class="btn btn-lg btn-danger" href="javascript:history.back()"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Kembali</a>
                                
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