<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Selection Attribute</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="themes/test.css" />
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<link rel="icon" type="image/png" href="mq1.gif" sizes="16x16">
<link rel="icon" type="image/png" href="mq1.gif" sizes="32x32">
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> 

<div data-role="page" id="page">
  <div data-role="header">
    <h1>Selection Attribute</h1>
  </div>
  <div data-role="content"><?php
session_start();

$SID = session_id();
$evaluator = $_POST['type'];
$search = $_POST['model'];
$location =$_POST['Hidden'];
$targer_a = $_POST['attribute'];
if (isset($_POST['attribute']))
{
	$attribute = "-c ".$_POST['attribute'];
}	else { 
	$attribute = '';
}
 	
echo $functions =$_POST['Hidden2'];
if (isset($_POST['num'])) {
    $N =" -N ".$_POST['num'];
} else {
    $N = '';
}
if(file_exists("errorcmd/".$SID.".txt"))
{
	unlink("errorcmd/".$SID.".txt");
}

$cmd ="java -cp weka.jar weka.attributeSelection.".$evaluator." -s \"weka.attributeSelection.".$search." ".$N."\"  -i ".$location."".$functions."_".$SID.".arff   ".$attribute.""." 2>errorcmd/".$SID.".txt";
exec($cmd,$output);
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
			
   for ($i = 0; $i < sizeof($output); $i++)
   {
       			 trim($output[$i]);
				 echo "<br>";

				 ob_start();
				 echo "$output[$i]".PHP_EOL;
	 			 $content = ob_get_contents();

 file_put_contents("output_selection/Selection_".$functions."_".$SID.".txt", $content,FILE_APPEND);
   }
$myfile = fopen("output_selection/Selection_".$functions."_".$SID.".txt", "r") or die("Unable to open file!");
$data = fread($myfile,filesize("output_selection/Selection_".$functions."_".$SID.".txt"));

$target = "Selected attributes:";

if(strstr($data,$target))
{ 
   $position = strpos($data,"Selected attributes:");
   $test =substr($data,$position) ; 
   

function getdatabetween($string, $start, $end){
    $sp = strpos($string, $start)+strlen($start);
    $ep = strpos($string, $end)-strlen($start);
    $data = trim(substr($string, $sp, $ep));
    return trim($data);
}

$result = getdatabetween($test, "Selected attributes:"," :");


 
}



fclose($myfile);
$cmd="java -cp weka.jar weka.filters.unsupervised.attribute.Remove -V -R ".$targer_a.",".$result." -i Selection_data/".$functions."_".$SID.".arff -o Selected_data/".$functions."_".$SID.".arff";
exec($cmd);

unlink("output_selection/Selection_".$functions."_".$SID.".txt");	


?>
<div style="position: relative; margin:auto; 
        top: 0px;  left: 0px;  width: 80%; height: autopx; overflow: auto;">
<form method="get" action="test_list1.php" data-ajax="false">
<input type="hidden" value="<?php echo $functions; ?>" name="key1" />
<input type="hidden" value="<?php echo "Selected_data/"; ?>" name="key2" />
<input type="submit" id="button" value="Submit"  />
</form></div>
 
</div>
 <div data-role="footer" data-position="fixed">
    <h4>The University of the Thai Chamber of Commerce</h4>
  </div>
</body>
</html>