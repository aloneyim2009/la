<?php
session_start();
include 'config.php';
connect_db();

$username=$_POST['username'];
$password=$_POST['password'];

$query=db()->query('SELECT id_personal,id_subdepart,permission,id_boss
FROM la_personal WHERE username = "'. $username .'" AND
password ="'. $password .'" LIMIT 1');

$row = $query->fetch_assoc();
echo db()->error;

if($query->num_rows>0)
{
    //ผ่าน
    $_SESSION['login']=true;
    $_SESSION['iduser']=$row['id_personal'];
    $_SESSION['idsubdepart']=$row['id_subdepart'];
    $_SESSION['permiss']=$row['permission'];
    $_SESSION['idboss']=$row['id_boss'];
    header('Location:page2.php');
    die();
}
else
{
  //ไม่ผ่าน   //ไม่ผ่าน 

  header('Location:index.html');
  die();
}
?>