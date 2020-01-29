<?php
	require('config.php');
	
	//$setName="TestSet";
	//$name="0A";
	$sql3="SELECT * FROM `".$setName."`  WHERE `systemName`='".$name."'";
	 
	$result3=$conn->query($sql3);
	if($result3){
		$numRows=mysqli_num_rows($result3);
		$array=mysqli_fetch_assoc($result3);
		//extract($array);
		
		echo "<table class='table table-striped'>";
    	echo "<tr><th>Method</th><th>CounterpoiseCorrected</th><th>remark</th><th>Value</th></tr>";
    	for($i=0;$i<sizeof($array);$i++){
                    $key=key($array);
                    if($key!="item" && $key!="dataID" && $key!="symmetry" && $key!="filename" && $key!="energytype" && $key!="tags" && $key!="baisset" && $key!="setName" && $key!="systemName" && $key!="energyType" && $key!="energy_type" && $key!="basisset"){
                    	$value=$array[$key];
                    	echo "<tr><td>$key</td><td>no</td><td></td><td>$value</td><tr>";
                    }
                    next($array);
                }
    		
    	
    	echo "</table>";

		
	}
	else{
		echo $conn->error;
	}
	
	
	
	
	
?>