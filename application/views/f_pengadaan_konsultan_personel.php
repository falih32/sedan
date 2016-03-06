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
                                <th class="text-center">No</th>
                                <th class="text-center">Jabatan</th>
                                <th class="text-center">BOBOT</th>
                                <th class="text-center" colspan="3">TINGKAT PENDIDIKAN (Bobot 40%)</th>
                                <th class="text-center" colspan="3">PENGALAMAN KERJA PROFESIONAL (Bobot 40%)</th>
                                <th class="text-center" colspan="3">SERTIFIKASI KEAHLIAN/PELATIHAN (20 %)</th>
                                <th class="text-center">Nilai</th>
                                <th class="text-center">Jumlah</th>
                        </tr>
                        <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th class="text-center">Ijasah Sesuai (S)/Ijasah sesuai tetapi tingkat pendidikan tidak (SB)/Tidak Sesuai (TS)/Kurang dari yang disyaratkan (K)</th>
                                <th class="text-center">Nilai</th>
                                <th class="text-center">Jumlah nilai subunsur</th>
                                <th class="text-center">Masa Kerja</th>
                                <th class="text-center">Nilai</th>
                                <th class="text-center">Jumlah Nilai</th>
                                <th class="text-center">Memiliki (M) /Tidak Memiliki (TM) Sertifikat</th>
                                <th class="text-center">Nilai</th>
                                <th class="text-center">Jumlah Nilai</th>
                                <th></th>
                                <th></th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        <td>1</td>
                        <td>Team Leader</td>
                        <input type="hidden"  class="form-control" id="psi_id" name="psi_id" value="<?php //echo $psi_id; ?>" required>
                        <input type="hidden"  class="form-control" id="psi_uns" name="psi_uns" value="<?php //echo $psi_uns; ?>" required>
                        <input type="hidden"  class="form-control" id="psi_dtk" name="psi_dtk" value="<?php //echo $psi_dtk; ?>" required>
                        <td><input type="text" class="form-control" id="psi_bobot" name="psi_bobot" placeholder="Bobot" value="<?php //echo $psi_bobot; ?>" required></td>
                        <td><select class="form-control" id="psi_kesesuaian_ijasah" name="psi_kesesuaian_ijasah" required>
                                                 <option value="" >-</option>
                                                 <option value="S" >S</option>
                                                 <option value="SB" >SB</option>
                                                 <option value="TS" >TS</option>
                                                 <option value="K" >K</option>
                                             </select></td>
                        <td><input type="text" class="form-control" id="psi_nilai_ks_ijasah" name="psi_nilai_ks_ijasah" placeholder="Nilai" value="<?php //echo $psi_nilai_ks_ijasah ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="psi_jml_nilai_ks_ijasah" name="psi_jml_nilai_ks_ijasah" placeholder="Jumlah Nilai" value="<?php //echo $psi_jml_nilai_ks_ijasah ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="psi_masa_kerja" name="psi_masa_kerja" placeholder="Masa Kerja" value="<?php //echo $psi_masa_kerja ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="psi_nilai_kerja" name="psi_nilai_kerja" placeholder="Nilai Kerja" value="<?php //echo $psi_nilai_kerja ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="psi_jml_nilai_kerja" name="psi_jml_nilai_kerja" placeholder="Jumlah Nilai Kerja" value="<?php //echo $psi_jml_nilai_kerja ?>" required readonly></td>  
                        <td><select class="form-control" id="psi_memiliki_sertifikat" name="psi_memiliki_sertifikat" required>
                                                 <option value="" >-</option>
                                                 <option value="M" >M</option>
                                                 <option value="TM" >TM</option>
                        </select></td>
                        <td><input type="text" class="form-control" id="psi_nilai_sertifikat" name="psi_nilai_sertifikat" placeholder="Nilai Sertifikat" value="<?php //echo $psi_nilai_sertifikat ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="psi_jml_nilai_sertifikat" name="psi_jml_nilai_sertifikat" placeholder="Jumlah Nilai Sertifikat" value="<?php //echo $psi_jml_nilai_sertifikat ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="psi_nilai" name="psi_nilai" placeholder="Nilai" value="<?php //echo $psi_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="psi_jumlah" name="psi_jumlah" placeholder="Jumlah" value="<?php //echo $psi_jumlah ?>" required readonly></td>
                        <input type="hidden"  class="form-control" id="psi_jangka_wkt_pro" name="psi_jangka_wkt_pro" value="<?php //echo $psi_jangka_wkt_pro; ?>" required>
     
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