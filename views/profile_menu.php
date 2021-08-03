
<!--<a href="" class="btn btn-primary btn-block margin-bottommb-4" data-toggle="modal" data-target="#modal-add-chat-forum"style="background-color:#2e3192;color:white;">Compose</a>
 <br />-->
 <div class="box box-solid">
  <div class="box-header with-border">
    <h3 class="box-title"> Account Management </h3>

    <div class="box-tools">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-arrow-down"></i>
      </button>
    </div>
  </div>
  <div class="box-body no-padding">
    <ul class="nav nav-pills nav-stacked">

    <li <?php if($Selected_dept == 1){ $link="active";}else{$link="";} echo "class=".$link."";?> ><a href="<?php echo base_url().$this->session->userdata('side_menu_dept2'); 
        if($this->session->userdata('side_menu_dept2') == "Technology"){echo "/File_Inbox/";}
        else if($this->session->userdata('side_menu_dept2') == "kms"){echo "/Dept_Directory/";}
        else if($this->session->userdata('side_menu_dept2') == "Forum"){echo "/File_Inbox/";}
        else if($this->session->userdata('side_menu_dept2') == "Forum"){echo "/Staff/";}
       // else if(isset($this->session->userdata('kms_emp_department'))){echo "/".$this->session->userdata('kms_emp_department')."/";}
        else{echo "Forum/Profile/";}?>Personal"><i class="fa fa-university"></i> <?php echo $Menu_item_00_01_00; 
        if(isset($GN) != 0 )  { echo "<span class=\"label label-primary pull-right\">".$GN."</span>"; }else{}
        ?><?php if($Selected_dept == 1){ $link="fa fa-check";}else{$link="";} echo "<i class=\"".$link." pull-right\" aria-hidden=\"true\"></i>";?></a></li>
        
</ul>
  </div>
  <!-- /.box-body <i class="fa fa-check" aria-hidden="true"></i>-->
</div>
<!-- /. box -->

