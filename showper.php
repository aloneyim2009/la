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


<table class="table table-condensed">
	<tr>
		<td>ลำดับ</td>
		<td>ชื่อ</td>
		<td>นามสกุล</td>
		<td>รหัสผู้ใช้งาน</td>
		<td>รหัสผ่าน</td>             
		<td>ตำแหน่ง</td>
        <td>แผนก</td>
        <td>เบอร์โทร</td>
		<td>สังกัด</td>
		<td>ผู้อนุมัติการลา</td>
		<td>สิทธิ์</td>
        <td>แก้ไข</td>
        <td>ลบ</td>
	</tr>
<?php
$query = db()->query('SELECT * FROM la_personal');
$count=1;
echo db()->error;
while(list($id_personal,$id_prefix,$username,$password,$fname,$lname,$id_position,$id_subdepart,$id_departmaent,$id_boss,$tel,$permission) = $query->fetch_row()){
?>

<tr>
		<td><?php echo $count++;?></td>
		<td><?php 
		$query1 = db()->query('SELECT * from la_prefix where id_prefix="'.$id_prefix.'"');
		echo db()->error;
		$row1 = $query1->fetch_assoc();
		echo $row1['nameprefix'].$fname;
		?></td>
		<td><?php echo $lname;;?></td>
		<td><?php echo $username;?></td>
   	 <td><?php echo $password;?></td>
        <td><?php 
			$query2 = db()->query('SELECT * from la_position where id_position="'.$id_position.'"');
		echo db()->error;
		$row2 = $query2->fetch_assoc();
		echo $row2['nameposition'];
		?></td>
        <td><?php 
			$query3 = db()->query('SELECT * from la_subdepart where id_subdepart="'.$id_subdepart.'"');
		echo db()->error;
		$row3 = $query3->fetch_assoc();
		echo $row3['namesubdepart'];
		?></td>
        <td><?php echo $tel;?></td>
         <td><?php 
			$query4 = db()->query('SELECT * from la_department where id_department="'.$id_departmaent.'"');
		echo db()->error;
		$row4 = $query4->fetch_assoc();
		echo $row4['namedepartment'];
		?></td>
		 <td><?php 
		$query7 = db()->query('SELECT id_personal,id_prefix,fname,lname FROM la_personal where id_personal="'.$id_boss.'"');
		echo db()->error;
		$row7 = $query7->fetch_assoc(); 
			$queryp = db()->query('SELECT * from la_prefix where id_prefix="'.$row7['id_prefix'].'"');
			echo db()->error;
			$rowp = $queryp->fetch_assoc();
			echo $rowp['nameprefix'].$row7['fname']." ".$row7['lname'];
		?>
		</td>
		
       <td><?php 
			$query5 = db()->query('SELECT * from la_permission where id_per="'.$permission.'"');
		echo db()->error;
		$row5 = $query5->fetch_assoc();
		echo $row5['name_per'];
		?></td> 
		<td><a href="editper.php?idpersonal=<?php echo $id_personal;?>">แก้ไข</a></td>
		<td><a href="deleteper.php?idpersonal=<?php echo $id_personal;?>">ลบ</a></td>
		</tr>

		
<?php
}
?>
</table>

</body>
</html>    