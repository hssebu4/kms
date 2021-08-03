<?php 
class Etraining extends CI_Model
{
  function Fetch_category_details()
            {
                $kms_deptid = $this->session->userdata('kms_access_user_dept_id');
                $kms_userid = $this->session->userdata('kms_emp_id');
                $kms_useraccess_level = $this->session->userdata('kms_access_user_level');

                $Fetch_category_query = "SELECT kms_etraining_category.kms_etraining_cat_id AS Id,
                                                kms_etraining_category.kms_etraining_cat_name AS Name 
                                         FROM kms_etraining_category 
                                         WHERE kms_etraining_category.kms_etraining_cat_status = 1
                                        ";
        
                $Fetch_category_results = $this->db->query($Fetch_category_query);
                 
                 if ( ! $Fetch_category_results)
                 {
                          $error = $this->db->error(); // Has keys 'code' and 'message'
                          return $error;
                 }else
                 {
                    return $Fetch_category_results; 
                 }
                }
 
             //The model for registering a new etraining as below
 function New_etraining($kms_etraining_name,$kms_etraining_details,$kms_etraining_instructor,$kms_etraining_category_id,$kms_etraining_reg_date)
          {
            $kms_userid = $this->session->userdata('kms_emp_id');
            //We then seperate the instructor array as below
            $kms_etraining_inst       = explode(',',$kms_etraining_instructor);
            $kms_etraining_inst_size  = sizeof($kms_etraining_inst);

            //Then we check if the new trainng details do exist in the db as below
            $Fetch_existing_etraining  = "SELECT kms_etraining_data.kms_etraining_id AS ID 
                                          FROM kms_etraining_data 
                                          WHERE kms_etraining_data.kms_etraining_name = ".$this->db->escape($kms_etraining_name)."
                                          AND kms_etraining_data.kms_etraining_description = ".$this->db->escape($kms_etraining_details)."
                                          AND kms_etraining_data.kms_etraining_category = ".$this->db->escape($kms_etraining_category_id)."
                                          AND kms_etraining_data.kms_etraining_reg_date = ".$this->db->escape($kms_etraining_reg_date)." ";

            $kms_etraining_fetch1      = $this->db->query($Fetch_existing_etraining);

            if ( ! $kms_etraining_fetch1)
            {
                     $error = $this->db->error(); // we return error incase the etraining details already in the db 
                     return $error;
            }else
            {
                     $Fetch_etraining_fetch1_count = $kms_etraining_fetch1->result_array();
                     if(sizeof($Fetch_etraining_fetch1_count) >= 1)
                        {
                           return "777";//Return code for existing record
                        }
                     else if(sizeof($Fetch_etraining_fetch1_count) == 0)
                        {
                        $kms_etraining_new = "INSERT INTO kms_etraining_data (kms_etraining_name,kms_etraining_description,kms_etraining_category,kms_etraining_instructor,kms_etraining_emp_id,kms_etraining_reg_date) 
                                              VALUES (".$this->db->escape($kms_etraining_name).",
                                                      ".$this->db->escape($kms_etraining_details).",
                                                      ".$this->db->escape($kms_etraining_category_id).",
                                                      ".$this->db->escape($kms_etraining_instructor).",
                                                      ".$this->db->escape($kms_userid).",
                                                      ".$this->db->escape($kms_etraining_reg_date)."
                                                      )";
                        $this->db->query($kms_etraining_new);
                        //$SaveQueryResult = $this->db->affected_rows();

                        return "888";
                        }
            }
            
          }




           //The model for registering a new etraining as below
 Public function Fetch_etraining()
 {
   $kms_userid = $this->session->userdata('kms_emp_id');
 

   //Then we check if the new trainng details do exist in the db as below
   $Fetch_existing_etraining  = "SELECT kms_etraining_data.* 
                                 FROM kms_etraining_data 
                                 WHERE kms_etraining_data.kms_etraining_status = 1";

   $kms_etraining_fetch1      = $this->db->query($Fetch_existing_etraining);

   if ( ! $kms_etraining_fetch1)
   {
            $error = $this->db->error(); // we return error incase the etraining details already in the db 
            return $error;
   }else
   {
            $Fetch_etraining_fetch1_count = $kms_etraining_fetch1->result_array();
            return $Fetch_etraining_fetch1_count;
   }
   
 }
    
