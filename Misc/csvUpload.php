<?php
	require('includes/php/config.php');
	
    
	$setName=$_POST['setName'];
	//echo "This is included".$_POST['setName']."<br>";
	if(isset($_FILES["energyData"]) && isset($_FILES['moleculeData'])){
		 $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
		 if(!empty($_FILES["energyData"]['name']) && !empty($_FILES["moleculeData"]['name']) && in_array($_FILES["energyData"]['type'],$csvMimes) && in_array($_FILES["moleculeData"]['type'],$csvMimes)){
		 	if(is_uploaded_file($_FILES["energyData"]['tmp_name']) && is_uploaded_file($_FILES["moleculeData"]['tmp_name']) ){
		 		
		 		
		 		
		 		
		 		
		 		
		 		
		 		$SQL1="CREATE TABLE `".$setName."` (`item` int(11) NOT NULL AUTO_INCREMENT, `dataID` int(11) NOT NULL,";
		 		$csvFile = fopen($_FILES["energyData"]['tmp_name'], 'r');
		 		$nameline=fgetcsv($csvFile);
		 		$SQL2Base="INSERT INTO `".$setName."` (`dataID`,";
		 		//echo count($line)."<br>";
		 		if(count($nameline)<20){
					for($i=0;$i<count($nameline);$i++){
						$row="`".trim(htmlspecialchars($nameline[$i]))."` varchar(255) NOT NULL,";
						$SQL1=$SQL1.$row;
						$SQL2Base=$SQL2Base."`".trim(htmlspecialchars($nameline[$i]))."`,";
					}
					$SQL1=$SQL1."PRIMARY KEY (`item`))";
					$result=$conn->query($SQL1);
					if(!$result){
						//echo $conn->error;
					}
					//echo $SQL1."<br>";
					
					
					
					
					
				$SQL="SELECT  `dataID` FROM  `Dataset` WHERE setName ='".$setName."'";
		 		$result=$conn->query($SQL);
		 		if(!$result){
		 			echo $conn->error."<br>";
		 		}
    			$numRows=mysqli_num_rows($result);
    			//echo $numRows;
    			//echo $setName;
    			if($numRows>1){
    				echo "error occurred: please contact system administrator";
    			}
    			else{
    				$array=mysqli_fetch_assoc($result);
    				extract($array);
    				//echo "DataID: ".$dataID."<br>";
    			}
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					$SQL2Base=substr($SQL2Base,0,-1).")";
					
					//echo $SQL2Base."<br>";
					
					$count=0;
					
					while(($line=fgetcsv($csvFile))!=false){
						
						$SQL2=$SQL2Base." VALUES ($dataID,";
						for($iint=0;$iint<count($line);$iint++){
							$SQL2=$SQL2."'".$line[$iint]."',";
							//echo $nameline[$iint].": ".$line[$iint]."<br>";
						}
						$SQL2=substr($SQL2,0,-1).")";
						$result=$conn->query($SQL2);
						if(!$result){
							echo $conn->error."<br>";
						}
						//echo $SQL2."<br>";
						//echo "hi";
						$count++;
					}
					
		 		}
		 		fclose($csvFile);
		 		
		 		$csvFile2 = fopen($_FILES["moleculeData"]['tmp_name'], 'r');
		 		$moleculeline=fgetcsv($csvFile2);
		 		$SQL3Base="INSERT INTO `Molecule` (`dataID`,`tags`, `name`, `optimizationRef`)";
		 		while(($moleculeline=fgetcsv($csvFile2))!=false){
						$SQL3=$SQL3Base." VALUES ($dataID,";
						for($iint=0;$iint<count($moleculeline);$iint++){
							$SQL3=$SQL3."'".$moleculeline[$iint]."',";
							//echo $nameline[$iint].": ".$line[$iint]."<br>";
						}
						$SQL3=substr($SQL3,0,-1).")";
						//echo $SQL3."<br>";
						$result=$conn->query($SQL3);
						if(!$result){
							echo $conn->error."<br>";
						}
						//echo $SQL2."<br>";
						//echo "hi";
						$count++;
					}
		 		
		 		
		 		
		 	}
		 }
	}
	else{
		//echo "aint nothing here fam";
	}

?>