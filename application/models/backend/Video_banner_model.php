<?php
class Video_banner_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
				$this->load->database();
        }
		public function countvideo_banner()
		{
			$cnt=$this->db->count_all_results('lm_video_banner');
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
                    'video_banner_title' => trim(addslashes($_POST['txtTitle'])),
					'video_banner_slug' => $slugvalue,
					'video_banner_content' => htmlspecialchars($_POST['editor1']),
                    'addedBy' => $_SESSION['usersession'],
					'status' => '1',
					'addedOn' => $entdate,
					'updatedOn' => $entdate
                             );

                $query=$this->db->insert('lm_video_banner', $data);
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
			$this->db->select('`video_banner_id`, `video_banner_title`, `video_banner_slug`, `video_banner_image`, `video_banner_content`, `status`, `video_banner_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_video_banner');
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function video_bannerlistmodel($getid)
		{
			$this->db->select('`gvideo_banner_id`, `gvideo_banner_title`, `video_banner_id`, `gvideo_banner_slug`, `gvideo_banner_image`, `gvideo_banner_content`, `status`, `gvideo_banner_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_video_banner_gallery');
			$this->db->where('status',1);
			$this->db->where('video_banner_id',$getid);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function getchartlistmodel()
		{
			$nr=array();
			$query = $this->db->query("select * from lm_video_banner");

            foreach ($query->result_array() as $row)
            {
              //echo $row['title'];
               $dquery = $this->db->query("select * from lm_package where video_banner_id='".$row['video_banner_id']."'");
               $nr[]=$dquery->num_rows()."/".$row['video_banner_id'];
            }
			ksort($nr);
			return $nr;
		}
		public function countchartpackagemodel($getid)
		{
			$this->db->where('video_banner_id', $getid);
            $this->db->from('lm_package');
            $cnt=$this->db->count_all_results();
			return $cnt;
		}
		public function getactivebannerlistmodel()
		{
			$this->db->select('`video_banner_id`, `video_banner_title`, `video_banner_slug`, `video_banner_image`, `video_banner_content`, `status`, `video_banner_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_video_banner');
			$this->db->where('status',1);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		
		public function getfeaturedbannerlistmodel()
		{
			$this->db->select('`video_banner_id`, `video_banner_title`, `video_banner_slug`, `video_banner_image`, `video_banner_content`, `status`, `video_banner_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_video_banner');
			$this->db->where('video_banner_featured',1);
			$this->db->where('status',1);
			$this->db->limit(6,0);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function getbannerinfomodel($getid)
		{
			$this->db->select('`video_banner_id`, `video_banner_title`, `video_banner_slug`, `video_banner_image`, `video_banner_content`, `status`, `video_banner_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_video_banner');
			$this->db->where('video_banner_id',$getid);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}
		public function getbannerslugmodel($getid)
		{
			$this->db->select('`video_banner_id`, `video_banner_title`, `video_banner_slug`, `video_banner_image`, `video_banner_content`, `status`, `video_banner_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_video_banner');
			$this->db->where('video_banner_slug',$getid);
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
			
			 
			
			$data = array(
                    'video_banner_title' => trim(addslashes($_POST['txtTitle'])),
					'video_banner_slug' => $slugvalue,
					'video_banner_content' => htmlspecialchars($_POST['editor1']),
                    'addedBy' => $_SESSION['usersession'],
					'updatedOn' => $entdate
             );

             $this->db->where('video_banner_id', $_POST['txtCid']);
             $query=$this->db->update('lm_video_banner', $data);
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

             $this->db->where('video_banner_id', $getid);
             $query=$this->db->update('lm_video_banner', $data);
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function featuredvideo_bannermodel($getid,$getstatus)
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
                    'video_banner_featured' => $nowstatus,
					'updatedOn' => $entdate
             );

             $this->db->where('video_banner_id', $getid);
             $query=$this->db->update('lm_video_banner', $data);
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
		     $searchquery = $this->db->query("select * from lm_video_banner where video_banner_id='".$getid."'");

             foreach ($searchquery->result_array() as $searchrow)
               {
                   unlink("uploads/".$searchrow['video_banner_image']);
               }
			 $this->db->where('video_banner_id', $getid);
             $query=$this->db->delete('lm_video_banner');
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function countactivevideo_banner()
		{
			$this->db->where('status', '1');
            $this->db->from('lm_video_banner');
            $cnt=$this->db->count_all_results();
			return $cnt;
		}
		public function fixedbannerlistmodel()
		{
			$this->db->select('`video_banner_id`, `video_banner_title`, `video_banner_slug`, `video_banner_image`, `video_banner_content`, `status`, `video_banner_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_video_banner');
			$this->db->where('status', '1');
			$this->db->limit(12,0);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		
		public function paginationsort($cntid)
	    {
		$start=($cntid-1) * 12;
		$this->db->select('`video_banner_id`, `video_banner_title`, `video_banner_slug`, `video_banner_image`, `video_banner_content`, `status`, `video_banner_featured`, `addedBy`, `addedOn`, `updatedOn`');
		$this->db->from('lm_video_banner');
		$this->db->where('status',1);
		$this->db->limit(12,$start);
		$query = $this->db->get();
		return $query->result_array();
	    }
		

}
?>