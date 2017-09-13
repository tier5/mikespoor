<?php
class Theme_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
				$this->load->database();
        }
		
		public function get_all_info($color_slug)
		{
            $this->db->select('*');
            $this->db->from('lm_theme');
			$this->db->where('color_slug', $color_slug);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}
		
}
?>