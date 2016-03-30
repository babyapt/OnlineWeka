<?php
session_start();
exec(".\ClamAV\clamscan -r --remove C:\\Users\\BabyApt\\OneDrive\\Work\\Weka\\htdocs\\uploads\\".session_id().".arff -l C:\\Users\\BabyApt\\OneDrive\\Work\\Weka\\htdocs\\uploads\\log\\".session_id().".log",$output);
$scanStatus = explode(": ",$output[0]);
$scanStatus = trim($scanStatus[1]);
echo $scanStatus;
if($scanStatus=='OK'){
  echo 'Pass';
  echo '<script>parent.scanComplete(1);setTimeout(function(){location.href="?action=preprocessor&noui=true";},1000);</script>';
} else {
  echo 'Fail';
  echo '<script>parent.scanComplete(0);</script>';
}
 ?>
