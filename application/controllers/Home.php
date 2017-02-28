<?php
class Home extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
		public function index()
		{
			    $this->load->model('backend/login_model');
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['title']=$data['companyinfo']['company_name'].' | Home';
				$this->load->model('backend/home_page_model');
				$data['bannerlist']=$this->home_page_model->getactivebannerlistmodel();
				$data['featurelist']=$this->home_page_model->getactivefeaturedlistmodel();
				$data['homeinfo']=$this->home_page_model->getcmsinfomodel(1);
				$this->load->model('backend/review_model');
				$data['reviewlist']=$this->review_model->getactivebannerlistmodel();
				$this->load->model('backend/picture_gallery_model');
				$data['gallerylist']=$this->picture_gallery_model->getfeaturedbannerlistmodel();
				$this->load->model('backend/seo_settings_model');
				
				$this->load->model('backend/school_visit_model');
				$data['picturecatlist']=$this->school_visit_model->getfeaturedbannerlistmodel();
				$this->load->model('backend/school_visit_blog_model');
				$data['bloglist']=$this->school_visit_blog_model->getfeaturedbannerlistmodel();
				$data['metainfo']=$this->seo_settings_model->getmetainfomodel(1);
				$data['welcome_title']=$this->home_page_model->gethometitle();
				$data['offer_list']=$this->home_page_model->get_all_offer();
			    
                //$data['template']='user/home_view';
			    $this->load->view('user/home_view',$data);
		}
		
		
}

?>