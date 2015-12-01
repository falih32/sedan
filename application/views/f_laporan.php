<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">
                <form id="f0" method="post" action="<?php echo base_url()."laporan/cetakmemorandum1"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                <div class="col-md-8">                 
                    <div class="form-group">
                        <label for="mem2" class="control-label text-left">Memorandum</label>
                    </div>
                     <input type="hidden" name="idpengadaan" value="<?php echo $idpengadaan; ?>">
                              <div class="form-group">
                   <label for="" class="col-sm-5 control-label text-left">Kepada</label>
                    <div class="col-sm-7">
               
                                <select class="darimemo1 form-control" id="kepada" name="kepada" required>
                                    <option value="">Select ...</option>
                                    <?php foreach ($jbtlist as $row) {?>
                                    <option value="<?php echo $row->pgw_id; ?>" ><?php echo $row->jbt_nama." (".$row->pgw_nama.")"; ?></option>
                                    <?php } ?>
                                </select>
                        </div>
                    </div>
                     <div class="form-group">
                   <label for="" class="col-sm-5 control-label text-left">Dari</label>
                   
                    <div class="col-sm-7">
                     
                                <select class="darimemo1 form-control" id="dari" name="dari" required>
                                    <option value="">Select ...</option>
                                    <?php foreach ($jbtlist as $row) {?>
                                    <option value="<?php echo $row->pgw_id; ?>"><?php echo $row->jbt_nama." (".$row->pgw_nama.")"; ?></option>
                                  
                                        <?php } ?>
                                    
                                </select>
                        </div>    
                    </div>
                     
                   <div class="form-group">
                       <label for="" class="col-sm-5 control-label text-left">Nomor Memorandum II</label>
                        <div class="col-sm-7">
                        	
                            <input type="text" class="form-control" id="no_mem2" name="no_mem2" placeholder="Nomor Surat Memorandum II (PPK)" required>
                            
                            <div class="help-block with-errors"></div>
                            
                        </div>
                    </div>
                     <div class="form-group">
                       <label for="" class="col-sm-5 control-label text-left">Nomor Memorandum III</label>
                        <div class="col-sm-7">
                        	
	                        <input type="text" class="form-control" id="no_mem3" name="no_mem3" placeholder="Nomor Surat Memorandum III (Pejabat Pengadaan)" required>
                            
                            <div class="help-block with-errors"></div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4"><hr>
                    <div class="form-group">
                       <div class="col-sm-2">
                       <label for="tanggal" class="control-label">Tanggal</label>
                       </div>
                       <div class="col-sm-10">
                           <div class="col-sm-6">
                            <input type="text" class="form-control tgl" id="tanggal" name="tanggal" placeholder="Tanggal" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" required>                                   
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
         
            
      <div class="col-md-12 "><hr>
                <form id="f2" method="post" action="<?php echo base_url()."laporan/cetakhps"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                  <div class="col-md-8">                 
                    <div class="form-group">
                        <label for="mem2" class="control-label text-left">Harga Perkiraan Sementara (HPS)</label>
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
                            <input type="text" class="form-control tgl" id="p_dok_penawaran" name="p_dok_penawaran" placeholder="Pembukaan Dokumen Penawaran" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" required>                                   
                           </div>
                
                    </div>       
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label text-left">Klarifikasi Teknis dan Negoisasi Harga</label>
                       
                           <div class="col-sm-7">
                            <input type="text" class="form-control tgl" id="klarifikasi" name="klarifikasi" placeholder="Klarifikasi Teknis dan Negoisasi Harga" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" required>                                   
                           </div>
                       
                    </div> 
                    <div class="form-group">
                      <label for="" class="col-sm-5 control-label text-left">Penandatanganan SPK</label>
                       <div class="col-sm-7"> 
                            <input type="text" class="form-control tgl" id="penandatanganan" name="penandatanganan" placeholder="Penandatanganan SPK" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" required>                                   
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