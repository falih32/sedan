<?php   $role = $this->session->userdata('id_role'); 
if($statuspage !="edit"){
        
        $pgd_jml_sblm_ppn_hps = "0";
        $pgd_jml_ssdh_ppn_hps = "0";
        $pgd_status_pengadaan = 0;
        
    }else{
        $pgd_status_pengadaan = $dataPengadaan->pgd_status_pengadaan;
    } 
?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">
                <?php if($pgd_status_pengadaan==0){ ?>
                
                    <div class="col-md-12">
<!-----Sub Judul---------------------------------------------------------------------------------------------------->                         
                        <form method="post" id = "subjudul_form"  action = "" class="form-horizontal" data-toggle="validator">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <div class="row">                    
                                <div class="col-md-8">
                                    <h4><b>Tambah Sub Judul Baru</b></h4>
                                </div>                                           
                            </div> 
                            <div class="form-group">      
                               <label for="sjd_sub_judul" class="col-sm-2 control-label text-left">Sub Judul</label> 
                               <div class="col-sm-8">
                               <input type="text" class="form-control" id="sjd_sub_judul" name="sjd_sub_judul" placeholder="sub judul"> 
                               <div class="help-block with-errors"></div>
                               </div>
                               <button  type="submit" class='btn btn-primary' id="addnewsubjudul">
                                    Add New <span class="glyphicon glyphicon-plus"></span>
                                </button>
                            </div>
                            <!--hidden atribut untuik subjudul-->
                            <input type="hidden" class="form-control" id="sub_pgd_tipe_pengadaan" name="sub_pgd_tipe_pengadaan" value= "<?php echo $pgd_tipe_pengadaan;?>">
                            </div>
                        </div>
                        </form>
<!-----Biaya langsung personil---------------------------------------------------------------------------------------------------->                        
                        
                        <br>
                        <form method="post" id = "dtl_konsultan1_form"  action = "" class="form-horizontal" data-toggle="validator">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">                    
                                    <div class="col-md-8">
                                        <h4><b>Biaya Personil</b></h4>
                                    </div>                                           
                                </div> 
                                
                                <br>
                                <div class="row">
                                    <div class ="col-md-6">
                                        
                                        <div class="form-group">
                                           <label for="chkBoxJudul" class="col-sm-4 control-label text-left">Tambah Sub Judul</label> 
                                           <div class="col-sm-8">
                                                <input data-style="btn-group-sm" id = "chkBoxJudul" class ="chkBoxJudul pull-right" type="checkbox" data-off-label="Tidak" data-on-label="Ya" name ="dtk_stat_sub_judul" value="1">
                                           </div>
                                        </div>
                                        <div id = "frmSubJudul" hidden class="form-group">
                                            <label id ="lbl_optSubJudul" for="optSubJudul" class="col-sm-4 control-label text-left">Sub Judul</label>
                                            <div class="col-sm-8">
                                                <select hidden  id ="optSubJudul" class="optSubJudul-opt form-control" style="width: 100%" name="dtk_sub_judul">                                                       
                                                </select>                      
                                            </div>
                                        </div>
                                        <div class="form-group">      
                                           <label for="dtk_jabatan" class="col-sm-4 control-label text-left">Jabatan</label> 
                                           <div class="col-sm-8">
                                           <input type="text" class="form-control" id="dtk_jabatan" name="dtk_jabatan" placeholder="Jabatan"> 
                                           <div class="help-block with-errors"></div>
                                           </div>
                                        </div>
                                        <div class="form-group">      
                                           <label for="dtk_kualifikasi_pendidikan" class="col-sm-4 control-label text-left">Kualifikasi Pendidikan</label> 
                                           <div class="col-sm-8">
                                           <input type="text" class="form-control" id="dtk_kualifikasi_pendidikan" name="dtk_kualifikasi_pendidikan" placeholder="Kualifikasi Pendidikan"> 
                                           <div class="help-block with-errors"></div>
                                           </div>
                                        </div>
                                        <div class="form-group">
                                           <label for="dtk_jml_org" class="col-sm-4 control-label text-left">Jumlah Orang</label>
                                           <div class="col-sm-8">
                                           <input type="text" class="form-control" id="dtk_jml_org" name="dtk_jml_org" placeholder="Jumlah Orang" data-error="Data yang dimasukkan harus angka" pattern="^[0-9\s]*$">
                                           <div class="help-block with-errors"></div>
                                           </div>
                                        </div>
                                        <div class="form-group">
                                           <label for="dtk_jml_bln" class="col-sm-4 control-label text-left">Jumlah Bulan</label>
                                           <div class="col-sm-8">
                                           <input type="text" class="form-control" id="dtk_jml_bln" name="dtk_jml_bln" placeholder="Jumlah Bulan" data-error="Data yang dimasukkan harus angka, jika ada koma gunakan tanda titik(.) sebagai koma" pattern="^[0-9.\s]*$">
                                           <div class="help-block with-errors"></div>
                                           </div>
                                        </div>
                                        </div>
                                    <div class ="col-md-6">   
                                        <div class="form-group">
                                           <label for="dtk_intensitas" class="col-sm-4 control-label text-left">Intensitas</label>
                                           <div class="col-sm-8">
                                           <input type="text" class="form-control" id="dtk_intensitas" name="dtk_intensitas" placeholder="Intensitas" data-error="Data yang dimasukkan harus angka, jika ada koma gunakan tanda titik(.) sebagai koma" pattern="^[0-9.\s]*$">
                                           <div class="help-block with-errors"></div>
                                           </div>
                                        </div>
                                        <div class="form-group">
                                           <label for="dtk_satuan" class="col-sm-4 control-label text-left">Satuan</label>
                                           <div class="col-sm-8">
                                           <input type="text" class="form-control" id="dtk_satuan" name="dtk_satuan" placeholder="Satuan">
                                           <div class="help-block with-errors"></div>
                                           </div>
                                        </div>
                                        <div class="form-group">                                    
                                            <label for="dtk_biaya_personil_hps" class="col-sm-4 control-label text-left">Biaya Personil</label>
                                            <div class="col-sm-8">
                                            <input class="form-control" id="dtk_biaya_personil_hps" name="dtk_biaya_personil_hps" placeholder="Biaya personil(Rp)" data-error="Data yang dimasukkan harus angka, jika terdapat koma gunakan titik(.) sebagai koma" pattern="^[0-9.\s]*$">
                                            <label id="lbl_hargasatuan" class="pull-left">Rp.-</label>
                                            <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <button  type="submit" class='btn btn-primary pull-right' id="addnewpekerjaan">
                                            Add New <span class="glyphicon glyphicon-plus">                                 
                                            </span>
                                        </button>
                                        <!--hidden atribut untuik biaya personil-->
                                        <input type="hidden" class="form-control" id="sub_pgd_tipe_pengadaan" name="sub_pgd_tipe_pengadaan" value= "<?php echo $pgd_tipe_pengadaan;?>">
                                        <input type="hidden" class="form-control" id="dtp_pengadaan" name="dtp_pengadaan" value= "<?php echo $dtp_pengadaan;?>">
                                    </div>
                                </div>
                                <br>   
                                <br>
                                <div class="row">
                                    <div class="table-responsive">
                                       <table class="table table-striped table-bordered table-hover text-center" id="table_personal">
                                         <thead >
                                           <tr>
                                             <th class="text-center">Jabatan</th>
                                             <th class="text-center">Kualifikasi Pend</th>
                                             <th class="text-center">Jml Org</th>
                                             <th class="text-center">Jml Bln</th>
                                             <th class="text-center">Intensitas</th>
                                             <th class="text-center">Kuantitas</th>
                                             <th class="text-center">Satuan</th>
                                             <th class="text-center">Biaya Personil</th>
                                             <th class="text-center">Jml Biaya</th>
                                           </tr>
                                         </thead>
                                         <tbody>
                                             <tbody>
                                                
                                                <?php foreach ($pekerjaanList as $row) {?>
                                                   <tr><td><?php echo $row->dtp_pekerjaan; ?></td>
                                                   <td><?php echo $row->dtp_spesifikasi; ?>
                                                        <?php $urlfile = site_url('uploads/file_pengadaan').'/'.$row->dtp_file;?>
                                                        <?php $tagFile =  "<a href='".$urlfile."' target='_blank'>Gambar</a>"?>
                                                        <?php if($row->dtp_file!="" || $row->dtp_file!=NULL){echo "<br>".$tagFile;} ?></td>
                                                   <td><?php echo $row->dtp_volume; ?></td>
                                                   <td><?php echo $row->dtp_satuan; ?></td>
                                                   <td><?php echo 'Rp.'.number_format($row->dtp_hargasatuan_hps,0,",","."); ?></td>
                                                   <td><?php echo 'Rp.'.number_format($row->dtp_jumlahharga_hps,0,",","."); ?></td>
                                                   <td style='display:none;'><?php echo $row->dtp_jumlahharga_hps; ?></td>
                                                   <td class='deleterow' value='<?php echo $row->dtp_id; ?>'><div class='glyphicon glyphicon-remove'></div></td>
                                                   </tr>
                                               <?php } ?>
                                               
                                            </tbody>
                                         </tbody>
                                       </table>
                                   </div>
                                </div>
                                <div class="row"> 
                                    <div class ='col-sm-3 pull-right'> 
                                    <label id = "total_label" class="control-label text-center pull-right">Total : &nbsp;</label>
                                    <input type="text" class="form-control" id="x_pgd_jml_sblm_ppn_hps"  value='<?php echo 'Rp.'.number_format($pgd_jml_sblm_ppn_hps,0,",","."); ?>' readonly>
                                    <input type="hidden" class="form-control" id="pgd_jml_sblm_ppn_hps" name="pgd_jml_sblm_ppn_hps" value='<?php echo $pgd_jml_sblm_ppn_hps?>' readonly>
                                    </div> 
                                    
                                    <div class ='col-sm-3 pull-right'>
                                    <label id = "lbl_pgd_jml_ssdh_ppn_hps" class="control-label text-center pull-right"><?php if ($pgd_dgn_pajak == 0){ echo "Total(ppn 10%) : &nbsp;"; }else{echo "";} ?></label>
                                    <input type="<?php if ($pgd_dgn_pajak == 0){ echo "text"; }else{echo "hidden";} ?>" class="form-control" id="x_pgd_jml_ssdh_ppn_hps"  value='<?php echo 'Rp.'.number_format($pgd_jml_ssdh_ppn_hps,0,",","."); ?>' readonly>
                                    <input type="hidden" class="form-control" id="pgd_jml_ssdh_ppn_hps" name="pgd_jml_ssdh_ppn_hps" value='<?php echo $pgd_jml_ssdh_ppn_hps?>' readonly>
                                    </div>
                                 
                                </div>
                            </div>
                        </div>    
                        </form>           
                    </div>
 <!------Biaya langsung non personil--------------------------------------------------------------------------------------------------->
 
            <form method="post" id = "dtl_pengadaan_form"  action = "" class="form-horizontal" data-toggle="validator">
                    <div class="col-md-12">                       
                        <br>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">                    
                                    <div class="col-md-8">
                                        <h4><b>Biaya Non Personil</b></h4>
                                    </div>                                           
                                </div>  
                                <br>
                                <div class="row">
                                    <div class ="col-md-6">
                                        
                                        <div class="form-group">      
                                           <label for="dtk2_pekerjaan" class="col-sm-4 control-label text-left">Uraian</label> 
                                           <div class="col-sm-8">
                                           <input type="text" class="form-control" id="dtp_pekerjaan" name="dtk2_pekerjaan" placeholder="Uraian"> 
                                           <div class="help-block with-errors"></div>
                                           </div>
                                        </div>
                                        <div class="form-group">
                                           <label for="dtk2_volume" class="col-sm-4 control-label text-left">Volume</label>
                                           <div class="col-sm-8">
                                           <input type="text" class="form-control" id="dtk2_volume" name="dtk2_volume" placeholder="Volume" data-error="Data yang dimasukkan harus angka, jika terdapat koma gunakan titik(.) sebagai koma" pattern="^[0-9.\s]*$">
                                           <div class="help-block with-errors"></div>
                                           </div>
                                        </div>
                                        <div class="form-group">
                                           <label for="dtk2_satuan" class="col-sm-4 control-label text-left">Satuan Volume</label>
                                           <div class="col-sm-8">
                                           <input type="text" class="form-control" id="dtk2_satuan" name="dtk2_satuan" placeholder="Satuan Volume (Contoh : m2, liter, unit, dll">
                                           <div class="help-block with-errors"></div>
                                           </div>
                                        </div>
                                        <div class="form-group">                                    
                                            <label for="dtk2_hargasatuan_hps" class="col-sm-4 control-label text-left">Harga Satuan</label>
                                            <div class="col-sm-8">
                                            <input class="form-control" id="dtk2_hargasatuan_hps" name="dtk2_hargasatuan_hps" placeholder="Harga satuan(Rp)" data-error="Data yang dimasukkan harus angka, jika terdapat koma gunakan titik(.) sebagai koma" pattern="^[0-9.\s]*$">
                                            <label id="lbl_hargasatuan" class="pull-left">Rp.-</label>
                                            <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        

                                        </div>
                                    <div class ="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-offset-4 control-label text-center">Spesifikasi Teknis</label>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" id="dtk2_spesifikasi" name="dtk2_spesifikasi" placeholder="Spesifikasi Teknis"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="control-label">Upload Spesifikasi Gambar</label>
                                            <input type="file" class="" id="dtk2_file" name="dtk2_file" >
                                            <a href="#" id="clear">Clear</a>
                                            <p class="help-block"><i>Format: JPG, JPEG, PNG, GIF, PDF | Max file size: 10 MB.</i></p>
                                        </div>
                                        
                                        <button  type="submit" class='btn btn-primary pull-right' id="addnewpekerjaan">
                                            Add New <span class="glyphicon glyphicon-plus">                                 
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="table-responsive">
                                       <table class="table table-striped table-bordered table-hover text-center" id="table_pekerjaan">
                                         <thead >
                                           <tr>
                                             <th class="text-center">Uraian</th>
                                             <th class="text-center">Spec</th>
                                             <th class="text-center">Vol</th>
                                             <th class="text-center">Sat</th>
                                             <th class="text-center">Hrg</th>
                                             <th class="text-center">Tot</th>
                                             <th class="text-center">Act</th>
                                           </tr>
                                         </thead>
                                         <tbody>
                                             <tbody>
                                                
                                                <?php foreach ($pekerjaanList as $row) {?>
                                                   <tr><td><?php echo $row->dtp_pekerjaan; ?></td>
                                                   <td><?php echo $row->dtp_spesifikasi; ?>
                                                        <?php $urlfile = site_url('uploads/file_pengadaan').'/'.$row->dtp_file;?>
                                                        <?php $tagFile =  "<a href='".$urlfile."' target='_blank'>Gambar</a>"?>
                                                        <?php if($row->dtp_file!="" || $row->dtp_file!=NULL){echo "<br>".$tagFile;} ?></td>
                                                   <td><?php echo $row->dtp_volume; ?></td>
                                                   <td><?php echo $row->dtp_satuan; ?></td>
                                                   <td><?php echo 'Rp.'.number_format($row->dtp_hargasatuan_hps,0,",","."); ?></td>
                                                   <td><?php echo 'Rp.'.number_format($row->dtp_jumlahharga_hps,0,",","."); ?></td>
                                                   <td style='display:none;'><?php echo $row->dtp_jumlahharga_hps; ?></td>
                                                   <td class='deleterow' value='<?php echo $row->dtp_id; ?>'><div class='glyphicon glyphicon-remove'></div></td>
                                                   </tr>
                                               <?php } ?>
                                               
                                            </tbody>
                                         </tbody>
                                       </table>
                                   </div>
                                </div>
                                <div class="row"> 
                                    <div class ='col-sm-3 pull-right'> 
                                    <label id = "total_label" class="control-label text-center pull-right">Total : &nbsp;</label>
                                    <input type="text" class="form-control" id="x_pgd_jml_sblm_ppn_hps"  value='<?php echo 'Rp.'.number_format($pgd_jml_sblm_ppn_hps,0,",","."); ?>' readonly>
                                    <input type="hidden" class="form-control" id="pgd_jml_sblm_ppn_hps" name="pgd_jml_sblm_ppn_hps" value='<?php echo $pgd_jml_sblm_ppn_hps?>' readonly>
                                    </div> 
                                    
                                    <div class ='col-sm-3 pull-right'>
                                    <label id = "lbl_pgd_jml_ssdh_ppn_hps" class="control-label text-center pull-right"><?php if ($pgd_dgn_pajak == 0){ echo "Total(ppn 10%) : &nbsp;"; }else{echo "";} ?></label>
                                    <input type="<?php if ($pgd_dgn_pajak == 0){ echo "text"; }else{echo "hidden";} ?>" class="form-control" id="x_pgd_jml_ssdh_ppn_hps"  value='<?php echo 'Rp.'.number_format($pgd_jml_ssdh_ppn_hps,0,",","."); ?>' readonly>
                                    <input type="hidden" class="form-control" id="pgd_jml_ssdh_ppn_hps" name="pgd_jml_ssdh_ppn_hps" value='<?php echo $pgd_jml_ssdh_ppn_hps?>' readonly>
                                    </div>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                                   <input type="hidden" class="form-control" id="dtp_pengadaan" name="dtp_pengadaan" value= "<?php echo $dtp_pengadaan;?>" placeholder="Detail Pekerjaan">
                     </div>
                </form>
 
 <!------Syarat penyedia--------------------------------------------------------------------------------------------------->                         
                    <form id = "pengadaan_form"  action = '<?php if($statuspage =="edit"){ echo base_url()."Pengadaan/proses_edit_pengadaan2";}else{echo base_url()."Pengadaan/proses_add_pengadaan2";} ?>' onsubmit="submitFormPengadaan();" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                    <div class="col-md-12">    
                        <br>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4><b>Syarat Penyedia</b></h4>
                                <div class="row">
                                    <div class ="col-md-6">    
                                        <div class="form-group">
                                            <label for="dsp_surat_izin" class="col-sm-4 control-label text-left">Syarat penyedia</label>
                                           <div class ="col-sm-8">
                                               <select class="suratizin-cbbox form-control" style="width: 100%" name="dsp_surat_izin" id="dsp_surat_izin">
                                                    <?php foreach ($suratList as $row) {?>
                                                    <option value="<?php echo $row->siz_id; ?>">
                                                            <?php echo $row->siz_nama; ?>
                                                    </option>
                                                    <?php } ?>
                                               </select>
                                           </div>
                                           </div>

                                    </div>
                                    <div class ="col-md-6">
                                        <button  type="button" class='btn btn-primary pull-right' id="addnewrowsuratusaha">
                                            Add New <span class="glyphicon glyphicon-plus">                                 
                                            </span>
                                        </button>
                                    </div>
                                   </div>

                                <div class="row">
                                    <div class="table-responsive">
                                       <table class="table table-striped table-bordered text-center" id="tablesuratusaha">
                                         <thead >
                                           <tr>
                                             <th class="text-center" style="display:none;" >id surat usaha</th>
                                             <th class="text-center">Nama Surat Usaha</th>
                                             <th class="text-center">Action</th>
                                           </tr>
                                         </thead>
                                         <tbody>
                                             <?php if ($statuspage == 'edit') {?>
                                              <?php foreach ($suratPgd as $row) {?>
                                                    <tr><td style="display:none;"><?php echo $row->siz_id; ?></td>
                                                    <td><?php echo $row->siz_nama; ?></td>
                                                    <td class='deleterowsurat'><div class='glyphicon glyphicon-remove'></div></td></tr>
                                              <?php } ?>
                                             <?php } ?>
                                         </tbody>

                                       </table>
                                   </div>
                                </div>    
                            </div>
                        </div>
                        
                    </div>
 <!---End of input------------------------------------------------------------------------------------------------------>                    
 <!---hidden atributte------------------------------------------------------------------------------------------->                    
                        <div class="row">
                            <div class="form-group">     
                                   <div class="col-sm-4">
                                   <input type="hidden" class="form-control" id="list_pekerjaan" name="list_pekerjaan" placeholder="Detail Pekerjaan">
                                   </div>
                                    <div class="col-sm-4">
                                   <input type="hidden" class="form-control" id="list_penyusun" name="list_penyusun" placeholder="Detail Pekerjaan">
                                   </div>
                                    <div class="col-sm-4">
                                   <input type="hidden" class="form-control" id="list_suratizin" name="list_suratizin" placeholder="Detail Pekerjaan">
                                   </div>
                                    <div class="col-sm-4">
                                   <input type="hidden" class="form-control" id="pgd_tipe_pengadaan" name="pgd_tipe_pengadaan" value= "<?php echo $pgd_tipe_pengadaan;?>" placeholder="Detail Pekerjaan">
                                   </div>
                                    <div class="col-sm-4">
                                   <input type="hidden" class="form-control" id="pgd_dgn_pajak" name="pgd_dgn_pajak" value= "<?php echo $pgd_dgn_pajak;?>" placeholder="Detail Pekerjaan">
                                   </div>
                                    <div class="col-sm-4">
                                   <input type="hidden" class="form-control" id="dtp_pengadaan2" name="dtp_pengadaan2" value= "<?php echo $dtp_pengadaan;?>" placeholder="Detail Pekerjaan">
                                    </div>
                                    <div class="col-sm-4">
                                   <input type="hidden" class="form-control" id="dtp_id_sementara" name="dtp_id_sementara" value= "" placeholder="Detail Pekerjaan">
                                   </div>
                                    
                            </div>
                        </div>
                    <div class="col-md-12 text-center"><hr>
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="...">
                            <a class="btn btn-lg btn-danger" href="javascript:history.back()"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Kembali</a>
                            <button type="submit" class="btn btn-lg btn-success" id="btnPengadaan"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Simpan</button>
                            
                        </div>
                    </div>
                </div>
                </form>
            <?php }else{echo '<h3>Pengadaan Ini telah Berhasil melakukan Input penawaran, Halaman akan segera dikembalikan.</h3>' ;}?>    
            </div>
        </div>
    </div>
