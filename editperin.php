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
$id_permission= $_POST['permission'];
$id_boss= $_POST['laperallow'];
$namlatotal= $_POST['namlatotal'];
$id_personal= $_POST['idpersonal'];

$s = sprintf('UPDATE la_personal SET id_prefix="%s",fname="%s",lname="%s",email="%s",username="%s",password="%s",id_boss="%s",tel="%s",id_position="%s",id_subdepart="%s",id_departmaent="%s",permission="%s",colagela="%s" WHERE id_personal ="%s"',$id_prefix,$fname,$lname,$email,$username,$password,$id_boss,$tel,$id_position,$id_subdepart,$id_departmaent,$id_permission,$namlatotal,$id_personal);
db()->query($s);
echo db()->error;
header('Location:showper.php');
?> 



