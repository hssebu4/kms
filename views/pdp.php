<?php 
$session_username = $this->session->userdata('kms_access_username');
$session_user_dept_id =  $this->session->userdata('kms_access_user_dept_id');

if($session_username == "" || $session_username == null || $session_user_dept_id == "" || $session_user_dept_id == null)
{
    redirect('/');
   // $this->session->sess_destroy()
}else{}
?>
<!DOCTYPE html>
<html>
<head> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $Home_tab_title ?></title>
    
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>ext/bower_components/jquery/dist/jquery.min.js"></script>
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
   .Hideme {
     display:none;
   }
   .fa-pencil {
  color: blue;
    }
    .fa-trash {
  color: red;
    }
</style>

    <script>
    $( document ).ready(function() {
      $('.selectpicker_live_users').selectpicker();
      $('#Div_Generated_pdp').css('display', 'none');
      $('#Div_Shared_pdp').css('display', 'none');
      $('#DPD_Setup_div_LineManager').css('display', 'none');
      $('#DPD_Setup_div_OrgstnGoal').css('display', 'none');
      $('#DPD_Setup_div_DeptGoal').css('display', 'none');
      $('#DPD_Setup_div_TMG').css('display', 'none');
      $('#Add_newOrgGoal').css('cursor','pointer');
      $('#Org_goal_error1').css('display', 'none');
      $('#OrgGoal_EditDiv').css('display', 'none');
      $('#View_departmental_goals_tb_div').css('display', 'none');
      $('#PDP_Add_new_dep_goal').css('display', 'none');
      $('#btn_back_newpdp_first').css('display', 'none');
      $('#Div_addNew_Pdp_first').css('display', 'none');
      $('#add_pdp_target_div').css('display', 'none');
      $('#add_pdp_accomplishment_count').css('display', 'none');
      $('#add_pdptable_form_div').css('display', 'none');
      $('#btn_addNew_pdp_NextDept').css('display', 'none');
      $('#addPdp_SecondPage_div').css('display', 'none');
      $('#btn_back_newpdp_second').css('display', 'none');
      $('#add_pdp_month_select_div').css('display', 'none');
      $('#View_Generated_pdptable').DataTable();
      

      
      //
      //Onclick for adding the line manager 
      $("#btn_submit_lineManager").click(function(){
        SaveLineManager();
      }); 

      //Onclick for adding the line manager
      $("#btn_submit_OrgGoal").click(function(){
        OrgGoal();
      });

     //The function to enable the form for registering a new organisational goal
     $('#Add_newOrgGoal').click(function(e) {  
     // alert("under development");
      });
     
     

        

});
//This will send data to be saves by the controller
  function SaveLineManager()
     {
        //Send data to the business owner tab
        $.ajax({
          url: "<?php echo base_url("Forum/Ajax_save_lineManager");?>",
          type: "POST",
          cache: false,
          data: { user_id: "<?php echo $this->session->userdata('kms_emp_id');?>",new_manager: $('#kms_input_set_pdp_manager').val()},
          success: function(data){
           
          if(data == 1)
            {
              $('#Modal_config_pdp').modal('toggle');
              $('#Div_Setup_pdp').css('display', 'none');
              $('#Div_New_pdp').css('display', 'block');
              
              location.reload();
            }
            else
            {
           //   alert("registration failed");
            }
          }
          });

     }
//The function that open the div for incoming PDP Files  
   function Show_GeneratedPDP()
   {
     $('#Div_New_pdp').css('display', 'none');
     $('#Div_Shared_pdp').css('display', 'none');
     $('#Div_Setup_pdp').css('display', 'none');
     $('#Div_Generated_pdp').css('display', 'block');

   
     //View generated pdp s
      $.ajax({
        url: "<?php echo base_url("Forum/Ajax_View_GeneratedPDP");?>",
        type: "POST",
        cache: false,
        data: { t:3},
        success: function(data){
         $('#ViewGenerated_Pdp').html(data); 
        }
        });
    
   }

   //The function that open the div for incoming PDP Files
   function Show_NewPDP()
   {
      $('#Div_Generated_pdp').css('display', 'none');
      $('#Div_Shared_pdp').css('display', 'none');
      $('#Div_Setup_pdp').css('display', 'none');
      $('#pdp_intro_table').css('display', 'none');
      $('#btn_addNew_pdp').css('display', 'none');
      $('#add_pdp_month_select_div').css('display', 'none');
      $('#Div_addNew_Pdp_first').css('display', 'block');
      $('#btn_back_newpdp_first').css('display', 'block');
      $('#Div_New_pdp').css('display', 'block');
      $('#addPdp_SecondPage_div').css('display', 'none');
     ListOrg_Goals(2);
   
     
   }

    //The function that open the div for incoming PDP Files
    function Show_SharedPDP()
   {
     $('#Div_New_pdp').css('display', 'none');
     $('#Div_Generated_pdp').css('display', 'none');
     $('#Div_Setup_pdp').css('display', 'none');
     $('#Div_Shared_pdp').css('display', 'block');
   }
  //The function that open the div for setting up the 
  function Show_PDP_Config()
   {
    // $('#Div_New_pdp').css('display', 'block');
    $('#Div_Generated_pdp').css('display', 'none');
    $('#Div_Shared_pdp').css('display', 'none');
    $('#Div_Setup_pdp').css('display', 'none');
    document.getElementById('Org_goal').style.borderColor=""; 
      document.getElementById("Des_label").style.color = "";
      document.getElementById('Org_goal_error1').style.color = "";
      document.getElementById("Org_goal").value ="";
      $('#DPD_Setup_div_OrgstnGoal').css('display', 'none');
     //$('#kms_input_PDP_setup_type').val("Select setup option here...").change();
     $('#pdp_org_goal_selected').val("Please select the organisational goal here").change();
     $('#Org_goal_error1').css('display', 'none');
     $('#Org_goal_Success').css('display', 'none');
     $('#View_org_goal1').css('display', 'none');
     $('#PDP_Selected_OGoal_Val_error1').css('display', 'none');
     $('#View_teamMember_dep_list').css('display', 'none');
     $('#View_teamMember_goals_list').css('display', 'none');
     $('#TmemberGoal_NewGoalDiv').css('display', 'none');
     $('#View_teamMember_Goal').css('display', 'none');
     $('#TMGoal_NewKIPDiv').css('display', 'none');
     $('#TmemberGoal_EditGoalDiv').css('display', 'none');
     $('#add_pdp_org_goal_selected_val_error').css('display', 'none');
     $('#Modal_config_pdp').modal('show')
     /*
     
     
     //Before loading the configuration modal, we clear out the previous errors on the modal
      

    
     ;*/
   }


   //Div_Setup_pdp
   //Send data to the business owner tab
   $.ajax({
		url: "<?php echo base_url("Forum/Ajax_View_Supervisor");?>",
		type: "POST",
    cache: false,
    data: { user_id: "<?php echo $this->session->userdata('kms_emp_id');?>"},
		success: function(data){
			$('#ViewSupervisor_data').html(data); 
		}
    });




  
 //The function for deiting an organizational goal
 $(document).on("click", "#OrgGoal_Edit_goal", function () {
    var Goal_id   = $(this).data('gid');
    var Goal_des  = $(this).data('orgdes');
    $('#OrgGoal_NewDiv').css('display', 'none');
    $('#Org_goal_error_edit').css('display', 'none');

    $('#Org_goal_edit').val(Goal_des.replace(/[+]/gi, ' '));
    $('#Org_goal_edit_id').val(Goal_id);
    $('#OrgGoal_NewKIPDiv').css('display', 'none');
    $('#OrgGoal_EditDiv').css('display', 'block');
  
    
   
  });
  //The function for deleting an organizational goal
  $(document).on("click", "#OrgGoal_delete", function () {
    var Goal_id   = $(this).data('gid');

    $.ajax({
              url: "<?php echo base_url("Forum/Ajax_delete_orgGoal");?>",
              type: "POST",
              cache: false,
              data: { G_id:Goal_id},
              success: function(data){
               
               if(data == 1){ 
                $('#Org_goal_error_edit').css('display', 'none');
                $('#Org_goal_Success_edit').css('display', 'none');
                $('#Org_goal_Success').css('display', 'none');
                View_OrgGoals(); 
                 }else{}
              }
              });
    
   
  });

