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
    <!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url();?>ext/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

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
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url();?>ext/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>ext/bower_components/bootstrap/dist/css/bootstrap-select.css" />





  
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
     
         
        <li class="treeview">
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
            <li ><a href="<?php echo base_url();?>Forum/pdp"><i class="fa fa-id-card" aria-hidden="true"></i><?php echo $Menu_item_04_04 ?></a></li><!--DPD Option-->
            <li><a href="<?php echo base_url();?>Forum/Planning"><i class="fa fa-line-chart" aria-hidden="true"></i><?php echo $Menu_item_04_05 ?></a></li><!--DPD Option-->
          
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
    
  <section class="content-header" style="padding-top:5%;">
  <ol class="breadcrumb"></ol>
  </section>
     

    <!-- Main content -->
    <section class="content">
      <div class="row" >
          
       
        <!-- /.col -->
        <div class="col-md-12" >

        <!-- section for the notices upon the data model funcionality -->
    <?php 
          $Notice_data = $this->session->flashdata('notice'); 

           if($Notice_data['Emp_save_success'] == 1 && $Notice_data['Emp_save_message'] != "")
           {
            echo "<div id=\"Notice_success\" name=\"Notice_success\" class=\"notice_success\">
                  <p><strong>Success!</strong> ".$Notice_data['Emp_save_message']."</p>
                  </div>";
           }
           else if($Notice_data['Emp_save_success']  == 0 && $Notice_data['Emp_save_message'] != "")
           {
        
            echo "<div id=\"Notice_error\" name=\"notice_error\" class=\"notice_error\">
            <p><strong>ERROR!</strong> ".$Notice_data['Emp_save_message']."</p>
            </div>";
           }
           else
           {
          
           }
   
           if(isset($Menu_item_05_02))
             {
            

    echo "  <div class=\"col-md-12\">
            <div class=\"box box-primary\">
            <div class=\"box-header with-border\">
            <div class=\"pull-left\"><h5 >".$Menu_item_05_02."</h5></div>
            <div class=\"pull-right\">
            <a href=\"\" class=\"btn btn-primary btn-block margin-bottommb-4\" data-toggle=\"modal\" data-target=\"#modal-add-chat-forum\" style=\"background-color:#2e3192;color:white;\"> <i class=\"glyphicon glyphicon-plus\" aria-hidden=\"true\"></i>Create Event</a>
            </div><br /><br />";


    echo " <table id=\"datatable_event_list\" class=\"table table-bordered table-hover\">
            <thead>
            <tr>
                
                <th>Status</th>
                <th>Description</th>
                <th>Location</th>
                <th>Happening</th>
                <th>Happening</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>";
                //Then we obtain the data as from the event controller
                foreach ($Fetch_all_events as $row)
                   {
                          
                         if($row['kms_event_status'] == 0)
                            {
                              $Kms_event_status = "<b style=\"color:orange;\">NOT<b/> Active";
                              $Kms_event_color  = "yellow";
                            }else{}//kms_event_time
                            $time_in_12_hour_format  = date("g:i a", strtotime($row['kms_event_time']));
                         echo "<tr><td >".$Kms_event_status."</td>
                               <td>".$row['kms_event_details']."</td>
                               <td>".$row['kms_loaction_name']."</td>
                               <td>".date("g:i a", strtotime($row['kms_event_time']))." | ".$row['kms_event_date']."</td>
                               <td></td>
                               <td><img src=".base_url("ext/dist/img/view.png")." /></td></tr>
                              ";
                      // }else{}
                   }
    echo " </tbody>
          <tfoot>
            <tr>
            
                  <th>Status</th>
                  <th>Description</th>
                  <th>Location</th>
                  <th>Happening</th>
                  <th>Happening</th>
                  <th>Action</th>
            </tr>
          </tfoot>
            </table>";
    
    echo " </div></div></div>";
             }else{ }
                
                ?>
           
       <!---the model for add new forum chat message ---->
       <div class="modal modal-default fade" id="modal-add-chat-forum" tabindex="-1" role="dialog" aria-labelledby="KMS - Chat Forum" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                
                <div class="modal-body" >
                  
                   <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">

              <h3 class="box-title pull-right" ><?php echo $Menu_item_05_03;?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url();?>Forum/New_Event" class="form-horizontal" autocomplete="off" method="POST" enctype="multipart/form-data" name="kms_form_event_add" id="kms_form_event_add" onsubmit="return validateform_add_event()" >
              <div class="box-body">
                
                <div class="form-group">
                    <label for="kms_input_event_name" class="col-sm-3 control-label">Event Name:</label>
                    <div class="col-sm-9">
                    <textarea class="form-control" rows="2" placeholder="Type your event description ..." id="kms_input_event_name" name="kms_input_event_name" ></textarea>
                    </div>

                </div>

                <div class="form-group">
                  <label for="kms_input_event_location" class="col-sm-3 control-label">Event Location:</label>

                  <div class="col-sm-9">

                  <select class="form-control select2" name="kms_input_event_location" id="kms_input_event_location" style="width: 100%;">

                        <?php 
                                    $Location_list = $this->session->userdata('kms_event_location_list');
                                    echo "<option value=\"0\"> Select event venue </option>";
                                        if(isset($Location_list) && $Location_list != "")
                                        {
                                            foreach ($Location_list as $row_Location_list)
                                            {
                                                echo "<option value=".$row_Location_list['kms_location_id'].">".$row_Location_list['kms_loaction_name']."</option>";
                                            }
                                         }else
                                        {
                                                echo "<option value=\"0\"> No data</option>";
                                        }
                        ?>
                  </select>

                  </div>
                </div>

                <div class="form-group">
                    <label for="kms_input_file_recipient" class="col-sm-3 control-label">Single Invite:</label>

                      <div class="col-sm-9">
                                         
                        <select class="selectpicker_live_users" data-size="5" name="kms_input_file_recipient" id="kms_input_file_recipient" multiple data-live-search="true">
                          <?php  
                             $Emp_list = $this->session->userdata('kms_emp_list_names_only_session');
                             echo "<option value=\"0\"> Select Participant(s) </option>";
                                if(isset($Emp_list) && $Emp_list != "")
                                  {
                                    foreach ($Emp_list as $row_emp)
                                      {
                                        echo "<option value=".$row_emp['emp_data_id'].">".$row_emp['emp_data_sname'].' '.strtoupper($row_emp['emp_data_fname'])."</option>";
                                      }
                                      }else
                                  {
                                        echo "<option value=\"0\"> No data</option>";
                                  }
                          ?>
                        </select>


                      </div>
                </div>
                                      
             
                <div class="form-group">
                  <label for="kms_input_fchat_forum" class="col-sm-3 control-label">Dept Invite:</label>

                  <div class="col-sm-9">

                  <select class="selectpicker" id="kms_input_fchat_forum" name="kms_input_fchat_forum" multiple data-live-search="true">

                  <option value="1"><?php echo $Menu_item_00_01_01; ?></option>
                  <option value="2"><?php echo $Menu_item_00_01_02; ?></option>
                  <option value="3"><?php echo $Menu_item_00_01_03; ?></option>
                  <option value="4"><?php echo $Menu_item_00_01_04; ?></option>
                  <option value="5"><?php echo $Menu_item_00_01_05; ?></option>
                  <option value="6"><?php echo $Menu_item_00_01_06; ?></option>
                  <option value="7"><?php echo $Menu_item_00_01_07; ?></option>
                  <option value="9"><?php echo $Menu_item_00_01_09; ?></option>
                  <option value="8"><?php echo $Menu_item_00_01_08; ?></option>
                  
                  </select>

                  </div> 
                
                </div>
                <div class="form-group">
                  <label for="kms_input_group_forum" class="col-sm-3 control-label">Group Invite:</label>

                  <div class="col-sm-9">

                  <select class="selectpicker_live_group" id="kms_input_group_forum" name="kms_input_group_forum" multiple data-live-search="true">

                  <?php 
                             $Emp_list = $this->session->userdata('kms_emp_list_names_only_session');
                           
                                if(isset($Emp_groups) && $Emp_groups != "")
                                  {
                                    foreach ($Emp_groups as $row_groups)
                                      {
                                        echo "<option value=".$row_groups['kms_group_id'].">".$row_groups['kms_group_name']."</option>";
                                      }
                                      }else
                                  {
                                        echo "<option value=\"0\"> No data</option>";
                                  }
                          ?>
                  
                  </select>

                  </div>
                
                </div>

                <div class="form-group">
                  <label for="kms_input_event_date" class="col-sm-3 control-label">Event Date:</label>
                  <div class="col-sm-9">
                  <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input class="col-sm-12 input-group datepicker" name="kms_input_event_date" id="date1" id="kms_input_event_date" data-provide="datepicker">
                </div>
                </div>
                </div>

                <div class="form-group">
                  <label for="kms_input_event_time" class="col-sm-3 control-label">Event Time:</label>
                  <div class="col-sm-9">
                  <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input type="time" class="col-sm-12 input-group datepicker" id="kms_input_event_time" name="kms_input_event_time" >
                </div>
                </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12">
                  <button type="submit" class="btn btn-success pull-right">Save <i class="fa fa-share"></i></button>
                  <input type="hidden" name="Kms_input_hidden_forum" id="Kms_input_hidden_forum">
                  <input type="hidden" name="Kms_input_hidden_recip" id="Kms_input_hidden_recip">
                  <input type="hidden" name="Kms_input_hidden_group" id="Kms_input_hidden_group">
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
     
    </section>
   
  
  


<!-- ./wrapper -->
<script src="<?php echo base_url();?>ext/dist/js/js_all.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>ext/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>ext/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>ext/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>ext/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>ext/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

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
<!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>ext/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- Page Script -->
<script>
       var date = new Date();
date.setDate(date.getDate());

$('#date1').datepicker({ 
    startDate: date
});

  document.addEventListener('contextmenu', event => event.preventDefault());
    $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
     //Date picker
     $('#datepicker').datepicker({
      autoclose: true
    }) 
  })

</script>
<script>
$(document).ready(function(){
  $('.selectpicker_live_users').selectpicker();
  $('.selectpicker_live_group').selectpicker();
setInterval(function(){

$("#forum_div").load(<?php base_url()."application/views/side_menu.phpf";?>)
}, 2000);
});

$(document).ready(function() {
    $('#datatable_event_list').DataTable();
} ); 
</script>

</body>
</html>
