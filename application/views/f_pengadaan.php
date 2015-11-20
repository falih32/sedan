
</style>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="panel-body bg-warning">
                <form id = "pengadaan_form" method="post" action = "<?php echo base_url()."Pengadaan/proses_tambah_pengadaan";?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <h4>Sumber Dana</h4>
                        <div class="row ">
                            <div class="form-group">
                                <label for="pgd_anggaran" class="col-sm-2 control-label text-left">Angggaran</label>
                                <div class="col-sm-8">
                                    <select class="anggaran-cbbox form-control" style="width: 100%" name="ang_kode" id="ang_kode">
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAnggaran">Tambah</button>
                                </div>                        
                            </div>
                        </div>
                        <br>
                        <h4>Lingkup Pekerjaan</h4>
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pgd_perihal" class="col-sm-4 control-label text-left">Nama Pengadaan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="pgd_perihal" name="pgd_perihal" placeholder="Nama Pengadaan">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="drp_lama_pekerjaan" class="col-sm-4 control-label text-left">Jangka waktu penyelesaian pekerjaan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="drp_lama" name="drp_lama_pekerjaan" placeholder="Lama Pekerjaan (/hari)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="drp_lama_penawaran" class="col-sm-4 control-label text-left">Masa berlaku penawaran</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="drp_lama" name="drp_lama_penawaran" placeholder="Masa Berlaku Penawaran (/hari)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="spl_id" class="col-sm-4 control-label text-left">Supplier</label>
                                    <div class="col-sm-8">
                                        <select class="supplier-cbbox form-control" style="width: 100%" name="spl_id">
                                        <?php foreach ($supplierList as $row) {?>
                                        <option value="<?php echo $row->spl_id; ?>">
                                                <?php echo $row->spl_nama; ?>
                                        </option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="col-md-6 col-md-offset-3 control-label text-center">Uraian Singkat Pekerjaan</label>
                                </div>
                                <div class="form-group">
                                <textarea class="form-control" id="pgd_uraian_pekerjaan" name="pgd_uraian_pekerjaan" placeholder="Uraian Singkat Pekerjaan"></textarea>
                                </div>
                                <div class="form-group">
                                <label class="col-md-6 col-md-offset-3 control-label text-center">Waktu Input Penawaran</label>
                                </div>
                                <div class="col-md-6">    
                                <div class="form-group">
                                    <label for="drp_dari" class="col-sm-4 control-label text-center">Dari</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control tgl" id="drp_dari" name="drp_dari" placeholder="Tanggal Dari" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" required>
                                        
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6"> 
                                <div class="form-group">
                                    <label for="drp_sampai" class="col-sm-4 control-label text-left">Sampai</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control tgl" id="drp_sampai" name="drp_sampai" placeholder="Tanggal Sampai" pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$" required>
                                        
                                    </div>
                                </div>
                                </div>
                            
                            </div>
                        </div>
                        <br>
                        <h4>Detail Pekerjaan</h4>
                        <div class="row">
                            <div class ="col-md-6">
                                <div class="form-group">
                                   <label for="dtp_pekerjaan" class="col-sm-4 control-label text-left">Pekerjaan</label> 
                                   <div class="col-sm-8">
                                   <input type="text" class="form-control" id="dtp_pekerjaan" name="dtp_pekerjaan" placeholder="Detail Pekerjaan">
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
                                    <label for="dtp_hargasatuan" class="col-sm-4 control-label text-left">Harga Satuan</label>
                                    <div class="col-sm-8">
                                    <input type="text" class="form-control" id="dtp_hargasatuan" name="dtp_hargasatuan" placeholder="Harga satuan" data-error="Data yang dimasukkan harus angka, jika terdapat koma gunakan titik(.) sebagai koma" pattern="^[0-9.\s]*$">
                                    <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                    
                                </div>
                            <div class ="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-offset-4 control-label text-center">Spesifikasi Teknis</label>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="pgd_spesifikasi" name="pgd_spesifikasi" placeholder="Spesifikasi Teknis"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <button  type="button" class='btn btn-primary pull-right' id="addnewpekerjaan">
                                    Add New <span class="glyphicon glyphicon-plus">                                 
                                    </span>
                                </button>
                            </div>
                        </div>
                           
                        <div class="row">
                            <div class="table-responsive">
                               <table class="table table-striped text-center" id="table_pekerjaan">
                                 <thead >
                                   <tr>
                                     <th class="text-center">Pekerjaan</th>
                                     <th class="text-center">Spesifikasi</th>
                                     <th class="text-center">Volume</th>
                                     <th class="text-center">Satuan</th>
                                     <th class="text-center">Harga</th>
                                     <th class="text-center">Total</th>
                                     <th class="text-center">Action</th>
                                   </tr>
                                 </thead>
                                 <tbody>
                                  
                                 </tbody>

                               </table>
                           </div>
                        </div>
                        <div class="row"> 
                            <label id="total_value" class="control-label text-center pull-right">0</label> 
                            <label id = "total_label" class="control-label text-center pull-right">Total : &nbsp;</label>
                        </div>
                        <br>
                        <h4>Detail Penyusun</h4>
                        <div class="row">
                            <div class ="col-md-9">
                                <div class ="col-sm-6">
                                <div class="form-group">
                                    <label for="dpy_pegawai" class="col-sm-4 control-label text-center">NIP-Nama</label>
                                   <div class ="col-sm-8">
                                   <select class="penyusun-cbbox form-control" style="width: 100%" name="dpy_pegawai" id="dpy_pegawai">
                                    <?php foreach ($pegawaiList as $row) {?>
                                    <option value="<?php echo $row->pgw_id; ?>">
                                            <?php echo $row->jbt_nama."-".$row->pgw_nama; ?>
                                    </option>
                                    <?php } ?>
                                    </select>
                                   </div>
                                </div>
                                </div>
                                <div class ="col-sm-6">
                                <div class="form-group">
                                    <label for="dpy_jabatan" class="col-sm-4 control-label text-center">Jabatan</label>
                                   <div class ="col-sm-8">
                                       <select class="jabatan-penyusun-cbbox form-control" style="width: 100%" name="dpy_jabatan" id="dpy_jabatan">                     
                                           <option value="0">Ketua</option>
                                           <option value="1">Anggota</option>
                                        </select>
                                   </div>
                                   </div>
                                </div>
                                
                            </div>
                            <div class ="col-md-3">
                                 <button  type="button" class='btn btn-primary pull-right' id="addnewrowpenyusun">
                                    Add New <span class="glyphicon glyphicon-plus">                                 
                                    </span>
                                </button>
                            </div>
                           </div>
                        <div class="row">
                            <div class="table-responsive">
                               <table class="table table-striped text-center" id="table_penyusun">
                                 <thead >
                                   <tr>
                                     <th class="text-center">NIP</th>
                                     <th class="text-center">Nama</th>
                                     <th class="text-center" style="display:none;">JabatanValue</th>
                                     <th class="text-center">Jabatan</th>
                                     <th class="text-center">Action</th>
                                   </tr>
                                 </thead>
                                 <tbody>
                                  
                                 </tbody>

                               </table>
                           </div>
                        </div>
                        <br>
                        <h4>Syarat Penyedia</h4>
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
                               <table class="table table-striped text-center" id="tablesuratusaha">
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
    $(".penyusun-cbbox").select2();
    $(".suratizin-cbbox").select2();
    $(".supplier-cbbox").select2();

    $("#addnewpekerjaan").on("click", function(){
        var pekerjaan = document.getElementById("dtp_pekerjaan").value;
        var spesifikasi = document.getElementById("pgd_spesifikasi").value;
        var volume = document.getElementById("dtp_volume").value;
        var satVolume = document.getElementById("dtp_satuan").value;
        var harga = document.getElementById("dtp_hargasatuan").value;
        
        $('#table_pekerjaan tr:last').after("<tr><td><span>"+pekerjaan+"</span></td>\n\\n\
                                            <td><span>"+spesifikasi+"</span></td>\n\
                                            <td><span>"+volume+"</span></td>\n\\n\
                                            <td><span>"+satVolume+"</span></td>\n\
                                            <td><span>"+harga+"</span></td>\n\
                                            <td><span>"+(volume*harga)+"</span></td>\n\
                                            <td class='deleterow'><div class='glyphicon glyphicon-remove'></div></td></tr>");
        var total =  parseFloat($("#total_value").text());
        total = (total + (volume*harga));
        document.getElementById('total_value').innerHTML = total;
        $(".deleterow").on("click", function(){
            var $killrow = $(this).parent('tr');
            $killrow.addClass("danger");
            $killrow.fadeOut(2000, function(){
            $(this).remove();
            var totHarga = (volume*harga);
            var total =  parseFloat($("#total_value").text());
            total = total - totHarga;
            document.getElementById('total_value').innerHTML = total;
        });});
    });
    
    $("#addnewrowpenyusun").on("click", function(){
        var tagNIP = document.getElementById("dpy_pegawai");
        var NIP = tagNIP.options[tagNIP.selectedIndex].value;
        var Nama = tagNIP.options[tagNIP.selectedIndex].text;
        var tagJabatan = document.getElementById("dpy_jabatan");
        var Jabatan = tagJabatan.options[tagJabatan.selectedIndex].text;
        var JabatanValue = tagJabatan.options[tagJabatan.selectedIndex].value;
        
        $('#table_penyusun tr:last').after("<tr><td><span>"+NIP+"</span></td>\n\\n\
                                            <td><span>"+Nama+"</span></td>\n\
                                            <td style='display:none;'><span>"+JabatanValue+"</span></td>\n\\n\
                                            <td><span>"+Jabatan+"</span></td>\n\
                                            <td class='deleterow'><div class='glyphicon glyphicon-remove'></div></td></tr>");
        $(".deleterow").on("click", function(){
            var $killrow = $(this).parent('tr');
            $killrow.addClass("danger");
            $killrow.fadeOut(2000, function(){
            $(this).remove();
            
        });});
    });
    
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
    
    $("#anggaran_form").submit(function(e) {               
                e.preventDefault();
                $.ajax({
                    url: "<?php echo site_url('Pengadaan/prosesInputAnggaran');?>",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(msg) {
                        if(msg == "0success"){
                            $('#modalAnggaran').modal('hide');
                            document.getElementById('ang_kode1').innerHTML = "";
                            document.getElementById('ang_name').innerHTML = "";
                        }else if(msg == "1duplicate"){
                            alert("kode anggaran sudah ada");
                        }else if(msg == "empty"){
                           // alert(msg);
                        }else{
                            alert(msg);
                        }
                    }
                });
                    
              
     });
     
     $("#pengadaan_form").submit(function(e) { 
        e.preventDefault();
        var TableDataPekerjaan = new Array();
            $('#table_pekerjaan tr').each(function(row, tr){
                TableDataPekerjaan[row]={
                "dtp_pekerjaan" : $(tr).find('td:eq(0)').text()    //pekerjaan
                , "dtp_spesifikasi" :$(tr).find('td:eq(1)').text()             //spesifikasi
                , "dtp_volume" : $(tr).find('td:eq(2)').text()        //volume
                , "dtp_satuan" : $(tr).find('td:eq(3)').text()        //satuan
                , "dtp_hargasatuan" : $(tr).find('td:eq(4)').text()        //harga
            }    
           }); 
           TableDataPekerjaan.shift();  // first row will be empty - so remove
           TableDataPekerjaan = JSON.stringify(TableDataPekerjaan);
           //alert(TableData);
           var TableDataPenyusun = new Array();
            $('#table_pekerjaan tr').each(function(row, tr){
                TableDataPenyusun[row]={
                "dtp_pekerjaan" : $(tr).find('td:eq(0)').text()    //pekerjaan
                , "dtp_spesifikasi" :$(tr).find('td:eq(1)').text()             //spesifikasi
                , "dtp_volume" : $(tr).find('td:eq(2)').text()        //volume
                , "dtp_satuan" : $(tr).find('td:eq(3)').text()        //satuan
                , "dtp_hargasatuan" : $(tr).find('td:eq(4)').text()        //harga
            }    
           }); 
           TableDataPenyusun.shift();  // first row will be empty - so remove
           TableDataPenyusun = JSON.stringify(TableDataPenyusun);
     });
            
    $('#pengadaan_form').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            ang_kode: {
                validators: {
                    notEmpty: {
                        message: 'Anggaran tidak boleh kosong'
                    }
                }
            },
            pgd_perihal: {
                validators: {
                    notEmpty: {
                        message: 'Nama Pengadaan tidak boleh kosong'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9, \.,]+$/,
                        message: 'Nama Pengadaan hanya boleh diisi alfabet, angka, titik, koma dan underscore'
                    }
                }
            },
            drp_lama_pekerjaan: {
                validators: {
                    notEmpty: {
                        message: 'Lama waktu tidak boleh kosong'
                    },
                    numeric: {
                        message: 'Data yang dimasukkan hanya boleh angka'
 
                    }         
                }
            },
            drp_lama_penawaran: {
                validators: {
                    notEmpty: {
                        message: 'Lama waktu tidak boleh kosong'
                    },
                    numeric: {
                        message: 'Data yang dimasukkan hanya boleh angka'
 
                    }         
                }
            },
            spl_id: {
                validators: {
                    notEmpty: {
                        message: 'Data tidak boleh kosong'
                    }
                }
            },
            pgd_uraian_pekerjaan: {
                validators: {
                    notEmpty: {
                        message: 'Data tidak boleh kosong'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9, \.,]+$/,
                        message: 'Uraian Pekerjaan hanya boleh diisi alfabet, angka, titik, koma dan underscore'
                    }
                }
            }