//Org_goal_Success_edit
function PDP_Setup_option2()
      {
         var selectBox = document.getElementById("kms_input_PDP_setup_type");
         if(selectBox.value == "LM")
           { 
            $('#Result_divManagerName').css('display', 'none');
            $('#DPD_Setup_div_OrgstnGoal').css('display', 'none');
            $('#DPD_Setup_div_DeptGoal').css('display', 'none');
            $('#DPD_Setup_div_TMG').css('display', 'none');
            $('#DPD_Setup_div_LineManager').css('display', 'block');
           }
        if(selectBox.value == "OG")
           {
            $('#DPD_Setup_div_LineManager').css('display', 'none');
            $('#DPD_Setup_div_DeptGoal').css('display', 'none');
            $('#DPD_Setup_div_TMG').css('display', 'none');
            $('#OrgGoal_EditDiv').css('display', 'none');
            $('#OrgGoal_NewDiv').css('display', 'none');
            $('#OrgGoal_NewKIPDiv').css('display', 'none');
            $('#DPD_Setup_div_OrgstnGoal').css('display', 'block');
            View_OrgGoals();
           }
        if(selectBox.value == "DG")
           {
            
            $('#DPD_Setup_div_LineManager').css('display', 'none');
            $('#DPD_Setup_div_OrgstnGoal').css('display', 'none');
            $('#DPD_Setup_div_TMG').css('display', 'none');
            $('#View_departmental_goals_tb_div').css('display', 'none');
            $('#PDP_Selected_OGoal_Val_error1').css('display', 'none');
            $('#PDP_Add_new_dep_goal').css('display', 'none');
            $('#PDP_edit_dep_goal').css('display', 'none');
            $('#DepGoal_NewKIPDiv').css('display', 'none');
            $('#DPD_Setup_div_DeptGoal').css('display', 'block');
            PDP_Selected_OGoal();
           }
        if(selectBox.value == "TMG")
           {
            $('#DPD_Setup_div_LineManager').css('display', 'none');
            $('#DPD_Setup_div_OrgstnGoal').css('display', 'none');
            $('#DPD_Setup_div_DeptGoal').css('display', 'none');
            $('#TmemberGoal_NewGoalDiv').css('display', 'none');
            $('#dep_TMember_goalKPI_error1').css('display', 'none');
            $('#tmg_view_ogoal_error1').css('display', 'none');
            $('#tmg_view_dgoal_error1').css('display', 'none');
            $('#View_teamMember_Goal').css('display', 'none');
            $('#TmemberGoal_EditGoalDiv').css('display', 'none');
            $('#View_teamMember_dep_list').css('display', 'none');
            $('#TMGoal_NewKIPDiv').css('display', 'none');
            $('#DPD_Setup_div_TMG').css('display', 'block');
            $('#View_teamMember_goals_list').css('display', 'block');

            
            
             //This will bring the organization goal list
              $.ajax({
                url: "<?php echo base_url("Forum/Ajax_view_orgGoal_List_tmg");?>",
                type: "POST",
                cache: false,
                data: { t:1 },
                success: function(data)
                {
                  $('#View_teamMember_goals_list').html(data);
                  
                }
                });

           }
        
       
    
      }
       
      //The function to display selected manager
      function Manager_Selected()
      {
        var selectManager = document.getElementById("kms_input_set_pdp_manager");
        var ManagerName   = selectManager.options[selectManager.selectedIndex].text; //
        if(selectManager.value == "")
        {
          document.getElementById("Manager_selected_div").innerHTML = "Nothing has been selected, Please try gain ";
        }
        else
        {
          document.getElementById("Manager_selected_div").innerHTML = "You have select <b>"+ManagerName+"</b> as your Line Manager";
          $('#Result_divManagerName').css('display', 'block');
        }
      
      }

      //The function to submit the organisational goal
      function OrgGoal()
      {
        var Goal = document.getElementById("Org_goal").value;

        if(Goal == null || Goal == "")
        {
          document.getElementById('Org_goal').focus();
          document.getElementById('Org_goal').style.borderColor="red"; 
          document.getElementById("Des_label").style.color = "red";
          document.getElementById('Org_goal_error1').style.color = "red";
          $('#Org_goal_error1').css('display', 'block');
        }
        else
        {
          $('#OrgGoal_NewDiv').css('display', 'none');
          $('#Org_goal_Success').css('display', 'none');
           //Send data to the business owner tab 
          $.ajax({
            url: "<?php echo base_url("Forum/Ajax_save_orgGoal");?>",
            type: "POST",
            cache: false,
            data: { user_id: "<?php echo $this->session->userdata('kms_emp_id');?>",org_goal: Goal },
            success: function(data){
              if(data == 1 )
              { 
                //Reload the organization goals
                $.ajax({
                url: "<?php echo base_url("Forum/Ajax_view_orgGoal");?>",
                type: "POST",
                cache: false,
                data: { user_id: "<?php echo $this->session->userdata('kms_emp_id');?>"},
                success: function(data){
                  $('#View_organisation_goals_tb').html(data); 
                }
                });
        
                $("#Org_goal").val("").change();
                $('#Org_goal_Success').css('display', 'block');
              } else
              {
               // alert("Not saved");
              }
              
            }
            });
        }

      
      }
       //PDP_Add_new_org_goal
       $(document).on("click", "#Btn_add_new_Org_goal", function () {
            $('#Dep_goal_new').css('borderColor', '');
            $('#Dep_goal_new_label').css('color', '');
            $('#PDP_edit_dep_goal').css('display', 'none');
            $('#Dep_goal_error_edit').css('display', 'none');
            $('#Org_goal_Success').css('display', 'none');
            $('#OrgGoal_NewKIPDiv').css('display', 'none');
            $('#OrgGoal_NewDiv').css('display', 'block');
        });

      //The function to handle updating the edited goal
      $(document).on("click", "#btn_submit_OrgGoal_update", function () {
       
        var Goal = document.getElementById("Org_goal_edit").value;
        var G_id = document.getElementById("Org_goal_edit_id").value;

        if(Goal == null || Goal == "")
        {
          document.getElementById('Org_goal_edit').focus();
          document.getElementById('Org_goal_edit').style.borderColor="red"; 
          document.getElementById("Edit_Des_label").style.color = "red";
          document.getElementById('Org_goal_error_edit').style.color = "red";
          $('#Org_goal_error_edit').css('display', 'block');
        }
        else
        { 
          $('#OrgGoal_NewDiv').css('display', 'none');
          $('#Org_goal_Success').css('display', 'none');
          //Send edited organisational goal to be updated 
          $.ajax({
            url: "<?php echo base_url("Forum/Ajax_Edit_OrgGoal");?>",
            type: "POST",
            cache: false,
            data: { org_goal:Goal,org_id:G_id },
            success: function(data){
             
             if(data == 1)
             {
              View_OrgGoals();
             }else{}
           
            }
            });
        }

      });
     
     function View_OrgGoals()
     {
        //View organization goals 
        $.ajax({
              url: "<?php echo base_url("Forum/Ajax_view_orgGoal");?>",
              type: "POST",
              cache: false,
              data: { user_id: "<?php echo $this->session->userdata('kms_emp_id');?>"},
              success: function(data){
                
                $('#Org_goal_error_edit').css('display', 'none');
                $('#Org_goal_edit').val();
                $('#Org_goal_edit_id').val();
                $('#OrgGoal_EditDiv').css('display', 'none');
                $('#OrgGoal_NewDiv').css('display', 'none');
                $('#Org_goal_Success_edit').css('display', 'none');
                $('#View_organisation_goals_tb').html(data); 
              }
              });
     }

    
     
     //The function to enable kpi field after selecting  org goal
     function PDP_Selected_OGoal()
     {
       
        var SetupType   = document.getElementById("kms_input_PDP_setup_type").value;
        //View organization goals  list under the department goal
       $.ajax({
              url: "<?php echo base_url("Forum/Ajax_view_orgGoal_List");?>",
              type: "POST",
              cache: false,
              data: { user_id: "<?php echo $this->session->userdata('kms_emp_id');?>"},
              success: function(data){
                if(SetupType == "DG"){ $('#View_organisation_goals_list').html(data); $('#View_org_goal1').css('display', 'block'); }
              }
              });
     }
     //This will validate the orgainisational goal selection option
     function PDP_Selected_OGoal_Val()
     {
         var selectOGoal = document.getElementById("pdp_org_goal_selected_val").value;
         if(selectOGoal  == 0)
         {
             $('#pdp_org_goal_selected_val_label').css('color', 'red');
             $('#pdp_org_goal_selected_val').css('borderColor', 'red');
             $('#PDP_Add_new_dep_goal').css('display', 'none');
             $('#View_departmental_goals_tb_div').css('display', 'none');
             $('#Dep_goal_error_edit').css('display', 'none');
             $('#PDP_edit_dep_goal').css('display', 'none');
             $('#PDP_Selected_OGoal_Val_error1').css('display', 'block');
         }
         else if(selectOGoal  != 0)
         {
             $('#pdp_org_goal_selected_val_label').css('color', '');
             $('#pdp_org_goal_selected_val').css('borderColor', '');
             $('#PDP_Selected_OGoal_Val_error1').css('display', 'none');
             $('#PDP_Selected_DepGoal_Val_error1').css('display', 'none');
             $('#Dep_goal_edit').css('borderColor', '');
             $('#Dep_goal_edit_label').css('color', '');
             $('#Dep_goal_error_edit').css('display', 'none');
             $('#View_departmental_goals_tb_div').css('display', 'block');
             View_Departmental_Goal(selectOGoal);
         }
         
     }

        //PDP_Add_new_dep_goal
        $(document).on("click", "#Btn_add_new_dep_goal", function () {
            $('#Dep_goal_new').css('borderColor', '');
            $('#Dep_goal_new_label').css('color', '');
            $('#PDP_edit_dep_goal').css('display', 'none');
            $('#Dep_goal_error_edit').css('display', 'none');
            $('#DepGoal_NewKIPDiv').css('display', 'none');
            $('#PDP_Add_new_dep_goal').css('display', 'block');
        });

       

      //Onclick for adding new departmental 
      $(document).on("click", "#btn_submit_DepGoal_save", function () {

        var selectOGoal =  document.getElementById("pdp_org_goal_selected_val").value;
        var Dep_Goal    =  document.getElementById("Dep_goal_new").value;

        if(Dep_Goal == "" || Dep_Goal == null)
        {
          $('#Dep_goal_new').css('borderColor', 'red');
          $('#Dep_goal_new_label').css('color', 'red');
          $('#PDP_Selected_DepGoal_Val_error1').css('display', 'block');
          document.getElementById('Dep_goal_new').focus();
        }
        else if(selectOGoal != 0 && Dep_Goal != "" )
        {
          $('#Dep_goal_new').css('borderColor', '');
          $('#Dep_goal_new_label').css('color', '');
          $('#PDP_Selected_DepGoal_Val_error1').css('display', 'none');
         
          $.ajax({
              url: "<?php echo base_url("Forum/Ajax_add_DepGoal");?>",
              type: "POST",
              cache: false,
              data: {Org_goal:selectOGoal,DepGoal:Dep_Goal },
              success: function(data){
                if( data == 1)
                {
                  $('#Dep_goal_new').val("");
                  $('#PDP_Add_new_dep_goal').css('display', 'none');

                  View_Departmental_Goal(selectOGoal);
                }
                else 
                {
                 // alert("Not saved");
                }
              }
              });

        }
        
     });
     //This will return the department goals per organization goal
       function View_Departmental_Goal(selectOGoal)
       {
        $('#PDP_Add_new_dep_goal').css('display', 'none');
        $('#DepGoal_NewKIPDiv').css('display', 'none');
         //Reload the Departmental goals
         $.ajax({
                    url: "<?php echo base_url("Forum/Ajax_view_depGoal");?>",
                    type: "POST",
                    cache: false,
                    data: { Org_goal:selectOGoal},
                    success: function(data){
                     $('#View_departmental_goals_tb').html(data); 
                   
                    }
                    });
       }

    
  //The functional for editing the orgainisational goal select_org_goal_error1
  $(document).on("click", "#Dep_Goal_edit", function () {
    
        var Dep_Goal_id   = $(this).data('depgid');
        var Dep_Goal_des  = $(this).data('depdes');
        var Goal_id       = $(this).data('gid');

        $('#Dep_goal_edit').val(Dep_Goal_des.replace(/[+]/gi, ' '));
        $('#dep_goal_edit_id').val(Dep_Goal_id);
        $('#org_goal_edit_id2').val(Goal_id);

        $('#PDP_Selected_DepGoal_Val_error2').css('display', 'none');
        $('#OrgGoal_NewKIPDiv').css('display', 'none');
        $('#PDP_Add_new_dep_goal').css('display', 'none');
        $('#Dep_goal_error_edit').css('display', 'none');
        $('#Dep_goal_edit').css('borderColor', '');
        $('#Dep_goal_edit_label').css('color', '');
        $('#DepGoal_NewKIPDiv').css('display', 'none');
        $('#PDP_edit_dep_goal').css('display', 'block');
   
  });
     

    //Onclick for adding editing departmental goal
  $(document).on("click", "#btn_submit_DepGoal_edit", function () {

            var dep_goal_edited_des =  document.getElementById("Dep_goal_edit").value;
            var dep_goal_edited_id  =  document.getElementById("dep_goal_edit_id").value;
            var org_goal_edited_id  =  document.getElementById("org_goal_edit_id2").value;
          

           
            if(dep_goal_edited_des == "" || dep_goal_edited_des == null)
            {
              $('#Dep_goal_edit').css('borderColor', 'red');
              $('#Dep_goal_edit_label').css('color', 'red');
              $('#Dep_goal_error_edit').css('display', 'block');
              document.getElementById('Dep_goal_edit').focus();
            }
            else if(dep_goal_edited_id != 0 && dep_goal_edited_des != "" && org_goal_edited_id != "")
            {
              $('#Dep_goal_edit').css('borderColor', '');
              $('#Dep_goal_edit_label').css('color', '');
              $('#Dep_goal_error_edit').css('display', 'none');
            
              $.ajax({
                  url: "<?php echo base_url("Forum/Ajax_edit_DepGoal");?>",
                  type: "POST",
                  cache: false,
                  data: {Org_goal:org_goal_edited_id,DepGoal_id:dep_goal_edited_id,DepGoal_des:dep_goal_edited_des },
                  success: function(data){
                    if( data == 1)
                    {
                      $('#Dep_goal_edit').val("");
                      $('#PDP_edit_dep_goal').css('display', 'none');
                      View_Departmental_Goal(org_goal_edited_id);
                    ;
                    }
                    else 
                    {
                    
                    }
                  }
                  });  
            }

            });

         //The function for deleting an department goal
  $(document).on("click", "#DepGoal_delete", function () {

    var Dep_Goal_id   = $(this).data('dgid');
    var Org_Goal_id   = $(this).data('ogid');
  
    $.ajax({
              url: "<?php echo base_url("Forum/Ajax_delete_depGoal");?>",
              type: "POST",
              cache: false,
              data: { OrgGoal_id:Org_Goal_id,DepGoal_id:Dep_Goal_id },
              success: function(data){
               if(data == 1){ 
                View_Departmental_Goal(Org_Goal_id);
                 } else { }
              }
              });
    
     });

 
     //or enabling add a new organisational goal KPI
     $(document).on("click", "#Link_KPI", function () {
           
            $('#Org_goalKPI_error1').css('display', 'none');
            $('#OrgGoal_NewDiv').css('display', 'none');
            $('#OrgGoal_EditDiv').css('display', 'none');
            $('#OrgGoal_NewKIPDiv').css('display', 'block');
            
            var Goal_des  = $(this).data('orgkpi');
            var Goal_id   = $(this).data('gid');
            $('#Org_goal_new_kpi').val(Goal_id);

            $("#Org_goalKPI").attr("placeholder", "Enter your \'"+Goal_des.replace(/[+]/gi, ' ')+"\' measure");
           
        });
        
      //Button for adding a new KPI
     $(document).on("click", "#btn_submit_OrgGoalKPI", function () {
            var org_goal_kpi =  document.getElementById("Org_goalKPI").value;
            var org_goal_id  =  document.getElementById("Org_goal_new_kpi").value;
            //Validate the use input as below
            if(org_goal_kpi == "" || org_goal_kpi == null )
            {
              $('#Org_goalKPI').css('borderColor', 'red');
              $('#Des_kpi_label').css('color', 'red');
              $('#Org_goalKPI_error1').css('color', 'red');
              $('#Org_goalKPI_error1').css('display', 'block');
              document.getElementById('Dep_goal_edit').focus();
             }
             else if(org_goal_kpi != "" && org_goal_kpi != null)
             {
              $('#Org_goalKPI').css('borderColor', '');
              $('#Des_kpi_label').css('color', '');
              $('#Org_goalKPI_error1').css('color', '');
              $('#Org_goalKPI_error1').css('display', 'none');
              Save_NewKPI(org_goal_kpi,org_goal_id);
             }

             function Save_NewKPI(org_goal_kpi,org_goal_id)
             {
                $.ajax({
                        url: "<?php echo base_url("Forum/Ajax_add_OrgKPI");?>",
                        type: "POST",
                        cache: false,
                        data: { OrgGoal_id:org_goal_id,Goal_KPI:org_goal_kpi},
                        success: function(data){
                        if(data == 1)
                          {
                            $('#OrgGoal_NewKIPDiv').css('display', 'none');
                            $('#Org_goalKPI').val("");
                            View_OrgGoals();
                          }else
                          { 
                            //alert("You KPI has not been saved!"); 
                            }
                        
                        }
                      });
             }
        });
  
   

        //This will return organisation goals kpi per organization goal
        function View_Organisation_KPIs(selectOGoal)
              {
                //Reload the organisation goals kpi
                $.ajax({
                   url: "<?php echo base_url("Forum/Ajax_view_kpi");?>",
                   type: "POST",
                   cache: false,
                   data: { Org_goal:selectOGoal},
                  success: function(data){
                   $('#View_organisation_goals_kpi').html(data);       
                   }
                  });
              }

        //This will return the edit form for the kpi selected
        $(document).on("click", "#Org_kpi_edit", function () 
        {
          var Goal_kpi_des  = $(this).data('depdes');
          var Goal_id       = $(this).data('gid');
          var GKPI_id       = $(this).data('kpiid');

          $('#Org_EditgoalKPI').val(Goal_kpi_des.replace(/[+]/gi, ' '));
          $('#Org_goal_edit_kpi').val(GKPI_id);
          $('#Org_goal_id_edit_kpi').val(Goal_id);  
          $('#Org_EditgoalKPI').css('borderColor', '');
          $('#edit_Org_goalKPI_error1').css('color', '');
          $('#Org_Edit_kpi_label').css('color', '');
          $('#edit_Org_goalKPI_error1').css('display', 'none');
          $('#OrgGoal_EditKIPDiv').css('display', 'block');
          
        });
        //This is for update kpi button
        $(document).on("click", "#btn_submit_EditOrgGoalKPI", function () 
        {
            var org_goal_kpi     =  document.getElementById("Org_goal_edit_kpi").value;
            var org_goal_id      =  document.getElementById("Org_goal_id_edit_kpi").value;
            var org_goal_kpi_des =  document.getElementById("Org_EditgoalKPI").value;

            if(org_goal_kpi_des == "" || org_goal_kpi_des == null)
            {
              document.getElementById('Org_EditgoalKPI').focus();
              $('#Org_EditgoalKPI').css('borderColor', 'red');
              $('#edit_Org_goalKPI_error1').css('color', 'red');
              $('#Org_Edit_kpi_label').css('color', 'red');
              $('#edit_Org_goalKPI_error1').css('display', 'block');
            }
            else
            {
              $('#OrgGoal_EditKIPDiv').css('display', 'none');

               //save the organisation goal kpi
               $.ajax({
                   url: "<?php echo base_url("Forum/Ajax_edit_kpi");?>",
                   type: "POST",
                   cache: false,
                   data: { Org_goal_id:org_goal_id,Org_kpi_id:org_goal_kpi,Org_kpi_des:org_goal_kpi_des},
                   success: function(data){ if(data == 1)  { View_Organisation_KPIs(org_goal_id);  } else{}
                   }
                  });

            }
          
        });
       //The kpi edit organization
        $(document).on("click", "#Org_kpi_delete", function () 
        {
          var Goal_id       =     $(this).data('gid');
          var GKPI_id       =     $(this).data('kpiid');

           //Edit the organisation goal kpi
           $.ajax({
                   url: "<?php echo base_url("Forum/Ajax_delete_kpi");?>",
                   type: "POST",
                   cache: false,
                   data: { Org_goal_id:Goal_id,Org_kpi_id:GKPI_id},
                   success: function(data){ if(data == 1)  {
                   
                     $('#modal_view_org_pki').modal('hide');
                      PDP_Setup_option2();
                      } else{}
                   }
                  });
        });
        //This will show the field for adding a new department kpi
        $(document).on("click", "#Link_KPI_Dep", function () 
        {
          var Org_Goal_id       =     $(this).data('ogid');
          var Dep_Goal_id       =     $(this).data('dgid');
          var Dep_Goal_des      =     $(this).data('depdes');

          $('#PDP_edit_dep_goal').css('display', 'none');
          $('#dep_goalKPI_error1').css('display', 'none');
          $('#PDP_Add_new_dep_goal').css('display', 'none');
          $('#dep_goalKPI').css('borderColor', '');
          $('#Des_kpi_label_add').css('color', '');
          $('#dep_goalKPI_error1').css('color', '');
          $("#dep_goalKPI").attr("placeholder", "Enter your \'"+Dep_Goal_des.replace(/[+]/gi, ' ')+"\' measure");
          $('#dep_goalKPI').val("");
          $('#dep_goal_new_kpi').val(Dep_Goal_id);
          $('#org_goal_new_kpi').val(Org_Goal_id);
          $('#DepGoal_NewKIPDiv').css('display', 'block');
          
        });
      //This will show the field for adding a new organisational kpi
      $(document).on("click", "#btn_submit_DepGoalKPI", function () 
        {
         
         var dep_goal_kpi_des =  document.getElementById("dep_goalKPI").value;
         var dep_goal_id      =  document.getElementById("dep_goal_new_kpi").value;
         var org_goal_id      =  document.getElementById("org_goal_new_kpi").value;

          if(dep_goal_kpi_des == null || dep_goal_kpi_des == "")
           {
              document.getElementById("dep_goalKPI").focus();
              $('#dep_goalKPI').css('borderColor', 'red');
              $('#Des_kpi_label_add').css('color', 'red');
              $('#dep_goalKPI_error1').css('color', 'red');
              $('#dep_goalKPI_error1').css('display', 'block');
           }
           else
           {
              $('#dep_goalKPI').css('borderColor', '');
              $('#Des_kpi_label_add').css('color', '');
              $('#dep_goalKPI_error1').css('color', '');
              $('#dep_goalKPI_error1').css('display', 'none');
              $('#DepGoal_NewKIPDiv').css('display', 'none');
              //saving the department kpi
           $.ajax({
                   url: "<?php echo base_url("Forum/Ajax_add_dep_kpi");?>",
                   type: "POST",
                   cache: false,
                   data: { Dep_kpi_des:dep_goal_kpi_des,Org_id:org_goal_id,dep_goalid:dep_goal_id},
                   success: function(data){ 
                    View_Departmental_Goal(org_goal_id);
                   }
                  });
           }
          
          
        });
        //This will display the department kpi div
        $(document).on("click", "#View_Dep_KPIS_Link", function () {
        
        $('#dep_kpi_label_view_error1').css('display', 'none');
        $('#DepGoal_EditKIPDiv').css('display', 'none');
        $('#Dep_view_kpis').css('display', 'none');
        $('#DepGoal_target').css('display', 'none');
        $('#Dep_add_target_error1').css('display', 'none');
        

        var Dep_kpi_no    = $(this).data('no');
        var Goal_kpi_des  = $(this).data('depdes');
        var Goal_id       = $(this).data('gid');
        var DepGoal_id    = $(this).data('depgid');

       if(Dep_kpi_no == 0)
       {
          document.getElementById("Dep_kpi_label").innerHTML = Goal_kpi_des.replace(/[+]/gi, ' ')+" Measure(s)";
          $('#dep_kpi_label_view_error1').css('display', 'block');
       }
       else
       {
          document.getElementById("Dep_kpi_label").innerHTML = Goal_kpi_des.replace(/[+]/gi, ' ')+" Measure(s)";
          $('#Dep_view_kpis').css('display', 'block');
          View_Department_KPIs(Goal_id,DepGoal_id);
       }
       $('#modal_view_dep_pki').modal('toggle');
        });

         //This will return department goals kpi per 
         function View_Department_KPIs(selectOGoal,selectDGoal)
              {
                //Reload the organisation goals kpi
                $.ajax({
                   url: "<?php echo base_url("Forum/Ajax_view_dep_kpi");?>",
                   type: "POST",
                   cache: false,
                   data: { Org_goal:selectOGoal,Dep_goal:selectDGoal},
                  success: function(data){
                   $('#View_department_kpi').html(data); 
                  
                   }
                  });
              }

    //This will edit department kpi div
    $(document).on("click", "#Edit_dep_kpi", function () {
    
        var Dep_Goal_kpi_des  = $(this).data('depdes');
        var Dep_Goal_kpi_id   = $(this).data('kpiid');
        var Dep_Goal_id       = $(this).data('depgid');
        var Org_Goal_id       = $(this).data('orgid');
        $('#edit_Dep_goalKPI_error1').css('display', 'none');
        $('#Dep_goal_edit_kpi').val(Dep_Goal_kpi_id);
        $('#Dep_goal_id_edit_kpi').val(Dep_Goal_id);
        $('#Org_edit_kpi_id').val(Org_Goal_id);
        $('#Dep_EditgoalKPI').val(Dep_Goal_kpi_des.replace(/[+]/gi, ' '));
        $('#DepGoal_EditKIPDiv').css('display', 'block');
        
    });
   //For updating the department goal KPI
   $(document).on("click", "#btn_submit_EditDepGoalKPI", function () {
         var dep_goal_kpi_des =  document.getElementById("Dep_EditgoalKPI").value;
         var dep_goal_kpi_id  =  document.getElementById("Dep_goal_edit_kpi").value;
         var dep_goal_id      =  document.getElementById("Dep_goal_id_edit_kpi").value;
         var org_goal_id      =  document.getElementById("Org_edit_kpi_id").value;

          if(dep_goal_kpi_des == null || dep_goal_kpi_des == "")
           {
              document.getElementById("Dep_EditgoalKPI").focus();
              $('#Dep_EditgoalKPI').css('borderColor', 'red');
              $('#Dep_Edit_kpi_label').css('color', 'red');
              $('#edit_Dep_goalKPI_error1').css('color', 'red');
              $('#edit_Dep_goalKPI_error1').css('display', 'block');
           }
           else
           {
              $('#Dep_EditgoalKPI').css('borderColor', '');
              $('#Dep_Edit_kpi_label').css('color', '');
              $('#edit_Dep_goalKPI_error1').css('display', 'none');
          //saving the department kpi
           $.ajax({
                   url: "<?php echo base_url("Forum/Ajax_edit_dep_kpi");?>",
                   type: "POST",
                   cache: false,
                   data: { Dep_kpi_des:dep_goal_kpi_des,Org_id:org_goal_id,dep_goalid:dep_goal_id,dep_kpi_id:dep_goal_kpi_id},
                   success: function(data){ 
                    $('#Dep_goal_edit_kpi').val('');
                    $('#Dep_goal_id_edit_kpi').val('');
                    $('#Org_edit_kpi_id').val('');
                    $('#Dep_EditgoalKPI').val('');
                    $('#DepGoal_EditKIPDiv').css('display', 'none');
                    View_Department_KPIs(org_goal_id,dep_goal_id);
                   }
                  });
           }
   });


   //For updating the department goal KPI
   $(document).on("click", "#Delete_dep_kpi", function () {
  
        var Dep_Goal_kpi_id   = $(this).data('kpiid');
        var Dep_Goal_id       = $(this).data('depgid');
        var Org_Goal_id       = $(this).data('orgid');
       //saving the department kpi orgid
       $.ajax({
                   url: "<?php echo base_url("Forum/Ajax_delete_dep_kpi");?>",
                   type: "POST",
                   cache: false,
                   data: { dep_goalid:Dep_Goal_id,dep_kpi_id:Dep_Goal_kpi_id,org_goal:Org_Goal_id},
                   success: function(data){ 
                   View_Department_KPIs(Org_Goal_id,Dep_Goal_id);
                 
                   }
                  });
   });
    //The function to enable organizational goal list
    function PDP_View_OGoal()
     {
       
        var SetupType   = document.getElementById("kms_input_PDP_setup_type").value;
        //View organization goals  list under the department goal
       $.ajax({
              url: "<?php echo base_url("Forum/Ajax_view_orgGoal_List");?>",
              type: "POST",
              cache: false,
              data: { user_id: "<?php echo $this->session->userdata('kms_emp_id');?>"},
              success: function(data){
                if(SetupType == "TMG"){  $('#View_teamMember_goals_list').html(data);  }
              }
              });
       
     }

    //For add new team member goal 
    $(document).on("click", "#Btn_add_new_tm_goal", function () {
      $('#TMGoal_NewKIPDiv').css('display', 'none');
      $('#TmemberGoal_EditGoalDiv').css('display', 'none');
      $('#TmemberGoal_NewGoalDiv').css('display', 'block');
    });

   function  PDP_Selected_OGoal_Val_tmg()
   {
      var Org_selected   = document.getElementById("pdp_org_goal_selected_val_tmg").value;
      $('#View_teamMember_dep_list').css('display', 'none');
      $('#pdp_dep_goal_selected_val_tmg').val("Please select the Department goal here...").change();
      if(Org_selected == 0 )
      {
        $('#pdp_org_goal_selected_val_label_tmg').css('color', 'red');
        $('#pdp_org_goal_selected_val_tmg').css('borderColor', 'red');
        $('#View_teamMember_dep_list').css('display', 'none');
        $('#tmg_view_dgoal_error1').css('display', 'none');
        $('#View_teamMember_Goal').css('display', 'none'); 
        $('#tmg_view_ogoal_error1').css('display', 'block');
        
      }
      else if(Org_selected != 0)
      {
        $('#pdp_org_goal_selected_val_label_tmg').css('color', '');
        $('#pdp_org_goal_selected_val_tmg').css('borderColor', '');
        $('#tmg_view_ogoal_error1').css('display', 'none');
        $('#tmg_view_dgoal_error1').css('display', 'none');
        List_Departmental_goal(Org_selected);
        $('#View_teamMember_dep_list').css('display', 'block');
      }
      
   
   }

   function List_Departmental_goal(Org_Goal)
   {
    $.ajax({
              url: "<?php echo base_url("Forum/Ajax_view_DepGoal_List");?>",
              type: "POST",
              cache: false,
              data: { Org_Goal_id: Org_Goal},
              success: function(data){
                $('#View_teamMember_dep_list').html(data);
              }
              });

   }

   function PDP_Selected_DGoal_Val_tmg()
   {
        var Dep_Goal_selected =    document.getElementById("pdp_dep_goal_selected_val_tmg").value;
        var Org_selected      =    document.getElementById("pdp_org_goal_selected_val_tmg").value;
          $('#Des_tm_goal_label_add').css('color', '');
          $('#tm_goal').css('borderColor', '');
          $('#Des_tm_goal_label_edit').css('color', '');
          $('#tm_goal_edit').css('borderColor', '');
          $('#TmemberGoal_NewGoalDiv').css('display', 'none');
          $('#TmemberGoal_EditGoalDiv').css('display', 'none');
          if(Dep_Goal_selected  == 0)
          {
               $('#pdp_dep_goal_selected_val_label_tmg').css('color', 'red');
               $('#pdp_dep_goal_selected_val_tmg').css('borderColor', 'red');
               $('#View_teamMember_Goal').css('display', 'none');
               $('#tmg_view_dgoal_error1').css('display', 'block');
          } else if(Dep_Goal_selected  != 0 )
          {
               $('#tmg_error1').css('display', 'none');
               $('#tmg_view_dgoal_error1').css('display', 'none');
               $('#pdp_dep_goal_selected_val_label_tmg').css('color', '');
               $('#pdp_dep_goal_selected_val_tmg').css('borderColor', '');
               View_TeamMember_Goal(Org_selected,Dep_Goal_selected);
               $('#View_teamMember_Goal').css('display', 'block');
          }
     
   }
   //This shall return the team member goals
   function View_TeamMember_Goal(Org_selected,Dep_Goal_selected)
      {
        $.ajax({
                  url: "<?php echo base_url("Forum/Ajax_view_tmg_goal");?>",
                  type: "POST",
                  cache: false,
                  data: { Org_goal: Org_selected,Dep_goal:Dep_Goal_selected},
                  success: function(data){
                    $('#View_tmg_goal').html(data);
                    $('#dep_goal').val(Dep_Goal_selected);
                    $('#org_goal').val(Org_selected);
                  }
              });
      }

   //For add new team member goal 
   $(document).on("click", "#btn_submit_TMGoal_save", function () {
        var Dep_Goal_selected =    document.getElementById("dep_goal").value;
        var Org_selected      =    document.getElementById("org_goal").value;
        var TM_Goal_Desp      =    document.getElementById("tm_goal").value;

        //tmg_error1

        if(TM_Goal_Desp == null || TM_Goal_Desp == "")
        {
          $('#tmg_error1').css('display', 'block');
          $('#Des_tm_goal_label_add').css('color', 'red');
          $('#tm_goal').css('borderColor', 'red');
        }
        else if(TM_Goal_Desp != null || TM_Goal_Desp != "")
        {
          $('#tmg_error1').css('display', 'none');
          $('#Des_tm_goal_label_add').css('color', '');
          $('#tm_goal').css('borderColor', '');
          $.ajax({
                  url: "<?php echo base_url("Forum/Ajax_add_tmg_goal");?>",
                  type: "POST",
                  cache: false,
                  data: { Org_goal: Org_selected,Dep_goal:Dep_Goal_selected,Tm_goal:TM_Goal_Desp},
                  success: function(data){
                    if(data == 1)
                    { 
                      $('#dep_goal').val(''); $('#org_goal').val(''); $('#tm_goal').val('');
                      $('#TmemberGoal_NewGoalDiv').css('display', 'none'); View_TeamMember_Goal(Org_selected,Dep_Goal_selected);  } else {
                         
                         }
                  }
              });
        }     
    });
 
  //For editing team member goal 
    $(document).on("click", "#Edit_tmgoal", function () {
      var Tmember_goal_id   = $(this).data('tmid');
      var Dep_Goal_id       = $(this).data('depgoal');
      var Org_Goal_id       = $(this).data('orgoal');
      var Tmember_goal_des  = $(this).data('tmdes');

      $('#tm_goal_edit').val(Tmember_goal_des.replace(/[+]/gi, ' '));
      $('#tm_goal_edit_id').val(Tmember_goal_id);
      $('#dep_goal_edit').val(Dep_Goal_id);
      $('#org_goal_edit').val(Org_Goal_id);
      $('#Des_tm_goal_label_edit').css('color', '');
      $('#tm_goal_edit').css('borderColor', '');
      $('#tmg_error1_edit').css('display', 'none');
      $('#TmemberGoal_NewGoalDiv').css('display', 'none');
      $('#TMGoal_NewKIPDiv').css('display', 'none')
      $('#TmemberGoal_EditGoalDiv').css('display', 'block');
    });

  //For editing team member goal submit button
    $(document).on("click", "#btn_submit_TMGoal_edit", function () {
        var Dep_Goal_selected =    document.getElementById("dep_goal_edit").value;
        var Org_selected      =    document.getElementById("org_goal_edit").value;
        var TM_Goal_id        =    document.getElementById("tm_goal_edit_id").value;
        var TM_Goal_Desp      =    document.getElementById("tm_goal_edit").value;
        if(TM_Goal_Desp == "" || TM_Goal_Desp == null)
         {
          $('#Des_tm_goal_label_edit').css('color', 'red');
          $('#tm_goal_edit').css('borderColor', 'red');
          $('#tmg_error1_edit').css('display', 'block');
         }
        else if(TM_Goal_Desp != "" || TM_Goal_Desp != null)
         {  $('#Des_tm_goal_label_edit').css('color', '');
            $('#tm_goal_edit').css('borderColor', '');
          $.ajax({
                  url: "<?php echo base_url("Forum/Ajax_edit_tmg_goal");?>",
                  type: "POST",
                  cache: false,
                  data: { Org_goal: Org_selected,Dep_goal:Dep_Goal_selected,Tm_goal:TM_Goal_Desp,Tm_goalid:TM_Goal_id},
                  success: function(data){
                    if(data == 1)
                    {  $('#TmemberGoal_EditGoalDiv').css('display', 'none');
                       View_TeamMember_Goal(Org_selected,Dep_Goal_selected);
                    }else{ 
                       $('#TmemberGoal_EditGoalDiv').css('display', 'none'); 
                       View_TeamMember_Goal(Org_selected,Dep_Goal_selected); 
                       }
                  }
              });
         }
       
    });
   
    //For delete team member goal 
    $(document).on("click", "#Delete_tmgoal", function () {
          var Tmember_goal_id   =    $(this).data('tmgid');
          var Dep_Goal_id       =    $(this).data('depgoal');
          var Org_Goal_id       =    $(this).data('orgoal');
          $.ajax({
                      url: "<?php echo base_url("Forum/Ajax_delete_tmg_goal");?>",
                      type: "POST",
                      cache: false,
                      data: { Tm_goalid:Tmember_goal_id,DepGoal:Dep_Goal_id,OrgGoal:Org_Goal_id},
                      success: function(data){
                        if(data == 1)
                        {   View_TeamMember_Goal(Org_Goal_id,Dep_Goal_id); }
                        else
                        {  View_TeamMember_Goal(Org_Goal_id,Dep_Goal_id);  }
                      }
                  });
    });

