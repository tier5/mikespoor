<?php
class Banner extends CI_Controller {
      
	    public function __construct()
        {
                parent::__construct();
				$this->load->model('backend/banner_model');
                // Your own constructor code
        }
        public function type($getid)
        {
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'];
				//$data['title']='Banner';
				$data['bannerinfo']=$this->banner_model->getcmsinfomodel($getid);
                $this->load->view('backend/banner_view',$data);
        }
		public function editbanner()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$res=$this->banner_model->editbannermodel();
				if($res)
				{
					
						$_SESSION['successmsg']='Banner updated successfully';
						header('location:'.BASE_URI.'backend/banner/type/'.$_REQUEST['txtCid']);
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/banner/type/'.$_REQUEST['txtCid']);
						exit;
				}
		}
		

}
?>