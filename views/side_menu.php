
<a href="" class="btn btn-primary btn-block margin-bottommb-4" data-toggle="modal" data-target="#modal-add-chat-forum"style="background-color:#2e3192;color:white;">Compose</a>
 <br />
<div class="box box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">Forums  <span class="fa fa-comments-o"></span></h3>

    <div class="box-tools">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>  
  <div class="box-body no-padding">
    <ul class="nav nav-pills nav-stacked">
  
        <li <?php if($Forum_id == 1){ $link="active";}else{$link="";} echo "class=".$link."";?>><a href="<?php if($this->session->userdata('kms_access_user_dept_id') == 9 || $this->session->userdata('kms_access_user_dept_id') == 5 || $this->session->userdata('kms_access_user_dept_id') == 7 || $this->session->userdata('kms_access_user_dept_id') == 6 || $this->session->userdata('kms_access_user_dept_id') == 4 || $this->session->userdata('kms_access_user_dept_id') == 8 || $this->session->userdata('kms_access_user_dept_id') == 2 || $this->session->userdata('kms_access_user_dept_id') == 3){echo base_url().'Forum/Chat/';}else {echo base_url().$this->session->userdata('side_menu_dept').'/Forum/';} ?>1"><i class="fa fa-university"></i> 
        <?php echo $Menu_item_00_01_01; 
        if(isset($GN) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$GN."</span>"; }else{}
        ?><?php if($Forum_id == 1){ $link="fa fa-check";}else{$link="";} echo "<i class=\"".$link." pull-right\" aria-hidden=\"true\"></i>";?></a></li>

        <li <?php if($Forum_id == 6){ $link="active";}else{$link="";} echo "class=".$link."";?>><a href="<?php if($this->session->userdata('kms_access_user_dept_id') == 9 || $this->session->userdata('kms_access_user_dept_id') == 5 || $this->session->userdata('kms_access_user_dept_id') == 7 || $this->session->userdata('kms_access_user_dept_id') == 6 || $this->session->userdata('kms_access_user_dept_id') == 4 || $this->session->userdata('kms_access_user_dept_id') == 8 || $this->session->userdata('kms_access_user_dept_id') == 2 || $this->session->userdata('kms_access_user_dept_id') == 3){echo base_url().'Forum/Chat/';}else {echo base_url().$this->session->userdata('side_menu_dept').'/Forum/';} ?>6"><i class="fa  fa-ship"></i> 
        <?php  echo $Menu_item_00_01_06; 
        if(isset($SC) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$SC."</span>"; }else{}
        ?><?php if($Forum_id == 6){ $link="fa fa-check";}else{$link="";} echo "<i class=\"".$link." pull-right\" aria-hidden=\"true\"></i>";?></a></li>

        <li <?php if($Forum_id == 2){ $link="active";}else{$link="";} echo "class=".$link."";?>><a href="<?php if($this->session->userdata('kms_access_user_dept_id') == 9 || $this->session->userdata('kms_access_user_dept_id') == 5 || $this->session->userdata('kms_access_user_dept_id') == 7 || $this->session->userdata('kms_access_user_dept_id') == 6 || $this->session->userdata('kms_access_user_dept_id') == 4 || $this->session->userdata('kms_access_user_dept_id') == 8 || $this->session->userdata('kms_access_user_dept_id') == 2 || $this->session->userdata('kms_access_user_dept_id') == 3){echo base_url().'Forum/Chat/';}else {echo base_url().$this->session->userdata('side_menu_dept').'/Forum/';} ?>2"><i class="fa  fa-users"></i> <?php echo $Menu_item_00_01_02; 
        if(isset($AD) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$AD."</span>"; }else{}
        ?><?php if($Forum_id == 2){ $link="fa fa-check";}else{$link="";} echo "<i class=\"".$link." pull-right\" aria-hidden=\"true\"></i>";?></a></li>

        <li <?php if($Forum_id == 4){ $link="active";}else{$link="";} echo "class=".$link."";?>><a href="<?php if($this->session->userdata('kms_access_user_dept_id') == 9 || $this->session->userdata('kms_access_user_dept_id') == 5 || $this->session->userdata('kms_access_user_dept_id') == 7 || $this->session->userdata('kms_access_user_dept_id') == 6 || $this->session->userdata('kms_access_user_dept_id') == 4 || $this->session->userdata('kms_access_user_dept_id') == 8 || $this->session->userdata('kms_access_user_dept_id') == 2 || $this->session->userdata('kms_access_user_dept_id') == 3){echo base_url().'Forum/Chat/';}else {echo base_url().$this->session->userdata('side_menu_dept').'/Forum/';} ?>4"><i class="fa fa-shopping-cart"></i><?php echo $Menu_item_00_01_04; 
        if(isset($CM) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$CM."</span>"; }else{}
        ?><?php if($Forum_id == 4){ $link="fa fa-check";}else{$link="";} echo "<i class=\"".$link." pull-right\" aria-hidden=\"true\"></i>";?></a></li> 

        <li <?php if($Forum_id == 8){ $link="active";}else{$link="";} echo "class=".$link."";?>><a href="<?php if($this->session->userdata('kms_access_user_dept_id') == 9 || $this->session->userdata('kms_access_user_dept_id') == 5 || $this->session->userdata('kms_access_user_dept_id') == 7 || $this->session->userdata('kms_access_user_dept_id') == 6 || $this->session->userdata('kms_access_user_dept_id') == 4 || $this->session->userdata('kms_access_user_dept_id') == 8 || $this->session->userdata('kms_access_user_dept_id') == 2 || $this->session->userdata('kms_access_user_dept_id') == 3){echo base_url().'Forum/Chat/';}else {echo base_url().$this->session->userdata('side_menu_dept').'/Forum/';} ?>8"><i class="fa  fa-pencil-square"></i><?php echo $Menu_item_00_01_08; 
        if(isset($DS) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$DS."</span>"; }else{}
        ?><?php if($Forum_id == 8){ $link="fa fa-check";}else{$link="";} echo "<i class=\"".$link." pull-right\" aria-hidden=\"true\"></i>";?></a></li>

        <li <?php if($Forum_id == 3){ $link="active";}else{$link="";} echo "class=".$link."";?>><a href="<?php if($this->session->userdata('kms_access_user_dept_id') == 9 || $this->session->userdata('kms_access_user_dept_id') == 5 || $this->session->userdata('kms_access_user_dept_id') == 7 || $this->session->userdata('kms_access_user_dept_id') == 6 || $this->session->userdata('kms_access_user_dept_id') == 4 || $this->session->userdata('kms_access_user_dept_id') == 8 || $this->session->userdata('kms_access_user_dept_id') == 2 || $this->session->userdata('kms_access_user_dept_id') == 3){echo base_url().'Forum/Chat/';}else {echo base_url().$this->session->userdata('side_menu_dept').'/Forum/';} ?>3"><i class="fa fa-usd"></i><?php echo $Menu_item_00_01_03; 
         if(isset($FC) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$FC."</span>"; }else{}
        ?><?php if($Forum_id == 3){ $link="fa fa-check";}else{$link="";} echo "<i class=\"".$link." pull-right\" aria-hidden=\"true\"></i>";?></a></li>

        <li <?php if($Forum_id == 9){ $link="active";}else{$link="";} echo "class=".$link."";?>><a href="<?php if($this->session->userdata('kms_access_user_dept_id') == 9 || $this->session->userdata('kms_access_user_dept_id') == 5 || $this->session->userdata('kms_access_user_dept_id') == 7 || $this->session->userdata('kms_access_user_dept_id') == 6 || $this->session->userdata('kms_access_user_dept_id') == 4 || $this->session->userdata('kms_access_user_dept_id') == 8 || $this->session->userdata('kms_access_user_dept_id') == 2 || $this->session->userdata('kms_access_user_dept_id') == 3){echo base_url().'Forum/Chat/';}else {echo base_url().$this->session->userdata('side_menu_dept').'/Forum/';} ?>9"><i class="fa  fa-desktop"></i><?php echo $Menu_item_00_01_09; 
         if(isset($IT) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$IT."</span>"; }else{}
        ?><?php if($Forum_id == 9){ $link="fa fa-check";}else{$link="";} echo "<i class=\"".$link." pull-right\" aria-hidden=\"true\"></i>";?></a></li>

        <li <?php if($Forum_id == 7){ $link="active";}else{$link="";} echo "class=".$link."";?>><a href="<?php if($this->session->userdata('kms_access_user_dept_id') == 9 || $this->session->userdata('kms_access_user_dept_id') == 5 || $this->session->userdata('kms_access_user_dept_id') == 7 || $this->session->userdata('kms_access_user_dept_id') == 6 || $this->session->userdata('kms_access_user_dept_id') == 4 || $this->session->userdata('kms_access_user_dept_id') == 8 || $this->session->userdata('kms_access_user_dept_id') == 2 || $this->session->userdata('kms_access_user_dept_id') == 3){echo base_url().'Forum/Chat/';}else {echo base_url().$this->session->userdata('side_menu_dept').'/Forum/';} ?>7"><i class="fa fa-gears"></i><?php echo $Menu_item_00_01_07; 
         if(isset($MT) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$MT."</span>";$a = 1; }else{}
        ?><?php if($Forum_id == 7){ $link="fa fa-check";}else{$link="";} echo "<i class=\"".$link." pull-right\" aria-hidden=\"true\"></i>";?></a></li>
        
        <li <?php if($Forum_id == 5){ $link="active";}else{$link="";} echo "class=".$link."";?>><a href="<?php if($this->session->userdata('kms_access_user_dept_id') == 9 || $this->session->userdata('kms_access_user_dept_id') == 5 || $this->session->userdata('kms_access_user_dept_id') == 7 || $this->session->userdata('kms_access_user_dept_id') == 6 || $this->session->userdata('kms_access_user_dept_id') == 4 || $this->session->userdata('kms_access_user_dept_id') == 8 || $this->session->userdata('kms_access_user_dept_id') == 2 || $this->session->userdata('kms_access_user_dept_id') == 3){echo base_url().'Forum/Chat/';}else {echo base_url().$this->session->userdata('side_menu_dept').'/Forum/';} ?>5"><i class="fa fa-industry"></i><?php echo $Menu_item_00_01_05; 
         if(isset($PD) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$PD."</span>"; }else{}
        ?><?php if($Forum_id == 5){ $link="fa fa-check";}else{$link="";} echo "<i class=\"".$link." pull-right\" aria-hidden=\"true\"></i>";?></a></li>
     
        </ul>
       
      

  </div>
  
  <!-- /.box-body <li> <a  data-toggle="modal" data-target="#myModal2"><i class="fa fa-comments"></i><?php //echo "Personal Chat"; 
         
        ?></a></li>-->
</div>

<!--
<div class="box box-solid">
<div class="box-header with-border">
<div class="box-body no-padding">
    <ul class="nav nav-pills nav-stacked">
<li><a ><i class="fa fa-commenting-o"></i> <span style="font-weight:bold;">SMS Single Chat</span></a></li>
    
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Internal Delivery</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>External Delivery</span></a></li>
   
///. box 
</div>
</ul>
</div>
</div>
-->