<?php 
class Projects extends CI_Model
{
  function Fetch_Projects_details()
            {
                $kms_deptid = $this->session->userdata('kms_access_user_dept_id');
                $kms_userid = $this->session->userdata('kms_emp_id');
                $kms_useraccess_level = $this->session->userdata('kms_access_user_level');

                
                $Fetch_select_query = "SELECT kms_projects.* FROM kms_projects_link,kms_projects
                                        WHERE kms_projects_link.emp_data_id = ".$kms_userid."
                                        AND kms_projects_link.kms_project_link_status = 1
                                        AND  kms_projects.kms_project_id = kms_projects_link.kms_project_id 
                                       ";
        
                $Fetch_FChat_results = $this->db->query($Fetch_select_query);
                 
                 if ( ! $Fetch_FChat_results)
                 {
                          $error = $this->db->error(); // Has keys 'code' and 'message'
                          return $error;
                 }else
                 {
                    return $Fetch_FChat_results;
                 }
            }

    function Fetch_Project_name($project_id)
      {
                $Fetch_select_query = "SELECT kms_project_detail
                                        FROM kms_projects
                                        WHERE kms_project_id =".$project_id."
                                      ";

                $Fetch_FChat_results = $this->db->query($Fetch_select_query);

                return $Fetch_FChat_results;

      }

   function Fetch_all_Projects()
       {
              $Fetch_select_query = "SELECT kms_project_detail,kms_project_id
                                    FROM kms_projects
                                    WHERE kms_project_status =1
                                                            ";

              $Fetch_FChat_results = $this->db->query($Fetch_select_query);

              return $Fetch_FChat_results;
       }

  function Fetch_all_uploadProjectfile($Project_id)
        {
            $Fetch_select_query = "SELECT kms_upload_share. * , kms_upload.kms_upload_location, kms_upload.kms_upload_format, kms_upload.kms_upload_size, kms_upload.kms_upload_details, kms_emp_data.emp_data_sname
                                    FROM kms_upload_share, kms_upload, kms_emp_data
                                    WHERE kms_upload_share.kms_upload_share_project_id =".$Project_id."
                                    AND kms_upload.kms_upload_id = kms_upload_share.kms_upload_id
                                    AND kms_emp_data.emp_data_id = kms_upload_share.kms_uploader_share_id";
             $Fetch_project_fille_results = $this->db->query($Fetch_select_query);
             return $Fetch_project_fille_results;

        }
}