<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>online Weka</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="themes/test.css" />
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> 
<script>
function myFunction() {
    var x = document.getElementById("myCheck").checked;
	var z;
	 if (x == true)
	 {
		 if(confirm("กำหนดจำนวนตัวแปร หรือ ไม่") == true){
			 z ="true";
			 } 
			 else
			 {
			 z ="false"; 
			 }
			 document.getElementById("Hidden2").value = z;
			 
	 }	
	
	 
    document.getElementById("Hidden").value = x;
 	var y = document.getElementById("file").value 
 		if (y == "")
 		{
 			alert(" ยังไม่ได้ เลือกไฟล์");
 			return false;
 		}
 
 		

	
	}	

</script>
<script  src="jquery-1.11.3.min.js"></script>
<script>

$(document).ready(function(){
    $('#selType').change(function(){
       if($(this).val()=='1'){
         $('#model').html('<option>-- เลือก Model --</option><option value="Linear_Regression">Linear Regression</option><option value="Multilayer_perceptron">Multilayer perceptron</option><option value="SVM_for_regression">SVM for regression</option>');
       } else if($(this).val()=='2'){
         $('#model').html('<option>-- เลือก Model --</option><option value="SVM_for_regression">SVM</option><option value="Logistic_regression">Logistic regression</option><option value="J48">J48</option><option value="ID3"> ID3</option>');
       } else if($(this).val()=='3'){
         $('#model').html('<option>-- เลือก Model --</option><option value="SimpleKmean">SimpleKmean</option><option value="HierarchicalClusterer">HierarchicalClusterer</option><option value="EM">EM</option>');
       }
    });
});
</script>
<style type="text/css">
body {
	background-color: #FFFFFF;
	color: #333;
	width: auto;
}
#apDiv1 {
	position: absolute;
	left: 60px;
	top: 463px;
	width: 67px;
	height: 48px;
	z-index: 1;
}
</style>
</head>

<body>
<p align="center">
<div data-role="page" id="page">
    <div data-role="header" data-position="fixed">
      <h1>Online Weka</h1>
      
   
   </div>
   <div style="position: relative; margin:auto; 
        top: 0px;  left: 0px;  width: 80%; height: autopx; overflow: auto;">
  <div data-role="content"><form name="formUpload" method="POST" action="upload.php" onsubmit="return myFunction();"  enctype="multipart/form-data" data-ajax="false">
<input type="hidden" value="" id="Hidden" name="Hidden1" />
<input type="hidden" value="" id="Hidden2" name="Hidden2" /><center><b><img src="mq1.gif" width="230" height="230" /></b></center>
      <b>Upload :</b>
      <input type="file" name="file_Data"  id="file"	size="20"   /> 
      <b>Function :</b>
	   <select name="type" id="selType">
	        <option value="0">-- เลือก Functions --</option>
	        <option value="1">การประมาณค่า</option>
	        <option value="2">การจำแนกประเภท</option>
	        <option value="3">การจัดกลุ่ม</option>
    </select>

	  <b> Model :</b><select name="model" id="model">
	     <option>-- เลือก Model --</option>
        </select><table width="283" border="0">
  <tr>
    <td><label for="checkbox-0" class="lable" >Attribute Selection
       
    
          <input type="checkbox"  id="myCheck" name="checkbox-0" />
        </label></td>
    <td>&nbsp;</td>
  </tr>
</table>

 
    <input type="submit" value="Upload" name="btnSubmit" />
          
  </div>
    
  </div>
  <div data-role="footer"  data-position="fixed">
      <h4>UTCC ICT #17 Senior Project </h4>
    </div>
  </p>
</form>

</body>
</html>


