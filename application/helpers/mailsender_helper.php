<?php
function mailsend($to,$from,$subject,$template,$message, $company_logo)
{
	
	                $content='';
					$mail=$to;
					$ToEmail = $mail;
					$EmailSubject = $subject; 
					$mailheader = "From:".$from."\r\n"; 
					//$mailheader .= "Reply-To: ".$mail."\r\n";
					$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
	                $MESSAGE_BODY = file_get_contents("assets/emailtemplate/".$template.".html");
	   
	     
         $content.= '<div align="left">'.$message;
		 $content.='</div>';
	
         $MESSAGE_BODY1 = str_ireplace('[@@content]',$content,$MESSAGE_BODY);
         $MESSAGE_BODY2 = str_ireplace('[@@image_url]', "http://stage.mikespoorillustrations.co.uk/uploads/".$company_logo, $MESSAGE_BODY1);
		$send=mail($ToEmail,$EmailSubject,$MESSAGE_BODY2,$mailheader);
		if($send)
		{
			return true;
		}
		else
		{
			return false;
		}
}
?>