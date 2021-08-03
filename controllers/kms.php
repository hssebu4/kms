<?php 
error_reporting(0);
class Kms extends CI_Controller {

    public function __construct()
    {
    //call CodeIgniter's default Constructor
    parent::__construct(); 
    
    //load database libray manually
    $this->load->database();
    $this->load->model('Chat');
    $this->load->model('Kms_upload_model');
    $this->load->model('add_employee');

    date_default_timezone_set("Africa/Kampala");

     //Load session library 
     $this->load->helper('url');
     $this->load->library('session');
     $this->load->library('upload');
    
    }

    public function index()
	{  
        
       
        
        if($this->session->userdata('kms_access_status') == 1){
              //The view data to be used
            $data['Home_tab_title'] = "KMS | Finance";
            $data['Side_menu_title'] = "KMS - Finance";
            $data['Dept_name'] = "Finance";
            //The menu items on the I.T home side
            $data['Menu_item_00'] = "Communicate";
            $data['Menu_item_04'] = "Documents";

           //The submenu item for I.T home side
            $data['Menu_item_00_01'] = "Chat Forum";
           
            //The submenu item for i.t document side
            $data['Menu_item_04_01'] = "My Files";
            $data['Menu_item_04_02'] = "Inbox - Files";
            $data['Menu_item_04_03'] = "Files Hub ";

            
            //Load session library 
            //$this->load->library('session');
            //$this->load->helper('url');
            
            $this->load->view('kms_home',$data);
           
        }else{
   
              $this->load->helper('url');
              redirect('/');
        }
        

        }

