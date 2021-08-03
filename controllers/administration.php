<?php
//error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
class Administration extends CI_Controller {

      public function __construct()
      {
      //call CodeIgniter's default Constructor
      parent::__construct(); 
      
      //load database libray manually
      $this->load->database();
      
      //load Model
      $this->load->model('add_employee');
      $this->load->model('Chat');
      $this->load->model('Kms_upload_model');
      
      date_default_timezone_set("Africa/Kampala");

       //Load session library 
       $this->load->library('session');
       $this->load->library('upload');
      
      }

    public function index()
	{  
    if($this->session->userdata('kms_access_status') == 1){
	      //The view data to be used
     	  $data['Home_tab_title'] = "KMS | Administration";
        $data['Side_menu_title'] = "KMS-Administration";
        //The menu items on the administrator home side
        $data['Menu_item_00'] = "Communicate";
        $data['Menu_item_01'] = "Employees";
        $data['Menu_item_02'] = "Training";
        $data['Menu_item_03'] = "Hire";
        $data['Menu_item_04'] = "Documents";

        //The employee sub menu list item
        $data['Menu_item_01_01'] = "Add employee";
        $data['Menu_item_01_02'] = "Employee List";

        //The submenu item for administrator home side
        $data['Menu_item_00_01'] = "Chat Forum";
        $data['Menu_item_00_02'] = "News";
        $data['Menu_item_00_03'] = "Mail";

         //The submenu item for administrator document side
         $data['Menu_item_04_01'] = "My Files";
         $data['Menu_item_04_02'] = "Inbox - File ";
         $data['Menu_item_04_03'] = "File Hub";

          //Load session library 
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->view('administration',$data);
        }else{
    
          $this->load->helper('url');
          redirect('/');
            }
		
		
	
}

    //The function that will handle the emailing section on the administration dept
  public function Admininstration_my_files()
  {
    if($this->session->userdata('kms_access_status') == 1){

      $this->load->library('upload');   
      //The view data to be used
        $data['Home_tab_title'] = "KMS | Admin | Files";
        $data['Side_menu_title'] = "KMS-Administration";

        //The menu items on the administrator home side
        $data['Menu_item_00'] = "Communicate";
        $data['Menu_item_01'] = "Employees";
        $data['Menu_item_02'] = "Training";
        $data['Menu_item_03'] = "Hire";
        $data['Menu_item_04'] = "Documents";

        //The employee sub menu list item
        $data['Menu_item_01_01'] = "Add employee";
        $data['Menu_item_01_02'] = "Employee List";

        //The submenu item for administrator home side
        $data['Menu_item_00_01'] = "Chat Forum";
        $data['Menu_item_00_02'] = "News";
        $data['Menu_item_00_03'] = "Mail";

         //The submenu item for administrator document side
         $data['Menu_item_04_01'] = "My Files";
         $data['Menu_item_04_02'] = "Inbox - File ";
         $data['Menu_item_04_03'] = "File Hub";

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

        //Load session library 
        $this->load->library('session'); 
        $this->load->helper('url');
        //Then we uploaded files on the server
        $Kms_uploadedfiles =$this->Kms_upload_model->Fetch_all_uploadfile_byuser($this->session->userdata('kms_emp_id'));
          //This load the personal uploaded files
        $data['Kms_userupload_results'] = $Kms_uploadedfiles->result_array();

        //The we obtain the employee list to be used in the drop down select. 
        $Kms_empolyee_list_names_only = $this->add_employee->Fetch_all_Employee_names_only();
        $data['kms_emp_list_names_only'] = $Kms_empolyee_list_names_only->result_array();
        $this->session->set_userdata('kms_emp_list_names_only_session',$Kms_empolyee_list_names_only->result_array());

       



        //echo "New from the administration section";
        $this->load->view('kms_admin_files',$data);
      }else{
    
        $this->load->helper('url');
        redirect('/');
          } 

  }
  //..............This is to handle sharing of file to forums and specific users............. 