</div>
 
<script type="text/javascript">
function submitFormPengadaan() {

           //alert(TableDataPenyusun);
           var TableDataSurat = new Array();
            $('#tablesuratusaha tr').each(function(row, tr){
                TableDataSurat[row]={
                "psr_surat_izin" : $(tr).find('td:eq(0)').text()    //id surat izin
            }    
           }); 
           TableDataSurat.shift();  // first row will be empty - so remove
           TableDataSurat = JSON.stringify(TableDataSurat);
           //alert(TableDataSurat);

           document.getElementById('list_suratizin').value = TableDataSurat;
           //document.pengadaan_form.list_pekerjaan.value = TableDataPekerjaan;
           return true;
}
 $(':checkbox').checkboxpicker();
     
$(document).ready(function() {
    //fungsi insert sub judul
    $("#subjudul_form").submit(function(e) {               
        e.preventDefault();
        $.ajax({
            url: "<?php echo site_url('SubJudul/prosesInputSubJudul');?>",
            type: "POST",
            data: $(this).serialize(),
            success: function(msg) {
                if(msg === "0success"){
                    document.getElementById('sjd_sub_judul').value = "";
                    alert("Sub judul berhasil dibuat");
                }else if(msg === "1duplicate"){
                    alert("Sub judul sudah ada");
                }else if(msg === "empty"){
                   // alert(msg);
                }else{
                    alert(msg);
                }
            }
        });   
     });
     
     $(".optSubJudul-opt").select2({
       ajax: {
         url: "<?php echo site_url('SubJudul/select2All');?>",
         dataType: 'json',
         data: function (params) {
           return {
                q: params.term, // search term
                //page: params.page
           };
         },
         processResults: function (data, params) {
              //params.page = params.page || 1;
                    return {
            results: data,
        pagination: {
          more: (params.page * 30) < data.total_count
        }
      };
         }
       }
    });
    
    
    
    $('#chkBoxJudul').change(function () {
        var ischecked= $(this).is(':checked');
        if (ischecked){
            document.getElementById("frmSubJudul").style.display  = "block";
            //document.getElementById("lbl2_optSubJudul").style.display  = "inline";
        }else{
            document.getElementById("frmSubJudul").style.display  = "none";
            //document.getElementById("lbl2_optSubJudul").style.display  = "none";
        }
    });
    
    //fungsi insert biaya personil
    $("#dtl_konsultan1_form").submit(function(e) {               
        e.preventDefault();
        $.ajax({
            url: "<?php echo site_url('Pengadaan/proses_add_detail_kons1');?>",
            type: "POST",
            data: $(this).serialize(),
            success: function(status) {
                var obj = JSON.parse(status);
                var id = document.getElementById("dtp_pengadaan").value;
                
                drawTableBiayaPersonil(id);
            }
        });   
     });
    
    drawTableBiayaPersonil(document.getElementById("dtp_pengadaan").value);
     //fungsi draw table biaya personil
    function drawTableBiayaPersonil(id) {
        //alert('aw');
        $.ajax({
            url: "<?php echo site_url('Pengadaan/drawTableDetailKonsultan1');?>"+'/'+id,
            type: "POST",
            data: $(this).serialize(),
            success: function(data) {
                console.log(data);
                var data1 = JSON.parse(data);
                for (var i = 0; i < data1.kons.length; i++) {
                    //alert('aw '+i);
                    var item = data[i];
                    console.log(data1.kons[i].dtk_jabatan+'\n');
                    $('#table_personal tr:last').after("<tr><td><span>"+item.dtk_jabatan+"</span></td>\n\\n\
                        <td><span>"+item.dtk_kualifikasi_pendidikan+"</span></td>\n\
                        <td><span>"+item.dtk_jml_org+"</span></td>\n\\n\
                        <td><span>"+item.satVolume+"</span></td>\n\
                        <td><span>"+"Rp."+item.dtk_jml_bln+"</span></td>\n\
                        <td><span>"+"Rp."+item.dtk_intensitas+"</span></td>\n\\n\\n\
                        <td><span>"+"Rp."+item.dtk_kuantitas+"</span></td>\n\\n\\n\
                        <td><span>"+"Rp."+item.dtk_satuan+"</span></td>\n\\n\\n\
                        <td><span>"+"Rp."+item.dtk_intensitas+"</span></td>\n\\n\\n\
                        <td><span>"+"Rp."+item.dtk_biaya_personil_hps+"</span></td>\n\\n\
                        <td style='display:none;'><span>"+item.dtk_jml_biaya_hps+"</span></td>\n\
                        <td class='deleterow1' value='"+item.dtk_id+"'><div class='glyphicon glyphicon-remove'></div></td></tr>");
                }
            }
        });   
    }
     <?php if($pgd_status_pengadaan!=0){ ?>
        function goBack() {
            window.history.go(-2);
        }
        goBack();
     <?php } ?>
    $('#dtp_file').bind('change', function() {
        if ( window.FileReader && window.File && window.FileList && window.Blob )
        {
            if(this.files[0].type == "image/jpeg" || this.files[0].type == "image/png" || this.files[0].type == "application/pdf" || this.files[0].type == "image/gif"){
                if(this.files[0].size > 10485760){
                    alert("Ukuran file yang anda pilih terlalu besar.\n File dengan ukuran terlalu besar tidak akan disimpan pada sistem.");
                }
            }
            else{
                alert(this.files[0].type+"Tipe file yang anda masukkan tidak sesuai.\n File dengan tipe yang tidak sesuai spesifikasi tidak akan disimpan pada sistem.");
            }
        }
    });
    $('#dtp_hargasatuan_hps').bind('input', function() {
        //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
        var Harga = parseFloat(document.getElementById('dtp_hargasatuan_hps').value);
        if(!isNaN(Harga)){
            document.getElementById("lbl_hargasatuan").innerHTML = "Rp. "+Harga.format(0,3,'.');
        }else{
            document.getElementById("lbl_hargasatuan").innerHTML = "Rp.-";
        }
    });
    
    Number.prototype.format = function(n, x, s, c) {
        var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
            num = this.toFixed(Math.max(0, ~~n));

        return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
    };
    
    $("#clear").click(function(event){
        event.preventDefault();
        $("#dtp_file").replaceWith('<input type="file" class="" id="dtp_file" name="dtp_file" >');
      });
    $('#dtp_file').bind('change', function() {
        if ( window.FileReader && window.File && window.FileList && window.Blob )
        {
            if(this.files[0].type == "image/jpeg" || this.files[0].type == "image/png" || this.files[0].type == "application/pdf" || this.files[0].type == "image/gif"){
                if(this.files[0].size > 10485760){
                    alert("Ukuran file yang anda pilih terlalu besar.\n File dengan ukuran terlalu besar tidak akan disimpan pada sistem.");
                }
            }
            else{
                alert(this.files[0].type+"Tipe file yang anda masukkan tidak sesuai.\n File dengan tipe yang tidak sesuai spesifikasi tidak akan disimpan pada sistem.");
            }
        }
    });
   
    $(".suratizin-cbbox").select2();
    
    $("#addnewrowsuratusaha").on("click", function(){
        var tagSurat = document.getElementById("dsp_surat_izin");
        var idSurat = tagSurat.options[tagSurat.selectedIndex].value;
        var NamaSurat = tagSurat.options[tagSurat.selectedIndex].text;
        
        $('#tablesuratusaha tr:last').after("<tr><td style='display:none;'><span>"+idSurat+"</span></td>\n\\n\
                                            <td><span>"+NamaSurat+"</span></td>\n\
                                            <td class='deleterow'><div class='glyphicon glyphicon-remove'></div></td></tr>");
        $(".deleterow").on("click", function(){
            var $killrow = $(this).parent('tr');
            $killrow.addClass("danger");
            $killrow.fadeOut(2000, function(){
            $(this).remove();
            
        });});
    });
    
    $("#dtl_pengadaan_form").submit(function(e) {               
                e.preventDefault();
                $.ajaxFileUpload({
                    url: "<?php echo site_url('Pengadaan/proses_add_detail_pgd');?>",
                    secureuri       :false,
                    fileElementId   :'dtp_file',
                    dataType: 'JSON',
                    data : {
				'dtp_pekerjaan'	: $('#dtp_pekerjaan').val(),
                                'dtp_volume'	: $('#dtp_volume').val(),
                                'dtp_satuan'	: $('#dtp_satuan').val(),
                                'dtp_hargasatuan_hps'	: $('#dtp_hargasatuan_hps').val(),
                                'dtp_spesifikasi'	: $('#dtp_spesifikasi').val(),
                                'dtp_pengadaan'	: $('#dtp_pengadaan').val()
                    },
                    success: function(status) {
                        var obj = JSON.parse(status);
                        document.getElementById("dtp_id_sementara").value = obj.id;
                        var pekerjaan = document.getElementById("dtp_pekerjaan").value;
                        var spesifikasi = document.getElementById("dtp_spesifikasi").value;
                        var volume = document.getElementById("dtp_volume").value;
                        var satVolume = document.getElementById("dtp_satuan").value;
                        var harga = document.getElementById("dtp_hargasatuan_hps").value;
                        var file = document.getElementById("dtp_file").value;  
                        var tagFile;
                        if (file === "" || file === null){
                            tagFile =  ""
                        }else{
                            var urlfile = "<?php echo site_url('uploads/file_pengadaan');?>"+"/"+obj.namaFile;
                            tagFile =  "<a href='"+urlfile+"' target='_blank'>Gambar</a>"
                        }
                        $('#table_pekerjaan tr:last').after("<tr><td><span>"+pekerjaan+"</span></td>\n\\n\
                                                            <td><span>"+spesifikasi+"<br>"+tagFile+"</span></td>\n\
                                                            <td><span>"+volume+"</span></td>\n\\n\
                                                            <td><span>"+satVolume+"</span></td>\n\
                                                            <td><span>"+"Rp."+parseFloat(harga).format(0,3,'.')+"</span></td>\n\
                                                            <td><span>"+"Rp."+parseFloat(volume*harga).format(0,3,'.')+"</span></td>\n\\n\
                                                            <td style='display:none;'><span>"+(volume*harga)+"</span></td>\n\
                                                            <td class='deleterow1' value='"+obj.id+"'><div class='glyphicon glyphicon-remove'></div></td></tr>");
//                        var total =  parseFloat(document.getElementById('pgd_jml_sblm_ppn_hps').value);
//                        total = (total + (volume*harga));
//                        document.getElementById('pgd_jml_sblm_ppn_hps').value = total;
//                        document.getElementById('pgd_jml_ssdh_ppn_hps').value = total+(total*(0.1));
                        totHarga();
//                        document.getElementById('x_pgd_jml_sblm_ppn_hps').value = "Rp. "+total.format(0,3,'.');
//                        document.getElementById('x_pgd_jml_ssdh_ppn_hps').value = "Rp. "+(total+(total*(0.1))).format(0,3,'.');
                        
                        $(".deleterow1").on("click", function(){
                            var id = this.getAttribute("value");
                            var dd = this;
                         
                            $.ajax({
                                url: "<?php echo site_url('Pengadaan/proses_del_detail_pgd');?>"+"/"+id,
                                type: "POST",
                                data: $(this).serialize(),
                                success: function(msg) {
                                    //alert("halo");
                                    var $killrow = $(dd).parent('tr');
                                    $killrow.addClass("danger");
                                    $killrow.fadeOut(1000, function(){
                                        $killrow.remove();
//                                        var totHarga = (volume*harga);
//                                        var total =  parseFloat(document.getElementById('pgd_jml_sblm_ppn_hps').value);
//                                        total = total - totHarga;
//                                        document.getElementById('pgd_jml_sblm_ppn_hps').value = total;
//                                        document.getElementById('pgd_jml_ssdh_ppn_hps').value = total+(total*(0.1));
                                        totHarga();
//                                        if(total<=0){
//                                            document.getElementById('x_pgd_jml_sblm_ppn_hps').value = "Rp. 0";
//                                            document.getElementById('x_pgd_jml_ssdh_ppn_hps').value = "Rp. 0";
//                                        }else{
//                                            document.getElementById('x_pgd_jml_sblm_ppn_hps').value = "Rp. "+total.format(0,3,'.');
//                                            document.getElementById('x_pgd_jml_ssdh_ppn_hps').value = "Rp. "+(total+(total*(0.1))).format(0,3,'.');
//                                        }
                                        
                                    });
                                    //alert("hao");
                                }
                            });
                        });
                        
                        document.getElementById("dtp_pekerjaan").value ='';
                        document.getElementById("dtp_spesifikasi").value='';
                        document.getElementById("dtp_volume").value='';
                        document.getElementById("dtp_satuan").value='';
                        document.getElementById("dtp_hargasatuan_hps").value='';  
                        document.getElementById("lbl_hargasatuan").innerHTML = "Rp.-";
                        $("#dtp_file").replaceWith('<input type="file" class="" id="dtp_file" name="dtp_file" >');
                    }
                      
     });
        return false;
     });
     
     $(".deleterowsurat").on("click", function(){
            var $killrow = $(this).parent('tr');
            $killrow.addClass("danger");
            $killrow.fadeOut(1000, function(){
            $(this).remove();
            totHarga();
        });});
     
     $(".deleterow").on("click", function(){
            var idDetail = this.getAttribute("value");
            var dd = this;
            $.ajax({
                url: "<?php echo site_url('Pengadaan/proses_del_detail_pgd');?>"+"/"+idDetail,
                type: "POST",
                data: $(this).serialize(),
                success: function(msg) {
                    var $killrow = $(dd).parent('tr');
                    $killrow.addClass("danger");
                    $killrow.fadeOut(1000, function(){
                            $killrow.remove(); 
                            totHarga();
                    });
                    
                    //alert("hao");
                }
            });
        });
        totHarga();
    function totHarga() {
        var TableData = new Array();

        $('#table_pekerjaan tr').each(function(row, tr){
            TableData[row]={
                "jumlah" : $(tr).find('td:eq(6)').text()
            }    
        }); 
        TableData.shift();  // first row will be empty - so remove
        var totSemuaPnr = 0;
        //alert(TableData.toString());
        TableData.forEach( function (arrayItem)
        {
            var nilai = parseFloat(arrayItem.jumlah);
            if(!isNaN(nilai)){
                totSemuaPnr = totSemuaPnr + nilai;
                //alert(nilai);
            }
            //alert(nilai);
        });
         //alert("tot "+totSemuaPnr);
        //totSemuaPnr = parseFloat(totSemuaPnr).toFixed(2);                                       
        if(!isNaN(totSemuaPnr)){
            document.getElementById("pgd_jml_sblm_ppn_hps").value = parseFloat(totSemuaPnr).toFixed(2);
            document.getElementById("pgd_jml_ssdh_ppn_hps").value = parseFloat(totSemuaPnr+(totSemuaPnr*0.1)).toFixed(2);
            var total = parseFloat(document.getElementById("pgd_jml_sblm_ppn_hps").value);
            var totalP = parseFloat(document.getElementById("pgd_jml_ssdh_ppn_hps").value);
            //alert(total);
            document.getElementById('x_pgd_jml_sblm_ppn_hps').value = "Rp. "+total.format(0,3,'.');
            document.getElementById('x_pgd_jml_ssdh_ppn_hps').value = "Rp. "+totalP.format(0,3,'.');
        }else{
            document.getElementById("pgd_jml_sblm_ppn_pnr").value = "Input tidak Valid";
        }
    }

    $('#anggaran_form').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {       
            ang_kode1: {
                validators: {
                    notEmpty: {
                        message: 'Data tidak boleh kosong'
                    }                    
                }
            },
            ang_name: {
                validators: {
                    notEmpty: {
                        message: 'Data tidak boleh kosong'
                    }                    
                }
            }
        }
    });
    
    
    

});
        
</script>