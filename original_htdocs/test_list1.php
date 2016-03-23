<?php
$model = $_GET['key1'];
$result = $_GET['key2'];

if($model == "Linear_Regression")
{

	?>
	<script>
	document.location ="Linear.php?key=<?php echo $result; ?>&key2=<?php echo $model;?>"
	</script>
	<?php

}
else if($model == "Multilayer_perceptron")
{
	?>
	<script>
	document.location ="MultilayerPerceptron.php?key=<?php echo $result; ?>&key2=<?php echo $model;?>"
	</script>
	<?php
}
else if($model == "SVM_for_regression")
{
	?>
	<script>
	document.location ="svm_for_regression.php?key=<?php echo $result; ?>&key2=<?php echo $model;?>"
	</script>
	<?php
}
else if($model == "Libsvm")
{
	?>
	<script>
	document.location ="Libsvm.php?key=<?php echo $result; ?>&key2=<?php echo $model;?>"
	</script>
	<?php
}
else if($model == "Logistic_regression")
{
	?>
	<script>
	document.location ="Logistic_form.php?key=<?php echo $result; ?>&key2=<?php echo $model;?>"
	</script>
	<?php
}
else if($model == "J48")
{
	?>
	<script>
	document.location ="J48_form.php?key=<?php echo $result; ?>&key2=<?php echo $model;?>"
	</script>
	<?php
}
else if($model == "ID3")
{
	?>
	<script>
	document.location ="ID3_form.php?key=<?php echo $result; ?>&key2=<?php echo $model;?>"
	</script>
	<?php
}
else if($model == "SimpleKmean")
{
	?>
	<script>
	document.location ="SimpleKMeans_form.php?key=<?php echo $result; ?>&key2=<?php echo $model;?>"
	</script>
	<?php
}
else if($model == "HierarchicalClusterer")
{
	?>
	<script>
	document.location ="HierarchicalClusterer_form.php?key=<?php echo $result; ?>&key2=<?php echo $model;?>"
	</script>
	<?php
}
else if($model == "EM")
{
	?>
	<script>
	document.location ="EM_form.php?key=<?php echo $result; ?>&key2=<?php echo $model;?>"
	</script>
	<?php
}
else
{
	?>
	<script>
	alert('ยังไม่ได้เลือก Function');
	document.location ="Import.php";
	</script>
	<?php
}

?>
