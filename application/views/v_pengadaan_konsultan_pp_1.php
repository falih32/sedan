<?php
    $spl_nama = $dataPengadaan->spl_nama;
    $unp_nilai_png_prs = $dataPengadaan->unp_nilai_png_prs;
    $unp_id = $dataPengadaan->unp_id;
    if($dataPnp != NULL){
        foreach($dataPnp as $row){
            if($row->pnp_kd_sub == 'NP'){
                $np_pnp_jml_sub =$row->pnp_jml_sub;
                $np_pnp_bobot =$row->pnp_bobot;
                $np_pnp_nilai = $row->pnp_nilai;
            }elseif($row->pnp_kd_sub == 'NPL'){
                $npl_pnp_jml_sub =$row->pnp_jml_sub;
                $npl_pnp_bobot =$row->pnp_bobot;
                $npl_pnp_nilai = $row->pnp_nilai;
            }elseif($row->pnp_kd_sub == 'NPLF'){
                $nplf_pnp_jml_sub =$row->pnp_jml_sub;
                $nplf_pnp_bobot =$row->pnp_bobot;
                $nplf_pnp_nilai = $row->pnp_nilai;
            }elseif($row->pnp_kd_sub == 'NPK'){
                $npk_pnp_jml_sub =$row->pnp_jml_sub;
                $npk_pnp_bobot =$row->pnp_bobot;
                $npk_pnp_nilai = $row->pnp_nilai;
            }elseif($row->pnp_kd_sub == 'NFU'){
                $nfu_pnp_jml_sub =$row->pnp_jml_sub;
                $nfu_pnp_bobot =$row->pnp_bobot;
                $nfu_pnp_nilai = $row->pnp_nilai;
            }elseif($row->pnp_kd_sub == 'KP'){
                $kp_pnp_jml_sub =$row->pnp_jml_sub;
                $kp_pnp_bobot =$row->pnp_bobot;
                $kp_pnp_nilai = $row->pnp_nilai;
            }
        }
    }else{
        $np_pnp_jml_sub ="";
        $np_pnp_bobot ="40";
        $np_pnp_nilai = "";

        $npl_pnp_jml_sub ="";
        $npl_pnp_bobot ="15";
        $npl_pnp_nilai = "";

        $nplf_pnp_jml_sub ="";
        $nplf_pnp_bobot ="6.6667";
        $nplf_pnp_nilai = "";

        $npk_pnp_jml_sub ="";
        $npk_pnp_bobot ="6.6667";
        $npk_pnp_nilai = "";

        $nfu_pnp_jml_sub ="";
        $nfu_pnp_bobot ="6.6667";
        $nfu_pnp_nilai = "";

        $kp_pnp_jml_sub ="";
        $kp_pnp_bobot ="25";
        $kp_pnp_nilai = "";    
    }
    

