<?php 
class Pdp extends CI_Model
{
  

  function Save_lineManager($kms_user_id,$kms_new_lineManger)
  {
      $Update_Supervisor    =  "UPDATE `kms_star_data` SET `kms_star_data`.`kms_emp_supervisor` = ".$kms_new_lineManger."
                                WHERE  `kms_star_data`.`emp_data_id` = ".$kms_user_id."";
      $Update_Supervisor2   =   $this->db->query($Update_Supervisor);   
      if(!$Update_Supervisor2){ return 0; }else{ return 1;}
     
  }

  function Save_OrgGoal($kms_user_id,$kms_new_goal)
  {
      $Save_Org_goal   = "INSERT INTO `kms_pdp_org_goal` (`kms_pdp_org_goal_description`,`emp_data_id`,kms_pdp_org_goal_date) VALUES ('".$kms_new_goal."',".$kms_user_id.",CURDATE())";
      $Save_Org_goal2  =  $this->db->query($Save_Org_goal);
      if(!$Save_Org_goal2){ return 0; }else{ return 1;}
  }

  function Ajax_View_OrgGoal($kms_user_id)
  {
    $kms_emp_level          =  $this->session->userdata('kms_access_user_level');
    if(isset($kms_emp_level) && $kms_emp_level == 2)
    {
      $View_Org_goals   =    "SELECT `kms_star_data`.`kms_emp_supervisor` , `kms_pdp_org_goal`.`kms_pdp_org_goal_id` AS 'Goal_id', `kms_pdp_org_goal`.`kms_pdp_org_goal_description` AS 'Description', `kms_pdp_org_goal`.`kms_pdp_org_goal_date` AS 'Date'
                              FROM `kms_star_data` , `kms_pdp_org_goal` WHERE `kms_star_data`.`emp_data_id` = ".$kms_user_id." AND `kms_star_data`.`kms_emp_supervisor` = `kms_pdp_org_goal`.`emp_data_id`
                              AND `kms_pdp_org_goal`.`kms_pdp_org_goal_status` =1 ORDER BY `kms_pdp_org_goal`.`kms_pdp_org_goal_id` ASC LIMIT 7";
      $View_Org_goals2  =     $this->db->query($View_Org_goals)->result_array();
     
      if(! $View_Org_goals2)  {  return 0;  } else  {  return $View_Org_goals2;  } 
    }else
    {
      $View_Org_goals   =   "SELECT `kms_pdp_org_goal`.`kms_pdp_org_goal_id` AS 'Goal_id', `kms_pdp_org_goal`.`kms_pdp_org_goal_description` AS 'Description', `kms_pdp_org_goal`.`kms_pdp_org_goal_date` AS 'Date'
                           FROM `kms_pdp_org_goal`
                           WHERE `kms_pdp_org_goal`.`emp_data_id` =".$kms_user_id."
                           AND `kms_pdp_org_goal`.`kms_pdp_org_goal_status` =1 ORDER BY `kms_pdp_org_goal`.`kms_pdp_org_goal_id` ASC LIMIT 7";
    $View_Org_goals2  =    $this->db->query($View_Org_goals)->result_array();
    if(! $View_Org_goals2)  {  return 0;  } else  {  return $View_Org_goals2;  } 
    }
    

  }
  function Ajax_View_OrgGoal_addPDP($kms_emp_id,$kms_manager_id,$kms_user_level)
  { 
    if(isset($kms_user_level) && ($kms_user_level == 3))
    {
      
    $View_Org_goals   =   "SELECT `kms_pdp_org_goal`.`kms_pdp_org_goal_id` AS 'Goal_id', `kms_pdp_org_goal`.`kms_pdp_org_goal_description` AS 'Description', `kms_pdp_org_goal`.`kms_pdp_org_goal_date` AS 'Date'
                           FROM `kms_pdp_org_goal`
                           WHERE `kms_pdp_org_goal`.`emp_data_id` =".$kms_emp_id."
                           AND `kms_pdp_org_goal`.`kms_pdp_org_goal_status` =1 ORDER BY `kms_pdp_org_goal`.`kms_pdp_org_goal_id` ASC LIMIT 7";
    $View_Org_goals2  =    $this->db->query($View_Org_goals)->result_array();
    if(! $View_Org_goals2)  {  return 0;  } else  {  return $View_Org_goals2;  } //incase the user is at level III
      
    }
    else if(isset($kms_user_level) && ($kms_user_level == 2))
    {
      return "Level II";
    }
   
  }

