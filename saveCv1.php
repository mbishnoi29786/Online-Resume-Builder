<?php
session_start();
$cvData = $_REQUEST['data'];
$cvName = $_REQUEST['name'];
$cvStyle="<head><style>

.cover{padding: 11px;}
.cvBody{border:1px solid black; min-height: 100%;max-height:100%; background:black}
.cv-head{background:#212121;width: 30%;padding: 4px;float:left}
.photo{background:#283136;height: 222px}
.cv-content{;background:#FAF2EF;padding:11px 11px 11px 11px;float:right}
.center{text-align: center;}
#cvname{font-size:12pt}
.circle{border-radius: 50%}
.flex{display: inline-flex;}
.about-tab{background:#3C474D;padding: 11px}
.about-head{ color: white ;font-size: 11pt;font-variant: small-caps;margin: 5px 2px;}
.about-details{color: white;padding:4px; font-family: calibri light;font-size:8pt;}
.about-details li{font-size: 8pt;margin: 5px}
.body-item{}
.body-head{font-size: 12pt;font-family: algerian;font-weight:bold}
.body-details{padding:0 0 0 22px; }
.detail-item,.info-item{margin-top: 3px}
.detail-item-head{font-size: 8pt;font-family: calibri light;font-weight: bold}
.detail-item-body{font-size:8pt}
.info-item-head{width: 144px;font-size: 10pt;float: left;}
.info-item-body{width: 200px;font-size: 10pt;float: right;}
.detail-item-text{font-size: 10pt;}
</style></head>";

$cv = $cvStyle.$cvData;
$time4name = time();
$fileName= $time4name."-".$_SESSION['userId'];
$file  = "allcv/".$fileName;
$handle = fopen($file, 'w') or die('Cannot open file:  '.$file);
fwrite($handle, $cv);
fclose($handle);

$conn = new mysqli('localhost','root','','cv');
if ($cvName == "") {$cvName = "No Name";}
// echo $cvName;
// INSERT INTO `allcv`(`id`, `cvName`, `cvFileName`, `userId`, `date`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')

$m_userid = $_SESSION['userId'];

$conn->query("INSERT INTO `allcv`(`cvName`, `cvFileName`, `userId`) VALUES ('{$cvName}','{$fileName}','{$m_userid}')");
// $conn->query("insert into allCv (cvName,cvFileName,userId)values('$cvName','$fileName','$_SESSION[userId]')");
 ?>