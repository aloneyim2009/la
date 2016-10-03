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

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>สรุปการลาของบุคลากร</title>
</head>

<body>
<?php 
	$query = db()->query('SELECT id_personal,id_prefix,fname,lname FROM la_personal');
	echo db()->error;
	$count=1;
?>
<table width="2067" height="389" border="1">
 <center> <tr>
    <td width="84" rowspan="2">ลำดับ</td>
    <td width="257" rowspan="2">ชื่อ - นามสกุล</td>
    <td colspan="4">ลาป่วย (วันทำการ)</td>
    <td colspan="4">ลาพักผ่อน </td>
    <td colspan="4">ลากิจ (วันทำการ)</td>
    <td colspan="4">ลาคลอดบุตร </td>
     <td colspan="1" rowspan="2">รวม </td>
    <td>&nbsp;</td>
    </tr>
  </center>
  <center><tr>
    <td width="84">ตั้งแต่วันที่</td>
    <td width="84">ถึงวันที่</td>
    <td width="84">จำนวนครั้ง</td>
    <td width="84">จำนวนวัน</td>
    <td width="84">ตั้งแต่วันที่</td>
    <td width="84">ถึงวันที่</td>
    <td width="84">จำนวนครั้ง</td>
    <td width="84">จำนวนวัน</td>
    <td width="84">ตั้งแต่วันที่</td>
    <td width="84">ถึงวันที่</td>
    <td width="84">จำนวนครั้ง</td>
    <td width="84">จำนวนวัน</td>
    <td width="84">ตั้งแต่วันที่</td>
    <td width="84">ถึงวันที่</td>
    <td width="84">จำนวนครั้ง</td>
    <td width="84">จำนวนวัน</td>
    <td width="84">&nbsp;</td>
    <td width="99">&nbsp;</td>
    </tr>
  </center>
  <?php 
    while($row = $query->fetch_assoc())
    {
    
	    $query1 = db()->query('SELECT * from la_prefix where id_prefix="'.$row['id_prefix'].'"');
	    $row1 = $query1->fetch_assoc();
	    $row2 = $query1->fetch_assoc();
  
  ?>
  
 
  <tr> 
    <td><?php echo $count++;?></td>
  <td> <?php 
  echo $row1 ['nameprefix'];?>
   		<?php echo $row['fname'];?>&nbsp;
        <?php echo $row['lname'];?>
         </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php 
    }
    ?>
</table>
</body>
</html>