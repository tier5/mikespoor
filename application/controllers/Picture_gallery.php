<?php
class Picture_Gallery extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
		public function index()
		{
			    $this->load->model('backend/login_model');
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['title']=$data['companyinfo']['company_name'].' | Picture Gallery';
				
				$this->load->model('backend/picture_model');
				$data['categorylist']=$this->picture_model->fixedbannerlistmodel();
				$this->load->model('backend/picture_gallery_model');
				$data['gallerylist']=$this->picture_gallery_model->fixedbannerlistmodel();
				$data['totalrec']=$this->picture_gallery_model->countactivepicture();
		        $data['nowpage']=1;
				$this->load->model('backend/school_visit_model');
				$data['picturecatlist']=$this->school_visit_model->getfeaturedbannerlistmodel();
				$this->load->model('backend/school_visit_blog_model');
				$data['bloglist']=$this->school_visit_blog_model->getfeaturedbannerlistmodel();
				$this->load->model('backend/seo_settings_model');
				$data['metainfo']=$this->seo_settings_model->getmetainfomodel(3);
			    $this->load->view('user/picture_gallery_view',$data);
		}
		public function category($getid)
		{
			    $this->load->model('backend/login_model');
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
				$data['title']=$data['companyinfo']['company_name'].' | Picture Gallery';
				$this->load->model('backend/picture_model');
				$data['categorylist']=$this->picture_model->fixedbannerlistmodel();
				$this->load->model('backend/picture_model');
				$data['categoryinfo']=$this->picture_model->getbannerslugmodel($getid);
				$data['gallerylist']=$this->picture_model->picturelistmodel($data['categoryinfo']['picture_id']);
				$data['totalrec']=1;
				$data['nowpage']=1;
				$this->load->model('backend/school_visit_model');
				$data['picturecatlist']=$this->school_visit_model->getfeaturedbannerlistmodel();
				$this->load->model('backend/school_visit_blog_model');
				$data['bloglist']=$this->school_visit_blog_model->getfeaturedbannerlistmodel();
				$this->load->model('backend/seo_settings_model');
				$data['metainfo']=$this->seo_settings_model->getmetainfomodel(3);
			    $this->load->view('user/picture_gallery_view',$data);
		}
		public function page($getpage)
	   {
		        $this->load->model('backend/login_model');
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['title']=$data['companyinfo']['company_name'].' | Picture Gallery';
				$this->load->model('backend/picture_model');
				$data['categorylist']=$this->picture_model->fixedbannerlistmodel();
				$this->load->model('backend/picture_gallery_model');
				$data['gallerylist']=$this->picture_gallery_model->paginationsort($getpage);
		       $data['totalrec']=$this->picture_gallery_model->countactivepicture();
		        $data['nowpage']=$getpage;
				$this->load->model('backend/school_visit_model');
				$data['picturecatlist']=$this->school_visit_model->getfeaturedbannerlistmodel();
				$this->load->model('backend/school_visit_blog_model');
				$data['bloglist']=$this->school_visit_blog_model->getfeaturedbannerlistmodel();
				$this->load->model('backend/seo_settings_model');
				$data['metainfo']=$this->seo_settings_model->getmetainfomodel(3);
				 $this->load->view('user/picture_gallery_view',$data);
		
	   }
	   
	   
}

?>