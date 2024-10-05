<?php
$file = "allcv/".$_REQUEST['file'];

$handle = fopen($file, 'r');
$data = fread($handle,filesize($file));

include('converter/mpdf.php');
$mpdf=new mPDF();
$mpdf->WriteHTML($data);
echo  $mpdf->Output(); 
fclose($handle);  
header('location:savedCv.php');
 ?>