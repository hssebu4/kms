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
        


    echo "<div class\"row\">";
    echo "<div class=\"mx-auto\" style=\"width:100%;\">
  
 
          <div class=\"row\" style=\"margin:auto;\">
              <div class=\"pull-left\" style=\"margin:auto;width:70%;\">
           
              
             
                


              <div class=\"box box-solid\">
              <div class=\"box-header with-border\">
                <i class=\"fa fa-graduation-cap \"></i>
                
                <h3 class=\"box-title\">";
                if(isset($etraining_view)){ 
                  foreach($etraining_view as $TrainingData)
                        {
                          $Training_name = $TrainingData['kms_etraining_name'];
                          echo " |  ".$Training_name."</h3>";
                          $Training_Desc = $TrainingData['kms_etraining_description'];
                          $Training_data = $TrainingData['kms_etraining_reg_date'];
                          $Training_Cate = $TrainingData['kms_etraining_cat_name'];
                          $Training_catid= $TrainingData['kms_etraining_category'];
                          $Training_Ownn = $TrainingData['kms_etraining_emp_id'];
                          $Training_Ins1 = $TrainingData['Creater'];
                          $Training_Ins2 = $TrainingData['kms_etraining_instructor'];
                          $Training_TrId = $TrainingData['kms_etraining_id'];

                         if($Training_Ownn  != $this->session->userdata('kms_emp_id') || $this->session->userdata('kms_access_role_status') == 3)
                          {

                            if(isset($etraining_enroll) && $etraining_enroll != null)
                            {
                                  foreach ($etraining_enroll as $enroll)
                                   {
                                         $enroll_id     = $enroll['kms_etraining_id'];
                                         
                                         if($Training_TrId == $enroll_id)
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
                            if($Enrolled == 1)
                            {
                              echo "<div class=\"pull-right \">
                                    <i class=\"greencolor\" >Enrolled &nbsp;&nbsp;<i class=\"fa fa-check-square-o\"></i></i>
                                    </div>";
                            }
                            else
                            {
                              echo "<div class=\"pull-right  backgdcolorBlue\">
                                    <a data-toggle=\"modal\" data-target=\".Modal_enrollTraining\" class=\"btn btn-info btn-xs backgdcolorBlue\"  >Enroll &nbsp;&nbsp;<i class=\"fa fa-user-plus\"></i></a>
                                    </div>";
                            }
                            
                         }else{}
                        
                        }
                
                }else{ echo "";}
                echo "
              </div>
              <!-- /.box-header -->
              <div class=\"box-body\">
                <dl class=\"dl-horizontal\">
                  <dt>";if($Training_Ownn  == $this->session->userdata('kms_emp_id') || $this->session->userdata('kms_access_role_status') == 3){
                  echo "<a data-toggle=\"modal\" data-toggle=\"tooltip\" title=\"Click to edit the description\" data-target=\".modal-edit-etraining\"><i class=\"fa fa-edit bluecolor\"></i></a>&nbsp;&nbsp;";}
                  echo "Description:</dt>
                  <dd>".$Training_Desc."</dd>
                  <dt>Category:</dt>
                  <dd>".$Training_Cate."</dd>
                  <dt>Added on:</dt>
                  <dd>".$Training_data."</dd>   
                  <dt>";if($Training_Ownn  == $this->session->userdata('kms_emp_id') || $this->session->userdata('kms_access_role_status') == 3){ 
                  echo "<a class=\"Upload_save_modal\" data-toggle=\"tooltip\" title=\"Click to add skill\" data-id=".$Training_TrId."><i class=\"fa fa-plus bluecolor\"></i> </a>&nbsp;";}
                  echo "
                   
                  Skill you will gain:</dt>
                  <dd>";
                  //This shall fetch the skills for the etraining
                  if(isset($etraining_skill)){ 
                    $Etraining_Skill2 = "";
                    foreach($etraining_skill as $TrainingSkill)
                          {
                            if($Etraining_Skill2 == ""){
                               $Etraining_Skill2 .= $TrainingSkill['kms_etraining_skill_desc'];
                              }else
                              {
                                $Etraining_Skill2 .= " | ".$TrainingSkill['kms_etraining_skill_desc'];
                              }
                          }
                        echo $Etraining_Skill2;
                  }

                  //This shall fetch the training count for selected instructors
                  if(isset($etraining_count_ins))
                  {
                    foreach($etraining_count_ins as $TrainingCount)
                     {
                       $Etraining_count_Num1 = $TrainingCount['Numb'];
                     }
                     if(strlen($Etraining_count_Num1) <=1){ $Etraining_count_Num = "0".$Etraining_count_Num1;}else{$Etraining_count_Num = $Etraining_count_Num1;}
                  }else{$Etraining_count_Num = "00";}
                  echo "</dd>
                  
                </dl>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->



            
             
            <!-- /.box -->
              </div>
              <div class=\"pull-right\" style=\"margin:auto;margin-left:2px;width:29.5%;\">
              
              
              
              
                
              <!-- Widget: user widget style 1 -->
              <div class=\"box box-widget widget-user-2\">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class=\"widget-user-header \" style=\"background-color:#2e3192;color:white;\">
                    <div class=\"widget-user-image\">
                      <img class=\"img-circle\" src=\"".base_url()."uploads/img/".$Training_Ins2.".png\" alt=\"User \">
                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class=\"widget-user-username\">".$Training_Ins1."</h3>
                    <h5 class=\"widget-user-desc\">The Instructor</h5>
                  </div>
                  <div class=\"box-footer no-padding\">
                    <ul class=\"nav nav-stacked\">
                      <li><a href=\"#\">Training(s) <span class=\"pull-right badge bg-blue\">".$Etraining_count_Num."</span></a></li>
                      <li><a href=\"#\">Enrolled <span class=\"pull-right badge bg-blue\">";
                  //This will count the enrolled user per selected training as below
                  if(isset($enroll_count) && $enroll_count != null)
                  {
                    foreach($enroll_count as $Enroll_Count)
                         {
                           $Count_figure = $Enroll_Count['Count'];
                         }
                  }
                  if(strlen($Count_figure) <=1){ $Count_figure1 = "0".$Count_figure;}else{$Count_figure1 = $Count_figure;}
                 
            echo "".$Count_figure1."</span></a></li>
                     </ul>
                  </div>
                </div>





              </div>
              <!-- /.box-body -->
              
           
              
              </div>
          </div>
           </div>";

           echo "<div class\"row\" ";
           echo "<div class=\"box box-primary\">
           <div class=\"box-header with-border\">
               <h3 class=\"box-title\">Training Content</h3>&nbsp;&nbsp;&nbsp;";
       //This will add the plus button for adding anew training content as below
       if($Training_Ownn  == $this->session->userdata('kms_emp_id') || $this->session->userdata('kms_access_role_status') == 3){ 
             echo "<a class=\"Modal_add_training_content\" data-toggle=\"tooltip\" title=\"Click to add another content\" data-id=".$Training_TrId."><i class=\"fa fa-plus bluecolor\"></i> </a>&nbsp;&nbsp;&nbsp;&nbsp;";}


           //This will add the plus button for adding anew training content as below
       if($this->session->userdata('kms_access_role_status') == 3){ 
        echo "<a class=\"Modal_add_video_content\" data-toggle=\"tooltip\" title=\"Click to add a video content\" data-TrainingidV=".$Training_TrId."><i class=\"fa  fa-file-video-o bluecolor\"></i> </a>&nbsp;";}     

             echo "<div class=\"box-tools pull-right\">
               <button type=\"button\" class=\"btn btn-box-tool\" data-widget=\"collapse\"><i class=\"fa fa-minus\"></i>
               </button>
             </div>
             <!-- /.box-tools -->
           </div>
           <!-- /.box-header -->
           <div class=\"box-body\">";
            

           echo " <table id=\"datatable_trainingContent_list\" class=\"table table-bordered table-hover\">
           <thead>
           <tr>
               <th>Content Description</th>
               <th>Resources</th>
               <th>Action</th>
           </tr>
           </thead>
           <tbody>";

              if(isset($etraining_content) && $etraining_content != null)
              { 
                
                foreach($etraining_content as $row_cont)
                       {
                     
                        $kms_combinedString = str_replace(' ','`',$row_cont["kms_etraining_cont_des"]);
                        $kms_extresocString = str_replace(' ','`',$row_cont["kms_etraining_cont_extfile"]);
                        $kms_cont_video_loc = $row_cont['kms_etraining_video_id'];
                        $kms_video_String   = str_replace(' ','`',$kms_cont_video_loc);
                        $kms_cont_int_file  = $row_cont['kms_upload_details'];

                        if(isset($kms_cont_video_loc) && $kms_cont_video_loc != null)
                        {
                          foreach ($etraining_video as $vid) 
                          {
                            $Vid_id  = $vid['VideoID'];
                            $Vid_Ltn = $vid['Locatn'];
                            if($Vid_id == $kms_cont_video_loc ){ $Vid_location = $Vid_Ltn;}
                          }

                        }else{}
                        if(isset($Enrolled) &&  $Enrolled == 1 || $this->session->userdata('kms_access_role_status') == 3)
                          {
                            $Enroll_color = "greencolor";
                            $Enroll_return= "true";
                            $Modal_enroll = "Modal_video_training_content";
                          }
                        else
                          {
                            $Enroll_color = "bluecolor";
                            $Enroll_return= "false";
                            $Modal_enroll = "";
                          }
                        
                         echo "<tr><td>".$row_cont['kms_etraining_cont_des']."</td>
                                   <td>
                            
                                   <a onclick=\"return ".$Enroll_return.";\" href=".base_url("/ViewerJS/#../uploads/documents/".str_replace(' ','-',$kms_cont_int_file)."")." target=\"_blank\" >
                                   <i class=\"fa fa-book ".$Enroll_color." \" data-toggle=\"tooltip\" title=\"Click to open the internal files\"></i></a> &nbsp;&nbsp;|&nbsp;&nbsp;";

                        if(isset($row_cont["kms_etraining_cont_extfile"]) && $row_cont["kms_etraining_cont_extfile"] != null)
                        {
                        echo "<a onclick=\"return ".$Enroll_return.";\" href=".prep_url($row_cont["kms_etraining_cont_extfile"])." target=\"_blank\" ><i class=\"fa fa-internet-explorer ".$Enroll_color."\" data-toggle=\"tooltip\" title=\"Click to open the external file\"></i></a>&nbsp;&nbsp";
                        }else
                        {
                          echo "&nbsp;&nbsp;";
                        }
                        if(isset($kms_cont_video_loc) && $kms_cont_video_loc != null)
                        {
                          echo "|&nbsp;&nbsp;<a class=\"".$Modal_enroll."\" data-toggle=\"tooltip\" data-video='".$Vid_location."' title=\"Click to view video\" ><i class=\"fa fa-video-camera ".$Enroll_color."\" ></i></a>";
                        }else
                        {
                          echo "|&nbsp;&nbsp;";
                        }


                        echo "</td> <td>";
                         if($Training_Ownn  == $this->session->userdata('kms_emp_id') || $this->session->userdata('kms_access_role_status') == 3){
                         echo "<a class=\"Modal_edit_training_content\" data-toggle=\"tooltip\" title=\"Click to edit this content\" data-trainingid=".$row_cont["kms_etraining_id"]." data-desid=".$row_cont['kms_etraining_cont_id']." data-description=".$kms_combinedString." data-intresource=".$row_cont['kms_etraining_cont_intfile']." data-extresource=".$kms_extresocString." data-videores=".$kms_video_String."><i class=\"fa fa-edit bluecolor\"></i> </a>&nbsp;&nbsp;";
                         echo "<a class=\"Modal_add_training_assess\" data-toggle=\"tooltip\" title=\"Click to add/edit assessment\" data-trainingid=".$row_cont["kms_etraining_id"]." data-desid=".$row_cont['kms_etraining_cont_id']."><i class=\"glyphicon glyphicon-hourglass\"></i> </a>&nbsp;&nbsp;";
                        
                        }
                                      
                         echo "</td></tr>";
                       }
              }else{}
          
           echo " </tbody>
                  <tfoot>
                      <tr>
                            <th>Content Description</th>
                            <th>Resources</th>
                            <th>Action</th>
                      </tr>
                  </tfoot>
            </table>";


           echo "</div> <!-- /.box-body -->
                 </div> <!-- /.box -->
                 </div></div> ";

             }else{ }
                
                ?>
      <!-- Modal for editing the training details training as selected-->     
      <div class="modal fade modal-edit-etraining" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="box-header with-border">
                   <h3 class="box-title pull-right">KMS | eTraining</h3>
                </div>
            
                <div class="modal-body">
                  <!-- form start -->
                          <form action="<?php echo base_url();?>Forum/Edit_Training" class="form-horizontal" autocomplete="off" method="POST" enctype="multipart/form-data" name="kms_form_etraining_edit" id="kms_form_etraining_edit" onsubmit="return validateform_edit_etraining()" >
                              
                              <div class="form-group">
                                  <label for="kms_input_training_name_edit" class="col-sm-3 control-label">Training Name:</label>
                                  <div class="col-sm-9" >
                                  <input type="" class="form-control"  placeholder="How do you call the training?" id="kms_input_training_name_edit" name="kms_input_training_name_edit" value="<?php echo $Training_name; ?>"/>
                                  </div>

                              </div>

                              <div class="form-group">
                                  <label for="kms_input_training_description_edit" class="col-sm-3 control-label">Description:</label>
                                  
                                  <div class="col-sm-9" >
                                  <textarea class="form-control" rows="2" placeholder="How do you describe this training?" id="kms_input_training_description_edit" name="kms_input_training_description_edit"  ><?php echo $Training_Desc; ?></textarea>
                                  </div>

                              </div>

                              

                              <div class="form-group">
                                  <label for="kms_input_training_instructor_edit" class="col-sm-3 control-label">Instructor:</label>

                                    <div class="col-sm-9">
                                                      
                                      <select class="selectpicker_live_users" data-size="5" name="kms_input_training_instructor_edit" id="kms_input_training_instructor_edit"  data-live-search="true">
                                        <?php 
                                          $Emp_list = $this->session->userdata('kms_emp_list_names_only_session');
                                          echo "<option value=\"0\"> Nothing selected</option>";
                                              if(isset($Emp_list) && $Emp_list != "")
                                                {
                                                  foreach ($Emp_list as $row_emp)
                                                    {
                                                      if($Training_Ins2 == $row_emp['emp_data_id'] ){ $selected = "selected";}else{ $selected = "";}
                                                      echo "<option $selected value=".$row_emp['emp_data_id'].">".$row_emp['emp_data_sname'].' '.strtoupper($row_emp['emp_data_fname'])."</option>";
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
                                <label for="kms_input_etraining_category_edit" class="col-sm-3 control-label">Category:</label>

                                <div class="col-sm-9">

                                <select  class="selectpicker" id="kms_input_etraining_category_edit" name="kms_input_etraining_category_edit"  data-live-search="true">
                                <?php 
                                          $Emp_list = $this->session->userdata('kms_emp_list_names_only_session');
                                          echo "<option value=\"0\"> Nothing selected</option>";
                                              if(isset($etraining_cateogries) && $etraining_cateogries!= "")
                                                {
                                                  foreach ($etraining_cateogries as $row_cat)
                                                    {
                                                      if($Training_catid == $row_cat['Id'] ){ $selected = "selected";}else{ $selected = "";}
                                                      echo "<option $selected value=".$row_cat['Id'].">".$row_cat['Name']."</option>";
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
                                <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save"> </i> Update </button>
                                
                                <input type="hidden" name="Kms_input_hidden_training_edit" id="Kms_input_hidden_training_edit" value="<?php echo $Training_TrId; ?>">
                              
                              </div>
                          
                            </div>
                          
                            <!-- /.box-footer -->
                          </form>
                </div>
     
            </div>
          </div>
      </div>

        

<!-- Modal for add another skill on the training as selected-->     
    <div id="Modal_addSkills" class="modal fade" role="dialog"  tabindex="-1" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="box-header with-border">
                   <h3 class="box-title pull-right">KMS | eTraining</h3>
                </div>
            
                <div class="modal-body">
                <form action="<?php echo base_url();?>Forum/New_Skill" class="form-horizontal" autocomplete="off" method="POST" enctype="multipart/form-data" name="kms_form_add_skills" id="kms_form_add_skills" onsubmit="return validateform_etraining_skills()"  >
                <input type="hidden" name="Kms_input_hidden_etraining_id" id="Kms_input_hidden_etraining_id">
               
                   <div class="form-group">
                      <label for="kms_input_fchat_message" class="col-sm-3 control-label">Skill:</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" rows="3" placeholder="Enter the skill to be gained" id="kms_input_etraining_skill" name="kms_input_etraining_skill" ></textarea>
                          </div>
                   </div>

                   <div class="form-group">
                      <div class="abc col-sm-12">
                        <button type="submit" class="btn btn-success pull-right">Save &nbsp;<i class="fa fa-save"></i></button>
                      </div>    
                   </div>
                            
                </form>
                </div>
     
            </div>
        </div>
      </div>


      <!-- Modal for enrolling on the training as selected-->     
    <div  class="modal  fade Modal_enrollTraining" role="dialog"  tabindex="-1" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="box-header with-border">
                   <h3 class="box-title pull-right">KMS | eTraining | errolling</h3>
                </div>
            <?php 
            //This is the random 4 digits used when enrolling confirmation
            $Random_digit = rand(1111,9999);
            ?>
                <div class="modal-body">
                <form action="<?php echo base_url();?>Forum/eTrainingenroll" class="form-horizontal" autocomplete="off" method="POST" enctype="multipart/form-data" name="kms_form_etraining_enroll" id="kms_form_etraining_enroll" onsubmit="return validateform_etraining_enroll()"  >
                <input type="hidden" name="Kms_input_hidden_etraining_id" id="Kms_input_hidden_etraining_id" value="<?php echo $Training_TrId;?>">
                   <div class="form-group">
                     <div class="col-sm-9">
                       Re type these digits  <?php echo "<i style=\"font-weight:bold;font-size:18px;\"> ".$Random_digit." </i>";?> to confirm your enrollment to this training
                       </div>
                       <div class="col-sm-3">
                       <input id="kms_enroll_match_digits_input" name="kms_enroll_match_digits_input" type="number" required class="form-control" placeholder="X X X X" max="9999" onkeypress="validate(event)" >
                       <input id="kms_enroll_match_digits" type="hidden" value="<?php echo $Random_digit;?>"/>   
                      </div>
                   </div>
                  

                   <div class="form-group">
                     
                      <div class="col-sm-12">
                      <div id="MessageDiv" class="pull-left"></div>
                        <button id="btn_confirm" type="submit" class="btn btn-success pull-right">Confirm &nbsp;<i class="fa fa-save"></i></button>
                      </div>    
                   </div>
                            
                </form>
                </div>
     
            </div>
        </div>
      </div>

   <!-- Modal for add a new content on the training as selected-->     
   <div id="Modal_add_training_content" class="modal fade" role="dialog"  tabindex="-1" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="box-header with-border">
                   <h3 class="box-title pull-right">KMS | eTraining</h3>
                </div>
            
                <div class="modal-body">
                
                <form action="<?php echo base_url();?>Forum/New_Content" class="form-horizontal" autocomplete="off" method="POST" enctype="multipart/form-data" name="kms_form_add_content" id="kms_form_add_content" onsubmit="return validateform_etraining_content()"  >
               
               
                   <div class="form-group">
                      <label for="kms_input_etraining_cont" class="col-sm-4 control-label">Content Description:</label>
                          <div class="col-sm-8">
                            <textarea class="form-control" rows="3" placeholder="How would you decription this content" id="kms_input_etraining_cont" name="kms_input_etraining_cont" ></textarea>
                          </div>
                   </div>

                   <div class="form-group">
                                  <label for="kms_input_training_internal_res" class="col-sm-4 control-label">Internal resource:</label>

                                    <div class="col-sm-8">
                                                      
                                      <select required class="selectpicker_live_users" data-size="3" name="kms_input_training_internal_res" id="kms_input_training_internal_res"  data-live-search="true">
                                        <?php 
                                        
                                          echo "<option value=\"0\"> Nothing selected</option>";
                                              if(isset($etraining_infile) && $etraining_infile != "")
                                                {
                                                  foreach ($etraining_infile as $row_files)
                                                    {
                                                      echo "<option  value=".$row_files['kms_upload_id'].">".$row_files['kms_upload_details']."</option>";
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
                      <label for="kms_input_fchat_message" class="col-sm-4 control-label">External resource:</label>
                          <div class="col-sm-8">
                            <div class="input-group">
                               <input id="kms_input_training_external_res" name="kms_input_training_external_res" type="text" class="form-control" placeholder="Provide the address to the external content">
                               <span class="input-group-addon"><i class="fa fa-internet-explorer"></i></span>
                            </div>
                        </div>
                    </div>

                    
                   <div class="form-group">
                      <div class="abc col-sm-12">
                        <input type="hidden" name="Kms_input_hidden_etraining_id" id="Kms_input_hidden_etraining_id">
                        <button type="submit" class="btn btn-success pull-right">Send &nbsp;&nbsp;<i class="fa fa-save"></i></button>
                      </div>    
                   </div>
                            
                </form>
                </div>
     
            </div>
        </div>
      </div>


 <!-- Modal for add a new content on the training as selected-->     
 <div id="Modal_add_video_content" class="modal fade" role="dialog"  tabindex="-1" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="box-header with-border">
                   <h3 class="box-title pull-right">KMS | eTraining | Video Upload</h3>
                </div>
            
                <div class="modal-body">
                
                <form action="<?php echo base_url();?>Forum/Video_reg" class="form-horizontal" autocomplete="off" method="POST" enctype="multipart/form-data" name="kms_form_video_reg" id="kms_form_video_reg" onsubmit="return validateform_etraining_videoReg()"  >
               
                    <div class="form-group">
                      <label for="kms_upload_training_video_des" class="col-sm-4 control-label">Video Description:</label>
                          <div class="col-sm-8">
                          <input id="kms_upload_training_video_des" name="kms_upload_training_video_des" type="text" class="form-control" placeholder="Description for your video file">
                          </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="kms_upload_training_video_name" class="col-sm-4 control-label">Video location name:</label>
                          <div class="col-sm-8">
                          <input id="kms_upload_training_video_name" name="kms_upload_training_video_name" type="text" class="form-control" placeholder="Exact file name">
                          </div>
                    </div>
                   
                   
                   <div class="form-group">
                      <div class="abc col-sm-12">
                        <div id="VideoUplaod_message" class="pull-left"></div>
                        <input type="text" name="Kms_input_hidden_etraining_id3" id="Kms_input_hidden_etraining_id3">
                        <button type="submit" id="btn_video_reg" class="btn btn-success pull-right">Register &nbsp;&nbsp;<i class="fa fa-save"></i></button>
                      </div>    
                   </div>
                            
                </form>
                </div>
     
            </div>
        </div>
      </div>





      <!--We then obtain the etraining content detial that are to be edited as below-->


      <!-- Modal for editing contents on the training as selected-->     
   <div id="Modal_edit_training_content" class="modal fade" role="dialog"  tabindex="-1" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="box-header with-border">
                   <h3 class="box-title pull-right">KMS | eTraining | Content</h3>
                </div>
            
                <div class="modal-body">
                
                <form action="<?php echo base_url();?>Forum/Edit_Content" class="form-horizontal" autocomplete="off" method="POST" enctype="multipart/form-data" name="kms_form_edit_content" id="kms_form_edit_content" onsubmit="return validateform_etraining_Editcontent()"  >
               
               
                   <div class="form-group">
                      <label for="kms_edit_etraining_cont" class="col-sm-4 control-label">Content Description:</label>
                          <div class="col-sm-8">
                            <textarea class="form-control" rows="3" placeholder="How would you decription this content" id="kms_edit_etraining_cont" name="kms_edit_etraining_cont" ></textarea>
                          </div>
                   </div>

                   <div class="form-group">
                                  <label for="kms_edit_training_internal_res" class="col-sm-4 control-label">Internal resource:</label>

                                    <div class="col-sm-8">
                                                      
                                      <select class="selectpicker_live_users" data-size="5" name="kms_edit_training_internal_res" id="kms_edit_training_internal_res"  data-live-search="true">
                                        <?php 
                                        
                                              if(isset($etraining_infile) && $etraining_infile != "")
                                                {
                                                  foreach ($etraining_infile as $row_files)
                                                    {
                                                      // if(isset($kms_cont_int_file_id) && $kms_cont_int_file_id == $row_files['kms_upload_id']){ $option_selected = "selected";}else{$option_selected ="";}
                                                      echo "<option  value=".$row_files['kms_upload_id'].">".$row_files['kms_upload_details']."</option>";
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
                                  <label for="kms_edit_training_video_res" class="col-sm-4 control-label">Video file resource:</label>

                                    <div class="col-sm-8">
                                                      
                                      <select class="selectpicker_live_users" data-size="5" name="kms_edit_training_video_res" id="kms_edit_training_video_res"  data-live-search="true">
                                        <?php 
                                        echo "<option value=\"0\"> Nothing selected</option>";
                                        if(isset($etraining_video) && $etraining_video != "")
                                                {
                                                  foreach ($etraining_video as $row_video)
                                                    {
                                                     
                                                      echo "<option value='".$row_video['VideoID']."' >".$row_video['Descp']."</option>";
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
                      <label for="kms_edit_training_external_res" class="col-sm-4 control-label">External resource:</label>
                          <div class="col-sm-8">
                            <div class="input-group">
                               <input id="kms_edit_training_external_res" name="kms_edit_training_external_res" type="text" class="form-control" placeholder="The address format-> https://www.abc.com">
                               <span class="input-group-addon"><i class="fa fa-internet-explorer"></i></span>
                            </div>
                        </div>
                    </div>
                   <div class="form-group">
                      <div class="abc col-sm-12">
                        <input type="hidden" name="Kms_input_hidden_etraining_contid" id="Kms_input_hidden_etraining_contid">
                        <input type="hidden" name="Kms_input_hidden_etraining_id" id="Kms_input_hidden_etraining_id">
                        <button type="submit" class="btn btn-success pull-right">Update &nbsp;&nbsp;<i class="fa fa-save"></i></button>
                      </div>    
                   </div>
                            
                </form>
                </div>
     
            </div>
        </div>
      </div>
                                


        <!-- Modal for editing contents on the training as selected-->     
   <div id="Modal_video_training_content2" class="modal fade" role="dialog"  tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="box-header with-border">
                   <h3 class="box-title pull-right">KMS | eTraining | Video Center</h3>
                </div>
            
                <div class="modal-body" >
                  <div id="Div_LoadVideo"></div>
                <video controls id="video1" style="width: 100%; height: auto; margin:0 auto; frameborder:0;">
                Please contact I.T, the browser doesn't support Video Streaming.
               </video>
     
            </div>
        </div>
      </div>
    </div>


 <!-- Modal for editing contents on the training as selected-->     
 <div id="Modal_add_training_assess" class="modal fade" role="dialog"  tabindex="-1" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="box-header with-border">
                   <h3 class="box-title pull-right">KMS | eTraining | Assessment</h3>
                </div>
            
                <div class="modal-body">
                
                <form action="<?php echo base_url();?>Forum/" class="form-horizontal" autocomplete="off" method="POST" enctype="multipart/form-data" name="kms_form_edit_content_assess" id="kms_form_edit_content_assess" onsubmit="return validateform_etraining_Editcontent()"  >
               
               
                   <div class="form-group">
                      <label for="kms_edit_etraining_question" class="col-sm-4 control-label">Question Description:</label>
                          <div class="col-sm-8">
                            <textarea class="form-control" rows="2" placeholder="Type the question that you would like to be answered" id="kms_edit_etraining_question" name="kms_edit_etraining_question" onkeyup="validate_question(value)"></textarea>
                          </div>
                   </div>
                    
                   <div class="form-group">
                      <label for="kms_edit_etraining_qtn_image" class="col-sm-4 control-label">Question Illustration:</label>
                          <div class="col-sm-8">
                          <input type="file" onchange="loadFile(event)" name="kms_elearning_assess_file"  id="kms_elearning_assess_file" accept="image/x-png,image/gif,image/jpeg"/>
                           </div>
                   </div>
                
                   <div class="form-group">
                      <label for="kms_edit_etraining_qtn_type" class="col-sm-4 control-label">Question Answer Type:</label>
                          <div class="col-sm-8">
                              <select  class="selectpicker Qtn_type" id="kms_edit_etraining_qtn_type" name="kms_edit_etraining_qtn_type"  >
                                <option value="0">Select question type here</option>
                                <option value="1">Text Typing Answering</option>
                                <option value="2">Checkbox Answering</option>
                                <option value="3">Objectives Answering</option>
                                <option value="4">File upload Answering</option>
                              
                              </select>
                           </div>
                   </div>
                   <div id="AnswerOptions_div">
                   <div class="form-group">
                      <label for="kms_edit_etraining_qstn_ans1" class="col-sm-4 control-label">Answer Option 1:</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" rows="1" placeholder="Type the question that you would like to be answered" id="kms_edit_etraining_qstn_ans1" name="kms_edit_etraining_qstn_ans1" onkeyup="validate_Answer_option1(value)"></input>
                          </div>
                   </div>

                   <div class="form-group">
                      <label for="kms_edit_etraining_qstn_ans1" class="col-sm-4 control-label">Answer Option 2:</label>
                          <div class="col-sm-8">
                          <input type="text" class="form-control" rows="1" placeholder="Type the question that you would like to be answered" id="kms_edit_etraining_qstn_ans1" name="kms_edit_etraining_qstn_ans1" onkeyup="validate_Answer_option2(value)"></input>
                           </div>
                   </div>
                   <div class="form-group">
                      <label for="kms_edit_etraining_qstn_ans1" class="col-sm-4 control-label">Answer Option 3:</label>
                          <div class="col-sm-8">
                          <input type="text" class="form-control" rows="1" placeholder="Type the question that you would like to be answered" id="kms_edit_etraining_qstn_ans1" name="kms_edit_etraining_qstn_ans1" onkeyup="validate_Answer_option3(value)"></input>
                          </div>
                   </div>
                   <div class="form-group">
                      <label for="kms_edit_etraining_qstn_ans1" class="col-sm-4 control-label">Answer Option 4:</label>
                          <div class="col-sm-8">
                          <input type="text" class="form-control" rows="1" placeholder="Type the question that you would like to be answered" id="kms_edit_etraining_qstn_ans1" name="kms_edit_etraining_qstn_ans1" onkeyup="validate_Answer_option4(value)"></input>
                           </div>
                   </div>
                   </div>
                   <div class="form-group">
                      <div class="abc col-sm-12">
                        <input type="hidden" name="Kms_input_hidden_etraining_contid" id="Kms_input_hidden_etraining_contid">
                        <input type="hidden" name="Kms_input_hidden_etraining_id" id="Kms_input_hidden_etraining_id">
                        <button type="submit" class="btn btn-success pull-right">Save &nbsp;&nbsp;<i class="fa fa-save"></i></button>
                      </div>    
                   </div>
                   <hr />
                <div class="form-group">
                <div class="abc col-sm-12"> 
                    <div id="QtnDiv_messages" ></div>
                  
                    <img id='img-upload=preview'style="margin:5px;"/>
                       
                    <div id="QtnDiv_question" ></div> 
                </div>  
                
                
                </form>
               
                </div>
     
            </div>
        </div>
      </div>



    </section>

<script src="<?php echo base_url();?>ext/dist/js/js_all.js"></script>
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>ext/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>ext/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!--Bootstrap for multiple select -->
<script src="<?php echo base_url();?>bootstrap/js/dist/bootstrap-select.min.js"></script>
<script src="<?php echo base_url();?>bootstrap/js/dist/semantic.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>ext/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>ext/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>ext/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>ext/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>ext/dist/js/adminlte.min.js"></script>
<!-- form validate javascript kms customized versin -->
<script src="<?php echo base_url();?>ext/dist/js/form_validate.js"></script>
<!-- Page Script -->
<script>


$(function () {
        $("a[class='Upload_save_modal']").click(function () {
          //In this we pass data to the modal from the <a> tag as data-id and set 
          var Upload_file_id = $(this).data('id');
          $(".modal-body #Kms_input_hidden_etraining_id").val(Upload_file_id);
          $("#Modal_addSkills").modal("show");
            return true;
        });
      
     
     
        $("a[class='Modal_add_training_content']").click(function () {
          var Upload_file_id = $(this).data('id');
          $(".modal-body #Kms_input_hidden_etraining_id").val(Upload_file_id);
          $("#Modal_add_training_content").modal("show");
            return true;
        });

        $("a[class='Modal_add_video_content']").click(function () {
          var Training_id = $(this).data('TrainingidV');
          $(".modal-body #Kms_input_hidden_etraining_id3").val(Training_id);
          //alert("The vale is ".Training_id);
          $("#Modal_add_video_content").modal("show");
           return true;
        });

       


        //Modal_add_video_content
        $("a[class='Modal_edit_training_content']").click(function () {
          //In this we pass data to the modal from the <a> tag as data-id and set 
          $(".modal-body #Kms_input_hidden_etraining_contid").val($(this).data('desid'));
          $(".modal-body #Kms_input_hidden_etraining_id").val($(this).data('trainingid'));
          $(".modal-body #kms_edit_training_external_res").val($(this).data('extresource').replace(/`/g," "));
          $('[name="kms_edit_etraining_cont"]').val($(this).data('description').replace(/`/g," "));
          $('select[name=kms_edit_training_video_res]').val($(this).data('videores'));
          $('select[name=kms_edit_training_internal_res]').val($(this).data('intresource'));
          $('.selectpicker_live_users').selectpicker('refresh')
          $("#Modal_edit_training_content").modal("show");
            return true;
        });

        
        //Modal_add_content_assess
        $("a[class='Modal_add_training_assess']").click(function () {
          //In this we pass data to the modal from the <a> tag as data-id and set 
          $(".modal-body #Kms_input_hidden_etraining_id").val($(this).data('trainingid'));
          $(".modal-body #Kms_input_hidden_etraining_contid").val($(this).data('desid'));
          $("#Modal_add_training_assess").modal("show");
            return true;
        });


         //Modal_add_video_content
         $("a[class='Modal_file_training_content']").click(function () {
          //In this we pass data to the modal from the <a> tag as data-id and set 
          var File_location = $(this).data("file");
          var if_file    = document.getElementById("iframe_files");
          if_file.src = "<?php echo base_url("/ViewerJS/#../uploads/documents/");?>"+File_location;
          //Div_LoadFile.innerHTML = " src="+File_location ;
          $("#Modal_file_training_content").modal("show");

            return true;
        });

        $('#Modal_file_training_content').on('hidden.bs.modal', function () {
          var if_file    = document.getElementById("iframe_files");
          if_file.src = "";
        });

        //This will load the video modal
        $("a[class='Modal_video_training_content']").click(function () {
          var Vide_location = $(this).data("video");
        var vdo = document.getElementById("video1");
        //Div_LoadVideo.innerHTML = "L ->"+Vide_location ;
        vdo.src = "<?php echo base_url();?>/"+Vide_location;
        vdo.type = "video/webm";
        $("#Modal_video_training_content2").modal("show");
            return true;
        });
        $('#Modal_video_training_content2').on('hidden.bs.modal', function () {
        $('#video1')[0].pause();
        });

        
    });


  document.addEventListener('contextmenu', event => event.preventDefault());
    $(function () {
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
     //Date picker
     $('#datepicker').datepicker({
      autoclose: true
    }) 
  })


$(document).ready(function(){
  
    $('.selectpicker_live_users').selectpicker();
    $('#datatable_trainingContent_list').DataTable(
     // {"columns":[ {"width":"65%"},{"width":"20%"},null]}
    );
    var x = document.getElementById("AnswerOptions_div");
    x.style.display = "none";
   



//AnswerOptions_div
} ); 
//Assessment question addition modal
$('#kms_edit_etraining_qtn_type').on('change',function(){
  //Incase the question has hanot been set first
  if(document.kms_form_edit_content_assess.kms_edit_etraining_question.value == "")
    {
      alert("Please state your question first");
      $('select[name=kms_edit_etraining_qtn_type]').val(0);
      document.getElementById('kms_edit_etraining_question').focus();
      document.getElementById('kms_edit_etraining_question').style.borderColor="red"; 
    }
  else if(document.kms_form_edit_content_assess.kms_edit_etraining_question.value != "")
    {
      document.getElementById('kms_edit_etraining_question').style.borderColor=""; 
      var Ans_type = $("#kms_edit_etraining_qtn_type option:selected").val();
      if(Ans_type != 0 && Ans_type == 1)
      {  var Input_text = "<textarea class=\"form-control\" rows=\"2\" placeholder=\"Please type your answer here ...\" ></textarea>";
         QtnDiv_question.innerHTML = "<font color=grey>"+Input_text+"</font>";
      }else if(Ans_type != 0 && Ans_type == 2)
      {  QtnDiv_question.innerHTML ="";
         var Input_select = "";
         var Answer_option1 = "Answer Option 1";
         var Answer_option2 = "Answer Option 2";
         var Answer_option3 = "Answer Option 3";
         var Answer_option4 = "Answer Option 4";
         QtnDiv_question.innerHTML = "<div class=\"form-inline\" ><div class=\"checkbox\">  <label ><input type=\"checkbox\" name=\"remember\">&nbsp; <font id= \"Answer_option1\" color=grey>"+Answer_option1+"</font></label>  </div>&nbsp;&nbsp;&nbsp;&nbsp;<div class=\"checkbox\"><label><input type=\"checkbox\" name=\"remember\"> &nbsp;<font id= \"Answer_option2\" color=grey>"+Answer_option2+"</font></label></div>&nbsp;&nbsp;&nbsp;&nbsp;<div class=\"checkbox\"><label>&nbsp;<input type=\"checkbox\" name=\"remember\"><font id= \"Answer_option3\" color=grey>"+Answer_option3+"</font></label></div>&nbsp;&nbsp;&nbsp;&nbsp;<div class=\"checkbox\"><label>&nbsp;<input type=\"checkbox\" name=\"remember\"><font id= \"Answer_option4\" color=grey>"+Answer_option4+"</font></label></div></div>";
         var x = document.getElementById("AnswerOptions_div");
         x.style.display = "block";
        }
      else if(Ans_type != 0 && Ans_type == 3)
      {  QtnDiv_question.innerHTML ="";
         var Input_select = "";
         var Answer_option1 = "Answer Option 1";
         var Answer_option2 = "Answer Option 2";
         var Answer_option3 = "Answer Option 3";
         var Answer_option4 = "Answer Option 4";
         QtnDiv_question.innerHTML = "<div class=\"form-inline\" ><div class=\"checkbox\">  <label >&nbsp;<input type=\"radio\" name=\"remember\"> <font id= \"Answer_option1\" color=grey>"+Answer_option1+"</font></label>  </div>&nbsp;&nbsp;&nbsp;&nbsp;<div class=\"checkbox\"><label>&nbsp;<input type=\"radio\" name=\"remember\"> <font id= \"Answer_option2\" color=grey>"+Answer_option2+"</font></label></div>&nbsp;&nbsp;&nbsp;&nbsp;<div class=\"checkbox\"><label>&nbsp;<input type=\"radio\" name=\"remember\"> <font id= \"Answer_option3\" color=grey>"+Answer_option3+"</font></label></div>&nbsp;&nbsp;&nbsp;&nbsp;<div class=\"checkbox\"><label>&nbsp;<input type=\"radio\" name=\"remember\">&nbsp;<font id= \"Answer_option4\" color=grey>"+Answer_option4+"</font></label></div></div>";
         var x = document.getElementById("AnswerOptions_div");
         x.style.display = "block";
        }
      else if(Ans_type != 0 && Ans_type == 4)
      {   
         QtnDiv_question.innerHTML ="";
         var Input_select = "";
         QtnDiv_question.innerHTML = " <div class=\"custom-file\"> <input type=\"file\" class=\"custom-file-input\" id=\"validatedCustomFile\" required><label class=\"custom-file-label\" for=\"validatedCustomFile\">Choose file...</label></div>";
         var x = document.getElementById("AnswerOptions_div");
         x.style.display = "none";
        }
      else if(Ans_type == 0)
      {QtnDiv_question.innerHTML ="";}
    }
});


</script>

</body>
</html>
