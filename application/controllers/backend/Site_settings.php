<?php
class Site_settings extends CI_Controller {
      
	    public function __construct()
        {
                parent::__construct();
				$this->load->model('backend/login_model');
                // Your own constructor code
        }
        public function index()
        {
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | Site Settings';
				$data['title']='Site Settings';
				$data['userinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
                $this->load->view('backend/site_settings_view',$data);
        }
		public function editsite()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$res=$this->login_model->editsitemodel();
				if($res)
				{
					
						$_SESSION['successmsg']='Site information updated successfully';
						header('location:'.BASE_URI.'backend/site-settings');
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/site-settings');
						exit;
				}
		}
		

}
?>