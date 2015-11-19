<?php
    //$role = $this->session->userdata('id_role');
	if($mode == 'edit'){
		
		$pgw_nama = $userlist-> pgw_nama;
		$pgw_nip = $userlist-> pgw_nip;
		$pgw_no_telp = $userlist-> pgw_telp;
                $pgw_jabatan = $userlist->pgw_jabatan;
              
                
			}
	else{
		
		$pgw_nama = "";
		$pgw_nip = "";
		$pgw_no_telp = "";
                $pgw_jabatan = "";
          
			}
?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">
                <form method="post" action="<?php if($mode == 'edit'){echo base_url()."pegawai/proses_editPegawai";}else{echo base_url()."pegawai/proses_addPegawai";}?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                <?php if($mode == 'edit'){ ?>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="pgw_jabatan" value="<?php echo $userlist->pgw_jabatan; ?>">
                <?php }?>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="pgw_nama" class="col-sm-2 control-label text-left">Nama</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="pgw_nama" name="pgw_nama" placeholder="Nama" value="<?php echo $pgw_nama; ?>" required data-minlength="3" pattern="^[a-zA-Z\s]*$">
                            <p class="help-block">Minimal 3 karakter, hanya huruf dan spasi</p>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label for="pgw_nip" class="col-sm-2 control-label text-left">NIP</label>
                        <div class="col-sm-10">
                        	
	                        <input type="text" class="form-control" id="pgw_nip" name="pgw_nip" placeholder="Nomor Induk Pegawai" value="<?php echo $pgw_nip; ?>">
                            
                            <div class="help-block with-errors"></div>
                            
                        </div>
                    </div>  
                    <?php // if($role == 1){ ?>
                  
                    <div class="form-group">
                        <label for="pgw_jabatan" class="col-sm-2 control-label text-left">Jabatan</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="pgw_jabatan" name="pgw_jabatan" required>
                            	<option value="">Select ...</option>
                                <?php foreach ($jbtlist as $row) {?>
                            	<option value="<?php echo $row->jbt_id; ?>" <?php if($row->jbt_id == $pgw_jabatan){echo "selected";}?>><?php echo $row->jbt_nama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                  
                    <?php // } ?>
                    <div class="form-group">
                        <label for="pgw_no_telp" class="col-sm-2 control-label text-left">Nomor Handphone</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="pgw_no_telp" name="pgw_no_telp" placeholder="Nomor Handphone" value="<?php echo $pgw_no_telp; ?>" pattern="^[0-9]*$" required data-minlength="10">
                            <p class="help-block">Hanya angka</p>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div> 
                
                </div>
                <div class="col-md-12 text-center"><hr>
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="...">
                            <a class="btn btn-lg btn-danger" href="javascript:history.back()"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Kembali</a>
                            <button type="submit" class="btn btn-lg btn-success confirm" data-confirm ="halo "><span class="glyphicon glyphicon-floppy-disk"  aria-hidden="true"></span> Simpan</button>
                        </div>
                    </div>
                </div>
            </form>        
            </div>
        </div>
    </div>
</div>  