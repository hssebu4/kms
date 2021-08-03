<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Session extends CI_Model {

    public function index()
	{  
        $this->load->helper('url');
        $this->load->database();
        //Load session library
  }
    
function Login($kms_username,$kms_key)
{   
  $this->Dates_Notice_dob();
  $this->Dates_Notice_doj();
              
                $Fetch_select_query =  "SELECT kms_access. * ,kms_star_data.kms_emp_supervisor, kms_star_data.kms_department_id, kms_emp_data.emp_data_id, kms_emp_data.emp_data_sname, kms_emp_data.emp_data_fname, kms_emp_role_data.kms_emp_role_data_description, kms_department.kms_department_description,kms_star_data.kms_star_level
                                        FROM kms_access, kms_emp_data, kms_star_data, kms_emp_role_data, kms_department
                                        WHERE kms_access.kms_access_username = ?
                                        AND kms_emp_data.emp_data_id = kms_access.emp_data_id
                                        AND kms_star_data.emp_data_id = kms_emp_data.emp_data_id
                                        AND kms_emp_role_data.kms_emp_role_data_id = kms_star_data.kms_emp_role_data_id
                                        AND kms_star_data.kms_department_id = kms_department.kms_department_id
                                        AND kms_access.kms_access_status != 0
                                        LIMIT 1   
                                       ";
            
            $Fetch_Login_results = $this->db->query($Fetch_select_query,$kms_username);
            $Fetched_Results = $Fetch_Login_results->num_rows();

            if ( ! $this->db->query($Fetch_select_query,$kms_username))
            {
            $error = $this->db->error(); // Has keys 'code' and 'message'
            return $error;
            }else if($Fetched_Results !=0 )
            {
                foreach ($Fetch_Login_results->result_array() as $row)
                {  
                    
                     //adding data to session 
                     $this->session->set_userdata('kms_access_username',$row['kms_access_username']);
                     $this->session->set_userdata('kms_access_user_key',$row['kms_access_userkey']);
                     $this->session->set_userdata('kms_access_user_id',$row['kms_access_id']);
                     $this->session->set_userdata('kms_emp_id',$row['emp_data_id']);
                     $this->session->set_userdata('kms_emp_data_secondname',$row['emp_data_sname']);
                     $this->session->set_userdata('kms_emp_data_firstname',$row['emp_data_fname']);
                     $this->session->set_userdata('kms_access_user_dept_id',$row['kms_department_id']);
                     $this->session->set_userdata('kms_emp_role',$row['kms_emp_role_data_description']);
                     $this->session->set_userdata('kms_access_role_status',$row['kms_access_role']);//kms_access_role
                     $this->session->set_userdata('kms_access_user_key_status',$row['kms_access_key_status']);
                     $this->session->set_userdata('kms_access_user_level',$row['kms_star_level']);
                     $this->session->set_userdata('kms_supervisor_id',$row['kms_emp_supervisor']);
                     $this->session->set_userdata('kms_dept_description',$row['kms_department_description']);

                     //kms_department_description
                 
                     
                     if($row['kms_department_id'] == 8)
                      {
                        $this->session->set_userdata('kms_emp_department',"Design");
                      }
                      else if($row['kms_department_id'] == 9)
                      {
                        $this->session->set_userdata('kms_emp_department',"Technology");
                      }
                      else 
                      {
                        $this->session->set_userdata('kms_emp_department',$row['kms_department_description']); 
                      }
                }

                        if($kms_key ==  $this->session->userdata('kms_access_user_key'))
                        {
                            $pass = 1;//Incase the username and userkey are both valid
                            $this->session->set_userdata('kms_access_status',1);
                        }else  if($kms_key !=  $this->session->userdata('kms_access_user_key'))
                        {
                            $pass = 2;//Incase the username is valid but userkey is Invalid
                           
                        }
                        else{}
              }
            else
            { $pass = 3;  }
            return $pass;

}

    function Dates_Notice_dob()
       {
           $Select_today_dates   =   "SELECT kms_emp_dates.kms_emp_dates_id, kms_emp_dates.kms_emp_id, kms_emp_dates.kms_emp_dates_dob, kms_emp_data.emp_data_sname, kms_emp_phone.kms_emp_phone_number
                                      FROM kms_emp_dates, kms_emp_data, kms_emp_phone
                                      WHERE MONTH( kms_emp_dates.kms_emp_dates_dob ) = MONTH( CURRENT_DATE( ) )
                                      AND kms_emp_data.emp_data_id = kms_emp_dates.kms_emp_id
                                      AND kms_emp_phone.emp_data_id = kms_emp_dates.kms_emp_id";
            $User_Dates_results  =    $this->db->query($Select_today_dates)->result_array();

            if(isset($User_Dates_results) && $User_Dates_results != null)
            {
                 foreach($User_Dates_results as $Dates_res)
                 {
                          $kms_notice_rec   =  "KMS-".$Dates_res['emp_data_sname'];
                          $kms_notice_rnum  =  $Dates_res['kms_emp_phone_number'];
                          $kms_notice_date  =  $Dates_res['kms_emp_dates_dob'];
                          $kms_notice_emp_id=  $Dates_res['kms_emp_id'];

                          $kms_day_today   = date('d');
                          $kms_day_tomonth = date('m');
                          $kms_day_toyear  = date('Y');

                          $kms_day_user    = DATE('d', strtotime($kms_notice_date));
                          $kms_month_user  = DATE('m', strtotime($kms_notice_date));
                          $kms_year_user   = DATE('Y', strtotime($kms_notice_date));

                          $kms_user_age    = ($kms_day_toyear - $kms_year_user);
                          if(substr($kms_user_age,-1) == 1){$kms_date_superscript = "st";}
                          else if(substr($kms_user_age,-1) == 2){$kms_date_superscript = "nd";}
                          else if(substr($kms_user_age,-1) == 3){$kms_date_superscript = "rd";}
                          else{$kms_date_superscript = "th";}

                          $kms_message_text= "NHOP wishes you the very best on your birthday and everything good in the year ahead. Happy Birthday.";

                          if(($kms_day_today == $kms_day_user) && ($kms_day_tomonth == $kms_month_user))
                          {
                            //Then we first check if the record exits before we saves the notice
                            $kms_birthday_check  =   "SELECT *
                                                      FROM kms_noticification
                                                      WHERE kms_noticification.kms_notice_emp_id = ".$this->db->escape($kms_notice_emp_id)."
                                                      AND kms_noticification.kms_notice_date = ".$this->db->escape(date("Y-m-d"))."";                         
                            $kms_birthday_rownum =   $this->db->query($kms_birthday_check)->num_rows(); 

                            if($kms_birthday_rownum == 0 )
                            {
                              $kms_birthday_query  =  "INSERT INTO kms_noticification (kms_notice_receiver,kms_notice_sender,kms_notice_text,kms_notice_status,kms_notice_emp_id,kms_notice_date)
                                                        VALUES (".$kms_notice_rnum.",
                                                                ".$this->db->escape($kms_notice_rec).",
                                                                ".$this->db->escape($kms_message_text).",
                                                                4,
                                                                ".$this->db->escape($kms_notice_emp_id).",
                                                                ".$this->db->escape(date("Y-m-d"))."
                                                                )";
                                    $this->db->query($kms_birthday_query);  
                            } 
                                                 
                            
                          }
                        
                 }

                
        
            }

         
       }


       function Dates_Notice_doj()
       {
           $Select_today_dates   =   "SELECT kms_emp_dates.kms_emp_dates_id, kms_emp_dates.kms_emp_id, kms_emp_dates.kms_emp_dates_doj, kms_emp_data.emp_data_sname, kms_emp_phone.kms_emp_phone_number
                                      FROM kms_emp_dates, kms_emp_data, kms_emp_phone
                                      WHERE MONTH( kms_emp_dates.kms_emp_dates_doj ) = MONTH( CURRENT_DATE( ) )
                                      AND kms_emp_data.emp_data_id = kms_emp_dates.kms_emp_id
                                      AND kms_emp_phone.emp_data_id = kms_emp_dates.kms_emp_id";
            $User_Dates_results  =    $this->db->query($Select_today_dates)->result_array();

            if(isset($User_Dates_results) && $User_Dates_results != null)
            {
                 foreach($User_Dates_results as $Dates_res)
                 {
                          $kms_notice_rec   =  "KMS-".$Dates_res['emp_data_sname'];
                          $kms_notice_rnum  =  $Dates_res['kms_emp_phone_number'];
                          $kms_notice_date  =  $Dates_res['kms_emp_dates_doj'];
                          $kms_notice_emp_id=  $Dates_res['kms_emp_id'];

                          $kms_day_today   = date('d');
                          $kms_day_tomonth = date('m');
                          $kms_day_toyear  = date('Y');

                          $kms_day_user    = DATE('d', strtotime($kms_notice_date));
                          $kms_month_user  = DATE('m', strtotime($kms_notice_date));
                          $kms_year_user   = DATE('Y', strtotime($kms_notice_date));

                          $kms_user_year   = ($kms_day_toyear - $kms_year_user);

                          if($kms_user_year >1){ $Years_user = "s";}else{ $Years_user = "";}

                          $kms_message_text= "Congratulations on yet another year of working with NHOP and we wish you the very best for the year. Thank you for working with us for ".$kms_user_year." year".$Years_user."";

                          if(($kms_day_today == $kms_day_user) && ($kms_day_tomonth == $kms_month_user))
                          {
                            //Then we first check if the record exits before we saves the notice
                            $kms_birthday_check  =   "SELECT *
                                                      FROM kms_noticification
                                                      WHERE kms_noticification.kms_notice_emp_id = ".$this->db->escape($kms_notice_emp_id)."
                                                      AND kms_noticification.kms_notice_date = ".$this->db->escape(date("Y-m-d"))."";                         
                            $kms_birthday_rownum =   $this->db->query($kms_birthday_check)->num_rows(); 

                            if($kms_birthday_rownum == 0 )
                            {
                              $kms_birthday_query  =  "INSERT INTO kms_noticification (kms_notice_receiver,kms_notice_sender,kms_notice_text,kms_notice_status,kms_notice_emp_id,kms_notice_date)
                              VALUES (".$kms_notice_rnum.",
                                      ".$this->db->escape($kms_notice_rec).",
                                      ".$this->db->escape($kms_message_text).",
                                      4,
                                      ".$this->db->escape($kms_notice_emp_id).",
                                      ".$this->db->escape(date("Y-m-d"))."
                                      )";
                              $this->db->query($kms_birthday_query);  
                            } 
                                                 
                          }
                        
                 }

                
        
            }

            
         
       }


       
       function Validate_request($kms_reset_key_phone,$kms_reset_username)
       {
         $kms_validate_query  = "SELECT `kms_emp_email`.`kms_emp_email_name`
                                 FROM `kms_emp_email`
                                 WHERE `kms_emp_email`.`emp_data_id` = (
                                   SELECT `kms_emp_phone`.`emp_data_id`
                                   FROM `kms_emp_phone`
                                   WHERE `kms_emp_phone`.`emp_data_id` = (
                                     SELECT `kms_access`.`emp_data_id`
                                     FROM `kms_access`
                                     WHERE `kms_access`.`kms_access_username` = '".$kms_reset_username."' )
                                 AND `kms_emp_phone`.`kms_emp_phone_number` = '".$kms_reset_key_phone."'
                                 LIMIT 1 ) 
                                 AND `kms_emp_email`.`kms_emp_email_name` =  '".$kms_reset_username."' ";

         $kms_validate_query2 = $this->db->query($kms_validate_query);
         $Returned_rows       = $kms_validate_query2->num_rows();
        
           if($Returned_rows != 1)
           {
             return '000';
           }else
           {
            
              foreach($kms_validate_query2->result_array() as $RestDat)
              {
                $kms_reset_email = $RestDat["kms_emp_email_name"];
              }

             return $kms_reset_email;
           }
       
       }


 function SupervisorData($User_id)
    {

      $Supervisor_query   =  "SELECT `kms_star_data`.`emp_data_id` , `kms_emp_data`.`emp_data_sname` , `kms_emp_data`.`emp_data_fname`
                              FROM `kms_star_data` , `kms_emp_data`
                              WHERE `kms_star_data`.`emp_data_id` =?
                              AND `kms_emp_data`.`emp_data_id` = `kms_star_data`.`kms_emp_supervisor`
                              LIMIT 1";
      $Supervisor_results =  $this->db->query($Supervisor_query,$User_id)->result_array();
       if(! $Supervisor_results)
        {
          return 0;
        }
        else
        {
          return $Supervisor_results;
        }
    
    }








}
?>