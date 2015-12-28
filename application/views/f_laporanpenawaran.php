<?php
    //$role = $this->session->userdata('id_role');
		$no_BA_pemasukkan = "";
		$tglBAP = "";
		$no_BA_evadministrasi = "";
                $tglBAEA="";
                $no_BA_evateknis="";
                $tglBAET="";
                $no_BA_evaharga="";
                $tglBAEH="";
                $no_BA_evakualifikasi="";
                $tglBAEK="";
                
     if($mode1 == 'edit'){	
		$no_BA_pemasukkan = $kontensuratnoBAP->dknt_isi;
		$tglBAP = $kontensurattglBAP->dknt_isi;
                }
      if($mode2 == 'edit'){	
                $no_BA_evadministrasi = $kontensuratnoBAEA->dknt_isi;
                $tglBAEA=$kontensurattglBAEA->dknt_isi;
                }
       if($mode3 == 'edit'){	
               $no_BA_evaharga=$kontensuratnoBAEH->dknt_isi;
                $tglBAEH=$kontensurattglBAEH->dknt_isi;
                }
      if($mode4 == 'edit'){	
                $no_BA_evateknis=$kontensuratnoBAET->dknt_isi;
                $tglBAET=$kontensurattglBAET->dknt_isi;
                }     
      if($mode5 == 'edit'){	
                $no_BA_evakualifikasi=$kontensuratnoBAEK->dknt_isi;
                $tglBAEK=$kontensurattglBAEK->dknt_isi;
                }                  
		
?>




<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">

 <!--BA PEMASUKAN             -->
 <div class="col-md-12 "><hr>
                <form id="f2" method="post" action="<?php echo base_url()."laporan/cetakBAP"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" target="_blank">
                  <div class="col-md-8">                 
                    <div class="form-group">
                        <label for="mem2" class="control-label text-left">Berita Acara Pemasukan dan Pembukaan Dokumen</label>
                    </div>
                   <div class="form-group">
                        <label for="" class="col-sm-3 control-label text-left">Nomor</label>
                        <div class="col-sm-9">
   
	                        <input type="text" class="form-control" id="no_BA_pemasukkan" name="no_BA_pemasukkan" placeholder="Nomor Surat Berita Acara Pemasukkan dan Pembukaaan Dokumen Penawaran" value="<?php echo $no_BA_pemasukkan;?>" required>
                            
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
                               <input type="text" class="form-control tgl1" id="tglBAP" name="tglBAP" placeholder="tanggal" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" value="<?php echo $tglBAP;?>" required>                                   
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



<!--BA EVALUASI ADMINISTRASI-->

<div class="col-md-12 "><hr>
                <form id="f2" method="post" action="<?php echo base_url()."laporan/cetakBAEA"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" target="_blank">
                  <div class="col-md-8">                 
                    <div class="form-group">
                        <label for="mem2" class="control-label text-left">Berita Acara Evaluasi Administrasi</label>
                    </div>
                     <div class="form-group">
                        <label for="" class="col-sm-3 control-label text-left">Nomor</label>
                        <div class="col-sm-9">
   
	                        <input type="text" class="form-control" id="no_BA_evadministrasi" name="no_BA_evadministrasi" placeholder="Nomor Surat Berita Acara Evaluasi Administrasi" value="<?php echo $no_BA_evadministrasi;?>" required>
                            
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
                               <input type="text" class="form-control tgl1" id="tglBAEA" name="tglBAEA" placeholder="tanggal" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" value="<?php echo $tglBAEA;?>" required>                                   
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



<!--BA EVALUASI Teknis-->

<div class="col-md-12 "><hr>
                <form id="f2" method="post" action="<?php echo base_url()."laporan/cetakBAET"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" target="_blank">
                  <div class="col-md-8">                 
                    <div class="form-group">
                        <label for="mem2" class="control-label text-left">Berita Acara Evaluasi Teknis</label>
                    </div>
                <div class="form-group">
                        <label for="" class="col-sm-3 control-label text-left">Nomor Evaluasi Teknis</label>
                        <div class="col-sm-9">
   
	                        <input type="text" class="form-control" id="no_BA_evateknis" name="no_BA_evateknis" placeholder="Nomor Surat Berita Acara Evaluasi Teknis" value="<?php echo $no_BA_evateknis;?>" required>
                            
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
                               <input type="text" class="form-control tgl1" id="tglBAET" name="tglBAET" placeholder="tanggal" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" value="<?php echo $tglBAET;?>" required>                                   
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



<!--BA EVALUASI Harga-->
<div class="col-md-12 "><hr>
                <form id="f2" method="post" action="<?php echo base_url()."laporan/cetakBAEH"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" target="_blank">
                  <div class="col-md-8">                 
                    <div class="form-group">
                        <label for="mem2" class="control-label text-left">Berita Acara Evaluasi Harga</label>
                    </div>
                <div class="form-group">
                        <label for="" class="col-sm-3 control-label text-left">Nomor Evaluasi Harga</label>
                        <div class="col-sm-9">
   
	                        <input type="text" class="form-control" id="no_BA_evaharga" name="no_BA_evaharga" placeholder="Nomor Surat Berita Acara Evaluasi Harga" value="<?php echo $no_BA_evaharga;?>" required>
                            
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
                               <input type="text" class="form-control tgl1" id="tglBAEH" name="tglBAEH" placeholder="tanggal" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" value="<?php echo $tglBAEH;?>" required>                                   
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

<!--BA EVALUASI Kualifikasi-->
<div class="col-md-12 "><hr>
                <form id="f2" method="post" action="<?php echo base_url()."laporan/cetakBAEK"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" target="_blank">
                  <div class="col-md-8">                 
                    <div class="form-group">
                        <label for="mem2" class="control-label text-left">Berita Acara Evaluasi Kualifikasi</label>
                    </div>
                      <div class="form-group">
                        <label for="" class="col-sm-3 control-label text-left">Nomor Evaluasi Kualifikasi</label>
                        <div class="col-sm-9">
   
	                        <input type="text" class="form-control" id="no_BA_evakualifikasi" name="no_BA_evakualifikasi" placeholder="Nomor Surat Berita Acara Evaluasi Kualifikasi" value="<?php echo $no_BA_evakualifikasi;?>" required>
                            
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
                               <input type="text" class="form-control tgl1" id="tglBAEK" name="tglBAEK" placeholder="tanggal" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" value="<?php echo $tglBAEK;?>" required>                                   
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