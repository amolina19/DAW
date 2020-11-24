<?php

    //División por restas sucesivas (o división rusa)

    print(division(1860,25));

    function division($numero,$dividendo){
        $y = $dividendo;
        if($numero == 1 || ($numero / $dividendo) == 1){
            return 1;
        }else{
            $aux = 0;
            if($numero>=$dividendo){
            
                for($i=1;$numero > ($y*$i);$i*=2){
                        $aux = $i;
                        
                        $dividendo *= $aux;
                        //print("$numero $dividendo \n");
                        
                        
                        //$y = $i;
                        //print(" $i ");
                        //print($numero-$dividendo);
                        //print(" $dividendo");
                        //print("\n");
                        
                }
                return $aux + division($numero-($y*$aux),$y);
            }else{
                return 0;
                print("Stopped ");
            }
        }
    }

    
?>
