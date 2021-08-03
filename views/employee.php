<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $Home_tab_title ?></title>
  <meta name="google" content="notranslate">
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
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>ext/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- customized kms css -->
  <link rel="stylesheet" href="<?php echo base_url();?>ext/dist/css/kms.css">
  <!-- Google Font   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->

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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url();?>uploads/img/<?php $session_emp_id = $this->session->userdata('kms_emp_id'); echo $session_emp_id.".png"; ?>" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url();?>ext/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url();?>ext/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url();?>ext/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url();?>ext/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
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
                <a href="<?php echo base_url();?>Forum/Profile" class="btn btn-default btn-flat">Profile</a>
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
        <li class=" treeview">
          <a href="Administration">
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

        <li class="treeview active">
          <a href="#">
            <i class="fa fa-users"></i>
            <span><?php echo $Menu_item_01 ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu active">
           
            <li ><a href="Employee"><i class="fa fa-users"></i>&nbsp;<?php echo $Menu_item_01_02 ?></a></li><!--News option-->
           
          </ul>
          
        </li>


        <li class="treeview">
          <a href="#">
          <i class="fa fa-graduation-cap"></i>
            <span><?php echo $Menu_item_02 ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
        </li>

        <li class="treeview">
          <a href="#">
          <i class="fa fa-sign-in"></i>
            <span><?php echo $Menu_item_03 ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
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
        <small>Employees</small>
      </h1>
     
      
    
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-bars"></i> Home</a></li>
        <li><a href="#">Employee</a></li>
        <li class="active">List</li>
      </ol>
    </section>



    <!-- Main content --><!---->
    <section class="content"> 
            
    <div class="row">
        <div class="col-md-10">


    <!-- section for the notices upon the data model funcionality -->
    <?php 
          $Notice_data = $this->session->flashdata('notice'); 

          //$Notice_data['Emp_save_message'];

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
    
    ?>
        




          <!-- Employee list area -->
              <div class="box box-primary">
                  <div class="box-header with-border">
               
                         <div class="pull-left">
                             <a class="btn btn-app-sm" data-toggle="modal" data-target=".bd-example-modal-add-employee">  <i class="fa fa-user-plus"></i> Add employee </a>
                         </div>
                                <div class="box-tools pull-right">
                                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                  </button>
                                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                  </div>

                   <div class="box-body">
                  
                <?php 
            print("<table id=\"example1\" class=\"table table-bordered table-striped\">
                <thead>
                  <tr>
                      <th>Emp ID</th>
                      <th>Employee</th>
                      <th>Dept > Designations</th>
                      
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody>");


                //This returns the values fetched from the database as below    fa-pencil-square-o
                foreach ($Fetch_employee_results as $row)
                {
                echo " <tr><td>".$row['emp_data_id']."</td>";
                echo "<td>".$row['emp_data_sname'].' '.$row['emp_data_fname']."</td>";
                echo "<td></td>";
                echo "<td ><a href=\"ViewEmployee\\".$row['emp_data_id']."\"><i style=\"color:#337ab7;\" class=\"fa fa-list-alt\"></i></a></td>";
                echo "</tr>";
                }
               
                 
                print("</tbody>
                <tfoot>
                  <tr>
                    <th>Emp ID</th>
                    <th>Employee</th>
                    <th>Dept > Designations</th>
                  
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>");
                     ?>      
                     
                    </div>
                <!-- /.box-body -->
             
              </div>
           
      </div>
     
      
      </div>



    </section>
    <!-- /.content -->
      <!--................................................................-->
      <!-- Small modal for editing employee details as below -->
     
      <div class="modal fade bd-example-modal-md-edit-employee" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New message</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


                          <form>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Recipient:</label>
                          <input type="hidden"  class="form-control" id="recipient-name">
                        </div>
                        
                      </form>



        </div>
          </div>
        </div>
      </div>
  <!--................................................................-->
<!-- medium modal for registering a new employee-->

<div class="modal fade bd-example-modal-add-employee" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content"> 
    <form autocomplete="off" action="AddEmployee" method="POST" enctype="multipart/form-data"  name="admin_add_employee_form" onsubmit="return validateform_add_employee()">
              <div class="box-body">

                <div class="form-group">
                
                    <div class="col-sm-6">
                      <label for="Admin_input_emp_fname">First Name:</label>
                      <input title="Employee First Name"   type="text" class="form-control" name="Admin_input_emp_fname" id="Admin_input_emp_fname" placeholder="Enter employee's first name">
                    </div>

                    
                    <div class="col-sm-6">
                      <label for="Admin_input_emp_sname">Surname:</label>
                      <input   type="text" class="form-control" name="Admin_input_emp_sname" id="Admin_input_emp_sname" placeholder="Enter employee's surname">
                    </div>

                 </div>

                  
                 <div class="form-group">
                
                    <div class="col-sm-6">
                      <label for="Admin_input_emp_presidence">Place of Residence:</label>
                      <input   type="text" class="form-control" name="Admin_input_emp_presidence" id="Admin_input_emp_presidence" placeholder="Residence">
                    </div>

                    
                    <div class="col-sm-6">
                      <label for="Admin_input_emp_dbirth">District of Birth:</label>
                      <input   type="text" class="form-control" name="Admin_input_emp_dbirth" id="Admin_input_emp_dbirth" placeholder="Place of birth">
                    </div>
                
                </div>


                <div class="form-group">
                   <div class="col-sm-6">
                      <label for="Admin_input_emp_gender">Gender:</label>
                      <select   class="form-control select2"  name="Admin_input_emp_gender" id="Admin_input_emp_gender" style="width: 100%;">
                      <option value= "0" >select gender</option>
                      <option value="M">Male</option>
                      <option value="F">Female</option>
                      </select>
                    </div>

                    <div class="col-sm-6">
                     <label for="Admin_input_emp_btn">&nbsp;</label>
                    </div>

                    <div class="col-sm-6 pull-left">
                     <label for="Btn_save_employee">&nbsp;</label>
                     <button type="submit" class="btn btn-success pull-right" name="Btn_save_employee">Save</button>
                    </div>
                </div>

              </div>

            </form>
    </div>
  </div>
</div>
  <!--................................................................-->
  </div>
  <!-- /.content-wrapper -->
 


</div>
<!-- ./wrapper -->



<!-- jQuery 3 -->
<script src="<?php echo base_url();?>ext/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>ext/bower_components/jquery-ui/jquery-ui.min.js"></script>
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

  $(function () {
      $('#example1').DataTable();
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    });

    $.widget.bridge('uibutton', $.ui.button);
    $(document).ready(function() {
    $('#Notice_success').fadeOut(5000); // 5 seconds x 1000 milisec = 5000 milisec
    });
    
    

  
</script>
</body>