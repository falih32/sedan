<?php
	if($mode == 'edit'){
		$id = $dataUnit->spl_id;
		$spl_nama = $dataUnit->spl_nama;
                $spl_alamat = $dataUnit->spl_alamat;
                $spl_telp = $dataUnit->spl_telp;
                $spl_perwakilan = $dataUnit->spl_perwakilan;
                $spl_jabatan = $dataUnit->spl_jabatan;
                $spl_npwp = $dataUnit->spl_NPWP;
			}
	else{
		
		$spl_nama = "";
                $spl_alamat =" ";
                $spl_telp = "";
                $spl_perwakilan = "";
                $spl_jabatan="";
                $spl_npwp = "";
			}
?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">
            <form method="post" action="<?php if($mode == 'edit'){echo base_url()."Supplier/proses_edit_supplier";}else{echo base_url()."Supplier/proses_tambah_supplier";}?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
            <?php if($mode == 'edit'){ ?> <input type="hidden" name="id" value="<?php echo $id; ?>"><?php }?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="spl_nama" class="col-sm-2 control-label text-left">Nama</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="spl_nama" name="spl_nama" placeholder="Nama Perusahaan" value="<?php echo $spl_nama; ?>" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="spl_alamat" class="col-sm-2 control-label text-left">Alamat</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="spl_alamat" name="spl_alamat" placeholder="Alamat Lengkap" value="<?php echo $spl_alamat; ?>" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="spl_npwp" class="col-sm-2 control-label text-left">NPWP</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="spl_npwp" name="spl_npwp" placeholder="NPWP" value="<?php echo $spl_npwp; ?>" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="spl_telp" class="col-sm-2 control-label text-left">Telepon</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="spl_telp" name="spl_telp" placeholder="Nomor Telepon" value="<?php echo $spl_telp; ?>" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="spl_perwakilan" class="col-sm-2 control-label text-left">Perwakilan</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="spl_perwakilan" name="spl_perwakilan" placeholder="Nama Perwakilan" value="<?php echo $spl_perwakilan; ?>" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="spl_jabatan" class="col-sm-2 control-label text-left">Jabatan</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="spl_jabatan" name="spl_jabatan" placeholder="Jabatan Perwakilan" value="<?php echo $spl_jabatan; ?>" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    
                    </div>
            
                
                <div class="col-md-12 text-center"><hr>
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="...">
                            <a class="btn btn-lg btn-danger" href="javascript:history.back()"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Kembali</a>
                            <button type="submit" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Simpan</button>
                        </div>
                    </div>
                </div>
            </form>        
            </div>
        </div>
    </div>
</div>