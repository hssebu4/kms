<?php 
class add_employee extends CI_Model
{
    function save_new_employee($Emp_fname,$Emp_sname,$Emp_gender,$Emp_residence,$Emp_dbirth)
     {
         //the query for inserting data into the database
         $save_employee_query = "INSERT INTO kms_emp_data (emp_data_sname,emp_data_fname,emp_data_gender,emp_data_residence,emp_data_birth_place)
                                 VALUE(".$this->db->escape($Emp_fname).",".$this->db->escape($Emp_sname).",".$this->db->escape($Emp_gender).",
                                       ".$this->db->escape($Emp_residence).",".$this->db->escape($Emp_dbirth).")";
        $this->db->query($save_employee_query);

        $SaveQueryResult = $this->db->affected_rows();

        return $SaveQueryResult;
 
      
     }

     function Fetch_all_Employee()
     {
         $Fetch_select_query = "SELECT * FROM kms_emp_data WHERE emp_data_status = ?";
         $FetchEmplyee_results = $this->db->query($Fetch_select_query, 1);
         
         if ( ! $this->db->query($Fetch_select_query, 1))
         {
                 $error = $this->db->error(); // Has keys 'code' and 'message'
                 return $error;
         }else
         {
            return $FetchEmplyee_results;
         }
     }

     function Fetch_all_Employee_names_only()
     {
         $Fetch_select_query = "SELECT emp_data_fname,emp_data_sname,emp_data_id FROM kms_emp_data WHERE emp_data_status = 1 ";
         $FetchEmplyee_results = $this->db->query($Fetch_select_query);
         
         if ( ! $this->db->query($Fetch_select_query, 1))
         {
                 $error = $this->db->error(); // Has keys 'code' and 'message'
                 return $error;
         }else
         {
            return $FetchEmplyee_results;
         }
     }

     function Fetch_Employee_details($Emp_id)
     {
         $Fetch_select_query = "SELECT kms_department.kms_department_description,kms_emp_data.emp_data_sname,kms_emp_data.emp_data_fname,kms_emp_phone.kms_emp_phone_number
                                FROM kms_emp_data,kms_emp_phone,kms_department,kms_star_data
                                WHERE kms_emp_data.emp_data_status = 1 AND kms_emp_data.emp_data_id = ? 
                                AND kms_emp_phone.emp_data_id = kms_emp_data.emp_data_id
                                AND kms_department.kms_department_id = kms_star_data.kms_department_id
                                AND kms_star_data.emp_data_id = kms_emp_data.emp_data_id
                                ";
         $FetchEmplyee_results = $this->db->query($Fetch_select_query, $Emp_id)->result_array();
         
         if ( ! $this->db->query($Fetch_select_query, $Emp_id))
         {
                 $error = $this->db->error(); // Has keys 'code' and 'message'
                 return $error;
         }else
         {

        //Then obtain the employ email details
        $Fetch_select_query_email = "SELECT kms_emp_email_name
                                     FROM kms_emp_email
                                     WHERE kms_emp_email.kms_emp_emai_status  = 1 AND kms_emp_email.emp_data_id = ? 
                                    ";
        $FetchEmplyee_results2 = $this->db->query($Fetch_select_query_email,$Emp_id)->result_array();
        foreach ($FetchEmplyee_results2 as $Email_dt)
         { $this->session->set_userdata('kms_emp_email_name',$Email_dt['kms_emp_email_name']); }
         
            
         
         
        /**SELECT kms_department . kms_department_description
FROM kms_department, kms_star_data
WHERE kms_department.kms_department_id = kms_star_data.kms_department_id
AND kms_star_data.emp_data_id =1 */ 
         return $FetchEmplyee_results;
           
         }
     }

     function Fetch_dep_Employee($Dept_id)
     {
            $Fetch_Fetch_dep_employee = "SELECT kms_emp_phone.kms_emp_phone_number, kms_emp_data.emp_data_id, kms_emp_dates.kms_emp_dates_dob, kms_emp_dates.kms_emp_dates_doj, kms_emp_data.emp_data_sname, kms_emp_data.emp_data_fname, kms_emp_data.emp_data_gender
                                            FROM kms_emp_data, kms_star_data, kms_emp_phone, kms_emp_dates
                                            WHERE kms_emp_data.emp_data_status =1
                                            AND kms_star_data.emp_data_id = kms_emp_data.emp_data_id
                                            AND kms_star_data.kms_department_id =?
                                            AND kms_emp_phone.emp_data_id = kms_emp_data.emp_data_id
                                            AND kms_emp_dates.kms_emp_id = kms_emp_data.emp_data_id";
            $Fetch_employee_results   = $this->db->query($Fetch_Fetch_dep_employee,$Dept_id)->result_array();
            
            return $Fetch_employee_results;
           // echo $Dept_id."-db".sizeof($Fetch_employee_results);
           // exit();
     }

     function Fetch_Employee_tel($Dept_id)
      {
            $Fetch_Fetch_tel_employee =    "SELECT kms_emp_data.emp_data_id,kms_emp_phone.kms_emp_phone_number,kms_emp_data.emp_data_id,kms_emp_dates.kms_emp_dates_dob,kms_emp_dates.kms_emp_dates_doj,kms_emp_data.emp_data_id,kms_emp_data.emp_data_sname,kms_emp_data.emp_data_fname,kms_emp_data.emp_data_gender
                                            FROM kms_emp_data, kms_star_data, kms_emp_phone,kms_emp_dates
                                            WHERE kms_emp_data.emp_data_status =1
                                            AND kms_star_data.emp_data_id = kms_emp_data.emp_data_id
                                            AND kms_star_data.kms_department_id =?
                                            AND kms_emp_phone.emp_data_id = kms_emp_data.emp_data_id
                                            AND kms_emp_dates.kms_emp_id = kms_emp_data.emp_data_id
                                            ";

            $Fetch_emp_Tel_results   = $this->db->query($Fetch_Fetch_tel_employee,$Dept_id)->result_array();
            return $Fetch_emp_Tel_results;
      }

     
/*SELECT kms_emp_dates.kms_emp_dates_id, kms_emp_dates.kms_emp_id, kms_emp_dates.kms_emp_dates_dob, kms_emp_data.emp_data_sname
FROM kms_emp_dates, kms_emp_data
WHERE MONTH( kms_emp_dates.kms_emp_dates_dob ) = MONTH( CURRENT_DATE( ) )
AND kms_emp_data.emp_data_id = kms_emp_dates.kms_emp_id */
      
}

?>