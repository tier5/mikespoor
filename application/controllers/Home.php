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
                $this->load->model('backend/theme_model');
                $this->load->model('backend/school_visit_model');
                $this->load->model('backend/school_visit_blog_model');
                $this->load->helper('function_helper');
        }
		public function index()
		{
			    
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['theme_color']=$this->theme_model->get_all_info('theme-color');
				$data['font_color']=$this->theme_model->get_all_info('font-color');

			    $data['title']=$data['companyinfo']['company_name'].' | Home';
				
				$data['banners']=$this->home_page_model->getactivebannerlistmodel();
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
				$data['welcome_banner']=$this->home_page_model->current_info_background('welcome_background');
				$data['offer_list']=$this->home_page_model->get_all_offer();
				$data['stats_list']=$this->home_page_model->get_all_stats();
			    
			    $data['bannerlist'] = [];

			    foreach($data['banners'] as $key => $banner) {
			    	if ($banner['constant_status'] == 0) { //None

		            	$data['bannerlist'][$key] = $banner;

		        	} else if ($banner['constant_status'] == 1) { //BG

		            	$data['bannerlist'][$key] = $banner;
		        		$data['bannerlist'][$key]['banner_image'] = ($this->home_page_model->getBGConstantImage())->banner_image;

			    	} else if ($banner['constant_status'] == 2) { //FG

		            	$data['bannerlist'][$key] = $banner;
		        		$data['bannerlist'][$key]['banner_front_image'] = ($this->home_page_model->getFGConstantImage())->banner_front_image;

			    	} else if ($banner['constant_status'] == 3) { //Both
			    		if ($banner['is_bg_constant']) {
			                $data['bannerlist'][0]['banner_image'] = $banner['banner_image'];
			                $data['bannerlist'][0]['background_image_transition'] = $banner['background_image_transition'];
		                }
		                if ($banner['is_fg_constant']) {
			                $data['bannerlist'][0]['banner_front_image'] = $banner['banner_front_image'];
			                $data['bannerlist'][0]['foreground_image_transition'] = $banner['foreground_image_transition'];
		            	}
		            }
			    }
			    //echo '<pre>';print_r($data['bannerlist']);exit;

                //$data['template']='user/home_view';
			    $this->load->view('user/home_view',$data);
		}
		
		
}

?>