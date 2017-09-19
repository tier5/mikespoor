<?php
class Home_page extends CI_Controller {
      
	    public function __construct() {

                parent::__construct();
				$this->load->model('backend/home_page_model');
        }

        public function index() {

		    $this->load->helper('auth_helper');
			checkuserlogin();
			$this->load->model('backend/login_model');
			$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
			$data['companyinfo']=$this->login_model->getuserinfoid('1');
		    $data['headtitle']=$data['companyinfo']['company_name'].' | Home Page';
			$data['title']='Home Page - Banner List';
			$data['bannerlist']=$this->home_page_model->getbannerlistmodel();
			$this->load->model('backend/banner_model');
			$data['inner_page_banner']=$this->banner_model->get_all_banner();
            $this->load->view('backend/home_page_view',$data);
        }

		public function add(){

		    $this->load->helper('auth_helper');
			checkuserlogin();
			$this->load->model('backend/login_model');
			$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
			$data['companyinfo']=$this->login_model->getuserinfoid('1');
		    $data['headtitle']=$data['companyinfo']['company_name'].' | Home Page';
			$data['title']='Home Page Banner - Add New';
			$data['feature']="Add";
			$this->load->model('backend/banner_model');
			$data['inner_page_banner']=$this->banner_model->get_all_banner();
            $this->load->view('backend/home_page_add_view',$data);
		}

		public function addfeature(){

		    $this->load->helper('auth_helper');
			checkuserlogin();
			$this->load->model('backend/login_model');
			$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
			$data['companyinfo']=$this->login_model->getuserinfoid('1');
		    $data['headtitle']=$data['companyinfo']['company_name'].' | Home Page';
			$data['title']='Feature List - Add New';
			$data['feature']="Add";
			$this->load->model('backend/banner_model');
			$data['inner_page_banner']=$this->banner_model->get_all_banner();
            $this->load->view('backend/featured_list_add_view',$data);
		}

		public function edit($getid){

			    $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | Home Page';
				$data['title']='Home Page Banner - Edit';
				$data['bannerinfo']=$this->home_page_model->getbannerinfomodel($getid);
				$data['feature']="Edit";
				$this->load->model('backend/banner_model');
				$data['inner_page_banner']=$this->banner_model->get_all_banner();
                $this->load->view('backend/home_page_add_view',$data);
		}

		public function editfeature($getid){

		    $this->load->helper('auth_helper');
			checkuserlogin();
			$this->load->model('backend/login_model');
			$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
			$data['companyinfo']=$this->login_model->getuserinfoid('1');
		    $data['headtitle']=$data['companyinfo']['company_name'].' | Home Page';
			$data['title']='Feature List - Edit';
			$data['bannerinfo']=$this->home_page_model->getfeatureinfomodel($getid);
			$data['feature']="Edit";
			$this->load->model('backend/banner_model');
			$data['inner_page_banner']=$this->banner_model->get_all_banner();
            $this->load->view('backend/featured_list_add_view',$data);
		}

