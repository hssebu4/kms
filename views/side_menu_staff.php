
<!--<a href="" class="btn btn-primary btn-block margin-bottommb-4" data-toggle="modal" data-target="#modal-add-chat-forum"style="background-color:#2e3192;color:white;">Compose</a>
 <br />-->
 <div class="box box-solid">
  <div class="box-header with-border">
    <h3 class="box-title"> Department Wise </h3>

    <div class="box-tools">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-arrow-down"></i>
      </button>
    </div>
  </div>
  <div class="box-body no-padding">
    <ul class="nav nav-pills nav-stacked">
        
        <li <?php if($Selected_dept == 1){ $link="active";}else{$link="";} echo "class=".$link."";?> ><a href="<?php echo base_url().$this->session->userdata('side_menu_dept2'); 
        if(($this->session->userdata('side_menu_dept2') == "Forum") ){echo "/Staff/";}
       // else if( ($this->session->userdata('side_menu_dept3') == "Staff")){echo "/Staff/";}
       // else if(isset($this->session->userdata('kms_emp_department'))){echo "/".$this->session->userdata('kms_emp_department')."/";}
        else{echo "/Admin_file_directory_dep/";}?>1"><i class="fa fa-university"></i> <?php echo $Menu_item_00_01_00; 
        if(isset($GN) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$GN."</span>"; }else{}
        ?><?php if($Selected_dept == 1){ $link="fa fa-check";}else{$link="";} echo "<i class=\"".$link." pull-right\" aria-hidden=\"true\"></i>";?></a></li>

        <li <?php if($Selected_dept == 2){ $link="active";}else{$link="";} echo "class=".$link."";?>><a href="<?php echo base_url().$this->session->userdata('side_menu_dept2'); 
        if($this->session->userdata('side_menu_dept2') == "Forum"){echo "/Staff/";}
       // else if(isset($this->session->userdata('kms_emp_department'))){echo "/".$this->session->userdata('kms_emp_department')."/";}
        else{echo "/Admin_file_directory_dep/";}?>2"><i class="fa fa-users"></i> <?php echo $Menu_item_00_01_01; 
        if(isset($GN) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$GN."</span>"; }else{}
        ?><?php if($Selected_dept == 2){ $link="fa fa-check";}else{$link="";} echo "<i class=\"".$link." pull-right\" aria-hidden=\"true\"></i>";?></a></li>

        <li <?php if($Selected_dept == 5){ $link="active";}else{$link="";} echo "class=".$link."";?>><a href="<?php echo base_url().$this->session->userdata('side_menu_dept2'); 
         if($this->session->userdata('side_menu_dept2') == "Forum"){echo "/Staff/";}
        else{echo "/Admin_file_directory_dep/";}?>5"><i class="fa fa-industry"></i> <?php  echo $Menu_item_00_01_06; 
        if(isset($SC) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$SC."</span>"; }else{}
        ?><?php if($Selected_dept == 5){ $link="fa fa-check";}else{$link="";} echo "<i class=\"".$link." pull-right\" aria-hidden=\"true\"></i>";?></a></li>

        <li <?php if($Selected_dept == 4){ $link="active";}else{$link="";} echo "class=".$link."";?>><a href="<?php echo base_url().$this->session->userdata('side_menu_dept2');
        if($this->session->userdata('side_menu_dept2') == "Forum"){echo "/Staff/";}
         else{echo "/Admin_file_directory_dep/";}?>4"><i class="fa  fa-shopping-cart"></i> <?php echo $Menu_item_00_01_02; 
        if(isset($AD) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$AD."</span>"; }else{}
        ?><?php if($Selected_dept == 4){ $link="fa fa-check";}else{$link="";} echo "<i class=\"".$link." pull-right\" aria-hidden=\"true\"></i>";?></a></li>

        <li <?php if($Selected_dept == 8){ $link="active";}else{$link="";} echo "class=".$link."";?>><a href="<?php echo base_url().$this->session->userdata('side_menu_dept2'); 
         if($this->session->userdata('side_menu_dept2') == "Forum"){echo "/Staff/";}
        else{echo "/Admin_file_directory_dep/";}?>8"><i class="fa fa-wrench"></i><?php echo $Menu_item_00_01_03; 
        if(isset($CM) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$CM."</span>"; }else{}
        ?><?php if($Selected_dept == 8){ $link="fa fa-check";}else{$link="";} echo "<i class=\"".$link." pull-right\" aria-hidden=\"true\"></i>";?></a></li>
       
        <li <?php if($Selected_dept == 3){ $link="active";}else{$link="";} echo "class=".$link."";?>><a href="<?php echo base_url().$this->session->userdata('side_menu_dept2');
          if($this->session->userdata('side_menu_dept2') == "Forum"){echo "/Staff/";}
         else{echo "/Admin_file_directory_dep/";}?>3"><i class="fa fa-usd"></i><?php echo $Menu_item_00_01_04; 
         if(isset($FC) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$FC."</span>"; }else{}
        ?><?php if($Selected_dept == 3){ $link="fa fa-check";}else{$link="";} echo "<i class=\"".$link." pull-right\" aria-hidden=\"true\"></i>";?></a></li>

        <li <?php if($Selected_dept == 9){ $link="active";}else{$link="";} echo "class=".$link."";?>><a href="<?php echo base_url().$this->session->userdata('side_menu_dept2'); 
       if($this->session->userdata('side_menu_dept2') == "Forum"){echo "/Staff/";}
        else{echo "/Admin_file_directory_dep/";}?>9"><i class="fa  fa-desktop"></i><?php echo $Menu_item_00_01_09; 
         if(isset($IT) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$IT."</span>"; }else{}
        ?><?php if($Selected_dept == 9){ $link="fa fa-check";}else{$link="";} echo "<i class=\"".$link." pull-right\" aria-hidden=\"true\"></i>";?></a></li>

        <li <?php if($Selected_dept == 6){ $link="active";}else{$link="";} echo "class=".$link."";?>><a href="<?php echo base_url().$this->session->userdata('side_menu_dept2'); 
        if($this->session->userdata('side_menu_dept2') == "Forum"){echo "/Staff/";}
        else{echo "/Admin_file_directory_dep/";}?>6"><i class="fa fa-ship"></i><?php echo $Menu_item_00_01_07; 
         if(isset($MT) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$MT."</span>";$a = 1; }else{}
        ?><?php if($Selected_dept == 6){ $link="fa fa-check";}else{$link="";} echo "<i class=\"".$link." pull-right\" aria-hidden=\"true\"></i>";?></a></li>
        
        <li <?php if($Selected_dept == 7){ $link="active";}else{$link="";} echo "class=".$link."";?>><a href="<?php echo base_url().$this->session->userdata('side_menu_dept2'); 
         if($this->session->userdata('side_menu_dept2') == "Forum"){echo "/Staff/";}
        else{echo "/Admin_file_directory_dep/";}?>7">
        <i class="fa  fa-gears"></i><?php echo $Menu_item_00_01_05; 
         if(isset($PD) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$PD."</span>"; }else{}
        ?><?php if($Selected_dept == 7){ $link="fa fa-check";}else{$link="";} echo "<i class=\"".$link." pull-right\" aria-hidden=\"true\"></i>";?></a></li>
  </div>
  <!-- /.box-body <i class="fa fa-check" aria-hidden="true"></i>-->
</div>
<!-- /. box -->

