<?php
class School_visit_blog_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
				$this->load->database();
        }
		public function countschool_visit_blog()
		{
			$cnt=$this->db->count_all_results('lm_school_visit_blog');
			return $cnt;
		}
		public function addbannermodel()
		{
			$timezone = 'GMT';
			if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
			$entdate = date('Y-m-d H:i:s');
			$this->load->helper('function');
			
			$myDateTime = DateTime::createFromFormat('m/d/Y', $_POST['datepicker']);
            $newDateString = $myDateTime->format('Y-m-d');
			$gallery_pdf1='';
					$gallery_pdf2='';
					  if($_FILES['imgBanner']['name']!="")
			           {	
		         $photopath2 = pathinfo($_FILES['imgBanner']['name']);
		         $extension2 = $photopath2['extension'];
		         $source2 = $_FILES['imgBanner']['tmp_name'];
		         $gallery_pdf1 = time().".".$extension2;
		         $destination2 = "uploads/".$gallery_pdf1;
		          move_uploaded_file($source2,$destination2);
	           }
	
			$slugvalue=createSlug($_POST['txtTitle']);
			    $data = array(
                    'gschool_visit_blog_title' => trim($_POST['txtTitle']),
					'gschool_visit_blog_slug' => $slugvalue,
					'gschool_visit_blog_image' => $gallery_pdf1,
					'school_visit_id' => $_POST['selCategory'],
					'gschool_visit_date' =>$newDateString,
					'gschool_visit_blog_content' => htmlspecialchars($_POST['editor1']),
					'gschool_visit_blog_content2' => htmlspecialchars($_POST['editor2']),
					'gschool_visit_blog_content3' => htmlspecialchars($_POST['editor3']),
					'gschool_visit_blog_main' => htmlspecialchars($_POST['editor4']),
                    'addedBy' => $_SESSION['usersession'],
					'status' => '1',
					'addedOn' => $entdate,
					'updatedOn' => $entdate
                             );

                $query=$this->db->insert('lm_school_visit_blog', $data);
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
			$this->db->select('*');
            $this->db->from('lm_school_visit_blog');
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		
		public function getactivebannerlistmodel()
		{
			$this->db->select('*');
            $this->db->from('lm_school_visit_blog');
			$this->db->where('status',1);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		
		public function getfeaturedbannerlistmodel()
		{
			$this->db->select('*');
            $this->db->from('lm_school_visit_blog');
			$this->db->where('gschool_visit_blog_featured',1);
			$this->db->where('status',1);
			$this->db->limit(4,0);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function getbannerinfomodel($getid)
		{
			$this->db->select('*');
            $this->db->from('lm_school_visit_blog');
			$this->db->where('gschool_visit_blog_id',$getid);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}
		public function getbannerslugmodel($getid)
		{
			$this->db->select('*');
            $this->db->from('lm_school_visit_blog');
			$this->db->where('gschool_visit_blog_slug',$getid);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}
		public function bloglistmodel($getid)
		{
			$this->db->select('*');
            $this->db->from('lm_school_visit_blog');
			$this->db->where('school_visit_id',$getid);
			$this->db->where('status', '1');
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}

		public function bloglistmodelonepage($getid,$page)
		{

           $start=($page-1) * 6;
	

			$this->db->select('*');
            $this->db->from('lm_school_visit_blog');
			$this->db->where('school_visit_id',$getid);
			$this->db->where('status', '1');
			$this->db->limit(6,$start);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function editbannermodel()
		{
			$timezone = 'GMT';
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	$entdate = date('Y-m-d H:i:s');
	$this->load->helper('function');
			$slugvalue=createSlug($_POST['txtTitle']);
			
			$myDateTime = DateTime::createFromFormat('m/d/Y', $_POST['datepicker']);
            $newDateString = $myDateTime->format('Y-m-d');

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
                    'gschool_visit_blog_title' => trim($_POST['txtTitle']),
					'gschool_visit_blog_slug' => $slugvalue,
					'school_visit_id' => $_POST['selCategory'],
					'gschool_visit_blog_image' => $gallery_pdf1,
					'gschool_visit_date' =>$newDateString,
					'gschool_visit_blog_content' => htmlspecialchars($_POST['editor1']),
					'gschool_visit_blog_content2' => htmlspecialchars($_POST['editor2']),
					'gschool_visit_blog_content3' => htmlspecialchars($_POST['editor3']),
					'gschool_visit_blog_main' => htmlspecialchars($_POST['editor4']),
                    'addedBy' => $_SESSION['usersession'],
					'updatedOn' => $entdate
             );

             $this->db->where('gschool_visit_blog_id', $_POST['txtCid']);
             $query=$this->db->update('lm_school_visit_blog', $data);
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

             $this->db->where('gschool_visit_blog_id', $getid);
             $query=$this->db->update('lm_school_visit_blog', $data);
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function featuredschool_visit_blogmodel($getid,$getstatus)
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
                    'gschool_visit_blog_featured' => $nowstatus,
					'updatedOn' => $entdate
             );

             $this->db->where('gschool_visit_blog_id', $getid);
             $query=$this->db->update('lm_school_visit_blog', $data);
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
		     $searchquery = $this->db->query("select * from lm_school_visit_blog where gschool_visit_blog_id='".$getid."'");

             foreach ($searchquery->result_array() as $searchrow)
               {
                   unlink("uploads/".$searchrow['gschool_visit_blog_image']);
               }
			 $this->db->where('gschool_visit_blog_id', $getid);
             $query=$this->db->delete('lm_school_visit_blog');
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function countactiveschool_visit_blog()
		{
			$this->db->where('status', '1');
            $this->db->from('lm_school_visit_blog');
            $cnt=$this->db->count_all_results();
			return $cnt;
		}
		public function fixedbannerlistmodel()
		{
			$this->db->select('*');
            $this->db->from('lm_school_visit_blog');
			$this->db->where('status', '1');
			$this->db->limit(6,0);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		
		public function paginationsort($cntid)
	    {
		$start=($cntid-1) * 6;
		$this->db->select('*');
		$this->db->from('lm_school_visit_blog');
		$this->db->where('status',1);
		$this->db->limit(6,$start);
		$query = $this->db->get();
		return $query->result_array();
	    }
		

}
?>