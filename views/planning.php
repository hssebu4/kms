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
<script src="<?php echo base_url();?>ext/bower_components/jquery/dist/jquery.min.js"></script>

<style type="text/css" media="print">
    * { display: none; }
</style>
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
    .has-dropcap:first-letter {
  font-family: "Source Sans Pro", Arial, Helvetica, sans-serif;
  float: left;
  font-size: 3rem;
  line-height: 0.65;
  margin: 0.3em 0.1em 0.2em 0;
  color: #dadf1b;
}
.has-dropcap2:first-letter {
  font-family: "Source Sans Pro", Arial, Helvetica, sans-serif;
  float: left;
  font-size: 3rem;
  line-height: 0.65;
  margin: 0.3em 0.1em 0.2em 0;
  color: #c2c618;
}
.has-dropcap3:first-letter {
  font-family: "Source Sans Pro", Arial, Helvetica, sans-serif;
  float: left;
  font-size: 3rem;
  line-height: 0.65;
  margin: 0.3em 0.1em 0.2em 0;
  color: #9da013;
}
.has-dropcap4:first-letter {
  font-family: "Source Sans Pro", Arial, Helvetica, sans-serif;
  float: left;
  font-size: 3rem;
  line-height: 0.65;
  margin: 0.3em 0.1em 0.2em 0;
  color: #8e9111;
}
.has-dropcap5:first-letter {
  font-family: "Source Sans Pro", Arial, Helvetica, sans-serif;
  float: left;
  font-size: 3rem;
  line-height: 0.65;
  margin: 0.3em 0.1em 0.2em 0;
  color: #686a0c;
}
</style>

    <script>

    $( document ).ready(function() {
      $('#View_criticalRole_div').css('display', 'none');
      $('#View_critical_role_2Mark').css('display', 'none');
      $('#View_critical_role_3Mark').css('display', 'none');
      $('#View_critical_role_4Mark').css('display', 'none');
      $('#View_critical_role_5Mark').css('display', 'none');
      $('#View_critical_role_6Mark').css('display', 'none');
      $('#View_critical_role_7Mark').css('display', 'none');
      $('#View_critical_role_8Mark').css('display', 'none');
      $('#View_critical_role_9Mark').css('display', 'none');
      $('#View_critical_role_10Mark').css('display', 'none');
      $('#CriticalRole_error').css('display', 'none');
      $('#CriticalRole_error_rank').css('display', 'none');
      $('#CriticalRole_success').css('display', 'none');
      $('#View_Incoming_div').css('display', 'none');
      
      
     
      
      


      //This shall fetch the drop down selected value and displays the total figure under the Total column
      document.getElementById("View_critical_role_1").innerHTML = '0' ;
      document.getElementById("View_critical_role_2").innerHTML = '0' ;
      document.getElementById("View_critical_role_3").innerHTML = '0' ;
      document.getElementById("View_critical_role_4").innerHTML = '0' ;
      document.getElementById("View_critical_role_5").innerHTML = '0' ;
      document.getElementById("View_critical_role_6").innerHTML = '0' ;
      document.getElementById("View_critical_role_7").innerHTML = '0' ;
      document.getElementById("View_critical_role_8").innerHTML = '0' ;
      document.getElementById("View_critical_role_9").innerHTML = '0' ;
      document.getElementById("View_critical_role_10").innerHTML = '0' ;
     

    });
  function OpenModal_Skills(Role_no)
  {
           $('#Role_Number').val(Role_no);
           $('#The_role_Unique_skill_input').val("");
           $('#modal_ViewMoreDetail_UniqueSkill').modal('toggle');
  }
  function Add_CriticalRole_1Values5(ny)
  {   
        var e1 = ny.getAttribute("data-nit");
      if(e1 == 1)
      {
         //var CRole_select_1_1 =  document.getElementById("CriticalRole_option_1_1").value;
          var CRole_select_1_2 =  document.getElementById("CriticalRole_option_1_2").value;
          var CRole_select_1_3 =  document.getElementById("CriticalRole_option_1_3").value;
          var CRole_select_1_4 =  document.getElementById("CriticalRole_option_1_4").value;
          var CRole_select_1_5 =  document.getElementById("CriticalRole_option_1_5").value;
         
        
          var Total_CRole_1    =  Number(CRole_select_1_2) + Number(CRole_select_1_3) + Number(CRole_select_1_4) + Number(CRole_select_1_5);
          document.getElementById("View_critical_role_1").innerHTML = Total_CRole_1 ;
          if(Number(Total_CRole_1) >= 15)
          {
            $('#View_critical_role_1Mark').css('display', 'block');
          }
          else if(Number(Total_CRole_1) <= 14)
          {
            $('#View_critical_role_1Mark').css('display', 'none');
          }

          if(CRole_select_1_5 >= 4)
          {
            OpenModal_Skills(1);
          }
      }
      else if(e1 == 2)
      {
           // var CRole_select_2_1 =  document.getElementById("CriticalRole_option_2_1").value;
            var CRole_select_2_2 =  document.getElementById("CriticalRole_option_2_2").value;
            var CRole_select_2_3 =  document.getElementById("CriticalRole_option_2_3").value;
            var CRole_select_2_4 =  document.getElementById("CriticalRole_option_2_4").value;
            var CRole_select_2_5 =  document.getElementById("CriticalRole_option_2_5").value;
            //Number(CRole_select_2_1) +
            var Total_CRole_2    =  Number(CRole_select_2_2) + Number(CRole_select_2_3) + Number(CRole_select_2_4) + Number(CRole_select_2_5);
            document.getElementById("View_critical_role_2").innerHTML = Total_CRole_2 ;
            if(Number(Total_CRole_2) >= 15)
            {
              $('#View_critical_role_2Mark').css('display', 'block');
            }
            else if(Number(Total_CRole_2) <= 14)
            {
              $('#View_critical_role_2Mark').css('display', 'none');
            }
            if(CRole_select_2_5 >= 4)
            {
              OpenModal_Skills(2);
            }
      }else if(e1 == 3)
      {  
           //var CRole_select_3_1 =  document.getElementById("CriticalRole_option_3_1").value;
          var CRole_select_3_2 =  document.getElementById("CriticalRole_option_3_2").value;
          var CRole_select_3_3 =  document.getElementById("CriticalRole_option_3_3").value;
          var CRole_select_3_4 =  document.getElementById("CriticalRole_option_3_4").value;
          var CRole_select_3_5 =  document.getElementById("CriticalRole_option_3_5").value;
          //Number(CRole_select_3_1) +
          var Total_CRole_3    =  Number(CRole_select_3_2) + Number(CRole_select_3_3) + Number(CRole_select_3_4) + Number(CRole_select_3_5);
          document.getElementById("View_critical_role_3").innerHTML = Total_CRole_3 ;
          if(Number(Total_CRole_3) >= 15)
          {
            $('#View_critical_role_3Mark').css('display', 'block');
          }
          else if(Number(Total_CRole_3) <= 14)
          {
            $('#View_critical_role_3Mark').css('display', 'none');
          }

          if(CRole_select_3_5 >= 4)
            {
              OpenModal_Skills(3);
            }
      }else if(e1 == 4)
      {
        var CRole_select_4_2 =  document.getElementById("CriticalRole_option_4_2").value;
        var CRole_select_4_3 =  document.getElementById("CriticalRole_option_4_3").value;
        var CRole_select_4_4 =  document.getElementById("CriticalRole_option_4_4").value;
        var CRole_select_4_5 =  document.getElementById("CriticalRole_option_4_5").value;
        //Number(CRole_select_4_1) +
        var Total_CRole_4    =  Number(CRole_select_4_2) + Number(CRole_select_4_3) + Number(CRole_select_4_4) + Number(CRole_select_4_5);
        document.getElementById("View_critical_role_4").innerHTML = Total_CRole_4 ;
        if(Number(Total_CRole_4) >= 15)
        {
          $('#View_critical_role_4Mark').css('display', 'block');
        }
        else if(Number(Total_CRole_4) <= 14)
        {
          $('#View_critical_role_4Mark').css('display', 'none');
        }
        if(CRole_select_4_5 >= 4)
            {
              OpenModal_Skills(4);
            }
      }else if(e1 == 5)
      {
        var CRole_select_5_2 =  document.getElementById("CriticalRole_option_5_2").value;
        var CRole_select_5_3 =  document.getElementById("CriticalRole_option_5_3").value;
        var CRole_select_5_4 =  document.getElementById("CriticalRole_option_5_4").value;
        var CRole_select_5_5 =  document.getElementById("CriticalRole_option_5_5").value;
        //Number(CRole_select_5_1) +
        var Total_CRole_5    =  Number(CRole_select_5_2) + Number(CRole_select_5_3) + Number(CRole_select_5_4) + Number(CRole_select_5_5);
        document.getElementById("View_critical_role_5").innerHTML = Total_CRole_5 ;
        if(Number(Total_CRole_5) >= 15)
        {
          $('#View_critical_role_5Mark').css('display', 'block');
        }
        else if(Number(Total_CRole_5) <= 14)
        {
          $('#View_critical_role_5Mark').css('display', 'none');
        }
        if(CRole_select_5_5 >= 4)
            {
              OpenModal_Skills(5);
            }
      }else if(e1 == 6)
      {
        var CRole_select_6_2 =  document.getElementById("CriticalRole_option_6_2").value;
        var CRole_select_6_3 =  document.getElementById("CriticalRole_option_6_3").value;
        var CRole_select_6_4 =  document.getElementById("CriticalRole_option_6_4").value;
        var CRole_select_6_5 =  document.getElementById("CriticalRole_option_6_5").value;
        //Number(CRole_select_6_1) + 
        var Total_CRole_6    = Number(CRole_select_6_2) + Number(CRole_select_6_3) + Number(CRole_select_6_4) + Number(CRole_select_6_5);
        document.getElementById("View_critical_role_6").innerHTML = Total_CRole_6 ;
        if(Number(Total_CRole_6) >= 15)
        {
          $('#View_critical_role_6Mark').css('display', 'block');
        }
        else if(Number(Total_CRole_6) <= 14)
        {
          $('#View_critical_role_6Mark').css('display', 'none');
        }
        if(CRole_select_6_5 >= 4)
            {
              OpenModal_Skills(6);
            }
      }else if(e1 == 7)
      {
        var CRole_select_7_2 =  document.getElementById("CriticalRole_option_7_2").value;
        var CRole_select_7_3 =  document.getElementById("CriticalRole_option_7_3").value;
        var CRole_select_7_4 =  document.getElementById("CriticalRole_option_7_4").value;
        var CRole_select_7_5 =  document.getElementById("CriticalRole_option_7_5").value;
        //Number(CRole_select_7_1) +
        var Total_CRole_7    =  Number(CRole_select_7_2) + Number(CRole_select_7_3) + Number(CRole_select_7_4) + Number(CRole_select_7_5);
        document.getElementById("View_critical_role_7").innerHTML = Total_CRole_7 ;
        if(Number(Total_CRole_7) >= 15)
        {
          $('#View_critical_role_7Mark').css('display', 'block');
        }
        else if(Number(Total_CRole_7) <= 14)
        {
          $('#View_critical_role_7Mark').css('display', 'none');
        }
        if(CRole_select_7_5 >= 4)
            {
              OpenModal_Skills(7);
            }
      }else if(e1 == 8)
      {
        var CRole_select_8_2 =  document.getElementById("CriticalRole_option_8_2").value;
        var CRole_select_8_3 =  document.getElementById("CriticalRole_option_8_3").value;
        var CRole_select_8_4 =  document.getElementById("CriticalRole_option_8_4").value;
        var CRole_select_8_5 =  document.getElementById("CriticalRole_option_8_5").value;
        //Number(CRole_select_8_1) + 
        var Total_CRole_8    = Number(CRole_select_8_2) + Number(CRole_select_8_3) + Number(CRole_select_8_4) + Number(CRole_select_8_5);
        document.getElementById("View_critical_role_8").innerHTML = Total_CRole_8 ;
        if(Number(Total_CRole_8) >= 15)
        {
          $('#View_critical_role_8Mark').css('display', 'block');
        }
        else if(Number(Total_CRole_8) <= 14)
        {
          $('#View_critical_role_8Mark').css('display', 'none');
        }
        if(CRole_select_8_5 >= 4)
            {
              OpenModal_Skills(8);
            }
      }
      else if(e1 == 9)
      {
        var CRole_select_9_2 =  document.getElementById("CriticalRole_option_9_2").value;
        var CRole_select_9_3 =  document.getElementById("CriticalRole_option_9_3").value;
        var CRole_select_9_4 =  document.getElementById("CriticalRole_option_9_4").value;
        var CRole_select_9_5 =  document.getElementById("CriticalRole_option_9_5").value;
        //Number(CRole_select_9_1) +
        var Total_CRole_9    =  Number(CRole_select_9_2) + Number(CRole_select_9_3) + Number(CRole_select_9_4) + Number(CRole_select_9_5);
        document.getElementById("View_critical_role_9").innerHTML = Total_CRole_9 ;
        if(Number(Total_CRole_9) >= 15)
        {
          $('#View_critical_role_9Mark').css('display', 'block');
        }
        else if(Number(Total_CRole_9) <= 14)
        {
          $('#View_critical_role_9Mark').css('display', 'none');
        }
        if(CRole_select_9_5 >= 4)
            {
              OpenModal_Skills(9);
            }
      }else if(e1 == 10)
     {

        var CRole_select_10_2 =  document.getElementById("CriticalRole_option_10_2").value;
        var CRole_select_10_3 =  document.getElementById("CriticalRole_option_10_3").value;
        var CRole_select_10_4 =  document.getElementById("CriticalRole_option_10_4").value;
        var CRole_select_10_5 =  document.getElementById("CriticalRole_option_10_5").value;
        //Number(CRole_select_10_1) +
        var Total_CRole_10    =  Number(CRole_select_10_2) + Number(CRole_select_10_3) + Number(CRole_select_10_4) + Number(CRole_select_10_5);
        document.getElementById("View_critical_role_10").innerHTML = Total_CRole_10 ;
        if(Number(Total_CRole_10) >= 15)
        {
          $('#View_critical_role_10Mark').css('display', 'block');
        }
        else if(Number(Total_CRole_10) <= 14)
        {
          $('#View_critical_role_10Mark').css('display', 'none');
        }
        if(CRole_select_10_5 >= 4)
            {
              OpenModal_Skills(10);
            }
     }
      else{}
     
      
  }

  function Add_CriticalRole_1Values()
  {   //var CRole_select_1_1 =  document.getElementById("CriticalRole_option_1_1").value;
      var CRole_select_1_2 =  document.getElementById("CriticalRole_option_1_2").value;
      var CRole_select_1_3 =  document.getElementById("CriticalRole_option_1_3").value;
      var CRole_select_1_4 =  document.getElementById("CriticalRole_option_1_4").value;
      var CRole_select_1_5 =  document.getElementById("CriticalRole_option_1_5").value;
      
      //Number(CRole_select_1_1) +
      var Total_CRole_1    =  Number(CRole_select_1_2) + Number(CRole_select_1_3) + Number(CRole_select_1_4) + Number(CRole_select_1_5);
      document.getElementById("View_critical_role_1").innerHTML = Total_CRole_1 ;
      if(Number(Total_CRole_1) >= 15)
      {
        $('#View_critical_role_1Mark').css('display', 'block');
      }
      else if(Number(Total_CRole_1) <= 14)
      {
        $('#View_critical_role_1Mark').css('display', 'none');
      }

      
  }

   /* function Add_CriticalRole_2Values()
  { 
     // var CRole_select_2_1 =  document.getElementById("CriticalRole_option_2_1").value;
      var CRole_select_2_2 =  document.getElementById("CriticalRole_option_2_2").value;
      var CRole_select_2_3 =  document.getElementById("CriticalRole_option_2_3").value;
      var CRole_select_2_4 =  document.getElementById("CriticalRole_option_2_4").value;
      var CRole_select_2_5 =  document.getElementById("CriticalRole_option_2_5").value;
      //Number(CRole_select_2_1) +
      var Total_CRole_2    =  Number(CRole_select_2_2) + Number(CRole_select_2_3) + Number(CRole_select_2_4) + Number(CRole_select_2_5);
      document.getElementById("View_critical_role_2").innerHTML = Total_CRole_2 ;
      if(Number(Total_CRole_2) >= 15)
      {
        $('#View_critical_role_2Mark').css('display', 'block');
      }
      else if(Number(Total_CRole_2) <= 14)
      {
        $('#View_critical_role_2Mark').css('display', 'none');
      }
  }*/

 /* function Add_CriticalRole_3Values()
  { 
      //var CRole_select_3_1 =  document.getElementById("CriticalRole_option_3_1").value;
      var CRole_select_3_2 =  document.getElementById("CriticalRole_option_3_2").value;
      var CRole_select_3_3 =  document.getElementById("CriticalRole_option_3_3").value;
      var CRole_select_3_4 =  document.getElementById("CriticalRole_option_3_4").value;
      var CRole_select_3_5 =  document.getElementById("CriticalRole_option_3_5").value;
      //Number(CRole_select_3_1) +
      var Total_CRole_3    =  Number(CRole_select_3_2) + Number(CRole_select_3_3) + Number(CRole_select_3_4) + Number(CRole_select_3_5);
      document.getElementById("View_critical_role_3").innerHTML = Total_CRole_3 ;
      if(Number(Total_CRole_3) >= 15)
      {
        $('#View_critical_role_3Mark').css('display', 'block');
      }
      else if(Number(Total_CRole_3) <= 14)
      {
        $('#View_critical_role_3Mark').css('display', 'none');
      }
  }*/

  /*function Add_CriticalRole_4Values()
  { 
      //var CRole_select_4_1 =  document.getElementById("CriticalRole_option_4_1").value;
      var CRole_select_4_2 =  document.getElementById("CriticalRole_option_4_2").value;
      var CRole_select_4_3 =  document.getElementById("CriticalRole_option_4_3").value;
      var CRole_select_4_4 =  document.getElementById("CriticalRole_option_4_4").value;
      var CRole_select_4_5 =  document.getElementById("CriticalRole_option_4_5").value;
      //Number(CRole_select_4_1) +
      var Total_CRole_4    =  Number(CRole_select_4_2) + Number(CRole_select_4_3) + Number(CRole_select_4_4) + Number(CRole_select_4_5);
      document.getElementById("View_critical_role_4").innerHTML = Total_CRole_4 ;
      if(Number(Total_CRole_4) >= 15)
      {
        $('#View_critical_role_4Mark').css('display', 'block');
      }
      else if(Number(Total_CRole_4) <= 14)
      {
        $('#View_critical_role_4Mark').css('display', 'none');
      }
  }*/

 /* function Add_CriticalRole_5Values()
  { 
     // var CRole_select_5_1 =  document.getElementById("CriticalRole_option_5_1").value;
      var CRole_select_5_2 =  document.getElementById("CriticalRole_option_5_2").value;
      var CRole_select_5_3 =  document.getElementById("CriticalRole_option_5_3").value;
      var CRole_select_5_4 =  document.getElementById("CriticalRole_option_5_4").value;
      var CRole_select_5_5 =  document.getElementById("CriticalRole_option_5_5").value;
      //Number(CRole_select_5_1) +
      var Total_CRole_5    =  Number(CRole_select_5_2) + Number(CRole_select_5_3) + Number(CRole_select_5_4) + Number(CRole_select_5_5);
      document.getElementById("View_critical_role_5").innerHTML = Total_CRole_5 ;
      if(Number(Total_CRole_5) >= 15)
      {
        $('#View_critical_role_5Mark').css('display', 'block');
      }
      else if(Number(Total_CRole_5) <= 14)
      {
        $('#View_critical_role_5Mark').css('display', 'none');
      }
      
  }*/

  /*function Add_CriticalRole_6Values()
  { 
      //var CRole_select_6_1 =  document.getElementById("CriticalRole_option_6_1").value;
      var CRole_select_6_2 =  document.getElementById("CriticalRole_option_6_2").value;
      var CRole_select_6_3 =  document.getElementById("CriticalRole_option_6_3").value;
      var CRole_select_6_4 =  document.getElementById("CriticalRole_option_6_4").value;
      var CRole_select_6_5 =  document.getElementById("CriticalRole_option_6_5").value;
      //Number(CRole_select_6_1) + 
      var Total_CRole_6    = Number(CRole_select_6_2) + Number(CRole_select_6_3) + Number(CRole_select_6_4) + Number(CRole_select_6_5);
      document.getElementById("View_critical_role_6").innerHTML = Total_CRole_6 ;
      if(Number(Total_CRole_6) >= 15)
      {
        $('#View_critical_role_6Mark').css('display', 'block');
      }
      else if(Number(Total_CRole_6) <= 14)
      {
        $('#View_critical_role_6Mark').css('display', 'none');
      }
  }*/

  /*function Add_CriticalRole_7Values()
  { 
     // var CRole_select_7_1 =  document.getElementById("CriticalRole_option_7_1").value;
      var CRole_select_7_2 =  document.getElementById("CriticalRole_option_7_2").value;
      var CRole_select_7_3 =  document.getElementById("CriticalRole_option_7_3").value;
      var CRole_select_7_4 =  document.getElementById("CriticalRole_option_7_4").value;
      var CRole_select_7_5 =  document.getElementById("CriticalRole_option_7_5").value;
      //Number(CRole_select_7_1) +
      var Total_CRole_7    =  Number(CRole_select_7_2) + Number(CRole_select_7_3) + Number(CRole_select_7_4) + Number(CRole_select_7_5);
      document.getElementById("View_critical_role_7").innerHTML = Total_CRole_7 ;
      if(Number(Total_CRole_7) >= 15)
      {
        $('#View_critical_role_7Mark').css('display', 'block');
      }
      else if(Number(Total_CRole_7) <= 14)
      {
        $('#View_critical_role_7Mark').css('display', 'none');
      }
  }*/

  /*function Add_CriticalRole_8Values()
  { 
      //var CRole_select_8_1 =  document.getElementById("CriticalRole_option_8_1").value;
      var CRole_select_8_2 =  document.getElementById("CriticalRole_option_8_2").value;
      var CRole_select_8_3 =  document.getElementById("CriticalRole_option_8_3").value;
      var CRole_select_8_4 =  document.getElementById("CriticalRole_option_8_4").value;
      var CRole_select_8_5 =  document.getElementById("CriticalRole_option_8_5").value;
      //Number(CRole_select_8_1) + 
      var Total_CRole_8    = Number(CRole_select_8_2) + Number(CRole_select_8_3) + Number(CRole_select_8_4) + Number(CRole_select_8_5);
      document.getElementById("View_critical_role_8").innerHTML = Total_CRole_8 ;
      if(Number(Total_CRole_8) >= 15)
      {
        $('#View_critical_role_8Mark').css('display', 'block');
      }
      else if(Number(Total_CRole_8) <= 14)
      {
        $('#View_critical_role_8Mark').css('display', 'none');
      }
  }*/

  /*function Add_CriticalRole_9Values()
  {
      //var CRole_select_9_1 =  document.getElementById("CriticalRole_option_9_1").value;
      var CRole_select_9_2 =  document.getElementById("CriticalRole_option_9_2").value;
      var CRole_select_9_3 =  document.getElementById("CriticalRole_option_9_3").value;
      var CRole_select_9_4 =  document.getElementById("CriticalRole_option_9_4").value;
      var CRole_select_9_5 =  document.getElementById("CriticalRole_option_9_5").value;
      //Number(CRole_select_9_1) +
      var Total_CRole_9    =  Number(CRole_select_9_2) + Number(CRole_select_9_3) + Number(CRole_select_9_4) + Number(CRole_select_9_5);
      document.getElementById("View_critical_role_9").innerHTML = Total_CRole_9 ;
      if(Number(Total_CRole_9) >= 15)
      {
        $('#View_critical_role_9Mark').css('display', 'block');
      }
      else if(Number(Total_CRole_9) <= 14)
      {
        $('#View_critical_role_9Mark').css('display', 'none');
      }
  }*/

  /*function Add_CriticalRole_10Values()
  {
      //var CRole_select_10_1 =  document.getElementById("CriticalRole_option_10_1").value;
      var CRole_select_10_2 =  document.getElementById("CriticalRole_option_10_2").value;
      var CRole_select_10_3 =  document.getElementById("CriticalRole_option_10_3").value;
      var CRole_select_10_4 =  document.getElementById("CriticalRole_option_10_4").value;
      var CRole_select_10_5 =  document.getElementById("CriticalRole_option_10_5").value;
      //Number(CRole_select_10_1) +
      var Total_CRole_10    =  Number(CRole_select_10_2) + Number(CRole_select_10_3) + Number(CRole_select_10_4) + Number(CRole_select_10_5);
      document.getElementById("View_critical_role_10").innerHTML = Total_CRole_10 ;
      if(Number(Total_CRole_10) >= 15)
      {
        $('#View_critical_role_10Mark').css('display', 'block');
      }
      else if(Number(Total_CRole_10) <= 14)
      {
        $('#View_critical_role_10Mark').css('display', 'none');
      }
  }*/

  //The function for showing up the critical role identification div
  $(document).on("click", "#Show_NewCriticalRD", function () {
    $('#View_Incoming_div').css('display', 'none');
    Ajax_View_CRole();
    $('#View_criticalRole_div').css('display', 'block');
    $('#View_critical_role_1Mark').css('display', 'none');
   


   });
 //This will update the critical role view list when the user clicks the
 $(document).on("click", "#Close_CroleModal", function () {
    Ajax_View_CRole();
   });
   
  //The function for showing up the critical role identification div
  $(document).on("click", "#Submit_Critical_Role", function () {
    var CRole_Input_1  =  document.getElementById("CriticalRole_option_1_input").value;
    var CRole_Input_2  =  document.getElementById("CriticalRole_option_2_input").value;
    var CRole_Input_3  =  document.getElementById("CriticalRole_option_3_input").value;
    var CRole_Input_4  =  document.getElementById("CriticalRole_option_4_input").value;
    var CRole_Input_5  =  document.getElementById("CriticalRole_option_5_input").value;
    var CRole_Input_6  =  document.getElementById("CriticalRole_option_6_input").value;
    var CRole_Input_7  =  document.getElementById("CriticalRole_option_7_input").value;
    var CRole_Input_8  =  document.getElementById("CriticalRole_option_8_input").value;
    var CRole_Input_9  =  document.getElementById("CriticalRole_option_9_input").value;
    var CRole_Input_10 =  document.getElementById("CriticalRole_option_10_input").value;

  //  var CRole_Input_1_1 =  document.getElementById("CriticalRole_option_1_1").value;
    var CRole_Input_1_2 =  document.getElementById("CriticalRole_option_1_2").value;
    var CRole_Input_1_3 =  document.getElementById("CriticalRole_option_1_3").value;
    var CRole_Input_1_4 =  document.getElementById("CriticalRole_option_1_4").value;
    var CRole_Input_1_5 =  document.getElementById("CriticalRole_option_1_5").value;
    

   // var CRole_Input_2_1 =  document.getElementById("CriticalRole_option_2_1").value;
    var CRole_Input_2_2 =  document.getElementById("CriticalRole_option_2_2").value;
    var CRole_Input_2_3 =  document.getElementById("CriticalRole_option_2_3").value;
    var CRole_Input_2_4 =  document.getElementById("CriticalRole_option_2_4").value;
    var CRole_Input_2_5 =  document.getElementById("CriticalRole_option_2_5").value;


   // var CRole_Input_3_1 =  document.getElementById("CriticalRole_option_3_1").value;
    var CRole_Input_3_2 =  document.getElementById("CriticalRole_option_3_2").value;
    var CRole_Input_3_3 =  document.getElementById("CriticalRole_option_3_3").value;
    var CRole_Input_3_4 =  document.getElementById("CriticalRole_option_3_4").value;
    var CRole_Input_3_5 =  document.getElementById("CriticalRole_option_3_5").value;
  
    
   // var CRole_Input_4_1 =  document.getElementById("CriticalRole_option_4_1").value;
    var CRole_Input_4_2 =  document.getElementById("CriticalRole_option_4_2").value;
    var CRole_Input_4_3 =  document.getElementById("CriticalRole_option_4_3").value;
    var CRole_Input_4_4 =  document.getElementById("CriticalRole_option_4_4").value;
    var CRole_Input_4_5 =  document.getElementById("CriticalRole_option_4_5").value;
   

   // var CRole_Input_5_1 =  document.getElementById("CriticalRole_option_5_1").value;
    var CRole_Input_5_2 =  document.getElementById("CriticalRole_option_5_2").value;
    var CRole_Input_5_3 =  document.getElementById("CriticalRole_option_5_3").value;
    var CRole_Input_5_4 =  document.getElementById("CriticalRole_option_5_4").value;
    var CRole_Input_5_5 =  document.getElementById("CriticalRole_option_5_5").value;
  

   // var CRole_Input_6_1 =  document.getElementById("CriticalRole_option_6_1").value;
    var CRole_Input_6_2 =  document.getElementById("CriticalRole_option_6_2").value;
    var CRole_Input_6_3 =  document.getElementById("CriticalRole_option_6_3").value;
    var CRole_Input_6_4 =  document.getElementById("CriticalRole_option_6_4").value;
    var CRole_Input_6_5 =  document.getElementById("CriticalRole_option_6_5").value;
    

    //var CRole_Input_7_1 =  document.getElementById("CriticalRole_option_7_1").value;
    var CRole_Input_7_2 =  document.getElementById("CriticalRole_option_7_2").value;
    var CRole_Input_7_3 =  document.getElementById("CriticalRole_option_7_3").value;
    var CRole_Input_7_4 =  document.getElementById("CriticalRole_option_7_4").value;
    var CRole_Input_7_5 =  document.getElementById("CriticalRole_option_7_5").value;
    

   // var CRole_Input_8_1 =  document.getElementById("CriticalRole_option_8_1").value;
    var CRole_Input_8_2 =  document.getElementById("CriticalRole_option_8_2").value;
    var CRole_Input_8_3 =  document.getElementById("CriticalRole_option_8_3").value;
    var CRole_Input_8_4 =  document.getElementById("CriticalRole_option_8_4").value;
    var CRole_Input_8_5 =  document.getElementById("CriticalRole_option_8_5").value;
    

  // var CRole_Input_9_1 =  document.getElementById("CriticalRole_option_9_1").value;
    var CRole_Input_9_2 =  document.getElementById("CriticalRole_option_9_2").value;
    var CRole_Input_9_3 =  document.getElementById("CriticalRole_option_9_3").value;
    var CRole_Input_9_4 =  document.getElementById("CriticalRole_option_9_4").value;
    var CRole_Input_9_5 =  document.getElementById("CriticalRole_option_9_5").value;
    

  //var CRole_Input_10_1 =  document.getElementById("CriticalRole_option_10_1").value;
    var CRole_Input_10_2 =  document.getElementById("CriticalRole_option_10_2").value;
    var CRole_Input_10_3 =  document.getElementById("CriticalRole_option_10_3").value;
    var CRole_Input_10_4 =  document.getElementById("CriticalRole_option_10_4").value;
    var CRole_Input_10_5 =  document.getElementById("CriticalRole_option_10_5").value;
    
    
    var i = 0;
       //CRole_Input_1_1 == 0 ||
      if((CRole_Input_1 == "") || ( CRole_Input_1_2 == 0 || CRole_Input_1_3 == 0 || CRole_Input_1_4 == 0 || CRole_Input_1_5 == 0))
      {
        document.getElementById("role_error").innerHTML = "provide atleast 1 role and rank it across all the 5 option";
        document.getElementById('CriticalRole_option_1_input').focus();
        $('#CriticalRole_error').css('display', 'block');
       
      }else if( ((CRole_Input_2 != "") && (CRole_Input_2_2 == 0 || CRole_Input_2_3 == 0 || CRole_Input_2_4 == 0 || CRole_Input_2_5 == 0))  )
      {//CRole_Input_2_1 == 0 || 
        document.getElementById("role_error").innerHTML = "Please select all the 5 rank options for second role.";
        $('#CriticalRole_error').css('display', 'block');
        document.getElementById('CriticalRole_option_2_input').focus();
      
      }else if((CRole_Input_3 != "") && ( CRole_Input_3_2 == 0 || CRole_Input_3_3 == 0 || CRole_Input_3_4 == 0 || CRole_Input_3_5 == 0))  
      {//CRole_Input_3_1 == 0 ||
        document.getElementById("role_error").innerHTML = "Please select all the 5 rank options for third role.";
        $('#CriticalRole_error').css('display', 'block');
        document.getElementById('CriticalRole_option_3_input').focus();
      }else if((CRole_Input_4 != "") && ( CRole_Input_4_2 == 0 || CRole_Input_4_3 == 0 || CRole_Input_4_4 == 0 || CRole_Input_4_5 == 0))
      {//CRole_Input_4_1 == 0 ||
       document.getElementById("role_error").innerHTML = "Please select all the 5 rank options for fourth role.";
       $('#CriticalRole_error').css('display', 'block');
       document.getElementById('CriticalRole_option_4_input').focus();
      }else if((CRole_Input_5 != "") && (CRole_Input_5_2 == 0 || CRole_Input_5_3 == 0 || CRole_Input_5_4 == 0 || CRole_Input_5_5 == 0))
      {//CRole_Input_5_1 == 0 || 
        document.getElementById("role_error").innerHTML = "Please select all the 5 rank options for fifth role.";
        $('#CriticalRole_error').css('display', 'block');
        ocument.getElementById('CriticalRole_option_5_input').focus();
      }else if((CRole_Input_6 != "") && ( CRole_Input_6_2 == 0 || CRole_Input_6_3 == 0 || CRole_Input_6_4 == 0 || CRole_Input_6_5 == 0))
      {//CRole_Input_6_1 == 0 ||
        document.getElementById("role_error").innerHTML = "Please select all the 5 rank options for sixth role.";
        $('#CriticalRole_error').css('display', 'block');
        document.getElementById('CriticalRole_option_6_input').focus();
      }else if((CRole_Input_7 != "") && ( CRole_Input_7_2 == 0 || CRole_Input_7_3 == 0 || CRole_Input_7_4 == 0 || CRole_Input_7_5 == 0))
      {//CRole_Input_7_1 == 0 ||
        document.getElementById("role_error").innerHTML = "Please select all the 5 rank options for seventh role.";
        $('#CriticalRole_error').css('display', 'block');
        document.getElementById('CriticalRole_option_7_input').focus();
      }else if((CRole_Input_8 != "") && (CCRole_Input_8_2 == 0 || CRole_Input_8_3 == 0 || CRole_Input_8_4 == 0 || CRole_Input_8_5 == 0))
      {//Role_Input_8_1 == 0 || 
        document.getElementById("role_error").innerHTML = "Please select all the 5 rank options for eighth role.";
        $('#CriticalRole_error').css('display', 'block');
        document.getElementById('CriticalRole_option_8_input').focus();
      }else if((CRole_Input_9 != "") && (CRole_Input_9_2 == 0 || CRole_Input_9_3 == 0 || CRole_Input_9_4 == 0 || CRole_Input_9_5 == 0))
      {//CRole_Input_9_1 == 0 || 
        document.getElementById("role_error").innerHTML = "Please select all the 5 rank options for ninth role.";
        $('#CriticalRole_error').css('display', 'block');
        document.getElementById('CriticalRole_option_9_input').focus();
      }else if( (CRole_Input_10 != "") && ( CRole_Input_10_2 == 0 || CRole_Input_10_3 == 0 || CRole_Input_10_4 == 0 || CRole_Input_10_5 == 0))
      {//CRole_Input_10_1 == 0 ||
        document.getElementById("role_error").innerHTML = "Please select all the 5 rank options for tenth role.";
        $('#CriticalRole_error').css('display', 'block');
        document.getElementById('CriticalRole_option_10_input').focus();
      }
      else
      {
        document.getElementById("role_error").innerHTML = "";
        $('#CriticalRole_error').css('display', 'none'); 
        
        for (let i = 1; i < 11; i++) //The loop to pass through all the 10 role input
        { 
          var CRole_array  = [];//The array to hold the role with its rankings
          var Input_label  =  document.getElementById("CriticalRole_option_"+i+"_input").value;
          CRole_array.push(Input_label);//first we append the role to the array
          var CRole_Skill=  document.getElementById("Unique_skill_"+i+"").value;
          CRole_array.push(CRole_Skill);
          if(Input_label != "")
          {
              for (let rank = 2; rank < 6; rank++) //The for loop to get the role ranks in all the 5 input
              {
                var CRole_rank =  document.getElementById("CriticalRole_option_"+i+"_"+rank+"").value;
                CRole_array.push(CRole_rank);//Then we append the ranking to the role already in the array
                
                if(rank == 5)//When all the 5 rankings have been appended to the array
                {
                  $.ajax({
                    url: "<?php echo base_url("Forum/Ajax_Save_role");?>",
                    type: "POST",
                    cache: false,
                    data: { CRoleData: CRole_array},
                    success: function(data){

                      
                      if(data == 1)
                      {
                        $("#CriticalRole_option_"+i+"_input").val("");
                        document.getElementById("role_success").innerHTML = " your roles have been successfully submitted, Thanks";
                        $('#CriticalRole_success').css('display', 'block');
                        Ajax_View_CRole();
                      }
                      else
                      {
                        document.getElementById("role_error").innerHTML = "'"+data+"' already exits";
                        $('#CriticalRole_error').css('display', 'block');
                        $("#CriticalRole_option_"+i+"_input").css('borderColor', 'red');
                        
                      }
                      
                    
                    }
                    });

                }
                
              }
          }

        }

        function close_Modal()
        {
          setInterval(function(){alert("Hello")},3000);
        }


      }
      

    });
  
  function Ajax_View_CRole()
  {
    
    $.ajax({
              url: "<?php echo base_url("Forum/Ajax_View_CRoles");?>",
              type: "POST",
              cache: false,
              data: { G:1},
              success: function(data){
              $('#View_Crole_table').html(data); 
              
              }
              });
              
  }

  
  //This will popup the modetail for more details about the role descriptions
 $(document).on("click", "#ViewMoreDetails_No", function () {
      var Role_No   = $(this).data('no');
      if(Role_No == 1)
      {
        document.getElementById("modal_ViewMoreDetail_label").innerHTML = "<span style=\"color:#00335a; font-size:15px;\"> Low External Candidate Availability</span>";
        document.getElementById("ViewMoreDetails_1View").innerHTML = "<span> Rate how difficult you expect it would be to fill this critical role with an external candidate. Higher scores indicate greater difficulty in finding external hires.</span>";
        $('#modal_ViewMoreDetail').modal('toggle');
      }else if(Role_No == 2)
      {
        document.getElementById("modal_ViewMoreDetail_label").innerHTML = "<span style=\"color:#00335a; font-size:15px;\"> Poor Internal Bench Strength</span>";
        document.getElementById("ViewMoreDetails_1View").innerHTML = "<span> Evaluate how long you think it would take for an internal succession candidate to become ready to fill this role. You can use the following values as a guideline to rate your succession bench strength: <br /><i style=\"color:#c6ca18;font-weight:bold;\">&#10003;</i> 1-2 = strong bench, multiple candidates ready in 1-3 years<br /><i style=\"color:#c6ca18;font-weight:bold;\">&#10003;</i> 3 = moderate bench, some candidates ready in 3-5 years <br /><i style=\"color:#c6ca18;font-weight:bold;\">&#10003;</i> 4-5 = weak bench, few candidates that won’t be ready for 5+ years</span>";
        $('#modal_ViewMoreDetail').modal('toggle');
      }
      else if(Role_No == 3)
      {
        document.getElementById("modal_ViewMoreDetail_label").innerHTML = "<span style=\"color:#00335a; font-size:15px;\">Strong Impact on Business</span>";
        document.getElementById("ViewMoreDetails_1View").innerHTML = "<span> Rate how immediately and severely your business would be affected if this critical role was made vacant today. Again, higher scores indicate a greater impact.</span>";
        $('#modal_ViewMoreDetail').modal('toggle');
      }
      else if(Role_No == 4)
      {
        document.getElementById("modal_ViewMoreDetail_label").innerHTML = "<span style=\"color:#00335a; font-size:15px;\">Unique Skill Set or Knowledge Base</span>";
        document.getElementById("ViewMoreDetails_1View").innerHTML = "<span> Consider if this role requires any specialized skills or knowledge. Evaluate not only the skills needed to be qualified for the role, but also the institutional knowledge that is needed to be successful in this role.</span>";
        $('#modal_ViewMoreDetail').modal('toggle');
      }
      else{}

   });

   //For adding a critical role unique skill
   $(document).on("click", "#Add_UniqueSkill_btn", function () {  
    var CRole_Number       =  document.getElementById("Role_Number").value;
    var CRole_UniqueSkill=  document.getElementById("The_role_Unique_skill_input").value;
    if(CRole_UniqueSkill == "" || CRole_UniqueSkill ==null)
    {
      document.getElementById("CriticalRole_error_skill").innerHTML = "Please provide that unique skill!";
    }
    else if(CRole_UniqueSkill != "" || CRole_UniqueSkill !=null)
    {
      document.getElementById("CriticalRole_error_skill").innerHTML = "";
      $('#modal_ViewMoreDetail_UniqueSkill').modal('hide');
      
      if(CRole_Number == 1){ $('#Unique_skill_1').val(CRole_UniqueSkill); }
      else if(CRole_Number == 2){ $('#Unique_skill_2').val(CRole_UniqueSkill); }
      else if(CRole_Number == 3){ $('#Unique_skill_3').val(CRole_UniqueSkill); }
      else if(CRole_Number == 4){ $('#Unique_skill_4').val(CRole_UniqueSkill); }
      else if(CRole_Number == 5){ $('#Unique_skill_5').val(CRole_UniqueSkill); }
      else if(CRole_Number == 6){ $('#Unique_skill_6').val(CRole_UniqueSkill); }
      else if(CRole_Number == 7){ $('#Unique_skill_7').val(CRole_UniqueSkill); }
      else if(CRole_Number == 8){ $('#Unique_skill_8').val(CRole_UniqueSkill); }
      else if(CRole_Number == 9){ $('#Unique_skill_9').val(CRole_UniqueSkill); }
      else if(CRole_Number == 10){ $('#Unique_skill_10').val(CRole_UniqueSkill); }
     
    }

   });

   //For clearing the specific role unique before closing the modal
   $(document).on("click", "#Cancel_UniqueSkill_btn", function () {  
      document.getElementById("CriticalRole_error_skill").innerHTML = "";
      $('#The_role_Unique_skill_input').val("");
      
   });

   //This is for editing the critical role modal opening 
   $(document).on("click", "#Edit_Role_btn", function () {  
      
      var Crole_id   = $(this).data('rid');
      var Crole_des  = $(this).data('rdes');
      var Crole_rnk1 = $(this).data('r1');
      var Crole_rnk2 = $(this).data('r2');
      var Crole_rnk3 = $(this).data('r3');
      var Crole_rnk4 = $(this).data('r4');
      var Crole_skill= $(this).data('skill');
          $("#Edit_CriticalRole_option_1_5").val(Crole_rnk4);
          $('#modal_EditMoreDetail_UniqueSkill').modal('hide');
          $('#Edit_CriticalRole_option_1_input').val(Crole_des.replace(/[+]/gi, ' '));
          $("#Edit_CriticalRole_option_1_2").val(Crole_rnk1).change();
          $("#Edit_CriticalRole_option_1_3").val(Crole_rnk2).change();
          $("#Edit_CriticalRole_option_1_4").val(Crole_rnk3).change();
          $("#EditCritical_role_id").val(Crole_id);
          document.getElementById("Edit_CriticalRole_error_skill").innerHTML = "";
        if(Crole_skill == 0)
        {
          $('#Edit_The_role_Unique_skill_input').val("");
        }
        else
        {
          $('#Edit_The_role_Unique_skill_input').val(Crole_skill.replace(/[+]/gi, ' '));
        }
          $('#modal_EditCrole').modal('toggle');
   });

   function Edit_CriticalRole_1Values(N1)
   {
      var EditCRole_select_1_2 =  document.getElementById("Edit_CriticalRole_option_1_2").value;
      var EditCRole_select_1_3 =  document.getElementById("Edit_CriticalRole_option_1_3").value;
      var EditCRole_select_1_4 =  document.getElementById("Edit_CriticalRole_option_1_4").value;
      var EditCRole_select_1_5 =  document.getElementById("Edit_CriticalRole_option_1_5").value;
      
      var Numb1 = N1.getAttribute("data-num1");
      
      var Total_CRole_1    =  Number(EditCRole_select_1_2) + Number(EditCRole_select_1_3) + Number(EditCRole_select_1_4) + Number(EditCRole_select_1_5);
      document.getElementById("Edit_View_critical_role_1").innerHTML = Total_CRole_1 ;
      if(Number(Total_CRole_1) >= 15)
      {
        $('#Edit_View_critical_role_1Mark').css('display', 'block');
      }
      else if(Number(Total_CRole_1) <= 14)
      {
        $('#Edit_View_critical_role_1Mark').css('display', 'none');
      }
      if(EditCRole_select_1_5 >= 4 && Numb1 == 5)
      {
          $('#modal_EditMoreDetail_UniqueSkill').modal('toggle');
      }
   }
