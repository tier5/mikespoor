<?php
	class Banner extends CI_Controller {
      
	    public function __construct()
        {
                parent::__construct();
				$this->load->model('backend/banner_model');
				$this->load->library('image_lib');
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
				if($getid=='about' || $getid=='video_gallery' || $getid=='school_visit' || $getid=='link_news')
				{
                    $data['banner_slug']=$getid;
                    $data['bannerinfo']=$this->banner_model->allbanner($getid);
                    $this->load->view('backend/banner_view_video',$data);
				}else{
					$data['bannerinfo']=$this->banner_model->getcmsinfomodel($getid);
					$this->load->view('backend/banner_view',$data);
			   }
               
        }
		public function editbanner(){
		    $this->load->helper('auth_helper');
			checkuserlogin();
			$timezone = 'GMT'; if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone); $entdate = date('Y-m-d H:i:s');
            
            if(isset($_POST['banner_type']) && ($_POST['banner_type']=='1') ){
            	/******Image Upload******/
				if($_FILES['imgBanner']['name']!=""){	
					
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
				                'banner_focus'=>'0',
				                'banner_ext' =>$extension2,
								'updatedOn' => $entdate
	                        );
	                        $con['banner_slug']=$_POST['txtCid'];
				            
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
                /******Image Upload******/
			} 
				
				/*if(isset($_POST['video_type']) && ($_POST['video_type']=='1')){
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
*/
            
		
	}

	public function editbanner_video()
	{
		
		 $this->load->helper('auth_helper');
			checkuserlogin();
			$timezone = 'GMT'; if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone); $entdate = date('Y-m-d H:i:s');
            
            if(isset($_POST['banner_type']) && ($_POST['banner_type']=='2') ){

            	if(isset($_POST['first_id']) && isset($_POST['first_url']))
            	{
            		if($_POST['banner_focus']=='1'){ $banner_focus='1'; }else { $banner_focus='0'; }
            		 $data = array(
				                'banner_image' => $_POST['first_url'],
				                'banner_type'=>'2',
				                'banner_focus'=>$banner_focus,
				                'banner_ext' =>'2',
								'updatedOn' => $entdate
	                        );
	                        $con['banner_id']=$_POST['first_id'];
	                        $query=$this->banner_model->update('lm_banner', $con,$data);
							if(!$query){
								$_SESSION['errormsg']='Seems to be some problem. Try Again';
								header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
								exit;
							} 
            	} else{
            		$_SESSION['errormsg']='Please Enter The First Link';
					header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
				    exit;
            	}

            	if(isset($_POST['second_id']) && isset($_POST['second_url']))
            	{
            		if($_POST['banner_focus']=='2'){ $banner_focus2='1'; }else { $banner_focus2='0'; }
            		 $data1 = array(
				                'banner_image' => $_POST['second_url'],
				                'banner_type'=>'2',
				                'banner_focus'=>$banner_focus2,
				                'banner_ext' =>'2',
								'updatedOn' => $entdate
	                        );
	                        $con1['banner_id']=$_POST['second_id'];
	                        $query=$this->banner_model->update('lm_banner', $con1,$data1);
							if(!$query){
								$_SESSION['errormsg']='Seems to be some problem. Try Again';
								header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
								exit;
							} 
            	}else{
            		$_SESSION['errormsg']='Please Enter The Second Link';
					header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
				    exit;
            	}

            	if(isset($_POST['third_id']) && isset($_POST['third_url']))
            	{
            		if($_POST['banner_focus']=='3'){ $banner_focus3='1'; }else { $banner_focus3='0'; }
            		 $data2 = array(
				                'banner_image' => $_POST['third_url'],
				                'banner_type'=>'2',
				                'banner_focus'=>$banner_focus3,
				                'banner_ext' =>'2',
								'updatedOn' => $entdate
	                        );
	                        $con2['banner_id']=$_POST['third_id'];
	                        $query=$this->banner_model->update('lm_banner', $con2,$data2);
							if(!$query){
								$_SESSION['errormsg']='Seems to be some problem. Try Again';
								header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
								exit;
							} 
            	}else{
            		$_SESSION['errormsg']='Please Enter The Third Link';
					header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
				    exit;
            	}

            	if(isset($_POST['fourth_id']) && isset($_POST['fourth_url']))
            	{
            		if($_POST['banner_focus']=='4'){ $banner_focus4='1'; } else { $banner_focus4='0'; }
            		 $data3 = array(
				                'banner_image' => $_POST['fourth_url'],
				                'banner_type'=>'2',
				                'banner_focus'=>$banner_focus4,
				                'banner_ext' =>'2',
								'updatedOn' => $entdate
	                        );
	                        $con3['banner_id']=$_POST['fourth_id'];
	                        
	                        $query=$this->banner_model->update('lm_banner', $con3,$data3);
							if(!$query){
								$_SESSION['errormsg']='Seems to be some problem. Try Again';
								header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
								exit;
							} 
            	} else{
            		$_SESSION['errormsg']='Please Enter The Fourth Link';
					header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
				    exit;
            	}

            	if(isset($_POST['fifth_id']) && isset($_POST['fifth_url']))
            	{
            		if($_POST['banner_focus']=='5'){ $banner_focus5='1'; }else { $banner_focus5='0'; }
            		 $data4 = array(
				                'banner_image' => $_POST['fifth_url'],
				                'banner_type'=>'2',
				                'banner_focus'=>$banner_focus5,
				                'banner_ext' =>'2',
								'updatedOn' => $entdate
	                        );
	                        $con4['banner_id']=$_POST['fifth_id'];
	                        $query=$this->banner_model->update('lm_banner', $con4,$data4);
							if(!$query){
								$_SESSION['errormsg']='Seems to be some problem. Try Again';
								header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
								exit;
							} 
            	} else{
            		$_SESSION['errormsg']='Please Enter The Fifth Link';
					header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
				    exit;
            	}

            	$_SESSION['successmsg']='Banner updated successfully';
								header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
								exit;

            

            } else {

            	if(isset($_POST['first_id'])){
            		if($_POST['banner_focus']=='1'){ $banner_focus1='1'; }else { $banner_focus1='0'; }
                    if(isset($_FILES['first_pic']['name']) && $_FILES['first_pic']['name'] != '')
                    {
                    	$photopath1 = pathinfo($_FILES['first_pic']['name']);
			            $extension1 = $photopath1['extension'];
			            $source1 = $_FILES['first_pic']['tmp_name'];
			            $gallery_pdf1 = time()."_1.".$extension1;
                        $destination1 = "assets/images/banner/".$gallery_pdf1;
			            if(move_uploaded_file($source1,$destination1)){
	                        $config1['image_library'] = 'gd2';
						    $config1['source_image'] = "assets/images/banner/".$gallery_pdf1;
						    $config1['new_image'] ='assets/images/banner/thumb/'.$gallery_pdf1;
						    //$config1['maintain_ratio'] = TRUE;
						    $config1['height']   = 178;
						    $config1['width']   = 454;
						    $this->image_lib->initialize($config1);
				            if($this->image_lib->resize()){
                               $first_image=$gallery_pdf1;
				            }else{
				            	$_SESSION['errormsg']='Seems to be some problem. Try Again';
								header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
								exit;
				            }
			            } else {
			            	$_SESSION['errormsg']='Seems to be some problem. Try Again';
							header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
							exit;
			            }
                    }else{
                    	 if(isset($_POST['first_pic_prev']) && $_POST['first_pic_prev']!= ''){
                               $first_image=$_POST['first_pic_prev'];
                               $extension1="jpg";
                    	 }else{
                    	 	$_SESSION['errormsg']='Seems to be some problem. Try Again';
						    header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
							exit;
                    	 }
                    }

                     $data1 = array(
				                'banner_image' => $first_image,
				                'banner_type'=>'1',
				                'banner_focus'=>$banner_focus1,
				                'banner_ext' =>$extension1,
								'updatedOn' => $entdate
	                        );
	                        $con1['banner_id']=$_POST['first_id'];
	                        $query=$this->banner_model->update('lm_banner', $con1,$data1);
							if(!$query){
								$_SESSION['errormsg']='Seems to be some problem. Try Again';
								header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
								exit;
							} 
            	}

            	if(isset($_POST['second_id'])){
            		if($_POST['banner_focus']=='2'){ $banner_focus2='1'; }else { $banner_focus2='0'; }
                    if(isset($_FILES['second_pic']['name']) && $_FILES['second_pic']['name'] != ''){
                    	$photopath2 = pathinfo($_FILES['second_pic']['name']);
			            $extension2 = $photopath2['extension'];
			            $source2= $_FILES['second_pic']['tmp_name'];
			            $gallery_pdf2 = time()."_2.".$extension2;
                        $destination2= "assets/images/banner/".$gallery_pdf2;
			            if(move_uploaded_file($source2,$destination2)){
	                        $config2['image_library'] = 'gd2';
						    $config2['source_image'] = "assets/images/banner/".$gallery_pdf2;
						    $config2['new_image'] ='assets/images/banner/thumb/'.$gallery_pdf2;
						   // $config2['maintain_ratio'] = TRUE;
						    $config2['height']   = 178;
						    $config2['width']   = 454;
						    $this->image_lib->initialize($config2);
				            if($this->image_lib->resize()){
                               $second_image=$gallery_pdf2;
				            }else{
				            	$_SESSION['errormsg']='Seems to be some problem. Try Again';
								header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
								exit;
				            }
			            } else {
			            	$_SESSION['errormsg']='Seems to be some problem. Try Again';
							header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
							exit;
			            }
                    }else{
                    	 if(isset($_POST['second_pic_prev']) && $_POST['second_pic_prev']!= ''){
                               $second_image=$_POST['second_pic_prev'];
                                $extension2="jpg";
                    	 }else{
                    	 	$_SESSION['errormsg']='Seems to be some problem. Try Again';
						    header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
							exit;
                    	 }
                    }

                     $data2 = array(
				                'banner_image' => $second_image,
				                'banner_type'=>'1',
				                'banner_focus'=>$banner_focus2,
				                'banner_ext' =>$extension2,
								'updatedOn' => $entdate
	                        );
	                        $con2['banner_id']=$_POST['second_id'];
	                        $query=$this->banner_model->update('lm_banner', $con2,$data2);
							if(!$query){
								$_SESSION['errormsg']='Seems to be some problem. Try Again';
								header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
								exit;
							} 
            	}

            	if(isset($_POST['third_id'])){
            		if($_POST['banner_focus']=='3'){ $banner_focus3='1'; }else { $banner_focus3='0'; }
                    if(isset($_FILES['third_pic']['name']) && $_FILES['third_pic']['name'] != ''){
                    	$photopath3 = pathinfo($_FILES['third_pic']['name']);
			            $extension3 = $photopath3['extension'];
			            $source3 = $_FILES['third_pic']['tmp_name'];
			            $gallery_pdf3 = time()."_3.".$extension3;
                        $destination3 = "assets/images/banner/".$gallery_pdf3;
			            if(move_uploaded_file($source3,$destination3)){
	                        $config3['image_library'] = 'gd2';
						    $config3['source_image'] = "assets/images/banner/".$gallery_pdf3;
						    $config3['new_image'] ='assets/images/banner/thumb/'.$gallery_pdf3;
						    //$config3['maintain_ratio'] = TRUE;
						     $config3['height']   = 178;
						    $config3['width']   = 454;
						    $this->image_lib->initialize($config3);
				            if($this->image_lib->resize()){
                               $third_image=$gallery_pdf3;
				            }else{
				            	$_SESSION['errormsg']='Seems to be some problem. Try Again';
								header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
								exit;
				            }
			            } else {
			            	$_SESSION['errormsg']='Seems to be some problem. Try Again';
							header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
							exit;
			            }
                    }else{
                    	 if(isset($_POST['third_pic_prev']) && $_POST['third_pic_prev']!= ''){
                               $third_image=$_POST['third_pic_prev'];
                               $extension3="jpg";

                    	 }else{
                    	 	$_SESSION['errormsg']='Seems to be some problem. Try Again';
						    header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
							exit;
                    	 }
                    }

                     $data3 = array(
				                'banner_image' => $third_image,
				                'banner_type'=>'1',
				                'banner_focus'=>$banner_focus3,
				                'banner_ext' =>$extension3,
								'updatedOn' => $entdate
	                        );
	                        $con3['banner_id']=$_POST['third_id'];
	                        $query=$this->banner_model->update('lm_banner', $con3,$data3);
							if(!$query){
								$_SESSION['errormsg']='Seems to be some problem. Try Again';
								header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
								exit;
							} 
            	}

            	if(isset($_POST['fourth_id'])){
            		if($_POST['banner_focus']=='4'){ $banner_focus4='1'; }else { $banner_focus4='0'; }
                    if(isset($_FILES['fourth_pic']['name']) && $_FILES['fourth_pic']['name'] != ''){
                    	$photopath4 = pathinfo($_FILES['fourth_pic']['name']);
			            $extension4 = $photopath4['extension'];
			            $source4 = $_FILES['fourth_pic']['tmp_name'];
			            $gallery_pdf4 = time()."_4.".$extension4;
                        $destination4 = "assets/images/banner/".$gallery_pdf4;
			            if(move_uploaded_file($source4,$destination4)){
	                        $config4['image_library'] = 'gd2';
						    $config4['source_image'] = "assets/images/banner/".$gallery_pdf4;
						    $config4['new_image'] ='assets/images/banner/thumb/'.$gallery_pdf4;
						    //$config4['maintain_ratio'] = TRUE;
						    //$config4['height']   = 300;
						    $config4['height']   = 178;
						    $config4['width']   = 454;
						    $this->image_lib->initialize($config4);
				            if($this->image_lib->resize()){
                               $fourth_image=$gallery_pdf4;
				            }else{
				            	$_SESSION['errormsg']='Seems to be some problem. Try Again';
								header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
								exit;
				            }
			            } else {
			            	$_SESSION['errormsg']='Seems to be some problem. Try Again';
							header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
							exit;
			            }
                    }else{
                    	 if(isset($_POST['second_pic_prev']) && $_POST['second_pic_prev']!= ''){
                               $fourth_image=$_POST['fourth_pic_prev'];
                               $extension4="jpg";
                    	 }else{
                    	 	$_SESSION['errormsg']='Seems to be some problem. Try Again';
						    header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
							exit;
                    	 }
                    }

                     $data4 = array(
				                'banner_image' => $fourth_image,
				                'banner_type'=>'1',
				                'banner_focus'=>$banner_focus4,
				                'banner_ext' =>$extension4,
								'updatedOn' => $entdate
	                        );
	                        $con4['banner_id']=$_POST['fourth_id'];
	                        $query=$this->banner_model->update('lm_banner', $con4,$data4);
							if(!$query){
								$_SESSION['errormsg']='Seems to be some problem. Try Again';
								header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
								exit;
							} 
            	}


            	if(isset($_POST['fifth_id']))
            	{
            		if($_POST['banner_focus']=='5'){ $banner_focus5='1'; }else { $banner_focus5='0'; }
                    if(isset($_FILES['fifth_pic']['name']) && $_FILES['fifth_pic']['name'] != '')
                    {
                    	$photopath5 = pathinfo($_FILES['fifth_pic']['name']);
			            $extension5 = $photopath5['extension'];
			            $source5 = $_FILES['fifth_pic']['tmp_name'];
			            $gallery_pdf5 = time()."_5.".$extension5;
                        $destination5 = "assets/images/banner/".$gallery_pdf5;
			            if(move_uploaded_file($source5,$destination5)){
	                        $config5['image_library'] = 'gd2';
						    $config5['source_image'] = "assets/images/banner/".$gallery_pdf5;
						    $config5['new_image'] ='assets/images/banner/thumb/'.$gallery_pdf5;
						    /*$config5['maintain_ratio'] = TRUE;
						    $config5['height']   = 300;*/
						    $config5['height']   = 178;
						    $config5['width']   = 454;
						    $this->image_lib->initialize($config5);
				            if($this->image_lib->resize()){
                               $fifth_image=$gallery_pdf5;
				            }else{
				            	$_SESSION['errormsg']='Seems to be some problem. Try Again';
								header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
								exit;
				            }
			            } else {
			            	$_SESSION['errormsg']='Seems to be some problem. Try Again';
							header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
							exit;
			            }
                    }else{
                    	 if(isset($_POST['fifth_pic_prev']) && $_POST['fifth_pic_prev']!= ''){
                               $fifth_image=$_POST['fifth_pic_prev'];
                               $extension5="jpg";
                    	 }else{
                    	 	$_SESSION['errormsg']='Seems to be some problem. Try Again';
						    header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
							exit;
                    	 }
                    }

                     $data5 = array(
				                'banner_image' => $fifth_image,
				                'banner_type'=>'1',
				                'banner_focus'=>$banner_focus5,
				                'banner_ext' =>$extension5,
								'updatedOn' => $entdate
	                        );
	                        $con5['banner_id']=$_POST['fifth_id'];
	                        $query=$this->banner_model->update('lm_banner', $con5,$data5);
							if(!$query){
								$_SESSION['errormsg']='Seems to be some problem. Try Again';
								header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
								exit;
							} 
            	}



                               $_SESSION['successmsg']='Banner updated successfully';
								header('location:'.BASE_URI.'backend/banner/type/'.$_POST['txtCid']);
								exit;

            }
	}
		

}
?>