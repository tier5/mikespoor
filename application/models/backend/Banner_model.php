<?php
class Banner_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
				$this->load->database();
        }
		public function getcmsinfomodel($getid)
		{
			$this->db->select('`banner_id`, `banner_name`, `banner_slug`, `banner_title`, `banner_image`,`banner_type`, `banner_ext`, `updatedOn`');
            $this->db->from('lm_banner');
			$this->db->where('banner_slug',$getid);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}

		public function get_all_banner()
		{
			$this->db->select('`banner_id`, `banner_name`, `banner_slug`, `banner_title`, `banner_image`,`banner_type`, `banner_ext`, `updatedOn`');
            $this->db->from('lm_banner');
            $this->db->group_by('banner_slug');
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}

		public function editbannermodel($getid){
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
				    $config['create_thumb'] = TRUE;
				    $config['maintain_ratio'] = TRUE;
				    //$config['width']     = 75;
				    $config['height']   = 300;

				   
				    $this->image_lib->initialize($config);
		            /*** image resize ***/
		            if($this->image_lib->resize()){
		            	$data = array(
			                'banner_image' => $gallery_pdf1,
							'updatedOn' => $entdate
                        );

			            $this->db->where('banner_id', $_POST['txtCid']);
			            $query=$this->db->update('lm_banner', $data);
						if($query){
							return true;
						} else {
							return false;
						}
		            }
		        }
		        else{

		        }
	        } else {
		        $gallery_pdf1 = $_POST['hid_gallery_pdf1'];
	        }
			  
			
		}

		public function getbannerbyslug($slug)
		{
			$this->db->select('`banner_id`, `banner_name`, `banner_slug`, `banner_title`, `banner_image`,`banner_type`, `banner_ext`, `updatedOn`');
            $this->db->from('lm_banner');
			$this->db->where('banner_slug',$slug);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}

		public function getallbannerbyslug($slug)
		{
			$this->db->select('*');
            $this->db->from('lm_banner');
            $this->db->where('banner_slug',$slug);
			$this->db->where('banner_focus','0');
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}

		public function getmiddlebannerbyslug($slug)
		{
			$this->db->select('*');
            $this->db->from('lm_banner');
            $this->db->where('banner_slug',$slug);
			$this->db->where('banner_focus','1');
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
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

        public function allbanner($getid)
        {
        	$this->db->select('*');
            $this->db->from('lm_banner');
			$this->db->where('banner_slug',$getid);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
        }


		
}
?>