  function Ajax_Update_OrgGoal($Pdp_edit_emp_id,$Pdp_edit_goal_id,$Pdp_edit_goal_des)
  {
    $Update_pdpOrgGoal  =  "UPDATE kms_pdp_org_goal SET `kms_pdp_org_goal`.`kms_pdp_org_goal_description` = '".$Pdp_edit_goal_des."' ,`kms_pdp_org_goal`.`kms_pdp_org_goal_date` = CURDATE()
                            WHERE `kms_pdp_org_goal`.`emp_data_id` = ".$Pdp_edit_emp_id." AND `kms_pdp_org_goal`.`kms_pdp_org_goal_id` =".$Pdp_edit_goal_id." LIMIT 1";
    $Update_pdpOrgGoal2 =  $this->db->query($Update_pdpOrgGoal); 
    if(!$Update_pdpOrgGoal2){ return 0; }else{ return 1;}
  }

  function Ajax_Delete_OrgGoal($Pdp_delete_emp_id,$Pdp_delete_goal_id)
  {
    $Delete_pdpOrgGoal  =  "UPDATE kms_pdp_org_goal SET`kms_pdp_org_goal`.`kms_pdp_org_goal_status` = 0
                            WHERE `kms_pdp_org_goal`.`emp_data_id` = ".$Pdp_delete_emp_id." AND `kms_pdp_org_goal`.`kms_pdp_org_goal_id` =".$Pdp_delete_goal_id." LIMIT 1";
    $Delete_pdpOrgGoal2 =   $this->db->query($Delete_pdpOrgGoal); 
    if(!$Delete_pdpOrgGoal2){ return 0; }else{ return 1;}
  }
 
  function Save_DepGoal($kms_emp_id,$Pdp_org_goal_id,$Pdp_dep_goal_des)
  {
    $Save_Dep_goal     = "INSERT INTO `kms_pdp_dep_goal` (`kms_pdp_dep_goal_description`,`emp_data_id`,`kms_pdp_dep_goal_date`,`kms_pdp_org_goal_id`) 
                          VALUES ('".$Pdp_dep_goal_des."',".$kms_emp_id.",CURDATE(),".$Pdp_org_goal_id.")";
    $Save_Dep_goal2    =  $this->db->query($Save_Dep_goal);
      if(!$Save_Dep_goal2){ return 0; }else{ return 1;}
  }

  function Ajax_View_DepGoal($kms_emp_id,$Pdp_org_goal_id)
  {
    $View_Dep_goals    =  "SELECT `kms_pdp_dep_goal`.`kms_pdp_dep_goal_id` AS Dep_Goal_id, `kms_pdp_dep_goal`.`kms_pdp_dep_goal_description` AS Dep_Goal, `kms_pdp_dep_goal`.`kms_pdp_dep_goal_date` AS Add_date, `kms_pdp_dep_goal`.`kms_pdp_org_goal_id` AS Org_Goal_id
                           FROM `kms_pdp_dep_goal`
                           WHERE `kms_pdp_dep_goal`.`emp_data_id` = ".$kms_emp_id."
                           AND `kms_pdp_dep_goal`.`kms_pdp_org_goal_id` = ".$Pdp_org_goal_id." AND `kms_pdp_dep_goal`.`kms_pdp_org_dep_status` = 1 LIMIT 7";

    $View_Dep_goals2   =  $this->db->query($View_Dep_goals)->result_array();
    if(! $View_Dep_goals2)  {  return 0;  } else  {  return $View_Dep_goals2;  } 
  }

  function Ajax_Update_DepGoal($Pdp_edit_emp_id,$Pdp_edit_org_goal_id,$Pdp_edit_dep_goal_id,$Pdp_edit_dep_goal_des)
  {
    
    $Update_pdpDepGoal2 =  "UPDATE `kms`.`kms_pdp_dep_goal` SET `kms_pdp_dep_goal_description` = '".$Pdp_edit_dep_goal_des."', `kms_pdp_dep_goal_date` = CURDATE()
                            WHERE `kms_pdp_dep_goal`.`kms_pdp_dep_goal_id` = ".$Pdp_edit_dep_goal_id." AND `kms_pdp_dep_goal`.`kms_pdp_org_goal_id` = ".$Pdp_edit_org_goal_id." AND `kms_pdp_dep_goal`.`emp_data_id` = ".$Pdp_edit_emp_id." LIMIT 1 ;";
    $Update_pdpDepGoal2 =   $this->db->query($Update_pdpDepGoal2); 
    if(!$Update_pdpDepGoal2){ return 0; }else{ return 1;}
  }

