<?php
	$energyTableData=$_FILES["energyData"];
	$energyMoleculeData=$_FILES["moleculeData"];
	$coordinateXYZFiles=$_FILES["coordinateXYZ"];
	$coordinateTXTFiles=$_FILES["coordinateTXT"];
	
	
	if(isset($energyTableData)){
		echo "hi";
	}
	else{
		echo $_FILES['energyData'][0];
	}
	echo $_POST["test"];
?>