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


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แบบพรอมใบลาป่วย คลอดบุตร ลากิจส่วนตัว</title>
<script src="SpryAssets/SpryValidationCheckbox.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationCheckbox.css" rel="stylesheet" type="text/css" />

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
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><strong>แบบใบลาป่วย  ลาคลอดบุตร  ลากิจส่วนตัว</strong></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td width="946" align="right">มหาวิทยาลัยเทคโนโลยีราชมงคลล้านนา</td>
  </tr>
  <tr>
    <td align="center">วันที่&nbsp;&nbsp;<?php 
      $dateData=time(); // วันเวลาขณะนั้น  
		echo @thai_date_fullmonth($dateData);  ?></td>
  </tr>
  <tr>
    <td>เรื่อง อนุญาต ลาป่วย ลาคลอดบุตร ลากิจส่วนตัว</td>
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



<tr>
  <td>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ข้าพเจ้า&nbsp; &nbsp;<?php echo $row['nameprefix'].$fname."        ".$lname;?>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;ตำแหน่ง&nbsp;&nbsp;<?php echo $row1['nameposition'];?></td>
  </tr>
  <tr>
    <td>แผนกงาน&nbsp; &nbsp;<?php echo $row2['namesubdepart'];?>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สังกัด&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;<?php echo $row3['namedepartment'];?></td>
  </tr>
   <tr>
     <?php
     $querynum = db()->query('SELECT * from la_namla where id_personal="'.$rowq1['id_personal'].'"');
   		echo db()->error;
   		$rowqnum = $querynum->fetch_assoc();
     ?>
     <td >
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="checkbox3" id="checkbox3" <?php if($rowq1['id_type']==2){?>checked <?php } ?>disabled/>
       <label for="checkbox3"></label>
     ป่วย
 </td>
   </tr>
   <tr>
     <td >&nbsp; ขออนุญาตลา <input type="checkbox" name="checkbox4" id="checkbox4" <?php if($rowq1['id_type']==3){?>checked <?php } ?> disabled/>
         <label for="checkbox4"></label>
     กิจส่วนตัว&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     เนื่องจาก&nbsp;&nbsp; <?php echo $rowq1['comment'];?>
     </td>
   </tr>
   <tr>
     <td >
       <span id="sprycheckbox1">
         <label for="checkbox1"></label>
         <span class="checkboxRequiredMsg"></span></span>
</td>
   </tr>
   <tr>
     <td >
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input type="checkbox" name="checkbox5" id="checkbox5" <?php if($rowq1['id_type']==4){?>checked <?php } ?>disabled/>
       <label for="checkbox5"></label>
     คลอดบุตร
   </td>
   </tr>
    <?php
  	$sdate=date_create($rowq1['sdate']);
  	$ndate=date_create($rowq1['ndate']);
?>
   <tr>
     <td >ตั้งแต่วันที่&nbsp; &nbsp; &nbsp;<?php echo date_format($sdate,"d/m/Y");?>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
     ถึงวันที่  &nbsp; &nbsp; &nbsp;<?php echo date_format($ndate,"d/m/Y");;?>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; มีกำหนด&nbsp; &nbsp; &nbsp;<?php echo $rowq1['namla']; ?>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;วัน</td>
   </tr>
   <tr>
     <td >ข้าพเจ้าได้ลา
       <input type="checkbox" name="checkbox6" id="checkbox6" <?php if($rowq1['id_type']==2){?>checked <?php } ?>disabled/>
       <label for="checkbox6"></label>