    public function Personal_file_share()
        {
    if($this->session->userdata('kms_access_status') == 1){
          $this->load->helper('url');

          $this->load->library('upload');   
      //The view data to be used
        $data['Home_tab_title'] = "KMS | Admin | Files";
        $data['Side_menu_title'] = "KMS-Administration";

        //The menu items on the administrator home side
        $data['Menu_item_00'] = "Communicate";
        $data['Menu_item_01'] = "Employees";
        $data['Menu_item_02'] = "Training";
        $data['Menu_item_03'] = "Hire";
        $data['Menu_item_04'] = "Documents";

        //The employee sub menu list item
        $data['Menu_item_01_01'] = "Add employee";
        $data['Menu_item_01_02'] = "Employee List"; 

        //The submenu item for administrator home side
        $data['Menu_item_00_01'] = "Chat Forum";
        $data['Menu_item_00_02'] = "News";
        $data['Menu_item_00_03'] = "Mail";

         //The submenu item for administrator document side
         $data['Menu_item_04_01'] = "My Files";
         $data['Menu_item_04_02'] = "Inbox - File ";
         $data['Menu_item_04_03'] = "File Hub";

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
          $this->load->view('kms_admin_files',$data);
        }else{
    
          $this->load->helper('url');
          redirect('/');
            } 
           
        }
  ///----------------------------------------------------------------------------------------
  public function Personal_file_upload()
  { 
    $this->load->helper('url');
    $this->load->library('session');
    if($this->session->userdata('kms_access_status') == 1){

    if(isset($_FILES['kms_admin_uploadfile'])){

        //The model for storing the uploaded file details to the database
       
        //The view data to be used
        $data['Home_tab_title'] = "KMS | Admin | Files";
        $data['Side_menu_title'] = "KMS-Administration";
        //The menu items on the administrator home side
        $data['Menu_item_00'] = "Communicate";
        $data['Menu_item_01'] = "Employees";
        $data['Menu_item_02'] = "Training";
        $data['Menu_item_03'] = "Hire";
        $data['Menu_item_04'] = "Documents";
        //The employee sub menu list item
        $data['Menu_item_01_01'] = "Add employee";
        $data['Menu_item_01_02'] = "Employee List";
        //The submenu item for administrator home side
        $data['Menu_item_00_01'] = "Chat Forum";
        $data['Menu_item_00_02'] = "News";
        $data['Menu_item_00_03'] = "Mail";
        //The submenu item for administrator document side
        $data['Menu_item_04_01'] = "My Files";
         $data['Menu_item_04_02'] = "Inbox - File ";
         $data['Menu_item_04_03'] = "File Hub";

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


          $errors= array();
          $file_name = $_FILES['kms_admin_uploadfile']['name'];
          $file_size = $_FILES['kms_admin_uploadfile']['size'];
          $file_tmp = $_FILES['kms_admin_uploadfile']['tmp_name'];
          $file_type = $_FILES['kms_admin_uploadfile']['type'];
          $file_ext1 = explode('.',$file_name);
          $file_ext2 = end($file_ext1);
          $file_ext = strtolower($file_ext2);
          $file_mod_date = date("F d Y H:i:s.", filemtime($file_tmp));
          

         
          //date( "F d Y H:i:s.", getlastmod($file_name) )
          
          $expensions= array("jpeg","jpg","png","pdf","gz","rar","doc","docx","dot","ppt","pptx","xlsx","xls","zip");
           
          if(in_array($file_ext,$expensions) === false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
          }
          
          if($file_size > 1048576000) {
           
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
                      
                      
                                  //Load session library 
                                 // $this->load->library('session');
                                 // $this->load->helper('url');

                                //Then we uploaded files on the server
                                  $Kms_uploadedfiles =$this->Kms_upload_model->Fetch_all_uploadfile_byuser($this->session->userdata('kms_emp_id'));
                                  $data['Kms_userupload_results'] = $Kms_uploadedfiles->result_array();

                                  //echo "New from the administration section";
                                  $this->load->view('kms_admin_files',$data);
                          }else if($Kms_file_upload_result == 0)
                          {
                                    //This displays a message when the upload was not done
                                  //Define the alert message
                                  $data2['kms_doc_upload_success'] = 0;
                                  $data2['kms_doc_upload_message'] = "DATABASE STORAGE FAILED";
                                  
                                  //add flash data 
                                  $this->session->set_flashdata('notice',$data2); 


                                  //Load session library 
                                  //$this->load->library('session');
                                  //$this->load->helper('url');
                                  //Then we uploaded files on the server
                                  $Kms_uploadedfiles =$this->Kms_upload_model->Fetch_all_uploadfile_byuser($this->session->userdata('kms_emp_id'));
                                  $data['Kms_userupload_results'] = $Kms_uploadedfiles->result_array();

                                  //echo "New from the administration section";
                                  $this->load->view('kms_admin_files',$data);
                          }

                 
              }else
              {
                  //This displays a message when the upload was not done
                  //Define the alert message
                  $data2['kms_doc_upload_success'] = 0;
                  $data2['kms_doc_upload_message'] = "Your document NOT been uploaded.";
                  
                  //add flash data 
                  $this->session->set_flashdata('notice',$data2); 


                  //Load session library 
                  //$this->load->library('session');
                 // $this->load->helper('url');

                  //Then we uploaded files on the server
                  $Kms_uploadedfiles =$this->Kms_upload_model->Fetch_all_uploadfile_byuser($this->session->userdata('kms_emp_id'));
                  $data['Kms_userupload_results'] = $Kms_uploadedfiles->result_array();

                  //echo "New from the administration section";
                  $this->load->view('kms_admin_files',$data);
              }
          
           

          }else{
                //This displays a message when the upload was not done
                //Define the alert message
                $data2['kms_doc_upload_success'] = 0;
                $data2['kms_doc_upload_message'] = "Your document format is not Valid";
                
                //add flash data 
                $this->session->set_flashdata('notice',$data2); 


                //Load session library 
                //$this->load->library('session');
               // $this->load->helper('url');

                //Then we uploaded files on the server
                $Kms_uploadedfiles =$this->Kms_upload_model->Fetch_all_uploadfile_byuser($this->session->userdata('kms_emp_id'));
                $data['Kms_userupload_results'] = $Kms_uploadedfiles->result_array();

                //echo "New from the administration section";
                $this->load->view('kms_admin_files',$data);
          }
          
          
        }else
        {
          echo "Upload null";
        }
      }else{
    
        $this->load->helper('url');
        redirect('/');
      }

  }
  //The function that will handle the news section on the administration dept
  public function File_Directory()
  {
    if($this->session->userdata('kms_access_status') == 1){
       //The model for storing the uploaded file details to the database
       
        //The view data to be used
        $data['Home_tab_title'] = "KMS | Admin | Files";
        $data['Side_menu_title'] = "KMS-Administration";
        //The menu items on the administrator home side
        $data['Menu_item_00'] = "Communicate";
        $data['Menu_item_01'] = "Employees";
        $data['Menu_item_02'] = "Training";
        $data['Menu_item_03'] = "Hire";
        $data['Menu_item_04'] = "Documents";
        //The employee sub menu list item
        $data['Menu_item_01_01'] = "Add employee";
        $data['Menu_item_01_02'] = "Employee List";
        //The submenu item for administrator home side
        $data['Menu_item_00_01'] = "Chat Forum";
        $data['Menu_item_00_02'] = "News";
        $data['Menu_item_00_03'] = "Mail";
        //The submenu item for administrator document side
        $data['Menu_item_04_01'] = "My Files";
        $data['Menu_item_04_02'] = "Inbox - File ";
        $data['Menu_item_04_03'] = "File Hub";

          //The chat forum departs as from the databsae modal as below
          $data['Menu_item_00_01_00'] = "Management";
          $data['Menu_item_00_01_01'] = "Administration";
          $data['Menu_item_00_01_02'] = "Commercial";
          $data['Menu_item_00_01_03'] = "Design";
          $data['Menu_item_00_01_04'] = "Finance";
          $data['Menu_item_00_01_05'] = "Maintenance";
          $data['Menu_item_00_01_06'] = "Production";
          $data['Menu_item_00_01_07'] = "Supply Chain";
          $data['Menu_item_00_01_09'] = "I.T";
          $kms_userid = $this->session->userdata('kms_emp_id');
          $kms_deptid = $this->session->userdata('kms_access_user_dept_id');

           //Obtain the current employee in the dataset
           $Fetch_File_count_Result = $this->Kms_upload_model->Fetch_Count_department_files($kms_deptid,$kms_userid);
 

    foreach ($Fetch_File_count_Result->result_array() as $row){}

        //Load session library 
        $this->load->helper('url');
        $this->session->set_userdata('side_menu_dept2','Administration');
        //echo "New from the administration section";
        $data['Selected_dept'] = 0;
        $this->load->view('file_directory_admin',$data);
      }else{
        $this->load->helper('url');
        redirect('/');
          }
 
    }
  //The function that will handle the news section on the administration dept
  public function News()
  {
    if($this->session->userdata('kms_access_status') == 1){
        //The view data to be used
	      $data['Home_tab_title'] = "KMS | Admin | News";
        $data['Side_menu_title'] = "KMS-Administration";
        //The menu items on the administrator home side
        $data['Menu_item_00'] = "Communicate";
        $data['Menu_item_01'] = "Employees";
        $data['Menu_item_02'] = "Training";
        $data['Menu_item_03'] = "Hire";
        $data['Menu_item_04'] = "Documents";

        //The employee sub menu list item
        $data['Menu_item_01_01'] = "Add employee";
        $data['Menu_item_01_02'] = "Employee List";

        //The submenu item for administrator home side
        $data['Menu_item_00_01'] = "Chat Forum";
        $data['Menu_item_00_02'] = "News";
        $data['Menu_item_00_03'] = "Mail";
        //Load session library 
        $this->load->library('session');
      	$this->load->helper('url');

        //echo "New from the administration section";
        //$this->load->view('news',$data);
      }else{
    
        $this->load->helper('url');
        redirect('/');
          }
 
  }



