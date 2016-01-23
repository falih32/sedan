<?php
                $nospk = "";
		$tglspk = "";
		$nospmk= "";
                $tglspmk=""; 
                $tglawal="";
                $tglakhir="";
                $dipa_nomor="";
                $pgd_tipe_pengadaan = $dataPengadaan->pgd_tipe_pengadaan; 
     if($mode1 == 'edit'){	
		$nospk = $kontensuratnoSPK->dknt_isi;
		$tglspk = $kontensurattglSPK->dknt_isi;
                $tglawal = $kontensurattglawal->dknt_isi;
                $tglakhir = $kontensurattglakhir->dknt_isi;
                $dipa_nomor=$kontendipa->dknt_isi;
                }
      if($mode2 == 'edit'){	
                $nospmk=$kontensuratnoSPMK->dknt_isi;
                $tglspmk=$kontensurattglSPMK->dknt_isi;
                }
?>                
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">
                
<!--SPK-->

<div class="col-md-12 "><hr>
                <form id="f2" method="post" action="<?php echo base_url()."laporan/cetakSPK"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" target="_blank">
                  <div class="col-md-8">                 
                    <div class="form-group">
                        <label for="mem2" class="control-label text-left">Surat Perintah Kerja</label>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label text-left">Nomor</label>
                        <div class="col-sm-9">
   
	                        <input type="text" class="form-control" id="nospk" name="nospk" placeholder="Nomor Surat Perintah Kerja" value="<?php echo $nospk; ?>" required>
                            
                            <div class="help-block with-errors"></div>
                            
                        </div>
                    </div>        
                    <div class="form-group">
                        <label for="" class="col-sm-10 control-label text-left">Waktu Pelaksanaan Pekerjaan <?php echo $d->pgd_lama_pekerjaan?> hari</label>
                    </div>
                  <div class="form-group">
                       <label for="tanggal" class="col-sm-3 control-label text-left">Dari</label>
                           <div class="col-sm-3">
                               <input type="text" class="form-control tgl1" id="tglawal" name="tglawal" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" value="<?php echo $tglawal;?>" required>                                   
                           </div>
                       
                       <label for="tanggal" class="col-sm-2 control-label text-left">s.d</label>
   
                           <div class="col-sm-3">
                               <input type="text" class="form-control tgl1" id="tglakhir" name="tglakhir" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" value="<?php echo $tglakhir;?>" required>                                   
                           </div>
                      
                    </div>
                      
                   <div class="form-group">
                        <label for="dipa" class="col-sm-3 control-label text-left">Dipa</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="dipa_nomor" name="dipa_nomor">
                            	<?php foreach ($dipalist as $row) {?>
                            	<option value="<?php echo $row->dipa_nomor; ?>" <?php if($row->dipa_nomor == $dipa_nomor){echo "selected";}?>><?php echo $row->dipa_nomor; ?></option>
                                <?php } ?>
                            </select>
                            
                        </div>
                    </div>   
                  
                     <input type="hidden" name="idpengadaan" value="<?php echo $idpengadaan; ?>">
                  </div>
                <div class="col-md-4"><hr>
                    <div class="form-group">
                       <div class="col-sm-2">
                       <label for="tanggal" class="control-label">Tanggal</label>
                       </div>
                       <div class="col-sm-10">
                           <div class="col-sm-7">
                               <input type="text" class="form-control tgl1" id="tglspk" name="tglspk" placeholder="tanggal" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" value="<?php echo $tglspk;?>" required>                                   
                           </div>
                       </div>
                    </div>

                    <div class="form-group">
                       <div class="col-sm-2">
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="submit" class="btn btn-lg btn-success confirm" data-confirm ="halo "><span class="glyphicon glyphicon-floppy-disk"  aria-hidden="true"></span> Cetak</button>
                        </div>
                        </div>
                    </div>
                </div>  
                </form> 
            </div>   

<!--SPMK-->
 <div class="col-md-12 "><hr>
                <form id="f2" method="post" action="<?php echo base_url()."laporan/cetakSPMK"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" target="_blank">
                  <div class="col-md-8">                 
                    <div class="form-group">
                        <label for="" class="control-label text-left">Surat Perintah Mulai Kerja</label>
                    </div>
                   <div class="form-group">
                        <label for="" class="col-sm-3 control-label text-left">Nomor</label>
                        <div class="col-sm-9">
   
	                        <input type="text" class="form-control" id="nospmk" name="nospmk" placeholder="Nomor Surat Perintah Mulai Kerja" value="<?php echo $nospmk; ?>" required>
                            
                            <div class="help-block with-errors"></div>
                            
                        </div>
                    </div>    
                     <input type="hidden" name="idpengadaan" value="<?php echo $idpengadaan; ?>">
                  </div>
                <div class="col-md-4"><hr>
                    <div class="form-group">
                       <div class="col-sm-2">
                       <label for="tanggal" class="control-label">Tanggal</label>
                       </div>
                       <div class="col-sm-10">
                           <div class="col-sm-7">
                               <input type="text" class="form-control tgl1" id="tglspmk" name="tglspmk" placeholder="tanggal" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" value="<?php echo $tglspmk;?>" required>                                   
                           </div>
                       </div>
                    </div>
                    <div class="form-group">
                       <div class="col-sm-2">
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="submit" class="btn btn-lg btn-success confirm" data-confirm ="halo "><span class="glyphicon glyphicon-floppy-disk"  aria-hidden="true"></span> Cetak</button>
                        </div>
                        </div>
                    </div>
                </div>  
                </form> 
            </div>   

                <form id = "penawaran_form"  action = "<?php echo base_url()."Pengadaan/proses_add_spk";?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                     <div class="col-md-12 text-center"><hr>
                    <input type="hidden" class="form-control" id="pgd_id" name ="pgd_id" value="<?php echo $idpengadaan; ?>">     
                    <input type="hidden" class="form-control" id="pgd_tipe_pengadaan" name ="pgd_tipe_pengadaan" value="<?php echo $pgd_tipe_pengadaan; ?>">
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="...">
                            <a class="btn btn-lg btn-danger" href="javascript:history.back()"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Kembali</a>
                            <button type="submit" class="btn btn-lg btn-success" id="btnPengadaan"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<script type="text/javascript">
 
     
$(document).ready(function() {
    $(".darimemo1").select2();
});
</script>