ป่วย &nbsp;&nbsp;
<input type="checkbox" name="checkbox7" id="checkbox7" <?php if($rowq1['id_type']==3){?>checked <?php } ?>disabled/>
<label for="checkbox7"></label>
กิจส่วนตัว&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="checkbox8" id="checkbox8" <?php if($rowq1['id_type']==4){?>checked <?php } ?>disabled/>
<label for="checkbox8"></label>
 <?php 
  $querydayback = db()->query('SELECT * from la_detail where id_type="'.$rowq1['id_type'].'" and id_personal="'.$rowq1['id_personal'].'" and id_detail<"'.$_GET['id_detail'].'" ORDER BY id_detail DESC LIMIT 1');
		echo db()->error;
		$rowqdayback = $querydayback->fetch_assoc();
		if(empty($rowqdayback['sdate'])){?>
	คลอดบุตร &nbsp;&nbsp; ครั้งสุดท้ายตั้งแต่วันที่ &nbsp;&nbsp;-&nbsp;&nbsp; ถึงวันที่ &nbsp;&nbsp;-&nbsp;&nbsp;
		<?php }else{
		$sdate1=date_create($rowqdayback['sdate']);
  		$ndate1=date_create($rowqdayback['ndate']);
		
  ?>
คลอดบุตร &nbsp;&nbsp; ครั้งสุดท้ายตั้งแต่วันที่ &nbsp;&nbsp;<?php echo date_format($sdate1,"d/m/Y");?>&nbsp;&nbsp; ถึงวันที่ &nbsp;&nbsp;<?php echo date_format($ndate1,"d/m/Y");?>&nbsp;&nbsp;</td>
<?php } ?>   </tr>
   <tr>
     <td>มีกำหนด..................วัน ในระหว่างลาจะติดต่อข้าพเจ้าได้ที่&nbsp; &nbsp; &nbsp;<?php echo $row4['tel'];?></td>
   </tr>
   <tr>
     <td >&nbsp;</td>
   </tr>
   <tr>
     <td >&nbsp;</td>
   </tr>
   <tr>
    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ขอแสดงความนับถือ</td>
  </tr>
  <tr>
    <td>.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงชื่อ...................................................... </td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['nameprefix'].$fname."        ".$lname;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>)</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><strong>สถิติการลาประจำปีงบประมาณนี้ (ตุลาคม-กันยายน)</strong></td>
  </tr>
  <tr>
    <td><table width="947" border="2" align="center" cellpadding="2" cellspacing="0">
      <tr>
        <th width="181" valign="bottom" bgcolor="#FFFFFF"><strong>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;ประเภทการลา</strong></th>
        <th width="245" align="center" valign="bottom" bgcolor="#FFFFFF">&nbsp;&nbsp;          <strong>ลามาแล้ว (วันทำการ)</strong></th>
        <th width="251" align="center" valign="bottom" bgcolor="#FFFFFF"><strong>ลาครั้งนี้ (วันทำการ)</strong></th>
        <th width="312" align="center" valign="bottom" bgcolor="#FFFFFF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;          <strong>รวมเป็น (วันทำการ)</strong></th>
      </tr>
      <tr>
        <th valign="bottom" bgcolor="#FFFFFF">ป่วย</th>
        <th valign="bottom" bgcolor="#FFFFFF">&nbsp;</th>
        <th valign="bottom" bgcolor="#FFFFFF"><?php echo $rowq1['namla']; ?></th>
        <th valign="bottom" bgcolor="#FFFFFF">&nbsp;</th>
      </tr>
      <tr>
        <th valign="bottom" bgcolor="#FFFFFF">กิจส่วนตัว</th>
        <th valign="bottom" bgcolor="#FFFFFF">&nbsp;</th>
        <th valign="bottom" bgcolor="#FFFFFF"><?php echo $rowq1['namla']; ?></th>
        <th valign="bottom" bgcolor="#FFFFFF">&nbsp;</th>
      </tr>
      <tr>
        <th valign="bottom" bgcolor="#FFFFFF">คลอดบุตร</th>
        <th valign="bottom" bgcolor="#FFFFFF">&nbsp;</th>
        <th valign="bottom" bgcolor="#FFFFFF"><?php echo $rowq1['namla']; ?></th>
        <th valign="bottom" bgcolor="#FFFFFF">&nbsp;</th>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
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
    <td >&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&nbsp; ความเห็นของผู้บังคับบัญชาขั้นต้น</td>
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
    <td >&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  ความเห็นของผู้บังคับบัญชาสูงสุด</td>
  </tr>
  <tr>
    <td align="center"><form id="form1" name="form1" method="post" action="">
      <input type="checkbox" name="checkbox" id="checkbox" />
      <label for="checkbox"></label>
    อนุญาต &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="checkbox" name="checkbox2" id="checkbox2" />
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
<script type="text/javascript">
var sprycheckbox1 = new Spry.Widget.ValidationCheckbox("sprycheckbox1");
</script>
      <?php
     }?>
</body>
</html>
