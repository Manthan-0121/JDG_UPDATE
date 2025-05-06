<?php
    $row = 5;
    for($i = 1; $i <= $row;$i++){
        for($j = 1;$j <= $row+1;$j++){
            if($j > $i){
                echo "*";
            }else{
                // echo "&nbsp;";
                // echo "-";
            }
        }
        echo "<br>";
    }
?>