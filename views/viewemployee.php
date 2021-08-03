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
  <!-- Google Font 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
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
                        <img src="<?php echo base_url();?>ext/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
              <img src="<?php echo base_url();?>ext/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url();?>ext/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

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
          <img src="<?php echo base_url();?>ext/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
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
            <li><a href="Admininstration_email"><i class="fa fa-envelope-o"></i><?php echo $Menu_item_00_01 ?></a></li><!--Email option-->
         
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
           
            <li ><a href="<?php echo base_url();?>Administration/Employee"><i class="fa fa-users"></i>&nbsp;<?php echo $Menu_item_01_02 ?></a></li><!--News option-->
           
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
        <li class="active">View</li>
      </ol>
    </section>



    <!-- Main content --><!---->
    <section class="content"> 
    
        <div class="col-md-12">

            <div class="nav-tabs-custom">
                  <!-- Tabs within a box -->
                  <ul class="nav nav-tabs pull-left">
                    <li class="active"><a href="#tab_emp_basic_info" data-toggle="tab">Basic Information</a></li>
                    <li><a href="#tab_emp_qualifications" data-toggle="tab">Qualifications</a></li>
                    <li><a href="#tab_emp_family" data-toggle="tab">Family</a></li>
                  
                  </ul>

                  <div class="tab-content">
                      <!--This tap for displaying the employee details for viewing -->
                      <div class="chart tab-pane active" id="tab_emp_basic_info" style="position: relative;height: auto;">
                      <div class="col-sm-9">
                                    <form class="form" action="##" method="post" id="registrationForm">
                                            <div class="form-group">
                                                
                                                <div class="col-xs-6">
                                                    <label for="first_name"><h5>First name:</h5></label>
                                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter employee's first name if any.">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                
                                                <div class="col-xs-6">
                                                  <label for="sur_name"><h5>Surname:</h5></label>
                                                    <input type="text" class="form-control" name="sur_name" id="sur_name" placeholder=" surname" title="enter employee's surname if any.">
                                                </div>
                                            </div>
                                
                                            <div class="form-group">
                                                
                                                <div class="col-xs-6">
                                                    <label for="phone"><h5>Phone:</h5></label>
                                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                                                </div>
                                            </div>
                                
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                  <label for="mobile"><h5>Mobile:</h5></label>
                                                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                
                                                <div class="col-xs-6">
                                                    <label for="email"><h5>Email:</h5></label>
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
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
                                                      <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                                      <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>&nbsp;
                                                  </div>
                                            </div>
                                          <div class="form-group">
                                                <div class="col-xs-12">
                                                      <br>
                                                  </div>
                                            </div>
                                            
                                          
                                      </form>
                                  </div>
                                  <div class="col-sm-3">
              
                                     <div class="text-center">
                                      <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-rounded img-thumbnail" alt="avatar" style="width:50%;height:80%;">
                                      <h6>Upload a different photo...</h6>
                                      <input type="file" class="text-center center-block file-upload">
                                    </div>              
              
                                   </div>
              
            
                      
                      </div>
                      <!---......................................................................................-->

                      <!--This tap for displaying the employee qualifications for viewing -->
                      <div class="chart tab-pane" id="tab_emp_qualifications" style="position: relative; height: auto;"></div>
                       <!---......................................................................................-->

                         <!--This tap for displaying the employeefamliy for viewing -->
                      <div class="chart tab-pane" id="tab_emp_family" style="position: relative; height: auto;"></div>
                      <!---......................................................................................-->
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
    
    $(document).ready(function() {

    
var readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.avatar').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


$(".file-upload").on('change', function(){
    readURL(this);
});
});

  
</script>
</body>