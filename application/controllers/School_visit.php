<?php
class School_visit extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
		public function index()
		{
			    $this->load->model('backend/login_model');
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['title']=$data['companyinfo']['company_name'].' | School Visit';
				$this->load->model('backend/video_banner_model');
				$data['videobannerlist']=$this->video_banner_model->getactivebannerlistmodel();
				$this->load->model('backend/school_visit_model');
				$data['categorylist']=$this->school_visit_model->fixedbannerlistmodel();
				$this->load->model('backend/school_visit_blog_model');
				$data['gallerylist']=$this->school_visit_blog_model->fixedbannerlistmodel();
				$data['totalrec']=$this->school_visit_blog_model->countactiveschool_visit_blog();
		        $data['nowpage']=1;
				$this->load->model('backend/school_visit_model');
				$data['picturecatlist']=$this->school_visit_model->getfeaturedbannerlistmodel();
				$this->load->model('backend/school_visit_blog_model');
				$data['bloglist']=$this->school_visit_blog_model->getfeaturedbannerlistmodel();
				$this->load->model('backend/seo_settings_model');
				$data['metainfo']=$this->seo_settings_model->getmetainfomodel(6);
			    $this->load->view('user/school_visit_view',$data);
		}
		public function category($getid)
		{
			    $this->load->model('backend/login_model');
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
				$data['title']=$data['companyinfo']['company_name'].' | Picture Gallery';
				$this->load->model('backend/school_visit_model');
				$data['categorylist']=$this->school_visit_model->fixedbannerlistmodel();
				$data['categoryinfo']=$this->school_visit_model->getbannerslugmodel($getid);
				$this->load->model('backend/video_banner_model');
				$data['videobannerlist']=$this->video_banner_model->getactivebannerlistmodel();
				$this->load->model('backend/school_visit_blog_model');
				$data['gallerylist']=$this->school_visit_blog_model->bloglistmodel($data['categoryinfo']['school_visit_id']);
				$data['totalrec']=1;
				$data['nowpage']=1;
				$this->load->model('backend/school_visit_model');
				$data['picturecatlist']=$this->school_visit_model->getfeaturedbannerlistmodel();
				$this->load->model('backend/school_visit_blog_model');
				$data['bloglist']=$this->school_visit_blog_model->getfeaturedbannerlistmodel();
				$this->load->model('backend/seo_settings_model');
				$data['metainfo']=$this->seo_settings_model->getmetainfomodel(6);
			    $this->load->view('user/school_visit_view',$data);
		}
		public function page($getpage)
	   {
		        $this->load->model('backend/login_model');
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['title']=$data['companyinfo']['company_name'].' | School Visit';
				$this->load->model('backend/picture_model');
				$data['categorylist']=$this->picture_model->fixedbannerlistmodel();
				$this->load->model('backend/school_visit_model');
				$data['categorylist']=$this->school_visit_model->fixedbannerlistmodel();
				$this->load->model('backend/school_visit_blog_model');
				$data['gallerylist']=$this->school_visit_blog_model->paginationsort($getpage);
		       $data['totalrec']=$this->school_visit_blog_model->countactiveschool_visit_blog();
		        $data['nowpage']=$getpage;
				$this->load->model('backend/school_visit_model');
				$data['picturecatlist']=$this->school_visit_model->getfeaturedbannerlistmodel();
				$this->load->model('backend/school_visit_blog_model');
				$data['bloglist']=$this->school_visit_blog_model->getfeaturedbannerlistmodel();
				$this->load->model('backend/seo_settings_model');
				$data['metainfo']=$this->seo_settings_model->getmetainfomodel(6);
				 $this->load->view('user/school_visit_view',$data);
		
	   }
	   public function details($getid)
	   {
		        $this->load->model('backend/login_model');
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
				$data['title']=$data['companyinfo']['company_name'].' | Picture Gallery';
				$this->load->model('backend/school_visit_model');
				$data['categorylist']=$this->school_visit_model->fixedbannerlistmodel();
				$this->load->model('backend/school_visit_blog_model');
				$data['bloginfo']=$this->school_visit_blog_model->getbannerslugmodel($getid);
				$this->load->model('backend/school_visit_model');
				$data['picturecatlist']=$this->school_visit_model->getfeaturedbannerlistmodel();
				$this->load->model('backend/school_visit_blog_model');
				$data['bloglist']=$this->school_visit_blog_model->getfeaturedbannerlistmodel();
				$this->load->model('backend/seo_settings_model');
				$data['metainfo']=$this->seo_settings_model->getmetainfomodel(6);
			    $this->load->view('user/school_visit_details_view',$data);
		
	   }
	   
	   
}

?>