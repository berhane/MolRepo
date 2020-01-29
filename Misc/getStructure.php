<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Structure Details</title>
<link href="includes/css/bootstrap.min.css" rel="stylesheet">
<link href="includes/css/style.css" rel="stylesheet">


<link href="includes/css/bootstrap-grid.css" rel="stylesheet">

<script type="text/javascript" src="includes/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="includes/js/bootstrap.js"></script>
<script type="text/javascript" src="includes/jsmol/JSmol.min.js"></script>
<script type="text/javascript" src="includes/jsmol/js/JSmoljQueryExt.js"></script>
<script type="text/javascript" src="includes/jsmol/js/JSmolCore.js"></script>
<script type="text/javascript" src="includes/jsmol/js/JSmolApplet.js"></script>
<script type="text/javascript" src="includes/jsmol/js/JSmolApi.js"></script>
<script type="text/javascript" src="includes/jsmol/js/JSmolControls.js"></script>
<script type="text/javascript" src="includes/jsmol/js/j2sjmol.js"></script>
<script type="text/javascript" src="includes/jsmol/js/JSmol.js"></script>
<script type="text/javascript" src="includes/jsmol/js/JSmolConsole.js"></script>
<script type="text/javascript" src="includes/jsmol/js/JSmolMenu.js"></script>
</head>

<body>
<?php
	require('includes/php/config.php');
?>
<div class="body">

<div class="title">
<div class="panel panel-primary">

<div class="panel-heading"><h1 align="left" class="style1"><a style="color: inherit; text-decoration:none" href='index.php'>Mercury Consortium Furman</a></h1></div>
    <div class="panel-body">
    	<?php
    	session_start();
        $name=$_POST["name"];
    	// $name=$_SESSION["moleculeName"]="water-2-Cs";
    	$sql2="SELECT title, reference, optimizationRef, tags, numberOfAtoms FROM  `Dataset` ,  `Molecule` 
WHERE  `Dataset`.dataID =  `Molecule`.dataID
AND  `Molecule`.name =  '$name'";
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
    <h6 class="card-subtitle mb-2 text-muted">From Dataset: '. $title.'</h6>
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
    	$sql="SELECT elementName, xcor, ycor, zcor
FROM  `Molecule` ,  `Structure` 
WHERE  `Molecule`.molID =  `Structure`.molID
AND  `Molecule`.name =  '$name'";
        $result=$conn->query($sql);
        if($result){
        	$numRows=mysqli_num_rows($result);
        	
        	echo "<table class='table table-sm' style='width:40%'>";
        	echo"<tr><th>$numberOfAtoms</th>
        	<th></th><th></th><th class='entry'></th></tr>";
        		
        	for($i=0;$i<$numRows;$i++){
        		$array=mysqli_fetch_assoc($result);
            	extract($array);
        		echo "<tr>";
        		echo "<td class='entry'>$elementName</td>";
        		echo "<td class='entry'>$xcor</td>";
        		echo "<td class='entry'>$ycor</td>";
        		echo "<td class='entry'>$zcor</td>";
        		echo "</tr>";
        	}
        	echo "</table>";
        }
        else{
        	echo $conn->error;
        }

    	?>
        <h6 class="card-subtitle mb-2 text-muted">Energies:</h6>
        <?php
            $sql3="SELECT  `MP2/CBS/CBS` ,  `MP2-aug-cc-pVDZ` ,  `MP2-aug-cc-pVTZ` ,  `MP2-aug-cc-pVQZ` ,  `CCSD(T)/CBS/CBS` 
FROM  `Water_Cluster` 
WHERE systemName = '$name'";
            $result3=$conn->query($sql3);
            if($result3){
                $numRows=mysqli_num_rows($result3);
                $array=mysqli_fetch_assoc($result3);
                //extract($array);

                
            }
            else{
                echo $conn->error;
            }

            echo "<table class='table table-striped'>";
            echo "<tr><th>Method</th><th>CounterpoiseCorrected</th><th>remark</th><th>Value</th></tr>";

            for($i=0;$i<sizeof($array);$i++){
                    $key=key($array);
                    $value=$array[$key];
                    echo "<tr><td>$key</td><td>no</td><td></td><td>$value</td><tr>";
                    next($array);
                }

            echo "</table>";
        ?>


    </div>
</div>
</div>