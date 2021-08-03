<?php error_reporting(0); ?>
        <li <?php if($menu_status == "EV"){ echo "class=\"active treeview\"";}else{ echo "class=\"treeview\"";} ?>>
          <a href="<?php echo base_url();?>">
          <i class="fa fa fa-calendar-check-o"></i>
            <span>Events</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>Forum/Events"><i class="glyphicon glyphicon-tasks"></i><?php echo $Menu_item_05_01 ?></a></li><!--Email option-->
           
         
          </ul>
          
           
          
        </li>

      <?php
       if($this->session->userdata('kms_access_user_level') == 3){}else{} ?>
     <!--
         <li <?php if($menu_status == "US"){ echo "class=\"active treeview\"";}else{ echo "class=\"treeview\"";} ?>>
          <a href="<?php echo base_url();?>">
          <i class="fa fa-user"></i>
            <span><?php echo $Menu_item_07_01;?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>Forum/Staff#"><i class="fa fa-users"></i><?php echo "  ".$Menu_item_07_02 ?></a></li>
           
          </ul>
          
        </li>
--->
      