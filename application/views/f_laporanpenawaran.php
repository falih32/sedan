<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">
                
      <div class="col-md-12 "><hr>
                <form id="f0" method="post" action="<?php echo base_url()."laporan/cetakBAPemasukkan"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" target="_blank">
                  <div class="col-md-8">                 
                    <div class="form-group">
                        <label for="dftrhadir" class="control-label text-left">Berita Acara Pemasukan dan Pembukaan Dokumen</label>
                    </div>
                  
                   <div class="form-group">
                        <label for="" class="col-sm-3 control-label text-left">Nomor</label>
                        <div class="col-sm-9">
   
	                        <input type="text" class="form-control" id="no_BA_pemasukkan" name="no_BA_pemasukkan" placeholder="Nomor Surat Berita Acara Pemasukkan dan Pembukaaan Dokumen Penawaran" required>
                            
                            <div class="help-block with-errors"></div>
                            
                        </div>
                    </div>     
                 
                  <div class="form-group">
                   <label for="" class="col-sm-3 control-label text-left">Perwakilan</label>
                   
                    <div class="col-sm-9">
                     
                                <select class="nama_perwakilan form-control" id="nama_perwakilan" name="nama_perwakilan" required>
                                    <option value="">Select ...</option>
                                    <?php foreach ($pwklist as $pwk) {?>
                                    <option value="<?php echo $pwk->pws_nama; ?>"><?php echo $pwk->pws_nama ; ?></option>
                                  
                                        <?php } ?>
                                    
                                </select>
                        </div>    
                    </div>
                      
               <div class="form-group">
                   <label for="" class="col-sm-3 control-label text-left">Nomor Undangan</label>
                   
                    <div class="col-sm-9">
                     
                                <select class="nama_perwakilan form-control" id="no_undangan" name="no_undangan" required>
                                    <option value="">Select ...</option>
                                    <?php foreach ($no_udanganlist as $nound) {?>
                                    <option value="<?php echo $nound->dknt_isi; ?>"><?php echo $nound->dknt_isi; ?></option>
                                     <?php } ?>
                                </select>
                      
                   
                      
                     <input type="hidden" name="idpengadaan" value="<?php echo $idpengadaan; ?>">
                  
                  
                  </div>
                  <div class="col-md-4">
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
             
              <div class="col-md-12 "><hr>    
                <form id="f3" method="post" action="<?php echo base_url()."laporan/cetak_dftr_harga"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                  <div class="col-md-8">                 
                    <div class="form-group">
                        <label for="" class="control-label text-left">Daftar Kuantitas dan Harga</label>
                    </div>
                     <input type="hidden" name="idpengadaan" value="<?php echo $idpengadaan; ?>">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label text-left">Nomor</label>
                        <div class="col-sm-7">
   
	                        <input type="text" class="form-control" id="no_dftrh" name="no_dftrh" placeholder="Nomor Surat Daftar Kuantitas dan Harga" required>
                            
                            <div class="help-block with-errors"></div>
                            
                        </div>
                    </div>
                  
                  </div>
                  <div class="col-md-4">
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
                
              <div class="col-md-12 "><hr>    
                 <form id="f4" method="post" action="<?php echo base_url()."laporan/cetakspektek"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                  <div class="col-md-8">                 
                    <div class="form-group">
                        <label for="mem2" class="control-label text-left">Spesifikasi Teknis</label>
                    </div>
                     <input type="hidden" name="idpengadaan" value="<?php echo $idpengadaan; ?>">
                  </div>
                  <div class="col-md-4">
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
                
          <div class="col-md-12 "><hr>        
                 <form id="f5" method="post" action="<?php echo base_url()."laporan/cetakldp"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                  <div class="col-md-8">                 
                    <div class="form-group">
                        <label for="mem2" class="control-label text-left">Lembar Data Pengadaan (LDP)</label>
                    </div>
                     <input type="hidden" name="idpengadaan" value="<?php echo $idpengadaan; ?>">
                  </div>
                  <div class="col-md-4">
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
            
                <div class="col-md-12 "><hr>
               <form id="f6" method="post" action="<?php echo base_url()."laporan/cetakundangan"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                  <div class="col-md-8">                 
                    <div class="form-group">
                        <h4>Undangan</h4>
                    </div>
                     <input type="hidden" name="idpengadaan" value="<?php echo $idpengadaan; ?>">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label text-left">Nomor</label>
                        <div class="col-sm-7">
	                        <input type="text" class="form-control" id="no_undangan" name="no_undangan" placeholder="Nomor Surat Undangan" required>                          
                           
                        </div>
                    </div> 
                  <div class="form-group">
                        <label for="" class="col-sm-5 control-label text-left">Pembukaan Dokumen Penawaran</label>
               
                           <div class="col-sm-7">
                            <input type="text" class="form-control tgl" id="p_dok_penawaran" name="p_dok_penawaran" placeholder="Jadwal Pembukaan Dokumen Penawaran" required>                                   
                           </div>
                
                    </div>       
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label text-left">Klarifikasi Teknis dan Negoisasi Harga</label>
                       
                           <div class="col-sm-7">
                            <input type="text" class="form-control tgl" id="klarifikasi" name="klarifikasi" placeholder="Jadwal Klarifikasi Teknis dan Negoisasi Harga" required>                                   
                           </div>
                       
                    </div> 
                    <div class="form-group">
                      <label for="" class="col-sm-5 control-label text-left">Penandatanganan SPK</label>
                       <div class="col-sm-7"> 
                            <input type="text" class="form-control tgl1" id="penandatanganan" name="penandatanganan" placeholder="Jadwal Penandatanganan SPK" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" required>                                   
                       </div>
                    </div> 
                
                     
                                
                  </div>
                  <div class="col-md-4">
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
    $(".darimemo1").select2();
});
</script>