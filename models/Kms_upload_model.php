<?php 
class Kms_upload_model extends CI_Model
{
   //This function is to save the uploaded files details to the database
   function Upload_File($Upload_userID,$Upload_details,$Upload_location,$Upload_date,$Upload_format,$Upload_size)
   {
        //the query for inserting data into the database
        $save_upload_query = "INSERT INTO kms_upload (emp_data_id,kms_upload_details,kms_upload_location,kms_upload_date,kms_upload_format,kms_upload_size)
        VALUE(".$this->db->escape($Upload_userID).",".$this->db->escape($Upload_details).",".$this->db->escape($Upload_location).",".$this->db->escape($Upload_date).",".$this->db->escape($Upload_format).",".$this->db->escape($Upload_size).")";

        $this->db->query($save_upload_query);
        $SaveQueryResult = $this->db->affected_rows();
        return $SaveQueryResult;
   }  
 
   function Fetch_all_uploadfile_byuser($kms_upload_userid)
   {
       $Fetch_select_query = "SELECT kms_upload.* FROM `kms_upload` WHERE kms_upload.emp_data_id = ? AND kms_upload.kms_upload_status =1 ORDER BY kms_upload.kms_upload_id DESC";
       //SELECT * FROM `kms_upload` WHERE emp_data_id = ? AND kms_upload_status =1
       $Fetchupload_results = $this->db->query($Fetch_select_query, $kms_upload_userid);
       
       if ( !$Fetchupload_results) 
       {
               $error = $this->db->error(); // Has keys 'code' and 'message'
               return $error;
       }else
       {
          return $Fetchupload_results;
       }

   }
  
    //This function is to save the uploaded files details to the database that are sent to other users
    //Upload_File_share($Upload_share_userID,$Upload_file_id,$Upload_file_share_date,$Upload_file_share_time,$Upload_file_share_forum,$Upload_file_share_recp,$Upload_file_share_message)

