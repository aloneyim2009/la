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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แบบฟรอมใบลาพักผ่อน</title>   

</head>

<body>

<?php  
$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");     
$thai_month_arr=array(     
    "0"=>"",     
    "1"=>"มกราคม",     
    "2"=>"กุมภาพันธ์",     
    "3"=>"มีนาคม",     
    "4"=>"เมษายน",     
    "5"=>"พฤษภาคม",     
    "6"=>"มิถุนายน",      
    "7"=>"กรกฎาคม",     
    "8"=>"สิงหาคม",     
    "9"=>"กันยายน",     
    "10"=>"ตุลาคม",     
    "11"=>"พฤศจิกายน",     
    "12"=>"ธันวาคม"                       
);     
$thai_month_arr_short=array(     
    "0"=>"",     
    "1"=>"ม.ค.",     
    "2"=>"ก.พ.",     
    "3"=>"มี.ค.",     
    "4"=>"เม.ย.",     
    "5"=>"พ.ค.",     
    "6"=>"มิ.ย.",      
    "7"=>"ก.ค.",     
    "8"=>"ส.ค.",     
    "9"=>"ก.ย.",     
    "10"=>"ต.ค.",     
    "11"=>"พ.ย.",     
    "12"=>"ธ.ค."                       
);     
function thai_date_and_time($time){   // 19 ธันวาคม 2556 เวลา 10:10:43  
    global $thai_day_arr,$thai_month_arr;     
    $thai_date_return.=date("j",$time);     
    $thai_date_return.=" ".$thai_month_arr[date("n",$time)];     
    $thai_date_return.= " ".(date("Y",$time)+543);     
    $thai_date_return.= " เวลา ".date("H:i:s",$time);  
    return $thai_date_return;     
}   
function thai_date_and_time_short($time){   // 19  ธ.ค. 2556 10:10:4  
    global $thai_day_arr,$thai_month_arr_short;     
    $thai_date_return.=date("j",$time);     
    $thai_date_return.="&nbsp;&nbsp;".$thai_month_arr_short[date("n",$time)];     
    $thai_date_return.= " ".(date("Y",$time)+543);     
    $thai_date_return.= " ".date("H:i:s",$time);  
    return $thai_date_return;     
}   
function thai_date_short($time){   // 19  ธ.ค. 2556  
    global $thai_day_arr,$thai_month_arr_short;     
    $thai_date_return.=date("j",$time);     
    $thai_date_return.="&nbsp;&nbsp;".$thai_month_arr_short[date("n",$time)];     
    $thai_date_return.= " ".(date("Y",$time)+543);     
    return $thai_date_return;     
}   
function thai_date_fullmonth($time){   // 19 ธันวาคม 2556  
    global $thai_day_arr,$thai_month_arr;     
    $thai_date_return.=date("j",$time);     
    $thai_date_return.=" ".$thai_month_arr[date("n",$time)];     
    $thai_date_return.= " ".(date("Y",$time)+543);     
    return $thai_date_return;     
}   
function thai_date_short_number($time){   // 19-12-56  
    global $thai_day_arr,$thai_month_arr;     
    $thai_date_return.=date("d",$time);     
    $thai_date_return.="-".date("m",$time);     
    $thai_date_return.= "-".substr((date("Y",$time)+543),-2);     
    return $thai_date_return;     
}   
?>  

 <?php
 $queryq1 = db()->query('SELECT * from la_detail where id_detail="'.$_GET['id_detail'].'"');
		echo db()->error;
		$rowq1 = $queryq1->fetch_assoc();
 
$queryq2 = db()->query('SELECT id_personal,id_prefix,fname,lname,id_position,id_subdepart,id_departmaent,tel,username,password FROM la_personal where id_personal="'.$rowq1['id_personal'].'"');
echo db()->error;

