<?php
$myfile = fopen("output_selection/Selecttion_fki6hcl32dhq8cp64nbnbn3l83.txt", "r") or die("Unable to open file!");
$data = fread($myfile,filesize("data/weather.nominal.arff"));

$target = "Selected attributes:";

if(strstr($data,$target))
{ 
	$position = strpos($data,"Selected attributes:");
	$test =substr($data,$position) ; 
	

function getdatabetween($string, $start, $end){
    $sp = strpos($string, $start)+strlen($start);
    $ep = strpos($string, $end)-strlen($start);
    $data = trim(substr($string, $sp, $ep));
    return trim($data);
}

$result = getdatabetween($test, "Selected attributes:"," :");
echo $result;

 
}



fclose($myfile);
?>
