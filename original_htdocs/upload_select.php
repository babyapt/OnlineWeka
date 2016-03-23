<?php

$info = pathinfo($_FILES['file_Data']['name']);
 $ext = $info['extension']; 

if($ext != "arff" && $ext != "csv"){ 
	
  ?>
  <script>
  alert("Sorry, File error / format only .arff and .csv");
  document.location = "index.php";
  </script>
  <?php
	}
	else{

 $newname = "SL_$SID.".$ext; 
 $n ="Data/$SID";


$target = 'Data/'.$newname;
move_uploaded_file( $_FILES['file_Data']['tmp_name'], $target);

}


  
?>