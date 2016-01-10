<?php
	if($mode == 'edit'){
		$id = $dataUnit->dipa_id;
		$dipa_nomor = $dataUnit->dipa_nomor;
                $dipa_nomorsk = $dataUnit->dipa_nomorsk;
                $dipa_tanggal = $dataUnit->dipa_tanggal;
			}
	else{		
		$dipa_nomor = "";
                $dipa_nomorsk =" ";
                $dipa_tanggal = "";
                
			}
?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">
            <form method="post" action="<?php if($mode == 'edit'){echo base_url()."Dipa/proses_edit_dipa";}else{echo base_url()."Dipa/proses_tambah_dipa";}?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
            <?php if($mode == 'edit'){ ?> <input type="hidden" name="id" value="<?php echo $id; ?>"><?php }?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label text-left">Nomor Dipa</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="dipa_nomor" name="dipa_nomor" placeholder="Nomor DIPA" value="<?php echo $dipa_nomor; ?>" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="" class="col-sm-2 control-label text-left">Nomor SK</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="dipa_nomorsk" name="dipa_nomorsk" placeholder="Nomor SK DIPA" value="<?php echo $dipa_nomorsk; ?>" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="" class="col-sm-2 control-label text-left">Tanggal</label>
                        <div class="col-sm-10">
                             <input type="text" class="form-control tgl1" id="dipa_tanggal" name="dipa_tanggal" placeholder="tanggal" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" value="<?php echo $dipa_tanggal;?>" required> 
	                        
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