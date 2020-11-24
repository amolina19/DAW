<?php

    //Torres de Hanoi


    $numDisk = 3;
    hanoi($numDisk);

    function hanoi($numDisk,$tower1=1,$tower2=2,$tower3=3){

        if($numDisk == 1){
            print("$tower1 a $tower3");
            return true;
        }else{
            hanoi($numDisk-1,$tower1,$tower3,$tower2);
            print("\n");
            print("$tower1 a $tower3");
            print("\n");
            hanoi($numDisk-1,$tower2,$tower1,$tower3);
        }
        return true;
    }
?>