        public function Finance($view_id)//This is the index function for the finance department
             {
              
               
                if($this->session->userdata('kms_access_status') == 1){
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Finance";
                  $data['Side_menu_title'] = "KMS - Finance";
                  $data['Dept_name'] = "Finance";
                  //The menu items on the I.T home side
                  $data['Menu_item_00'] = "Communicate";
                  $data['Menu_item_04'] = "Documents";
      
                 //The submenu item for I.T home side
                  $data['Menu_item_00_01'] = "Chat Forum";
                 
                  //The submenu item for i.t document side
                  $data['Menu_item_04_01'] = "My Files";
                  $data['Menu_item_04_02'] = "Inbox - Files";
                  $data['Menu_item_04_03'] = "Files Hub ";

                   //The forum menu as per department 
                  $data['Menu_item_00_01_01'] = "Management";
                  $data['Menu_item_00_01_02'] = "Administration";
                  $data['Menu_item_00_01_04'] = "Commercial";
                  $data['Menu_item_00_01_08'] = "Design";
                  $data['Menu_item_00_01_03'] = "Finance";
                  $data['Menu_item_00_01_07'] = "Maintenance";
                  $data['Menu_item_00_01_05'] = "Production";
                  $data['Menu_item_00_01_06'] = "Supply Chain";
                  $data['Menu_item_00_01_09'] = "I.T";
      
                  
                     //Load session library 
                    $this->load->library('session');
                    //$this->load->helper('url');
                    //Obtain the current employee in the dataset
                    $Fetch_FChat_Result = $this->Chat->fetch_fchat_message();
                    $data['Fetch_Forum_Chat_results'] = $Fetch_FChat_Result->result_array();
                    $data['View'] = $view_id;

                    foreach ($Fetch_FChat_Result->result_array() as $row)
                        {
                            
                            if($row['kms_forum'] == 8) 
                            {
                            $data['DS']  = $row['kms_fchats']; 
                            

                            }
                            else if($row['kms_forum'] == 7)
                            { 
                                $data['MT']  = $row['kms_fchats'];       
                            }else if($row['kms_forum'] == 6)
                            {
                                $data['SC']  = $row['kms_fchats']; 
                            }
                            else if($row['kms_forum'] == 5)
                            {
                                $data['PD']  = $row['kms_fchats']; 
                            }
                            else if($row['kms_forum'] == 4)
                            {
                                $data['CM']  = $row['kms_fchats']; 
                            }
                            else if($row['kms_forum'] == 3)
                            {
                                $data['FC']  = $row['kms_fchats']; 
                            }
                            else if($row['kms_forum'] == 2)
                            {
                                $data['AD']  = $row['kms_fchats']; 
                            }
                            else if($row['kms_forum'] == 1)
                            {
                                $data['GN']  = $row['kms_fchats']; 
                            }
                            else if($row['kms_forum'] == 9)
                            {
                                $data['IT']  = $row['kms_fchats']; 
                            }
                            else
                            {
                                $data['IT']  = 0;  $data['MT']  = 0; $data['SC'] = 0; $data['PD'] = 0; $data['CM'] = 0;$data['FC'] = 0;$data['AD'] = 0;$data['GN']  = 0;$data['DS']  = 0;
                            }

                        }
                  if(isset($view_id) && ($view_id == 4541))
                        {
                        $this->session->set_userdata('View_detail','Chat Forum');
                               
                        }
                 else if(isset($view_id) && ($view_id == 4542))
                        {
                        $this->session->set_userdata('View_detail','File Directory');
                        $data['View'] = $view_id;
                        if($this->session->userdata('kms_access_status') == 1){
                                    
                                                    //The view data to be used
                            $data['Home_tab_title'] = "KMS | Finance";
                            $data['Side_menu_title'] = "KMS - Finance";
                            $data['Dept_name'] = "Finance";
                            //The menu items on the I.T home side
                            $data['Menu_item_00'] = "Communicate";
                            $data['Menu_item_04'] = "Documents";
                
                            //The submenu item for I.T home side
                            $data['Menu_item_00_01'] = "Chat Forum";
                            
                            //The submenu item for i.t document side
                            $data['Menu_item_04_01'] = "My Files";
                            $data['Menu_item_04_02'] = "Inbox - Files";
                            $data['Menu_item_04_03'] = "Files Hub ";

                            //The forum menu as per department 
                            $data['Menu_item_00_01_01'] = "Management";
                            $data['Menu_item_00_01_02'] = "Administration";
                            $data['Menu_item_00_01_04'] = "Commercial";
                            $data['Menu_item_00_01_08'] = "Design";
                            $data['Menu_item_00_01_03'] = "Finance";
                            $data['Menu_item_00_01_07'] = "Maintenance";
                            $data['Menu_item_00_01_05'] = "Production";
                            $data['Menu_item_00_01_06'] = "Supply Chain";
                            $data['Menu_item_00_01_09'] = "I.T";

                                        //Load session library 
                                        //$this->load->library('session');
                            $this->load->helper('url');
                            $this->session->set_userdata('side_menu_dept2',$this->session->userdata('kms_emp_department'));

                                        //Then we uploaded files on the server
                                        $Kms_uploadedfiles =$this->Kms_upload_model->Fetch_all_uploadfile_byuser($this->session->userdata('kms_emp_id'));
                                        //This load the personal uploaded files
                                        $data['Kms_userupload_results'] = $Kms_uploadedfiles->result_array();

                                        //The we obtain the employee list to be used in the drop down select. 
                                        $Kms_empolyee_list_names_only = $this->add_employee->Fetch_all_Employee_names_only();
                                        $data['kms_emp_list_names_only'] = $Kms_empolyee_list_names_only->result_array();
                                        $this->session->set_userdata('kms_emp_list_names_only_session',$Kms_empolyee_list_names_only->result_array());

                                    

                                        $this->load->helper('url');
                                       // $this->load->view('kms_home',$data);
                                    }else{
                                    
                                        $this->load->helper('url');
                                        redirect('/');
                                        }
                             

                        }
                else if(isset($view_id) && ($view_id == 4543))
                        {
                        $this->session->set_userdata('View_detail','File Inbox');
                        $data['View'] = $view_id;
                        }
                else if(isset($view_id) && ($view_id == 4544))
                        {
                        $this->session->set_userdata('View_detail','File Hub');
                        $data['View'] = $view_id;
                        }
                else if(isset($view_id) && ($view_id <= 9))
                        {
                        $this->session->set_userdata('View_detail','Administration');
                        if($view_id == 1){ $data['Forum_selected'] = 'Management';}
                        else if($view_id == 2){ $data['Forum_selected'] = 'Administration';}
                        else if($view_id == 3){ $data['Forum_selected'] = 'Finance';}
                        else if($view_id == 4){ $data['Forum_selected'] = 'Commercial';}
                        else if($view_id == 5){ $data['Forum_selected'] = 'Production';}
                        else if($view_id == 6){ $data['Forum_selected'] = 'Supply Chain';}
                        else if($view_id == 7){ $data['Forum_selected'] = 'Maintenance';}
                        else if($view_id == 8){ $data['Forum_selected'] = 'Design & Development';}
                        else if($view_id == 9){ $data['Forum_selected'] = 'I.T';}
                        $data['View'] = $view_id;
                        $data['Forum_id']  = $view_id;
                        //Then we obtain the forum chats as per the selected forum
                        $kms_user_id  = $this->session->userdata('kms_emp_id');
                        $Fetch_Forum_Result3 = $this->Chat->fetch_forum_message($view_id,$kms_user_id);
                        $data['Fetch_forum_chats_results'] = $Fetch_Forum_Result3->result_array();
                        
                        }
                  
                   $this->load->helper('url');
                   $this->load->view('kms_home',$data);


                 
                 
              }else{
         
                    $this->load->helper('url');
                    redirect('/');
              }
             
             }

