<?php

/*$html = include ('from1.php');       //เก็บค่า html ไว้ใน $html 
$pdf = new mPDF('th', 'A4-L', '0', '');   //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆครับ ถ้าต้องการแนวนอนเท่ากับ A4-L
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output("MyPDF.pdf");         // เก็บไฟล์ html ที่แปลงแล้วไว้ใน MyPDF/MyPDF.pdf ถ้าต้องการให้แสด*/


require_once('mpdf/mpdf.php');
$html = include('from1.php');
$mpdf=new mPDF();
$mpdf->WriteHTML($html);
$mpdf->Output();

?>
