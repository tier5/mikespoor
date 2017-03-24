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
				$this->load->model('backend/banner_model');
				$data['inner_page_banner']=$this->banner_model->get_all_banner();
				$data['bannerinfo']=$this->banner_model->getcmsinfomodel($getid);
                $this->load->view('backend/banner_view',$data);
        }
		public function editbanner(){
		    $this->load->helper('auth_helper');
			checkuserlogin();
			$timezone = 'GMT';
		    if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
			$entdate = date('Y-m-d H:i:s');

            if(isset($_POST['banner_type']) && ($_POST['banner_type']=='1') ){
				if($_FILES['imgBanner']['name']!=""){	
					$this->load->library('image_lib');
					$gallery_pdf1='';
			        $photopath2 = pathinfo($_FILES['imgBanner']['name']);
			        $extension2 = $photopath2['extension'];
			        $source2 = $_FILES['imgBanner']['tmp_name'];
			        $gallery_pdf1 = time().".".$extension2;
			        $destination2 = "assets/images/banner/".$gallery_pdf1;
			        if(move_uploaded_file($source2,$destination2)){
			           	$config['image_library'] = 'gd2';
					    $config['source_image'] = "assets/images/banner/".$gallery_pdf1;
					    $config['new_image'] ='assets/images/banner/thumb/'.$gallery_pdf1;
					    $config['maintain_ratio'] = TRUE;
					    $config['height']   = 300;
					    $this->image_lib->initialize($config);
			            if($this->image_lib->resize()){
							$data = array(
				                'banner_image' => $gallery_pdf1,
				                'banner_type'=>'1',
				                'banner_ext' =>$extension2,
								'updatedOn' => $entdate
	                        ); 
			            } else {
			            	$_SESSION['errormsg']=$this->image_lib->display_errors();
							header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
							exit;
			            }
		            } else {
		            	$_SESSION['errormsg']=$_FILES;
						header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
						exit;
			        }
		        }else {
            		$_SESSION['errormsg']="Upload Image";
					header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
					exit();
                }
			} else if(isset($_POST['banner_type']) && ($_POST['banner_type']=='2')){
				if(isset($_POST['video_type']) && ($_POST['video_type']=='1')){
                    if (isset($_FILES['upload_video']['name']) && $_FILES['upload_video']['name'] != '') {
			            $photopath2 = pathinfo($_FILES['upload_video']['name']);
					    $extension2 = $photopath2['extension'];
			            $configVideo['upload_path'] = 'assets/images/banner/';
			            $configVideo['max_size'] = '102400000';
			            $configVideo['allowed_types'] = 'avi|flv|wmv|mp4|mp3';
			            $configVideo['overwrite'] = FALSE;
			            $configVideo['remove_spaces'] = TRUE;
			            $video_name = time();
			            $configVideo['file_name'] = $video_name.".".$extension2;
			            $this->load->library('upload', $configVideo);
			            $this->upload->initialize($configVideo);
			            if (!$this->upload->do_upload('upload_video')) {
			                $_SESSION['errormsg']=$this->upload->display_errors();
							header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
							exit;
			            } else {
			            	$data = array(
				                'banner_image' => $configVideo['file_name'],
				                'banner_type'=>'2',
				                'banner_ext' =>'1',
								'updatedOn' => $entdate
	                        );  
			            }
		            }else{
		            	$_SESSION['errormsg']="Choose A video";
						header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
						exit;
		            }
				} else if(isset($_POST['video_type']) && ($_POST['video_type']=='2')) {
	            	/*$url=(explode("?v=",(trim($_POST['url_upload']))));
	                $videname=$url[1];*/
	                $data = array(
				                'banner_image' => $_POST['url_upload'],
				                'banner_type'=>'2',
				                'banner_ext' =>'2',
								'updatedOn' => $entdate
	                ); 
				} else{
					$_SESSION['errormsg']="Select A Video Type And Set Video According That";
					header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
					exit;
				}

            }else {
                	$_SESSION['errormsg']="Select Banner Type";
					header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
					exit;
            }

            $con['banner_id']=$_POST['txtCid'];
				            
            $query=$this->banner_model->update('lm_banner', $con,$data);
			if($query){
				$_SESSION['successmsg']='Banner updated successfully';
				header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
				exit;
			} else {
				$_SESSION['errormsg']='Seems to be some problem. Try Again';
				header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
				exit;
			}
		}
		

}
?>