//This is for saving editing the critical role
$(document).on("click", "#Add_EditUniqueSkill_btn", function () {  
  
      var EditCRole_description=  document.getElementById("Edit_CriticalRole_option_1_input").value;
      var EditCRole_id         =  document.getElementById("EditCritical_role_id").value;
      var EditCRole_select_1_2 =  document.getElementById("Edit_CriticalRole_option_1_2").value;
      var EditCRole_select_1_3 =  document.getElementById("Edit_CriticalRole_option_1_3").value;
      var EditCRole_select_1_4 =  document.getElementById("Edit_CriticalRole_option_1_4").value;
      var EditCRole_select_1_5 =  document.getElementById("Edit_CriticalRole_option_1_5").value;
      var EditCRole_skill      =  document.getElementById("Edit_The_role_Unique_skill_input").value;

      if(EditCRole_description == "" || EditCRole_description == null)
      {
        document.getElementById("Edit_CriticalRole_error_skill").innerHTML = "Please provide your critical role before clicking on the update buttom";
      }else if(EditCRole_select_1_2 == 0 || EditCRole_select_1_3 == 0 || EditCRole_select_1_4 == 0 || EditCRole_select_1_5 == 0)
      {
        document.getElementById("Edit_CriticalRole_error_skill").innerHTML = "Please select a ranking beyond zero to proceed";
      }else if(EditCRole_select_1_2 != 0 && EditCRole_select_1_3 != 0 && EditCRole_select_1_4 != 0 && EditCRole_select_1_5 != 0 && EditCRole_description != "" )
      {
        document.getElementById("Edit_CriticalRole_error_skill").innerHTML = "";
        $.ajax({
              url: "<?php echo base_url("Forum/Ajax_Edit_CRoles");?>",
              type: "POST",
              cache: false,
              data: { G:1,Rid:EditCRole_id,Rdes:EditCRole_description,Rrnk1:EditCRole_select_1_2,Rrnk2:EditCRole_select_1_3,Rrnk3:EditCRole_select_1_4,Rrnk5:EditCRole_select_1_5,skill:EditCRole_skill},
              success: function(data){
                Ajax_View_CRole();
                $('#modal_EditCrole').modal('hide');
              }
              });
      }
      else{}
              
   });

    $(document).on("click", "#Update_UniqueSkill_btn", function () {  
      $('#modal_EditMoreDetail_UniqueSkill').modal('hide'); 
    });

    $(document).on("click", "#ViewIncomingPlans", function () {  
      $('#View_criticalRole_div').css('display', 'none');
      $('#ViewPlansDiv').css('display', 'none');
      $('#View_Incoming_div').css('display', 'block');
    });

    //This will load the roles of the selected deppartment
    function ViewDepPlans_selected()
    {
      var PlanDep  =  document.getElementById("ViewPlanDepSelect").value;
      if(PlanDep == 0)  { $('#ViewPlansDiv').css('display', 'none'); }
      else
      {
        $.ajax({
              url: "<?php echo base_url("Forum/Ajax_View_IncomingPlan");?>",
              type: "POST",
              cache: false,
              data: { Dep:PlanDep},
              success: function(data){
              $('#ViewCreatedPlan_table').html(data); 
              
              }
              });

        $('#ViewPlansDiv').css('display', 'block');
      }
    
    }
