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





  
</head>



<body class="hold-transition skin-blue sidebar-mini" style="height:100%;">
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
            <li><a href="<?php echo base_url();?>Administration/Chat_Forum"><i class="fa fa-envelope-o"></i><?php echo $Menu_item_00_01 ?></a></li><!--Email option-->
            
          </ul>
          
        </li>

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
    
  <section class="content-header">
      <h1>
        NHOP 
        <small>Employees</small>
      </h1>
     
  
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-bars"></i> Home</a></li>
        <li><a href="#">Employee</a></li>
        <li class="active">List</li>
      </ol>
    </section>
     

    <!-- Main content -->
    <section class="content">
      <div class="row" >
        <div class="col-md-3" id="forum_div">
        <?php
              $this->session->set_userdata('side_menu_dept',"Administration");
              $this->load->view('side_menu');
        ?>
        </div>
        <!-- /.col -->
        <div class="col-md-9" >

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
    
           if(isset($Forum_name))
             {
              echo "<div class=\"box box-primary\" >
                      <div class=\"box-header with-border\" >
                      <h5 class=\"box-title\">". $Forum_name." </h5>
                      </div>
                    </div>";

              echo " <div class=\"col-md-12\">
              <!-- DIRECT CHAT PRIMARY -->
              <div class=\"box box-primary direct-chat direct-chat-primary\">
                
                <!-- /.box-header -->
                <div class=\"box-body\">
                      <!-- Conversations are loaded here -->
                      <div class=\"direct-chat-messages\">";


                    if(isset($Fetch_forum_chats_results))
                    {
                      //This returns the values fetched from the database as below 
                      foreach ($Fetch_forum_chats_results as $row)
                      {

                        $kms_fchat_id = $row['forum_chat_id'];
                        $kms_fchat_sender_id = $row['emp_data_id'];
                        $kms_fchat_forum_send_id = $row['forum_chat_sender_id'];
                        $kms_fchat_forum_receiver_id = $row['forum_chat_receiver_id'];
                        $kms_fchat_forum_message= $row['forum_chat_message'];
                        $kms_fchat_forum_message_send_date= $row['forum_chat_send_date'];
                        $kms_fchat_forum_message_send_time= $row['forum_chat_send_time'];
                        $kms_fchat_forum_message_status= $row['forum_chat_status'];
                        $kms_fchat_forum_sender_name = $row['emp_data_sname'];

                        //Then determine if it's a sender message or receiver message
                       
                            if($this->session->userdata('kms_emp_id') == $kms_fchat_forum_send_id)
                            {
                            
                              echo "<div class=\"direct-chat-msg right\" >

                              <div class=\"direct-chat-info clearfix\">
                                <span class=\"direct-chat-name pull-right\">You</span>
                                 <span class=\"direct-chat-timestamp pull-left\">".$kms_fchat_forum_message_send_date." | ".$kms_fchat_forum_message_send_time."</span>
                              </div>

                            <img class=\"direct-chat-img\" src=\"".base_url()."uploads/img/".$this->session->userdata('kms_emp_id').".png\" alt=\"mes\">
                              <div class=\"direct-chat-text\" >
                                  ".$kms_fchat_forum_message."
                              </div>

                            </div>";


                            

                            }else 
                            {
                              echo "<!-- Message. Default to the left -->
                              <div class=\"direct-chat-msg\"> 
                             
               
                                            <div class=\"direct-chat-info clearfix\">
                                              <span class=\"direct-chat-name pull-left\">".$kms_fchat_forum_sender_name."</span>
                                              <span class=\"direct-chat-timestamp pull-right\">".$kms_fchat_forum_message_send_date." | ".$kms_fchat_forum_message_send_time."</span>
                                            </div>
               
                                                <!-- /.direct-chat-info -->
                                                <img class=\"direct-chat-img\" src=\"".base_url()."uploads/img/".$kms_fchat_forum_send_id.".png\" alt=\"me\">
                                                <!-- /.direct-chat-img -->
               
                                              <div class=\"direct-chat-text\">
                                              ".$kms_fchat_forum_message."
                                              </div>
               
                                <!-- /.direct-chat-text -->
                              </div>  
                              ";


                             
                            }  

                           
                      }
                   
                      echo "</div>
                      <div class=\"box-footer\">
                           <form action=\"AddForumChat\" class=\"form-horizontal\" autocomplete=\"off\" method=\"POST\" enctype=\"multipart/form-data\">
                                <div class=\"input-group\">
                                               <input required type=\"text\" name=\"kms_forum_single_chat_message\" id=\"kms_forum_single_chat_message\" placeholder=\"Type Message ...\" class=\"form-control\">
                                              
                                               <input type=\"hidden\" name=\"kms_forum_single_chat_rec_forum\" value=".$Forum_id." />

                                               <span class=\"input-group-btn\">
                                                   <button type=\"submit\" class=\"btn btn-primary btn-flat\">Send</button>
                                                   </span>
                                 </div>
                           </form>
                      </div>";
                     

                    }else{}


                echo "  </div></div></div>";
             }else{}
                
                ?>
           
           
     
    </section>
    <!-- /.content -->
    <!---the model for add new forum chat message ---->
        <!---the model for add new forum chat message ---->
        <div class="modal modal-default fade" id="modal-add-chat-forum" tabindex="-1" role="dialog" aria-labelledby="KMS - Chat Forum" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                
                <div class="modal-body" >
                   
                   <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">

              <h3 class="box-title pull-right" style="">KMS | Chat Fourm</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="AddForumChat" class="form-horizontal" autocomplete="off" method="POST" enctype="multipart/form-data" name="kms_form_cforum_add" onsubmit="return validateform_add_chat_forum()" >
              <div class="box-body">
                <div class="form-group">
                  <label for="kms_input_fchat_forum" class="col-sm-2 control-label">Forum:</label>

                  <div class="col-sm-10">

                  <select class="selectpicker" id="kms_input_fchat_forum" name="kms_input_fchat_forum" multiple data-live-search="false">
                  
                  <option value="9"><?php echo $Menu_item_00_01_09; ?></option>
                  <option value="1"><?php echo $Menu_item_00_01_01; ?></option>
                  <option value="2"><?php echo $Menu_item_00_01_02; ?></option>
                  <option value="3"><?php echo $Menu_item_00_01_03; ?></option>
                  <option value="4"><?php echo $Menu_item_00_01_04; ?></option>
                  <option value="5"><?php echo $Menu_item_00_01_05; ?></option>
                  <option value="6"><?php echo $Menu_item_00_01_06; ?></option>
                  <option value="7"><?php echo $Menu_item_00_01_07; ?></option>
                  <option value="8"><?php echo $Menu_item_00_01_08; ?></option>
                  
                  
                  </select> 

                  </div>
                </div>
                <div class="form-group">
                  <label for="kms_input_fchat_topic" class="col-sm-2 control-label">Topic:</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="kms_input_fchat_topic" name="kms_input_fchat_topic" placeholder="Chat topic...">
                  </div>
                </div>

                <div class="form-group">
                  <label for="kms_input_fchat_message" class="col-sm-2 control-label">Message:</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="5" placeholder="Enter ..." id="kms_input_fchat_message" name="kms_input_fchat_message" placeholder="Message...."></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12">
                  <button type="submit" class="btn btn-success pull-right">Send <i class="fa fa-share"></i></button>
                  <input type="hidden" name="Kms_input_hidden_forum" id="Kms_input_hidden_forum">
                  </div>
                </div>
             
              </div>
             
              <!-- /.box-footer -->
            </form>
          </div>

                </div>
               
                </div>
            </div>
        </div>
    <!----->
  
 

  


<!-- ./wrapper -->
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
setInterval(function(){

$("#forum_div").load(<?php base_url()."application/views/side_menu.phpf";?>)
}, 2000);
});
</script>
</body>
</html>
