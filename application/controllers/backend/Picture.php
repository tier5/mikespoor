<?php
class Picture extends CI_Controller {
      
	    public function __construct()
        {
                parent::__construct();
				$this->load->model('backend/picture_model');
                // Your own constructor code
        }
        public function index()
        {
			   $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | Picture Category';
				$data['title']='Picture Category';
				$data['bannerlist']=$this->picture_model->getbannerlistmodel();
                $this->load->view('backend/picture_view',$data);
        }
		public function add()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | Picture Category';
				$data['title']='Picture Category - Add New';
				$data['feature']="Add";
                $this->load->view('backend/picture_add_view',$data);
		}
		public function edit($getid)
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | Picture Category';
				$data['title']='Picture Category - Edit';
				$data['bannerinfo']=$this->picture_model->getbannerinfomodel($getid);
				$data['feature']="Edit";
                $this->load->view('backend/picture_add_view',$data);
		}
		public function addbanner()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$res=$this->picture_model->addbannermodel();
				if($res)
				{
					if(isset($_POST['btnSave']) && $_POST['btnSave']=='list')
					{
						$_SESSION['successmsg']='Picture information inserted successfully';
						header('location:'.BASE_URI.'backend/picture');
						exit;
					}
					if(isset($_POST['btnAdd']) && $_POST['btnAdd']=='new')
					{
						$_SESSION['successmsg']='Picture information inserted successfully';
						header('location:'.BASE_URI.'backend/picture/add');
						exit;
					}
					
				}
				else
				{
					   $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/picture/add');
						exit;
				}
		}
		public function editbanner()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$res=$this->picture_model->editbannermodel();
				if($res)
				{
					
						$_SESSION['successmsg']='Picture information updated successfully';
						header('location:'.BASE_URI.'backend/picture/edit/'.$_POST['txtCid']);
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/picture/edit/'.$_POST['txtCid']);
						exit;
				}
		}
		public function changestatus($getid,$getstatus)
		{
			  $this->load->helper('auth_helper');
			  checkuserlogin();
			  $res=$this->picture_model->statusbannermodel($getid,$getstatus);
				if($res)
				{
					
						$_SESSION['successmsg']='Status changed successfully';
						header('location:'.BASE_URI.'backend/picture/'.$_POST['txtCid']);
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/picture/'.$_POST['txtCid']);
						exit;
				}
		}
		public function changefeatured($getid,$getstatus)
		{
			  $this->load->helper('auth_helper');
			  checkuserlogin();
			  $res=$this->picture_model->featuredpicturemodel($getid,$getstatus);
				if($res)
				{
					
						$_SESSION['successmsg']='Featured Status changed successfully';
						header('location:'.BASE_URI.'backend/picture/'.$_POST['txtCid']);
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/picture/'.$_POST['txtCid']);
						exit;
				}
		}
		public function delete($getid)
		{
			  $this->load->helper('auth_helper');
			  checkuserlogin();
			  $res=$this->picture_model->deletebannermodel($getid);
				if($res)
				{
					
						$_SESSION['successmsg']='Picture record deleted successfully';
						header('location:'.BASE_URI.'backend/picture');
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.DOMAIN.'backend/picture');
						exit;
				}
		}


}
?>