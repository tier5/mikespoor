<?php
class Links_news extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
		public function index()
		{
			    $this->load->model('backend/login_model');
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['title']=$data['companyinfo']['company_name'].' | Links & News';
				$data['headtitle']='Links & News';
				$this->load->model('backend/cms_model');
				$data['cmsinfo']=$this->cms_model->getcmsinfomodel('7');
				$data['headtitle']=$data['cmsinfo']['cms_title'];
				$this->load->model('backend/school_visit_model');
				$data['picturecatlist']=$this->school_visit_model->getfeaturedbannerlistmodel();
				$this->load->model('backend/school_visit_blog_model');
				$data['bloglist']=$this->school_visit_blog_model->getfeaturedbannerlistmodel();
				$this->load->model('backend/seo_settings_model');
				$data['metainfo']=$this->seo_settings_model->getmetainfomodel(5);
			    $this->load->view('user/links_news_view',$data);
		}
}

?>