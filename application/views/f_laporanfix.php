<?php
                $no_BA_hasil = "";
		$tglBAH = "";
		$no_penetapan= "";
                $tglSP="";
                $no_peng="";
                $tglSPeng="";
                $no_BA_klarifikasi="";
                $no_kepkuas="";
                $tglkepkuas="";
                $tglBAK="";
                $pgd_tipe_pengadaan = $dataPengadaan->pgd_tipe_pengadaan; 
                
     if($mode1 == 'edit'){	
		$no_BA_hasil = $kontensuratnoBAH->dknt_isi;
		$tglBAH  = $kontensurattglBAH->dknt_isi;
                }
      if($mode2 == 'edit'){	
                $no_penetapan=$kontensuratnoSP->dknt_isi;
                $tglSP=$kontensurattglSP->dknt_isi;
                }
       if($mode3 == 'edit'){	
               $no_peng=$kontensuratnoSPeng->dknt_isi;
                $tglSPeng=$kontensurattglSPeng->dknt_isi;
                }
      if($mode4 == 'edit'){	
          $no_BA_klarifikasi=$kontensuratnoBAK->dknt_isi;
          $no_kepkuas=$kontensuratnoSKP->dknt_isi;
          $tglkepkuas=$kontensurattglSKP->dknt_isi;
          $tglBAK=$kontensurattglBAK->dknt_isi;
      }
?>                
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">
                
      <div class="col-md-12 "><hr>
                <form id="f0" method="post" action="<?php echo base_url()."laporan/cetakBAklarifikasi"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" target="_blank">
                  <div class="col-md-10">                 
                    <div class="form-group">
                        <label for="dftrhadir" class="control-label text-left">Berita Acara Klarifikasi dan Negoisasi Harga</label>
                    </div>
                  
                   <div class="form-group">
                        <label for="" class="col-sm-3 control-label text-left">Nomor</label>
                        <div class="col-sm-5">
   
	                        <input type="text" class="form-control" value="<?php echo $no_BA_klarifikasi; ?>" id="no_BA_klarifikasi" name="no_BA_klarifikasi" placeholder="Nomor Surat Berita Acara Klarifikasi dan Negoisasi Harga" required>
                            
                            <div class="help-block with-errors"></div>
                            
                        </div>
                         <div class="col-sm-4">
                            <input type="text" class="form-control tgl1" value="<?php echo $tglBAK; ?>" id="tglBAK" name="tglBAK" placeholder="Tanggal Surat erita Acara Klarifikasi dan Negoisasi Harga" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" required>                                   
                       </div>
                    </div>     
                 <div class="form-group">
                        <label for="" class="col-sm-3 control-label text-left">Nomor Keputusan Kuasa Pengguna Anggaran</label>
                        <div class="col-sm-5">
	                        <input type="text" class="form-control" value="<?php echo $no_kepkuas; ?>" id="no_kepkuas" name="no_kepkuas" placeholder="Nomor Surat Keputusan Kuasa Pengguna Anggaran" required>                            
                            <div class="help-block with-errors"></div>
                        </div>
                       <div class="col-sm-4">
                            <input type="text" class="form-control tgl1" value="<?php echo $tglkepkuas; ?>" id="tglkepkuas" name="tglkepkuas" placeholder="Tanggal Surat Keputusan Kuasa Pengguna Anggaran" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" required>                                   
                       </div>
                    </div> 
                     <input type="hidden" name="idpengadaan" value="<?php echo $idpengadaan; ?>">
                  
                  
                  </div>
                  <div class="col-md-2">
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

<!--BA Hasil Pengadaan-->

<div class="col-md-12 "><hr>
                <form id="f2" method="post" action="<?php echo base_url()."laporan/cetakBAH"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" target="_blank">
                  <div class="col-md-8">                 
                    <div class="form-group">
                        <label for="mem2" class="control-label text-left">Berita Acara Hasil Pengadaan</label>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label text-left">Nomor</label>
                        <div class="col-sm-9">
   
	                        <input type="text" class="form-control" id="no_BA_hasil" name="no_BA_hasil" placeholder="Nomor Surat Berita Acara Hasil Pengadaan" value="<?php echo $no_BA_hasil; ?>" required>
                            
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
                               <input type="text" class="form-control tgl1" id="tglBAH" name="tglBAH" placeholder="tanggal" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" value="<?php echo $tglBAH;?>" required>                                   
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

<!--BA Surat Penetapan -->
 <div class="col-md-12 "><hr>
                <form id="f2" method="post" action="<?php echo base_url()."laporan/cetakSP"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" target="_blank">
                  <div class="col-md-8">                 
                    <div class="form-group">
                        <label for="" class="control-label text-left">Surat Penetapan Barang dan Jasa</label>
                    </div>
                   <div class="form-group">
                        <label for="" class="col-sm-3 control-label text-left">Nomor</label>
                        <div class="col-sm-9">
   
	                        <input type="text" class="form-control" id="no_penetapan" name="no_penetapan" placeholder="Nomor Surat Penetapan Barang dan Jasa" value="<?php echo $no_penetapan; ?>" required>
                            
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
                               <input type="text" class="form-control tgl1" id="tglSP" name="tglSP" placeholder="tanggal" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" value="<?php echo $tglSP;?>" required>                                   
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

<!--Surat Pengumuman Penyedia Barang dan Jasa-->

<div class="col-md-12 "><hr>
                <form id="f2" method="post" action="<?php echo base_url()."laporan/cetakSPeng"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" target="_blank">
                  <div class="col-md-8">                 
                    <div class="form-group">
                        <label for="mem2" class="control-label text-left">Surat Pengumuman Penyedia Barang dan Jasa</label>
                    </div>
                <div class="form-group">
                        <label for="" class="col-sm-3 control-label text-left">Nomor </label>
                        <div class="col-sm-9">
   
	                        <input type="text" class="form-control" id="no_peng" name="no_peng" placeholder="Nomor Surat Pengumuman Penyedia Barang dan Jasa" value="<?php echo $no_peng; ?>" required>
                            
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
                               <input type="text" class="form-control tgl1" id="tglSPeng" name="tglSPeng" placeholder="tanggal" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" value="<?php echo $tglSPeng;?>" required>                                   
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
                <form id = "penawaran_form"  action = "<?php echo base_url()."Pengadaan/proses_add_pengumuman";?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
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
                </form>
            </div>
        </div>
    </div>
</div> 
<script type="text/javascript">
 
     
$(document).ready(function() {
    $(".darimemo1").select2();
});
</script>