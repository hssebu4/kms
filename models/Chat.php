<?php 
class Chat extends CI_Model
{
    //This is to fetch the forum messages from the database
    function fetch_fchat_message()
    {
     
        $kms_deptid = $this->session->userdata('kms_access_user_dept_id');
        $Fetch_select_query = "SELECT COUNT( * ) AS kms_fchats, 
                                        forum_chat_receiver_id AS kms_forum
                                        FROM kms_forum_chat
                                        WHERE forum_chat_status = ?
                                        AND kms_forum_chat.forum_chat_receiver_id =".$kms_deptid."
                                        AND  kms_forum_chat.chat_forum_send_id =".$kms_deptid."
                                        GROUP BY forum_chat_receiver_id";

        $Fetch_FChat_results = $this->db->query($Fetch_select_query, 1);
         
         if ( ! $this->db->query($Fetch_select_query, 1))
         {
                  $error = $this->db->error(); // Has keys 'code' and 'message'
                  return $error;
         }else
         {
            return $Fetch_FChat_results;
         }

    }
 
     //This is to fetch the forum messages from the database
     function fetch_forum_message($forum_no,$kms_user_id)
     {

        $kms_userid = $this->session->userdata('kms_emp_id');
        $kms_deptid = $this->session->userdata('kms_access_user_dept_id');
        $kms_user_level = $this->session->userdata('kms_access_user_level');
        //kms_access_user_level

        if ($forum_no == $kms_deptid) {
                $Fetch_select_query =   "SELECT kms_forum_chat.* , kms_emp_data.emp_data_sname
                                                FROM kms_forum_chat, kms_emp_data
                                                WHERE kms_forum_chat.chat_forum_send_id =".$forum_no."
                                                AND kms_forum_chat.forum_chat_receiver_id =".$forum_no."
                                                AND kms_emp_data.emp_data_id = kms_forum_chat.emp_data_id
                                                ORDER BY kms_forum_chat.forum_chat_id ASC
                                                LIMIT 100 
                                                
                                        ";
                 $Fetch_FChat_Msg_results = $this->db->query($Fetch_select_query);
        }
       else  if ($forum_no == 1) {
                $Fetch_select_query =   "SELECT kms_forum_chat.* , kms_emp_data.emp_data_sname
                                                FROM kms_forum_chat, kms_emp_data
                                                WHERE kms_forum_chat.forum_chat_receiver_id =".$forum_no."
                                                AND kms_emp_data.emp_data_id = kms_forum_chat.emp_data_id
                                                ORDER BY kms_forum_chat.forum_chat_id ASC
                                                LIMIT 100 
                                                
                                        ";
                $Fetch_FChat_Msg_results = $this->db->query($Fetch_select_query);
        }
        else if($forum_no != $kms_deptid && $forum_no !=1)
        {  
                $Fetch_select_query =   "SELECT *
                                                FROM (
                                                        ( SELECT kms_forum_chat.* , kms_emp_data.emp_data_sname
                                                                                        FROM kms_forum_chat, kms_emp_data
                                                                                        WHERE kms_forum_chat.chat_forum_send_id =".$kms_deptid."
                                                                                        AND kms_forum_chat.forum_chat_receiver_id =".$forum_no."
                                                                                        AND kms_emp_data.emp_data_id = kms_forum_chat.emp_data_id)
                                                        UNION
                                                        ( SELECT kms_forum_chat.* , kms_emp_data.emp_data_sname
                                                                                        FROM kms_forum_chat, kms_emp_data
                                                                                        WHERE kms_forum_chat.chat_forum_send_id =".$forum_no."
                                                                                        AND kms_forum_chat.forum_chat_receiver_id =".$kms_deptid."
                                                                                        AND kms_emp_data.emp_data_id = kms_forum_chat.emp_data_id)
                                                ) AS i
                                        ORDER BY forum_chat_id ASC";

                $Fetch_FChat_Msg_results = $this->db->query($Fetch_select_query);
        }
         

                
        
          
          if ( ! $Fetch_FChat_Msg_results)
          {
                  $error = $this->db->error(); // Has keys 'code' and 'message'
                  return $error;
          }else
          {
             return $Fetch_FChat_Msg_results;
          }
 
     }


