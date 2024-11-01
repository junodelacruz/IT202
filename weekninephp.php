<?php
    //Print Array Function
    function printArray($array) {
        echo "<b>Array: </b> <br>";
        foreach($array as $item) {
            echo $item . "<br>";
        }
        echo "<br>";
    }
    
    //Print Array With Keys
    function printArrayKeys($array) {
        echo "<b>Array With Keys: </b><br>";
        foreach($array as $key => $value){
            echo "[" . $key . "] => " . $value . " | ";
        }
        echo "<br>";
    }
    
    echo "<h1>Original Array: </h1>";
    //Original Array
    $original_array = array($_GET["input1"],$_GET["input2"],$_GET["input3"],$_GET["input4"],$_GET["input5"],$_GET["input6"],$_GET["input7"],$_GET["input8"]);
    printArray($original_array);
    printArrayKeys($original_array);
    
    echo "<br>";
    
    echo "<h1>Delete Two Elements: </h1>";
    //Delete Two Elements From Array
    unset($original_array[2]);
    unset($original_array[3]);
    printArray($original_array);
    printArrayKeys($original_array);
    
    echo "<br>";
    
    echo "<h1>Remove Gaps: </h1>";
    //Remove Gaps From Array
    $original_array = array_values($original_array);
    printArray($original_array);
    printArrayKeys($original_array);
    
    echo "<br>";
    
    echo "<h1>Array Sorted Ascending: </h1>";
    //Sorted Array Ascending
    sort($original_array);
    printArray($original_array);
    printArrayKeys($original_array);
    
    echo "<br>";
    
    echo "<h1>Array Sorted Descending: </h1>";
    //Sorted Array Descending
    rsort($original_array);
    printArray($original_array);
    printArrayKeys($original_array);
    
    echo "<br>";
    
    echo "<h1>Array Sorted Ascending According to Value While Keeping Keys: </h1>";
    //Sorted Array Ascending According to Value While Keeping Keys
    asort($original_array);
    printArray($original_array);
    printArrayKeys($original_array);
    
    echo "<br>";
    
    echo "<h1>Array Sorted Ascending According to Keys: </h1>";
    //Sorted Array Ascending According to Keys
    ksort($original_array);
    printArray($original_array);
    printArrayKeys($original_array);
    
    echo "<br>";
?>