//            drp_dari: {
//                validators: {
//                    notEmpty: {
//                        message: 'Tanggal tidak boleh kosong'
//                    }          
//                }
//            },
//            drp_sampai: {
//                validators: {
//                    notEmpty: {
//                        message: 'Tanggal tidak boleh kosong'
//                    }          
//                }
//            }
            
            
        }
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
    
//    $('#anggaran_form').formValidation({
//        framework: 'bootstrap',
//        icon: {
//            valid: 'glyphicon glyphicon-ok',
//            invalid: 'glyphicon glyphicon-remove',
//            validating: 'glyphicon glyphicon-refresh'
//        },
//        fields: {       
//            dtp_pekerjaan: {
//                validators: {
//                    notEmpty: {
//                        message: 'Detail Pekerjaan tidak boleh kosong'
//                    },
//                    regexp: {
//                        regexp: /^[a-zA-Z0-9_\., ]+$/,
//                        message: 'Detail Pekerjaan hanya boleh diisi alfabet, angka, titik, koma dan underscore'
//                    }
//                }
//            },
//            dtp_volume: {
//                validators: {
//                    notEmpty: {
//                        message: 'Data volume tidak boleh kosong'
//                    },
//                    numeric: {
//                        message: 'Data yang dimasukkan hanya boleh angka'
// 
//                    }
//                }
//            },
//            dtp_satuan: {
//                validators: {
//                    notEmpty: {
//                        message: 'Data satuan tidak boleh kosong'
//                    }                    
//                }
//            },
//            dtp_hargasatuan: {
//                validators: {
//                    notEmpty: {
//                        message: 'Harga satuan tidak boleh kosong'
//                    },
//                    numeric: {
//                        message: 'Data yang dimasukkan hanya boleh angka'
// 
//                    }
//                }
//            },
//            pgd_spesifikasi: {
//                validators: {
//                    notEmpty: {
//                        message: 'Data satuan tidak boleh kosong'
//                    }                    
//                }
//            }
//        }
//    });
});
    
// dpy_pegawai: {
//                validators: {
//                    notEmpty: {
//                        message: 'Data tidak boleh kosong'
//                    }                    
//                }
//            },
//            dpy_jabatan: {
//                validators: {
//                    notEmpty: {
//                        message: 'Data tidak boleh kosong'
//                    }                    
//                }
//            },
//            dsp_surat_izin: {
//                validators: {
//                    notEmpty: {
//                        message: 'Data tidak boleh kosong'
//                    }                    
//                }
//            }   
    
</script>