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
    
<div class="col-lg-12" style="background-color:#CCFFFF;">

<?php    
$query = db()->query('SELECT id_personal,id_prefix,fname,lname,email,id_position,id_subdepart,id_boss,tel,username,password,id_departmaent,permission,colagela FROM la_personal where id_personal="'.$_GET['idpersonal'].'"');
list($id_personal, $id_prefix, $fname, $lname, $email, $id_position, $id_subdepart, $id_boss, $tel, $username, $password, $id_departmaent, $permission, $colagela) = $query->fetch_row();
?>    

<div class="container">
	<div class="row">
	<form class="form-horizontal" action="editperin.php" method="post">
       
       <div class="form-group">
	<label class="col-sm-3 control-label">คำนำหน้า :</label>
<div class="col-sm-6">
  <select name="idpre" class="form-control" >
 <?php  $query = db()->query('SELECT id_prefix,nameprefix FROM la_prefix');
		echo db()->error;
		while(list($idprefix1,$nameprefix1) = $query->fetch_row())
		{ ?>
  <option value="<?php echo $idprefix1;?>" <?php if($idprefix1==$id_prefix){echo "selected";}?>><?php echo $nameprefix1;?></option>
  <?php }?>
</select>
</div>    
</div>  


	<div class="form-group">
		<label class="col-sm-3 control-label" >ชื่อ: </label>
        
        <div class="col-sm-6">
		  <input type="text" name="fname" class="form-control" value="<?php echo $fname;?>">
		</div>
	</div>
         <div class="form-group">
		<div class="col-sm-3"></div>
        </div>

	
	<div class="form-group">
	<label class="col-sm-3 control-label" >นามสกุล: </label>
        <div class="col-sm-6">
		<input type="text" name="lname" class="form-control" value="<?php echo $lname;?>">
	 </div>
		<div class="col-sm-3"></div>
        </div>
        
        	<div class="form-group">
	<label class="col-sm-3 control-label" >Email: </label>
        <div class="col-sm-6">
		<input type="text" name="email" class="form-control" value="<?php echo $email;?>">
	 </div>
		<div class="col-sm-3"></div>
        </div>
            
         <div class="form-group">
	<label class="col-sm-3 control-label">ตำแหน่ง :</label>
<div class="col-sm-6">
  <select name="id_position" class="form-control" >
 <?php  $query = db()->query('SELECT id_position,nameposition FROM la_position');
		echo db()->error;
		while(list($idposition1,$nameposition1) = $query->fetch_row())
		{ ?>
  <option value="<?php echo $idposition1;?>" <?php if($idposition1==$id_position){echo "selected";}?>><?php echo $nameposition1;?></option>
  <?php }?>
</select>
</div>    
</div>  
    
      <div class="form-group">
	<label class="col-sm-3 control-label">แผนก :</label>
<div class="col-sm-6">
  <select name="id_subdepart" class="form-control" >
 <?php  $query = db()->query('SELECT id_subdepart,namesubdepart FROM la_subdepart');
		echo db()->error;
		while(list($idsubdepart1,$namesubdepart1) = $query->fetch_row())
		{ ?>
  <option value="<?php echo $idsubdepart1;?>" <?php if($idsubdepart1==$id_subdepart){echo "selected";}?>><?php echo $namesubdepart1;?></option>
  <?php }?>
</select>
</div>    
</div> 


    <div class="form-group">
	<label class="col-sm-3 control-label" >ไอดีผู้ใช้: </label>
        <div class="col-sm-6">
		<input type="text" name="username" class="form-control" value="<?php echo $username;?>">
	 </div>
		<div class="col-sm-3"></div>
        </div>
        
    <div class="form-group">
	<label class="col-sm-3 control-label" >รหัสผ่าน: </label>
        <div class="col-sm-6">
		<input type="text" name="password" class="form-control" value="<?php echo $password;?>">
	 </div>
		<div class="col-sm-3"></div>
        </div>    
      
<div class="form-group">
	<label class="col-sm-3 control-label" >เบอร์โทรศัพท์: </label>
        <div class="col-sm-6">
		<input type="text" name="tel" class="form-control" value="<?php echo $tel;?>">
	 </div>
		<div class="col-sm-3"></div>
        </div>  	
        
	
                <div class="form-group">
	<label class="col-sm-3 control-label">สังกัด :</label>
<div class="col-sm-6">
  <select name="id_departmaent" class="form-control" >
 <?php  $query = db()->query('SELECT id_department,namedepartment FROM la_department');
		echo db()->error;
		while(list($iddepartment1,$namedepartment1) = $query->fetch_row())
		{ ?>
  <option value="<?php echo $iddepartment1;?>" <?php if($iddepartment1==$id_departmaent){echo "selected";}?>><?php echo $namedepartment1;?></option>
  <?php }?>
</select>
</div>    
</div>  
            
            
            <div class="form-group">
		<div class="col-sm-3"></div>
        </div>
        
                        <div class="form-group">
	<label class="col-sm-3 control-label">สิทธิ์ผู้ใช้งาน :</label>
<div class="col-sm-6">
  <select name="permission" class="form-control" >
 <?php  $query = db()->query('SELECT * FROM la_permission');
		echo db()->error;
		while(list($id_per,$name_per) = $query->fetch_row())
		{ ?>
  <option value="<?php echo $id_per;?>" <?php if($id_per==$permission){echo "selected";}?>><?php echo $name_per;?></option>
  <?php }?>
</select>
</div>    
</div>  
          
                            <div class="form-group">
	<label class="col-sm-3 control-label">ผู้อนุมัติการลา :</label>
<div class="col-sm-6">
  <select name="laperallow" class="form-control" >
 <?php  $query = db()->query('SELECT id_personal,id_prefix,fname,lname FROM la_personal where permission=2');
		echo db()->error;
		while(list($id_personal,$id_prefix,$fname,$lname) = $query->fetch_row())
		{ 
			$queryp = db()->query('SELECT * from la_prefix where id_prefix="'.$id_prefix.'"');
			echo db()->error;
			$rowp = $queryp->fetch_assoc();
			
			?>
  <option value="<?php echo $id_personal;?>" <?php if($id_personal==$id_boss){echo "selected";}?>><?php echo $rowp['nameprefix'].$fname." ".$lname;?></option>
  <?php }?>
</select>
</div>    
</div>   
            
            <div class="form-group">
		<div class="col-sm-3"></div>
        </div>
        
                                    <div class="form-group">
	<label class="col-sm-3 control-label">จำนวนลาสะสม :</label>
<div class="col-sm-6">
	<input type="text" name="namlatotal" value="<?php echo $colagela;?>">
</div>    
</div>   
            
            <div class="form-group">
		<div class="col-sm-3"></div>
        </div>
        
        
            <div class="form-group">
	<div class="col-sm-5"></div>
	<div class="col-sm-6">
		<input type="hidden" name="idpersonal" value="<?php echo $_GET['idpersonal'];?>">
		<input a class="btn btn-primary" type="submit" value="แก้ไขข้อมูล"></a></div>
	 </div>
            

    
        
        </form>
    </div>
    </div>
        
</div>
</div>
    
    
    </body>
</html>