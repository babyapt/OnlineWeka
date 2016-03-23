<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Linear Regression</title>
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
<script language="javascript">

function check(){
	var num_fold = document.libsvm.Folds.value;
 var instance = "<?=$result?>";
  if(x = num_fold)
  {
  if (x > 0 && x <= instance){
		alert("Fold ="+x+ " / intance ="+instance);}

	else {
		alert("Problem evaluation Classifirer : Can't have more folds than instance  ("+instance+")");
		 return false;}

  }
var Percen = document.libsvm.Percen.value;
 
   if(Percen > 0 && Percen <= 100)
  {}
	else  {
		alert("Problem evaluating Classifirer : Percentage must be between 0 and 100");
		  return false;}
		


}

</script>
<body>
<div data-role="page" id="page">
  <div data-role="header">
    <h1>SVM for regression</h1>
  </div>
  <div style="position: relative; margin:auto; 
        top: 0px;  left: 0px;  width: 80%; height: autopx; overflow: auto;">
  <div data-role="content"><form action="svm_for_regression_p.php" method="post" name="libsvm" onsubmit="return check()"  data-ajax="false">
 <input type="hidden" value="<?php echo $file; ?>"  name="Hidden" />
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
<table width="200" border="0">
  <tr>
    <td><ul data-role="listview" data-inset="true">
<li data-role="list-divider" data-theme="a" data-swatch="a" data-form="ui-bar-a">ค่าพารามิเตอร์</li>
  <li data-form="ui-body-a" data-swatch="a" data-theme="a">
  
<table width="532" height="819" border="0" align="center">
  
  <tr>
    <td height="40">SVMType</td>
    <td><select name="SVMType">
      <option value = "0"><b>C-SVC(classfication)</b></option>
      <option value = "1"><b>nu-SVC(classification)</b></option>
      <option value = "2"><b>one-class SVM (classfication)</b></option>
      <option value = "3"><b>epsilon-SVR(regression)</b></option>
      <option value = "4"><b>nu-SVR(regression)</b></option>
    </select></td>
  </tr>
  <tr>
    <td height="40">cacheSize</td>
    <td><input name="cacheSize" type="text" value="40" size="15
        " /></td>
  </tr>
  <tr>
    <td >coef0</td>
    <td><input name="coef0" type="text" value="0.0" size="15
        " /></td>
  </tr>
  <tr>
    <td >cost</td>
    <td><input name="cost" type="text" value="1.0" size="15
        " /></td>
  </tr>
  <tr>
    <td>debug</td>
    <td><select name="debug" size="1">
      <option value = ""><b>FALSE</b></option>
      <option value = ""><b>TRUE</b></option>
    </select></td>
  </tr>
  <tr>
    <td >degree</td>
    <td><input name="degree" type="text" value="3" size="15
        " /></td>
  </tr>
  <tr>
    <td >doNotReplaceMissingValues</td>
    <td><select name="doNotReplaceMissingValues" size="1">
      <option value = ""><b>FALSE</b></option>
      <option value = "-V"><b>TRUE</b></option>
    </select></td>
  </tr>
  <tr>
    <td >eps</td>
    <td><input name="eps" type="text" value="0.001" size="15
        " /></td>
  </tr>
  <tr>
    <td >gamma</td>
    <td><input name="gamma" type="text" value="0.0" size="15
        " /></td>
  </tr>
  <tr>
    <td >kernelType</td>
    <td><select name="kernelType">
      <option value = "-K 0"><b>linear: u'*v)</b></option>
      <option value = "-K 1"><b>polynomial: (gamma*u'*v + coef0)^degree</b></option>
      <option value = "-K 2"><b>radial basis function: exp(-gamma*|u-v^2)</b></option>
      <option value = "-K 3"><b>sigmoid: tanh(gamma*u'*v+coef0)</b></option>
    </select></td>
  </tr>
  <tr>
    <td >loss</td>
    <td><input name="loss" type="text" value="0.1" size="15
        " /></td>
  </tr>
  <tr>
    <td >normalize</td>
    <td><select name="normalize" size="1">
      <option value = ""><b>FALSE</b></option>
      <option value = "-Z"><b>TRUE</b></option>
    </select></td>
  </tr>
  <tr>
    <td >nu</td>
    <td><input name="nu" type="text" value="0.5" size="15
        " /></td>
  </tr>
  <tr>
    <td >probabilityEstimates</td>
    <td><select name="probabilityEstimates" size="1">
      <option value = ""><b>FALSE</b></option>
      <option value = "-B"><b>TRUE</b></option>
    </select></td>
  </tr>
  <tr>
    <td >seed</td>
    <td><input name="seed" type="text" value="1" size="15
        " /></td>
  </tr>
  <tr>
    <td >shrinking</td>
    <td><select name="shrinking" size="1">
      <option value = ""><b>TRUE</b></option>
      <option value = "-H"><b>FALSE</b></option>
    </select></td>
  </tr>
  <tr>
    <td ><p>weight</p></td>
    <td>
      <input name="weight" type="text" value="-W 2.0" size="15
        " />

    </td>
  </tr>
  <tr>
    <td height="42" colspan="2"><p align="center"><input type="submit" value="Submit" name="btnSubmit" ></p></td>
  </tr>
</table></li></td>
  </tr>
</table>


</form></div>
  
</div>
<div data-role="footer" data-position="fixed">
    <h4>The University of the Thai Chamber of Commerce</h4>
  </div>

</body>
</html>