while(list($id_personal,$id_prefix,$fname,$lname,$id_position,$id_subdepart,$id_departmaent,$tel,$username,$password) = $queryq2->fetch_row())
{
?>    
  
<table width="947" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td align="center"><strong>แบบใบลาพักผ่อน</strong></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td width="715" align="right">มหาวิทยาลัยเทคโนโลยีราชมงคลล้านนา</td>
  </tr>
  <tr>
      <td align="center">วันที่&nbsp;&nbsp;<?php 
      $dateData=time(); // วันเวลาขณะนั้น  
		echo @thai_date_fullmonth($dateData);  ?></td>
  </tr>
  <tr>
    <td>เรื่อง อนุญาต ลาพักผ่อน</td>
  </tr>
  <tr>
    <td>เรียน ผู้อำนวยการสำนักงานส่งเสริมวิชาการและงานทะเบียน</td>
  </tr>
    
 <?php 
   $query = db()->query('SELECT * from la_prefix where id_prefix="'.$id_prefix.'"');
   $query1 = db()->query('SELECT * from la_position where id_position="'.$id_position.'"');
   $query2 = db()->query('SELECT * from la_subdepart where id_subdepart="'.$id_subdepart.'"');
   $query3 = db()->query('SELECT * from la_department where id_department="'.$id_departmaent.'"');
   $query4 = db()->query('SELECT * from la_personal where id_personal="'.$id_personal.'"');
   
echo db()->error;
    $row = $query->fetch_assoc();
    $row1 = $query1->fetch_assoc();
    $row2 = $query2->fetch_assoc();
    $row3 = $query3->fetch_assoc();
    $row4 = $query4->fetch_assoc();
    
	
?>
    <td>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ข้าพเจ้า&nbsp; &nbsp;<?php echo $row['nameprefix'].$fname."        ".$lname;?>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    ตำแหน่ง <?php echo $row1['nameposition'];?> </td>
  </tr>
  <tr>
    <td>
        แผนกงาน&nbsp; &nbsp;<?php echo $row2['namesubdepart'];?>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สังกัด &nbsp;&nbsp; &nbsp;<?php echo $row3['namedepartment'];?></td>
  </tr>
  <tr>
  <?php 
  $querynum = db()->query('SELECT * from la_namla where id_personal="'.$rowq1['id_personal'].'"');
		echo db()->error;
		$rowqnum = $querynum->fetch_assoc();
  ?>
    <td>มีวันลาพักผ่อนสะสม&nbsp;&nbsp;<?php echo $rowqnum['collectnamla'];?>&nbsp;&nbsp;วันทำการ มีสิทธิลาพักผ่อนประจำปีนี้อีก&nbsp;&nbsp;<?php echo $rowqnum['tatalnamla'];?>&nbsp;&nbsp;วันทำการ รวมเป็น&nbsp;&nbsp;<?php echo $rowqnum['tatalnamla']+$rowqnum['collectnamla'];?>&nbsp;&nbsp;วันทำการ</td>
  </tr>
  <tr>
  <?php 
  	$sdate=date_create($rowq1['sdate']);
  	$ndate=date_create($rowq1['ndate']);
?>
    <td>ขอลาพักผ่อนตั้งแต่วันที่ &nbsp; &nbsp; &nbsp;<?php echo date_format($sdate,"d/m/Y");?>&nbsp; &nbsp; &nbsp; 
    ถึงวันที่ &nbsp; &nbsp; &nbsp;<?php echo date_format($ndate,"d/m/Y");;?>&nbsp; &nbsp; &nbsp; มีกำหนด  &nbsp; &nbsp; &nbsp;<?php echo $rowq1['namla']; ?>&nbsp; &nbsp; &nbsp;วัน</td>
  </tr>
  <tr>
    <td>ในระหว่างลาจะติดต่อข้าพเจ้าได้ที่&nbsp; &nbsp; &nbsp;<?php echo $row4['tel'];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
    <?php 
    $query5 = db()->query('SELECT * from la_personal where id_personal="'.$rowq1['id_personal_tan'].'"');
     $row5 = $query5->fetch_assoc();
     $query6 = db()->query('SELECT * from la_prefix where id_prefix="'.$row5['id_prefix'].'"');
		$row6 = $query6->fetch_assoc();
    ?>
    &nbsp;&nbsp;&nbsp;มอบหมาย <?php echo $row6['nameprefix'].$row5['fname']." ".$row5['lname'];?>  ปฏิบัติหน้าที่แทน
    
    </td>
  </tr>
   <tr>
    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ขอแสดงความนับถือ</td>
  </tr>
  <tr>
    <td>ลงชื่อ...................................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงชื่อ................................................................. </td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<?php echo $row6['nameprefix'].$row5['fname']." ".$row5['lname'];?>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['nameprefix'].$fname."        ".$lname;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><strong>สถิติการลาประจำปีงบประมาณนี้ (ตุลาคม-กันยายน)</strong></td>
  </tr>
  <tr>
    <td><table width="735" border="1"  align="center">
      <tr>
        <td width="225" align="center" valign="bottom"><strong>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;ลามาแล้ว (วันทำการ)</strong></td>
        <td width="225" align="center" valign="bottom">&nbsp;&nbsp;&nbsp; &nbsp;<strong>ลาครั้งนี้ (วันทำการ)</strong></td>
        <td width="225" align="center" valign="bottom">&nbsp;&nbsp;&nbsp;<strong>รวมเป็น (วันทำการ)</strong></td>
      </tr>
      <tr>
        <td align="center" valign="bottom">&nbsp;</td>
        <td align="center" valign="bottom">&nbsp;</td>
        <td align="center" valign="bottom">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">ลงชื่อ..........................................................ผู้ตรวจสอบ</td>
  </tr>
  <tr>
    <td align="center">ตำแหน่ง......................................................................</td>
  </tr>
  <tr>
    <td align="center">......................./........................../..............................</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td >&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ความเห็นของผู้บังคับบัญชาขั้นต้น</td>
  </tr>
  <tr>
    <td align="center">..................................................................................</td>
  </tr>
  <tr>
    <td align="center">ลงชื่อ..........................................................................</td>
  </tr>
  <tr>
    <td align="center">ตำแหน่ง......................................................................</td>
  </tr>
  <tr>
    <td align="center">......................./........................../..............................</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td >&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;ความเห็นของผู้บังคับบัญชาสูงสุด</td>
  </tr>
  <tr>
    <td align="center"><form id="form1" name="form1" method="post" action="">
      <label for="checkbox"></label>
      <input type="radio" name="radio9" id="radio9" value="radio9">อนุญาต &nbsp;&nbsp;&nbsp;&nbsp;
      <input type="radio" name="radio10" id="radio10" value="radio10">
      <label for="checkbox2"></label>
    ไม่อนุญาต
    </form></td>
  </tr>
  <tr>
    <td align="center">..................................................................................</td>
  </tr>
  <tr>
    <td align="center">ลงชื่อ..........................................................................</td>
  </tr>
  <tr>
    <td align="center">ตำแหน่ง......................................................................</td>
  </tr>
  <tr>
    <td align="center">......................./........................../..............................</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
        
<?php
    
}
       ?>
</body>
</html>
