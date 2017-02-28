<?php
class About_us extends CI_Controller {
      
	    public function __construct()
        {
                parent::__construct();
				$this->load->model('backend/cms_model');
                // Your own constructor code
        }
        public function index()
        {
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | About Us';
				$data['title']='About Us';
				$data['bannerinfo']=$this->cms_model->getcmsinfomodel('1');
                $this->load->view('backend/about_us_view',$data);
        }
		public function editcms()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$res=$this->cms_model->editaboutcmsmodel();
				if($res)
				{
					$_SESSION['successmsg']='Content updated successfully';
					header('location:'.BASE_URI.'backend/about-us');
					exit;
				}
				else
				{
					$_SESSION['errormsg']='Seems to be some problem. Try Again';
				    header('location:'.BASE_URI.'backend/about-us');
					exit;
				}
		}
		public function timeline()
		{
		    $this->load->helper('auth_helper');
			checkuserlogin();
			$this->load->model('backend/login_model');
			$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
			$data['companyinfo']=$this->login_model->getuserinfoid('1');
		    $data['headtitle']=$data['companyinfo']['company_name'].' | Timeline';
			$data['title']='About Us - Timeline';
			$this->load->model('backend/timeline_model');
			$data['bannerlist']=$this->timeline_model->getfeaturedlistmodel();
	        $this->load->view('backend/timeline_list_view',$data);
		}
		public function addtimeline()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | Timeline';
				$data['title']='Timeline List - Add New';
				$data['feature']="Add";
                $this->load->view('backend/timeline_list_add_view',$data);
		}
		public function edittimeline($getid)
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | Timeline';
				$data['title']='Timeline List - Edit';
				$this->load->model('backend/timeline_model');
				$data['bannerinfo']=$this->timeline_model->getfeatureinfomodel($getid);
				$data['feature']="Edit";
                $this->load->view('backend/timeline_list_add_view',$data);
		}
		public function addnewtimeline()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/timeline_model');
				$res=$this->timeline_model->addfeaturemodel();
				if($res)
				{
					if(isset($_POST['btnSave']) && $_POST['btnSave']=='list')
					{
						$_SESSION['successmsg']='Timeline Activity created successfully';
						header('location:'.BASE_URI.'backend/about_us/timeline');
						exit;
					}
					if(isset($_POST['btnAdd']) && $_POST['btnAdd']=='new')
					{
						$_SESSION['successmsg']='Timeline Activity created successfully';
						header('location:'.BASE_URI.'backend/about_us/addtimeline');
						exit;
					}
					
				}
				else
				{
					   $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/about_us/timeline');
						exit;
				}
		}
		public function editnewtimeline()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/timeline_model');
				$res=$this->timeline_model->editfeaturemodel();
				if($res)
				{
					
						$_SESSION['successmsg']='Timeline Activity updated successfully';
						header('location:'.BASE_URI.'backend/about-us/edittimeline/'.$_POST['txtCid']);
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/about-us/edittimeline/'.$_POST['txtCid']);
						exit;
				}
		}
		public function changetimelinestatus($getid,$getstatus)
		{
			  $this->load->helper('auth_helper');
			  checkuserlogin();
			  $this->load->model('backend/timeline_model');
			  $res=$this->timeline_model->statusfeaturemodel($getid,$getstatus);
				if($res)
				{
					
						$_SESSION['successmsg']='Timeline status changed successfully';
						header('location:'.BASE_URI.'backend/about-us/timeline');
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/about-us/timeline');
						exit;
				}
		}
		public function deletetimeline($getid)
		{
			  $this->load->helper('auth_helper');
			  checkuserlogin();
			  $this->load->model('backend/timeline_model');
			  $res=$this->timeline_model->deletefeaturemodel($getid);
				if($res)
				{
					
						$_SESSION['successmsg']='Timeline Activity deleted successfully';
						header('location:'.BASE_URI.'backend/about-us/timeline');
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/about-us/timeline');
						exit;
				}
		}

}
?>