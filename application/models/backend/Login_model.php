<?php
class Login_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
				$this->load->database();
        }
		public function modelloginaccess($a,$b)
		{
			$query = $this->db->query("SELECT * FROM `lm_administrator` WHERE `admin_username` = '".$a."' AND `admin_password` = '".md5($b)."'");
			$numrows=$query->num_rows();
			if($numrows==1)
			{
                return true;
			}
			else
			{
				return false;
			}
		}
		public function getuserinfo($a)
		{
			$this->db->select('`admin_id`, `company_name`, `admin_username`, `admin_password`, `admin_original_password`, `contact_no1`, `contact_no2`, `fax_no`, `contact_email`, `company_logo`, `addedBy`, `updatedOn`');
            $this->db->from('lm_administrator');
			$this->db->where('admin_username',$a);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}
		public function getmemberinfoid($a)
		{
			$this->db->select('`admin_id`, `company_name`, `admin_username`, `admin_password`, `admin_original_password`, `contact_no1`, `contact_no2`, `fax_no`, `contact_email`, `company_logo`, `addedBy`, `updatedOn`');
            $this->db->from('lm_administrator');
			$this->db->where('admin_id',$a);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}
		public function getuserinfoid($a)
		{
			$this->db->select('*');
            $this->db->from('lm_company');
			$this->db->where('company_id','1');
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}
		public function editsitemodel()
		{
			$timezone = 'GMT';
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	$entdate = date('Y-m-d H:i:s');
			$gallery_pdf1='';
			if($_FILES['imgBanner']['name']!="")
	          {	
		        unlink("uploads/".$_POST['hid_gallery_pdf1']);
		        $photopath2 = pathinfo($_FILES['imgBanner']['name']);
		        $extension2 = $photopath2['extension'];
		        $source2 = $_FILES['imgBanner']['tmp_name'];
		       $gallery_pdf1 = time().".".$extension2;
		       $destination2 = "uploads/".$gallery_pdf1;
		
		        move_uploaded_file($source2,$destination2);
	          }
	         else
	          {
		         $gallery_pdf1 = $_POST['hid_gallery_pdf1'];
	          }
			  
			 
			$data = array(
					'company_name' => trim($_POST['txtCname']),
					'company_address' => $_POST['txtaddress'],
					'contact_email' => trim($_POST['txtemail']),
					'sender_email' => trim($_POST['txtsemail']),
					'contact_no1' => trim($_POST['txtphone1']),
					'contact_no2' => trim($_POST['txtphone2']),
					'footer_message' => $_POST['txtFmessage'],
					'facebook_link' => $_POST['txtFlink'],
					'instagram_link' => $_POST['txtIlink'],
					'linkdin_link' => $_POST['txtLlink'],
					'youtube_link' => $_POST['txtYlink'],
					'flicker_link' => $_POST['txtFLlink'],
					'skype_link' => $_POST['txtSlink'],
					'time_zone' => $_POST['selTimezone'],
					'date_format' => $_POST['selDate'],
					'time_format' => $_POST['selTime'],
					'subject' => trim($_POST['txtsubject']),
					'message' => trim($_POST['txtmessage']),
					//'video_banner' => trim($_POST['txtVlink']),
					//'video_status' => trim($_POST['txtVType']),
					//'theme_color' => $_POST['nowcolor'],
                    'company_logo' => $gallery_pdf1,
					'updatedOn' => $entdate
             );

             $this->db->where('company_id', $_POST['txtCid']);
             $query=$this->db->update('lm_company', $data);
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		 }
		 public function editpasswordmodel()
		{
			$timezone = 'GMT';
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	$entdate = date('Y-m-d H:i:s');
			$checkquery = $this->db->query("SELECT * FROM `lm_administrator` WHERE `admin_password` = '".md5($_POST['txtOpass'])."' AND `admin_id` = '".$_SESSION['usersession']."'");
			$countquery=$checkquery->num_rows();
			if($countquery==1)
			{
			$data = array(
                    'admin_password' => md5($_POST['txtNpass']),
					'admin_original_password' => $_POST['txtNpass'],
					'updatedOn' => $entdate
             );

             $this->db->where('admin_id', $_SESSION['usersession']);
             $query=$this->db->update('lm_administrator', $data);
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		 }
		 public function editusernamemodel()
		{
			$entdate=date('Y-m-d H:i:s');
			$data = array(
                    'admin_username' => trim($_POST['txtUname']),
					'updatedOn' => $entdate
             );

             $this->db->where('admin_id', $_SESSION['usersession']);
             $query=$this->db->update('lm_administrator', $data);
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