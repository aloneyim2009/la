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
<div class="container">
	<div class="row">
	<form class="form-horizontal" action="insert.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
	<label class="col-sm-2 control-label">ประเภทการลา :</label>
<div class="col-sm-10">
  <select name="category" id="category" class="form-control" >
    <option>กรุณาเลือกประเภทการลา</option>
 <?php  $query = db()->query('SELECT id_type,nametype FROM la_type');
		echo db()->error;
		while(list($id_type,$nametype) = $query->fetch_row())
		{ ?>
  <option value="<?php echo $id_type;?>"><?php echo $nametype;?></option>
  <?php }?>
</select>
</div>    
</div>  
    <div class="form-group">    
    <label class="col-sm-2 control-label" >สาเหตุการลา:</label>
    <div class="col-sm-10">
    <input type="text" name="Cause" class="form-control" placeholder="*ใส่ในกรณีที่ลาป่วย ลากิจ ลาคลอดบุตร เท่านั้น"> 
        </div>    
        </div>
     <div class="form-group">
	<label class="col-sm-2 control-label">ผู้ปฏิบัติหน้าที่แทน :</label>
<div class="col-sm-10">
  <select name="dutytan" class="form-control" >
    <option>กรุณาเลือกผู้ปฏิบัติหน้าที่แทน</option>
 <?php  $query = db()->query('SELECT id_personal,id_prefix,fname,lname FROM la_personal Where id_subdepart="'.$_SESSION['idsubdepart'].'" and id_personal<>"'.$_SESSION['iduser'].'"');
		echo db()->error;
		while(list($id_personal,$id_prefix,$fname,$lname) = $query->fetch_row())
		{ 
		$query1 = db()->query('SELECT * from la_prefix where id_prefix="'.$id_prefix.'"');
		$row = $query1->fetch_assoc();
			?>		
  <option value="<?php echo $id_personal;?>"><?php echo $row['nameprefix'].$fname." ".$lname;?></option>
  <?php }?>
</select>
</div>    
</div>  
        
	<div class="form-group">
		<label class="col-sm-2 control-label" >ตั้งแต่วันที่:</label>
		<div class="col-sm-4">
			<input type="date" name="sdate" class="form-control"placeholder="*กรุณาใส่วันที่">
		</div>
		<label class="col-sm-1 control-label" >ถึงวันที่:</label>
		<div class="col-sm-5">
			<input type="date" name="ndate" class="form-control"placeholder="*กรุณาใส่วันที่">
		</div>
        </div>


 <div class="form-group">    
    <label class="col-sm-2 control-label" >อัพโหลดใบรับรองแพทย์:</label>
    <div class="col-sm-10">
    <input name="filepdf" type="file" />
  <img src="images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
 <div id="output"></div>
        </div>    
        </div>


    
	  
	 <div class="form-group">
	<div class="col-sm-5"></div>
	<div class="col-sm-6">
	<?php 
	$query=db()->query('SELECT id_boss FROM la_personal WHERE id_personal = "'.$_SESSION['iduser'].'"');
	echo db()->error;
	$row = $query->fetch_assoc();
	?>
	 <input type="hidden" name="idboss" value="<?php echo $row['id_boss'];?>">
	 <input a class="btn btn-primary" type="submit" value="บันทึกข้อมูล"></a></div>
	 </div>
	
</form>

<table class="table table-condensed">
	<tr>
		<td>ลำดับ</td>
		<td>ประเภทการลา</td>
		<td>ตั้งแต่วันที่</td>
		<td>ถึงวันที่</td>
		<td>หัวหน้า/รอง ผอ.</td>             
		<td>หัวหน้า สนง.</td>
        <td>ผอ.</td>
        <td>แสดงใบลา</td>
		<td>แนบไฟล์</td>
        <td>แก้ไข</td>
        <td>ลบ</td>
	</tr>
<?php
$query = db()->query('SELECT id_detail,id_type,sdate,ndate,comment,id_personal,now_date,status1,status2,status3,file FROM la_detail where id_personal="'.$_SESSION['iduser'].'"');
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
		<td><?php echo $sdate;?></td>
		<td><?php echo $ndate;?></td>
    <td>  <?php 
			if($status1==0){
				echo "ยังไม่อนุมัติ";
			}else{
				echo "อนุมัติ";
			}
		?></td>
        <td><?php 
			if($status2==0){
				echo "ยังไม่อนุมัติ";
			}else{
				echo "อนุมัติ";
			}
		?></td>
        <td><?php 
			if($status2==0){
				echo "ยังไม่อนุมัติ";
			}else{
				echo "อนุมัติ";
			}
		?></td>
         <td>
         <?php 
			if($id_type==1){
			?>	 <a href="from1pdf.php?id_detail=<?php echo $id_detail;?>" target="_blank">CLICK</a>
			<?php }else{?>
				<a href="from2pdf.php?id_detail=<?php echo $id_detail;?>" target="_blank">CLICK</a>
			<?php }
		?>
        </td>
        <td><a href="./uploads/<?php echo $file?>" target="_blank">ไฟล์แนบ</a></td>     
		<td><a href="editla.php?id_detail=<?php echo $id_detail;?>">แก้ไข</a></td>
		<td><a href="deletela.php?id_detail=<?php echo $id_detail;?>">ลบ</a></td>
		</tr>

		
<?php
}
?>
</table>

</body>
</html>    