    function Upload_File_share($Upload_share_project_id,$Upload_share_userID,$Upload_file_id,$Upload_file_share_date,$Upload_file_share_time,$Upload_file_share_forum,$Upload_file_share_recp,$Upload_file_share_message,$Upload_user_dept_id)
    {   
      
      $kms_file_exploded_forum = explode(',',$Upload_file_share_forum);
      $kms_file_exploded_recipt = explode(',',$Upload_file_share_recp);
      $kms_file_exploded_project = explode(',',$Upload_share_project_id);
      $kms_forum_size  = sizeof($kms_file_exploded_forum);
      $kms_recip_size  = sizeof($kms_file_exploded_recipt);
      $kms_project_size  = sizeof($kms_file_exploded_project);
     
      if($kms_forum_size == 1 && $kms_file_exploded_recipt[0] == ""  && $Upload_file_share_forum !="" && $kms_file_exploded_forum !="0")//Incase user selected on forum to recive the file
      {
                        $save_upload_query = "INSERT INTO  kms_upload_share (kms_uploader_share_id,kms_upload_id,kms_upload_share_date,kms_upload_share_time,kms_upload_share_rec_forum_id,kms_upload_share_rec_emp_id,kms_upload_share_message,kms_upload_share_send_forum_id,kms_upload_share_project_id)
                        VALUE(".$this->db->escape($Upload_share_userID).",
                           ".$this->db->escape($Upload_file_id).",
                           ".$this->db->escape($Upload_file_share_date).",
                           ".$this->db->escape($Upload_file_share_time).",
                           ".$this->db->escape($Upload_file_share_forum).",0,
                           ".$this->db->escape($Upload_file_share_message).",
                           ".$this->db->escape($Upload_user_dept_id).",0
                           )";
                           
                           $this->db->query($save_upload_query);
               
               //First obtain the receiver contacts
               $Get_receiver_forum_contact = "SELECT kms_emp_data.emp_data_sname AS Rname, kms_emp_phone.kms_emp_phone_number AS Rphone
                                                FROM kms_emp_data, kms_star_data, kms_emp_phone
                                                WHERE kms_star_data.kms_department_id =".$this->db->escape($Upload_file_share_forum)."
                                                AND kms_star_data.emp_data_id = kms_emp_data.emp_data_id
                                                AND kms_emp_phone.emp_data_id = kms_star_data.emp_data_id";
               $Get_receiver_forum_contact_results = $this->db->query($Get_receiver_forum_contact)->result_array(); 
               
               foreach ($Get_receiver_forum_contact_results as $Result1)
                { //The message composed with as the sender name and the receiver name
                  $Sender = $Result1['Rname']."-".$this->session->userdata('kms_emp_data_secondname');
                  //Then we store the noticification details as below
                  $Save_notice = "INSERT INTO  kms_noticification (kms_notice_receiver,kms_notice_sender,kms_notice_text)
                                  VALUE (".'0'.$Result1['Rphone'].",
                                  ".$this->db->escape($Sender).",
                                  ".$this->db->escape($Upload_file_share_message)."
                                  )";
                  $this->db->query($Save_notice);
               }

              

      } 
      if($kms_forum_size > 1 && $kms_file_exploded_recipt[0] == ""  && $Upload_file_share_forum !="")
      {
                  foreach($kms_file_exploded_forum as $kms_forum_id)
                     {
                        $save_upload_query = "INSERT INTO  kms_upload_share (kms_uploader_share_id,kms_upload_id,kms_upload_share_date,kms_upload_share_time,kms_upload_share_rec_forum_id,kms_upload_share_rec_emp_id,kms_upload_share_message,kms_upload_share_send_forum_id,kms_upload_share_project_id)
                        VALUE(".$this->db->escape($Upload_share_userID).",
                             ".$this->db->escape($Upload_file_id).",
                             ".$this->db->escape($Upload_file_share_date).",
                             ".$this->db->escape($Upload_file_share_time).",
                             ".$this->db->escape($kms_forum_id).",0,
                             ".$this->db->escape($Upload_file_share_message).",
                             ".$this->db->escape($Upload_user_dept_id).",
                             0
                             )";

                             $this->db->query($save_upload_query);
                              //First obtain the receiver contacts
                              $Get_receiver_forum_contact = "SELECT kms_emp_data.emp_data_sname AS Rname, kms_emp_phone.kms_emp_phone_number AS Rphone
                                                            FROM kms_emp_data, kms_star_data, kms_emp_phone
                                                            WHERE kms_star_data.kms_department_id =".$this->db->escape($kms_forum_id)."
                                                            AND kms_star_data.emp_data_id = kms_emp_data.emp_data_id
                                                            AND kms_emp_phone.emp_data_id = kms_star_data.emp_data_id";


                              $Get_receiver_forum_contact_results = $this->db->query($Get_receiver_forum_contact)->result_array(); 

                              foreach ($Get_receiver_forum_contact_results as $Result1)
                              { //The message composed with as the sender name and the receiver name
                                 $Sender = $Result1['Rname']."-".$this->session->userdata('kms_emp_data_secondname');
                                 //Then we store the noticification details as below
                                 $Save_notice = "INSERT INTO  kms_noticification (kms_notice_receiver,kms_notice_sender,kms_notice_text)
                                                VALUE (".$Result1['Rphone'].",
                                                ".$this->db->escape($Sender).",
                                                ".$this->db->escape($Upload_file_share_message)."
                                                )";
                                 $this->db->query($Save_notice);
                              }
                     }

      }  
      if($kms_recip_size == 1 && $kms_forum_size == 1 && $Upload_file_share_forum != "" && $Upload_file_share_recp != "" && $Upload_file_share_recp !="0" && $Upload_file_share_forum != "0")//Incase user selected on forum to recive the file
      {
                        $save_upload_query = "INSERT INTO  kms_upload_share (kms_uploader_share_id,kms_upload_id,kms_upload_share_date,kms_upload_share_time,kms_upload_share_rec_forum_id,kms_upload_share_rec_emp_id,kms_upload_share_message,kms_upload_share_send_forum_id,kms_upload_share_project_id)
                        VALUE(".$this->db->escape($Upload_share_userID).",
                           ".$this->db->escape($Upload_file_id).",
                           ".$this->db->escape($Upload_file_share_date).",
                           ".$this->db->escape($Upload_file_share_time).",
                           ".$this->db->escape($Upload_file_share_forum).",
                           ".$this->db->escape($Upload_file_share_recp).",
                           ".$this->db->escape($Upload_file_share_message).",
                           ".$this->db->escape($Upload_user_dept_id).",0
                           )";
                           
                           $this->db->query($save_upload_query);
                            //First obtain the receiver contacts
                            $Get_receiver_forum_contact = "SELECT kms_emp_data.emp_data_sname AS Rname, kms_emp_phone.kms_emp_phone_number AS Rphone
                                                            FROM kms_emp_data, kms_star_data, kms_emp_phone
                                                            WHERE kms_star_data.kms_department_id =".$this->db->escape($Upload_file_share_forum)."
                                                            AND kms_star_data.emp_data_id = kms_emp_data.emp_data_id
                                                            AND kms_emp_phone.emp_data_id = kms_star_data.emp_data_id";


                           $Get_receiver_forum_contact_results = $this->db->query($Get_receiver_forum_contact)->result_array(); 

                           foreach ($Get_receiver_forum_contact_results as $Result1)
                           { //The message composed with as the sender name and the receiver name
                           $Sender = $Result1['Rname']."-".$this->session->userdata('kms_emp_data_secondname');
                           //Then we store the noticification details as below
                           $Save_notice = "INSERT INTO  kms_noticification (kms_notice_receiver,kms_notice_sender,kms_notice_text)
                                          VALUE (".$Result1['Rphone'].",
                                          ".$this->db->escape($Sender).",
                                          ".$this->db->escape($Upload_file_share_message)."
                                          )";
                           $this->db->query($Save_notice);
                           }

                           //,,,,,,,,,,,,,,,,,,,,,,,,,,,,For receipts only,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
                            //First obtain the receiver contacts
                            $Get_receiver_forum_contact = "SELECT kms_emp_data.emp_data_sname AS Rname, kms_emp_phone.kms_emp_phone_number AS Rphone
                                                            FROM kms_emp_data, kms_star_data, kms_emp_phone
                                                            WHERE kms_star_data.emp_data_id =".$this->db->escape($Upload_file_share_recp)."
                                                            AND kms_star_data.emp_data_id = kms_emp_data.emp_data_id
                                                            AND kms_emp_phone.emp_data_id = kms_star_data.emp_data_id";


                           $Get_receiver_forum_contact_results = $this->db->query($Get_receiver_forum_contact)->result_array(); 

                           foreach ($Get_receiver_forum_contact_results as $Result1)
                           { //The message composed with as the sender name and the receiver name
                           $Sender = $Result1['Rname']."-".$this->session->userdata('kms_emp_data_secondname');
                           //Then we store the noticification details as below
                           $Save_notice = "INSERT INTO  kms_noticification (kms_notice_receiver,kms_notice_sender,kms_notice_text)
                                          VALUE (".$Result1['Rphone'].",
                                          ".$this->db->escape($Sender).",
                                          ".$this->db->escape($Upload_file_share_message)."
                                          )";
                           $this->db->query($Save_notice);
                           }

      } 
      //kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk
      if($kms_recip_size == 1 && $kms_file_exploded_forum[0] == "" && $Upload_file_share_forum == "" && $Upload_file_share_recp != "" && $Upload_file_share_recp != "0")
      {
               $save_upload_query = "INSERT INTO  kms_upload_share (kms_uploader_share_id,kms_upload_id,kms_upload_share_date,kms_upload_share_time,kms_upload_share_rec_forum_id,kms_upload_share_rec_emp_id,kms_upload_share_message,kms_upload_share_send_forum_id,kms_upload_share_project_id)
                                       VALUE(".$this->db->escape($Upload_share_userID).",
                                          ".$this->db->escape($Upload_file_id).",
                                          ".$this->db->escape($Upload_file_share_date).",
                                          ".$this->db->escape($Upload_file_share_time).",0,
                                          ".$this->db->escape($Upload_file_share_recp).",
                                          ".$this->db->escape($Upload_file_share_message).",
                                          ".$this->db->escape($Upload_user_dept_id).",
                                          0)";

                                          $this->db->query($save_upload_query);

                             //,,,,,,,,,,,,,,,,,,,,,,,,,,,,For receipts only,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
                            //First obtain the receiver contacts
                            $Get_receiver_forum_contact = "SELECT kms_emp_data.emp_data_sname AS Rname, kms_emp_phone.kms_emp_phone_number AS Rphone
                                                            FROM kms_emp_data, kms_star_data, kms_emp_phone
                                                            WHERE kms_star_data.emp_data_id =".$this->db->escape($Upload_file_share_recp)."
                                                            AND kms_star_data.emp_data_id = kms_emp_data.emp_data_id
                                                            AND kms_emp_phone.emp_data_id = kms_star_data.emp_data_id";


                           $Get_receiver_forum_contact_results = $this->db->query($Get_receiver_forum_contact)->result_array(); 

                           foreach ($Get_receiver_forum_contact_results as $Result1)
                           { //The message composed with as the sender name and the receiver name
                           $Sender = $Result1['Rname']."-".$this->session->userdata('kms_emp_data_secondname');
                           //Then we store the noticification details as below
                           $Save_notice = "INSERT INTO  kms_noticification (kms_notice_receiver,kms_notice_sender,kms_notice_text)
                                    VALUE (".$Result1['Rphone'].",
                                    ".$this->db->escape($Sender).",
                                    ".$this->db->escape($Upload_file_share_message)."
                                    )";
                           $this->db->query($Save_notice);
                           }

      }
      if($kms_recip_size > 1 && $kms_file_exploded_forum[0] == ""  && $Upload_file_share_recp !="")
      {
                     foreach($kms_file_exploded_recipt as $kms_recpt_id)
                     {
                        $save_upload_query = "INSERT INTO  kms_upload_share (kms_uploader_share_id,kms_upload_id,kms_upload_share_date,kms_upload_share_time,kms_upload_share_rec_forum_id,kms_upload_share_rec_emp_id,kms_upload_share_message,kms_upload_share_send_forum_id,kms_upload_share_project_id)
                        VALUE(".$this->db->escape($Upload_share_userID).",
                           ".$this->db->escape($Upload_file_id).",
                           ".$this->db->escape($Upload_file_share_date).",
                           ".$this->db->escape($Upload_file_share_time).",0,
                           ".$this->db->escape($kms_recpt_id).",
                           ".$this->db->escape($Upload_file_share_message).",
                           ".$this->db->escape($Upload_user_dept_id).",
                           0
                           )";

                           $this->db->query($save_upload_query);

                            //,,,,,,,,,,,,,,,,,,,,,,,,,,,,For receipts only,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
                            //First obtain the receiver contacts
                            $Get_receiver_forum_contact = "SELECT kms_emp_data.emp_data_sname AS Rname, kms_emp_phone.kms_emp_phone_number AS Rphone
                                                            FROM kms_emp_data, kms_star_data, kms_emp_phone
                                                            WHERE kms_star_data.emp_data_id =".$this->db->escape($kms_recpt_id)."
                                                            AND kms_star_data.emp_data_id = kms_emp_data.emp_data_id
                                                            AND kms_emp_phone.emp_data_id = kms_star_data.emp_data_id";


                           $Get_receiver_forum_contact_results = $this->db->query($Get_receiver_forum_contact)->result_array(); 

                           foreach ($Get_receiver_forum_contact_results as $Result1)
                           { //The message composed with as the sender name and the receiver name
                           $Sender = $Result1['Rname']."-".$this->session->userdata('kms_emp_data_secondname');
                           //Then we store the noticification details as below
                           $Save_notice = "INSERT INTO  kms_noticification (kms_notice_receiver,kms_notice_sender,kms_notice_text)
                                    VALUE (".$Result1['Rphone'].",
                                    ".$this->db->escape($Sender).",
                                    ".$this->db->escape($Upload_file_share_message)."
                                    )";
                           $this->db->query($Save_notice);
                           }
                     }

      }
      if($kms_recip_size > 1 && $kms_forum_size > 1 )
      {        
                  if($kms_forum_size > 1)
                  {
                           foreach($kms_file_exploded_forum as $kms_forum_id)
                                    {
                                       $save_upload_query = "INSERT INTO  kms_upload_share (kms_uploader_share_id,kms_upload_id,kms_upload_share_date,kms_upload_share_time,kms_upload_share_rec_forum_id,kms_upload_share_rec_emp_id,kms_upload_share_message,kms_upload_share_send_forum_id,kms_upload_share_project_id)
                                       VALUE(".$this->db->escape($Upload_share_userID).",
                                          ".$this->db->escape($Upload_file_id).",
                                          ".$this->db->escape($Upload_file_share_date).",
                                          ".$this->db->escape($Upload_file_share_time).",
                                          ".$this->db->escape($kms_forum_id).",0,
                                          ".$this->db->escape($Upload_file_share_message).",
                                          ".$this->db->escape($Upload_user_dept_id).",
                                          0
                                          )";

                                          $this->db->query($save_upload_query);

                                           //First obtain the receiver contacts
                            $Get_receiver_forum_contact = "SELECT kms_emp_data.emp_data_sname AS Rname, kms_emp_phone.kms_emp_phone_number AS Rphone
                                                            FROM kms_emp_data, kms_star_data, kms_emp_phone
                                                            WHERE kms_star_data.kms_department_id =".$this->db->escape($kms_forum_id)."
                                                            AND kms_star_data.emp_data_id = kms_emp_data.emp_data_id
                                                            AND kms_emp_phone.emp_data_id = kms_star_data.emp_data_id";


                           $Get_receiver_forum_contact_results = $this->db->query($Get_receiver_forum_contact)->result_array(); 

                           foreach ($Get_receiver_forum_contact_results as $Result1)
                           { //The message composed with as the sender name and the receiver name
                           $Sender = $Result1['Rname']."-".$this->session->userdata('kms_emp_data_secondname');
                           //Then we store the noticification details as below
                           $Save_notice = "INSERT INTO  kms_noticification (kms_notice_receiver,kms_notice_sender,kms_notice_text)
                                    VALUE (".$Result1['Rphone'].",
                                    ".$this->db->escape($Sender).",
                                    ".$this->db->escape($Upload_file_share_message)."
                                    )";
                           $this->db->query($Save_notice);
                           }
                                    }

                  }if($kms_recip_size > 1)
                  {
                           foreach($kms_file_exploded_recipt as $kms_recpt_id)
                                    {
                                       $save_upload_query = "INSERT INTO  kms_upload_share (kms_uploader_share_id,kms_upload_id,kms_upload_share_date,kms_upload_share_time,kms_upload_share_rec_forum_id,kms_upload_share_rec_emp_id,kms_upload_share_message,kms_upload_share_send_forum_id,kms_upload_share_project_id)
                                       VALUE(".$this->db->escape($Upload_share_userID).",
                                          ".$this->db->escape($Upload_file_id).",
                                          ".$this->db->escape($Upload_file_share_date).",
                                          ".$this->db->escape($Upload_file_share_time).",0,
                                          ".$this->db->escape($kms_recpt_id).",
                                          ".$this->db->escape($Upload_file_share_message).",
                                          ".$this->db->escape($Upload_user_dept_id).",
                                          0
                                          )";

                                          $this->db->query($save_upload_query);

                                          //,,,,,,,,,,,,,,,,,,,,,,,,,,,,For receipts only,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
                            //First obtain the receiver contacts
                            $Get_receiver_forum_contact = "SELECT kms_emp_data.emp_data_sname AS Rname, kms_emp_phone.kms_emp_phone_number AS Rphone
                                                            FROM kms_emp_data, kms_star_data, kms_emp_phone
                                                            WHERE kms_star_data.emp_data_id =".$this->db->escape($kms_recpt_id)."
                                                            AND kms_star_data.emp_data_id = kms_emp_data.emp_data_id
                                                            AND kms_emp_phone.emp_data_id = kms_star_data.emp_data_id";


                              $Get_receiver_forum_contact_results = $this->db->query($Get_receiver_forum_contact)->result_array(); 

                              foreach ($Get_receiver_forum_contact_results as $Result1)
                              { //The message composed with as the sender name and the receiver name
                              $Sender = $Result1['Rname']."-".$this->session->userdata('kms_emp_data_secondname');
                              //Then we store the noticification details as below
                              $Save_notice = "INSERT INTO  kms_noticification (kms_notice_receiver,kms_notice_sender,kms_notice_text)
                                 VALUE (".$Result1['Rphone'].",
                                 ".$this->db->escape($Sender).",
                                 ".$this->db->escape($Upload_file_share_message)."
                                 )";
                              $this->db->query($Save_notice);
                              }
                                    }

                  }
                     



      }
      if($kms_project_size == 1)
     
      {
         $save_upload_query = "INSERT INTO  kms_upload_share (kms_uploader_share_id,kms_upload_id,kms_upload_share_date,kms_upload_share_time,kms_upload_share_rec_forum_id,kms_upload_share_rec_emp_id,kms_upload_share_message,kms_upload_share_send_forum_id,kms_upload_share_project_id)
                                       VALUE(".$this->db->escape($Upload_share_userID).",
                                          ".$this->db->escape($Upload_file_id).",
                                          ".$this->db->escape($Upload_file_share_date).",
                                          ".$this->db->escape($Upload_file_share_time).",
                                          0,0,
                                          ".$this->db->escape($Upload_file_share_message).",
                                          ".$this->db->escape($Upload_user_dept_id).",
                                          ".$this->db->escape($Upload_share_project_id).
                                          ")";
            
            $this->db->query($save_upload_query);
            
                                          //,,,,,,,,,,,,,,,,,,,,,,,,,,,,For receipts only,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
                            //First obtain the receiver contacts
                            $Get_receiver_forum_contact = "SELECT kms_emp_data.emp_data_sname AS Rname, kms_emp_phone.kms_emp_phone_number AS Rphone
                                                            FROM kms_emp_data, kms_star_data, kms_emp_phone, kms_projects_link
                                                            WHERE kms_projects_link.kms_project_id =".$this->db->escape($Upload_share_project_id)."
                                                            AND kms_star_data.emp_data_id = kms_emp_data.emp_data_id
                                                            AND kms_emp_phone.emp_data_id = kms_star_data.emp_data_id
                                                            AND kms_projects_link.emp_data_id = kms_star_data.emp_data_id";


                              $Get_receiver_forum_contact_results = $this->db->query($Get_receiver_forum_contact)->result_array(); 

                              foreach ($Get_receiver_forum_contact_results as $Result1)
                              { //The message composed with as the sender name and the receiver name
                              $Sender = $Result1['Rname']."-".$this->session->userdata('kms_emp_data_secondname');
                              //Then we store the noticification details as below
                              $Save_notice = "INSERT INTO  kms_noticification (kms_notice_receiver,kms_notice_sender,kms_notice_text)
                                                VALUE (".$Result1['Rphone'].",
                                                ".$this->db->escape($Sender).",
                                                ".$this->db->escape($Upload_file_share_message)."
                                                )";
                                             $this->db->query($Save_notice);
                              }

      }if($kms_project_size > 1)
      {
            foreach($kms_file_exploded_project as $kms_project_id)
                  {
         $save_upload_query = "INSERT INTO  kms_upload_share (kms_uploader_share_id,kms_upload_id,kms_upload_share_date,kms_upload_share_time,kms_upload_share_rec_forum_id,kms_upload_share_rec_emp_id,kms_upload_share_message,kms_upload_share_project_id)
                                 VALUE(".$this->db->escape($Upload_share_userID).",
                                    ".$this->db->escape($Upload_file_id).",
                                    ".$this->db->escape($Upload_file_share_date).",
                                    ".$this->db->escape($Upload_file_share_time).",0,
                                    0,
                                    ".$this->db->escape($Upload_file_share_message).",
                                   
                                    ".$this->db->escape($kms_project_id)."
                                    )";

                          $this->db->query($save_upload_query);
                                        //,,,,,,,,,,,,,,,,,,,,,,,,,,,,For receipts only,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
                            //First obtain the receiver contacts
                            $Get_receiver_forum_contact = "SELECT kms_emp_data.emp_data_sname AS Rname, kms_emp_phone.kms_emp_phone_number AS Rphone
                                                            FROM kms_emp_data, kms_star_data, kms_emp_phone, kms_projects_link
                                                            WHERE kms_projects_link.kms_project_id =".$this->db->escape($kms_project_id)."
                                                            AND kms_star_data.emp_data_id = kms_emp_data.emp_data_id
                                                            AND kms_emp_phone.emp_data_id = kms_star_data.emp_data_id
                                                            AND kms_projects_link.emp_data_id = kms_star_data.emp_data_id";


                              $Get_receiver_forum_contact_results = $this->db->query($Get_receiver_forum_contact)->result_array(); 

                              foreach ($Get_receiver_forum_contact_results as $Result1)
                              { //The message composed with as the sender name and the receiver name
                              $Sender = $Result1['Rname']."-".$this->session->userdata('kms_emp_data_secondname');
                              //Then we store the noticification details as below
                              $Save_notice = "INSERT INTO  kms_noticification (kms_notice_receiver,kms_notice_sender,kms_notice_text)
                                 VALUE (".$Result1['Rphone'].",
                                 ".$this->db->escape($Sender).",
                                 ".$this->db->escape($Upload_file_share_message)."
                                 )";
                              $this->db->query($Save_notice);
                              }
                  }
      }
      
      else
      {

      }

                  //This for clearing out the zero receivers as below
                  $abc =  "DELETE FROM kms_upload_share 
                           WHERE kms_upload_share.kms_upload_share_rec_emp_id = 0 
                           AND kms_upload_share.kms_upload_share_rec_forum_id = 0 
                           AND kms_upload_share.kms_upload_share_project_id = 0";
                  $this->db->query($abc);
     
      
    }

    function Fetch_department_files($kms_department_id,$kms_userid,$kms_user_deptid)
   {
      if($kms_department_id == $kms_user_deptid)
      {
         $Fetch_select_query = "SELECT kms_upload_share.kms_upload_share_message AS 'File message', kms_upload_share.kms_upload_share_date AS 'Date shared', kms_upload.kms_upload_size AS 'File size', kms_emp_data.emp_data_sname AS Name, kms_upload.kms_upload_location AS Location, kms_upload.kms_upload_details AS Description, kms_upload.kms_upload_format AS Format
                                 FROM kms_upload_share, kms_upload, kms_emp_data
                                 WHERE kms_upload_share.kms_upload_share_status =?
                                 AND kms_upload.kms_upload_id = kms_upload_share.kms_upload_id
                                 AND kms_emp_data.emp_data_id = kms_upload_share.kms_uploader_share_id
                                 AND kms_upload_share.kms_upload_share_rec_forum_id = ?
                                 AND kms_upload_share.kms_upload_share_send_forum_id = ?
                                 UNION  
                                 SELECT kms_upload_share.kms_upload_share_message AS 'File message', kms_upload_share.kms_upload_share_date AS 'Date shared', kms_upload.kms_upload_size AS 'File size', kms_emp_data.emp_data_sname AS Name, kms_upload.kms_upload_location AS Location, kms_upload.kms_upload_details AS Description, kms_upload.kms_upload_format AS Format 
                                 FROM kms_upload_share, kms_upload, kms_emp_data 
                                 WHERE kms_upload_share.kms_upload_share_status =1 
                                 AND kms_upload.kms_upload_id = kms_upload_share.kms_upload_id 
                                 AND kms_emp_data.emp_data_id = kms_upload_share.kms_uploader_share_id 
                                 AND kms_upload_share.kms_upload_share_send_forum_id = ".$kms_department_id." 
                                 AND kms_upload_share.kms_upload_share_rec_emp_id = ".$kms_userid."
                                 UNION  
                                 SELECT kms_upload_share.kms_upload_share_message AS 'File message', kms_upload_share.kms_upload_share_date AS 'Date shared', kms_upload.kms_upload_size AS 'File size', kms_emp_data.emp_data_sname AS Name, kms_upload.kms_upload_location AS Location, kms_upload.kms_upload_details AS Description, kms_upload.kms_upload_format AS Format 
                                 FROM kms_upload_share, kms_upload, kms_emp_data 
                                 WHERE kms_upload_share.kms_upload_share_status =1 
                                 AND kms_upload.kms_upload_id = kms_upload_share.kms_upload_id 
                                 AND kms_emp_data.emp_data_id = kms_upload_share.kms_uploader_share_id 
                                 AND kms_upload_share.kms_upload_share_send_forum_id = ".$kms_department_id."
                                 AND kms_upload_share.kms_uploader_share_id = ".$kms_userid."
                                 
                              ";
                              /**"SELECT kms_upload_share.kms_upload_share_message AS 'File message', kms_upload_share.kms_upload_share_date AS 'Date shared', kms_upload.kms_upload_size AS 'File size', kms_emp_data.emp_data_sname AS Name, kms_upload.kms_upload_location AS Location, kms_upload.kms_upload_details AS Description, kms_upload.kms_upload_format AS Format
                                 FROM kms_upload_share, kms_upload, kms_emp_data
                                 WHERE kms_upload_share.kms_upload_share_status =?
                                 AND kms_upload.kms_upload_id = kms_upload_share.kms_upload_id
                                 AND kms_emp_data.emp_data_id = kms_upload_share.kms_uploader_share_id
                                 AND kms_upload_share.kms_upload_share_rec_forum_id = ?
                                 AND kms_upload_share.kms_upload_share_send_forum_id = ? */
         $Fetchupload_results = $this->db->query($Fetch_select_query, array(1,$kms_department_id,$kms_department_id));
         return $Fetchupload_results;
      }
      if($kms_department_id == 1)
      {
         $Fetch_select_query = "SELECT kms_upload_share.kms_upload_share_message AS 'File message', kms_upload_share.kms_upload_share_date AS 'Date shared', kms_upload.kms_upload_size AS 'File size', kms_emp_data.emp_data_sname AS Name, kms_upload.kms_upload_location AS Location, kms_upload.kms_upload_details AS Description, kms_upload.kms_upload_format AS Format
                                 FROM kms_upload_share, kms_upload, kms_emp_data
                                 WHERE kms_upload_share.kms_upload_share_status =?
                                 AND kms_upload.kms_upload_id = kms_upload_share.kms_upload_id
                                 AND kms_emp_data.emp_data_id = kms_upload_share.kms_uploader_share_id
                                 AND kms_upload_share.kms_upload_share_rec_forum_id = ?
                                
                                 ORDER BY kms_upload_share.kms_upload_share_id ASC
                                 
                              ";
                              /**"SELECT kms_upload_share.kms_upload_share_message AS 'File message', kms_upload_share.kms_upload_share_date AS 'Date shared', kms_upload.kms_upload_size AS 'File size', kms_emp_data.emp_data_sname AS Name, kms_upload.kms_upload_location AS Location, kms_upload.kms_upload_details AS Description, kms_upload.kms_upload_format AS Format
                                 FROM kms_upload_share, kms_upload, kms_emp_data
                                 WHERE kms_upload_share.kms_upload_share_status =?
                                 AND kms_upload.kms_upload_id = kms_upload_share.kms_upload_id
                                 AND kms_emp_data.emp_data_id = kms_upload_share.kms_uploader_share_id
                                 AND kms_upload_share.kms_upload_share_rec_forum_id = ?
                                 AND kms_upload_share.kms_upload_share_send_forum_id = ? */
         $Fetchupload_results = $this->db->query($Fetch_select_query, array(1,$kms_department_id));
         return $Fetchupload_results;
      }
      else if($kms_department_id != $kms_user_deptid)
      {
         $Fetch_select_query = "SELECT kms_upload_share.kms_upload_share_message AS 'File message', kms_upload_share.kms_upload_share_date AS 'Date shared', kms_upload.kms_upload_size AS 'File size', kms_emp_data.emp_data_sname AS Name, kms_upload.kms_upload_location AS Location, kms_upload.kms_upload_details AS Description, kms_upload.kms_upload_format AS Format
                                 FROM kms_upload_share, kms_upload, kms_emp_data
                                 WHERE kms_upload_share.kms_upload_share_status =1
                                 AND kms_upload.kms_upload_id = kms_upload_share.kms_upload_id
                                 AND kms_emp_data.emp_data_id = kms_upload_share.kms_uploader_share_id
                                 AND kms_upload_share.kms_upload_share_rec_forum_id =".$kms_user_deptid."
                                 AND kms_upload_share.kms_upload_share_send_forum_id =".$kms_department_id."
                                 AND kms_upload_share.kms_upload_share_rec_forum_id != kms_upload_share.kms_upload_share_send_forum_id 
                                 UNION  
                                 SELECT kms_upload_share.kms_upload_share_message AS 'File message', kms_upload_share.kms_upload_share_date AS 'Date shared', kms_upload.kms_upload_size AS 'File size', kms_emp_data.emp_data_sname AS Name, kms_upload.kms_upload_location AS Location, kms_upload.kms_upload_details AS Description, kms_upload.kms_upload_format AS Format
                                 FROM kms_upload_share, kms_upload, kms_emp_data
                                 WHERE kms_upload_share.kms_upload_share_status =1
                                 AND kms_upload.kms_upload_id = kms_upload_share.kms_upload_id
                                 AND kms_emp_data.emp_data_id = kms_upload_share.kms_uploader_share_id
                                 AND kms_upload_share.kms_upload_share_rec_forum_id = ".$kms_department_id."
                                 AND kms_upload_share.kms_upload_share_send_forum_id =".$kms_user_deptid."
                                 AND kms_upload_share.kms_upload_share_rec_forum_id != kms_upload_share.kms_upload_share_send_forum_id
                                 UNION  
                                 SELECT kms_upload_share.kms_upload_share_message AS 'File message', kms_upload_share.kms_upload_share_date AS 'Date shared', kms_upload.kms_upload_size AS 'File size', kms_emp_data.emp_data_sname AS Name, kms_upload.kms_upload_location AS Location, kms_upload.kms_upload_details AS Description, kms_upload.kms_upload_format AS Format 
                                 FROM kms_upload_share, kms_upload, kms_emp_data 
                                 WHERE kms_upload_share.kms_upload_share_status = 1 
                                 AND kms_upload.kms_upload_id = kms_upload_share.kms_upload_id 
                                 AND kms_emp_data.emp_data_id = kms_upload_share.kms_uploader_share_id 
                                 AND kms_upload_share.kms_upload_share_rec_emp_id =".$kms_userid."
                                 AND kms_upload_share.kms_upload_share_send_forum_id =".$kms_department_id."
                                 
                                 ";
                                 
                   $Fetchupload_results2 = $this->db->query($Fetch_select_query);
                                
                                 return $Fetchupload_results2;

        

      }
      else{}
      
                        /*SELECT kms_upload_share.kms_upload_share_message AS 'File message', kms_upload.kms_upload_size AS 'File size', kms_upload_share.kms_upload_share_date AS 'Date shared', kms_upload.kms_upload_date AS 'Last modified', kms_upload_share.`kms_uploader_share_id` AS 'Shared by', kms_upload.kms_upload_location AS Location, kms_upload.kms_upload_details AS Description, kms_upload.kms_upload_format AS Format, kms_emp_data.emp_data_sname AS Name
                              FROM `kms_upload_share`
                              RIGHT JOIN kms_upload ON kms_upload.kms_upload_id = kms_upload_share.`kms_upload_id`
                              RIGHT JOIN kms_emp_data ON kms_emp_data.emp_data_id = kms_upload_share.kms_uploader_share_id
                              WHERE `kms_upload_share_rec_emp_id` = ?
                              OR kms_upload_share.kms_upload_share_rec_forum_id = ?
                              AND kms_upload_share.kms_upload_share_status = ?
                              AND kms_upload_share.kms_upload_share_send_forum_id = ?
                              OR kms_upload_share.kms_upload_share_send_forum_id = ? */
      /*
      if ( !$Fetchupload_results) 
      {
              $error = $this->db->error(); // Has keys 'code' and 'message'
              return $error;
      }else
      {
         return $Fetchupload_results;
      }*/

   }

   function Fetch_Count_department_files($KMS_dept_id,$KMS_user_id)
   {
      
      $Fetch_select_query = "SELECT kms_upload_share.kms_upload_share_rec_forum_id AS Forum_id, COUNT( * ) AS Number
                             FROM kms_upload_share
                             WHERE kms_upload_share.kms_upload_share_status =?
                             AND kms_upload_share_rec_forum_id = ? OR kms_upload_share_rec_emp_id = ?
                             GROUP BY kms_upload_share.kms_upload_share_rec_forum_id";
                        
      $Fetchupload_results = $this->db->query($Fetch_select_query, array(1,$KMS_dept_id,$KMS_user_id));
      
      if ( !$Fetchupload_results) 
      {
              $error = $this->db->error(); // Has keys 'code' and 'message'
              return $error;
      }else
      {
         return $Fetchupload_results;
      }

   }
      function Fetch_department_name($KMS_dept_id)
      {
         
            $Fetch_select_query3 = "SELECT kms_department.* FROM kms_department WHERE kms_department_id =?";
                              
            $Fetchupload_results3 = $this->db->query($Fetch_select_query3,$KMS_dept_id);
            
            if ( !$Fetchupload_results3) 
            {
                  $error = $this->db->error(); // Has keys 'code' and 'message'
                  return $error;
            }else
            {
               return $Fetchupload_results3;
            }

      }

            //This function is to save the uploaded files details to the database
         function Upload_project_File($Project_id,$Upload_userID,$Upload_details,$Upload_location,$Upload_date,$Upload_format,$Upload_size)
         {
                     //the query for inserting data into the database $Project_id
                     $save_upload_query = "INSERT INTO kms_projects_files (kms_project_id,emp_data_id,kms_upload_details,kms_upload_location,kms_upload_date,kms_upload_format,kms_upload_size)
                     VALUE(".$this->db->escape($Project_id).",".$this->db->escape($Upload_userID).",".$this->db->escape($Upload_details).",".$this->db->escape($Upload_location).",".$this->db->escape($Upload_date).",".$this->db->escape($Upload_format).",".$this->db->escape($Upload_size).")";

                     $this->db->query($save_upload_query);
                     $SaveQueryResult = $this->db->affected_rows();
                     return $SaveQueryResult;
         } 

         //This to return the project files per department
         function Fetch_all_uploadProjectfile($kms_selected_project)
         {
                     $Fetch_select_query = "SELECT kms_projects_files . *
                                             FROM kms_projects_files
                                             WHERE kms_projects_files.kms_project_id =".$kms_selected_project."
                                             AND kms_projects_files.kms_upload_status =1
                                             ORDER BY kms_projects_files.kms_upload_project_file_id DESC";
                     
                     $Fetchupload_results = $this->db->query($Fetch_select_query);
                     
                     if ( !$Fetchupload_results) 
                     {
                              $error = $this->db->error(); 
                              return $error;
                     }else
                     {
                        return $Fetchupload_results;
                     }
      
         }

}

?>