           //The model for Counting the Categories as below
           Public function Count_etraining()
           {
             $kms_userid = $this->session->userdata('kms_emp_id');
           
             //Then we check if the new trainng details do exist in the db as below
             $Fetch_count_etraining  = "SELECT COUNT( * ) AS NUM, kms_etraining_data.kms_etraining_category AS ID
                                        FROM kms_etraining_data
                                        WHERE kms_etraining_data.kms_etraining_status =1
                                        GROUP BY kms_etraining_data.kms_etraining_category";
          
             $kms_etraining_fetch1      = $this->db->query($Fetch_count_etraining);
          
             if ( ! $kms_etraining_fetch1)
             {
                      $error = $this->db->error(); // we return error incase the etraining details already in the db 
                      return $error;
             }else
             {
                      return $kms_etraining_fetch1->result_array();
             }
             
           }
            

             //The model for Counting the training per instructor as below
             Public function Count_etraining_perInst($kms_etraining_inst_id)
             {
               $kms_userid = $this->session->userdata('kms_emp_id');
             
               //Then we check if the new trainng details do exist in the db as below
               $Fetch_count_etraining  = "SELECT COUNT( * ) AS Numb
                                          FROM kms_etraining_data
                                          WHERE kms_etraining_data.kms_etraining_instructor = (
                                          SELECT kms_etraining_data.kms_etraining_instructor
                                          FROM kms_etraining_data
                                          WHERE kms_etraining_data.kms_etraining_id = ".$this->db->escape($kms_etraining_inst_id).")";
                                       
               $kms_etraining_fetch1      = $this->db->query($Fetch_count_etraining);
            
               if ( ! $kms_etraining_fetch1)
               {
                        $error = $this->db->error(); // we return error incase the etraining details already in the db 
                        return $error;
               }else
               {
                        return $kms_etraining_fetch1->result_array();
               }
               
             }



           //The model for Counting the Categories as below
           Public function View_etraininng($elearning_id)
           {
             $kms_userid = $this->session->userdata('kms_emp_id');
           
             //Then we check if the new trainng details do exist in the db as below
             $Fetch_etraining  = "SELECT kms_etraining_category.kms_etraining_cat_name, kms_etraining_data.* , kms_emp_data.emp_data_sname AS Creater
                                        FROM kms_etraining_data, kms_etraining_category, kms_emp_data
                                        WHERE kms_etraining_data.kms_etraining_status =1
                                        AND kms_etraining_category.kms_etraining_cat_id = kms_etraining_data.kms_etraining_category
                                        AND kms_emp_data.emp_data_id = kms_etraining_data.kms_etraining_instructor
                                        AND kms_etraining_data.kms_etraining_id = ".$this->db->escape($elearning_id)."";
          
             $kms_etraining_fetch1      = $this->db->query($Fetch_etraining );
          
             if ( ! $kms_etraining_fetch1)
             {
                      $error = $this->db->error(); // we return error incase the etraining details already in the db 
                      return $error;
             }else
             {
                      return $kms_etraining_fetch1->result_array();
             }
             
           }
            
 //The model for fetching etraining skills as below
 Public function View_skills($elearning_id)
 {
          $kms_userid = $this->session->userdata('kms_emp_id');
        
          //Then we check if the new trainng details do exist in the db as below
          $Fetch_Skill  = "SELECT kms_etraining_skills.* 
                           FROM kms_etraining_skills
                           WHERE kms_etraining_skills.kms_etraining_skill_trID = ".$this->db->escape($elearning_id)."";

          $kms_skill_fetch1  = $this->db->query($Fetch_Skill);

          if ( ! $kms_skill_fetch1)
          {
                    $error = $this->db->error(); // we return error incase the etraining details already in the db 
                    return $error;
          }else
          {
                    return $kms_skill_fetch1->result_array();
          }
   
 }



