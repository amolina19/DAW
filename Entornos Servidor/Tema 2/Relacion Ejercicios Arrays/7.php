<?php


    $numbers = range(1,10);
    $randomArray = generateRandom($numbers);

    $counted = array_count_values($randomArray);
    //print_r($counted);
    $key = 2;
    if(array_key_exists($key,$counted)){
        $value = $counted[$key];
        if($value >= 2){
            print("True\n");
        }else{
            print("False\n");
        }
    }else{
        print("False\n");
    }

    function generateRandom($array){

        $returnArray = array();

        for($i=0;$i<10;$i++){
            $numbers = range(1,10);
            shuffle($numbers);
            array_push($returnArray,$numbers[$i]);
        }
        return $returnArray;
    }
?>