                 //The function for add chat forum message from the admins as below
    public function AddForumChat()
    { 
       
      if($this->session->userdata('kms_access_status') == 1){
         //Load session library 
         $this->load->library('session');
         $this->load->helper('url');

         //This to get the forum chat message from the forum single chat
         $kms_single_forum_chart_msg = $this->input->post("kms_forum_single_chat_message");
         if(isset($kms_single_forum_chart_msg) && $kms_single_forum_chart_msg != "")
         {
         
          $kms_single_forum_chart_rec_forum  = $this->input->post("kms_forum_single_chat_rec_forum");
          $Input_fchat_sender_id = $this->session->userdata('kms_emp_id');
          $Input_fchat_time = date("h:i:sa");
          $Input_fchat_date = date("Y/m/d");

          //Transfering data to Model
          $SaveQueryResult = $this->Chat->send_fchat_message($kms_single_forum_chart_rec_forum,"KMS",$kms_single_forum_chart_msg,$Input_fchat_time,$Input_fchat_date,$Input_fchat_sender_id);
          //add flash data Administration/Forum/5
          //redirect('kms/'.$this->session->userdata('kms_emp_department').'/'.$kms_single_forum_chart_rec_forum.'');        
          redirect('kms/'.$this->session->userdata('kms_emp_department').'/'.$kms_single_forum_chart_rec_forum.'/'.$kms_single_forum_chart_rec_forum);    
          }
          else{
         //Obtaining the form data from the new employ form as below
         $Input_fchat_Forum = $this->input->post('kms_input_fchat_forum');
         $Input_fchat_Topic = $this->input->post('kms_input_fchat_topic');
         $Input_fchat_Message = $this->input->post('kms_input_fchat_message');
         $Input_fchat_Forum2 = $this->input->post('Kms_input_hidden_forum');
         $Input_fchat_time = date("h:i:sa");
         $Input_fchat_date = date("Y/m/d");
         $Input_fchat_sender_id = $this->session->userdata('kms_emp_id');

         //Transfering data to Model
         $SaveQueryResult = $this->Chat->send_fchat_message($Input_fchat_Forum2,$Input_fchat_Topic,$Input_fchat_Message,$Input_fchat_time,$Input_fchat_date,$Input_fchat_sender_id);
        //echo $Input_fchat_Forum2;

        if($SaveQueryResult != 0)
         {
           //Define the alert message
          $data2['Emp_save_success'] = 1;
          $data2['Emp_save_message'] = "Your Forum message has been successfully sent!!!";
          
          //add flash data 
          $this->session->set_flashdata('notice',$data2); 

          //add flash data 
          redirect('kms/'.$this->session->userdata('kms_emp_department').'/'.$Input_fchat_Forum2);

         }else
         {
          $data['Emp_save_success'] = "0";
          $data['Emp_save_message'] = "Your Forum message has not been sent";
          
          //add flash data 
          $this->session->set_flashdata('notice',$data2); 

          //add flash data 
          redirect('kms/'.$this->session->userdata('kms_emp_department').'/'.$Input_fchat_Forum2);
         }

        }
      }else{
    
        $this->load->helper('url');
        redirect('/');
          }

    }
    public function File_directory()
    {
        $this->session->set_userdata('View_detail','File Directory');
       
        if($this->session->userdata('kms_access_status') == 1){
                    
                        //The view data to be used
                        $data['Home_tab_title'] = "KMS | Finance";
                        $data['Side_menu_title'] = "KMS - Finance";
                        $data['Dept_name'] = "Finance";
                        //The menu items on the I.T home side
                        $data['Menu_item_00'] = "Communicate";
                        $data['Menu_item_04'] = "Documents";

                        //The submenu item for I.T home side
                        $data['Menu_item_00_01'] = "Chat Forum";
                        
                        //The submenu item for i.t document side
                        $data['Menu_item_04_01'] = "My Files";
                        $data['Menu_item_04_02'] = "Inbox - Files";
                        $data['Menu_item_04_03'] = "Files Hub ";

                        //The forum menu as per department 
                        $data['Menu_item_00_01_01'] = "Management";
                        $data['Menu_item_00_01_02'] = "Administration";
                        $data['Menu_item_00_01_04'] = "Commercial";
                        $data['Menu_item_00_01_08'] = "Design";
                        $data['Menu_item_00_01_03'] = "Finance";
                        $data['Menu_item_00_01_07'] = "Maintenance";
                        $data['Menu_item_00_01_05'] = "Production";
                        $data['Menu_item_00_01_06'] = "Supply Chain";
                        $data['Menu_item_00_01_09'] = "I.T";

                        
                        $this->load->helper('url');
                        $this->session->set_userdata('side_menu_dept2',$this->session->userdata('kms_emp_department'));

                        //Then we uploaded files on the server
                        $Kms_uploadedfiles =$this->Kms_upload_model->Fetch_all_uploadfile_byuser($this->session->userdata('kms_emp_id'));
                        //This load the personal uploaded files
                        $data['Kms_userupload_results'] = $Kms_uploadedfiles->result_array();

                        //The we obtain the employee list to be used in the drop down select. 
                        $Kms_empolyee_list_names_only = $this->add_employee->Fetch_all_Employee_names_only();
                        $data['kms_emp_list_names_only'] = $Kms_empolyee_list_names_only->result_array();
                        $this->session->set_userdata('kms_emp_list_names_only_session',$Kms_empolyee_list_names_only->result_array());
                        $this->load->helper('url');
                        $this->load->view('kms_file_open',$data);
                    }else{
                    
                        $this->load->helper('url');
                        redirect('/');
                        }
             
    }
    public function File_UploadPersonal_Technology()
    {
      if($this->session->userdata('kms_access_status') == 1){
       
                        //The view data to be used
                        $data['Home_tab_title'] = "KMS | I.T | Forum";
                        $data['Side_menu_title'] = "KMS- I.T";
                        //The menu items on the I.T home side
                        $data['Menu_item_00'] = "Communicate";
                        $data['Menu_item_04'] = "Documents";
                  
                        //The submenu item for I.T home side
                        $data['Menu_item_00_01'] = "Chat Forum";
                        $data['Menu_item_00_02'] = "News";
                        $data['Menu_item_00_03'] = "Mail";
                  
                        //The chat forum departs as from the databsae modal as below
                        $data['Menu_item_00_01_00'] = "Management";
                        $data['Menu_item_00_01_01'] = "Administration";
                        $data['Menu_item_00_01_02'] = "Commercial";
                        $data['Menu_item_00_01_03'] = "Design";
                        $data['Menu_item_00_01_04'] = "Fianance";
                        $data['Menu_item_00_01_05'] = "Maintenance";
                        $data['Menu_item_00_01_06'] = "Production";
                        $data['Menu_item_00_01_07'] = "Supply Chain";
                        $data['Menu_item_00_01_09'] = "I.T";
                  
                        //The submenu item for i.t document side
                        $data['Menu_item_04_01'] = "My Files";
                        $data['Menu_item_04_02'] = "Inbox - Files";
                        $data['Menu_item_04_03'] = "Files Hub ";
                  
                        $errors= array();
                        $file_name = $_FILES['kms_tech_uploadfile']['name'];
                        $file_size = $_FILES['kms_tech_uploadfile']['size'];
                        $file_tmp = $_FILES['kms_tech_uploadfile']['tmp_name'];
                        $file_type = $_FILES['kms_tech_uploadfile']['type'];
                        $file_ext1 = explode('.',$file_name);
                        $file_ext2 = end($file_ext1);
                        $file_ext = strtolower($file_ext2);
                        $file_mod_date = date("F d Y H:i:s.", filemtime($file_tmp));
                  
                        $expensions= array("jpeg","jpg","png","pdf","gz","rar","doc","docx","dot","ppt","pptx","xlsx","xls","zip");
             
        if(in_array($file_ext,$expensions) === false){
              $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }
            
        if($file_size > 104857600) {
              $errors[]='File size must be excately 10 MB';
            }
  
            if(empty($errors)==true) {
              //$this->load->helper('url');
              
              $Uploaded_status = move_uploaded_file($file_tmp,"uploads/documents/".str_replace(' ','-',$file_name));
  
                if($Uploaded_status == true)
                {
                    //This displays a message when the upload was successfully done
   
                    //Then we pass on the details for the uploaed file to the model for database records as below
                    $kms_user_id  = $this->session->userdata('kms_emp_id');
                    $kms_uploaded_file = $file_name;
                    $kms_upload_location = "/uploads/documents/";
                    $kms_upload_date = date("Y/m/d");
  
                    //Determin the file extension for the uploaded file
                    if($file_ext == "jpeg"){ $kms_file_format = 1;}
                    else if($file_ext == "jpg"){ $kms_file_format = 2;}
                    else if($file_ext == "png"){ $kms_file_format = 3;}
                    else if($file_ext == "pdf"){ $kms_file_format = 4;}
                    else if($file_ext == "doc"){ $kms_file_format = 5;}
                    else if($file_ext == "docx"){ $kms_file_format = 6;}
                    else if($file_ext == "dot"){ $kms_file_format = 7;}
                    else if($file_ext == "ppt"){ $kms_file_format = 8;}
                    else if($file_ext == "pptx"){ $kms_file_format = 9;}
                    else if($file_ext == "xlsx"){ $kms_file_format = 10;}
                    else if($file_ext == "xls"){ $kms_file_format = 11;}
                    else if($file_ext == "zip"){ $kms_file_format = 12;}
                    else { $kms_file_format = 0;}
                    function formatSizeUnits($bytes)
                    {
                        if ($bytes >= 1073741824)
                        {
                            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
                        }
                        elseif ($bytes >= 1048576)
                        {
                            $bytes = number_format($bytes / 1048576, 2) . ' MB';
                        }
                        elseif ($bytes >= 1024)
                        {
                            $bytes = number_format($bytes / 1024, 2) . ' KB';
                        }
                        elseif ($bytes > 1)
                        {
                            $bytes = $bytes . ' bytes';
                        }
                        elseif ($bytes == 1)
                        {
                            $bytes = $bytes . ' byte';
                        }
                        else
                        {
                            $bytes = '0 bytes';
                        }
                
                        return $bytes;
                }
                            $Kms_file_upload_result = $this->Kms_upload_model->Upload_File($kms_user_id,$kms_uploaded_file,$kms_upload_location,$kms_upload_date,$kms_file_format,formatSizeUnits($file_size));
                    
                            if($Kms_file_upload_result != 0)
                            {
                                      //Define the alert message
                                    $data2['kms_doc_upload_success'] = 1;
                                    $data2['kms_doc_upload_message'] = "Your document has been successfully uploaded.";
                                    
                                    //add flash data 
                                    $this->session->set_flashdata('notice',$data2); 
                        
                                    //Then we uploaded files on the server
                                    $Kms_uploadedfiles =$this->Kms_upload_model->Fetch_all_uploadfile_byuser($this->session->userdata('kms_emp_id'));
                                    $data['Kms_userupload_results'] = $Kms_uploadedfiles->result_array();
                                    $this->load->helper('url');
                                  
                                   redirect('kms/File_directory');
                               
                            }else if($Kms_file_upload_result == 0)
                            {
                                    //This displays a message when the upload was not done
                                    //Define the alert message
                                    $data2['kms_doc_upload_success'] = 0;
                                    $data2['kms_doc_upload_message'] = "DATABASE STORAGE FAILED";
                                    
                                    //add flash data 
                                    $this->session->set_flashdata('notice',$data2); 
  
                                    //Then we uploaded files on the server
                                    $Kms_uploadedfiles =$this->Kms_upload_model->Fetch_all_uploadfile_byuser($this->session->userdata('kms_emp_id'));
                                    $data['Kms_userupload_results'] = $Kms_uploadedfiles->result_array();
                                    $this->load->helper('url');
                                    //echo "New from the administration section";
                                    redirect('kms/File_directory');
                            }
  
                   
                }else
                {
                    //This displays a message when the upload was not done
                    //Define the alert message
                    $data2['kms_doc_upload_success'] = 0;
                    $data2['kms_doc_upload_message'] = "Your document NOT been uploaded.";
                    
                    //add flash data 
                    $this->session->set_flashdata('notice',$data2); 
  
                    //Then we uploaded files on the server
                    $Kms_uploadedfiles =$this->Kms_upload_model->Fetch_all_uploadfile_byuser($this->session->userdata('kms_emp_id'));
                    $data['Kms_userupload_results'] = $Kms_uploadedfiles->result_array();
                    $this->load->helper('url');
                    //echo "New from the technology section";
                    redirect('kms/File_directory');
                }
            
             
  
            }else{ 
                  //This displays a message when the upload was not done
                  //Define the alert message
                  $data2['kms_doc_upload_success'] = 0;
                  $data2['kms_doc_upload_message'] = "Your document format is not Valid";
                  
                  //add flash data 
                  $this->session->set_flashdata('notice',$data2); 
  
                  //Then we uploaded files on the server
                  $Kms_uploadedfiles =$this->Kms_upload_model->Fetch_all_uploadfile_byuser($this->session->userdata('kms_emp_id'));
                  $data['Kms_userupload_results'] = $Kms_uploadedfiles->result_array();
                  $this->load->helper('url');
                  //echo "New from the administration section";
                  redirect('kms/File_directory');
            }
         
  
  
        }else{
      
          $this->load->helper('url');
          redirect('/');
            }
   
    }  
    
