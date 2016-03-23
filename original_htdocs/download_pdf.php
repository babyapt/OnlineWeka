
<?php
$Function = $_POST['Hidden2'];
session_start();
$sid = session_id();


header('Content-type: application/pdf');
header("Content-Disposition: attachment; filename = Online Weka :".$Function."".$sid.".pdf"); 
readfile("savefile_pdf/".$Function."".$sid.".pdf");
?>
