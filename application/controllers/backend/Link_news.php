<?php
class Link_news extends CI_Controller {
      
	    public function __construct()
        {
                parent::__construct();
				$this->load->model('backend/cms_model');
                // Your own constructor code
        }
        public function index()
        {
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | Link & News';
				$data['title']='Link & News';
				$data['bannerinfo']=$this->cms_model->getcmsinfomodel('7');
                $this->load->view('backend/link_news_view',$data);
        }
		public function editcms()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$res=$this->cms_model->editcmsmodel();
				if($res)
				{
					
						$_SESSION['successmsg']='Content updated successfully';
						header('location:'.BASE_URI.'backend/link-news');
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/link-news');
						exit;
				}
		}
		

}
?>