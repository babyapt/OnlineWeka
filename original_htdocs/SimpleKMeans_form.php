<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SimpleKMeans</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="themes/test.css" />
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<link rel="icon" type="image/png" href="mq1.gif" sizes="16x16">
<link rel="icon" type="image/png" href="mq1.gif" sizes="32x32">
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> 
</head>
<?php session_start();

$SID = session_id();
$location = $_GET['key'];
$functions = $_GET['key2'];
$file = $location."".$functions."_";
$myfile = fopen($location."".$functions."_".$SID.".arff", "r") or die("Unable to open file!");
$data = fread($myfile,filesize($location."".$functions."_".$SID.".arff"));
$trim = trim($data); 
$word = "@DATA";
if(strstr($trim,$word))
{ $position = strpos($trim,"@DATA");

echo "จำนวน Folds ที่ใส่ได้ไม่เกิน ".$result = substr_count($trim,"\n",$position);
}
else {$position = strpos($trim,"@data");

  
echo "จำนวน Folds ที่ใส่ได้ไม่เกิน ".$result = substr_count($trim,"\n",$position); }
fclose($myfile);
?>
<script>
function check(){
	
  var Percen = document.SimpleKMeans.Percen.value;
  var num_fold = document.SimpleKMeans.Folds.value;
  var instance = "<?=$result?>";
  
  if (num_fold > 0 && num_fold <= instance){
		
}
	else {
		alert("Problem evaluation Classifirer : Can't have more folds than instance  ("+instance+")")
		 return false;
}
  if (Percen > 0 && Percen <= 100)
  {}
	else  {
		alert("Problem evaluating Classifirer : Percentage must be between 0 and 100")
		  return false;}
		



}
</script>
<body>
<div data-role="page" id="page">
  <div data-role="header" data-position="fixed">
    <h1><center>
  SimpleKMeans</center></h1>
  </div>
  <div style="position: relative; margin:auto; 
        top: 0px;  left: 0px;  width: 80%; height: autopx; overflow: auto;">
  <div data-role="content"><center><form name="SimpleKMeans" action="SimpleKMeans_para.php" method="post" onsubmit="return check();" data-ajax="false" >
<input type="hidden" value="<?php echo $file; ?>"  name="Hidden" />
<table width="258" border="0">
  <tr>
    <td><ul data-role="listview" data-inset="true">
<li data-role="list-divider" data-theme="a" data-swatch="a" data-form="ui-bar-a">Test Option</li>
            <li data-form="ui-body-a" data-swatch="a" data-theme="a"><label for="rdoOpt"><input type="radio" name="rdoOpt" value="Use training set" id="RadioGroup1_0"  checked="checked"/>
Use training set </label></li></table>
<table width="200" border="0">
  <tr>
    <td><ul data-role="listview" data-inset="true">
<li data-role="list-divider" data-theme="a" data-swatch="a" data-form="ui-bar-a">ค่าพารามิเตอร์</li>
  <li data-form="ui-body-a" data-swatch="a" data-theme="a"><table width="331" height="323" border="0" align="center">
  <tr>

    <td width="178" height="23"><p align="left">displayStdDevs</td>
    <td width="137"><p align="left"><select name="displayStdDevs">
      <option value = " "><b>FALSE</b></option>
      <option value = "-V"><b>TRUE</b></option>
    </select></td>
  </tr>
  <tr>
    <td width="178" height="23"><p align="left">distanceFunction</td>
    <td width="137"><p align="left"><select name="distanceFunction" size="1">
      <option value = "CherbyshevDistance"><b>CherbyshevDistance -R first-last</b></option>
      <option value = "EditDistance"><b>EditDistance -R first-last</b></option>
      <option value = "EuclideanDistance" selected ><b>EuclideanDistance -R first-last</b></option>
      <option value = "ManhattanDistance"><b>ManhattanDistance -R first-last</b></option>
    </select></td>
  </tr>
  <tr>
    <td width="178" height="23"><p align="left"> dontReplaceMissingValues </td>
    <td width="137"><p align="left"><select name="dontReplaceMissingValues">
      <option value = ""><b>FALSE</b></option>
      <option value = "-M"><b>TRUE</b></option>
    </select></td>
  </tr>
<tr>
    <td height="23"><p align="left">maxIterations</td>
    <td><p align="left"><input name="maxIterations" type="text" value="500" size="15
        " /></td>
  </tr>
    <tr>
    <td height="23"><p align="left">numClusters</td>
    <td><p align="left"><input name="numClusters" type="text" value="2" size="15
        " /></td>
  </tr>
  <tr>
    <td width="178" height="23"><p align="left">preserveInstancesOrder</td>
    <td width="137"><p align="left"><select name="preserveInstancesOrder">
      <option value = " "><b>FALSE</b></option>
      <option value = "-O"><b>TRUE</b></option>
    </select></td>
  </tr>
   <tr>
    <td height="23"><p align="left">seed</td>
    <td><p align="left"><input name="seed" type="text" value="10" size="15
        " /></td>
  </tr>
  
  
   <td height="34" colspan="2" bgcolor="#FFFFFF"><p align="center"><input type="submit" value="Submit" name="btnSubmit"></p></td>
  </tr>
</table>
</li></td>
  </tr>
</table>


</form></div>
  
</div>
<div data-role="footer" data-position="fixed">
    <h4>The University of the Thai Chamber of Commerce</h4>
  </div>
</body>
</html>
