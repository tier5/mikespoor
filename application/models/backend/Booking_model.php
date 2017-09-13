<?php
class Booking_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
				$this->load->database();
        }
		public function countbooking()
		{
			$cnt=$this->db->count_all_results('booking_history');
			return $cnt;
		}
		
		public function getbookinglistmodel()
		{
			$this->db->select('`booking_id`, `check_in`, `check_out`, `booking_adult`, `booking_youth`, `booking_child`, `booking_fname`, `booking_lname`, `booking_email`, `booking_phone`, `booking_currency`, `booking_price`, `booking_address`, `package_id`, `addedOn`, `updatedOn`');
            $this->db->from('booking_history');
			$this->db->order_by('addedOn', 'DESC');
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function getbookinggraphmodel($getid)
		{
			$cnt=0;
			$query = $this->db->query("select * from booking_history");

             foreach ($query->result_array() as $row)
               {
                    $bdate=$row['addedOn'];
					$mbdate=date('m',strtotime($bdate));
					if($mbdate==$getid)
					{
						$cnt=$cnt+1;
					}
                    
               }
			   return $cnt;
		}
		public function getbookinginfomodel($getid)
		{
			$this->db->select('`booking_id`, `check_in`, `check_out`, `booking_adult`, `booking_youth`, `booking_child`, `booking_fname`, `booking_lname`, `booking_email`, `booking_phone`, `booking_currency`, `booking_price`, `booking_address`, `package_id`, `addedOn`, `updatedOn`');
            $this->db->from('booking_history');
			$this->db->where('booking_id',$getid);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}
		
		

}
?>