//This shall enalbe the form for adding a new team member goal
  $(document).on("click", "#Add_tmgoal_kpi", function () {
          var Tmember_goal_id   =    $(this).data('tmid');
          var Tmember_goal_desc =    $(this).data('tmdes');
          var Dep_Goal_id       =    $(this).data('depgoal');
          var Org_Goal_id       =    $(this).data('orgoal');

          $('#TMgoal_kpi').val(Tmember_goal_id);
          $('#TMgoal_Dpgoal').val(Dep_Goal_id);
          $('#TMgoal_Orgoal').val(Org_Goal_id);
          $('#TMgoalKPI_error1').css('display', 'none');
          $('#TmemberGoal_NewGoalDiv').css('display', 'none');
          $('#TmemberGoal_EditGoalDiv').css('display', 'none');
          $('#TMGoal_NewKIPDiv').css('display', 'block');
      });

//This will send dat to the db
 $(document).on("click", "#btn_submit_TMGoalKPI", function () {
        var Dep_Goal_selected =    document.getElementById("TMgoal_Dpgoal").value;
        var Org_selected      =    document.getElementById("TMgoal_Orgoal").value;
        var TM_Goal_id        =    document.getElementById("TMgoal_kpi").value;
        var TM_Goal_Desp      =    document.getElementById("Tm_goalKPI_des").value;
        
        if(TM_Goal_Desp == null || TM_Goal_Desp == "")
        { 
          $('#Des_TMGkpi_label').css('color', 'red');
          $('#Tm_goalKPI_des').css('borderColor', 'red');
          document.getElementById("Tm_goalKPI_des").focus();
          $('#TMgoalKPI_error1').css('display', 'block');
        }else if(TM_Goal_Desp != null && TM_Goal_Desp != "")
        {
          $('#TMgoalKPI_error1').css('display', 'none');
          $('#Des_TMGkpi_label').css('color', '');
          $('#Tm_goalKPI_des').css('borderColor', '');
          $('#TMGoal_NewKIPDiv').css('display', 'none');
          $('#Tm_goalKPI_des').val('');
          $.ajax({
                  url: "<?php echo base_url("Forum/Ajax_add_tmg_kpi");?>",
                  type: "POST",
                  cache: false,
                  data: { Tm_goalid:TM_Goal_id,DepGoal:Dep_Goal_selected,OrgGoal:Org_selected,TmGoal_des:TM_Goal_Desp},
                  success: function(data){
                  if(data == 1)
                  {   View_TeamMember_Goal(Org_selected,Dep_Goal_selected); }
                  else
                  {  View_TeamMember_Goal(Org_selected,Dep_Goal_selected);  }
                       }
                  });
        }
         
      });

      //This shall be used to view the created kpi team meamber 
    $(document).on("click", "#View_KPIS_Link", function () {
         
         var Goal_kpi_des  = $(this).data('orgdes');
         var Goal_id  = $(this).data('gid');
         var GKPI_no  = $(this).data('kpino');
         $('#Org_kpi_label_view_error1').css('display', 'none');
         $('#OrgGoal_EditKIPDiv').css('display', 'none');
         $('#OrgGoal_AddmeasureTargetDiv').css('display', 'none');
         
         
         if(GKPI_no == 0)
         {
          document.getElementById("Org_kpi_label").innerHTML = Goal_kpi_des.replace(/[+]/gi, ' ')+" measure (s)";
          $('#Org_kpi_label_view_error1').css('display', 'block');
          $('#Org_view_kpis').css('display', 'none');
         
         }
         else if(GKPI_no != 0)
         {
          document.getElementById("Org_kpi_label").innerHTML = Goal_kpi_des.replace(/[+]/gi, ' ')+" measure (s)";
          $('#Org_view_kpis').css('display', 'block');
          View_Organisation_KPIs(Goal_id);
         }
        
           $('#modal_view_org_pki').modal('toggle');
       
        });

         //This will return organisation goals kpi per organization goal
         function View_TMGoal_KPIs(selectTMGoal)
              {
                //Reload the organisation goals kpi
                $.ajax({
                   url: "<?php echo base_url("Forum/Ajax_view_tmg_kpi");?>",
                   type: "POST",
                   cache: false,
                   data: {TMGoal_id:selectTMGoal},
                   success: function(data){
                   $('#View_TeamMember_goals_kpi').html(data);       
                   }
                  });
              }

       //This shall be used to view the created kpi against the organisational goal  "
    $(document).on("click", "#View_tmgoal_kpi", function () {
         
         var TMGoal_des  = $(this).data('tmgdes');
         var OGoal_id    = $(this).data('orgoal');
         var DGoal_id    = $(this).data('depgoal');
         var TMGoal_id   = $(this).data('tmgid');
         var TMGKpi_no   = $(this).data('tmkpino');

        $('#TmemberGoal_NewGoalDiv').css('display', 'none');
        $('#TmemberGoal_EditGoalDiv').css('display', 'none');
        $('#TMGoal_NewKIPDiv').css('display', 'none');
        $('#TMGoal_EditKIPDiv').css('display', 'none');
        $('#edit_TMGoalKPI_error1').css('display', 'none');
         
         if(TMGKpi_no == 0)
         {
           document.getElementById("TMG_kpi_label").innerHTML = TMGoal_des.replace(/[+]/gi, ' ')+" measure(s)";
           $('#tmgoal_kpi_label_view_error1').css('display', 'block');
           $('#TMGoal_view_kpis').css('display', 'none');
         }
         else if(TMGKpi_no > 0)
         {
           document.getElementById("TMG_kpi_label").innerHTML = TMGoal_des.replace(/[+]/gi, ' ')+" measure(s)";
           $('#tmgoal_kpi_label_view_error1').css('display', 'none');
           $('#TMGoal_view_kpis').css('display', 'block');

           //
           View_TMGoal_KPIs(TMGoal_id);
         }
           
           $('#dgoal_id').val(DGoal_id);
           $('#ogoal_id').val(OGoal_id);
           
           $('#modal_view_tmgoal_kpi').modal('toggle');
        });
       //This shall be used to view the created kpi team meamber 
    $(document).on("click", "#TMGoal_kpi_edit", function () {
         
        var Goal_kpi_des  = $(this).data('kpides');
        var GKPI_id       = $(this).data('kpiid');
        var Goal_id       = $(this).data('goalid');
        
        $('#TMG_EditKPI').val(Goal_kpi_des.replace(/[#]/gi, ' '));
        $('#TMgoal_edit_kpi_id').val(GKPI_id);
        $('#TMGoalid').val(Goal_id);
        $('#TMGoal_EditKIPDiv').css('display', 'block');
      
        });

  //This will be used to edit the team meber goal pki as below
 $(document).on("click", "#btn_submit_EditTMGoalKPI", function () {
 
        var TM_Goal_kpiid     =    document.getElementById("TMgoal_edit_kpi_id").value;
        var TM_Goal_kpiDesp   =    document.getElementById("TMG_EditKPI").value;
        var TM_Goal_id        =    document.getElementById("TMGoalid").value;
 
        if(TM_Goal_kpiDesp == null || TM_Goal_kpiDesp == "")
        { 
          $('#TMGoal_EditgoalKPI_label').css('color', 'red');
          $('#TMG_EditKPI').css('borderColor', 'red');
          document.getElementById("TMGoal_EditgoalKPI").focus();
          $('#edit_TMGoalKPI_error1').css('display', 'block');
        }
    
        else if(TM_Goal_kpiDesp != null && TM_Goal_kpiDesp != "")
        {
          $('#edit_TMGoalKPI_error1').css('display', 'none');
          $('#TMGoal_EditgoalKPI_label').css('color', '');
          $('#TMGoal_EditgoalKPI').css('borderColor', '');
          $('#TMGoal_EditKIPDiv').css('display', 'none');
          $('#TMGoal_EditgoalKPI').val('');
          $.ajax({
                  url: "<?php echo base_url("Forum/Ajax_edit_tmg_kpi");?>",
                  type: "POST",
                  cache: false,
                  data: { Tm_goal_kpi_id:TM_Goal_kpiid,TmGoal_kpides:TM_Goal_kpiDesp},
                  success: function(data){
                  if(data == 1)
                  {  View_TMGoal_KPIs(TM_Goal_id); }
                  else
                  {  View_TMGoal_KPIs(TM_Goal_id);  }
                       }
                  });
        }
        
      });

     
    //For delete team member goal 
    $(document).on("click", "#TMGoal_kpi_delete", function () {
     
          var Tmember_goal_id   =    $(this).data('goalid');
          var Tmgoal_kpi_id     =    $(this).data('kpiid');
      
          $.ajax({
                      url: "<?php echo base_url("Forum/Ajax_delete_tmg_goal_kpi");?>",
                      type: "POST",
                      cache: false,
                      data: { Tm_goalid:Tmember_goal_id,TMGKpi:Tmgoal_kpi_id},
                      success: function(data){
                        if(data == 1)
                        {   View_TMGoal_KPIs(Tmember_goal_id);}
                        else
                        {   View_TMGoal_KPIs(Tmember_goal_id);  }
                      }
                  });
    });

    $(document).on('hide.bs.modal','#modal_view_tmgoal_kpi', function () {
        var OGoal_id        =    document.getElementById("ogoal_id").value;
        var DGoal_id        =    document.getElementById("dgoal_id").value;
       View_TeamMember_Goal(OGoal_id,DGoal_id);
    });

    function ListOrg_Goals(ty)
    {  
       //This will bring the organization goal list
       $.ajax({
                url: "<?php echo base_url("Forum/Ajax_view_orgGoal_List_tmg");?>",
                type: "POST",
                cache: false,
                data: { t:ty },
                success: function(data)
                { 
                  if(ty == 3)
                  {
                    $('#View_Accomptype_orgGoal_div').html(data);
                    $('#View_Accomptype_orgGoalMeasure_div').css('display','none');
                  }
                  else
                  {
                    $('#View_org_goals_list').html(data); 
                  }
                     
                }
                });     
    }


    //
    //For adding a target on an org measure
    $(document).on("click", "#Add_measure_target", function () {
     
     var OGoal_id       =    $(this).data('gid');
     var Measure_id     =    $(this).data('kpiid');
     $('#Org_goal_id').val(OGoal_id);
     $('#Org_goal_measure_id').val(Measure_id);
     $('#AddOrgMeasureTarget_error1').css('display', 'none');
     $('#OrgGoal_AddmeasureTargetDiv').css('display', 'block');   
    });

     //This is for add measure target button
     $(document).on("click", "#btn_submit_AddOrgMeasureTarget", function () 
        {
            var org_measure      =  document.getElementById("Org_goal_measure_id").value;
            var org_goal_id      =  document.getElementById("Org_goal_id").value;
            var org_target_des =  document.getElementById("AddOrgMeasureTarget").value;

            if(org_target_des == "" || org_target_des == null)
            {
              document.getElementById('AddOrgMeasureTarget').focus();
              $('#AddOrgMeasureTarget').css('borderColor', 'red');
              $('#AddOrgMeasureTarget_label').css('color', 'red');
              $('#AddOrgMeasureTarget_error1').css('color', 'red');
              $('#AddOrgMeasureTarget_error1').css('display', 'block');
            }
            else
            {
              $('#AddOrgMeasureTarget_error1').css('display', 'none');
              $('#OrgGoal_AddmeasureTargetDiv').css('display', 'none');
              $('#Org_goal_id').val("");
              $('#Org_goal_measure_id').val("");
              $('#AddOrgMeasureTarget').val("");
               //save the organisation goal measure target
               $.ajax({
                   url: "<?php echo base_url("Forum/Ajax_add_MeasureTarget");?>",
                   type: "POST",
                   cache: false,
                   data: { Org_goalid:org_goal_id,Org_measure_id:org_measure,Org_target_desc:org_target_des},
                   success: function(data){ if(data == 1)  { View_Organisation_KPIs(org_goal_id);  } else{}
                   }
                  });

            }
          
        });

        
    //For adding a target on an org measure
    $(document).on("click", "#Add_dept_target", function () {
    
     var DGoal_id       =    $(this).data('depgid');
     var OGoal_id       =    $(this).data('orgid');
     var Measure_id     =    $(this).data('kpiid');
     var Measure_des    =    $(this).data('mesdes');
     $('#Dep_add_target_dpid').val(DGoal_id);
     $('#Dep_add_target_ogid').val(OGoal_id);
     $('#Dep_add_target_measureid').val(Measure_id);
     $("#Dep_add_target").attr("placeholder", "Enter your \'"+Measure_des.replace(/[!]/gi, ' ')+"\' target...");
     $('#DepGoal_target').css('display', 'block');
   
    });

    // submiting the department target details
    $(document).on("click", "#btn_submit_dep_target", function () {
    
      var org_measureid    =  document.getElementById("Dep_add_target_measureid").value;
      var org_goal_id      =  document.getElementById("Dep_add_target_ogid").value;
      var dep_goal_id      =  document.getElementById("Dep_add_target_dpid").value;
      var dep_target_des   =  document.getElementById("Dep_add_target").value;
      
      if(dep_target_des == "" || dep_target_des == null)
        {
              document.getElementById('Dep_add_target').focus();
              $('#Dep_add_target').css('borderColor', 'red');
              $('#Dep_add_target_error1').css('color', 'red');
              $('#Dep_add_target_label').css('color', 'red');
              $('#Dep_add_target_error1').css('display', 'block');
        }
        else
        {
              $('#Dep_add_target_error1').css('display', 'none');
              $('#DepGoal_target').css('display', 'none');
              $('#Dep_add_target_dpid').val("");
              $('#Dep_add_target_ogid').val("");
              $('#Dep_add_target_measureid').val("");
               //save the department goal measure target
               $.ajax({
                   url: "<?php echo base_url("Forum/Ajax_add_DepMeasureTarget");?>",
                   type: "POST",
                   cache: false,
                   data: { Org_goalid:org_goal_id,Org_measure_id:org_measureid,Org_target_desc:dep_target_des,Dep_goal:dep_goal_id },
                   success: function(data){ if(data == 1)  {
                      View_Department_KPIs(org_goal_id,dep_goal_id);
                    } else{}
                   }
                  });
        }
   });

   /** ---------------------------------Button navigation------------------------------- */
   //
    //For adding a target on an org measure
    $(document).on("click", "#btn_back_newpdp_first", function () {
        
       $('#btn_back_newpdp_first').css('display', 'none');
        $('#Div_addNew_Pdp_first').css('display', 'none');
        $('#add_pdp_org_goal_selected_val_error5').css('display', 'none');
        $('#btn_addNew_pdp').css('display', 'block');
        $('#View_org_measure_list').css('display', 'none');
        $('#add_pdp_target_div').css('display', 'none');
        $('#add_pdp_accomplishment_count').css('display', 'none');
        $('#add_pdptable_form_div').css('display', 'none');
        $('#pdp_intro_table').css('display', 'block');
        $("#add_pdp_accomplishment_count_value").val(0).change();
        $('#addPdp_SecondPage_div').css('display', 'none');
      
    });
    //This function will return the measures for the selected org goal
    function View_OrgMeasure(org_goal_id,ty)
    {
      $.ajax({
                   url: "<?php echo base_url("Forum/Ajax_ViewList_OrgMeasure");?>",
                   type: "POST",
                   cache: false,
                   data: { Org_goalid:org_goal_id,t:ty},
                   success: function(data){ 
                     if(ty == 1 )
                     {
                      $('#View_org_measure_list').html(data);
                     }else if(ty == 3)
                     {
                      $('#View_Accomptype_orgGoalMeasure_div').html(data);
                     }
                     else{}
                    
                   }
                  });

    }

    //For onchange on selected organisational goal
    function PDP_Selected_OGoal_Val_NewPdpd()
    {
      var Org_selected   = document.getElementById("add_pdp_org_goal_selected_val").value;
      if(Org_selected == 0)
      {
        $('#add_pdp_org_goal_selected_val_label').css('color', 'red');
        $('#add_pdp_org_goal_selected_val').css('borderColor', 'red');
        document.getElementById("add_pdp_org_error5").innerHTML = "Please select an organisation goal to continue";
        $('#View_org_measure_list').css('display', 'none');
        $('#add_pdp_reportmonth').css('display', 'none');
        $('#add_pdp_target_div').css('display', 'none');
        $('#add_pdp_accomplishment_count').css('display', 'none');
        $('#add_pdptable_form_div').css('display', 'none');
        $('#add_pdp_month_select_div').css('display', 'none');
        
      }
      else
      {
        $('#add_pdp_org_goal_selected_val_label').css('color', '');
        $('#add_pdp_org_goal_selected_val').css('borderColor', '');
        document.getElementById("add_pdp_org_error5").innerHTML = "";
        View_OrgMeasure(Org_selected,1);
        $('#View_org_measure_list').css('display', 'block');
      }
     
    }
    //This will fetch the set target for the measure
    function View_OrgTarget(org_goal_id,Org_Measure_id,ty)
    {
      $.ajax({
                   url: "<?php echo base_url("Forum/Ajax_ViewList_OrgTarget");?>",
                   type: "POST",
                   cache: false,
                   data: { Org_goalid:org_goal_id,Org_measure:Org_Measure_id,t:ty},
                   success: function(data){ 
                     if(ty == 1)
                     {
                        $('#add_pdp_target_div').html(data);
                        $('#add_pdp_month_select_div').css('display', 'block');
                     }
                     else if(ty == 3)
                     {
                        $('#View_Accomptype_orgGoalTarget_div').html(data);
                        $('#View_Accomptype_orgGoalTarget_div').css('display','block');
                        
                     }
                     else{}
                   }
                  });
    }
    //For on change for the select org measure, it will list the targets for the selected measure
    function PDP_Selected_OMeasure_Val()
    {
      var Measure_selected   = document.getElementById("add_pdp_org_measure_selected_val").value;
      var Org_selected       = document.getElementById("add_pdp_org_goal_selected_val").value;
     
      if(Measure_selected == 0)
      {
        $('#add_pdp_org_measure_selected_val_label').css('color', 'red');
        $('#add_pdp_org_measure_selected_val').css('borderColor', 'red');
        document.getElementById("add_pdp_orgMeasure_error5").innerHTML = "Please select a goal measure to continue";
        $('#add_pdp_target_div').css('display', 'none');
        $('#add_pdp_month_select_div').css('display', 'none');
        $('#add_pdp_accomplishment_count').css('display','none');
      }
       else
      {
        $('#add_pdp_org_measure_selected_val_label').css('color', '');
        $('#add_pdp_org_measure_selected_val').css('borderColor', '');
        document.getElementById("add_pdp_orgMeasure_error5").innerHTML = "";
        View_OrgTarget(Org_selected,Measure_selected,1);
        $('#add_pdp_target_div').css('display', 'block');
        $("#add_pdp_accomplishment_count_value").val(0).change();
        $("#add_pdp_month_value").val(0).change();
        //$('#add_pdp_accomplishment_count_label').css('color', '');
      //  $('#add_pdp_accomplishment_count_value').css('borderColor', '');
        document.getElementById("add_pdp_accomplishment_count_error").innerHTML = ""; 
        document.getElementById("add_pdp_month_error").innerHTML = ""; 
        
        
        
      }
    
      
    }

    
    

    //This will handle the accomplishment count function
    function PDP_Selected_AccomplishmentCount_Val()
    {
      var Count_selected   = document.getElementById("add_pdp_accomplishment_count_value").value;
      var Input_count;
      if(Count_selected == 0)
      { $('#add_pdptable_form_div').css('display', 'none');
        $('#btn_addNew_pdp_NextDept').css('display', 'none');
       // $('#add_pdp_month_select_div').css('display', 'none');
        $('#add_pdp_accomplishment_count_label').css('color', 'red');
        $('#add_pdp_accomplishment_count_value').css('borderColor', 'red');
        document.getElementById("add_pdp_accomplishment_count_error").innerHTML = "Accomplishments missing"; 
      }else
      {     $('#btn_addNew_pdp_NextDept').css('display', 'block');
            //$('#add_pdp_month_select_div').css('display', 'block');
            $('#add_pdp_accomplishment_count_label').css('color', '');
            $('#add_pdp_accomplishment_count_value').css('borderColor', '');
            document.getElementById("add_pdp_accomplishment_count_error").innerHTML = ""; 
            if(Count_selected != 0 && Count_selected == 1)
          {
            $('#add_pdptable_form_div').css('display', 'block');
            $('#add_pdp_form_table .add_pdp_org_accomp_row_1').show();
            $('#add_pdp_form_table .add_pdp_org_accomp_row_2').hide();
            $('#add_pdp_form_table .add_pdp_org_accomp_row_3').hide();
            $('#add_pdp_form_table .add_pdp_org_accomp_row_4').hide();
            $('#add_pdp_form_table .add_pdp_org_accomp_row_5').hide();
            //Input_count = 1;//
            $('#InputCount_val').val("1");
          }if(Count_selected != 0 && Count_selected == 2)
          { $('#add_pdptable_form_div').css('display', 'block');
            $('#add_pdp_form_table .add_pdp_org_accomp_row_1').show();
            $('#add_pdp_form_table .add_pdp_org_accomp_row_2').show();
            $('#add_pdp_form_table .add_pdp_org_accomp_row_3').hide();
            $('#add_pdp_form_table .add_pdp_org_accomp_row_4').hide();
            $('#add_pdp_form_table .add_pdp_org_accomp_row_5').hide();
            $('#InputCount_val').val("2");
          }if(Count_selected != 0 && Count_selected == 3)
          { $('#add_pdptable_form_div').css('display', 'block');
            $('#add_pdp_form_table .add_pdp_org_accomp_row_1').show();
            $('#add_pdp_form_table .add_pdp_org_accomp_row_2').show();
            $('#add_pdp_form_table .add_pdp_org_accomp_row_3').show();
            $('#add_pdp_form_table .add_pdp_org_accomp_row_4').hide();
            $('#add_pdp_form_table .add_pdp_org_accomp_row_5').hide();
            $('#InputCount_val').val("3");
          }if(Count_selected != 0 && Count_selected == 4)
          { $('#add_pdptable_form_div').css('display', 'block');
            $('#add_pdp_form_table .add_pdp_org_accomp_row_1').show();
            $('#add_pdp_form_table .add_pdp_org_accomp_row_2').show();
            $('#add_pdp_form_table .add_pdp_org_accomp_row_3').show();
            $('#add_pdp_form_table .add_pdp_org_accomp_row_4').show();
            $('#add_pdp_form_table .add_pdp_org_accomp_row_5').hide();
            $('#InputCount_val').val("4");
          }if(Count_selected != 0 && Count_selected == 5)
          { $('#add_pdptable_form_div').css('display', 'block');
            $('#add_pdp_form_table .add_pdp_org_accomp_row_1').show();
            $('#add_pdp_form_table .add_pdp_org_accomp_row_2').show();
            $('#add_pdp_form_table .add_pdp_org_accomp_row_3').show();
            $('#add_pdp_form_table .add_pdp_org_accomp_row_4').show();
            $('#add_pdp_form_table .add_pdp_org_accomp_row_5').show();
            $('#InputCount_val').val("5");
          } else{ }
      }
       
    }

    //The function to proceed to generte pdp form as below
    function Show_NewPDP_NextDept()
    {
      //Navigation buttons
      $('#btn_back_newpdp_first').css('display', 'block');
      $('#btn_back_newpdp_second').css('display', 'none');
     // $('#add_pdp_month_select_div').css('display', 'none');
      
      var InputCount   = document.getElementById("InputCount_val").value;
      if(InputCount == 1)
      {
        var Input_date_1  = document.getElementById("add_pdp_org_accomp_date_1").value;
        var Input_accp_1  = document.getElementById("add_pdp_org_accomp_val_1").value;
        var Input_rate_1  = document.getElementById("add_pdp_accomplishment_rate_value_1").value;
        
        if(Input_date_1 == "" || Input_date_1 == null || Input_accp_1 == "" || Input_accp_1 == null || Input_rate_1 == 0)
        {
          document.getElementById("add_pdp_org_form_error").innerHTML = "Please provide the date and rating for your first accomplishment to proceed"; 
        }else  if(Input_date_1 != "" && Input_accp_1 != "" && Input_rate_1 != 0)
        {
          document.getElementById("add_pdp_org_form_error").innerHTML = ""; 
          Add_NewPDP(InputCount);
        }
       
      }
      else if (InputCount == 2)
      { 
        var Input_date_1  = document.getElementById("add_pdp_org_accomp_date_1").value;
        var Input_accp_1  = document.getElementById("add_pdp_org_accomp_val_1").value;
        var Input_rate_1  = document.getElementById("add_pdp_accomplishment_rate_value_1").value;

        var Input_date_2  = document.getElementById("add_pdp_org_accomp_date_2").value;
        var Input_accp_2  = document.getElementById("add_pdp_org_accomp_val_2").value;
        var Input_rate_2  = document.getElementById("add_pdp_accomplishment_rate_value_2").value;

        
        if(Input_date_1 == "" || Input_date_1 == null || Input_accp_1 == "" || Input_accp_1 == null || Input_rate_1 == 0)
        {
          document.getElementById("add_pdp_org_form_error").innerHTML = "Please provide the date and rating for your first accomplishment to proceed"; 
        }else if ((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 == "" || Input_date_2 == null || Input_accp_2 == "" || Input_accp_2 == null || Input_rate_2 == 0))
        {
          document.getElementById("add_pdp_org_form_error").innerHTML = "Please provide the date and rating for your second accomplishment to proceed"; 
        }else if((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 != "" && Input_accp_2 != "" && Input_rate_2 != 0))
        {
          document.getElementById("add_pdp_org_form_error").innerHTML = ""; 
          Add_NewPDP(InputCount);
        }
        
      }else if (InputCount == 3)
      { 
        var Input_date_1  = document.getElementById("add_pdp_org_accomp_date_1").value;
        var Input_accp_1  = document.getElementById("add_pdp_org_accomp_val_1").value;
        var Input_rate_1  = document.getElementById("add_pdp_accomplishment_rate_value_1").value;

        var Input_date_2  = document.getElementById("add_pdp_org_accomp_date_2").value;
        var Input_accp_2  = document.getElementById("add_pdp_org_accomp_val_2").value;
        var Input_rate_2  = document.getElementById("add_pdp_accomplishment_rate_value_2").value;

        var Input_date_3  = document.getElementById("add_pdp_org_accomp_date_3").value;
        var Input_accp_3  = document.getElementById("add_pdp_org_accomp_val_3").value;
        var Input_rate_3  = document.getElementById("add_pdp_accomplishment_rate_value_3").value;

        if(Input_date_1 == "" || Input_date_1 == null || Input_accp_1 == "" || Input_accp_1 == null || Input_rate_1 == 0)
        {
          document.getElementById("add_pdp_org_form_error").innerHTML = "Please provide the date and rating for your first accomplishment to proceed"; 
        }else if ((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 == "" || Input_date_2 == null || Input_accp_2 == "" || Input_accp_2 == null || Input_rate_2 == 0))
        {
          document.getElementById("add_pdp_org_form_error").innerHTML = "Please provide the date and rating for your second accomplishment to proceed"; 
        }else if ((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 != "" && Input_accp_2 != "" && Input_rate_2 != 0) && (Input_date_3 == "" || Input_date_3 == null || Input_accp_3 == "" || Input_accp_3 == null || Input_rate_3 == 0))
        {
          document.getElementById("add_pdp_org_form_error").innerHTML = "Please provide the date and rating for your third accomplishment to proceed"; 
        }else if((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 != "" && Input_accp_2 != "" && Input_rate_2 != 0) && (Input_date_3 != "" && Input_accp_3 != "" && Input_rate_3 != 0))
        {
          document.getElementById("add_pdp_org_form_error").innerHTML = ""; 
          Add_NewPDP(InputCount);
        }
        
       
      }else if (InputCount == 4)
      { 
        var Input_date_1  = document.getElementById("add_pdp_org_accomp_date_1").value;
        var Input_accp_1  = document.getElementById("add_pdp_org_accomp_val_1").value;
        var Input_rate_1  = document.getElementById("add_pdp_accomplishment_rate_value_1").value;

        var Input_date_2  = document.getElementById("add_pdp_org_accomp_date_2").value;
        var Input_accp_2  = document.getElementById("add_pdp_org_accomp_val_2").value;
        var Input_rate_2  = document.getElementById("add_pdp_accomplishment_rate_value_2").value;

        var Input_date_3  = document.getElementById("add_pdp_org_accomp_date_3").value;
        var Input_accp_3  = document.getElementById("add_pdp_org_accomp_val_3").value;
        var Input_rate_3  = document.getElementById("add_pdp_accomplishment_rate_value_3").value;

        var Input_date_4  = document.getElementById("add_pdp_org_accomp_date_4").value;
        var Input_accp_4  = document.getElementById("add_pdp_org_accomp_val_4").value;
        var Input_rate_4  = document.getElementById("add_pdp_accomplishment_rate_value_4").value;

        if(Input_date_1 == "" || Input_date_1 == null || Input_accp_1 == "" || Input_accp_1 == null || Input_rate_1 == 0)
        {
          document.getElementById("add_pdp_org_form_error").innerHTML = "Please provide the date and rating for your first accomplishment to proceed"; 
        }else if ((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 == "" || Input_date_2 == null || Input_accp_2 == "" || Input_accp_2 == null || Input_rate_2 == 0))
        {
          document.getElementById("add_pdp_org_form_error").innerHTML = "Please provide the date and rating for your second accomplishment to proceed"; 
        }else if ((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 != "" && Input_accp_2 != "" && Input_rate_2 != 0) && (Input_date_3 == "" || Input_date_3 == null || Input_accp_3 == "" || Input_accp_3 == null || Input_rate_3 == 0))
        {
          document.getElementById("add_pdp_org_form_error").innerHTML = "Please provide the date and rating for your third accomplishment to proceed"; 
        }else if ((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 != "" && Input_accp_2 != "" && Input_rate_2 != 0) && (Input_date_3 != "" && Input_accp_3 != "" && Input_rate_3 != 0) &&  (Input_date_4 == "" || Input_date_4 == null || Input_accp_4 == "" || Input_accp_4 == null || Input_rate_4 == 0) )
        {
          document.getElementById("add_pdp_org_form_error").innerHTML = "Please provide the date and rating for your fourth accomplishment to proceed"; 
        }
        else if((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 != "" && Input_accp_2 != "" && Input_rate_2 != 0) && (Input_date_3 != "" && Input_accp_3 != "" && Input_rate_3 != 0) &&  (Input_date_4 != "" && Input_accp_4 != "" && Input_rate_4 != 0))
        {
          document.getElementById("add_pdp_org_form_error").innerHTML = ""; 
          Add_NewPDP(InputCount);
        }
       
      }
      else if (InputCount == 5)
      { 
        var Input_date_1  = document.getElementById("add_pdp_org_accomp_date_1").value;
        var Input_accp_1  = document.getElementById("add_pdp_org_accomp_val_1").value;
        var Input_rate_1  = document.getElementById("add_pdp_accomplishment_rate_value_1").value;

        var Input_date_2  = document.getElementById("add_pdp_org_accomp_date_2").value;
        var Input_accp_2  = document.getElementById("add_pdp_org_accomp_val_2").value;
        var Input_rate_2  = document.getElementById("add_pdp_accomplishment_rate_value_2").value;

        var Input_date_3  = document.getElementById("add_pdp_org_accomp_date_3").value;
        var Input_accp_3  = document.getElementById("add_pdp_org_accomp_val_3").value;
        var Input_rate_3  = document.getElementById("add_pdp_accomplishment_rate_value_3").value;

        var Input_date_4  = document.getElementById("add_pdp_org_accomp_date_4").value;
        var Input_accp_4  = document.getElementById("add_pdp_org_accomp_val_4").value;
        var Input_rate_4  = document.getElementById("add_pdp_accomplishment_rate_value_4").value;

        var Input_date_5  = document.getElementById("add_pdp_org_accomp_date_5").value;
        var Input_accp_5  = document.getElementById("add_pdp_org_accomp_val_5").value;
        var Input_rate_5  = document.getElementById("add_pdp_accomplishment_rate_value_5").value;

        if(Input_date_1 == "" || Input_date_1 == null || Input_accp_1 == "" || Input_accp_1 == null || Input_rate_1 == 0)
        {
          document.getElementById("add_pdp_org_form_error").innerHTML = "Please provide the date and rating for your first accomplishment to proceed"; 
        }else if ((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 == "" || Input_date_2 == null || Input_accp_2 == "" || Input_accp_2 == null || Input_rate_2 == 0))
        {
          document.getElementById("add_pdp_org_form_error").innerHTML = "Please provide the date and rating for your second accomplishment to proceed"; 
        }else if ((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 != "" && Input_accp_2 != "" && Input_rate_2 != 0) && (Input_date_3 == "" || Input_date_3 == null || Input_accp_3 == "" || Input_accp_3 == null || Input_rate_3 == 0))
        {
          document.getElementById("add_pdp_org_form_error").innerHTML = "Please provide the date and rating for your third accomplishment to proceed"; 
        }else if ((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 != "" && Input_accp_2 != "" && Input_rate_2 != 0) && (Input_date_3 != "" && Input_accp_3 != "" && Input_rate_3 != 0) &&  (Input_date_4 == "" || Input_date_4 == null || Input_accp_4 == "" || Input_accp_4 == null || Input_rate_4 == 0) )
        {
          document.getElementById("add_pdp_org_form_error").innerHTML = "Please provide the date and rating for your fourth accomplishment to proceed"; 
        }
        else if ((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 != "" && Input_accp_2 != "" && Input_rate_2 != 0) && (Input_date_3 != "" && Input_accp_3 != "" && Input_rate_3 != 0) &&  (Input_date_4 != "" && Input_accp_4 != "" && Input_rate_4 != 0)  &&  (Input_date_5 == "" || Input_date_5 == null || Input_accp_5 == "" || Input_accp_5 == null || Input_rate_5 == 0) )
        {
          document.getElementById("add_pdp_org_form_error").innerHTML = "Please provide the date and rating for your fifth accomplishment to proceed"; 
        }else if((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 != "" && Input_accp_2 != "" && Input_rate_2 != 0) && (Input_date_3 != "" && Input_accp_3 != "" && Input_rate_3 != 0) &&  (Input_date_4 != "" && Input_accp_4 != "" && Input_rate_4 != 0)  &&  (Input_date_5 != "" && Input_accp_5 != "" && Input_rate_5 != 0))
        {
          document.getElementById("add_pdp_org_form_error").innerHTML = ""; 
          Add_NewPDP(InputCount);
        }
        
       
      }
     
    }
    //To add the new pdp tp the db
    function Add_NewPDP(Count)
    {
        var Input_date_1  = document.getElementById("add_pdp_org_accomp_date_1").value;
        var Input_accp_1  = document.getElementById("add_pdp_org_accomp_val_1").value;
        var Input_rate_1  = document.getElementById("add_pdp_accomplishment_rate_value_1").value;

        var Input_date_2  = document.getElementById("add_pdp_org_accomp_date_2").value;
        var Input_accp_2  = document.getElementById("add_pdp_org_accomp_val_2").value;
        var Input_rate_2  = document.getElementById("add_pdp_accomplishment_rate_value_2").value;

        var Input_date_3  = document.getElementById("add_pdp_org_accomp_date_3").value;
        var Input_accp_3  = document.getElementById("add_pdp_org_accomp_val_3").value;
        var Input_rate_3  = document.getElementById("add_pdp_accomplishment_rate_value_3").value;

        var Input_date_4  = document.getElementById("add_pdp_org_accomp_date_4").value;
        var Input_accp_4  = document.getElementById("add_pdp_org_accomp_val_4").value;
        var Input_rate_4  = document.getElementById("add_pdp_accomplishment_rate_value_4").value;

        var Input_date_5  = document.getElementById("add_pdp_org_accomp_date_5").value;
        var Input_accp_5  = document.getElementById("add_pdp_org_accomp_val_5").value;
        var Input_rate_5  = document.getElementById("add_pdp_accomplishment_rate_value_5").value;

        var Measure_selected   = document.getElementById("add_pdp_org_measure_selected_val").value;
        var Org_selected  = document.getElementById("add_pdp_org_goal_selected_val").value;
        var ReportingMonth  = document.getElementById("add_pdp_month_value").value;
        var Pdp_target    = document.getElementById("add_pdp_org_target_selected_val").value;

        $('#Div_New_Pdp_div').css('display','none');
        $('#btn_addNew_pdp_NextDept').css('display','none');
        $('#btn_back_newpdp_first').css('display','none');
        $('#Div_New_pdp').css('display','none');
        //$('#Div_Generated_pdp').css('display', 'block');
       
        var Count2       =  +Count+ +1;

      
        $.ajax({ //This is for saving the dpd details only withou the accomplishment details
                   url: "<?php echo base_url("Forum/Ajax_AddNewPDP");?>",
                   type: "POST",
                   cache: false,
                   data: { Org_goalid:Org_selected,Org_measure:Measure_selected,RMonth:ReportingMonth,Target:Pdp_target},
                   success: function(data){ 
                        let Inserted_pdp = data;
                     for (let i = 1; i < Count2; i++) //The loop to pass through all the 5 accomplishment input
                        {
                          var Input_date  =  document.getElementById("add_pdp_org_accomp_date_"+i+"").value;
                          var Input_accp  =  document.getElementById("add_pdp_org_accomp_val_"+i+"").value;
                          var Input_rate  =  document.getElementById("add_pdp_accomplishment_rate_value_"+i+"").value;
                          $.ajax({
                                  url: "<?php echo base_url("Forum/Ajax_AddNewPDP_OrgAccomp");?>",
                                  type: "POST",
                                  cache: false,
                                  data: { Org_goalid:Org_selected,Org_measure:Measure_selected,Date:Input_date,Accomp:Input_accp,Rate:Input_rate,Pdp_id:Inserted_pdp },
                                  success: function(data){ 
                                   //  alert(data);
                                  }
                                  });
                        }
                   
                    Show_GeneratedPDP();
                  
                   }
                  }); 

    }

    
     //For back button on the second page 
     $(document).on("click", "#btn_back_newpdp_second", function () {
         $('#btn_back_newpdp_second').css('display','none');
         $('#addPdp_SecondPage_div').css('display','none');
         $('#Div_addNew_Pdp_first').css('display','block');
         $('#btn_back_newpdp_first').css('display','block');
         $('#btn_addNew_pdp_NextDept').css('display','block');  
      });
     function PDP_Selected_Month_Val()
     {
      var Pdp_Month  = document.getElementById("add_pdp_month_value").value;
      if(Pdp_Month == 0)
        {
          document.getElementById("add_pdp_month_error").innerHTML = "Reporting Month Missing"; 
          $('#add_pdp_accomplishment_count').css('display','none');
          
        }
        else if(Pdp_Month != 0)
        {
          document.getElementById("add_pdp_month_error").innerHTML = ""; 
          $('#add_pdp_accomplishment_count_label').css('color', '');
          $('#add_pdp_accomplishment_count_value').css('borderColor', '');
          document.getElementById("add_pdp_accomplishment_count_error").innerHTML = ""; 
          $('#add_pdp_accomplishment_count').css('display','block'); 
          
        }
        
     }
    
   //For adding a accomplishments to a created pdp
   $(document).on("click", "#AddPdp_Accomplishments", function () {
       $('#add_accomp_accomplishment_count_div').css('display','none');
       $('#add_accomp_pdptable_form_div').css('display','none');
       $('#Add_pdp_accomp_btn').css('display','none');
       
       $('#modal_Addpdp_accomplishment').modal('toggle');
     });
     //The function to handle on click for report ype selected
     function PDP_Selected_ReportType()
     {
       var Goal_Type  = document.getElementById("add_pdp_accomptype_selected_val").value;
       if(Goal_Type == 0)
       {
        $('#add_pdp_accomptype_label').css('color', 'red');
        $('#add_pdp_accomptype_selected_val').css('borderColor', 'red');
        document.getElementById("add_pdp_accomptype_error").innerHTML = "Please select goal type to proceed &nbsp;<i class=\"fa fa-hand-o-up\" aria-hidden=\"true\"></i>"; 
        $('#View_Accomptype_orgGoal_div').css('display','none');
        $('#View_Accomptype_orgGoalTarget_div').css('display','none');
        $('#View_Accomptype_orgGoalMeasure_div').css('display','none');
        
      }else if (Goal_Type != 0 && Goal_Type == 1)
       {
        $('#add_pdp_accomptype_label').css('color', '');
        $('#add_pdp_accomptype_selected_val').css('borderColor', '');
        document.getElementById("add_pdp_accomptype_error").innerHTML = ""; 
        $('#View_Accomptype_orgGoal_div').css('display','block');
        $('#View_Accomptype_orgGoalMeasure_div').css('display','none');
        ListOrg_Goals(3);
      
       }else if (Goal_Type != 0 && Goal_Type == 2)
       {
        $('#add_pdp_accomptype_label').css('color', '');
        $('#add_pdp_accomptype_selected_val').css('borderColor', '');
        document.getElementById("add_pdp_accomptype_error").innerHTML = ""; 
        $('#View_Accomptype_orgGoal_div').css('display','none');
        $('#View_Accomptype_orgGoalMeasure_div').css('display','none');
       }
       else{}

     }
    
     function Accomp_Selected_OGoal_Val()
     {
      var Goal_selected  = document.getElementById("add_pdp_accompOrg_selected_val").value;
      if(Goal_selected == 0)
      {
        $('#add_pdp_accompOrg_label').css('color', 'red');
        $('#add_pdp_accompOrg_selected_val').css('borderColor', 'red');
        document.getElementById("add_pdp_accompOrg_error").innerHTML = "Please select the organisation goal &nbsp;<i class=\"fa fa-hand-o-up\" aria-hidden=\"true\"></i>"; 
        $('#View_Accomptype_orgGoalMeasure_div').css('display','none');
        $('#View_Accomptype_orgGoalTarget_div').css('display','none');
        $('#add_accomp_accomplishment_count_div').css('display','none');
        $('#add_accomp_pdptable_form_div').css('display','none');
        $("#add_accomp_accomplishment_count_value").val(0).change();
        $('#add_accomp_accomplishment_count_label').css('color', '');
        $('#add_accomp_accomplishment_count_value').css('borderColor', '');
        document.getElementById("add_accomp_accomplishment_count_error").innerHTML = ""; 
        
      }else if(Goal_selected != 0)
      {
        $('#add_pdp_accompOrg_label').css('color', '');
        $('#add_pdp_accompOrg_selected_val').css('borderColor', '');
        document.getElementById("add_pdp_accompOrg_error").innerHTML = ""; 
        View_OrgMeasure(Goal_selected,3);
        $('#View_Accomptype_orgGoalMeasure_div').css('display','block');
        $('#add_accomp_accomplishment_count_div').css('display','none');
        //

      }
      
      else{}
      
     }
   
     function PDP_Accomp_Selected_OMeasure_Val()
     {
      var GoalMeasure_selected  = document.getElementById("add_accomp_org_measure_selected_val").value;
      var Goal_selected  = document.getElementById("add_pdp_accompOrg_selected_val").value;
      if(GoalMeasure_selected == 0)
      {
        $('#add_accomp_org_measure_selected_val_label').css('color', 'red');
        $('#add_accomp_org_measure_selected_val').css('borderColor', 'red');
        document.getElementById("add_accomp_org_measure_selected_error").innerHTML = "Please select the measure goal &nbsp;<i class=\"fa fa-hand-o-up\" aria-hidden=\"true\"></i>"; 
        $('#View_Accomptype_orgGoalTarget_div').css('display','none');
        $('#add_accomp_accomplishment_count_div').css('display','none');
        $('#add_accomp_pdptable_form_div').css('display','none');
        $("#add_accomp_accomplishment_count_value").val(0).change();
        $('#add_accomp_accomplishment_count_label').css('color', '');
        $('#add_accomp_accomplishment_count_value').css('borderColor', '');
        document.getElementById("add_accomp_accomplishment_count_error").innerHTML = ""; 
      }else if(GoalMeasure_selected != 0)
      {
        $('#add_accomp_org_measure_selected_val_label').css('color', '');
        $('#add_accomp_org_measure_selected_val').css('borderColor', '');
        document.getElementById("add_accomp_org_measure_selected_error").innerHTML = ""; 
        View_OrgTarget(Goal_selected,GoalMeasure_selected,3)
        $('#add_accomp_pdptable_form_div').css('display','none');
        $('#add_accomp_accomplishment_count_div').css('display','block');
       
       
       
      }
      else{}

    }

    //This will handle the accomplishment count function
    function PDP_Selected_AccomplishmentCount2_Val()
    {
      var Count_selected   = document.getElementById("add_accomp_accomplishment_count_value").value;
      
      if(Count_selected == 0)
      { 
        $('#add_accomp_pdptable_form_div').css('display', 'none');
        $('#Add_pdp_accomp_btn').css('display','none');
        //$('#btn_addNew_pdp_NextDept').css('display', 'none');
        // $('#add_pdp_month_select_div').css('display', 'none');
        $('#add_accomp_accomplishment_count_label').css('color', 'red');
        $('#add_accomp_accomplishment_count_value').css('borderColor', 'red');
        document.getElementById("add_accomp_accomplishment_count_error").innerHTML = "Please select number of accomplishments to continue"; 
      }else
      {     // $('#btn_addNew_pdp_NextDept').css('display', 'block');
            //$('#add_pdp_month_select_div').css('display', 'block');
            $('#add_accomp_accomplishment_count_label').css('color', '');
            $('#add_accomp_accomplishment_count_value').css('borderColor', '');
            document.getElementById("add_accomp_accomplishment_count_error").innerHTML = "";
            $('#Add_pdp_accomp_btn').css('display','block'); 
            if(Count_selected != 0 && Count_selected == 1)
          {
            $('#add_accomp_pdptable_form_div').css('display','block');
            $('#add_pdp_form_table .add_pdp_accomp_row_1').show();
            $('#add_pdp_form_table .add_pdp_accomp_row_2').hide();
            $('#add_pdp_form_table .add_pdp_accomp_row_3').hide();
            $('#add_pdp_form_table .add_pdp_accomp_row_4').hide();
            $('#add_pdp_form_table .add_pdp_accomp_row_5').hide();
            //
            $('#InputCount_val_accomp2').val("1");
          }if(Count_selected != 0 && Count_selected == 2)
          { $('#add_accomp_pdptable_form_div').css('display','block');
            $('#add_pdp_form_table .add_pdp_accomp_row_1').show();
            $('#add_pdp_form_table .add_pdp_accomp_row_2').show();
            $('#add_pdp_form_table .add_pdp_accomp_row_3').hide();
            $('#add_pdp_form_table .add_pdp_accomp_row_4').hide();
            $('#add_pdp_form_table .add_pdp_accomp_row_5').hide();
            $('#InputCount_val_accomp2').val("2");
          }if(Count_selected != 0 && Count_selected == 3)
          { $('#add_accomp_pdptable_form_div').css('display','block');
            $('#add_pdp_form_table .add_pdp_accomp_row_1').show();
            $('#add_pdp_form_table .add_pdp_accomp_row_2').show();
            $('#add_pdp_form_table .add_pdp_accomp_row_3').show();
            $('#add_pdp_form_table .add_pdp_accomp_row_4').hide();
            $('#add_pdp_form_table .add_pdp_accomp_row_5').hide();
            $('#InputCount_val_accomp2').val("3");
          }if(Count_selected != 0 && Count_selected == 4)
          { $('#add_accomp_pdptable_form_div').css('display','block');
            $('#add_pdp_form_table .add_pdp_accomp_row_1').show();
            $('#add_pdp_form_table .add_pdp_accomp_row_2').show();
            $('#add_pdp_form_table .add_pdp_accomp_row_3').show();
            $('#add_pdp_form_table .add_pdp_accomp_row_4').show();
            $('#add_pdp_form_table .add_pdp_accomp_row_5').hide();
            $('#InputCount_val_accomp2').val("4");
          }if(Count_selected != 0 && Count_selected == 5)
          { $('#add_accomp_pdptable_form_div').css('display','block');
            $('#add_pdp_form_table .add_pdp_accomp_row_1').show();
            $('#add_pdp_form_table .add_pdp_accomp_row_2').show();
            $('#add_pdp_form_table .add_pdp_accomp_row_3').show();
            $('#add_pdp_form_table .add_pdp_accomp_row_4').show();
            $('#add_pdp_form_table .add_pdp_accomp_row_5').show();
            $('#InputCount_val_accomp2').val("5");
          } else{ }
      }
       
    }
 
 //The function to proceed to generte pdp form as below
 function Show_NewPDP_Accomp()
    {
      //Navigation buttons
      $('#btn_back_newpdp_first').css('display', 'block');
      $('#btn_back_newpdp_second').css('display', 'none');
     // $('#add_pdp_month_select_div').css('display', 'none');
      
      var InputCount   = document.getElementById("InputCount_val_accomp2").value;
     
      if(InputCount == 1)
      {
        
        var Input_date_1  = document.getElementById("add_pdp_Accomp_date_1").value;
        var Input_accp_1  = document.getElementById("add_pdp_Accomp_val_1").value;
        var Input_rate_1  = document.getElementById("add_pdp_Accomplishment_rate_value_1").value;
        
        if(Input_date_1 == "" || Input_date_1 == null || Input_accp_1 == "" || Input_accp_1 == null || Input_rate_1 == 0)
        {
          document.getElementById("add_pdp_Accomp_form_error").innerHTML = "Please provide the date and rating for your first accomplishment to proceed"; 
        }else  if(Input_date_1 != "" && Input_accp_1 != "" && Input_rate_1 != 0)
        {
          document.getElementById("add_pdp_Accomp_form_error").innerHTML = ""; 
          //Add_NewPDP_Accomp(InputCount);
        }else{}
      }
      else if (InputCount == 2)
      { 
        var Input_date_1  = document.getElementById("add_pdp_Accomp_date_1").value;
        var Input_accp_1  = document.getElementById("add_pdp_Accomp_val_1").value;
        var Input_rate_1  = document.getElementById("add_pdp_Accomplishment_rate_value_1").value;

        var Input_date_2  = document.getElementById("add_pdp_Accomp_date_1").value;
        var Input_accp_2  = document.getElementById("add_pdp_Accomp_val_2").value;
        var Input_rate_2  = document.getElementById("add_pdp_Accomplishment_rate_value_2").value;

        
        if(Input_date_1 == "" || Input_date_1 == null || Input_accp_1 == "" || Input_accp_1 == null || Input_rate_1 == 0)
        {
          document.getElementById("add_pdp_Accomp_form_error").innerHTML = "Please provide the date and rating for your first accomplishment to proceed"; 
        }else if ((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 == "" || Input_date_2 == null || Input_accp_2 == "" || Input_accp_2 == null || Input_rate_2 == 0))
        {
          document.getElementById("add_pdp_Accomp_form_error").innerHTML = "Please provide the date and rating for your second accomplishment to proceed"; 
        }else if((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 != "" && Input_accp_2 != "" && Input_rate_2 != 0))
        {
          document.getElementById("add_pdp_Accomp_form_error").innerHTML = ""; 
          //Add_NewPDP_Accomp(InputCount);
        }
        
      }else if (InputCount == 3)
      { 
        var Input_date_1  = document.getElementById("add_pdp_Accomp_date_1").value;
        var Input_accp_1  = document.getElementById("add_pdp_Accomp_val_1").value;
        var Input_rate_1  = document.getElementById("add_pdp_Accomplishment_rate_value_1").value;

        var Input_date_2  = document.getElementById("add_pdp_Accomp_date_1").value;
        var Input_accp_2  = document.getElementById("add_pdp_Accomp_val_2").value;
        var Input_rate_2  = document.getElementById("add_pdp_Accomplishment_rate_value_2").value;

        var Input_date_3  = document.getElementById("add_pdp_Accomp_date_3").value;
        var Input_accp_3  = document.getElementById("add_pdp_Accomp_val_3").value;
        var Input_rate_3  = document.getElementById("add_pdp_Accomplishment_rate_value_3").value;

        if(Input_date_1 == "" || Input_date_1 == null || Input_accp_1 == "" || Input_accp_1 == null || Input_rate_1 == 0)
        {
          document.getElementById("add_pdp_Accomp_form_error").innerHTML = "Please provide the date and rating for your first accomplishment to proceed"; 
        }else if ((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 == "" || Input_date_2 == null || Input_accp_2 == "" || Input_accp_2 == null || Input_rate_2 == 0))
        {
          document.getElementById("add_pdp_Accomp_form_error").innerHTML = "Please provide the date and rating for your second accomplishment to proceed"; 
        }else if ((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 != "" && Input_accp_2 != "" && Input_rate_2 != 0) && (Input_date_3 == "" || Input_date_3 == null || Input_accp_3 == "" || Input_accp_3 == null || Input_rate_3 == 0))
        {
          document.getElementById("add_pdp_Accomp_form_error").innerHTML = "Please provide the date and rating for your third accomplishment to proceed"; 
        }else if((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 != "" && Input_accp_2 != "" && Input_rate_2 != 0) && (Input_date_3 != "" && Input_accp_3 != "" && Input_rate_3 != 0))
        {
          document.getElementById("add_pdp_Accomp_form_error").innerHTML = ""; 
          //Add_NewPDP_Accomp(InputCount);
        }
        
       
      }else if (InputCount == 4)
      { 
        var Input_date_1  = document.getElementById("add_pdp_Accomp_date_1").value;
        var Input_accp_1  = document.getElementById("add_pdp_Accomp_val_1").value;
        var Input_rate_1  = document.getElementById("add_pdp_Accomplishment_rate_value_1").value;

        var Input_date_2  = document.getElementById("add_pdp_Accomp_date_1").value;
        var Input_accp_2  = document.getElementById("add_pdp_Accomp_val_2").value;
        var Input_rate_2  = document.getElementById("add_pdp_Accomplishment_rate_value_2").value;

        var Input_date_3  = document.getElementById("add_pdp_Accomp_date_3").value;
        var Input_accp_3  = document.getElementById("add_pdp_Accomp_val_3").value;
        var Input_rate_3  = document.getElementById("add_pdp_Accomplishment_rate_value_3").value;

        var Input_date_4  = document.getElementById("add_pdp_Accomp_date_4").value;
        var Input_accp_4  = document.getElementById("add_pdp_Accomp_val_4").value;
        var Input_rate_4  = document.getElementById("add_pdp_Accomplishment_rate_value_4").value;

        if(Input_date_1 == "" || Input_date_1 == null || Input_accp_1 == "" || Input_accp_1 == null || Input_rate_1 == 0)
        {
          document.getElementById("add_pdp_Accomp_form_error").innerHTML = "Please provide the date and rating for your first accomplishment to proceed"; 
        }else if ((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 == "" || Input_date_2 == null || Input_accp_2 == "" || Input_accp_2 == null || Input_rate_2 == 0))
        {
          document.getElementById("add_pdp_Accomp_form_error").innerHTML = "Please provide the date and rating for your second accomplishment to proceed"; 
        }else if ((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 != "" && Input_accp_2 != "" && Input_rate_2 != 0) && (Input_date_3 == "" || Input_date_3 == null || Input_accp_3 == "" || Input_accp_3 == null || Input_rate_3 == 0))
        {
          document.getElementById("add_pdp_Accomp_form_error").innerHTML = "Please provide the date and rating for your third accomplishment to proceed"; 
        }else if ((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 != "" && Input_accp_2 != "" && Input_rate_2 != 0) && (Input_date_3 != "" && Input_accp_3 != "" && Input_rate_3 != 0) &&  (Input_date_4 == "" || Input_date_4 == null || Input_accp_4 == "" || Input_accp_4 == null || Input_rate_4 == 0) )
        {
          document.getElementById("add_pdp_Accomp_form_error").innerHTML = "Please provide the date and rating for your fourth accomplishment to proceed"; 
        }
        else if((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 != "" && Input_accp_2 != "" && Input_rate_2 != 0) && (Input_date_3 != "" && Input_accp_3 != "" && Input_rate_3 != 0) &&  (Input_date_4 != "" && Input_accp_4 != "" && Input_rate_4 != 0))
        {
          document.getElementById("add_pdp_Accomp_form_error").innerHTML = ""; 
         // Add_NewPDP_Accomp(InputCount);
        }
       
      } else if (InputCount == 5)
      { 
        var Input_date_1  = document.getElementById("add_pdp_Accomp_date_1").value;
        var Input_accp_1  = document.getElementById("add_pdp_Accomp_val_1").value;
        var Input_rate_1  = document.getElementById("add_pdp_Accomplishment_rate_value_1").value;

        var Input_date_2  = document.getElementById("add_pdp_Accomp_date_1").value;
        var Input_accp_2  = document.getElementById("add_pdp_Accomp_val_2").value;
        var Input_rate_2  = document.getElementById("add_pdp_Accomplishment_rate_value_2").value;

        var Input_date_3  = document.getElementById("add_pdp_Accomp_date_3").value;
        var Input_accp_3  = document.getElementById("add_pdp_Accomp_val_3").value;
        var Input_rate_3  = document.getElementById("add_pdp_Accomplishment_rate_value_3").value;

        var Input_date_4  = document.getElementById("add_pdp_Accomp_date_4").value;
        var Input_accp_4  = document.getElementById("add_pdp_Accomp_val_4").value;
        var Input_rate_4  = document.getElementById("add_pdp_Accomplishment_rate_value_4").value;

        var Input_date_5  = document.getElementById("add_pdp_Accomp_date_5").value;
        var Input_accp_5  = document.getElementById("add_pdp_Accomp_val_5").value;
        var Input_rate_5  = document.getElementById("add_pdp_Accomplishment_rate_value_5").value;

        if(Input_date_1 == "" || Input_date_1 == null || Input_accp_1 == "" || Input_accp_1 == null || Input_rate_1 == 0)
        {
          document.getElementById("add_pdp_Accomp_form_error").innerHTML = "Please provide the date and rating for your first accomplishment to proceed"; 
        }else if ((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 == "" || Input_date_2 == null || Input_accp_2 == "" || Input_accp_2 == null || Input_rate_2 == 0))
        {
          document.getElementById("add_pdp_Accomp_form_error").innerHTML = "Please provide the date and rating for your second accomplishment to proceed"; 
        }else if ((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 != "" && Input_accp_2 != "" && Input_rate_2 != 0) && (Input_date_3 == "" || Input_date_3 == null || Input_accp_3 == "" || Input_accp_3 == null || Input_rate_3 == 0))
        {
          document.getElementById("add_pdp_Accomp_form_error").innerHTML = "Please provide the date and rating for your third accomplishment to proceed"; 
        }else if ((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 != "" && Input_accp_2 != "" && Input_rate_2 != 0) && (Input_date_3 != "" && Input_accp_3 != "" && Input_rate_3 != 0) &&  (Input_date_4 == "" || Input_date_4 == null || Input_accp_4 == "" || Input_accp_4 == null || Input_rate_4 == 0) )
        {
          document.getElementById("add_pdp_Accomp_form_error").innerHTML = "Please provide the date and rating for your fourth accomplishment to proceed"; 
        }
        else if ((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 != "" && Input_accp_2 != "" && Input_rate_2 != 0) && (Input_date_3 != "" && Input_accp_3 != "" && Input_rate_3 != 0) &&  (Input_date_4 != "" && Input_accp_4 != "" && Input_rate_4 != 0)  &&  (Input_date_5 == "" || Input_date_5 == null || Input_accp_5 == "" || Input_accp_5 == null || Input_rate_5 == 0) )
        {
          document.getElementById("add_pdp_Accomp_form_error").innerHTML = "Please provide the date and rating for your fifth accomplishment to proceed"; 
        }else if((Input_date_1 != "" && Input_accp_1 != "" &&  Input_rate_1 !=0) && (Input_date_2 != "" && Input_accp_2 != "" && Input_rate_2 != 0) && (Input_date_3 != "" && Input_accp_3 != "" && Input_rate_3 != 0) &&  (Input_date_4 != "" && Input_accp_4 != "" && Input_rate_4 != 0)  &&  (Input_date_5 != "" && Input_accp_5 != "" && Input_rate_5 != 0))
        {
          document.getElementById("add_pdp_Accomp_form_error").innerHTML = ""; 
          //Add_NewPDP_Accomp(InputCount);
        }
      }else{}
     
    }

     //To add the new pdp tp the db
     function Add_NewPDP_Accomp(Count)
    { 
        var Input_date_1  = document.getElementById("add_pdp_Accomp_date_1").value;
        var Input_accp_1  = document.getElementById("add_pdp_Accomp_val_1").value;
        var Input_rate_1  = document.getElementById("add_pdp_Accomplishment_rate_value_1").value;

        var Input_date_2  = document.getElementById("add_pdp_Accomp_date_1").value;
        var Input_accp_2  = document.getElementById("add_pdp_Accomp_val_2").value;
        var Input_rate_2  = document.getElementById("add_pdp_Accomplishment_rate_value_2").value;

        var Input_date_3  = document.getElementById("add_pdp_Accomp_date_3").value;
        var Input_accp_3  = document.getElementById("add_pdp_Accomp_val_3").value;
        var Input_rate_3  = document.getElementById("add_pdp_Accomplishment_rate_value_3").value;

        var Input_date_4  = document.getElementById("add_pdp_Accomp_date_4").value;
        var Input_accp_4  = document.getElementById("add_pdp_Accomp_val_4").value;
        var Input_rate_4  = document.getElementById("add_pdp_Accomplishment_rate_value_4").value;

        var Input_date_5  = document.getElementById("add_pdp_Accomp_date_5").value;
        var Input_accp_5  = document.getElementById("add_pdp_Accomp_val_5").value;
        var Input_rate_5  = document.getElementById("add_pdp_Accomplishment_rate_value_5").value;

        var Org_selected  = document.getElementById("add_pdp_org_goal_selected_val").value;
        var Measure_selected   = document.getElementById("add_pdp_org_measure_selected_val").value;
        var Pdp_target    = document.getElementById("add_pdp_org_target_selected_val").value;

      /*  $('#Div_New_Pdp_div').css('display','none');
        $('#btn_addNew_pdp_NextDept').css('display','none');
        $('#btn_back_newpdp_first').css('display','none');
        $('#Div_New_pdp').css('display','none');
        //$('#Div_Generated_pdp').css('display', 'block');
       
        var Count2       =  +Count+ +1;

      
        $.ajax({ //This is for saving the dpd details only withou the accomplishment details
                   url: "<?php echo base_url("Forum/Ajax_AddNewPDP");?>",
                   type: "POST",
                   cache: false,
                   data: { Org_goalid:Org_selected,Org_measure:Measure_selected,RMonth:ReportingMonth,Target:Pdp_target},
                   success: function(data){ 
                        let Inserted_pdp = data;
                     for (let i = 1; i < Count2; i++) //The loop to pass through all the 5 accomplishment input
                        {
                          var Input_date  =  document.getElementById("add_pdp_org_accomp_date_"+i+"").value;
                          var Input_accp  =  document.getElementById("add_pdp_org_accomp_val_"+i+"").value;
                          var Input_rate  =  document.getElementById("add_pdp_accomplishment_rate_value_"+i+"").value;
                          $.ajax({
                                  url: "<?php echo base_url("Forum/Ajax_AddNewPDP_OrgAccomp");?>",
                                  type: "POST",
                                  cache: false,
                                  data: { Org_goalid:Org_selected,Org_measure:Measure_selected,Date:Input_date,Accomp:Input_accp,Rate:Input_rate,Pdp_id:Inserted_pdp },
                                  success: function(data){ 
                                   //  alert(data);
                                  }
                                  });
                        }
                   
                    Show_GeneratedPDP();
                  
                   }
                  }); 
*/
    }
   
    </script>
</head>



<body class="hold-transition skin-blue sidebar-mini" style="height:100%;" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
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
         
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
        
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
                  <a href="<?php echo base_url();?>Login/logOut" class="btn btn-default btn-flat">Sign out</a>
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
        <li class="treeview">
          <a href="/administration">
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
            <li><a href="<?php echo base_url();?>Forum/"><i class="fa fa-envelope-o"></i><?php echo $Menu_item_00_01 ?></a></li><!--Email option-->
            
          </ul>
          
        </li>

      



       
        
        <li class="treeview active" >
          <a href="#">
          <i class="fa fa-file-text-o"></i>
            <span><?php echo $Menu_item_04 ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>Forum/File_Directory"><i class="fa fa-file"></i><?php echo $Menu_item_04_01 ?></a></li><!--Email option-->
            <li ><a href="<?php echo base_url();?>Forum/File_Inbox"><i class="fa fa-inbox"></i><?php echo $Menu_item_04_02 ?></a></li><!--News option-->
            <li ><a href="<?php echo base_url();?>Forum/File_Hub"><i class="fa fa-align-justify"></i><?php echo $Menu_item_04_03 ?></a></li><!--News option-->
            <li class="active"><a href="<?php echo base_url();?>Forum/pdp"><i class="fa fa-id-card" aria-hidden="true"></i><?php echo $Menu_item_04_04 ?></a></li><!--DPD Option-->
            <li><a href="<?php echo base_url();?>Forum/Planning"><i class="fa fa-line-chart" aria-hidden="true"></i><?php echo $Menu_item_04_05 ?></a></li><!--DPD Option-->
          
          </ul>
          
        </li>
       

        <?php 
       
        $this->load->view('side_module');
         
        ?>






    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-top:45px;">
    
   

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3"  >
            <?php 
            $this->load->view('side_menu_pdp'); 
            
            ?>
          <!-- /.box -->
        </div>
         
            <!--------------------------Generated dpd list----------------------------------------->
            <div id="Div_Generated_pdp" class="Hideme">
              <div  class="col-md-9 ">
              <div class="box box-primary ">
                <div class="box-header with-border">
                  <h3 class="box-title">Generated Performance Development Plan</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body padding">
                      <table id="View_Generated_pdptable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                          <tr>
                              <th>Reporting Month</th>
                              <th>Date Added</th>
                              <th>Org Goal(s)</th>
                              <th>Dep Goal(s)</th>
                              <th>KPI(s)</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody id="ViewGenerated_Pdp">
                         
                      </tbody>
                      <tfoot>
                      <tr>
                              <th>Reporting Month</th>
                              <th>Date Added</th>
                              <th>Org Goal(s)</th>
                              <th>Dep Goal(s)</th>
                              <th>KPI(s)</th>
                              <th>Action</th>
                          </tr>
                      </tfoot>
                  </table>










                </div>
             </div>
             </div>
              
              
            </div>
            <!------------------------------------------------------------------->
            <div id="Div_Shared_pdp" class="Hideme"> Shared Div section</div>
            <!----------------------------------------------------------->
            <div id="Div_Setup_pdp" class="Hideme"> 
            <div  class="col-md-9 ">
              <div class="box box-success ">
                <div class="box-header with-border">
           
            <h3 class="box-title"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;&nbsp;Performance Development Plan configuration</h3>
                  
                  <div class="pull-right"><i  class="fa fa-wrench" aria-hidden="true"></i>&nbsp;&nbsp;<a class="Open_pdp_config" ><b>Setup</b></a></div>
         
                </div>
                <!-- /.box-header -->
                  <div class="box-body padding">

                  </div>
              </div>
            </div>
             
             </div>
            <!----------------------------------------------------------->
          <div id="Div_New_pdp" class="col-md-9 ">
            <div class="box box-primary ">
              <div class="box-header with-border">
                <h3 class="box-title">New Performance Development Plan</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body padding">
             
                       <!-- /.row -->
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        
                        <!-- ./card-header -->
                        <div class="card-body" style="margin-left:5%;margin-right:5%;">
                          <table class="table table-bordered table-hover" id="pdp_intro_table">
                            <thead>
                              <tr>
                                <th>Full Name</th>
                                <th>Title</th>
                                <th>Manager</th>
                                <th>Department</th>
                                <th>Plan Year</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr data-widget="expandable-table" aria-expanded="false" style="background-color:#F5F5F5;">
                                <td><?php $Name = $this->session->userdata('kms_emp_data_secondname') .' '. strtoupper($this->session->userdata('kms_emp_data_firstname')); echo $Name; ?></td>
                                <td><?php $Role = $this->session->userdata('kms_emp_role'); echo $Role; ?></td>
                                <td><div id="ViewSupervisor_data"></div></td>
                                <td><?php $Dep = $this->session->userdata('kms_dept_description'); echo $Dep;?></td>
                                <td>FY21/22</td>
                              </tr>
                              <tr class="expandable-body">
                                <td colspan="5">
                                  <p style="font-weight:bold;text-align: center;">NHOP Spirit</p>
                                  <p style="text-align: center; font-style: italic;">To Achieve Excellence and provide Great Experience to our stakeholder</p>
                                <p style="font-weight:bold;text-align: center;">  STATEMENT OF PHILOSOPHY</p>

                                  This performance appraisal (PA) process is designed to evaluate an employee's performance over a specific period of time. When the process
                                  works well, the employee and his/her supervisor plan together to build on strengths and develop those areas needing improvement. During the
                                  PA session, time is set aside to:
                                  <br />
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a) Restate the expections about the job responsibilities and performance stanards.
                                  <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b) Evaluate job performance against previous expextions.
                                  <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c) Discus future development opportunities and relate them to organization needs.
                                  <br />
                                  <br /><b>Supervisor:</b> In evaluating an employee's performance, you are to identify strengths and areas of performance which require improvement. You
                                  are asked to provide examples of the employee's performance to illustrate the ratings you give. Examples based on your own work observations.
                                  However, second-hand observations are permissible if you have verified the information. Such examples clarify your message. After the
                                  meeting, follow up on the development plans matually established by you and the employee.

                                  <br /><p style="margin-top:5px;"><b>Employee:</b> The more involved you are in the PA  session, the more effective the process is likely to be.</p>

                                </td>
                              </tr>
                              <tr data-widget="expandable-table" aria-expanded="true">
                                <td colspan="5" style="text-align: center; font-style: italic;">Complete each applicable section of the form using the following appraisal rating and criteria</td>
                              
                              </tr>
                              
                              <tr class="expandable-body" style="font-weight:bold;background-color:#F5F5F5;" >
                                <td > Unsatisfactory  </td><td>Development Needed</td><td>Successful</td><td>Above Expectations</td><td>Exceptional</td>
                              </tr>
                              <tr class="expandable-body">
                                <td style="width:20%;">
                                    The employee must
                                      demonstrate
                                      improved work
                                      perfprmance within
                                      immediate period of
                                      time (e.g 3 months) </td>
                                <td  style="width:25%;">
                                    Performance standards
                                    are not fully observed,
                                    the employee needs to
                                    improve performance 
                                    during the next appraisal
                                    period (e.g 6months)</td>
                                <td style="width:35%;">
                                  Work is fully
                                  satisfactory, employee
                                  consistently may exceed
                                  performance standards.
                                  This represents the expected
                                  level of performance as 
                                  established by the supervisor</td>
                                <td style="width:10%;">
                                  Work fully satisfactory
                                  and exceeds performance
                                  standards</td>
                                <td style="width:10%;">
                                  Work performance
                                  consistently exceeds
                                  performance standards</td>
                              </tr>
                              <tr class="expandable-body" style="text-align: center;font-weight:bold;">
                                <td > U - (0 - 60)</td><td> N - (60 - 80)</td><td>  S - (80 - 100)</td><td> A-(100-110) </td><td> E-(110-Beyond)</td>
                              </tr>
                            </tbody>
                          </table>

                          <!--------------------------------------------------------------->

                            <!-- /.card-header -->
                            <div class="card-body" id="Div_New_Pdp_div" >
                              <form><div id="Div_addNew_Pdp_first" >
                                <div class="row">
                                    <div id="View_org_goals_list"></div>
                                    <div id="View_org_measure_list"></div>
                                </div>
                                <div class="row">

                                  <div  id="add_pdp_target_div"> </div>
                                  <div class="col-sm-3" id="add_pdp_month_select_div">
                                      <div class="form-group">
                                        <label id="add_pdp_month_label">Reporting Month:</label>
                                        <select class="form-control" id="add_pdp_month_value" onchange="return PDP_Selected_Month_Val();">
                                          <option value="0">Select month </option>
                                          <option value="1">January</option>
                                          <option value="2">February</option>
                                          <option value="3">March</option>
                                          <option value="4">April</option>
                                          <option value="5">May</option>
                                          <option value="6">June </option>
                                          <option value="7">July</option>
                                          <option value="8">August</option>
                                          <option value="9">September</option>
                                          <option value="10">October</option>
                                          <option value="11">November</option>
                                          <option value="12">December</option>
                                        </select>
                                      </div>
                                      <i id="add_pdp_month_error" class="pull-left" style="color:red;"></i>
                                  </div>
                                  <div class="col-sm-3" id="add_pdp_accomplishment_count">
                                      <div class="form-group">
                                        <label id="add_pdp_accomplishment_count_label">Accomplishments:</label>
                                        <select class="form-control" id="add_pdp_accomplishment_count_value" onchange="return PDP_Selected_AccomplishmentCount_Val();">
                                          <option value="0">Your accomplishments are </option>
                                          <option value="1">1 (One)</option>
                                          <option value="2">2 (Two)</option>
                                          <option value="3">3 (Three)</option>
                                          <option value="4">4 (Four)</option>
                                          <option value="5">5 (Five)</option>
                                        </select>
                                      </div>
                                      <i id="add_pdp_accomplishment_count_error" class="pull-left" style="color:red;"></i>
                                  </div>
                                 

                                  <div id="add_pdptable_form_div" style="margin-left:12px;margin-right:12px;">
                                      <table class="table table-bordered" id="add_pdp_form_table">
                                          <thead>
                                            <tr style="background-color:#efefef;">
                                              <th style="width: 5%;">#</th>
                                              <th style="width: 20%;"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Date</th>
                                              <th style="width: 55%;"><i class="fa fa-trophy" aria-hidden="true"></i>&nbsp;Accomplishment</th>
                                              <th style="width: 20%;"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>&nbsp;Rating</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                           
                                             
                                            <tr id="add_pdp_org_accomp_row_1" class="add_pdp_org_accomp_row_1"><td>1.</td> <td><input class="form-control" type="date" id="add_pdp_org_accomp_date_1"></input></td><td><textarea class="form-control" rows="1" placeholder="Type your first accomplishment" id="add_pdp_org_accomp_val_1"></textarea> </td><td> <select class="form-control" id="add_pdp_accomplishment_rate_value_1" > <option value="0">Select rate</option> <option value="1">U (0-60)</option> <option value="2">N (60-80)</option>  <option value="3">S (80-100)</option>  <option value="4">A (100-110)</option> <option value="5">E (110- Beyond)</option> </select> </td> </tr>
                                            <tr id="add_pdp_org_accomp_row_2" class="add_pdp_org_accomp_row_2"><td>2.</td> <td><input class="form-control" type="date" id="add_pdp_org_accomp_date_2"></input></td><td><textarea class="form-control" rows="1" placeholder="Type your second accomplishment" id="add_pdp_org_accomp_val_2"></textarea> </td><td> <select class="form-control" id="add_pdp_accomplishment_rate_value_2" > <option value="0">Select rate</option> <option value="1">U (0-60)</option> <option value="2">N (60-80)</option>  <option value="3">S (80-100)</option>  <option value="4">A (100-110)</option> <option value="5">E (110- Beyond)</option> </select> </td> </tr>
                                            <tr id="add_pdp_org_accomp_row_3" class="add_pdp_org_accomp_row_3"><td>3.</td> <td><input class="form-control" type="date" id="add_pdp_org_accomp_date_3"></input></td><td><textarea class="form-control" rows="1" placeholder="Type your third accomplishment" id="add_pdp_org_accomp_val_3"></textarea> </td><td> <select class="form-control" id="add_pdp_accomplishment_rate_value_3" > <option value="0">Select rate</option> <option value="1">U (0-60)</option> <option value="2">N (60-80)</option>  <option value="3">S (80-100)</option>  <option value="4">A (100-110)</option> <option value="5">E (110- Beyond)</option> </select> </td> </tr>
                                            <tr id="add_pdp_org_accomp_row_4" class="add_pdp_org_accomp_row_4"><td>4.</td> <td><input class="form-control" type="date" id="add_pdp_org_accomp_date_4"></input></td><td><textarea class="form-control" rows="1" placeholder="Type your fourth accomplishment" id="add_pdp_org_accomp_val_4"></textarea> </td><td> <select class="form-control" id="add_pdp_accomplishment_rate_value_4" > <option value="0">Select rate</option> <option value="1">U (0-60)</option> <option value="2">N (60-80)</option>  <option value="3">S (80-100)</option>  <option value="4">A (100-110)</option> <option value="5">E (110- Beyond)</option> </select> </td> </tr>
                                            <tr id="add_pdp_org_accomp_row_5" class="add_pdp_org_accomp_row_5"><td>5.</td> <td><input class="form-control" type="date" id="add_pdp_org_accomp_date_5"></input></td><td><textarea class="form-control" rows="1" placeholder="Type your fifth accomplishment" id="add_pdp_org_accomp_val_5"></textarea> </td><td> <select class="form-control" id="add_pdp_accomplishment_rate_value_5" > <option value="0">Select rate</option> <option value="1">U (0-60)</option> <option value="2">N (60-80)</option>  <option value="3">S (80-100)</option>  <option value="4">A (100-110)</option> <option value="5">E (110- Beyond)</option> </select> </td> </tr>
                                            <tr><td colspan="4"> <div id="add_pdp_org_form_error" style="color:red;text-align: center;vertical-align: middle;"></div></td></tr>
                                            <input type="hidden" id="InputCount_val"></input>
                                          </tbody>
                                      </table>
                                  </div>

                                </div>
                               </div>
                               <!----------------------------add pdp second page-------------------------------->
                               <div class="row" id="addPdp_SecondPage_div">
                                  <div class="col-sm-6" >
                                          <div class="form-group">
                                            <label id="add_pdp_GoalSelectionPage2_label">Goal Selection:</label>
                                            <select class="selectpicker" onchange="return NewPdp_GoalSelectPage2();" id="add_pdp_GoalSelectionPage2">
                                              <option value="0">Select the type of goal to report on</option>
                                              <option value="1">Organisation Goal</option>
                                              <option value="2">Department Goal</option>
                                              <option value="3">KPI</option>
                                            </select>
                                          </div>
                                    </div>
                                </div>
                               <!------------------------------------------------------------------------>
                              </form>
                            </div>
                            <!-- /.card-body -->












                            <!------------------------------------------------------------------------>
                            <div class="row" style="margin-left:5px;margin-right:5px;">
                              <div class="pull-left">
                              <button type="button" class="btn btn-block btn-outline-secondary" id="btn_back_newpdp_first"><i class="fa fa-step-backward" aria-hidden="true"></i> Back</button>
                              <button type="button" class="btn btn-block btn-outline-secondary" id="btn_back_newpdp_second"><i class="fa fa-step-backward" aria-hidden="true"></i> Back</button>
                              
                              </div>
                              
                            

                              <div class="pull-right" >
                              <button id="btn_addNew_pdp" type="submit" onclick='Show_NewPDP()' class="btn btn-success pull-right"><?php echo $Menu_item_04_04_01; ?> <i class="fa fa-plus-circle"></i></button>
                              </div>
                              
                              <div class="pull-right" >
                              <button id="btn_addNew_pdp_NextDept" type="submit" onclick='Show_NewPDP_NextDept()' class="btn pull-right" style="background-color:#020560;color:white;">Generate PDP <i class="fa fa-step-forward"></i></button>
                              </div>
                            </div>
                            <!------------------------------------------------------------------------>

                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                  </div>
           

              </div>
            
            </div>
            <!-- /. box -->
          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
   
 <!------------------------------------------------------------------------------------>
    <!-- This is the modal for pdp configuration -->
    <div id="Modal_config_pdp" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog ">
         <div class="modal-content">
         <div class="modal-header">
                <h4 class="modal-title pull-right"><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;<b>PDP Configuration - window</b></h6>
            </div>
            <div class="modal-body"> 
              <div class="row" style="padding-left:5%;padding-right:5%;">
                  <div class="form-group">
                      <label for="kms_input_PDP_setup_type" class="col-sm-3 control-label">Setup Type:</label>
                      <div class="col-sm-9">
                        <select class="form-control" id="kms_input_PDP_setup_type" name="kms_input_PDP_setup_type" onchange="return PDP_Setup_option2();">
                          <option  value="NO">Select setup option here...</option>
                          <option value="LM">Line Manager</option>
                          <option value="OG">Organisational Goals</option>
                          <option value="DG">Departmental Goals</option>
                         <option value="TMG">Team Member Goals</option>
                        </select>
                      </div> 
                  </div>
              </div>
              <div class="row" style="padding-left:3%;padding-right:3%;">
                  <div name="DPD_Setup_div_LineManager" id="DPD_Setup_div_LineManager">
                      <div class="form-group">
                        <label for="kms_input_fchat_topic" class="col-sm-3 control-label">Manager Name:</label>
                            <div class="col-sm-9">
                                <select class="selectpicker_live_users" data-size="6" name="kms_input_set_pdp_manager" id="kms_input_set_pdp_manager"  data-live-search="true" onchange="return Manager_Selected();">
                                   <?php 
                                            $Emp_list = $this->session->userdata('kms_emp_list_names_only_session');
                                            if(isset($Emp_list) && $Emp_list != "")
                                            {
                                              echo "<option value=\"\"> Select Manager here...</option>";
                                            foreach ($Emp_list as $row_emp)
                                            {
                                                echo "<option value=".$row_emp['emp_data_id'].">".$row_emp['emp_data_sname'].' '.strtoupper($row_emp['emp_data_fname'])."</option>";
                                            }
                                            }else
                                             {
                                                echo "<option value=\"\"> No data loaded...</option>";
                                             }
                                    ?>
                                </select> 


                            </div>
                       </div>
                       <div class="form-group" id="Result_divManagerName" name="Result_divManagerName"  >
                        <div class="col-sm-12" style="margin-top:15px;">
                            <div class="pull-left" id="Manager_selected_div" name="Manager_selected_div"></div>
                            <div class="pull-right">
                            <button type="submit" id="btn_submit_lineManager" class="btn btn-success pull-right">Save <i class="fa fa-share"></i></button>
                            </div>
                        </div>
                       </div>                    
                      

                  </div>
                  <!--Div for organisational setup-->
                 <div name="DPD_Setup_div_OrgstnGoal" id="DPD_Setup_div_OrgstnGoal"> 
                 
                <div style="margin-top:5%;">
                      <div id="OrgGoal_NewDiv">
                      <div class="form-group" >
                        <label for="kms_input_fchat_topic" id="Des_label" class="col-sm-3 control-label">Description:</label>
                        <div class="col-sm-9">
                        <textarea class="form-control" required id="Org_goal" name="Org_goal" rows="2" placeholder="Type the ogranisational goal description..."></textarea>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-sm_9 pull-left" style="margin-top:5px;margin-right:15px;" id="Org_goal_error1">
                         <i>Please provide the Organisational Goal before clicking Add</i>
                        </div>
                      </div>

                      <div class="form-group" >
                        <div class="col-sm_3 pull-left" style="margin-top:10px;margin-right:15px;margin-bottom:10px;color:green;" id="Org_goal_Success">
                         <i>Your Organisational Goal has been successfully saved &nbsp;<i class="fa fa-check" aria-hidden="true"></i></i>
                        </div>
                       
                        <div class="col-sm-3 pull-right" style="margin-top:10px;margin-bottom:10px;">
                        <button type="submit" id="btn_submit_OrgGoal" class="btn btn-success pull-right">Add <i class="fa fa-share"></i></button>
                        </div>
                      </div>
                      </div>
                     <!-----------------------------------Editing the organization goal...........................---->
                     <div id="OrgGoal_EditDiv">
                        <div class="form-group" >
                            <label for="Org_goal_edit" id="Edit_Des_label" class="col-sm-3 control-label">Description:</label>
                            <div class="col-sm-9">
                            <textarea class="form-control" required id="Org_goal_edit" name="Org_goal_edit" rows="2" placeholder="Type the ogranisational goal description..."></textarea>
                            <input type="hidden" id="Org_goal_edit_id" ></input>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <div class="col-sm_3 pull-left" style="margin-top:15px;margin-right:18px;" id="Org_goal_error_edit">
                            <i>Please provide the Organisational Goal before clicking Update</i>
                            </div>
                          </div>

                          <div class="form-group" >
                            
                            <div class="col-sm-3 pull-right" style="margin-top:10px;margin-bottom:10px;">
                            <button type="submit" id="btn_submit_OrgGoal_update" class="btn btn-success pull-right">Update <i class="fa fa-pencil-square-o"></i></button>
                            </div>
                          </div>
                      </div>
                     <!------------------------------------------------------------------------------------------------->

                     <!----------------------------------------div for registering a new measure organization goal---------------------------->
                     <div id="OrgGoal_NewKIPDiv">
                      <div class="form-group" >
                        <label for="kms_input_fchat_topic" id="Des_kpi_label" class="col-sm-3 control-label">Measure Description:</label>
                        <div class="col-sm-9">
                        <textarea class="form-control" required id="Org_goalKPI" name="Org_goalKPI" rows="2" placeholder="Type your measure description..."></textarea>
                        <input type="hidden" id="Org_goal_new_kpi" ></input>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-sm_9 pull-left" style="margin-top:13px;margin-left:10px;" id="Org_goalKPI_error1">
                         <i>Please provide the Org Goal measure before clicking Add</i>
                        </div>
                      </div>
                       
                        <div class="col-sm-3 pull-right" style="margin-top:10px;margin-bottom:10px;">
                        <button type="submit" id="btn_submit_OrgGoalKPI" class="btn btn-success pull-right">Add <i class="fa fa-share"></i></button>
                        </div>
                      </div>
                   

                  <table class="table table-bordered" >
                        <thead>
                          <tr style="background-color:#F0F0F0;">
                            <th>#</th>
                            <th>Organisational Goal 
                            <?php  
                              $kms_emp_level2     =  $this->session->userdata('kms_access_user_level');
                              if($kms_emp_level2 == 2)  {  echo "";   }
                              else { echo "<i class=\"fa fa-plus pull-right\" aria-hidden=\"true\" style=\"color:blue;\" id=\"Btn_add_new_Org_goal\"></i>";  }
                            ?></th>
                            <th><b class="pull-left">Measure</b></th>
                            
                            <th >Action</th>
                          </tr>
                        </thead>
                        <tbody id="View_organisation_goals_tb"> </tbody>
                  </table>
                  
                </div>

                 </div>
                 <div name="DPD_Setup_div_DeptGoal" id="DPD_Setup_div_DeptGoal">
                                       
                    <div id="View_org_goal1">
                      <div id="View_organisation_goals_list"></div> 
                        <div class="row form-group">
                          <div class="col-sm-9 pull-right" id="PDP_Selected_OGoal_Val_error1" >
                              <div style="margin-top:10px;color:red;" >
                              <em >Please select the organisational Goal to proceed &nbsp;&nbsp;<i class="fa fa-hand-o-up" aria-hidden="true"></i></em>
                              </div>
                          </div>
                        </div>
                        <div  id="PDP_Add_new_dep_goal">                
                          <div class="row form-group" style="margin:2px;">
                              <label for="Dep_goal_new"  class="col-sm-3 control-label" id="Dep_goal_new_label">Departmental Goal:</label>
                              <div class="col-sm-9">
                              <textarea class="form-control" required id="Dep_goal_new" name="Dep_goal_new" rows="2" placeholder="Enter the departmental goal description..."></textarea>
                              </div>
                          </div>

                          <div class="col-sm-9 pull-leftt" id="PDP_Selected_DepGoal_Val_error1" >
                              <div style="margin-top:10px;color:red;" >
                              <em >Please provide the Departmental Goal to proceed &nbsp;&nbsp;<i class="fa fa-hand-o-up" aria-hidden="true"></i></em>
                              </div>
                          </div>

                          <div class="form-group" >
                              <div class="col-sm-3 pull-right" style="margin-top:10px;margin-bottom:10px;">
                              <button type="submit" id="btn_submit_DepGoal_save" class="btn btn-success pull-right">Save <i class="fa fa-floppy-o"></i></button>
                              </div>
                          </div>
                        </div>    
                        
                        <div  id="PDP_edit_dep_goal">                
                          <div class="row form-group" style="margin:2px;">
                              <label for="Dep_goal_edit"  class="col-sm-3 control-label" id="Dep_goal_edit_label">Departmental Goal:</label>
                              <div class="col-sm-9">
                              <textarea class="form-control" required id="Dep_goal_edit" name="Dep_goal_edit" rows="2" placeholder="Enter the departmental goal description..."></textarea>
                              <input type="hidden" id="dep_goal_edit_id" ></input>
                              <input type="hidden" id="org_goal_edit_id2" ></input>
                              </div>
                          </div>

                          <div class="col-sm-9 pull-leftt" id="Dep_goal_error_edit" >
                              <div style="margin-top:10px;color:red;" >
                              <em >Please provide the Departmental Goal to proceed &nbsp;&nbsp;<i class="fa fa-hand-o-up" aria-hidden="true"></i></em>
                              </div>
                          </div>

                          <div class="form-group" >
                              <div class="col-sm-3 pull-right" style="margin-top:10px;margin-bottom:10px;">
                              <button type="submit" id="btn_submit_DepGoal_edit" class="btn btn-success pull-right">Update <i class="fa fa-floppy-o"></i></button>
                              </div>
                          </div>
                        </div> 
                        <!----------------------------------------div for registering a new KPI for department goal---------------------------->
                     <div id="DepGoal_NewKIPDiv">
                      <div class="form-group" >
                        <label for="dep_goalKPI" id="Des_kpi_label_add" class="col-sm-3 control-label">Measure Details:</label>
                        <div class="col-sm-9">
                        <textarea class="form-control" required id="dep_goalKPI" name="dep_goalKPI" rows="2" placeholder="Type your new measure description..."></textarea>
                        <input type="hidden" id="dep_goal_new_kpi" ></input><input type="hidden" id="org_goal_new_kpi" ></input>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-sm_9 pull-left" style="margin-top:13px;margin-left:10px;" id="dep_goalKPI_error1">
                         <i>Please provide the measure before clicking Add&nbsp;<i class="fa fa-hand-o-up" aria-hidden="true"></i></i>
                        </div>
                      </div>
                       
                        <div class="col-sm-3 pull-right" style="margin-top:10px;margin-bottom:10px;">
                        <button type="submit" id="btn_submit_DepGoalKPI" class="btn btn-success pull-right">Add <i class="fa fa-share"></i></button>
                        </div>
                      </div>

                        <div class="row form-group" style="margin:12px;" id="View_departmental_goals_tb_div">
                          <table class="table table-bordered" >
                            <thead>
                              <tr style="background-color:#F0F0F0;">
                                <th >#</th>
                                <th><div class="pull-left" >Departmental Goal </div> &nbsp;&nbsp;<i class="fa fa-plus pull-right" aria-hidden="true" style="color:blue;" id="Btn_add_new_dep_goal"></i></th>
                                <th>Measure&nbsp;<i class="fa fa-pie-chart" aria-hidden="true"></i></th>
                              
                                <th>Action&nbsp;<i class="fa fa-cogs" aria-hidden="true"></i></th>
                              </tr>
                            </thead>
                            <tbody id="View_departmental_goals_tb">
                            </tbody>
                          </table>
                        </div>
                                           
                    </div>

                 </div>
                    <div name="DPD_Setup_div_TMG" id="DPD_Setup_div_TMG">
                    
                          <div class="row form-group" id="View_tmember_goals_tb_div">
                          
                                <!----------------------------------------div for registering a new KPI for team member goal---------------------------->
                               
                                <div id="View_teamMember_goals_list" style="margin:15px;"></div> 
                                 
                                  <div class="form-group"  style="color:red;margin-right:27px;" id="tmg_view_ogoal_error1">
                                    <div class="col-sm_9 pull-right" style="margin-top:6px;">
                                    <i>Please the organisation goal to continue .... &nbsp;<i class="fa fa-hand-o-up" aria-hidden="true"></i></i>
                                    </div>
                                  </div>

                                <div id="View_teamMember_dep_list" style="margin:15px;"></div>
                                <div class="form-group"  style="color:red;margin-right:27px;" id="tmg_view_dgoal_error1">
                                    <div class="col-sm_9 pull-right" style="margin-top:6px;">
                                    <i>Please the department goal to continue .... &nbsp;<i class="fa fa-hand-o-up" aria-hidden="true"></i></i>
                                    </div>
                                </div>&nbsp;

                                <div id="TmemberGoal_NewGoalDiv" style="margin:15px;">
                                  <div class="form-group" >
                                  <label for="dep_goalKPI" id="Des_tm_goal_label_add" class="col-sm-3 control-label">Team Member Goal:</label>
                                    <div class="col-sm-9">
                                    <textarea class="form-control" required id="tm_goal" name="tm_goal" rows="2" placeholder="Type your team member goal description..."></textarea>
                                    <input type="hidden" id="dep_goal" ></input><input type="hidden" id="org_goal" ></input>
                                    </div>
                                  </div>

                                  <div class="form-group"  style="color:red;margin-left:12px;" id="tmg_error1">
                                    <div class="col-sm_9 pull-left" style="margin-top:6px;">
                                    <i>Please add the team member goal to continue .... &nbsp;<i class="fa fa-hand-o-up" aria-hidden="true"></i></i>
                                    </div>
                                </div>          

                                  <div class="form-group" >
                                    <div class="col-sm-3 pull-right" style="margin-top:10px;margin-bottom:10px;">
                                    <button type="submit" id="btn_submit_TMGoal_save" class="btn btn-success pull-right">Save <i class="fa fa-floppy-o"></i></button>
                                    </div>
                                  </div>
                                  &nbsp;
                                </div>
                                

                                <div id="TmemberGoal_EditGoalDiv" style="margin:15px;">
                                  <div class="form-group" >
                                  <label for="dep_goalKPI" id="Des_tm_goal_label_edit" class="col-sm-3 control-label">Team Member Goal:</label>
                                    <div class="col-sm-9">
                                    <textarea class="form-control" required id="tm_goal_edit" name="tm_goal_edit" rows="2" placeholder="Type your team member goal description..."></textarea>
                                    <input type="hidden" id="dep_goal_edit" ></input><input type="hidden" id="org_goal_edit" ></input><input type="hidden" id="tm_goal_edit_id" ></input>
                                    </div>
                                  </div>

                                  <div class="form-group"  style="color:red;margin-left:12px;" id="tmg_error1_edit">
                                    <div class="col-sm_9 pull-left" style="margin-top:6px;">
                                    <i>Please add the team member goal to continue .... &nbsp;<i class="fa fa-hand-o-up" aria-hidden="true"></i></i>
                                    </div>
                                </div>          

                                  <div class="form-group" >
                                    <div class="col-sm-3 pull-right" style="margin-top:10px;margin-bottom:10px;">
                                    <button type="submit" id="btn_submit_TMGoal_edit" class="btn btn-success pull-right">Update <i class="fa fa-floppy-o"></i></button>
                                    </div>
                                  </div>
                                  &nbsp;
                                </div>
                                
                                <div id="TMGoal_NewKIPDiv" style="margin:15px;">
                                <div class="form-group" >
                                  <label for="kms_input_fchat_topic" id="Des_TMGkpi_label" class="col-sm-3 control-label">KPI Description:</label>
                                  <div class="col-sm-9">
                                  <textarea class="form-control" required id="Tm_goalKPI_des" name="Tm_goalKPI_des" rows="2" placeholder="Type your KPI description..."></textarea>
                                  <input type="hidden" id="TMgoal_kpi" ></input><input type="hidden" id="TMgoal_Orgoal" ></input><input type="hidden" id="TMgoal_Dpgoal" ></input>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <div class="col-sm_9 pull-left" style="margin-top:13px;margin-left:10px;color:red;" id="TMgoalKPI_error1">
                                  <i>Provide Team Member Goal KPI before clicking Add &nbsp;<i class="fa fa-hand-o-up" aria-hidden="true"></i></i>
                                  </div>
                                </div>
                                
                                  <div class="col-sm-3 pull-right" style="margin-top:10px;margin-bottom:10px;">
                                  <button type="submit" id="btn_submit_TMGoalKPI" class="btn btn-success pull-right">Add <i class="fa fa-share"></i></button>
                                  </div>
                                </div>

                                <div id="View_teamMember_Goal">
                                <div  class="row form-group" style="margin:15px;" >
                                    <table class="table table-bordered" >
                                        <thead>
                                          <tr style="background-color:#F0F0F0;">
                                            <th style="width: 5px">#</th>
                                            <th>Goal Description&nbsp;<i class="fa fa-plus pull-right" aria-hidden="true" style="color:blue;" id="Btn_add_new_tm_goal"></i></th>
                                            <th>KPI&nbsp;<i class="fa fa-pie-chart" aria-hidden="true"></i></th>
                                            <th >Action&nbsp;<i class="fa fa-cogs" aria-hidden="true"></i></th>
                                          </tr>
                                        </thead>
                                        <tbody id="View_tmg_goal"></tbody>
                                    </table>
                                </div>
                                </div>
                                
                                <!------------------------------------------------------------------------------------------------------------------>
                                      
                          </div>

                    </div>
                 
                 </div>
              
            </div>
         </div>
      </div>
    </div>
     

