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
                        
                        <div class="panel panel-default">
                            
                            <div class="panel-body">
                                <div class="row">                    
                                    <div class="col-md-8">
                                        <h4><b>Biaya Personil</b></h4>
                                    </div>                                           
                                </div> 
                                
                                <br>
                                <form method="post" id = "dtl_konsultan1_form"  action = "" class="form-horizontal" data-toggle="validator">
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
                                           <input required type="text" class="form-control" id="dtk_jabatan" name="dtk_jabatan" placeholder="Jabatan"> 
                                           <div class="help-block with-errors"></div>
                                           </div>
                                        </div>
                                        <div class="form-group">      
                                           <label for="dtk_kualifikasi_pendidikan" class="col-sm-4 control-label text-left">Kualifikasi Pendidikan</label> 
                                           <div class="col-sm-8">
                                           <input required type="text" class="form-control" id="dtk_kualifikasi_pendidikan" name="dtk_kualifikasi_pendidikan" placeholder="Kualifikasi Pendidikan"> 
                                           <div class="help-block with-errors"></div>
                                           </div>
                                        </div>
                                        <div class="form-group">
                                           <label for="dtk_jml_org" class="col-sm-4 control-label text-left">Jumlah Orang</label>
                                           <div class="col-sm-8">
                                           <input required type="text" class="form-control" id="dtk_jml_org" name="dtk_jml_org" placeholder="Jumlah Orang" data-error="Data yang dimasukkan harus angka" pattern="^[0-9\s]*$">
                                           <div class="help-block with-errors"></div>
                                           </div>
                                        </div>
                                        <div class="form-group">
                                           <label for="dtk_jml_bln" class="col-sm-4 control-label text-left">Jumlah Bulan</label>
                                           <div class="col-sm-8">
                                           <input required type="text" class="form-control" id="dtk_jml_bln" name="dtk_jml_bln" placeholder="Jumlah Bulan" data-error="Data yang dimasukkan harus angka, jika ada koma gunakan tanda titik(.) sebagai koma" pattern="^[0-9.\s]*$">
                                           <div class="help-block with-errors"></div>
                                           </div>
                                        </div>
                                        </div>
                                    <div class ="col-md-6">   
                                        <div class="form-group">
                                           <label for="dtk_intensitas" class="col-sm-4 control-label text-left">Intensitas</label>
                                           <div class="col-sm-8">
                                           <input required type="text" class="form-control" id="dtk_intensitas" name="dtk_intensitas" placeholder="Intensitas" data-error="Data yang dimasukkan harus angka, jika ada koma gunakan tanda titik(.) sebagai koma" pattern="^[0-9.\s]*$">
                                           <div class="help-block with-errors"></div>
                                           </div>
                                        </div>
                                        <div class="form-group">
                                           <label for="dtk_satuan" class="col-sm-4 control-label text-left">Satuan</label>
                                           <div class="col-sm-8">
                                           <input required type="text" class="form-control" id="dtk_satuan" name="dtk_satuan" placeholder="Satuan">
                                           <div class="help-block with-errors"></div>
                                           </div>
                                        </div>
                                        <div class="form-group">                                    
                                            <label for="dtk_biaya_personil_hps" class="col-sm-4 control-label text-left">Biaya Personil</label>
                                            <div class="col-sm-8">
                                            <input required class="form-control" id="dtk_biaya_personil_hps" name="dtk_biaya_personil_hps" placeholder="Biaya personil(Rp)" data-error="Data yang dimasukkan harus angka, jika terdapat koma gunakan titik(.) sebagai koma" pattern="^[0-9.\s]*$">
                                            <label id="lbl_biayapersonil" class="pull-left">Rp.-</label>
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
                                        <input type="hidden" class="form-control" id="pgd_dgn_pajak1" name="pgd_dgn_pajak1" value= "<?php echo $pgd_dgn_pajak;?>">
                                    </div>
                                     
                                </div>
                                </form>
                                <br>   
                                <br>
                                <div class="row">
                                    <div class="table-responsive">
                                       <table class="table table-striped table-bordered table-hover text-center" id="table_personal">
                                         <thead >
                                           <tr bgcolor='#BDBDBD'>
                                             <th class="text-center">Jabatan</th>
                                             <th class="text-center">Kualifikasi Pend</th>
                                             <th class="text-center">Jml Org</th>
                                             <th class="text-center">Jml Bln</th>
                                             <th class="text-center">Intensitas</th>
                                             <th class="text-center">Kuantitas</th>
                                             <th class="text-center">Satuan</th>
                                             <th class="text-center">Biaya Personil</th>
                                             <th class="text-center">Jml Biaya</th>
                                             <th class="text-center">Act</th>
                                           </tr>
                                         </thead>
                                         <tbody>
                                             <tbody>
                                                
                                            </tbody>
                                         </tbody>
                                       </table>
                                   </div>
                                </div>
                                <div class="row"> 
                                    <div class ='col-sm-3 pull-right'> 
                                    <label id = "total_label" class="control-label text-center pull-right">Total : &nbsp;</label>
                                    <input type="text" class="form-control" id="x_jml_sblm_ppn_kons1"  value='<?php echo 'Rp.'.number_format($pgd_jml_sblm_ppn_hps,0,",","."); ?>' readonly>
                                    </div> 
                                    <br>
                                    <button class='btn btn-primary pull-left' id="refreshtablepersonil">Refresh Tabel</button>                  
                                </div>
                            </div>
                        </div>    
                                  
                    </div>
 <!------Biaya langsung non personil--------------------------------------------------------------------------------------------------->
 
            
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
                                    <form method="post" id = "dtl_konsultan2_form"  action = "" class="form-horizontal" data-toggle="validator">
                                    <div class ="col-md-6">
                                        <div class="form-group">
                                           <label for="chkBoxJudul2" class="col-sm-4 control-label text-left">Tambah Sub Judul</label> 
                                           <div class="col-sm-8">
                                                <input data-style="btn-group-sm" id = "chkBoxJudul2" class ="chkBoxJudul pull-right" type="checkbox" data-off-label="Tidak" data-on-label="Ya" name ="dtk2_stat_sub_judul" value="1">
                                           </div>
                                        </div>
                                        <div id = "frmSubJudul2" hidden class="form-group">
                                            <label id ="lbl_optSubJudul2" for="optSubJudul2" class="col-sm-4 control-label text-left">Sub Judul</label>
                                            <div class="col-sm-8">
                                                <select hidden  id ="optSubJudul2" class="optSubJudul-opt2 form-control" style="width: 100%" name="dtk2_sub_judul">                                                       
                                                </select>                      
                                            </div>
                                        </div>
                                        <div class="form-group">      
                                           <label for="dtk2_pekerjaan" class="col-sm-4 control-label text-left">Uraian</label> 
                                           <div class="col-sm-8">
                                           <input required type="text" class="form-control" id="dtk2_pekerjaan" name="dtk2_pekerjaan" placeholder="Uraian"> 
                                           <div class="help-block with-errors"></div>
                                           </div>
                                        </div>
                                        <div class="form-group">
                                           <label for="dtk2_volume" class="col-sm-4 control-label text-left">Volume</label>
                                           <div class="col-sm-8">
                                           <input required type="text" class="form-control" id="dtk2_volume" name="dtk2_volume" placeholder="Volume" data-error="Data yang dimasukkan harus angka, jika terdapat koma gunakan titik(.) sebagai koma" pattern="^[0-9.\s]*$">
                                           <div class="help-block with-errors"></div>
                                           </div>
                                        </div>
                                        <div class="form-group">
                                           <label for="dtk2_satuan" class="col-sm-4 control-label text-left">Satuan Volume</label>
                                           <div class="col-sm-8">
                                           <input required type="text" class="form-control" id="dtk2_satuan" name="dtk2_satuan" placeholder="Satuan Volume (Contoh : m2, liter, unit, dll">
                                           <div class="help-block with-errors"></div>
                                           </div>
                                        </div>
                                        <div class="form-group">                                    
                                            <label for="dtk2_hargasatuan_hps" class="col-sm-4 control-label text-left">Harga Satuan</label>
                                            <div class="col-sm-8">
                                            <input required class="form-control" id="dtk2_hargasatuan_hps" name="dtk2_hargasatuan_hps" placeholder="Harga satuan(Rp)" data-error="Data yang dimasukkan harus angka, jika terdapat koma gunakan titik(.) sebagai koma" pattern="^[0-9.\s]*$">
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
                                            <textarea  class="form-control" id="dtk2_spesifikasi" name="dtk2_spesifikasi" placeholder="Spesifikasi Teknis"></textarea>
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
                                        <!--hidden atribut untuik biaya non personil-->
                                        <input type="hidden" class="form-control" id="sub_pgd_tipe_pengadaan" name="sub_pgd_tipe_pengadaan" value= "<?php echo $pgd_tipe_pengadaan;?>">
                                        <input type="hidden" class="form-control" id="dtk2_pengadaan" name="dtk2_pengadaan" value= "<?php echo $dtp_pengadaan;?>">
                                        <input type="hidden" class="form-control" id="pgd_dgn_pajak2" name="pgd_dgn_pajak2" value= "<?php echo $pgd_dgn_pajak;?>">
                                    </div>
                                   </form>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="table-responsive">
                                       <table class="table table-striped table-bordered table-hover text-center" id="table_non_personal">
                                         <thead >
                                           <tr >
                                             <th bgcolor='#BDBDBD' class="text-center">Uraian</th>
                                             <th bgcolor='#BDBDBD' class="text-center">Spec</th>
                                             <th bgcolor='#BDBDBD' class="text-center">Vol</th>
                                             <th bgcolor='#BDBDBD' class="text-center">Sat</th>
                                             <th bgcolor='#BDBDBD' class="text-center">Hrg</th>
                                             <th bgcolor='#BDBDBD' class="text-center">Tot</th>
                                             <th bgcolor='#BDBDBD' class="text-center">Act</th>
                                           </tr>
                                         </thead>
                                         <tbody>
                                             <tbody>
                                                
                                            </tbody>
                                         </tbody>
                                       </table>
                                   </div>
                                </div>
                                <div class="row"> 
                                    <div class ='col-sm-3 pull-right'> 
                                    <label id = "total_label" class="control-label text-center pull-right">Total : &nbsp;</label>
                                    <input type="text" class="form-control" id="x_jml_sblm_ppn_kons2"  value='<?php echo 'Rp.'.number_format($pgd_jml_sblm_ppn_hps,0,",","."); ?>' readonly>
                                    </div> 
                                    <br>
                                    <button class='btn btn-primary pull-left' id="refreshtablenonpersonil">Refresh Tabel</button> 
                                 
                                </div>
                            </div>
                        </div>
                    </div>
