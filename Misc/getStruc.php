<?php
		require('includes/php/config.php');
    	session_start();
        $name=$_POST["name"];
        $filename=$_POST["filename"];
        $dataID=$_POST['dataID'];
        
        
        //echo $name.$filename.$dataID."<br>";
        
        
        
        
    	//$name=$_SESSION["moleculeName"]="water-2-Cs";
    	$sql2="SELECT setName, title, reference, optimizationRef, `Molecule`.tags, paperLink, numberOfAtoms, comment,setName FROM  `Dataset` ,  `Molecule` 
WHERE  `Dataset`.dataID =  `Molecule`.dataID
AND  `Molecule`.name =  '$name' AND  `Dataset`.dataID= $dataID ORDER BY molID";
		$result1=$conn->query($sql2);
		if($result1){
			$numRows=mysqli_num_rows($result1);
        	for($i=0;$i<$numRows;$i++){
        		$array=mysqli_fetch_assoc($result1);
            	extract($array);
            	//echo "<h3>$name</h3><br>";
            	//echo "<h4></h4>";
            	echo '<div class="card">
  <div class="card-block">
    <h4 class="card-title">'.$name.'</h4>
    <h6 class="card-subtitle mb-2 text-muted">From Dataset: <a href="#" name="'.$setName.'" onclick="getPaper(this.name)">'.$title.'</a></h6>
    <h6 class="card-subtitle mb-2 text-muted">Reference: <a href="'.$paperLink.'">'.$reference.'</a></h6>
    <h6 class="card-subtitle mb-2 text-muted">Optimization Level: '. $optimizationRef.'</h6>
    <h6 class="card-subtitle mb-2 text-muted">Tags: '.$tags.'</h6><br>
    <h6 class="card-subtitle mb-2 text-muted">Structure:</h6>
  </div>
</div>';

        	}
		}
		else{
			echo $conn->error;
		}
    	?>

    	<?php
   	echo '<iframe class="structureViewer" width="40%" height="350px" src="Coordinates/'.$setName."/".$filename.'.txt">
   </iframe><br>';
    	?>




      
<div id="appdiv"></div>

         <h6 class="card-subtitle mb-2 text-muted">Energies:</h6>
	         <?php
	       	require("includes/php/getPaperEnergy.php");
           
	      ?>
