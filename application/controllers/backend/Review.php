<?php
class Review extends CI_Controller {
      
	    public function __construct()
        {
                parent::__construct();
				$this->load->model('backend/review_model');
                // Your own constructor code
        }
        public function index()
        {
			   $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | Testimonial';
				$data['title']='Testimonial';
				$data['bannerlist']=$this->review_model->getbannerlistmodel();
                $this->load->view('backend/review_view',$data);
        }
		public function add()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | Testimonial';
				$data['title']='Testimonial - Add New';
				$data['feature']="Add";
                $this->load->view('backend/review_add_view',$data);
		}
		public function edit($getid)
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | Testimonial';
				$data['title']='Testimonial - Edit';
				$data['bannerinfo']=$this->review_model->getbannerinfomodel($getid);
				$data['feature']="Edit";
                $this->load->view('backend/review_add_view',$data);
		}
		public function addbanner()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$res=$this->review_model->addbannermodel();
				if($res)
				{
					if(isset($_POST['btnSave']) && $_POST['btnSave']=='list')
					{
						$_SESSION['successmsg']='Testimonial information inserted successfully';
						header('location:'.BASE_URI.'backend/review');
						exit;
					}
					if(isset($_POST['btnAdd']) && $_POST['btnAdd']=='new')
					{
						$_SESSION['successmsg']='Testimonial information inserted successfully';
						header('location:'.BASE_URI.'backend/review/add');
						exit;
					}
					
				}
				else
				{
					   $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/review/add');
						exit;
				}
		}

		public   function theme()
		{
			$this->load->helper('auth_helper');
			checkuserlogin();
			$this->load->model('backend/login_model');
			$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
			$data['companyinfo']=$this->login_model->getuserinfoid('1');
		    $data['headtitle']=$data['companyinfo']['company_name'].' | Testimonial';
			
			$data['title']='Theme';
            $this->load->view('backend/theme_view',$data);
		}

		public function editbanner()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$res=$this->review_model->editbannermodel();
				if($res)
				{
					
						$_SESSION['successmsg']='Testimonial information updated successfully';
						header('location:'.BASE_URI.'backend/review/edit/'.$_POST['txtCid']);
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/review/edit/'.$_POST['txtCid']);
						exit;
				}
		}
		public function changestatus($getid,$getstatus)
		{
			  $this->load->helper('auth_helper');
			  checkuserlogin();
			  $res=$this->review_model->statusbannermodel($getid,$getstatus);
				if($res)
				{
					
						$_SESSION['successmsg']='Status changed successfully';
						header('location:'.BASE_URI.'backend/review/'.$_POST['txtCid']);
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/review/'.$_POST['txtCid']);
						exit;
				}
		}
		public function delete($getid)
		{
			  $this->load->helper('auth_helper');
			  checkuserlogin();
			  $res=$this->review_model->deletebannermodel($getid);
				if($res)
				{
					
						$_SESSION['successmsg']='Testimonial deleted successfully';
						header('location:'.BASE_URI.'backend/review');
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/review');
						exit;
				}
		}


}
?>