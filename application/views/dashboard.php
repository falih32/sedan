<?php 
$role = $this->session->userdata('id_role'); 
$level = $this->session->userdata('id_level');
$chart2 = json_decode($chart2);
if(isset($chart2->data)){$chart2data = json_encode($chart2->data);}else{$chart2data = json_encode(array());}
?>
<div class="container-fluid">
    <h1>Dashboard</h1><hr>
    <div class="row">
       <?php if ($statusxml==1){
       if ($role==1 && $val<=300){       ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="alert alert-danger alert-dismissible" role="alert">
                    Sisa Kredit SMS anda adalah <?php echo $val ?>. Segera <a href=<?php echo site_url('CekKredit')?>>isi ulang </a> agar SMS Gateway dapat berjalan dengan baik.
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                </div>
            </div>
        </div>        
       <?php }
                  
       }else{
        ?> <div class="alert alert-danger alert-dismissible" role="alert">
                 Terdapat gangguan pada jaringan internet server sehingga cek sms tidak berjalan dengan baik. Silakan coba lagi beberapa saat kemudian.
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                </div>
       <?php } ?>
        
        <?php if ($role == 1 || $role == 2 || $role == 3 || $level == 1){?>
        <div class="col-sm-12"><h3>Surat Masuk (Biro Umum)</h3></div>
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading panelNotif">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-envelope fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $totalSuratDisposisi;?></div>
                            <div>Surat Masuk Yang Sedang Diproses</div>
                        </div>
                    </div>
                </div>
                <a data-toggle="modal" data-target="#collapseSurat2" href="#collapseSurat2" aria-expanded="false" aria-controls="">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-yellow">
                <div class="panel-heading panelNotif">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-envelope-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $totalSuratPending;?></div>
                            <div>Surat Masuk Yang Belum Diproses</div>
                        </div>
                    </div>
                </div>
                <a data-toggle="modal" data-target="#collapseSurat1" href="#collapseSurat1" aria-expanded="false" aria-controls="">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-green">
                <div class="panel-heading panelNotif">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-envelope-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $totalSuratSelesai;?></div>
                            <div>Surat Masuk Yang Telah Selesai</div>
                        </div>
                    </div>
                </div>
                <a data-toggle="modal" data-target="#collapseSurat3" href="#collapseSurat3" aria-expanded="false" aria-controls="">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <?php } ?>
        <?php if($level != 1){?>
        <div class="col-sm-12"><h3>Disposisi (User <?php echo $this->session->userdata('nama'); ?>)</h3></div>
        <?php foreach($statusDisposisi as $row){?>
        <div class="col-sm-4">
            <div class="panel" style="color:#ffffff; background:<?php echo $row->sds_color;?>">
                <div class="panel-heading panelNotif">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-list fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $row->total;?></div>
                            <div>Disposisi Dengan Status <?php echo $row->sds_nama_status;?></div>
                        </div>
                    </div>
                </div>
                <a data-toggle="modal" data-target="#collapseDisposisi<?php echo $row->sds_id;?>" href="#collapseDisposisi<?php echo $row->sds_id;?>" aria-expanded="false" aria-controls="">
                    <div class="panel-footer" style="color:<?php echo $row->sds_color;?>">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <?php } ?>
        <?php } ?>
        <!-- Laporan -->
        <?php if($role == '1' || $level <= '3'){ ?>
        <div class="col-sm-12"><h3>Laporan</h3></div>
        <?php if($role=='1' || $role=='2' || $role=='3' || $level == '1'){ ?>
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6"><i class="fa fa-file"></i> Surat Masuk</div>
                    </div>
                </div>
                <div class="panel-body">
                    <form target="_blank" class="form-horizontal" method="post" action="<?php echo base_url()."Laporan/suratmasuk"; ?>">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sms_bulan">Bulan</label>
                                <select class="form-control" name="sms_bulan">
                                    <option value="01">Januari</option><option value="02">Februari</option>
                                    <option value="03">Maret</option><option value="04">April</option>
                                    <option value="05">Mei</option><option value="06">Juni</option>
                                    <option value="07">Juli</option><option value="08">Agustus</option>
                                    <option value="09">September</option><option value="10">Oktober</option>
                                    <option value="11">November</option><option value="12">Desember</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5 col-md-offset-1">
                            <div class="form-group">
                                <label for="sms_tahun">Tahun</label>
                                <select class="form-control" name="sms_tahun">
                                    <?php 
                                    $year = date("Y");
                                    for($i=$year;$i>=$year-5;$i--){?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <?php if ($role == '1' || $level == 1) {?>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="sms_bagian">Unit Kerja</label>
                                <select class="form-control" name="sms_bagian">
                                    <option value="all">Biro Umum</option>
                                    <?php foreach ($bagian as $row){ if($row->dpt_parent == '0'){?>
                                    <option value="<?php echo $row->dpt_id; ?>"><?php echo $row->dpt_nama; ?></option>
                                    <?php }} ?>
                                </select>
                            </div>
                        </div>
                        <?php } ?>
                        <button type="submit" class="btn btn-primary">Cetak</button>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if($level!='1'){ ?>
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6"><i class="fa fa-file"></i> Disposisi</div>
                    </div>
                </div>
                <div class="panel-body">
                    <form target="_blank" class="form-horizontal" method="post" action="<?php echo base_url()."Laporan/disposisi"; if($role=='1'){echo"Bagian";}?>">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fds_bulan">Bulan</label>
                                <select class="form-control" name="fds_bulan">
                                    <option value="01">Januari</option><option value="02">Februari</option>
                                    <option value="03">Maret</option><option value="04">April</option>
                                    <option value="05">Mei</option><option value="06">Juni</option>
                                    <option value="07">Juli</option><option value="08">Agustus</option>
                                    <option value="09">September</option><option value="10">Oktober</option>
                                    <option value="11">November</option><option value="12">Desember</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5 col-md-offset-1">
                            <div class="form-group">
                                <label for="fds_tahun">Tahun</label>
                                <select class="form-control" name="fds_tahun">
                                    <?php 
                                    $year = date("Y");
                                    for($i=$year;$i>=$year-5;$i--){?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <?php if ($role == '1') {?>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fds_bagian">Unit Kerja</label>
                                <select class="form-control" name="fds_bagian">
                                    <option value="all">Biro Umum</option>
                                    <?php foreach ($bagian as $row){ if($row->dpt_parent == '0'){?>
                                    <option value="<?php echo $row->dpt_id; ?>"><?php echo $row->dpt_nama; ?></option>
                                    <?php }} ?>
                                </select>
                            </div>
                        </div>
                        <?php } ?>
                        <button type="submit" class="btn btn-primary">Cetak</button>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?> 
        <?php if(false){?>
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6"><i class="fa fa-file"></i> Disposisi Bagian</div>
                    </div>
                </div>
                <div class="panel-body">
                    <form target="_blank" class="form-horizontal" method="post" action="<?php echo base_url()."Laporan/disposisiBagian"; ?>">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fds_bulan">Bulan</label>
                                <select class="form-control" name="fds_bulan">
                                    <option value="01">Januari</option><option value="02">Februari</option>
                                    <option value="03">Maret</option><option value="04">April</option>
                                    <option value="05">Mei</option><option value="06">Juni</option>
                                    <option value="07">Juli</option><option value="08">Agustus</option>
                                    <option value="09">September</option><option value="10">Oktober</option>
                                    <option value="11">November</option><option value="12">Desember</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5 col-md-offset-1">
                            <div class="form-group">
                                <label for="fds_tahun">Tahun</label>
                                <select class="form-control" name="fds_tahun">
                                    <?php 
                                    $year = date("Y");
                                    for($i=$year;$i>=$year-5;$i--){?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <?php if ($role == '1') {?>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fds_bagian">Unit Kerja</label>
                                <select class="form-control" name="fds_bagian">
                                    <option value="all">Biro Umum</option>
                                    <?php foreach ($bagian as $row){ if($row->dpt_parent == '0'){?>
                                    <option value="<?php echo $row->dpt_id; ?>"><?php echo $row->dpt_nama; ?></option>
                                    <?php }} ?>
                                </select>
                            </div>
                        </div>
                        <?php } ?>
                        <button type="submit" class="btn btn-primary">Cetak</button>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php } ?>
    </div>
    <div class="modal fade" id="collapseSurat1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-dialog-lg">
            <div class="modal-content modal-lg">
            <div class="modal-header" style="color:#ffffff; background:#F0AD4E"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button><span class="fa fa-envelope-o" aria-hidden="true"></span> Surat Masuk Yang Belum Diproses</div>
            <div class="col-md-6 col-md-offset-6 text-right" id="date_search_srtmsk1">
                <input type="text" class="form-control input-sm tgl" name="s_date_awal_srtmsk1" id="s_date_awal_srtmsk1" placeholder="Tanggal awal" readonly="true">
                <input type="text" class="form-control input-sm tgl" name="s_date_akhir_srtmsk1" id="s_date_akhir_srtmsk1" placeholder="Tanggal akhir" readonly="true">
                <button type="button" data-toggle='tooltip' data-placement='top' title='Reload table' class="form-control btn btn-default btn-sm" id="refresh_srtmsk1"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
            </div>
            <div class="modal-body">
            <table class="table table-hover table-striped" id="tabel-suratmasuk1">
                <thead>
                <tr>
                    <th>ID surat</th>
                    <th>No. Surat /<br>Tgl. Surat</th>
                    <th>Tgl. Surat</th>
                    <th>Tgl. Terima</th>
                    <th>Pengirim /<br>Perihal</th>
                    <th>Perihal</th>
                    <th>Direkam oleh</th>
                    <th>Diterima</th>
                    <th>Aksi</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Diterima sekretaris</th>
                </tr>
                </thead>
            </table>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="collapseSurat2" tabindex="-1" role="dialog" aria-labelledby="collapseSurat2" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-dialog-lg">
            <div class="modal-content modal-lg">
            <div class="modal-header"  style="color:#ffffff; background:#337AB7"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Surat Masuk Yang Sedang Diproses</div>
            <div class="col-md-6 col-md-offset-6 text-right" id="date_search_srtmsk2">
                <input type="text" class="form-control input-sm tgl" name="s_date_awal_srtmsk2" id="s_date_awal_srtmsk2" placeholder="Tanggal awal" readonly="true">
                <input type="text" class="form-control input-sm tgl" name="s_date_akhir_srtmsk2" id="s_date_akhir_srtmsk2" placeholder="Tanggal akhir" readonly="true">
                <button type="button" data-toggle='tooltip' data-placement='top' title='Reload table' class="form-control btn btn-default btn-sm" id="refresh_srtmsk2"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
            </div>
            <div class="modal-body">
            <div class="alert-info">
                Legenda Proses:
                <ul>
                    <li>P1 - Kepala Biro</li>
                    <li>P2 - Kepala Bagian</li>
                    <li>P3 - Kepala Subbagian</li>
                    <li>P4 - Staff atau Kelompok Jabatan Fungsional</li>
                </ul>
            </div>
            <table class="table table-hover table-striped" id="tabel-suratmasuk2">
                <thead>
                <tr>
                    <th>ID surat</th>
                    <th>No. Surat /<br>Tgl. Surat</th>
                    <th>Tgl. Surat</th>
                    <th>Tgl. Terima</th>
                    <th>Pengirim /<br>Perihal</th>
                    <th>Perihal</th>
                    <th>Direkam oleh</th>
                    <th>Diterima</th>
                    <th>Aksi</th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th>Progress</th>
                    <th></th>
                    <th>Cetak</th>
                </tr>
                </thead>
            </table>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="collapseSurat3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-dialog-lg">
            <div class="modal-content modal-lg">
            <div class="modal-header" style="color:#ffffff; background:#5CB85C"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button><span class="fa fa-envelope-o" aria-hidden="true"></span> Surat Masuk Yang Telah Selesai</div>
            <div class="col-md-6 col-md-offset-6 text-right" id="date_search_srtmsk3">
                <input type="text" class="form-control input-sm tgl" name="s_date_awal_srtmsk3" id="s_date_awal_srtmsk3" placeholder="Tanggal awal" readonly="true">
                <input type="text" class="form-control input-sm tgl" name="s_date_akhir_srtmsk3" id="s_date_akhir_srtmsk3" placeholder="Tanggal akhir" readonly="true">
                <button type="button" data-toggle='tooltip' data-placement='top' title='Reload table' class="form-control btn btn-default btn-sm" id="refresh_srtmsk3"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
            </div>
            <div class="modal-body">
            <table class="table table-hover table-striped" id="tabel-suratmasuk3">
                <thead>
                <tr>
                    <th>ID surat</th>
                    <th>No. Surat /<br>Tgl. Surat</th>
                    <th>Tgl. Surat</th>
                    <th>Tgl. Terima</th>
                    <th>Pengirim /<br>Perihal</th>
                    <th>Perihal</th>
                    <th>Direkam oleh</th>
                    <th>Diterima</th>
                    <th>Aksi</th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th>Cetak</th>
                    
                </tr>
                </thead>
            </table>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div>
    <?php foreach($statusDisposisi as $row){?>
    <div class="modal fade" id="collapseDisposisi<?php echo $row->sds_id;?>" data-backdrop="static">
        <div class="modal-dialog modal-dialog-lg">
            <div class="modal-content modal-lg">
            <div class="modal-header" style="color:#ffffff; background:<?php echo $row->sds_color;?>"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Disposisi <?php echo $row->sds_nama_status;?></div>
            <div class="col-md-6 col-md-offset-6 text-right" id="date_search_disposisi<?php echo $row->sds_id;?>">
                <input type="text" class="form-control input-sm tgl" name="s_date_awal_disposisi<?php echo $row->sds_id;?>" id="s_date_awal_disposisi<?php echo $row->sds_id;?>" placeholder="Tanggal awal" readonly="true">
                <input type="text" class="form-control input-sm tgl" name="s_date_akhir_disposisi<?php echo $row->sds_id;?>" id="s_date_akhir_disposisi<?php echo $row->sds_id;?>" placeholder="Tanggal akhir" readonly="true">
                <button type="button" data-toggle='tooltip' data-placement='top' title='Reload table' class="form-control btn btn-default btn-sm" id="refresh_disposisi<?php echo $row->sds_id;?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
            </div>
            <div class="modal-body">
            <table class="table table-responsive table-hover table-striped" id="tabel-disposisi<?php echo $row->sds_id;?>">
            	<thead>
                <tr>
                	<th>No. Surat</th>
                	<th>Pengirim</th>
                        <th>Penerima</th>
                	<th>Catatan</th>
                	<th>Tgl. Disposisi</th>
                	<th>Aksi</th>
                        
                </tr>
                </thead>
            </table>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php if($role == '1' || $role == '2' || $role == '3' || $level == '1'){?>
    <!-- Grafik surat masuk dan disposisi-->
    <div class="row-fluid">
    	<div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6"><i class="fa fa-bar-chart"></i> Grafik Surat Masuk (Biro Umum)</div>
                    <div class="col-md-6 div_filter_chart">
                        <form id="form_filter_chart1">
                            Rentang <input type="text" id="filter_chart1" name="filter_chart1" value="12" size="2" maxlength="2"> bulan terakhir
                            <a type="button" class="btn btn-default btn-sm" id="refresh_chart1"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="panel-body text-center">
            	<div class="col-md-12"><h3>Grafik Surat Masuk<br>(Biro Umum)</h3></div>
                <div class="col-md-12" id="conchart" style="height:400px;"> 
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php if($level != 1){?>
    <!-- Grafik status disposisi-->
    <div class="row-fluid">
    	<div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6"><i class="fa fa-line-chart"></i> Grafik Tindak Lanjut Disposisi (User <?php echo $this->session->userdata('nama'); ?>)</div>
                    <div class="col-md-6 div_filter_chart">
                        <form id="form_filter_chart2">
                            Rentang <input type="text" id="filter_chart2" name="filter_chart2" value="12" size="2" maxlength="2"> bulan terakhir
                            <a type="button" class="btn btn-default btn-sm" id="refresh_chart2"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="panel-body text-center">
            	<div class="col-md-12"><h3>Grafik Tindak Lanjut Disposisi <br>(User <?php echo $this->session->userdata('nama'); ?>)</h3></div>
            	<div class="col-md-12" id="conchart2" style="height:400px;">  
                </div>
                <div class="col-md-12" id="chart2-legend"></div>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php if(false && ($role == 1 || $level <= 2)){ ?>
    <div class="row-fluid">
    	<div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6"><i class="fa fa-table"></i> Data Status Tindak Lanjut Disposisi</div>
                    <div class="col-md-6 text-right">
                        <form id="form_filter_tabel">
                            Status :&nbsp;
                            <select id="tab-selector">
                                <?php foreach($statusDisposisi as $row){?>
                                <option value="<?php echo $row->sds_id; ?>"><?php echo $row->sds_nama_status; ?></option>
                                <?php } ?>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
            <?php foreach($statusDisposisi as $rowStat){?>
            <div class="tab-group" id="tab-group-item-<?php echo $rowStat->sds_id?>">
                <table id="tabel-stat-dispo-<?php echo $rowStat->sds_id?>" class="table table-responsive table-hover">
                    <thead>
                        <th>Bagian / Tahun <?php echo date("Y");?></th>
                        <th>Jan</th>
                        <th>Feb</th>
                        <th>Mar</th>
                        <th>Apr</th>
                        <th>Mei</th>
                        <th>Jun</th>
                        <th>Jul</th>
                        <th>Aug</th>
                        <th>Sep</th>
                        <th>Okt</th>
                        <th>Nov</th>
                        <th>Des</th>
                    </thead>
                    <tbody id="tabel-stat-dispo-body">
                        <?php foreach($dataStatusDispo[$rowStat->sds_id] as $row1){ if($row1->dpt_parent == 0 && ($role == 1 || $user->dpt_id == $row1->dpt_id)){?>
                        <tr class="top-dept" style="background: #f5f5f5;">
                            <td><?php echo '<strong>'.$row1->dpt_nama.'</strong>'; ?></td>
                            <td><?php echo $row1->januari; ?></td>
                            <td><?php echo $row1->februari; ?></td>
                            <td><?php echo $row1->maret; ?></td>
                            <td><?php echo $row1->april; ?></td>
                            <td><?php echo $row1->mei; ?></td>
                            <td><?php echo $row1->juni; ?></td>
                            <td><?php echo $row1->juli; ?></td>
                            <td><?php echo $row1->agustus; ?></td>
                            <td><?php echo $row1->september; ?></td>
                            <td><?php echo $row1->oktober; ?></td>
                            <td><?php echo $row1->november; ?></td>
                            <td><?php echo $row1->desember; ?></td>
                        </tr>
                        <?php foreach($dataStatusDispo[$rowStat->sds_id] as $row2){ if($row2->dpt_parent == $row1->dpt_id){?>
                        <tr class="top-dept">
                            <td><?php echo '- '.$row2->dpt_nama; ?></td>
                            <td><?php echo $row2->januari; ?></td>
                            <td><?php echo $row2->februari; ?></td>
                            <td><?php echo $row2->maret; ?></td>
                            <td><?php echo $row2->april; ?></td>
                            <td><?php echo $row2->mei; ?></td>
                            <td><?php echo $row2->juni; ?></td>
                            <td><?php echo $row2->juli; ?></td>
                            <td><?php echo $row2->agustus; ?></td>
                            <td><?php echo $row2->september; ?></td>
                            <td><?php echo $row2->oktober; ?></td>
                            <td><?php echo $row2->november; ?></td>
                            <td><?php echo $row2->desember; ?></td>
                        </tr>
                        <?php }} ?>
                        <?php }} ?>
                    </tbody>
                </table>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
</div>
    
<script type="application/javascript">
    
$(document).ready(function() {
    
    <?php if($role == '1' || $role == '2' || $role == '3' || $level == '1'){?>
    // --------------- Chart1 ---------------
    var chart = AmCharts.makeChart("conchart", {
        "theme": "light",
        "type": "serial",
        "dataProvider": <?php echo $chart1; ?>,
        "valueAxes": [{
            "stackType": "none",
            "unit": "",
            "position": "left",
            "title": "Jumlah",
        }],
        "startDuration": 1,
        "graphs": [{
            "balloonText": "Surat masuk pada bulan [[category]]: <b>[[value]]</b>",
            "fillAlphas": 0.9,
            "lineAlpha": 0.2,
            "lineColor": "#66FF99",
            "title": "Surat Masuk",
            "type": "column",
            "valueField": "suratmasuk"
        }],
        "plotAreaFillAlphas": 0.1,
        "depth3D": 60,
        "angle": 30,
        "categoryField": "bulan",
        "categoryAxis": {
            "gridPosition": "start",
            "title": "Bulan"
        },
        "legend":{
            "useGraphSettings": true
        },
        "export": {
            "enabled": true
         }
    });
    //function handleClick(event)
    //{
    //    alert(event.item.category + ": " + event.item.values.value);
    //}
    //chart.addListener("clickGraphItem", handleClick);
    function chart1reload(){
        var bln = $('#filter_chart1').val();
        $.ajax({
            url : "<?php echo site_url('Dashboard/getChart1Ajax');?>/"+bln,
            type: "POST",
            success: function(result){
                data = JSON.parse(result);
                chart.dataProvider = data;
                chart.validateData();
                chart.animateAgain();
            }
        });
    }
    
    document.querySelector('#refresh_chart1').addEventListener('click', function(event){chart1reload();});
    $(document).on("submit", "#form_filter_chart1", function (event){chart1reload(); return false;});
    <?php } ?>

    <?php if($level != 1){?>
    // --------------- Chart2 ---------------
    var chart2 = AmCharts.makeChart("conchart2", {
        "theme": "light",
        "type": "serial",
        "dataProvider": <?php echo $chart2data; ?>,
        "valueAxes": [{
            "stackType": "none",
            "unit": "",
            "position": "left",
            "title": "Jumlah",
        }],
        "startDuration": 1,
        "graphs": [
        <?php $i=0; foreach ($chart2->status as $row){?>
        {
            "balloonText": "Disposisi dengan status <?php echo $row; ?> [[category]]: <b>[[value]]</b>",
            "fillAlphas": 0.9,
            "lineAlpha": 0.2,
            "lineColor": "<?php echo $chart2->warna->$row?>",
            "title": "<?php echo $row; ?>",
            "type": "column",
            "valueField": "<?php echo $row; ?>"
        }, 
        <?php $i++; } ?>
        ],
        "plotAreaFillAlphas": 0.1,
        "depth3D": 60,
        "angle": 30,
        "categoryField": "bulan",
        "categoryAxis": {
            "gridPosition": "start",
            "title": "Bulan"
        },
        "legend":{
            "useGraphSettings": true
        },
        "export": {
            "enabled": true
         }
    });
    function chart2reload(){
        var bln = $('#filter_chart2').val();
        $.ajax({
            url : "<?php if($role == 1){echo site_url('Dashboard/getChart2Ajax');}else{echo site_url('Dashboard/getChart2AjaxPerUser');}?>/"+bln,
            type: "POST",
            success: function(result){
                data = JSON.parse(result);
                chart2.dataProvider = data['data'];
                chart2.validateData();
                chart2.animateAgain();
            }
        });
    }
    
    document.querySelector('#refresh_chart2').addEventListener('click', function(event){chart2reload();});
    $(document).on("submit", "#form_filter_chart2", function (event){chart2reload(); return false;});
    <?php } ?>

    // Surat masuk
        var table_srtmsk1 = $('#tabel-suratmasuk1').DataTable( {
    	"paging": true, 
		"search":true,  
		"ordering": true, 
		"responsive": false,
		"scrollX":true,
		"processing":true, 
		"serverSide": true,
                "lengthChange": false,
		"ajax":{
			"url":"<?php echo site_url('Dashboard/ajaxSuratMasukPending');?>",
			"type":"POST",
			"data":function ( d ) {
				d.min = $('#s_date_awal_srtmsk1').val();
				d.max = $('#s_date_akhir_srtmsk1').val();
			}
		},
		"columns": [
                { "data": "sms_id" },
                { "data": "no_tgl" },
                { "data": "sms_tgl_srt" },
                { "data": "sms_tgl_srt_diterima_show" },
                { "data": "pengirim_perihal" },
                { "data": "sms_perihal" },
                { "data": "usr_nama" },
                { "data": "sms_confirm" },
                { "data": "sms_aksi" },
                { "data": "sms_tgl_srt_diterima" },
                { "data": "sms_nomor_surat" },
                { "data": "sms_pengirim" },
                { "data": "sms_confirm" }
              ],
		"columnDefs": [
				{ "searchable": false, "orderable":false, "visible":false, "targets": [7, 8] },
                                { "searchable": false, "orderable":false, "targets":[4, 12]},
				{ "searchable": false, "visible":false, "targets": [0]},
				{ "visible":false, "targets": [2, 5, 9, 10, 11]},
                                { "searchable":false, "targets": [1, 4]},
                                { "orderData":[9], "targets": [3]},
                                { "orderData":[10], "targets": [1]}
			],
		"order": [[ 0, "desc" ]],
		"drawCallback": function( settings ) {
			moveSearch_srtmsk1();
		},
		"createdRow": function ( row, data, index ) {
                    $(row).click(function(){window.location.href = '<?php echo site_url('SuratMasuk/detail_surat_masuk').'/'; ?>'+data.sms_id;})
                    $(row).css('cursor', 'pointer');
                    $(row).find('a').click(function(e){e.stopPropagation();});
                    var temp = data.no_tgl;
                    $('td', row).eq(0).html(temp.replace('Pebruari','Februari'));
                    temp = data.sms_tgl_srt_diterima_show;
                    $('td', row).eq(1).html(temp.replace('Pebruari','Februari'));
                    if ( data.sms_confirm_status == "1") {
                        $('td', row).eq(4).html('<a class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>');
                    }
                    $(row).find('a').click(function(e){e.stopPropagation();});
                },
                "initComplete": function(){
                    $("#collapseSurat1").removeClass("in");
                }
	} );
        // refresh event listener
	var refreshLink_srtmsk1 = document.querySelector('#refresh_srtmsk1');
	refreshLink_srtmsk1.addEventListener('click', function(event){
		table_srtmsk1.draw();
	});
        
        function moveSearch_srtmsk1(){
                var newParent = document.getElementById('tabel-suratmasuk1_filter');
                var oldParent = document.getElementById('date_search_srtmsk1');

                while (oldParent.childNodes.length > 0) {
                        newParent.appendChild(oldParent.childNodes[0]);
                }
        }
        
        var table_srtmsk2 = $('#tabel-suratmasuk2').DataTable( {
    	"paging": true, 
		"search":true,  
		"ordering": true, 
		"responsive": false,
		"scrollX":true,
		"processing":true, 
		"serverSide": true,
                "lengthChange": false,
		"ajax":{
			"url":"<?php echo site_url('Dashboard/ajaxSuratMasukDisposisi');?>",
			"type":"POST",
			"data":function ( d ) {
				d.min = $('#s_date_awal_srtmsk2').val();
				d.max = $('#s_date_akhir_srtmsk2').val();
			}
		},
		"columns": [
                { "data": "sms_id" },
                { "data": "no_tgl" },
                { "data": "sms_tgl_srt" },
                { "data": "sms_tgl_srt_diterima_show" },
                { "data": "pengirim_perihal" },
                { "data": "sms_perihal" },
                { "data": "usr_nama" },
                { "data": "sms_confirm" },
                { "data": "sms_aksi" },
                { "data": "sms_tgl_srt_diterima" },
                { "data": "sms_nomor_surat" },
                { "data": "sms_pengirim" },
                { "data": "proses" },
                { "data": "sms_proses_level" },
                { "data": "sms_view" }
              ],
		"columnDefs": [
				{ "searchable": false, "orderable":false, "visible":false, "targets": [7, 8] },
                                { "searchable": false, "orderable":false, "targets":[4, 14]},
				{ "searchable": false, "visible":false, "targets": [0]},
				{ "visible":false, "targets": [2, 5, 9, 10, 11, 13]},
                                { "searchable":false, "targets": [1, 4, 12]},
                                { "orderData":[9], "targets": [3]},
                                { "orderData":[10], "targets": [1]},
                                { "orderData":[13], "targets": [12]}
			],
		"order": [[ 0, "desc" ]],
		"drawCallback": function( settings ) {
			moveSearch_srtmsk2();
		},
		"createdRow": function ( row, data, index ) {
                    $(row).click(function(){window.location.href = '<?php echo site_url('SuratMasuk/detail_surat_masuk').'/'; ?>'+data.sms_id;})
                    $(row).css('cursor', 'pointer');
                    $(row).find('a').click(function(e){e.stopPropagation();});
                    var temp = data.no_tgl;
                    $('td', row).eq(0).html(temp.replace('Pebruari','Februari'));
                    temp = data.sms_tgl_srt_diterima_show;
                    $('td', row).eq(1).html(temp.replace('Pebruari','Februari'));
                    temp = data.proses;
                    $('td', row).eq(4).html(temp.replace('99','4'));
                },
                "initComplete": function(){
                    $("#collapseSurat2").removeClass("in");
                }
	} );
        // refresh event listener
	var refreshLink_srtmsk2 = document.querySelector('#refresh_srtmsk2');
	refreshLink_srtmsk2.addEventListener('click', function(event){
		table_srtmsk2.draw();
	});
        
        function moveSearch_srtmsk2(){
                var newParent = document.getElementById('tabel-suratmasuk2_filter');
                var oldParent = document.getElementById('date_search_srtmsk2');

                while (oldParent.childNodes.length > 0) {
                        newParent.appendChild(oldParent.childNodes[0]);
                }
        }
        
        var table_srtmsk3 = $('#tabel-suratmasuk3').DataTable( {
    	"paging": true, 
		"search":true,  
		"ordering": true, 
		"responsive": false,
		"scrollX":true,
		"processing":true, 
		"serverSide": true,
                "lengthChange": false,
                "ajax":{
			"url":"<?php echo site_url('Dashboard/ajaxSuratMasukSelesai');?>",
			"type":"POST",
			"data":function ( d ) {
				d.min = $('#s_date_awal_srtmsk3').val();
				d.max = $('#s_date_akhir_srtmsk3').val();
			}
		},
		"columns": [
                { "data": "sms_id" },
                { "data": "no_tgl" },
                { "data": "sms_tgl_srt" },
                { "data": "sms_tgl_srt_diterima_show" },
                { "data": "pengirim_perihal" },
                { "data": "sms_perihal" },
                { "data": "usr_nama" },
                { "data": "sms_confirm" },
                { "data": "sms_aksi" },
                { "data": "sms_tgl_srt_diterima" },
                { "data": "sms_nomor_surat" },
                { "data": "sms_pengirim" },
                { "data": "sms_view" }
              
              ],
		"columnDefs": [
				{ "searchable": false, "orderable":false, "visible":false, "targets": [7, 8] },
                                { "searchable": false, "orderable":false, "targets":[4, 12]},
				{ "searchable": false, "visible":false, "targets": [0]},
				{ "visible":false, "targets": [2, 5, 9, 10, 11]},
                                { "searchable":false, "targets": [1, 4]},
                                { "orderData":[9], "targets": [3]},
                                { "orderData":[10], "targets": [1]}
                                
			],
		"order": [[ 0, "desc" ]],
		"drawCallback": function( settings ) {
			moveSearch_srtmsk3();
		},
		"createdRow": function ( row, data, index ) {
                    $(row).click(function(){window.location.href = '<?php echo site_url('SuratMasuk/detail_surat_masuk').'/'; ?>'+data.sms_id;})
                    $(row).css('cursor', 'pointer');
                    $(row).find('a').click(function(e){e.stopPropagation();});
                    var temp = data.no_tgl;
                    $('td', row).eq(0).html(temp.replace('Pebruari','Februari'));
                    temp = data.sms_tgl_srt_diterima_show;
                    $('td', row).eq(1).html(temp.replace('Pebruari','Februari'));
                },
                "initComplete": function(){
                    $("#collapseSurat3").removeClass("in");
                }
	} );
        // refresh event listener
	var refreshLink_srtmsk3 = document.querySelector('#refresh_srtmsk3');
	refreshLink_srtmsk3.addEventListener('click', function(event){
		table_srtmsk3.draw();
	});
        
        function moveSearch_srtmsk3(){
                var newParent = document.getElementById('tabel-suratmasuk3_filter');
                var oldParent = document.getElementById('date_search_srtmsk3');

                while (oldParent.childNodes.length > 0) {
                        newParent.appendChild(oldParent.childNodes[0]);
                }
        }
        <?php foreach($statusDisposisi as $row){?>
        var table_disposisi<?php echo $row->sds_id;?> = $('#tabel-disposisi<?php echo $row->sds_id;?>').DataTable( {
    	"paging": true, 
		"ordering": true, 
		"scrollX":true,
		"search":true, 
		"processing":true, 
		"serverSide": true,
		"pageLength": 10,
                "lengthChange": false,
		"ajax":{
                        "url":"<?php echo site_url('Dashboard/ajaxProcessDisposisiPerUser').'/'.$row->sds_id; ?>",
			"type":"POST",
			"data":function ( d ) {
				d.min = $('#s_date_awal_disposisi<?php echo $row->sds_id;?>').val();
				d.max = $('#s_date_akhir_disposisi<?php echo $row->sds_id;?>').val();
			}
		},
		"columns": [
            
                { "data": "sms_nomor_surat" },
                { "data": "pengirim" },
                { "data": "penerima" },
                { "data": "fds_catatan" },
                { "data": "fds_tgl_disposisi_show" },
                { "data": "fds_aksi" },
		{ "data": "fds_id" },
                { "data": "fds_tgl_disposisi"},
                { "data": "usr_nama"}
              ],
		"columnDefs": [
				{ "searchable": false, "orderable":false, "visible":false, "targets": 5 },
				{ "visible":false, "targets": [6, 7, 8]},
                                { "searchable":[7], "targets": [1]},
                                { "orderData":[7], "targets": [4]}
			],
		"order": [[ 6, "desc" ]],
		"drawCallback": function( settings ) {
			moveSearch_disposisi<?php echo $row->sds_id;?>();
                        $('.btn-aksi').width(
                            Math.max.apply( 
                                Math, 
                                $('.btn-aksi').map(function(){
                                    return $(this).outerWidth();
                                }).get()
                            )
                        );
		},"createdRow": function ( row, data, index ) {
                    $(row).click(function(){window.location.href = '<?php echo site_url('Disposisi/detail_disposisi').'/'; ?>'+data.fds_id;})
                    $(row).css('cursor', 'pointer');
                    var temp = data.fds_tgl_disposisi_show;
                    $('td', row).eq(4).html(temp.replace('Pebruari','Februari'));
                    if ( data.sudah_lanjut != "0") { 
                        //$(row).addClass('newdisposisi');
                        $('td',row).eq(0).html(data.sms_nomor_surat +' '+'<br><a class="btn btn-success btn-sm" disabled="disabled" data-toggle="tooltip" data-placement="top"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Disposisi sudah dilanjutkan</a>');
                    }
                },
                "initComplete": function(){
                    $("#collapseDisposisi<?php echo $row->sds_id;?>").removeClass("in");
                }
	} );
        
        var refreshLink_disposisi<?php echo $row->sds_id;?> = document.querySelector('#refresh_disposisi<?php echo $row->sds_id;?>');
	refreshLink_disposisi<?php echo $row->sds_id;?>.addEventListener('click', function(event){
		table_disposisi<?php echo $row->sds_id;?>.draw();
	});
        
        function moveSearch_disposisi<?php echo $row->sds_id;?>(){
                var newParent = document.getElementById('tabel-disposisi<?php echo $row->sds_id;?>_filter');
                var oldParent = document.getElementById('date_search_disposisi<?php echo $row->sds_id;?>');

                while (oldParent.childNodes.length > 0) {
                        newParent.appendChild(oldParent.childNodes[0]);
                }
        }
        
        $('#collapseDisposisi<?php echo $row->sds_id;?>').on('shown.bs.modal', function (e) {
            table_disposisi<?php echo $row->sds_id;?>.columns.adjust().draw();
        });
        <?php }?>
        
        
        function fixedButton(){
            $('.panelNotif').height(
                Math.max.apply( 
                    Math, 
                    $('.panelNotif').map(function(){
                        return $(this).outerHeight();
                    }).get()
                )
            );
        }
        fixedButton();
        
        $('#collapseSurat1').on('shown.bs.modal', function (e) {
            table_srtmsk1.columns.adjust().draw();
            var TableTools1 = TableTools.fnGetInstance( 'tabel-suratmasuk1' );
            TableTools1.fnResizeButtons();
        });
        $('#collapseSurat2').on('shown.bs.modal', function (e) {
            table_srtmsk2.columns.adjust().draw();
        });
        $('#collapseSurat3').on('shown.bs.modal', function (e) {
            table_srtmsk3.columns.adjust().draw();
        });
        <?php if (false && ($role == 1 || $level <= 2)){?>
        $('.tab-group').hide();
        var elem = document.getElementById("tab-selector"),
        selectedNode = elem.options[elem.selectedIndex].value;
        $('#tab-group-item-'+selectedNode).show();
        $('#tab-selector').change(function () {
            var val = $(this).val();
            $('.tab-group').hide();
            $('#tab-group-item-'+val).show();
        });
        <?php } ?>
});     


</script>
