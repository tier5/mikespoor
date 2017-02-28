<?php
class Review_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
				$this->load->database();
        }
		public function countgallery()
		{
			$cnt=$this->db->count_all_results('lm_review');
			return $cnt;
		}
		public function addbannermodel()
		{
			$entdate=date('Y-m-d H:i:s');
			$destination_pdf1='';
			$destination_pdf2='';
			  if($_FILES['imgBanner']['name']!="")
	           {	
		         $photopath2 = pathinfo($_FILES['imgBanner']['name']);
		         $extension2 = $photopath2['extension'];
		         $source2 = $_FILES['imgBanner']['tmp_name'];
		         $destination_pdf1 = time().".".$extension2;
		         $destination2 = "uploads/".$destination_pdf1;
		          move_uploaded_file($source2,$destination2);
	           }
			  
			    $data = array(
                    'review_user' => trim(addslashes($_POST['txtTitle'])),
					'review_occupation' => trim(addslashes($_POST['txtPlace'])),
					'review_content' => htmlspecialchars($_POST['editor1']),
					'review_image' => $destination_pdf1,
                    'addedBy' => $_SESSION['usersession'],
					'status' => '1',
					'addedOn' => $entdate,
					'updatedOn' => $entdate
                             );

                $query=$this->db->insert('lm_review', $data);
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
			$this->db->select('`review_id`, `review_user`, `review_occupation`, `review_content`, `review_image`, `status`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_review');
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function getactivebannerlistmodel()
		{
			$this->db->select('`review_id`, `review_user`, `review_occupation`, `review_content`, `review_image`, `status`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_review');
			$this->db->where('status',1);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function getbannerinfomodel($getid)
		{
			$this->db->select('`review_id`, `review_user`, `review_occupation`, `review_content`, `review_image`, `status`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_review');
			$this->db->where('review_id',$getid);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}
		public function editbannermodel()
		{
			$entdate=date('Y-m-d H:i:s');
			$destination_pdf1='';
			$destination_pdf2='';
			if($_FILES['imgBanner']['name']!="")
	          {	
		        unlink("uploads/".$_POST['hid_destination_pdf1']);
		        $photopath2 = pathinfo($_FILES['imgBanner']['name']);
		        $extension2 = $photopath2['extension'];
		        $source2 = $_FILES['imgBanner']['tmp_name'];
		       $destination_pdf1 = time().".".$extension2;
		       $destination2 = "uploads/".$destination_pdf1;
		
		        move_uploaded_file($source2,$destination2);
	          }
	         else
	          {
		         $destination_pdf1 = $_POST['hid_image'];
	          }
			
			$data = array(
                    'review_user' => trim(addslashes($_POST['txtTitle'])),
					'review_occupation' => trim(addslashes($_POST['txtPlace'])),
					'review_image' => $destination_pdf1,
					'review_content' => htmlspecialchars($_POST['editor1']),
                    'addedBy' => $_SESSION['usersession'],
					'updatedOn' => $entdate
             );

             $this->db->where('review_id', $_POST['txtCid']);
             $query=$this->db->update('lm_review', $data);
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
			 $entdate=date('Y-m-d H:i:s');
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

             $this->db->where('review_id', $getid);
             $query=$this->db->update('lm_review', $data);
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
		     $searchquery = $this->db->query("select * from lm_review where review_id='".$getid."'");

			 $this->db->where('review_id', $getid);
             $query=$this->db->delete('lm_review');
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function countactivegallery()
		{
			$this->db->where('status', '1');
            $this->db->from('lm_review');
            $cnt=$this->db->count_all_results();
			return $cnt;
		}
		public function fixedbannerlistmodel()
		{
			$this->db->select('`review_id`, `review_user`, `review_occupation`, `review_content`, `review_image`, `status`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_review');
			$this->db->where('status', '1');
			$this->db->limit(2,0);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function paginationsort($cntid)
	    {
		$start=($cntid-1) * 6;
		$this->db->select('`review_id`, `review_user`, `review_occupation`, `review_content`, `review_image`, `status`, `addedBy`, `addedOn`, `updatedOn`');
		$this->db->from('lm_review');
		$this->db->where('status',1);
		$this->db->limit(6,$start);
		$query = $this->db->get();
		return $query->result_array();
	    }
		

}
?>