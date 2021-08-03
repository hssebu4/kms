<?php 
//$this->load->view('session_manager');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"> 
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $Home_tab_title ?></title>
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
    <!-- kms style -->
    <link rel="stylesheet" href="<?php echo base_url();?>ext/dist/css/kms.css">
   <!-- iCheck -->
   <link rel="stylesheet" href="<?php echo base_url();?>ext/plugins/iCheck/flat/blue.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>ext/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url();?>ext/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url();?>ext/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>ext/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>ext/bower_components/bootstrap-daterangepicker/daterangepicker.css">
   <!-- bootstrap wysihtml5 - text editor -->
   <link rel="stylesheet" href="<?php echo base_url();?>ext/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


<link rel="stylesheet" href="<?php echo base_url();?>ext/bower_components/bootstrap/dist/css/bootstrap-select.css" />



<style>

#wrapper
{
 text-align:center;
 margin:0 auto;
 padding:0px;
 width:995px;
}
#output_image
{
 max-width:300px;
}
</style>

  
</head>



<body class="hold-transition skin-blue sidebar-mini" style="height:100%;" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
<div class="wrapper">
   <div >
     <header style="position: fixed; width: 100%;"  class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>KMS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><?php echo $Side_menu_title ?></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
        
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url();?>uploads/img/<?php $session_emp_id = $this->session->userdata('kms_emp_id'); echo $session_emp_id.".png"; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php $session_name = $this->session->userdata('kms_emp_data_secondname'); echo $session_name;  ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url();?>uploads/img/<?php $session_emp_id = $this->session->userdata('kms_emp_id'); echo $session_emp_id.".png"; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php $session_name = $this->session->userdata('kms_emp_data_secondname');
                        $session_role = $this->session->userdata('kms_emp_role');
                        $session_dept = $this->session->userdata('kms_emp_department');
                        echo $session_name; ?> 
                  <small ><?php echo '[ '.$session_role.' ]'; ?></small>
                </p>
              </li>
             
              
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url();?>Forum/Profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url();?>Login/logOut" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        
          
        </ul>
      </div>
    </nav>
  </header>
  </div>


  <!-- Left side column. contains the logo and sidebar -->
  <aside style=" position: fixed;"  class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>uploads/img/<?php $session_emp_id = $this->session->userdata('kms_emp_id'); echo $session_emp_id.".png"; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php $session_name = $this->session->userdata('kms_emp_data_secondname'); echo $session_name;  ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="/administration">
            <i class="fa fa-bars"></i> <span>Menu</span>
          </a>
         
        </li> 
     
         
        <li class="active treeview">
          <a href="#">
          <i class="fa fa-comments-o"></i>
            <span><?php echo $Menu_item_00 ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>Forum/"><i class="fa fa-envelope-o"></i><?php echo $Menu_item_00_01 ?></a></li><!--Email option-->
            
          </ul>
          
        </li>

      



       
        
        <li class="treeview">
          <a href="#">
          <i class="fa fa-file-text-o"></i>
            <span><?php echo $Menu_item_04 ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>Forum/File_Directory"><i class="fa fa-file"></i><?php echo $Menu_item_04_01 ?></a></li><!--Email option-->
            <li ><a href="<?php echo base_url();?>Forum/File_Inbox"><i class="fa fa-inbox"></i><?php echo $Menu_item_04_02 ?></a></li><!--News option-->
            <li ><a href="<?php echo base_url();?>Forum/File_Hub"><i class="fa fa-align-justify"></i><?php echo $Menu_item_04_03 ?></a></li><!--News option-->
         
          </ul>
          
        </li>
       
        <?php 
            $this->load->view('side_module');
        ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
  <section class="content-header">
      <!--
      <ol class="breadcrumb" style="padding-top:4%;">
        <li><a href="<?php echo base_url();?>Forum/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
