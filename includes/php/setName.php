<?php
            require('config.php');
			
			$testNameExists=$_POST['testName'];
			
			//echo $testNameExists;
		
            $sqlTest="SELECT * FROM  `Dataset` WHERE setName ='".$testNameExists."'";
            //echo $sqlTest;
            
            $result3=$conn->query($sqlTest);
            
            if($result3){
                $numberofRows=mysqli_num_rows($result3);
                //echo $numberofRows;
                if($numberofRows>0){
    				echo '<input type="text" style="border-color: #d9534f; background-color:#DCDCDC; border-width: 5px; color:black" class="form-control inp valid" id="valid" name="valid"  maxlength="0" onchange="emptyVal()" placeholder="Please Enter a Different Set Nickname" value="" required >';
                	//echo "<script type='text/javascript'> alert('That set name already exists. Please choose a different one'); console.log('huh')</script>";
                	//$_SESSION["valid"]="";
                }
            }
            else{
                echo $conn->error;
            }
        ?>