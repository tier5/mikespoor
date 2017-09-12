<?php
class Home_page_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
				$this->load->database();
        }

        public function update($table,$con,$data)
        {
            $this->db->where($con);
            $query=$this->db->update($table, $data);
			if($query){
				return true;
			}else{
				return false;
		    }
        }

        public function insert($table,$data)
        {
        	$query=$this->db->insert($table, $data);
			if($query){
				return true;
			} else {
				return false;
			}
        }
		public function countgallery()
		{
			$cnt=$this->db->count_all_results('lm_home_banner');
			return $cnt;
		}
		public function addbannermodel()
		{
			$this->load->library('image_lib');
			$timezone = 'GMT';
			if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
			$entdate = date('Y-m-d H:i:s');
			if ($_FILES['imgBanner']['type'] == IGNORE_IMG || $_FILES['imgFBanner']['type'] == IGNORE_IMG) {

				return false;
				exit;
			} 
			if($_FILES['imgBanner']['name']!=""){	
		         
                $photopath2 = pathinfo($_FILES['imgBanner']['name']);
		        $extension2 = $photopath2['extension'];
		        $source2 = $_FILES['imgBanner']['tmp_name'];
		        $gallery_pdf1 =time()."_".$_POST['txtCid'].".".$extension2;
		        $destination2 = "uploads/home_page/banner/".$gallery_pdf1;
		        if(move_uploaded_file($source2,$destination2)){
		            /*** image resize ***/
					$config['image_library'] = 'gd2';
				    $config['source_image'] = "uploads/home_page/banner/".$gallery_pdf1;
				    $config['new_image'] ='uploads/home_page/banner/thumb/'.$gallery_pdf1;
				    //$config['maintain_ratio'] = TRUE;
				    $config['width']     = 1400;
				    $config['height']   = 450;

				    $this->image_lib->initialize($config);
				    if(!$this->image_lib->resize()) {
				    	return false;
				    	exit;
				    }
		        } else{
                     return false;
                     exit;
		        }

			    if($_FILES['imgFBanner']['name']!="")
	            {	
		         	$photopath3 = pathinfo($_FILES['imgFBanner']['name']);
		         	$extension3 = $photopath3['extension'];
		         	$source3 = $_FILES['imgFBanner']['tmp_name'];
		         	$gallery_pdf2 = time()."_front.".$extension3;
		         	$destination3 = "uploads/home_page/banner/".$gallery_pdf2;
		         	


		           if(move_uploaded_file($source3,$destination3)){
		            /*** image resize ***/
					$config2['image_library'] = 'gd2';
				    $config2['source_image'] = "uploads/home_page/banner/".$gallery_pdf2;
				    $config2['new_image'] ='uploads/home_page/banner/thumb/'.$gallery_pdf2;
				    $config['maintain_ratio'] = TRUE;
				    $config2['width']     = 350;
				    //$config2['height']   = 350;

				   
				    $this->image_lib->initialize($config2);
				    if(!$this->image_lib->resize())
				    {
				    	return false;
				    	exit;
				    }
		        } else{
                     return false;
                     exit;
		        }
	           } else {
	           	  $gallery_pdf2="";
	           }
			   
			    $data = array(
                    'banner_title' => trim(addslashes($_POST['txtTitle'])),
                    'banner_image' => $gallery_pdf1,
					'banner_front_image' => $gallery_pdf2,
					'banner_comment' => "No",
					'banner_comment_shape'=>"1",
                    'addedBy' => $_SESSION['usersession'],
					'status' => '1',
					'addedOn' => $entdate,
					'updatedOn' => $entdate
                             );

                $query=$this->db->insert('lm_home_banner', $data);
				if($query)
				{
					return true;
				}
				else
				{
					return false;
				}

				} else {
					return false;
				}
		}
		public function addfeaturemodel()
		{
			$this->load->library('image_lib');
			$timezone = 'GMT';
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	$entdate = date('Y-m-d H:i:s');
			
			    $data = array(
                    'feat_title' => trim(addslashes($_POST['txtTitle'])),
					'feat_content' => htmlspecialchars($_POST['editor1']),
                    'addedBy' => $_SESSION['usersession'],
					'status' => '1',
					'addedOn' => $entdate,
					'updatedOn' => $entdate
                             );

                $query=$this->db->insert('lm_featured_list', $data);
				if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function getbannerlistmodel()
		{
			$this->db->select('`banner_id`, `banner_title`, `banner_image`, `is_bg_constant`, `banner_front_image`, `is_fg_constant`, `banner_comment`,`foreground_image_transition`, `background_image_transition`,`status`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_home_banner');
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function getfeaturedlistmodel()
		{
			$this->db->select('`feat_id`, `feat_title`, `feat_content`, `status`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_featured_list');
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function update_forground_transition($data) {
            
            $query=$this->db->update('lm_home_banner',$data);
			if($query){
				return true;
			}else{
				return false;
		    }
        }

		public function getactivefeaturedlistmodel()
		{
			$this->db->select('`feat_id`, `feat_title`, `feat_content`, `status`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_featured_list');
			$this->db->where('status',1);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function getactivebannerlistmodel()
		{
			$this->db->select('`banner_id`, `banner_title`, `banner_image`, `banner_front_image`, `is_bg_constant`, `is_fg_constant`, `banner_comment`, `foreground_image_transition`, `status`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_home_banner');
			$this->db->where('status',1);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function getbannerinfomodel($getid)
		{
			$this->db->select('`banner_id`, `banner_title`, `banner_image`, `banner_front_image`, `banner_comment`,`banner_comment_shape`, `status`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_home_banner');
			$this->db->where('banner_id',$getid);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}
		public function getfeatureinfomodel($getid)
		{
			$this->db->select('`feat_id`, `feat_title`, `feat_content`, `status`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_featured_list');
			$this->db->where('feat_id',$getid);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}
		public function editbannermodel()
		{
			$this->load->library('image_lib');
			$timezone = 'GMT';
			if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
			$entdate = date('Y-m-d H:i:s');
			$gallery_pdf1='';
			$gallery_pdf2='';
			//check if type of image is gif
			if ($_FILES['imgBanner']['type'] == IGNORE_IMG || $_FILES['imgFBanner']['type'] == IGNORE_IMG) {

				return false;
				exit;
			} 
			if($_FILES['imgBanner']['name']!="") {	
		        //unlink("uploads/home_page/banner/".$_POST['hid_gallery_pdf1']);
		        $photopath2 = pathinfo($_FILES['imgBanner']['name']);
		        $extension2 = $photopath2['extension'];
		        $source2 = $_FILES['imgBanner']['tmp_name'];
		        $gallery_pdf1 =time()."_".$_POST['txtCid'].".".$extension2;
		        $destination2 = "uploads/home_page/banner/".$gallery_pdf1;
		        if(move_uploaded_file($source2,$destination2)){
		            /*** image resize ***/
					$config['image_library'] = 'gd2';
				    $config['source_image'] = "uploads/home_page/banner/".$gallery_pdf1;
				    $config['new_image'] ='uploads/home_page/banner/thumb/'.$gallery_pdf1;
				    //$config['maintain_ratio'] = TRUE;
				    $config['width']     = 1400;
				    $config['height']   = 450;

				   
				    $this->image_lib->initialize($config);
				    if(!$this->image_lib->resize())
				    {
				    	return false;
				    	exit;
				    }
		        } else{
                     return false;
                     exit;
		        }
	        } else {
                $gallery_pdf1 = $_POST['hid_gallery_pdf1'];
	        }
			/*if($_FILES['imgBanner']['name']!="")
	        {	
		        unlink("uploads/".$_POST['hid_gallery_pdf1']);
		        $photopath2 = pathinfo($_FILES['imgBanner']['name']);
		        $extension2 = $photopath2['extension'];
		        $source2 = $_FILES['imgBanner']['tmp_name'];
		       $gallery_pdf1 = time().".".$extension2;
		       $destination2 = "uploads/".$gallery_pdf1;
		
		        move_uploaded_file($source2,$destination2);
	        }
	        else
	        {
		         $gallery_pdf1 = $_POST['hid_gallery_pdf1'];
	          }*/
			  
			  if($_FILES['imgFBanner']['name']!="")
	          {	
		       // unlink("uploads/".$_POST['hid_gallery_pdf2']);
		        $photopath3 = pathinfo($_FILES['imgFBanner']['name']);
		        $extension3 = $photopath3['extension'];
		        $source3 = $_FILES['imgFBanner']['tmp_name'];
		       $gallery_pdf2 = time().".".$extension3;
		       $destination3 = "uploads/home_page/banner/".$gallery_pdf2;
                if(move_uploaded_file($source3,$destination3)){
		            
					$config2['image_library'] = 'gd2';
				    $config2['source_image'] = "uploads/home_page/banner/".$gallery_pdf2;
				    $config2['new_image'] ='uploads/home_page/banner/thumb/'.$gallery_pdf2;
				    $config['maintain_ratio'] = TRUE;
				    $config2['width']     = 350;
				    //$config2['height']   = 400;


				   
				    $this->image_lib->initialize($config2);
				    if(!$this->image_lib->resize())
				    {
				    	return false;
				    	exit;
				    }
		        } else{
                     return false;
                     exit;
		        }
	          }
	         else
	          {
		         $gallery_pdf2 = $_POST['hid_gallery_pdf2'];
	          }
			  
			 
			$data = array(
             'banner_title' => trim(addslashes($_POST['txtTitle'])),
                    'banner_image' => $gallery_pdf1,
					'banner_front_image' => $gallery_pdf2,
					//'banner_comment' => addslashes($_POST['editor1']),
					//'banner_comment_shape'=>$_POST['bble_shape'],
                    'addedBy' => $_SESSION['usersession'],
					'updatedOn' => $entdate
             );

             $this->db->where('banner_id', $_POST['txtCid']);
             $query=$this->db->update('lm_home_banner', $data);
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function editfeaturemodel()
		{
			$timezone = 'GMT';
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	$entdate = date('Y-m-d H:i:s');
			
			$data = array(
                    'feat_title' => trim(addslashes($_POST['txtTitle'])),
					'feat_content' => htmlspecialchars($_POST['editor1']),
                    'addedBy' => $_SESSION['usersession'],
					'updatedOn' => $entdate
             );

             $this->db->where('feat_id', $_POST['txtCid']);
             $query=$this->db->update('lm_featured_list', $data);
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function statusbannermodel($getid,$getstatus)
		{
			 $timezone = 'GMT';
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	$entdate = date('Y-m-d H:i:s');
			 $nowstatus='';
			 if($getstatus==0)
			 {
				 $nowstatus=1;
			 }
			 else
			 {
				 $nowstatus=0;
			 }
			 $data = array(
                    'status' => $nowstatus,
                    'addedBy' => $_SESSION['usersession'],
					'updatedOn' => $entdate
             );

             $this->db->where('banner_id', $getid);
             $query=$this->db->update('lm_home_banner', $data);
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function statusfeaturemodel($getid,$getstatus)
		{
			 $timezone = 'GMT';
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	$entdate = date('Y-m-d H:i:s');
			 $nowstatus='';
			 if($getstatus==0)
			 {
				 $nowstatus=1;
			 }
			 else
			 {
				 $nowstatus=0;
			 }
			 $data = array(
                    'status' => $nowstatus,
                    'addedBy' => $_SESSION['usersession'],
					'updatedOn' => $entdate
             );

             $this->db->where('feat_id', $getid);
             $query=$this->db->update('lm_featured_list', $data);
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function deletebannermodel($getid)
		{    
		     $searchquery = $this->db->query("select * from lm_home_banner where banner_id='".$getid."'");

             foreach ($searchquery->result_array() as $searchrow)
               {
                   unlink("uploads/".$searchrow['banner_image']);
				   unlink("uploads/".$searchrow['banner_thumbnail']);
               }
			 $this->db->where('banner_id', $getid);
             $query=$this->db->delete('lm_home_banner');
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function deletefeaturemodel($getid)
		{    
		    
			 $this->db->where('feat_id', $getid);
             $query=$this->db->delete('lm_featured_list');
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
        public function getcmsinfomodel($getid)
		{
			$this->db->select('`home_id`, `home_title`, `home_offer1_title`, `home_offer1_content`, `home_offer2_title`, `home_offer2_content`, `home_offer3_title`, `home_offer3_content`, `home_stat1_title`, `home_stat1_content`, `home_stat2_title`, `home_stat2_content`, `home_stat3_title`, `home_stat3_content`, `home_stat4_title`, `home_stat4_content`, `home_sec1_title`, `home_sec1_content`, `home_sec2_title`, `home_sec2_content`, `home_sec3_title`, `home_sec3_content`, `home_fsec_title`, `home_fsec_content`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_home_page');
			$this->db->where('home_id',$getid);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}
		public function cmseditmodel($getid)
		{
			$entdate=date('Y-m-d H:i:s');
			
			 
			$data = array(
                    'home_title' => trim(addslashes($_POST['txtTitle'])),
					'home_offer1_title' => trim(addslashes($_POST['txtOt1'])),
					'home_offer1_content' => htmlspecialchars($_POST['txtOc1']),
					'home_offer2_title' => trim(addslashes($_POST['txtOt2'])),
					'home_offer2_content' => htmlspecialchars($_POST['txtOc2']),
					'home_offer3_title' => trim(addslashes($_POST['txtOt3'])),
					'home_offer3_content' => htmlspecialchars($_POST['txtOc3']),
					'home_stat1_title' => trim(addslashes($_POST['txtSt1'])),
					'home_stat1_content' => trim(addslashes($_POST['txtSc1'])),
					'home_stat2_title' => trim(addslashes($_POST['txtSt2'])),
					'home_stat2_content' => trim(addslashes($_POST['txtSc2'])),
					'home_stat3_title' => trim(addslashes($_POST['txtSt3'])),
					'home_stat3_content' => trim(addslashes($_POST['txtSc3'])),
					'home_stat4_title' => trim(addslashes($_POST['txtSt4'])),
					'home_stat4_content' => trim(addslashes($_POST['txtSc4'])),
					'home_sec1_title' => trim(addslashes($_POST['txtXt1'])),
					'home_sec1_content' => htmlspecialchars($_POST['txtXc1']),
					'home_sec2_title' => trim(addslashes($_POST['txtYt2'])),
					'home_sec2_content' => htmlspecialchars($_POST['txtYc2']),
					'home_sec3_title' => trim(addslashes($_POST['txtZt3'])),
					'home_sec3_content' => htmlspecialchars($_POST['txtZc3']),
					'home_fsec_title' => trim(addslashes($_POST['txtLTitle'])),
					'home_fsec_content' => htmlspecialchars($_POST['txtLContent']),
					'addedBy' => $_SESSION['usersession'],
					'addedOn' => $entdate,
					'updatedOn' => $entdate
             );

             $this->db->where('home_id', $_POST['txtCid']);
             $query=$this->db->update('lm_home_page', $data);
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}

		public function gethometitle()
		{
			$this->db->select('*');
            $this->db->from('lm_home_title');
            $this->db->order_by("title_id", "desc");
            $this->db->limit(1);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}

		public function get_all_offer()
		{
			$this->db->select('*');
            $this->db->from('lm_home_offer');
            $this->db->where('status',0);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}

		public function get_selected_offer($offer_id)
		{
            $this->db->select('*');
            $this->db->from('lm_home_offer');
            $this->db->where("offer_id", $offer_id);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}

		public function get_all_stats()
		{
			$this->db->select('*');
            $this->db->from('lm_home_stats');
            $this->db->where('status',0);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}

		public function get_selected_stats($stats_id)
		{
			$this->db->select('*');
            $this->db->from('lm_home_stats');
            $this->db->where("stats_id", $stats_id);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}

		public function get_all_current_info()
        {
        	$this->db->select('*');
            $this->db->from('lm_home_current_info');
            //$this->db->where('status',0);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
        }

        public function get_selected_current_info($current_info)
        {
        	$this->db->select('*');
            $this->db->from('lm_home_current_info');
            $this->db->where("current_info_id", $current_info);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
        }

        public function get_active_current_info()
        {
        	$this->db->select('*');
            $this->db->from('lm_home_current_info');
            $this->db->where('status',0);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
        }

        public function current_info_background($current_info)
        {
            $this->db->select('*');
            $this->db->from('lm_home_background');
            $this->db->where('background_slug',$current_info);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
        }

		public function noTransition($data)
		{
			//var_dump($data);exit;
			$payload = array(
				'is_fg_constant' => 0,
				'is_bg_constant' => 0,
				'foreground_image_transition' => 0,
				'background_image_transition' => 0
			);

			$query = $this->db->update('lm_home_banner', $payload);
			if ($query) {
				if (array_key_exists('bg_index', $data)) {
					$this->changeBgConstant($data['bg_index']);
				}
				if (array_key_exists('fg_index', $data)) {
					$this->changeFgConstant($data['fg_index']);
				}
				return true;
			} else {
				return false;
			}
		}

		public function changeBgConstant($data)
		{
			$this->db->where('banner_id', $data);
			return $this->db->update('lm_home_banner', array(
				'is_bg_constant' => 1
			));
		}

		public function changeFgConstant($data)
		{
			$this->db->where('banner_id', $data);
			return $this->db->update('lm_home_banner', array(
				'is_fg_constant' => 1
			));
		}
}
?>