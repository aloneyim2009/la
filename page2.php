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
    
    </body>
</html>