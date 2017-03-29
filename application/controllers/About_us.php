<?php
class About_us extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper('function_helper');
                // Your own constructor code
        }
		public function index()
		{
			    $this->load->model('backend/login_model');
			    $this->load->model('backend/theme_model');
			    $data['theme_color']=$this->theme_model->get_all_info('theme-color');
				$data['font_color']=$this->theme_model->get_all_info('font-color');

				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['title']=$data['companyinfo']['company_name'].' | About Us';
				$this->load->model('backend/video_banner_model');
				$data['videobannerlist']=$this->video_banner_model->getactivebannerlistmodel();
				$this->load->model('backend/cms_model');
				$data['aboutinfo']=$this->cms_model->getcmsinfomodel('1');
				$this->load->model('backend/school_visit_model');
				$data['picturecatlist']=$this->school_visit_model->getfeaturedbannerlistmodel();
				$this->load->model('backend/school_visit_blog_model');
				$data['bloglist']=$this->school_visit_blog_model->getfeaturedbannerlistmodel();
                $this->load->model('backend/timeline_model');

                $this->load->model('backend/banner_model');
                $data['banner']=$this->banner_model->getallbannerbyslug('about');
                $data['focus_banner']=$this->banner_model->getmiddlebannerbyslug('about');
                $this->load->model('backend/timeline_model');

             
				$data['timelinelist']=$this->timeline_model->getactivefeaturedlistmodel();
				$this->load->model('backend/seo_settings_model');
				$data['metainfo']=$this->seo_settings_model->getmetainfomodel(2);
			    $this->load->view('user/about_us_view',$data);
		}
}

?>