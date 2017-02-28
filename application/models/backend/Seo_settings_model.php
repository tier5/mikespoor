<?php
class Seo_settings_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
				$this->load->database();
        }
		public function getmetalistmodel()
		{
			$this->db->select('`meta_id`, `page_name`, `page_link`, `meta_title`, `meta_keywords`, `meta_description`');
            $this->db->from('lm_meta');
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function getmetainfomodel($getid)
		{
			$this->db->select('`meta_id`, `page_name`, `page_link`, `meta_title`, `meta_keywords`, `meta_description`');
            $this->db->from('lm_meta');
			$this->db->where('meta_id',$getid);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}
		public function editmetamodel()
		{
			$timezone = 'GMT';
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	$entdate = date('Y-m-d H:i:s');
			
			$data = array(
					'meta_title' => addslashes($_POST['txtMTitle']),
					'meta_keywords' => addslashes($_POST['txtMKey']),
					'meta_description' => addslashes($_POST['txtMDesc']),
					'updatedOn' => $entdate
             );

             $this->db->where('meta_id', $_POST['txtCid']);
             $query=$this->db->update('lm_meta', $data);
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		
}
?>