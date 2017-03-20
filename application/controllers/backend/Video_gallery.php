<?php
class Video_gallery extends CI_Controller {
      
	    public function __construct()
        {
                parent::__construct();
				$this->load->model('backend/video_gallery_model');
                // Your own constructor code
        }
        public function index()
        {
			   $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | Video Gallery Page';
				$data['title']='Video Gallery';
				
				$data['bannerlist']=$this->video_gallery_model->getbannerlistmodel();
                $this->load->view('backend/video_gallery_view',$data);
        }
		public function add()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | Video Gallery Page';
				$data['title']='Video Gallery - Add New';
				$data['feature']="Add";
                $this->load->view('backend/video_gallery_add_view',$data);
		}
		public function edit($getid)
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | Video Gallery Page';
				$data['title']='Video Gallery - Edit';
				$data['bannerinfo']=$this->video_gallery_model->getbannerinfomodel($getid);
				$data['feature']="Edit";
                $this->load->view('backend/video_gallery_add_view',$data);
		}
		public function addbanner()
		{

			
			    $this->load->helper('auth_helper');
				checkuserlogin();
				
				$res=$this->video_gallery_model->addbannermodel();
				if($res)
				{
					if(isset($_POST['btnSave']) && $_POST['btnSave']=='list')
					{
						$_SESSION['successmsg']='Video gallery information inserted successfully';
						header('location:'.BASE_URI.'backend/video_gallery');
						exit;
					}
					if(isset($_POST['btnAdd']) && $_POST['btnAdd']=='new')
					{
						$_SESSION['successmsg']='Video gallery information inserted successfully';
						header('location:'.BASE_URI.'backend/video_gallery/add');
						exit;
					}		
				}
				else
				{
					   $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/video_gallery/add');
						exit;
				}
				
		}
		public function editbanner()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$res=$this->video_gallery_model->editbannermodel();
				if($res)
				{
					
						$_SESSION['successmsg']='Video information updated successfully';
						header('location:'.BASE_URI.'backend/video_gallery/edit/'.$_POST['txtCid']);
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/video_gallery/edit/'.$_POST['txtCid']);
						exit;
				}
		}
		public function changestatus($getid,$getstatus)
		{
			  $this->load->helper('auth_helper');
			  checkuserlogin();
			  $res=$this->video_gallery_model->statusbannermodel($getid,$getstatus);
				if($res)
				{
					
						$_SESSION['successmsg']='Status changed successfully';
						header('location:'.BASE_URI.'backend/video_gallery/'.$_POST['txtCid']);
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/video_gallery/'.$_POST['txtCid']);
						exit;
				}
		}
		public function changefeatured($getid,$getstatus)
		{
			  $this->load->helper('auth_helper');
			  checkuserlogin();
			  $res=$this->video_gallery_model->featuredvideomodel($getid,$getstatus);
				if($res)
				{
					
						$_SESSION['successmsg']='Featured Status changed successfully';
						header('location:'.BASE_URI.'backend/video_gallery/'.$_POST['txtCid']);
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/video_gallery/'.$_POST['txtCid']);
						exit;
				}
		}
		public function delete($getid)
		{
			  $this->load->helper('auth_helper');
			  checkuserlogin();
			  $res=$this->video_gallery_model->deletebannermodel($getid);
				if($res)
				{
					
						$_SESSION['successmsg']='Video gallery record deleted successfully';
						header('location:'.BASE_URI.'backend/video_gallery');
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/video_gallery');
						exit;
				}
		}


}
?>