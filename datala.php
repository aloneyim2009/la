
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
	<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
	<div class="navbar-header page-scroll">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="page2.php">ระบบการลาของบุคลากร</a>
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav navbar-right">
	<li class="hidden">
<a href="#page-top"></a></li>
	<li class="page-scroll"><a href="information.php">ข้อมูลส่วนตัว</a></li>
	<li class="page-scroll"><a href="logout.php">ออกจากระบบ</a></li></ul></div></div></nav>
    
    
     <div class="col-lg-12" style="background-color:#00FFCC;">
<br><br><br><br><br><br>
         
<center><h2>เอกสารการลาของบุคลากร</h2></center><br>         
<center><p><button type="button" class="btn btn-warning btn-lg"><a href="page2.php"></href>หน้าหลัก</button> 
<button type="button" class="btn btn-primary btn-lg"><a href="add.php"></href>เพิ่มข้อมูลการลา</button>
</a></p></center>
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
