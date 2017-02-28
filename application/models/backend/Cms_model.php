<?php
class Cms_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
				$this->load->database();
        }
		public function getcmsinfomodel($getid)
		{
			$this->db->select('`cms_id`, `cms_name`, `cms_title`, `cms_content`, `cms_aimage1`, `cms_aimage2`, `cms_aimage3`, `cms_aimage4`, `cms_pdf`, `cms_choice`, `cms_ftitle`, `cms_fcontent`, `cms_image`, `updatedOn`');
            $this->db->from('lm_cms');
			$this->db->where('cms_id',$getid);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}
		public function editcmsmodel($getid)
		{
			$timezone = 'GMT';
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	$entdate = date('Y-m-d H:i:s');
			$gallery_pdf1='';
			$gallery_pdf2='';
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
                    'cms_title' => trim(addslashes($_POST['txtTitle'])),
                    'cms_image' => $gallery_pdf1,
					'cms_content' => htmlspecialchars($_POST['editor1']),
					'updatedOn' => $entdate
             );

             $this->db->where('cms_id', $_POST['txtCid']);
             $query=$this->db->update('lm_cms', $data);
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function editaboutcmsmodel($getid)
		{
			$timezone = 'GMT';
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	$entdate = date('Y-m-d H:i:s');
			$gallery_pdf1='';
			$gallery_pdf2='';
			$gallery_pdf3='';
			$gallery_pdf4='';
			$gallery_pdf5='';
			if($_FILES['imgXBanner']['name']!="")
	          {	
		        unlink("uploads/".$_POST['hid_gallery_pdf1']);
		        $photopath1 = pathinfo($_FILES['imgXBanner']['name']);
		        $extension1 = $photopath1['extension'];
		        $source1 = $_FILES['imgXBanner']['tmp_name'];
		       $gallery_pdf1 = time().".".$extension1;
		       $destination1 = "uploads/".$gallery_pdf1;
		
		        move_uploaded_file($source1,$destination1);
	          }
	         else
	          {
		         $gallery_pdf1 = $_POST['hid_gallery_pdf1'];
	          }
			  
			  if($_FILES['imgYBanner']['name']!="")
	          {	
		        unlink("uploads/".$_POST['hid_gallery_pdf2']);
		        $photopath2 = pathinfo($_FILES['imgYBanner']['name']);
		        $extension2 = $photopath2['extension'];
		        $source2 = $_FILES['imgYBanner']['tmp_name'];
		       $gallery_pdf2 = time().".".$extension2;
		       $destination2 = "uploads/".$gallery_pdf2;
		
		        move_uploaded_file($source2,$destination2);
	          }
	         else
	          {
		         $gallery_pdf2 = $_POST['hid_gallery_pdf2'];
	          }
			  
			  if($_FILES['imgZBanner']['name']!="")
	          {	
		        unlink("uploads/".$_POST['hid_gallery_pdf3']);
		        $photopath3 = pathinfo($_FILES['imgZBanner']['name']);
		        $extension3 = $photopath3['extension'];
		        $source3 = $_FILES['imgZBanner']['tmp_name'];
		       $gallery_pdf3 = time().".".$extension3;
		       $destination3 = "uploads/".$gallery_pdf3;
		
		        move_uploaded_file($source3,$destination3);
	          }
	         else
	          {
		         $gallery_pdf3 = $_POST['hid_gallery_pdf3'];
	          }
			  
			  if($_FILES['imgWBanner']['name']!="")
	          {	
		        unlink("uploads/".$_POST['hid_gallery_pdf4']);
		        $photopath4 = pathinfo($_FILES['imgWBanner']['name']);
		        $extension4 = $photopath4['extension'];
		        $source4 = $_FILES['imgWBanner']['tmp_name'];
		       $gallery_pdf4 = time().".".$extension4;
		       $destination4 = "uploads/".$gallery_pdf4;
		
		        move_uploaded_file($source4,$destination4);
	          }
	         else
	          {
		         $gallery_pdf4 = $_POST['hid_gallery_pdf4'];
	          }
			  
			  if($_FILES['pdfFile']['name']!="")
	          {	
		        unlink("uploads/".$_POST['hid_gallery_pdf5']);
		        $photopath5 = pathinfo($_FILES['pdfFile']['name']);
		        $extension5 = $photopath5['extension'];
		        $source5 = $_FILES['pdfFile']['tmp_name'];
		       $gallery_pdf5 = time().".".$extension5;
		       $destination5 = "uploads/".$gallery_pdf5;
		
		        move_uploaded_file($source5,$destination5);
	          }
	         else
	          {
		         $gallery_pdf5 = $_POST['hid_gallery_pdf5'];
	          }
			 
			$data = array(
                    'cms_title' => trim(addslashes($_POST['txtTitle'])),
                    'cms_aimage1' => $gallery_pdf1,
					'cms_aimage2' => $gallery_pdf2,
					'cms_aimage3' => $gallery_pdf3,
					'cms_aimage4' => $gallery_pdf4,
					'cms_pdf' => $gallery_pdf5,
					'cms_choice' => $_POST['txtType'],
					'cms_content' => htmlspecialchars($_POST['editor1']),
					'cms_ftitle' => trim(addslashes($_POST['txtFTitle'])),
					'cms_fcontent' => htmlspecialchars($_POST['feditor1']),
					'updatedOn' => $entdate
             );

             $this->db->where('cms_id', $_POST['txtCid']);
             $query=$this->db->update('lm_cms', $data);
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		
		public function editcontactmodel($getid)
		{
			$timezone = 'GMT';
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	$entdate = date('Y-m-d H:i:s');
			
			 
			$data = array(
                    'cms_title' => trim(addslashes($_POST['txtTitle'])),
					'cms_content' => htmlspecialchars($_POST['editor1']),
					'updatedOn' => $entdate
             );

             $this->db->where('cms_id', $_POST['txtCid']);
             $query=$this->db->update('lm_cms', $data);
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