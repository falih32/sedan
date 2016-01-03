<?php   $role = $this->session->userdata('id_role'); 
 
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
                                            <div class="input-group col-sm-8">
                                            <span class="input-group-addon">Rp</span>
                                            <input class="form-control currency"type="number" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" id="dtp_hargasatuan_hps" name="dtp_hargasatuan_hps" placeholder="Harga satuan" data-error="Data yang dimasukkan harus angka, jika terdapat koma gunakan titik(.) sebagai koma" pattern="^[0-9.\s]*$">
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
                                            <p class="help-block"><i>Format: JPG, JPEG, PNG, GIF, PDF | Max file size: 10 MB.</i></p>
                                        </div>
                                        
                                        <button  type="submit" class='btn btn-primary pull-right' id="addnewpekerjaan">
                                            Add New <span class="glyphicon glyphicon-plus">                                 
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="table-responsive">
                                       <table class="table table-hover table-striped table-bordered text-center" id="table_pekerjaan">
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
                                         </tbody>
                                       </table>
                                   </div>
                                </div>
                                <div class="row"> 
                                    <div class ='col-sm-3 pull-right'> 
                                    <label id = "total_label" class="control-label text-center pull-right">Total : &nbsp;</label>
                                    <input type="text" class="form-control" id="pgd_jml_sblm_ppn_hps" name="pgd_jml_sblm_ppn_hps" value='0' readonly>
                                    </div> 
                                    
                                    <div class ='col-sm-3 pull-right'>
                                    <label id = "lbl_pgd_jml_ssdh_ppn_hps" class="control-label text-center pull-right">Total(ppn 10%) : &nbsp;</label>
                                    <input type="<?php if ($pgd_dgn_pajak == 0){ echo "text"; }else{echo "hidden";} ?>" class="form-control" id="pgd_jml_ssdh_ppn_hps" name="pgd_jml_ssdh_ppn_hps" value='0' readonly>
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
                    <form id = "pengadaan_form"  action = "<?php echo base_url()."Pengadaan/proses_add_pengadaan2";?>" onsubmit="submitFormPengadaan();" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
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
                    success: function(status,idDetail) {
                        
                        document.getElementById("dtp_id_sementara").value = idDetail;
                        var pekerjaan = document.getElementById("dtp_pekerjaan").value;
                        var spesifikasi = document.getElementById("dtp_spesifikasi").value;
                        var volume = document.getElementById("dtp_volume").value;
                        var satVolume = document.getElementById("dtp_satuan").value;
                        var harga = document.getElementById("dtp_hargasatuan_hps").value;
                        var file = document.getElementById("dtp_file").value;
                        var urlfile = "<?php echo site_url('uploads/file_pengadaan');?>"+"/"+file;
                        var tagFile;
                        if (file === "" || file === null){
                            tagFile =  ""
                        }else{
                            tagFile =  "<a href='"+urlfile+"' target='_blank'>link</a>"
                        }
                        $('#table_pekerjaan tr:last').after("<tr><td><span>"+pekerjaan+"</span></td>\n\\n\
                                                            <td><span>"+spesifikasi+"<br>"+tagFile+"</span></td>\n\
                                                            <td><span>"+volume+"</span></td>\n\\n\
                                                            <td><span>"+satVolume+"</span></td>\n\
                                                            <td><span>"+harga+"</span></td>\n\
                                                            <td><span>"+(volume*harga)+"</span></td>\n\
                                                            <td class='deleterow'><div class='glyphicon glyphicon-remove'></div></td></tr>");
                        var total =  parseFloat(document.getElementById('pgd_jml_sblm_ppn_hps').value);
                        total = (total + (volume*harga));
                        document.getElementById('pgd_jml_sblm_ppn_hps').value = total;
                        document.getElementById('pgd_jml_ssdh_ppn_hps').value = total+(total*(0.1));
                        $(".deleterow").on("click", function(){
                            var id = document.getElementById("dtp_id_sementara").value;
                            var dd = this;
                            $.ajax({
                                url: "<?php echo site_url('Pengadaan/proses_del_detail_pgd');?>"+"/"+id,
                                type: "POST",
                                data: $(this).serialize(),
                                success: function(msg) {
                                    //alert("halo");
                                    var $killrow = $(dd).parent('tr');
                                    $killrow.addClass("danger");
                                    $killrow.fadeOut(2000, function(){
                                        $(dd).remove();
                                        var totHarga = (volume*harga);
                                        var total =  parseFloat(document.getElementById('pgd_jml_sblm_ppn_hps').value);
                                        total = total - totHarga;
                                        document.getElementById('pgd_jml_sblm_ppn_hps').value = total;
                                        document.getElementById('pgd_jml_ssdh_ppn_hps').value = total+(total*(0.1));                
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
                    }
                      
     });
     return false;
     });

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