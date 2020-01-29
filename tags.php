<?php
			require('includes/php/config.php');
    		
    		$tag=$_POST["tags"];
    		
    		$sql="SELECT title, authors, description, datePub, dateAdded, dateModified, paperLink, reference, imageLink, setName, tags
FROM  `Dataset` 
WHERE tags LIKE  '%".$tag."%'
ORDER BY dataID";
    		$result=$conn->query($sql);
    		$numRows=mysqli_num_rows($result);
    		
    	?>
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
      <a href="" name="'.$setName.'" onclick="getPaper(this.name)" class="paperButton"><img src="'.$imageLink.'" style="height:200px;border:0;"></a>
    </div>

    <div id="collapse'.$i.'" class="collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="card-block"> '.$description.'<br><br>
      		<b>Date Published:</b> '. $datePub.'<br>
      		<b>Date Added:</b> '. $dateAdded.'<br>
      		<b>Date dateModified:</b> '. $dateModified.'<br>
      		<b>Tags:</b> '. $tags.'<br>
      		<b>Reference:</b> '.$reference.'<br>
      	    <b>DOI: </b><a href="'.$paperLink.'">'.$paperLink.'</a>
      <a href="" name="'.$setName.'" onclick="getPaper(this.name)" class="paperButton"><h5 class="button button-default">View Data</h5></a>
      </div>
    </div>
  </div>';


    			}
    		}

    	?>

<!--
      <a href="" name="'.$setName.'" onclick="getPaper(this.name)" class="paperButton" target="_blank"><h5 class="button button-default">View Data</h5></a>
-->