<!------------------------------------------------------------------------------------->

      
          <div id="modal_view_org_pki" class="modal fade" role="dialog"  data-backdrop="true" >
            <div class="modal-dialog " >
              <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 id="Org_kpi_label" class="modal-title" style="font-weight:bold;"></h4>
                  </div>
                    <div class="modal-body">
                      <div id="Org_kpi_label_view_error1"><?php  echo $this->session->userdata('kms_emp_data_secondname');?> you haven't added any <b>Measure</b> for this goal, please click <i  class="fa fa-line-chart" style="color:green;" aria-hidden="true"></i> under Actions to add a measure</div>
                       <!----------------------------------------div for editing an organisation measure---------------------------->
                        <div id="OrgGoal_EditKIPDiv">
                          <div class="form-group" >
                            <label for="Org_EditgoalKPI" id="Org_Edit_kpi_label" class="col-sm-3 control-label">Measure Description:</label>
                            <div class="col-sm-9">
                            <textarea class="form-control" required id="Org_EditgoalKPI" name="Org_EditgoalKPI" rows="2" placeholder="Type your measure description..."></textarea>
                            <input type="hidden" id="Org_goal_edit_kpi" ></input> <input type="hidden" id="Org_goal_id_edit_kpi" ></input>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <div class="col-sm_9 pull-left" style="margin-top:13px;margin-left:10px;" id="edit_Org_goalKPI_error1">
                            <i>Please provide the measure before clicking Update &nbsp;<i class="fa fa-hand-o-up" aria-hidden="true"></i></i>
                            </div>
                          </div>
                          
                            <div class="col-sm-3 pull-right" style="margin-top:10px;margin-bottom:10px;">
                            <button type="submit" id="btn_submit_EditOrgGoalKPI" class="btn btn-success pull-right">Update <i class="fa fa-share"></i></button>
                            </div>
                          </div>
                     <!------------------- ------------------------------------------------------------------------------->
                       <!----------------------------------------div for adding an organisation measure target---------------------------->
                       <div id="OrgGoal_AddmeasureTargetDiv">
                          <div class="form-group" >
                            <label for="AddOrgMeasureTarget" id="AddOrgMeasureTarget_label" class="col-sm-3 control-label">Target Details:</label>
                            <div class="col-sm-9">
                            <textarea class="form-control" required id="AddOrgMeasureTarget" name="AddOrgMeasureTarget" rows="2" placeholder="Type your target description..."></textarea>
                            <input type="hidden" id="Org_goal_id" ></input> <input type="hidden" id="Org_goal_measure_id" ></input>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <div class="col-sm_9 pull-left" style="margin-top:13px;margin-left:10px;" id="AddOrgMeasureTarget_error1">
                            <i>Please provide the target before clicking Add &nbsp;<i class="fa fa-hand-o-up" aria-hidden="true"></i></i>
                            </div>
                          </div>
                          
                            <div class="col-sm-3 pull-right" style="margin-top:10px;margin-bottom:10px;">
                            <button type="submit" id="btn_submit_AddOrgMeasureTarget" class="btn btn-success pull-right">Add <i class="fa fa-share"></i></button>
                            </div>
                          </div>
                     <!------------------- ------------------------------------------------------------------------------->
                      
                      <div id="Org_view_kpis">
                        <table class="table table-bordered" >
                              <thead>
                                <tr style="background-color:#F0F0F0;">
                                  <th style="width: 5px">#</th>
                                  <th>Measure Description&nbsp;<i class="fa fa-pie-chart " style="color:green;" aria-hidden="true" ></i></th>
                                  <th>Target&nbsp;<i class="fa fa-dot-circle-o" aria-hidden="true" style="color:green;"></i></th>
                                  <th>Added&nbsp;<i class="fa fa-calendar" aria-hidden="true"></i></th>
                                  <th style="width: auto;">Action&nbsp;<i class="fa fa-cogs" aria-hidden="true"></i></th>
                                </tr>
                              </thead>
                              <tbody id="View_organisation_goals_kpi"> 
                              
                              </tbody>
                        </table>
                      </div>
                    </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
                  </div>
              </div>
            </div>
          </div>



