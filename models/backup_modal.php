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

    function Upload_File_share($Upload_share_userID,$Upload_file_id,$Upload_file_share_date,$Upload_file_share_time,$Upload_file_share_forum,$Upload_file_share_recp,$Upload_file_share_message,$Upload_user_dept_id)
    {   
      
      $kms_file_exploded_forum = explode(',',$Upload_file_share_forum);
      $kms_file_exploded_recipt = explode(',',$Upload_file_share_recp);
      $kms_forum_size  = sizeof($kms_file_exploded_forum);
      $kms_recip_size  = sizeof($kms_file_exploded_recipt);

      if($kms_forum_size == 1)//Incase user selected on forum to recive the file
      {
                        $save_upload_query = "INSERT INTO  kms_upload_share (kms_uploader_share_id,kms_upload_id,kms_upload_share_date,kms_upload_share_time,kms_upload_share_rec_forum_id,kms_upload_share_rec_emp_id,kms_upload_share_message,kms_upload_share_send_forum_id)
                        VALUE(".$this->db->escape($Upload_share_userID).",
                           ".$this->db->escape($Upload_file_id).",
                           ".$this->db->escape($Upload_file_share_date).",
                           ".$this->db->escape($Upload_file_share_time).",
                           ".$this->db->escape($Upload_file_share_forum).",0,
                           ".$this->db->escape($Upload_file_share_message).",
                           ".$this->db->escape($Upload_user_dept_id).
                           ")";
                           
                           $this->db->query($save_upload_query);

      }
      if($kms_forum_size > 1)
      {
                  foreach($kms_file_exploded_forum as $kms_forum_id)
                     {
                        $save_upload_query = "INSERT INTO  kms_upload_share (kms_uploader_share_id,kms_upload_id,kms_upload_share_date,kms_upload_share_time,kms_upload_share_rec_forum_id,kms_upload_share_rec_emp_id,kms_upload_share_message,kms_upload_share_send_forum_id)
                        VALUE(".$this->db->escape($Upload_share_userID).",
                             ".$this->db->escape($Upload_file_id).",
                             ".$this->db->escape($Upload_file_share_date).",
                             ".$this->db->escape($Upload_file_share_time).",
                             ".$this->db->escape($kms_forum_id).",0,
                             ".$this->db->escape($Upload_file_share_message).",
                             ".$this->db->escape($Upload_user_dept_id).
                             ")";

                             $this->db->query($save_upload_query);
                     }

      }
      if($kms_recip_size == 1 && $Upload_file_share_recp != "")
      {
               $save_upload_query = "INSERT INTO  kms_upload_share (kms_uploader_share_id,kms_upload_id,kms_upload_share_date,kms_upload_share_time,kms_upload_share_rec_forum_id,kms_upload_share_rec_emp_id,kms_upload_share_message,kms_upload_share_send_forum_id)
                                       VALUE(".$this->db->escape($Upload_share_userID).",
                                          ".$this->db->escape($Upload_file_id).",
                                          ".$this->db->escape($Upload_file_share_date).",
                                          ".$this->db->escape($Upload_file_share_time).",0,
                                          ".$this->db->escape($Upload_file_share_recp).",
                                          ".$this->db->escape($Upload_file_share_message).",
                                          ".$this->db->escape($Upload_user_dept_id).
                                          
                                          ")";

                                          $this->db->query($save_upload_query);
      }
      if($kms_recip_size > 1)
      {
                  foreach($kms_file_exploded_recipt as $kms_recip_id)
                     {
                        $save_upload_query = "INSERT INTO  kms_upload_share (kms_uploader_share_id,kms_upload_id,kms_upload_share_date,kms_upload_share_time,kms_upload_share_rec_forum_id,kms_upload_share_rec_emp_id,kms_upload_share_message)
                        VALUE(".$this->db->escape($Upload_share_userID).",
                             ".$this->db->escape($Upload_file_id).",
                             ".$this->db->escape($Upload_file_share_date).",
                             ".$this->db->escape($Upload_file_share_time).",0,
                             ".$this->db->escape($kms_recip_id).",
                             ".$this->db->escape($Upload_file_share_message).",
                             ".$this->db->escape($Upload_user_dept_id).
                             ")";

                             $this->db->query($save_upload_query);
                     }

      }else
      {

      }

      
      /*
         //the query for inserting data into the database
         $save_upload_query = "INSERT INTO  kms_upload_share (kms_uploader_share_id,kms_upload_id,kms_upload_share_date,kms_upload_share_time,kms_upload_share_rec_forum_id,kms_upload_share_rec_emp_id,kms_upload_share_message)
         VALUE(".$this->db->escape($Upload_share_userID).",
              ".$this->db->escape($Upload_file_id).",
              ".$this->db->escape($Upload_file_share_date).",
              ".$this->db->escape($Upload_file_share_time).",
              ".$this->db->escape($Upload_file_share_forum).",
              ".$this->db->escape($Upload_file_share_recp).",
              ".$this->db->escape($Upload_file_share_message).")";
 
         $this->db->query($save_upload_query);
         $SaveQueryResult = $this->db->affected_rows();
         return $SaveQueryResult;
         */

 //echo $kms_recip_size.'-'.$Upload_share_userID.','.$Upload_file_id.','.$Upload_file_share_date.','.$Upload_file_share_time.','.$Upload_file_share_forum.','.$Upload_file_share_recp.','.$Upload_file_share_message;
    //echo $Upload_share_userID.''.
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
      }else if($kms_department_id != $kms_user_deptid)
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
                                // $Fetchupload_results = $this->db->query($Fetch_select_query, array(1,$kms_user_deptid,$kms_department_id));
                                 //$SaveQueryStatus = $Fetchupload_results->num_rows();

        // $Fetch_select_query2 . = "";
                                // $Fetchupload_results2 = $this->db->query($Fetch_select_query2, array(1,$kms_department_id,$kms_user_deptid));
                                 //$objectSize = sizeof($Fetch_select_query) + 1;
                                 //$Fetch_select_query[$objectSize] = $Fetchupload_results2;

                                 // Create array object 
                                // $arrObject = new ArrayObject($Fetchupload_results); 
                                 
                                 // Update the value at index 1 
                                // $arrObject->offsetSet(1,$Fetchupload_results2); 
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



}

?>