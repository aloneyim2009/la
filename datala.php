
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
		<label class="col-sm-12 control-label" ><table class="table table-striped" border="1">
  <tr>
  <td> ลาป่วย </td>
  <td> ตั้งแต่วันที่ </td>
  <td> ถึงวันที่ </td>
    <td>ลาป่วย คลอดบุตร ลากิจส่วนตัว </td>
    <td> ตั้งแต่วันที่ </td>
  <td> ถึงวันที่ </td>
      <td> ลาทั้งหมด </td>
         <td> เหลือกี่ครั้ง </td>
    </tr>
   
</div>
</center>
  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</div>
    


<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    
</body>
</html>    
