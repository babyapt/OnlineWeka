<?php
session_start();

$SID = session_id();

$info = pathinfo($_GET['key1']);
$ext = $info['extension'];
$data = $_GET['key2'];

if ($ext == "arff") {




	 ?>
	 <script>document.location ="test_list1.php?key1=<?php echo $data;?>&key2=<?php echo "Data/";?>";
	 
	 </script>

<?php

}  
else  if($ext == "csv") {

$cmd ="java -cp weka.jar weka.core.converters.CSVLoader Data/".$data."_".$SID.".csv > ConvertFile/".$data."_".$SID.".arff";
exec($cmd); echo $cmd;
	 ?>
	 <script>
		document.location ="test_list1.php?key1=<?php echo $data;?>&key2=<?php echo "ConvertFile/";?>";
	 </script>                           

 <?php

}




?>