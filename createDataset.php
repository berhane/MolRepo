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
<script type="text/javascript" src="includes/js/setName.js"></script>

</head>

<body>
<?php
	require('includes/php/config.php');
?>
<div class="body">

<div class="title">
<div class="panel panel-primary">

<div class="panel-heading"><h1 align="left" class="style1"><a style="color: inherit; text-decoration:none" href='index.php'>Molecular Cluster Repository</a></h1></div>
    
    <div class="panel-body">
 <form method="POST" action="createEnergy.php">
  <div class="form-group">
    <label for="title">Paper Title:</label>
    <input type="text" class="form-control inp" id="title" name="title" placeholder="Please Enter Publication Title" required>
    <label for="authors">Authors:</label>
    <input type="text" class="form-control inp" id="authors" name="authors" placeholder="Enter Author names seperated by commas" required>
    <label for="tags">Tags:</label>
    <input type="text" class="form-control inp" id="tags" name="tags" placeholder="Please Enter Search Tags For Your Paper" required>
    <label for="setName">Set Name:</label>
    <div id="txtHint"></div>
    <input type="text" class="form-control inp" id="setName" name="setName" maxlength="15" placeholder="Please Enter 15 char set nickname with no spaces" required pattern="\S+">
    <label for="description">Description:</label>
    <textarea type="textarea" align= "top" class="form-control inp descrip" id="description" name="description" placeholder="Please Enter the publication abstract" style="height: 100px" required></textarea>
    <label for="pubDate">Publication Date:</label>
    <input type="date" class="form-control inp" id="pubDate" name="pubDate" required>
    <label for="paperLink">Paper Link:</label>
    <input type="text" class="form-control inp" id="paperLink" name="paperLink" placeholder="please enter the web-address of the publication" required>
    <label for="imageLink">Image Link:</label>
    <input type="text" class="form-control inp" id="imageLink" name="imageLink" placeholder="please enter the web-address of the publication's TOC graphic or another pertinent image" required>
    <label for=reference"">Reference:</label>
    <input type="text" class="form-control inp" id="reference" name="reference" placeholder="Please Enter the paper reference" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  
    </div>

 </div>







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