		public function addbanner(){
			    $this->load->helper('auth_helper');
			    $this->load->helper('errorMsg_helper');
				checkuserlogin();
				$res=$this->home_page_model->addbannermodel();
				// print_r($res);
				// exit();
				if($res)
				{
					if(isset($_POST['btnSave']) && $_POST['btnSave']=='list') {
						errorCheck('backend/home-page', $res);
						$_SESSION['successmsg']='Banner created successfully';
						header('location:'.BASE_URI.'backend/home-page');
						exit;
					}
					if(isset($_POST['btnAdd']) && $_POST['btnAdd']=='new') {
						errorCheck('backend/home-page/add', $res);
						$_SESSION['successmsg']='Banner created successfully';
						header('location:'.BASE_URI.'backend/home-page/add');
						exit;
					}
				}
				else
				{
					$_SESSION['errormsg']='Seems to be some problem. Try Again';
					header('location:'.BASE_URI.'backend/home-page/add');
					exit;
				}
		}
		public function addnewfeature()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$res=$this->home_page_model->addfeaturemodel();
				if($res)
				{
					if(isset($_POST['btnSave']) && $_POST['btnSave']=='list')
					{
						$_SESSION['successmsg']='Feature created successfully';
						header('location:'.BASE_URI.'backend/home-page/feature-list');
						exit;
					}
					if(isset($_POST['btnAdd']) && $_POST['btnAdd']=='new')
					{
						$_SESSION['successmsg']='Feature created successfully';
						header('location:'.BASE_URI.'backend/home-page/addfeature');
						exit;
					}
					
				}
				else
				{
					   $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/home-page/addfeature');
						exit;
				}
		}
		public function editbanner()
		{
			    $this->load->helper('auth_helper');
			    $this->load->helper('errorMsg_helper');
				checkuserlogin();
				$res=$this->home_page_model->editbannermodel();
				if($res)
				{
					errorCheck('backend/home-page/edit/'.$_POST['txtCid'], $res);
					$_SESSION['successmsg']='Banner updated successfully';
					header('location:'.BASE_URI.'backend/home-page/edit/'.$_POST['txtCid']);
					exit;
					
				}
				else
				{
						errorCheck('backend/home-page/edit/'.$_POST['txtCid'], $res);
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/home-page/edit/'.$_POST['txtCid']);
						exit;
				}
		}

		public function saveforeend(){
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$data['foreground_image_transition']=$this->input->post('transition_fore');
				$res=$this->home_page_model->update_forground_transition($data);
				if($res)
				{
					
						$_SESSION['successmsg']='Foreground Transition Time Saved';
						header('location:'.BASE_URI.'backend/home-page');
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/home-page/');
						exit;
				}
				
		}

		public function savebackend(){
			$this->load->helper('auth_helper');
			checkuserlogin();
			$data['background_image_transition']=$this->input->post('transition_back');
			$res=$this->home_page_model->update_forground_transition($data);
			if($res){
				$_SESSION['successmsg']='Background Transition Time Saved';
				header('location:'.BASE_URI.'backend/home-page');
				exit;
					
			}else{
			    $_SESSION['errormsg']='Seems to be some problem. Try Again';
				header('location:'.BASE_URI.'backend/home-page/');
				exit;
			}	
		}



		public function editnewfeature()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$res=$this->home_page_model->editfeaturemodel();
				if($res)
				{
					
						$_SESSION['successmsg']='Feature updated successfully';
						header('location:'.BASE_URI.'backend/home-page/editfeature/'.$_POST['txtCid']);
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/home-page/editfeature/'.$_POST['txtCid']);
						exit;
				}
		}
		public function changestatus($getid,$getstatus)
		{
			  $this->load->helper('auth_helper');
			  checkuserlogin();
			  $res=$this->home_page_model->statusbannermodel($getid,$getstatus);
				if($res)
				{
					
						$_SESSION['successmsg']='Banner status changed successfully';
						header('location:'.BASE_URI.'backend/home-page/'.$_POST['txtCid']);
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/home-page/'.$_POST['txtCid']);
						exit;
				}
		}
		public function changefeaturestatus($getid,$getstatus)
		{
			  $this->load->helper('auth_helper');
			  checkuserlogin();
			  $res=$this->home_page_model->statusfeaturemodel($getid,$getstatus);
				if($res)
				{
					
						$_SESSION['successmsg']='Feature status changed successfully';
						header('location:'.BASE_URI.'backend/home-page/feature-list/'.$_POST['txtCid']);
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/home-page/feature-list/'.$_POST['txtCid']);
						exit;
				}
		}
		public function delete($getid)
		{
			  $this->load->helper('auth_helper');
			  checkuserlogin();
			  $res=$this->home_page_model->deletebannermodel($getid);
				if($res)
				{
					
						$_SESSION['successmsg']='Banner deleted successfully';
						header('location:'.BASE_URI.'backend/home-page');
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/home-page');
						exit;
				}
		}
		public function deletefeature($getid)
		{
			  $this->load->helper('auth_helper');
			  checkuserlogin();
			  $res=$this->home_page_model->deletefeaturemodel($getid);
				if($res)
				{
					
						$_SESSION['successmsg']='Feature deleted successfully';
						header('location:'.BASE_URI.'backend/home-page/feature-list');
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/home-page/feature-list');
						exit;
				}
		}
         public function content()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | Content ';
				$data['title']='Content ';
				$data['bannerinfo']=$this->home_page_model->getcmsinfomodel(1);
				$data['feature']="Edit";
				$this->load->model('backend/banner_model');
				$data['inner_page_banner']=$this->banner_model->get_all_banner();
                $this->load->view('backend/home_content_view',$data);
		}
		public function contentedit()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$res=$this->home_page_model->cmseditmodel();
				if($res)
				{
					
						$_SESSION['successmsg']='Content updated successfully';
						header('location:'.BASE_URI.'backend/home-page/content');
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/home-page/content');
						exit;
				}
		}
		public function feature_list()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | Featured List';
				$data['title']='Home Page - Featured List';
				$data['welcome_title']=$this->home_page_model->gethometitle();
				$data['welcome_background']=$this->home_page_model->current_info_background('welcome_background');
				$data['bannerlist']=$this->home_page_model->getfeaturedlistmodel();
				$this->load->model('backend/banner_model');
				$data['inner_page_banner']=$this->banner_model->get_all_banner();
                $this->load->view('backend/featured_list_view',$data);
		}

		public function offer_list()
		{
			    $this->load->helper('auth_helper');
				checkuserlogin();
				$this->load->model('backend/login_model');
				$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['headtitle']=$data['companyinfo']['company_name'].' | Featured List';
				$data['title']='Home Page - Offer List';
				$data['offer_list']=$this->home_page_model->get_all_offer();
				$this->load->model('backend/banner_model');
				$data['inner_page_banner']=$this->banner_model->get_all_banner();
                $this->load->view('backend/home_offer_list',$data);
		}

		public function add_edit_offer($offer_id="")
		{
			$this->load->helper('auth_helper');
			checkuserlogin();
			$this->load->model('backend/login_model');
			$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
			$data['companyinfo']=$this->login_model->getuserinfoid('1');
		    $data['headtitle']=$data['companyinfo']['company_name'].' | Featured List';
		    if($offer_id)
		    {
				$data['title']='Home Page - Edit Offer';
				$data['feature']="Edit";
		    } else {
		    	$data['title']='Home Page - Add Offer';
				$data['feature']="Add";
		    }
		    $this->load->model('backend/banner_model');
			$data['inner_page_banner']=$this->banner_model->get_all_banner();
			$data['offer_list']=$this->home_page_model->get_selected_offer($offer_id);
            $this->load->view('backend/home_offer_edit',$data);
		}

		public function add_offer()
		{
			$this->load->helper('auth_helper');
			checkuserlogin();
			if($_FILES['offer_logo']['name'])
            {
				$config['upload_path'] = './uploads/home_page/offer/';
				$config['file_name'] = time();
				$config['allowed_types'] = 'jpg|jpeg|gif|png';
				$config['max_size'] = 2000;
				$config['max_width'] = 2300;
	            $config['max_height'] = 3500;

	            $files = $_FILES['offer_logo'];
			    $_FILES['user_file']['name'] = $files['name'];
		        $_FILES['user_file']['type'] = $files['type'];
		        $_FILES['user_file']['tmp_name'] = $files['tmp_name'];
		        $_FILES['user_file']['error'] = $files['error'];
		        $_FILES['user_file']['size'] = $files['size'];
		        $this->load->library('upload');
	            
	            $userfile_extn = explode(".", strtolower($_FILES['user_file']['name']));

		        $this->upload->initialize($config);

		        if ($this->upload->do_upload('user_file'))
		        {
		        	$data['home_offer_title']=$this->input->post('offer_title');
		        	$data['home_offer_content']=$this->input->post('offer_content');
		        	$data['home_offer_logo']=$config['file_name'].".".$userfile_extn[1];
		        	$data['status']=0;

		        	$con['offfer_id']=$this->input->post('offer_id');

		        	$update_offer=$this->home_page_model->insert('lm_home_offer',$data);
		        	if($update_offer)
					{
						
							$_SESSION['successmsg']='Offer Added Successfully';
							header('location:'.BASE_URI.'backend/home-page/offer_list');
							exit;
						
					}else{
						    $_SESSION['errormsg']='Seems to be some problem. Try Again';
							header('location:'.BASE_URI.'backend/home-page/add_edit_offer');
							exit;
					}

		        } else {
		        		$_SESSION['errormsg']=$this->upload->display_errors();
						header('location:'.BASE_URI.'backend/home-page/add_edit_offer');
						exit;
		        }

	        }else{
	        	$data['home_offer_title']=$this->input->post('offer_title');
	        	$data['home_offer_content']=$this->input->post('offer_content');
				$data['home_offer_logo']='';
		        $data['status']=0;

	        	$update_offer=$this->home_page_model->insert('lm_home_offer',$data);
	        	if($update_offer)
				{
					
						$_SESSION['successmsg']='Offer Added Successfully';
						header('location:'.BASE_URI.'backend/home-page/add_edit_offer');
						exit;
					
				}else{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/home-page/add_edit_offer');
						exit;
				}
	        }
			
		}

		public function edit_offer()
		{
			$this->load->helper('auth_helper');
			checkuserlogin();
			$con['offer_id']=$this->input->post('offer_id');
            if($_FILES['offer_logo']['name'])
            {
				$config['upload_path'] = './uploads/home_page/offer/';
				$config['file_name'] = time();
				$config['allowed_types'] = 'jpg|jpeg|gif|png';
				$config['max_size'] = 2000;
				$config['max_width'] = 2300;
	            $config['max_height'] = 3500;

	            $files = $_FILES['offer_logo'];
			    $_FILES['user_file']['name'] = $files['name'];
		        $_FILES['user_file']['type'] = $files['type'];
		        $_FILES['user_file']['tmp_name'] = $files['tmp_name'];
		        $_FILES['user_file']['error'] = $files['error'];
		        $_FILES['user_file']['size'] = $files['size'];
		        $this->load->library('upload');
	            
	            $userfile_extn = explode(".", strtolower($_FILES['user_file']['name']));

		        $this->upload->initialize($config);

		        if ($this->upload->do_upload('user_file'))
		        {
		        	$data['home_offer_title']=$this->input->post('offer_title');
		        	$data['home_offer_content']=$this->input->post('offer_content');
		        	$data['home_offer_logo']=$config['file_name'].".".$userfile_extn[1];
		        	$data['status']=0;

		        	

		        	$update_offer=$this->home_page_model->update('lm_home_offer',$con,$data);
		        	if($update_offer)
					{
						
							$_SESSION['successmsg']='Offer Updated Successfully';
							header('location:'.BASE_URI.'backend/home-page/add_edit_offer/'.$con['offer_id']);
							exit;
						
					}else{
						    $_SESSION['errormsg']='Seems to be some problem. Try Again';
							header('location:'.BASE_URI.'backend/home-page/add_edit_offer/'.$con['offer_id']);
							exit;
					}

		        } else {
		        		$_SESSION['errormsg']=$this->upload->display_errors();
						header('location:'.BASE_URI.'backend/home-page/add_edit_offer/'.$con['offer_id']);
						exit;
		        }

	        }
	        else{
	        	$data['home_offer_title']=$this->input->post('offer_title');
	        	$data['home_offer_content']=$this->input->post('offer_content');

	        

	        	$update_offer=$this->home_page_model->update('lm_home_offer',$con,$data);
	        	if($update_offer)
				{
					
						$_SESSION['successmsg']='Offer Updated Successfully';
						header('location:'.BASE_URI.'backend/home-page/add_edit_offer/'.$con['offer_id']);
						exit;
					
				}else{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.BASE_URI.'backend/home-page/add_edit_offer/'.$con['offer_id']);
						exit;
				}
	        }
		}

		public function my_stats()
		{
			$this->load->helper('auth_helper');
		    checkuserlogin();
			$this->load->model('backend/login_model');
			$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
			$data['companyinfo']=$this->login_model->getuserinfoid('1');
		    $data['headtitle']=$data['companyinfo']['company_name'].' | Featured List';
			$data['title']='Home Page - My Stats';
			$this->load->model('backend/banner_model');
			$data['inner_page_banner']=$this->banner_model->get_all_banner();
			$data['stats']=$this->home_page_model->get_all_stats();
            $this->load->view('backend/home_stat_list',$data);
		}

		public function add_edit_stats($stat_id="")
		{
			$this->load->helper('auth_helper');
			checkuserlogin();
			$this->load->model('backend/login_model');
			$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
			$data['companyinfo']=$this->login_model->getuserinfoid('1');
		    $data['headtitle']=$data['companyinfo']['company_name'].' | Featured List';
		    if($stat_id)
		    {
				$data['title']='Home Page - Edit Stats';
				$data['feature']="Edit";
		    } else {
		    	$data['title']='Home Page - Add Stats';
				$data['feature']="Add";
		    }
			$data['stats_list']=$this->home_page_model->get_selected_stats($stat_id);
            $this->load->view('backend/home_stats_edit',$data);
		}

		public function add_stats()
		{
			$this->load->helper('auth_helper');
			checkuserlogin();
			$data['home_stats_title']=$this->input->post('stats_title');
        	$data['home_stats_content']=$this->input->post('stats_content');
        	$data['status']=0;
        	$update_stats=$this->home_page_model->insert('lm_home_stats',$data);
        	if($update_stats){
					$_SESSION['successmsg']='Offer Added Successfully';
					header('location:'.BASE_URI.'backend/home-page/my_stats');
					exit;
				
			}else{
				    $_SESSION['errormsg']='Seems to be some problem. Try Again';
					header('location:'.BASE_URI.'backend/home-page/my_stats');
					exit;
			}

		}

		public function edit_stats()
		{
			$this->load->helper('auth_helper');
			checkuserlogin();
             
            $con['stats_id']=$this->input->post('stats_id');
			$data['home_stats_title']=$this->input->post('stats_title');
        	$data['home_stats_content']=$this->input->post('stats_content');
        	$update_stats=$this->home_page_model->update('lm_home_stats',$con,$data);
        	if($update_stats){
				
					$_SESSION['successmsg']='Offer Added Successfully';
					header('location:'.BASE_URI.'backend/home-page/add_edit_stats/'.$con['stats_id']);
					exit;
				
			}else{
				    $_SESSION['errormsg']='Seems to be some problem. Try Again';
					header('location:'.BASE_URI.'backend/home-page/add_edit_stats/'.$con['stats_id']);
					exit;
			}
		}

		public function current_info()
		{
			$this->load->helper('auth_helper');
			checkuserlogin();
			$this->load->model('backend/login_model');
			$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
			$data['companyinfo']=$this->login_model->getuserinfoid('1');
		    $data['headtitle']=$data['companyinfo']['company_name'].' | Featured List';
			$data['title']='Home Page - Current Information';
			$data['current_info_background']=$this->home_page_model->current_info_background('current_info');
			$data['current_info']=$this->home_page_model->get_all_current_info();
			$this->load->model('backend/banner_model');
			$data['inner_page_banner']=$this->banner_model->get_all_banner();
            $this->load->view('backend/home_current_info_list',$data);
             

		}

		public function add_edit_current_info($current_info="")
		{
			$this->load->helper('auth_helper');
			checkuserlogin();
			$this->load->model('backend/login_model');
			$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
			$data['companyinfo']=$this->login_model->getuserinfoid('1');
		    $data['headtitle']=$data['companyinfo']['company_name'].' | Featured List';
		    if($current_info)
		    {
				$data['title']='Home Page - Edit Current Info';
				$data['feature']="Edit";
		    } else {
		    	$data['title']='Home Page - Add Current Info';
				$data['feature']="Add";
		    }
			$data['current_info']=$this->home_page_model->get_selected_current_info($current_info);
            $this->load->view('backend/home_current_info_edit',$data);
		}

		public function add_current_info()
		{
			$this->load->helper('auth_helper');
			checkuserlogin();
			$this->load->model('backend/login_model');

            if($_FILES['info_logo']) {

				$config['upload_path'] = './uploads/home_page/current_info/';
				$config['file_name'] = time();
				$config['allowed_types'] = 'jpg|jpeg|gif|png';
				$config['max_size'] = 5060;
				$config['max_width'] = 2300;
	            $config['max_height'] = 3500;

	            $files = $_FILES['info_logo'];
			    $_FILES['user_file']['name'] = $files['name'];
		        $_FILES['user_file']['type'] = $files['type'];
		        $_FILES['user_file']['tmp_name'] = $files['tmp_name'];
		        $_FILES['user_file']['error'] = $files['error'];
		        $_FILES['user_file']['size'] = $files['size'];
		        $this->load->library('upload');
	            $userfile_extn = explode(".", strtolower($_FILES['user_file']['name']));
		        $this->upload->initialize($config);
		        if ($this->upload->do_upload('user_file')){

		        	$data['current_info_title']=$this->input->post('info_title');
		        	$data['current_info_content']=$this->input->post('info_content');
		        	$data['current_info_logo']=$config['file_name'].".".$userfile_extn[1];
                    $data['status']=0;

                    $insert_currentinfo=$this->home_page_model->insert('lm_home_current_info',$data);
		        	if($insert_currentinfo){
						$_SESSION['successmsg']='Current Info Updated Successfully';
						header('location:'.BASE_URI.'backend/home-page/current_info');
						exit;
					} else {
						$_SESSION['errormsg']='Try Again';
						header('location:'.BASE_URI.'backend/home-page/add_edit_current_info');
						exit;
					}
		        } else {
		        	$_SESSION['errormsg']=$this->upload->display_errors();
					header('location:'.BASE_URI.'backend/home-page/add_edit_current_info');
				    exit;
		        }
		    }
		}

		public function edit_current_info()
		{

			$this->load->helper('auth_helper');
			checkuserlogin();
			$this->load->model('backend/login_model');

			$con['current_info_id']=$this->input->post('info_id');
            if($_FILES['info_logo']['name']!='') {

				$config['upload_path'] = './uploads/home_page/current_info/';
				$config['file_name'] = time();
				$config['allowed_types'] = 'jpg|jpeg|gif|png';
				$config['max_size'] = 5060;
				$config['max_width'] = 3500;
	            $config['max_height'] = 3500;

	            $files = $_FILES['info_logo'];
			    $_FILES['user_file']['name'] = $files['name'];
		        $_FILES['user_file']['type'] = $files['type'];
		        $_FILES['user_file']['tmp_name'] = $files['tmp_name'];
		        $_FILES['user_file']['error'] = $files['error'];
		        $_FILES['user_file']['size'] = $files['size'];
		        $this->load->library('upload');
	            $userfile_extn = explode(".", strtolower($_FILES['user_file']['name']));
		        $this->upload->initialize($config);
		        if ($this->upload->do_upload('user_file')){

		        	$data['current_info_title']=$this->input->post('info_title');
		        	$data['current_info_content']=$this->input->post('info_content');
		        	$data['current_info_logo']=$config['file_name'].".".$userfile_extn[1];
                    
                    $update_offer=$this->home_page_model->update('lm_home_current_info',$con,$data);
		        	if($update_offer){
						$_SESSION['successmsg']='Current Info Updated Successfully';
						header('location:'.BASE_URI.'backend/home-page/current_info');
						exit;
					} else {
						$_SESSION['errormsg']='Try Again';
						header('location:'.BASE_URI.'backend/home-page/add_edit_current_info/'.$con['current_info_id']);
						exit;
					}
		        } else {
		        	$_SESSION['errormsg']=$this->upload->display_errors();
					header('location:'.BASE_URI.'backend/home-page/add_edit_current_info/'.$con['current_info_id']);
				    exit;
		        }
		    } else {

		    	$data['current_info_title']=$this->input->post('info_title');
		        $data['current_info_content']=$this->input->post('info_content');
                    
                $update_offer=$this->home_page_model->update('lm_home_current_info',$con,$data);
	        	if($update_offer){
					$_SESSION['successmsg']='Current Info Updated Successfully';
					header('location:'.BASE_URI.'backend/home-page/current_info');
					exit;
				} else {
					$_SESSION['errormsg']='Try Again';
					header('location:'.BASE_URI.'backend/home-page/add_edit_current_info/'.$con['current_info_id']);
					exit;
				}

		    }
		}

		public function status_current_info($info_id)
		{
			$this->load->model('backend/home_page_model');
			$con['current_info_id']=$info_id;
	        $get_info=$this->home_page_model->get_selected_current_info($info_id);
	        if($get_info['status']==0){
	          	$data['status']=1;
	        } else {
	        	$data['status']=0;
	        }

	        $update_offer=$this->home_page_model->update('lm_home_current_info',$con,$data);
        	if($update_offer){
				$_SESSION['successmsg']='Current Info Updated Successfully';
				header('location:'.BASE_URI.'backend/home-page/current_info');
				exit;
			} else {
				$_SESSION['errormsg']='Try Again';
				header('location:'.BASE_URI.'backend/home-page/current_info/');
				exit;
			}
		}




		public function backend_image()
		{
			$this->load->helper('auth_helper');
			checkuserlogin();
			$this->load->model('backend/home_background_model');

			$this->load->model('backend/login_model');
			$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
			$data['companyinfo']=$this->login_model->getuserinfoid('1');
		    $data['headtitle']=$data['companyinfo']['company_name'].' | Featured List';
            $data['home_background']=$this->home_background_model->getallbackground();
		    $data['title']='Home Page - Background Image';
		    $this->load->model('backend/banner_model');
			$data['inner_page_banner']=$this->banner_model->get_all_banner();
            $this->load->view('backend/home_backend_image',$data);
		}



		public function backend_image_edit($id='')
		{
			$this->load->helper('auth_helper');
			checkuserlogin();
			$this->load->model('backend/home_background_model');

			$this->load->model('backend/login_model');
			$data['memberinfo']=$this->login_model->getuserinfoid($_SESSION['usersession']);
			$data['companyinfo']=$this->login_model->getuserinfoid('1');
		    $data['headtitle']=$data['companyinfo']['company_name'].' | Featured List';
		    if($id)
		    {
		    	$data['feature']="Edit";
		        $data['title']='Home Page -Edit Background Image';
		    } else {
		    	$data['feature']="Add";
		        $data['title']='Home Page -Add Background Image';
		    }
            $data['home_background']=$this->home_background_model->get_selected_background($id);
            $this->load->model('backend/banner_model');
			$data['inner_page_banner']=$this->banner_model->get_all_banner();
            $this->load->view('backend/home_backend_edit',$data);
		}

		public function background_edit()
		{
            $this->load->helper('auth_helper');
			checkuserlogin();
			$this->load->model('backend/home_background_model');

		    $this->load->model('backend/login_model');
			

		    $con['id']=$this->input->post('background_id');

		    if($_FILES['background_image'] && $_FILES['background_image']['name'])
            {
				$config['upload_path'] = './uploads/home_page/home_background/';
				$config['file_name'] = time();
				$config['allowed_types'] = 'jpg|jpeg|gif|png';
				$config['max_size'] = 2000;
				$config['max_width'] = 2300;
	            $config['max_height'] = 3500;

	            $files = $_FILES['background_image'];
			    $_FILES['user_file']['name'] = $files['name'];
		        $_FILES['user_file']['type'] = $files['type'];
		        $_FILES['user_file']['tmp_name'] = $files['tmp_name'];
		        $_FILES['user_file']['error'] = $files['error'];
		        $_FILES['user_file']['size'] = $files['size'];
		        $this->load->library('upload');
	            
	            $userfile_extn = explode(".", strtolower($_FILES['user_file']['name']));

		        $this->upload->initialize($config);

		        if ($this->upload->do_upload('user_file')){

		        	$data['background_image']=$config['file_name'].".".$userfile_extn[1];
                    $data['updatedOn']=('Y-m-d H:i:s');
		        	$update_offer=$this->home_page_model->update('lm_home_background',$con,$data);
		        	if($update_offer)
					{
						
							$_SESSION['successmsg']='Offer Updated Successfully';
							header('location:'.BASE_URI.'backend/home-page/backend_image_edit/'.$con['id']);
							exit;
						
					}else{
						    $_SESSION['errormsg']='Seems to be some problem. Try Again';
							header('location:'.BASE_URI.'backend/home-page/backend_image_edit/'.$con['id']);
							exit;
					}
                   
		        } else {
		        	//echo $this->upload->display_errors();
		        	$_SESSION['errormsg']=$this->upload->display_errors();
					header('location:'.BASE_URI.'backend/home-page/backend_image_edit/'.$con['id']);
					exit;
		        }
	        }else{
	        	$_SESSION['errormsg']='Seems to be some problem. Try Again';
				header('location:'.BASE_URI.'backend/home-page/backend_image_edit/'.$con['id']);
				exit;
	        }
		   
		}

        public function noTransition()
        {
        	$this->load->helper('auth_helper');
			checkuserlogin();

			$res = $this->home_page_model->noTransition($this->input->post());
			if($res) {
				$response = array(
					'status' => true,
					'message' => "This images will constantly appear. If you want to revert back to transition effect select none as constant and select background and foreground transition settings to change effect."
				);
				$responseCode = 201;
			} else {
				$response = array(
					'status' => false,
				    'error' => "Seems to be some problem. Try Again"
				);
				$responseCode = 500;
			}

			header('Content-Type: application/json');
			http_response_code($responseCode);
        	echo json_encode($response);
        }

        public function setDefaultValue() {
        	$this->load->helper('auth_helper');
        	if (checkuserlogin()) {
        		echo 403;
        	} else {
        		//print_r($this->input->post());
        		$response = $this->home_page_model->setDefaultTrans($this->input->post());
        		if ($response == 1) {
        			echo "Successfully set default value";
        		} else {
        			print_r($response);
        		}
        	}
        }

}
?>