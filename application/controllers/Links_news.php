<?php
class Links_news extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('backend/link_model');
                $this->load->model('backend/subscribe_model');
                $this->load->helper('function_helper');
                
                // Your own constructor code
        }
		public function index()
		{
			     $this->load->model('backend/theme_model');
			    $data['theme_color']=$this->theme_model->get_all_info('theme-color');
				$data['font_color']=$this->theme_model->get_all_info('font-color');
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
				$this->load->model('backend/banner_model');
                 $data['banner']=$this->banner_model->getallbannerbyslug('link_news');
                $data['focus_banner']=$this->banner_model->getmiddlebannerbyslug('link_news');
				$data['metainfo']=$this->seo_settings_model->getmetainfomodel(5);
				$data['all_link']=$this->link_model->all_link();
			    $this->load->view('user/links_news_view',$data);
		}

		public function subscribe(){

			$subscriber=$this->input->post('subscribe');
            $addsubscriber=$this->subscribe_model->check_mail($subscriber);
            if($addsubscriber){
            	if($addsubscriber['status']==0 || $addsubscriber['status']=="0"){
                   echo "You Are Already A Subscriber!";
            	}else{
            		$con['subscriber_id']=$addsubscriber['subscriber_id'];
            		$data['status']=0;
            		$update=$this->subscribe_model->update("lm_subscriber",$con,$data);
            		if($update){
                  		echo "Subscription Successfull!";
					}else{
						echo "Subscription Failed!";
					}
            	}
            }else{
                
				$data['subscriber_email']=$subscriber;
				$data['status']=0;
				$data['Created_at']=date('Y-m-d H:i:s');
				$data['Updated_at']=date('Y-m-d H:i:s');
				$addsubscriber=$this->subscribe_model->insert("lm_subscriber", $data);
				if($addsubscriber){
                  echo "Subscription Successfull!";
				}else{
					echo "Subscription Failed!";
				}
			}
		}

		public function un_subscribe($id=null){
			$ids=base64_decode($id);
			$this->load->model('backend/theme_model');
			$data['theme_color']=$this->theme_model->get_all_info('theme-color');
			$data['font_color']=$this->theme_model->get_all_info('font-color');
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
			$this->load->model('backend/banner_model');
            $data['banner']=$this->banner_model->getallbannerbyslug('link_news');
            $data['focus_banner']=$this->banner_model->getmiddlebannerbyslug('link_news');
			$data['metainfo']=$this->seo_settings_model->getmetainfomodel(5);
			$data['subscriber']=$this->subscribe_model->check_id($ids);
			$this->load->view('user/unsubscription',$data);

		}

		public function removesub(){
			
			$con['subscriber_email']=$this->input->post('subscribe');
            $data['status']=1;
            $update=$this->subscribe_model->update("lm_subscriber",$con,$data);
            if($update){
                  	echo "Unubscription Successfull!";
			}else{
					echo "Unbscription Failed!";
			}
		}
}

?>