  function Ajax_Delete_DepGoal($Pdp_delete_emp_id,$Pdp_delete_Orggoal_id,$Pdp_delete_Depgoal_id)
  {
    $Delete_pdp_depGoal  =  "UPDATE `kms`.`kms_pdp_dep_goal` SET `kms_pdp_dep_goal`.`kms_pdp_org_dep_status` = 0
                             WHERE `kms_pdp_dep_goal`.`kms_pdp_dep_goal_id` = ".$Pdp_delete_Depgoal_id." AND `kms_pdp_dep_goal`.`kms_pdp_org_goal_id` = ".$Pdp_delete_Orggoal_id." AND `kms_pdp_dep_goal`.`emp_data_id` = ".$Pdp_delete_emp_id." LIMIT 1 ";
    $Delete_pdp_depGoal2 =   $this->db->query($Delete_pdp_depGoal); 
    if(!$Delete_pdp_depGoal2){ return 0; }else{ return 1;}
    
  }

  function Ajax_Add_OrgKPI($Pdp_OrgGoal_id,$Pdp_OrgGoal_kpi,$Pdp_emp_id)
  {
    $AddNew_OrgKPI       =   "INSERT INTO `kms_pdp_org_kpi` (kms_pdp_org_kpi_des,emp_data_id,kms_pdp_org_kpi_date,kms_pdp_org_goal_id) 
                              VALUES ('".$Pdp_OrgGoal_kpi."',".$Pdp_emp_id.",CURDATE(),".$Pdp_OrgGoal_id.") ";
    $AddNew_OrgKPI2      =    $this->db->query($AddNew_OrgKPI); 
    if(!$AddNew_OrgKPI2){ return 0; }else{ return 1;}                        
  }

  function Count_OrgKPI($Pdp_OrgGoal_id,$Pdp_emp_id)
  {
    $Count_KPIs         =  "SELECT COUNT( * ) AS 'KPI'
                            FROM `kms_pdp_org_kpi`
                            WHERE `kms_pdp_org_kpi`.`kms_pdp_org_kpi_status` = 1 AND `kms_pdp_org_kpi`.`emp_data_id` = ".$Pdp_emp_id." AND `kms_pdp_org_kpi`.`kms_pdp_org_goal_id` = ".$Pdp_OrgGoal_id."";
    $Count_KPIs_results =   $this->db->query($Count_KPIs)->result_array(); 
    if(! $Count_KPIs_results)  {  return 0;  } else  {  return $Count_KPIs_results;  } 
  }

  function Ajax_OrgKPI_View($Pdp_OrgGoal_id,$Pdp_emp_id)
  {
    $View_View_KPI      =  "SELECT `kms_pdp_org_kpi`.`kms_pdp_org_kpi_des` AS 'KPI Des',`kms_pdp_org_kpi`.`kms_pdp_org_kpi_id` AS 'KPI_Id',`kms_pdp_org_kpi`.`kms_pdp_org_kpi_date` AS 'Date',`kms_pdp_org_kpi`.`kms_pdp_org_goal_id` AS 'Goal_ID'
                            FROM `kms_pdp_org_kpi`
                            WHERE `kms_pdp_org_kpi`.`kms_pdp_org_kpi_status` = 1 AND `kms_pdp_org_kpi`.`emp_data_id` = ".$Pdp_emp_id." AND `kms_pdp_org_kpi`.`kms_pdp_org_goal_id` = ".$Pdp_OrgGoal_id."";
    $View_KPIs_results  =   $this->db->query($View_View_KPI)->result_array(); 
     if(! $View_KPIs_results)  {  return 0;  } else  {  return $View_KPIs_results;  }                      
  }

  function Ajax_Edit_OrgKPI($Pdp_OrgGoal_id,$Pdp_OrgGoal_kpi,$Pdp_emp_id,$OrgGoal_kpi_desc)
  {
    $Edit_org_kpi        =  "UPDATE `kms_pdp_org_kpi` SET `kms_pdp_org_kpi`.`kms_pdp_org_kpi_des` = '".$OrgGoal_kpi_desc."'
                             WHERE `kms_pdp_org_kpi`.`emp_data_id` = ".$Pdp_emp_id." AND `kms_pdp_org_kpi`.`kms_pdp_org_goal_id` = ".$Pdp_OrgGoal_id." AND `kms_pdp_org_kpi`.`kms_pdp_org_kpi_id` = ".$Pdp_OrgGoal_kpi." LIMIT 1 ";
    $Edit_org_kpi2       =   $this->db->query($Edit_org_kpi); 
    if(!$Edit_org_kpi2){ return 0; }else{ return 1;}
  }

  function Ajax_Delete_OrgKPI($Pdp_OrgGoal_id,$Pdp_OrgGoal_kpi,$Pdp_emp_id )
  {
    $Edit_org_kpi        =  "UPDATE `kms_pdp_org_kpi` SET kms_pdp_org_kpi_status	 = 0
                             WHERE `kms_pdp_org_kpi`.`emp_data_id` = ".$Pdp_emp_id." AND `kms_pdp_org_kpi`.`kms_pdp_org_goal_id` = ".$Pdp_OrgGoal_id." AND `kms_pdp_org_kpi`.`kms_pdp_org_kpi_id` = ".$Pdp_OrgGoal_kpi." LIMIT 1 ";
    $Edit_org_kpi2       =   $this->db->query($Edit_org_kpi); 
    if(!$Edit_org_kpi2){ return 0; }else{ return 1;}
  }

