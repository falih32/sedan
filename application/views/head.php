<?php 
    $role = $this->session->userdata('id_role');
    $level = $this->session->userdata('id_level');
    $onpage= strtolower($this->uri->segment(1));
?>
<nav class="navbar navbar-default navbar-static-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>"><div style="display:inline-block"><img src="<?php echo base_url();?>assets/css/images/icon.png" style="height:25px; margin-top:0px;"> SIDOEL</div></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <?php if($this->session->userdata('id_user') != '') {?>
            <li <?php if($onpage == "" || $onpage == "dashboard")echo "class='active'"; ?>><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
            <?php if(($role == 1) || ($role == 2) || ($role == 3) || $level == 1){ ?>
            <li <?php if($onpage == "suratmasuk")echo "class='active'"; ?>><a href="<?php echo site_url("SuratMasuk"); ?>"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Surat Masuk</a></li>
            <?php } ?>
            <?php if(($role == 1 || $level == 1)){ ?>
            <li <?php if($onpage == "disposisi" && ($mode=="normal" || $mode=="edit" || $mode=="add"))echo "class='active'"; ?>><a id = "dis-notif" href="<?php echo site_url("Disposisi"); ?>"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Disposisi</a></li>
            <?php } ?>
            <li <?php if($onpage == "disposisi" && $mode=="byUserMasuk")echo "class='active'"; ?>><a id = "dis-notif" href="<?php echo site_url("Disposisi/disposisi_masuk"); ?>"><span class="glyphicon glyphicon-import" aria-hidden="true"></span> Disposisi Masuk</a></li>
            <li <?php if($onpage == "disposisi" && $mode=="byUserKeluar")echo "class='active'"; ?>><a href="<?php echo site_url("Disposisi/disposisi_keluar"); ?>"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Disposisi Keluar</a></li>
            <?php if($role == 1 ){ ?>
            <li class="dropdown <?php if($onpage == "user" || $onpage == "unit" || $onpage == "unitterusan" || $onpage == "log" || $onpage == "jabatan" || $onpage == "jenissmasuk" || $onpage == "statusdisposisi")echo "active"; ?>">
              <a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#" aria-expanded="false"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Referensi <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo site_url("User"); ?>"><i class="fa fa-user"></i> User</a></li>
                    <li><a href="<?php echo site_url("Unit"); ?>"><i class="fa fa-building"></i> Unit Kerja</a></li>
                    <li><a href="<?php echo site_url("UnitTerusan"); ?>"><i class="fa fa-building-o"></i> Bagian</a></li>
                    <li><a href="<?php echo site_url("Jabatan"); ?>"><i class="fa fa-users"></i> Jabatan</a></li>
                    <li><a href="<?php echo site_url("JenisSMasuk"); ?>"><i class="fa fa-envelope"></i> Jenis Surat Masuk</a></li>
                    <li><a href="<?php echo site_url("StatusDisposisi"); ?>"><i class="fa fa-book"></i> Status Disposisi</a></li>
                    <?php if(($role == 1)){ ?>  
                    <li><a href="<?php echo site_url("AlihPekerjaan"); ?>"><i class="fa fa-exchange"></i> Alih Pekerjaan</a></li>
                    <?php } ?>
                    <?php if(($role == 1)){ ?>  
                    <li><a href="<?php echo site_url("CekKredit"); ?>"><i class="fa fa-credit-card"></i> Cek Kredit SMS</a></li>
                    <?php } ?>
                    <li><a href="<?php echo site_url("Log"); ?>"><i class="fa fa-history"></i> Log</a></li>
                </ul>
            </li>
            <?php } ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" id="updateCount" data-toggle="dropdown" role="button" href="#" aria-expanded="false"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span> <span id="notif" class="label label-danger blink"></span> <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <div id="notif-wrapper">
                            <div class="list-group" id="notif-list">
                            </div>
                            <div id="notif-loading" class="text-center"><img src="<?php echo base_url();?>/assets/css/images/ajax-loader.gif"></div>
                        </div>
                    </li>
                    <li>
                    <div class="row text-center">
                        <a href="<?php echo site_url('Notifikasi'); ?>" style="margin:5px; width: 80%;" class="text-center btn btn-success">Lihat Semua Notifikasi <i class="fa fa-angle-right"></i></a>
                        <a href="#" class="text-center btn btn-danger" style="margin:5px; width: 80%" id="clearNotif">Hapus Semua Notifikasi <i class="fa fa-angle-right"></i></a>
                        </div>
                  </li>
                </ul>
            </li>
            <li class="dropdown">
        	<a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $this->session->userdata('nama'); ?> <span class="caret"></span></a>
       		<ul class="dropdown-menu" role="menu">
                    <li class="text-center"><strong><?php echo $this->session->userdata('nama')."<br>".$this->session->userdata('username'); ?></strong></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo site_url('User/editUser')."/".$this->session->userdata("id_user"); ?>"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Pengaturan akun</a></li>
                    <li><a href="<?php echo site_url('User/changePassword')."/".$this->session->userdata("id_user"); ?>"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Ubah Password</a></li>
                    <li><a onclick="destroySession();" href="<?php echo site_url('login/logout'); ?>"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
                </ul>
            </li>
        <?php }?>
        </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>               
<?php if($this->session->flashdata('message') != ""){ $msg=$this->session->flashdata('message');?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="alert alert-<?php echo $msg['class']?> alert-dismissible" role="alert">
        <?php echo $msg['msg']; ?>
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        </div>
    </div>
</div>
<?php } ?>