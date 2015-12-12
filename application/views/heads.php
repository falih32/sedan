<?php 
    $role = $this->session->userdata('id_role');
    $onpage= strtolower($this->uri->segment(1));
?>
<header class="header-user-dropdown">

	<div class="header-limiter">
		<h1><a class="navbar-brand" href="<?php echo base_url(); ?>"><div style="display:inline-block"><img src="<?php echo base_url();?>assets/css/images/icon.png" style="height:25px; margin-top:0px;"> SEDAN</div></a></h1>

		<ul class="nav navbar-nav navbar-right">
        
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
        
        </ul>
		
	</div>

</header>
             
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