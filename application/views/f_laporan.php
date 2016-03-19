<?php
    //$role = $this->session->userdata('id_role');
		$kepada = "";
		$dari = "";
		$tanggal = "";
                $no_mem2="";
                $tglmem2="";
                $no_mem3="";
                $tglmem3="";
                $tgl=""; //tgl hps
                $tgldkh="";
                $tglspektek="";
                $no_undangan="";
                $tgludg="";
                $lampiran="";
                
     if($mode1 == 'edit'){	
		$kepada = $kontensuratdari->dknt_isi;
		$dari = $kontensuratkepada->dknt_isi;
		$tanggal = $kontensurattanggal->dknt_isi;
                }
      if($mode2 == 'edit'){	
                $no_mem2=$kontensuratnomem2->dknt_isi;
                $tglmem2=$kontensurattglmem2->dknt_isi;
                }
       if($mode3 == 'edit'){	
                $no_mem3=$kontensuratnomem3->dknt_isi;
                $tglmem3=$kontensurattglmem3->dknt_isi;
                }
      if($mode4 == 'edit'){	
                $tgl=$kontensurattglhps->dknt_isi;
                }     
      if($mode5 == 'edit'){	
                $tgldkh=$kontensurattgldkh->dknt_isi;
                }      
      if($mode6 == 'edit'){	
                $tglspektek=$kontensurattglspektek->dknt_isi;
                }    
      if($mode7 == 'edit'){	
                $no_undangan=$kontensuratnoudg->dknt_isi;
                $tgludg=$kontensurattgludg->dknt_isi;
                $lampiran=$kontensuratLudg->dknt_isi;
                } 
    if($d->pgd_tipe_pengadaan==2) {   
        $tglpp="";        
        if($mode8 == 'edit'){	
                $tglpp=$kontensurattglpp->dknt_isi;
                }            
    }	
?>