<!------------------------------------------------------------------------------------->

      
<div id="modal_view_dep_pki" class="modal fade" role="dialog"  data-backdrop="true" >
            <div class="modal-dialog " >
              <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 id="Dep_kpi_label" class="modal-title" style="font-weight:bold;"></h4>
                  </div>
                    <div class="modal-body">
                      <div id="dep_kpi_label_view_error1"><?php  echo $this->session->userdata('kms_emp_data_secondname');?> you haven't added any <b>Measure</b> for this goal, please click <i  class="fa fa-line-chart" style="color:green;" aria-hidden="true"></i> under Actions to add a measure</div>
                       <!----------------------------------------div for editing a KPI---------------------------->
                        <div id="DepGoal_EditKIPDiv">
                          <div class="form-group" >
                            <label for="Dep_EditgoalKPI" id="Dep_Edit_kpi_label" class="col-sm-3 control-label">Measure description:</label>
                            <div class="col-sm-9">
                            <textarea class="form-control" required id="Dep_EditgoalKPI" name="Dep_EditgoalKPI" rows="2" placeholder="Type your measure description..."></textarea>
                            <input type="hidden" id="Dep_goal_edit_kpi" ><input type="hidden" id="Org_edit_kpi_id" ></input> <input type="hidden" id="Dep_goal_id_edit_kpi" ></input>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <div class="col-sm_9 pull-left" style="margin-top:13px;margin-left:10px;" id="edit_Dep_goalKPI_error1">
                            <i>Please provide the measure before clicking Update &nbsp;<i class="fa fa-hand-o-up" aria-hidden="true"></i></i>
                            </div>
                          </div>
                          
                            <div class="col-sm-3 pull-right" style="margin-top:10px;margin-bottom:10px;">
                            <button type="submit" id="btn_submit_EditDepGoalKPI" class="btn btn-success pull-right">Update <i class="fa fa-share"></i></button>
                            </div>
                          </div>
                     <!------------------- ------------------------------------------------------------------------------->
                        <!----------------------------------------div for adding dep measure target---------------------------->
                        <div id="DepGoal_target">
                          <div class="form-group" >
                            <label for="Dep_add_target" id="Dep_add_target_label" class="col-sm-3 control-label">Target description:</label>
                            <div class="col-sm-9">
                            <textarea class="form-control" required id="Dep_add_target" name="Dep_add_target" rows="2" placeholder="Type your Target description..."></textarea>
                            <input type="hidden" id="Dep_add_target_dpid" ><input type="hidden" id="Dep_add_target_ogid" ></input> <input type="hidden" id="Dep_add_target_measureid" ></input>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <div class="col-sm_9 pull-left" style="margin-top:13px;margin-left:10px;" id="Dep_add_target_error1">
                            <i>Please provide the target before clicking Update &nbsp;<i class="fa fa-hand-o-up" aria-hidden="true"></i></i>
                            </div>
                          </div>
                          
                            <div class="col-sm-3 pull-right" style="margin-top:10px;margin-bottom:10px;">
                            <button type="submit" id="btn_submit_dep_target" class="btn btn-success pull-right">Add <i class="fa fa-share"></i></button>
                            </div>
                          </div>
                     <!------------------- ------------------------------------------------------------------------------->
                      
                      <div id="Dep_view_kpis">
                        <table class="table table-bordered" >
                              <thead>
                                <tr style="background-color:#F0F0F0;">
                                  <th style="width: 5px">#</th>
                                  <th>Measure Description&nbsp;<i class="fa fa-pie-chart " style="color:green;" aria-hidden="true" ></i></th>
                                  <th>Target&nbsp;<i class="fa fa-dot-circle-o" aria-hidden="true" style="color:green;"></i></th>
                                  <th>Added&nbsp;<i class="fa fa-calendar" aria-hidden="true"></i></th>
                                  <th >Action&nbsp;<i class="fa fa-cogs" aria-hidden="true"></i></th>
                                </tr>
                              </thead>
                              <tbody id="View_department_kpi">
                              
                              </tbody>
                        </table>
                      </div>
                    </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
                  </div>
              </div>
            </div>
          </div>

