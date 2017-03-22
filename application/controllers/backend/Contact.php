<?php
class Contact extends CI_Controller {
      
	    public function __construct()
        {
                parent::__construct();
				$this->load->model('backend/cms_model');
				$this->load->model('backend/login_model');
                // Your own constructor code
        }
        public function index()
        {
			    $this->load->helper('auth_helper');
				checkuserlogin();
				
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | Contact Us';
				$data['title']='Contact Us';
				$data['bannerinfo']=$this->cms_model->getcmsinfomodel('8');
				$this->load->model('backend/banner_model');
				$data['inner_page_banner']=$this->banner_model->get_all_banner();
                $this->load->view('backend/contact_view',$data);
        }
		public function editcms()
		{
		    $this->load->helper('auth_helper');
			checkuserlogin();
			$res=$this->cms_model->editcontactmodel();
			
			if($res){
				$_SESSION['successmsg']='Content updated successfully';
				header('location:'.BASE_URI.'backend/contact');
				exit;
			} else {
				$_SESSION['errormsg']='Seems to be some problem. Try Again';
				header('location:'.BASE_URI.'backend/contact');
				exit;
			}
		}

		
		

}
?>