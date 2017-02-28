<?php
function mailsend($to,$from,$subject,$template,$message)
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
		$send=mail($ToEmail,$EmailSubject,$MESSAGE_BODY1,$mailheader);
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