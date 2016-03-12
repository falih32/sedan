<?php

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
                    <h4><b>UNSUR PENDEKATAN DAN METODOLOGI BOBOT xx</b></h4><br>
                    <div class="col-md-9">
                    <h5><b>PT X</b></h5>
                    </div>
                    <div class="col-md-3">
                        <h5><b> Penilaian: </b> <br>  Sangat Baik (A) =100 <br> Baik (B) =80 <br> Cukup Baik (C) =60 <br> Kurang (D) =40 <br> Sangat Kurang (E) =20 <br> Tidak memberikan tanggapan (F) =0 </h5>
                    
                    </div>
                    <table class="table table-striped table-bordered table-hover" width="50%">
                    <thead>
                        <tr>
                                <th>No</th>
                                <th>Subunsur</th>
                                <th>Penilaian</th>
                                <th>Nilai</th>
                                <th>Bobot</th>
                                <th>Jumlah Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <input type="hidden"  class="form-control" id="mtd_id" name="mtd_id" value="<?php //echo $mtd_id; ?>" required>
                        <input type="hidden"  class="form-control" id="mtd_uns" name="mtd_uns" value="<?php //echo $mtd_uns; ?>" required>
                        <tr>
                        <td>1</td>
                        <td><b> Pemahaman atas jasa layanan yang tercantum dalam KAK <b> </td>
                        <td><select class="form-control" id="pem_mtd_penilaian" name="pem_mtd_penilaian" required>
                            	<option value=""  >-</option>
                                <option value="A" >A</option>
                                <option value="B" >B</option>
                                <option value="C" >C</option>
                                <option value="D" >D</option>
                                <option value="E" >E</option>
                                <option value="F" >F</option>
                            </select></td>  
                        <td><input type="text" class="form-control" id="pem_mtd_nilai" name="pem_mtd_nilai" placeholder="Nilai" value="<?php //echo $pem_mtd_nilai ?>" required readonly></td>           
                        <td><input type="text" class="form-control" id="pem_mtd_bobot" name="pem_mtd_bobot" placeholder="Bobot" value="<?php //echo $pem_mtd_bobot ?>" required></td>
                        <td><input type="text" class="form-control" id="pem_mtd_jml_nilai" name="pem_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php //echo $pem_mtd_jml_nilai ?>" required readonly></td>
                        </tr>
                        
                        <tr>
                        <td>2</td>
                        <td><b>Kualitas metodologi</b></td>
                        <td></td>
                        <td></td>
                        <td><input type="text" class="form-control" id="ket_mtd_bobot" name="kua_mtd_bobot" placeholder="Bobot" value="<?php //echo $ket_mtd_bobot ?>" required></td>
                        <td></td>
                        </tr>
                        
                        <tr>
                        <td></td>
                        <td>ketepatan analisa yang disampaikan dan langkah pemecahan yang diusulkan</td>
                        <td><select class="form-control" id="ket_mtd_penilaian" name="ket_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <option value="A" >A</option>
                                <option value="B" >B</option>
                                <option value="C" >C</option>
                                <option value="D" >D</option>
                                <option value="E" >E</option>
                                <option value="F" >F</option>
                            </select></td>  
                        <td><input type="text" class="form-control" id="ket_mtd_nilai" name="ket_mtd_nilai" placeholder="Nilai" value="<?php //echo $ket_mtd_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="ket_mtd_bobot" name="ket_mtd_bobot" placeholder="Bobot" value="<?php //echo $ket_mtd_bobot ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="ket_mtd_jml_nilai" name="ket_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php //echo $ket_mtd_jml_nilai ?>" required readonly></td>
                        </tr>
                        
                         <tr>
                        <td></td>
                        <td>konsistensi antara metodologi dengan  rencana kerja</td>
                        <td><select class="form-control" id="kon_mtd_penilaian" name="kon_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <option value="A" >A</option>
                                <option value="B" >B</option>
                                <option value="C" >C</option>
                                <option value="D" >D</option>
                                <option value="E" >E</option>
                                <option value="F" >F</option>
                            </select></td>  
                        <td><input type="text" class="form-control" id="kon_mtd_nilai" name="kon_mtd_nilai" placeholder="Nilai" value="<?php //echo $kon_mtd_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="kon_mtd_bobot" name="kon_mtd_bobot" placeholder="Bobot" value="<?php //echo $kon_mtd_bobot ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="kon_mtd_jml_nilai" name="kon_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php //echo $kon_mtd_jml_nilai ?>" required readonly></td>
                        </tr>
                        
                         <tr>
                        <td></td>
                        <td>apresiasi terhadap inovasi</td>
                        <td><select class="form-control" id="apr_mtd_penilaian" name="apr_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <option value="A" >A</option>
                                <option value="B" >B</option>
                                <option value="C" >C</option>
                                <option value="D" >D</option>
                                <option value="E" >E</option>
                                <option value="F" >F</option>
                            </select></td>  
                        <td><input type="text" class="form-control" id="apr_mtd_nilai" name="apr_mtd_nilai" placeholder="Nilai" value="<?php //echo $apr_mtd_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="apr_mtd_bobot" name="apr_mtd_bobot" placeholder="Bobot" value="<?php //echo $apr_mtd_bobot ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="apr_mtd_jml_nilai" name="apr_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php //echo $apr_mtd_jml_nilai ?>" required readonly></td>
                        </tr>
                        
                         <tr>
                        <td></td>
                        <td>dukungan data yang tersedia terhadap KAK</td>
                        <td><select class="form-control" id="duk_mtd_penilaian" name="duk_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <option value="A" >A</option>
                                <option value="B" >B</option>
                                <option value="C" >C</option>
                                <option value="D" >D</option>
                                <option value="E" >E</option>
                                <option value="F" >F</option>
                            </select></td>    
                        <td><input type="text" class="form-control" id="duk_mtd_nilai" name="duk_mtd_nilai" placeholder="Nilai" value="<?php //echo $duk_mtd_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="duk_mtd_bobot" name="duk_mtd_bobot" placeholder="Bobot" value="<?php //echo $duk_mtd_bobot ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="duk_mtd_jml_nilai" name="duk_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php //echo $duk_mtd_jml_nilai ?>" required readonly></td>
                        </tr>
                        
                         <tr>
                        <td></td>
                        <td>uraian tugas</td>
                        <td><select class="form-control" id="ura_mtd_penilaian" name="ura_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <option value="A" >A</option>
                                <option value="B" >B</option>
                                <option value="C" >C</option>
                                <option value="D" >D</option>
                                <option value="E" >E</option>
                                <option value="F" >F</option>
                            </select></td>  
                        <td><input type="text" class="form-control" id="ura_mtd_nilai" name="ura_mtd_nilai" placeholder="Nilai" value="<?php //echo $ura_mtd_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="ura_mtd_bobot" name="ura_mtd_bobot" placeholder="Bobot" value="<?php //echo $ura_mtd_bobot ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="ura_mtd_jml_nilai" name="ura_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php //echo $ura_mtd_jml_nilai ?>" required readonly></td>
                        </tr>
                        
                         <tr>
                        <td></td>
                        <td>jangka waktu pelaksanaan</td>
                       <td><select class="form-control" id="jan_mtd_penilaian" name="jan_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <option value="A" >A</option>
                                <option value="B" >B</option>
                                <option value="C" >C</option>
                                <option value="D" >D</option>
                                <option value="E" >E</option>
                                <option value="F" >F</option>
                            </select></td>  
                        <td><input type="text" class="form-control" id="jan_mtd_nilai" name="jan_mtd_nilai" placeholder="Nilai" value="<?php //echo $jan_mtd_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="jan_mtd_bobot" name="jan_mtd_bobot" placeholder="Bobot" value="<?php //echo $jan_mtd_bobot ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="jan_mtd_jml_nilai" name="jan_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php //echo $jan_mtd_jml_nilai ?>" required readonly></td>
                        </tr> 
                         
                        <tr>
                        <td></td>
                        <td>program kerja, jadwal pekerjaan, dan jadwal penugasan</td>
                        <td><select class="form-control" id="pro_mtd_penilaian" name="pro_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <option value="A" >A</option>
                                <option value="B" >B</option>
                                <option value="C" >C</option>
                                <option value="D" >D</option>
                                <option value="E" >E</option>
                                <option value="F" >F</option>
                            </select></td>  
                        <td><input type="text" class="form-control" id="pro_mtd_nilai" name="pro_mtd_nilai" placeholder="Nilai" value="<?php //echo $pro_mtd_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="pro_mtd_bobot" name="pro_mtd_bobot" placeholder="Bobot" value="<?php //echo $pro_mtd_bobot ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="pro_mtd_jml_nilai" name="pro_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php //echo $pro_mtd_jml_nilai ?>" required readonly></td>
                        </tr>
                        
                         <tr>
                        <td></td>
                        <td>organisasi</td>
                        <td><select class="form-control" id="org_mtd_penilaian" name="org_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <option value="A" >A</option>
                                <option value="B" >B</option>
                                <option value="C" >C</option>
                                <option value="D" >D</option>
                                <option value="E" >E</option>
                                <option value="F" >F</option>
                            </select></td>  
                        <td><input type="text" class="form-control" id="org_mtd_nilai" name="org_mtd_nilai" placeholder="Nilai" value="<?php //echo $org_mtd_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="org_mtd_bobot" name="org_mtd_bobot" placeholder="Bobot" value="<?php //echo $org_mtd_bobot ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="org_mtd_jml_nilai" name="org_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php //echo $org_mtd_jml_nilai ?>" required readonly></td>
                        </tr>
                        
                         <tr>
                        <td></td>
                        <td>kebutuhan fasilitas penunjang</td>
                        <td><select class="form-control" id="keb_mtd_penilaian" name="keb_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <option value="A" >A</option>
                                <option value="B" >B</option>
                                <option value="C" >C</option>
                                <option value="D" >D</option>
                                <option value="E" >E</option>
                                <option value="F" >F</option>
                            </select></td>  
                        <td><input type="text" class="form-control" id="keb_mtd_nilai" name="keb_mtd_nilai" placeholder="Nilai" value="<?php //echo $keb_mtd_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="keb_mtd_bobot" name="keb_mtd_bobot" placeholder="Bobot" value="<?php //echo $keb_mtd_bobot ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="keb_mtd_jml_nilai" name="keb_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php //echo $keb_mtd_jml_nilai ?>" required readonly></td>
                        </tr>
                        
                         <tr>
                        <td>3</td>
                        <td><b>Hasil kerja (deliverable)</b></td>
                        <td></td>
                        <td></td>
                        <td><input type="text" class="form-control" id="penA_mtd_bobot" name="has_mtd_bobot" placeholder="Bobot" value="<?php //echo $pen_mtd_bobot ?>" required></td>
                        <td></td>
                        </tr>
                        
                        <tr>
                        <td></td>
                        <td>penyajian analisis dan gambar-gambar kerja</td>
                        <td><select class="form-control" id="penA_mtd_penilaian" name="penA_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <option value="A" >A</option>
                                <option value="B" >B</option>
                                <option value="C" >C</option>
                                <option value="D" >D</option>
                                <option value="E" >E</option>
                                <option value="F" >F</option>
                            </select></td>  
                        <td><input type="text" class="form-control" id="penA_mtd_nilai" name="penA_mtd_nilai" placeholder="Nilai" value="<?php //echo $penA_mtd_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="penA_mtd_bobot" name="penA_mtd_bobot" placeholder="Bobot" value="<?php //echo $penA_mtd_bobot ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="penA_mtd_jml_nilai" name="penA_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php //echo $penA_mtd_jml_nilai ?>" required readonly></td>
                        </tr>
                        
                         <tr>
                        <td></td>
                        <td>penyajian spesifikasi teknis dan perhitungan teknis</td>
                        <td><select class="form-control" id="penST_mtd_penilaian" name="penST_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <option value="A" >A</option>
                                <option value="B" >B</option>
                                <option value="C" >C</option>
                                <option value="D" >D</option>
                                <option value="E" >E</option>
                                <option value="F" >F</option>
                            </select></td>  
                        <td><input type="text" class="form-control" id="penST_mtd_nilai" name="penST_mtd_nilai" placeholder="Nilai" value="<?php //echo $penST_mtd_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="penST_mtd_bobot" name="penST_mtd_bobot" placeholder="Bobot" value="<?php //echo $penST_mtd_bobot ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="penST_mtd_jml_nilai" name="penST_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php //echo $penST_mtd_jml_nilai ?>" required readonly></td>
                        </tr>
                        
                         <tr>
                        <td></td>
                        <td>penyajian laporan-laporan</td>
                        <td><select class="form-control" id="penL_mtd_penilaian" name="penL_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <option value="A" >A</option>
                                <option value="B" >B</option>
                                <option value="C" >C</option>
                                <option value="D" >D</option>
                                <option value="E" >E</option>
                                <option value="F" >F</option>
                            </select></td>  
                        <td><input type="text" class="form-control" id="penL_mtd_nilai" name="penL_mtd_nilai" placeholder="Nilai" value="<?php //echo $penL_mtd_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="penL_mtd_bobot" name="penL_mtd_bobot" placeholder="Bobot" value="<?php //echo $penL_mtd_bobot ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="penL_mtd_jml_nilai" name="penL_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php //echo $penL_mtd_jml_nilai ?>" required readonly></td>
                        </tr>
                        
                        <tr>
                        <td>4</td>
                        <td><b>Gagasan baru yang diajukan oleh peserta untuk meningkatkan kualitas keluaran yang diinginkan dalam KAK </b> </td>
                        <td><select class="form-control" id="gag_mtd_penilaian" name="gag_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <option value="A" >A</option>
                                <option value="B" >B</option>
                                <option value="C" >C</option>
                                <option value="D" >D</option>
                                <option value="E" >E</option>
                                <option value="F" >F</option>
                            </select></td>  
                        <td><input type="text" class="form-control" id="gag_mtd_nilai" name="gag_mtd_nilai" placeholder="Nilai" value="<?php //echo $gag_mtd_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="gag_mtd_bobot" name="gag_mtd_bobot" placeholder="Bobot" value="<?php //echo $gag_mtd_bobot ?>" required></td>
                        <td><input type="text" class="form-control" id="gag_mtd_jml_nilai" name="gag_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php //echo $gag_mtd_jml_nilai ?>" required readonly></td>
                        </tr>
                        
                    </tbody>
                    </table>
                    <table class="table table-striped table-bordered table-hover" width="50%">
                        <thead>
                     <tr>
                        <td>JUMLAH NILAI UNSUR</td>
                        <td>xx</td>
                     </tr>
                     </thead>
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