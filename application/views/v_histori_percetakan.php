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
                        <tr>
                        	<th>Cetak Ulang</th>
                        	<td><form id = "anggaran_form" method="post" action="<?php echo site_url('Latihan/cetakUlang/'.$histori_surat[$i]->dsrt_id);?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                              
                                        <button type="submit" class="btn btn-primary" >Cetak Ulang</button>
                                    </form>
                                </td>
                        </tr>
                        <?php $i=$j?>
                    </tbody>
                </table>
                <?php }?>
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