<!--------------------------------------------------------------------------------------------------------------->


<!------------------------------------------------------------------------------------->

      
<div id="modal_view_tmgoal_kpi" class="modal fade" role="dialog"  data-backdrop="true" >
            <div class="modal-dialog " >
              <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 id="TMG_kpi_label" class="modal-title" style="font-weight:bold;"></h4>
                  </div>
                    <div class="modal-body">
                      <div id="tmgoal_kpi_label_view_error1"><?php  echo $this->session->userdata('kms_emp_data_secondname');?> you haven't added any <b>Measure</b> for this goal, please click <i  class="fa fa-line-chart" style="color:green;" aria-hidden="true"></i> under Actions to add a measure</div>
                       <!----------------------------------------div for editing a KPI---------------------------->
                       <div id="TMGoal_EditKIPDiv">
                          <div class="form-group" >
                            <label for="TMGoal_EditgoalKPI_label" id="TMGoal_EditgoalKPI_label" class="col-sm-3 control-label">KPI Description:</label>
                            <div class="col-sm-9">
                            <textarea class="form-control" required id="TMG_EditKPI" name="TMG_EditKPI" rows="2" placeholder="Type your KPI description..."></textarea>
                            <input type="hidden" id="TMgoal_edit_kpi_id" ></input><input type="hidden" id="TMGoalid" ></input>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <div class="col-sm_9 pull-left" style="margin-top:13px;margin-left:10px;" id="edit_TMGoalKPI_error1">
                            <i>Please provide the KPI description before clicking Update &nbsp;<i class="fa fa-hand-o-up" aria-hidden="true"></i></i>
                            </div>
                          </div>
                          
                            <div class="col-sm-3 pull-right" style="margin-top:10px;margin-bottom:10px;">
                            <button type="submit" id="btn_submit_EditTMGoalKPI" class="btn btn-success pull-right">Update <i class="fa fa-share"></i></button>
                            </div>
                          </div>
                     <!------------------- ------------------------------------------------------------------------------->
                      
                     <div id="TMGoal_view_kpis">
                        <table class="table table-bordered" >
                              <thead>
                                <tr style="background-color:#F0F0F0;">
                                  <th style="width: 5px">#</th>
                                  <th>KPI Description&nbsp;<i class="fa fa-pie-chart " style="color:green;" aria-hidden="true" ></i></th>
                                  <th>Added&nbsp;<i class="fa fa-calendar" aria-hidden="true"></i></th>
                                  <th style="width: auto;">Action&nbsp;<i class="fa fa-cogs" aria-hidden="true"></i></th>
                                </tr>
                              </thead>
                              <tbody id="View_TeamMember_goals_kpi"> 
                              
                              </tbody>
                        </table>
                      </div>
                    </div>
                  <div class="modal-footer">
                    <input type="hidden" id="ogoal_id"></input><input type="hidden" id="dgoal_id"></input>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
                  </div>
              </div>
            </div>
          </div>



