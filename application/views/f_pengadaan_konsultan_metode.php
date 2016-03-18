<?php
    $spl_nama = $dataPengadaan->spl_nama;
    $unp_nilai_pnd_mtd = $dataPengadaan->unp_nilai_pnd_mtd;
    $unp_id = $dataPengadaan->unp_id;
    if($dataPnp != NULL){       
        foreach($dataPnp as $row){
            if($row->mtd_kd_sub == 'PEM'){
                $pem_mtd_penilaian =$row->mtd_penilaian;
                $pem_mtd_nilai =$row->mtd_nilai;
                $pem_mtd_bobot = $row->mtd_bobot;
                $pem_mtd_jml_nilai = $row->mtd_jml_nilai;
            }elseif($row->mtd_kd_sub == 'KET'){
                $ket_mtd_penilaian =$row->mtd_penilaian;
                $ket_mtd_nilai =$row->mtd_nilai;
                $ket_mtd_bobot = $row->mtd_bobot;
                $ket_mtd_jml_nilai = $row->mtd_jml_nilai;
                
                $kua_mtd_bobot =$ket_mtd_bobot/(0.2);
                
            }elseif($row->mtd_kd_sub == 'KON'){
                $kon_mtd_penilaian =$row->mtd_penilaian;
                $kon_mtd_nilai =$row->mtd_nilai;
                $kon_mtd_bobot = $row->mtd_bobot;
                $kon_mtd_jml_nilai = $row->mtd_jml_nilai;
            }elseif($row->mtd_kd_sub == 'APR'){
                $apr_mtd_penilaian =$row->mtd_penilaian;
                $apr_mtd_nilai =$row->mtd_nilai;
                $apr_mtd_bobot = $row->mtd_bobot;
                $apr_mtd_jml_nilai = $row->mtd_jml_nilai;
            }elseif($row->mtd_kd_sub == 'DUK'){
                $duk_mtd_penilaian =$row->mtd_penilaian;
                $duk_mtd_nilai =$row->mtd_nilai;
                $duk_mtd_bobot = $row->mtd_bobot;
                $duk_mtd_jml_nilai =$row->mtd_jml_nilai;
            }elseif($row->mtd_kd_sub == 'URA'){
                $ura_mtd_penilaian =$row->mtd_penilaian;
                $ura_mtd_nilai =$row->mtd_nilai;
                $ura_mtd_bobot = $row->mtd_bobot;
                $ura_mtd_jml_nilai = $row->mtd_jml_nilai; 
            }elseif($row->mtd_kd_sub == 'JAN'){
                $jan_mtd_penilaian =$row->mtd_penilaian;
                $jan_mtd_nilai =$row->mtd_nilai;
                $jan_mtd_bobot = $row->mtd_bobot;
                $jan_mtd_jml_nilai = $row->mtd_jml_nilai;
            }elseif($row->mtd_kd_sub == 'PRO'){
                $pro_mtd_penilaian =$row->mtd_penilaian;
                $pro_mtd_nilai =$row->mtd_nilai;
                $pro_mtd_bobot = $row->mtd_bobot;
                $pro_mtd_jml_nilai = $row->mtd_jml_nilai;
            }elseif($row->mtd_kd_sub == 'ORG'){
                $org_mtd_penilaian =$row->mtd_penilaian;
                $org_mtd_nilai =$row->mtd_nilai;
                $org_mtd_bobot = $row->mtd_bobot;
                $org_mtd_jml_nilai = $row->mtd_jml_nilai;
            }elseif($row->mtd_kd_sub == 'KEB'){
                $keb_mtd_penilaian =$row->mtd_penilaian;
                $keb_mtd_nilai =$row->mtd_nilai;
                $keb_mtd_bobot = $row->mtd_bobot;
                $keb_mtd_jml_nilai = $row->mtd_jml_nilai;
            }elseif($row->mtd_kd_sub == 'PENA'){
                $penA_mtd_penilaian =$row->mtd_penilaian;
                $penA_mtd_nilai =$row->mtd_nilai;
                $penA_mtd_bobot = $row->mtd_bobot;
                $penA_mtd_jml_nilai = $row->mtd_jml_nilai;
                
                $has_mtd_bobot = $penA_mtd_bobot/(0.35);
                
            }elseif($row->mtd_kd_sub == 'PENST'){
                $penST_mtd_penilaian =$row->mtd_penilaian;
                $penST_mtd_nilai =$row->mtd_nilai;
                $penST_mtd_bobot = $row->mtd_bobot;
                $penST_mtd_jml_nilai = $row->mtd_jml_nilai;
            }elseif($row->mtd_kd_sub == 'PENL'){
                $penL_mtd_penilaian =$row->mtd_penilaian;
                $penL_mtd_nilai = $row->mtd_nilai;
                $penL_mtd_bobot = $row->mtd_bobot;
                $penL_mtd_jml_nilai = $row->mtd_jml_nilai;
            }elseif($row->mtd_kd_sub == 'GAG'){
                $gag_mtd_penilaian =$row->mtd_penilaian;
                $gag_mtd_nilai =$row->mtd_nilai;
                $gag_mtd_bobot = $row->mtd_bobot;
                $gag_mtd_jml_nilai = $row->mtd_jml_nilai;
            }
        }
    }else{
        $pem_mtd_penilaian ="";
        $pem_mtd_nilai ="";
        $pem_mtd_bobot = 0.3;
        $pem_mtd_jml_nilai = "";
        
        $kua_mtd_bobot =0.35;

        $ket_mtd_penilaian ="";
        $ket_mtd_nilai ="";
        $ket_mtd_bobot = 0.2*$kua_mtd_bobot;
        $ket_mtd_jml_nilai = "";

        $kon_mtd_penilaian ="";
        $kon_mtd_nilai ="";
        $kon_mtd_bobot = 0.1*$kua_mtd_bobot;
        $kon_mtd_jml_nilai = "";

        $apr_mtd_penilaian ="";
        $apr_mtd_nilai ="";
        $apr_mtd_bobot = 0.1*$kua_mtd_bobot;
        $apr_mtd_jml_nilai = "";

        $duk_mtd_penilaian ="";
        $duk_mtd_nilai ="";
        $duk_mtd_bobot = 0.1*$kua_mtd_bobot;
        $duk_mtd_jml_nilai = "";

        $ura_mtd_penilaian ="";
        $ura_mtd_nilai ="";
        $ura_mtd_bobot = 0.1*$kua_mtd_bobot;
        $ura_mtd_jml_nilai = ""; 
        
        $jan_mtd_penilaian ="";
        $jan_mtd_nilai ="";
        $jan_mtd_bobot = 0.1*$kua_mtd_bobot;
        $jan_mtd_jml_nilai = "";
        
        $pro_mtd_penilaian ="";
        $pro_mtd_nilai ="";
        $pro_mtd_bobot = 0.1*$kua_mtd_bobot;
        $pro_mtd_jml_nilai = "";
        
        $org_mtd_penilaian ="";
        $org_mtd_nilai ="";
        $org_mtd_bobot = 0.1*$kua_mtd_bobot;
        $org_mtd_jml_nilai = "";
        
        $keb_mtd_penilaian ="";
        $keb_mtd_nilai ="";
        $keb_mtd_bobot = 0.1*$kua_mtd_bobot;
        $keb_mtd_jml_nilai = "";
        
        $has_mtd_bobot = 0.1;
        
        $penA_mtd_penilaian ="";
        $penA_mtd_nilai ="";
        $penA_mtd_bobot = 0.35*$has_mtd_bobot;
        $penA_mtd_jml_nilai = "";
        
        $penST_mtd_penilaian ="";
        $penST_mtd_nilai ="";
        $penST_mtd_bobot = 0.35*$has_mtd_bobot;
        $penST_mtd_jml_nilai = "";
        
        $penL_mtd_penilaian ="";
        $penL_mtd_nilai ="";
        $penL_mtd_bobot = 0.3*$has_mtd_bobot;
        $penL_mtd_jml_nilai = "";
        
        $gag_mtd_penilaian ="";
        $gag_mtd_nilai ="";
        $gag_mtd_bobot = 0.25;
        $gag_mtd_jml_nilai = "";
        
    }
