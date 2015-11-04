<?php
		$usr_id = $dataUser->usr_id;
		$usr_username = $dataUser-> usr_username;
		$usr_nama = $dataUser-> usr_nama;
		$usr_nip = $dataUser-> usr_nip;
                $usr_no_telp = $dataUser->usr_no_telp;
                $usr_email = $dataUser->usr_email;
                $jbt_nama = $dataUser->jbt_nama;
                $rle_role_name = $dataUser->rle_role_name;
                $usr_deleted = $dataUser->usr_deleted;
                
?>
<div class="container-fluid">
    <div class="row-fluid">
    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3>Detail Info User</h3>
            </div>
            <div class="panel-body">
            	<table class="table table-striped table-bordered table-hover" width="50%">
                    <tbody>
                    	<tr>
                        	<th>Nama</th>
                        	<td><?php echo $usr_nama; ?></td>
                        </tr>
                    	<tr>
                        	<th>Username</th>
                        	<td><?php echo $usr_username; ?></td>
                        </tr>
                    	<tr>
                        	<th>NIP</th>
                        	<td><?php echo $usr_nip; ?></td>
                        </tr>
                    	<tr>
                        	<th>Jabatan</th>
                        	<td><?php echo $jbt_nama; ?></td>
                        </tr>
                        <tr>
                        	<th>Level</th>
                        	<td><?php echo $rle_role_name; ?></td>
                        </tr>
                       
                        <tr>
                        	<th>No. HP</th>
                        	<td><?php echo $usr_no_telp; ?></td>
                        </tr>
                        <tr>
                        	<th>E-mail</th>
                        	<td><?php echo $usr_email; ?></td>
                        </tr>
                        <tr>
                        	<th>Status</th>
                                <td><?php if($usr_deleted == '1'){echo 'Tidak Aktif';}else{echo 'Aktif';} ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="col-md-12 text-center"><hr>
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="...">
                        	<a class="btn btn-lg btn-danger" href="javascript:history.back()"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Kembali</a>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	
	$('[data-toggle="tooltip"]').tooltip({});
	
	var deleteLinks = document.querySelectorAll('#set_status');
	for (var i = 0, length = deleteLinks.length; i < length; i++) {
		deleteLinks[i].addEventListener('click', function(event) {
			event.preventDefault();
		
			var choice = confirm(this.getAttribute('data-confirm'));
		
			if (choice) {
				window.location.href = this.getAttribute('href');
			}
		});
	}
});
</script>