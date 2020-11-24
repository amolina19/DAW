<?php

    //Escriba una función recursiva que ordene de menor a mayor un array unidimensional de enterosbasándose en la siguiente idea: 
    //coloque el elemento más pequeño en la primera ubicación, y luegoordene el resto del arreglo con una llamada recursiva.


    ##BORRAR LOS OBJETOS array_diff($array , array(ID INDEX));

    $array = array(20,40,8,5,19,1003,11,1,24,104,789,87,44);
    $array2 = array(4,2,8,6,9,5);
    $sorted_array = sortArray($array);

    print_r($sorted_array);

    /*
    

    function sortArray($array){

        
        $position = 0;
        $position_number = 0;
        if(func_num_args()> 1){
            $position = func_get_arg(1);
            
        }
        print($position);
        
        if($position == count($array)){
            return $array;
        }

        $min = $array[$position];

        for($i=$position;$i <= (count($array)-1);$i++){
            if($array[$i] < $min){
                $min = $array[$i];
                $position_number = $i;
                //print($i);
            }
        }
        //print("Min number is $min with pos $position \n");
        
        $aux = $array[$position];
        $array[$position] = $min;
        $array[$position_number] = $aux;

        //print("AFTER number is $min with pos $position \n");
        //print(" #$array[0] ");
        //print(" #$array[1] ");

        //print("Number on position $array[$position]\n");
        $position++;
        return sortArray($array,$position);
    }

    */

    /*
    function sortArray($array){

        $position = 0;
        $sortedArray = [];
        if(func_num_args() > 2){
            $sortedArray = func_get_arg(1);
        }

        $min = $array[0];

        if(count($array) == count($sortedArray)){
            return $sortedArray;
        }
        //print("  ".count($array)." ");
        
        print(" MIN $min");

        for($i=0;$i<count($array);$i++){

            if(isset($array[$i])){
                if($min > $array[$i]){
                    $min = $array[$i];
                    $position = $i;
                }
            }
            
        }

        print(" MIN after $min");

        //array_diff($array , array($position));
        unset($array[$position]);
        array_values($array);
        print(" #".count($array)." ");
        array_push($sortedArray,$min);
        print(" %%".count($sortedArray)." ");
        //$position++;
        return sortArray($array,$sortedArray);
    }
    */

    function sortArray($array){

        $position = 0;
        $founded = 0;
        if(func_num_args()> 1){
            $position = func_get_arg(1);
        }

        if($position == (count($array)-1)){
            return $array;
        }
        $min = $array[$position];
        //print(" value of min $min"); 
        //print(" value of position $position"); 
        //print(" value of 0 $array[0]"); 
        $aux = $array[$position];

        for($i=$position;$i<count($array);$i++){
            if($min > $array[$i]){
                $min = $array[$i];
                $founded = $i;
            }
        }

        if($min < $aux){
            $array[$position] = $min;
            $array[$founded] = $aux;
        }

        //print("\n");
        $position++;
        return sortArray($array,$position);
    }
?>