                        //The model for registering a new etraining as below
 function New_etraining_skill($kms_etraining_skill,$kms_etraining_id)
 {
   

   //Then we check if the new trainng details do exist in the db as below
   $Fetch_existing_skill      = "SELECT kms_etraining_skills.* FROM kms_etraining_skills 
                                 WHERE kms_etraining_skills.kms_etraining_skill_trID  =".$this->db->escape($kms_etraining_id)."
                                 AND kms_etraining_skills.kms_etraining_skill_desc = ".$this->db->escape($kms_etraining_skill)." ";

   $kms_etraining_fetch1      = $this->db->query($Fetch_existing_skill);

   if ( ! $kms_etraining_fetch1)
   {
            $error = $this->db->error(); // we return error incase the etraining details already in the db 
            return $error;
   }else
   {
            $Fetch_etraining_fetch1_count = $kms_etraining_fetch1->result_array();
            if(sizeof($Fetch_etraining_fetch1_count) >= 1)
               {
                  return "777";//Return code for existing record
               }
            else if(sizeof($Fetch_etraining_fetch1_count) == 0)
               {
               $kms_etraining_new = "INSERT INTO kms_etraining_skills (kms_etraining_skill_trID,kms_etraining_skill_desc) 
                                     VALUES (".$this->db->escape($kms_etraining_id).",
                                             ".$this->db->escape($kms_etraining_skill)."
                                            )";
               $this->db->query($kms_etraining_new);
               //$SaveQueryResult = $this->db->affected_rows();

               return "888";
               }
   }
   
 }

                    //The model for registering a new etraining as below
 function Edit_etraining($kms_etraining_name,$kms_etraining_details,$kms_etraining_instructor,$kms_etraining_category_id,$kms_etraining_id)
 {
   
               $kms_etrining_update = "UPDATE kms_etraining_data
                                       SET kms_etraining_data.kms_etraining_name = ".$this->db->escape($kms_etraining_name).",
                                           kms_etraining_data.kms_etraining_description = ".$this->db->escape($kms_etraining_details).",
                                           kms_etraining_data.kms_etraining_category = ".$this->db->escape($kms_etraining_category_id).",
                                           kms_etraining_data.kms_etraining_instructor = ".$this->db->escape($kms_etraining_instructor)."
                                       WHERE kms_etraining_data.kms_etraining_id = ".$this->db->escape($kms_etraining_id)." LIMIT 1";

   
               $kms_etraining_update = $this->db->query($kms_etrining_update);
               
               if ( ! $kms_etraining_update)
               {
                        $error = $this->db->error(); // we return error incase the etraining details already in the db 
                        return $error;
               }else
               {
                  return "888";
               }
   
 }


//This shall fetct all the files thhat were uploaded by this user creating a training content aa below
function List_MyFiles($kms_userid)
       {
          $kms_etraining_myfiles = "SELECT kms_upload.kms_upload_details,kms_upload.kms_upload_id
                                    FROM kms_upload
                                    WHERE kms_upload.emp_data_id = ".$this->db->escape($kms_userid)." AND kms_upload.kms_upload_status = 1
                                    ORDER BY kms_upload.kms_upload_id DESC";

        $kms_etraining_myfiles1  = $this->db->query($kms_etraining_myfiles);

            if ( ! $kms_etraining_myfiles1)
            {
                      $error = $this->db->error(); // we return error incase the etraining details already in the db 
                      return $error;
            }else
            {
                      return $kms_etraining_myfiles1->result_array();
            }
       }

//This shall return the content internal files as below
function ListContentFiles($etraining_id)
      {
        $kms_etraining_intfiles = "";
      }





//This will save the training content to the database as below
function New_training_content($kms_etraining_id,$kms_etraining_cont,$kms_etraining_int_f,$kms_etraining_ext_f)
        {
          $kms_etraining_content1 = "INSERT INTO kms_etraining_content (kms_etraining_cont_des,kms_etraining_cont_intfile,kms_etraining_cont_extfile,kms_etraining_id)
                                     VALUES (".$this->db->escape($kms_etraining_cont).",
                                             ".$this->db->escape($kms_etraining_int_f).",
                                             ".$this->db->escape($kms_etraining_ext_f).",
                                             ".$this->db->escape($kms_etraining_id)."
                                             )";
         $kms_etraining_content2  = $this->db->query($kms_etraining_content1);

         if(!$kms_etraining_content2)
           {
                  $error = $this->db->error(); 
                  return $error;
           }else
           {
                  return "888";
           }
        }

//This shall fetct all the content that were uploaded by this user creating a training content aa below
function List_TrainingContent($kms_trainingid)
       {
          $kms_etraining_content = "SELECT kms_etraining_content . * , kms_upload.kms_upload_details
                                    FROM kms_etraining_content, kms_upload
                                    WHERE kms_etraining_content.kms_etraining_id = ".$this->db->escape($kms_trainingid)."
                                    AND kms_upload.kms_upload_id = kms_etraining_content.kms_etraining_cont_intfile";

                                    
         $kms_etraining_content1 = $this->db->query($kms_etraining_content);

            if ( ! $kms_etraining_content1)
            {
                      $error = $this->db->error(); // we return error incase the etraining details already in the db 
                      return $error;
            }else
            {
                      return $kms_etraining_content1->result_array();
            }
       }


