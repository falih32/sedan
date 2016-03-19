<?php
    $psi_nama = $dataPersonal->psi_nama;
    $psi_id = $dataPersonal->psi_id;
    $dtk_jabatan = $dataPersonal->dtk_jabatan;
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
                        <form id = "pengalaman_form" method="POST"  action = '' onsubmit="" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                        
                        
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h5><b><?php echo $psi_nama?></b> <br> <?php echo $dtk_jabatan?></h5>
                                
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
                                                 <option value="M" >Menunjang/Terkait</option>
                                                 <option value="TA" >Tidak Ada</option>
                                             </select>  
                                           </div>  
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="" class="col-sm-4 control-label text-left">Kesesuaian Posisi</label>
                                           <div class ="col-sm-8">
                                            <select class="form-control" id="pnk_kesesuaian_posisi" name="pnk_kesesuaian_posisi" required>
                                                 <option value="" >-</option>
                                                 <option value="S" >Sesuai</option>
                                                 <option value="TS" >Tidak Sesuai</option>
                                                 <option value="TA" >Tidak Ada</option>
                                             </select>  
                                           </div>  
                                           </div>
                                     
                                     <input type="hidden" class="form-control" id="pnk_psi" name="pnk_psi" value= "<?php echo $psi_id;?>">
                                        
                                        <button  type="submit" class='btn btn-primary pull-right' id="addnewrowsuratusaha">
                                            Add New <span class="glyphicon glyphicon-plus">                                 
                                            </span>
                                        </button>
                                    </div>
                                    
                                   </div>

                            </div>
                        </div>
                        </form>
 <script type="text/javascript">
