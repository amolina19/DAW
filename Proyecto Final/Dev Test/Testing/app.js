var content = null;
var usuario = new Object();
usuario.name = 'Alejandro';
usuario.surname = 'Molina Louchnikov';
usuario.email = 'alejandro.molina.daw@gmail.com';
usuario.date = {day: new Date().getDay(),month: new Date().getMonth(),year: new Date().getFullYear()};

window.onload = function(){
    content = document.getElementById("content");
    let data = JSON.stringify(usuario);
    content.innerHTML = data;
}