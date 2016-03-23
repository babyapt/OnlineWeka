<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Multilayer Perceptron</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="themes/test.css" />
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
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
	
  var Percen = document.Multilayer.Percen.value;
  var num_fold = document.Multilayer.Folds.value;
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
    <h1>Multilayer Perceptron</h1>
  </div>
  <div style="position: relative; margin:auto; 
        top: 0px;  left: 0px;  width: 80%; height: autopx; overflow: auto;">
  <div data-role="content"><center><form name="Multilayer" action="MultilayerPerceptron_para.php" method="post" onsubmit="return check();" data-ajax="false"><input type="hidden" value="<?php echo $file; ?>"  name="Hidden" />
<center><table width="287" border="0">
  <tr>
    <td><ul data-role="listview" data-inset="true">
<li data-role="list-divider" data-theme="a" data-swatch="a" data-form="ui-bar-a">Test Option</li>
<li data-form="ui-body-a" data-swatch="a" data-theme="a"><label for="rdoOpt"><input type="radio" name="rdoOpt" value="Use training set" id="RadioGroup1_0" />
Use training set </label>
<label for="rdoOpt"><input type="radio" name="rdoOpt" value="Cross-validation" id="RadioGroup1_1" />Cross-validationt  : Folds </label><input name="Folds" type="number" value="10" size="8" /><label for="rdoOpt"><input type="radio" name="rdoOpt" value="Percentage split" id="RadioGroup1_2" />Percentage split : </label><input name="Percen" type="number"  value="66" size="8" />
</li></center>
 </li></td>
  </tr>

</table>
  <table width="331" height="465" border="0" align="center">
    <tr>
    <td>
    <ul data-role="listview" data-inset="true">
<li data-role="list-divider" data-theme="a" data-swatch="a" data-form="ui-bar-a">ค่า พารามิเตอร์</li>    
  <li data-form="ui-body-a" data-swatch="a" data-theme="a">
    <table width="331" border="0" align="center">
    <tr>
    <td height="23"><p align="left">autoBuild </td>
    <td><p align="left"><select name="autoBuild" size="1">
      <option value = ""><b>TRUE</b></option>
      <option value = "-A"><b>FALSE</b></option>
    </select></td>
  </tr>
  <tr>
    <td height="23"><p align="left">debug </td>
    <td><p align="left"><select name="debug">
      <option value = ""><b>TRUE</b></option>
      <option value = ""><b>FALSE</b></option>
    </select></td>
  </tr>
  <tr>
    <td height="23"><p align="left">decay </td>
    <td><p align="left"><select name="decay">
      <option value = ""><b>FALSE</b></option>
      <option value = "-D"><b>TRUE</b></option>
    </select></td>
  </tr>
  <tr>
    <td height="23"><p align="left">hiddenLayers </td>
    <td><p align="left"><input name="hiddenLayers" type="text" value="a" size="15
        " /></td>
  </tr>
  <tr>
    <td height="23"><p align="left">learningRate </td>
    <td><p align="left"><input name="learningRate" type="text" value="0.3" size="15
        " /></td>
  </tr>
  <tr>
    <td height="23"><p align="left">momentum </td>
    <td><p align="left"><input name="momentum" type="text" value="0.2" size="15
        " /></td>
  </tr>
  <tr>
    <td height="23"><p align="left">nominalToBinaryFilter </td>
    <td><p align="left"><select name="nominalToBinaryFilter">
      <option value = ""><b>TRUE</b></option>
      <option value = "-B"><b>FALSE</b></option>
    </select></td>
  </tr>
  <tr>
    <td height="23"><p align="left">normalizeAttribute </td>
    <td><p align="left"><select name="normalizeAttributes">
      <option value = ""><b>TRUE</b></option>
      <option value = "-R"><b>FALSE</b></option>
    </select></td>
  </tr>
  <tr>
    <td height="23"><p align="left">normailizaNumericClass </td>
    <td><p align="left"><select name="normailizaNumericClass">
      <option value = ""><b>TRUE</b></option>
      <option value = "-C"><b>FALSE</b></option>
    </select></td>
  </tr>
  <tr>
    <td height="23"><p align="left">reset </td>
    <td><p align="left"><select name="reset">
      <option value = ""><b>TRUE</b></option>
      <option value = "-R"><b>FALSE</b></option>
    </select></td>
  </tr>
  <tr>
    <td height="23"><p align="left">seed </td>
    <td><p align="left"><input name="seed" type="text" value="0" size="15
        " /></td>
  </tr>
  <tr>
    <td height="23"><p align="left">trainingTime </td>
    <td><p align="left"><input name="trainingTime" type="text" value="500" size="15
        " /></td>
  </tr>
  <tr>
    <td height="23"><p align="left">validationSetSize</td>
    <td><p align="left"><input name="validationSetSize" type="text" value="0" size="15
        " /></td>
  </tr>
  <tr>
    <td height="23"><p align="left">validationThreshold</td>
    <td><p align="left"><input name="validationThreshold" type="text" value="20" size="15
        " /></td>
  </tr>
  <tr>
    <td height="34" colspan="2" bgcolor="#FFFFFF"><p align="center"><input type="submit" value="Submit" name="btnSubmit" ></p></td>
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
