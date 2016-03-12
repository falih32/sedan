<?php
//	if($statuspage == 'edit'){
//		
//	}else{
//            $np_pnp_jml_sub ="";
//            $np_pnp_bobot ="40";
//            $np_pnp_nilai = "";
//	}
?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php // echo "$title"; ?></h3>
            </div>
            <div class="panel-body">
            <form method="post" action="<?php //if($statuspage == 'edit'){echo base_url()."Supplier/proses_edit_supplier";}else{echo base_url()."Supplier/proses_tambah_supplier";}?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
            <?php //if($statuspage == 'edit'){ ?> <input type="hidden" name="id" value="<?php //echo $id; ?>"><?php // }?>
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
                    
                    <input type="hidden"  class="form-control" id="pnp_id" name="pnp_id" value="<?php //echo $pnp_id; ?>" required>
                    <input type="hidden"  class="form-control" id="pnp_unp" name="pnk_unp" value="<?php //echo $pnp_unp; ?>" required>
                        
                    <tbody>
                        <input type="hidden"  class="form-control" id="pnp_kd_sub" name="np_pnp_kd_sub" value="<?php //echo $pnp_kd_sub; ?>" required>
                     
                        <td>1</td>
                        <td>PT. X</td>
                        <td><input type="text" class="form-control" id="np_pnp_jml_sub" name="np_pnp_jml_sub" placeholder="Jumlah" value="<?php //echo $np_pnp_jml_sub; ?>" required></td>
                        <td><input type="text" class="form-control" id="np_pnp_bobot" name="np_pnp_bobot" placeholder="Bobot" value="<?php //echo $np_pnp_bobot ?>" required></td>
                        <td><input type="text" class="form-control" id="np_pnp_nilai" name="np_pnp_nilai" placeholder="Nilai" value="<?php //echo $np_pnp_nilai ?>" required readonly></td>
                    </tbody>
                    </table>
                    
                    <h5><b>Sub unsur pengalaman melaksanakan di lokasi kegiatan (NPL)</b></h5>
                    <table class="table table-striped table-bordered table-hover" width="50%">
                    <thead>
                        <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Jumlah Pengalaman Pada Lokasi Yang Sama</th>
                                <th>Bobot(%)</th>
                                <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <input type="hidden"  class="form-control" id="pnp_kd_sub" name="npl_pnp_kd_sub" value="<?php //echo $pnp_kd_sub; ?>" required>
                        <td>1</td>
                        <td>PT. X</td>
                        <td><input type="text" class="form-control" id="npl_pnp_jml_sub" name="npl_pnp_jml_sub" placeholder="Jumlah" value="<?php //echo $npl_pnp_jml_sub; ?>" required></td>
                        <td><input type="text" class="form-control" id="npl_pnp_bobot" name="npl_pnp_bobot" placeholder="Bobot" value="<?php //echo $npl_pnp_bobot ?>" required></td>
                        <td><input type="text" class="form-control" id="npl_pnp_nilai" name="npl_pnp_nilai" placeholder="Nilai" value="<?php //echo $npl_pnp_nilai ?>" required readonly></td>
                    </tbody>
                    </table>
                    
                    <h5><b>Sub unsur pengalaman manajerial dan fasilitas utama</b></h5>
                    <h6><b>Pengalaman sebagai lead firm (NPLF)</b></h6>
                    <table class="table table-striped table-bordered table-hover" width="50%">
                    <thead>
                        <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Jumlah Pengalaman</th>
                                <th>Bobot(%)</th>
                                <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <input type="hidden"  class="form-control" id="nplf_pnp_kd_sub" name="nplf_pnp_kd_sub" value="<?php //echo $nplf_pnp_kd_sub; ?>" required>
                        <td>1</td>
                        <td>PT. X</td>
                        <td><input type="text" class="form-control" id="nplf_pnp_jml_sub" name="nplf_pnp_jml_sub" placeholder="Jumlah" value="<?php //echo $nplf_pnp_jml_sub; ?>" required></td>
                        <td><input type="text" class="form-control" id="nplf_pnp_bobot" name="nplf_pnp_bobot" placeholder="Bobot" value="<?php //echo $nplf_pnp_bobot ?>" required></td>
                        <td><input type="text" class="form-control" id="nplf_pnp_nilai" name="nplf_pnp_nilai" placeholder="Nilai" value="<?php //echo $nplf_pnp_nilai ?>" required readonly></td>
                    </tbody>
                    </table>

                <h6><b>Pengalaman mengelola kontrak (NPK)</b></h6>
                    <table class="table table-striped table-bordered table-hover" width="50%">
                    <thead>
                        <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Nilai Paket Pengalaman Sejenis</th>
                                <th>Bobot(%)</th>
                                <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <input type="hidden"  class="form-control" id="npk_pnp_kd_sub" name="npk_pnp_kd_sub" value="<?php //echo $npk_pnp_kd_sub; ?>" required>
                        
                        <td>1</td>
                        <td>PT. X</td>
                        <td><input type="text" class="form-control" id="npk_pnp_jml_sub" name="npk_pnp_jml_sub" placeholder="Jumlah" value="<?php //echo $npk_pnp_jml_sub; ?>" required></td>
                        <td><input type="text" class="form-control" id="npk_pnp_bobot" name="npk_pnp_bobot" placeholder="Bobot" value="<?php //echo $npk_pnp_bobot ?>" required></td>
                        <td><input type="text" class="form-control" id="npk_pnp_nilai" name="npk_pnp_nilai" placeholder="Nilai" value="<?php //echo $npk_pnp_nilai ?>" required readonly></td>
                    </tbody>
                    </table>
                    
                 <h6><b>Ketersediaan fasilitas utama (NFU)</b></h6>
                    <table class="table table-striped table-bordered table-hover" width="50%">
                    <thead>
                        <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Kriteria Fasilitas utama</th>
                                <th>Bobot(%)</th>
                                <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                    <input type="hidden"  class="form-control" id="nfu_pnp_kd_sub" name="nfu_pnp_kd_sub" value="<?php //echo $nfu_pnp_kd_sub; ?>" required>
                        
                    <td>1</td>
                        <td>PT. X</td>
                        <td><input type="text" class="form-control" id="nfu_pnp_jml_sub" name="nfu_pnp_jml_sub" placeholder="Jumlah" value="<?php //echo $nfu_pnp_jml_sub; ?>" required></td>
                        <td><input type="text" class="form-control" id="nfu_pnp_bobot" name="nfu_pnp_bobot" placeholder="Bobot" value="<?php //echo $nfu_pnp_bobot ?>" required></td>
                        <td><input type="text" class="form-control" id="nfu_pnp_nilai" name="nfu_pnp_nilai" placeholder="Nilai" value="<?php //echo $nfu_pnp_nilai ?>" required readonly></td>
                    </tbody>
                    </table>
                 
                 <h5><b>Sub unsur kapasitas perusahaan dengan memperhatikan jumlah tenaga ahli tetap (KP)</b></h5>
                    <table class="table table-striped table-bordered table-hover" width="50%">
                    <thead>
                        <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Jumlah Tenaga Ahli Tetap</th>
                                <th>Bobot(%)</th>
                                <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                    <input type="hidden"  class="form-control" id="kp_pnp_kd_sub" name="kp_pnp_kd_sub" value="<?php //echo $kp_pnp_kd_sub; ?>" required>
                            
                    <td>1</td>
                        <td>PT. X</td>
                        <td><input type="text" class="form-control" id="kp_pnp_jml_sub" name="kp_pnp_jml_sub" placeholder="Jumlah" value="<?php //echo $kp_pnp_jml_sub; ?>" required></td>
                        <td><input type="text" class="form-control" id="kp_pnp_bobot" name="kp_pnp_bobot" placeholder="Bobot" value="<?php //echo $kp_pnp_bobot ?>" required></td>
                        <td><input type="text" class="form-control" id="kp_pnp_nilai" name="kp_pnp_nilai" placeholder="Nilai" value="<?php //echo $kp_pnp_nilai ?>" required readonly></td>
                    </tbody>
                    </table>
                 
                 <h5><b>Rekapitulasi Nilai Pengalaman Perusahaan </b></h5>
                    <table class="table table-striped table-bordered table-hover" width="50%">
                    <thead>
                        <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>NP</th>
                                <th>NPL</th>
                                <th>NPLF</th>
                                <th>NPK</th>
                                <th>NFU</th>
                                <th>KP</th>
                                <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>1</td>
                        <td>PT. X</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                    </tbody>
                    </table>
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