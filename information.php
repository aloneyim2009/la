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
	<?php include 'menu.php';?>

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
$query = db()->query('SELECT * from la_subdepart where id_subdepart="'.$id_subdepart.'"');
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
  echo $tel;?>
    </td>&nbsp;
    
ไอดีล็อกอิน:    
     <td><?php 
  echo $username;?>
    </td>&nbsp;

พาสเวิร์ด:    
       <td><?php 
  echo $password;?>
    </td></h3></center>
    
    
		</tr>
       
		
    
<?php
    
}
?>

</div>
</div>
    </body>
</html>