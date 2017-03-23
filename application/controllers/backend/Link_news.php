<?php
class Link_news extends CI_Controller {
      
	    public function __construct()
        {
                parent::__construct();
				$this->load->model('backend/cms_model');
				$this->load->model('backend/banner_model');
				$this->load->model('backend/link_model');
				$this->load->library('image_lib');
                // Your own constructor code
        }
        public function index()
        {
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | Link & News';
				$data['title']='Link & News';
				$data['bannerinfo']=$this->cms_model->getcmsinfomodel('7');
				
				$data['inner_page_banner']=$this->banner_model->get_all_banner();
				$data['all_link']=$this->link_model->all_link();
                $this->load->view('backend/link_news_view',$data);
        }
		public function editcms()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$res=$this->cms_model->editcmsmodel();
				if($res)
				{
					
						$_SESSION['successmsg']='Content updated successfully';
						header('location:'.BASE_URI.'backend/link-news');
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/link-news');
						exit;
				}
		}

		public function add_edit_link_news($linkid="")
		{
                $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | Link & News';
			    if($linkid)
			    {
			    	$data['title']='Link & News - Edit';
			    	$data['feature']='Edit';
			    } else {
                    $data['title']='Link & News - Add';
                    $data['feature']='Add';
			    }
				
				if($linkid)
			    {
			    	$data['link_details']=$this->link_model->get_link_details($linkid);
			    }

				$data['bannerinfo']=$this->cms_model->getcmsinfomodel('7');
				$data['inner_page_banner']=$this->banner_model->get_all_banner();
				$data['all_link']=$this->link_model->all_link();
                $this->load->view('backend/link_news_edit',$data);
		}

		public function edit_link_news()
		{
            $this->load->helper('auth_helper');
			checkuserlogin();
			$con['linkid']=$this->input->post('txtCid');
            if($_FILES['imgBanner']['name'])
            {
				$photopath2 = pathinfo($_FILES['imgBanner']['name']);
		        $extension2 = $photopath2['extension'];
		        $source2 = $_FILES['imgBanner']['tmp_name'];
		        $gallery_pdf1 =time()."_".$_POST['txtCid'].".".$extension2;
		        $destination2 = "uploads/link_news/".$gallery_pdf1;
		        if(move_uploaded_file($source2,$destination2)){
		            /*** image resize ***/
					$config['image_library'] = 'gd2';
				    $config['source_image'] = "uploads/link_news/".$gallery_pdf1;
				    $config['new_image'] ='uploads/link_news/thumb/'.$gallery_pdf1;
				    $config['maintain_ratio'] = TRUE;
				    $config['height']   = 300;

				    $this->image_lib->initialize($config);
				    if(!$this->image_lib->resize())
				    {
				    	$_SESSION['errormsg']='Seems to be some problem. Try Again1';
						header('location:'.BASE_URI.'backend/link_news/add_edit_link_news/'.$con['linkid']);
						exit;
				    }
				    else {
				    	$data['link_logo']=$gallery_pdf1;
				    }
				}else {
					$_SESSION['errormsg']='Seems to be some problem. Try Again2';
					header('location:'.BASE_URI.'backend/link_news/add_edit_link_news/'.$con['linkid']);
					exit;
				}
			}
                 $data['link_name']=trim(($_POST['txtTitle']));
                  $data['link_content']= htmlspecialchars($_POST['editor1']);
			
                $query=$this->link_model->update('lm_link', $con,$data);
				if($query)
				{
					$_SESSION['successmsg']='Link and News Updated Successfully';
					header('location:'.BASE_URI.'backend/link_news/add_edit_link_news/'.$con['linkid']);
					exit;
				}
				else
				{
					$_SESSION['errormsg']='Seems to be some problem. Try Again';
					header('location:'.BASE_URI.'backend/link_news/add_edit_link_news/'.$con['linkid']);
					exit;
				}
		}

		public function add_link_news()
		{
            $this->load->helper('auth_helper');
			checkuserlogin();
			
            if($_FILES['imgBanner']['name'])
            {
				$photopath2 = pathinfo($_FILES['imgBanner']['name']);
		        $extension2 = $photopath2['extension'];
		        $source2 = $_FILES['imgBanner']['tmp_name'];
		        $gallery_pdf1 =time()."_".$_POST['txtCid'].".".$extension2;
		        $destination2 = "uploads/link_news/".$gallery_pdf1;
		        if(move_uploaded_file($source2,$destination2)){
		            /*** image resize ***/
					$config['image_library'] = 'gd2';
				    $config['source_image'] = "uploads/link_news/".$gallery_pdf1;
				    $config['new_image'] ='uploads/link_news/thumb/'.$gallery_pdf1;
				    $config['maintain_ratio'] = TRUE;
				    $config['height']   = 250;

				    $this->image_lib->initialize($config);
				    if(!$this->image_lib->resize())
				    {
				    	$_SESSION['errormsg']='Seems to be some problem. Try Again1';
						header('location:'.BASE_URI.'backend/link_news/add_edit_link_news');
						exit;
				    }
				    else {
				    	$data['link_logo']=$gallery_pdf1;
				    }
				}else {
					$_SESSION['errormsg']='Seems to be some problem. Try Again2';
					header('location:'.BASE_URI.'backend/link_news/add_edit_link_news');
					exit;
				}
			}
                  $data['link_name']=trim(($_POST['txtTitle']));
                  $data['link_content']= htmlspecialchars($_POST['editor1']);
			
                $query=$this->link_model->insert('lm_link', $data);
				if($query)
				{
					$_SESSION['successmsg']='Link and News Updated Successfully';
					header('location:'.BASE_URI.'backend/link_news');
					exit;
				}
				else
				{
					$_SESSION['errormsg']='Seems to be some problem. Try Again';
					header('location:'.BASE_URI.'backend/link_news/add_edit_link_news');
					exit;
				}
		}



		

}
?>