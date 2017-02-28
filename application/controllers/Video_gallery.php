<?php
class Video_Gallery extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
		public function index()
		{
			    $this->load->model('backend/login_model');
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['title']=$data['companyinfo']['company_name'].' | Video Gallery';
				$this->load->model('backend/video_banner_model');
				$data['videobannerlist']=$this->video_banner_model->getactivebannerlistmodel();
				$this->load->model('backend/video_gallery_model');
				$data['gallerylist']=$this->video_gallery_model->fixedbannerlistmodel();
				$data['totalrec']=$this->video_gallery_model->countactivevideo();
		        $data['nowpage']=1;
				$this->load->model('backend/school_visit_model');
				$data['picturecatlist']=$this->school_visit_model->getfeaturedbannerlistmodel();
				$this->load->model('backend/school_visit_blog_model');
				$data['bloglist']=$this->school_visit_blog_model->getfeaturedbannerlistmodel();
				$this->load->model('backend/seo_settings_model');
				$data['metainfo']=$this->seo_settings_model->getmetainfomodel(4);
			    $this->load->view('user/video_gallery_view',$data);
		}
		
		public function page($getpage)
	   {
		        $this->load->model('backend/login_model');
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['title']=$data['companyinfo']['company_name'].' | Video Gallery';
				$this->load->model('backend/video_banner_model');
				$data['videobannerlist']=$this->video_banner_model->getactivebannerlistmodel();
				$this->load->model('backend/video_gallery_model');
				$data['gallerylist']=$this->video_gallery_model->paginationsort($getpage);
		       $data['totalrec']=$this->video_gallery_model->countactivevideo();
		        $data['nowpage']=$getpage;
				$this->load->model('backend/school_visit_model');
				$data['picturecatlist']=$this->school_visit_model->getfeaturedbannerlistmodel();
				$this->load->model('backend/school_visit_blog_model');
				$data['bloglist']=$this->school_visit_blog_model->getfeaturedbannerlistmodel();
				$this->load->model('backend/seo_settings_model');
				$data['metainfo']=$this->seo_settings_model->getmetainfomodel(4);
				 $this->load->view('user/video_gallery_view',$data);
		
	   }
	   
	   
}

?>