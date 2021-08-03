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
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
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
          
          </ul>
          
        </li>
       
        <!--The e learning menu for the allowed users only as below-->

        <li <?php if($menu_status == "EL"){ echo "class=\"active treeview\"";}else{ echo "class=\"treeview\"";} ?>>
          <a href="<?php echo base_url();?>">
          <i class="fa fa-book"></i>
            <span>E Learning</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>Forum/ELearning"><i class="fa fa-map-o"></i><?php echo "  ".$Menu_item_06_02 ?></a></li><!--Email option-->
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
   
           if(isset($Menu_item_06_01))
             {
            

    echo "  <div class=\"col-md-12\">
                <div class=\"box box-primary\">
                    <div class=\"box-header with-border\">
                        <div class=\"pull-left\"><h5 >".$Menu_item_06_01."</h5></div>
                         
                        <div class=\"pull-right\" style=\"margin-left:1%;\">
                       
                        </div>
                        <div class=\"pull-right\">
                              <a href=\"\" class=\"btn btn-primary btn-block margin-bottommb-4\" data-toggle=\"modal\" data-target=\"#modal-add-etraining\" style=\"background-color:#2e3192;color:white;\"> <i class=\"glyphicon glyphicon-plus\" aria-hidden=\"true\"></i>".$Menu_item_06_04."</a>
                          </div> 
                        <br /><br />";


    echo "<div class\"row\">";
    echo "<div class=\"mx-auto\" style=\"width:100%;\">
    <div class=\"col-md-12\">
      <!-- Custom Tabs (Pulled to the right) -->
      <div class=\"nav-tabs-custom\">
        <ul class=\"nav nav-tabs pull-right\">";

        

        if(isset($etraining_cateogries) && $etraining_cateogries!= "")
        {
          foreach ($etraining_cateogries as $row_cat)
            {
            
              echo "<li ><a href=\"#t".$row_cat['Id']."\" data-toggle=\"tab\">".$row_cat['Name']." 
                    <span data-toggle=\"tooltip\" title=\"\" class=\"badge bg-light-blue\">";
                    if(isset($etraining_count))
                      {
                        foreach($etraining_count as $cat_count)
                        {
                          if($row_cat['Id'] == $cat_count['ID'] ){ echo $cat_count['NUM'];}else{ echo "";}
                        }
                      }else{}
                    
              echo  "</span>
                    </a></li>";
            }
        }else
        {
            //  echo "<option value=\"0\"> No data sourced</option>";
        }
       
         echo "
          <li class=\"pull-left header\"><i class=\"fa fa-th\"></i>NHOP Top trending Trainings</li>
        </ul>
        <div class=\"tab-content\" style=\"background:#ecf0f5;\">";


        if(isset($etraining_cateogries) && $etraining_cateogries!= "")
        {
          foreach ($etraining_cateogries as $row_cat)
            {
            
             // echo "<li ><a href=\"#t".$row_cat['Id']."\" data-toggle=\"tab\">".$row_cat['Name']."</a></li>";
              echo "<div class=\"tab-pane "; 
                   if($row_cat['Id'] == 1 ){ echo "active";}else{}
              echo "\" id=\"t".$row_cat['Id']."\" ><div class=\"row\"> <br />";
                     
                      foreach($etraining_available as $etrining)
                      {  
                        if($etrining['kms_etraining_category'] == $row_cat['Id'])
                        {
                      //We check if the user is nerolled for this training as below
                      if(isset($etraining_enroll) && $etraining_enroll != "")
                        {
                            foreach($etraining_enroll as $Enroll)
                               {
                                 $Training_enroll_train   = $Enroll['kms_etraining_id'];
                                
                                        if($etrining['kms_etraining_id'] == $Training_enroll_train)
                                        {
                                          $Enrolled  = 1;
                                          break;
                                        }
                                        else 
                                        {
                                          $Enrolled  = 0;
                                        
                                          }
                               }
                        }

                       
                        //Validate enroll status as below
                        if($Enrolled == 1 ){ $Enroll_color = "success"; $Enroll_icon = "fa-thumbs-up"; $Enroll_icon_color = "green";}else {$Enroll_color = "primary"; $Enroll_icon = "";$Enroll_icon_color = "";}
                        //This will count the description string and trim off those are more than 95 as below
                        if(strlen($etrining['kms_etraining_description']) <= 95){ $TrainingDes = $etrining['kms_etraining_description'];}else{$TrainingDes = substr($etrining['kms_etraining_description'],0,85)." ...";}
                        //This shall count the training name and trim off those that are more than 60 as below
                        if(strlen($etrining['kms_etraining_name']) <= 61){ $TraingName = $etrining['kms_etraining_name'];}else{ $TraingName = substr($etrining['kms_etraining_name'],0,61)." ...";}
                        echo "
                     
                        <div class=\"col-md-3\">
                        <a href=\"etraining\\".$etrining['kms_etraining_id']."\">
                        <div class=\"box box-".$Enroll_color."\" >
            
                        <!-- /.box-header -->
                        <div class=\"box-body\">
                           <p class=\"text-muted\"> <i class=\"fa ".$Enroll_icon."\" style=\"color:".$Enroll_icon_color."\"></i>&nbsp;".$TraingName."</p>
                           <strong><i class=\"fa fa-file-text-o margin-r-5\"></i> Description</strong>
                           <p style=\"color:black;\">".$TrainingDes."</p>
                        </div>
                        <!-- /.box-body -->
                        </div>
                        </a>
                        </div>
                       
                      ";
                        }else{}
                        
                      }



              echo "     </div>
              <!-- /.row --> </div>";
            }
        }



        

        echo "</div>
        <!-- /.tab-content -->
      </div>
      <!-- nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div></div>";



    echo " </div>";

    echo "              </div>
    </div>
</div>";

   // echo " </div></div></div>";
             }else{ }
                
                ?>
           
       <!---the model for add new etraining ---->
       <div class="modal modal-default fade" id="modal-add-etraining" tabindex="-1" role="dialog" aria-labelledby="KMS - Chat Forum" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                
                <div class="modal-body" >
                  
                   <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">

              <h3 class="box-title pull-right" style=""><?php echo $Menu_item_06_05;?></h3>
            </div>
            <!-- /.box-header -->
           <div class="box-body">
               <!-- form start -->
            <form action="<?php echo base_url();?>Forum/New_ELearning" class="form-horizontal" autocomplete="off" method="POST" enctype="multipart/form-data" name="kms_form_etraining_add" id="kms_form_etraining_add" onsubmit="return validateform_add_etraining()" >
                
                <div class="form-group">
                    <label for="kms_input_training_name" class="col-sm-3 control-label">Training Name:</label>
                    <div class="col-sm-9" >
                    <input type="" class="form-control"  placeholder="How do you call the training?" id="kms_input_training_name" name="kms_input_training_name" />
                    </div>

                </div>

                <div class="form-group">
                    <label for="kms_input_training_description" class="col-sm-3 control-label">Description:</label>
                    <div class="col-sm-9" >
                    <textarea class="form-control" rows="2" placeholder="How do you describe this training?" id="kms_input_training_description" name="kms_input_training_description" ></textarea>
                    </div>

                </div>

                

                <div class="form-group">
                    <label for="kms_input_training_instructor" class="col-sm-3 control-label">Instructor:</label>

                      <div class="col-sm-9">
                                         
                        <select class="selectpicker_live_users" data-size="5" name="kms_input_training_instructor" id="kms_input_training_instructor"  data-live-search="true">
                          <?php 
                             $Emp_list = $this->session->userdata('kms_emp_list_names_only_session');
                             echo "<option value=\"0\"> Nothing selected</option>";
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
                  <label for="kms_input_etraining_category" class="col-sm-3 control-label">Category:</label>

                  <div class="col-sm-9">

                  <select  class="selectpicker" id="kms_input_etraining_category" name="kms_input_etraining_category"  data-live-search="true">
                  <?php 
                             $Emp_list = $this->session->userdata('kms_emp_list_names_only_session');
                             echo "<option value=\"0\"> Nothing selected</option>";
                                if(isset($etraining_cateogries) && $etraining_cateogries!= "")
                                  {
                                    foreach ($etraining_cateogries as $row_cat)
                                      {
                                        echo "<option value=".$row_cat['Id'].">".$row_cat['Name']."</option>";
                                      }
                                      }else
                                  {
                                        echo "<option value=\"0\"> No data sourced</option>";
                                  }
                          ?>
                
                  </select>

                  </div> 
                
                </div>

                <div class="form-group">
                  <div class="col-sm-12">
                  <button type="submit" class="btn btn-success pull-right">Save <i class="fa fa-share"></i></button>
                  
                  <input type="hidden" name="Kms_input_hidden_instructor" id="Kms_input_hidden_instructor">
                 
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