       //This shall fetct the content that is to be edited by this user creating a training content as below
function Edit_TrainingContent($kms_training_contid)
{
   $kms_etraining_content = "SELECT kms_etraining_content.* 
                             FROM kms_etraining_content 
                             WHERE kms_etraining_content.kms_etraining_cont_id  = ".$this->db->escape($kms_training_contid)."
                             ";

  $kms_etraining_content1 = $this->db->query($kms_etraining_content);

     if ( ! $kms_etraining_content1)
     {
               $error = $this->db->error(); // we return error incase the etraining details already in the db 
               return $error;
     }else
     {
               return $kms_etraining_content1->result_array();
     }
}

              //This shall edit the content that is to be edited by this user creating a training content as below
    function Edit_training_content($kms_etraining_contid,$kms_etraining_cont,$kms_etraining_int_f,$kms_etraining_ext_f,$kms_etraining_video)
    {
       /*echo "idc -".$kms_etraining_contid."<br />cont -".$kms_etraining_cont.
        "<br />ifile -".$kms_etraining_int_f."<br />efile -".$kms_etraining_ext_f."<br />v -".$kms_etraining_video;
    */
    if($kms_etraining_video == null || $kms_etraining_video == "" || $kms_etraining_video == "0"){ $kms_etraining_video = null;}else{$kms_etraining_video =$kms_etraining_video;}
     //echo 'The video'.$this->db->escape($kms_etraining_video);
     $kms_etraining_content = "UPDATE kms_etraining_content 
                                SET kms_etraining_content.kms_etraining_cont_des = ".$this->db->escape($kms_etraining_cont).",
                                    kms_etraining_content.kms_etraining_cont_intfile = ".$this->db->escape($kms_etraining_int_f).",
                                    kms_etraining_content.kms_etraining_cont_extfile = ".$this->db->escape($kms_etraining_ext_f).",
                                    kms_etraining_content.kms_etraining_video_id = ".$this->db->escape($kms_etraining_video)."
                                WHERE kms_etraining_content.kms_etraining_cont_id = ".$this->db->escape($kms_etraining_contid)."
                                  ";

      $kms_etraining_content1 = $this->db->query($kms_etraining_content);

        if ( ! $kms_etraining_content1)
        {
                  $error = $this->db->error(); // we return error incase the etraining details already in the db 
                  return $error;
        }else
        {
                  return 888;
        }
    }

