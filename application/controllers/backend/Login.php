<?php
class Login extends CI_Controller {
      
	    public function __construct()
        {
                parent::__construct();
				$this->load->model('backend/login_model');
                // Your own constructor code
        }
        public function index()
        {
			    $this->load->helper('auth_helper');
				checklogin();
				$this->load->model('backend/login_model');
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | Login Page';
				$data['memberinfo']=$this->login_model->getuserinfoid('1');
                $this->load->view('backend/login_view',$data);
        }
		public function loginaccess()
		{
			    $username=$_POST['txtUsername'];
				$userpass=$_POST['txtPassword'];
			    $res=$this->login_model->modelloginaccess($username,$userpass);
				if($res)
				{
					$sessionuser=$this->login_model->getuserinfo($username);
					$_SESSION['usersession']=$sessionuser['admin_id'];
					header('location:'.BASE_URI.'backend/dashboard');
				}
				else
				{
					$_SESSION['errormsg']='Incorrect Username or Password';
					header('location:'.BASE_URI.'backend/login');
				}
		}
		public function logout()
		{
			     unset($_SESSION['usersession']);
				 //session_start();
				 //session_destroy();
				 $_SESSION['successmsg']='Logged out successfully';
				 header('location:'.BASE_URI.'backend/login');
		}

}
?>