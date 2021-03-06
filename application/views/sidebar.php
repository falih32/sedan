<?php 
    $role = $this->session->userdata('id_role');
    $onpage= strtolower($this->uri->segment(1));
?>

<div class="navbar-default sidebar" role="navigation">
    <?php if($this->session->userdata('id_user') != '') {?>
                <div class="sidebar-nav navbar-collapse row-fluid">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo site_url("dashboard"); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-cubes fa-fw"></i> Pengadaan Barang<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo site_url("Pengadaan/PengadaanBarangHPS"); ?>">Setelah HPS</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("Pengadaan/PengadaanBarangPenawaran"); ?>">Setelah Penawaran</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("Pengadaan/PengadaanBarangFix"); ?>">Setelah Negoisasi</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("Pengadaan/PengadaanBarangPng"); ?>">Setelah Pengumuman</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("Pengadaan/PengadaanBarangSpk"); ?>">Setelah SPK</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("Pengadaan/PengadaanBarangFns"); ?>">Pengadaan yang Telah Selesai</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="<?php echo site_url("Pengadaan/PengadaanBarang"); ?>">Semua Pengadaan Barang</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>                
                        <li>
                            <a href="#"><i class="fa fa-truck fa-fw"></i> Pengadaan Jasa<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo site_url("Pengadaan/PengadaanJasaHPS"); ?>">Setelah HPS</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("Pengadaan/PengadaanJasaPenawaran"); ?>">Setelah Penawaran</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("Pengadaan/PengadaanJasaFix"); ?>">Setelah Negosiasi</a>
                                </li>
                                 <li>
                                    <a href="<?php echo site_url("Pengadaan/PengadaanJasaPng"); ?>">Setelah Pengumuman</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("Pengadaan/PengadaanJasaSpk"); ?>">Setelah SPK</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("Pengadaan/PengadaanJasaFns"); ?>">Pengadaan yang Telah Selesai</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="<?php echo site_url("Pengadaan/PengadaanJasa"); ?>">Semua Pengadaan Jasa</a>
                                </li>      
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-male fa-fw"></i> Pengadaan Konsultan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo site_url("Pengadaan/PengadaanKonsultanHPS"); ?>">Setelah HPS</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("Pengadaan/PengadaanKonsultanPenawaran"); ?>">Setelah Penawaran</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("Pengadaan/PengadaanKonsultanFix"); ?>">Setelah Negoisasi</a>
                              
                                </li>
                                <li>
                                    <a href="<?php echo site_url("Pengadaan/PengadaanKonsultanPng"); ?>">Setelah Pengumuman</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("Pengadaan/PengadaanKonsultanSpk"); ?>">Setelah SPK</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("Pengadaan/PengadaanKonsultanFns"); ?>">Pengadaan yang Telah Selesai</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="<?php echo site_url("Pengadaan/PengadaanKonsultan"); ?>">Semua Pengadaan Jasa</a>
                                </li> 
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
<!--                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Upload Laporan</a>
                 
                        </li>-->
                        <?php if($role == "1"){ ?>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Referensi<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo site_url("User"); ?>">User</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("Pegawai"); ?>">Pegawai</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("Jabatan"); ?>">Jabatan</a>
                                </li>
                                
                                <li>
                                    <a href="<?php echo site_url("SuratIzin"); ?>">Syarat Penyedia</a>
                                </li>      
                                 <li>
                                    <a href="<?php echo site_url("Supplier"); ?>">Supplier</a>
                                </li> 
                                <li>
                                    <a href="<?php echo site_url("Penyusun"); ?>">Penyusun</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url("Dipa"); ?>">DIPA</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php }?>
                        <li>
                            <a href="<?php echo site_url("uploads/user-manual.pdf"); ?>"><i class="fa fa-files-o fa-fw"></i> User Manual</a>
                 
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
                <?php }?>
                
            </div>
