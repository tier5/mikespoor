<?php
class Timeline_model extends CI_Model {
        public function __construct()
        {
                parent::__construct();
				$this->load->database();
        }
		public function countgallery()
		{
			$cnt=$this->db->count_all_results('lm_timeline');
			return $cnt;
		}
		
		public function addfeaturemodel()
		{
		$timezone = 'GMT';
			$this->db->select('*');
	        $this->db->from('lm_timeline');
			$this->db->where('orderBy >=',$_POST['txtOrder']);
			$query = $this->db->get();
			$result = $query->result_array(); 
            foreach($result as $change)
			{
				$data=array(
                    
					'orderBy' => $change['orderBy']+1,
                   
                );
                $this->db->where('timeline_id', $change['timeline_id']);
                $query=$this->db->update('lm_timeline', $data);
			}          
	        if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	        $entdate = date('Y-m-d H:i:s');
			
			    $data = array(
                    'timeline_title' => trim(addslashes($_POST['txtTitle'])),
					'timeline_content' => htmlspecialchars($_POST['editor1']),
					'orderBy' => trim(addslashes($_POST['txtOrder'])),
                    'addedBy' => $_SESSION['usersession'],
					'status' => '1',
					'addedOn' => $entdate,
					'updatedOn' => $entdate
                             );
                $query=$this->db->insert('lm_timeline', $data);
				if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		
		public function getfeaturedlistmodel()
		{
			$this->db->select('`timeline_id`, `timeline_title`, `timeline_content`, `orderBy`, `status`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_timeline');
			$this->db->order_by('orderBy', 'ASC');
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function getactivefeaturedlistmodel()
		{
			$this->db->select('`timeline_id`, `timeline_title`, `timeline_content`, `orderBy`, `status`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_timeline');
			$this->db->order_by('orderBy', 'ASC');
			$this->db->where('status',1);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		
		public function getfeatureinfomodel($getid)
		{
			$this->db->select('`timeline_id`, `timeline_title`, `timeline_content`, `orderBy`, `status`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_timeline');
			$this->db->where('timeline_id',$getid);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}
		
		public function editfeaturemodel()
		{
			$timezone = 'GMT';
	        if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	        $entdate = date('Y-m-d H:i:s');
            $this->db->select('*');
            $this->db->from('lm_timeline');
			$this->db->where('timeline_id',$_POST['txtCid']);
			$query = $this->db->get();
			$row = $query->row_array(); 
			$old_position=$row['orderBy'];
			$new_pisition=$_POST['txtOrder'];
			if($old_position>$new_pisition){
          
            $this->db->select('*');
            $this->db->from('lm_timeline');
			
			$this->db->where('orderBy <', $old_position); 
			$this->db->where('orderBy >=',$new_pisition);
			$query = $this->db->get();
			$row1 = $query->result_array();
			foreach($row1 as $change)
			{
				$data=array(
                    
					'orderBy' => $change['orderBy']+1,
                   
                );
                $this->db->where('timeline_id', $change['timeline_id']);
                $query=$this->db->update('lm_timeline', $data);
			}
	
            }else if($new_pisition>$old_position){
            $this->db->select('*');
            $this->db->from('lm_timeline');
			$this->db->where('orderBy >=', $old_position); 
			$this->db->where('orderBy <',$new_pisition);
			$query = $this->db->get();
			$row1 = $query->result_array();
			foreach($row1 as $change)
			{
				$data=array(
                    
					'orderBy' => $change['orderBy']-1,
                   
                );
                $this->db->where('timeline_id', $change['timeline_id']);
                $query=$this->db->update('lm_timeline', $data);
			}
            }
			$data=array(
                    'timeline_title' => trim(addslashes($_POST['txtTitle'])),
					'timeline_content' => htmlspecialchars($_POST['editor1']),
					'orderBy' => trim(addslashes($_POST['txtOrder'])),
                    'addedBy' => $_SESSION['usersession'],
					'updatedOn' => $entdate
                );
            $this->db->where('timeline_id', $_POST['txtCid']);
            $query=$this->db->update('lm_timeline', $data);
			if($query){
				return true;
			}else{
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
             $this->db->where('timeline_id', $getid);
             $query=$this->db->update('lm_timeline', $data);
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
		    
			 $this->db->where('timeline_id', $getid);
             $query=$this->db->delete('lm_timeline');
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function first_event()
		{
			$this->db->select('`timeline_id`, `timeline_title`, `timeline_content`, `orderBy`, `status`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_timeline');
            $this->db->limit(1);
			$this->db->order_by('orderBy', 'ASC');
			$this->db->where('status',1);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}
       
}
?>