<?php
class Ajax_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
				$this->load->database();
        }

        public function fetch_welcome_title($title_id)
        {
            $this->db->select('*');
            $this->db->from('lm_home_title');
			$this->db->where('title_id',$title_id);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
        }

        public function update_welcome_title($title_id,$title)
        {
        	$data['title_id'] = $title_id;
	        $data1['title'] = $title;
	        $d=$this->db->where($data);
			$result=$this->db->update('lm_home_title',$data1);
			if($result){
	            return true;
	        }else{
	            return false;
	        }
        }

        public function delete($table,$con)
        {
           	$this->db->where($con);  
			$delete=$this->db->delete($table); 
			return $delete;
        }


        public function update_theme($table,$con,$data)
        {
          
            $d=$this->db->where($con);
            $result=$this->db->update($table,$data);
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function get_school_details($school_id)
        {
            $this->db->select('*');
            $this->db->from('lm_school_visit');
            $this->db->where('school_visit_id',$school_id);
            $query = $this->db->get();
            $row = $query->row_array();
            return $row;
        }

        public function edit_school_name($con, $data)
        {
            $this->db->where($con);
            $query=$this->db->update("lm_school_visit", $data);
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

        
        
}

?>