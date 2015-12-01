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
?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3>Detail Info 
                    <?php
                        switch ($modeView) {
                            case 'pengadaan':
                                  echo "Pengadaan";
                                  break;
                            case 'hps':
                                  echo "Pengadaan (HPS)";
                                  break;
                            case 'penawaran':
                                  echo "penawaran";
                                  break;
                         }
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
                                <?php echo $row->siz_nama; }?></td>
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
                          <th>Harga Satuan(Fix)</th>
                          <th>Total(HPS)</th>
                          <th>Total(Penawaran)</th>
                          <th>Total(Fix)</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php foreach ($pekerjaanList as $row) {?>
                            <tr><td><?php echo $row->dtp_pekerjaan; ?></td>
                            <td><?php echo $row->dtp_volume.' '.$row->dtp_satuan; ?></td>
                            <td><?php echo $row->dtp_hargasatuan_hps; ?></td>
                            <td><?php echo $row->dtp_hargasatuan_pnr; ?></td>
                            <td><?php echo $row->dtp_hargasatuan_fix; ?></td>
                            <td><?php echo $row->dtp_jumlahharga_hps; ?></td>
                            <td><?php echo $row->dtp_jumlahharga_pnr; ?></td>
                            <td><?php echo $row->dtp_jumlahharga_fix; ?></td></tr>
                        <?php } ?>
                    </tbody>
                </table>
                <table class="table table-striped table-bordered table-hover" width="50%">
                    <thead>
                        <tr>
                          <th>Penyusun</th>
                          <th>Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php foreach ($penyusunList as $row) {?>
                            <tr><td><?php echo $row->jbt_nama.' ('.$row->pgw_nama.')'; ?></td>
                            <td><?php if ($row->lsp_jabatan == 0){
                                echo "Ketua";
                            }else{
                                echo "Anggota";
                            }?></td></tr>
                        <?php } ?>
                    </tbody>
                </table>
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