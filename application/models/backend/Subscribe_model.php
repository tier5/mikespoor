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

    public function insert($table,$data){
        $query=$this->db->insert($table, $data);
        if($query){
            return true;
        } else {
            return false;
        }
    }

    public function check_mail($mail){
        $this->db->select('*');
        $this->db->from('lm_subscriber');
        $this->db->where('subscriber_email',$mail);
        $query = $this->db->get();
        $row = $query->row_array();
        $count=$query->num_rows();
        if($count>0){
            return $row;
        }else{
            return false;
        }
    }

    public function check_id($id){
        $this->db->select('*');
        $this->db->from('lm_subscriber');
        $this->db->where('subscriber_id',$id);
        $query = $this->db->get();
        $row = $query->row_array();
        $count=$query->num_rows();
        if($count>0){
            return $row;
        }else{
            return false;
        }
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


}?>