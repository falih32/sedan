<div class="login-panel panel panel-primary transparent-bg2">
    
                <div class="panel-heading">
                    <h3 class="panel-title">Lupa Password</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="<?=base_URL()?>ResetUser/send_sms_forgot" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" id="username" placeholder="username" name="username" value="<?php echo set_value('username')?>"  type="text" autofocus="">
                            </div>
                            <input type="submit" class="btn btn-sm btn-success" value="Reset Password">
                        </fieldset>
                    </form>
                </div>
            </div>