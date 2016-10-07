<?php
include 'config.php'; 
session_start();
if(!isset($_SESSION['login']))
{
  header('Location:index.html');
  die();
}
connect_db();
$id_personal= $_GET['idpersonal'];



$s = sprintf("DELETE FROM la_personal WHERE id_personal ='".$id_personal."'");
db()->query($s);

echo db()->error;
header('Location:showper.php');
?> 
