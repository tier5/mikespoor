<?php
class Home extends CI_Controller {

        public function __construct()
        {
                parent::__construct();

                $this->load->model('backend/login_model');
                $this->load->model('backend/home_page_model');
                $this->load->model('backend/review_model');
                $this->load->model('backend/picture_gallery_model');
                $this->load->model('backend/seo_settings_model');
                $this->load->model('backend/school_visit_model');
                $this->load->model('backend/school_visit_blog_model');
        }
		public function index()
		{
			    
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    

			    $data['title']=$data['companyinfo']['company_name'].' | Home';
				
				$data['bannerlist']=$this->home_page_model->getactivebannerlistmodel();
				$data['featurelist']=$this->home_page_model->getactivefeaturedlistmodel();
				$data['homeinfo']=$this->home_page_model->getcmsinfomodel(1);
				
				$data['reviewlist']=$this->review_model->getactivebannerlistmodel();
				
				$data['gallerylist']=$this->picture_gallery_model->getfeaturedbannerlistmodel();

				$data['current_info']=$this->home_page_model->get_active_current_info();
				$data['current_info_banner']=$this->home_page_model->current_info_background('current_info');

				$data['picturecatlist']=$this->school_visit_model->getfeaturedbannerlistmodel();
		
				$data['bloglist']=$this->school_visit_blog_model->getfeaturedbannerlistmodel();
				$data['metainfo']=$this->seo_settings_model->getmetainfomodel(1);
				$data['welcome_title']=$this->home_page_model->gethometitle();
				$data['offer_list']=$this->home_page_model->get_all_offer();
				$data['stats_list']=$this->home_page_model->get_all_stats();
			    
                //$data['template']='user/home_view';
			    $this->load->view('user/home_view',$data);
		}
		
		
}

?>