<?php
class Contact extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
		public function index()
		{
			    $this->load->model('backend/login_model');
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $data['title']=$data['companyinfo']['company_name'].' | Contact Us';
				
				$this->load->model('backend/cms_model');
				$data['contactinfo']=$this->cms_model->getcmsinfomodel('8');
				$this->load->model('backend/home_page_model');
				$data['bannerlist']=$this->home_page_model->getactivebannerlistmodel();
				$this->load->model('backend/school_visit_model');
				$data['picturecatlist']=$this->school_visit_model->getfeaturedbannerlistmodel();
				$this->load->model('backend/school_visit_blog_model');
				$data['bloglist']=$this->school_visit_blog_model->getfeaturedbannerlistmodel();
				$this->load->model('backend/seo_settings_model');
				$data['metainfo']=$this->seo_settings_model->getmetainfomodel(7);
			    $this->load->view('user/contact_view',$data);
		}
		public function sendmail()
		{
			    $this->load->model('backend/login_model');
				$data['companyinfo']=$this->login_model->getuserinfoid('1');
			    $this->load->helper('mailsender_helper');
				$to=$data['companyinfo']['contact_email'];
				$from=$data['companyinfo']['contact_name']."<".stripslashes($_POST['txtEmail']).">";
				$subject='A New Message Posted';
				$message = '<table border="0" width="100%" cellspacing="2" cellpadding="2" align="center">
				<tr>
					<td colspan="2">A new message has been posted. Details are below,</td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td width="30%">Name : </td>
					<td width="70%" style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">'.stripslashes($_POST['txtName']).'</td>
				</tr>
				<tr>
					<td>Email : </td>
					<td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">'.stripslashes($_POST['txtEmail']).'</td>
				</tr>
				
				<tr>
					<td valign="top">Comments : </td>
					<td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #333333; text-align:left;line-height: 24px;">'.nl2br(stripslashes($_POST['txtComment'])).'</td>
				</tr>
				</table>';
				$template='contact';
				$res=mailsend($to,$from,$subject,$template,$message);
				if($res)
				{
					    $uto=$data['companyinfo']['contact_email'];
				$ufrom=$data['companyinfo']['contact_name']."<".stripslashes($data['companyinfo']['contact_email']).">";
				$usubject=$data['companyinfo']['subject'];
				$umessage = '<table border="0" width="100%" cellspacing="2" cellpadding="2" align="center">
				<tr>
					<td>'.$data['companyinfo']['message'].'</td>
				</tr>
				
				</table>';
				$utemplate='contact';
				$ures=mailsend($uto,$ufrom,$usubject,$utemplate,$umessage);
						$_SESSION['successmsg']='Your mail has been send successfully. We will contact you soon.';
						header('location:'.DOMAIN.'contact');
						exit;
					
				}
				else
				{
					    $_SESSION['errormsg']='Seems to be some problem. Try Again';
						header('location:'.DOMAIN.'contact');
						exit;
				}
		}
		
}

?>