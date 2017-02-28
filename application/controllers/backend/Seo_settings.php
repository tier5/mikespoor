<?php
class Seo_settings extends CI_Controller {
      
	    public function __construct()
        {
                parent::__construct();
				$this->load->model('backend/seo_settings_model');
                // Your own constructor code
        }
        public function index()
        {
			   $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | SEO Settings';
				$data['title']='SEO Settings';
				$data['metalist']=$this->seo_settings_model->getmetalistmodel();
                $this->load->view('backend/seo_settings_view',$data);
        }
		public function edit($getid)
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | SEO Settings';
				$data['title']='SEO Settings - Edit';
				$data['metainfo']=$this->seo_settings_model->getmetainfomodel($getid);
				$data['feature']="Edit";
                $this->load->view('backend/seo_edit_view',$data);
		}
		
		public function editmeta()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$res=$this->seo_settings_model->editmetamodel();
				if($res)
				{
					
						$_SESSION['successmsg']='Seo settings updated successfully';
						header('location:'.BASE_URI.'backend/seo-settings/edit/'.$_POST['txtCid']);
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/seo-settings/edit/'.$_POST['txtCid']);
						exit;
				}
		}
		
		


}
?>