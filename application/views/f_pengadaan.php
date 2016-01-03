<?php   $role = $this->session->userdata('id_role'); 

?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php echo $title; ?> (Master Data)</h3>
            </div>
            <div class="panel-body">
                <form method="post" id = "pengadaan_form"  action = "<?php echo base_url()."Pengadaan/proses_add_pengadaan1";?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                    <div class="col-md-12">
<!--------------------------------------------------------------------------------------------------------->                        
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4><b>Sumber Dana</b></h4>
                                <div class="row ">
                                    <div class="form-group">
                                        <label for="ang_kode" class="col-sm-2 control-label text-left">Angggaran</label>
                                        <div class="col-sm-8">
                                            <select class="anggaran-cbbox form-control" style="width: 100%" name="ang_kode" id="ang_kode" data-error="Input tidak boleh kosong" required>
                                            </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAnggaran">Tambah</button>
                                        </div>                        
                                    </div>
                                </div>
                            </div>
                        </div>
 <!--------------------------------------------------------------------------------------------------------->                       
                        <br>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4><b>Lingkup Pekerjaan</b></h4>
                                <div class="row ">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pgd_perihal" class="col-sm-4 control-label text-left">Nama Pengadaan</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="pgd_perihal" name="pgd_perihal" placeholder="Nama Pengadaan" data-error="Input tidak boleh kosong" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="pgd_lama_pekerjaan" class="col-sm-4 control-label text-left">Jangka waktu penyelesaian pekerjaan</label>
                                            <div class="col-sm-8">
                                                <input required pattern='[0-9]*' type="text" class="form-control" id="pgd_lama_pekerjaan" name="pgd_lama_pekerjaan" placeholder="Lama Pekerjaan (/hari)" data-error="Input yang dimasukkan harus angka dan tidak boleh kosong">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="pgd_lama_penawaran" class="col-sm-4 control-label text-left">Masa berlaku penawaran</label>
                                            <div class="col-sm-8">
                                                <input required type="text" pattern='[0-9]*' class="form-control" id="pgd_lama_penawaran" name="pgd_lama_penawaran" placeholder="Masa Berlaku Penawaran (/hari)" data-error="Input yang dimasukkan harus angka dan tidak boleh kosong">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="pgd_supplier" class="col-sm-4 control-label text-left">Supplier</label>
                                            <div class="col-sm-8">
                                                <select class="supplier-cbbox form-control" style="width: 100%" name="pgd_supplier" data-error="Input tidak boleh kosong" required>
                                                <?php foreach ($supplierList as $row) {?>
                                                <option value="<?php echo $row->spl_id; ?>">
                                                        <?php echo $row->spl_nama; ?>
                                                </option>
                                                <?php } ?>
                                                </select>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="chkBoxPajak" class="col-sm-4 control-label text-left"></label>
                                            <div class="col-sm-8">
                                                <input data-style="btn-group-sm" id = "chkBoxPajak" class ="chkBoxPajak pull-right" type="checkbox" data-off-label="Tanpa Pajak" data-on-label="Dengan Pajak" name ="includePajak" value="1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!--<div class="form-group">
                                            <label for="pgd_tgl_mulai_pengadaan" class="col-sm-4 control-label text-left">Tanggal Mulai Pengadaan</label>
                                            <div class="col-sm-8">
                                                <input required readonly type="text" class="form-control tgl1" id="pgd_tgl_mulai_pengadaan" name="pgd_tgl_mulai_pengadaan" placeholder="Tanggal Mulai Pengadaan" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" data-error="Input tidak boleh kosong">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>-->
                                        <div class="form-group">
                                        <label class="col-md-6 col-md-offset-3 control-label text-center">Uraian Singkat Pekerjaan</label>
                                        </div>
                                        <div class="form-group">
                                        <textarea class="form-control" id="pgd_uraian_pekerjaan" name="pgd_uraian_pekerjaan" placeholder="Uraian Singkat Pekerjaan" data-error="Input tidak boleh kosong" required></textarea>
                                        <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-md-6 col-md-offset-3 control-label text-center">Pemasukkan Dokumen Penawaran</label>
                                        </div>
                                        <div class="col-md-6">    
                                        <div class="form-group">
                                            <label for="pgd_wkt_awal_penawaran" class="col-sm-4 control-label text-center">Dari</label>
                                            <div class="col-sm-8">
                                                <input readonly type="text" class="form-control tgl" id="pgd_wkt_awal_penawaran" name="pgd_wkt_awal_penawaran" placeholder="Dari" data-error="Input tidak boleh kosong" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-md-6"> 
                                        <div class="form-group">
                                            <label for="pgd_wkt_akhir_penawaran" class="col-sm-4 control-label text-left">Sampai</label>
                                            <div class="col-sm-8">
                                                <input readonly type="text" class="form-control tgl" id="pgd_wkt_akhir_penawaran" name="pgd_wkt_akhir_penawaran" placeholder="Sampai" data-error="Input tidak boleh kosong" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        </div>

                                    </div>
                                </div>    
                            </div>
                        </div>
                        
