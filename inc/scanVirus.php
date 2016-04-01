<?php
  session_start();
  $virusScanner = '"C:\\Program Files\\Microsoft Security Client\\MpCmdRun.exe"';
  $fileToScan = "C:\\xampp\\htdocs\\OnlineWeka\\uploads\\".session_id().".arff";
  //exec(".\ClamAV\clamscan -r --remove C:\\Users\\BabyApt\\OneDrive\\Work\\Weka\\htdocs\\OnlineWeka\\uploads\\".session_id().".arff -l C:\\Users\\BabyApt\\OneDrive\\Work\\Weka\\htdocs\\OnlineWeka\\uploads\\log\\".session_id().".log",$output);
  $cmd = "$virusScanner -Scan -ScanType 3 -File $fileToScan";
  exec($cmd,$output);
  $scanStatus = explode(" ",$output[2]);
  $scanStatus = $scanStatus[0].$scanStatus[2].$scanStatus[3].$scanStatus[4];
  if($scanStatus=='Scanningfoundnothreats.'){
    echo 'Pass';
    echo '<script>parent.scanComplete(1);setTimeout(function(){location.href="?action=preprocessor&noui=true";},1000);</script>';
  } else {
    unlink($fileToScan);
    echo 'Fail';
    echo '<script>parent.$("#uploadCancelTab").show();parent.scanComplete(0);</script>';
  }
?>
