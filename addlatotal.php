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
    <form class="form-horizontal" action="insertlacolage.php" method="post">
<table class="table table-condensed">
	<tr>
		<td>ลำดับ</td>
		<td>ชื่อนามสกุล</td>
        <td>จำนวนวันลาสะสม</td>
	</tr>
<?php
$query = db()->query('SELECT id_personal,id_prefix,fname,lname,colagela FROM la_personal');
echo db()->error;
$count=1;
while(list($id_personal, $id_prefix, $fname, $lname, $colagela) = $query->fetch_row())
{
?>
<tr>
		<td><?php echo $count++;?></td>
		<td><?php 
		$query1 = db()->query('SELECT * from la_prefix where id_prefix="'.$id_prefix.'"');
		echo db()->error;
		$row = $query1->fetch_assoc();
		echo $row['nameprefix'].$fname." ".$lname;
		?></td>
		<td>
		<input type="hidden" name="idpersonal[]" value="<?php echo $id_personal;?>">
		<input type="text" name="namlatotal[]" value="<?php echo $colagela;?>">
		</td>
		</tr>

		
<?php
}
?>
</table>
            <div class="form-group">
	<div class="col-sm-5"></div>
	<div class="col-sm-6">
<input a class="btn btn-primary" type="submit" value="บันทึกข้อมูล"></a></div>
</div>
</form>
</body>
</html>    