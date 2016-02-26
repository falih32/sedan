<?php
	if($statuspage == 'edit'){
		
	}else{
            $np_pnp_jml_sub ="";
            $np_pnp_bobot ="40";
            $np_pnp_nilai = "";
	}
?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php echo "$title"; ?></h3>
            </div>
            <div class="panel-body">
            <form method="post" action="<?php if($statuspage == 'edit'){echo base_url()."Supplier/proses_edit_supplier";}else{echo base_url()."Supplier/proses_tambah_supplier";}?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
            <?php if($statuspage == 'edit'){ ?> <input type="hidden" name="id" value="<?php echo $id; ?>"><?php }?>
                <div class="col-md-12">
                    <h4><b>Data Unsur Pengalaman Perusahaan</b></h4><br>
                    <h5><b>Sub unsur pengalaman melaksanakan kegiatan sejenis (NP)</b></h5>
                    <table class="table table-striped table-bordered table-hover" width="50%">
                    <thead>
                        <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Jumlah Paket Pengalaman Sejenis</th>
                                <th>Bobot(%)</th>
                                <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>1</td>
                        <td>PT. X</td>
                        <td><input type="text" class="form-control" id="np_pnp_jml_sub" name="np_pnp_jml_sub" placeholder="Jumlah" value="<?php echo $np_pnp_jml_sub; ?>" required></td>
                        <td><input type="text" class="form-control" id="np_pnp_bobot" name="np_pnp_bobot" placeholder="Bobot" value="<?php echo $np_pnp_bobot ?>" required></td>
                        <td><input type="text" class="form-control" id="np_pnp_nilai" name="np_pnp_nilai" placeholder="Nilai" value="<?php echo $np_pnp_nilai ?>" required></td>
                    </tbody>
                    </table>
                    
                    <h5><b>Sub unsur pengalaman melaksanakan kegiatan sejenis (NP)</b></h5>
                    <table class="table table-striped table-bordered table-hover" width="50%">
                    <thead>
                        <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Jumlah Paket Pengalaman Sejenis</th>
                                <th>Bobot(%)</th>
                                <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>1</td>
                        <td>PT. X</td>
                        <td><input type="text" class="form-control" id="np_pnp_jml_sub" name="np_pnp_jml_sub" placeholder="Jumlah" value="<?php echo $np_pnp_jml_sub; ?>" required></td>
                        <td><input type="text" class="form-control" id="np_pnp_bobot" name="np_pnp_bobot" placeholder="Bobot" value="<?php echo $np_pnp_bobot ?>" required></td>
                        <td><input type="text" class="form-control" id="np_pnp_nilai" name="np_pnp_nilai" placeholder="Nilai" value="<?php echo $np_pnp_nilai ?>" required></td>
                    </tbody>
                    </table>
                    
                    <h5><b>Sub unsur pengalaman melaksanakan kegiatan sejenis (NP)</b></h5>
                    <table class="table table-striped table-bordered table-hover" width="50%">
                    <thead>
                        <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Jumlah Paket Pengalaman Sejenis</th>
                                <th>Bobot(%)</th>
                                <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>1</td>
                        <td>PT. X</td>
                        <td><input type="text" class="form-control" id="np_pnp_jml_sub" name="np_pnp_jml_sub" placeholder="Jumlah" value="<?php echo $np_pnp_jml_sub; ?>" required></td>
                        <td><input type="text" class="form-control" id="np_pnp_bobot" name="np_pnp_bobot" placeholder="Bobot" value="<?php echo $np_pnp_bobot ?>" required></td>
                        <td><input type="text" class="form-control" id="np_pnp_nilai" name="np_pnp_nilai" placeholder="Nilai" value="<?php echo $np_pnp_nilai ?>" required></td>
                    </tbody>
                    </table>

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