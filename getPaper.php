



<?php
  require('includes/php/config.php');
?>
      <?php
      $setName=$_POST['name'];
      //$setName="TestSet1";
      
      	echo "<table class='table table-striped'>";
      	
        $sql="SELECT `".$setName."`.*, `Dataset`.setName FROM `".$setName."`, `Dataset` WHERE `".$setName."`.dataID=`Dataset`.dataID ORDER by item";
        $result=$conn->query($sql);
        if($result){
        	$numRows=mysqli_num_rows($result);
        	if($numRows>0){
        		echo "<thead><tr>";
        		$array=mysqli_fetch_assoc($result);
        		$count=count($array);
        		$item=$array;
        		$nameArray=array();
        		$nameCount=0;
        		for($i=0;$i<$count;$i++){	
        			if(key($item)!="item" && key($item)!="dataID" && key($item)!="symmetry" && key($item)!="filename" && key($item)!="energytype" && key($item)!="tags" && key($item)!="basisset" && key($item)!="setName" && key($item)!="systemName"){
        				echo "<th>".key($item)."</th>";
        				$nameArray[$nameCount]=key($item);
        				$nameCount++;
        			}
        			else if(key($item)=="basisset"){
        				echo  "<th>Optimiztion Level</th>";
        				$nameArray[$nameCount]=key($item);
        				$nameCount++;
        			}
        			else if(key($item)=="systemName"){
        				echo  "<th>System Name</th>";
        				$nameArray[$nameCount]=key($item);
        				$nameCount++;
        			}
        			next($item);
        		}
        		echo "</tr></thead>";
        		
        		
        		for($k=0; $k<$numRows; $k++){
					echo "<tr>";
					for($j=0;$j<$nameCount;$j++){
						if(!strpos($nameArray[$j],"name") && !strpos($nameArray[$j],"Name")){
							//echo $nameArray[$j];
							echo  "<td>".$array[$nameArray[$j]]."</td>";
						}
						else if(strpos($nameArray[$j],"Name") || strpos($nameArray[$j],"name")){
							echo "<td><a href='#' title='".$setName."'"." id='".$array[$nameArray[$j]]."'"." name='".$array["filename"]."' onclick='getStructure(this.id,this.name,".$array["dataID"].",this.title)' class='anchor paperButton'>".$array[$nameArray[$j]]."</a></td>";
						}
					}
					echo "</tr>";
					$array=mysqli_fetch_assoc($result);
				}
        		
        	}
        	
        	
        	
        	
        }
        else{
        	echo $conn->error;
        }
        
      ?>

      <?php 
      
      	

      		
      
      
          // for($i=0;$i<$numRows;$i++){
//             $array=mysqli_fetch_assoc($result);
//             extract($array);
//             echo "<tr>";
//             echo "<td><a href='#' title='$setName' id='$name' name='$filename' onclick='getStructure(this.id,this.name, $dataID,this.title)' class='anchor paperButton'>".$name."</a></td>";
//             echo "<td>".$baisset."</td>";
//             echo "<td>".$MP2."</td>";
//             echo "<td>".$CBS."</td>";
//             echo "</tr>";
     //     }
     echo "</table>";
      ?> 
      
