<?php
    $pgd_id = $dataPengadaan->pgd_id;
    $unp_id = $dataPengadaan->unp_id;
?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php // echo "$title"; ?></h3>
            </div>
            <div class="panel-body">
            <form method="post" id = "personel_form" action="<?php //if($statuspage == 'edit'){echo base_url()."Supplier/proses_edit_supplier";}else{echo base_url()."Supplier/proses_tambah_supplier";}?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
            <?php //if($statuspage == 'edit'){ ?> <input type="hidden" name="id" value="<?php //echo $id; ?>"><?php // }?>
                
            <h4><b>UNSUR KUALIFIKASI TENAGA AHLI BOBOT 60</b></h4><br>
            
            <div class="panel panel-default">
                            <div class="panel-body">
                                
                                <div class="row">
                                    <div class ="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="col-sm-4 control-label text-left">Nama</label>
                                           <div class ="col-sm-8">
                                             <input type="text" class="form-control" id="psi_nama" name="psi_nama" placeholder="Nama" data-error="Masukkan Nama Pegawai" >
                                            <div class="help-block with-errors"></div>  
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="" class="col-sm-4 control-label text-left">Jabatan</label>
                                           <div class ="col-sm-8">
                                            <select class="form-control optJabatan-opt2" id="psi_jabatan" name="psi_jabatan" required>
                                                 <option value="" >-</option>
                                             </select>  
                                           </div>  
                                        </div>
                                        <input type="hidden" class="form-control" id="pgd_id" name="pgd_id" value= "<?php echo $pgd_id;?>">
<script type="text/javascript">
$(document).ready(function() {
//fungsi select2 jabatan
    $(".optJabatan-opt2").select2({
        
       ajax: {
         url: "<?php echo site_url('KonsultanTeknis/select2AllDetailJabatanKonsultan');?>"+"/"+document.getElementById("pgd_id").value,
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
});
</script>
                                         <div class="form-group">
                                            <label for="" class="col-sm-4 control-label text-left">Bobot</label>
                                           <div class ="col-sm-8">
                                             <input type="text" class="form-control" id="psi_bobot" name="psi_bobot" placeholder="Bobot" data-error="Data yang dimasukkan harus angka, jika terdapat koma gunakan titik(.) sebagai koma" pattern="^[0-9.\s]*$">
                                            <div class="help-block with-errors"></div>  
                                           </div>
                                        </div>
                                        
                                    </div>
                                        
                      
                                    <div class ="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="col-sm-4 control-label text-left">Kesesuaian Ijasah</label>
                                           <div class ="col-sm-8">
                                            <select class="form-control" id="psi_kesesuaian_ijasah" name="psi_kesesuaian_ijasah" required>
                                                 <option value="" >-</option>
                                                 <option value="S" >S</option>
                                                 <option value="SB" >SB</option>
                                                 <option value="TS" >TS</option>
                                                 <option value="K" >K</option>
                                             </select>  
                                           </div>  
                                           </div>
                                        
                                        <div class="form-group">
                                            <label for="" class="col-sm-4 control-label text-left">SERTIFIKASI KEAHLIAN/PELATIHAN</label>
                                           <div class ="col-sm-8">
                                            <select class="form-control" id="psi_memiliki_sertifikat" name="psi_memiliki_sertifikat" required>
                                                 <option value="" >-</option>
                                                 <option value="M" >M</option>
                                                 <option value="TM" >TM</option>
                                             </select>  
                                           </div>  
                                           </div>
                                        
                                        <button  type="button" class='btn btn-primary pull-right' id="addnewrowsuratusaha">
                                            Add New <span class="glyphicon glyphicon-plus">                                 
                                            </span>
                                        </button>
                                    </div>
                                    
                                   </div>

                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="unp_id" name="unp_id" value= "<?php echo $unp_id;?>">
            </form> 
                
<script type="text/javascript">
$(document).ready(function() {
    //fungsi insertpersuhaan personel
    $("#personel_form").submit(function(e) {               
        e.preventDefault();
        $.ajax({
            url: "<?php echo site_url('KonsultanTeknis/addKualifikasiTenagaAhli');?>"+'/'+document.getElementById("unp_id").value,
            type: "POST",
            data: $(this).serialize(),
            success: function() {
                document.getElementById("psi_nama").value ='';
                document.getElementById("psi_jabatan").value='-';
                document.getElementById("psi_bobot").value='';
                document.getElementById("psi_kesesuaian_ijasah").value='';
                document.getElementById("psi_memiliki_sertifikat").value='';  
                var id = document.getElementById("uns_id").value;
                deleteAllTable('table-kualifikasi');
                drawTableKualifikasi(id);
                getTotalKonsultan(id);
            }
        });   
     });
     //fungsi delete all table
    function deleteAllTable(idTag) {
       $('#'+idTag+' td').remove();
    }
    
    //fungsi draw table biaya personil
    function drawTableKualifikasi(id) {
        //alert('aw');
        $.ajax({
            url: "<?php echo site_url('KonsultanTeknis/drawTableKualifikasi');?>"+'/'+id,
            type: "POST",
            data: $(this).serialize(),
            success: function(data) {
                console.log(data);
                var data1 = JSON.parse(data);
                var i = 0;
                var item;

                while(i < data1.kons.length){
                    //alert('aw '+i);
                    item = data1.kons[i];
                    
                     //console.log(data1.kons[i].dtk_jabatan+'\n');
                    $('#table-kualifikasi tr:last').after("<tr><td><span>"+item.psi_nama+"</span></td>\n\\n\
                        <td><span>"+item.dtk_jabatan+"</span></td>\n\
                        <td><span>"+item.psi_bobot+"</span></td>\n\\n\
                        <td><span>"+item.psi_kesesuaian_ijasah+"</span></td>\n\
                        <td><span>"+parseFloat(item.psi_nilai_ks_ijasah)+"</span></td>\n\\n\\n\
                        <td><span>"+parseFloat(item.psi_jml_nilai_ks_ijasah)+"</span></td>\n\\n\\n\
                        <td><span>"+item.psi_memiliki_sertifikat+"</span></td>\n\
                        <td><span>"+parseFloat(item.psi_nilai_sertifikat)+"</span></td>\n\\n\\n\
                        <td><span>"+parseFloat(item.psi_jml_nilai_sertifikat)+"</span></td>\n\\n\\n\
                        <td class='deleterowpersonal"+item.psi_id+"' value='"+item.psi_id+"'><div class='glyphicon glyphicon-remove'></div></td></tr>");
                    deleteRow('deleterowpersonal'+item.psi_id, "<?php echo site_url('KonsultanTeknis/proses_del_KualifikasiPersonel');?>"+"/"+item.psi_id);
                    i++;
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
                    });
                    //alert("hao");
                }
            });
        });
    }
});
</script>                
            <div class="col-md-12">
                    <table id = 'table-kualifikasi' class="table table-striped table-bordered table-hover" width="50%">
                    <thead>
                        <tr>
                                <th class="text-center">Nama</th>
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
                        <td></td>
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
            </div>
               

        </div>
    </div>
</div>