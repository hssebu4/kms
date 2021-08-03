<?php 
error_reporting(0);
class Forum extends CI_Controller {

    public function __construct()
    {
              //call CodeIgniter's default Constructor
              parent::__construct(); 
              
              //load database libray manually
              //Load session library 
              $this->load->library('session');
              $this->load->helper('url');
              //load database libray manually
              $this->load->database();
              $this->load->model('Chat');
              $this->load->model('Kms_upload_model');
              $this->load->model('add_employee');
              $this->load->model('Projects');
              $this->load->model('event');
              $this->load->model('etraining');
              $this->load->model('Session');
              $this->load->model('Pdp');
              $this->load->model('Planning');
              
              date_default_timezone_set("Africa/Kampala");

              //Load session library 
              $this->load->library('upload');
    
    }

    public function index()
	{  
        
        $session_user_dept_id =  $this->session->userdata('kms_access_user_dept_id');//kms_emp_department
        
        if($this->session->userdata('kms_access_status') == 1){
                  //The chat forum departs as from the databsae modal as below
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
                //The customised user details
               if(isset($session_user_dept_id) && $session_user_dept_id == 2)
               {
                          //The view data to be used
                        $data['Home_tab_title'] = "KMS | Management";
                        $data['Side_menu_title'] = "KMS - Management";
                        $data['Dept_name'] = "Management";

               }else if(isset($session_user_dept_id) && $session_user_dept_id == 5)
               {
                          //The view data to be used
                        $data['Home_tab_title'] = "KMS | Production";
                        $data['Side_menu_title'] = "KMS - Production";
                        $data['Dept_name'] = "Production"; 

               }else if(isset($session_user_dept_id) && $session_user_dept_id == 6)
               {
                          //The view data to be used
                        $data['Home_tab_title'] = "KMS | Supply Chain";
                        $data['Side_menu_title'] = "KMS - Supply Chain";
                        $data['Dept_name'] = "Supply";

               }else if(isset($session_user_dept_id) && $session_user_dept_id == 7)
               {
                          //The view data to be used
                        $data['Home_tab_title'] = "KMS | Maintenance";
                        $data['Side_menu_title'] = "KMS - Maintenance";
                        $data['Dept_name'] = "Maintenance";

               }
               else if(isset($session_user_dept_id) && $session_user_dept_id == 4)
               {
                          //The view data to be used
                        $data['Home_tab_title'] = "KMS | Commercial";
                        $data['Side_menu_title'] = "KMS - Commercial";
                        $data['Dept_name'] = "Commercial";
                        //The menu items on the I.T home side

               }
               else if(isset($session_user_dept_id) && $session_user_dept_id == 9)
               {
                          //The view data to be used
                        $data['Home_tab_title'] = "KMS | I.T";
                        $data['Side_menu_title'] = "KMS - I.T";
                        $data['Dept_name'] = "I.T";
                       
               }
               else if(isset($session_user_dept_id) && $session_user_dept_id == 8)
               {
                          //The view data to be used
                        $data['Home_tab_title'] = "KMS | Design";
                        $data['Side_menu_title'] = "KMS - Design";
                        $data['Dept_name'] = "Design";   
               }
               else if(isset($session_user_dept_id) && $session_user_dept_id == 3)
               {
                          //The view data to be used
                        $data['Home_tab_title'] = "KMS | Finance";
                        $data['Side_menu_title'] = "KMS - Finance";
                        $data['Dept_name'] = "Finance";
                      
               }
                        //The menu items on the I.T home side
                        $data['Menu_item_00'] = "Communicate";
                        $data['Menu_item_04'] = "Documents";

                        //The submenu item for I.T home side
                        $data['Menu_item_00_01'] = "Chat Forum";
                    
                        //The submenu item for i.t document side
                        $data['Menu_item_04_01'] = "My Files";
                        $data['Menu_item_04_02'] = "Inbox - Files";
                        $data['Menu_item_04_03'] = "Files Hub ";
                        $data['Menu_item_04_04'] = "Pdp";
                        $data['Menu_item_04_05'] = "Planning";

                        //The submenu item for events
                        $data['Menu_item_05_01'] = "Events";
                        $data['Menu_item_05_02'] = "Event scheduling";
                        
                        //The submenu item for elearning center
                        $data['Menu_item_06_01'] = "E Learning";
                        $data['Menu_item_06_02'] = "e-training";
                        $data['Menu_item_06_03'] = "Manuals";

                        //The submenu item for user
                        $data['Menu_item_07_01'] = "Staff";
                        $data['Menu_item_07_02'] = "Users";
              
            

         
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
         
          $id = $this->session->userdata('kms_access_user_dept_id');
          $data['Forum_id']  = $id;
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
                 $data['Forum_name']= "null";
          }
          
 
         //Then we obtain the forum chats as per the selected forum   kms_access_user_dept_id
         $kms_user_id  = $this->session->userdata('kms_emp_id');
         
         $Fetch_Forum_Result3 = $this->Chat->fetch_forum_message($id,$kms_user_id);
         $data['Fetch_forum_chats_results'] = $Fetch_Forum_Result3->result_array();
         
            //The we obtain the employee list to be used in the drop down select. 
        $Kms_empolyee_list_names_only = $this->add_employee->Fetch_all_Employee_names_only();
        $data['kms_emp_list_names_only'] = $Kms_empolyee_list_names_only->result_array();
        $this->session->set_userdata('kms_emp_list_names_only_session',$Kms_empolyee_list_names_only->result_array());
    
         $this->load->view('forums',$data);
         
        }else{
   
              $this->load->helper('url');
              redirect('/');
        }
        
            
        }

       public function Chat($id)
       {
        $session_user_dept_id =  $this->session->userdata('kms_access_user_dept_id');//kms_emp_department

           if($this->session->userdata('kms_access_status') == 1){
                        //The chat forum departs as from the databsae modal as below
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
                //The customised user details
               if(isset($session_user_dept_id) && $session_user_dept_id == 2)
               {
                          //The view data to be used
                        $data['Home_tab_title'] = "KMS | Management";
                        $data['Side_menu_title'] = "KMS - Management";
                        $data['Dept_name'] = "Management";
                        
               }else if(isset($session_user_dept_id) && $session_user_dept_id == 5)
               {
                          //The view data to be used
                        $data['Home_tab_title'] = "KMS | Production";
                        $data['Side_menu_title'] = "KMS - Production";
                        $data['Dept_name'] = "Production";
                      
      
               }else if(isset($session_user_dept_id) && $session_user_dept_id == 6)
               {
                          //The view data to be used
                        $data['Home_tab_title'] = "KMS | Supply Chain";
                        $data['Side_menu_title'] = "KMS - Supply Chain";
                        $data['Dept_name'] = "Supply";
                  
               }else if(isset($session_user_dept_id) && $session_user_dept_id == 7)
               {
                          //The view data to be used
                        $data['Home_tab_title'] = "KMS | Maintenance";
                        $data['Side_menu_title'] = "KMS - Maintenance";
                        $data['Dept_name'] = "Maintenance";
                 
               } else if(isset($session_user_dept_id) && $session_user_dept_id == 4)
               {
                          //The view data to be used
                        $data['Home_tab_title'] = "KMS | Commercial";
                        $data['Side_menu_title'] = "KMS - Commercial";
                        $data['Dept_name'] = "Commercial";
                      
               }
               else if(isset($session_user_dept_id) && $session_user_dept_id == 9)
               {
                          //The view data to be used
                        $data['Home_tab_title'] = "KMS | I.T";
                        $data['Side_menu_title'] = "KMS - I.T";
                        $data['Dept_name'] = "I.T";
                    
               }

               else if(isset($session_user_dept_id) && $session_user_dept_id == 8)
               {
                          //The view data to be used
                        $data['Home_tab_title'] = "KMS | Design";
                        $data['Side_menu_title'] = "KMS - Design";
                        $data['Dept_name'] = "Design";
                      
               }else if(isset($session_user_dept_id) && $session_user_dept_id == 3)
               {
                          //The view data to be used
                        $data['Home_tab_title'] = "KMS | Finance";
                        $data['Side_menu_title'] = "KMS - Finance";
                        $data['Dept_name'] = "Finance";
                      
               }
                //The menu items on the I.T home side
                $data['Menu_item_00'] = "Communicate";
                $data['Menu_item_04'] = "Documents";

                //The submenu item for I.T home side
                $data['Menu_item_00_01'] = "Chat Forum";
            
                //The submenu item for i.t document side
                $data['Menu_item_04_01'] = "My Files"; 
                $data['Menu_item_04_02'] = "Inbox - Files";
                $data['Menu_item_04_03'] = "Files Hub ";

                //The submenu item for user
                $data['Menu_item_07_01'] = "Staff";
                $data['Menu_item_07_02'] = "Users";
              
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
                  $data['MT']  = 0; $data['SC'] = 0; $data['PD'] = 0; $data['CM'] = 0;$data['FC'] = 0;$data['AD'] = 0;$data['GN']  = 0;$data['DS']  = 0;$data['IT'] = 0;
             }
          
       }
       //Then we call the chat forum name function as below
     
        //  this indicates the forum heading titles as set below on the forum chat panel on the admin side
        $data['Forum_id']  = $id;//The forum number that has been selected by the user
        if(($id) == 1){ $data['Forum_name'] = "Management Forum ";
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
   
         //The we obtain the employee list to be used in the drop down select. 
         $Kms_empolyee_list_names_only = $this->add_employee->Fetch_all_Employee_names_only();
         $data['kms_emp_list_names_only'] = $Kms_empolyee_list_names_only->result_array();
         $this->session->set_userdata('kms_emp_list_names_only_session',$Kms_empolyee_list_names_only->result_array());

         $this->load->view('forums',$data);


        }else{
   
              $this->load->helper('url');
              redirect('/');
        }
        
            
        }

          //The function for add chat forum message from the I.Ts as below
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
          $SaveQueryResult = $this->Chat->send_fchat_message(0,$kms_single_forum_chart_rec_forum,"KMS",$kms_single_forum_chart_msg,$Input_fchat_time,$Input_fchat_date,$Input_fchat_sender_id);
            //add flash data 
           redirect('Forum/Chat/'.$kms_single_forum_chart_rec_forum.'');        
          
          //echo $SaveQueryResult."123".$kms_single_forum_chart_msg."-".$Input_fchat_sender_id.' ->'.$kms_single_forum_chart_rec_forum;
         }
          else{
           
         //Obtaining the form data from the compose form as below
         $Input_fchat_Forum = $this->input->post('kms_input_fchat_forum');
         $Input_fchat_recept = $this->input->post('kms_input_file_recipient');
         //$Input_fchat_Topic = $this->input->post('kms_input_fchat_topic');
         $Input_fchat_Topic = "kms";
         $Input_fchat_Message = $this->input->post('kms_input_fchat_message');
         $Input_fchat_Forum2 = $this->input->post('Kms_input_hidden_forum');
         $Input_fchat_Recpt2 = $this->input->post('Kms_input_hidden_recip');
         $Input_fchat_time = date("h:i:sa");
         $Input_fchat_date = date("Y/m/d");
         $Input_fchat_sender_id = $this->session->userdata('kms_emp_id');

     
         
        
         //Transfering data to Model
         $SaveQueryResult = $this->Chat->send_fchat_message($Input_fchat_Recpt2,$Input_fchat_Forum2,$Input_fchat_Topic,$Input_fchat_Message,$Input_fchat_time,$Input_fchat_date,$Input_fchat_sender_id);
        
        if($SaveQueryResult != 0)
         {
           //Define the alert message
          $data2['Emp_save_success'] = 1;
          $data2['Emp_save_message'] = "Your Forum message has been successfully sent!!!";
          
          //add flash data 
          $this->session->set_flashdata('notice',$data2); 

          if($Input_fchat_recept == 0)
          {
            //add flash data 
            redirect('Forum/Chat/'.$Input_fchat_Forum);
  
          }
          else
          {
            $Returned_emp_dept = $this->Chat->Obtain_emp_department($Input_fchat_recept)->result_array();
        
            foreach ($Returned_emp_dept as $dept) {
              $Returned_emp_dept_id =  $dept['kms_department_id'];
            }
            redirect('Forum/Chat/'.$Returned_emp_dept_id);
          // echo 'The return ->'.$Returned_emp_dept_id.' the first receptient ->'.$Input_fchat_recept;
         
          }


         }else
         {
          $data2['Emp_save_success'] = "0";
          $data2['Emp_save_message'] = "Your Forum message has not been sent";
          
          //add flash data 
          $this->session->set_flashdata('notice',$data2); 
          
          //add flash data 
         redirect('Forum/Chat/'.$Input_fchat_Forum);
         }
      

        } 
      }else{
   
          $this->load->helper('url');
          redirect('/');
             }
        
    }

    

       //The function that will handle the news section on the administration dept
  public function File_Directory()
  {  $session_user_dept_id =  $this->session->userdata('kms_access_user_dept_id');//kms_emp_department
     
    if($this->session->userdata('kms_access_status') == 1){
                  //The forum menu as per department 
                  $data['Menu_item_00_01_00'] = "Management";
                  $data['Menu_item_00_01_01'] = "Management";
                  $data['Menu_item_00_01_02'] = "Administration";
                  $data['Menu_item_00_01_04'] = "Commercial";
                  $data['Menu_item_00_01_08'] = "Design";
                  $data['Menu_item_00_01_03'] = "Finance";
                  $data['Menu_item_00_01_07'] = "Maintenance";
                  $data['Menu_item_00_01_05'] = "Production";
                  $data['Menu_item_00_01_06'] = "Supply Chain";
                  $data['Menu_item_00_01_09'] = "I.T";
          //The customised user details
         if(isset($session_user_dept_id) && $session_user_dept_id == 2)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Management";
                  $data['Side_menu_title'] = "KMS - Management";
                  $data['Dept_name'] = "Management";
               
         }else if(isset($session_user_dept_id) && $session_user_dept_id == 5)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Production";
                  $data['Side_menu_title'] = "KMS - Production";
                  $data['Dept_name'] = "Production";
                 
         }else if(isset($session_user_dept_id) && $session_user_dept_id == 6)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Supply Chain";
                  $data['Side_menu_title'] = "KMS - Supply Chain";
                  $data['Dept_name'] = "Supply";
                 
         }else if(isset($session_user_dept_id) && $session_user_dept_id == 7)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Maintenance";
                  $data['Side_menu_title'] = "KMS - Maintenance";
                  $data['Dept_name'] = "Maintenance";
                 
         }else if(isset($session_user_dept_id) && $session_user_dept_id == 4)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Commercial";
                  $data['Side_menu_title'] = "KMS - Commercial";
                  $data['Dept_name'] = "Commercial";
                 
         } else if(isset($session_user_dept_id) && $session_user_dept_id == 9)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | I.T";
                  $data['Side_menu_title'] = "KMS - I.T";
                  $data['Dept_name'] = "I.T";
                  
         }
         else if(isset($session_user_dept_id) && $session_user_dept_id == 8)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Design";
                  $data['Side_menu_title'] = "KMS - Design";
                  $data['Dept_name'] = "Design";
                
         }else if(isset($session_user_dept_id) && $session_user_dept_id == 3)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Finance";
                  $data['Side_menu_title'] = "KMS - Finance";
                  $data['Dept_name'] = "Finance";
                
         }
         
            //The menu items on the I.T home side
            $data['Menu_item_00'] = "Communicate";
            $data['Menu_item_04'] = "Documents";

            //The submenu item for I.T home side
            $data['Menu_item_00_01'] = "Chat Forum";
        
            //The submenu item for i.t document side
            $data['Menu_item_04_01'] = "My Files";
            $data['Menu_item_04_02'] = "Inbox - Files";
            $data['Menu_item_04_03'] = "Files Hub ";
            $data['Menu_item_04_04'] = "Pdp ";
            $data['Menu_item_04_05'] = "Planning";
            
                    //The submenu item for events
                    $data['Menu_item_05_01'] = "Event scheduling";
                    $data['Menu_item_05_02'] = "Event Management";
                    $data['Menu_item_05_03'] = "New Event Creation";
                   
                    //The submenu item for elearning center
                    $data['Menu_item_06_01'] = "E Learning";
                    $data['Menu_item_06_02'] = "e-training";
                    $data['Menu_item_06_03'] = "Manuals";
                    $data['Menu_item_06_04'] = "Add Course";
                    $data['Menu_item_06_05'] ="New Training";

                    //The training categories
                    $data['Menu_item_06_04_01'] ="General"; 
                    $data['Menu_item_06_04_02'] ="Sales / Marketing"; 
                    $data['Menu_item_06_04_03'] ="Engineering"; 
                    $data['Menu_item_06_04_04'] ="Production"; 
                    $data['Menu_item_06_04_05'] ="Customized"; 
                    $data['Menu_item_06_04_06'] ="Category"; 

                    //The submenu item for user
                    $data['Menu_item_07_01'] = "Staff";
                    $data['Menu_item_07_02'] = "Users";
                     

                   // $data['menu_status'] = "EL";
       
        //$this->session->set_userdata('side_menu_dept2','Technology');

         //Then we uploaded files on the server
        $Kms_uploadedfiles =$this->Kms_upload_model->Fetch_all_uploadfile_byuser($this->session->userdata('kms_emp_id'));
         //This load the personal uploaded files
        $data['Kms_userupload_results'] = $Kms_uploadedfiles->result_array();

        //The we obtain the employee list to be used in the drop down select. 
        $Kms_empolyee_list_names_only = $this->add_employee->Fetch_all_Employee_names_only();
        $data['kms_emp_list_names_only'] = $Kms_empolyee_list_names_only->result_array();
        $this->session->set_userdata('kms_emp_list_names_only_session',$Kms_empolyee_list_names_only->result_array());
        $this->load->model('Projects');
        //Then we obtain  the current running projects as below
        $this->session->set_userdata('kms_active_projects',$this->Projects->Fetch_all_Projects()->result_array());

        $this->load->helper('url');
        //echo sizeof($this->Projects->Fetch_all_Projects()->result_array());
        //echo "New from the administration section";
        $this->load->view('files',$data);
      }else{
     
        $this->load->helper('url');
        redirect('/');
          } 
 
  }
  public function Personal_file_share()
  {
        
    $session_user_dept_id =  $this->session->userdata('kms_access_user_dept_id');//kms_emp_department
     
    if($this->session->userdata('kms_access_status') == 1){
                  //The forum menu as per department 
                  $data['Menu_item_00_01_00'] = "Management";
                  $data['Menu_item_00_01_01'] = "Management";
                  $data['Menu_item_00_01_02'] = "Administration";
                  $data['Menu_item_00_01_04'] = "Commercial";
                  $data['Menu_item_00_01_08'] = "Design";
                  $data['Menu_item_00_01_03'] = "Finance";
                  $data['Menu_item_00_01_07'] = "Maintenance";
                  $data['Menu_item_00_01_05'] = "Production";
                  $data['Menu_item_00_01_06'] = "Supply Chain";
                  $data['Menu_item_00_01_09'] = "I.T";
          //The customised user details
         if(isset($session_user_dept_id) && $session_user_dept_id == 2)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Management";
                  $data['Side_menu_title'] = "KMS - Management";
                  $data['Dept_name'] = "Management";
               
              
         }else if(isset($session_user_dept_id) && $session_user_dept_id == 5)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Production";
                  $data['Side_menu_title'] = "KMS - Production";
                  $data['Dept_name'] = "Production";
                 

                   

         }else if(isset($session_user_dept_id) && $session_user_dept_id == 6)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Supply Chain";
                  $data['Side_menu_title'] = "KMS - Supply Chain";
                  $data['Dept_name'] = "Supply";
                 
         }else if(isset($session_user_dept_id) && $session_user_dept_id == 7)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Maintenance";
                  $data['Side_menu_title'] = "KMS - Maintenance";
                  $data['Dept_name'] = "Maintenance";
                 
         }
         else if(isset($session_user_dept_id) && $session_user_dept_id == 4)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Commercial";
                  $data['Side_menu_title'] = "KMS - Commercial";
                  $data['Dept_name'] = "Commercial";
                
         }
         else if(isset($session_user_dept_id) && $session_user_dept_id == 9)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | I.T";
                  $data['Side_menu_title'] = "KMS - I.T";
                  $data['Dept_name'] = "I.T";
                 
         }else if(isset($session_user_dept_id) && $session_user_dept_id == 8)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Design";
                  $data['Side_menu_title'] = "KMS - Design";
                  $data['Dept_name'] = "Design";
                
         }else if(isset($session_user_dept_id) && $session_user_dept_id == 3)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Finance";
                  $data['Side_menu_title'] = "KMS - Finance";
                  $data['Dept_name'] = "Finance";
                
         }

                //The menu items on the I.T home side
                $data['Menu_item_00'] = "Communicate";
                $data['Menu_item_04'] = "Documents";

                //The submenu item for I.T home side
                $data['Menu_item_00_01'] = "Chat Forum";
            
                //The submenu item for i.t document side
                $data['Menu_item_04_01'] = "My Files";
                $data['Menu_item_04_02'] = "Inbox - Files";
                $data['Menu_item_04_03'] = "Files Hub ";
                $data['Menu_item_04_04'] = "Pdp ";
                $data['Menu_item_04_05'] = "Planning";
            
            
                    //The submenu item for events
                    $data['Menu_item_05_01'] = "Event scheduling";
                    $data['Menu_item_05_02'] = "Event Management";
                    $data['Menu_item_05_03'] = "New Event Creation";
                   
                    //The submenu item for elearning center
                    $data['Menu_item_06_01'] = "E Learning";
                    $data['Menu_item_06_02'] = "e-training";
                    $data['Menu_item_06_03'] = "Manuals";
                    $data['Menu_item_06_04'] = "Add Course";
                    $data['Menu_item_06_05'] ="New Training";

                    //The training categories
                    $data['Menu_item_06_04_01'] ="General"; 
                    $data['Menu_item_06_04_02'] ="Sales / Marketing"; 
                    $data['Menu_item_06_04_03'] ="Engineering"; 
                    $data['Menu_item_06_04_04'] ="Production"; 
                    $data['Menu_item_06_04_05'] ="Customized"; 
                    $data['Menu_item_06_04_06'] ="Category"; 

                    //The submenu item for user
                    $data['Menu_item_07_01'] = "Staff";
                    $data['Menu_item_07_02'] = "Users";
                     

                   // $data['menu_status'] = "EL";

                $kms_file_share_forum = $this->input->post("Kms_input_hidden_forum");
                $kms_file_share_recipt = $this->input->post("Kms_input_hidden_recip");

                $kms_file_share_text = $this->input->post("kms_input_file_share_message");
                $kms_file_share_id = $this->input->post("Kms_input_hidden_file_id");
                $kms_file_project_share_id = $this->input->post("Kms_input_hidden_project_id");
                $Input_file_share_time = date("g:i A");//Personal_file_share  kms_input_fileshare_forum
                $Input_file_share_date = date("Y/m/d");

             
              
                $Kms_file_share_result = $this->Kms_upload_model->Upload_File_share($kms_file_project_share_id,$this->session->userdata('kms_emp_id'),$kms_file_share_id,
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
                //Then we obtain  the current running projects as below
                $this->session->set_userdata('kms_active_projects',$this->Projects->Fetch_all_Projects()->result_array());

                //echo "New from the administration section";
                redirect('Forum/File_Directory');
            /*  */

            }else{

                    $this->load->helper('url');
                    redirect('/');
                    } 
     
  }



  public function File_Inbox($Dept_Id)
  {   
        $session_user_dept_id =  $this->session->userdata('kms_access_user_dept_id');//kms_emp_department
    if($this->session->userdata('kms_access_status') == 1){
                  //The forum menu as per department 
                  $data['Menu_item_00_01_00'] = "Management";
                  $data['Menu_item_00_01_01'] = "Administration";
                  $data['Menu_item_00_01_02'] = "Commercial";
                  $data['Menu_item_00_01_04'] = "Finance";
                  $data['Menu_item_00_01_08'] = "Design";
                  $data['Menu_item_00_01_03'] = "Design";
                  $data['Menu_item_00_01_07'] = "Supply Chain";
                  $data['Menu_item_00_01_05'] = "Maintenance";
                  $data['Menu_item_00_01_06'] = "Production";
                  $data['Menu_item_00_01_09'] = "I.T";
          //The customised user details
         if(isset($session_user_dept_id) && $session_user_dept_id == 2)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Management";
                  $data['Side_menu_title'] = "KMS - Management";
                  $data['Dept_name'] = "Management";     
         }else if(isset($session_user_dept_id) && $session_user_dept_id == 5)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Production";
                  $data['Side_menu_title'] = "KMS - Production";
                  $data['Dept_name'] = "Production";
         }else if(isset($session_user_dept_id) && $session_user_dept_id == 6)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Supply Chain";
                  $data['Side_menu_title'] = "KMS - Supply Chain";
                  $data['Dept_name'] = "Supply";  
         }else if(isset($session_user_dept_id) && $session_user_dept_id == 7)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Maintenance";
                  $data['Side_menu_title'] = "KMS - Maintenance";
                  $data['Dept_name'] = "Maintenance";        
         }
         else if(isset($session_user_dept_id) && $session_user_dept_id == 4)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Commercial";
                  $data['Side_menu_title'] = "KMS - Commercial";
                  $data['Dept_name'] = "Commercial";
               
         }else if(isset($session_user_dept_id) && $session_user_dept_id == 9)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | I.T";
                  $data['Side_menu_title'] = "KMS - I.T";
                  $data['Dept_name'] = "I.T";
                 
         }else if(isset($session_user_dept_id) && $session_user_dept_id == 8)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Design";
                  $data['Side_menu_title'] = "KMS - Design";
                  $data['Dept_name'] = "Design";
         }else if(isset($session_user_dept_id) && $session_user_dept_id == 3)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Finance";
                  $data['Side_menu_title'] = "KMS - Finance";
                  $data['Dept_name'] = "Finance";      
         }

                //The menu items on the I.T home side
                $data['Menu_item_00'] = "Communicate";
                $data['Menu_item_04'] = "Documents";

                //The submenu item for I.T home side
                $data['Menu_item_00_01'] = "Chat Forum";
            
                //The submenu item for i.t document side
                $data['Menu_item_04_01'] = "My Files";
                $data['Menu_item_04_02'] = "Inbox - Files";
                $data['Menu_item_04_03'] = "Files Hub ";
                $data['Menu_item_04_04'] = "Pdp ";
                $data['Menu_item_04_05'] = "Planning";

                
                    //The submenu item for events
                    $data['Menu_item_05_01'] = "Event scheduling";
                    $data['Menu_item_05_02'] = "Event Management";
                    $data['Menu_item_05_03'] = "New Event Creation";
                   
                    //The submenu item for elearning center
                    $data['Menu_item_06_01'] = "E Learning";
                    $data['Menu_item_06_02'] = "e-training";
                    $data['Menu_item_06_03'] = "Manuals";
                    $data['Menu_item_06_04'] = "Add Course";
                    $data['Menu_item_06_05'] ="New Training";

                    //The training categories
                    $data['Menu_item_06_04_01'] ="General"; 
                    $data['Menu_item_06_04_02'] ="Sales / Marketing"; 
                    $data['Menu_item_06_04_03'] ="Engineering"; 
                    $data['Menu_item_06_04_04'] ="Production"; 
                    $data['Menu_item_06_04_05'] ="Customized"; 
                    $data['Menu_item_06_04_06'] ="Category"; 
                    
                    //The submenu item for user
                    $data['Menu_item_07_01'] = "Staff";
                    $data['Menu_item_07_02'] = "Users";

                   // $data['menu_status'] = "EL";

                $kms_userid = $this->session->userdata('kms_emp_id');
                $kms_deptid = $this->session->userdata('kms_access_user_dept_id');
            
                  //Obtain the current employee in the dataset
                // $Fetch_File_count_Result = $this->Kms_upload_model->Fetch_Count_department_files($kms_deptid,$kms_userid);
            
                  // foreach ($Fetch_File_count_Result->result_array() as $row){}
            
                   //Load session library 
                   $this->load->helper('url');
                   $this->session->set_userdata('side_menu_dept2',"Forum");
                  if(!isset($Dept_Id))
                      {
                        $this->load->view('file_inbox',$data);
                      }else if(isset($Dept_Id))
                      {
                        $kms_userid = $this->session->userdata('kms_emp_id');
                        $kms_user_deptid = $this->session->userdata('kms_access_user_dept_id');
                        $Kms_file_department_id = $Dept_Id;
                        $data['Selected_dept'] = $Dept_Id;
                        $Kms_file_department_results = $this->Kms_upload_model->Fetch_department_files($Kms_file_department_id,$kms_userid,$kms_user_deptid);
                  

                       $data['dataset'] = $Kms_file_department_results->result_array();
                
                        $this->session->set_userdata('side_menu_dept2',"Forum");
                        $this->load->helper('url');
                        $this->load->view('file_inbox',$data);
                    
                      }
                  else{}
               

      }else{
        $this->load->helper('url');
        redirect('/');
          }
 
    }


         //The function that will handle the news section on the administration dept
  public function File_Hub($Project_id)
  { $session_user_dept_id =  $this->session->userdata('kms_access_user_dept_id');//kms_emp_department
     
    if($this->session->userdata('kms_access_status') == 1){ 
                  //The forum menu as per department 
                  $data['Menu_item_00_01_00'] = "Management";
                  $data['Menu_item_00_01_01'] = "Administration";
                  $data['Menu_item_00_01_02'] = "Commercial";
                  $data['Menu_item_00_01_04'] = "Finance";
                  $data['Menu_item_00_01_08'] = "Design";
                  $data['Menu_item_00_01_03'] = "Design";
                  $data['Menu_item_00_01_07'] = "Supply Chain";
                  $data['Menu_item_00_01_05'] = "Maintenance";
                  $data['Menu_item_00_01_06'] = "Production";
                  $data['Menu_item_00_01_09'] = "I.T";
          //The customised user details
         if(isset($session_user_dept_id) && $session_user_dept_id == 2)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Management";
                  $data['Side_menu_title'] = "KMS - Management";
                  $data['Dept_name'] = "Management";
               
              
         }else if(isset($session_user_dept_id) && $session_user_dept_id == 5)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Production";
                  $data['Side_menu_title'] = "KMS - Production";
                  $data['Dept_name'] = "Production";
                 

         }else if(isset($session_user_dept_id) && $session_user_dept_id == 6)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Supply Chain";
                  $data['Side_menu_title'] = "KMS - Supply Chain";
                  $data['Dept_name'] = "Supply";
                 
         }else if(isset($session_user_dept_id) && $session_user_dept_id == 7)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Maintenance";
                  $data['Side_menu_title'] = "KMS - Maintenance";
                  $data['Dept_name'] = "Maintenance";
                 
         }
         else if(isset($session_user_dept_id) && $session_user_dept_id == 4)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Commercial";
                  $data['Side_menu_title'] = "KMS - Commercial";
                  $data['Dept_name'] = "Commercial";
               
         }else if(isset($session_user_dept_id) && $session_user_dept_id == 9)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | I.T";
                  $data['Side_menu_title'] = "KMS - I.T";
                  $data['Dept_name'] = "I.T";
                 
         }else if(isset($session_user_dept_id) && $session_user_dept_id == 8)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Design";
                  $data['Side_menu_title'] = "KMS - Design";
                  $data['Dept_name'] = "Design";
                
         }else if(isset($session_user_dept_id) && $session_user_dept_id == 3)
         {
                    //The view data to be used
                  $data['Home_tab_title'] = "KMS | Finance";
                  $data['Side_menu_title'] = "KMS - Finance";
                  $data['Dept_name'] = "Finance";
                
         }

                //The menu items on the I.T home side
                $data['Menu_item_00'] = "Communicate";
                $data['Menu_item_04'] = "Documents";

                //The submenu item for I.T home side
                $data['Menu_item_00_01'] = "Chat Forum";
            
                //The submenu item for i.t document side
                $data['Menu_item_04_01'] = "My Files";
                $data['Menu_item_04_02'] = "Inbox - Files";
                $data['Menu_item_04_03'] = "Files Hub ";
                $data['Menu_item_04_04'] = "Pdp ";
                $data['Menu_item_04_05'] = "Planning";

                
                    //The submenu item for events
                    $data['Menu_item_05_01'] = "Event scheduling";
                    $data['Menu_item_05_02'] = "Event Management";
                    $data['Menu_item_05_03'] = "New Event Creation";
                   
                    //The submenu item for elearning center
                    $data['Menu_item_06_01'] = "E Learning";
                    $data['Menu_item_06_02'] = "e-training";
                    $data['Menu_item_06_03'] = "Manuals";
                    $data['Menu_item_06_04'] = "Add Course";
                    $data['Menu_item_06_05'] ="New Training";

                    //The training categories
                    $data['Menu_item_06_04_01'] ="General"; 
                    $data['Menu_item_06_04_02'] ="Sales / Marketing"; 
                    $data['Menu_item_06_04_03'] ="Engineering"; 
                    $data['Menu_item_06_04_04'] ="Production"; 
                    $data['Menu_item_06_04_05'] ="Customized"; 
                    $data['Menu_item_06_04_06'] ="Category"; 

                    //The submenu item for user
                    $data['Menu_item_07_01'] = "Staff";
                    $data['Menu_item_07_02'] = "Users";
                     

                   // $data['menu_status'] = "EL";

                $kms_userid = $this->session->userdata('kms_emp_id');
                $kms_deptid = $this->session->userdata('kms_access_user_dept_id');
            
            
                   //Load session library 
                   $this->load->helper('url');
                   $this->session->set_userdata('side_menu_projects',"Forum");
                  

                   $Kms_project_results = $this->Projects->Fetch_Projects_details();
                   $data['data_project_lists'] = $Kms_project_results->result_array();
                   $data['Selected_project_id']  = $Project_id;

                if(isset($Project_id)) //This is to obtain the selected project i.d
                {
                  $data['Selected_project'] = $this->Projects->Fetch_Project_name($Project_id)->result_array();
                  $Kms_uploadedprojectfiles =$this->Projects->Fetch_all_uploadProjectfile($Project_id);

                  $data['Kms_userupload_results'] = $Kms_uploadedprojectfiles->result_array();
                 $this->load->view('file_hub',$data);
                 //echo 'The results as ->'.sizeof($data['Kms_userupload_results']);

                }
                else
                { 
                  $this->load->view('file_hub',$data);
                }

      }else{
        $this->load->helper('url');
        redirect('/');
          }
  }
     public function File_UploadPersonal_Forum()//
     {  $session_user_dept_id =  $this->session->userdata('kms_access_user_dept_id');//kms_emp_department
        if($this->session->userdata('kms_access_status') == 1)
        { 
              
                //The forum menu as per department 
                $data['Menu_item_00_01_00'] = "Management";
                $data['Menu_item_00_01_01'] = "Administration";
                $data['Menu_item_00_01_02'] = "Commercial";
                $data['Menu_item_00_01_04'] = "Finance";
                $data['Menu_item_00_01_08'] = "Design";
                $data['Menu_item_00_01_03'] = "Design";
                $data['Menu_item_00_01_07'] = "Supply Chain";
                $data['Menu_item_00_01_05'] = "Maintenance";
                $data['Menu_item_00_01_06'] = "Production";
                $data['Menu_item_00_01_09'] = "I.T";

               
          //The customised user details
          if(isset($session_user_dept_id) && $session_user_dept_id == 2)
          {
                  //The view data to be used
                $data['Home_tab_title'] = "KMS | Management";
                $data['Side_menu_title'] = "KMS - Management";
                $data['Dept_name'] = "Management";
              
            
          }else if(isset($session_user_dept_id) && $session_user_dept_id == 5)
          {
                  //The view data to be used
                $data['Home_tab_title'] = "KMS | Production";
                $data['Side_menu_title'] = "KMS - Production";
                $data['Dept_name'] = "Production";
                

          }else if(isset($session_user_dept_id) && $session_user_dept_id == 6)
          {
                  //The view data to be used
                $data['Home_tab_title'] = "KMS | Supply Chain";
                $data['Side_menu_title'] = "KMS - Supply Chain";
                $data['Dept_name'] = "Supply";
                
          }else if(isset($session_user_dept_id) && $session_user_dept_id == 7)
          {
                  //The view data to be used
                $data['Home_tab_title'] = "KMS | Maintenance";
                $data['Side_menu_title'] = "KMS - Maintenance";
                $data['Dept_name'] = "Maintenance";
                
          }
          else if(isset($session_user_dept_id) && $session_user_dept_id == 4)
          {
                  //The view data to be used
                $data['Home_tab_title'] = "KMS | Commercial";
                $data['Side_menu_title'] = "KMS - Commercial";
                $data['Dept_name'] = "Commercial";
              
          }else if(isset($session_user_dept_id) && $session_user_dept_id == 9)
          {
                  //The view data to be used
                $data['Home_tab_title'] = "KMS | I.T";
                $data['Side_menu_title'] = "KMS - I.T";
                $data['Dept_name'] = "I.T";
                
          }else if(isset($session_user_dept_id) && $session_user_dept_id == 8)
          {
                     //The view data to be used
                   $data['Home_tab_title'] = "KMS | Design";
                   $data['Side_menu_title'] = "KMS - Design";
                   $data['Dept_name'] = "Design";
                 
          }
          else if(isset($session_user_dept_id) && $session_user_dept_id == 3)
          {
                     //The view data to be used
                   $data['Home_tab_title'] = "KMS | Finance";
                   $data['Side_menu_title'] = "KMS - Finance";
                   $data['Dept_name'] = "Finance";
                 
          }
              //The menu items on the I.T home side
              $data['Menu_item_00'] = "Communicate";
              $data['Menu_item_04'] = "Documents";

              //The submenu item for I.T home side
              $data['Menu_item_00_01'] = "Chat Forum";
          
              //The submenu item for i.t document side
              $data['Menu_item_04_01'] = "My Files";
              $data['Menu_item_04_02'] = "Inbox - Files";
              $data['Menu_item_04_03'] = "Files Hub ";
              $data['Menu_item_04_04'] = "Pdp ";
              $data['Menu_item_04_05'] = "Planning";

              
                    //The submenu item for events
                    $data['Menu_item_05_01'] = "Event scheduling";
                    $data['Menu_item_05_02'] = "Event Management";
                    $data['Menu_item_05_03'] = "New Event Creation";
                   
                    //The submenu item for elearning center
                    $data['Menu_item_06_01'] = "E Learning";
                    $data['Menu_item_06_02'] = "e-training";
                    $data['Menu_item_06_03'] = "Manuals";
                    $data['Menu_item_06_04'] = "Add Course";
                    $data['Menu_item_06_05'] ="New Training";

                    //The training categories
                    $data['Menu_item_06_04_01'] ="General"; 
                    $data['Menu_item_06_04_02'] ="Sales / Marketing"; 
                    $data['Menu_item_06_04_03'] ="Engineering"; 
                    $data['Menu_item_06_04_04'] ="Production"; 
                    $data['Menu_item_06_04_05'] ="Customized"; 
                    $data['Menu_item_06_04_06'] ="Category"; 

                    //The submenu item for user
                    $data['Menu_item_07_01'] = "Staff";
                    $data['Menu_item_07_02'] = "Users";
                     

                    //$data['menu_status'] = "EL";

              $kms_userid = $this->session->userdata('kms_emp_id');
              $kms_deptid = $this->session->userdata('kms_access_user_dept_id');
          
     

              $errors= array();
              $file_name = $_FILES['kms_tech_uploadfile']['name'];
              $file_size = $_FILES['kms_tech_uploadfile']['size'];
              $file_tmp = $_FILES['kms_tech_uploadfile']['tmp_name'];
              $file_type = $_FILES['kms_tech_uploadfile']['type'];
              $file_ext1 = explode('.',$file_name);
              $file_ext2 = end($file_ext1);
              $file_ext = strtolower($file_ext2);
              $file_mod_date = date("F d Y H:i:s.", filemtime($file_tmp));

              $expensions= array("jpeg","jpg","png","pdf","ods","odt","doc","docx","dot","ppt","pptx","xlsx","xls","zip");
             // $expensions= array("pdf","odp");
                  
              if(in_array($file_ext,$expensions) === false){
                    $errors[]="extension not allowed, please choose only PDF file.";
                  }
                  
              if($file_size > 10000000) {
                    $errors[]='File size must be excately 10 MB';
                  }

              if(empty($errors)==true)
              {
            //$this->load->helper('url');
            if($this->input->post('kms_project_file_upload') == 3)
            { 
              $kms_upload_location = "/uploads/project_files/";
              $Uploaded_status = move_uploaded_file($file_tmp,"uploads/project_files/".str_replace(' ','-',$file_name));
            }
            else
            { $kms_upload_location = "/uploads/documents/";
              $Uploaded_status = move_uploaded_file($file_tmp,"uploads/documents/".str_replace(' ','-',$file_name));
            }
           

              if($Uploaded_status == true)
              {
                  //This displays a message when the upload was successfully done
 
                  //Then we pass on the details for the uploaed file to the model for database records as below
                  $kms_user_id  = $this->session->userdata('kms_emp_id');
                  $kms_uploaded_file = $file_name;
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

                      /*This is to seperate project file uploads with other normal uploads* */
                          if($this->input->post('kms_project_file_upload') == 3)
                          { $Project_id = $this->input->post('kms_project_file_selected');
                            $kms_upload_location = "/uploads/project_files/";
                            $Kms_file_upload_result = $this->Kms_upload_model->Upload_project_File($Project_id,$kms_user_id,$kms_uploaded_file,$kms_upload_location,$kms_upload_date,$kms_file_format,formatSizeUnits($file_size));
                  
                          }
                          else
                          { $kms_upload_location = "/uploads/documents/";
                            $Kms_file_upload_result = $this->Kms_upload_model->Upload_File($kms_user_id,$kms_uploaded_file,$kms_upload_location,$kms_upload_date,$kms_file_format,formatSizeUnits($file_size));
                  
                          }

                          //kms_profile_file_upload  $Project_upload_status = $this->input->post('kms_project_file_upload');

                         
                          if($Kms_file_upload_result != 0)
                          {
                                    //Define the alert message
                                  $data2['kms_doc_upload_success'] = 1;
                                  $data2['kms_doc_upload_message'] = "Your document has been successfully uploaded.";
                                  
                                  //add flash data 
                                  $this->session->set_flashdata('notice',$data2); 
                      
                                  

                                  if($this->input->post('kms_project_file_upload') == 3)
                                    { 
                                          $Kms_project_results = $this->Projects->Fetch_Projects_details();//This is to pass again the 
                                          $data['data_project_lists'] = $Kms_project_results->result_array();
                                          $data['Selected_project_id']  = $Project_id;

                                        if(isset($Project_id)) //This is to obtain the selected project i.d
                                        {
                                          $data['Selected_project'] = $this->Projects->Fetch_Project_name($Project_id)->result_array();
                                        }else{}


                                          $Kms_uploadedprojectfiles =$this->Kms_upload_model->Fetch_all_uploadProjectfile($this->input->post('kms_project_file_selected'));
                                          $data['Kms_userupload_results'] = $Kms_uploadedprojectfiles->result_array();
                                          //redirect('Forum/File_Hub/'.$this->input->post('kms_project_file_selected'));
                                          $this->load->helper('url');
                                         $this->load->view('file_hub',$data);
                                         //echo $this->input->post('kms_project_file_selected');
                                  
                                    }
                                    else
                                    {
                                          //Then we uploaded files on the server
                                          $Kms_uploadedfiles =$this->Kms_upload_model->Fetch_all_uploadfile_byuser($this->session->userdata('kms_emp_id'));
                                          $data['Kms_userupload_results'] = $Kms_uploadedfiles->result_array();
                                          $this->load->helper('url');
                                          $this->load->view('files',$data);
                                    }     
                                  
                                 
                             
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

                                  if($this->input->post('kms_project_file_upload') == 3)
                                    { 
                                      redirect('Forum/File_Hub/'.$this->input->post('kms_project_file_selected'));
                                    }
                                    else
                                    {
                                      $this->load->view('files',$data);
                                    }    
                                  
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
                                if($this->input->post('kms_project_file_upload') == 3)
                                { 
                                  redirect('Forum/File_Hub/'.$this->input->post('kms_project_file_selected'));
                                }
                                else
                                {
                                  $this->load->view('files',$data);
                                }    
              }
          
           

          }else{ 
                                //This displays a message when the upload was not done
                                //Define the alert message
                                $data2['kms_doc_upload_success'] = 0;
                                $data2['kms_doc_upload_message'] = "Please only upload PDF files";
                                
                                //add flash data 
                                $this->session->set_flashdata('notice',$data2); 

                                //Then we uploaded files on the server
                                $Kms_uploadedfiles =$this->Kms_upload_model->Fetch_all_uploadfile_byuser($this->session->userdata('kms_emp_id'));
                                $data['Kms_userupload_results'] = $Kms_uploadedfiles->result_array();
                                $this->load->helper('url');
                                
                                if($this->input->post('kms_project_file_upload') == 3)
                                    { 
                                      redirect('Forum/File_Hub/'.$this->input->post('kms_project_file_selected'));
                                    }
                                    else
                                    {
                                      $this->load->view('files',$data);
                                    }    
                          }
      }else{
    
        $this->load->helper('url');
        redirect('/');
          }
 
    }
//This to handle the user profile view and updating 
   public function Profile()
   {
    $session_user_dept_id =  $this->session->userdata('kms_access_user_dept_id');//kms_emp_department
    $session_user_id =  $this->session->userdata('kms_emp_id');//Emp user id   
    if($this->session->userdata('kms_access_status') == 1){
              //The chat forum departs as from the databsae modal as below
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
            //The customised user details
           if(isset($session_user_dept_id) && $session_user_dept_id == 2)
           {
                      //The view data to be used
                    $data['Home_tab_title'] = "KMS | Management";
                    $data['Side_menu_title'] = "KMS - Management";
                    $data['Dept_name'] = "Management";

           }else if(isset($session_user_dept_id) && $session_user_dept_id == 5)
           {
                      //The view data to be used
                    $data['Home_tab_title'] = "KMS | Production";
                    $data['Side_menu_title'] = "KMS - Production";
                    $data['Dept_name'] = "Production";

           }else if(isset($session_user_dept_id) && $session_user_dept_id == 6)
           {
                      //The view data to be used
                    $data['Home_tab_title'] = "KMS | Supply Chain";
                    $data['Side_menu_title'] = "KMS - Supply Chain";
                    $data['Dept_name'] = "Supply";

           }else if(isset($session_user_dept_id) && $session_user_dept_id == 7)
           {
                      //The view data to be used
                    $data['Home_tab_title'] = "KMS | Maintenance";
                    $data['Side_menu_title'] = "KMS - Maintenance";
                    $data['Dept_name'] = "Maintenance";

           }
           else if(isset($session_user_dept_id) && $session_user_dept_id == 4)
           {
                      //The view data to be used
                    $data['Home_tab_title'] = "KMS | Commercial";
                    $data['Side_menu_title'] = "KMS - Commercial";
                    $data['Dept_name'] = "Commercial";
                    //The menu items on the I.T home side

           }
           else if(isset($session_user_dept_id) && $session_user_dept_id == 9)
           {
                      //The view data to be used
                    $data['Home_tab_title'] = "KMS | I.T";
                    $data['Side_menu_title'] = "KMS - I.T";
                    $data['Dept_name'] = "I.T";
                   
           }
           else if(isset($session_user_dept_id) && $session_user_dept_id == 8)
           {
                      //The view data to be used
                    $data['Home_tab_title'] = "KMS | Design";
                    $data['Side_menu_title'] = "KMS - Design";
                    $data['Dept_name'] = "Design";   
           }
           else if(isset($session_user_dept_id) && $session_user_dept_id == 3)
           {
                      //The view data to be used
                    $data['Home_tab_title'] = "KMS | Finance";
                    $data['Side_menu_title'] = "KMS - Finance";
                    $data['Dept_name'] = "Finance";
                  
           }
                    //The menu items on 
                    $data['Menu_item_00'] = "Communicate";
                    $data['Menu_item_04'] = "Documents";

                    //The submenu item for I.T home side
                    $data['Menu_item_00_01'] = "Chat Forum";
                
                    //The submenu item for i.t document side
                    $data['Menu_item_04_01'] = "My Files";
                    $data['Menu_item_04_02'] = "Inbox - Files";
                    $data['Menu_item_04_03'] = "Files Hub ";
                    $data['Menu_item_04_04'] = "Pdp ";
                    $data['Menu_item_04_05'] = "Planning";

                    
                    //The submenu item for events
                    $data['Menu_item_05_01'] = "Event scheduling";
                    $data['Menu_item_05_02'] = "Event Management";
                    $data['Menu_item_05_03'] = "New Event Creation";
                   
                    //The submenu item for elearning center
                    $data['Menu_item_06_01'] = "E Learning";
                    $data['Menu_item_06_02'] = "e-training";
                    $data['Menu_item_06_03'] = "Manuals";
                    $data['Menu_item_06_04'] = "Add Course";
                    $data['Menu_item_06_05'] ="New Training";

                    //The training categories
                    $data['Menu_item_06_04_01'] ="General"; 
                    $data['Menu_item_06_04_02'] ="Sales / Marketing"; 
                    $data['Menu_item_06_04_03'] ="Engineering"; 
                    $data['Menu_item_06_04_04'] ="Production"; 
                    $data['Menu_item_06_04_05'] ="Customized"; 
                    $data['Menu_item_06_04_06'] ="Category"; 

                    //The submenu item for user
                    $data['Menu_item_07_01'] = "Staff";
                    $data['Menu_item_07_02'] = "Users";
                     

                    //$data['menu_status'] = "EL";
        
        //Obtain the current employee in the dataset
        $FetchEmployee_Result = $this->add_employee->Fetch_Employee_details($session_user_id);
        $data['Fetch_employee_date'] = $FetchEmployee_Result;
        //echo $FetchEmployee_Result;
        $this->load->view('profile',$data);
     
    }else{ 

          $this->load->helper('url');
          redirect('/');
    }
    
     
   }


   Public function Events()
      {   

        $session_user_dept_id =  $this->session->userdata('kms_access_user_dept_id');//kms_emp_department
         $session_user_id =  $this->session->userdata('kms_emp_id');//Emp user id    =  $this->session->userdata('kms_emp_id');//Emp user id   

        if($this->session->userdata('kms_access_status') == 1){
                     //The chat forum departs as from the databsae modal as below
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
             //The customised user details
            if(isset($session_user_dept_id) && $session_user_dept_id == 2)
            {
                       //The view data to be used
                     $data['Home_tab_title'] = "KMS | Management";
                     $data['Side_menu_title'] = "KMS - Management";
                     $data['Dept_name'] = "Management";
                     
            }else if(isset($session_user_dept_id) && $session_user_dept_id == 5)
            {
                       //The view data to be used
                     $data['Home_tab_title'] = "KMS | Production";
                     $data['Side_menu_title'] = "KMS - Production";
                     $data['Dept_name'] = "Production";
                   
   
            }else if(isset($session_user_dept_id) && $session_user_dept_id == 6)
            {
                       //The view data to be used
                     $data['Home_tab_title'] = "KMS | Supply Chain";
                     $data['Side_menu_title'] = "KMS - Supply Chain";
                     $data['Dept_name'] = "Supply";
               
            }else if(isset($session_user_dept_id) && $session_user_dept_id == 7)
            {
                       //The view data to be used
                     $data['Home_tab_title'] = "KMS | Maintenance";
                     $data['Side_menu_title'] = "KMS - Maintenance";
                     $data['Dept_name'] = "Maintenance";
              
            } else if(isset($session_user_dept_id) && $session_user_dept_id == 4)
            {
                       //The view data to be used
                     $data['Home_tab_title'] = "KMS | Commercial";
                     $data['Side_menu_title'] = "KMS - Commercial";
                     $data['Dept_name'] = "Commercial";
                   
            }
            else if(isset($session_user_dept_id) && $session_user_dept_id == 9)
            {
                       //The view data to be used
                     $data['Home_tab_title'] = "KMS | I.T";
                     $data['Side_menu_title'] = "KMS - I.T";
                     $data['Dept_name'] = "I.T";
                 
            }

            else if(isset($session_user_dept_id) && $session_user_dept_id == 8)
            {
                       //The view data to be used
                     $data['Home_tab_title'] = "KMS | Design";
                     $data['Side_menu_title'] = "KMS - Design";
                     $data['Dept_name'] = "Design";
                   
            }else if(isset($session_user_dept_id) && $session_user_dept_id == 3)
            {
                       //The view data to be used
                     $data['Home_tab_title'] = "KMS | Finance";
                     $data['Side_menu_title'] = "KMS - Finance";
                     $data['Dept_name'] = "Finance";
                   
            }
                    //The menu items on the I.T home side
                    $data['Menu_item_00'] = "Communicate";
                    $data['Menu_item_04'] = "Documents";

                    //The submenu item for I.T home side
                    $data['Menu_item_00_01'] = "Chat Forum";
                
                    //The submenu item for i.t document side
                    $data['Menu_item_04_01'] = "My Files";
                    $data['Menu_item_04_02'] = "Inbox - Files";
                    $data['Menu_item_04_03'] = "Files Hub ";
                    $data['Menu_item_04_04'] = "Pdp ";
                    $data['Menu_item_04_05'] = "Planning";

                    
                    //The submenu item for events
                    $data['Menu_item_05_01'] = "Event scheduling";
                    $data['Menu_item_05_02'] = "Event Management";
                    $data['Menu_item_05_03'] = "New Event Creation";
                   
                    //The submenu item for elearning center
                    $data['Menu_item_06_01'] = "E Learning";
                    $data['Menu_item_06_02'] = "e-training";
                    $data['Menu_item_06_03'] = "Manuals";
                    $data['Menu_item_06_04'] = "Add Course";
                    $data['Menu_item_06_05'] ="New Training";

                    //The training categories
                    $data['Menu_item_06_04_01'] ="General"; 
                    $data['Menu_item_06_04_02'] ="Sales / Marketing"; 
                    $data['Menu_item_06_04_03'] ="Engineering"; 
                    $data['Menu_item_06_04_04'] ="Production"; 
                    $data['Menu_item_06_04_05'] ="Customized"; 
                    $data['Menu_item_06_04_06'] ="Category"; 

                    //The submenu item for user
                    $data['Menu_item_07_01'] = "Staff";
                    $data['Menu_item_07_02'] = "Users";
                     

                    $data['menu_status'] = "EV";
                   

                    //Obtain the current Locations in the dataset
                    $FetchLocation_Result = $this->event->Fetch_Location_details();
                    $data['Emp_groups']   = $this->Chat->Obtain_emp_group()->result_array();
                   
                    $this->session->set_userdata('kms_event_location_list',$FetchLocation_Result->result_array());

                    //Then we fetch the available event created by the user as below
                    $Fetch_Available_event = $this->event->Fetch_All_Events($session_user_id);
                    $data['Fetch_all_events'] = $Fetch_Available_event->result_array();
                    

                    $this->load->view('events',$data);
              }else{ 

                    $this->load->helper('url');
                    redirect('/');
              }  
      }

      Public function New_Event()
          {
            $session_user_dept_id =  $this->session->userdata('kms_access_user_dept_id');//kms_emp_department
            $session_user_id =  $this->session->userdata('kms_emp_id');//Emp user id    =  $this->session->userdata('kms_emp_id');//Emp user id   
   
            if($this->session->userdata('kms_access_status') == 1){
                         //The chat forum departs as from the databsae modal as below
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
                 //The customised user details
                if(isset($session_user_dept_id) && $session_user_dept_id == 2)
                {
                           //The view data to be used
                         $data['Home_tab_title'] = "KMS | Management";
                         $data['Side_menu_title'] = "KMS - Management";
                         $data['Dept_name'] = "Management";
                         
                }else if(isset($session_user_dept_id) && $session_user_dept_id == 5)
                {
                           //The view data to be used
                         $data['Home_tab_title'] = "KMS | Production";
                         $data['Side_menu_title'] = "KMS - Production";
                         $data['Dept_name'] = "Production";
                       
       
                }else if(isset($session_user_dept_id) && $session_user_dept_id == 6)
                {
                           //The view data to be used
                         $data['Home_tab_title'] = "KMS | Supply Chain";
                         $data['Side_menu_title'] = "KMS - Supply Chain";
                         $data['Dept_name'] = "Supply";
                   
                }else if(isset($session_user_dept_id) && $session_user_dept_id == 7)
                {
                           //The view data to be used
                         $data['Home_tab_title'] = "KMS | Maintenance";
                         $data['Side_menu_title'] = "KMS - Maintenance";
                         $data['Dept_name'] = "Maintenance";
                  
                } else if(isset($session_user_dept_id) && $session_user_dept_id == 4)
                {
                           //The view data to be used
                         $data['Home_tab_title'] = "KMS | Commercial";
                         $data['Side_menu_title'] = "KMS - Commercial";
                         $data['Dept_name'] = "Commercial";
                       
                }
                else if(isset($session_user_dept_id) && $session_user_dept_id == 9)
                {
                           //The view data to be used
                         $data['Home_tab_title'] = "KMS | I.T";
                         $data['Side_menu_title'] = "KMS - I.T";
                         $data['Dept_name'] = "I.T";
                     
                }
    
                else if(isset($session_user_dept_id) && $session_user_dept_id == 8)
                {
                           //The view data to be used
                         $data['Home_tab_title'] = "KMS | Design";
                         $data['Side_menu_title'] = "KMS - Design";
                         $data['Dept_name'] = "Design";
                       
                }else if(isset($session_user_dept_id) && $session_user_dept_id == 3)
                {
                           //The view data to be used
                         $data['Home_tab_title'] = "KMS | Finance";
                         $data['Side_menu_title'] = "KMS - Finance";
                         $data['Dept_name'] = "Finance";
                       
                }
                        //The menu items on the I.T home side
                        $data['Menu_item_00'] = "Communicate";
                        $data['Menu_item_04'] = "Documents";
    
                        //The submenu item for I.T home side
                        $data['Menu_item_00_01'] = "Chat Forum";
                    
                        //The submenu item for i.t document side
                        $data['Menu_item_04_01'] = "My Files";
                        $data['Menu_item_04_02'] = "Inbox - Files";
                        $data['Menu_item_04_03'] = "Files Hub ";
                        $data['Menu_item_04_04'] = "Pdp ";
                        $data['Menu_item_04_05'] = "Planning";
    
                        //The submenu item for events
                        $data['Menu_item_05_01'] = "Event scheduling";
                        $data['Menu_item_05_02'] = "Event Management";
                        $data['Menu_item_05_03'] = "New Event Creation";
                        
                            
                        //The submenu item for events
                        $data['Menu_item_05_01'] = "Event scheduling";
                        $data['Menu_item_05_02'] = "Event Management";
                        $data['Menu_item_05_03'] = "New Event Creation";
                      
                        //The submenu item for elearning center
                        $data['Menu_item_06_01'] = "E Learning";
                        $data['Menu_item_06_02'] = "e-training";
                        $data['Menu_item_06_03'] = "Manuals";
                        $data['Menu_item_06_04'] = "Add Course";
                        $data['Menu_item_06_05'] ="New Training";

                        //The training categories
                        $data['Menu_item_06_04_01'] ="General"; 
                        $data['Menu_item_06_04_02'] ="Sales / Marketing"; 
                        $data['Menu_item_06_04_03'] ="Engineering"; 
                        $data['Menu_item_06_04_04'] ="Production"; 
                        $data['Menu_item_06_04_05'] ="Customized"; 
                        $data['Menu_item_06_04_06'] ="Category"; 

                        //The submenu item for user
                        $data['Menu_item_07_01'] = "Staff";
                        $data['Menu_item_07_02'] = "Users";
                        

                        //$data['menu_status'] = "EL";
    
                       //Obtain the current Locations in the dataset
                       $FetchLocation_Result = $this->event->Fetch_Location_details();
                       
                       //Then we obtain the user form data as below
                       $kms_event_name         = $this->input->post("kms_input_event_name");
                       $kms_event_location     = $this->input->post("kms_input_event_location");
                       $kms_event_paticipants_singles     = $this->input->post("Kms_input_hidden_recip");
                       $kms_event_paticipants_departments = $this->input->post("Kms_input_hidden_forum");
                       $kms_event_paticipants_group       = $this->input->post("Kms_input_hidden_group");
                       $kms_event_date = date("Y-m-d", strtotime($this->input->post("kms_input_event_date")));
                       $kms_event_time = $this->input->post("kms_input_event_time");
                      
                       //The current date and time
                       $kms_event_current_time = date("H:i:s");
                       $kms_event_current_date = date("Y-m-d");

                       //Obtain the current employee in the dataset
                      $FetchEvent_Result = $this->event->Register_New_Event($kms_event_location,$kms_event_date,$kms_event_time,$kms_event_name,$kms_event_paticipants_singles,$kms_event_paticipants_departments,$kms_event_paticipants_group);
                      //Then we fetch the available event created by the user as below
                      $Fetch_Available_event = $this->event->Fetch_All_Events($session_user_id);

                      if(isset($FetchEvent_Result) && $FetchEvent_Result == "888")
                        {
                          //echo "Event registered";
                          $data['Fetch_allevent_results'] = $FetchEvent_Result;

                          $data2['Emp_save_message'] ="Event successfully created";
                          $data2['Emp_save_success'] = 1;
                           //add flash data 
                          $this->session->set_flashdata('notice',$data2); 
                          $this->session->set_userdata('kms_event_location_list',$FetchLocation_Result->result_array());

                         
                          $data['Fetch_all_events'] = $Fetch_Available_event->result_array();
                    
                          $this->load->view('events',$data);
                        }else
                        {
                         // echo "Not registered";
                        
                           $data['Fetch_allevent_results'] = $FetchEvent_Result;

                           $data2['Emp_save_message'] ="Event NOT created,Try again";
                           $data2['Emp_save_success'] = 0;
                            //add flash data 
                           $this->session->set_flashdata('notice',$data2); 
                           $data['Fetch_all_events'] = $Fetch_Available_event->result_array();
                           $this->load->view('events',$data);
                        }
                   
    
                  }else{ 
    
                        $this->load->helper('url');
                        redirect('/');
                  }
          }

          public function ELearning()
          {
            $session_user_dept_id =  $this->session->userdata('kms_access_user_dept_id');//kms_emp_department
            $session_user_id =  $this->session->userdata('kms_emp_id');//Emp user id    =  $this->session->userdata('kms_emp_id');//Emp user id   
   
            if($this->session->userdata('kms_access_status') == 1){
                         //The chat forum departs as from the databsae modal as below
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
                 //The customised user details
                if(isset($session_user_dept_id) && $session_user_dept_id == 2)
                {
                           //The view data to be used
                         $data['Home_tab_title'] = "KMS | Management";
                         $data['Side_menu_title'] = "KMS - Management";
                         $data['Dept_name'] = "Management";
                         
                }else if(isset($session_user_dept_id) && $session_user_dept_id == 5)
                {
                           //The view data to be used
                         $data['Home_tab_title'] = "KMS | Production";
                         $data['Side_menu_title'] = "KMS - Production";
                         $data['Dept_name'] = "Production";
                       
       
                }else if(isset($session_user_dept_id) && $session_user_dept_id == 6)
                {
                           //The view data to be used
                         $data['Home_tab_title'] = "KMS | Supply Chain";
                         $data['Side_menu_title'] = "KMS - Supply Chain";
                         $data['Dept_name'] = "Supply";
                   
                }else if(isset($session_user_dept_id) && $session_user_dept_id == 7)
                {
                           //The view data to be used
                         $data['Home_tab_title'] = "KMS | Maintenance";
                         $data['Side_menu_title'] = "KMS - Maintenance";
                         $data['Dept_name'] = "Maintenance";
                  
                } else if(isset($session_user_dept_id) && $session_user_dept_id == 4)
                {
                           //The view data to be used
                         $data['Home_tab_title'] = "KMS | Commercial";
                         $data['Side_menu_title'] = "KMS - Commercial";
                         $data['Dept_name'] = "Commercial";
                       
                }
                else if(isset($session_user_dept_id) && $session_user_dept_id == 9)
                {
                           //The view data to be used
                         $data['Home_tab_title'] = "KMS | I.T";
                         $data['Side_menu_title'] = "KMS - I.T";
                         $data['Dept_name'] = "I.T";
                     
                }
    
                else if(isset($session_user_dept_id) && $session_user_dept_id == 8)
                {
                           //The view data to be used
                         $data['Home_tab_title'] = "KMS | Design";
                         $data['Side_menu_title'] = "KMS - Design";
                         $data['Dept_name'] = "Design";
                       
                }else if(isset($session_user_dept_id) && $session_user_dept_id == 3)
                {
                         //The view data to be used
                         $data['Home_tab_title'] = "KMS | Finance";
                         $data['Side_menu_title'] = "KMS - Finance";
                         $data['Dept_name'] = "Finance";
                       
                }
                        //The menu items on the I.T home side
                        $data['Menu_item_00'] = "Communicate";
                        $data['Menu_item_04'] = "Documents";
    
                        //The submenu item for I.T home side
                        $data['Menu_item_00_01'] = "Chat Forum";
                    
                        //The submenu item for i.t document side
                        $data['Menu_item_04_01'] = "My Files";
                        $data['Menu_item_04_02'] = "Inbox - Files";
                        $data['Menu_item_04_03'] = "Files Hub ";
                        $data['Menu_item_04_04'] = "Pdp ";
                        $data['Menu_item_04_05'] = "Planning";
    
                        //The submenu item for events
                        $data['Menu_item_05_01'] = "Event scheduling";
                        $data['Menu_item_05_02'] = "Event Management";
                        $data['Menu_item_05_03'] = "New Event Creation";
                       
                        //The submenu item for elearning center
                        $data['Menu_item_06_01'] = "E Learning";
                        $data['Menu_item_06_02'] = "e-training";
                        $data['Menu_item_06_03'] = "Manuals";
                        $data['Menu_item_06_04'] = "Add Course";
                        $data['Menu_item_06_05'] ="New Training";

                        //The training categories
                        $data['Menu_item_06_04_01'] ="General"; 
                        $data['Menu_item_06_04_02'] ="Sales / Marketing"; 
                        $data['Menu_item_06_04_03'] ="Engineering"; 
                        $data['Menu_item_06_04_04'] ="Production"; 
                        $data['Menu_item_06_04_05'] ="Customized"; 
                        $data['Menu_item_06_04_06'] ="Category"; 
                         
                        //The submenu item for user
                        $data['Menu_item_07_01'] = "Staff";
                        $data['Menu_item_07_02'] = "Users";

                        $data['menu_status'] = "EL";
                        
                        //Then we fetch the available etraining categories as below
                        $Fetch_etraining_categories= $this->etraining->Fetch_category_details()->result_array();
                        $data['etraining_cateogries'] = $Fetch_etraining_categories; 

                        //Then we obtained the count of the available training categories
                        $Fetch_etraining_count   = $this->etraining->Count_etraining();
                        $data['etraining_count'] = $Fetch_etraining_count;

                        //Then we find the elearning details per category
                        $Fetch_etraining_elearning    = $this->etraining->Fetch_etraining();
                        $data['etraining_available']  = $Fetch_etraining_elearning;
                         
                        //Then we obtain the etraining enrollment details
                        $Ftech_etraining_enrolls    =  $this->etraining->Fetch_enrolls($session_user_id);
                        $data['etraining_enroll']   = $Ftech_etraining_enrolls;

                       // echo $Ftech_etraining_enrolls.length();
                       $this->load->view('elearning',$data);
    
          }else
          {
            $this->load->helper('url');
            redirect('/');
          }
        
        }


        public function New_ELearning()
        {
          $session_user_dept_id =  $this->session->userdata('kms_access_user_dept_id');//kms_emp_department
          $session_user_id =  $this->session->userdata('kms_emp_id');//Emp user id    =  $this->session->userdata('kms_emp_id');//Emp user id   
       
          if($this->session->userdata('kms_access_status') == 1){
                       //The chat forum departs as from the databsae modal as below
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
               //The customised user details
              if(isset($session_user_dept_id) && $session_user_dept_id == 2)
              {
                         //The view data to be used
                       $data['Home_tab_title'] = "KMS | Management";
                       $data['Side_menu_title'] = "KMS - Management";
                       $data['Dept_name'] = "Management";
                       
              }else if(isset($session_user_dept_id) && $session_user_dept_id == 5)
              {
                         //The view data to be used
                       $data['Home_tab_title'] = "KMS | Production";
                       $data['Side_menu_title'] = "KMS - Production";
                       $data['Dept_name'] = "Production";
                     
     
              }else if(isset($session_user_dept_id) && $session_user_dept_id == 6)
              {
                         //The view data to be used
                       $data['Home_tab_title'] = "KMS | Supply Chain";
                       $data['Side_menu_title'] = "KMS - Supply Chain";
                       $data['Dept_name'] = "Supply";
                 
              }else if(isset($session_user_dept_id) && $session_user_dept_id == 7)
              {
                         //The view data to be used
                       $data['Home_tab_title'] = "KMS | Maintenance";
                       $data['Side_menu_title'] = "KMS - Maintenance";
                       $data['Dept_name'] = "Maintenance";
                
              } else if(isset($session_user_dept_id) && $session_user_dept_id == 4)
              {
                         //The view data to be used
                       $data['Home_tab_title'] = "KMS | Commercial";
                       $data['Side_menu_title'] = "KMS - Commercial";
                       $data['Dept_name'] = "Commercial";
                     
              }
              else if(isset($session_user_dept_id) && $session_user_dept_id == 9)
              {
                         //The view data to be used
                       $data['Home_tab_title'] = "KMS | I.T";
                       $data['Side_menu_title'] = "KMS - I.T";
                       $data['Dept_name'] = "I.T";
                   
              }
  
              else if(isset($session_user_dept_id) && $session_user_dept_id == 8)
              {
                         //The view data to be used
                       $data['Home_tab_title'] = "KMS | Design";
                       $data['Side_menu_title'] = "KMS - Design";
                       $data['Dept_name'] = "Design";
                     
              }else if(isset($session_user_dept_id) && $session_user_dept_id == 3)
              {
                       //The view data to be used
                       $data['Home_tab_title'] = "KMS | Finance";
                       $data['Side_menu_title'] = "KMS - Finance";
                       $data['Dept_name'] = "Finance";
                     
              }
                      //The menu items on the I.T home side
                      $data['Menu_item_00'] = "Communicate";
                      $data['Menu_item_04'] = "Documents";
  
                      //The submenu item for I.T home side
                      $data['Menu_item_00_01'] = "Chat Forum";
                  
                      //The submenu item for i.t document side
                      $data['Menu_item_04_01'] = "My Files";
                      $data['Menu_item_04_02'] = "Inbox - Files";
                      $data['Menu_item_04_03'] = "Files Hub ";
                      $data['Menu_item_04_04'] = "Pdp ";
                      $data['Menu_item_04_05'] = "Planning";
  
                    
                    //The submenu item for events
                    $data['Menu_item_05_01'] = "Event scheduling";
                    $data['Menu_item_05_02'] = "Event Management";
                    $data['Menu_item_05_03'] = "New Event Creation";
                   
                    //The submenu item for elearning center
                    $data['Menu_item_06_01'] = "E Learning";
                    $data['Menu_item_06_02'] = "e-training";
                    $data['Menu_item_06_03'] = "Manuals";
                    $data['Menu_item_06_04'] = "Add Course";
                    $data['Menu_item_06_05'] ="New Training";

                    //The training categories
                    $data['Menu_item_06_04_01'] ="General"; 
                    $data['Menu_item_06_04_02'] ="Sales / Marketing"; 
                    $data['Menu_item_06_04_03'] ="Engineering"; 
                    $data['Menu_item_06_04_04'] ="Production"; 
                    $data['Menu_item_06_04_05'] ="Customized"; 
                    $data['Menu_item_06_04_06'] ="Category"; 

                    //The submenu item for user
                    $data['Menu_item_07_01'] = "Staff";
                    $data['Menu_item_07_02'] = "Users";
                     

                    $data['menu_status'] = "EL";
                      
                       //Then we obtain the etraining form data as below
                       $kms_etraining_name         = $this->input->post("kms_input_training_name");
                       $kms_etraining_descptn      = $this->input->post("kms_input_training_description");
                       $kms_etraining_instruct     = $this->input->post("kms_input_training_instructor");
                       $kms_etraining_catergory    = $this->input->post("kms_input_etraining_category");
                      
                       //The current date and time
                       $kms_etraining_current_time = date("H:i:s");
                       $kms_etraining_current_date = date("Y-m-d");
 

                      //The creation of the new training details as below
                      $kms_etraining_new_results = $this->etraining->New_etraining($kms_etraining_name,$kms_etraining_descptn,$kms_etraining_instruct,$kms_etraining_catergory,$kms_etraining_current_date);

                      $data['menu_status'] = "EL";
                      //Then we fetch the available etraining categories as below
                      $Fetch_etraining_categories= $this->etraining->Fetch_category_details()->result_array();
                      $data['etraining_cateogries'] = $Fetch_etraining_categories; 

                      //The we obtained the count of the available training categories
                      $Fetch_etraining_count   = $this->etraining->Count_etraining();
                      $data['etraining_count'] = $Fetch_etraining_count;

                      if(isset($kms_etraining_new_results) && $kms_etraining_new_results == "888")
                      {
                       
                        $data2['Emp_save_message'] ="E-Training successfully created";
                        $data2['Emp_save_success'] = 1;
                      
                        $this->session->set_flashdata('notice',$data2); 
                       // $this->load->view('elearning',$data);
                       redirect('Forum/ELearning');
                       
                      }else
                      {
                       // echo "Not registered";

                         $data2['Emp_save_message'] ="Event NOT created,Try again";
                         $data2['Emp_save_success'] = 0;
                        
                         $this->session->set_flashdata('notice',$data2); 
                         $this->load->view('elearning',$data);
                      }

        }else
        {
          $this->load->helper('url');
          redirect('/');
        }
      
      }
    

      
      public function etraining($etraining_id)
      {
        $session_user_dept_id =  $this->session->userdata('kms_access_user_dept_id');//kms_emp_department
        $session_user_id =  $this->session->userdata('kms_emp_id');//Emp user id    =  $this->session->userdata('kms_emp_id');//Emp user id   

        if($this->session->userdata('kms_access_status') == 1){
                     //The chat forum departs as from the databsae modal as below
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
             //The customised user details
            if(isset($session_user_dept_id) && $session_user_dept_id == 2)
            {
                       //The view data to be used
                     $data['Home_tab_title'] = "KMS | Management";
                     $data['Side_menu_title'] = "KMS - Management";
                     $data['Dept_name'] = "Management";
                     
            }else if(isset($session_user_dept_id) && $session_user_dept_id == 5)
            {
                       //The view data to be used
                     $data['Home_tab_title'] = "KMS | Production";
                     $data['Side_menu_title'] = "KMS - Production";
                     $data['Dept_name'] = "Production";
                   
   
            }else if(isset($session_user_dept_id) && $session_user_dept_id == 6)
            {
                       //The view data to be used
                     $data['Home_tab_title'] = "KMS | Supply Chain";
                     $data['Side_menu_title'] = "KMS - Supply Chain";
                     $data['Dept_name'] = "Supply";
               
            }else if(isset($session_user_dept_id) && $session_user_dept_id == 7)
            {
                       //The view data to be used
                     $data['Home_tab_title'] = "KMS | Maintenance";
                     $data['Side_menu_title'] = "KMS - Maintenance";
                     $data['Dept_name'] = "Maintenance";
              
            } else if(isset($session_user_dept_id) && $session_user_dept_id == 4)
            {
                       //The view data to be used
                     $data['Home_tab_title'] = "KMS | Commercial";
                     $data['Side_menu_title'] = "KMS - Commercial";
                     $data['Dept_name'] = "Commercial";
                   
            }
            else if(isset($session_user_dept_id) && $session_user_dept_id == 9)
            {
                       //The view data to be used
                     $data['Home_tab_title'] = "KMS | I.T";
                     $data['Side_menu_title'] = "KMS - I.T";
                     $data['Dept_name'] = "I.T";
                 
            }

            else if(isset($session_user_dept_id) && $session_user_dept_id == 8)
            {
                       //The view data to be used
                     $data['Home_tab_title'] = "KMS | Design";
                     $data['Side_menu_title'] = "KMS - Design";
                     $data['Dept_name'] = "Design";
                   
            }else if(isset($session_user_dept_id) && $session_user_dept_id == 3)
            {
                     //The view data to be used
                     $data['Home_tab_title'] = "KMS | Finance";
                     $data['Side_menu_title'] = "KMS - Finance";
                     $data['Dept_name'] = "Finance";
                   
            }
                    //The menu items on the I.T home side
                    $data['Menu_item_00'] = "Communicate";
                    $data['Menu_item_04'] = "Documents";

                    //The submenu item for I.T home side
                    $data['Menu_item_00_01'] = "Chat Forum";
                
                    //The submenu item for i.t document side
                    $data['Menu_item_04_01'] = "My Files";
                    $data['Menu_item_04_02'] = "Inbox - Files";
                    $data['Menu_item_04_03'] = "Files Hub ";
                    $data['Menu_item_04_04'] = "Pdp ";
                    $data['Menu_item_04_05'] = "Planning";

                    //The submenu item for events
                    $data['Menu_item_05_01'] = "Event scheduling";
                    $data['Menu_item_05_02'] = "Event Management";
                    $data['Menu_item_05_03'] = "New Event Creation";
                   
                    //The submenu item for elearning center
                    $data['Menu_item_06_01'] = "E Learning";
                    $data['Menu_item_06_02'] = "e-training";
                    $data['Menu_item_06_03'] = "Manuals";
                    $data['Menu_item_06_04'] = "Add Course";
                    $data['Menu_item_06_05'] ="New Training";

                    //The training categories
                    $data['Menu_item_06_04_01'] ="General"; 
                    $data['Menu_item_06_04_02'] ="Sales / Marketing"; 
                    $data['Menu_item_06_04_03'] ="Engineering"; 
                    $data['Menu_item_06_04_04'] ="Production"; 
                    $data['Menu_item_06_04_05'] ="Customized"; 
                    $data['Menu_item_06_04_06'] ="Category"; 

                    //The submenu item for user
                    $data['Menu_item_07_01'] = "Staff";
                    $data['Menu_item_07_02'] = "Users";
                     

                    $data['menu_status'] = "EL";
                    
                    //Then we fetch the available etraining categories as below
                    $Fetch_etraining_categories= $this->etraining->Fetch_category_details()->result_array();
                    $data['etraining_cateogries'] = $Fetch_etraining_categories; 

                    //The we find the elearning details per category
                    $Fetch_etraining_elearning    = $this->etraining->Fetch_etraining();
                    $data['etraining_available']  = $Fetch_etraining_elearning;
                     //add flash data 
                   
                    //The we obtained the count of the available training categories
                    $Fetch_etraining_count   = $this->etraining->Count_etraining();
                    $data['etraining_count'] = $Fetch_etraining_count;

                     //The we obtained the count of the available instrustor
                     $Fetch_etraining_count3   = $this->etraining->Count_etraining_perInst($etraining_id);
                     $data['etraining_count_ins'] = $Fetch_etraining_count3;

                    //The we obtained the count of the available training categories
                    $Fetch_etraining_count2   = $this->etraining->View_etraininng($etraining_id);
                    $data['etraining_view']   = $Fetch_etraining_count2;
                   
                    //The we obtained the count of the available training categories
                    $Fetch_etraining_skills   = $this->etraining->View_skills($etraining_id);
                    $data['etraining_skill']  = $Fetch_etraining_skills;

                    //This will return the etraining content files to be added on the content
                    $Fetch_content_files      = $this->etraining->List_MyFiles($session_user_id);
                    $data['etraining_infile'] = $Fetch_content_files;

                    //This will return the etraining contents as created by the user
                    $Fetch_etraining_contents = $this->etraining->List_TrainingContent($etraining_id);
                    $data['etraining_content']= $Fetch_etraining_contents;

                    //We then obtain the conternt internal files as below
                    $Fetch_content_intfiles   = $this->etraining->ListContentFiles($etraining_id);

                    //This shall return the count of the enrolled per slected training
                    $Fetch_enroll_count     =  $this->etraining->Enroll_Count($etraining_id);
                    $data['enroll_count']   = $Fetch_enroll_count;

                    //Then we obtain the etraining enrollment details
                    $Ftech_etraining_enrolls    = $this->etraining->Fetch_enrolls($session_user_id);
                    $data['etraining_enroll']   = $Ftech_etraining_enrolls;
                    
                    //This shall return all the register videos as below
                    $Fetch_etraining_videos =  $this->etraining->Fetch_Videos();
                    $data['etraining_video']= $Fetch_etraining_videos;

                    
                   //echo " The user id ".$session_user_id;
                    $this->load->view('viewtraining',$data);
 
                  }else
                  {
                    $this->load->helper('url');
                    redirect('/');
                  }
      }



      public function New_Skill()
      {
        $session_user_dept_id =  $this->session->userdata('kms_access_user_dept_id');//kms_emp_department
        $session_user_id =  $this->session->userdata('kms_emp_id');//Emp user id    =  $this->session->userdata('kms_emp_id');//Emp user id   
     
        if($this->session->userdata('kms_access_status') == 1){
                     //The chat forum departs as from the databsae modal as below
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
             //The customised user details
            if(isset($session_user_dept_id) && $session_user_dept_id == 2)
            {
                       //The view data to be used
                     $data['Home_tab_title'] = "KMS | Management";
                     $data['Side_menu_title'] = "KMS - Management";
                     $data['Dept_name'] = "Management";
                     
            }else if(isset($session_user_dept_id) && $session_user_dept_id == 5)
            {
                       //The view data to be used
                     $data['Home_tab_title'] = "KMS | Production";
                     $data['Side_menu_title'] = "KMS - Production";
                     $data['Dept_name'] = "Production";
                   
   
            }else if(isset($session_user_dept_id) && $session_user_dept_id == 6)
            {
                       //The view data to be used
                     $data['Home_tab_title'] = "KMS | Supply Chain";
                     $data['Side_menu_title'] = "KMS - Supply Chain";
                     $data['Dept_name'] = "Supply";
               
            }else if(isset($session_user_dept_id) && $session_user_dept_id == 7)
            {
                       //The view data to be used
                     $data['Home_tab_title'] = "KMS | Maintenance";
                     $data['Side_menu_title'] = "KMS - Maintenance";
                     $data['Dept_name'] = "Maintenance";
              
            } else if(isset($session_user_dept_id) && $session_user_dept_id == 4)
            {
                       //The view data to be used
                     $data['Home_tab_title'] = "KMS | Commercial";
                     $data['Side_menu_title'] = "KMS - Commercial";
                     $data['Dept_name'] = "Commercial";
                   
            }
            else if(isset($session_user_dept_id) && $session_user_dept_id == 9)
            {
                       //The view data to be used
                     $data['Home_tab_title'] = "KMS | I.T";
                     $data['Side_menu_title'] = "KMS - I.T";
                     $data['Dept_name'] = "I.T";
                 
            }

            else if(isset($session_user_dept_id) && $session_user_dept_id == 8)
            {
                       //The view data to be used
                     $data['Home_tab_title'] = "KMS | Design";
                     $data['Side_menu_title'] = "KMS - Design";
                     $data['Dept_name'] = "Design";
                   
            }else if(isset($session_user_dept_id) && $session_user_dept_id == 3)
            {
                     //The view data to be used
                     $data['Home_tab_title'] = "KMS | Finance";
                     $data['Side_menu_title'] = "KMS - Finance";
                     $data['Dept_name'] = "Finance";
                   
            }
                    //The menu items on the I.T home side
                    $data['Menu_item_00'] = "Communicate";
                    $data['Menu_item_04'] = "Documents";

                    //The submenu item for I.T home side
                    $data['Menu_item_00_01'] = "Chat Forum";
                
                    //The submenu item for i.t document side
                    $data['Menu_item_04_01'] = "My Files";
                    $data['Menu_item_04_02'] = "Inbox - Files";
                    $data['Menu_item_04_03'] = "Files Hub ";
                    $data['Menu_item_04_04'] = "Pdp ";
                    $data['Menu_item_04_05'] = "Planning";

                  
                  //The submenu item for events
                  $data['Menu_item_05_01'] = "Event scheduling";
                  $data['Menu_item_05_02'] = "Event Management";
                  $data['Menu_item_05_03'] = "New Event Creation";
                 
                  //The submenu item for elearning center
                  $data['Menu_item_06_01'] = "E Learning";
                  $data['Menu_item_06_02'] = "e-training";
                  $data['Menu_item_06_03'] = "Manuals";
                  $data['Menu_item_06_04'] = "Add Course";
                  $data['Menu_item_06_05'] ="New Training";

                  //The training categories
                  $data['Menu_item_06_04_01'] ="General"; 
                  $data['Menu_item_06_04_02'] ="Sales / Marketing"; 
                  $data['Menu_item_06_04_03'] ="Engineering"; 
                  $data['Menu_item_06_04_04'] ="Production"; 
                  $data['Menu_item_06_04_05'] ="Customized"; 
                  $data['Menu_item_06_04_06'] ="Category"; 

                  //The submenu item for user
                  $data['Menu_item_07_01'] = "Staff";
                  $data['Menu_item_07_02'] = "Users";
                   

                  $data['menu_status'] = "EL";
                    
                  //Then we obtain the etraining form data as below
                  $kms_etraining_skill      = $this->input->post("kms_input_etraining_skill");
                  $kms_etraining_id         = $this->input->post("Kms_input_hidden_etraining_id");
                   
                  //The creation of the new training details as below
                    $kms_etraining_skill_res = $this->etraining->New_etraining_skill($kms_etraining_skill,$kms_etraining_id);

                    //Then we fetch the available etraining categories as below
                    $Fetch_etraining_categories   = $this->etraining->Fetch_category_details()->result_array();
                    $data['etraining_cateogries'] = $Fetch_etraining_categories; 
                    
                   
                    //The we find the elearning details per category
                    $Fetch_etraining_elearning    = $this->etraining->Fetch_etraining();
                    $data['etraining_available']  = $Fetch_etraining_elearning;
                    //add flash data 

                    //The we obtained the count of the available training categories
                    $Fetch_etraining_count   = $this->etraining->Count_etraining();
                    $data['etraining_count'] = $Fetch_etraining_count;

                    //The we obtained the count of the available training categories
                    $Fetch_etraining_count2   = $this->etraining->View_etraininng($kms_etraining_id);
                    $data['etraining_view']   = $Fetch_etraining_count2;

                    //$this->session->set_flashdata('notice',$data2);  etraining($etraining_id)
                    //$this->load->view('viewtraining',$data);
                    redirect('Forum/etraining/'.$kms_etraining_id);

      }else
      {
        $this->load->helper('url');
        redirect('/');
      }
    
    }


    public function Edit_Training()
    {         
              //Then we obtain the etraining form data as below
              $kms_etraining_name         = $this->input->post("kms_input_training_name_edit");
              $kms_etraining_descptn      = $this->input->post("kms_input_training_description_edit");
              $kms_etraining_instruct     = $this->input->post("kms_input_training_instructor_edit");
              $kms_etraining_catergory    = $this->input->post("kms_input_etraining_category_edit");
              $kms_etraining_id           = $this->input->post("Kms_input_hidden_training_edit");
             
              $kms_etraining_edit_results  = $this->etraining->Edit_etraining($kms_etraining_name,$kms_etraining_descptn,$kms_etraining_instruct,$kms_etraining_catergory,$kms_etraining_id);

              
              if(isset($kms_etraining_edit_results) && $kms_etraining_edit_results == "888")
              {
                redirect('Forum/etraining/'.$kms_etraining_id);
              }else
              {
                redirect('Forum/etraining/'.$kms_etraining_id);
              }
    }

    //This shall add a new etraining content to the system
    public function New_Content()
        {
          //We then obtain the content details as below
          $kms_etraining_id    =   $this->input->post("Kms_input_hidden_etraining_id");
          $kms_etraining_cont  =   $this->input->post("kms_input_etraining_cont");
          $kms_etraining_int_f =   $this->input->post("kms_input_training_internal_res");
          $kms_etraining_ext_f =   $this->input->post("kms_input_training_external_res");

          $kms_etraining_add_content = $this->etraining->New_training_content($kms_etraining_id,$kms_etraining_cont,$kms_etraining_int_f,$kms_etraining_ext_f);

          if(isset($kms_etraining_add_content) && $kms_etraining_add_content == "888")
              {
                redirect('Forum/etraining/'.$kms_etraining_id);
              }else
              {
                redirect('Forum/etraining/'.$kms_etraining_id);
              }

        }


        //This shall edit etraining content to the system
    public function Edit_Content()
    {
      //We then obtain the content details as below
      $kms_etraining_contid=   $this->input->post("Kms_input_hidden_etraining_contid");
      $kms_etraining_cont  =   $this->input->post("kms_edit_etraining_cont");
      $kms_etraining_int_f =   $this->input->post("kms_edit_training_internal_res");
      $kms_etraining_ext_f =   $this->input->post("kms_edit_training_external_res");
      $kms_etraining_id    =   $this->input->post("Kms_input_hidden_etraining_id");
      $kms_etraining_video =   $this->input->post("kms_edit_training_video_res");
        
     
      $kms_etraining_edit_content = $this->etraining->Edit_training_content($kms_etraining_contid,$kms_etraining_cont,$kms_etraining_int_f,$kms_etraining_ext_f,$kms_etraining_video);

      if(isset($kms_etraining_edit_content) && $kms_etraining_edit_content == "888")
          {
            redirect('Forum/etraining/'.$kms_etraining_id);
          }else
          {
            redirect('Forum/etraining/'.$kms_etraining_id);
          }
       
    }
    //The function for enrolling to a training
    public function eTrainingenroll()
    {
      //We then obtain the form details as below
      $kms_etraining_id = $this->input->post("Kms_input_hidden_etraining_id");
      $session_user_id  =  $this->session->userdata('kms_emp_id');
     // echo "T id".$kms_etraining_id."User ".$session_user_id;
      
      $kms_etraining_enroll = $this->etraining->Enroll_training($kms_etraining_id,$session_user_id);

      if(isset($kms_etraining_enroll) && $kms_etraining_enroll == "888")
          {
            redirect('Forum/etraining/'.$kms_etraining_id);
          }else
          {
            redirect('Forum/etraining/'.$kms_etraining_id);
          } 
      
    }


    //The function that will register a video for a training content as below
     public function Video_reg()
      {
        $kms_etraining_id    =  $this->input->post("Kms_input_hidden_etraining_id");
        $kms_etraining_video_descrip  =  $this->input->post("kms_upload_training_video_des");
        $kms_etraining_video_fileName =  $this->input->post("kms_upload_training_video_name");
        $target_dir = "uploads/video/".$kms_etraining_video_fileName.".webm";

        $kms_etraining_video1   =   $this->etraining->Video_etrainin($kms_etraining_video_descrip,$target_dir);

        if(isset($kms_etraining_video1) && $kms_etraining_video1 == "888")
              {
                redirect('Forum/etraining/'.$kms_etraining_id);
              }else
              {
                redirect('Forum/etraining/'.$kms_etraining_id);
              }

      } 

      //public function Staff() to view NHOP Staff members as below
      public function Staff($Dept_Id)
      {
        $session_user_dept_id =  $this->session->userdata('kms_access_user_dept_id');//kms_emp_department
        if($this->session->userdata('kms_access_status') == 1){
                      //The forum menu as per department 
                      $data['Menu_item_00_01_00'] = "Management";
                      $data['Menu_item_00_01_01'] = "Administration";
                      $data['Menu_item_00_01_02'] = "Commercial";
                      $data['Menu_item_00_01_04'] = "Finance";
                      $data['Menu_item_00_01_08'] = "Design";
                      $data['Menu_item_00_01_03'] = "Design";
                      $data['Menu_item_00_01_07'] = "Supply Chain";
                      $data['Menu_item_00_01_05'] = "Maintenance";
                      $data['Menu_item_00_01_06'] = "Production";
                      $data['Menu_item_00_01_09'] = "I.T";
              //The customised user details
             if(isset($session_user_dept_id) && $session_user_dept_id == 2)
             {
                        //The view data to be used
                      $data['Home_tab_title'] = "KMS | Management";
                      $data['Side_menu_title'] = "KMS - Management";
                      $data['Dept_name'] = "Management";     
             }else if(isset($session_user_dept_id) && $session_user_dept_id == 5)
             {
                        //The view data to be used
                      $data['Home_tab_title'] = "KMS | Production";
                      $data['Side_menu_title'] = "KMS - Production";
                      $data['Dept_name'] = "Production";
             }else if(isset($session_user_dept_id) && $session_user_dept_id == 6)
             {
                        //The view data to be used
                      $data['Home_tab_title'] = "KMS | Supply Chain";
                      $data['Side_menu_title'] = "KMS - Supply Chain";
                      $data['Dept_name'] = "Supply";  
             }else if(isset($session_user_dept_id) && $session_user_dept_id == 7)
             {
                        //The view data to be used
                      $data['Home_tab_title'] = "KMS | Maintenance";
                      $data['Side_menu_title'] = "KMS - Maintenance";
                      $data['Dept_name'] = "Maintenance";        
             }
             else if(isset($session_user_dept_id) && $session_user_dept_id == 4)
             {
                        //The view data to be used
                      $data['Home_tab_title'] = "KMS | Commercial";
                      $data['Side_menu_title'] = "KMS - Commercial";
                      $data['Dept_name'] = "Commercial";
                   
             }else if(isset($session_user_dept_id) && $session_user_dept_id == 9)
             {
                        //The view data to be used
                      $data['Home_tab_title'] = "KMS | I.T";
                      $data['Side_menu_title'] = "KMS - I.T";
                      $data['Dept_name'] = "I.T";
                     
             }else if(isset($session_user_dept_id) && $session_user_dept_id == 8)
             {
                        //The view data to be used
                      $data['Home_tab_title'] = "KMS | Design";
                      $data['Side_menu_title'] = "KMS - Design";
                      $data['Dept_name'] = "Design";
             }else if(isset($session_user_dept_id) && $session_user_dept_id == 3)
             {
                        //The view data to be used
                      $data['Home_tab_title'] = "KMS | Finance";
                      $data['Side_menu_title'] = "KMS - Finance";
                      $data['Dept_name'] = "Finance";      
             }
    
                    //The menu items on the I.T home side
                    $data['Menu_item_00'] = "Communicate";
                    $data['Menu_item_04'] = "Documents";
    
                    //The submenu item for I.T home side
                    $data['Menu_item_00_01'] = "Chat Forum";
                
                    //The submenu item for i.t document side
                    $data['Menu_item_04_01'] = "My Files";
                    $data['Menu_item_04_02'] = "Inbox - Files";
                    $data['Menu_item_04_03'] = "Files Hub ";
                    $data['Menu_item_04_04'] = "Pdp ";
                    $data['Menu_item_04_05'] = "Planning";
    
                    
                        //The submenu item for events
                        $data['Menu_item_05_01'] = "Event scheduling";
                        $data['Menu_item_05_02'] = "Event Management";
                        $data['Menu_item_05_03'] = "New Event Creation";
                       
                        //The submenu item for elearning center
                        $data['Menu_item_06_01'] = "E Learning";
                        $data['Menu_item_06_02'] = "e-training";
                        $data['Menu_item_06_03'] = "Manuals";
                        $data['Menu_item_06_04'] = "Add Course";
                        $data['Menu_item_06_05'] ="New Training";
    
                        //The training categories
                        $data['Menu_item_06_04_01'] ="General"; 
                        $data['Menu_item_06_04_02'] ="Sales / Marketing"; 
                        $data['Menu_item_06_04_03'] ="Engineering"; 
                        $data['Menu_item_06_04_04'] ="Production"; 
                        $data['Menu_item_06_04_05'] ="Customized"; 
                        $data['Menu_item_06_04_06'] ="Category"; 
                        
                        //The submenu item for user
                        $data['Menu_item_07_01'] = "Staff";
                        $data['Menu_item_07_02'] = "Users";
    
                       $data['menu_status'] = "US";
    
                       $kms_userid = $this->session->userdata('kms_emp_id');
                       $kms_deptid = $this->session->userdata('kms_access_user_dept_id');

                            //Load session library 
                   $this->load->helper('url');
                   $this->session->set_userdata('side_menu_dept2',"Forum");
                  

                     if(!isset($Dept_Id))
                      {
                       $this->load->view('staff',$data);
                      }else if(isset($Dept_Id))
                      { 
                       //$kms_userid = $this->session->userdata('kms_emp_id');
                        //$kms_user_deptid = $this->session->userdata('kms_access_user_dept_id');
                       $data['Selected_dept'] = $Dept_Id;
                       $Kms_department_employees = $this->add_employee->Fetch_dep_Employee($Dept_Id);
                       $Kms_dep_tel_employee     = $this->add_employee->Fetch_Employee_tel($Dept_Id);
                      

                       $data['Dep_employee'] = $Kms_department_employees;
                       $data['Tel_employee'] = $Kms_dep_tel_employee;
                       
                       $this->session->set_userdata('side_menu_dept2',"Forum");
                       $this->load->helper('url');
                       $this->load->view('staff',$data);
                       //echo "66".sizeof( $Kms_dep_tel_employee);
                      }
                  else{}
               

      }else{
        $this->load->helper('url');
        redirect('/');
          }
      }

    public function pdp()
      {
          $session_user_dept_id =  $this->session->userdata('kms_access_user_dept_id');//kms_emp_department
          $session_username = $this->session->userdata('kms_access_username');
          $session_user_access_status = $this->session->userdata('kms_access_role_status');

          //The forum menu as per department 
          $data['Menu_item_00_01_00'] = "Management";
          $data['Menu_item_00_01_01'] = "Administration";
          $data['Menu_item_00_01_02'] = "Commercial";
          $data['Menu_item_00_01_04'] = "Finance";
          $data['Menu_item_00_01_08'] = "Design";
          $data['Menu_item_00_01_03'] = "Design";
          $data['Menu_item_00_01_07'] = "Supply Chain";
          $data['Menu_item_00_01_05'] = "Maintenance";
          $data['Menu_item_00_01_06'] = "Production";
          $data['Menu_item_00_01_09'] = "I.T";
  //The customised user details
  if(isset($session_user_dept_id) && $session_user_dept_id == 2)
  {
            //The view data to be used
          $data['Home_tab_title'] = "KMS | Management";
          $data['Side_menu_title'] = "KMS - Management";
          $data['Dept_name'] = "Management";     
  }else if(isset($session_user_dept_id) && $session_user_dept_id == 5)
  {
            //The view data to be used
          $data['Home_tab_title'] = "KMS | Production";
          $data['Side_menu_title'] = "KMS - Production";
          $data['Dept_name'] = "Production";
  }else if(isset($session_user_dept_id) && $session_user_dept_id == 6)
  {
            //The view data to be used
          $data['Home_tab_title'] = "KMS | Supply Chain";
          $data['Side_menu_title'] = "KMS - Supply Chain";
          $data['Dept_name'] = "Supply";  
  }else if(isset($session_user_dept_id) && $session_user_dept_id == 7)
  {
            //The view data to be used
          $data['Home_tab_title'] = "KMS | Maintenance";
          $data['Side_menu_title'] = "KMS - Maintenance";
          $data['Dept_name'] = "Maintenance";        
  }
  else if(isset($session_user_dept_id) && $session_user_dept_id == 4)
  {
            //The view data to be used
          $data['Home_tab_title'] = "KMS | Commercial";
          $data['Side_menu_title'] = "KMS - Commercial";
          $data['Dept_name'] = "Commercial";
        
  }else if(isset($session_user_dept_id) && $session_user_dept_id == 9)
  {
            //The view data to be used
          $data['Home_tab_title'] = "KMS | I.T";
          $data['Side_menu_title'] = "KMS - I.T";
          $data['Dept_name'] = "I.T";
          
  }else if(isset($session_user_dept_id) && $session_user_dept_id == 8)
  {
            //The view data to be used
          $data['Home_tab_title'] = "KMS | Design";
          $data['Side_menu_title'] = "KMS - Design";
          $data['Dept_name'] = "Design";
  }else if(isset($session_user_dept_id) && $session_user_dept_id == 3)
  {
            //The view data to be used
          $data['Home_tab_title'] = "KMS | Finance";
          $data['Side_menu_title'] = "KMS - Finance";
          $data['Dept_name'] = "Finance";      
  }

           //The menu items on the I.T home side
           $data['Menu_item_00'] = "Communicate";
           $data['Menu_item_04'] = "Documents";

           //The submenu item for I.T home side
           $data['Menu_item_00_01'] = "Chat Forum";
   
           //The submenu item for i.t document side
           $data['Menu_item_04_01'] = "My Files";
           $data['Menu_item_04_02'] = "Inbox - Files";
           $data['Menu_item_04_03'] = "Files Hub ";
           $data['Menu_item_04_04'] = "Pdp ";
           $data['Menu_item_04_05'] = "Planning";

           //The pdp menu tems
           $data['Menu_item_04_04_01'] = "Create New PDP";
           $data['Menu_item_04_04_02'] = "Generated PDP";
           $data['Menu_item_04_04_03'] = "Shared PDP";
           $data['Menu_item_04_04_04'] = "PDP Setup";

           //The submenu item for events
           $data['Menu_item_05_01'] = "Event scheduling";
           $data['Menu_item_05_02'] = "Event Management";
           $data['Menu_item_05_03'] = "New Event Creation";
          
           //The submenu item for elearning center
           $data['Menu_item_06_01'] = "E Learning";
           $data['Menu_item_06_02'] = "e-training";
           $data['Menu_item_06_03'] = "Manuals";
           $data['Menu_item_06_04'] = "Add Course";
           $data['Menu_item_06_05'] ="New Training";

           //The training categories
           $data['Menu_item_06_04_01'] ="General"; 
           $data['Menu_item_06_04_02'] ="Sales / Marketing"; 
           $data['Menu_item_06_04_03'] ="Engineering"; 
           $data['Menu_item_06_04_04'] ="Production"; 
           $data['Menu_item_06_04_05'] ="Customized"; 
           $data['Menu_item_06_04_06'] ="Category"; 
           
           //The submenu item for user
           $data['Menu_item_07_01'] = "Staff";
           $data['Menu_item_07_02'] = "Users";

           

           $data['menu_status'] = "PDP";
           //Load session library 
           $this->load->helper('url');
           $this->load->view('pdp',$data);

      //  echo "pdp reached";
      }

      public function Ajax_View_Supervisor()
      {
        $Kms_user_id      =  $this->input->post("user_id");
        $Supervisor_data  =  $this->Session->SupervisorData($Kms_user_id);
         if( $Supervisor_data == 0)
         {
           echo "Not set!";
         }
         else
         {
            foreach($Supervisor_data as $Sup)
            {
              $Sup_sname =  $Sup['emp_data_sname'];
              $Sup_fname =  $Sup['emp_data_fname'];
            }
            echo $Sup_sname.' '.strtoupper($Sup_fname);
         }
        
      }

      public function Ajax_save_lineManager()
       {
         $kms_new_lineManger   =  $this->input->post("new_manager");
         $kms_user_id          =  $this->input->post("user_id");

         $Save_lineManager     =  $this->Pdp->Save_lineManager( $kms_user_id,$kms_new_lineManger);
         if($Save_lineManager == 1)
          {
            echo 1;
          }
          else
          {
            echo 0;
          }
       }

       public function Ajax_save_orgGoal()
       {
         $kms_new_goal         =  $this->input->post("org_goal");
         $kms_user_id          =  $this->input->post("user_id");
         $Save_OrgGoal1        =  $this->Pdp->Save_OrgGoal($kms_user_id,$kms_new_goal);
         if($Save_OrgGoal1 == 1)  {  echo 1;  } else  {  echo 0;  }
       }

       public function Ajax_view_orgGoal()
       {
         $kms_emp_id          =  $this->session->userdata('kms_emp_id');
         $kms_emp_level2      =  $this->session->userdata('kms_access_user_level');
         $View_goals          =  $this->Pdp->Ajax_View_OrgGoal($kms_emp_id);
         if($kms_emp_level2 == 2){ $ViewEditIcon = "none";}else{ $ViewEditIcon = "block";}
         if(!$View_goals)
         {
          echo "<tr><td colspan=\"5\" style=\"text-align: center;\">You haven't setup any Organisation Goal...</dt></tr>
                <tr><td></td><td></td><td></td><td></td><td></td></tr>";
         }
         else
         {
          $No                  = 1;
          foreach($View_goals as $Goal)
           {
               $Goal_id   = $Goal['Goal_id'];
               $Goal_des  = $Goal['Description'];
               $Goal_date = $Goal['Date'];
               //$Goal_kpis = 0;//$Goal['KPIS']

               $KPICount  = $this->Pdp->Count_OrgKPI( $Goal_id,$kms_emp_id);
               foreach($KPICount as $Cnt)
               { 
                 $No_KPI  = $Cnt['KPI'];
               }
               if(strlen((string)$No) == 1){ $No2 = "0".$No;}else{ $No2 = $No; }

               echo "<tr><td>".$No2."</td><td>".$Goal_des."</td>
                         <td style=\"text-align: center;\"><span data-kpino=".$No_KPI." data-gid=".$Goal_id." data-orgdes=".str_replace(" ","+",$Goal_des)." id=\"View_KPIS_Link\" title=\"You have ".$No_KPI." measure(s) under this goal\" class=\"badge bg-primary\">".$No_KPI."</span></td>
                        
                         <td style=\"display:".$ViewEditIcon.";\"><i title=\"Click to edit this goal\" class=\"fa fa-pencil\" aria-hidden=\"true\" id=\"OrgGoal_Edit_goal\" data-gid=".$Goal_id." data-orgdes=".str_replace(" ","+",$Goal_des)."></i>&nbsp;<i title=\"Click to delete this goal\" class=\"fa fa-trash\" aria-hidden=\"true\" id=\"OrgGoal_delete\" data-gid=".$Goal_id."></i>&nbsp; <i title=\"Click to add a measure to this goal\" class=\"fa fa-line-chart\" style=\"color:green;\" aria-hidden=\"true\" id=\"Link_KPI\" data-gid=".$Goal_id." data-orgkpi=".str_replace(" ","+",$Goal_des)."></i></td>
                         </tr>";
               $No = $No + 1;
              
           }
         }
        
       }
     
       //This will edit the organization goal
       public function Ajax_Edit_OrgGoal()
       {
         $Pdp_edit_goal_id   =  $this->input->post("org_id");
         $Pdp_edit_goal_des  =  $this->input->post("org_goal");
         $Pdp_edit_emp_id    =  $this->session->userdata('kms_emp_id');
         $Pdp_update_result  =  $this->Pdp->Ajax_Update_OrgGoal($Pdp_edit_emp_id,$Pdp_edit_goal_id,$Pdp_edit_goal_des);
         if($Pdp_update_result == 1){ echo 1; }else{ echo 0;}
       }

       //This will disactivate the organizational goal

       public function Ajax_delete_orgGoal()
       {
         $Pdp_delete_goal_id =  $this->input->post('G_id');
         $Pdp_delete_emp_id  =  $this->session->userdata('kms_emp_id');
         $Pdp_delete_result  =  $this->Pdp->Ajax_Delete_OrgGoal($Pdp_delete_emp_id,$Pdp_delete_goal_id);
         if($Pdp_delete_result == 1){ echo 1; }else{ echo 0;}

       }

       public function Ajax_view_orgGoal_List()
       {
              $kms_emp_id          =  $this->session->userdata('kms_emp_id');
              $View_goals          =  $this->Pdp->Ajax_View_OrgGoal($kms_emp_id);
              echo "<div class=\"form-group\">
                    <label for=\"kms_input_fchat_topic\" class=\"col-sm-3 control-label\" id=\"pdp_org_goal_selected_val_label\">Org Goal:</label>
                    <div class=\"col-sm-9\">";
              echo "<select class=\"form-control\" onchange=\"return PDP_Selected_OGoal_Val();\" id=\"pdp_org_goal_selected_val\"><option value=\"0\" >Please select the organisational goal here...</option>";
              
              if(!$View_goals)
              {
                  echo "<option value=\"0\">You haven't setup any goal</option>";
              }
              else
              {
                foreach($View_goals as $Goal)
                {
                    $Goal_id   = $Goal['Goal_id'];
                    $Goal_des  = $Goal['Description'];
                    $Goal_date = $Goal['Date'];
                    echo "<option value=\"$Goal_id\">".$Goal_des."</option>";
                  
                }
              }
              echo "</select></div></div>";
       }

       public function Ajax_view_Dep_Goal_List()
       {
         $Org_goal_selected  = $this->input->post('Org_goal');
         echo "Linked ->".$Org_goal_selected;
       }

       public function Ajax_add_DepGoal()
       {
         $kms_emp_id         =  $this->session->userdata('kms_emp_id');
         $Pdp_org_goal_id    =  $this->input->post("Org_goal");
         $Pdp_dep_goal_des   =  $this->input->post("DepGoal");
         $Save_DepGoal1      =  $this->Pdp->Save_DepGoal($kms_emp_id,$Pdp_org_goal_id,$Pdp_dep_goal_des);
         if($Save_DepGoal1   == 1)  {  echo 1;  } else  {  echo 0;  }
       }

       public function Ajax_view_depGoal()
       {
             $kms_emp_id     =  $this->session->userdata('kms_emp_id');
             $Pdp_org_goal_id=  $this->input->post("Org_goal");

             $View_Dep_goals =  $this->Pdp->Ajax_View_DepGoal($kms_emp_id,$Pdp_org_goal_id);
             if(!$View_Dep_goals)
             {
              echo "<tr><td colspan=\"5\" style=\"text-align: center;\">You haven't setup any departmental Goal...</dt></tr>
                    <tr><td></td><td></td><td></td><td></td><td></td></tr>";
             }
             else
             {
              $No             = 1;
              foreach($View_Dep_goals as $Goal)
              {
                  $DGoal_id   = $Goal['Dep_Goal_id'];
                  $DGoal_des  = $Goal['Dep_Goal'];
                  $DGoal_date = $Goal['Add_date'];
                  $OGoal_id   = $Goal['Org_Goal_id'];
                  //Then we find the kpi count
                  $Dep_kpi_count = $this->Pdp->Ajax_Count_Dep_kpi($DGoal_id,$OGoal_id,$kms_emp_id);
                  foreach($Dep_kpi_count as $KPICount)
                  {
                    $KPI_Count = $KPICount['KPI'];
                  }

                  if(strlen((string)$No) == 1){ $No2 = "0".$No;}else{ $No2 = $No; }//<td>".$DGoal_date ."</td>
                  echo "<tr><td>".$No2."</td><td>".$DGoal_des."</td><td style=\"text-align: center;\" ><span id=\"View_Dep_KPIS_Link\" title=\"You have ".$KPI_Count." measure (s) under this goal\" class=\"badge bg-primary\" data-no=".$KPI_Count." data-gid=".$OGoal_id." data-depgid=".$DGoal_id." data-depdes=".str_replace(" ","+",$DGoal_des).">".$KPI_Count."</span></td>
                            <td><i title=\"Click to edit this goal\" class=\"fa fa-pencil\" aria-hidden=\"true\" stye=\"color:red;\" id=\"Dep_Goal_edit\" data-gid=".$OGoal_id." data-depgid=".$DGoal_id." data-depdes=".str_replace(" ","+",$DGoal_des)."></i>
                                <i title=\"Click to delete this goal\" class=\"fa fa-trash\" aria-hidden=\"true\" id=\"DepGoal_delete\" data-dgid=".$DGoal_id." data-ogid=".$OGoal_id."></i>
                                &nbsp;<i title=\"Click to add a measure to this goal\" class=\"fa fa-line-chart\" style=\"color:green;\" aria-hidden=\"true\" id=\"Link_KPI_Dep\" data-ogid=".$OGoal_id." data-dgid=".$DGoal_id." data-depdes=".str_replace(" ","+",$DGoal_des)." ></i>
                                </td></tr>";
                  $No = $No + 1;
                  
              }
             }

       }
       //This will update the departmental goal details
       public function Ajax_edit_DepGoal()
       {
                $Pdp_edit_org_goal_id   =  $this->input->post("Org_goal");
                $Pdp_edit_dep_goal_id   =  $this->input->post("DepGoal_id");
                $Pdp_edit_dep_goal_des  =  $this->input->post("DepGoal_des");
                $Pdp_edit_emp_id        =  $this->session->userdata('kms_emp_id');
             
                $Pdp_update_result      =  $this->Pdp->Ajax_Update_DepGoal($Pdp_edit_emp_id,$Pdp_edit_org_goal_id,$Pdp_edit_dep_goal_id,$Pdp_edit_dep_goal_des);
                if($Pdp_update_result == 1){ echo 1; }else{ echo 0;}
       }

      //This will disactivate the departmental goal
      public function Ajax_delete_depGoal()
      {
                $Pdp_delete_Depgoal_id =  $this->input->post('DepGoal_id');
                $Pdp_delete_Orggoal_id =  $this->input->post('OrgGoal_id');
                $Pdp_delete_emp_id     =  $this->session->userdata('kms_emp_id');
                $Pdp_delete_result     =  $this->Pdp->Ajax_Delete_DepGoal($Pdp_delete_emp_id,$Pdp_delete_Orggoal_id,$Pdp_delete_Depgoal_id);
                if($Pdp_delete_result == 1){ echo 1; }else{ echo 0;}
      }

         //This will save the new organizational goal kpi
         public function Ajax_add_OrgKPI()
         {
                $Pdp_OrgGoal_id     =  $this->input->post('OrgGoal_id');
                $Pdp_OrgGoal_kpi    =  $this->input->post('Goal_KPI');
                $Pdp_emp_id         =  $this->session->userdata('kms_emp_id');
                $Pdp_OrgKPI_results = $this->Pdp->Ajax_Add_OrgKPI($Pdp_OrgGoal_id,$Pdp_OrgGoal_kpi,$Pdp_emp_id);
                if($Pdp_OrgKPI_results == 1){ echo 1; }else{ echo 0;}
         }

         //This will list the organization goal KPI - measure
         public function Ajax_view_kpi()
         {
                $Pdp_OrgGoal_id      =  $this->input->post('Org_goal');
                $Pdp_emp_id          =  $this->session->userdata('kms_emp_id');
                $Pdp_kpi_results     =  $this->Pdp->Ajax_OrgKPI_View($Pdp_OrgGoal_id,$Pdp_emp_id);
                $No                  = 1;
              foreach($Pdp_kpi_results as $G_KPI)
              {
                  $KPIGoal_id   = $G_KPI['Goal_ID'];
                  $KPIGoal_des  = $G_KPI['KPI Des'];
                  $KPIGoal_date = $G_KPI['Date'];
                  $KPI_id       = $G_KPI['KPI_Id'];
                  if(strlen((string)$No) == 1){ $No2 = "0".$No;}else{ $No2 = $No; }
                  $PDP_Measure_target = $this->Pdp->Ajax_OrgMeasureTarget($KPIGoal_id,$KPI_id,$Pdp_emp_id);
                  foreach($PDP_Measure_target as $TargetCount)
                  {
                    $TGT_Count = $TargetCount['Target'];
                  }
                  if(strlen((string)$TGT_Count) == 1){ $TGT_Count2 = "0".$TGT_Count;}else{ $TGT_Count2 = $TGT_Count; }
                  echo "<tr>
                        <td>".$No2."</td>
                        <td>".$KPIGoal_des."</td>
                        <td>".$TGT_Count2."</td>
                        <td>".$KPIGoal_date."</td>
                        <td> 
                        <i class=\"fa fa-pencil\" title=\"Click to edit this Measure\" aria-hidden=\"true\" stye=\"color:red;\" id=\"Org_kpi_edit\" data-gid=".$KPIGoal_id." data-kpiid=".$KPI_id." data-depdes=".str_replace(" ","+",$KPIGoal_des)."></i>&nbsp;&nbsp;
                        <i class=\"fa fa-trash\" title=\"Click to delete this Measure\" aria-hidden=\"true\" id=\"Org_kpi_delete\" data-kpiid=".$KPI_id." data-gid=".$KPIGoal_id."></i>&nbsp;&nbsp;
                        <i class=\"fa fa-dot-circle-o\" title=\"Click to add a target this Measure\" aria-hidden=\"true\" style=\"color:green;\" id=\"Add_measure_target\" data-kpiid=".$KPI_id." data-gid=".$KPIGoal_id."></i></td>
                        </tr>";

                  $No = $No + 1;
              }
         }

         public function Ajax_edit_kpi()
         {
                  $Pdp_OrgGoal_id     =  $this->input->post('Org_goal_id');
                  $Pdp_OrgGoal_kpi    =  $this->input->post('Org_kpi_id');
                  $OrgGoal_kpi_desc   =  $this->input->post('Org_kpi_des');
                  $Pdp_emp_id         =  $this->session->userdata('kms_emp_id');
                  $Edt_OrgKPI_results =  $this->Pdp->Ajax_Edit_OrgKPI($Pdp_OrgGoal_id,$Pdp_OrgGoal_kpi,$Pdp_emp_id,$OrgGoal_kpi_desc);
                  if($Edt_OrgKPI_results == 1){ echo 1; }else{ echo 0;}
         }

         public function Ajax_delete_kpi()
         {
                  $Pdp_OrgGoal_id     =  $this->input->post('Org_goal_id');
                  $Pdp_OrgGoal_kpi    =  $this->input->post('Org_kpi_id');
                  $Pdp_emp_id         =  $this->session->userdata('kms_emp_id');
                  $Edt_OrgKPI_results =  $this->Pdp->Ajax_Delete_OrgKPI($Pdp_OrgGoal_id,$Pdp_OrgGoal_kpi,$Pdp_emp_id );
                  if($Edt_OrgKPI_results == 1){ echo 1; }else{ echo 0;}
         }

         public function Ajax_add_dep_kpi()
         {
                  $Pdp_OrgGoal_id     =  $this->input->post('Org_id');
                  $Pdp_depGoal_id     =  $this->input->post('dep_goalid');
                  $DepGoal_kpi_des    =  $this->input->post('Dep_kpi_des');
                  $Pdp_emp_id         =  $this->session->userdata('kms_emp_id');
                  $Pdp_DepKPI_results = $this->Pdp->Ajax_Add_DepKPI($Pdp_OrgGoal_id,$Pdp_depGoal_id,$Pdp_emp_id,$DepGoal_kpi_des);
                  if($Pdp_DepKPI_results == 1){ echo 1; }else{ echo 0;}
        
         }

         public function Ajax_view_dep_kpi()
         {
                  $Pdp_OrgGoal_id      =  $this->input->post('Org_goal');
                  $Pdp_DepGoal_id      =  $this->input->post('Dep_goal');
                  $Pdp_emp_id          =  $this->session->userdata('kms_emp_id');
                  $Pdp_kpi_results     =  $this->Pdp->Ajax_DepKPI_View($Pdp_OrgGoal_id,$Pdp_DepGoal_id,$Pdp_emp_id);
                  $No                  = 1;
          foreach($Pdp_kpi_results as $D_KPI)
          {
                  $KPIGoal_id   = $D_KPI['Goal_ID'];
                  $KPIGoal_des  = $D_KPI['KPI Des'];
                  $KPIGoal_date = $D_KPI['Date'];
                  $KPI_id       = $D_KPI['KPI_Id'];
                  if(strlen((string)$No) == 1){ $No2 = "0".$No;}else{ $No2 = $No; }
                  
                  $Pdp_dep_target      = $this->Pdp->Ajax_DepTargetCount($KPI_id,$Pdp_DepGoal_id,$Pdp_emp_id);
                  foreach($Pdp_dep_target as $TargetCount)
                  {
                    $TGT_Count = $TargetCount['Target'];
                  }
                  if(strlen((string)$TGT_Count) == 1){ $TGT_Count2 = "0".$TGT_Count;}else{ $TGT_Count2 = $TGT_Count; }
                  
              echo "<tr>
                    <td>".$No2."</td>
                    <td>".$KPIGoal_des."</td>
                    <td>".$TGT_Count2."</td>
                    <td>".$KPIGoal_date."</td>
                    <td style=\"text-align: center;\"> 
                    <i class=\"fa fa-pencil\" id=\"Edit_dep_kpi\" title=\"Click to edit this measure\" aria-hidden=\"true\" stye=\"color:red;\" data-depgid=".$KPIGoal_id." data-orgid=".$Pdp_OrgGoal_id." data-kpiid=".$KPI_id." data-depdes=".str_replace(" ","+",$KPIGoal_des)."></i>&nbsp;&nbsp;&nbsp;
                    <i class=\"fa fa-trash\" id=\"Delete_dep_kpi\" title=\"Click to delete this meaure\" aria-hidden=\"true\" data-kpiid=".$KPI_id." data-depgid=".$KPIGoal_id." data-orgid=".$Pdp_OrgGoal_id."></i>&nbsp;&nbsp;&nbsp;
                    <i class=\"fa fa-dot-circle-o\" id=\"Add_dept_target\" title=\"Click to add a target to this meaure\" aria-hidden=\"true\" style=\"color:green;\" data-kpiid=".$KPI_id." data-depgid=".$KPIGoal_id." data-orgid=".$Pdp_OrgGoal_id." data-mesdes=".str_replace(" ","!",$KPIGoal_des)."></i>
                    </td>
                    </tr>";

              $No = $No + 1;
          }
         }

         public function Ajax_edit_dep_kpi()
         {
                $Pdp_OrgGoal_id     =  $this->input->post('Org_id');
                $Pdp_depGoal_id     =  $this->input->post('dep_goalid');
                $DepGoal_kpi_des    =  $this->input->post('Dep_kpi_des');
                $DepGoal_kpi_id     =  $this->input->post('dep_kpi_id');
                $Pdp_emp_id         =  $this->session->userdata('kms_emp_id');
                $Pdp_DepKPI_results =  $this->Pdp->Ajax_Edit_DepKPI($Pdp_OrgGoal_id,$Pdp_depGoal_id,$Pdp_emp_id,$DepGoal_kpi_des,$DepGoal_kpi_id);
                if($Pdp_DepKPI_results == 1){ echo 1; }else{ echo 0;}
         }

         public function Ajax_delete_dep_kpi()
         {
                $Pdp_OrgGoal_id     =  $this->input->post('org_goal');
                $Pdp_depGoal_id     =  $this->input->post('dep_goalid');
                $DepGoal_kpi_id     =  $this->input->post('dep_kpi_id');
                $Pdp_emp_id         =  $this->session->userdata('kms_emp_id');
                $Pdp_DepKPI_results =  $this->Pdp->Ajax_Delete_DepKPI($Pdp_OrgGoal_id,$Pdp_depGoal_id,$Pdp_emp_id,$DepGoal_kpi_id);
                if($Pdp_DepKPI_results == 1){ echo 1; }else{ echo 0;}
         }

         public function Ajax_view_orgGoal_List_tmg()
         {
                $kms_emp_id          =  $this->session->userdata('kms_emp_id');
                $kms_manager_id      =  $this->session->userdata('kms_supervisor_id');
                $kms_user_level      =  $this->session->userdata('kms_access_user_level');
                $Org_Goal_option     =  $this->input->post('t');
                if(isset($Org_Goal_option) && $Org_Goal_option == 2)
                {
                  $View_goals          =  $this->Pdp->Ajax_View_OrgGoal_addPDP($kms_emp_id,$kms_manager_id,$kms_user_level);
              
                      echo "<div class=\"col-sm-6\"><div class=\"form-group\">
                            <label for=\"kms_input_fchat_topic\"  id=\"add_pdp_org_goal_selected_val_label\">Organisation Goal:</label>
                            <select class=\"form-control\" id=\"add_pdp_org_goal_selected_val\" onchange=\"return PDP_Selected_OGoal_Val_NewPdpd();\" ><option value=\"0\" >Please select the organisational goal here...</option>";
                            if(!$View_goals)
                            {
                                echo "<option value=\"0\">You haven't setup any goal</option>";
                            }
                            else 
                            {
                              foreach($View_goals as $Goal)
                              {
                                  $Goal_id   = $Goal['Goal_id'];
                                  $Goal_des  = $Goal['Description'];
                                  $Goal_date = $Goal['Date'];
                                  echo "<option value=\"$Goal_id\">".$Goal_des."</option>";
                                
                              }
                            }
                      echo  "</select> </div> <i id=\"add_pdp_org_error5\" class=\"pull-left\" style=\"color:red;\"></i>
                      
                             </div>";
                }else  if(isset($Org_Goal_option) && $Org_Goal_option == 3)
                {
                  $View_goals          =  $this->Pdp->Ajax_View_OrgGoal_addPDP($kms_emp_id,$kms_manager_id,$kms_user_level);//
              
                      echo "<div class=\"col-sm-6\"><div class=\"form-group\">
                            <label for=\"add_pdp_accompOrg_selected_val\"  id=\"add_pdp_accompOrg_label\">Organisation Goal:</label>
                            <select class=\"form-control\" id=\"add_pdp_accompOrg_selected_val\" onchange=\"return Accomp_Selected_OGoal_Val();\" ><option value=\"0\" >Please select the organisational goal here...</option>";
                            if(!$View_goals)
                            {
                                echo "<option value=\"0\">You haven't setup any goal</option>";
                            }
                            else 
                            {
                              foreach($View_goals as $Goal)
                              {
                                  $Goal_id   = $Goal['Goal_id'];
                                  $Goal_des  = $Goal['Description'];
                                  $Goal_date = $Goal['Date'];
                                  echo "<option value=\"$Goal_id\">".$Goal_des."</option>";
                                
                              }
                            }
                      echo  "</select> <i id=\"add_pdp_accompOrg_error\" class=\"pull-left\" style=\"color:red;\"></i>
                             </div> 
                             </div>";
                }
                else
                {    
                  $View_goals          =  $this->Pdp->Ajax_View_OrgGoal($kms_emp_id);
                      echo "<div class=\"form-group\">
                            <label for=\"kms_input_fchat_topic\" class=\"col-sm-3 control-label\" id=\"pdp_org_goal_selected_val_label_tmg\">Org Goal:</label>
                            <div class=\"col-sm-9\">";
                      echo "<select class=\"form-control\" onchange=\"return PDP_Selected_OGoal_Val_tmg();\" id=\"pdp_org_goal_selected_val_tmg\" ><option value=\"0\" >Please select the organisational goal here...</option>";
                      
                      if(!$View_goals)
                      {
                          echo "<option value=\"0\">You haven't setup any goal</option>";
                      }
                      else
                      {
                        foreach($View_goals as $Goal)
                        {
                            $Goal_id   = $Goal['Goal_id'];
                            $Goal_des  = $Goal['Description'];
                            $Goal_date = $Goal['Date'];
                            echo "<option value=\"$Goal_id\">".$Goal_des."</option>";
                          
                        }
                      }
                      echo "</select></div></div>";
                }
               
         }

         public function Ajax_view_DepGoal_List()
         {
          $kms_emp_id          =  $this->session->userdata('kms_emp_id');
          $Org_Goal            =  $this->input->post('Org_Goal_id');
          $View_goals          =  $this->Pdp->Ajax_List_DepGoal($kms_emp_id,$Org_Goal);

            echo "<div>&nbsp;<div class=\"form-group\" >
                  <label for=\"kms_input_fchat_topic\" class=\"col-sm-3 control-label\" id=\"pdp_dep_goal_selected_val_label_tmg\">Dep Goal:</label>
                  <div class=\"col-sm-9\">";

            echo "<select class=\"form-control\" onchange=\"return PDP_Selected_DGoal_Val_tmg();\"  id=\"pdp_dep_goal_selected_val_tmg\"><option value=\"0\" >Please select the Department goal here...</option>";
            
            if(!$View_goals)
            {
                echo "<option value=\"0\">You haven't setup any goal</option>";
            }
            else
            {
              foreach($View_goals as $Goal)
              {
                  $Goal_id   = $Goal['ID'];
                  $Goal_des  = $Goal['Goal'];

                echo "<option value=\"$Goal_id\">".$Goal_des."</option>";
          
              }
            }
            echo "</select></div></div></div>";
         }

         public function Ajax_view_tmg_goal()
         {
          $Pdp_OrgGoal_id      =  $this->input->post('Org_goal');
          $Pdp_DepGoal_id      =  $this->input->post('Dep_goal');
          $Pdp_emp_id          =  $this->session->userdata('kms_emp_id');
          $Pdp_TMG_results     =  $this->Pdp->Ajax_TMGoal_View($Pdp_OrgGoal_id,$Pdp_DepGoal_id,$Pdp_emp_id);
          $No                  = 1;
           
          if(!$Pdp_TMG_results)
             {
              echo "<tr><td colspan=\"4\" style=\"text-align: center;\">You haven't setup any Team Member Goal...</dt></tr>
                    <tr><td></td><td></td><td></td><td></td></tr>";
             }
             else 
             {

                  foreach($Pdp_TMG_results as $D_TMG)
                  {
                      
                      $TMGoal_des   = $D_TMG['Goal'];
                      $TMGoal_date  = $D_TMG['Date'];
                      $TMG_id       = $D_TMG['ID'];
                      if(strlen((string)$No) == 1){ $No2 = "0".$No;}else{ $No2 = $No; }
                      //Then we find the kpi count
                      $Dep_kpi_count = $this->Pdp->Ajax_Count_tmg_kpi($TMG_id,$Pdp_emp_id);
                      foreach($Dep_kpi_count as $KPICount)
                      {
                        $KPI_Count = $KPICount['KPI'];
                      }
                       if($KPI_Count == 0){ $KPI_Word = "zero";}else{$KPI_Word = $KPI_Count;}
                    
                      echo "<tr>
                            <td>".$No2."</td>
                            <td>".$TMGoal_des."</td>
                            <td style=\"text-align: center;\"><span id=\"View_tmgoal_kpi\" data-tmkpino=".$KPI_Count." data-tmgid=".$TMG_id." data-tmgdes=".str_replace(" ","+",$TMGoal_des)." data-orgoal=".$Pdp_OrgGoal_id." data-depgoal=".$Pdp_DepGoal_id." title=\"You have ".$KPI_Word." KPI(s) under this goal\" class=\"badge bg-primary\">".$KPI_Count."</span></td>
                            <td style=\"text-align: center;\"> 
                            <i class=\"fa fa-pencil\" id=\"Edit_tmgoal\" title=\"Click to edit this goal\" aria-hidden=\"true\" stye=\"color:red;\" data-orgoal=".$Pdp_OrgGoal_id." data-depgoal=".$Pdp_DepGoal_id." data-tmid=".$TMG_id." data-tmdes=".str_replace(" ","+",$TMGoal_des)."></i>&nbsp;&nbsp;&nbsp;
                            <i class=\"fa fa-trash\" id=\"Delete_tmgoal\" title=\"Click to delete this goal\" aria-hidden=\"true\" data-tmgid=".$TMG_id." data-orgoal=".$Pdp_OrgGoal_id." data-depgoal=".$Pdp_DepGoal_id." ></i>
                            &nbsp;&nbsp;<i title=\"Click to add a KPI to this goal\" id=\"Add_tmgoal_kpi\" class=\"fa fa-line-chart\" style=\"color:green;\" aria-hidden=\"true\" data-orgoal=".$Pdp_OrgGoal_id." data-depgoal=".$Pdp_DepGoal_id." data-tmid=".$TMG_id." data-tmdes=".str_replace(" ","+",$TMGoal_des)." ></i>
                            </td>
                            </tr>";

                      $No = $No + 1;
                  }

             }
         }
    //For adding a team member goal
    Public function Ajax_add_tmg_goal()
    {
          $Pdp_OrgGoal_id      =  $this->input->post('Org_goal');
          $Pdp_DepGoal_id      =  $this->input->post('Dep_goal');
          $Pdp_TMGoal_desp     =  $this->input->post('Tm_goal');
          $Pdp_emp_id          =  $this->session->userdata('kms_emp_id');
          $Pdp_tmg_results     =  $this->Pdp->Ajax_TMG_Add($Pdp_OrgGoal_id,$Pdp_DepGoal_id,$Pdp_emp_id,$Pdp_TMGoal_desp);
          if($Pdp_tmg_results == 1){ echo 1; }else{ echo 0;}
   }
      //For editing a team member goal
      public function Ajax_edit_tmg_goal()
      {
          $Pdp_OrgGoal_id      =  $this->input->post('Org_goal');
          $Pdp_DepGoal_id      =  $this->input->post('Dep_goal');
          $Pdp_TMGoal_desp     =  $this->input->post('Tm_goal');
          $Pdp_TMGoal_id       =  $this->input->post('Tm_goalid');
          $Pdp_emp_id          =  $this->session->userdata('kms_emp_id');
          $Pdp_tmg_results     =  $this->Pdp->Ajax_TMG_Edit($Pdp_OrgGoal_id,$Pdp_DepGoal_id,$Pdp_emp_id,$Pdp_TMGoal_desp,$Pdp_TMGoal_id);
          if($Pdp_tmg_results == 1){ echo 1; }else{ echo 0;}
      }

      //For deleting a team member goal
      public function Ajax_delete_tmg_goal()
      {
          $Pdp_OrgGoal_id      =  $this->input->post('OrgGoal');
          $Pdp_DepGoal_id      =  $this->input->post('DepGoal');
          $Pdp_TMGoal_id       =  $this->input->post('Tm_goalid');
          $Pdp_emp_id          =  $this->session->userdata('kms_emp_id');
          $Pdp_TMGoal_results  =  $this->Pdp->Ajax_Delete_TMGoal($Pdp_OrgGoal_id,$Pdp_DepGoal_id,$Pdp_emp_id,$Pdp_TMGoal_id);
          if($Pdp_TMGoal_results == 1){ echo 1; }else{ echo 0;}
      }

      public function Ajax_add_tmg_kpi()
      {
          $Pdp_OrgGoal_id      =  $this->input->post('OrgGoal');
          $Pdp_DepGoal_id      =  $this->input->post('DepGoal');
          $Pdp_TMGoal_id       =  $this->input->post('Tm_goalid');
          $Pdp_TMGoal_des      =  $this->input->post('TmGoal_des');
          $Pdp_emp_id          =  $this->session->userdata('kms_emp_id');
          $Pdp_TMGoal_results  =  $this->Pdp->Ajax_Add_TMGoalKPI($Pdp_OrgGoal_id,$Pdp_DepGoal_id,$Pdp_emp_id,$Pdp_TMGoal_id,$Pdp_TMGoal_des);
          if($Pdp_TMGoal_results == 1){ echo 1; }else{ echo 0;}
      }

      public function Planning()
      {
        $session_user_dept_id =  $this->session->userdata('kms_access_user_dept_id');//kms_emp_department
          $session_username = $this->session->userdata('kms_access_username');
          $session_user_access_status = $this->session->userdata('kms_access_role_status');

          //The forum menu as per department 
          $data['Menu_item_00_01_00'] = "Management";
          $data['Menu_item_00_01_01'] = "Administration";
          $data['Menu_item_00_01_02'] = "Commercial";
          $data['Menu_item_00_01_04'] = "Finance";
          $data['Menu_item_00_01_08'] = "Design";
          $data['Menu_item_00_01_03'] = "Design";
          $data['Menu_item_00_01_07'] = "Supply Chain";
          $data['Menu_item_00_01_05'] = "Maintenance";
          $data['Menu_item_00_01_06'] = "Production";
          $data['Menu_item_00_01_09'] = "I.T";
  //The customised user details
  if(isset($session_user_dept_id) && $session_user_dept_id == 2)
  {
            //The view data to be used
          $data['Home_tab_title'] = "KMS | Management";
          $data['Side_menu_title'] = "KMS - Management";
          $data['Dept_name'] = "Management";     
  }else if(isset($session_user_dept_id) && $session_user_dept_id == 5)
  {
            //The view data to be used
          $data['Home_tab_title'] = "KMS | Production";
          $data['Side_menu_title'] = "KMS - Production";
          $data['Dept_name'] = "Production";
  }else if(isset($session_user_dept_id) && $session_user_dept_id == 6)
  {
            //The view data to be used
          $data['Home_tab_title'] = "KMS | Supply Chain";
          $data['Side_menu_title'] = "KMS - Supply Chain";
          $data['Dept_name'] = "Supply";  
  }else if(isset($session_user_dept_id) && $session_user_dept_id == 7)
  {
            //The view data to be used
          $data['Home_tab_title'] = "KMS | Maintenance";
          $data['Side_menu_title'] = "KMS - Maintenance";
          $data['Dept_name'] = "Maintenance";        
  }
  else if(isset($session_user_dept_id) && $session_user_dept_id == 4)
  {
            //The view data to be used
          $data['Home_tab_title'] = "KMS | Commercial";
          $data['Side_menu_title'] = "KMS - Commercial";
          $data['Dept_name'] = "Commercial";
        
  }else if(isset($session_user_dept_id) && $session_user_dept_id == 9)
  {
            //The view data to be used
          $data['Home_tab_title'] = "KMS | I.T";
          $data['Side_menu_title'] = "KMS - I.T";
          $data['Dept_name'] = "I.T";
          
  }else if(isset($session_user_dept_id) && $session_user_dept_id == 8)
  {
            //The view data to be used
          $data['Home_tab_title'] = "KMS | Design";
          $data['Side_menu_title'] = "KMS - Design";
          $data['Dept_name'] = "Design";
  }else if(isset($session_user_dept_id) && $session_user_dept_id == 3)
  {
            //The view data to be used
          $data['Home_tab_title'] = "KMS | Finance";
          $data['Side_menu_title'] = "KMS - Finance";
          $data['Dept_name'] = "Finance";      
  }

           //The menu items on the I.T home side
           $data['Menu_item_00'] = "Communicate";
           $data['Menu_item_04'] = "Documents";

           //The submenu item for I.T home side
           $data['Menu_item_00_01'] = "Chat Forum";
   
           //The submenu item for i.t document side
           $data['Menu_item_04_01'] = "My Files";
           $data['Menu_item_04_02'] = "Inbox - Files";
           $data['Menu_item_04_03'] = "Files Hub ";
           $data['Menu_item_04_04'] = "Pdp ";
           $data['Menu_item_04_05'] = "Planning";

           //The pdp menu tems
           $data['Menu_item_04_04_01'] = "Create New PDP";
           $data['Menu_item_04_04_02'] = "Generated PDP";
           $data['Menu_item_04_04_03'] = "Shared PDP";
           $data['Menu_item_04_04_04'] = "PDP Setup";

           //The planning menu tems
           $data['Menu_item_04_05_01'] = "Critical Roles Identification";
           $data['Menu_item_04_05_02'] = "Succession Profile";
           $data['Menu_item_04_05_03'] = "Talent Development";
           $data['Menu_item_04_05_04'] = "Progress Measurement";

           //The submenu item for events
           $data['Menu_item_05_01'] = "Event scheduling";
           $data['Menu_item_05_02'] = "Event Management";
           $data['Menu_item_05_03'] = "New Event Creation";
          
           //The submenu item for elearning center
           $data['Menu_item_06_01'] = "E Learning";
           $data['Menu_item_06_02'] = "e-training";
           $data['Menu_item_06_03'] = "Manuals";
           $data['Menu_item_06_04'] = "Add Course";
           $data['Menu_item_06_05'] ="New Training";

           //The training categories
           $data['Menu_item_06_04_01'] ="General"; 
           $data['Menu_item_06_04_02'] ="Sales / Marketing"; 
           $data['Menu_item_06_04_03'] ="Engineering"; 
           $data['Menu_item_06_04_04'] ="Production"; 
           $data['Menu_item_06_04_05'] ="Customized"; 
           $data['Menu_item_06_04_06'] ="Category"; 
           
           //The submenu item for user
           $data['Menu_item_07_01'] = "Staff";
           $data['Menu_item_07_02'] = "Users";

          // $data['menu_status'] = "PDP";
           //Load session library 
           $this->load->helper('url');
           $this->load->view('planning',$data);

      }

      public function Ajax_Save_role()
      {
        //We then receive the user inout from javascript as below
        $Plan_role_1   =  $this->input->post('CRoleData');
        for($i = 0; $i < 7; $i++)
         {
          $Role_name  =  $Plan_role_1[0];
          $Role_skill =  $Plan_role_1[1];
          $Role_rank1 =  $Plan_role_1[2];
          $Role_rank2 =  $Plan_role_1[3];
          $Role_rank3 =  $Plan_role_1[4];
          $Role_rank4 =  $Plan_role_1[5];
         // $Role_rank5 =  $Plan_role_1[5];
         }
         $Plan_emp_id =  $this->session->userdata('kms_emp_id');
         //we first check if the critical role already exist
         $CRole_check_results = $this->Planning->Ajax_Check_Crole($Plan_emp_id,$Role_name);
         if($CRole_check_results != 0)  { echo $Role_name; }
         else
         { //,$Role_rank5
           $PlanCRole_results   =  $this->Planning->Ajax_Add_CRole($Plan_emp_id,$Role_name,$Role_rank1,$Role_rank2,$Role_rank3,$Role_rank4,$Role_skill);
           echo $PlanCRole_results;
          }
        
       
      }

      public function Ajax_View_CRoles()
      { 
        $Plan_emp_id         =  $this->session->userdata('kms_emp_id');
        $CRole_View_results  =  $this->Planning->Ajax_View_Crole($Plan_emp_id);
        $No                  = 1;
        if(!$CRole_View_results)
           {
            echo "<tr><td colspan=\"5\" style=\"text-align: center;\">You haven't submitted any role...</dt></tr> ";
           }
           else
           {
             foreach($CRole_View_results as $Role)
             {
               $Crole_id    =  $Role['kms_plan_crole_id'];
               $Crole_des   =  $Role['kms_plan_crole_des'];
               $Crole_date  =  $Role['kms_plan_crole_date'];
               $Crole_rank1 =  $Role['kms_plan_crole_rank1'];
               $Crole_rank2 =  $Role['kms_plan_crole_rank2'];
               $Crole_rank3 =  $Role['kms_plan_crole_rank3'];
               $Crole_rank4 =  $Role['kms_plan_crole_rank4'];
               $Crole_skill =  $Role['kms_plan_crole_skill'];
               if($Crole_skill == "" || $Crole_skill == null)
               {
                $Crole_skill1 = "0";
               }else
               {
                  $Crole_skill1 = $Crole_skill;
                }
               
               //$Crole_rank5 =  $Role['kms_plan_crole_rank5'];
              // + $Crole_rank5
               $RankTotal   = $Crole_rank1 + $Crole_rank2 + $Crole_rank3 + $Crole_rank4 ;
               if($RankTotal >9){ $RankTotal2 = $RankTotal; }else{ $RankTotal2 = "0".$RankTotal;}
               echo "<tr>
                     <td>";if($No >9){ echo $No;}else{ echo "0".$No;}
                     
               echo  "</td>
                     <td>".$Crole_des."</td>
                     <td>";

             if($RankTotal2 > 14){ echo "<span class=\"badge badge-success\" style=\"background-color:green;\">".$RankTotal2."</span>";}
             else{ echo "<span class=\"badge badge-primary\" style=\"background-color:#020560;\">".$RankTotal2."</span>";}

               echo  "</td>
                     <td>".$Crole_date."</td>
                     <td><i data-rid=".$Crole_id." data-rdes=".str_replace(" ","+",$Crole_des)." data-r1=".$Crole_rank1." data-r2=".$Crole_rank2." data-r3=".$Crole_rank3." data-r4=".$Crole_rank4." data-skill=".str_replace(" ","+",$Crole_skill1)." id=\"Edit_Role_btn\"class=\"fa fa-pencil\" aria-hidden=\"true\" title=\"Click to edit this role\" style=\"color:#020560;\"></i>&nbsp;</td>
                     </tr>";
               $No = $No + 1;
             }
           }
      }

      //
       //This will list the team member goal KPI
       public function Ajax_view_tmg_kpi()
       {
              $Pdp_TMGoal_id       =  $this->input->post('TMGoal_id');
              $Pdp_emp_id          =  $this->session->userdata('kms_emp_id');
              $Pdp_kpi_results     =  $this->Pdp->Ajax_TMGoalKPI_View($Pdp_TMGoal_id,$Pdp_emp_id);
              $No                  = 1;
            foreach($Pdp_kpi_results as $G_KPI)
            {
                
                $KPIGoal_des  = $G_KPI['Des'];
                $KPIGoal_date = $G_KPI['Date'];
                $KPI_id       = $G_KPI['ID'];
                if(strlen((string)$No) == 1){ $No2 = "0".$No;}else{ $No2 = $No; }
              
                echo "<tr>
                      <td>".$No2."</td>
                      <td>".$KPIGoal_des."</td>
                      <td>".$KPIGoal_date."</td>
                      <td> 
                      <i class=\"fa fa-pencil\" title=\"Click to edit this KPI\" aria-hidden=\"true\" stye=\"color:red;\" id=\"TMGoal_kpi_edit\" data-goalid=".$Pdp_TMGoal_id." data-kpiid=".$KPI_id." data-kpides=".str_replace(" ","#",$KPIGoal_des)."></i>&nbsp;&nbsp;
                      <i class=\"fa fa-trash\" title=\"Click to delete this KPI\" aria-hidden=\"true\" id=\"TMGoal_kpi_delete\" data-kpiid=".$KPI_id." data-goalid=".$Pdp_TMGoal_id." ></i></td>
                      </tr>";

                $No = $No + 1;
            }
       }
       //For editing a team member goal kpi
       public function Ajax_edit_tmg_kpi()
       {
              $Pdp_TMGoal_kpi_id       =  $this->input->post('Tm_goal_kpi_id');
              $Pdp_TMGoal_kpi_des      =  $this->input->post('TmGoal_kpides');
              $Pdp_emp_id              =  $this->session->userdata('kms_emp_id');
              $Pdp_TMGoal_kpi_results  =  $this->Pdp->Ajax_Edit_TMGoalKPI($Pdp_TMGoal_kpi_id,$Pdp_TMGoal_kpi_des,$Pdp_emp_id);
          if($Pdp_TMGoal_kpi_results == 1){ echo 1; }else{ echo 0;}
       }

      //For deleting a team member goal kpi
      public function Ajax_delete_tmg_goal_kpi()
      {
          $Pdp_TMGkpi_id       =  $this->input->post('TMGKpi');
          $Pdp_emp_id          =  $this->session->userdata('kms_emp_id');
          $Pdp_TMGoal_results  =  $this->Pdp->Ajax_Delete_TMGoal_Kpi($Pdp_TMGkpi_id,$Pdp_emp_id);
          if($Pdp_TMGoal_results == 1){ echo 1; }else{ echo 0;}
      }

      public function Ajax_add_MeasureTarget()
      {
          $Pdp_Ogoal_id       =  $this->input->post('Org_goalid');
          $Pdp_Measure_id     =  $this->input->post('Org_measure_id');
          $Pdp_target_des     =  $this->input->post('Org_target_desc');
          $Pdp_emp_id         =  $this->session->userdata('kms_emp_id');
          $Pdp_Target_results =  $this->Pdp->Ajax_Add_OrgMeasureTarget($Pdp_Ogoal_id,$Pdp_Measure_id,$Pdp_target_des,$Pdp_emp_id);
          if($Pdp_Target_results == 1){ echo 1; }else{ echo 0;}
      }

      public function Ajax_add_DepMeasureTarget()
      {
         $Pdp_Ogoal_id       =  $this->input->post('Org_goalid');
         $Pdp_dgoal_id       =  $this->input->post('Dep_goal');
         $Pdp_Measure_id     =  $this->input->post('Org_measure_id');
         $Pdp_target_des     =  $this->input->post('Org_target_desc');
         $Pdp_emp_id         =  $this->session->userdata('kms_emp_id');
         $Pdp_Target_results =  $this->Pdp->Ajax_Add_DeptMeasureTarget($Pdp_dgoal_id,$Pdp_Ogoal_id,$Pdp_Measure_id,$Pdp_target_des,$Pdp_emp_id);
         if($Pdp_Target_results == 1){ echo 1; }else{ echo 0;}
      }

      public function Ajax_ViewList_OrgMeasure()
      {
        $Pdp_Ogoal_id       =  $this->input->post('Org_goalid');
        $Pdp_type           =  $this->input->post('t');
        $kms_emp_id         =  $this->session->userdata('kms_emp_id');
        $kms_user_level     =  $this->session->userdata('kms_access_user_level');

        if(isset($Pdp_type) && $Pdp_type == 1)
        {
          $Pdp_ListOrg_Measure=  $this->Pdp->Ajax_OrgKPI_View($Pdp_Ogoal_id,$kms_emp_id);
      
          echo "<div class=\"col-sm-6\"><div class=\"form-group\">
                      <label for=\"kms_input_fchat_topic\"  id=\"add_pdp_org_measure_selected_val_label\">Goal Measure:</label>
                       <select class=\"form-control\" id=\"add_pdp_org_measure_selected_val\"  onchange=\"return PDP_Selected_OMeasure_Val();\" ><option value=\"0\" >Please select the measure here...</option>";
            if(!$Pdp_ListOrg_Measure)
            {
                echo "<option value=\"0\">You haven't setup any measure for this goal</option>";
            }
            else
            {
              foreach($Pdp_ListOrg_Measure as $GMeasure)
              {
                  $Measure_id   = $GMeasure['KPI_Id'];
                  $Measure_des  = $GMeasure['KPI Des'];
                  
                  echo "<option value=\"$Measure_id\">".$Measure_des."</option>";
                
              }
            }
          echo  "</select> </div> <i id=\"add_pdp_orgMeasure_error5\" class=\"pull-left\" style=\"color:red;\"></i> </div>"; // 
        }else if (isset($Pdp_type) && $Pdp_type == 3)
        {
          $Pdp_ListOrg_Measure=  $this->Pdp->Ajax_OrgKPI_View($Pdp_Ogoal_id,$kms_emp_id);
          echo "<div class=\"col-sm-6\"><div class=\"form-group\">
                      <label for=\"add_accomp_org_measure_selected_val\"  id=\"add_accomp_org_measure_selected_val_label\">Goal Measure:</label>
                       <select class=\"form-control\" id=\"add_accomp_org_measure_selected_val\" onchange=\"return PDP_Accomp_Selected_OMeasure_Val();\" ><option value=\"0\" >Please select the measure here...</option>";
            if(!$Pdp_ListOrg_Measure)
            {
                echo "<option value=\"0\">You haven't setup any measure for this goal</option>";
            }
            else
            {
              foreach($Pdp_ListOrg_Measure as $GMeasure)
              {
                  $Measure_id   = $GMeasure['KPI_Id'];
                  $Measure_des  = $GMeasure['KPI Des'];
                  echo "<option value=\"$Measure_id\">".$Measure_des."</option>";
                
              }
            }
          echo  "</select><i id=\"add_accomp_org_measure_selected_error\"  style=\"color:red;\"></i>  </div> </div>";
        }
        else {  }
        

        
       
        
      }

     public function Ajax_ViewList_OrgTarget()
     {
      $Pdp_Ogoal_id       =  $this->input->post('Org_goalid');
      $KPI_id             =  $this->input->post('Org_measure');
      $Pdp_type           =  $this->input->post('t');
      $kms_emp_id         =  $this->session->userdata('kms_emp_id');
      $kms_user_level     =  $this->session->userdata('kms_access_user_level');
     
      if(isset($Pdp_type) && $Pdp_type == 1)
      {
        $Pdp_ListOrg_Target =  $this->Pdp->Ajax_OrgTarget_View($Pdp_Ogoal_id,$kms_emp_id,$KPI_id);
     
      
      echo "<div class=\"col-sm-6\"><div class=\"form-group\">
                      <label for=\"kms_input_fchat_topic\"  id=\"add_pdp_org_target_selected_val_label\">Your set target:</label>
                       <select class=\"form-control\" id=\"add_pdp_org_target_selected_val\"   >";
            if(!$Pdp_ListOrg_Target)
            {
                echo "<option value=\"0\">You haven't setup a target for this measure</option>";
            }
            else
            {
              foreach($Pdp_ListOrg_Target as $OTarget)
              {
                $OTarget_id   = $OTarget['Id'];
                $OTarget_des  = $OTarget['Des'];
                  
                  echo "<option value=\"$OTarget_id\">".$OTarget_des."</option>";
                
              }
            }
          echo  "</select> </div> <i id=\"add_pdp_orgTarget_error5\" class=\"pull-left\" style=\"color:red;\"></i> </div>";
      }else if(isset($Pdp_type) && $Pdp_type == 3)
      {
        $Pdp_ListOrg_Target =  $this->Pdp->Ajax_OrgTarget_View($Pdp_Ogoal_id,$kms_emp_id,$KPI_id);
     
      
        echo "<div class=\"col-sm-6\"><div class=\"form-group\">
                        <label for=\"add_accomp_org_target_selected_val\"  id=\"add_accomp_org_target_selected_val_label\">Your set target:</label>
                         <select class=\"form-control\" id=\"add_accomp_org_target_selected_val\"   >";
              if(!$Pdp_ListOrg_Target)
              {
                  echo "<option value=\"0\">You haven't setup a target for this measure</option>";
              }
              else
              {
                foreach($Pdp_ListOrg_Target as $OTarget)
                {
                  $OTarget_id   = $OTarget['Id'];
                  $OTarget_des  = $OTarget['Des'];
                    
                    echo "<option value=\"$OTarget_id\">".$OTarget_des."</option>";
                  
                }
              }
            echo  "</select> </div> <i id=\"add_accomp_org_target_selected_error\" class=\"pull-left\" style=\"color:red;\"></i> </div>";
      }
      else{}
      

     }
     function Ajax_AddNewPDP()
     {
       //Org_goalid,Org_measure:Measure_selected,RMonth:ReportingMonth,Target:Pdp_target
       $Pdp_Ogoal_id       =  $this->input->post('Org_goalid');
       $Pdp_Measure        =  $this->input->post('Org_measure');
       $Pdp_ReportMonth    =  $this->input->post('RMonth');
       $Pdp_Traget         =  $this->input->post('Target');
       $kms_emp_id         =  $this->session->userdata('kms_emp_id');
       $Pdp_Add_results    =  $this->Pdp->Ajax_AddNew_Pdp($kms_emp_id,$Pdp_Ogoal_id,$Pdp_Measure,$Pdp_Traget,$Pdp_ReportMonth);
       if(! $Pdp_Add_results ){ echo 0; }else{ echo $Pdp_Add_results;}
     }

     function Ajax_View_GeneratedPDP()
     {
      $kms_emp_id         =  $this->session->userdata('kms_emp_id');
      $Pdp_UserLevel      =  $this->input->post('t');
      $Pdp_View_Pdp       =  $this->Pdp->Ajax_View_Pdp($kms_emp_id);

      foreach($Pdp_View_Pdp as $pdp)
            {
                $Pdp_id         = $pdp['kms_pdp_id'];
                $Pdp_OrgID      = $pdp['kms_pdp_org_goal_id'];
                $Pdp_MeasureID  = $pdp['kms_pdp_org_kpi_id'];
                $Pdp_TargetID   = $pdp['kms_pdp_org_target_id'];
                $Pdp_Month      = $pdp['kms_pdp_report_month'];
                $Pdp_Date       = $pdp['kms_pdp_date'];

                    if(isset($Pdp_Month) && $Pdp_Month == 1){ $Rmonth = "January";}
               else if(isset($Pdp_Month) && $Pdp_Month == 2){ $Rmonth = "February";}
               else if(isset($Pdp_Month) && $Pdp_Month == 3){ $Rmonth = "March";}
               else if(isset($Pdp_Month) && $Pdp_Month == 4){ $Rmonth = "April";}
               else if(isset($Pdp_Month) && $Pdp_Month == 5){ $Rmonth = "May";}
               else if(isset($Pdp_Month) && $Pdp_Month == 6){ $Rmonth = "June";}
               else if(isset($Pdp_Month) && $Pdp_Month == 7){ $Rmonth = "July";}
               else if(isset($Pdp_Month) && $Pdp_Month == 8){ $Rmonth = "August";}
               else if(isset($Pdp_Month) && $Pdp_Month == 9){ $Rmonth = "September";}
               else if(isset($Pdp_Month) && $Pdp_Month == 10){ $Rmonth = "October";}
               else if(isset($Pdp_Month) && $Pdp_Month == 11){ $Rmonth = "November";}
               else if(isset($Pdp_Month) && $Pdp_Month == 12){ $Rmonth = "December";}
               else { $Rmonth = "No Month set"; }
              
               $PdpView_OrgAccomp = $this->Pdp->Ajax_Count_PdpOrg_Accomp($kms_emp_id,$Pdp_id,$Pdp_OrgID,$Pdp_MeasureID);
               foreach ($PdpView_OrgAccomp as $Accomp)
                {
                  $Org_Accomp  = $Accomp['Count'];
                }
                if(strlen((string)$Org_Accomp) == 1){ $Org_Accomp2 = "0".$Org_Accomp;}else{ $Org_Accomp2 = $Org_Accomp; }
                if($Org_Accomp <= 0){ $Color = "#F08080";}else{ $Color = "green"; }

                
        echo "<tr><td title=\" ".$Rmonth." is the reporting month for this PDP \">".$Rmonth."</td>
                  <td title=\"This PDP was added to KMS on ".$Pdp_Date."\" > ".$Pdp_Date."</td>
                  <td style=\"text-align:center;\" title=\"You currently have ".$Org_Accomp." accomplished tasks\"><span class=\"badge badge-primary\" style=\"background-color:".$Color.";\">".$Org_Accomp2." </span></td>
                  <td>00/03</td>
                  <td>00/02</td>
                  <td><i class=\"fa fa-eye\" aria-hidden=\"true\"></i> &nbsp;&nbsp;<i id=\"AddPdp_Accomplishments\" style=\"color:#00008B;\" class=\"fa fa-plus-circle\" aria-hidden=\"true\" title=\"Click to add accomplishment to this ".$Rmonth." PDP\"></i></td></tr>";
            }

          
     }


     public function Ajax_AddNewPDP_OrgAccomp()
     {
       
       $Pdp_Ogoal_id       =  $this->input->post('Org_goalid');
       $Pdp_Measure        =  $this->input->post('Org_measure');
       $Pdp_AccompDate     =  $this->input->post('Date');
       $Pdp_Accomp         =  $this->input->post('Accomp');
       $Pdp_Rate           =  $this->input->post('Rate');
       $Pdp_id             =  $this->input->post('Pdp_id');
       $kms_emp_id         =  $this->session->userdata('kms_emp_id');
       $Pdp_Add_OrgAccomp  =  $this->Pdp->Ajax_AddNew_PdpOrg_Accomp($kms_emp_id,$Pdp_Ogoal_id,$Pdp_Measure,$Pdp_AccompDate,$Pdp_Accomp,$Pdp_Rate,$Pdp_id);
       if($Pdp_Add_OrgAccomp  == 1){ echo 1; }else{ echo 0;}
       
     }

     public function Ajax_Edit_CRoles()
     {
      $Plan_Role_id       =  $this->input->post('Rid');
      $Plan_Role_desc     =  $this->input->post('Rdes');
      $Plan_Role_rank1    =  $this->input->post('Rrnk1');
      $Plan_Role_rank2    =  $this->input->post('Rrnk2');
      $Plan_Role_rank3    =  $this->input->post('Rrnk3');
      $Plan_Role_rank5    =  $this->input->post('Rrnk5');
      $Plan_Role_skill    =  $this->input->post('skill');
      $kms_emp_id         =  $this->session->userdata('kms_emp_id');
      $CRole_update       =  $this->Planning->Ajax_EditCRole($kms_emp_id,$Plan_Role_desc,$Plan_Role_rank1,$Plan_Role_rank2,$Plan_Role_rank3,$Plan_Role_rank5,$Plan_Role_skill);
      if($CRole_update    == 1){ echo 1; }else{ echo 0;}
     }

     public function Ajax_View_IncomingPlan()
     {
      $Plan_dep           =  $this->input->post('Dep');
      $kms_emp_id         =  $this->session->userdata('kms_emp_id');
      //$ViewPlan_result    =  $this->Planning->Ajax_ViewPlans($kms_emp_id,$Plan_dep);
      $CountPlan_result =  $this->Planning->Ajax_CountPlans($Plan_dep);
       
        if($CountPlan_result == "" || $CountPlan_result == null)
        {
         echo "<tr ><td colspan=\"3\" style=\"text-align: center;\">Sorry, No one in this department has submitted a Critrical Roles indentification form.</td></tr>";
        }
        else
        {
          foreach($CountPlan_result as $Cplan)
          {  
            if(strlen((string)$Cplan['N']) == 1){ $PlanCount = "0".$Cplan['N'];}else{ $PlanCount = $Cplan['N']; }
             if($Cplan['N'] == 0)
             {
              echo "<tr ><td colspan=\"3\" style=\"text-align: center;\">Sorry, No one in this department has submitted a Critrical Roles indentification form.</td></tr>";
             }
             else
             {
              echo "<tr><td >".$Cplan['emp_data_sname']." ".strtoupper($Cplan['emp_data_fname'])."</td><td title=\"Click to view these roles\" style=\"text-align: center;\"><span id=\"View_CRoles_Dep\" data-fname=".$Cplan['emp_data_sname']." data-sname=".$Cplan['emp_data_fname']." data-empid=".$Cplan['emp_data_id']." class=\"badge badge-primary\" style=\"background-color:#020560;text-align:center;\">".$PlanCount."</span></td><td></td><tr>";
             }
            
          }
        }
        
       
     /* if($ViewPlan_result == "" || $ViewPlan_result == null)
      {
        echo "<tr ><td colspan=\"3\" style=\"text-align: center;\">Sorry, No one in this department has submitted a Critrical Roles indentification form.</td></tr>";
      }
      else
      {
        foreach($ViewPlan_result as $VPlan)
        {
          echo "<tr><td>".$VPlan['emp_data_sname']." ".strtoupper($VPlan['emp_data_fname'])."</td><td>".$VPlan['kms_plan_crole_date']."</td><td></td><tr>";
        }
      }
       */
     
     }

     public function Ajax_View_HRCPlan()
     {
        $Plan_Emp_id       =  $this->input->post('id');
        $Plan_Emp_view     =  $this->Planning->Ajax_ViewHRCRole($Plan_Emp_id);
        if(isset($Plan_Emp_view) && $Plan_Emp_view != "")
        {
          foreach($Plan_Emp_view as $View)
          {
            $R_id   =  $View['kms_plan_crole_id'];
            $R_des  =  $View['kms_plan_crole_des'];
            $R_r1   =  $View['kms_plan_crole_rank1'];
            $R_r2   =  $View['kms_plan_crole_rank2'];
            $R_r3   =  $View['kms_plan_crole_rank3'];
            $R_r4   =  $View['kms_plan_crole_rank4'];
            $R_skill=  $View['kms_plan_crole_skill'];
            $R_rt   =  $R_r1+$R_r2+$R_r3+$R_r4;
            if($R_rt >= 15){ $TotalColor = "#c6ca18"; $TickSy = "&#10003"; }else if($R_rt >= 10 && $R_rt <= 14){ $TotalColor = "blue"; $TickSy = ""; }else{ $TotalColor = "yellow"; $TickSy = ""; }
            if($R_skill !="" || $R_skill !=null){ $SkillView = "<i id=\"ViewUniqueskill\"  style=\"color:#c6ca18;\" class=\"fa fa-thumbs-up\" aria-hidden=\"true\" data-skill=".str_replace(" ","`",$R_skill)."></i>"; }else{ $SkillView = "";}

            echo "<tr><td style=\"padding:3px;border-radius: 5px;border: 1px solid #c6ca18;height:45px;\">".$R_des."</td><td style=\"text-align: center;vertical-align: middle;\">".$R_r1."</td><td style=\"text-align: center;vertical-align: middle;\">".$R_r2."</td><td style=\"text-align: center;vertical-align: middle;\">".$R_r3."</td><td style=\"text-align: center;vertical-align: middle;\">".$R_r4."&nbsp;".$SkillView."</td><td style=\"text-align: center;vertical-align: middle;\"><span class=\"badge badge-success\" style=\"background-color:".$TotalColor.";color:black;\">".$R_rt."</span></td><td ><div  style=\"border-radius: 5px;border: 1px solid #c6ca18;margin:2px;\">&nbsp;&nbsp;".$TickSy."&nbsp;&nbsp;</div></td></tr>";
          }
        }
        else
        {
          echo "<tr><td colspan=\"7\">Sorry this user's form can't be processed now</td></tr>";
        }


     }

}

?>