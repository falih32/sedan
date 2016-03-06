<?php
?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php // echo "$title"; ?></h3>
            </div>
            <div class="panel-body">

    <h4><b>Sub unsur pengalaman kerja profesional</b></h4><br>            
                    <div class="col-md-12">
                        <form id = "pengadaan_form"  action = '' onsubmit="" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                        <input type="hidden"  class="form-control" id="pnk_id" name="pnk_id" value="<?php //echo $pnk_id; ?>" required>
                        <input type="hidden"  class="form-control" id="pnk_psi" name="pnk_psi" value="<?php //echo $pnk_psi; ?>" required>
                        
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h5><b>Prof. Mas Nofa M.T.</b> <br> Team Leader</h5>
                                
                                <div class="row">
                                    <div class ="col-md-6">
                                        
                                        <div class="form-group">
                                            <label for="" class="col-sm-4 control-label text-left">Uraian Pengalaman</label>
                                           <div class ="col-sm-8">
                                             <textarea class="form-control" id="pnk_uraian_pengalaman" name="pnk_uraian_pengalaman" placeholder="Uraian Pengalaman"></textarea>
                                            <div class="help-block with-errors"></div>  
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="" class="col-sm-4 control-label text-left">Jangka Waktu Bulan Kerja</label>
                                           <div class ="col-sm-8">
                                             <input type="text" class="form-control" id="pnk_jangka_wkt_bln" name="pnk_jangka_wkt_bln" placeholder="Jangka Waktu Bulan Kerja" data-error="Data yang dimasukkan harus angka, jika terdapat koma gunakan titik(.) sebagai koma" pattern="^[0-9.\s]*$">
                                            <div class="help-block with-errors"></div>  
                                           </div>
                                        </div>
                                        
                                    </div>
                                        
                      
                                    <div class ="col-md-6">
                                           <div class="form-group">
                                            <label for="" class="col-sm-4 control-label text-left">Kesesuaian Lingkup Pekerjaan</label>
                                           <div class ="col-sm-8">
                                            <select class="form-control" id="pnk_kesesuaian_pekerjaan" name="pnk_kesesuaian_pekerjaan" required>
                                                 <option value="" >-</option>
                                                 <option value="S" >Sesuai</option>
                                                 <option value="M" >Menunjang</option>
                                             </select>  
                                           </div>  
                                        </div>
                                        <input type="hidden"  class="form-control" id="pnk_nilai_pekerjaan" name="pnk_nilai_pekerjaan" value="<?php //echo $pnk_nilai_pekerjaan; ?>" required>
                                        
                                        <div class="form-group">
                                            <label for="" class="col-sm-4 control-label text-left">Kesesuaian Posisi</label>
                                           <div class ="col-sm-8">
                                            <select class="form-control" id="pnk_kesesuaian_posisi" name="pnk_kesesuaian_posisi" required>
                                                 <option value="" >-</option>
                                                 <option value="S" >Sesuai</option>
                                                 <option value="TS" >Tidak Sesuai</option>
                                             </select>  
                                           </div>  
                                           </div>
                                     <input type="hidden"  class="form-control" id="pnk_nilai_posisi" name="pnk_nilai_posisi" value="<?php //echo $pnk_nilai_posisi; ?>" required>
                                     <input type="hidden"  class="form-control" id="pnk_perhitungan_bln_kerja" name="pnk_perhitungan_bln_kerja" value="<?php //echo $pnk_perhitungan_bln_kerja; ?>" required>

                                        
                                        <button  type="button" class='btn btn-primary pull-right' id="addnewrowsuratusaha">
                                            Add New <span class="glyphicon glyphicon-plus">                                 
                                            </span>
                                        </button>
                                    </div>
                                    
                                   </div>

                            </div>
                        </div>
                        
                        <div class="row">
                                    <div class="table-responsive">
                                       <table class="table table-striped table-bordered text-center" id="tablepengalaman">
                                         <thead >
                                           <tr>
                                             <th class="text-center">No</th>
                                             <th class="text-center">Uraian Pengalaman</th>
                                             <th class="text-center">Jangka waktu bulan kerja</th>
                                             <th class="text-center" colspan="4">Pengalaman Kerja Profesional (Bobot 40%)</th>
                                             <th class="text-center">Perhitungan bulan kerja</th>
                                             <th class="text-center">Jangka Waktu Pengalaman Kerja Profesional</th>
                                             <th class="text-center">Action</th>   
                                           </tr>
                                           <tr>
                                             <th class="text-center"></th>
                                             <th class="text-center"></th>
                                             <th class="text-center"></th>
                                             <th class="text-center" colspan="2">Lingkup Pekerjaan</th>
                                             <th class="text-center" colspan="2">Posisi</th>
                                             <th class="text-center"></th>
                                             <th class="text-center"></th> 
                                             <th class="text-center"></th> 
                                           </tr>
                                           <tr>
                                             <th class="text-center"></th>
                                             <th class="text-center"></th>
                                             <th class="text-center"></th>
                                             <th class="text-center">Sesuai(S)/Menunjang (M)</th>
                                             <th class="text-center">Nilai</th>
                                             <th class="text-center">Sesuai(S)/Tidak Sesuai(TS)</th>
                                             <th class="text-center">Nilai</th>
                                             <th class="text-center"></th>
                                             <th class="text-center"></th> 
                                             <th class="text-center"></th> 
                                           </tr>
                                           
                                           
                                         </thead>
                                         <tbody>
                                             
                                             <tr>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                           </tr>
                                             
                                             
                                             <tr>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                                 <td>0.50</td>
                                                 <td></td>
                                           </tr>
                                         
                                         </tbody>
                                         
                                       </table>
                                   </div>
                         </div>   
                        
                </form>        
                    </div>
                
                    
                <div class="col-md-12 text-center"><hr>
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="...">
                            <a class="btn btn-lg btn-danger" href="javascript:history.back()"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Kembali</a>
                            <button type="submit" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Simpan</button>
                        </div>
                    </div>
                </div>
                    
            </div>
        </div>
    </div>
</div>
