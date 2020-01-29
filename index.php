<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112754771-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112754771-1');
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Molecular Cluster Repository</title>
<link href="includes/css/bootstrap.min.css" rel="stylesheet">
<link href="includes/css/style.css" rel="stylesheet">

 <link href="includes/css/bootstrap-grid.css" rel="stylesheet">



<script type="text/javascript" src="includes/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="includes/js/getPaper.js"></script>
<script type="text/javascript" src="includes/js/bootstrap.js"></script>
<script type="text/javascript" src="includes/js/tags.js"></script>
<script type="text/javascript" src="includes/js/ajaxTest.js"></script>
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
<script>
Jmol._isAsync = false;

// last update 2/18/2014 2:10:06 PM

var jmolApplet0; // set up in HTML table, below

// logic is set by indicating order of USE -- default is HTML5 for this test page, though

var s = document.location.search;

// Developers: The _debugCode flag is checked in j2s/core/core.z.js, 
// and, if TRUE, skips loading the core methods, forcing those
// to be read from their individual directories. Set this
// true if you want to do some code debugging by inserting
// System.out.println, document.title, or alert commands
// anywhere in the Java or Jmol code.

Jmol._debugCode = (s.indexOf("debugcode") >= 0);

jmol_isReady = function(applet) {
    document.title = (applet._id + " - Jmol " + Jmol.___JmolVersion)
    Jmol._getElement(applet, "appletdiv").style.border="1px solid blue"
}       

var lastPrompt=0;
</script>


</head>

<body>
<?php
	require('includes/php/config.php');
?>
<div class="body">

<div class="title">
<div class="panel panel-primary">

<div class="panel-heading"><h1 align="left" class="style1"><a style="color: inherit; text-decoration:none" href='index.php'>Molecular Cluster Repository</a></h1>
<h4 align="left" class="style1"><a style="color: inherit; text-decoration:none">A collection of Cartesian coordinates and binding energies of molecular clusters</a></h4>
<h4 align="left" class="style1"><a style="color: red; text-decoration:underline" href='createDataset.php'>Upload your own coordinates and energies</a></h4>
</div>
    
    
    <div class="panel-body">
    <div class="molViewer hidden">
    <div id="appdiv"></div>
    </div>
    
    <div id="txtHint" class="mainviewer">
    	<?php
    		$sql="SELECT title, authors, description, datePub, dateAdded, dateModified, paperLink, reference, imageLink, setName, tags FROM `Dataset` ORDER BY dataID";
    		$result=$conn->query($sql);
    		$numRows=mysqli_num_rows($result);
    		
    		
    	?>
    	
<div class="alert alert-success hidden" id="tagsLabel">
	<strong>Listing Papers for the Tag: !</strong> h-bond.
</div>   	
<div id="accordion" role="tablist" aria-multiselectable="true">
	<?php

	if($numRows>0){
    			for($i=0;$i<$numRows;$i++){
    				$array=mysqli_fetch_assoc($result);
    				extract($array);



    				echo '<div class="card">
    <div class="card-title" role="tab" id="headingOne" style="margin-right: 2px">
      <h3 class="mb-0" id="'.$setName.'">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$i.'" aria-expanded="true" aria-controls="collapseOne">'. $title.'
        </a>
      </h3>
      <h6 class="card-subtitle mb-2 text-muted">'.$authors.'
      </h6>
      <a href="" name="'.$setName.'" onclick="getPaper(this.name)" class="paperButton" target="_blank"><img src="'.$imageLink.'" style="height:200px;border:0;"></a>
    </div>

    <div id="collapse'.$i.'" class="collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="card-block"> '.$description.'<br><br>
      		<b>Date Published:</b> '. $datePub.'<br>
      		<b>Date Added:</b> '. $dateAdded.'<br>
      		<b>Date dateModified:</b> '. $dateModified.'<br>
      		<b>Tags:</b> '. $tags.'<br>
      		<b>Reference:</b> '.$reference.'<br>
      	    <b>DOI: </b><a href="'.$paperLink.'" target="_blank">'.$paperLink.'</a>
      <a href="" name="'.$setName.'" onclick="getPaper(this.name)" class="paperButton" target="_blank"><h5 class="button button-default">View Data</h5></a>
      </div>
    </div>
  </div>';


    			}
    		}

    	?>

<!--
      <a href="images/'.$setName.'.png"><img src="images/'.$setName.'.png" style="height:350px;border:0;"></a>
      <a href="'.$paperLink.'"><img src="'.$imageLink.'" style="height:200px;border:0;"></a> 
-->

<!--
      <a href="" name="'.$setName.'" onclick="getPaper(this.name)" target="_blank"><h5>View Data</h5></a>
      <a href="" name="'.$setName.'" onclick="getPaper(this.name)" class="paperButton" target="_blank"><h5 class="button button-default">View Data</h5></a>
      <a href="" name="'.$setName.'" onclick="getPaper(this.name)" class="paperButton"><h5 class="button button-default">View Data</h5></a>
      		<b>Name:</b> '.$setName.'<br>
 -->
    </div>
    </div>
     
    <div class="tags" style="width: 14%; height:flex; display: inline-flex;">
    	<?php
    		$SQ="SELECT DISTINCT tags FROM  `Dataset` WHERE tags IS NOT NULL ";
    		$result=$conn->query($SQ);
    		if($result){
    			$itemArrays=array();
    			$numRows=mysqli_num_rows($result);
    			for($i=0;$i<$numRows;$i++){
    				$array1=mysqli_fetch_assoc($result);
    				$item=$array1["tags"];
    				$itemArray=explode(",",$item);
    				for($j=0;$j<count($itemArray);$j++){
    					$appendItem=$itemArray[$j];
    					if(!in_array($appendItem,$itemArrays) && $appendItem!=""){
    						array_push($itemArrays,$appendItem);
    					}
    				}
    				
    			}
    				echo "<ul class='list-group' style='margin-left: 0px; width:100%; margin-left:8%; margin-right: -10%;padding-right:0px'>
    				
    				
    				<li style='text-align: center' class='list-group-item active'><b>Tags</b></li>";
    				//echo count($itemArrays);
    				//echo "<a href='#' name='".$item."'>".$item."</a><br>";
    				for($k=0;$k<count($itemArrays);$k++){
    					echo "<li style='text-align: center' class='list-group-item tagList'><a href='#' name='".$itemArrays[$k]."' onclick='getTags(this.name)'><b>".$itemArrays[$k]."</b></a></li>";
    				}
    				echo "</ul>";
    		}
    		else{
    			echo $conn->error;
    		}	
    		
    		
    	?>
    
    
	</div>
    </div>
</div>
<center>
<h6>&emsp;&emsp;Copyright 2017. Patrick Musau, Berhane Temelso, George C. Shields. Furman University. Email <a href="http://mercuryconsortium.org/furman/contact/index.php">Webmaster</a>.</h6>
</center>
</div>
</div>
</body>
</html>
