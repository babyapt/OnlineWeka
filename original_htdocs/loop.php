
<?php
$select = array(1,3,5);
$count = count($select);
$remove = 1;
$attribute = 5;

for ($a =0; $a < $count; $a++ )
{   echo $a."<br>"; 
		
for($remove = 1; $remove < $attribute; $remove++)

{
		if($remove == $select[$a] )
		{

			continue;

		}
		
			$cmd="java -cp weka.jar weka.filters.unsupervised.attribute.Remove -R ".$remove." -i Data\iris.arff  -o ".$a."iris.arff ";
			exec($cmd);
			echo $cmd."<br>";
			continue;

}

}
?>