<?php
include 'config.php'; 
connect_db();

$query = db()->query('SELECT id_personal,id_prefix,fname,lname,colagela FROM la_personal');
echo db()->error;

for($i=0;$i<=$query->num_rows;$i++)
{
$colagela= $_POST['namlatotal'][$i];
$id_personal= $_POST['idpersonal'][$i];
$s = sprintf('UPDATE la_personal SET colagela="%s" WHERE id_personal ="%s"',$colagela,$id_personal);
db()->query($s);
echo db()->error;
}
header('Location:showper.php');
?> 