<?php
	if($mode == 'edit'){
		$id = $dataUnit->siz_id;
		$siz_nama = $dataUnit->siz_nama;
			}
	else{
		
		$siz_nama = "";
			}
?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">
            <form method="post" action="<?php if($mode == 'edit'){echo base_url()."SuratIzin/proses_edit_suratizin";}else{echo base_url()."SuratIzin/proses_tambah_suratizin";}?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
            <?php if($mode == 'edit'){ ?> <input type="hidden" name="id" value="<?php echo $id; ?>"><?php }?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="siz_nama" class="col-sm-2 control-label text-left">Surat Izin</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="siz_nama" name="siz_nama" placeholder="Surat Izin" value="<?php echo $siz_nama; ?>" required>
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