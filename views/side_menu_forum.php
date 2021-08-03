

<div class="box box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">Projects  <span class="fa fa-construction"></span></h3>

    <div class="box-tools">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div> 
  <div class="box-body no-padding" id="Menu_file_hub">
    <ul class="nav nav-pills nav-stacked">

      <?php if(isset($data_project_lists))
              {
                

                 foreach($data_project_lists as $list)
                        {
                           if($Selected_project_id == $list['kms_project_id'] )
                           {
                            echo " <li class=\"active\" ><a href=\"".base_url()."Forum/File_Hub/".$list['kms_project_id']."\">".$list['kms_project_detail']."<span class=\"label label-primary pull-right\"></span></a></l>";
                           }else
                           {
                            echo " <li  ><a href=\"".base_url()."Forum/File_Hub/".$list['kms_project_id']."\">".$list['kms_project_detail']."</a></l>";
                           }
                        
                        //<a href=".base_url().$list['kms_project_id']">".$list['kms_project_detail']."</a>
                        }

              }else{ 
                //echo "no";
              } 
              
            
              ?>
    
       
  </div>
  <!-- /.box-body -->
</div>
<!-- /. box -->

