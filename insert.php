<?php
include 'config.php'; 
session_start();
if(!isset($_SESSION['login']))
{
  header('Location:index.html');
  die();
}
connect_db();

define ("FILEREPOSITORY","./uploads/");      
if (is_uploaded_file($_FILES['filepdf']['tmp_name'])) {

      if ($_FILES['filepdf']['type'] != "application/pdf") {
         echo "<p>Class notes must be uploaded in PDF format.</p>";
      } else {
         $name = $_SESSION['iduser']."_".rand(10,100)."_".date('Y-m-d').".pdf";
         $result = move_uploaded_file($_FILES['filepdf']['tmp_name'], FILEREPOSITORY.$name);
         if ($result == 1) echo "<p>File successfully uploaded.</p>";
         else echo "<p>There was a problem uploading the file.</p>";
      } #endIF
   } #endIF
$datetime1 =new DateTime($_POST['ndate']);
$datetime2 =new DateTime($_POST['sdate']);
$interval = $datetime1->diff($datetime2);
$caldate=$interval->format('%a');

$dateData=date("Y-m-d"); // วันเวลาขณะนั้น  
		
$id_type= $_POST['category'];
$sdate= $_POST['sdate'];
$ndate= $_POST['ndate'];
$comment= $_POST['Cause'];
$id_personal= $_SESSION['iduser'];
$perdutytan=$_POST['dutytan'];
$now_date= $dateData;
$status1= 0;
$status2= 0;
$status3= 0;
$file= $name;
$idboss= $_POST['idboss'];
$namla=$caldate+1;

$s = sprintf("INSERT INTO la_detail (id_type,sdate,ndate,comment,id_personal,id_personal_tan,now_date,status1,status2,status3,file,namla,id_boss) VALUES('".$id_type."','".$sdate."','".$ndate."','".$comment."','".$id_personal."','".$perdutytan."','".$now_date."','".$status1."','".$status2."','".$status3."','".$file."','".$namla."','".$idboss."')");
db()->query($s);
echo db()->error;
header('Location:add.php');
?> 