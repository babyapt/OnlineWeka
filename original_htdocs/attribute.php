<?php
$myfile = fopen("data/iris.arff", "r") or die("Unable to open file!");
$data = fread($myfile,filesize("data/iris.arff"));

function startsWith($haystack, $needle) {
   
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
}
$file = fopen("data/iris.arff", "r") ;


$a = strrpos($data,"@ATTRIBUTE")."<br>";

$b = strlen($data);


$c = explode(" ", $data);
 echo "$c[0]";


$word ="How are you";
 if (strpos($word,'are') !== false) {
    echo 'true';
}
  
 /*if (strstr($data,"@ATTRIBUTE"))
 {

 if(startsWith($data, '@ATTRIBUTE' )) 
 {
 
   $result3 = explode(" ", $data);
   
   $result4 = explode("\t", $result3[1]);
   
   echo "$result3[0],";
   
 } 
}
 else if (startsWith($data, '@attribute' )) 
 {
   $result3 = explode(" ", $data);
   
   $result4 = explode("\t", $result3[1]);
   
   echo  "$result3[0],";
    }
*/



?>