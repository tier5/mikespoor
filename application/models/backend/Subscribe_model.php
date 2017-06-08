<?php
class Subscribe_model extends CI_Model {

    public function __construct(){
        parent::__construct();
		$this->load->database();
    }

    public function all_active_subscribers(){
    	$this->db->select('*');
        $this->db->from('lm_subscriber');
        $this->db->where('status',0);
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
    }


}?>