  function Ajax_Add_DepKPI($Pdp_OrgGoal_id,$Pdp_depGoal_id,$Pdp_emp_id,$DepGoal_kpi_des)
  {
    $AddNew_PdpKPI       =   "INSERT INTO `kms_pdp_dep_kpi` (kms_pdp_dep_kpi_des,kms_pdp_org_goal_id,kms_pdp_dep_goal_id,emp_data_id,kms_pdp_dep_kpi_date) 
                              VALUES ('".$DepGoal_kpi_des."',".$Pdp_OrgGoal_id.",".$Pdp_depGoal_id.",".$Pdp_emp_id.",CURDATE()) ";
    $AddNew_PdpKPI2      =    $this->db->query($AddNew_PdpKPI); 
    if(!$AddNew_PdpKPI2){ return 0; }else{ return 1;} 
  }

  function Ajax_Count_Dep_kpi($DGoal_id,$OGoal_id,$Pdp_emp_id)
  {
    $Count_KPIs         =  "SELECT COUNT( * ) AS 'KPI'
                            FROM `kms_pdp_dep_kpi`
                            WHERE `kms_pdp_dep_kpi`.`kms_pdp_org_dep_status` =1 AND `kms_pdp_dep_kpi`.`emp_data_id` =".$Pdp_emp_id." AND `kms_pdp_dep_kpi`.`kms_pdp_org_goal_id` =".$OGoal_id." AND `kms_pdp_dep_kpi`.`kms_pdp_dep_goal_id` =".$DGoal_id."
                            ";
    $Count_KPIs_results =   $this->db->query($Count_KPIs)->result_array(); 
    if(! $Count_KPIs_results)  {  return 0;  } else  {  return $Count_KPIs_results;  } 
  }

  function Ajax_DepKPI_View($Pdp_OrgGoal_id,$Pdp_DepGoal_id,$Pdp_emp_id)
  {
    $View_View_KPI      =  "SELECT `kms_pdp_dep_kpi`.`kms_pdp_dep_kpi_des` AS 'KPI Des', `kms_pdp_dep_kpi`.`kms_pdp_dep_kpi_id` AS 'KPI_Id', `kms_pdp_dep_kpi`.`kms_pdp_dep_kpi_date` AS 'Date', `kms_pdp_dep_kpi`.`kms_pdp_dep_goal_id` AS 'Goal_ID'
                            FROM `kms_pdp_dep_kpi`
                            WHERE `kms_pdp_dep_kpi`.`kms_pdp_org_dep_status` =1 AND `kms_pdp_dep_kpi`.`emp_data_id` =".$Pdp_emp_id."  AND `kms_pdp_dep_kpi`.`kms_pdp_org_goal_id` =".$Pdp_OrgGoal_id."
                            AND `kms_pdp_dep_kpi`.`kms_pdp_dep_goal_id` =".$Pdp_DepGoal_id."";
    $View_KPIs_results  =   $this->db->query($View_View_KPI)->result_array(); 
    if(! $View_KPIs_results)  {  return 0;  } else  {  return $View_KPIs_results;  }  
  }

  function Ajax_Edit_DepKPI($Pdp_OrgGoal_id,$Pdp_depGoal_id,$Pdp_emp_id,$DepGoal_kpi_des,$DepGoal_kpi_id)
  {
    $Edit_dep_kpi        =   "UPDATE `kms`.`kms_pdp_dep_kpi` SET `kms_pdp_dep_kpi_des` = '".$DepGoal_kpi_des."' 
                              WHERE `kms_pdp_dep_kpi`.`kms_pdp_dep_kpi_id` = ".$DepGoal_kpi_id." AND `kms_pdp_dep_kpi`.`emp_data_id` = ".$Pdp_emp_id." LIMIT 1 ";
    $Edit_dep_kpi2       =    $this->db->query($Edit_dep_kpi); 
    if(!$Edit_dep_kpi2){ return 0; }else{ return 1;}
  }

  function Ajax_Delete_DepKPI($Pdp_OrgGoal_id,$Pdp_depGoal_id,$Pdp_emp_id,$DepGoal_kpi_id)
  {
    $Delete_dep_kpi      =   "UPDATE `kms`.`kms_pdp_dep_kpi` SET `kms_pdp_dep_kpi`.`kms_pdp_org_dep_status` = 0
                              WHERE `kms_pdp_dep_kpi`.`kms_pdp_dep_kpi_id` = ".$DepGoal_kpi_id." AND `kms_pdp_dep_kpi`.`kms_pdp_org_goal_id` =".$Pdp_OrgGoal_id." AND `kms_pdp_dep_kpi`.`emp_data_id` = ".$Pdp_emp_id." LIMIT 1 ";
    $Delete_dep_kpi2     =    $this->db->query($Delete_dep_kpi); 
    if(!$Delete_dep_kpi2){ return 0; }else{ return 1;}
  }

