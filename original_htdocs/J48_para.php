<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แสดงผลลัพธ์</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="themes/test.css" />
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> 
</head>

<body>
<div data-role="page" id="page">
  <div data-role="header">
    <h1>แสดงผลลัพธ์</h1>
  </div>
  <div data-role="content"><table width="200" border="0">
  <tr>
    <td colspan="2"><?php
session_start();

$SID = session_id();



$binarySplits = $_POST['binarySplits'];
$confidenceFactor = $_POST['confidenceFactor'];
$debug = $_POST['debug'];
$minNumObj = $_POST['minNumObj'];
$debug = $_POST['debug'];
$numFolds = $_POST['numFolds'];
$reduceErrorPruning = $_POST['reduceErrorPruning'];
$saveInstanceData = $_POST['saveInstanceData'];
$seed = $_POST['seed'];
$subtreeRaising = $_POST['subtreeRaising'];
$unpruned = $_POST['unpruned'];
$useLaplace = $_POST['useLaplace'];


$File = $_POST['Hidden'];
$folds = $_POST['Folds'];
$Percen = $_POST['Percen'];




if($reduceErrorPruning=="1")
{
	$result = $saveInstanceData." ".$subtreeRaising." "."-R -N"." "."$numFolds"." "."-Q"." "."$seed"." "."-M "." ".$minNumObj.""." ".$useLaplace;
	
}
else if ($unpruned=="2")
{
	 $result = $saveInstanceData." "."-U"." ".$binarySplits.
	 " -M "." ".$minNumObj." ".$useLaplace;       
    }
else  {

$result = $saveInstanceData." ".$subtreeRaising." -C "." ".$confidenceFactor." ".$binarySplits. " -M "." ".$minNumObj." ".$useLaplace;
}

//echo "แสดง".$result."<br>";

//echo "--------------------------------"."<br>";
$test_option = $_POST['rdoOpt'];
switch ($test_option) {
	case "Use training set":
		$T_result = " -t";
		break;
	case "Cross-validation":
		$T_result = "-x ".$folds." -t ";
		break;
	case "Percentage split":
		$T_result = "-split-percentage ".$Percen." -t ";
		break;	
}
if(file_exists("savefile_pdf/J48_".$SID.".pdf"))
{
	unlink("savefile_pdf/J48_".$SID.".pdf");
}
if(file_exists("savefile_txt/J48_".$SID.".txt"))
{
	unlink("savefile_txt/J48_".$SID.".txt");
}
if(file_exists("errorcmd/".$SID.".txt"))
{
	unlink("errorcmd/".$SID.".txt");
}

$cmd ="java -cp weka.jar weka.classifiers.trees.J48 ".$result." ".$T_result." ".$File.$SID.".arff"." 2>errorcmd/".$SID.".txt";
		
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
				file_put_contents("savefile_txt/J48_".$SID.".txt", $content,FILE_APPEND);
				
				
			}
			require('fpdf\fpdf.php');
			$pdf = new FPDF();	
	 		$pdf->AddPage();
	 		$pdf->SetFont('Arial','',13);
	 		$txt = file_get_contents("savefile_txt/J48_".$SID.".txt");
	 		$pdf->Write(5,$txt);
			$pdf->Output("savefile_pdf/J48_".$SID.".pdf","F");
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
     
<center><form action="download.php" method="post" name="form1" data-ajax="false">
<input name="Hidden" type="hidden" value="J48_">
<input name="btnSubmit" type="submit" value="Download TXT File" /></center></form>
	<center><form action="download_pdf.php" method="post" name="form2" data-ajax="false">
<input name="Hidden2" type="hidden" value="J48_">	
<input name="btnSubmit" type="submit" value="Download PDF File" /></center></form></div>
      
</div>
<div style="position: relative; margin:auto; 
        top: 0px;  left: 0px;  width: 80%; height: autopx; overflow: auto;">
     <button id="Button1" onclick="myFunction()">กลับไปหน้าแรก</button>         
 </div> 
 
<div data-role="footer" data-position="fixed">
    <h4>The University of the Thai Chamber of Commerce</h4>
  </div>
</body>
</html>
