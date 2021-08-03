<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $Home_tab_title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url();?>ext/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>ext/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>ext/dist/css/skins/_all-skins.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>ext/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- customized kms css -->
  <link rel="stylesheet" href="<?php echo base_url();?>ext/dist/css/kms.css">
  <!-- Google Font 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >-->
  <link rel="stylesheet" href="<?php echo base_url();?>ext/bower_components/bootstrap/dist/css/bootstrap-select.css" />
 
  
  
  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
   
  </style></head>



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
          <li class="dropdown messages-menu">
           
            <ul class="dropdown-menu">
             
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url();?>uploads/img/<?php $session_emp_id = $this->session->userdata('kms_emp_id'); echo $session_emp_id.".png"; ?>" class="img-circle" alt="User Image">
                      </div>
                     
                   
                    </a>
                  </li>
                 
                 
                  
                 
                </ul>
              </li>
         
            </ul>
          </li>
         
          <!-- Tasks: style can be found in dropdown.less -->
          
            
          </li>
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
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="/" class="btn btn-default btn-flat">Sign out</a>
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
    <br><br>
   
     


    <section class="content-header">
      <h5>
        KMS 
        <small>Storage</small> 
      </h5>
      <?php 
            $Notice_data = $this->session->flashdata('notice'); 

           if(isset($Notice_data['kms_doc_upload_success']) && $Notice_data['kms_doc_upload_success'] == 1)
           {
            echo "<div id=\"Notice_success\" name=\"Notice_success\" class=\"notice_success\">
                  <p><strong>Success!</strong> ".$Notice_data['kms_doc_upload_message']."</p>
                  </div>";
                  
           }
           else if($Notice_data['kms_doc_upload_success']  == 0 && $Notice_data['kms_doc_upload_message'] != null)
           {
          
            echo "<div id=\"Notice_error\" name=\"Notice_error\" class=\"notice_error\">
                  <p><strong>Error!</strong> ".$Notice_data['kms_doc_upload_message']."</p>
                  </div>";
           }
           else{}
            $this->session->unset_userdata('notice');
    ?>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>Administration/"><i class="fa fa-bars"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>Administration/">Documents</a></li>
        <li class="active">My Files</li>
      </ol>
    </section>
    <!-- Main content --><!---->
    <section class="content"> 
            
    
   

    <!-- Main content -->
 
    
      <div class="row">
       
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
            <div class="pull-left"><h3 class="box-title">Personal Files</h3></div>
            <div class="pull-right">

            <form action="<?php echo base_url();?>Administration/Personal_file_upload" method="POST" enctype="multipart/form-data">
            <div class="pull-left"><input type="file" name="kms_admin_uploadfile" id="kms_admin_uploadfile" /></div>
            <div class="pull-right"><button class="btn btn-primary btn-sm" type="submit">Upload <i class="fa fa-upload" aria-hidden="true"></i></button></div>
            </form>
            </div> 

              
            </div>
            <div class="box-body">
            <?php 
                    print("<table id=\"example1\" class=\"table table-bordered  table-hover \">
                        <thead>
                        <tr>
                            <th>File Name</th>
                            <th>File Size</th>
                            <th>Date added</th>
                            <th>Last modified</th>
                            <th>Sharing</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>");
                        if(isset($Kms_userupload_results)){ 

                              foreach ($Kms_userupload_results as $row)
                              {
                                if($row['kms_upload_format'] == 0)
                                {
                                  $Fa_icon = "fa fa-file-o";
                                }
                                else if($row['kms_upload_format'] == 1 || $row['kms_upload_format'] == 2 || $row['kms_upload_format'] == 3)
                                {
                                  $Fa_icon = "fa fa-file-image-o";
                                }
                                else if($row['kms_upload_format'] == 4)
                                {
                                  $Fa_icon = "fa fa-file-pdf-o";
                                }//<i class="far fa-file-powerpoint"></i>
                                else if($row['kms_upload_format'] == 5 || $row['kms_upload_format'] == 6 || $row['kms_upload_format'] == 7)
                                {
                                  $Fa_icon = "fa fa-file-text-o";
                                }
                                else if($row['kms_upload_format'] == 8 )
                                {
                                  $Fa_icon = "fa fa-file-powerpoint-o";
                                }
                                else if($row['kms_upload_format'] == 10 || $row['kms_upload_format'] == 11)
                                {
                                  $Fa_icon = "fa fa-file-excel-o";
                                }
                                else{$Fa_icon = " ";}//
                             
                             
                              echo " <tr><td style=\"color:#337ab7;\"><i class=\"".$Fa_icon."\" aria-hidden=\"true\">  &nbsp;</i>  ".$row['kms_upload_details']."</td>";
                              echo "<td> ".$row['kms_upload_size']."</td>";
                              echo "<td>".$row['kms_upload_date']."</td>";
                              echo "<td>".$row['kms_upload_date']."</td>";
                              echo "<td>NOT</td>";//kms_upload_location 


                               
                               $z=str_replace(' ','-',$row['kms_upload_details']);
                         
                              echo "<td >
                              <form name=\"form_emp_id\" id=\"form_emp_id\">
                              <input type=\"hidden\" name=\"passed_upload_id\" id=\"passed_upload_id\" value=".$row['kms_upload_id']." >
                              </form>
                              <a href=".base_url("/uploads/documents/".$z."").">
                              <i class=\"fa fa-download\" aria-hidden=\"true\"></i></a> &nbsp;&nbsp; 
                              <a class=\"Upload_save_modal\" style=\"color:green;\" data-id=".$row['kms_upload_id']."><i class=\"fa fa-share-square-o\"></i></a>&nbsp; &nbsp;
                              <a href=\"\" style=\"color:red;\"><i class=\"fa fa-trash\"></i></a></td>";
                              echo "</tr>";
                              }
                       
                      }



                    print("</tbody>
                        <tfoot>
                          <tr>
                            <th>File Name</th>
                            <th>File Size</th>
                            <th>Date added</th>
                            <th>Last modified</th>
                            <th>Sharing</th>
                            <th>Action</th>
                          </tr>
                        </tfoot>
                      </table>"); 
                ?>

            </div>
         
            </div>
       
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
   
    <!-- /.content -->
 




    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
                <!--The model for saving the uploads Personal_file_share-->
                  <div id="Upload_modal_form" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="box-header with-border">

                        <h3 class="box-title pull-right" style="">KMS | File Sharing</h3>
                        </div>
                            <div class="modal-body">
                                



                                  <form action="<?php echo base_url();?>Administration/Personal_file_share" class="form-horizontal" autocomplete="off" method="POST" enctype="multipart/form-data" name="kms_form_share_file" onsubmit="return validateform_file_share_form()" >
                                      <div class="box-body">
                                      <div class="form-group">
                                      <label for="kms_input_fchat_forum" class="col-sm-3 control-label">Share with:</label>

                                      <div class="col-sm-9">

                                      <select class="selectpicker" data-size="10"  id="kms_input_fileshare_forum" name="kms_input_fileshare_forum" multiple data-live-search="false">
                                      
                                      <option value="1"><?php echo $Menu_item_00_01_00; ?></option>
                                      <option value="2"><?php echo $Menu_item_00_01_01; ?></option>
                                      <option value="4"><?php echo $Menu_item_00_01_02; ?></option>
                                      <option value="8"><?php echo $Menu_item_00_01_03; ?></option>
                                      <option value="3"><?php echo $Menu_item_00_01_04; ?></option>
                                      <option value="7"><?php echo $Menu_item_00_01_05; ?></option>
                                      <option value="5"><?php echo $Menu_item_00_01_06; ?></option>
                                      <option value="6"><?php echo $Menu_item_00_01_07; ?></option>
                                      <option value="9"><?php echo $Menu_item_00_01_09; ?></option>
                                      
                                      </select> 

                                      </div>
                                    </div>
                                        <div class="form-group">
                                          <label for="kms_input_fchat_topic" class="col-sm-3 control-label">CC Recipients:</label>

                                          <div class="col-sm-9">
                                         
                                          <select class="selectpicker_live_users" data-size="6" name="kms_input_file_recipient" id="kms_input_file_recipient" multiple data-live-search="true">
                                            <?php 
                                            $Emp_list = $this->session->userdata('kms_emp_list_names_only_session');
                                            if(isset($Emp_list) && $Emp_list != "")
                                            {
                                            foreach ($Emp_list as $row_emp)
                                            {
                                                echo "<option value=".$row_emp['emp_data_id'].">".$row_emp['emp_data_sname'].' '.strtoupper($row_emp['emp_data_fname'])."</option>";
                                            }
                                            }else
                                             {
                                                echo "<option value=\"\"> No data</option>";
                                             }
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

</div>

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


<script>
$(document).ready( function ()
 {
  $('#example1').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false});
    }); 
  $(function () {
     
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      });
    });

    $.widget.bridge('uibutton', $.ui.button);
    $(document).ready(function() {
    $('#Notice_success').fadeOut(5000); // 5 seconds x 1000 milisec = 5000 milisec
    $('#Notice_erroe').fadeOut(5000); // 5 seconds x 1000 milisec = 5000 milisec
    $('.selectpicker_live_users').selectpicker();
    });
    
    $(function () {
        $("a[class='Upload_save_modal']").click(function () {
          //In this we pass data to the modal from the <a> tag as data-id and set 
          var Upload_file_id = $(this).data('id');
          $(".modal-body #Kms_input_hidden_file_id").val(Upload_file_id);
          $("#Upload_modal_form").modal("show");

            return true;
        });
        //Initialize Select2 Elements
   $('.select2').select2()
    //Add text editor
    $("#compose-textarea").wysihtml5();
    });

    // To style only selects with the selectpicker_live_user for selecting the user from the database
    //$('.selectpicker_live_users').selectpicker();

    $(function () {
    $('select').selectpicker();
});
   
</script>
</body>