$(document).ready(function() { 
    //fungsi insertpersuhaan personel
    $("#pengalaman_form").submit(function(e) {               
        e.preventDefault();
       // alert('haha');
        $.ajax({
            url: "<?php echo site_url('KonsultanTeknis/addPengalamanTenagaAhli');?>"+'/'+document.getElementById("pnk_psi").value,
            type: "POST",
            data: $(this).serialize(),
            success: function() {
                document.getElementById("pnk_uraian_pengalaman").value ='';
                document.getElementById("pnk_jangka_wkt_bln").value='';
                document.getElementById("pnk_kesesuaian_pekerjaan").value='';
                document.getElementById("pnk_kesesuaian_posisi").value='';
         
                var id = document.getElementById("pnk_psi").value;
                deleteAllTable('table-pengalaman');
                drawTablePengalaman(id);
                getTotalPengalaman(id);
               
            }
        });   
     });
     //fungsi delete all table
    function deleteAllTable(idTag) {
       $('#'+idTag+' td').remove();
    }
    
    var id = document.getElementById("pnk_psi").value;
    deleteAllTable('table-pengalaman');
    drawTablePengalaman(id);
    getTotalPengalaman(id);
    //fungsi draw table biaya personil
    function drawTablePengalaman(id) {
        //alert('aw');
        $.ajax({
            url: "<?php echo site_url('KonsultanTeknis/drawTablePengalaman');?>"+'/'+id,
            type: "POST",
            data: $(this).serialize(),
            success: function(data) {
                console.log(data);
                var data1 = JSON.parse(data);
                var i = 0;
                var item;
                //alert('aw');
                while(i < data1.kons.length){
                    //alert('aw '+i);
                    item = data1.kons[i];
                   // alert(item);
                     //console.log(data1.kons[i].dtk_jabatan+'\n');
                    $('#table-pengalaman tr:last').after("<tr><td><span>"+item.pnk_uraian_pengalaman+"</span></td>\n\\n\
                        <td><span>"+item.pnk_jangka_wkt_bln+"</span></td>\n\
                        <td><span>"+item.pnk_kesesuaian_pekerjaan+"</span></td>\n\\n\
                        <td><span>"+parseFloat(item.pnk_nilai_pekerjaan)+"</span></td>\n\\n\\n\
                        <td><span>"+item.pnk_kesesuaian_posisi+"</span></td>\n\
                        <td><span>"+parseFloat(item.pnk_nilai_posisi)+"</span></td>\n\\n\\n\
                        <td><span>"+parseFloat(item.pnk_perhitungan_bln_kerja)+"</span></td>\n\\n\\n\
                        <td class='deleterowpersonal"+item.pnk_id+"' value='"+item.pnk_id+"'><div class='glyphicon glyphicon-remove'></div></td></tr>");
                    deleteRow('deleterowpersonal'+item.pnk_id, "<?php echo site_url('KonsultanTeknis/proses_del_PengalamanPersonel');?>"+"/"+item.pnk_id);
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
                        getTotalPengalaman(document.getElementById("pnk_psi").value);
                    });
                    //alert("hao");
                }
            });
        });
    }
    
    //fungsi ambil total biaya konsultan
    function getTotalPengalaman(pnk_psi) {
        $.ajax({
            url: "<?php echo site_url('KonsultanTeknis/getTotalPengalaman');?>"+'/'+pnk_psi,
            type: "POST",
            data: $(this).serialize(),
            success: function(total) {
                //alert('gag');
                var obj = JSON.parse(total);
                //alert(document.getElementById("pgd_dgn_pajak").value);
                document.getElementById("x_total").value = (parseFloat(obj.jmlPengalaman)).toFixed(2);
                
            }
        });   
     }
     
     //fungsi untuk refresh table non personil
    $('#refreshtable').click(function(){
        deleteAllTable('table-pengalaman');
        var id = document.getElementById("pnk_psi").value;
        getTotalPengalaman(id);
        drawTablePengalaman(id);
    });
});
</script>                  
                        <div class="row">
                                    <div class="table-responsive">
                                       <table class="table table-striped table-bordered text-center" id="table-pengalaman">
                                         <thead >
                                           <tr bgcolor='#BDBDBD'>
                                             
                                             <th class="text-center">Uraian Pengalaman</th>
                                             <th class="text-center">Jangka waktu bulan kerja</th>
                                             <th class="text-center" colspan="4">Pengalaman Kerja Profesional (Bobot 40%)</th>
                                             <th class="text-center">Perhitungan bulan kerja</th>
                                             
                                             <th class="text-center">Action</th>   
                                           </tr>
                                           <tr bgcolor='#BDBDBD'>
                                             
                                             <th class="text-center"></th>
                                             <th class="text-center"></th>
                                             <th class="text-center" bgcolor='#ffcc99' colspan="2">Lingkup Pekerjaan</th>
                                             <th class="text-center" bgcolor='#ff9999' colspan="2">Posisi</th>
                                             <th class="text-center"></th>
                                             
                                             <th class="text-center"></th> 
                                           </tr>
                                           <tr bgcolor='#BDBDBD'>
                                             
                                             <th class="text-center"></th>
                                             <th class="text-center"></th>
                                             <th class="text-center" bgcolor='#ffcc99'>Sesuai(S)/Menunjang (M)</th>
                                             <th class="text-center" bgcolor='#ffcc99'>Nilai</th>
                                             <th class="text-center" bgcolor='#ff9999'>Sesuai(S)/Tidak Sesuai(TS)</th>
                                             <th class="text-center" bgcolor='#ff9999'>Nilai</th>
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
                            <div class="row"> 
                            <div class ='col-sm-3 pull-right'> 
                            <label id = "total_label" class="control-label text-center pull-right">Total : &nbsp;</label>
                            <input type="text" class="form-control" id="x_total"  value='' readonly>
                            </div> 
                            <br>
                            <button class='btn btn-primary pull-left' id="refreshtable">Refresh Tabel</button> 
                        </div> 
                         </div>   
                        
                        
                    </div>
                
                    
               
                    
            </div>
        </div>
    </div>
</div>
