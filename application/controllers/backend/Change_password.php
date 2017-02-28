<?php
class Change_password extends CI_Controller {
      
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
			    $data['headtitle']=$data['companyinfo']['company_name'].' | User Profile';
				$data['title']='User Profile';
				$data['userinfo']=$this->login_model->getmemberinfoid($_SESSION['usersession']);
                $this->load->view('backend/change_password_view',$data);
        }
		public function editsite()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$res=$this->login_model->editpasswordmodel();
				if($res)
				{
					
						$_SESSION['successmsg']='Password updated successfully';
						header('location:'.BASE_URI.'backend/change-password');
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/change-password');
						exit;
				}
		}
		public function editnamesite()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$res=$this->login_model->editusernamemodel();
				if($res)
				{
					
						$_SESSION['ssuccessmsg']='Username updated successfully';
						header('location:'.BASE_URI.'backend/change-password');
						exit;
					
				}
				else
				{
					    $_SESSION['eerrormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/change-password');
						exit;
				}
		}
		

}
?>