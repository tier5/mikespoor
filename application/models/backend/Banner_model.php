<?php
class Banner_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
				$this->load->database();
        }
		public function getcmsinfomodel($getid)
		{
			$this->db->select('`banner_id`, `banner_name`, `banner_slug`, `banner_title`, `banner_image`, `banner_ext`, `updatedOn`');
            $this->db->from('lm_banner');
			$this->db->where('banner_id',$getid);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}
		public function editbannermodel($getid)
		{
			$timezone = 'GMT';
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	$entdate = date('Y-m-d H:i:s');
			$gallery_pdf1='';
			if($_FILES['imgBanner']['name']!="")
	          {	
		        unlink("assets/required/".$_POST['hid_gallery_pdf1']);
		        $photopath2 = pathinfo($_FILES['imgBanner']['name']);
		        $extension2 = $photopath2['extension'];
		        $source2 = $_FILES['imgBanner']['tmp_name'];
			
		         $gallery_pdf1 = "banner".$_POST['txtCid'].".".$extension2;
				
		       $destination2 = "assets/required/".$gallery_pdf1;
		
		        move_uploaded_file($source2,$destination2);
	          }
	         else
	          {
		         $gallery_pdf1 = $_POST['hid_gallery_pdf1'];
	          }
			  
			 
			$data = array(
                    'banner_image' => $gallery_pdf1,
					'updatedOn' => $entdate
             );

             $this->db->where('banner_id', $_POST['txtCid']);
             $query=$this->db->update('lm_banner', $data);
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		
}
?>