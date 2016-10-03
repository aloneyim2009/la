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

<script type="text/javascript">
$(document).ready(function()
{
//change page
$("#category").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;
$.ajax
({
type: "POST",
url: "../lasummer.php",
data: dataString,
cache: false,
success: function(html)
{
$("#show").html(html);
} 
});

});
});

</script> 
	</head>
    
<body id="page-top" class="index">
	<?php include 'menu.php';?>
<br>
    <br>
<table class="table table-condensed">
	<tr>
		<td>ลำดับ</td>
		<td>ประเภทการลา</td>
		<td>ชื่อ-นามสกุล</td>
		<td>ตั้งแต่วันที่</td>
		<td>ถึงวันที่</td>
		<td>หัวหน้า/รอง ผอ.</td>             
		<td>หัวหน้า สนง.</td>
        <td>ผอ.</td>
        </tr>
<?php
$query = db()->query('SELECT id_detail,id_type,sdate,ndate,comment,id_personal,now_date,status1,status2,status3,file FROM la_detail');
echo db()->error;
$count=1;
while(list($id_detail,$id_type,$sdate,$ndate,$comment,$id_personal,$now_date,$status1,$status2,$status3,$file) = $query->fetch_row())
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
			if($status2==0){
				echo "<font color='red'>ยังไม่อนุมัติ</font>";
			}else{
				echo "<font color='green'>อนุมัติ</font>";
			}
		?></td>
        
		</tr>

		
<?php
}
?>
</table>

</body>
</html>    