<?php
include 'config.php'; 
session_start();
if(!isset($_SESSION['login']))
{
  header('Location:index.html');
  die();
}
connect_db();

$iddetail= $_GET["id_detail"];

$query1 = db()->query('SELECT * from la_detail where id_detail="'.$iddetail.'"');
echo db()->error;
$row1 = $query1->fetch_assoc();

	if($row1['status1']==0){
		$status1=1;
	}else{
		$status1=0;
	}
	
	if($row1['status2']==0){
		$status2=1;
	}else{
		$status2=0;
	}
	
	if($row1['status3']==0){
		$status3=1;
	}else{
		$status3=0;
	}
	
$query2 = db()->query('SELECT * from la_personal where id_personal="'.$_SESSION['iduser'].'"');
echo db()->error;
$row2 = $query2->fetch_assoc();

if($row2['permission']==2){
	$s = sprintf('UPDATE la_detail SET status1="%s" WHERE id_detail ="%s"',$status1,$iddetail);
}
if($row2['permission']==3){
	$s = sprintf('UPDATE la_detail SET status2="%s" WHERE id_detail ="%s"',$status2,$iddetail);
}
if($row2['permission']==4){

	$s = sprintf('UPDATE la_detail SET status3="%s" WHERE id_detail ="%s"',$status3,$iddetail);
	
	$query3 = db()->query('SELECT * from la_personal where id_personal="'.$row1['id_personal'].'"');
	echo db()->error;
	$row3 = $query3->fetch_assoc();

	if($status3==1){
/**
 * This example shows making an SMTP connection with authentication.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Asia/Bangkok');

require 'PHPMailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->CharSet = "utf-8";
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "smtp.gmail.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication

//แก้ไขอีเมลล์ตรงนี้
$mail->Username = "athitayakamta@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "aommy0032";
//Set who the message is to be sent from
$mail->setFrom('athitayakamta@gmail.com', 'Athitaya');
//สิ้นสุดตรงนี้


//Set who the message is to be sent to
$mail->addAddress($row3['email'],$row3['email']);
//Set the subject line
   //$mail->Subject = 'แจ้งผลการอนุมัติการลา';
$mail->Subject = 'แจ้งผลการลา';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
$mail->msgHTML("อนุมัติการลาเรียบร้อยแล้ว");

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

	}
}
db()->query($s);
echo db()->error;
header('Location:laallow.php');
?> 

