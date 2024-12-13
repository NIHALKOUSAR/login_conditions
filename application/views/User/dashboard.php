Welcome to Dashboard <br>

<?php 
if($this->session->userdata('UserLoginSession'))
{
    $udata = $this->session->userdata('UserLoginSession');
    echo 'Welcome'.' '.$udata['username'];
}
else
{
    redirect(base_url('user/login'));
}



 ?>
 <a href="<?=base_url('user/logout')?>">Logout</a>              