<?php
    $role = $this->session->userdata('id_role');
	if($mode == 'edit'){
	
		$usr_username = $userlist-> usr_username;
                $usr_pegawai = $userlist-> usr_pegawai;
                $usr_role = $userlist->usr_role;
                $usr_password = $userlist->usr_password;
                $konfirm = "";
                $usr_email = $userlist->usr_email;
                $pgw_nama=$userlist->pgw_nama;
                $pgw_nip=$userlist->pgw_nip;
                
                
			}
	else{
		$usr_username = "";
                $usr_role = "";
                $usr_password ="";
                $konfirm ="";
                $usr_email ="";
                $usr_pegawai = $pegawai->pgw_id;
                $pgw_nama=$pegawai->pgw_nama;
                $pgw_nip=$pegawai->pgw_nip;
			}
?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">
            <form method="post" action="<?php if($mode == 'edit'){echo base_url()."user/proses_editUser";}else{echo base_url()."user/proses_addUser";}?>" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">

                <?php if($mode == 'edit'){ ?>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="usr_role" value="<?php echo $userlist->usr_role; ?>">
                <?php } else if($mode == 'add') { ?>
                <input type="hidden" name="usr_pegawai" value="<?php echo $pegawai->pgw_id; ?>">
                <?php } ?>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="usr_nip" class="col-sm-2 control-label text-left">NIP</label>
                        <div class="col-sm-10">
                        	
	                        <input type="text" class="form-control" id="pgw_nip" name="pgw_nip" placeholder="Nomor Induk Pegawai" value="<?php echo $pgw_nip; ?>">
                            
                            <div class="help-block with-errors"></div>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="usr_nama" class="col-sm-2 control-label text-left">Nama</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="pgw_nama" name="pgw_nama" placeholder="Nama" value="<?php echo $pgw_nama; ?>" required data-minlength="3" pattern="^[a-zA-Z\s]*$">
                            <p class="help-block">Minimal 3 karakter, hanya huruf dan spasi</p>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="usr_username" class="col-sm-2 control-label text-left">Username</label>
                        <div class="col-sm-10">
                        	<?php if($mode == "add"){?>
	                        <input type="text" class="form-control" id="usr_username" name="usr_username" placeholder="Username" value="<?php echo $usr_username; ?>" required data-minlength="3" pattern="^[a-zA-Z0-9]*$" data-remote="<?php echo site_url('User/checkUserAjax'); ?>">
                            <p class="help-block">Minimal 3 karakter, hanya huruf dan angka</p>
                            <div class="help-block with-errors"></div>
                            <?php } else {?>
                            <input type="hidden" id="usr_username" name="usr_username" value="<?php echo $usr_username; ?>">
                            <p class="form-control-static"><?php echo $usr_username; ?></p>
                            <?php }?>
                        </div>
                    </div>
                      
                    <div class="form-group">
                        <label for="pgw_nip" class="col-sm-2 control-label text-left">Role</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="usr_role" name="usr_role" placeholder="Role" value="<?php echo $usr_role; ?>" >
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="usr_email" class="col-sm-2 control-label text-left">E-mail</label>
                        <div class="col-sm-10">
	                        <input type="text" class="form-control" id="usr_email" name="usr_email" placeholder="Alamat E-mail" value="<?php echo $usr_email; ?>" required pattern="^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$">
                            <p class="help-block">Alamat email harus valid</p>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>       
                    <?php if($mode == "add"){?>
                    <div class="form-group">
                        <label for="usr_password" class="col-sm-2 control-label text-left">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="usr_password" name="usr_password" placeholder="User Password" value="" required data-minlength="5">
                            <p class="help-block">Minimal 5 karakter</p>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="konfirm" class="col-sm-2 control-label text-left">Konfirmasi Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="konfirm" name="konfirm" placeholder="User Password" value="" required data-match="#usr_password">
                            <p class="help-block">Ketik ulang password</p>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <?php } elseif ($mode == "edit" && $role != 1) { ?>
                    <div class="form-group">
                        <label for="usr_password" class="col-sm-2 control-label text-left">Password Anda</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="usr_password_confirm" name="usr_password_confirm" placeholder="Password anda" value="" required data-minlength="5">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-md-12 text-center"><hr>
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="...">
                            <a class="btn btn-lg btn-danger" href="javascript:history.back()"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Kembali</a>
                            <button type="submit" class="btn btn-lg btn-success confirm" data-confirm ="halo "><span class="glyphicon glyphicon-floppy-disk"  aria-hidden="true"></span> Simpan</button>
                        </div>
                    </div>
                </div>
            </form>        
            </div>
        </div>
    </div>
</div>
