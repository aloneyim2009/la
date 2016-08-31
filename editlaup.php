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
         $name = $_POST['namefile'];
         $result = move_uploaded_file($_FILES['filepdf']['tmp_name'], FILEREPOSITORY.$name);
         if ($result == 1) echo "<p>File successfully uploaded.</p>";
         else echo "<p>There was a problem uploading the file.</p>";
      } #endIF
   } #endIF
   else{
   		$name=$_POST['namefile'];
   }
   
   $datetime1 =new DateTime($_POST['ndate']);
$datetime2 =new DateTime($_POST['sdate']);
$interval = $datetime1->diff($datetime2);
$caldate=$interval->format('%a');
 $dateData=date("Y-m-d"); // วันเวลาขณะนั้น  

$id_type= $_POST['category'];
$sdate= $_POST['sdate'];
$ndate= $_POST['ndate'];
$comment= $_POST['Cause'];
$perdutytan=$_POST['dutytan'];
$now_date= $dateData;
$status1= 0;
$status2= 0;
$status3= 0;
$file= $name;
$namla=$caldate+1;
$id_detail= $_POST['detail_id'];

$s = sprintf('UPDATE la_detail SET id_type="%s",sdate="%s",
ndate="%s",comment="%s",id_personal_tan="%s",now_date="%s",status1="%s",status2="%s",status3="%s",file="%s",namla="%s" WHERE id_detail ="%s"'
,$id_type,$sdate,$ndate,$comment,$perdutytan,$now_date,$status1,$status2,$status3,$file,$namla,$id_detail);

db()->query($s);
echo db()->error;
header('Location:add.php');
?> 