   function send_fchat_message($fchat_Recept,$fchat_Forum,$fchat_Topic,$fchat_Message,$fchat_time,$fchat_date,$fchat_sender)
   {
        $kms_deptid = $this->session->userdata('kms_access_user_dept_id');

        $kms_chat_exploded_forum = explode(',',$fchat_Forum);
        $kms_forum_size  = sizeof($kms_chat_exploded_forum);

        $kms_chat_exploded_recepient = explode(',',$fchat_Recept);
        $kms_recipient_size  = sizeof($kms_chat_exploded_recepient);

        if($kms_forum_size == 1 && $fchat_Forum != "")
        {
                   //the query for inserting forum chats data into the database
         $save_fchat_query = "INSERT INTO kms_forum_chat (chat_forum_send_id,emp_data_id,forum_chat_receiver_id,forum_chat_sender_id,forum_chat_message,forum_chat_topic,forum_chat_send_date,forum_chat_send_time)
                                VALUE(".$this->db->escape($kms_deptid).",
                                ".$this->db->escape($fchat_sender).",
                                ".$this->db->escape($fchat_Forum).",
                                ".$this->db->escape($fchat_sender).",
                                ".$this->db->escape($fchat_Message).",
                                ".$this->db->escape($fchat_Topic).",
                                ".$this->db->escape($fchat_date).",
                                ".$this->db->escape($fchat_time).")";

                        $this->db->query($save_fchat_query );
               
                     //First obtain the receiver contacts
                $Get_receiver_forum_contact = "SELECT kms_emp_data.emp_data_sname AS Rname, kms_emp_phone.kms_emp_phone_number AS Rphone
                                                FROM kms_emp_data, kms_star_data, kms_emp_phone
                                                WHERE kms_star_data.kms_department_id =".$this->db->escape($fchat_Forum)."
                                                AND kms_star_data.emp_data_id = kms_emp_data.emp_data_id
                                                AND kms_emp_phone.emp_data_id = kms_star_data.emp_data_id";


                $Get_receiver_forum_contact_results = $this->db->query($Get_receiver_forum_contact)->result_array(); 

                        foreach ($Get_receiver_forum_contact_results as $Result1)
                        { //The message composed with as the sender name and the receiver name
                                $Sender = $Result1['Rname']."-".$this->session->userdata('kms_emp_data_secondname');
                                //Then we store the noticification details as below
                                $Save_notice = "INSERT INTO  kms_noticification (kms_notice_receiver,kms_notice_sender,kms_notice_text,kms_notice_status)
                                                VALUE (".$Result1['Rphone'].",
                                                ".$this->db->escape($Sender).",
                                                ".$this->db->escape($fchat_Message).",
                                                2
                                                )";
                                $this->db->query($Save_notice);
                        }
        }
       if($kms_forum_size > 1)
        { 
           
                foreach($kms_chat_exploded_forum as $kms_forum_id)
                {
                              //the query for inserting forum chats data into the database
                 $save_fchat_query = "INSERT INTO kms_forum_chat (chat_forum_send_id,emp_data_id,forum_chat_receiver_id,forum_chat_sender_id,forum_chat_message,forum_chat_topic,forum_chat_send_date,forum_chat_send_time)
                                        VALUE(".$this->db->escape($kms_deptid).",
                                        ".$this->db->escape($fchat_sender).",
                                        ".$this->db->escape($kms_forum_id).",
                                        ".$this->db->escape($fchat_sender).",
                                        ".$this->db->escape($fchat_Message).",
                                        ".$this->db->escape($fchat_Topic).",
                                        ".$this->db->escape($fchat_date).",
                                        ".$this->db->escape($fchat_time).")";

                $this->db->query($save_fchat_query );
                $SaveQueryResult = $this->db->affected_rows();  


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
                $Save_notice = "INSERT INTO  kms_noticification (kms_notice_receiver,kms_notice_sender,kms_notice_text,kms_notice_status)
                                VALUE (".$Result1['Rphone'].",
                                ".$this->db->escape($Sender).",
                                ".$this->db->escape($fchat_Message).",
                                2
                                )";
                $this->db->query($Save_notice);
                }

                }
               
                
                     
               
        }
        else{
                if($kms_recipient_size == 1 && $fchat_Recept != 0 )
        {
                   //the query for inserting forum chats data into the database
         $save_fchat_query = "INSERT INTO kms_forum_chat (chat_forum_send_id,emp_data_id,forum_chat_rec_emp_id,forum_chat_receiver_id,forum_chat_sender_id,forum_chat_message,forum_chat_topic,forum_chat_send_date,forum_chat_send_time)
                                VALUE(".$this->db->escape($kms_deptid).",
                                ".$this->db->escape($fchat_sender).",
                                ".$this->db->escape($fchat_Recept).",
                                0,
                                ".$this->db->escape($fchat_sender).",
                                ".$this->db->escape($fchat_Message).",
                                ".$this->db->escape($fchat_Topic).",
                                ".$this->db->escape($fchat_date).",
                                ".$this->db->escape($fchat_time).")";

                        $this->db->query($save_fchat_query );
                        $SaveQueryResult = $this->db->affected_rows();
 
                         //First obtain the receiver contacts
                        $Get_receiver_forum_contact = "SELECT kms_emp_data.emp_data_sname AS Rname, kms_emp_phone.kms_emp_phone_number AS Rphone
                                                        FROM kms_emp_data, kms_star_data, kms_emp_phone
                                                        WHERE kms_emp_data.emp_data_id =".$this->db->escape($fchat_Recept)."
                                                        AND kms_star_data.emp_data_id = kms_emp_data.emp_data_id
                                                        AND kms_emp_phone.emp_data_id = kms_star_data.emp_data_id";


                        $Get_receiver_forum_contact_results = $this->db->query($Get_receiver_forum_contact)->result_array(); 

                        foreach ($Get_receiver_forum_contact_results as $Result1)
                        { //The message composed with as the sender name and the receiver name
                                $Sender = $Result1['Rname']."-".$this->session->userdata('kms_emp_data_secondname');
                                //Then we store the noticification details as below
                                $Save_notice = "INSERT INTO  kms_noticification (kms_notice_receiver,kms_notice_sender,kms_notice_text,kms_notice_status)
                                                VALUE (".$Result1['Rphone'].",
                                                ".$this->db->escape($Sender).",
                                                ".$this->db->escape($fchat_Message).",
                                                2
                                                )";
                                $this->db->query($Save_notice);
                        }

              


                    
        }
       if($kms_recipient_size > 1 )
        { 
           
                foreach($kms_chat_exploded_recepient as $kms_recpit_id)
                {
                              //the query for inserting forum chats data into the database
                 $save_fchat_query = "INSERT INTO kms_forum_chat (chat_forum_send_id,emp_data_id,forum_chat_rec_emp_id,forum_chat_receiver_id,forum_chat_sender_id,forum_chat_message,forum_chat_topic,forum_chat_send_date,forum_chat_send_time)
                                        VALUE(".$this->db->escape($kms_deptid).",
                                        ".$this->db->escape($fchat_sender).",
                                        ".$this->db->escape($kms_recpit_id).",
                                        0,
                                        ".$this->db->escape($fchat_sender).",
                                        ".$this->db->escape($fchat_Message).",
                                        ".$this->db->escape($fchat_Topic).",
                                        ".$this->db->escape($fchat_date).",
                                        ".$this->db->escape($fchat_time).")";

                $this->db->query($save_fchat_query );
                $SaveQueryResult = $this->db->affected_rows();  
                
                 //First obtain the receiver contacts
                 $Get_receiver_forum_contact = "SELECT kms_emp_data.emp_data_sname AS Rname, kms_emp_phone.kms_emp_phone_number AS Rphone
                                                FROM kms_emp_data, kms_star_data, kms_emp_phone
                                                WHERE kms_emp_data.emp_data_id =".$this->db->escape($kms_recpit_id)."
                                                AND kms_star_data.emp_data_id = kms_emp_data.emp_data_id
                                                AND kms_emp_phone.emp_data_id = kms_star_data.emp_data_id";


                $Get_receiver_forum_contact_results = $this->db->query($Get_receiver_forum_contact)->result_array(); 

                foreach ($Get_receiver_forum_contact_results as $Result1)
                {       //The message composed with as the sender name and the receiver name
                        $Sender = $Result1['Rname']."-".$this->session->userdata('kms_emp_data_secondname');
                        //Then we store the noticification details as below
                        $Save_notice = "INSERT INTO  kms_noticification (kms_notice_receiver,kms_notice_sender,kms_notice_text,kms_notice_status)
                                VALUE (".$Result1['Rphone'].",
                                ".$this->db->escape($Sender ).",
                                ".$this->db->escape($fchat_Message).",
                                2
                                )";
                        $this->db->query($Save_notice);
                }


                
                }
               
                
                     
               
        }
        }
     

               return $SaveQueryResult;      

   }
   function Obtain_emp_department($emp_id)
     {
            $Fetch_querry_dept = "SELECT *
                                        FROM kms_star_data
                                        WHERE emp_data_id =".$this->db->escape($emp_id)."";
          $Results_emp_dept =  $this->db->query($Fetch_querry_dept);
          return $Results_emp_dept;

     }

     public function Obtain_emp_group()
        {
                $Fetch_query_emp_groups = "SELECT kms_emp_group.kms_group_name,kms_emp_group.kms_group_id 
                                           FROM kms_emp_group
                                           WHERE kms_emp_group.kms_group_status = 1";
                $Results_emp_groups     = $this->db->query($Fetch_query_emp_groups);
                return $Results_emp_groups;
        }
}

?>