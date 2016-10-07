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
}


db()->query($s);
echo db()->error;
header('Location:laallow.php');
?> 