?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php // echo "$title"; ?></h3>
            </div>
            <div class="panel-body">
            <form method="post" action="<?php echo base_url()."KonsultanTeknis/proses_tambah_metodePerusahaan/".$unp_id;?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
            <?php //if($statuspage == 'edit'){ ?> 
                <div class="col-md-12">
                    <h4><b>UNSUR PENDEKATAN DAN METODOLOGI PERUSAHAAN</b></h4><br>
                    <div class="col-md-9">
                    <h5><b><?php echo $spl_nama; ?></b></h5>
                    </div>
                    <div class="col-md-3">
                        <h5><b> Penilaian: </b> <br>  Sangat Baik (A) =100 <br> Baik (B) =80 <br> Cukup Baik (C) =60 <br> Kurang (D) =40 <br> Sangat Kurang (E) =20 <br> Tidak memberikan tanggapan (F) =0 </h5>
                    
                    </div>
                    <table class="table table-striped table-bordered table-hover" width="50%">
                    <thead>
                        <tr>
                                <th>No</th>
                                <th>Subunsur</th>
                                <th>Penilaian</th>
                                <th>Nilai</th>
                                <th>Bobot</th>
                                <th>Jumlah Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        >
                        <tr>
                        <td>1</td>
                        <td><b> Pemahaman atas jasa layanan yang tercantum dalam KAK <b> </td>
                        <td><select class="form-control" id="pem_mtd_penilaian" name="pem_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <?php $str = 'A';?>
                                <?php for ($i=0; $i<6;$i++){?>
                                    <option value="<?php echo $str; ?>" <?php if($pem_mtd_penilaian == $str){echo 'selected';}?> ><?php echo $str; ?></option>
                                    <?php $str = ++$str; ?>
                                <?php }?>
                            </select></td>  
                        <td><input type="text" class="form-control" id="pem_mtd_nilai" name="pem_mtd_nilai" placeholder="Nilai" value="<?php echo $pem_mtd_nilai ?>" required readonly></td>           
                        <td><input type="text" class="form-control" id="pem_mtd_bobot" name="pem_mtd_bobot" placeholder="Bobot" value="<?php echo $pem_mtd_bobot ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="pem_mtd_jml_nilai" name="pem_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php echo $pem_mtd_jml_nilai ?>" required readonly></td>
                        </tr>
                        
                        <tr>
                        <td>2</td>
                        <td><b>Kualitas metodologi</b></td>
                        <td></td>
                        <td></td>
                        <td><input type="text" class="form-control" id="kua_mtd_bobot" name="kua_mtd_bobot" placeholder="Bobot" value="<?php echo $kua_mtd_bobot+0 ?>" readonly required></td>
                        <td></td>
                        </tr>
                        
                        <tr>
                        <td></td>
                        <td>ketepatan analisa yang disampaikan dan langkah pemecahan yang diusulkan</td>
                        <td><select class="form-control" id="ket_mtd_penilaian" name="ket_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <?php $str = 'A';?>
                                <?php for ($i=0; $i<6;$i++){?>
                                    <option value="<?php echo $str; ?>" <?php if($ket_mtd_penilaian == $str){echo 'selected';}?> ><?php echo $str; ?></option>
                                    <?php $str = ++$str; ?>
                                <?php }?>
                            </select></td>  
                        <td><input type="text" class="form-control" id="ket_mtd_nilai" name="ket_mtd_nilai" placeholder="Nilai" value="<?php echo $ket_mtd_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="ket_mtd_bobot" name="ket_mtd_bobot" placeholder="Bobot" value="<?php echo $ket_mtd_bobot ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="ket_mtd_jml_nilai" name="ket_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php echo $ket_mtd_jml_nilai ?>" required readonly></td>
                        </tr>
                        
                         <tr>
                        <td></td>
                        <td>konsistensi antara metodologi dengan  rencana kerja</td>
                        <td><select class="form-control" id="kon_mtd_penilaian" name="kon_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <?php $str = 'A';?>
                                <?php for ($i=0; $i<6;$i++){?>
                                    <option value="<?php echo $str; ?>" <?php if($kon_mtd_penilaian == $str){echo 'selected';}?> ><?php echo $str; ?></option>
                                    <?php $str = ++$str; ?>
                                <?php }?>
                            </select></td>  
                        <td><input type="text" class="form-control" id="kon_mtd_nilai" name="kon_mtd_nilai" placeholder="Nilai" value="<?php echo $kon_mtd_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="kon_mtd_bobot" name="kon_mtd_bobot" placeholder="Bobot" value="<?php echo $kon_mtd_bobot ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="kon_mtd_jml_nilai" name="kon_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php echo $kon_mtd_jml_nilai ?>" required readonly></td>
                        </tr>
                        
                         <tr>
                        <td></td>
                        <td>apresiasi terhadap inovasi</td>
                        <td><select class="form-control" id="apr_mtd_penilaian" name="apr_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <?php $str = 'A';?>
                                <?php for ($i=0; $i<6;$i++){?>
                                    <option value="<?php echo $str; ?>" <?php if($apr_mtd_penilaian == $str){echo 'selected';}?> ><?php echo $str; ?></option>
                                    <?php $str = ++$str; ?>
                                <?php }?>
                            </select></td>  
                        <td><input type="text" class="form-control" id="apr_mtd_nilai" name="apr_mtd_nilai" placeholder="Nilai" value="<?php echo $apr_mtd_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="apr_mtd_bobot" name="apr_mtd_bobot" placeholder="Bobot" value="<?php echo $apr_mtd_bobot ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="apr_mtd_jml_nilai" name="apr_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php echo $apr_mtd_jml_nilai ?>" required readonly></td>
                        </tr>
                        
                         <tr>
                        <td></td>
                        <td>dukungan data yang tersedia terhadap KAK</td>
                        <td><select class="form-control" id="duk_mtd_penilaian" name="duk_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <?php $str = 'A';?>
                                <?php for ($i=0; $i<6;$i++){?>
                                    <option value="<?php echo $str; ?>" <?php if($duk_mtd_penilaian == $str){echo 'selected';}?> ><?php echo $str; ?></option>
                                    <?php $str = ++$str; ?>
                                <?php }?>
                            </select></td>    
                        <td><input type="text" class="form-control" id="duk_mtd_nilai" name="duk_mtd_nilai" placeholder="Nilai" value="<?php echo $duk_mtd_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="duk_mtd_bobot" name="duk_mtd_bobot" placeholder="Bobot" value="<?php echo $duk_mtd_bobot ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="duk_mtd_jml_nilai" name="duk_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php echo $duk_mtd_jml_nilai ?>" required readonly></td>
                        </tr>
                        
                         <tr>
                        <td></td>
                        <td>uraian tugas</td>
                        <td><select class="form-control" id="ura_mtd_penilaian" name="ura_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <?php $str = 'A';?>
                                <?php for ($i=0; $i<6;$i++){?>
                                    <option value="<?php echo $str; ?>" <?php if($ura_mtd_penilaian == $str){echo 'selected';}?> ><?php echo $str; ?></option>
                                    <?php $str = ++$str; ?>
                                <?php }?>
                            </select></td>  
                        <td><input type="text" class="form-control" id="ura_mtd_nilai" name="ura_mtd_nilai" placeholder="Nilai" value="<?php echo $ura_mtd_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="ura_mtd_bobot" name="ura_mtd_bobot" placeholder="Bobot" value="<?php echo $ura_mtd_bobot ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="ura_mtd_jml_nilai" name="ura_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php echo $ura_mtd_jml_nilai ?>" required readonly></td>
                        </tr>
                        
                         <tr>
                        <td></td>
                        <td>jangka waktu pelaksanaan</td>
                       <td><select class="form-control" id="jan_mtd_penilaian" name="jan_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <?php $str = 'A';?>
                                <?php for ($i=0; $i<6;$i++){?>
                                    <option value="<?php echo $str; ?>" <?php if($jan_mtd_penilaian == $str){echo 'selected';}?> ><?php echo $str; ?></option>
                                    <?php $str = ++$str; ?>
                                <?php }?>
                            </select></td>  
                        <td><input type="text" class="form-control" id="jan_mtd_nilai" name="jan_mtd_nilai" placeholder="Nilai" value="<?php echo $jan_mtd_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="jan_mtd_bobot" name="jan_mtd_bobot" placeholder="Bobot" value="<?php echo $jan_mtd_bobot ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="jan_mtd_jml_nilai" name="jan_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php echo $jan_mtd_jml_nilai ?>" required readonly></td>
                        </tr> 
                         
                        <tr>
                        <td></td>
                        <td>program kerja, jadwal pekerjaan, dan jadwal penugasan</td>
                        <td><select class="form-control" id="pro_mtd_penilaian" name="pro_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <?php $str = 'A';?>
                                <?php for ($i=0; $i<6;$i++){?>
                                    <option value="<?php echo $str; ?>" <?php if($pro_mtd_penilaian == $str){echo 'selected';}?> ><?php echo $str; ?></option>
                                    <?php $str = ++$str; ?>
                                <?php }?>
                            </select></td>  
                        <td><input type="text" class="form-control" id="pro_mtd_nilai" name="pro_mtd_nilai" placeholder="Nilai" value="<?php echo $pro_mtd_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="pro_mtd_bobot" name="pro_mtd_bobot" placeholder="Bobot" value="<?php echo $pro_mtd_bobot ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="pro_mtd_jml_nilai" name="pro_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php echo $pro_mtd_jml_nilai ?>" required readonly></td>
                        </tr>
                        
                         <tr>
                        <td></td>
                        <td>organisasi</td>
                        <td><select class="form-control" id="org_mtd_penilaian" name="org_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <?php $str = 'A';?>
                                <?php for ($i=0; $i<6;$i++){?>
                                    <option value="<?php echo $str; ?>" <?php if($org_mtd_penilaian == $str){echo 'selected';}?> ><?php echo $str; ?></option>
                                    <?php $str = ++$str; ?>
                                <?php }?>
                            </select></td>  
                        <td><input type="text" class="form-control" id="org_mtd_nilai" name="org_mtd_nilai" placeholder="Nilai" value="<?php echo $org_mtd_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="org_mtd_bobot" name="org_mtd_bobot" placeholder="Bobot" value="<?php echo $org_mtd_bobot ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="org_mtd_jml_nilai" name="org_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php echo $org_mtd_jml_nilai ?>" required readonly></td>
                        </tr>
                        
                         <tr>
                        <td></td>
                        <td>kebutuhan fasilitas penunjang</td>
                        <td><select class="form-control" id="keb_mtd_penilaian" name="keb_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <?php $str = 'A';?>
                                <?php for ($i=0; $i<6;$i++){?>
                                    <option value="<?php echo $str; ?>" <?php if($keb_mtd_penilaian == $str){echo 'selected';}?> ><?php echo $str; ?></option>
                                    <?php $str = ++$str; ?>
                                <?php }?>
                            </select></td>  
                        <td><input type="text" class="form-control" id="keb_mtd_nilai" name="keb_mtd_nilai" placeholder="Nilai" value="<?php echo $keb_mtd_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="keb_mtd_bobot" name="keb_mtd_bobot" placeholder="Bobot" value="<?php echo $keb_mtd_bobot ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="keb_mtd_jml_nilai" name="keb_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php echo $keb_mtd_jml_nilai ?>" required readonly></td>
                        </tr>
                        
                         <tr>
                        <td>3</td>
                        <td><b>Hasil kerja (deliverable)</b></td>
                        <td></td>
                        <td></td>
                        <td><input type="text" class="form-control" id="has_mtd_bobot" name="has_mtd_bobot" placeholder="Bobot" value="<?php echo $has_mtd_bobot+0 ?>" required readonly></td>
                        <td></td>
                        </tr>
                        
                        <tr>
                        <td></td>
                        <td>penyajian analisis dan gambar-gambar kerja</td>
                        <td><select class="form-control" id="penA_mtd_penilaian" name="penA_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <?php $str = 'A';?>
                                <?php for ($i=0; $i<6;$i++){?>
                                    <option value="<?php echo $str; ?>" <?php if($penA_mtd_penilaian == $str){echo 'selected';}?> ><?php echo $str; ?></option>
                                    <?php $str = ++$str; ?>
                                <?php }?>
                            </select></td>  
                        <td><input type="text" class="form-control" id="penA_mtd_nilai" name="penA_mtd_nilai" placeholder="Nilai" value="<?php echo $penA_mtd_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="penA_mtd_bobot" name="penA_mtd_bobot" placeholder="Bobot" value="<?php echo $penA_mtd_bobot ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="penA_mtd_jml_nilai" name="penA_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php echo $penA_mtd_jml_nilai ?>" required readonly></td>
                        </tr>
                        
                         <tr>
                        <td></td>
                        <td>penyajian spesifikasi teknis dan perhitungan teknis</td>
                        <td><select class="form-control" id="penST_mtd_penilaian" name="penST_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <?php $str = 'A';?>
                                <?php for ($i=0; $i<6;$i++){?>
                                    <option value="<?php echo $str; ?>" <?php if($penST_mtd_penilaian == $str){echo 'selected';}?> ><?php echo $str; ?></option>
                                    <?php $str = ++$str; ?>
                                <?php }?>
                            </select></td>  
                        <td><input type="text" class="form-control" id="penST_mtd_nilai" name="penST_mtd_nilai" placeholder="Nilai" value="<?php echo $penST_mtd_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="penST_mtd_bobot" name="penST_mtd_bobot" placeholder="Bobot" value="<?php echo $penST_mtd_bobot ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="penST_mtd_jml_nilai" name="penST_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php echo $penST_mtd_jml_nilai ?>" required readonly></td>
                        </tr>
                        
                         <tr>
                        <td></td>
                        <td>penyajian laporan-laporan</td>
                        <td><select class="form-control" id="penL_mtd_penilaian" name="penL_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <?php $str = 'A';?>
                                <?php for ($i=0; $i<6;$i++){?>
                                    <option value="<?php echo $str; ?>" <?php if($penL_mtd_penilaian == $str){echo 'selected';}?> ><?php echo $str; ?></option>
                                    <?php $str = ++$str; ?>
                                <?php }?>
                            </select></td>  
                        <td><input type="text" class="form-control" id="penL_mtd_nilai" name="penL_mtd_nilai" placeholder="Nilai" value="<?php echo $penL_mtd_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="penL_mtd_bobot" name="penL_mtd_bobot" placeholder="Bobot" value="<?php echo $penL_mtd_bobot ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="penL_mtd_jml_nilai" name="penL_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php echo $penL_mtd_jml_nilai ?>" required readonly></td>
                        </tr>
                        
                        <tr>
                        <td>4</td>
                        <td><b>Gagasan baru yang diajukan oleh peserta untuk meningkatkan kualitas keluaran yang diinginkan dalam KAK </b> </td>
                        <td><select class="form-control" id="gag_mtd_penilaian" name="gag_mtd_penilaian" required>
                            	<option value="" >-</option>
                                <?php $str = 'A';?>
                                <?php for ($i=0; $i<6;$i++){?>
                                    <option value="<?php echo $str; ?>" <?php if($gag_mtd_penilaian == $str){echo 'selected';}?> ><?php echo $str; ?></option>
                                    <?php $str = ++$str; ?>
                                <?php }?>
                            </select></td>  
                        <td><input type="text" class="form-control" id="gag_mtd_nilai" name="gag_mtd_nilai" placeholder="Nilai" value="<?php echo $gag_mtd_nilai ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="gag_mtd_bobot" name="gag_mtd_bobot" placeholder="Bobot" value="<?php echo $gag_mtd_bobot ?>" required readonly></td>
                        <td><input type="text" class="form-control" id="gag_mtd_jml_nilai" name="gag_mtd_jml_nilai" placeholder="Jumlah Nilai" value="<?php echo $gag_mtd_jml_nilai ?>" required readonly></td>
                        </tr>
                        
                    </tbody>
                    </table>
                    <table class="table table-striped table-bordered table-hover" width="50%">
                        <thead>
                     <tr>
                        <td>JUMLAH NILAI UNSUR</td>
                        <td><input type="text" class="form-control" id="unp_nilai_pnd_mtd" name="unp_nilai_pnd_mtd" placeholder="Total" value="<?php echo $unp_nilai_pnd_mtd ?>" required readonly></td>
                     </tr>
                     </thead>
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
    function getNilai(penilaian){
        var day = "";
        switch (penilaian) {
            case 'A':
                day = 100;
                break;
            case 'B':
                day = 80;
                break;
            case 'C':
                day = 60;
                break;
            case 'D':
                day = 40;
                break;
            case 'E':
                day = 20;
                break;
            case 'F':
                day = 0;
                break;
            default:
                day = "";
        }
        return day;
    }
    
    function totalAll(){
        var pem = parseFloat(document.getElementById("pem_mtd_jml_nilai").value);
        var ket = parseFloat(document.getElementById("ket_mtd_jml_nilai").value);
        var kon = parseFloat(document.getElementById("kon_mtd_jml_nilai").value);
        var apr = parseFloat(document.getElementById("apr_mtd_jml_nilai").value);
        var duk = parseFloat(document.getElementById("duk_mtd_jml_nilai").value);
        var ura = parseFloat(document.getElementById("ura_mtd_jml_nilai").value);
        var jan = parseFloat(document.getElementById("jan_mtd_jml_nilai").value);
        var pro = parseFloat(document.getElementById("pro_mtd_jml_nilai").value);
        var org = parseFloat(document.getElementById("org_mtd_jml_nilai").value);
        var keb = parseFloat(document.getElementById("keb_mtd_jml_nilai").value);
        var pena = parseFloat(document.getElementById("penA_mtd_jml_nilai").value);
        var penst = parseFloat(document.getElementById("penST_mtd_jml_nilai").value);
        var penl = parseFloat(document.getElementById("penL_mtd_jml_nilai").value);
        var gag = parseFloat(document.getElementById("gag_mtd_jml_nilai").value);
        var total = (pem+ket+kon+apr+duk+ura+jan+pro+org+keb+pena+penst+penl+gag);
        if (isNaN(total)){
            document.getElementById("unp_nilai_pnd_mtd").value = '';
        }else{
            document.getElementById("unp_nilai_pnd_mtd").value = total.toFixed(2);
        }
        
    }
    
    $('#pem_mtd_penilaian').change(function() {
        //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
        var penilaian = document.getElementById('pem_mtd_penilaian').value;
        var bobot = document.getElementById('pem_mtd_bobot').value;
        var nilai = getNilai(penilaian);
        var jumlah = parseFloat(nilai)*parseFloat(bobot);
        if(isNaN(nilai)){
            document.getElementById('pem_mtd_nilai').value = "";
        }else{
            document.getElementById('pem_mtd_nilai').value = nilai;
        }
        if(isNaN(jumlah)){
            document.getElementById('pem_mtd_jml_nilai').value = "";
        }else{
            document.getElementById('pem_mtd_jml_nilai').value = jumlah.toFixed(2);
        }
        totalAll();
    });
    
    $('#ket_mtd_penilaian').change(function() {
        //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
        var penilaian = document.getElementById('ket_mtd_penilaian').value;
        var bobot = document.getElementById('ket_mtd_bobot').value;
        var nilai = getNilai(penilaian);
        var jumlah = parseFloat(nilai)*parseFloat(bobot);
        if(isNaN(nilai)){
            document.getElementById('ket_mtd_nilai').value = "";
        }else{
            document.getElementById('ket_mtd_nilai').value = nilai;
        }
        if(isNaN(jumlah)){
            document.getElementById('ket_mtd_jml_nilai').value = "";
        }else{
            document.getElementById('ket_mtd_jml_nilai').value = jumlah.toFixed(2);
        }
        totalAll();
    });
    
    $('#kon_mtd_penilaian').change(function() {
        //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
        var penilaian = document.getElementById('kon_mtd_penilaian').value;
        var bobot = document.getElementById('kon_mtd_bobot').value;
        var nilai = getNilai(penilaian);
        var jumlah = parseFloat(nilai)*parseFloat(bobot);
        if(isNaN(nilai)){
            document.getElementById('kon_mtd_nilai').value = "";
        }else{
            document.getElementById('kon_mtd_nilai').value = nilai;
        }
        if(isNaN(jumlah)){
            document.getElementById('kon_mtd_jml_nilai').value = "";
        }else{
            document.getElementById('kon_mtd_jml_nilai').value = jumlah.toFixed(2);
        }
        totalAll();
    });
    
    $('#apr_mtd_penilaian').change(function() {
        //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
        var penilaian = document.getElementById('apr_mtd_penilaian').value;
        var bobot = document.getElementById('apr_mtd_bobot').value;
        var nilai = getNilai(penilaian);
        var jumlah = parseFloat(nilai)*parseFloat(bobot);
        if(isNaN(nilai)){
            document.getElementById('apr_mtd_nilai').value = "";
        }else{
            document.getElementById('apr_mtd_nilai').value = nilai;
        }
        if(isNaN(jumlah)){
            document.getElementById('apr_mtd_jml_nilai').value = "";
        }else{
            document.getElementById('apr_mtd_jml_nilai').value = jumlah.toFixed(2);
        }
        totalAll();
    });
    
    $('#duk_mtd_penilaian').change(function() {
        //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
        var penilaian = document.getElementById('duk_mtd_penilaian').value;
        var bobot = document.getElementById('duk_mtd_bobot').value;
        var nilai = getNilai(penilaian);
        var jumlah = parseFloat(nilai)*parseFloat(bobot);
        if(isNaN(nilai)){
            document.getElementById('duk_mtd_nilai').value = "";
        }else{
            document.getElementById('duk_mtd_nilai').value = nilai;
        }
        if(isNaN(jumlah)){
            document.getElementById('duk_mtd_jml_nilai').value = "";
        }else{
            document.getElementById('duk_mtd_jml_nilai').value = jumlah.toFixed(2);
        }
        totalAll();
    });
    
    $('#ura_mtd_penilaian').change(function() {
        //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
        var penilaian = document.getElementById('ura_mtd_penilaian').value;
        var bobot = document.getElementById('ura_mtd_bobot').value;
        var nilai = getNilai(penilaian);
        var jumlah = parseFloat(nilai)*parseFloat(bobot);
        if(isNaN(nilai)){
            document.getElementById('ura_mtd_nilai').value = "";
        }else{
            document.getElementById('ura_mtd_nilai').value = nilai;
        }
        if(isNaN(jumlah)){
            document.getElementById('ura_mtd_jml_nilai').value = "";
        }else{
            document.getElementById('ura_mtd_jml_nilai').value = jumlah.toFixed(2);
        }
        totalAll();
    });
    
    $('#jan_mtd_penilaian').change(function() {
        //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
        var penilaian = document.getElementById('jan_mtd_penilaian').value;
        var bobot = document.getElementById('jan_mtd_bobot').value;
        var nilai = getNilai(penilaian);
        var jumlah = parseFloat(nilai)*parseFloat(bobot);
        if(isNaN(nilai)){
            document.getElementById('jan_mtd_nilai').value = "";
        }else{
            document.getElementById('jan_mtd_nilai').value = nilai;
        }
        if(isNaN(jumlah)){
            document.getElementById('jan_mtd_jml_nilai').value = "";
        }else{
            document.getElementById('jan_mtd_jml_nilai').value = jumlah.toFixed(2);
        }
        totalAll();
    });
    
    $('#pro_mtd_penilaian').change(function() {
        //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
        var penilaian = document.getElementById('pro_mtd_penilaian').value;
        var bobot = document.getElementById('pro_mtd_bobot').value;
        var nilai = getNilai(penilaian);
        var jumlah = parseFloat(nilai)*parseFloat(bobot);
        if(isNaN(nilai)){
            document.getElementById('pro_mtd_nilai').value = "";
        }else{
            document.getElementById('pro_mtd_nilai').value = nilai;
        }
        if(isNaN(jumlah)){
            document.getElementById('pro_mtd_jml_nilai').value = "";
        }else{
            document.getElementById('pro_mtd_jml_nilai').value = jumlah.toFixed(2);
        }
        totalAll();
    });
    
    $('#org_mtd_penilaian').change(function() {
        //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
        var penilaian = document.getElementById('org_mtd_penilaian').value;
        var bobot = document.getElementById('org_mtd_bobot').value;
        var nilai = getNilai(penilaian);
        var jumlah = parseFloat(nilai)*parseFloat(bobot);
        if(isNaN(nilai)){
            document.getElementById('org_mtd_nilai').value = "";
        }else{
            document.getElementById('org_mtd_nilai').value = nilai;
        }
        if(isNaN(jumlah)){
            document.getElementById('org_mtd_jml_nilai').value = "";
        }else{
            document.getElementById('org_mtd_jml_nilai').value = jumlah.toFixed(2);
        }
        totalAll();
    });
    
    $('#keb_mtd_penilaian').change(function() {
        //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
        var penilaian = document.getElementById('keb_mtd_penilaian').value;
        var bobot = document.getElementById('keb_mtd_bobot').value;
        var nilai = getNilai(penilaian);
        var jumlah = parseFloat(nilai)*parseFloat(bobot);
        if(isNaN(nilai)){
            document.getElementById('keb_mtd_nilai').value = "";
        }else{
            document.getElementById('keb_mtd_nilai').value = nilai;
        }
        if(isNaN(jumlah)){
            document.getElementById('keb_mtd_jml_nilai').value = "";
        }else{
            document.getElementById('keb_mtd_jml_nilai').value = jumlah.toFixed(2);
        }
        totalAll();
    });
    
    $('#penA_mtd_penilaian').change(function() {
        //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
        var penilaian = document.getElementById('penA_mtd_penilaian').value;
        var bobot = document.getElementById('penA_mtd_bobot').value;
        var nilai = getNilai(penilaian);
        var jumlah = parseFloat(nilai)*parseFloat(bobot);
        if(isNaN(nilai)){
            document.getElementById('penA_mtd_nilai').value = "";
        }else{
            document.getElementById('penA_mtd_nilai').value = nilai;
        }
        if(isNaN(jumlah)){
            document.getElementById('penA_mtd_jml_nilai').value = "";
        }else{
            document.getElementById('penA_mtd_jml_nilai').value = jumlah.toFixed(2);
        }
        totalAll();
    });
    
    $('#penST_mtd_penilaian').change(function() {
        //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
        var penilaian = document.getElementById('penST_mtd_penilaian').value;
        var bobot = document.getElementById('penST_mtd_bobot').value;
        var nilai = getNilai(penilaian);
        var jumlah = parseFloat(nilai)*parseFloat(bobot);
        if(isNaN(nilai)){
            document.getElementById('penST_mtd_nilai').value = "";
        }else{
            document.getElementById('penST_mtd_nilai').value = nilai;
        }
        if(isNaN(jumlah)){
            document.getElementById('penST_mtd_jml_nilai').value = "";
        }else{
            document.getElementById('penST_mtd_jml_nilai').value = jumlah.toFixed(2);
        }
        totalAll();
    });
    
    $('#penL_mtd_penilaian').change(function() {
        //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
        var penilaian = document.getElementById('penL_mtd_penilaian').value;
        var bobot = document.getElementById('penL_mtd_bobot').value;
        var nilai = getNilai(penilaian);
        var jumlah = parseFloat(nilai)*parseFloat(bobot);
        if(isNaN(nilai)){
            document.getElementById('penL_mtd_nilai').value = "";
        }else{
            document.getElementById('penL_mtd_nilai').value = nilai;
        }
        if(isNaN(jumlah)){
            document.getElementById('penL_mtd_jml_nilai').value = "";
        }else{
            document.getElementById('penL_mtd_jml_nilai').value = jumlah.toFixed(2);
        }
        totalAll();
    });
    
    $('#gag_mtd_penilaian').change(function() {
        //$(this).next().stop(true, true).fadeIn(0).html('dsdsd ' + $(this).val()).fadeOut(2000);
        var penilaian = document.getElementById('gag_mtd_penilaian').value;
        var bobot = document.getElementById('gag_mtd_bobot').value;
        var nilai = getNilai(penilaian);
        var jumlah = parseFloat(nilai)*parseFloat(bobot);
        if(isNaN(nilai)){
            document.getElementById('gag_mtd_nilai').value = "";
        }else{
            document.getElementById('gag_mtd_nilai').value = nilai;
        }
        if(isNaN(jumlah)){
            document.getElementById('gag_mtd_jml_nilai').value = "";
        }else{
            document.getElementById('gag_mtd_jml_nilai').value = jumlah.toFixed(2);
        }
        totalAll();
    });
});
</script>