?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php // echo "$title"; ?></h3>
            </div>
            <div class="panel-body">
            <form method="post" action="<?php echo base_url()."KonsultanTeknis/proses_tambah_pengalamanPerusahaan/".$unp_id;?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                <div class="col-md-12">
                    <h4><b>Data Unsur Pengalaman Perusahaan</b></h4><br>
                    <h5><b>Sub unsur pengalaman melaksanakan kegiatan sejenis (NP)</b></h5>
                    <table class="table table-striped table-bordered table-hover" width="50%">
                    <thead>
                        <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Jumlah Paket Pengalaman Sejenis</th>
                                <th>Bobot(%)</th>
                                <th>Nilai</th>
                        </tr>
                    </thead>
                    
                    
                        
                    <tbody>
                        
                        <td>1</td>
                        <td><?php echo $spl_nama; ?></td>
                        <td><input data-error="Data yang dimasukkan harus angka, jika terdapat koma gunakan titik(.) sebagai koma" pattern="^[0-9.\s]*$" type="text" class="form-control" id="np_pnp_jml_sub" name="np_pnp_jml_sub" placeholder="Jumlah" value="<?php echo $np_pnp_jml_sub; ?>" required>
                        </td>
                        <td><input type="text" class="form-control" id="np_pnp_bobot" name="np_pnp_bobot" placeholder="Bobot" value="<?php echo $np_pnp_bobot+0 ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="np_pnp_nilai" name="np_pnp_nilai" placeholder="Nilai" value="<?php echo $np_pnp_nilai+0 ?>" required readonly></td>
                    </tbody>
                    </table>
                    <div class="help-block with-errors"></div>
                    <h5><b>Sub unsur pengalaman melaksanakan di lokasi kegiatan (NPL)</b></h5>
                    <table class="table table-striped table-bordered table-hover" width="50%">
                    <thead>
                        <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Jumlah Pengalaman Pada Lokasi Yang Sama</th>
                                <th>Bobot(%)</th>
                                <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <td>1</td>
                        <td><?php echo $spl_nama; ?></td>
                        <td><input data-error="Data yang dimasukkan harus angka, jika terdapat koma gunakan titik(.) sebagai koma" pattern="^[0-9.\s]*$" type="text" class="form-control" id="npl_pnp_jml_sub" name="npl_pnp_jml_sub" placeholder="Jumlah" value="<?php echo $npl_pnp_jml_sub; ?>" required></td>
                        <td><input type="text" class="form-control" id="npl_pnp_bobot" name="npl_pnp_bobot" placeholder="Bobot" value="<?php echo $npl_pnp_bobot+0 ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="npl_pnp_nilai" name="npl_pnp_nilai" placeholder="Nilai" value="<?php echo $npl_pnp_nilai+0 ?>" required readonly></td>
                    </tbody>
                    </table>
                    
                    <h5><b>Sub unsur pengalaman manajerial dan fasilitas utama</b></h5>
                    <h6><b>Pengalaman sebagai lead firm (NPLF)</b></h6>
                    <table class="table table-striped table-bordered table-hover" width="50%">
                    <thead>
                        <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Jumlah Pengalaman</th>
                                <th>Bobot(%)</th>
                                <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>1</td>
                        <td><?php echo $spl_nama; ?></td>
                        <td><input data-error="Data yang dimasukkan harus angka, jika terdapat koma gunakan titik(.) sebagai koma" pattern="^[0-9.\s]*$" type="text" class="form-control" id="nplf_pnp_jml_sub" name="nplf_pnp_jml_sub" placeholder="Jumlah" value="<?php echo $nplf_pnp_jml_sub; ?>" required></td>
                        <td><input type="text" class="form-control" id="nplf_pnp_bobot" name="nplf_pnp_bobot" placeholder="Bobot" value="<?php echo $nplf_pnp_bobot+0 ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="nplf_pnp_nilai" name="nplf_pnp_nilai" placeholder="Nilai" value="<?php echo $nplf_pnp_nilai+0 ?>" required readonly></td>
                    </tbody>
                    </table>

                <h6><b>Pengalaman mengelola kontrak (NPK)</b></h6>
                    <table class="table table-striped table-bordered table-hover" width="50%">
                    <thead>
                        <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Nilai Paket Pengalaman Sejenis</th>
                                <th>Bobot(%)</th>
                                <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <td>1</td>
                        <td><?php echo $spl_nama; ?></td>
                        <td><input data-error="Data yang dimasukkan harus angka, jika terdapat koma gunakan titik(.) sebagai koma" pattern="^[0-9.\s]*$" type="text" class="form-control" id="npk_pnp_jml_sub" name="npk_pnp_jml_sub" placeholder="Jumlah" value="<?php echo $npk_pnp_jml_sub; ?>" required></td>
                        <td><input type="text" class="form-control" id="npk_pnp_bobot" name="npk_pnp_bobot" placeholder="Bobot" value="<?php echo $npk_pnp_bobot+0 ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="npk_pnp_nilai" name="npk_pnp_nilai" placeholder="Nilai" value="<?php echo $npk_pnp_nilai+0 ?>" required readonly></td>
                    </tbody>
                    </table>
                    
                 <h6><b>Ketersediaan fasilitas utama (NFU)</b></h6>
                    <table class="table table-striped table-bordered table-hover" width="50%">
                    <thead>
                        <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Kriteria Fasilitas utama</th>
                                <th>Bobot(%)</th>
                                <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    <td>1</td>
                        <td><?php echo $spl_nama; ?></td>
                        <td><input data-error="Data yang dimasukkan harus angka, jika terdapat koma gunakan titik(.) sebagai koma" pattern="^[0-9.\s]*$" type="text" class="form-control" id="nfu_pnp_jml_sub" name="nfu_pnp_jml_sub" placeholder="Jumlah" value="<?php echo $nfu_pnp_jml_sub; ?>" required></td>
                        <td><input type="text" class="form-control" id="nfu_pnp_bobot" name="nfu_pnp_bobot" placeholder="Bobot" value="<?php echo $nfu_pnp_bobot+0 ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="nfu_pnp_nilai" name="nfu_pnp_nilai" placeholder="Nilai" value="<?php echo $nfu_pnp_nilai+0 ?>" required readonly></td>
                    </tbody>
                    </table>
                 
                 <h5><b>Sub unsur kapasitas perusahaan dengan memperhatikan jumlah tenaga ahli tetap (KP)</b></h5>
                    <table class="table table-striped table-bordered table-hover" width="50%">
                    <thead>
                        <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Jumlah Tenaga Ahli Tetap</th>
                                <th>Bobot(%)</th>
                                <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                            
                    <td>1</td>
                        <td><?php echo $spl_nama; ?></td>
                        <td><input data-error="Data yang dimasukkan harus angka, jika terdapat koma gunakan titik(.) sebagai koma" pattern="^[0-9.\s]*$" type="text" class="form-control" id="kp_pnp_jml_sub" name="kp_pnp_jml_sub" placeholder="Jumlah" value="<?php echo $kp_pnp_jml_sub; ?>" required></td>
                        <td><input type="text" class="form-control" id="kp_pnp_bobot" name="kp_pnp_bobot" placeholder="Bobot" value="<?php echo $kp_pnp_bobot+0 ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="kp_pnp_nilai" name="kp_pnp_nilai" placeholder="Nilai" value="<?php echo $kp_pnp_nilai+0 ?>" required readonly></td>
                    </tbody>
                    </table>
                 
                 <h5><b>Rekapitulasi Nilai Pengalaman Perusahaan </b></h5>
                    <table class="table table-striped table-bordered table-hover" width="50%">
                    <thead>
                        <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>NP</th>
                                <th>NPL</th>
                                <th>NPLF</th>
                                <th>NPK</th>
                                <th>NFU</th>
                                <th>KP</th>
                                <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>1</td>
                        <td><?php echo $spl_nama; ?></td>
                        <td><label id='lbl_np_pnp_nilai'><?php echo $np_pnp_nilai+0 ?></label></td>
                        <td><label id='lbl_npl_pnp_nilai'><?php echo $npl_pnp_nilai+0 ?></label></td>
                        <td><label id='lbl_nplf_pnp_nilai'><?php echo $nplf_pnp_nilai+0 ?></label></td>
                        <td><label id='lbl_npk_pnp_nilai'><?php echo $npk_pnp_nilai+0 ?></label></td>
                        <td><label id='lbl_nfu_pnp_nilai'><?php echo $nfu_pnp_nilai+0 ?></label></td>
                        <td><label id='lbl_kp_pnp_nilai'><?php echo $kp_pnp_nilai+0 ?></label></td>
                        <td><input type="text" class="form-control" id="unp_nilai_png_prs" name="unp_nilai_png_prs" placeholder="Total" value="<?php echo $unp_nilai_png_prs ?>" required readonly></td>
                        
                    </tbody>
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

