<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
//$this->session->unset_userdata('sessiondata');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $login_tab_title ?></title>
 <!-- Tell the browser to be responsive to screen width -->
 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>ext/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>ext/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>ext/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>ext/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>ext/plugins/iCheck/square/blue.css">
  
 <!-- Google Font
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }


	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>



	
<body class="hold-transition login-page" style="overflow:hidden;" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">

    <div class="login-box">
        <div class="login-logo">
          <div ><img src="<?php echo base_url();?>ext/dist/img/nicelogo.png"></div>
          <!--<a ><b>NICE </b>KMS</a>-->
        </div>

  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><?php echo $login_form_title ?></p>

    <form action="Login/login_funcn" id="Kms_form_login" name="Kms_form_login" method="POST" enctype="multipart/form-data" onsubmit="return validateform_UserLogin_forum()">
 
     
     
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="login_form_email" id="login_form_email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="login_form_key" id="login_form_key" 
        <?php $Input_style =  $this->session->flashdata('Input_style'); if(isset($Input_style)){ echo $Input_style;} ?>>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">
        <div class="col-xs-8">
        <a href="#" data-toggle="modal" class="Modal_pass_reset">I forgot my password</a><br>      
        </div>
        
        <!-- /.col -->
        <div class="col-xs-4">
            <button type="submit" name="kms_btn_login" class="btn btn-primary btn-block btn-flat" style="background-color:#2e3192;">Sign In</button>
        </div>
        <!-- /.col -->
    
      <div class="col-xs-12">
      <span class="pull-right" style="color:red;"><?php 
      $message =  $this->session->flashdata('Message_login');
      if(isset($message)){echo $message;}else{}?></span>
      <div class="pull-left" id="key_reset_error"></div>
      </div>
      </div>
    </form>
        
    
    </div></div>
  <!-- /.login-box-body -->
    
 



 <!-- Modal for add a new content on the training as selected-->     
 <div id="Modal_pass_rest"  class="modal fade" role="dialog"  tabindex="-1" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="box-header with-border">
                   <h3 class="box-title pull-right">KMS | Password Reset</h3>
                </div>
            
                <div class="modal-body">
                
                <form action="<?php echo base_url();?>Login/Reset" class="form-horizontal" autocomplete="off" method="POST" enctype="multipart/form-data" name="kms_form_pass_reset" id="kms_form_pass_reset" onsubmit="return validateform_etraining_videoReg()"  >
               
                    <div class="form-group">
                      <label for="kms_login_password_reset" class="col-sm-4 control-label">Phone Number:</label>
                          <div class="col-sm-8">
                            <div class="input-group">
                               <input  id="kms_login_password_reset" name="kms_login_password_reset" type="number" max="999999999" class="form-control" placeholder="Enter your registered Phone No: 07xx xxx xxx" onkeypress="validate_phone(event)" onkeyup="validate_count(value)">
                               <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            </div>
                          </div>
                    </div>
                    
                   <div class="form-group">
                      <div class="abc col-sm-12">
                        <div class="pull-left" id="phone_validate_error"></div>
                        <input type="hidden" name="Kms_input_hidden_username" id="Kms_input_hidden_username">
                        <button type="submit" id="btn_video_reg" class="btn btn-success pull-right">Confirm &nbsp;&nbsp;<i class="fa fa-thumbs-up"></i></button>
                      </div>    
                   </div>
                            
                </form>
                </div>
     
            </div>
        </div>
      </div>


        
<script>

</script>
<script src="<?php echo base_url();?>ext/dist/js/js_all.js"></script>
<script src="<?php echo base_url();?>ext/dist/js/form_validate.js"></script>
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>ext/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>ext/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>ext/plugins/iCheck/icheck.min.js"></script>
<!-- form validate javascript kms customized versin -->

<script>
 
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });

$("a[class='Modal_pass_reset']").click(function () {
         var input_user_email = document.Kms_form_login.login_form_email.value;
         
         if(input_user_email == "" || input_user_email == null)
           {
              key_reset_error.innerHTML = "<font color=red>Provide your username and try again</font>";
              document.getElementById('login_form_email').style.borderColor="red"; 
              document.getElementById('login_form_email').focus();
            return false;
           }
           else
           {
            $(".modal-body #Kms_input_hidden_username").val(input_user_email);
            $("#Modal_pass_rest").modal("show");
            return true;
           }
           
       
        });

    $('#Modal_pass_rest').on('hidden.bs.modal', function () {
    $(".modal-body #kms_login_password_reset").val(null);
    document.getElementById('kms_login_password_reset').style.borderColor=""; 
        });

  
</script>


</body>
</html>