    function Enroll_training($kms_etraining_id,$session_user_id)
    {
      $kms_etraining_enroll1 = "INSERT INTO kms_etraining_enroll (kms_emp_id,kms_etraining_id)
                                VALUES (".$this->db->escape($session_user_id).",".$this->db->escape($kms_etraining_id).")";
    
    $kms_etraining_enroll2 = $this->db->query($kms_etraining_enroll1);

    if ( ! $kms_etraining_enroll1)
    {
              $error = $this->db->error(); // we return error incase the etraining details already in the db 
              return $error;
    }else
    {
      /*This return the enroller details to used in the notification*/
        $kms_enroller_details   =  "SELECT kms_emp_data.emp_data_sname, kms_emp_phone.kms_emp_phone_number
                                    FROM kms_emp_data, kms_emp_phone
                                    WHERE kms_emp_data.emp_data_id = ".$this->db->escape($session_user_id)." && kms_emp_phone.emp_data_id = kms_emp_data.emp_data_id ";
        $kms_enroller_details1  = $this->db->query($kms_enroller_details)->result_array();
        foreach($kms_enroller_details1 as $Enroller)
        {
          $kms_enroller_name   = $Enroller['emp_data_sname'];
          $kms_enroller_phone  = $Enroller['kms_emp_phone_number'];
        }

        //After obtaining the enroller details we then get the etraining detai as below
        $kms_enroller_training  = "SELECT kms_etraining_data.kms_etraining_name 
                                   FROM kms_etraining_data 
                                   WHERE kms_etraining_data.kms_etraining_id = ".$this->db->escape($kms_etraining_id)."";
        $kms_enroller_traing1   = $this->db->query($kms_enroller_training)->result_array();
        foreach($kms_enroller_traing1 as $Training)
        {
          $kms_Training_name    = $Training['kms_etraining_name'];
        }

        //After obtaining the required inform for notifications as below
        $kms_enroll_notice     = "INSERT INTO kms_noticification (kms_notice_receiver,kms_notice_sender,kms_notice_text,kms_notice_status)
                                  VALUES (".$kms_enroller_phone.",'".$kms_enroller_name."-KMS',".$this->db->escape($kms_Training_name).",3)";
         
        $kms_enroll_notice2    = $this->db->query($kms_enroll_notice);

          if ( ! $kms_enroll_notice2)
          {
                    $error = $this->db->error(); // we return error incase the etraining details already in the db 
                    return $error;
          }else
          {
            return "888";
          }

           
    }
    }

    function Fetch_enrolls($session_user_id)
     {
         $kms_etraining_enroll   = "SELECT kms_etraining_enroll.kms_etraining_enroll_id, kms_etraining_enroll.kms_etraining_id
                                    FROM kms_etraining_enroll 
                                    WHERE kms_etraining_enroll.kms_emp_id = ".$this->db->escape($session_user_id)."";
        $kms_etraining_content1 = $this->db->query($kms_etraining_enroll);

        if ( ! $kms_etraining_content1)
        {
                  $error = $this->db->error(); // we return error incase the etraining details already in the db 
                  return $error;
        }else
        {
                  return $kms_etraining_content1->result_array();
        }
     }

     //This will count the enrolled per etraining selected
     function Enroll_Count($Training_id)
      {
        $kms_enroll_count    =   "SELECT COUNT(*) AS Count 
                                  FROM kms_etraining_enroll 
                                  WHERE kms_etraining_enroll.kms_etraining_id = ".$this->db->escape($Training_id)."";
         $kms_enroll_count1  = $this->db->query($kms_enroll_count);

         if ( ! $kms_enroll_count1)
         {
                   $error = $this->db->error(); // we return error incase the etraining details already in the db 
                   return $error;
         }else
         {
                   return $kms_enroll_count1->result_array();
         }
      }

      //This function to register the video to be used when registering the etraining content
      function Video_etrainin($kms_etraining_video_descrip,$target_dir)
      {
           $kms_etraining_video  = "INSERT INTO kms_etraining_video (kms_etraining_video_des,kms_etraining_video_location)
                                    VALUES (".$this->db->escape($kms_etraining_video_descrip).",".$this->db->escape($target_dir).")";
           $kms_etraining_video2 = $this->db->query($kms_etraining_video);

             if ( ! $kms_etraining_video2)
             {
                       $error = $this->db->error(); // we return error incase the etraining details already in the db 
                       return $error;
             }else
             {
               return "888";
             }
      }

      //This function will fetch the registered video to be attached to a training content
      function Fetch_Videos()
      {
        $kms_fetch_videos    =   "SELECT kms_etraining_video.kms_etraining_video_id AS VideoID,kms_etraining_video.kms_etraining_video_des AS Descp,kms_etraining_video.kms_etraining_video_location AS Locatn
                                  FROM kms_etraining_video
                                  WHERE kms_etraining_video.kms_etraining_video_status =1";
         $kms_fetch_videos1  = $this->db->query($kms_fetch_videos);

          if ( ! $kms_fetch_videos1)
          {
          $error = $this->db->error(); // we return error incase the etraining details already in the db 
          return $error;
          }else
          {
          return $kms_fetch_videos1->result_array();
          }
      }

}

?>