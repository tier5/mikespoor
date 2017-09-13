<?php
class Home_background_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }

    public function getallbackground()
    {
    	$this->db->select('*');
        $this->db->from('lm_home_background');
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
    }

    public function get_selected_background($id)
    {
    	$this->db->select('*');
        $this->db->from('lm_home_background');
        $this->db->where('id',$id);
		$query = $this->db->get();
		$row = $query->row_array();
		return $row;
    }
}
?>