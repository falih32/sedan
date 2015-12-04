<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">
                
      <div class="col-md-12 "><hr>
                <form id="f0" method="post" action="<?php echo base_url()."laporan/cetakBAklarifikasi"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" target="_blank">
                  <div class="col-md-8">                 
                    <div class="form-group">
                        <label for="dftrhadir" class="control-label text-left">Berita Acara Klarifikasi dan Negoisasi Harga</label>
                    </div>
                  
                   <div class="form-group">
                        <label for="" class="col-sm-3 control-label text-left">Nomor</label>
                        <div class="col-sm-9">
   
	                        <input type="text" class="form-control" id="no_BA_klarifikasi" name="no_BA_klarifikasi" placeholder="Nomor Surat Berita Acara Klarifikasi dan Negoisasi Harga" required>
                            
                            <div class="help-block with-errors"></div>
                            
                        </div>
                    </div>     
                 <div class="form-group">
                        <label for="" class="col-sm-3 control-label text-left">Nomor Keputusan Kuasa Pengguna Anggaran</label>
                        <div class="col-sm-9">
   
	                        <input type="text" class="form-control" id="no_BA_evadministrasi" name="no_kepkuas" placeholder="Nomor Surat Keputusan Kuasa Pengguna Anggaran" required>
                            
                            <div class="help-block with-errors"></div>
                            
                        </div>
                    </div> 
                <div class="form-group">
                        <label for="" class="col-sm-3 control-label text-left">Nomor Surat Penawaran</label>
                        <div class="col-sm-9">
   
	                        <input type="text" class="form-control" id="no_BA_evateknis" name="no_BA_evateknis" placeholder="Nomor Surat Berita Acara Evaluasi Teknis" required>
                            
                            <div class="help-block with-errors"></div>
                            
                        </div>
                    </div>         
                      
                  <div class="form-group">
                   <label for="" class="col-sm-3 control-label text-left">Perwakilan Perusahaan</label>
                   
                    <div class="col-sm-9">
                     
                                <select class="nama_perwakilan form-control" id="nama_perwakilan" name="nama_perwakilan" required>
                                    <option value="">Select ...</option>
                                    <?php foreach ($pwklist as $pwk) {?>
                                    <option value="<?php echo $pwk->pws_nama; ?>"><?php echo $pwk->pws_nama ; ?></option>
                                  
                                        <?php } ?>
                                    
                                </select>
                        </div>    
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