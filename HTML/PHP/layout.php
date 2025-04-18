<?php

$param = $_GET['param'] ?? '';

$handle = fopen($param.".txt", "a+");
if ($handle) {
    $target1 = "left:";
    $target2 = "right:";
    
} else {
    echo "Error opening file.";
}

?>