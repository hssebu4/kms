<?php 
file_exists(APPPATH.'views/session_manager.php')
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $Home_tab_title ?></title>
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
<!-- Google Font <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->

<link rel="stylesheet" href="<?php echo base_url();?>ext/bower_components/bootstrap/dist/css/bootstrap-select.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >



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

      



       
        
        <li class="active treeview">
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
            <li class="active" ><a href="<?php echo base_url();?>Forum/File_Hub"><i class="fa fa-align-justify"></i><?php echo $Menu_item_04_03 ?></a></li><!--News option-->
            <li ><a href="<?php echo base_url();?>Forum/pdp"><i class="fa fa-id-card" aria-hidden="true"></i><?php echo $Menu_item_04_04 ?></a></li><!--DPD Option-->
            <li><a href="<?php echo base_url();?>Forum/Planning"><i class="fa fa-line-chart" aria-hidden="true"></i><?php echo $Menu_item_04_05 ?></a></li><!--DPD Option-->
          
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
    <br><br>
   
     



    <!-- Main content --><!---->
    <section class="content"> 
            



   

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
         <!-- <a href="<?php echo base_url();?>Administration/Compose_Post" class="btn btn-block" style="background-color:#2e3192;color:white;">Compose</a>
          <br >-->
          
          <?php
              
              $this->load->view('side_menu_forum');
        ?>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
                  

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Project Files under <?php 
                  
              if(isset($Selected_project))
              {
                foreach ($Selected_project as $k) 
                        {
                          echo "<i style=\"font-weight:bold;\">".$k['kms_project_detail']."</i>
                               ";
                              //$Selected_Project_id =  $k['kms_project_id'];
                        }
                 
                echo "</h3>

                <div class=\"box-tools pull-right\">
                  <div class=\"has-feedback\">";        
          
                        }
                        else
                        {
                          echo " <div class=\"box-tools pull-right\">
                          <div class=\"has-feedback\">";
                        }

                   ?>
              


                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body padding">
              
            <?php 
            
            print("<table id=\"example1\" class=\"table table-bordered  table-hover \">
                    <thead>
                    <tr><th>Sharing text</th>
                        <th>File Name</th>
                        <th>Shared by</th>
                        
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>");
           

/**This is the beginning of the data values from the controller */

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
                  //$string = substr($string,0,10).'...';
                
                echo " <tr>
                <td>".$row['kms_upload_share_message']."</td>
                <td style=\"color:#337ab7;\"><i class=\"".$Fa_icon."\" aria-hidden=\"true\">  &nbsp;</i>  ".$row['kms_upload_details']."</td>";
                echo "<td> ".$row['emp_data_sname']."</td>";
            //    echo "<td>".$row['kms_upload_share_date']." | ".$row['kms_upload_share_time']."</td>";
               
              


                
                $z=str_replace(' ','-',$row['kms_upload_details']);
                  /*.base_url("/uploads/documents/".$z.""). */
                echo "<td >
                          <form name=\"form_emp_id\" id=\"form_emp_id\">
                          <input type=\"hidden\" name=\"passed_upload_id\" id=\"passed_upload_id\" value=".$row['kms_upload_id']." >
                          </form>
                          <a href=".base_url("/ViewerJS/#../uploads/documents/".$z."")." target=\"_blank\">
                          <img src=".base_url("ext/dist/img/view.png")." /></a> &nbsp;&nbsp; 
                         &nbsp; &nbsp;
                          </td>";
                echo "</tr>";//<a href=\"\" style=\"color:red;\"><i class=\"fa fa-trash\"></i></a> <a class=\"Upload_save_modal\" style=\"color:green;\" data-id=".$row['kms_upload_id']."><i class=\"fa fa-share-square-o\"></i></a>
                }
               
          }else{}


/**The end of the data value from the controller */

 

        print("</tbody>
            <tfoot>
              <tr>
                <th>Sharing text</th>
                <th>File Name</th>
                <th>Shared by</th>
                
                <th>Action</th>
              </tr>
            </tfoot>
          </table>"); 
            
            ?>




            </div>
           
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
 




  






    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  

</div>
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
  
    });


   
          
</script>
</body>