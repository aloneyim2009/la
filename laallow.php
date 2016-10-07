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
<title>Add</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/freelancer.css" rel="stylesheet">
    <link href="css/font.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


	</head>
    
<body id="page-top" class="index">
	<?php include 'menu.php';?>
<br>
    <br>
<table class="table table-condensed">
	<tr>
		<td>ลำดับ</td>
		<td>ประเภทการลา</td>
		<td>สาเหตุ</td>
		<td>ชื่อ-นามสกุล</td>
		<td>ตั้งแต่วันที่</td>
		<td>ถึงวันที่</td>
		<td>หัวหน้า/รอง ผอ.</td>             
		<td>หัวหน้า สนง.</td>
        <td>ผอ.</td>
        <td>แสดงใบลา</td>
		<td>แนบไฟล์</td>
        <td>สถานะการอนุมัติ</td>
	</tr>
<?php
if($_SESSION['permiss']==3 or $_SESSION['permiss']==4){
	$query = db()->query('SELECT id_detail,id_type,sdate,ndate,comment,id_personal,now_date,status1,status2,status3,file,id_boss FROM la_detail');
}else{
	$query = db()->query('SELECT id_detail,id_type,sdate,ndate,comment,id_personal,now_date,status1,status2,status3,file,id_boss FROM la_detail where id_boss="'.$_SESSION['idboss'].'"');
}
echo db()->error;
$count=1;
while(list($id_detail,$id_type,$sdate,$ndate,$comment,$id_personal,$now_date,$status1,$status2,$status3,$file,$id_boss) = $query->fetch_row())
{
?>

<tr>
		<td><?php echo $count++;?></td>
		<td><?php 
		$query1 = db()->query('SELECT * from la_type where id_type="'.$id_type.'"');
		echo db()->error;
		$row = $query1->fetch_assoc();
		echo $row['nametype'];
		?></td>
		<td><?php echo $comment;?></td>
		<td><?php 
		$query2 = db()->query('SELECT * from la_personal where id_personal="'.$id_personal.'"');
		echo db()->error;
		$row2 = $query2->fetch_assoc();
		$query3 = db()->query('SELECT * from la_prefix where id_prefix="'.$row2['id_prefix'].'"');
		echo db()->error;
		$row3 = $query3->fetch_assoc();
		echo $row3['nameprefix'].$row2['fname']." ".$row2['lname'];
		?></td>
		<td><?php echo $sdate;?></td>
		<td><?php echo $ndate;?></td>
        <td>  <?php 
			if($status1==0){
				echo "<font color='red'>ยังไม่อนุมัติ</font>";
			}else{
				echo "<font color='green'>อนุมัติ</font>";
			}
		?></td>
        <td><?php 
			if($status2==0){
				echo "<font color='red'>ยังไม่อนุมัติ</font>";
			}else{
				echo "<font color='green'>อนุมัติ</font>";
			}
		?></td>
        <td><?php 
			if($status3==0){
				echo "<font color='red'>ยังไม่อนุมัติ</font>";
			}else{
				echo "<font color='green'>อนุมัติ</font>";
			}
		?></td>
         <td>
         <?php 
			if($id_type==1){
			?>	 <a href="from1.php?id_detail=<?php echo $id_detail;?>">คลิ๊ก</a>
			<?php }else{?>
				<a href="from2.php?id_detail=<?php echo $id_detail;?>">คลิ๊ก</a>
			<?php }
		?>
        </td>
        <td><a href="./uploads/<?php echo $file?>" target="_blank">ไฟล์แนบ</a></td>     
		<td>  <?php 
		$query2 = db()->query('SELECT * from la_personal where id_personal="'.$_SESSION['iduser'].'"');
		echo db()->error;
		$row2 = $query2->fetch_assoc();
		
		if($row2['permission']==2){
			if($status1==1){
			?>	 <center><a href="upstallow.php?id_detail=<?php echo $id_detail;?>"><img src="../la/img/correct.png" alt="อนุญาติ" height="22" width="25"></center></a>
			<?php }else{?>
				<center><a href="upstallow.php?id_detail=<?php echo $id_detail;?>"><img src="../la/img/wrong.png" alt="ไม่อนุญาติ" height="22" width="25"></center></a>
			<?php }
		}
		if($row2['permission']==3){
			if($status2==1){
			?>	 <center><a href="upstallow.php?id_detail=<?php echo $id_detail;?>"><img src="../la/img/correct.png" alt="อนุญาติ" height="22" width="25"></center></a>
			<?php }else{?>
				<center><a href="upstallow.php?id_detail=<?php echo $id_detail;?>"><img src="../la/img/wrong.png" alt="ไม่อนุญาติ" height="22" width="25"></center></a>
			<?php }
		}
		if($row2['permission']==4){
			if($status3==1){
				?>	 <center><a href="upstallow.php?id_detail=<?php echo $id_detail;?>"><img src="../la/img/correct.png" alt="อนุญาติ" height="22" width="25"></center></a>
					<?php }else{?>
						<center><a href="upstallow.php?id_detail=<?php echo $id_detail;?>"><img src="../la/img/wrong.png" alt="ไม่อนุญาติ" height="22" width="25"></center></a>
					<?php }
		}

		?></td>
		</tr>

		
<?php
}
?>
</table>

</body>
</html>    