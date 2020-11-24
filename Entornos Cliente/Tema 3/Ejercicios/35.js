function open35(){

    var num;
    num=Math.random()*3; //se guarda en num un valor comprendido entre 0.00001 y 2.99999
    num=parseInt(num);  //guardamos solo la parte entera de la variable num
    if (num==0){
        window.location="http://www.hotmail.com";
    }else if(num==1){
        window.location="https://www.google.com/intl/es/gmail/about/";
    }else{
        window.location="http://www.yahoo.com";
    }
}