<?php
            
            require('config.php');

            $sql3="SELECT `MP2/CBS/CBS`,`MP2/CBS/&Delta;G(298k)/CBS` FROM `Sulfuric_Acid`  WHERE `systemName`='$name'";



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