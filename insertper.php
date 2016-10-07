<?php
include 'config.php'; 
connect_db();

$id_prefix= $_POST['idpre'];
$fname= $_POST['fname'];
$lname= $_POST['lname'];
$username= $_POST['username'];
$password= $_POST['password'];
$tel= $_POST['tel'];
$id_position= $_POST['id_position'];
$id_subdepart= $_POST['id_subdepart'];
$id_departmaent= $_POST['id_departmaent'];
$id_boss= $_POST['laperallow'];
$permission=$_POST['permission'];


$s = sprintf("INSERT INTO la_personal (id_prefix,username,password,fname,lname,id_position,id_subdepart,id_departmaent,id_boss,tel,permission) VALUES('".$id_prefix."','".$username."','".$password."','".$fname."','".$lname."','".$id_position."','".$id_subdepart."','".$id_departmaent."','".$id_boss."','".$tel."','".$permission."')");
db()->query($s);
echo db()->error;
header('Location:showper.php');
?> 