//The function that will handle the news section on the administration dept
public function Compose_Post()
{
  if($this->session->userdata('kms_access_status') == 1){
      //The view data to be used
      $data['Home_tab_title'] = "KMS | Admin | News";
      $data['Side_menu_title'] = "KMS-Administration";
      //The menu items on the administrator home side
      $data['Menu_item_00'] = "Communicate";
      $data['Menu_item_01'] = "Employees";
      $data['Menu_item_02'] = "Training";
      $data['Menu_item_03'] = "Hire";
      $data['Menu_item_04'] = "Documents";

      //The employee sub menu list item
      $data['Menu_item_01_01'] = "Add employee";
      $data['Menu_item_01_02'] = "Employee List";

      //The submenu item for administrator home side
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

      //Load session library 
      $this->load->library('session');
      $this->load->helper('url');

      //echo "New from the administration section";
      $this->load->view('compose_post',$data);
    }else{
    
      $this->load->helper('url');
      redirect('/');
        }

}
    //This function is to handle posting a single post in the view forum post chat
    public function Chat_single_forum_message()
    {
       echo "yes";
    }
      //The function that will handle the news section on the administration dept
    public function Chat_Forum()
    {
      if($this->session->userdata('kms_access_status') == 1){
      //The view data to be used
      $data['Home_tab_title'] = "KMS | Admin | Forum";
      $data['Side_menu_title'] = "KMS-Administration";
      //The menu items on the administrator home side
      $data['Menu_item_00'] = "Communicate";
      $data['Menu_item_01'] = "Employees";
      $data['Menu_item_02'] = "Training";
      $data['Menu_item_03'] = "Hire";
      $data['Menu_item_04'] = "Documents";

      //The employee sub menu list item
      $data['Menu_item_01_01'] = "Add employee";
      $data['Menu_item_01_02'] = "Employee List";
 
      //The submenu item for administrator home side
      $data['Menu_item_00_01'] = "Chat Forum";
      $data['Menu_item_00_02'] = "News";
      $data['Menu_item_00_03'] = "Mail";

      //The submenu item for administrator document side
      $data['Menu_item_04_01'] = "My Files";
      $data['Menu_item_04_02'] = "Inbox - File ";
      $data['Menu_item_04_03'] = "File Hub";

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
      $this->load->helper('url');
      
      //Obtain the current employee in the dataset
      $Fetch_FChat_Result = $this->Chat->fetch_fchat_message();

      $data['Fetch_Forum_Chat_results'] = $Fetch_FChat_Result->result_array();
      
      
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
     //Then we call the chat forum name function as below
     $data['Forum_id'] = 0;
     $this->load->view('chat_forum',$data);
    }else{
    
      $this->load->helper('url');
      redirect('/');
        }
    }



       //The function that will handle the news section on the administration dept
       public function Forum($id)
       {

        if($this->session->userdata('kms_access_status') == 1){
         //Load session library 
         $this->load->library('session');
         $this->load->helper('url');
         //load database libray manually
          $this->load->database();
          //load Model
          $this->load->model('Chat');
         //The view data to be used
         $data['Home_tab_title'] = "KMS | Admin | Forum";
         $data['Side_menu_title'] = "KMS-Administration";
         //The menu items on the administrator home side
         $data['Menu_item_00'] = "Communicate";
         $data['Menu_item_01'] = "Employees";
         $data['Menu_item_02'] = "Training";
         $data['Menu_item_03'] = "Hire";
         $data['Menu_item_04'] = "Documents";
         //The employee sub menu list item
         $data['Menu_item_01_01'] = "Add employee";
         $data['Menu_item_01_02'] = "Employee List";
         //The submenu item for administrator home side
         $data['Menu_item_00_01'] = "Chat Forum";
         $data['Menu_item_00_02'] = "News";
         $data['Menu_item_00_03'] = "Mail";
          //The submenu item for administrator document side
          $data['Menu_item_04_01'] = "My Files";
          $data['Menu_item_04_02'] = "Inbox - File ";
          $data['Menu_item_04_03'] = "File Hub";
         
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
        
         
         //Obtain the select forum chat from the data modal
         $Fetch_FChat_Result = $this->Chat->fetch_fchat_message();
   
        $data['Fetch_Forum_Chat_results'] = $Fetch_FChat_Result->result_array();
         
         
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
                $data['MT']  = 0; $data['SC'] = 0; $data['PD'] = 0; $data['CM'] = 0;$data['FC'] = 0;$data['AD'] = 0;$data['GN']  = 0;$data['DS']  = 0; $data['IT']  = 0; 
              }
           
        }
        //Then we call the chat forum name function as below
      
         //  this indicates the forum heading titles as set below on the forum chat panel on the admin side
         $data['Forum_id']  = $id;//The forum number that has been selected by the user
         if(($id) == 1){ $data['Forum_name'] = "Management Forum";
         }
         else if(($id) == 2){$data['Forum_name'] = "Administration Forum";
         }
         else if(($id) == 3){$data['Forum_name'] = "Finance Forum";
         }
         else if(($id) == 4){$data['Forum_name'] = "Commercial Forum";
         }
         else if(($id) == 5){$data['Forum_name'] = "Production Forum";
         }
         else if(($id) == 6){$data['Forum_name'] = "Supply Chain Forum";
         }
         else if(($id) == 7){$data['Forum_name'] = "Maintenance Forum";
         }
         else if(($id) == 8){$data['Forum_name'] = "Design & Dev'pt Forum";
         }
         else if(($id) == 9){$data['Forum_name'] = "I.T";
         }
         else{
          $data['Forum_name']= null;
         }


        //Then we obtain the forum chats as per the selected forum
        $kms_user_id  = $this->session->userdata('kms_emp_id');
        $Fetch_Forum_Result3 = $this->Chat->fetch_forum_message($id,$kms_user_id);
        $data['Fetch_forum_chats_results'] = $Fetch_Forum_Result3->result_array();
      
        $data['Forum_id'] = $id;
        $this->load->view('chat_forum',$data);



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
            //add flash data 
           redirect('Administration/Forum/'.$kms_single_forum_chart_rec_forum.'');        
          
          //echo $SaveQueryResult."123".$kms_single_forum_chart_msg."-".$Input_fchat_sender_id.' ->'.$kms_single_forum_chart_rec_forum;
         }
          else{
         //
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
          redirect('Administration/Forum/'.$Input_fchat_Forum2);

         }else
         {
          $data['Emp_save_success'] = "0";
          $data['Emp_save_message'] = "Your Forum message has not been sent";
          
          //add flash data 
          $this->session->set_flashdata('notice',$data2); 

          //add flash data 
          redirect('Administration/Chat_Forum');
         }

        }
      }else{
    
        $this->load->helper('url');
        redirect('/');
          }
    }

        public function Admin_file_directory_dep($Dep_id)
        {  $data['Selected_dept'] = $Dep_id;
          if($this->session->userdata('kms_access_status') == 1){

             //The view data to be used
        $data['Home_tab_title'] = "KMS | Admin | Files";
        $data['Side_menu_title'] = "KMS-Administration";
        //The menu items on the administrator home side
        $data['Menu_item_00'] = "Communicate";
        $data['Menu_item_01'] = "Employees";
        $data['Menu_item_02'] = "Training";
        $data['Menu_item_03'] = "Hire";
        $data['Menu_item_04'] = "Documents";
        //The employee sub menu list item
        $data['Menu_item_01_01'] = "Add employee";
        $data['Menu_item_01_02'] = "Employee List";
        //The submenu item for administrator home side
        $data['Menu_item_00_01'] = "Chat Forum";
        $data['Menu_item_00_02'] = "News";
        $data['Menu_item_00_03'] = "Mail";
        //The submenu item for administrator document side
        $data['Menu_item_04_01'] = "My Files";
        $data['Menu_item_04_02'] = "Inbox - File ";
        $data['Menu_item_04_03'] = "File Hub";

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

        

        $kms_userid = $this->session->userdata('kms_emp_id');
        $kms_user_deptid = $this->session->userdata('kms_access_user_dept_id');
        $Kms_file_department_id = $Dep_id;
        $Kms_file_department_results = $this->Kms_upload_model->Fetch_department_files($Kms_file_department_id,$kms_userid,$kms_user_deptid);
        $data['dataset'] = $Kms_file_department_results->result_array();

            $this->session->set_userdata('side_menu_dept','Administration');
            $this->load->helper('url');
            $this->load->view('datatable_file_directory',$data);


              }else{
            $this->load->helper('url');
            redirect('/');
              }
        }

       //The function that will handle the employee section on the administration dept
    public function Employee()
    {
      if($this->session->userdata('kms_access_status') == 1){
         //Load session library 
        $this->load->library('session');

        //The view data to be used
	      $data['Home_tab_title'] = "KMS | Administration";
        $data['Side_menu_title'] = "KMS-Administration";
        //The menu items on the administrator home side
        $data['Menu_item_00'] = "Communicate";
        $data['Menu_item_01'] = "Employees";
        $data['Menu_item_02'] = "Training";
        $data['Menu_item_03'] = "Hire";
        $data['Menu_item_04'] = "Documents";

        //The employee sub menu list item
        $data['Menu_item_01_01'] = "Add employee";
        $data['Menu_item_01_02'] = "Employee List";

        //The submenu item for administrator home side
        $data['Menu_item_00_01'] = "Chat Forum";
        $data['Menu_item_00_02'] = "News";
        $data['Menu_item_00_03'] = "Mail";

        //The submenu item for administrator document side
        $data['Menu_item_04_01'] = "My Files";
        $data['Menu_item_04_02'] = "Inbox - File ";
        $data['Menu_item_04_03'] = "File Hub";
    

        //Obtain the current employee in the dataset
        $FetchEmployee_Result = $this->add_employee->Fetch_all_Employee();
        $data['Fetch_employee_results'] = $FetchEmployee_Result->result_array();

        
    
        
        $this->load->helper('url');
        $this->load->view('employee',$data);
      }else{
    
        $this->load->helper('url');
        redirect('/');
          }

    }

        //The function that intiates the save model to save the new employee details
        public function AddEmployee()
        {
          if($this->session->userdata('kms_access_status') == 1){
           //Load session library 
          $this->load->library('session');
          
          //Obtaining the form data from the new employ form as below
          $Input_emp_fname = $this->input->post('Admin_input_emp_fname');
          $Input_emp_sname = $this->input->post('Admin_input_emp_sname');
          $Input_emp_gender = $this->input->post('Admin_input_emp_gender');
          $Input_emp_presidence = $this->input->post('Admin_input_emp_presidence');
          $Input_emp_dbirth = $this->input->post('Admin_input_emp_dbirth');
          
          
         
          //Transfering data to Model
          $SaveQueryResult = $this->add_employee->save_new_employee($Input_emp_fname,$Input_emp_sname,$Input_emp_gender,$Input_emp_presidence,$Input_emp_dbirth);
        
          if($SaveQueryResult != 0)
         {
           //Define the alert message
          $data2['Emp_save_success'] = 1;
          $data2['Emp_save_message'] = $Input_emp_fname.' '.$Input_emp_sname." has been created.";
          
          //add flash data 
          $this->session->set_flashdata('notice',$data2); 

          //add flash data 
          
          $this->load->helper('url');
          redirect('administration/employee');
         }else
         {

         }
        }else{
    
          $this->load->helper('url');
          redirect('/');
            }
        }
        
        //This is for editing employee details as below:...................................
        function ViewEmployee($id)
        {
          if($this->session->userdata('kms_access_status') == 1){
          //Load session library 
        $this->load->library('session');

        //The view data to be used
	      $data['Home_tab_title'] = "KMS | Administration";
        $data['Side_menu_title'] = "KMS-Administration";
        //The menu items on the administrator home side
        $data['Menu_item_00'] = "Communicate";
        $data['Menu_item_01'] = "Employees";
        $data['Menu_item_02'] = "Training";
        $data['Menu_item_03'] = "Hire";
        $data['Menu_item_04'] = "Documents";

        //The employee sub menu list item
        $data['Menu_item_01_01'] = "Add employee";
        $data['Menu_item_01_02'] = "Employee List";

        //The submenu item for administrator home side
        $data['Menu_item_00_01'] = "Chat Forum";
        $data['Menu_item_00_02'] = "News";
        $data['Menu_item_00_03'] = "Mail";

        //Obtain the current employee in the dataset
        $FetchEmployee_Result = $this->add_employee->Fetch_all_Employee();
        $data['Fetch_employee_results'] = $FetchEmployee_Result->result_array();

         
    
        
        $this->load->helper('url');
        $this->load->view('viewemployee',$data);
      }else{
    
        $this->load->helper('url');
        redirect('/');
          }
   
        }
      
}
?>