<!------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------->

      
<div id="modal_AddNew_pdp" class="modal fade modal-xl" role="dialog"  data-backdrop="true" >
            <div class="modal-dialog modal-xl" >
              <div class="modal-content">
                  <div class="modal-header" style="text-align: center;vertical-align: middle;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 id="AddNewPdp_label" class="modal-title" style="font-weight:bold;">New Performance & Development Plan (PDP)</h4>
                  </div>
                    <div class="modal-body">
                      <div id="View_org_goals_list">
                      </div> 
                    </div>
                    <br />
                  <div class="modal-footer">
                    <input type="hidden" id="ogoal_id"></input><input type="hidden" id="dgoal_id"></input>
                    <button type="button" class="btn btn-default" id="Btn_addNewPdp_next">Next</button>
                  </div>
              </div>
            </div>
  </div>



<!----------------------------------Adding accomplishment to a pdp ------------------------------->
<div id="modal_Addpdp_accomplishment" class="modal fade modal-xl" role="dialog"  data-backdrop="true" >
            <div class="modal-dialog modal-xl" >
              <div class="modal-content">
                  <div class="modal-header" style="text-align: center;vertical-align: middle;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 id="modal_Addpdp_accomplishment_label" class="modal-title" style="font-weight:bold;">PDP Accomplishment reporting</h4>
                  </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label for="add_pdp_accomptype_selected_val"  id="add_pdp_accomptype_label">Goal to report on:</label>
                              <select title="Select goal type tp report on" class="form-control" id="add_pdp_accomptype_selected_val" onchange="return PDP_Selected_ReportType();">
                              <option value="0" >Please select the type goal here...</option>
                              <option value="1">Organisation Goals</option>
                              <option value="2">Departmental Goals</option>
                              <option value="3">Team Member Goals</option>
                              </select>
                          </div>
                          <i id="add_pdp_accomptype_error" style="Color:red;"></i>
                        </div>
                        <div id="View_Accomptype_orgGoal_div"></div></div>
                      <div class="row">
                        <div id="View_Accomptype_orgGoalMeasure_div"></div>
                        <div id="View_Accomptype_orgGoalTarget_div"></div>
                      </div>
                      <div class="row">
                      
                      <div class="col-sm-12" id="add_accomp_accomplishment_count_div">
                            <div class="form-group">
                              <label id="add_accomp_accomplishment_count_label">Accomplishments:</label>
                                <select class="form-control" id="add_accomp_accomplishment_count_value" onchange="return PDP_Selected_AccomplishmentCount2_Val();">
                                  <option value="0">How many accomplishments have you done so far?</option>
                                  <option value="1">1 (One)</option>
                                  <option value="2">2 (Two)</option>
                                  <option value="3">3 (Three)</option>
                                  <option value="4">4 (Four)</option>
                                  <option value="5">5 (Five)</option>
                                </select>
                             </div>
                               <i id="add_accomp_accomplishment_count_error" class="pull-left" style="color:red;"></i>
                      </div>
                      </div>
                     
                      <div id="add_accomp_pdptable_form_div" style="margin-left:2px;margin-right:2px;">
                                      <table class="table table-bordered" id="add_pdp_form_table">
                                          <thead>
                                            <tr style="background-color:#efefef;">
                                              <th style="width: 5%;">#</th>
                                              <th style="width: 15%;"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Date</th>
                                              <th style="width: 60%;"><i class="fa fa-trophy" aria-hidden="true"></i>&nbsp;Accomplishment</th>
                                              <th style="width: 20%;"><i class="fa fa-star" aria-hidden="true"></i>&nbsp;Rating</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                           
                                             
                                            <tr id="add_pdp_accomp_row_1" class="add_pdp_accomp_row_1"><td>1.</td> <td ><input class="form-control" type="date" id="add_pdp_Accomp_date_1"></input></td><td><textarea class="form-control" rows="1" placeholder="Type your 1st accomplishment" id="add_pdp_Accomp_val_1"></textarea> </td><td> <select class="form-control" id="add_pdp_Accomplishment_rate_value_1" > <option value="0">rate</option> <option value="1">U (0-60)</option> <option value="2">N (60-80)</option>  <option value="3">S (80-100)</option>  <option value="4">A (100-110)</option> <option value="5">E (110- Beyond)</option> </select> </td> </tr>
                                            <tr id="add_pdp_accomp_row_2" class="add_pdp_accomp_row_2"><td>2.</td> <td><input class="form-control" type="date" id="add_pdp_Accomp_date_2"></input></td><td><textarea class="form-control" rows="1" placeholder="Type your 2nd accomplishment" id="add_pdp_Accomp_val_2"></textarea> </td><td> <select class="form-control" id="add_pdp_Accomplishment_rate_value_2" > <option value="0">rate</option> <option value="1">U (0-60)</option> <option value="2">N (60-80)</option>  <option value="3">S (80-100)</option>  <option value="4">A (100-110)</option> <option value="5">E (110- Beyond)</option> </select> </td> </tr>
                                            <tr id="add_pdp_accomp_row_3" class="add_pdp_accomp_row_3"><td>3.</td> <td><input class="form-control" type="date" id="add_pdp_Accomp_date_3"></input></td><td><textarea class="form-control" rows="1" placeholder="Type your 3rd accomplishment" id="add_pdp_Accomp_val_3"></textarea> </td><td> <select class="form-control" id="add_pdp_Accomplishment_rate_value_3" > <option value="0">rate</option> <option value="1">U (0-60)</option> <option value="2">N (60-80)</option>  <option value="3">S (80-100)</option>  <option value="4">A (100-110)</option> <option value="5">E (110- Beyond)</option> </select> </td> </tr>
                                            <tr id="add_pdp_accomp_row_4" class="add_pdp_accomp_row_4"><td>4.</td> <td><input class="form-control" type="date" id="add_pdp_Accomp_date_4"></input></td><td><textarea class="form-control" rows="1" placeholder="Type your 4th accomplishment" id="add_pdp_Accomp_val_4"></textarea> </td><td> <select class="form-control" id="add_pdp_Accomplishment_rate_value_4" > <option value="0">rate</option> <option value="1">U (0-60)</option> <option value="2">N (60-80)</option>  <option value="3">S (80-100)</option>  <option value="4">A (100-110)</option> <option value="5">E (110- Beyond)</option> </select> </td> </tr>
                                            <tr id="add_pdp_accomp_row_5" class="add_pdp_accomp_row_5"><td>5.</td> <td><input class="form-control" type="date" id="add_pdp_Accomp_date_5"></input></td><td><textarea class="form-control" rows="1" placeholder="Type your 5th accomplishment" id="add_pdp_Accomp_val_5"></textarea> </td><td> <select class="form-control" id="add_pdp_Accomplishment_rate_value_5" > <option value="0">rate</option> <option value="1">U (0-60)</option> <option value="2">N (60-80)</option>  <option value="3">S (80-100)</option>  <option value="4">A (100-110)</option> <option value="5">E (110- Beyond)</option> </select> </td> </tr>
                                            <tr><td colspan="4"> <div id="add_pdp_Accomp_form_error" style="color:red;text-align: center;vertical-align: middle;"></div></td></tr>
                                            <input type="hidden" id="InputCount_val_accomp2" name="InputCount_val_accomp2"></input>
                                            <tr><td colspan="4"><button type="button" class="btn btn-default pull-right" onclick='Show_NewPDP_Accomp()' id="Add_pdp_accomp_btn" style="background-color:green;color:white;"><b>Add &nbsp;<i class="fa fa-floppy-o" aria-hidden="true"></i></b></button></td></tr>
                                          </tbody>
                                      </table>
                                      
                 
                       </div>
                      
                       
                
                </div> 
                   
                   
                
              </div>
            </div>
  </div>



<!------------------------------------------------------------------------------------->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  


</div>

<script src="<?php echo base_url();?>ext/dist/js/js_all.js"></script>

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

</script>


</body>