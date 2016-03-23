
<?php
$SID = $_POST['Hidden'];
session_start();
$sid = session_id();

header("Content-Type: text/plain");
header("Content-Disposition: attachment; filename = Online Weka :".$SID."".$sid.".txt"); 
readfile("savefile_txt/".$SID."".$sid.".txt");

?>