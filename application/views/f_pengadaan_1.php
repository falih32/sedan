<?php   $role = $this->session->userdata('id_role'); 
if($statuspage !="edit"){
        
        $pgd_jml_sblm_ppn_hps = "0";
        $pgd_jml_ssdh_ppn_hps = "0";
       
        
    } 
?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">
                <form method="post" id = "dtl_pengadaan_form"  action = "" class="form-horizontal" data-toggle="validator">
                    <div class="col-md-12">
<!-----Detail barang/jasa---------------------------------------------------------------------------------------------------->                        
                        <br>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">                    
                                    <div class="col-md-8">
                                        <h4><b>Detail <?php echo $Judul?></b></h4>
                                    </div>                                           
                                </div>  
                                <br>
                                <div class="row">
                                    <div class ="col-md-6">
                                        <!--<div class="form-group">
                                           <label for="chkBoxJudul" class="col-sm-4 control-label text-left">Tambah Sub Judul</label> 
                                           <div class="col-sm-8">
                                           <button  type="button" class='btn btn-primary' id="addnewsubjudul">
                                            Add New 
                                           </button>
                                           </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="optSubJudul" class="col-sm-4 control-label text-left">Sub Judul</label>
                                            <div class="col-sm-8">
                                                <select class="optSubJudul-opt form-control" style="width: 100%" name="optSubJudul">                                          
                                                    <option >                       
                                                    </option>                         
                                                </select>                        
                                            </div>
                                        </div>-->
                                        <div class="form-group">      
                                           <label for="dtp_pekerjaan" class="col-sm-4 control-label text-left"><?php echo $Judul?></label> 
                                           <div class="col-sm-8">
                                           <input type="text" class="form-control" id="dtp_pekerjaan" name="dtp_pekerjaan" placeholder="<?php echo $Judul?>"> 
                                           <div class="help-block with-errors"></div>
                                           </div>
                                        </div>
                                        <div class="form-group">
                                           <label for="dtp_volume" class="col-sm-4 control-label text-left">Volume</label>
                                           <div class="col-sm-8">
                                           <input type="text" class="form-control" id="dtp_volume" name="dtp_volume" placeholder="Volume" data-error="Data yang dimasukkan harus angka, jika terdapat koma gunakan titik(.) sebagai koma" pattern="^[0-9.\s]*$">
                                           <div class="help-block with-errors"></div>
                                           </div>
                                        </div>
                                        <div class="form-group">
                                           <label for="dtp_satuan" class="col-sm-4 control-label text-left">Satuan Volume</label>
                                           <div class="col-sm-8">
                                           <input type="text" class="form-control" id="dtp_satuan" name="dtp_satuan" placeholder="Satuan Volume (Contoh : m2, liter, unit, dll">
                                           <div class="help-block with-errors"></div>
                                           </div>
                                        </div>
                                        <div class="form-group">                                    
                                            <label for="dtp_hargasatuan_hps" class="col-sm-4 control-label text-left">Harga Satuan</label>
                                            <div class="col-sm-8">
                                            <input class="form-control" id="dtp_hargasatuan_hps" name="dtp_hargasatuan_hps" placeholder="Harga satuan(Rp)" data-error="Data yang dimasukkan harus angka, jika terdapat koma gunakan titik(.) sebagai koma" pattern="^[0-9.\s]*$">
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
                                            <textarea class="form-control" id="dtp_spesifikasi" name="dtp_spesifikasi" placeholder="Spesifikasi Teknis"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="control-label">Upload Spesifikasi Gambar</label>
                                            <input type="file" class="" id="dtp_file" name="dtp_file" >
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
                                             <th class="text-center"><?php echo $Judul?></th>
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

     
$(document).ready(function() {
    
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