<?php
class Dashboard extends CI_Controller {
      
	    public function __construct()
        {
                parent::__construct();
				
                // Your own constructor code
        }
        public function index()
        {
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | Dashboard';
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$this->load->model('backend/video_gallery_model');
				$data['videocount']=$this->video_gallery_model->countvideo();
				$this->load->model('backend/picture_gallery_model');
				$data['imagecount']=$this->picture_gallery_model->countpicture();
				$this->load->model('backend/school_visit_blog_model');
				$data['blogcount']=$this->school_visit_blog_model->countschool_visit_blog();
                $this->load->view('backend/dashboard_view',$data);
        }
		

}
?>