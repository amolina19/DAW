var content = null;
var button = null;
var insert = null;
var deleteAll = null;
var myArr = null;

window.onload = function(){
    content = document.getElementById('content');
    insert = document.getElementById('insert');
    button = document.getElementById('button');
    deleteall = document.getElementById('delete');
    button.onclick = function(){
        getData();
    }
    insert.onclick = function(){
        insertData();
    }
    deleteall.onclick = function(){
        deleteContent();
    }
    getData();
}


function insertData(){
    var xmlhttp = new XMLHttpRequest();   // new HttpRequest instance 
    var theUrl = "http://localhost:3000/books/";
    let object = {name: 'Jose',author: 'XDD K TONTO'};
    xmlhttp.open("POST", theUrl);
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    //alert(JSON.stringify(object));
    xmlhttp.send(JSON.stringify(object));
}

function deleteContent(){
    for(i=0;i<myArr.length;i++){
        let xmlhttp = new XMLHttpRequest();   // new HttpRequest instance 
        //alert(myArr[i].id);
        let theUrl = "http://localhost:3000/books/"+myArr[i].id;
        xmlhttp.open("DELETE", theUrl);
        xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xmlhttp.send();
    }
}

function getData(){
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            myArr = JSON.parse(this.responseText);
            displayData(myArr);
        }
    }
    xmlhttp.open("GET", "http://localhost:3000/books/", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    xmlhttp.send();
    
}

function displayData(array){
    //var text = JSON.stringify(array)
    //var object = JSON.parse(text);
    //alert(object.name);
    for(i=0;i<array.length;i++){
        console.log(array[i].id);
    }
    content.innerHTML = JSON.stringify(array);
}