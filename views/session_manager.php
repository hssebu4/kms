<?php 

//$this->load->library('session');
        
$session_username = $this->session->userdata('kms_access_username');
$session_user_dept_id =  $this->session->userdata('kms_access_user_dept_id');

if($session_username == "" || $session_username == null || $session_user_dept_id == "" || $session_user_dept_id == null)
{
    redirect('/');
    $this->session->sess_destroy()
}else{}

?>