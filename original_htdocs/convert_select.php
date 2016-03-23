<?php
session_start();

$SID = session_id();

$info = pathinfo($_GET['key1']);
$ext = $info['extension'];
$data = $_GET['key2'];
$select = $_GET['key3'];
echo $select."<br>";
if ($ext == "arff") {

	if($select == "false"){
	?>
    <script>document.location ="selection_form.php?key1=<?php echo $data;?>&key2=<?php echo "Selection_data/";?>"</script>
    <?php
	}
	
		?> <script>document.location ="selection_form_n.php?key1=<?php echo $data;?>&key2=<?php echo "Selection_data/";?>"</script><?php
		

}  
else  if($ext == "csv") {

$cmd ="java -cp weka.jar weka.core.converters.CSVLoader Selection_data/".$data."_".$SID.".csv > Selection_data/".$data."_".$SID.".arff";
exec($cmd);
	if($select =="false"){
	 ?>
	 <script>
	 	document.location ="selection_form.php?key1=<?php echo $data;?>&key2=<?php echo "Selection_data/";?>";
	 </script>

 <?php

}
	?> <script>
		document.location ="selection_form_n.php?key1=<?php echo $data;?>&key2=<?php echo "Selection_data/";?>";
		</script>
		<?php
	
}
?>