<!------Rekapitulasi------------------------->  
            <div class="col-md-12"> 
                <div class="panel panel-default">
                <div class="panel-body">
                    <h4><b>Rekap Biaya</b></h4>
                <table class="table table-striped table-bordered table-hover" width="50%">
                    <tbody>
                    	<tr>
                        	<th>Total Biaya Personil</th>
                        	<td><label id ="total_personil" class="control-label">Rp.-</label></td>
                        </tr>
                    	<tr>
                        	<th>Total Biaya Non Personil</th>
                        	<td><label id ="total_non_personil" class="control-label">Rp.-</label></td>
                        </tr>
                    	<tr>
                        	<th>Total Keseluruhan</th>
                        	<td><label id ="total_keseluruhan" class="control-label">Rp.-</label></td>
                        </tr>
                        <?php if ($pgd_dgn_pajak=='0'){?>
                        <tr>
                        	<th>Total Keseluruhan Dengan Pajak</th>
                        	<td><label id ="total_keseluruhan_pajak" class="control-label">Rp.-</label></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                    </div>
                </div>
            <br>
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
     
     <?php if($pgd_status_pengadaan==0){ ?>
     //fungsi select2 sub judul konsultan 1
     $(".optSubJudul-opt").select2({
       ajax: {
         url: "<?php echo site_url('SubJudul/select2All');?>"+"/"+document.getElementById("pgd_tipe_pengadaan").value,
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
    
    //fungsi sub judul konsultan 2
    $(".optSubJudul-opt2").select2({
        
       ajax: {
         url: "<?php echo site_url('SubJudul/select2All');?>"+"/"+document.getElementById("pgd_tipe_pengadaan").value,
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
     <?php } ?>
    //fungsi hidden/tidak subjudul kons1
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
    
    //fungsi hidden/tidak subjudul kons2
    $('#chkBoxJudul2').change(function () {
        var ischecked= $(this).is(':checked');
        if (ischecked){
            document.getElementById("chkBoxJudul2").value = 1;
            document.getElementById("frmSubJudul2").style.display  = "block";
            //document.getElementById("lbl2_optSubJudul").style.display  = "inline";
        }else{
            document.getElementById("chkBoxJudul2").value = 0;
            document.getElementById("frmSubJudul2").style.display  = "none";
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
            success: function() {
                document.getElementById("dtk_jabatan").value ='';
                document.getElementById("dtk_kualifikasi_pendidikan").value='';
                document.getElementById("dtk_jml_org").value='';
                document.getElementById("dtk_jml_bln").value='';
                document.getElementById("dtk_intensitas").value='';  
                document.getElementById("dtk_satuan").value='';
                document.getElementById("dtk_biaya_personil_hps").value='';
                document.getElementById("lbl_biayapersonil").innerHTML='Rp.-';
                var id = document.getElementById("dtp_pengadaan").value;
                deleteAllTable('table_personal');
                drawTableBiayaPersonil(id);
                getTotalKonsultan(id);
            }
        });   
     });
    
    //fungsi insert biaya non personil
    $("#dtl_konsultan2_form").submit(function(e) {               
        e.preventDefault();
        $.ajaxFileUpload({
            url: "<?php echo site_url('Pengadaan/proses_add_detail_kons2');?>",
            secureuri       :false,
            fileElementId   :'dtk2_file',
            dataType: 'JSON',
            data : {
                        'dtk2_pekerjaan'	: $('#dtk2_pekerjaan').val(),
                        'dtk2_volume'	: $('#dtk2_volume').val(),
                        'dtk2_satuan'	: $('#dtk2_satuan').val(),
                        'dtk2_hargasatuan_hps'	: $('#dtk2_hargasatuan_hps').val(),
                        'dtk2_spesifikasi'	: $('#dtk2_spesifikasi').val(),
                        'dtk2_stat_sub_judul'	: $('#chkBoxJudul2').val(),
                        'dtk2_sub_judul'	: $('#optSubJudul2').val(),
                        'dtk2_pengadaan'	: $('#dtk2_pengadaan').val()
            },
            success: function() {
                document.getElementById("dtk2_pekerjaan").value ='';
                document.getElementById("dtk2_spesifikasi").value='';
                document.getElementById("dtk2_volume").value='';
                document.getElementById("dtk2_satuan").value='';
                document.getElementById("dtk2_hargasatuan_hps").value='';  
                document.getElementById("lbl_hargasatuan").innerHTML = "Rp.-";
                $("#dtk2_file").replaceWith('<input type="file" class="" id="dtk2_file" name="dtk2_file" >');
                var id = document.getElementById("dtk2_pengadaan").value;
                deleteAllTable('table_non_personal');
                drawTableBiayaNonPersonil(id);
                getTotalKonsultan(id);
            }
        });   
     });
    
    
    
    //fungsi ambil total biaya konsultan
    function getTotalKonsultan(idPengadaan) {
        $.ajax({
            url: "<?php echo site_url('Pengadaan/getTotalHargaKonsultan');?>"+'/'+idPengadaan,
            type: "POST",
            data: $(this).serialize(),
            success: function(total) {
                var obj = JSON.parse(total);
                //alert(document.getElementById("pgd_dgn_pajak").value);
                document.getElementById("x_jml_sblm_ppn_kons1").value = "Rp. "+(parseFloat(obj.jmlKons1)).format(0,3,'.');
                document.getElementById("x_jml_sblm_ppn_kons2").value = "Rp. "+(parseFloat(obj.jmlKons2)).format(0,3,'.');
                document.getElementById("total_personil").innerHTML = "Rp. "+(parseFloat(obj.jmlKons1)).format(0,3,'.');
                document.getElementById("total_non_personil").innerHTML = "Rp. "+(parseFloat(obj.jmlKons2)).format(0,3,'.');
                document.getElementById("total_keseluruhan").innerHTML = "Rp. "+(parseFloat(obj.jmlSblmPPNHps)).format(0,3,'.');
                if(parseFloat(document.getElementById("pgd_dgn_pajak").value) === 0)
                    document.getElementById("total_keseluruhan_pajak").innerHTML = "Rp. "+(parseFloat(obj.jmlSsdhPPNHps)).format(0,3,'.');
//                document.getElementById("dtp_pengadaan").value = obj.jmlSsdhPPNHps;
//                document.getElementById("dtp_pengadaan").value = obj.jmlSblmPPNHps;
//                document.getElementById("dtp_pengadaan").value = obj.jmlSsdhPPNHps;
            }
        });   
     }
     
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
                var i = 0;
                var judul;
                var item;
                var counter = 1;
                var dgnPajak = document.getElementById("pgd_dgn_pajak").value;
                while(i < data1.kons.length){
                    //alert('aw '+i);
                    item = data1.kons[i];
                    if(item.dtk_sub_judul !== '-99'){
                        judul = 1;
                    }else{
                        judul = 0;
                    }
                    console.log('judul : '+judul+'\n');
                    if(judul === 1){
                        var subjudul = item.dtk_sub_judul;
                        $('#table_personal tr:last').after("<tr><td><span><b>"+counter+". "+item.sjd_sub_judul+"</b></span></td>\n\\n\
                        <td><span></span></td>\n\
                        <td><span></span></td>\n\\n\
                        <td><span></span></td>\n\
                        <td><span></span></td>\n\\n\\n\
                        <td><span></span></td>\n\\n\\n\
                        <td><span></span></td>\n\\n\\n\
                        <td><span></span></td>\n\\n\\n\
                        <td><span></span></td>\n\
                        <td></td></tr>");
                        counter++;
                        while(i < data1.kons.length && item.dtk_sub_judul === subjudul){
                             $('#table_personal tr:last').after("<tr><td><span>"+item.dtk_jabatan+"</span></td>\n\\n\
                                <td><span>"+item.dtk_kualifikasi_pendidikan+"</span></td>\n\
                                <td><span>"+item.dtk_jml_org+"</span></td>\n\\n\
                                <td><span>"+parseFloat(item.dtk_jml_bln)+"</span></td>\n\
                                <td><span>"+parseFloat(item.dtk_intensitas)+"</span></td>\n\\n\\n\
                                <td><span>"+parseFloat(item.dtk_kuantitas)+"</span></td>\n\\n\\n\
                                <td><span>"+item.dtk_satuan+"</span></td>\n\\n\\n\
                                <td><span>"+"Rp."+parseFloat(item.dtk_biaya_personil_hps).format(0,3,'.')+"</span></td>\n\\n\
                                <td><span>"+"Rp."+parseFloat(item.dtk_jml_biaya_hps).format(0,3,'.')+"</span></td>\n\
                                <td class='deleterowpersonal"+item.dtk_id+"' value='"+item.dtk_id+"'><div class='glyphicon glyphicon-remove'></div></td></tr>");
                            deleteRow('deleterowpersonal'+item.dtk_id, "<?php echo site_url('Pengadaan/proses_del_detail_konsultan1');?>"+"/"+item.dtk_id+"/"+dgnPajak);
                            i++;
                            item = data1.kons[i];
                        }
                        $('#table_personal tr:last').after("<tr><td bgcolor='#BDBDBD'></td>\n\\n\
                        <td bgcolor='#BDBDBD'><span></span></td>\n\
                        <td bgcolor='#BDBDBD'><span></span></td>\n\\n\
                        <td bgcolor='#BDBDBD'><span></span></td>\n\
                        <td bgcolor='#BDBDBD'><span></span></td>\n\\n\\n\
                        <td bgcolor='#BDBDBD'><span></span></td>\n\\n\\n\
                        <td bgcolor='#BDBDBD'><span></span></td>\n\\n\\n\
                        <td bgcolor='#BDBDBD'><span></span></td>\n\\n\
                        <td bgcolor='#BDBDBD' ><span></span></td>\n\
                        <td bgcolor='#BDBDBD'></td></tr>");
                    }else{
                         //console.log(data1.kons[i].dtk_jabatan+'\n');
                        $('#table_personal tr:last').after("<tr><td><span>"+item.dtk_jabatan+"</span></td>\n\\n\
                            <td><span>"+item.dtk_kualifikasi_pendidikan+"</span></td>\n\
                            <td><span>"+item.dtk_jml_org+"</span></td>\n\\n\
                            <td><span>"+parseFloat(item.dtk_jml_bln)+"</span></td>\n\
                            <td><span>"+parseFloat(item.dtk_intensitas)+"</span></td>\n\\n\\n\
                            <td><span>"+parseFloat(item.dtk_kuantitas)+"</span></td>\n\\n\\n\
                            <td><span>"+item.dtk_satuan+"</span></td>\n\\n\\n\
                            <td><span>"+"Rp."+parseFloat(item.dtk_biaya_personil_hps).format(0,3,'.')+"</span></td>\n\\n\
                            <td><span>"+"Rp."+parseFloat(item.dtk_jml_biaya_hps).format(0,3,'.')+"</span></td>\n\
                            <td class='deleterowpersonal"+item.dtk_id+"' value='"+item.dtk_id+"'><div class='glyphicon glyphicon-remove'></div></td></tr>");
                        deleteRow('deleterowpersonal'+item.dtk_id, "<?php echo site_url('Pengadaan/proses_del_detail_konsultan1');?>"+"/"+item.dtk_id+"/"+dgnPajak);
                        i++;
                    }
                   
                    
                }
               
            }
        });   
    }
    
    //fungsi draw table non biaya personil
    function drawTableBiayaNonPersonil(id) {
        //alert('aw');
        $.ajax({
            url: "<?php echo site_url('Pengadaan/drawTableDetailKonsultan2');?>"+'/'+id,
            type: "POST",
            data: $(this).serialize(),
            success: function(data) {
                console.log(data);
                var data2 = JSON.parse(data);
                var i = 0;
                var judul;
                var item;
                var counter = 1;
                var dgnPajak = document.getElementById("pgd_dgn_pajak2").value;
                while(i < data2.kons.length){
                    //alert('aw '+i);
                    item = data2.kons[i];
                    if(item.dtk2_sub_judul !== '-99'){
                        judul = 1;
                    }else{
                        judul = 0;
                    }
                    console.log('judul : '+judul+'\n');
                    if(judul === 1){
                        var subjudul = item.dtk2_sub_judul;
                        $('#table_non_personal tr:last').after("<tr><td><span><b>"+counter+". "+item.sjd_sub_judul+"</b></span></td>\n\\n\
                        <td><span></span></td>\n\
                        <td><span></span></td>\n\\n\
                        <td><span></span></td>\n\
                        <td><span></span></td>\n\\n\\n\
                        <td><span></span></td>\n\\n\\n\
                        <td></td></tr>");
                        counter++;
                        while(i < data2.kons.length && item.dtk2_sub_judul === subjudul){
                            var tagFile;
                            if (item.dtk2_file === "" || item.dtk2_file === null){
                                tagFile =  ""
                            }else{
                                var urlfile = "<?php echo site_url('uploads/file_pengadaan');?>"+"/"+item.dtk2_file;
                                tagFile =  "<a href='"+urlfile+"' target='_blank'>Gambar</a>"
                            }
                            
                             $('#table_non_personal tr:last').after("<tr><td><span>"+item.dtk2_pekerjaan+"</span></td>\n\\n\
                                <td><span>"+item.dtk2_spesifikasi+"<br>"+tagFile+"</span></td>\n\
                                <td><span>"+parseFloat(item.dtk2_volume)+"</span></td>\n\\n\
                                <td><span>"+item.dtk2_satuan+"</span></td>\n\
                                <td><span>"+"Rp."+parseFloat(item.dtk2_hargasatuan_hps).format(0,3,'.')+"</span></td>\n\
                                <td><span>"+"Rp."+parseFloat((item.dtk2_volume)*(item.dtk2_hargasatuan_hps)).format(0,3,'.')+"</span></td>\n\\n\
                                <td class='deleterownonpersonal"+item.dtk2_id+"' value='"+item.dtk2_id+"'><div class='glyphicon glyphicon-remove'></div></td></tr>");
                            deleteRow('deleterownonpersonal'+item.dtk2_id, "<?php echo site_url('Pengadaan/proses_del_detail_konsultan2');?>"+"/"+item.dtk2_id+"/"+dgnPajak);
                            i++;
                            item = data2.kons[i];
                        }
                        $('#table_non_personal tr:last').after("<tr><td bgcolor='#BDBDBD'></td>\n\\n\
                        <td bgcolor='#BDBDBD'><span></span></td>\n\\n\\n\
                        <td bgcolor='#BDBDBD'><span></span></td>\n\\n\\n\
                        <td bgcolor='#BDBDBD'><span></span></td>\n\\n\\n\
                        <td bgcolor='#BDBDBD'><span></span></td>\n\\n\
                        <td bgcolor='#BDBDBD' ><span></span></td>\n\
                        <td bgcolor='#BDBDBD'></td></tr>");
                    }else{
                        var tagFile;
                            if (item.dtk2_file === "" || item.dtk2_file === null){
                                tagFile =  ""
                            }else{
                                var urlfile = "<?php echo site_url('uploads/file_pengadaan');?>"+"/"+item.dtk2_file;
                                tagFile =  "<a href='"+urlfile+"' target='_blank'>Gambar</a>"
                            }
                         //console.log(data1.kons[i].dtk_jabatan+'\n');
                        $('#table_non_personal tr:last').after("<tr><td><span>"+item.dtk2_pekerjaan+"</span></td>\n\\n\
                                <td><span>"+item.dtk2_spesifikasi+"<br>"+tagFile+"</span></td>\n\
                                <td><span>"+parseFloat(item.dtk2_volume)+"</span></td>\n\\n\
                                <td><span>"+item.dtk2_satuan+"</span></td>\n\
                                <td><span>"+"Rp."+parseFloat(item.dtk2_hargasatuan_hps).format(0,3,'.')+"</span></td>\n\
                                <td><span>"+"Rp."+parseFloat((item.dtk2_volume)*(item.dtk2_hargasatuan_hps)).format(0,3,'.')+"</span></td>\n\\n\
                                <td class='deleterownonpersonal"+item.dtk2_id+"' value='"+item.dtk2_id+"'><div class='glyphicon glyphicon-remove'></div></td></tr>");
                            deleteRow('deleterownonpersonal'+item.dtk2_id, "<?php echo site_url('Pengadaan/proses_del_detail_konsultan2');?>"+"/"+item.dtk2_id+"/"+dgnPajak);
                        i++;
                    }
                   
                    
                }
               
            }
        });   
    }
    
    function deleteRow(idTag, siteUrl) {
        $("."+idTag).on("click", function(){
            var id = this.getAttribute("value");
            var dd = this;
            $.ajax({
                url: siteUrl,
                type: "POST",
                data: $(this).serialize(),
                success: function(msg) {
                    //alert("halo");
                    var $killrow = $(dd).parent('tr');
                    $killrow.addClass("danger");
                    $killrow.fadeOut(1000, function(){
                        $killrow.remove();
                        var dtp_pengadaan = document.getElementById("dtp_pengadaan").value;
                        getTotalKonsultan(dtp_pengadaan);                                  
                    });
                    //alert("hao");
                }
            });
        });
    }
    
    //fungsi delete all table
    function deleteAllTable(idTag) {
       $('#'+idTag+' td').remove()
    }
    
    //fungsi bind untuk rupiah kons1
    $('#dtk_biaya_personil_hps').bind('input', function() {
        //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
        var Harga = parseFloat(document.getElementById('dtk_biaya_personil_hps').value);
        if(!isNaN(Harga)){
            document.getElementById("lbl_biayapersonil").innerHTML = "Rp. "+Harga.format(0,3,'.');
        }else{
            document.getElementById("lbl_biayapersonil").innerHTML = "Rp.-";
        }
    });
    
    //fungsi bind untuk rupiah kons2
    $('#dtk2_hargasatuan_hps').bind('input', function() {
        //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
        var Harga = parseFloat(document.getElementById('dtk2_hargasatuan_hps').value);
        if(!isNaN(Harga)){
            document.getElementById("lbl_hargasatuan").innerHTML = "Rp. "+Harga.format(0,3,'.');
        }else{
            document.getElementById("lbl_hargasatuan").innerHTML = "Rp.-";
        }
    });
    
    //fungsi untuk refresh table personil
    $('#refreshtablepersonil').click(function(){
        deleteAllTable('table_personal');
        var dtp_pengadaan = document.getElementById("dtp_pengadaan").value;
        getTotalKonsultan(dtp_pengadaan);
        drawTableBiayaPersonil(dtp_pengadaan);
    });
    
    //fungsi untuk refresh table non personil
    $('#refreshtablenonpersonil').click(function(){
        deleteAllTable('table_non_personal');
        var dtp_pengadaan = document.getElementById("dtk2_pengadaan").value;
        getTotalKonsultan(dtp_pengadaan);
        drawTableBiayaNonPersonil(dtp_pengadaan);
    });
    
    //fungsi untuk memeriksa ukuran dan tipe file
    $('#dtk2_file').bind('change', function() {
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
    
     <?php if($pgd_status_pengadaan!=0){ ?>
        function goBack() {
            window.history.go(-2);
        }
        goBack();
     <?php } else{ ?>
        //inisialisasi awal pada saat buka page
        var dtp_pengadaan = document.getElementById("dtp_pengadaan").value;
        getTotalKonsultan(dtp_pengadaan);
        drawTableBiayaPersonil(dtp_pengadaan);
        drawTableBiayaNonPersonil(dtp_pengadaan); 
     <?php }?>
             
    
    Number.prototype.format = function(n, x, s, c) {
        var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
            num = this.toFixed(Math.max(0, ~~n));

        return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
    };
    
    $("#clear").click(function(event){
        event.preventDefault();
        $("#dtk2_file").replaceWith('<input type="file" class="" id="dtk2_file" name="dtk2_file" >');
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

     $(".deleterowsurat").on("click", function(){
            var $killrow = $(this).parent('tr');
            $killrow.addClass("danger");
            $killrow.fadeOut(1000, function(){
            $(this).remove();
            totHarga();
        });});
     
});
        
</script>