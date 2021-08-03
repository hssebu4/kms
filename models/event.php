<?php 
class Event extends CI_Model
{
  function Fetch_Location_details()
            {
                $kms_deptid = $this->session->userdata('kms_access_user_dept_id');
                $kms_userid = $this->session->userdata('kms_emp_id');
                $kms_useraccess_level = $this->session->userdata('kms_access_user_level');

                $Fetch_location_query = "SELECT kms_event_location.* FROM kms_event_location
                                         WHERE kms_event_location.kms_location_status = 1
                                        ";
        
                $Fetch_Location_results = $this->db->query($Fetch_location_query);
                 
                 if ( ! $Fetch_Location_results)
                 {
                          $error = $this->db->error(); // Has keys 'code' and 'message'
                          return $error;
                 }else
                 {
                    return $Fetch_Location_results; 
                 }

 
            }
   function Register_New_Event($Event_location,$Event_date,$Event_time,$Event_details,$Event_single_part,$Event_dept_part,$Event_dept_group)
            {
               $kms_deptid = $this->session->userdata('kms_access_user_dept_id');
               $kms_userid = $this->session->userdata('kms_emp_id');
               $kms_useraccess_level = $this->session->userdata('kms_access_user_level');

               $kms_event_exploded_single = explode(',',$Event_single_part);
               $kms_single_size           = sizeof($kms_event_exploded_single);

               $kms_event_exploded_dept = explode(',',$Event_dept_part);
               $kms_dept_size           = sizeof($kms_event_exploded_dept);

               $kms_event_exploded_group = explode(',',$Event_dept_group);
               $kms_group_size           = sizeof($kms_event_exploded_group);

               $Fetch_existing_events_byEmpID = "SELECT kms_events.* FROM kms_events WHERE kms_events.emp_data_id =".$this->db->escape($kms_userid)."
                                                 AND kms_events.kms_location_id =".$this->db->escape($Event_location)." AND kms_events.kms_event_date =".$this->db->escape($Event_date)."
                                                 AND kms_events.kms_event_time =".$this->db->escape($Event_time)." AND kms_events.kms_event_details =".$this->db->escape($Event_details)."";
               
               $Fetch_Event_results           = $this->db->query($Fetch_existing_events_byEmpID);

               if ( ! $Fetch_Event_results)
               {
                        $error = $this->db->error(); // Has keys 'code' and 'message'
                        return $error;
               }else
               {
              
                  $Fetch_event_result_count = $Fetch_Event_results->result_array();
                  if(sizeof($Fetch_event_result_count) >= 1)
                     {
                        return "777";//Return code for existing record
                     }
                  else if(sizeof($Fetch_event_result_count) == 0)
                     {
                        //Incase the new event is not existing in th database then we continue saving it as below
                         //the query for inserting data into the database
                     $save_event_query = "INSERT INTO kms_events (emp_data_id,kms_event_details,kms_location_id,kms_event_date,kms_event_time )
                                             VALUE(".$this->db->escape($kms_userid).",
                                                   ".$this->db->escape($Event_details).",
                                                   ".$this->db->escape($Event_location).",
                                                   ".$this->db->escape($Event_date).",
                                                   ".$this->db->escape($Event_time).")";
                     $this->db->query($save_event_query);

                     $SaveQueryResult = $this->db->affected_rows();
                     if(isset($SaveQueryResult) && $SaveQueryResult > 0)
                        {
                           $Fetch_existing_events_byEmpID2 = "SELECT kms_events.kms_event_id FROM kms_events WHERE kms_events.emp_data_id =".$this->db->escape($kms_userid)."
                                                             AND kms_events.kms_location_id =".$this->db->escape($Event_location)." AND kms_events.kms_event_date =".$this->db->escape($Event_date)."
                                                             AND kms_events.kms_event_time =".$this->db->escape($Event_time)." AND kms_events.kms_event_details =".$this->db->escape($Event_details)."";
                           
                           $Fetch_Event_results2           = $this->db->query($Fetch_existing_events_byEmpID2)->result_array();
                           foreach($Fetch_Event_results2 as $Event_id_done)
                                  {
                                       //Then register the event participate as below
                                       if($kms_single_size == 1 && $kms_event_exploded_single[0] != "")//Incase the participant is one
                                          {
                                             $save_event_query = "INSERT INTO kms_event_participate (emp_data_id,kms_event_id,kms_department_id,kms_group_id )
                                                                  VALUE(".$this->db->escape($kms_event_exploded_single[0]).",
                                                                        ".$this->db->escape($Event_id_done['kms_event_id']).",
                                                                        0,
                                                                        0
                                                                        )";
                                                                  $this->db->query($save_event_query);
                                          }
                                       //Incase the single participates are more than one person
                                       if($kms_single_size > 1)
                                          {
                                              foreach($kms_event_exploded_single as $Single_list)
                                                     {
                                                      $save_event_query = "INSERT INTO kms_event_participate (emp_data_id,kms_event_id,kms_department_id,kms_group_id )
                                                                  VALUE(".$this->db->escape($Single_list).",
                                                                        ".$this->db->escape($Event_id_done['kms_event_id']).",
                                                                        0,
                                                                        0
                                                                        )";
                                                       $this->db->query($save_event_query);
                                                     }
                                          }
                                          //Then register the event participate department as below
                                       if($kms_dept_size == 1 && $kms_event_exploded_dept[0] != "")//Incase the participant is one
                                       {
                                          $save_event_query = "INSERT INTO kms_event_participate (emp_data_id,kms_event_id,kms_department_id,kms_group_id )
                                                               VALUE(0,
                                                                     ".$this->db->escape($Event_id_done['kms_event_id']).",
                                                                     ".$this->db->escape($kms_event_exploded_dept[0]).",
                                                                     0
                                                                     )";
                                         $this->db->query($save_event_query);
                                       }
                                       //Incase the department participates are more than onedepartments
                                       if($kms_dept_size > 1)
                                          {
                                              foreach($kms_event_exploded_dept as $Dept_list)
                                                     {
                                                      $save_event_query = "INSERT INTO kms_event_participate (emp_data_id,kms_event_id,kms_department_id,kms_group_id )
                                                                  VALUE(0,
                                                                        ".$this->db->escape($Event_id_done['kms_event_id']).",
                                                                        ".$this->db->escape($Dept_list).",
                                                                        0
                                                                        )";
                                                       $this->db->query($save_event_query);
                                                     }
                                          }

                                                //Then register the event participate group as below
                                                if($kms_group_size == 1 && $kms_event_exploded_group[0] != "")//Incase the participant is one
                                                {
                                                   $save_event_query = "INSERT INTO kms_event_participate (emp_data_id,kms_event_id,kms_department_id,kms_group_id)
                                                                        VALUE(0,
                                                                              ".$this->db->escape($Event_id_done['kms_event_id']).",
                                                                              0,
                                                                              ".$this->db->escape($kms_event_exploded_group[0])."
                                                                              )";
                                                  $this->db->query($save_event_query);
                                                }
                                                //Incase the group participates are more than one group
                                                if($kms_group_size > 1)
                                                   {
                                                       foreach($kms_event_exploded_group as $Group_list)
                                                              {
                                                               $save_event_query = "INSERT INTO kms_event_participate (emp_data_id,kms_event_id,kms_department_id,kms_group_id )
                                                                           VALUE(0,
                                                                                 ".$this->db->escape($Event_id_done['kms_event_id']).",
                                                                                 0,
                                                                                 ".$this->db->escape($Group_list)."
                                                                                 )";
                                                                $this->db->query($save_event_query);
                                                              }
                                                   }

                                  }
                        }
                    
                      return "888";
                     }
               }

            }

