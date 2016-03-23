
<?php 
error_reporting( error_reporting() & ~E_NOTICE );
$check = $_POST['Hidden1'];
$select = $_POST['Hidden2'];
$model =$_POST['model'];

session_start();

$SID = session_id();

 $info = pathinfo($_FILES['file_Data']['name']);
 $ext = $info['extension']; 

if($ext != "arff" && $ext != "csv"){ 
	
  ?>
  <script>
  alert("Sorry, File error / format only .arff and .csv");
  document.location = "index.php";
  window.history.back();
  </script>
  <?php
	}
	else

  {
   if($check == "false")
        {
 $newname = $model."_$SID.".$ext; 
 $n ="Data/$SID";


$target = 'Data/'.$newname;
move_uploaded_file( $_FILES['file_Data']['tmp_name'], $target);

         }
        
   else if($check == "true")
        {
  $newname = $model."_$SID.".$ext; 
  $n ="Selection_data/$SID";


$target = 'Selection_data/'.$newname;
move_uploaded_file( $_FILES['file_Data']['tmp_name'], $target);

         }
}
if($check =="true") {

  ?>
  <script>
  document.location ="convert_select.php?key1=<?php echo $newname; ?>&key2=<?php echo $model; ?>&key3=<?php echo $select; ?>";
  </script>
  <?php
}
else if($check =="false") {

  ?>
  <script>
  document.location ="convert.php?key1=<?php echo $newname; ?>&key2=<?php echo $model; ?>";
  </script>
  <?php
}
?>