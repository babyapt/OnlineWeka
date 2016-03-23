<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แสดงผลลัพธ์</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="themes/test.css" />
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<link rel="icon" type="image/png" href="mq1.gif" sizes="16x16">
<link rel="icon" type="image/png" href="mq1.gif" sizes="32x32">
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> 
</head>

<body>
<div data-role="page" id="page">
  <div data-role="header">
    <h1>แสดงผลลัพธ์</h1>
  </div>
  <div data-role="content"><?php
session_start();

$SID = session_id();


$debug = $_POST['debug'];
$displayModelInOldFormat = $_POST['displayModelInOldFormat'];
$maxIterations = $_POST['maxIterations'];
$minStdDev = $_POST['minStdDev'];
$numClusters = $_POST['numClusters'];
$seed = $_POST['seed'];



$File = $_POST['Hidden'];




$result = " -I"." ".$maxIterations." -N -1"." "."-M"." ".$minStdDev." ".$displayModelInOldFormat." "."-S"." ".$seed;



$test_option = $_POST['rdoOpt'];
switch ($test_option) {
	case "Use training set":
		$T_result = " -t";
		break;
	
}
if(file_exists("savefile_pdf/EM_".$SID.".pdf"))
{
	unlink("savefile_pdf/EM_".$SID.".pdf");
}
if(file_exists("savefile_txt/EM_".$SID.".txt"))
{
	unlink("savefile_txt/EM_".$SID.".txt");
}
if(file_exists("errorcmd/".$SID.".txt"))
{
	unlink("errorcmd/".$SID.".txt");
}

$cmd ="java -cp weka.jar weka.clusterers.EM".$result." ".$T_result." ".$File.$SID.".arff"." 2>errorcmd/".$SID.".txt";
		
			exec($cmd, $output);
			//echo $cmd;
	if(sizeof($output) == 0)	// แม่ง Error
			{
				?>
				<script>
					alert("Error Weka Process (เกิดข้อผิดพลาดในการประมวลผลของโปรแกรมเวก้า)");
					document.location = "errorcmd.php";
				</script>
				<?php

			}
	
			for ( $i = 0;$i<sizeof($output);$i++)
			{
				 trim($output[$i]);
				 echo "<br>";

				 ob_start();
				 echo "$output[$i]".PHP_EOL;
	 			$content = ob_get_contents();
				file_put_contents("savefile_txt/EM_".$SID.".txt", $content,FILE_APPEND);
				
				
			}
			require('fpdf/fpdf.php');
			$pdf = new FPDF();	
	 		$pdf->AddPage();
	 		$pdf->SetFont('Arial','',13);
	 		$txt = file_get_contents("savefile_txt/EM_".$SID.".txt");
	 		$pdf->Write(5,$txt);
			$pdf->Output("savefile_pdf/EM_".$SID.".pdf","F");
unlink($File.$SID.".arff");
		
			
	
	


?>
 &nbsp;</td>
  </tr>
  <tr>

  </tr>
</table>
<script> function myFunction() {
document.location ="index.php"; 
}
</script>
 <div style="position: relative; margin:auto; 
        top: 0px;  left: 0px;  width: 50%; height: autopx; overflow: auto;">
<center><form action="download.php" method="post" name="form1">
<input name="Hidden" type="hidden" value="EM_">
<input name="btnSubmit" type="submit" value="Download TXT File" /></center></form>
	<center><form action="download_pdf.php" method="post" name="form2">
<input name="Hidden2" type="hidden" value="EM_">	
<input name="btnSubmit" type="submit" value="Download PDF File" /></center></form></div>  
</div>

<div style="position: relative; margin:auto; 
        top: 0px;  left: 0px;  width: 80%; height: autopx; overflow: auto;">
     <button id="Button1" onclick="myFunction()">กลับไปหน้าแรก</button>         
 </div> 
<div data-role="footer" data-position="fixed">
    <h4>The University of the Thai Chamber of Commerce </h4>
  </div>

</body>
</html>