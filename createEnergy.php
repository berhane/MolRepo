<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Molecular Cluster Repository</title>
<link href="includes/css/bootstrap.min.css" rel="stylesheet">
<link href="includes/css/style.css" rel="stylesheet">

 <link href="includes/css/bootstrap-grid.css" rel="stylesheet">



<script type="text/javascript" src="includes/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="includes/js/getPaper.js"></script>
<script type="text/javascript" src="includes/js/bootstrap.js"></script>
<script type="text/javascript" src="includes/js/ajaxTest.js"></script>

</head>

<body>
<?php
	require('includes/php/config.php');
	
	function error_handler($errno, $errstr) {
    global $last_error;
    $last_error = $errstr;
}

set_error_handler('error_handler');
?>
<div class="body">

<div class="title">
<div class="panel panel-primary">

<div class="panel-heading"><h1 align="left" class="style1"><a style="color: inherit; text-decoration:none" href='index.php'>Molecular Cluster Repository</a></h1></div>
    
	<div class="panel-body">
	
	<?php
		$title=stripslashes (htmlspecialchars($_POST["title"]));
		$authors=stripslashes (htmlspecialchars($_POST["authors"]));
		$description=stripslashes (htmlspecialchars($_POST["description"]));
		$pubDate=stripslashes (htmlspecialchars($_POST["pubDate"]));
		$paperLink=stripslashes (htmlspecialchars($_POST["paperLink"]));
		$reference=stripslashes (htmlspecialchars($_POST["reference"]));
		$setName=stripslashes (htmlspecialchars($_POST["setName"]));
		$tags=stripslashes (htmlspecialchars($_POST["tags"]));
		

		$SQL="INSERT INTO `Dataset`(`title`,`authors`,`description`,`datePub`,`dateAdded`,`dateModified`,`paperLink`,`reference`,`setName`,`tags`)
VALUES ('$title', '$authors', '$description', '$pubDate', NOW(), NOW(), '$paperLink', '$reference', '$setName', '$tags');";
	
	//echo $SQL;
		
	
	
 		// if(!mkdir('Coordinates/test', 0755, true)){
//  			echo "MKDIR failed, reason: $last_error\n";
//  			echo get_current_user();
//  		}
// 		else{
// 			chmod('Coordinates/test', 0755);
// 			echo "success";
// 		}	
		
		
		


		if(!empty($title) && !empty($authors) && !empty($description) && !empty($pubDate) && !empty($paperLink) && !empty($reference) && !empty($setName)){
			$targetDirectory='Coordinates/'.$setName."/";
			if(!is_dir($targetDirectory)){
				if(!mkdir($targetDirectory, 0775, true)){
					echo "MKDIR failed, reason: $last_error\n";
					echo get_current_user();
				}
				else{
					//echo "created";
					if(chmod($targetDirectory, 0777)){
						//echo "worked";
					}
					else{
						echo $last_error;
					}
				}
			}
			else{
				echo "set name already exists";
			}
		
			$result=$conn->query($SQL);
		
			if(!$result){
				echo $conn->error;
			}
		
		}
		else{
			//header ("Location:createDataset.php");
		}
		
	?>
	
	
	
	
	
	
 <form method="POST" action="" enctype="multipart/form-data">
  <div class="form-group">
   	<label for="img1">Please Format Cluster Enegry Information in a CSV File as Displayed Below</label>
   	<img src="includes/img/DataTable.png" alt="please use different browser" style="display: block; width:740px; height:auto"><br>
    <label for="energyData">Cluster Energy Data Upload:</label>
    <input type="file" class="form-control inp" id="energyData" accept=".csv" name="energyData">
    <label for="img1">Please Format Molecule Information in a CSV File as Displayed Below</label>
   	<img src="includes/img/MoleculeExample.png" alt="please use different browser" style="display: block; width:740px; height:auto"><br>
    <label for="moleculeData">Molecule Data:</label>
    <input type="file" class="form-control inp" id="moleculeData" name="moleculeData" accept=".csv">
    <label for="img1">Please select all of the coordinate (.xyz) files and (.txt) files and upload them below </label>
    <img src="includes/img/selectfiles.png" alt="please use different browser" style="display: block; width:740px; height:auto"><br>
    <label for="moleculeData">Molecule Coordinate XYZ files (.xyz)</label>
    <input type="file" class="form-control inp" id="coordinateXYZ" name="coordinateXYZ[]" accept=".xyz" required multiple="multiple">
    <input type="text" class="hidden" name="setName" value="<?php echo $setName; ?>">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>

 </div>

