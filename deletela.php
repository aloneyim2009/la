<?php
include 'config.php'; 
session_start();
if(!isset($_SESSION['login']))
{
  header('Location:index.html');
  die();
}
connect_db();
$id_detail= $_GET['id_detail'];



$s = sprintf("DELETE FROM la_detail WHERE id_detail ='".$id_detail."'");

db()->query($s);


$queryfile = db()->query('SELECT id_detail,id_type,sdate,ndate,comment,id_personal,now_date,status1,status2,status3,file FROM la_detail where id_detail="'.$id_detail.'"');
while(list($id_detail,$id_type,$sdate,$ndate,$comment,$id_personal,$now_date,$status1,$status2,$status3,$file) = $queryfile->fetch_row())
{
	define ("FILEREPOSITORY","./uploads/");
	$filepdf = FILEREPOSITORY.$file;
	unlink($filepdf);
}
echo db()->error;
header('Location:add.php');
?> 
