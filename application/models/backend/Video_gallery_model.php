<?php
class Video_gallery_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
				$this->load->database();
        }
		public function countvideo()
		{
			$cnt=$this->db->count_all_results('lm_video_gallery');
			return $cnt;
		}
		public function addbannermodel()
		{
			$timezone = 'GMT';
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	$entdate = date('Y-m-d H:i:s');
	$this->load->helper('function');
	
			$slugvalue=createSlug($_POST['txtTitle']);
			    $data = array(
                    'gvideo_title' => trim(addslashes($_POST['txtTitle'])),
					'gvideo_slug' => $slugvalue,
					'gvideo_url' => trim(addslashes($_POST['txtURL'])),
					'gvideo_content' => htmlspecialchars($_POST['editor1']),
                    'addedBy' => $_SESSION['usersession'],
					'status' => '1',
					'addedOn' => $entdate,
					'updatedOn' => $entdate
                             );

                $query=$this->db->insert('lm_video_gallery', $data);
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
			$this->db->select('`gvideo_id`, `gvideo_title`, `gvideo_slug`, `gvideo_url`, `gvideo_content`, `status`, `gvideo_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_video_gallery');
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		
		public function getactivebannerlistmodel()
		{
			$this->db->select('`gvideo_id`, `gvideo_title`, `gvideo_slug`, `gvideo_url`, `gvideo_content`, `status`, `gvideo_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_video_gallery');
			$this->db->where('status',1);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		
		public function getfeaturedbannerlistmodel()
		{
			$this->db->select('`gvideo_id`, `gvideo_title`, `gvideo_slug`, `gvideo_url`, `gvideo_content`, `status`, `gvideo_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_video_gallery');
			$this->db->where('gvideo_featured',1);
			$this->db->where('status',1);
			$this->db->limit(6,0);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function getbannerinfomodel($getid)
		{
			$this->db->select('`gvideo_id`, `gvideo_title`, `gvideo_slug`, `gvideo_url`, `gvideo_content`, `status`, `gvideo_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_video_gallery');
			$this->db->where('gvideo_id',$getid);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}
		public function getbannerslugmodel($getid)
		{
			$this->db->select('`gvideo_id`, `gvideo_title`, `gvideo_slug`, `gvideo_url`, `gvideo_content`, `status`, `gvideo_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_video_gallery');
			$this->db->where('gvideo_slug',$getid);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}
		public function editbannermodel()
		{
			$timezone = 'GMT';
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	$entdate = date('Y-m-d H:i:s');
	$this->load->helper('function');
			$slugvalue=createSlug($_POST['txtTitle']);
			
			 $gallery_pdf1='';
			$gallery_pdf2='';
			if($_FILES['imgBanner']['name']!="")
	          {	
		        unlink("uploads/".$_POST['hid_destination_pdf1']);
		        $photopath2 = pathinfo($_FILES['imgBanner']['name']);
		        $extension2 = $photopath2['extension'];
		        $source2 = $_FILES['imgBanner']['tmp_name'];
		       $gallery_pdf1 = time().".".$extension2;
		       $destination2 = "uploads/".$gallery_pdf1;
		
		        move_uploaded_file($source2,$destination2);
	          }
	         else
	          {
		         $gallery_pdf1 = $_POST['hid_destination_pdf1'];
	          }
			
			$data = array(
                    'gvideo_title' => trim(addslashes($_POST['txtTitle'])),
					'gvideo_slug' => $slugvalue,
					'gvideo_url' => trim(addslashes($_POST['txtURL'])),
					'gvideo_content' => htmlspecialchars($_POST['editor1']),
                    'addedBy' => $_SESSION['usersession'],
					'updatedOn' => $entdate
             );

             $this->db->where('gvideo_id', $_POST['txtCid']);
             $query=$this->db->update('lm_video_gallery', $data);
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

             $this->db->where('gvideo_id', $getid);
             $query=$this->db->update('lm_video_gallery', $data);
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function featuredvideomodel($getid,$getstatus)
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
                    'gvideo_featured' => $nowstatus,
					'updatedOn' => $entdate
             );

             $this->db->where('gvideo_id', $getid);
             $query=$this->db->update('lm_video_gallery', $data);
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
		     $searchquery = $this->db->query("select * from lm_video_gallery where gvideo_id='".$getid."'");

             foreach ($searchquery->result_array() as $searchrow)
               {
                   unlink("uploads/".$searchrow['gvideo_image']);
               }
			 $this->db->where('gvideo_id', $getid);
             $query=$this->db->delete('lm_video_gallery');
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function countactivevideo()
		{
			$this->db->where('status', '1');
            $this->db->from('lm_video_gallery');
            $cnt=$this->db->count_all_results();
			return $cnt;
		}
		public function fixedbannerlistmodel()
		{
			$this->db->select('`gvideo_id`, `gvideo_title`, `gvideo_slug`, `gvideo_url`, `gvideo_content`, `status`, `gvideo_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_video_gallery');
			$this->db->where('status', '1');
			$this->db->limit(6,0);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		
		public function paginationsort($cntid)
	    {
		$start=($cntid-1) * 6;
		$this->db->select('`gvideo_id`, `gvideo_title`, `gvideo_slug`, `gvideo_url`, `gvideo_content`, `status`, `gvideo_featured`, `addedBy`, `addedOn`, `updatedOn`');
		$this->db->from('lm_video_gallery');
		$this->db->where('status',1);
		$this->db->limit(6,$start);
		$query = $this->db->get();
		return $query->result_array();
	    }
		

}
?>