<script type="text/javascript">
$(document).ready(function() {
    function totalAll(){
        var np = parseFloat(document.getElementById("np_pnp_nilai").value);
        var npl = parseFloat(document.getElementById("npl_pnp_nilai").value);
        var nplf = parseFloat(document.getElementById("nplf_pnp_nilai").value);
        var npk = parseFloat(document.getElementById("npk_pnp_nilai").value);
        var nfu = parseFloat(document.getElementById("nfu_pnp_nilai").value);
        var kp = parseFloat(document.getElementById("kp_pnp_nilai").value);
        var total = (np+npl+nplf+npk+nfu+kp);
        if (isNaN(total)){
            document.getElementById("unp_nilai_png_prs").value = '';
        }else{
            document.getElementById("unp_nilai_png_prs").value = total.toFixed(2);
        }
        
    }
    $('#np_pnp_jml_sub').bind('input', function() {
        //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
        var jumlah = parseFloat(document.getElementById('np_pnp_jml_sub').value);
        var bobot = parseFloat(document.getElementById('np_pnp_bobot').value);
        if(!isNaN(jumlah)){
            if(jumlah > 0){
                document.getElementById("np_pnp_nilai").value = bobot;
                document.getElementById("lbl_np_pnp_nilai").innerHTML = bobot;
                //totalAll();
            }else if(jumlah === 0){
                document.getElementById("np_pnp_nilai").value = 0;
                document.getElementById("lbl_np_pnp_nilai").innerHTML = 0;
                //totalAll();
            }else{
                document.getElementById("np_pnp_nilai").value = "";
                document.getElementById("lbl_np_pnp_nilai").innerHTML = '';
            }
        }else{
             document.getElementById("np_pnp_nilai").value = "";
             document.getElementById("lbl_np_pnp_nilai").innerHTML = '';
        }
        totalAll();
    });
    $('#npl_pnp_jml_sub').bind('input', function() {
        //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
        var jumlah = parseFloat(document.getElementById('npl_pnp_jml_sub').value);
        var bobot = parseFloat(document.getElementById('npl_pnp_bobot').value);
        if(!isNaN(jumlah)){
            if(jumlah > 0){
                document.getElementById("npl_pnp_nilai").value = bobot;
                document.getElementById("lbl_npl_pnp_nilai").innerHTML = bobot;
                //totalAll();
            }else if(jumlah === 0){
                document.getElementById("npl_pnp_nilai").value = 0;
                document.getElementById("lbl_npl_pnp_nilai").innerHTML = 0;
                //totalAll();
            }else{
                document.getElementById("npl_pnp_nilai").value = "";
                document.getElementById("lbl_npl_pnp_nilai").innerHTML = '';
            }
        }else{
             document.getElementById("npl_pnp_nilai").value = "";
             document.getElementById("lbl_npl_pnp_nilai").innerHTML = '';
        }
        totalAll();
    });
    
    $('#nplf_pnp_jml_sub').bind('input', function() {
        //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
        var jumlah = parseFloat(document.getElementById('nplf_pnp_jml_sub').value);
        var bobot = parseFloat(document.getElementById('nplf_pnp_bobot').value);
        if(!isNaN(jumlah)){
            if(jumlah > 0){
                document.getElementById("nplf_pnp_nilai").value = bobot;
                document.getElementById("lbl_nplf_pnp_nilai").innerHTML = bobot;
                //totalAll();
            }else if(jumlah === 0){
                document.getElementById("nplf_pnp_nilai").value = 0;
                document.getElementById("lbl_nplf_pnp_nilai").innerHTML = 0;
                //totalAll();
            }else{
                document.getElementById("nplf_pnp_nilai").value = "";
                document.getElementById("lbl_nplf_pnp_nilai").innerHTML = '';
            }
        }else{
             document.getElementById("nplf_pnp_nilai").value = "";
             document.getElementById("lbl_nplf_pnp_nilai").innerHTML = '';
        }
        totalAll();
    });
    
    $('#npk_pnp_jml_sub').bind('input', function() {
        //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
        var jumlah = parseFloat(document.getElementById('npk_pnp_jml_sub').value);
        var bobot = parseFloat(document.getElementById('npk_pnp_bobot').value);
        if(!isNaN(jumlah)){
            if(jumlah > 0){
                document.getElementById("npk_pnp_nilai").value = bobot;
                document.getElementById("lbl_npk_pnp_nilai").innerHTML = bobot;
                //totalAll();
            }else if(jumlah === 0){
                document.getElementById("npk_pnp_nilai").value = 0;
                document.getElementById("lbl_npk_pnp_nilai").innerHTML = 0;
                //totalAll();
            }else{
                document.getElementById("npk_pnp_nilai").value = "";
                document.getElementById("lbl_npk_pnp_nilai").innerHTML = '';
            }
        }else{
             document.getElementById("npk_pnp_nilai").value = "";
             document.getElementById("lbl_npk_pnp_nilai").innerHTML = '';
        }
        totalAll();
    });
    
    $('#nfu_pnp_jml_sub').bind('input', function() {
        //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
        var jumlah = parseFloat(document.getElementById('nfu_pnp_jml_sub').value);
        var bobot = parseFloat(document.getElementById('nfu_pnp_bobot').value);
        if(!isNaN(jumlah)){
            if(jumlah > 0){
                document.getElementById("nfu_pnp_nilai").value = bobot;
                document.getElementById("lbl_nfu_pnp_nilai").innerHTML = bobot;
                //totalAll();
            }else if(jumlah === 0){
                document.getElementById("nfu_pnp_nilai").value = 0;
                document.getElementById("lbl_nfu_pnp_nilai").innerHTML = 0;
                //totalAll();
            }else{
                document.getElementById("nfu_pnp_nilai").value = "";
                document.getElementById("lbl_nfu_pnp_nilai").innerHTML = '';
            }
        }else{
             document.getElementById("nfu_pnp_nilai").value = "";
             document.getElementById("lbl_nfu_pnp_nilai").innerHTML = '';
        }
        totalAll();
    });
    
    $('#kp_pnp_jml_sub').bind('input', function() {
        //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
        var jumlah = parseFloat(document.getElementById('kp_pnp_jml_sub').value);
        var bobot = parseFloat(document.getElementById('kp_pnp_bobot').value);
        if(!isNaN(jumlah)){
            if(jumlah > 0){
                document.getElementById("kp_pnp_nilai").value = bobot;
                document.getElementById("lbl_kp_pnp_nilai").innerHTML = bobot;
                //totalAll();
            }else if(jumlah === 0){
                document.getElementById("kp_pnp_nilai").value = 0;
                document.getElementById("lbl_kp_pnp_nilai").innerHTML = 0;
                //totalAll();
            }else{
                document.getElementById("kp_pnp_nilai").value = "";
                document.getElementById("lbl_kp_pnp_nilai").innerHTML = '';
            }
        }else{
             document.getElementById("kp_pnp_nilai").value = "";
             document.getElementById("lbl_kp_pnp_nilai").innerHTML = '';
        }
        
        totalAll();
    });
});
</script>