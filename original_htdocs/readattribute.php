<?php
function startsWith($haystack, $needle) {
   
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
}

$file = fopen("data/iris.arff", "r") ;
$i = 0;
while(!feof($file))
{
	$result = fgets($file);
 if (strstr($result,"@ATTRIBUTE"))
 {

 if(startsWith($result, '@ATTRIBUTE' )) 
 {
 
   $result3 = explode(" ", $result);
   
   $result4 = explode("\t", $result3[1]);
   

   /////////////////// xxx /////////////
  $x[] = "$result4[0]";

 
 ////////////////////////////////
 }

}
 else if (startsWith($result, '@attribute' )) 
 {
   $result3 = explode(" ", $result);
   
   $result4 = explode("\t", $result3[1]);
   
   $x[] = "$result4[0]";

    }
}

$myfile = fopen("data/iris.arff", "r") or die("Unable to open file!");
$data = fread($myfile,filesize("data/iris.arff"));
if(strstr($data,"@attribute"))
{
   $count = substr_count($data,"@attribute");
}
else

   $count = substr_count($data,"@ATTRIBUTE");


fclose($file);

?>
<select name="years">

<?php 
$i = 0;
for($x[$i]; $i<$count; $i++)
{
    $v = $i+1;
    echo "<option value=".$v.">".$x[$i]."</option>";
}
?> 
     <option name="years"> </option>   
</select> 