            //This function returns all the events that are created the user as below
            function Fetch_All_Events($kms_User_id)
            {
                           $kms_fetch_all_event = "SELECT kms_events. * , kms_event_location.kms_loaction_name
                                                   FROM kms_events, kms_event_location
                                                   WHERE kms_events.emp_data_id =".$kms_User_id."
                                                   AND kms_event_location.kms_location_id = kms_events.kms_location_id";
                           $kms_event_results   =  $this->db->query($kms_fetch_all_event);  
                           $Get_numbers = $kms_event_results->result_array();

                           foreach ($Get_numbers as $Gotten_Number) 
                                 { 
                                    $kms_gotten_values = "SELECT COUNT( * ) AS Total, (

                                       SELECT COUNT( * )
                                       FROM kms_event_participate
                                       WHERE kms_event_participate.kms_event_id =".$Gotten_Number['kms_event_id']."
                                       AND kms_event_participate.emp_data_id !=0
                                       ) AS Emp, (
                                       
                                       SELECT COUNT( * )
                                       FROM kms_event_participate
                                       WHERE kms_event_participate.kms_event_id =".$Gotten_Number['kms_event_id']."
                                       AND kms_event_participate.kms_department_id !=0
                                       ) AS Dept, (
                                       
                                       SELECT COUNT( * )
                                       FROM kms_event_participate
                                       WHERE kms_event_participate.kms_event_id =".$Gotten_Number['kms_event_id']."
                                       AND kms_event_participate.kms_group_id !=0
                                       ) AS Grp
                                       
                                       FROM kms_event_participate
                                       WHERE kms_event_id =".$Gotten_Number['kms_event_id']."";
                                 }
                           return $kms_event_results;
            }
           

}

?>