    public function Personal_file_share()
    {
  if($this->session->userdata('kms_access_status') == 1){
      $this->load->helper('url');
  
      $this->load->library('upload');   
                  $data['Home_tab_title'] = "KMS | Finance";
                  $data['Side_menu_title'] = "KMS - Finance";
                  $data['Dept_name'] = "Finance";
                  //The menu items on the I.T home side
                  $data['Menu_item_00'] = "Communicate";
                  $data['Menu_item_04'] = "Documents";
      
                 //The submenu item for I.T home side
                  $data['Menu_item_00_01'] = "Chat Forum";
                 
                  //The submenu item for i.t document side
                  $data['Menu_item_04_01'] = "My Files";
                  $data['Menu_item_04_02'] = "Inbox - Files";
                  $data['Menu_item_04_03'] = "Files Hub ";

                   //The forum menu as per department 
                  $data['Menu_item_00_01_01'] = "Management";
                  $data['Menu_item_00_01_02'] = "Administration";
                  $data['Menu_item_00_01_04'] = "Commercial";
                  $data['Menu_item_00_01_08'] = "Design";
                  $data['Menu_item_00_01_03'] = "Finance";
                  $data['Menu_item_00_01_07'] = "Maintenance";
                  $data['Menu_item_00_01_05'] = "Production";
                  $data['Menu_item_00_01_06'] = "Supply Chain";
                  $data['Menu_item_00_01_09'] = "I.T";
  
      $kms_file_share_forum = $this->input->post("Kms_input_hidden_forum");
      $kms_file_share_recipt = $this->input->post("Kms_input_hidden_recip");
      $kms_file_share_text = $this->input->post("kms_input_file_share_message");
      $kms_file_share_id = $this->input->post("Kms_input_hidden_file_id");
      $Input_file_share_time = date("g:i A");//hh:mm:ss AM/PM
      $Input_file_share_date = date("Y/m/d");
      //explode(
      
  
      
  
      $Kms_file_share_result = $this->Kms_upload_model->Upload_File_share($this->session->userdata('kms_emp_id'),$kms_file_share_id,
                                                                          $Input_file_share_date,$Input_file_share_time,
                                                                          $kms_file_share_forum,$kms_file_share_recipt,
                                                                          $kms_file_share_text,$this->session->userdata('kms_access_user_dept_id'));
  
      //Then we uploaded files on the server
      $Kms_uploadedfiles =$this->Kms_upload_model->Fetch_all_uploadfile_byuser($this->session->userdata('kms_emp_id'));
        //This load the personal uploaded files
      $data['Kms_userupload_results'] = $Kms_uploadedfiles->result_array();
  
      //The we obtain the employee list to be used in the drop down select. 
      $Kms_empolyee_list_names_only = $this->add_employee->Fetch_all_Employee_names_only();
      $data['kms_emp_list_names_only'] = $Kms_empolyee_list_names_only->result_array();
      $this->session->set_userdata('kms_emp_list_names_only_session',$Kms_empolyee_list_names_only->result_array());
  
  
      //echo "New from the administration section";
      redirect('kms/File_directory');
    }else{
  
      $this->load->helper('url');
      redirect('/');
        } 
       
    }




