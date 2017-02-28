<?php
class Picture_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
				$this->load->database();
        }
		public function countpicture()
		{
			$cnt=$this->db->count_all_results('lm_picture');
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
                    'picture_title' => trim(addslashes($_POST['txtTitle'])),
					'picture_slug' => $slugvalue,
					'picture_content' => htmlspecialchars($_POST['editor1']),
                    'addedBy' => $_SESSION['usersession'],
					'status' => '1',
					'addedOn' => $entdate,
					'updatedOn' => $entdate
                             );

                $query=$this->db->insert('lm_picture', $data);
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
			$this->db->select('`picture_id`, `picture_title`, `picture_slug`, `picture_image`, `picture_content`, `status`, `picture_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_picture');
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function picturelistmodel($getid)
		{
			$this->db->select('`gpicture_id`, `gpicture_title`, `picture_id`, `gpicture_slug`, `gpicture_image`, `gpicture_content`, `status`, `gpicture_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_picture_gallery');
			$this->db->where('status',1);
			$this->db->where('picture_id',$getid);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function getchartlistmodel()
		{
			$nr=array();
			$query = $this->db->query("select * from lm_picture");

            foreach ($query->result_array() as $row)
            {
              //echo $row['title'];
               $dquery = $this->db->query("select * from lm_package where picture_id='".$row['picture_id']."'");
               $nr[]=$dquery->num_rows()."/".$row['picture_id'];
            }
			ksort($nr);
			return $nr;
		}
		public function countchartpackagemodel($getid)
		{
			$this->db->where('picture_id', $getid);
            $this->db->from('lm_package');
            $cnt=$this->db->count_all_results();
			return $cnt;
		}
		public function getactivebannerlistmodel()
		{
			$this->db->select('`picture_id`, `picture_title`, `picture_slug`, `picture_image`, `picture_content`, `status`, `picture_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_picture');
			$this->db->where('status',1);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		
		public function getfeaturedbannerlistmodel()
		{
			$this->db->select('`picture_id`, `picture_title`, `picture_slug`, `picture_image`, `picture_content`, `status`, `picture_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_picture');
			$this->db->where('picture_featured',1);
			$this->db->where('status',1);
			$this->db->limit(6,0);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function getbannerinfomodel($getid)
		{
			$this->db->select('`picture_id`, `picture_title`, `picture_slug`, `picture_image`, `picture_content`, `status`, `picture_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_picture');
			$this->db->where('picture_id',$getid);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}
		public function getbannerslugmodel($getid)
		{
			$this->db->select('`picture_id`, `picture_title`, `picture_slug`, `picture_image`, `picture_content`, `status`, `picture_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_picture');
			$this->db->where('picture_slug',$getid);
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
                    'picture_title' => trim(addslashes($_POST['txtTitle'])),
					'picture_slug' => $slugvalue,
					'picture_content' => htmlspecialchars($_POST['editor1']),
                    'addedBy' => $_SESSION['usersession'],
					'updatedOn' => $entdate
             );

             $this->db->where('picture_id', $_POST['txtCid']);
             $query=$this->db->update('lm_picture', $data);
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

             $this->db->where('picture_id', $getid);
             $query=$this->db->update('lm_picture', $data);
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function featuredpicturemodel($getid,$getstatus)
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
                    'picture_featured' => $nowstatus,
					'updatedOn' => $entdate
             );

             $this->db->where('picture_id', $getid);
             $query=$this->db->update('lm_picture', $data);
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
		     $searchquery = $this->db->query("select * from lm_picture where picture_id='".$getid."'");

             foreach ($searchquery->result_array() as $searchrow)
               {
                   unlink("uploads/".$searchrow['picture_image']);
               }
			 $this->db->where('picture_id', $getid);
             $query=$this->db->delete('lm_picture');
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function countactivepicture()
		{
			$this->db->where('status', '1');
            $this->db->from('lm_picture');
            $cnt=$this->db->count_all_results();
			return $cnt;
		}
		public function fixedbannerlistmodel()
		{
			$this->db->select('`picture_id`, `picture_title`, `picture_slug`, `picture_image`, `picture_content`, `status`, `picture_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_picture');
			$this->db->where('status', '1');
			$this->db->limit(12,0);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		
		public function paginationsort($cntid)
	    {
		$start=($cntid-1) * 12;
		$this->db->select('`picture_id`, `picture_title`, `picture_slug`, `picture_image`, `picture_content`, `status`, `picture_featured`, `addedBy`, `addedOn`, `updatedOn`');
		$this->db->from('lm_picture');
		$this->db->where('status',1);
		$this->db->limit(12,$start);
		$query = $this->db->get();
		return $query->result_array();
	    }
		

}
?>