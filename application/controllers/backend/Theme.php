<?php
class Theme extends CI_Controller {
      
	    public function __construct()
        {
            parent::__construct();
		    $this->load->model('backend/login_model');
		    $this->load->model('backend/theme_model');
            // Your own constructor code
        }
        public function index()
        {
			    $this->load->helper('auth_helper');
				checkuserlogin();
				
				$data['theme_color']=$this->theme_model->get_all_info('theme-color');
				$data['font_color']=$this->theme_model->get_all_info('font-color');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | Picture Category';
				$data['title']='Theme';
                $this->load->view('backend/theme_view',$data);
        }
		
}
?>