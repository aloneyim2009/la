
<?php
include 'config.php';
connect_db();

session_start();
if(!isset($_SESSION['login']))
{
  header('Location:index.html');
  die();
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
<title>Ladata</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/freelancer.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
    
<body id="page-top" class="index">
<?php include 'menu.php';?>

      <center> 
       <div class="form-group">
<table class="table table-striped" border="1">
  <tr>
   <th ><center>ลำดับ</center></th>
   <th ><center>ชื่อ-นามสกุล</center></th>
  <th colspan="2"><center>ลาป่วย</center></th>
  <th colspan="2" ><center>ลากิจ</center></th>
  <th colspan="2"><center>ลาคลอด</center></th>
  <th colspan="3"><center>ลาพักผ่อน</center></th>
 </tr>
 <tr>
     <th></th>
       <th></th>
    <th><center>ครั้ง</center></th>
  <th><center>วัน</center></th>
   <th><center>ครั้ง</center></th>
  <th><center>วัน</center></th>
    <th><center>ครั้ง</center></th>
  <th><center>วัน</center></th>
  <th><center>ครั้ง</center></th>
  <th><center>จำนวนวันลา</center></th>
  <th><center>วันลาคงเหลือ</center></th>
 </tr>
 <?php 
 
 $queryp1 = db()->query('SELECT * FROM la_personal');
 $count=1;
 echo db()->error;
 while(list($id_personal,$id_prefix,$username,$password,$fname,$lname,$id_position,$id_subdepart,$id_departmaent,$id_boss,$tel,$permission,$colagela) = $queryp1->fetch_row()){

 	
 $queryq1 = db()->query('SELECT id_type,id_personal,SUM(namla) AS numall_la FROM la_detail where id_personal="'.$id_personal.'" and id_type=1 group by id_personal,id_type');
 echo db()->error;
 $rowq1 = $queryq1->fetch_assoc();
 
 $queryq11 = db()->query('SELECT id_type,id_personal FROM la_detail where id_personal="'.$id_personal.'" and id_type=1');
 echo db()->error;
 
 $queryq2 = db()->query('SELECT id_type,id_personal,SUM(namla) AS numall_la FROM la_detail where id_personal="'.$id_personal.'" and id_type=2 group by id_personal,id_type');
 echo db()->error;
 $rowq2 = $queryq2->fetch_assoc();
 
 $queryq12 = db()->query('SELECT id_type,id_personal FROM la_detail where id_personal="'.$id_personal.'" and id_type=2');
 
 $queryq3 = db()->query('SELECT id_type,id_personal,SUM(namla) AS numall_la FROM la_detail where id_personal="'.$id_personal.'" and id_type=3 group by id_personal,id_type');
 echo db()->error;
 $rowq3 = $queryq3->fetch_assoc();
 
 $queryq13 = db()->query('SELECT id_type,id_personal FROM la_detail where id_personal="'.$id_personal.'" and id_type=3');
 
 $queryq4 = db()->query('SELECT id_type,id_personal,SUM(namla) AS numall_la FROM la_detail where id_personal="'.$id_personal.'" and id_type=4 group by id_personal,id_type');
 echo db()->error;
 $rowq4 = $queryq4->fetch_assoc();
 
 $queryq14 = db()->query('SELECT id_type,id_personal FROM la_detail where id_personal="'.$id_personal.'" and id_type=4');
 
 ?>
       <tr>
        <td><?php echo $count++;?></td>
    <td><?php 
    $querypre1 = db()->query('SELECT * from la_prefix where id_prefix="'.$id_prefix.'"');
    echo db()->error;
    $rowpre1 = $querypre1->fetch_assoc();
    echo $rowpre1['nameprefix'].$fname." ".$lname;
  ?></td>
  <td><?php echo  $queryq12->num_rows;?></td>
  <td><?php 
  if(isset($rowq2['numall_la'])){
  	echo $rowq2['numall_la'];
  }else{
  	echo 0;
  }
  ?></td>
  <td><?php echo  $queryq13->num_rows;?></td>
  <td><?php 
if(isset($rowq3['numall_la'])){
  	echo $rowq3['numall_la'];
  }else{
  	echo 0;
  }
  ?></td>
    <td><?php echo  $queryq14->num_rows;?></td>
  <td><?php 
if(isset($rowq4['numall_la'])){
  	echo $rowq4['numall_la'];
  }else{
  	echo 0;
  }
  ?></td>
    <td><?php echo  $queryq11->num_rows;?></td>
  <td><center><?php 
if(isset($rowq1['numall_la'])){
  	echo $rowq1['numall_la'];
  }else{
  	echo 0;
  }
  ?></center></td>
  <td><center>
   <?php 
   $queryq5 = db()->query('SELECT * FROM la_personal where id_personal="'.$id_personal.'"');
   echo db()->error;
   $rowq5 = $queryq5->fetch_assoc();

   echo (10+$rowq5['colagela'])-$rowq1['numall_la'];

   ?>
  </center></td>
    </tr>
  <?php }?>
</div>
</center>
  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</div>
    


<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    
</body>
</html>    