<?php
	$targetDirectory='Coordinates/'.$_POST["setName"]."/";
	//echo $targetDirectory."<br>";
	// $targetDirectory='Coordinates/'.$setName."/";
// 	if(mkdir($targetDirectory, 0775, true)){
// 		echo "true";
// 	}
// 	else{
// 		echo $last_error;
// 	}
	$energyTableData=$_FILES["energyData"];
	$energyMoleculeData=$_FILES["moleculeData"];
	$coordinateXYZFiles=$_FILES["coordinateXYZ"];
	$coordinateTXTFiles=$_FILES["coordinateTXT"];
	
	if(isset($energyTableData)){
		//echo $energyTableData['name']."<br>";
	}
	else{
		echo $_FILES['energyData']['error'];
	}
	
	if(!empty($_FILES["coordinateXYZ"]['name'])){
		// if($_FILES["coordinateXYZ"]["error"]!==UPLOAD_ERR_OK || $_FILES["coordinateTXT"]["error"]!==UPLOAD_ERR_OK){
// 			$err=$_FILES["coordinateXYZ"]["error"][0];
// 			echo "<p>An error Occurred: $err</p>";
// 		}
		$coordinateXYZFiles=$_FILES["coordinateXYZ"]['name'];
		for($int=0;$int<count($coordinateXYZFiles);$int++){
			if($_FILES["coordinateXYZ"]["error"][$int]==UPLOAD_ERR_OK){
				$xyzFile=$_FILES["coordinateXYZ"]["name"][$int];
				if(!file_exists($targetDirectory.$xyzFile)){
					$txtFile=substr($xyzFile,0,-4).".txt";
					//$txtFile=$xyzFile;
					
					$success1=copy($_FILES["coordinateXYZ"]["tmp_name"][$int],$targetDirectory.$txtFile);
					if(!$success1){
						echo $last_error;
					}
					
					$success=move_uploaded_file($_FILES["coordinateXYZ"]["tmp_name"][$int],$targetDirectory.$xyzFile);
					if($success){
						//echo $targetDirectory.$xyzFile."<br>";
					}
					else{
						echo $last_error.'<br>';
					}
					
					
					
					
					
				}
				else{
					echo "<p>Error: it seems that you have already uploaded the file: $xyzFile to the directory</p>";
				}
			}
			else{
				"<p>An error Occurred: check your directory to make sure all files are of the same type</p>";
			}
		}
	
		// $coordinateTxtFiles=$_FILES["coordinateTXT"]['name'];
// 		for($i=0;$i<count($coordinateTxtFiles);$i++){
// 			if($_FILES["coordinateTXT"]["error"][$i]==UPLOAD_ERR_OK){
// 				$txtFile=$_FILES["coordinateTXT"]["name"][$i];
// 				if(!file_exists($targetDirectory.$txtFile)){
// 					$success=move_uploaded_file($_FILES["coordinateTXT"]["tmp_name"][$i],$targetDirectory.$txtFile);
// 					if($success){
// 						//echo $targetDirectory.$txtFile."<br>";
// 					}
// 					else{
// 						echo $last_error.'<br>';
// 					}
// 				}
// 				else{
// 					echo "<p>Error: it seems that you have already uploaded the file: $txtFile to the directory</p>";
// 				}
// 			}
// 			else{
// 				"<p>An error Occurred: check your directory to make sure all files are of the same type</p>";
// 			}
// 		}
	}
	chmod($targetDirectory, 0755);
	
	require("csvUpload.php");
?>





</div>
</div>
</div>







<!-- <h3>Order Now!</h3>
<p><a href="http://marcy.furman.edu/wiki/doku.php">Return to Homepage</a></p>
<p>&nbsp;</p> -->
<div>

</div>
</body>
</html>
