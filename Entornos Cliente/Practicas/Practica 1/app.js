/*
Realizar una pequeña aplicación en JavaScript que muestre lo siguiente:  

Tabla de multiplicar del 7. Tabla de sumar del 8. Tabla de dividir del 9.  

Utilizar los tres tipos de bucles que hay en JavaScript (para cada número un tipo de bucle diferente).  

Sabiendo que cuando desplazamos 1 bit a la derecha dividimos un entero por 2 y cuando lo desplazamos a la izquierda estamos multiplicando por 2.  

Que tu aplicación también imprima el resultado de las siguientes operaciones empleando desplazamiento de bits:  

125 / 8 =

 40 x 4= 

 25 / 2=

 10 x 16= 


 /// DESPLAZAMIENTO DE BITS EN JAVASCRIPT

Criterios de puntuación. Total 5 puntos. Los 5 puntos que tiene esta tarea están asignados de la siguiente forma: 

0,75 puntos por cada una de las tablas que hay que imprimir. 

 0.5 puntos por las operaciones empleando desplazamiento de bits. 

 0,75  puntos adicionales por la claridad y presentación de los resultados, los comentarios utilizados en el código y su indentación. 
*/

//console.log("Test");

//forEachLoop();
forLoop();
whileLoop();
//console.log(24<<2);
//testing(7);

function testing(numero){
    
    var temp;
    temp = 100 >>2;
    console.log(temp);
    temp = temp>>2;
    console.log(temp);

}


function forEachLoop(numero){
    //console.log("For each Loop");
    
    //console.log("Tabla de sumar del 8");

    var array = [0,1,2,3,4,5,6,7,8,9,10];
    array.forEach(element => {
        console.log(element<<3);
    });

}

function whileLoop(){
    //console.log("Tabla multiplicar 7");
    //console.log("While Loop");

    var finished = false;
    var number = 7;
    var loop = 0;
    while(!finished){

        if(loop > 10){
            finished = true;
        }else{
            console.log(number+" x "+loop+" es "+(number*loop));
        }
        loop++;
    }
}

function forLoop(){
    //console.log("Foor Loop");
    //console.log("Tabla de dividir del 9");

    var number = 9;
    for(i=0;i<=10;i++){
        console.log(number+" / "+i+" es "+ (number/i));
    }
}