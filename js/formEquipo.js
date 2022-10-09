"use strict";
    console.log("asd");
    let form = document.querySelector("#formEquipo");
    let inputIDEquipo = document.querySelector("#id_equipo");
    let btnModificar = document.querySelector("#btnModificar");
    let agregar = document.querySelector("#btnAgregar");

    form.addEventListener("submit", function(e){
        //form.submit();
    });

    btnModificar.addEventListener("click", function (){
        form.action = "equipos/modificar/" + inputIDEquipo.value;
        inputIDEquipo.required=true;
        form.submit;
    });

    btnAgregar.addEventListener("click", function (){
        form.action = "equipos/agregar";
        inputIDEquipo.required=false;
        form.submit;
    });