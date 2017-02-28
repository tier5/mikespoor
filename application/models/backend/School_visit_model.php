<?php
class School_visit_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
				$this->load->database();
        }
		public function countschool_visit()
		{
			$cnt=$this->db->count_all_results('lm_school_visit');
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
                    'school_visit_title' => trim(addslashes($_POST['txtTitle'])),
					'school_visit_slug' => $slugvalue,
					'school_visit_content' => htmlspecialchars($_POST['editor1']),
                    'addedBy' => $_SESSION['usersession'],
					'status' => '1',
					'addedOn' => $entdate,
					'updatedOn' => $entdate
                             );

                $query=$this->db->insert('lm_school_visit', $data);
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
			$this->db->select('`school_visit_id`, `school_visit_title`, `school_visit_slug`, `school_visit_image`, `school_visit_content`, `status`, `school_visit_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_school_visit');
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function school_visitlistmodel($getid)
		{
			$this->db->select('`gschool_visit_id`, `gschool_visit_title`, `school_visit_id`, `gschool_visit_slug`, `gschool_visit_image`, `gschool_visit_content`, `status`, `gschool_visit_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_school_visit_gallery');
			$this->db->where('status',1);
			$this->db->where('school_visit_id',$getid);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function getchartlistmodel()
		{
			$nr=array();
			$query = $this->db->query("select * from lm_school_visit");

            foreach ($query->result_array() as $row)
            {
              //echo $row['title'];
               $dquery = $this->db->query("select * from lm_package where school_visit_id='".$row['school_visit_id']."'");
               $nr[]=$dquery->num_rows()."/".$row['school_visit_id'];
            }
			ksort($nr);
			return $nr;
		}
		public function countchartpackagemodel($getid)
		{
			$this->db->where('school_visit_id', $getid);
            $this->db->from('lm_package');
            $cnt=$this->db->count_all_results();
			return $cnt;
		}
		public function getactivebannerlistmodel()
		{
			$this->db->select('`school_visit_id`, `school_visit_title`, `school_visit_slug`, `school_visit_image`, `school_visit_content`, `status`, `school_visit_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_school_visit');
			$this->db->where('status',1);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		
		public function getfeaturedbannerlistmodel()
		{
			$this->db->select('`school_visit_id`, `school_visit_title`, `school_visit_slug`, `school_visit_image`, `school_visit_content`, `status`, `school_visit_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_school_visit');
			//$this->db->where('school_visit_featured',1);
			$this->db->where('status',1);
			//$this->db->limit(6,0);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function getbannerinfomodel($getid)
		{
			$this->db->select('`school_visit_id`, `school_visit_title`, `school_visit_slug`, `school_visit_image`, `school_visit_content`, `status`, `school_visit_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_school_visit');
			$this->db->where('school_visit_id',$getid);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}
		public function getbannerslugmodel($getid)
		{
			$this->db->select('`school_visit_id`, `school_visit_title`, `school_visit_slug`, `school_visit_image`, `school_visit_content`, `status`, `school_visit_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_school_visit');
			$this->db->where('school_visit_slug',$getid);
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
                    'school_visit_title' => trim(addslashes($_POST['txtTitle'])),
					'school_visit_slug' => $slugvalue,
					'school_visit_content' => htmlspecialchars($_POST['editor1']),
                    'addedBy' => $_SESSION['usersession'],
					'updatedOn' => $entdate
             );

             $this->db->where('school_visit_id', $_POST['txtCid']);
             $query=$this->db->update('lm_school_visit', $data);
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

             $this->db->where('school_visit_id', $getid);
             $query=$this->db->update('lm_school_visit', $data);
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function featuredschool_visitmodel($getid,$getstatus)
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
                    'school_visit_featured' => $nowstatus,
					'updatedOn' => $entdate
             );

             $this->db->where('school_visit_id', $getid);
             $query=$this->db->update('lm_school_visit', $data);
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
		     $searchquery = $this->db->query("select * from lm_school_visit where school_visit_id='".$getid."'");

             foreach ($searchquery->result_array() as $searchrow)
               {
                   unlink("uploads/".$searchrow['school_visit_image']);
               }
			 $this->db->where('school_visit_id', $getid);
             $query=$this->db->delete('lm_school_visit');
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function countactiveschool_visit()
		{
			$this->db->where('status', '1');
            $this->db->from('lm_school_visit');
            $cnt=$this->db->count_all_results();
			return $cnt;
		}
		public function fixedbannerlistmodel()
		{
			$this->db->select('`school_visit_id`, `school_visit_title`, `school_visit_slug`, `school_visit_image`, `school_visit_content`, `status`, `school_visit_featured`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_school_visit');
			$this->db->where('status', '1');
			$this->db->limit(12,0);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		
		public function paginationsort($cntid)
	    {
		$start=($cntid-1) * 12;
		$this->db->select('`school_visit_id`, `school_visit_title`, `school_visit_slug`, `school_visit_image`, `school_visit_content`, `status`, `school_visit_featured`, `addedBy`, `addedOn`, `updatedOn`');
		$this->db->from('lm_school_visit');
		$this->db->where('status',1);
		$this->db->limit(12,$start);
		$query = $this->db->get();
		return $query->result_array();
	    }
		

}
?>