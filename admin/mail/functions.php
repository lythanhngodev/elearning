<?php
include('class.smtp.php');
include "class.phpmailer.php"; 
function sendMail($title, $content, $nTo, $mTo,$diachicc=''){
	$nFrom = 'VLUTE - ELEARNING';
	$mFrom = 'vlutelibktv@gmail.com';	//dia chi email cua ban 
	$mPass = 'vlutelibktv@2017';		//mat khau email cua ban
	$mail             = new PHPMailer();
	$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );
	$body             = $content;
	$mail->IsSMTP(); 
	$mail->CharSet 	= "utf-8";
	///$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
	$mail->SMTPAuth   = true;                  	// enable SMTP authentication
	$mail->Port       = 587;
	$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
	$mail->Host       = "smtp.gmail.com";      	
	
	$mail->Username   = $mFrom;  // GMAIL username
	$mail->Password   = $mPass;           	 // GMAIL password
	$mail->SetFrom($mFrom, $nFrom);
	//chuyen chuoi thanh mang
	$ccmail = explode(',', $diachicc);
	$ccmail = array_filter($ccmail);
	if(!empty($ccmail)){
		foreach ($ccmail as $k => $v) {
			$mail->AddCC($v);
		}
	}
	$mail->Subject    = $title;
	$mail->MsgHTML($body);
	$address = $mTo;
	$mail->AddAddress($address, $nTo);
	$mail->AddReplyTo('vlutelibktv@gmail.com', 'VLUTE - ELEARNING');
	if(!$mail->Send()) {
		return false;
	} else {
		return true;
	}
}

function sendMailAttachment($title, $content, $nTo, $mTo,$diachicc='',$file,$filename){
	$nFrom = 'Freetuts.net';
	$mFrom = 'xxxx@gmail.com';	//dia chi email cua ban 
	$mPass = 'passlamatkhua';		//mat khau email cua ban
	$mail             = new PHPMailer();
	$body             = $content;
	$mail->IsSMTP(); 
	$mail->CharSet 	= "utf-8";
	$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
	$mail->SMTPAuth   = true;                  	// enable SMTP authentication
	$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	$mail->Host       = "smtp.gmail.com";      	
	$mail->Port       = 465;
	$mail->Username   = $mFrom;  // GMAIL username
	$mail->Password   = $mPass;           	 // GMAIL password
	$mail->SetFrom($mFrom, $nFrom);
	//chuyen chuoi thanh mang
	$ccmail = explode(',', $diachicc);
	$ccmail = array_filter($ccmail);
	if(!empty($ccmail)){
		foreach ($ccmail as $k => $v) {
			$mail->AddCC($v);
		}
	}
	$mail->Subject    = $title;
	$mail->MsgHTML($body);
	$address = $mTo;
	$mail->AddAddress($address, $nTo);
	$mail->AddReplyTo('info@freetuts.net', 'Freetuts.net');
	$mail->AddAttachment($file,$filename);
	if(!$mail->Send()) {
		return 0;
	} else {
		return 1;
	}
}

?>