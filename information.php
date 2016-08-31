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
<title>La_Personal</title>
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
<a class="navbar-brand" href="#portfolio">ข้อมูลบุคลากร</a>
        
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav navbar-right">
	<li class="hidden">
<a href="#page-top"></a></li>
    <li class="page-scroll"><a href="edit.php">แก้ไขข้อมูลส่วนตัว</a></li>
	<li class="page-scroll"><a href="logout.php">ออกจากระบบ</a></li></ul></div></div></nav>
    
<div class="col-lg-12" style="background-color:#CCFFFF;">
<br><br><br><br><br><br>

<center><p><button type="button" class="btn btn-warning btn-lg"><a href="page2.php"></href>หน้าหลัก</button> 
<button type="button" class="btn btn-primarys btn-lg"><a href="add.php"></href>เพิ่มข้อมูลการลา</button>
<button type="button" class="btn btn-danger btn-lg"><a href="datala.php"></href>เรียกดูข้อมูลการลา</button></a></p></center>
<h1><center>ข้อมูลส่วนตัว</center></h1>
<br><br>

    <?php
$query = db()->query('SELECT id_personal,id_prefix,fname,lname,id_position,id_subdepart,id_departmaent,tel,username,password FROM la_personal where id_personal="'.$_SESSION['iduser'].'"');
echo db()->error;

while(list($id_personal,$id_prefix,$fname,$lname,$id_position,$id_subdepart,$id_departmaent,$tel,$username,$password) = $query->fetch_row())
{
?>
    
<tr>
		<center><h2><td><?php 
$query = db()->query('SELECT * from la_prefix where id_prefix="'.$id_prefix.'"');
echo db()->error;
$row = $query->fetch_assoc();
  echo $row ['nameprefix'];?>
    </td>
		<td><?php echo $fname;?></td>&nbsp;
        <td><?php echo $lname;?></td>&nbsp;</h2></center>
   
<center><h3>ตำแหน่ง:
    <td><?php 
$query = db()->query('SELECT * from la_position where id_position="'.$id_position.'"');
echo db()->error;
$row = $query->fetch_assoc();
  echo $row ['nameposition'];?>
    </td>&nbsp;&nbsp;
    
แผนก:         
     <td><?php 
$query = db()->query('SELECT * from subdepart where id_subdepart="'.$id_subdepart.'"');
echo db()->error;
$row = $query->fetch_assoc();
  echo $row ['namesubdepart'];?>
    </td>&nbsp;&nbsp;

สังกัด:    
    <td><?php 
$query = db()->query('SELECT * from la_department where id_department="'.$id_departmaent.'"');
echo db()->error;
$row = $query->fetch_assoc();
  echo $row ['namedepartment'];?>
    </td></center></h3>

<center><h3>เบอร์โทร:    
    <td><?php 
$query = db()->query('SELECT * from la_personal where tel="'.$tel.'"');
echo db()->error;
$row = $query->fetch_assoc();
  echo $row ['tel'];?>
    </td>&nbsp;
    
ไอดีล็อกอิน:    
     <td><?php 
$query = db()->query('SELECT * from la_personal where username	="'.$username.'"');
echo db()->error;
$row = $query->fetch_assoc();
  echo $row ['username'];?>
    </td>&nbsp;

พาสเวิร์ด:    
       <td><?php 
$query = db()->query('SELECT * from la_personal where password	="'.$password.'"');
echo db()->error;
$row = $query->fetch_assoc();
  echo $row ['password'];?>
    </td></h3></center>
    
    
		</tr>
       
		
    
<?php
    
}
?>

</div>
</div>
    </body>
</html>