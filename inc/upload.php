<?php
session_start();
$target_dir = "uploads/";
$origin_file = $target_dir . basename($_FILES["file"]["name"]);
$target_file = $target_dir . session_id();
$uploadOk = 1;
$fileType = pathinfo($origin_file,PATHINFO_EXTENSION);
$target_file .= ".$fileType";
// Allow certain file formats
if($fileType != "arff" && $fileType != "csv") {
  echo "<script>alert('Sorry, only ARFF & CSV files are allowed.');</script>";
  $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "<script>alert('Sorry, your file was not uploaded.');</script>";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
      $_SESSION['relation'] = basename($_FILES["file"]["name"]);
      echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
      echo "<script>parent.$('#progressBar').html('Upload Complete').addClass('progress-bar-success');parent.$('#uploadCancelTab').hide();setTimeout(function(){parent.scanVirus();location.href='?action=scanVirus&noui=true';},500);</script>";
  } else {
      echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
  }
}
?>