  function Ajax_List_DepGoal($kms_emp_id,$Org_Goal)
  {
    $View_depgoal_list   =   "SELECT `kms_pdp_dep_goal`.`kms_pdp_dep_goal_id` AS 'ID', `kms_pdp_dep_goal`.`kms_pdp_dep_goal_description` AS 'Goal'
                              FROM `kms_pdp_dep_goal` WHERE `kms_pdp_dep_goal`.`emp_data_id` = ".$kms_emp_id."
                              AND `kms_pdp_dep_goal`.`kms_pdp_org_goal_id` = ".$Org_Goal." AND `kms_pdp_dep_goal`.`kms_pdp_org_dep_status` = 1 ";
   $View_depgoal_list2   =    $this->db->query($View_depgoal_list)->result_array(); 
   if(! $View_depgoal_list2)  {  return 0;  } else  {  return $View_depgoal_list2;  }  
  }

  function Ajax_TMGKPI_View($Pdp_OrgGoal_id,$Pdp_DepGoal_id,$Pdp_emp_id)
  {
    $View_TMG_Kpi       =     "SELECT `kms_pdp_tmg_kpi`.`kms_pdp_tmg_kpi_id` AS 'ID',`kms_pdp_tmg_kpi`.`kms_pdp_tmg_kpi_des` AS 'Goal',`kms_pdp_tmg_kpi`.`kms_pdp_tmg_kpi_date` AS 'Date' 
                               FROM `kms_pdp_tmg_kpi` 
                               WHERE `kms_pdp_tmg_kpi`.`kms_pdp_org_tmg_status` = 1 
                               AND `kms_pdp_tmg_kpi`.`emp_data_id` = ".$Pdp_emp_id." AND `kms_pdp_tmg_kpi`.`kms_pdp_dep_goal_id` = ".$Pdp_DepGoal_id." 
                               AND `kms_pdp_tmg_kpi`.`kms_pdp_org_goal_id` = ".$Pdp_OrgGoal_id."";
   $View_TMG_Kpi2      =       $this->db->query($View_TMG_Kpi)->result_array(); 
   if(! $View_TMG_Kpi2)  {  return 0;  } else  {  return $View_TMG_Kpi2;  } 
  }

  function Ajax_TMG_Add($Pdp_OrgGoal_id,$Pdp_DepGoal_id,$Pdp_emp_id,$Pdp_TNGoal_desp)
  {
    $AddNew_TMG_Pdp       =   "INSERT INTO `kms_pdp_tm_goal` (kms_pdp_tm_goal_description,kms_pdp_org_goal_id,kms_pdp_dep_goal_id,emp_data_id,kms_pdp_tm_goal_date) 
                               VALUES ('".$Pdp_TNGoal_desp."',".$Pdp_OrgGoal_id.",".$Pdp_DepGoal_id.",".$Pdp_emp_id.",CURDATE()) ";
    $AddNew_TMG_Pdp2      =    $this->db->query($AddNew_TMG_Pdp); 
    if(!$AddNew_TMG_Pdp2){ return 0; }else{ return 1;} 
  }

  function Ajax_TMGoal_View($Pdp_OrgGoal_id,$Pdp_DepGoal_id,$Pdp_emp_id)
  {
    $View_TMGoal        =     "SELECT `kms_pdp_tm_goal`.`kms_pdp_tm_goal_id` AS 'ID',`kms_pdp_tm_goal`.`kms_pdp_tm_goal_description` AS 'Goal',`kms_pdp_tm_goal`.`kms_pdp_tm_goal_date` AS 'Date' 
                               FROM `kms_pdp_tm_goal` 
                               WHERE `kms_pdp_tm_goal`.`kms_pdp_tm_dep_status` = 1 
                               AND `kms_pdp_tm_goal`.`emp_data_id` = ".$Pdp_emp_id." AND `kms_pdp_tm_goal`.`kms_pdp_dep_goal_id` = ".$Pdp_DepGoal_id." 
                               AND `kms_pdp_tm_goal`.`kms_pdp_org_goal_id` = ".$Pdp_OrgGoal_id." LIMIT 7";
    $View_TMGoal2      =       $this->db->query($View_TMGoal)->result_array(); 
   if(! $View_TMGoal2)  {  return 0;  } else  {  return $View_TMGoal2;  } 
  }

