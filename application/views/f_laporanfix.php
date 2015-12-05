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
                        <div class="col-sm-9">
   
	                        <input type="text" class="form-control" id="no_BA_klarifikasi" name="no_BA_klarifikasi" placeholder="Nomor Surat Berita Acara Klarifikasi dan Negoisasi Harga" required>
                            
                            <div class="help-block with-errors"></div>
                            
                        </div>
                    </div>     
                 <div class="form-group">
                        <label for="" class="col-sm-3 control-label text-left">Nomor Keputusan Kuasa Pengguna Anggaran</label>
                        <div class="col-sm-5">
	                        <input type="text" class="form-control" id="no_kepkuas" name="no_kepkuas" placeholder="Nomor Surat Keputusan Kuasa Pengguna Anggaran" required>                            
                            <div class="help-block with-errors"></div>
                        </div>
                       <div class="col-sm-4">
                            <input type="text" class="form-control tgl1" id="tglkepkuas" name="tglkepkuas" placeholder="Tanggal Surat Keputusan Kuasa Pengguna Anggaran" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" required>                                   
                       </div>
                    </div> 
                 <div class="form-group">
                        <label for="" class="col-sm-3 control-label text-left">Nomor Surat Penawaran</label>
                        <div class="col-sm-5">
	                        <input type="text" class="form-control" id="no_sp" name="no_sp" placeholder="Nomor Surat Penawaran" required>                            
                            <div class="help-block with-errors"></div>
                        </div>
                       <div class="col-sm-4">
                            <input type="text" class="form-control tgl1" id="tglsp" name="tglsp" placeholder="Tanggal Surat Penawaran" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" required>                                   
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
             
                  <div class="col-md-12 "><hr>
                <form id="f0" method="post" action="<?php echo base_url()."laporan/cetakBAHasilPenetapanPengumuman"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" target="_blank">
                  <div class="col-md-10">                 
                    <div class="form-group">
                        <label for="dftrhadir" class="control-label text-left">Berita Acara Hasil Pengadaan, Penetapan Barang dan Jasa, Pengumuman Penyedia Barang dan Jasa   </label>
                    </div>
                  
                   <div class="form-group">
                        <label for="" class="col-sm-3 control-label text-left">Nomor Berita Acara Hasil Pengadaan</label>
                        <div class="col-sm-9">
   
	                        <input type="text" class="form-control" id="no_BA_hasil" name="no_BA_hasil" placeholder="Nomor Surat Berita Acara Hasil Pengadaan" required>
                            
                            <div class="help-block with-errors"></div>
                            
                        </div>
                    </div>     
                 <div class="form-group">
                        <label for="" class="col-sm-3 control-label text-left">Nomor Surat Penetapan Barang dan Jasa</label>
                        <div class="col-sm-9">
   
	                        <input type="text" class="form-control" id="no_penetapan" name="no_penetapan" placeholder="Nomor Surat Penetapan Barang dan Jasa" required>
                            
                            <div class="help-block with-errors"></div>
                            
                        </div>
                    </div> 
                <div class="form-group">
                        <label for="" class="col-sm-3 control-label text-left">Nomor Pengumuman Penyedia Barang dan Jasa</label>
                        <div class="col-sm-9">
   
	                        <input type="text" class="form-control" id="no_peng" name="no_peng" placeholder="Nomor Surat Pengumuman Penyedia Barang dan Jasa" required>
                            
                            <div class="help-block with-errors"></div>
                            
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