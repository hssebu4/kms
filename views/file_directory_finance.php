<?php 

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
              <span class="hidden-xs"><?php $session_name = $this->session->userdata('kms_emp_data_secondname'); echo $session_name; ?></span> 
              
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
                  <a href="/Login/login_funcn" class="btn btn-default btn-flat">Sign out</a>
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
          <a href="/Technology">
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
            <li><a href="<?php echo base_url().'kms/'.$this->session->userdata('kms_emp_department').'/4541';?>"><i class="fa fa-envelope-o"></i><?php echo $Menu_item_00_01 ?></a></li><!--Email option-->
       
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
            <li><a href="<?php echo base_url().'kms/File_directory';?>"><i class="fa fa-file"></i><?php echo $Menu_item_04_01 ?></a></li><!--Email option-->
            <li ><a href="<?php echo base_url().'kms/Dept_Directory';?> "><i class="fa fa-inbox"></i><?php echo $Menu_item_04_02 ?></a></li><!--News option-->
            <li ><a href="<?php echo base_url().'kms/'.$this->session->userdata('kms_emp_department').'/4544';?> "><i class="fa fa-align-justify"></i><?php echo $Menu_item_04_03 ?></a></li><!--News option-->
         
          </ul> 
        </li>
       
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
              $this->session->set_userdata('side_menu_dept2',"kms");
              $this->load->view('side_menu_files');
        ?>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">File directory - department wise</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                



                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body padding">
              
                       
            <table id="datatable_file_directory" class="table table-bordered table-hover ">
                        <thead>
                        <tr>
                            <th>Message</th>
                            <th>Detail</th>
                            <th>Size</th>
                            <th>Added</th>
                           
                            <th>Shared by</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                   <?php 
                   
                   
         
         
                   foreach ($dataset as $row)
                   {
                    
                    if($row['Format'] == 0)
                                {
                                  $Fa_icon = "fa fa-file-o";
                                }
                                else if($row['Format'] == 1 || $row['Format'] == 2 || $row['Format'] == 3)
                                {
                                  $Fa_icon = "fa fa-file-image-o";
                                }
                                else if($row['Format'] == 4)
                                {
                                  $Fa_icon = "fa fa-file-pdf-o";
                                }
                                else if($row['Format'] == 5 || $row['Format'] == 6 || $row['Format'] == 7)
                                {
                                  $Fa_icon = "fa fa-file-text-o"; 
                                }
                                else if($row['Format'] == 8 )
                                {
                                  $Fa_icon = "fa fa-file-powerpoint-o";
                                }
                                else if($row['Format'] == 10 || $row['Format'] == 11)
                                {
                                  $Fa_icon = "fa fa-file-excel-o";
                                }
                                else{$Fa_icon = " ";}//



                                $z=str_replace(' ','-',$row['Description']);





                       echo '<tr><td style="color:grey;">'.$row['File message'].'</td>
                                 <td style="color:darkblue;"><i class="'.$Fa_icon.'" aria-hidden="true">  &nbsp;</i>'.$row['Description'].'</td>
                                 <td>'.$row['File size'].'</td>
                                 <td>'.$row['Date shared'].'</td>
                                
                                 <td>'.$row['Name'].'</td>
                                 <td><a href="'.base_url("/uploads/documents/".$z."").'">
                                 <i class="fa fa-download" aria-hidden="true"></i></a>
                                 </td>
                                 
                       </tr>';
                   }
                   
                   ?>     
                   </tbody>
                    <tfoot>
                      <tr>
                      <th>Message</th>
                            <th>Detail</th>
                            <th>Size</th>
                            <th>Added</th>
                           
                            <th>Shared by</th>
                            <th>Action</th>
                      </tr>
                    </tfoot>
        </table>




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
<!-- ./wrapper -->


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
$(document).ready(function() {
    $('#datatable_file_directory').DataTable();
} );
   
</script>
</body>