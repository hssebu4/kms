
 <div >
 <div class="box box-solid" >
  <div class="box-header with-border" >
    <h3 class="box-title"> Planning Templates </h3>

    <div class="box-tools">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-arrow-down"></i>
      </button>
    </div>
  </div>
  <div class="box-body no-padding">
    <ul class="nav nav-pills nav-stacked active">
        <li ><a  href="#" id='Show_NewCriticalRD'><i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $Menu_item_04_05_01; ?></a></li>
        <li ><a href="#" ><i class="fa fa-user-md" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $Menu_item_04_05_02; ?></a></li>
        <li ><a href="#" ><i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $Menu_item_04_05_03; ?></a></li>
        <li ><a href="#" ><i class="fa fa-line-chart" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $Menu_item_04_05_04; ?></a></li>
        <?php
        if($this->session->userdata('kms_emp_id') == 38 || $this->session->userdata('kms_emp_id') == 1)
       {
          echo "<li ><a id=\"ViewIncomingPlans\" href=\"#\" ><i class=\"fa fa-download\" aria-hidden=\"true\"></i>&nbsp;&nbsp;Incoming Templates</a></li>";
       } else{}
        ?>
        
    </ul>
  </div>
</div>
</div>
<!-- /. box Show_NewPDP  <i class="fa fa-download" aria-hidden="true"></i>-->

