<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Linear Regression</title>
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
<script language="javascript">

function check(){
	var num_fold = document.form_linear.Folds.value;
 var instance = "<?=$result?>";
  if(x = num_fold)
  {
  if (x > 0 && x <= instance){
		alert("Fold ="+x+ " / intance ="+instance);}

	else {
		alert("Problem evaluation Classifirer : Can't have more folds than instance  ("+instance+")");
		 return false;}

  }
var Percen = document.form_linear.Percen.value;
 
   if(Percen > 0 && Percen <= 100)
  {}
	else  {
		alert("Problem evaluating Classifirer : Percentage must be between 0 and 100");
		  return false;}
		


}

</script>
<body>
<div data-role="page" id="page">
  <div data-role="header" data-position="fixed">
    <h1>Linear Regression</h1>
  </div>
  <div style="position: relative; margin:auto; 
        top: 0px;  left: 0px;  width: 80%; height: autopx; overflow: auto;">
  <div data-role="content"><center><form action="linear_para.php" method="post" name="form_linear"  onsubmit="return check()" data-ajax="false">
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
  <td>
  <ul data-role="listview" data-inset="true">
<li data-role="list-divider" data-theme="a" data-swatch="a" data-form="ui-bar-a">ค่า พารามิเตอร์</li>    
  <li data-form="ui-body-a" data-swatch="a" data-theme="a"> 
  <table width="331" border="0" align="center">
    <tr>
      <td height="40">attributeSelectionMethod</td>
      <td><select name="attributeSelectionMethod">
        <option value = "0"><b>M5method</b></option>
        <option value = "1"><b>No attribute selection</b></option>
        <option value = "2"><b>Greedy method</b></option>
      </select></td>
    </tr>
    <tr>
      <td height="40">debug</td>
      <td><select name="debug" size="1">
        <option value = ""><b>FALSE</b></option>
        <option value = "-D"><b>TRUE</b></option>
      </select></td>
    </tr>
    <tr>
      <td height="40">eliminateColinearAttributes</td>
      <td><select name="eliminateColinearAttributes">
        <option value = ""><b>TRUE</b></option>
        <option value = "-C"><b>FALSE</b></option>
      </select></td>
    </tr>
    <td width="144" height="40"><p>ridge</p></td>
    <td><p>
      <input name="ridge" type="text" value="1.0E-8" size="15
        " />
  </p></td>
  </tr>
  <tr>
    <td height="34" colspan="2"><p align="center"><input type="submit" value="Submit"   name="btnSubmit"></p></td>
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
