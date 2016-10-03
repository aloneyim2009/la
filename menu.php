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
    
     <div class="col-lg-12" style="background-color:#CCFFFF;">
<br><br><br><br><br><br>

<center><h2>เอกสารการลาของบุคลากร</h2></center><br>

<center><p>
<button type="button" class="btn btn-warning btn-lg"><a href="page2.php"></href>หน้าหลัก</button>
<button type="button" class="btn btn-primarys btn-lg"><a href="add.php"></href>เพิ่มข้อมูลการลา</button>
<button type="button" class="btn btn-primarys btn-lg"><a href="datala.php"></href>สรุปจำนวนการลา</button>&nbsp;
<?php if($_SESSION['permiss']==1 or $_SESSION['permiss']==2 ){?><button type="button" class="btn primarys btn-lg"><a href="datalaall.php"></href>ข้อมูลการลาทั้งหมด</button>&nbsp;<?php }?>
<?php if($_SESSION['permiss']==1 or $_SESSION['permiss']==2 ){?><button type="button" class="btn primarys btn-lg"><a href="numlaall.php"></href>สรุปจำนวนการลาทั้งหมด</button>&nbsp;<?php }?>
<?php if($_SESSION['permiss']==1 or $_SESSION['permiss']==2 ){?><button type="button" class="btn primarys btn-lg"><a href="laallow.php"></href>อนุมัติการลา</button><?php }?>

</center><br><br><br></div>
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
<a class="navbar-brand" href="#portfolio">ระบบการลาของบุคลากร</a>
        
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav navbar-right">
	<li class="hidden">
<a href="#page-top"></a></li>
	<li class="page-scroll"><a href="information.php">ข้อมูลส่วนตัว</a></li>
    <li class="page-scroll"><a href="edit.php">แก้ไขข้อมูลส่วนตัว</a></li>
	<li class="page-scroll"><a href="logout.php">ออกจากระบบ</a></li></ul></div></div></nav>