<!--------------------------------------------------------------------------------------------------------->                        
                    <br>
                            
                        
                    </div>
 <!---End of input------------------------------------------------------------------------------------------------------>                    
 <!---hidden atributte------------------------------------------------------------------------------------------->                    
                        <div class="row">
                            <div class="form-group">     
                                   <div class="col-sm-4">
                                   <input type="hidden" class="form-control" id="title" name="title" value= "<?php echo $title?>">
                                   </div>
                                   <div class="col-sm-4">
                                   <input type="hidden" class="form-control" id="Judul" name="Judul" value= "<?php echo $Judul?>">
                                   </div>
                                    <div class="col-sm-4">
                                   <input type="hidden" class="form-control" id="lbl_detail_pengadaan" name="lbl_detail_pengadaan" value= "<?php echo $lbl_detail_pengadaan?>">
                                   </div>
                                    <div class="col-sm-4">
                                   <input type="hidden" class="form-control" id="pgd_tipe_pengadaan" name="pgd_tipe_pengadaan" value= "<?php echo $pgd_tipe_pengadaan;?>" placeholder="Detail Pekerjaan">
                                   </div>
                                    
                            </div>
                        </div>
                    <div class="col-md-12 text-center"><hr>
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="...">
                            <a class="btn btn-lg btn-danger" href="javascript:history.back()"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Kembali</a>
                            <button type="submit" class="btn btn-lg btn-success" id="btnPengadaan"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Selanjutnya</button>
                            
                        </div>
                    </div>
                </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
<!--------Modal anggaran-------------------------------------------------------------------------------------------------> 
<div class="modal fade" id="modalAnggaran" tabindex="-1" role="dialog" aria-labelledby="InsertNewAnggaran">
                                 <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                     <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                       <h4 class="modal-title" >Insert Anggaran Baru</h4>
                                     </div>
                                     <div class="modal-body">
                                       <form id = "anggaran_form" method="post" action="<?php echo site_url('Pengadaan/prosesInputAnggaran');?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                                         <div class="form-group">
                                             <div class="col-sm-12">
                                                <label for="ang_kode1" class="control-label">Kode Anggaran:</label>
                                                <input type="text" class="form-control" id="ang_kode1" name="ang_kode1">
                                            </div>
                                         </div>
                                         <div class="form-group">
                                             <div class="col-sm-12">
                                                <label for="ang_name" class="control-label">Nama Anggaran:</label>
                                                <textarea class="form-control" id="ang_name" name="ang_name"></textarea>
                                            </div>
                                         </div>
                                           <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" >Simpan</button>
                                          </div>
                                       </form>
                                     </div>
                                     
                                   </div>
                                 </div>
                               </div> 
<script type="text/javascript">

     
$(document).ready(function() {
    
   // $('#btnSubmitPengadaan').hide();
    $(".anggaran-cbbox").select2({
       ajax: {
         url: "<?php echo site_url('Anggaran/select2All');?>",
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
   
    
    
    $("#anggaran_form").submit(function(e) {               
                e.preventDefault();
                $.ajax({
                    url: "<?php echo site_url('Pengadaan/prosesInputAnggaran');?>",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(msg) {
                        if(msg === "0success"){
                            $('#modalAnggaran').modal('hide');
                            document.getElementById('ang_kode1').innerHTML = "";
                            document.getElementById('ang_name').innerHTML = "";
                        }else if(msg === "1duplicate"){
                            alert("kode anggaran sudah ada");
                        }else if(msg === "empty"){
                           // alert(msg);
                        }else{
                            alert(msg);
                        }
                    }
                });
                    
              
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
 $(':checkbox').checkboxpicker();       
</script>