  function Ajax_TMG_Edit($Pdp_OrgGoal_id,$Pdp_DepGoal_id,$Pdp_emp_id,$Pdp_TMGoal_desp,$Pdp_TMGoal_id)
  {
    $Edit_TM_goal        =   "UPDATE `kms`.`kms_pdp_tm_goal` SET `kms_pdp_tm_goal_description` = '".$Pdp_TMGoal_desp."',`kms_pdp_tm_goal_date` = CURDATE()
                              WHERE `kms_pdp_tm_goal`.`kms_pdp_tm_goal_id` = ".$Pdp_TMGoal_id." AND `kms_pdp_tm_goal`.`emp_data_id` = ".$Pdp_emp_id." AND `kms_pdp_tm_goal`.`kms_pdp_org_goal_id` = ".$Pdp_OrgGoal_id." AND `kms_pdp_tm_goal`.`kms_pdp_dep_goal_id` = ".$Pdp_DepGoal_id." LIMIT 1 ";
    $Edit_TM_goal2       =    $this->db->query($Edit_TM_goal ); 
    if(!$Edit_TM_goal2){ return 0; }else{ return 1;}
  }

  function Ajax_Delete_TMGoal($Pdp_OrgGoal_id,$Pdp_DepGoal_id,$Pdp_emp_id,$Pdp_TMGoal_id)
  {
    $Delete_TM_goal        =   "UPDATE `kms`.`kms_pdp_tm_goal` SET `kms_pdp_tm_goal`.`kms_pdp_tm_dep_status` = 0 
                                WHERE `kms_pdp_tm_goal`.`kms_pdp_tm_goal_id` = ".$Pdp_TMGoal_id." AND `kms_pdp_tm_goal`.`emp_data_id` = ".$Pdp_emp_id." AND `kms_pdp_tm_goal`.`kms_pdp_org_goal_id` = ".$Pdp_OrgGoal_id." AND `kms_pdp_tm_goal`.`kms_pdp_dep_goal_id` = ".$Pdp_DepGoal_id." LIMIT 1 ";
    $Delete_TM_goal2       =    $this->db->query($Delete_TM_goal); 
    if(!$Delete_TM_goal2){ return 0; }else{ return 1;}
  }

  function Ajax_Add_TMGoalKPI($Pdp_OrgGoal_id,$Pdp_DepGoal_id,$Pdp_emp_id,$Pdp_TMGoal_id,$Pdp_TMGoal_des)
  {
    $AddNew_TMG_kpi       =   "INSERT INTO `kms_pdp_tmg_kpi`(kms_pdp_tm_goal_id,kms_pdp_tmg_kpi_des,kms_pdp_org_goal_id,kms_pdp_dep_goal_id,emp_data_id,kms_pdp_tmg_kpi_date) 
                               VALUES (".$Pdp_TMGoal_id.",'".$Pdp_TMGoal_des."',".$Pdp_OrgGoal_id.",".$Pdp_DepGoal_id.",".$Pdp_emp_id.",CURDATE()) ";
    $AddNew_TMG_kpi2      =    $this->db->query($AddNew_TMG_kpi); 
    if(!$AddNew_TMG_kpi2){ return 0; }else{ return 1;} 
  }

