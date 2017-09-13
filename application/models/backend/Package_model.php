<?php
class Package_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
				$this->load->database();
        }
		public function countpackage()
		{
			$cnt=$this->db->count_all_results('lm_package');
			return $cnt;
		}
		public function addbannermodel()
		{
			$timezone = 'GMT';
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	$entdate = date('Y-m-d H:i:s');
			  $this->load->helper('function');
			$slugvalue=createSlug($_POST['txtName']);
			$destination_pdf1='';
			$destination_pdf2='';
			  if($_FILES['imgBanner']['name']!="")
	           {	
		         $photopath2 = pathinfo($_FILES['imgBanner']['name']);
		         $extension2 = $photopath2['extension'];
		         $source2 = $_FILES['imgBanner']['tmp_name'];
		         $destination_pdf1 = time().".".$extension2;
		         $destination2 = "uploads/".$destination_pdf1;
		          move_uploaded_file($source2,$destination2);
	           }
			    $data = array(
                    'package_title' => trim(addslashes($_POST['txtName'])),
					'package_slug' => $slugvalue,
					'package_image' => $destination_pdf1,
					'package_default' => trim(addslashes($_POST['txtDPrice'])),
					'meta_title' => trim(addslashes($_POST['txtMTitle'])),
					'destination_id' => $_POST['selCategory'],
					'meta_keyword' => trim(addslashes($_POST['txtMKeyword'])),
					'meta_description' => trim(addslashes($_POST['txtMDesc'])),
                    'package_content' => htmlspecialchars($_POST['editor1']),
                    'addedBy' => $_SESSION['usersession'],
					'status' => '1',
					'addedOn' => $entdate,
					'updatedOn' => $entdate
                             );
             
                $query=$this->db->insert('lm_package', $data);
				$insertId=$this->db->insert_id();
				$includearr = $_POST['txtInclude'];
				foreach( $includearr as $includedata ) {
					if(!empty($includedata))
					{
                   $incdata = array(
                    'package_id' => $insertId,
					'pi_term' => trim(addslashes($includedata)),
					'addedOn' => $entdate,
					'updatedOn' => $entdate
                             );
							 $this->db->insert('lm_package_include', $incdata);
					}
                    }
				
				$termarr = $_POST['txtTerm'];
				foreach( $termarr as $termdata ) {
					if(!empty($termdata))
					{
                   $indata = array(
                    'package_id' => $insertId,
					'pt_term' => trim(addslashes($termdata)),
					'addedOn' => $entdate,
					'updatedOn' => $entdate
                             );
							 $this->db->insert('lm_package_term', $indata);
					}
                    }
					$cancelarr = $_POST['txtCancel'];
				foreach( $cancelarr as $canceldata ) {
					if(!empty($canceldata))
					{
                   $cncdata = array(
                    'package_id' => $insertId,
					'pc_policy' => trim(addslashes($canceldata)),
					'addedOn' => $entdate,
					'updatedOn' => $entdate
                             );
							 $this->db->insert('lm_package_cancel', $cncdata);
					}
                    }
					
					$pricenamearr = $_POST['txtPricetitle'];
					$pricevaluearr = $_POST['txtPricevalue'];
					$cntprice=count($pricenamearr);
				for( $k=0;$k<$cntprice;$k++ ) {
					if(!empty($pricenamearr[$k]) && $pricevaluearr[$k])
					{
                   $pricedata = array(
                    'package_id' => $insertId,
					'pp_title' => trim(addslashes($pricenamearr[$k])),
					'pp_price' => trim(addslashes($pricevaluearr[$k])),
					'addedOn' => $entdate,
					'updatedOn' => $entdate
                             );
							 $this->db->insert('lm_package_price', $pricedata);
					}
                    }
					
					$j = 0; //Variable for indexing uploaded image 
    
	$target_path = "uploads/"; //Declaring Path for uploaded images
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array

        $validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
        $ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 
        $file_extension = end($ext); //store extensions in the variable
        
		$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
        $j = $j + 1;//increment the number of uploaded images according to the files in array       
      
	  if (($_FILES["file"]["size"][$i] < 600000) //Approx. 100kb files can be uploaded.
                && in_array($file_extension, $validextensions)) {
            move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path);
			 $imgdata = array(
                    'package_id' => $insertId,
					'pi_image' => trim(addslashes($target_path)),
					'addedOn' => $entdate,
					'updatedOn' => $entdate
                             );
							 $this->db->insert('lm_package_image', $imgdata);
			//if file moved to uploads folder
                
        } 
    }
				if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function addplanmodel()
		{
			$timezone = 'GMT';
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	$entdate = date('Y-m-d H:i:s');
			$destination_pdf1='';
			$destination_pdf2='';
			  if($_FILES['imgBanner']['name']!="")
	           {	
		         $photopath2 = pathinfo($_FILES['imgBanner']['name']);
		         $extension2 = $photopath2['extension'];
		         $source2 = $_FILES['imgBanner']['tmp_name'];
		         $destination_pdf1 = time().".".$extension2;
		         $destination2 = "uploads/".$destination_pdf1;
		          move_uploaded_file($source2,$destination2);
	           }
			  
			    $data = array(
                    'plan_title' => trim(addslashes($_POST['txtTitle'])),
                    'plan_image' => $destination_pdf1,
					'package_id' => $_POST['txtPid'],
					'plan_description' => htmlspecialchars($_POST['editor1']),
					'addedOn' => $entdate,
					'updatedOn' => $entdate
                             );

                $query=$this->db->insert('lm_tourplan', $data);
				if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function addbookingmodel()
		{
			$resultarr=array();
			$timezone = 'GMT';
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	$entdate = date('Y-m-d H:i:s');
			$data = array(
			        'check_in' => trim(addslashes($_POST['txtIn'])),
					'check_out' => trim(addslashes($_POST['txtOut'])),
					'booking_adult' => trim(addslashes($_POST['selnumadults'])),
					'booking_youth' => trim(addslashes($_POST['selnumyouth'])),
					'booking_price' => trim(addslashes($_POST['txtPricedefault'])),
					'booking_currency' => $_SESSION['currencysess'],
					'booking_child' => trim(addslashes($_POST['selnumchild'])),
                    'booking_fname' => trim(addslashes($_POST['txtFName'])),
					'booking_lname' => trim(addslashes($_POST['txtLName'])),
                    'booking_email' => trim(addslashes($_POST['txtEmail'])),
					'booking_phone' => trim(addslashes($_POST['txtPhone'])),
					'booking_address' => trim(addslashes($_POST['txtAdress'])),
					'package_id' => $_POST['txtPackage'],
					'addedOn' => $entdate,
					'updatedOn' => $entdate
                             );

                $query=$this->db->insert('booking_history', $data);
				$insertID=$this->db->insert_id();
				if($query)
				{
					$resultarr[0]=true;
					$resultarr[1]=$insertID;
					return $resultarr;
				}
				else
				{
					$resultarr[0]=false;
					$resultarr[1]='';
					return $resultarr;
				}
		}
		public function getrelatedlistmodel($getid)
		{
			$this->db->select('`pf_id`, `country_id`, `pf_one`, `pf_two`, `pf_three`, `pf_four`, `updated_on`');
            $this->db->from('lm_preferred');
			$this->db->where('pf_id',$getid);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}
		public function getbannerlistmodel()
		{
			$this->db->select('`package_id`, `package_title`, `package_slug`, `destination_id`, `package_content`, `package_default`, `status`, `package_featured`, `package_image`, `meta_title`, `meta_keyword`, `meta_description`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_package');
			$this->db->order_by("package_id", "desc");
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function getactivebannerlistmodel()
		{
			$this->db->select('`package_id`, `package_title`, `package_slug`, `destination_id`, `package_content`, `package_default`, `status`, `package_featured`, `package_image`, `meta_title`, `meta_keyword`, `meta_description`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_package');
			$this->db->where('status',1);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function getbannerinfomodel($getid)
		{
			$this->db->select('`package_id`, `package_title`, `package_slug`, `destination_id`, `package_content`, `package_default`, `status`, `package_featured`, `package_image`, `meta_title`, `meta_keyword`, `meta_description`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_package');
			$this->db->where('package_id',$getid);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}
		public function getbannerslugmodel($getid)
		{
			$this->db->select('`package_id`, `package_title`, `package_slug`, `destination_id`, `package_content`, `package_default`, `status`, `package_featured`, `package_image`, `meta_title`, `meta_keyword`, `meta_description`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_package');
			$this->db->where('package_slug',$getid);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}
		public function getpicturelistmodel($getid)
		{
			$this->db->select('`pi_id`, `package_id`, `pi_image`, `addedOn`, `updatedOn`');
            $this->db->from('lm_package_image');
			$this->db->where('package_id',$getid);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function gettermlistmodel($getid)
		{
			$this->db->select('`pt_id`, `package_id`, `pt_term`, `addedOn`, `updatedOn`');
            $this->db->from('lm_package_term');
			$this->db->where('package_id',$getid);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function getpolicylistmodel($getid)
		{
			$this->db->select('`pc_id`, `package_id`, `pc_policy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_package_cancel');
			$this->db->where('package_id',$getid);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function getpricelistmodel($getid)
		{
			$this->db->select('`pp_id`, `package_id`, `pp_title`, `pp_price`, `addedOn`, `updatedOn`');
            $this->db->from('lm_package_price');
			$this->db->where('package_id',$getid);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function gettourlistmodel($getid)
		{
			$this->db->select('`plan_id`, `plan_title`, `plan_description`, `package_id`, `addedOn`, `updatedOn`, `plan_image`');
            $this->db->from('lm_tourplan');
			$this->db->where('package_id',$getid);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function getplaninfomodel($getid)
		{
			$this->db->select('`plan_id`, `plan_title`, `plan_description`, `package_id`, `addedOn`, `updatedOn`, `plan_image`');
            $this->db->from('lm_tourplan');
			$this->db->where('plan_id',$getid);
			$query = $this->db->get();
			$row = $query->row_array();
			return $row;
		}
		public function getincludeinfomodel($getid)
		{
			$this->db->select('`pi_id`, `package_id`, `pi_term`, `addedOn`, `updatedOn`');
            $this->db->from('lm_package_include');
			$this->db->where('package_id',$getid);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function editbannermodel()
		{
			$timezone = 'GMT';
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	$entdate = date('Y-m-d H:i:s');
			  $this->load->helper('function');
			$slugvalue=createSlug($_POST['txtName']);
			$destination_pdf1='';
			$destination_pdf2='';
			if($_FILES['imgBanner']['name']!="")
	          {	
		        unlink("uploads/".$_POST['hid_destination_pdf1']);
		        $photopath2 = pathinfo($_FILES['imgBanner']['name']);
		        $extension2 = $photopath2['extension'];
		        $source2 = $_FILES['imgBanner']['tmp_name'];
		       $destination_pdf1 = time().".".$extension2;
		       $destination2 = "uploads/".$destination_pdf1;
		
		        move_uploaded_file($source2,$destination2);
	          }
	         else
	          {
		         $destination_pdf1 = $_POST['hid_destination_pdf1'];
	          }
			 
			$data = array(
                    'package_title' => trim(addslashes($_POST['txtName'])),
					'package_slug' => $slugvalue,
					'package_image' => $destination_pdf1,
					'package_default' => trim(addslashes($_POST['txtDPrice'])),
					'meta_title' => trim(addslashes($_POST['txtMTitle'])),
					'destination_id' => $_POST['selCategory'],
					'meta_keyword' => trim(addslashes($_POST['txtMKeyword'])),
					'meta_description' => trim(addslashes($_POST['txtMDesc'])),
                    'package_content' => htmlspecialchars($_POST['editor1']),
					'updatedOn' => $entdate
                             );

             $this->db->where('package_id', $_POST['txtCid']);
             $query=$this->db->update('lm_package', $data);
			 
			 $includearr = $_POST['txtInclude'];
				foreach( $includearr as $includedata ) {
					if(!empty($includedata))
					{
                   $incdata = array(
                    'package_id' => $_POST['txtCid'],
					'pi_term' => trim(addslashes($includedata)),
					'addedOn' => $entdate,
					'updatedOn' => $entdate
                             );
							 $this->db->insert('lm_package_include', $incdata);
					}
                    }
			 $termarr = $_POST['txtTerm'];
				foreach( $termarr as $termdata ) {
					if(!empty($termdata))
					{
                   $indata = array(
                    'package_id' => $_POST['txtCid'],
					'pt_term' => trim(addslashes($termdata)),
					'addedOn' => $entdate,
					'updatedOn' => $entdate
                             );
							 $this->db->insert('lm_package_term', $indata);
					}
                    }
					$cancelarr = $_POST['txtCancel'];
				foreach( $cancelarr as $canceldata ) {
					if(!empty($canceldata))
					{
                   $cncdata = array(
                    'package_id' => $_POST['txtCid'],
					'pc_policy' => trim(addslashes($canceldata)),
					'addedOn' => $entdate,
					'updatedOn' => $entdate
                             );
							 $this->db->insert('lm_package_cancel', $cncdata);
					}
                    }
					
					$pricenamearr = $_POST['txtPricetitle'];
					$pricevaluearr = $_POST['txtPricevalue'];
					$cntprice=count($pricenamearr);
				for( $k=0;$k<$cntprice;$k++ ) {
					if(!empty($pricenamearr[$k]) && $pricevaluearr[$k])
					{
                   $pricedata = array(
                    'package_id' => $_POST['txtCid'],
					'pp_title' => trim(addslashes($pricenamearr[$k])),
					'pp_price' => trim(addslashes($pricevaluearr[$k])),
					'addedOn' => $entdate,
					'updatedOn' => $entdate
                             );
							 $this->db->insert('lm_package_price', $pricedata);
					}
                    }
					
					$j = 0; //Variable for indexing uploaded image 
    
	$target_path = "uploads/"; //Declaring Path for uploaded images
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array

        $validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
        $ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 
        $file_extension = end($ext); //store extensions in the variable
        
		$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
        $j = $j + 1;//increment the number of uploaded images according to the files in array       
      
	  if (($_FILES["file"]["size"][$i] < 600000) //Approx. 100kb files can be uploaded.
                && in_array($file_extension, $validextensions)) {
            move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path);
			 $imgdata = array(
                    'package_id' => $_POST['txtCid'],
					'pi_image' => trim(addslashes($target_path)),
					'addedOn' => $entdate,
					'updatedOn' => $entdate
                             );
							 $this->db->insert('lm_package_image', $imgdata);
			//if file moved to uploads folder
                
        } 
    }
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function statusbannermodel($getid,$getstatus)
		{
			 $timezone = 'GMT';
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	$entdate = date('Y-m-d H:i:s');
			 $nowstatus='';
			 if($getstatus==0)
			 {
				 $nowstatus=1;
			 }
			 else
			 {
				 $nowstatus=0;
			 }
			 $data = array(
                    'status' => $nowstatus,
                    'addedBy' => $_SESSION['usersession'],
					'updatedOn' => $entdate
             );

             $this->db->where('package_id', $getid);
             $query=$this->db->update('lm_package', $data);
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function featuredpackagemodel($getid,$getstatus)
		{
			$timezone = 'GMT';
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	$entdate = date('Y-m-d H:i:s');
			 $nowstatus='';
			 if($getstatus==0)
			 {
				 $nowstatus=1;
			 }
			 else
			 {
				 $nowstatus=0;
			 }
			 $data = array(
                    'package_featured' => $nowstatus,
					'updatedOn' => $entdate
             );

             $this->db->where('package_id', $getid);
             $query=$this->db->update('lm_package', $data);
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function deletebannermodel($getid)
		{    
		    /* $searchquery = $this->db->query("select * from lm_package_image where package_id='".$getid."'");

             foreach ($searchquery->result_array() as $searchrow)
               {
                   unlink($searchrow['package_image']);
               }*/
			 
			 $this->db->where('package_id', $getid);
             $this->db->delete('lm_package_image');
			  $this->db->where('package_id', $getid);
             $this->db->delete('lm_package_term');
			  $this->db->where('package_id', $getid);
             $this->db->delete('lm_package_cancel');
			  $this->db->where('package_id', $getid);
             $this->db->delete('lm_package_price');
			 $this->db->where('package_id', $getid);
             $this->db->delete('lm_tourplan');
			 $this->db->where('package_id', $getid);
             $this->db->delete('lm_package_include');
			 $this->db->where('package_id', $getid);
             $query=$this->db->delete('lm_package');
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function deletetourplanmodel($getid)
		{    
		     /*$searchquery = $this->db->query("select * from lm_tourplan where plan_id='".$getid."'");

             foreach ($searchquery->result_array() as $searchrow)
               {
                   unlink("uploads/".$searchrow['plan_image']);
               }*/
			 $this->db->where('plan_id', $getid);
             $query=$this->db->delete('lm_tourplan');
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function deletebannerimagemodel($getid)
		{    
		     /*$searchquery = $this->db->query("select * from lm_package_image where pi_id='".$getid."'");

             foreach ($searchquery->result_array() as $searchrow)
               {
                   unlink($searchrow['pi_image']);
               }*/
			 $this->db->where('pi_id', $getid);
             $query=$this->db->delete('lm_package_image');
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function deletebannertermmodel($getid)
		{    
		     
			 $this->db->where('pt_id', $getid);
             $query=$this->db->delete('lm_package_term');
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function deletebannerpolicymodel($getid)
		{    
		     
			 $this->db->where('pc_id', $getid);
             $query=$this->db->delete('lm_package_cancel');
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function deletebannerincludemodel($getid)
		{    
		     
			 $this->db->where('pi_id', $getid);
             $query=$this->db->delete('lm_package_include');
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		public function deletebannerpricemodel($getid)
		{    
		     
			 $this->db->where('pp_id', $getid);
             $query=$this->db->delete('lm_package_price');
			 if($query)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		
		public function countactivepackage()
		{
			$this->db->where('status', '1');
            $this->db->from('lm_package');
            $cnt=$this->db->count_all_results();
			return $cnt;
		}
		public function featuredbannerlistmodel()
		{
			$this->db->select('`package_id`, `package_title`, `package_slug`, `destination_id`, `package_content`, `package_default`, `status`, `package_featured`, `package_image`, `meta_title`, `meta_keyword`, `meta_description`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_package');
			$this->db->where('status', '1');
			$this->db->where('package_featured', '1');
			$this->db->limit(4,0);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function recentbannerlistmodel()
		{
			$this->db->select('`package_id`, `package_title`, `package_slug`, `destination_id`, `package_content`, `package_default`, `status`, `package_featured`, `package_image`, `meta_title`, `meta_keyword`, `meta_description`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_package');
			$this->db->where('status', '1');
			$this->db->order_by("package_id", "desc");
			$this->db->limit(5,0);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function fixedbannerlistmodel()
		{
			$this->db->select('`package_id`, `package_title`, `package_slug`, `destination_id`, `package_content`, `package_default`, `status`, `package_featured`, `package_image`, `meta_title`, `meta_keyword`, `meta_description`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_package');
			$this->db->where('status', '1');
			$this->db->order_by("package_id", "desc");
			$this->db->limit(6,0);
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function packagelistmodel($getid)
		{
			$this->db->select('`package_id`, `package_title`, `package_slug`, `destination_id`, `package_content`, `package_default`, `status`, `package_featured`, `package_image`, `meta_title`, `meta_keyword`, `meta_description`, `addedBy`, `addedOn`, `updatedOn`');
            $this->db->from('lm_package');
			$this->db->where('destination_id', $getid);
			$this->db->where('status', '1');
			$this->db->order_by("package_id", "desc");
			$query = $this->db->get();
			$row = $query->result_array();
			return $row;
		}
		public function paginationsort($cntid)
	    {
		$start=($cntid-1) * 6;
		$this->db->select('`package_id`, `package_title`, `package_slug`, `destination_id`, `package_content`, `package_default`, `status`, `package_featured`, `package_image`, `meta_title`, `meta_keyword`, `meta_description`, `addedBy`, `addedOn`, `updatedOn`');
		$this->db->from('lm_package');
		$this->db->where('status',1);
		$this->db->limit(6,$start);
		$this->db->order_by("package_id", "desc");
		$query = $this->db->get();
		return $query->result_array();
	    }
		public function editplanmodel()
		{
			$timezone = 'GMT';
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
	$entdate = date('Y-m-d H:i:s');
			$destination_pdf1='';
			$destination_pdf2='';
			if($_FILES['imgBanner']['name']!="")
	          {	
		        unlink("uploads/".$_POST['hid_destination_pdf1']);
		        $photopath2 = pathinfo($_FILES['imgBanner']['name']);
		        $extension2 = $photopath2['extension'];
		        $source2 = $_FILES['imgBanner']['tmp_name'];
		       $destination_pdf1 = time().".".$extension2;
		       $destination2 = "uploads/".$destination_pdf1;
		
		        move_uploaded_file($source2,$destination2);
	          }
	         else
	          {
		         $destination_pdf1 = $_POST['hid_destination_pdf1'];
	          }
			 
			
			$data = array(
                    'plan_title' => trim(addslashes($_POST['txtTitle'])),
                    'plan_image' => $destination_pdf1,
					'plan_description' => htmlspecialchars($_POST['editor1']),
					'updatedOn' => $entdate
             );

             $this->db->where('plan_id', $_POST['txtCid']);
             $query=$this->db->update('lm_tourplan', $data);
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