    public function Dept_Directory($Dept_Id)
  {   
    if($this->session->userdata('kms_access_status') == 1){

      $data['Home_tab_title'] = "KMS | Finance";
      $data['Side_menu_title'] = "KMS - Finance";
      $data['Dept_name'] = "Finance";
      //The menu items on the I.T home side
      $data['Menu_item_00'] = "Communicate";
      $data['Menu_item_04'] = "Documents";

     //The submenu item for I.T home side
      $data['Menu_item_00_01'] = "Chat Forum";
     
      //The submenu item for i.t document side
      $data['Menu_item_04_01'] = "My Files";
      $data['Menu_item_04_02'] = "Inbox - Files";
      $data['Menu_item_04_03'] = "Files Hub ";

       //The forum menu as per department 
       $data['Menu_item_00_01_00'] = "Management";
       $data['Menu_item_00_01_01'] = "Administration";
       $data['Menu_item_00_01_02'] = "Commercial";
       $data['Menu_item_00_01_03'] = "Design";
       $data['Menu_item_00_01_04'] = "Fianance";
       $data['Menu_item_00_01_05'] = "Maintenance";
       $data['Menu_item_00_01_06'] = "Production";
       $data['Menu_item_00_01_07'] = "Supply Chain";
       $data['Menu_item_00_01_09'] = "I.T";

    $kms_userid = $this->session->userdata('kms_emp_id');
    $kms_deptid = $this->session->userdata('kms_access_user_dept_id');

      //Obtain the current employee in the dataset
     $Fetch_File_count_Result = $this->Kms_upload_model->Fetch_Count_department_files($kms_deptid,$kms_userid);

      // foreach ($Fetch_File_count_Result->result_array() as $row){}

       //Load session library 
       $this->load->helper('url');
       $this->session->set_userdata('side_menu_dept2',$this->session->userdata('kms_emp_department'));
      if(!isset($Dept_Id))
          {
            $this->load->view('file_directory_finance',$data);
          }else if(isset($Dept_Id))
          {
            $kms_userid = $this->session->userdata('kms_emp_id');
            $kms_user_deptid = $this->session->userdata('kms_access_user_dept_id');
            $Kms_file_department_id = $Dept_Id;
            $Kms_file_department_results = $this->Kms_upload_model->Fetch_department_files($Kms_file_department_id,$kms_userid,$kms_user_deptid);
            $data['dataset'] = $Kms_file_department_results->result_array();
    
            $this->session->set_userdata('side_menu_dept2','kms');
            $this->load->helper('url');
            $this->load->view('file_directory_finance',$data);
          }
      else{}
      }else{
        $this->load->helper('url');
        redirect('/');
          }
 
    }
    public function Fin_file_directory_dep($Dep_id)
    {
      if($this->session->userdata('kms_access_status') == 1){
  
      $data['Home_tab_title'] = "KMS | Finance";
      $data['Side_menu_title'] = "KMS - Finance";
      $data['Dept_name'] = "Finance";
      //The menu items on the I.T home side
      $data['Menu_item_00'] = "Communicate";
      $data['Menu_item_04'] = "Documents";

     //The submenu item for I.T home side
      $data['Menu_item_00_01'] = "Chat Forum";
     
      //The submenu item for i.t document side
      $data['Menu_item_04_01'] = "My Files";
      $data['Menu_item_04_02'] = "Inbox - Files";
      $data['Menu_item_04_03'] = "Files Hub ";

       //The forum menu as per department 
      $data['Menu_item_00_01_01'] = "Management";
      $data['Menu_item_00_01_02'] = "Administration";
      $data['Menu_item_00_01_04'] = "Commercial";
      $data['Menu_item_00_01_08'] = "Design";
      $data['Menu_item_00_01_03'] = "Finance";
      $data['Menu_item_00_01_07'] = "Maintenance";
      $data['Menu_item_00_01_05'] = "Production";
      $data['Menu_item_00_01_06'] = "Supply Chain";
      $data['Menu_item_00_01_09'] = "I.T";

      $kms_userid = $this->session->userdata('kms_emp_id');
      $kms_user_deptid = $this->session->userdata('kms_access_user_dept_id');
      $Kms_file_department_id = $Dep_id;
      //echo 'depselected->'.$Kms_file_department_id.' user id->'.$kms_userid.' user dep->'.$kms_user_deptid;
  
      
      $Kms_file_department_results = $this->Kms_upload_model->Fetch_department_files($Kms_file_department_id,$kms_userid,$kms_user_deptid);
      
      
      $data['dataset'] = $Kms_file_department_results->result_array();
        
      $this->session->set_userdata('side_menu_dept',$this->session->userdata('kms_emp_department'));
      $this->load->helper('url');
      //$this->load->view('file_directory_finance',$data);
     
          }else{
        $this->load->helper('url');
        redirect('/');
          }
    }
}

?>