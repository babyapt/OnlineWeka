<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Error Weka Process</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="themes/test.css" />
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<link rel="icon" type="image/png" href="mq1.gif" sizes="16x16">
<link rel="icon" type="image/png" href="mq1.gif" sizes="32x32">
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.button.min.js" type="text/javascript"></script>
<script> function myFunction() {
document.location ="index.php"; 
}
</script>
</head>
<body>
<div data-role="page" id="page">
  <div data-role="header" data-position="fixed">
    <h1>Error Weka Process</h1>
  </div>
  <div data-role="content"><?php
session_start();
$SID = session_id();


			
			$text = file("errorcmd/".$SID.".txt");
			foreach($text as $value){
   			print "<font color=\"red\"><B> $value</br> </B></font>";
}
?>
<br>
<br>
<div style="position: relative; margin:auto; 
        top: 0px;  left: 0px;  width: 80%; height: autopx; overflow: auto;">
    <button id="Button1" onclick="myFunction()">กลับไปหน้าแรก</button>
  </div> 
  <div data-role="footer" data-position="fixed">
    <h4>The University of the Thai Chamber of Commerce</h4>
 
 </div>
</div>

</body>
</html>