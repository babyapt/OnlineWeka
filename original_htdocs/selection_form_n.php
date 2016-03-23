<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Attribute Selection</title>
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
    <h1>Attribute Selection</h1>
  </div>
  <div style="position: relative; margin:auto; 
        top: 0px;  left: 0px;  width: 80%; height: autopx; overflow: auto;">
  <div data-role="content"><?php 
session_start();

$SID = session_id();
$location = $_GET['key2'];
if (isset($_GET['key2'])) {
    $location  = $_GET['key2'];
} else {
    $location  = '';
}
if (isset($_GET['key1'])) {
   $functions = $_GET['key1'];
} else {
   $functions = '';
}
$file = $location."".$functions."_";
$myfile = fopen($location."".$functions."_".$SID.".arff", "r") or die("Unable to open file!");
$data = fread($myfile,filesize($location."".$functions."_".$SID.".arff"));
if(strstr($data,"@attribute"))
{
  $count = substr_count($data,"@attribute");
}
else

  $count = substr_count($data,"@ATTRIBUTE");


fclose($myfile);
?>
<?php
function startsWith($haystack, $needle) {   
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
}
$file = fopen($location."".$functions."_".$SID.".arff", "r") ;

while(!feof($file))
{
	$results = fgets($file);
 if (strstr($results,"@ATTRIBUTE"))
 {
 if(startsWith($results, '@ATTRIBUTE' )) 
 {
   $result3 = explode(" ", $results);
   
   $result4 = explode("\t", $result3[1]);
   
    $x[] = "$result4[0]";
 } 
}
 else if (startsWith($results, '@attribute' )) 
 {

   $result3 = explode(" ", $results);
 
   $result4 = explode("\t", $result3[1]);
   
    $x[] = "$result4[0]";
 }
}
fclose($file);

?>


<form action="selection_process.php" method="post" data-ajax="false">
  
  <input type="hidden" value="<?php echo $location;?>" name="Hidden">
  <input type="hidden" value="<?php echo $functions;?>" name="Hidden2">
  <center><table width="364" height="201" border="0">
  
  <tr>
    <td colspan="2"><center>
   <p>
  <center><select name="type" id="selType">
    <option value="0">-- เลือก Evaluator-</option>
    <option value="InfoGainAttributeEval">InfoGainAttributeEval</option>
     <option value="PrincipalComponents">PrincipalComponents</option>
  </select></center>
</p>
<p>
  <center><select name="model" id="model">
   <option>-- เลือก Search --</option>
    <option value= "Ranker -T -1.7976931348623157E308 ">Ranker</option> 
  </select></center>
</p>
<p>จำนวน Attribute ที่ต้องการ 

  <div data-role="fieldcontain">
    <label for="slider"></label>
    <input type="range" name="num" id="slider" value="1" min="1" max=<?php echo $count; ?> 
  </div>
</p>
<p>&nbsp;</p>
<p><center><select name="attribute">
<option name="attribute">--เลือกตัวแปรเป้าหมาย--</option>
<?php 
$i = 0;
for($x[$i]; $i<$count; $i++)
{
    $v = $i+1;
    echo "<option value=".$v.">".$x[$i]."</option>";
}
?> 
        
</select></center></p>
    </center></td>
    </tr>
  <tr>
    <td><center>
        จำนวน Attribute <?php echo $count; ?>&nbsp;&nbsp;    
      </center></td>
    <td><center><input type="submit" value="submit" name="submit"  /></center></td>
  </tr>
</table></center>




</form></div>
  
</div>
<div data-role="footer"  data-position="fixed">
    <h4>The University of the Thai Chamber of Commerce</h4>
  </div>
</head>

<body>
<p>
  
</body>
</html>