  function Ajax_Count_tmg_kpi($TMGoal_id,$Pdp_emp_id)
  {
    $Count_KPIs         =  "SELECT COUNT(*) AS 'KPI' FROM `kms_pdp_tmg_kpi` WHERE `emp_data_id` = ".$Pdp_emp_id." AND `kms_pdp_tm_goal_id` = ".$TMGoal_id."  AND  `kms_pdp_org_tmg_status` = 1";
    $Count_KPIs_results =   $this->db->query($Count_KPIs)->result_array(); 
    if(! $Count_KPIs_results)  {  return 0;  } else  {  return $Count_KPIs_results;  } 
  }
  function Ajax_TMGoalKPI_View($Pdp_TMGoal_id,$Pdp_emp_id)
  {
    $View_TMGoalKPI     =  "SELECT `kms_pdp_tmg_kpi_id` AS 'ID',`kms_pdp_tmg_kpi_des` AS 'Des',`kms_pdp_tmg_kpi_date` AS 'Date' FROM `kms_pdp_tmg_kpi` WHERE `kms_pdp_org_tmg_status` = 1 AND `kms_pdp_tm_goal_id` = ".$Pdp_TMGoal_id." AND `emp_data_id` = ".$Pdp_emp_id."";
    $View_TMGoalKPI2    =  $this->db->query($View_TMGoalKPI)->result_array(); 
    if(! $View_TMGoalKPI2)  {  return 0;  } else  {  return $View_TMGoalKPI2;  } 
  }
  function Ajax_Edit_TMGoalKPI($Pdp_TMGoal_kpi_id,$Pdp_TMGoal_kpi_des,$Pdp_emp_id)
  {
    $Edit_tmg_kpi        =   "UPDATE `kms`.`kms_pdp_tmg_kpi` SET `kms_pdp_tmg_kpi_des` = '".$Pdp_TMGoal_kpi_des."' 
                              WHERE `kms_pdp_tmg_kpi`.`kms_pdp_tmg_kpi_id` = ".$Pdp_TMGoal_kpi_id." AND `kms_pdp_tmg_kpi`.`emp_data_id` = ".$Pdp_emp_id." LIMIT 1 ";
    $Edit_tmg_kpi2       =    $this->db->query($Edit_tmg_kpi); 
    if(!$Edit_tmg_kpi2){ return 0; }else{ return 1;}
  }
  function Ajax_Delete_TMGoal_Kpi($Pdp_TMGkpi_id,$Pdp_emp_id)
  {
    $Delete_tmg_kpi        =   "UPDATE `kms`.`kms_pdp_tmg_kpi` SET `kms_pdp_org_tmg_status` = 0
                                WHERE `kms_pdp_tmg_kpi`.`kms_pdp_tmg_kpi_id` = ".$Pdp_TMGkpi_id." AND `kms_pdp_tmg_kpi`.`emp_data_id` = ".$Pdp_emp_id." LIMIT 1 ";
    $Delete_tmg_kpi2       =    $this->db->query($Delete_tmg_kpi); 
    if(!$Delete_tmg_kpi2){ return 0; }else{ return 1;}
  }
  function Ajax_Add_OrgMeasureTarget($Pdp_Ogoal_id,$Pdp_Measure_id,$Pdp_target_des,$Pdp_emp_id)
  {
    $AddNew_Org_target       =   "INSERT INTO `kms`.`kms_pdp_org_target` (`emp_data_id`,`kms_pdp_org_goal_id`,`kms_pdp_org_kpi_id`,`kms_pdp_target_des`,`kms_pdp_target_date`) 
                                  VALUES (".$Pdp_emp_id.",".$Pdp_Ogoal_id.",".$Pdp_Measure_id.",'".$Pdp_target_des."',CURDATE()) ";
    $AddNew_Org_target2      =    $this->db->query($AddNew_Org_target); 
    if(!$AddNew_Org_target2){ return 0; }else{ return 1;} 
  }

