
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

  
  <!-- Google Font 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
</head>



<body class="hold-transition skin-blue sidebar-mini">
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
          <!-- Messages: style can be found in dropdown.less-->
         
          
         
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
                        echo $session_name." | ".$session_role; ?> 
                  <small><?php echo $session_dept; ?></small>
                </p>
              </li>
             
              
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                <a href="<?php echo base_url();?>Forum/Profile" class="btn btn-default btn-flat">Profile</a> </div>
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
        <li class="active treeview">
          <a href="/administration">
            <i class="fa fa-bars"></i> <span>Menu</span>
            
          </a>
         
        </li> 
     
         
        <li class="treeview">
          <a href="#">
          <i class="fa fa-comments-o"></i>
            <span><?php echo $Menu_item_00 ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>Administration/Chat_Forum"><i class="fa fa-envelope-o"></i><?php echo $Menu_item_00_01 ?></a></li><!--Email option-->
            <li ><a href="<?php echo base_url();?>Administration/News"><i class="fa fa-newspaper-o"></i><?php echo $Menu_item_00_02 ?></a></li><!--News option-->
            <li ><a href=""><i class="fa fa-bullhorn"></i><?php echo $Menu_item_00_03 ?></a></li>
          </ul>
          
        </li>
 <!---------->
        <?php  
        if($this->session->userdata('kms_access_role_status') == 1)
        {
            echo "<li class=\"treeview\">
            <a href=\"#\">
              <i class=\"fa fa-users\"></i>
              <span>".$Menu_item_01."</span>
              <span class=\"pull-right-container\">
                <i class=\"fa fa-angle-left pull-right\"></i>
              </span>
            </a>
            <ul class=\"treeview-menu\">
              
              <li ><a href=\"Employee\"><i class=\"fa fa-users\"></i>&nbsp;".$Menu_item_01_02."</a></li><!--News option-->
             
            </ul>
            
          </li>
  
   
          <li class=\"treeview\">
            <a href=\"#\">
            <i class=\"fa fa-graduation-cap\"></i>
              <span>".$Menu_item_02."</span>
              <span class=\"pull-right-container\">
                <i class=\"fa fa-angle-left pull-right\"></i>
              </span>
            </a>
            
          </li>";
        }
          
          ?>
        

      <!---------->
        
        <li class="treeview">
          <a href="#">
          <i class="fa fa-file-text-o"></i>
            <span><?php echo $Menu_item_04 ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>Administration/Admininstration_my_files"><i class="fa fa-file"></i><?php echo $Menu_item_04_01 ?></a></li><!--Email option-->
            <li ><a href="<?php echo base_url();?>Administration/File_Directory"><i class="fa fa-inbox"></i><?php echo $Menu_item_04_02 ?></a></li><!--News option-->
            <li ><a href="<?php echo base_url();?>Administration/File_Directory"><i class="fa fa-align-justify"></i><?php echo $Menu_item_04_03 ?></a></li><!--News option-->
          
          </ul>
        </li>
       
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br><br>
   
     <!-- Content Header (Page header) -->
     <section class="content-header">
      <h1>
        NHOP
        <small>Administration Department</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-bars"></i> Home</a></li>
      </ol>
    </section>



    <!-- Main content --><!---->
    <section class="content"> 
            

        <!--The model for saving the uploads Personal_file_share-->
        <div id="Upload_modal_form" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="box-header with-border">

                        <h3 class="box-title pull-right" style="">KMS | File Sharing</h3>
                        </div>
                            <div class="modal-body">
                                



                                  <form action="<?php echo base_url();?>Forum/Personal_file_share" class="form-horizontal" autocomplete="off" method="POST" enctype="multipart/form-data" name="kms_form_share_file" onsubmit="return validateform_file_share_form()" >
                                      <div class="box-body">
                                      <div class="form-group">
                                      <label for="kms_input_fchat_forum" class="col-sm-3 control-label">Share with:</label>

                                      <div class="col-sm-9">

                                      <select class="selectpicker" data-size="10"  id="kms_input_fileshare_forum" name="kms_input_fileshare_forum" multiple data-live-search="false">
                                      
                                     
                                    
                                      
                                      </select> 

                                      </div>
                                    </div>
                                        <div class="form-group">
                                          <label for="kms_input_fchat_topic" class="col-sm-3 control-label">CC Recipients:</label>

                                          <div class="col-sm-9">
                                         
                                          <select class="selectpicker_live_users" data-size="6" name="kms_input_file_recipient" id="kms_input_file_recipient" multiple data-live-search="true">
                                            <?php 
                                            
                                            ?>
                                          </select>


                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label for="kms_input_fchat_message" class="col-sm-3 control-label">Message:</label>
                                          <div class="col-sm-9">
                                            <textarea class="form-control" rows="3" placeholder="Enter sharing message..." id="kms_input_file_share_message" name="kms_input_file_share_message" placeholder="Enter your sharing message"></textarea>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <div class="abc col-sm-12">
                                          <button type="submit" class="btn btn-success pull-right">Send <i class="fa fa-share"></i></button>
                                          <input type="hidden" name="Kms_input_hidden_forum" id="Kms_input_hidden_forum">
                                          <input type="hidden" name="Kms_input_hidden_recip" id="Kms_input_hidden_recip">
                                          <input type="hidden" name="Kms_input_hidden_file_id" id="Kms_input_hidden_file_id">
                                          
                                          </div>
                                        </div>
                                    
                                      </div>
                                    
                                      <!-- /.box-footer -->
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                </div>


      


                    <!-- Modal for changing of passwords -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                        
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                             
                              <h4 class="modal-title pull-right" style="color:#2e3192;font-weight:bold;">KMS | SECURITY</h4>
                              <h5 class="padding">For the security purpose you'r advised to change your defualt password</h5>
                            </div>
                            <div class="modal-body">
                          
                            <form autocomplete="off" action="" method="POST" enctype="multipart/form-data"  name="change_user_key_form" onsubmit="return validateform_set_key()">
                            <div class="box-body">

                              <div class="form-group">
                              
                                  <div class="col-sm-6">
                                    <label for="Kms_input_new_key">New Password:</label>
                                    <input title="Enter new password"   type="password" class="form-control" name="Kms_input_new_key" id="Kms_input_new_key">
                                  </div>

                                  
                                  <div class="col-sm-6">
                                    <label for="Kms_input_new_key2">Confirm Password:</label>
                                    <input  title="Re enter new password" type="password" class="form-control" name="Kms_input_new_key2" id="Kms_input_new_key2" >
                                  </div>

                              </div>


                            </div>

          
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Remind me Later</button>
                            
                           
                            <button type="submit" class="btn btn-success pull-right" name="Btn_save_new_key">Change Now</button>
                            </form>
                            </div>
                          </div>
                          
                        </div>
                      </div>
  

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>ext/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>ext/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>ext/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url();?>ext/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>ext/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>ext/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>ext/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>ext/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>ext/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>ext/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>ext/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>ext/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>ext/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>ext/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>ext/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>ext/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>ext/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>ext/dist/js/demo.js"></script>
<script>
$(function () {
        $("a[class='Upload_save_modal']").click(function () {
          //In this we pass data to the modal from the <a> tag as data-id and set 
          var Upload_file_id = $(this).data('id');
          $(".modal-body #Kms_input_hidden_file_id").val(Upload_file_id);
          $("#Upload_modal_form").modal("show");

            return true;
        });
  
    });

   
</script>
<script>
 $key =<?php echo $this->session->userdata('kms_access_user_key_status');?>//kms_access_user_key_status
    if($key == 0)
       {
       // $("#myModal").modal();
       }
       else{ alert("yes");}
</script>


</body>