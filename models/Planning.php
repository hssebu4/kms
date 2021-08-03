<?php 
class Planning extends CI_Model
{

    function Ajax_Add_CRole($Plan_emp_id,$Role_name,$Role_rank1,$Role_rank2,$Role_rank3,$Role_rank4,$Role_skill)
    {//,$Role_rank5  `kms_plan_crole_rank5`,
        $Save_Crole      = "INSERT INTO `kms_plan_crole` (`emp_data_id`,`kms_plan_crole_des`,`kms_plan_crole_rank1`,`kms_plan_crole_rank2`,`kms_plan_crole_rank3`,`kms_plan_crole_rank4`,`kms_plan_crole_date`,`kms_plan_crole_skill`) 
                            VALUES (".$Plan_emp_id.",'".$Role_name."',".$Role_rank1.",".$Role_rank2.",".$Role_rank3.",".$Role_rank4.",CURDATE(),'".$Role_skill."')";//".$Role_rank5.",
        $Save_Crole2     =  $this->db->query($Save_Crole);
        if(!$Save_Crole2){ return 0; }else{ return 1;}
    }

    function Ajax_Check_Crole($Plan_emp_id,$Role_name)
    {
        $Check_Crole     =  "SELECT *  FROM `kms_plan_crole` WHERE `emp_data_id` = ".$Plan_emp_id." AND `kms_plan_crole_des` = '".$Role_name."'";
        $Check_Crole2    =   $this->db->query($Check_Crole)->num_rows();
        return $Check_Crole2;
    }
    function Ajax_View_Crole($Plan_emp_id)
    {
        $View_Crole     =  "SELECT *  FROM `kms_plan_crole` WHERE `emp_data_id` = ".$Plan_emp_id." LIMIT 10 ";
        $View_Crole2    =   $this->db->query($View_Crole)->result_array();
        return $View_Crole2;
    }
    function Ajax_EditCRole($kms_emp_id,$Plan_Role_desc,$Plan_Role_rank1,$Plan_Role_rank2,$Plan_Role_rank3,$Plan_Role_rank5,$Plan_Role_skill)
    {
        $Update_crole  =  "UPDATE `kms_plan_crole` SET `kms_plan_crole_des` = '".$Plan_Role_desc."',`kms_plan_crole_rank1` = ".$Plan_Role_rank1.",`kms_plan_crole_rank2` = ".$Plan_Role_rank2.",`kms_plan_crole_rank3` = ".$Plan_Role_rank3.",`kms_plan_crole_rank4` = ".$Plan_Role_rank5.",`kms_plan_crole_skill` = '".$Plan_Role_skill."'
                           WHERE `kms_plan_crole`.`emp_data_id` = ".$kms_emp_id."";
        $Update_crole2 =   $this->db->query($Update_crole);
        if(!$Update_crole2){ return 0; }else{ return 1;}
    }

    function Ajax_ViewPlans($kms_emp_id,$Plan_dep)
    {
         if($Plan_dep == 3 || $Plan_dep == 10)
        {
            $View_Plans    =   "SELECT `kms_plan_crole`. * , `kms_emp_data`.`emp_data_sname` , `kms_emp_data`.`emp_data_fname`
                                FROM `kms_plan_crole` , `kms_star_data` , `kms_emp_data`
                                WHERE `kms_plan_crole`.`emp_data_id` = `kms_star_data`.emp_data_id
                                AND `kms_emp_data`.`emp_data_id` = `kms_plan_crole`.`emp_data_id`
                                AND `kms_star_data`.kms_department_id =9 
                                AND `kms_plan_crole_status` =1";
            $View_Plans2   =    $this->db->query($View_Plans)->result_array();
       }
        else
        {
            $View_Plans    =   "SELECT `kms_plan_crole`. * , `kms_emp_data`.`emp_data_sname` , `kms_emp_data`.`emp_data_fname`
                                FROM `kms_plan_crole` , `kms_star_data` , `kms_emp_data`
                                WHERE `kms_plan_crole`.`emp_data_id` = `kms_star_data`.`emp_data_id`
                                AND `kms_emp_data`.`emp_data_id` = `kms_plan_crole`.`emp_data_id`
                                AND `kms_star_data`.kms_department_id = ".$Plan_dep."
                                AND `kms_plan_crole_status` = 1";
            $View_Plans2   =    $this->db->query($View_Plans)->result_array();                    
        }
       
        
        return $View_Plans2;
    }

    function Ajax_CountPlans($Plan_dep)
    {
        if($Plan_dep == 3 )
        {
            $Count_Plans    =  "SELECT COUNT( * ) AS `N` , T3.`emp_data_sname` , T3.`emp_data_fname` , T1.`emp_data_id`
                                FROM `kms_plan_crole` AS T1, `kms_star_data` AS T2, `kms_emp_data` AS T3
                                WHERE T1.`emp_data_id` = T2.`emp_data_id`
                                AND T3.`emp_data_id` = T1.`emp_data_id`
                                AND T2.kms_department_id = 9
                                AND T1.`kms_plan_crole_status` =1";
            $Count_Plans2   =   $this->db->query($Count_Plans)->result_array();
       }
        else
        {
            $Count_Plans    =  "SELECT COUNT( * ) AS `N` , T3.`emp_data_sname` , T3.`emp_data_fname` , T1.`emp_data_id`
                                FROM `kms_plan_crole` AS T1, `kms_star_data` AS T2, `kms_emp_data` AS T3
                                WHERE T1.`emp_data_id` = T2.`emp_data_id`
                                AND T3.`emp_data_id` = T1.`emp_data_id`
                                AND T2.kms_department_id = ".$Plan_dep."
                                AND T1.`kms_plan_crole_status` =1";
            $Count_Plans2   =   $this->db->query($Count_Plans)->result_array();                    
        }
       
        
        return $Count_Plans2; 
    }

    function Ajax_ViewHRCRole($Plan_Emp_id)
    {
        $View_EmpRoles   =   "SELECT * FROM `kms_plan_crole` WHERE `emp_data_id` = ".$Plan_Emp_id." AND `kms_plan_crole_status` = 1 LIMIT 10";
        $View_EmpRoles2  =   $this->db->query($View_EmpRoles)->result_array();
        return $View_EmpRoles2;
    }


}

?>