<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">
                <form id="f0" method="post" action="<?php echo base_url()."laporan/cetakmemorandum1"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" target="_blank">
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
        
                                    <option value="<?php echo $row->pgw_id; ?>"<?php if($row->pgw_id == $kepada){echo "selected";}?> ><?php echo $row->jbt_nama." (".$row->pgw_nama.")";?></option>
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
                                    <option value="<?php echo $row->pgw_id; ?>"<?php if($row->pgw_id == $dari){echo "selected";}?>><?php echo $row->jbt_nama." (".$row->pgw_nama.")"; ?></option>
                                  
                                        <?php } ?>
                                    
                                </select>
                        </div>    
                    </div>

                </div>
                <div class="col-md-4"><hr>
                    <div class="form-group">
                       <div class="col-sm-2">
                       <label for="tanggal" class="control-label">Tanggal</label>
                       </div>
                       <div class="col-sm-10">
                           <div class="col-sm-7">
                               <input type="text" class="form-control tgl1" id="tanggal" name="tanggal" placeholder="Tanggal" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" value="<?php echo $tanggal ?>" required>                                   
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
                <form id="f2" method="post" action="<?php echo base_url()."laporan/cetakmemorandum2"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" target="_blank">
                  <div class="col-md-8">                 
                    <div class="form-group">
                        <label for="mem2" class="control-label text-left">Memorandum II (Kepada PPK)</label>
                    </div>
                     <div class="form-group">
                       <label for="" class="col-sm-5 control-label text-left">Nomor Memorandum II</label>
                        <div class="col-sm-7">
                        	
                            <input type="text" class="form-control" id="no_mem2" name="no_mem2" placeholder="Nomor Surat Memorandum II (PPK)" value="<?php echo $no_mem2;?>" required>
                            
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
                               <input type="text" class="form-control tgl1" id="tglmem2" name="tglmem2" placeholder="tanggal" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" value="<?php echo $tglmem2;?>" required>                                   
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
                
 <div class="col-md-12 "><hr>
                <form id="f2" method="post" action="<?php echo base_url()."laporan/cetakmemorandum3"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" target="_blank">
                  <div class="col-md-8">                 
                    <div class="form-group">
                        <label for="mem2" class="control-label text-left">Memorandum III (Kepada Pejabat Pengadaan)</label>
                    </div>
                     <div class="form-group">
                       <label for="" class="col-sm-5 control-label text-left">Nomor Memorandum III</label>
                        <div class="col-sm-7">
                        	
	                        <input type="text" class="form-control" id="no_mem3" name="no_mem3" placeholder="Nomor Surat Memorandum III (Pejabat Pengadaan)" value="<?php echo $no_mem3;?>"  required>
                            
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
                            <input type="text" class="form-control tgl1" id="tglmem3" name="tglmem3" placeholder="Tanggal" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" value="<?php echo $tglmem3;?>" required>                                   
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
            
      <div class="col-md-12 "><hr>
                <form id="f2" method="post" action="<?php echo base_url()."laporan/cetakhps"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" target="_blank">
                  <div class="col-md-8">                 
                    <div class="form-group">
                        <label for="mem2" class="control-label text-left">Harga Perkiraan Sementara (HPS)</label>
                    </div>
                   <div class="form-group">
                      <label for="" class="col-sm-5 control-label text-left">Tanggal</label>
                       <div class="col-sm-7"> 
                            <input type="text" class="form-control tgl1" id="tgl" name="tgl" placeholder="Tanggal Surat Harga Perkiraan Sementara" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" value="<?php echo $tgl;?>"  required>                                   
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
             
              <div class="col-md-12 "><hr>    
                <form id="f3" method="post" action="<?php echo base_url()."laporan/cetak_dftr_harga"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" target="_blank">
                  <div class="col-md-8">                 
                    <div class="form-group">
                        <label for="" class="control-label text-left">Daftar Kuantitas dan Harga</label>
                    </div>
                      <div class="form-group">
                      <label for="" class="col-sm-5 control-label text-left">Tanggal</label>
                       <div class="col-sm-7"> 
                            <input type="text" class="form-control tgl1" id="tgldkh" name="tgldkh" placeholder="Tanggal Surat Daftar Kuantitas dan Harga" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" value="<?php echo $tgldkh;?>" required>                                   
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
                
              <div class="col-md-12 "><hr>    
                 <form id="f4" method="post" action="<?php echo base_url()."laporan/cetakspektek"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" target="_blank">
                  <div class="col-md-8">                 
                    <div class="form-group">
                        <label for="mem2" class="control-label text-left">Spesifikasi Teknis</label>
                    </div>
                      <div class="form-group">
                      <label for="" class="col-sm-5 control-label text-left">Tanggal</label>
                       <div class="col-sm-7"> 
                            <input type="text" class="form-control tgl1" id="tglspektek" name="tglspektek" placeholder="Tanggal Surat Spesifikasi Teknis" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" value="<?php echo $tglspektek;?>" required>                                   
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
                
          <div class="col-md-12 "><hr>        
                 <form id="f5" method="post" action="<?php echo base_url()."laporan/cetakldp"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" target="_blank">
                  <div class="col-md-8">                 
                    <div class="form-group">
                        <label for="mem2" class="control-label text-left"><?php if($d->pgd_tipe_pengadaan==2){echo "Lembar Data Pemilihan (LDP)";}else {echo "Lembar Data Pengadaan (LDP)";} ?></label>
                    </div>
                     <input type="hidden" name="idpengadaan" value="<?php echo $idpengadaan; ?>">
                     <?php if($d->pgd_tipe_pengadaan==2) {?>
                    <div class="form-group">
                      <label for="" class="col-sm-5 control-label text-left">Tanggal penerimaan penawaran</label>
                       <div class="col-sm-7"> 
                            <input type="text" class="form-control tgl" id="tglpp" name="tglpp" placeholder="Tanggal penerimaan penawaran"  value="<?php echo $tglpp;?>" required>                                   
                       </div>
                    </div> 
                     <?php } ?>           
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
               <form id="f6" method="post" action="<?php echo base_url()."laporan/cetakundangan"; ?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" target="_blank">
                  <div class="col-md-8">                 
                    <div class="form-group">
                        <h4>Undangan</h4>
                    </div>
                     <input type="hidden" name="idpengadaan" value="<?php echo $idpengadaan; ?>">
                    <div class="form-group">
                      <label for="" class="col-sm-5 control-label text-left">Tanggal</label>
                       <div class="col-sm-7"> 
                            <input type="text" class="form-control tgl1" id="tgludg" name="tgludg" placeholder="Tanggal Surat Undangan" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" value="<?php echo $tgludg;?>" required>                                   
                       </div>
                    </div> 
                   
                     <div class="form-group">
                        <label for="" class="col-sm-5 control-label text-left">Nomor</label>
                        <div class="col-sm-7">
	                        <input type="text" class="form-control" id="no_undangan" name="no_undangan" placeholder="Nomor Surat Undangan" value="<?php echo $no_undangan;?>" required>                          
                           
                        </div>
                    </div> 
                       <div class="form-group">
                                    <label for="" class="col-sm-5 control-label text-left">Lampiran</label>
                                    <div class="col-sm-7">
                                        <input required type="text" pattern='[0-9]*' class="form-control" id="lampiran" name="lampiran" placeholder="Berkas" data-error="Input yang dimasukkan harus angka dan tidak boleh kosong" value="<?php echo $lampiran;?>">
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