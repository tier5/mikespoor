<?php
class Link_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
				$this->load->database();
        }


        public function all_link()
        {
        	$this->db->select('*');
            $this->db->from('lm_link');
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
        }

        public function get_link_details($link_id)
        {
           $this->db->select('*');
            $this->db->from('lm_link');
            $this->db->where('linkid',$link_id);
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