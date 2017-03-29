<?php
class School_visit extends CI_Controller {
      
	    public function __construct()
        {
                parent::__construct();
				$this->load->model('backend/school_visit_model');
                // Your own constructor code
        }
        public function index()
        {
			   $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | School Visit Category';
				$data['title']='School Visit Category';
				$data['bannerlist']=$this->school_visit_model->getbannerlistmodel();
				$this->load->model('backend/banner_model');
				$data['inner_page_banner']=$this->banner_model->get_all_banner();
                $this->load->view('backend/school_visit_view',$data);
        }
		public function add()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | School Visit Category';
				$data['title']='School Visit Category - Add New';
				$data['feature']="Add";
				$this->load->model('backend/banner_model');
				$data['inner_page_banner']=$this->banner_model->get_all_banner();
                $this->load->view('backend/school_visit_add_view',$data);
		}
		public function edit($getid)
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | School Visit Category';
				$data['title']='School Visit Category - Edit';
				$data['bannerinfo']=$this->school_visit_model->getbannerinfomodel($getid);
				$data['feature']="Edit";
				$this->load->model('backend/banner_model');
				$data['inner_page_banner']=$this->banner_model->get_all_banner();
                $this->load->view('backend/school_visit_add_view',$data);
		}
		public function addbanner()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$res=$this->school_visit_model->addbannermodel();
				if($res)
				{
					if(isset($_POST['btnSave']) && $_POST['btnSave']=='list')
					{
						$_SESSION['successmsg']='School Visit information inserted successfully';
						header('location:'.BASE_URI.'backend/school_visit');
						exit;
					}
					if(isset($_POST['btnAdd']) && $_POST['btnAdd']=='new')
					{
						$_SESSION['successmsg']='School Visit information inserted successfully';
						header('location:'.BASE_URI.'backend/school_visit/add');
						exit;
					}
					
				}
				else
				{
					   $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/school_visit/add');
						exit;
				}
		}
		public function editbanner()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$res=$this->school_visit_model->editbannermodel();
				if($res)
				{
					
						$_SESSION['successmsg']='School Visit information updated successfully';
						header('location:'.BASE_URI.'backend/school_visit/edit/'.$_POST['txtCid']);
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/school_visit/edit/'.$_POST['txtCid']);
						exit;
				}
		}
		public function changestatus($getid,$getstatus)
		{
			  $this->load->helper('auth_helper');
			  checkuserlogin();
			  $res=$this->school_visit_model->statusbannermodel($getid,$getstatus);
				if($res)
				{
					
						$_SESSION['successmsg']='Status changed successfully';
						header('location:'.BASE_URI.'backend/school_visit/'.$_POST['txtCid']);
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/school_visit/'.$_POST['txtCid']);
						exit;
				}
		}
		public function changefeatured($getid,$getstatus)
		{
			  $this->load->helper('auth_helper');
			  checkuserlogin();
			  $res=$this->school_visit_model->featuredschool_visitmodel($getid,$getstatus);
				if($res)
				{
					
						$_SESSION['successmsg']='Featured Status changed successfully';
						header('location:'.BASE_URI.'backend/school_visit/'.$_POST['txtCid']);
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/school_visit/'.$_POST['txtCid']);
						exit;
				}
		}
		public function delete($getid)
		{
			  $this->load->helper('auth_helper');
			  checkuserlogin();
			  $res=$this->school_visit_model->deletebannermodel($getid);
				if($res)
				{
					
						$_SESSION['successmsg']='School Visit record deleted successfully';
						header('location:'.BASE_URI.'backend/school_visit');
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/school_visit');
						exit;
				}
		}

		


}
?>