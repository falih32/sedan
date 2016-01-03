<?php
    //$role = $this->session->userdata('id_role');
	if($mode == 'edit'){
		
		$msp_sk = $penyusunlist-> msp_sk;
		$msp_ketua = $penyusunlist-> msp_ketua;
		$msp_anggota1 = $penyusunlist-> msp_anggota1;
                $msp_anggota2 = $penyusunlist->msp_anggota2;
                $msp_anggota3 = $penyusunlist->msp_anggota3;
                $msp_anggota4 = $penyusunlist->msp_anggota4;
              
                
			}
	else{
		
		$msp_sk = "";
		$msp_ketua = "";
		$msp_anggota1 = "";
                $msp_anggota2 = "";
                $msp_anggota3 = "";
                $msp_anggota4 = "";
          
			}
?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">
                <form method="post" action="<?php if($mode == 'edit'){echo base_url()."penyusun/proses_editPenyusun";}else{echo base_url()."penyusun/proses_addPenyusun";}?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                <?php if($mode == 'edit'){ ?>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                
                <?php }?>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="msp_sk" class="col-sm-2 control-label text-left">Nomor Surat Keputusan (SK)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="msp_sk" name="msp_sk" placeholder="Nomor Surat Keputusan" value="<?php echo $msp_sk; ?>" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label for="msp_ketua" class="col-sm-2 control-label text-left">Ketua</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="msp_ketua" name="msp_ketua" required>
                            	<option value="">Select ...</option>
                                <?php foreach ($pgwlist as $row) {?>
                            	<option value="<?php echo $row->pgw_id; ?>" <?php if($row->pgw_id == $msp_ketua){echo "selected";}?>><?php echo $row->jbt_nama." (".$row->pgw_nip." - ".$row->pgw_nama.")"; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                     <div class="form-group">
                        <label for="msp_anggota1" class="col-sm-2 control-label text-left">Anggota-1</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="msp_anggota1" name="msp_anggota1" required>
                            	<option value="">Select ...</option>
                                <?php foreach ($pgwlist as $row) {?>
                            	<option value="<?php echo $row->pgw_id; ?>" <?php if($row->pgw_id == $msp_anggota1){echo "selected";}?>><?php echo $row->jbt_nama." (".$row->pgw_nip." - ".$row->pgw_nama.")"; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="msp_anggota2" class="col-sm-2 control-label text-left">Anggota-2</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="msp_anggota2" name="msp_anggota2" required>
                            	<option value="">Select ...</option>
                                <?php foreach ($pgwlist as $row) {?>
                            	<option value="<?php echo $row->pgw_id; ?>" <?php if($row->pgw_id == $msp_anggota2){echo "selected";}?>><?php echo $row->jbt_nama." (".$row->pgw_nip." - ".$row->pgw_nama.")"; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="msp_anggota3" class="col-sm-2 control-label text-left">Anggota-3</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="msp_anggota3" name="msp_anggota3" required>
                            	<option value="">Select ...</option>
                                <?php foreach ($pgwlist as $row) {?>
                            	<option value="<?php echo $row->pgw_id; ?>" <?php if($row->pgw_id == $msp_anggota3){echo "selected";}?>><?php echo $row->jbt_nama." (".$row->pgw_nip." - ".$row->pgw_nama.")"; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="msp_anggota4" class="col-sm-2 control-label text-left">Anggota-4</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="msp_anggota4" name="msp_anggota4" required>
                            	<option value="">Select ...</option>
                                <?php foreach ($pgwlist as $row) {?>
                            	<option value="<?php echo $row->pgw_id; ?>" <?php if($row->pgw_id == $msp_anggota4){echo "selected";}?>><?php echo $row->jbt_nama." (".$row->pgw_nip." - ".$row->pgw_nama.")"; ?></option>
                                <?php } ?>
                            </select>
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

<script type="text/javascript">
$(document).ready(function() {
    $("#msp_ketua").select2();
    $("#msp_anggota1").select2();
    $("#msp_anggota2").select2();
    $("#msp_anggota3").select2();
    $("#msp_anggota4").select2();
});
</script>