//for loading the employee's critical role view
$(document).on("click", "#View_CRoles_Dep", function () {  
  var Crole_fname   = $(this).data('fname');
  var Crole_sname   = $(this).data('sname');
  var Crole_eid     = $(this).data('empid');
  
  document.getElementById("ViewCRole_owner").innerHTML = "You are viewing <b>"+Crole_fname+" "+Crole_sname+"</b>'s Critical roles form";
  $.ajax({
              url: "<?php echo base_url("Forum/Ajax_View_HRCPlan");?>",
              type: "POST",
              cache: false,
              data: { id:Crole_eid},
              success: function(data){
              $('#ViewCRoles_tbody').html(data); 
              }
              });

             $('#modal_ViewCrole').modal('toggle');
  
    });

    //To load view option for unique skill
    $(document).on("click", "#ViewUniqueskill", function () {  
      
      var Unique_skill = $(this).data('skill');
      $("#view_The_role_Unique_skill_input").val(Unique_skill.replace(/[`]/gi, ' '));
      $('#ViewMoreDetail_UniqueSkill').modal('toggle');
    });

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
            <li ><a href="<?php echo base_url();?>Forum/pdp"><i class="fa fa-id-card" aria-hidden="true"></i><?php echo $Menu_item_04_04 ?></a></li><!--DPD Option-->
            <li class="active"><a href="<?php echo base_url();?>Forum/Planning"><i class="fa fa-line-chart" aria-hidden="true"></i><?php echo $Menu_item_04_05 ?></a></li><!--DPD Option-->
          
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
            $this->load->view('side_menu_planning'); 
            ?>
        </div>
        <!------------------------------------------------------------------------------------>
        <div id="View_criticalRole_div" class="col-md-9">
        
        <div class="box " >
           <div class="box-header with-border">
           <em class="pull-left" style="font-weight:bold;font-size:14px;">Critical Roles Identification Templates</em>
            <button id="Add_EditUniqueSkill_btn" type="button" class="btn btn-secondary btn-sm pull-right "  data-toggle="modal" data-target="#AddNewCriticalRole" style="background-color:#020560;color:white;margin-left:3%;cursor: pointer;">Add New&nbsp;<i class="fa fa-plus-circle pull-right" aria-hidden="true"></i></button>
           </div>
           <div class="box-body " style="font-family: Tahoma;" >
               <!-- Button trigger modal -->


                      <!-- Modal -->
                      <div class="modal fade bd-example-modal-lg" id="AddNewCriticalRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            
                            <div class="modal-body" >
                              <div class="row" style="border-radius: 5px;border: 1px solid #c6ca18;margin:2px;padding:5px;">
                                <table style="width:90%;margin-left:5%; ">

                                  <tr>
                                    <td colspan="5">
                                       
                                       <div class="pull-left" style="color:#00335a;border-radius: 5px;margin:2px;text-align: bottom;horizontal-align: bottom;font-size:30px;font-weight:bold;">
                                       Critical Roles Identification Questionnaire
                                       </div>
                                       <div class="pull-right"><img src="<?php echo base_url();?>uploads/img/logo.png" alt="Trulli" width="90" height="50"></div>
                                    </td>
                                  </tr>

                                  <tr>
                                    <td colspan="5">
                                       <div style="color:white;border-radius: 5px;border: 1px solid #c6ca18;margin:2px;background-color:#c6ca18;text-align: center;vertical-align: middle;">
                                       List your critical roles below and rate them on each criterion according to the following rating scale.<br />A checkmark shall be added to the roles with the highest total scores.
                                       </div>
                                    </td>
                                  </tr>

                                  
                               
                                  <tr  style="font-size:11px;line-height: 15px;border-radius: 5px;border: 1px solid #c6ca18;margin:3px;font-weight:bold;color:#00335a;padding:5px;">
                                    <td><div class="pull-right has-dropcap" >1 Not descriptive<br />of this role&nbsp;&nbsp;&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i></div></td>
                                    <td><div class="pull-right has-dropcap2" >2 Slightly descriptive<br />of this role</div></td>
                                    <td><div class="pull-right has-dropcap3" >3 Moderately descriptive<br />of this role</div></td>
                                    <td><div class="pull-right has-dropcap4" >4 Strongly descriptive<br />of this role</div></td>
                                    <td><div class="pull-right has-dropcap5" >5 Very descriptive<br />of this role</div></td>
                                    </tr>
                               
                                  
                                 
                                </table>

                                <table style="width:90%;margin-left:5%;margin-top:5px;">
                                  <tr style="font-size:12px;line-height: 11px;">
                                    <td style="background-color:#c6ca18;text-align: center;vertical-align: middle;font-weight:bold;">Critical Role</td>
                                    <!--<td style="background-color:#00335a;color:white;text-align: center;vertical-align: middle;">Urgent Need</td>-->
                                    <td title="Click to view more details" style="background-color:#00335a;color:white;text-align: center;vertical-align: middle;cursor: pointer;" id="ViewMoreDetails_No" data-no="1">Low External<br/>Candidate<br />Availability</td>
                                    <td title="Click to view more details" style="background-color:#00335a;color:white;text-align: center;vertical-align: middle;cursor: pointer;" id="ViewMoreDetails_No" data-no="2">Poor Internal<br />Bench Strength</td>
                                    <td title="Click to view more details" style="background-color:#00335a;color:white;text-align: center;vertical-align: middle;cursor: pointer;" id="ViewMoreDetails_No" data-no="3">Strong Impact on<br />Business</td>
                                    <td title="Click to view more details" style="background-color:#00335a;color:white;text-align: center;vertical-align: middle;cursor: pointer;" id="ViewMoreDetails_No" data-no="4">Unique Skill Set or <br />Knowledge Base</td>
                                    <td style="background-color:#00335a;color:white;text-align: center;vertical-align: middle;font-weight:bold;">TOTAL</td>
                                    <td style="background-color:#c6ca18;text-align: center;vertical-align: middle;font-weight:bold;">&nbsp;&nbsp;&#10003;&nbsp;&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td style="padding:3px;"><input type="text" class="form-control" id="CriticalRole_option_1_input" style="border-radius: 5px;border: 1px solid #c6ca18;"><input id="Unique_skill_1" type="hidden"></input></td>
                                    <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select id="CriticalRole_option_1_2" class="form-select form-select-sm" aria-label=".form-select-sm example"  onchange="Add_CriticalRole_1Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>

                                    <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select id="CriticalRole_option_1_3" class="form-select form-select-sm" aria-label=".form-select-sm example"  onchange="Add_CriticalRole_1Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>

                                    <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select id="CriticalRole_option_1_4" class="form-select form-select-sm" aria-label=".form-select-sm example"  onchange="Add_CriticalRole_1Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                    </td>
                                    <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select id="CriticalRole_option_1_5" class="form-select form-select-sm" aria-label=".form-select-sm example" data-nit="1" onchange="Add_CriticalRole_1Values5(this)">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                    </td>
                                    <td style="text-align: center;vertical-align: middle;font-weight:bold; font-size:17px;">
                                    <div id="View_critical_role_1" style="border-radius: 5px;border: 1px solid #cad1eb;background-color:#cad1eb;margin:2px;"></div>
                                    </td>
                                    <td style="text-align: center;vertical-align: middle;font-weight:bold;color:#c6ca18;"><div id="View_critical_role_1Mark" style="border-radius: 5px;border: 1px solid #c6ca18;margin:2px;">&nbsp;&nbsp;&#10003;&nbsp;&nbsp;</div></td>
                                  </tr>

                                  <tr>
                                     <td style="padding:3px;"><input type="text" class="form-control" id="CriticalRole_option_2_input"  style="border-radius: 5px;border: 1px solid #c6ca18;"><input id="Unique_skill_2" type="hidden"></input></td>
                                    <!-- <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_2_1" onchange="Add_CriticalRole_2Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>-->
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_2_2" onchange="Add_CriticalRole_2Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_2_3" onchange="Add_CriticalRole_2Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_2_4" onchange="Add_CriticalRole_2Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_2_5" data-nit="2" onchange="Add_CriticalRole_1Values5(this)" ><!--onchange="Add_CriticalRole_2Values()"-->
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="text-align: center;vertical-align: middle;font-weight:bold; font-size:17px;">
                                     <div id="View_critical_role_2" style="border-radius: 5px;border: 1px solid #cad1eb;background-color:#cad1eb;margin:2px;"></div>
                                     </td>
                                     <td style="text-align: center;vertical-align: middle;font-weight:bold;color:#c6ca18;"><div id="View_critical_role_2Mark" style="border-radius: 5px;border: 1px solid #c6ca18;margin:2px;">&nbsp;&nbsp;&#10003;&nbsp;&nbsp;</div></td>
                                       
                                   
                                  </tr>

                                  <tr>
                                     <td style="padding:3px;"><input type="text" class="form-control" id="CriticalRole_option_3_input"  style="border-radius: 5px;border: 1px solid #c6ca18;"><input id="Unique_skill_3" type="hidden"></input></td>
                                    <!-- <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_3_1" onchange="Add_CriticalRole_3Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>-->
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_3_2" onchange="Add_CriticalRole_3Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_3_3" onchange="Add_CriticalRole_3Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_3_4" onchange="Add_CriticalRole_3Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_3_5" data-nit="3" onchange="Add_CriticalRole_1Values5(this)" ><!-- onchange="Add_CriticalRole_3Values()"-->
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="text-align: center;vertical-align: middle;font-weight:bold; font-size:17px;">
                                     <div id="View_critical_role_3" style="border-radius: 5px;border: 1px solid #cad1eb;background-color:#cad1eb;margin:2px;"></div>
                                     </td>
                                     <td style="text-align: center;vertical-align: middle;font-weight:bold;color:#c6ca18;"><div id="View_critical_role_3Mark" style="border-radius: 5px;border: 1px solid #c6ca18;margin:2px;">&nbsp;&nbsp;&#10003;&nbsp;&nbsp;</div></td>
                                  </tr>


                                  <tr>
                                     <td style="padding:3px;"><input type="text" class="form-control" id="CriticalRole_option_4_input" style="border-radius: 5px;border: 1px solid #c6ca18;"><input id="Unique_skill_4" type="hidden"></input></td>
                                    <!-- <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_4_1" onchange="Add_CriticalRole_4Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>-->
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_4_2" onchange="Add_CriticalRole_4Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_4_3" onchange="Add_CriticalRole_4Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_4_4" onchange="Add_CriticalRole_4Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_4_5" data-nit="4" onchange="Add_CriticalRole_1Values5(this)"><!-- onchange="Add_CriticalRole_4Values()" -->
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="text-align: center;vertical-align: middle;font-weight:bold; font-size:17px;">
                                     <div id="View_critical_role_4" style="border-radius: 5px;border: 1px solid #cad1eb;background-color:#cad1eb;margin:2px;"></div>
                                     </td>
                                     <td style="text-align: center;vertical-align: middle;font-weight:bold;color:#c6ca18;"><div id="View_critical_role_4Mark" style="border-radius: 5px;border: 1px solid #c6ca18;margin:2px;">&nbsp;&nbsp;&#10003;&nbsp;&nbsp;</div></td></tr>

                                  <tr>
                                     <td style="padding:3px;"><input type="text" class="form-control" id="CriticalRole_option_5_input" style="border-radius: 5px;border: 1px solid #c6ca18;"><input id="Unique_skill_5" type="hidden"></input></td>
                                    <!-- <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_5_1" onchange="Add_CriticalRole_5Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>-->
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_5_2" onchange="Add_CriticalRole_5Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_5_3" onchange="Add_CriticalRole_5Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_5_4" onchange="Add_CriticalRole_5Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_5_5" data-nit="5" onchange="Add_CriticalRole_1Values5(this)"><!-- onchange="Add_CriticalRole_5Values()"-->
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="text-align: center;vertical-align: middle;font-weight:bold; font-size:17px;">
                                     <div id="View_critical_role_5" style="border-radius: 5px;border: 1px solid #cad1eb;background-color:#cad1eb;margin:2px;"></div>
                                     </td>
                                     <td style="text-align: center;vertical-align: middle;font-weight:bold;color:#c6ca18;"><div id="View_critical_role_5Mark" style="border-radius: 5px;border: 1px solid #c6ca18;margin:2px;">&nbsp;&nbsp;&#10003;&nbsp;&nbsp;</div></td></tr>
                                    </tr>


                                  <tr>
                                     <td style="padding:3px;"><input type="text" class="form-control" id="CriticalRole_option_6_input" style="border-radius: 5px;border: 1px solid #c6ca18;"><input id="Unique_skill_6" type="hidden"></input></td>
                                    <!-- <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_6_1" onchange="Add_CriticalRole_6Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>-->
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_6_2" onchange="Add_CriticalRole_6Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_6_3" onchange="Add_CriticalRole_6Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_6_4" onchange="Add_CriticalRole_6Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_6_5" data-nit="6" onchange="Add_CriticalRole_1Values5(this)"> <!--  onchange="Add_CriticalRole_6Values()"-->
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="text-align: center;vertical-align: middle;font-weight:bold; font-size:17px;">
                                     <div id="View_critical_role_6" style="border-radius: 5px;border: 1px solid #cad1eb;background-color:#cad1eb;margin:2px;"></div>
                                     </td>
                                     <td style="text-align: center;vertical-align: middle;font-weight:bold;color:#c6ca18;"><div id="View_critical_role_6Mark" style="border-radius: 5px;border: 1px solid #c6ca18;margin:2px;">&nbsp;&nbsp;&#10003;&nbsp;&nbsp;</div></td>
                                  </tr>

                                  <tr>
                                     <td style="padding:3px;"><input type="text" class="form-control" id="CriticalRole_option_7_input" style="border-radius: 5px;border: 1px solid #c6ca18;"><input id="Unique_skill_7" type="hidden"></input></td>
                                    <!-- <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_7_1" onchange="Add_CriticalRole_7Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>-->
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_7_2" onchange="Add_CriticalRole_7Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_7_3" onchange="Add_CriticalRole_7Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_7_4" onchange="Add_CriticalRole_7Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_7_5" data-nit="7" onchange="Add_CriticalRole_1Values5(this)" ><!-- onchange="Add_CriticalRole_7Values()" -->
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="text-align: center;vertical-align: middle;font-weight:bold; font-size:17px;">
                                     <div id="View_critical_role_7" style="border-radius: 5px;border: 1px solid #cad1eb;background-color:#cad1eb;margin:2px;"></div>
                                     </td>
                                     <td style="text-align: center;vertical-align: middle;font-weight:bold;color:#c6ca18;"><div id="View_critical_role_7Mark" style="border-radius: 5px;border: 1px solid #c6ca18;margin:2px;">&nbsp;&nbsp;&#10003;&nbsp;&nbsp;</div></td>
                                   
                                   </tr>


                                  <tr>
                                     <td style="padding:3px;"><input type="text" class="form-control" id="CriticalRole_option_8_input" style="border-radius: 5px;border: 1px solid #c6ca18;"><input id="Unique_skill_8" type="hidden"></input></td>
                                   <!--  <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_8_1" onchange="Add_CriticalRole_8Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>-->
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_8_2" onchange="Add_CriticalRole_8Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_8_3" onchange="Add_CriticalRole_8Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_8_4" onchange="Add_CriticalRole_8Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_8_5" data-nit="8" onchange="Add_CriticalRole_1Values5(this)"><!--  onchange="Add_CriticalRole_8Values()"-->
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="text-align: center;vertical-align: middle;font-weight:bold; font-size:17px;">
                                     <div id="View_critical_role_8" style="border-radius: 5px;border: 1px solid #cad1eb;background-color:#cad1eb;margin:2px;"></div>
                                     </td>
                                     <td style="text-align: center;vertical-align: middle;font-weight:bold;color:#c6ca18;"><div id="View_critical_role_8Mark" style="border-radius: 5px;border: 1px solid #c6ca18;margin:2px;">&nbsp;&nbsp;&#10003;&nbsp;&nbsp;</div></td>
                                   </tr>


                                  <tr>
                                     <td style="padding:3px;"><input type="text" class="form-control" id="CriticalRole_option_9_input" style="border-radius: 5px;border: 1px solid #c6ca18;"><input id="Unique_skill_9" type="hidden"></input></td>
                                    <!-- <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_9_1" onchange="Add_CriticalRole_9Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>-->
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_9_2" onchange="Add_CriticalRole_9Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_9_3" onchange="Add_CriticalRole_9Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_9_4" onchange="Add_CriticalRole_9Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_9_5" data-nit="9" onchange="Add_CriticalRole_1Values5(this)"> <!-- onchange="Add_CriticalRole_9Values()" -->
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="text-align: center;vertical-align: middle;font-weight:bold; font-size:17px;">
                                     <div id="View_critical_role_9" style="border-radius: 5px;border: 1px solid #cad1eb;background-color:#cad1eb;margin:2px;"></div>
                                     </td>
                                     <td style="text-align: center;vertical-align: middle;font-weight:bold;color:#c6ca18;"><div id="View_critical_role_9Mark" style="border-radius: 5px;border: 1px solid #c6ca18;margin:2px;">&nbsp;&nbsp;&#10003;&nbsp;&nbsp;</div></td>
                                   
                                  </tr>


                                  <tr>
                                     <td style="padding:3px;"><input type="text" class="form-control" id="CriticalRole_option_10_input" style="border-radius: 5px;border: 1px solid #c6ca18;"><input id="Unique_skill_10" type="hidden"></input></td>
                                    <!-- <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_10_1" onchange="Add_CriticalRole_10Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>-->
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_10_2" onchange="Add_CriticalRole_10Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_10_3" onchange="Add_CriticalRole_10Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_10_4" onchange="Add_CriticalRole_10Values()">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="CriticalRole_option_10_5" data-nit="10" onchange="Add_CriticalRole_1Values5(this)" ><!-- onchange="Add_CriticalRole_10Values()"-->
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>
                                     <td style="text-align: center;vertical-align: middle;font-weight:bold; font-size:17px;">
                                     <div id="View_critical_role_10" style="border-radius: 5px;border: 1px solid #cad1eb;background-color:#cad1eb;margin:2px;"></div>
                                     </td>
                                     <td style="text-align: center;vertical-align: middle;font-weight:bold;color:#c6ca18;"><div id="View_critical_role_10Mark" style="border-radius: 5px;border: 1px solid #c6ca18;margin:2px;">&nbsp;&nbsp;&#10003;&nbsp;&nbsp;</div></td>
                                   
                                  </tr>
                                  </table>
                                    <div>
                                        <div class="row pull-left">
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" id="Close_CroleModal" style="background-color:#c6ca18">Close</button>
                                        </div>
                                        
                                        <div class="row pull-right">
                                            <button id="Submit_Critical_Role" type="button" class="btn btn-secondary btn-sm "  style="background-color:#c6ca18;">Submit</button>
                                        </div>
                                    </div>
                                    <input type="hidden" id="Role_count" value="0"></input>
                                    <div style="text-align: center;color:red;margin-top:5px;" id="CriticalRole_error"><i class="fa fa-smile-o" aria-hidden="true"></i> Hello, <b><?php $session_name = $this->session->userdata('kms_emp_data_secondname'); echo $session_name;  ?></b> <em id="role_error"></em></div>
                                    <div style="text-align: center;color:green;margin-top:5px;" id="CriticalRole_success"><i class="fa fa-smile-o" aria-hidden="true"></i> Hello, <b><?php $session_name = $this->session->userdata('kms_emp_data_secondname'); echo $session_name;  ?></b> <em id="role_success"></em></div>
                              </div>
                             
                            </div>
                            
                          </div>
                        </div>
                      </div>

                      <!------------------------------------->
                      <table  id="datatable_dep_employee" class="table table-bordered table-hover " style="font-size:13px;">
                  <thead>
                  <tr>
                    <th>##</th>
                    <th> Role Description</th>
                    <th>Total Rank</th>
                    <th>Date Added</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody id="View_Crole_table">
                  
                
                  
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>##</th>
                    <th> Role Description</th>
                    <th>Total Rank</th>
                    <th>Date Added</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
                      <!------------------------------------>
           </div>
        </div>

    <!-------------------------------------------------------------------->

    <div id="modal_ViewMoreDetail" class="modal fade bd-example-modal-sm"   data-backdrop="true" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">>
            <div class="modal-dialog modal-sm" >
              <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 id="modal_ViewMoreDetail_label" class="modal-title" style="font-weight:bold;"></h4>
                  </div>
                    <div class="modal-body">
                      <div id="ViewMoreDetails_1View"> </div>
                    </div>
              </div>
            </div>
    </div>
    <!--------------------------------------------------------------------> 
<!-------------------------------------------------------------------->

<div id="modal_ViewMoreDetail_UniqueSkill" class="modal fade bd-example-modal-sm"   data-backdrop="true" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">>
            <div class="modal-dialog modal-sm" >
              <div class="modal-content">
                  <div class="modal-header">
                 
                     <h4  class="modal-title" style="font-weight:bold;font-size:15px;">Unique Skill Set or Knowledge Base</h4>
                  </div>
                    <div class="modal-body">
                      <input type="hidden" id="Role_Number"/>
                    <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                              <label for="add_pdp_accomptype_selected_val"  id="add_pdp_accomptype_label">The Unique Skill:</label>
                              <textarea id="The_role_Unique_skill_input" class="form-control" placeholder="Specify that unique skill or knowledge base" rows="3" style="border-radius: 5px;border: 1px solid #c6ca18;"></textarea>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                    <button id="Cancel_UniqueSkill_btn" data-dismiss="modal" type="button" class="btn btn-secondary btn-sm pull-left"  style="background-color:gray;margin-left:5%;color:white;">Cancel&nbsp;<i class="fa fa-window-close-o" aria-hidden="true"></i></button>
                  
                      <button id="Add_UniqueSkill_btn" type="button" class="btn btn-secondary btn-sm pull-right "  style="background-color:#c6ca18;margin-right:5%;color:white;">Add&nbsp;<i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                    </div>
                    <div style="text-align: center;color:red;margin-top:5px;" id="CriticalRole_error_skill"> </div>

                    </div>
              </div>
            </div>
    </div>
    <!--------------------------------------------------------------------> 

    <div id="modal_EditCrole" class="modal fade bd-example-modal-lg"   data-backdrop="true" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">>
            <div class="modal-dialog modal-lg" >
              <div class="modal-content">
                  <div class="modal-header">
                 
                     <h4  class="modal-title" style="font-weight:bold;font-size:15px;">Edit Critical Role</h4>
                  </div>
                    <div class="modal-body">
                   
                 
                    <div class="row" style="border-radius: 5px;border: 1px solid #c6ca18;margin:1px;padding:2px;margin-bottom:3%;">
                                <table style="width:100%;">

                                  <tr  style="font-size:11px;line-height: 15px;border-radius: 5px;border: 1px solid #c6ca18;margin:3px;font-weight:bold;color:#00335a;padding:5px;">
                                    <td><div class="pull-right has-dropcap" >1 Not descriptive<br />of this role</div></td>
                                    <td><div class="pull-right has-dropcap2" >2 Slightly descriptive<br />of this role</div></td>
                                    <td><div class="pull-right has-dropcap3" >3 Moderately descriptive<br />of this role</div></td>
                                    <td><div class="pull-right has-dropcap4" >4 Strongly descriptive<br />of this role</div></td>
                                    <td><div class="pull-right has-dropcap5" >5 Very descriptive<br />of this role</div></td>
                                    </tr>
                               
                                  
                                 
                                </table>

                                <table style="width:100%;margin-top:5px;">
                                  <tr style="font-size:12px;line-height: 11px;">
                                    <td style="background-color:#c6ca18;text-align: center;vertical-align: middle;font-weight:bold;">Critical Role</td>
                                    <td title="Click to view more details" style="background-color:#00335a;color:white;text-align: center;vertical-align: middle;cursor: pointer;" id="ViewMoreDetails_No" data-no="1">Low External<br/>Candidate<br />Availability</td>
                                    <td title="Click to view more details" style="background-color:#00335a;color:white;text-align: center;vertical-align: middle;cursor: pointer;" id="ViewMoreDetails_No" data-no="2">Poor Internal<br />Bench Strength</td>
                                    <td title="Click to view more details" style="background-color:#00335a;color:white;text-align: center;vertical-align: middle;cursor: pointer;" id="ViewMoreDetails_No" data-no="3">Strong Impact on<br />Business</td>
                                    <td title="Click to view more details" style="background-color:#00335a;color:white;text-align: center;vertical-align: middle;cursor: pointer;" id="ViewMoreDetails_No" data-no="4">Unique Skill Set or <br />Knowledge Base</td>
                                    <td style="background-color:#00335a;color:white;text-align: center;vertical-align: middle;font-weight:bold;">TOTAL</td>
                                    <td style="background-color:#c6ca18;text-align: center;vertical-align: middle;font-weight:bold;">&nbsp;&nbsp;&#10003;&nbsp;&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td style="padding:3px;"><textarea row="3"  class="form-control" id="Edit_CriticalRole_option_1_input" style="border-radius: 5px;border: 1px solid #c6ca18;"></textarea></td>
                                    <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select id="Edit_CriticalRole_option_1_2" class="form-select form-select-sm" aria-label=".form-select-sm example"  onchange="Edit_CriticalRole_1Values(this)">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>

                                    <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select id="Edit_CriticalRole_option_1_3" class="form-select form-select-sm" aria-label=".form-select-sm example"  onchange="Edit_CriticalRole_1Values(this)">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                     </td>

                                    <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select id="Edit_CriticalRole_option_1_4" class="form-select form-select-sm" aria-label=".form-select-sm example"  onchange="Edit_CriticalRole_1Values(this)">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                    </td>
                                    <td style="background-color:#e8e8e8;text-align: center;vertical-align: middle;">
                                        <select id="Edit_CriticalRole_option_1_5" class="form-select form-select-sm" aria-label=".form-select-sm example" data-num1="5" onchange="Edit_CriticalRole_1Values(this)">
                                        <option value="0"> &nbsp;&nbsp;0&nbsp;&nbsp;</option>
                                        <option value="1"> &nbsp;&nbsp;1&nbsp;&nbsp;</option>
                                        <option value="2"> &nbsp;&nbsp;2&nbsp;&nbsp;</option>
                                        <option value="3"> &nbsp;&nbsp;3&nbsp;&nbsp;</option>
                                        <option value="4"> &nbsp;&nbsp;4&nbsp;&nbsp;</option>
                                        <option value="5"> &nbsp;&nbsp;5&nbsp;&nbsp;</option>
                                        </select>
                                    </td>
                                    <td style="text-align: center;vertical-align: middle;font-weight:bold; font-size:17px;">
                                    <div id="Edit_View_critical_role_1" style="border-radius: 5px;border: 1px solid #cad1eb;background-color:#cad1eb;margin:2px;"></div>
                                    </td>
                                    <td style="text-align: center;vertical-align: middle;font-weight:bold;color:#c6ca18;"><div id="Edit_View_critical_role_1Mark" style="border-radius: 5px;border: 1px solid #c6ca18;margin:2px;">&nbsp;&nbsp;&#10003;&nbsp;&nbsp;</div></td>
                                  </tr>

                                </table>
                    </div>
                    <div class="row">
                    <button id="Cancel_UniqueSkill_btn" data-dismiss="modal" type="button" class="btn btn-secondary btn-sm pull-left"  style="background-color:gray;margin-left:5%;color:white;">Cancel&nbsp;<i class="fa fa-window-close-o" aria-hidden="true"></i></button>
                    <button id="Add_EditUniqueSkill_btn" type="button" class="btn btn-secondary btn-sm pull-right "  style="background-color:#c6ca18;margin-right:5%;color:white;">Update&nbsp;<i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                    </div>
                    <div style="text-align: center;color:red;" id="Edit_CriticalRole_error_skill"> </div>
                    </div>
              </div>
            </div>
    </div>
    <!--------------------------------------------------------------------> 
<!-------------------------------------------------------------------->

<div id="modal_EditMoreDetail_UniqueSkill" class="modal fade bd-example-modal-sm"   data-backdrop="true" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">>
            <div class="modal-dialog modal-sm" >
              <div class="modal-content">
                  <div class="modal-header">
                 
                     <h4  class="modal-title" style="font-weight:bold;font-size:15px;">Editing Unique Skill/Knowledge Base</h4>
                  </div>
                    <div class="modal-body">
                      <input type="hidden" id="Role_Number"/>
                        <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                  <label for="add_pdp_accomptype_selected_val"  id="add_pdp_accomptype_label">The Unique Skill:</label>
                                  <textarea id="Edit_The_role_Unique_skill_input" class="form-control" placeholder="Specify that unique skill or knowledge base" rows="3" style="border-radius: 5px;border: 1px solid #c6ca18;"></textarea>
                                  <input type="hidden" id="EditCritical_role_id"></input>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                          <button id="Cancel_UniqueSkill_btn" data-dismiss="modal" type="button" class="btn btn-secondary btn-sm pull-left"  style="background-color:gray;margin-left:5%;color:white;">Cancel&nbsp;<i class="fa fa-window-close-o" aria-hidden="true"></i></button>
                          <button id="Update_UniqueSkill_btn" type="button" class="btn btn-secondary btn-sm pull-right "  style="background-color:#c6ca18;margin-right:5%;color:white;">Update&nbsp;<i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                        </div>
                        <div style="text-align: center;color:red;margin-top:5px;" id="EditCriticalRole_error_skill"> </div>

                     </div>
              </div>
            </div>
</div> </div>
 
         <!------------------------------------------------------------------------------------>
  <div id="View_Incoming_div" class="col-md-9">
        
        <div class="box box-primary" >
           <div class="box-header with-border">
           
              <strong class="pull-left" style="font-weight:bold;font-size:14px;">Incoming Templates</strong>
              <div class="col-sm-6 pull-right">
                <div class="form-group">
                  <label for="kms_input_PDP_setup_type" class="col-sm-3 control-label">Department:</label>
                    <div class="col-sm-6">
                      <select class="form-control" id="ViewPlanDepSelect" onchange="return ViewDepPlans_selected();">
                        <option value="0">Select the department</option>
                        <option value="6">Supply Chain</option>
                        <option value="5">Production</option>
                        <option value="4">Commercial</option>
                        <option value="3">Finance</option>
                        <option value="10">Inventory</option>
                        <option value="7">Maintenance</option>
                        <option value="8">QA & I / Design</option>
                        <option value="2">HR & Administration</option>
                      </select>
                  </div> 
               </div>
              </div>
          
           </div>
              <div class="box-body " style="" >
                <div id="ViewPlansDiv">
                  <table id="example1" class="table table-bordered table-hover">
                        <thead>
                        <tr><th><i class="fa fa-users" aria-hidden="true" style="color:green;"></i> Employee's Name</th> <th><i class="fa fa-asterisk" aria-hidden="true" style="color:green;"></i> Critical Roles</th> <th><i class="fa fa-cogs" aria-hidden="true" style="color:green;"></i> Action</th> </tr>
                        </thead>
                        <tbody id="ViewCreatedPlan_table">

                        </tbody>
                      <tfoot>  <tr> <th><i class="fa fa-users" aria-hidden="true" style="color:green;"></i> Employee's Name</th> <th><i class="fa fa-asterisk" aria-hidden="true" style="color:green;"></i> Critical Roles</th> <th><i class="fa fa-cogs" aria-hidden="true" style="color:green;"></i> Action</th> </tfoot>
                  </table>
                </div>
              </div>
        </div>
  
  </div>

<!--------------------------------------------------------------------> 

<div id="modal_ViewCrole" class="modal fade bd-example-modal-lg"   data-backdrop="true" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">>
            <div class="modal-dialog modal-lg" >
              <div class="modal-content">
                  <div class="modal-header">
                 
                     <h4 id="ViewCRole_owner" class="modal-title" style="font-weight:bold;font-size:15px;"></h4>
                  </div>
                    <div class="modal-body">
                   
                 
                    <div class="row" style="border-radius: 5px;border: 1px solid #c6ca18;margin:1px;padding:2px;margin-bottom:3%;">
                                <table style="width:100%;">

                                  <tr  style="font-size:11px;line-height: 15px;border-radius: 5px;border: 1px solid #c6ca18;margin:3px;font-weight:bold;color:#00335a;padding:5px;">
                                    <td><div class="pull-right has-dropcap" >1 Not descriptive<br />of this role</div></td>
                                    <td><div class="pull-right has-dropcap2" >2 Slightly descriptive<br />of this role</div></td>
                                    <td><div class="pull-right has-dropcap3" >3 Moderately descriptive<br />of this role</div></td>
                                    <td><div class="pull-right has-dropcap4" >4 Strongly descriptive<br />of this role</div></td>
                                    <td><div class="pull-right has-dropcap5" >5 Very descriptive<br />of this role</div></td>
                                    </tr>
                               
                                  
                                 
                                </table>

                                <table style="width:100%;margin-top:5px;">
                                  <tr style="font-size:12px;line-height: 11px;">
                                    <td style="background-color:#c6ca18;text-align: center;vertical-align: middle;font-weight:bold;">Critical Role</td>
                                    <td title="Click to view more details" style="background-color:#00335a;color:white;text-align: center;vertical-align: middle;cursor: pointer;" >Low External<br/>Candidate<br />Availability</td>
                                    <td title="Click to view more details" style="background-color:#00335a;color:white;text-align: center;vertical-align: middle;cursor: pointer;" >Poor Internal<br />Bench Strength</td>
                                    <td title="Click to view more details" style="background-color:#00335a;color:white;text-align: center;vertical-align: middle;cursor: pointer;" >Strong Impact on<br />Business</td>
                                    <td title="Click to view more details" style="background-color:#00335a;color:white;text-align: center;vertical-align: middle;cursor: pointer;" >Unique Skill Set or <br />Knowledge Base</td>
                                    <td style="background-color:#00335a;color:white;text-align: center;vertical-align: middle;font-weight:bold;">TOTAL</td>
                                    <td style="background-color:#c6ca18;text-align: center;vertical-align: middle;font-weight:bold;">&nbsp;&nbsp;&#10003;&nbsp;&nbsp;</td>
                                  </tr>
                                  <tbody id="ViewCRoles_tbody"></tbody>

                                </table>
                    </div>
                    <div class="row">
                    <button id="Cancel_UniqueSkill_btn" data-dismiss="modal" type="button" class="btn btn-secondary btn-sm pull-left"  style="background-color:gray;margin-left:5%;color:white;">Cancel&nbsp;<i class="fa fa-window-close-o" aria-hidden="true"></i></button>
                    <!--<button id="Add_EditUniqueSkill_btn" type="button" class="btn btn-secondary btn-sm pull-right "  style="background-color:#c6ca18;margin-right:5%;color:white;">Update&nbsp;<i class="fa fa-floppy-o" aria-hidden="true"></i></button>-->
                    </div>
                    <div style="text-align: center;color:red;" id="Edit_CriticalRole_error_skill"> </div>
                    </div>
              </div>
            </div>
    </div>
  </div>
  <!-------------------------------------------------------------------->

<div id="ViewMoreDetail_UniqueSkill" class="modal fade bd-example-modal-sm"   data-backdrop="true" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">>
            <div class="modal-dialog modal-sm" >
              <div class="modal-content">
                  <div class="modal-header">
                 
                     <h4  class="modal-title" style="font-weight:bold;font-size:15px;"> Unique Skill/Knowledge Base</h4>
                  </div>
                    <div class="modal-body">
                      <input type="hidden" id="Role_Number"/>
                        <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                  <label for="add_pdp_accomptype_selected_val"  id="add_pdp_accomptype_label">The Unique Skill:</label>
                                  <textarea id="view_The_role_Unique_skill_input" readonly class="form-control" placeholder="Specify that unique skill or knowledge base" rows="3" style="border-radius: 5px;border: 1px solid #c6ca18;"></textarea>
                                  
                              </div>
                            </div>
                        </div>
                        <div class="row">
                          <button id="Cancel_UniqueSkill_btn" data-dismiss="modal" type="button" class="btn btn-secondary btn-sm pull-left"  style="background-color:gray;margin-left:5%;color:white;">Close&nbsp;<i class="fa fa-window-close-o" aria-hidden="true"></i></button>
                          
                        </div>
                        <div style="text-align: center;color:red;margin-top:5px;" id="EditCriticalRole_error_skill"> </div>

                     </div>
              </div>
            </div>
</div> </div>
 
         <!------------------------------------------------------------------------------------>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  


</div>
<script src="<?php echo base_url();?>ext/dist/js/js_all.js"></script>
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>ext/bower_components/jquery/dist/jquery.min.js"></script>
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
$(document).ready(function() {
    $('#datatable_dep_employee').DataTable({"pageLength": 8});

    $('#example1').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false});
    }); 
    
} );

</body>