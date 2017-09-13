<?php
class School_visit_blog extends CI_Controller {
      
	    public function __construct()
        {
                parent::__construct();
				$this->load->model('backend/school_visit_blog_model');
                // Your own constructor code
        }
        public function index()
        {
			   $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | School Visit Blog Page';
				$data['title']='School Visit Blog';
				$data['bannerlist']=$this->school_visit_blog_model->getbannerlistmodel();
				$this->load->model('backend/banner_model');
				$data['inner_page_banner']=$this->banner_model->get_all_banner();
                $this->load->view('backend/school_visit_blog_view',$data);
        }
		public function add()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
				$this->load->model('backend/school_visit_model');
				$data['categorylist']=$this->school_visit_model->getbannerlistmodel();
			    $data['headtitle']=$data['companyinfo']['company_name'].' | School Visit Blog Page';
				$data['title']='School Visit Blog - Add New';
				$data['feature']="Add";
				$this->load->model('backend/banner_model');
				$data['inner_page_banner']=$this->banner_model->get_all_banner();
                $this->load->view('backend/school_visit_blog_add_view',$data);
		}
		public function edit($getid)
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
				$this->load->model('backend/school_visit_model');
				$data['categorylist']=$this->school_visit_model->getbannerlistmodel();
			    $data['headtitle']=$data['companyinfo']['company_name'].' | School Visit Blog Page';
				$data['title']='School Visit Blog - Edit';
				$data['bannerinfo']=$this->school_visit_blog_model->getbannerinfomodel($getid);
				$data['feature']="Edit";
				$this->load->model('backend/banner_model');
				$data['inner_page_banner']=$this->banner_model->get_all_banner();
                $this->load->view('backend/school_visit_blog_add_view',$data);
		}
		public function addbanner()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$res=$this->school_visit_blog_model->addbannermodel();
				if($res)
				{
					if(isset($_POST['btnSave']) && $_POST['btnSave']=='list')
					{
						$_SESSION['successmsg']='Blog information inserted successfully';
						header('location:'.BASE_URI.'backend/school_visit_blog');
						exit;
					}
					if(isset($_POST['btnAdd']) && $_POST['btnAdd']=='new')
					{
						$_SESSION['successmsg']='Blog information inserted successfully';
						header('location:'.BASE_URI.'backend/school_visit_blog/add');
						exit;
					}
					
				}
				else
				{
					   $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/school_visit_blog/add');
						exit;
				}
		}
		public function editbanner()
		{

			
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$res=$this->school_visit_blog_model->editbannermodel();
				if($res)
				{
					
						$_SESSION['successmsg']='Blog updated successfully';
						header('location:'.BASE_URI.'backend/school_visit_blog/edit/'.$_POST['txtCid']);
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/school_visit_blog/edit/'.$_POST['txtCid']);
						exit;
				}
		}
		public function changestatus($getid,$getstatus)
		{
			  $this->load->helper('auth_helper');
			  checkuserlogin();
			  $res=$this->school_visit_blog_model->statusbannermodel($getid,$getstatus);
				if($res)
				{
					
						$_SESSION['successmsg']='Status changed successfully';
						header('location:'.BASE_URI.'backend/school_visit_blog/'.$_POST['txtCid']);
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/school_visit_blog/'.$_POST['txtCid']);
						exit;
				}
		}
		public function changefeatured($getid,$getstatus)
		{
			  $this->load->helper('auth_helper');
			  checkuserlogin();
			  $res=$this->school_visit_blog_model->featuredschool_visit_blogmodel($getid,$getstatus);
				if($res)
				{
					
						$_SESSION['successmsg']='Featured Status changed successfully';
						header('location:'.BASE_URI.'backend/school_visit_blog/'.$_POST['txtCid']);
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/school_visit_blog/'.$_POST['txtCid']);
						exit;
				}
		}
		public function delete($getid)
		{
			  $this->load->helper('auth_helper');
			  checkuserlogin();
			  $res=$this->school_visit_blog_model->deletebannermodel($getid);
				if($res)
				{
					
						$_SESSION['successmsg']='Blog record deleted successfully';
						header('location:'.BASE_URI.'backend/school_visit_blog');
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/school_visit_blog');
						exit;
				}
		}


}
?>