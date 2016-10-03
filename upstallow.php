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

$s = sprintf('UPDATE la_detail SET status1="%s" WHERE id_detail ="%s"'
,$status1,$iddetail);
db()->query($s);
echo db()->error;
header('Location:laallow.php');
?> 

