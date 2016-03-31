<?php
  session_start();
  exec(".\ClamAV\clamscan -r --remove C:\\Users\\BabyApt\\OneDrive\\Work\\Weka\\htdocs\\OnlineWeka\\uploads\\".session_id().".arff -l C:\\Users\\BabyApt\\OneDrive\\Work\\Weka\\htdocs\\OnlineWeka\\uploads\\log\\".session_id().".log",$output);
  for($key=0;$key<=count($output);$key++){
    if(substr($output[$key],0,1)=='*') continue;
    else break;
  }
  $scanStatus = explode(": ",$output[$key]);
  $scanStatus = trim($scanStatus[1]);
  echo $scanStatus;
  if($scanStatus=='OK'){
    echo 'Pass';
    echo '<script>parent.scanComplete(1);setTimeout(function(){location.href="?action=preprocessor&noui=true";},100);</script>';
  } else {
    echo 'Fail';
    echo '<script>parent.scanComplete(0);</script>';
  }
?>