  function Ajax_OrgMeasureTarget($Goal_id,$KPI_id,$Pdp_emp_id)
  {
    $Count_Target         =  "SELECT COUNT(*) AS 'Target' FROM `kms`.`kms_pdp_org_target` WHERE `emp_data_id` = ".$Pdp_emp_id." AND `kms_pdp_org_goal_id` = ".$Goal_id." AND `kms_pdp_org_kpi_id` =".$KPI_id." AND  kms_pdp_target_status = 1 LIMIT 2";
    $Count_Target_results =   $this->db->query($Count_Target)->result_array(); 
    if(! $Count_Target_results)  {  return 0;  } else  {  return $Count_Target_results;  } 
  }
  function Ajax_Add_DeptMeasureTarget($Pdp_dgoal_id,$Pdp_Ogoal_id,$Pdp_Measure_id,$Pdp_target_des,$Pdp_emp_id)
  {
    $AddNew_Dep_target       =   "INSERT INTO `kms`.`kms_pdp_dep_target` (`emp_data_id`,`kms_pdp_org_goal_id`,`kms_pdp_dep_goal_id`,`kms_pdp_dep_kpi_id`,`kms_pdp_dep_target`,`kms_pdp_dep_target_date`) 
                                  VALUES (".$Pdp_emp_id.",".$Pdp_Ogoal_id.",".$Pdp_dgoal_id.",".$Pdp_Measure_id.",'".$Pdp_target_des."',CURDATE()) ";
    $AddNew_Dep_target2      =    $this->db->query($AddNew_Dep_target); 
    if(!$AddNew_Dep_target2){ return 0; }else{ return 1;} 
  }
  function Ajax_DepTargetCount($KPI_id,$Pdp_DepGoal_id,$Pdp_emp_id)
  {
    $Count_Target         =  "SELECT COUNT(*) AS 'Target' FROM `kms`.`kms_pdp_dep_target` WHERE `emp_data_id` = ".$Pdp_emp_id." AND `kms_pdp_dep_goal_id` =".$Pdp_DepGoal_id." AND `kms_pdp_dep_kpi_id`=".$KPI_id." AND `kms_pdp_dep_target_status` = 1 LIMIT 2";
    $Count_Target_results =   $this->db->query($Count_Target)->result_array(); 
    if(! $Count_Target_results)  {  return 0;  } else  {  return $Count_Target_results;  } 
  }
  function Ajax_OrgTarget_View($Pdp_Ogoal_id,$kms_emp_id,$KPI_id)
  {
    $View_Target         =  "SELECT kms_pdp_target_des AS 'Des',kms_pdp_org_target_id AS 'Id' FROM `kms`.`kms_pdp_org_target` WHERE `emp_data_id` = ".$kms_emp_id." AND `kms_pdp_org_goal_id` = ".$Pdp_Ogoal_id." AND `kms_pdp_org_kpi_id` =".$KPI_id." AND  kms_pdp_target_status = 1 ORDER BY kms_pdp_org_target_id DESC LIMIT 1";
    $View_Target_results =   $this->db->query($View_Target)->result_array(); 
    if(! $View_Target_results)  {  return 0;  } else  {  return $View_Target_results;  } 
  }
  function Ajax_AddNew_Pdp($kms_emp_id,$Pdp_Ogoal_id,$Pdp_Measure,$Pdp_Traget,$Pdp_ReportMonth)
  {
    $AddNew_Dep          =   "INSERT INTO `kms`.`kms_pdp_details` (`emp_data_id`,`kms_pdp_org_goal_id`,`kms_pdp_org_kpi_id`,`kms_pdp_org_target_id`,`kms_pdp_report_month`,`kms_pdp_date`) 
                              VALUES (".$kms_emp_id.",".$Pdp_Ogoal_id.",".$Pdp_Measure.",".$Pdp_Traget.",".$Pdp_ReportMonth.",CURDATE()) ";
    $AddNew_Dep2         =    $this->db->query($AddNew_Dep); 
    if(!$AddNew_Dep2){ return 0; }
    else
    { 
      //SELECT LAST_INSERT_ID();
      $Pdp_id            =   "SELECT MAX(`kms_pdp_id`) AS 'Last' FROM `kms_pdp_details` WHERE `emp_data_id` = ".$kms_emp_id." AND `status` = 1";
      $Pdp_id2           =    $this->db->query($Pdp_id)->result_array(); 
      foreach($Pdp_id2 as $id)
      { 
        $Pdp_ID  = $id['Last'];
       }
      return $Pdp_ID;
    } 
  }
  function Ajax_View_Pdp($kms_emp_id)
  {
    $View_Pdp            =  "SELECT * FROM `kms_pdp_details` WHERE `kms_pdp_details`.`emp_data_id` = ".$kms_emp_id." AND `kms_pdp_details`.`status` = 1  LIMIT 10";
    $View_Pdp_results    =   $this->db->query($View_Pdp)->result_array(); 
    if(! $View_Pdp_results)  {  return 0;  } else  {  return $View_Pdp_results;  } 
  }

  function Ajax_AddNew_PdpOrg_Accomp($kms_emp_id,$Pdp_Ogoal_id,$Pdp_Measure,$Pdp_AccompDate,$Pdp_Accomp,$Pdp_Rate,$Pdp_id )
  {
    $AddNew_OrgAccomp    =   "INSERT INTO `kms`.`kms_pdp_org_accomp` (`emp_data_id`,`kms_pdp_org_goal_id`,`kms_pdp_org_kpi_id`,`kms_pdp_accomplishment`,`kms_pdp_accomp_date`,`kms_pdp_id`,`kms_pdp_accomp_rate`) 
                              VALUES (".$kms_emp_id.",".$Pdp_Ogoal_id.",".$Pdp_Measure.",'".$Pdp_Accomp."','".$Pdp_AccompDate."',".$Pdp_id .",".$Pdp_Rate.")";
    $AddNew_OrgAccomp2   =    $this->db->query($AddNew_OrgAccomp); 
    if(!$AddNew_OrgAccomp2){ return 0; }else{ return 1;} 
  }
  function Ajax_Count_PdpOrg_Accomp($kms_emp_id,$Pdp_id,$Pdp_OrgID,$Pdp_MeasureID)
  {
    $View_PdpOrg_Accomp  =  "SELECT COUNT(*) AS 'Count' FROM `kms_pdp_org_accomp` 
                             WHERE `kms_pdp_org_accomp`.`kms_pdp_id` = ".$Pdp_id." AND `kms_pdp_org_accomp`.`emp_data_id` = ".$kms_emp_id." AND `kms_pdp_org_accomp`.`kms_pdp_org_goal_id` = ".$Pdp_OrgID." AND `kms_pdp_org_accomp`.`kms_pdp_org_kpi_id` = ".$Pdp_MeasureID." AND `kms_pdp_org_accomp`.`kms_pdp_accomplishment_status` = 1";
    $View_PdpOrg_Accomp2 =   $this->db->query($View_PdpOrg_Accomp)->result_array(); 
    if(!$View_PdpOrg_Accomp2 )  {  return 0;  } else  {  return $View_PdpOrg_Accomp2;  } 
  }
 
}