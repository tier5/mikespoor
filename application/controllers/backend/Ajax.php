<?php
class Ajax extends CI_Controller {
      
	    public function __construct()
        {
                parent::__construct();
                $this->load->model('backend/Ajax_model');
				
        }
        
        public function get_welcome_title()
        {
        	$title_id=$this->input->post('title_id');
        	$title=$this->Ajax_model->fetch_welcome_title($title_id);
        	echo json_encode($title);
        }

        public function update_welcome_title()
        {
        	$title_id=$this->input->post('title_id');
        	$title=$this->input->post('title');
        	$title_update=$this->Ajax_model->update_welcome_title($title_id,$title);
        	if($title_update){
		    $_SESSION['successmsg']='Welcome Title Updated Successfully';			
		} else{
		    $_SESSION['errormsg']='Seems to be some problem. Try Again';
		}		
        }

        public function delete_home_offer()
        {
             $con['offer_id']=$this->input->post('offer_id');

             $offer_delete=$this->Ajax_model->delete('lm_home_offer',$con);
        }

         public function delete_home_stats()
        {
             $con['stats_id']=$this->input->post('stats_id');

             $offer_delete=$this->Ajax_model->delete('lm_home_stats',$con);
        }

        
}
?>