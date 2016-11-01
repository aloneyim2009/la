<?php
include 'config.php'; 
connect_db();

$id_prefix= $_POST['idpre'];
$fname= $_POST['fname'];
$lname= $_POST['lname'];
$email= $_POST['email'];
$username= $_POST['username'];
$password= $_POST['password'];
$tel= $_POST['tel'];
$id_position= $_POST['id_position'];
$id_subdepart= $_POST['id_subdepart'];
$id_departmaent= $_POST['id_departmaent'];
$id_boss= $_POST['laperallow'];
$permission=$_POST['permission'];
$colagela=0;


$s = sprintf("INSERT INTO la_personal (id_prefix,username,password,fname,lname,email,id_position,id_subdepart,id_departmaent,id_boss,tel,permission,colagela) VALUES('".$id_prefix."','".$username."','".$password."','".$fname."','".$lname."','".$email."','".$id_position."','".$id_subdepart."','".$id_departmaent."','".$id_boss."','".$tel."','".$permission."','".$$colagela."')");
db()->query($s);

echo db()->error;
header('Location:showper.php');
?> 