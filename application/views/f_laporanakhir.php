<?php
                $nospk = "";
		$tglspk = "";
		$nospmk= "";
                $tglspmk="";                
     if($mode1 == 'edit'){	
		$nospk = $kontensuratnoSPK->dknt_isi;
		$tglspk = $kontensurattglSPK->dknt_isi;
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