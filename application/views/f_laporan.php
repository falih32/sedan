<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">
                <form method="post" action="" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                <div class="col-md-8">                 
                    <div class="form-group">
                        <label for="mem2" class="control-label text-left">Memorandum I</label>
                    </div> 
                    <div class="col-sm-2">
                        <label for="kepada" class="control-label text-left">Kepada</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="form-group">
                                <select class="form-control" id="pgw_jabatan" name="kepada" required>
                                    <option value="">Select ...</option>
                                    <?php foreach ($jbtlist as $row) {?>
                                    <option value="<?php echo $row->jbt_id; ?>" ><?php echo $row->jbt_nama; ?></option>
                                    <?php } ?>
                                </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label for="dari" class="control-label text-left">Dari</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="form-group">
                                <select class="darimemo1 form-control" id="dari" name="dari" required>
                                    <option value="">Select ...</option>
                                    <?php foreach ($jbtlist as $row) {?>
                                    <option value="<?php echo $row->jbt_id; ?>"><?php echo $row->jbt_nama; ?></option>
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
                
             
                
            </div>
        </div>
    </div>
</div> 
<script type="text/javascript">
 
     
$(document).ready(function() {
    $(".darimemo1").select2();
});
</script>