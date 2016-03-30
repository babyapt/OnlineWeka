<?php
session_start();
  exec(".\\ClamAV\\clamscan -r --remove C:\\test\\test.arff -l C:\\test\\test.log",$out);
  print_r($out);
  echo '</br></br>';
  echo $out[0].'</br></br>';
  $scanStatus = explode(": ",$out[0]);
  $scanStatus = $scanStatus[1];
  echo $scanStatus.'</br></br>';
  echo $scanStatus=='OK'?'True':'False';
?>