-->
  </section>
     

    <!-- Main content -->
    <section class="content">
    
      <div class="row" >
      <div class="col-md-3" style="padding:4%;">
         <!-- <a href="<?php echo base_url();?>Administration/Compose_Post" class="btn btn-block" style="background-color:#2e3192;color:white;">Compose</a>
          <br >-->
          
          <?php
              $Menu_type = 1;
              
              $this->load->view('profile_menu');
          ?>
          <!-- /.box -->
        </div>

        <!-- /.col -->
        <div class="col-md-9" style="padding:4%;">

        <!-- section for the notices upon the data model funcionality -->
    <?php 
          $Notice_data = $this->session->flashdata('notice'); 

           if($Notice_data['Emp_save_success'] == 1)
           {
            echo "<div id=\"Notice_success\" name=\"Notice_success\" class=\"notice_success\">
                  <p><strong>Success!</strong> ".$Notice_data['Emp_save_message']."</p>
                  </div>";
           }
           else if($Notice_data['Emp_save_success']  == 0)
           {
            echo $Notice_data['Emp_save_message'];
           }
           else{}
   
            if(isset($Fetch_employee_date)){ 
              foreach ($Fetch_employee_date as $kms_userdetails) {
                      $Kms_user_fname = $kms_userdetails['emp_data_sname'];
                      $Kms_user_sname = $kms_userdetails['emp_data_fname'];
                      $Kms_user_phone = $kms_userdetails['kms_emp_phone_number'];
                      $kms_user_dept  = $kms_userdetails['kms_department_description'];
                      $Kms_user_email = $this->session->userdata('kms_emp_email_name');
              }
            }else{}
                
                ?>
           
        
           <!-- Form Element sizes -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">User Profile</h3>
            </div>
            <div class="box-body">
            
            <div class="col-sm-9" >
            <form class="form" action="##" method="post" id="registrationForm">
                                            <div class="form-group">
                                                
                                                <div class="col-xs-6">
                                                    <label for="first_name"><h5>First name:</h5></label>
                                                    <input value="<?php echo $Kms_user_fname;?>" <?php   if($Kms_user_fname != ""){ echo "disabled";}?> type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter employee's first name if any.">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                
                                                <div class="col-xs-6">
                                                  <label for="sur_name"><h5>Surname:</h5></label>
                                                    <input value="<?php echo $Kms_user_sname; ?>" <?php   if($Kms_user_sname != ""){ echo "disabled";}?> type="text" class="form-control" name="sur_name" id="sur_name" placeholder=" surname" title="enter employee's surname if any.">
                                                </div>
                                            </div>
                                
                                            <div class="form-group">
                                                
                                                <div class="col-xs-6">
                                                    <label for="dept"><h5>Department:</h5></label>
                                                    <input value="<?php echo $kms_user_dept; ?>" <?php   if($kms_user_dept != ""){ echo "disabled";}?>  type="text" class="form-control" name="dept" id="dept" placeholder="enter department" title="enter your department.">
                                                </div>
                                            </div>
                                
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                  <label for="mobile"><h5>Mobile:</h5></label>
                                                    <input value="<?php echo $Kms_user_phone; ?>" <?php   if($Kms_user_phone != ""){ echo "disabled";}?>  type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                
                                                <div class="col-xs-6">
                                                    <label for="email"><h5>Email:</h5></label>
                                                    <input value="<?php echo $Kms_user_email; ?>" <?php   if($Kms_user_email != ""){ echo "disabled";}?> type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                
                                                <div class="col-xs-6">
                                                    <label for="email"><h5>Location:</h5></label>
                                                    <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                
                                            <div class="col-xs-6">
                                                    <label for="emp_reg_date"><h5>Registered:</h5></label>
                                                      <div class="input-group date">
                                                        <div class="input-group-addon">
                                                          <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="date" class="form-control pull-right" id="emp_reg_date" name="emp_reg_date">
                                                      </div>

                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label for="emp_joined_date"><h5>Joined:</h5></label>
                                                      <div class="input-group date">
                                                        <div class="input-group-addon">
                                                          <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="date" class="form-control pull-right" id="emp_joined_date" name="emp_joined_date">
                                                      </div>

                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                      <br>
                                                      <button class="btn btn-sm btn-primary kms-button" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                                      <button class="btn btn-sm" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>&nbsp;
                                                  </div>
                                            </div>
                                          <div class="form-group">
                                                <div class="col-xs-12">
                                                      <br>
                                                  </div>
                                            </div>
                                            
                                          
                                      </form>
                                  </div>
                                  <div class="col-sm-2">
              
                                     <div class="text-center">
                                      <img id="output_image" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-rounded img-thumbnail" style="width:80%;height:80%;">
                                      <input type="file" accept="image/*" onchange="preview_image(event)">

                                    </div>              
              
                                   </div>





            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
                                    
              
     
    </section>
  
 

  


<!-- ./wrapper -->
<script src="<?php echo base_url();?>ext/dist/js/js_all.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>ext/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>ext/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>ext/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>ext/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>ext/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>ext/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>ext/dist/js/demo.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>ext/plugins/iCheck/icheck.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>ext/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>ext/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!--Bootstrap for multiple select -->
<script src="<?php echo base_url();?>bootstrap/js/dist/bootstrap-select.min.js"></script>
<script src="<?php echo base_url();?>bootstrap/js/dist/semantic.min.js"></script>
<!-- form validate javascript kms customized versin -->
<script src="<?php echo base_url();?>ext/dist/js/form_validate.js"></script>

<!-- Page Script -->
<script>
  document.addEventListener('contextmenu', event => event.preventDefault());
    $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()

  })

</script>
<script>
$(document).ready(function(){
  $('.selectpicker_live_users').selectpicker();
setInterval(function(){

$("#forum_div").load(<?php base_url()."application/views/side_menu.phpf";?>)
}, 2000);
});


function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
//$('.myModal2').removeClass("modal-backdrop");  
</script>
</body>
</html>
