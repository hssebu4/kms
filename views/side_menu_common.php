
<a href="" class="btn btn-primary btn-block margin-bottommb-4" data-toggle="modal" data-target="#modal-add-chat-forum"style="background-color:#2e3192;color:white;">Compose</a>
 <br >
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
        
        

        <li><a href="<?php echo base_url().'kms/'.$this->session->userdata('side_menu_dept');?>/1"><i class="fa fa-university"></i> <?php echo "$Menu_item_00_01_01"; 
        if(isset($GN) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$GN."</span>"; }else{}
        ?></a></li>

        <li><a href="<?php echo base_url().'kms/'.$this->session->userdata('side_menu_dept');?>/6"><i class="fa  fa-ship"></i> <?php  echo $Menu_item_00_01_06; 
        if(isset($SC) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$SC."</span>"; }else{}
        ?></a></li>

        <li><a href="<?php echo base_url().'kms/'.$this->session->userdata('side_menu_dept');?>/2"><i class="fa  fa-users"></i> <?php echo $Menu_item_00_01_02; 
        if(isset($AD) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$AD."</span>"; }else{}
        ?></a></li>

        <li><a href="<?php echo base_url().'kms/'.$this->session->userdata('side_menu_dept');?>/4"><i class="fa fa-shopping-cart"></i><?php echo $Menu_item_00_01_04; 
        if(isset($CM) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$CM."</span>"; }else{}
        ?></a></li> 

        <li><a href="<?php echo base_url().'kms/'.$this->session->userdata('side_menu_dept');?>/8"><i class="fa  fa-pencil-square"></i><?php echo $Menu_item_00_01_08; 
        if(isset($DS) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$DS."</span>"; }else{}
        ?></a></li>

        <li><a href="<?php echo base_url().'kms/'.$this->session->userdata('side_menu_dept');?>/3"><i class="fa fa-usd"></i><?php echo $Menu_item_00_01_03; 
         if(isset($FC) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$FC."</span>"; }else{}
        ?></a></li>

        <li><a href="<?php echo base_url().'kms/'.$this->session->userdata('side_menu_dept');?>/9"><i class="fa  fa-desktop"></i><?php echo $Menu_item_00_01_09; 
         if(isset($IT) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$IT."</span>"; }else{}
        ?></a></li>

        <li><a href="<?php echo base_url().'kms/'.$this->session->userdata('side_menu_dept');?>/7"><i class="fa fa-gears"></i><?php echo $Menu_item_00_01_07; 
         if(isset($MT) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$MT."</span>";$a = 1; }else{}
        ?></a></li>
        
        <li><a href="<?php echo base_url().'kms/'.$this->session->userdata('side_menu_dept');?>/5"><i class="fa fa-industry"></i><?php echo $Menu_item_00_01_05; 
         if(isset($PD) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$PD."</span>"; }else{}
        ?></a></li>
  </div>
  <!-- .box-body -->
</div>
<!-- . box -->

