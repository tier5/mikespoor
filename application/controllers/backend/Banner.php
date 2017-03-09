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


				$this->load->library('image_lib');
			    $timezone = 'GMT';
			    if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
				$entdate = date('Y-m-d H:i:s');
				$gallery_pdf1='';
				if($_FILES['imgBanner']['name']!="") {	
			        unlink("assets/images/banner/".$_POST['hid_gallery_pdf1']);
			        $photopath2 = pathinfo($_FILES['imgBanner']['name']);
			        $extension2 = $photopath2['extension'];
			        $source2 = $_FILES['imgBanner']['tmp_name'];
			        $gallery_pdf1 = "banner".$_POST['txtCid'].".".$extension2;
			        $destination2 = "assets/images/banner/".$gallery_pdf1;
			        if(move_uploaded_file($source2,$destination2)){
			            /*** image resize ***/
						$config['image_library'] = 'gd2';
					    $config['source_image'] = "assets/images/banner/".$gallery_pdf1;
					    $config['new_image'] ='assets/images/banner/thumb/'.$gallery_pdf1;
					    //$config['create_thumb'] = TRUE;
					    $config['maintain_ratio'] = TRUE;
					    //$config['width']     = 75;
					    $config['height']   = 300;
					    $this->image_lib->initialize($config);
			            /*** image resize ***/
			            if($this->image_lib->resize()){
			            	$data = array(
				                'banner_image' => $gallery_pdf1,
				                'banner_ext' =>$extension2,
								'updatedOn' => $entdate
	                        );
                            $con['banner_id']=$_POST['txtCid'];
				            
				            $query=$this->banner_model->update('lm_banner', $con,$data);
							if($query){
								$_SESSION['successmsg']='Banner updated successfully';
								header('location:'.BASE_URI.'backend/banner/type/'.$_REQUEST['txtCid']);
								exit;
							} else {
								$_SESSION['errormsg']='Seems to be some problem. Try Again';
								header('location:'.BASE_URI.'backend/banner/type/'.$_REQUEST['txtCid']);
								exit;
							}
			            } else {
			            	$_SESSION['errormsg']='Seems to be some problem. Try Again';
							header('location:'.BASE_URI.'backend/banner/type/'.$_REQUEST['txtCid']);
							exit;
			            }
		            } else {
		            	$_SESSION['errormsg']=$_FILES;
						header('location:'.BASE_URI.'backend/banner/type/'.$_REQUEST['txtCid']);
						exit;
			        }
		        } else {
			        $_SESSION['errormsg']='Select A File To Upload.';
					header('location:'.BASE_URI.'backend/banner/type/'.$_REQUEST['txtCid']);
					exit;
		        }
			  
			
				/*$res=$this->banner_model->editbannermodel();
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
				}*/
		}
		

}
?>